<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdmin;
use App\Models\Adminuser;
use Hash;
use Illuminate\Support\Facades\Storage;


class AdminuserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 接收搜索的参数
        $search_uname = $request->input('search_uname','');
        $search_email = $request->input('search_email','');

        $adminuser = Adminuser::where('uname','like','%'.$search_uname.'%')->where('email','like','%'.$search_email.'%')->paginate(5);

        // 加载用户列表页
        return view('admin.adminuser.index',['adminuser'=>$adminuser,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示用户添加页面
        return view('admin.adminuser.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdmin $request)
    {
        // 上传头像
        if($request->hasFile('profile')){
            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = '';
        }

        $data = $request->all();
        // dump($data);

        // 接收数据
        $adminuser = new Adminuser;
        $adminuser->uname = $data['uname'];
        $adminuser->password = Hash::make($data['password']);
        $adminuser->phone = $data['phone'];
        $adminuser->email = $data['email'];
        $adminuser->profile = $file_path;

        // 执行添加
        $res = $adminuser->save();

        if($res){

            return redirect('admin/adminuser')->with('success','添加成功');
        }else{

            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取数据库信息
        $adminuser = Adminuser::find($id);

        // 加载修改页面
        return view('admin.adminuser.edit',['adminuser'=>$adminuser]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // 获取头像
        if ($request->hasFile('profile')) {

            // 删除以前旧的图片
            Storage::delete($request->input('old_profile'));

            $file_path = $request->file('profile')->store(date('Ymd'));
        }else{
            $file_path = $request->input('old_profile');
        }

        $adminuser = Adminuser::find($id);
        $adminuser->phone = $request->input('phone','');
        $adminuser->email = $request->input('email','');
        $adminuser->profile = $file_path;

        $res = $adminuser->save();

        if($res){
            return redirect('admin/adminuser')->with('success','修改成功');
        }else{

            return back()->with('error','修改失败');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Adminuser::destroy($id);

        // 删除头像
        Storage::delete('file.jpg');


        
        if($res){
            return redirect('admin/adminuser')->with('success','删除成功');
        }else{

            return back()->with('error','删除失败');
        }
    }
}
