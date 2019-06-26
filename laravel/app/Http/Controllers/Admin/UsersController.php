<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUsers;
use App\Models\Users;
use Hash;
use Illuminate\Support\Facades\Storage;


class UsersController extends Controller
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

        $users = Users::where('uname','like','%'.$search_uname.'%')->where('email','like','%'.$search_email.'%')->paginate(5);

        // 加载用户列表页
        return view('admin.users.index',['users'=>$users,'params'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 显示用户添加页面
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUsers $request)
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
        $user = new Users;
        $user->uname = $data['uname'];
        $user->password = Hash::make($data['password']);
        $user->phone = $data['phone'];
        $user->email = $data['email'];
        $user->profile = $file_path;

        // 执行添加
        $res = $user->save();

        if($res){

            return redirect('admin/users')->with('success','添加成功');
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
        $user = Users::find($id);

        // 加载修改页面
        return view('admin.users.edit',['user'=>$user]);  
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

        $user = Users::find($id);
        $user->phone = $request->input('phone','');
        $user->email = $request->input('email','');
        $user->profile = $file_path;

        $res = $user->save();

        if($res){
            return redirect('admin/users')->with('success','修改成功');
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
        $res = Users::destroy($id);

        // 删除头像
        Storage::delete('file.jpg');


        
        if($res){
            return redirect('admin/users')->with('success','删除成功');
        }else{

            return back()->with('error','删除失败');
        }
    }
}
