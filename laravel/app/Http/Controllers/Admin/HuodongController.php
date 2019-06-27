<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Huodong;

class HuodongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $huodong = Huodong::get();
        return view('admin.dong.index',['huodong'=>$huodong]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dong.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    	 //验证 必填
    	$this->validate($request,[
    		'zhekou' => 'required|size:1',
    		'jine' => 'required',
    		'jianjia' => 'required',
    		'mai' => 'required',
    		'zeng' => 'required',
    		
    
    	],[
    		'zhekou.size' => '请填写一位数的折扣',
    		'zhekou.required' => '请填写',
    		'jine.required' => '请填写',
    		'jianjia.required' => '请填写',
    		'mai.required' => '请填写',
    		'mai.required' => '请填写',
    
    	]);

       $huodong =  new Huodong;
     //  dd($request->input('jine',0));
     
       $huodong->jine = $request->input('jine',0);
    //   dd($huodong->jine);
       $huodong->zhekou = $request->input('zhekou',0);
       $huodong->jianjia = $request->input('jianjia',0);
       $huodong->mai = $request->input('mai',0);
       $huodong->zeng = $request->input('zeng',0);

       $res = $huodong->save();
        if($res){
            return redirect('admin/dong')->with('success','添加成功');
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
        //
        $huodong =  Huodong::where('id',$id)->first();
        return view('admin.dong.update',['huodong'=>$huodong]);
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
    	 //验证 必填
    	$this->validate($request,[
    		'zhekou' => 'required|size:1',
    		'jine' => 'required',
    		'jianjia' => 'required',
    		'mai' => 'required',
    		'zeng' => 'required',
    		
    
    	],[
    		'zhekou.size' => '请填写一位数的折扣',
    		'zhekou.required' => '请填写',
    		'jine.required' => '请填写',
    		'jianjia.required' => '请填写',
    		'mai.required' => '请填写',
    		'mai.required' => '请填写',
    
    	]);

    	$huodong = Huodong::find($id);

        $huodong->jine = $request->input('jine',0);
    //   dd($huodong->jine);
       $huodong->zhekou = $request->input('zhekou',0);
       $huodong->jianjia = $request->input('jianjia',0);
       $huodong->mai = $request->input('mai',0);
       $huodong->zeng = $request->input('zeng',0);

       $res = $huodong->save();
        if($res){
            return redirect('admin/dong')->with('success','修改成功');
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
        //
       $res =  Huodong::destroy($id);
       if($res){
            return redirect('admin/dong')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
