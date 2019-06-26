<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goodsimg;
use App\Models\Goods;

class GoodsimgController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //显示页码
       $search = $request->input('search','');     
        //查询goods 所有数据
        
       
        if($search){
             $good = Goods::where('id',$search)->first();
        $goodsimg = Goodsimg::where('gid',$good->id)->paginate(8);
        }else{
            $goodsimg = Goodsimg::paginate(8);
        }
        
       foreach($goodsimg as $k=>$v){
         //查询goods 所有数据
            $goods = Goods::where('id',$v->gid)->first();
            $v->gid = $goods->gname;
        }
 
        return view('admin.goodsimg.index',['search'=>$search,'goodsimg'=>$goodsimg]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //查询所有商品
        $goods = Goods::get();
        $id = $request->input('id',0);
        return view('admin.goodsimg.create',['id'=>$id,'goods'=>$goods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //上传图片
        if($request->hasFile('lujing')){
            $file_path = $request->file('lujing')->store(date('Ymd'));
        }else{
            $file_path = '';
        }
        //将数据压入到goodsimg
        $goodsimg = new Goodsimg;
        $goodsimg->gid = $request->input('gid','');
        $goodsimg->gpic = $request->input('gpic','');
        $goodsimg->lujing = $file_path;
        $res = $goodsimg->save();
        //判断
        if($res){
            return redirect('admin/goodsimg')->with('success','添加成功');
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
    public function edit(Request $request,$id)
    {
        //
        $goodsimg = Goodsimg::where('id',$id)->first();
        $goods = Goods::get();
        $id = $request->input('id',0);
        return view('admin.goodsimg.update',['id'=>$id,'goods'=>$goods,'goodsimg'=>$goodsimg]);
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
        //获取图片
        if($request->hasFile('lujing')){
           
            $file_path = $request->file('lujing')->store(date('Ymd'));
        }else{
            $file_path = $request->input('old_profile');
        }



         $goods = Goodsimg::find($id);
         $goods->gid = $request->input('gid',0);
         $goods->gpic = $request->input('gpic',0);
         $goods->lujing = $file_path;

         $res = $goods->save();
         if($res){
            return redirect('admin/goodsimg')->with('success','修改成功');
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
        //删除
        $res = Goodsimg::destroy($id);    
         //判断
        if($res){
            return redirect('admin/goodsimg')->with('success','删除成功');
        }else{
            return back()->with('error','删除失败');
        }
    }
}
