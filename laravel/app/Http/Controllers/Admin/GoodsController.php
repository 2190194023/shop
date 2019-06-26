<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use App\Models\Goods;
use DB;

class GoodsController extends Controller
{

	//设置个静态的方法 
	public static function getCateData()
	{
		   //查询所有数据   并分级
	     $cates = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->get();

	     foreach ($cates as $key => $value){
	     	$n = substr_count($value->path,',');

	     	$cates[$key]->cname = str_repeat('|----',$n).$value->cname;
	   	}
	   	return $cates;
	}
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //显示页码
       $search = $request->input('search','');
    	
    	//查询goods 所有数据
       $goods = Goods::where('gname','like','%'.$search.'%')->paginate(8);
       

       
       return view('admin.goods.index',['search'=>$search,'goods'=>$goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
	    

    

    	$id = $request->input('id',0);
        //显示 添加页面
        return view('admin.goods.create',['id'=>$id,'cates'=>self::getCateData()]);
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
    		'gname' => 'required',
    		'gcompany' => 'required',
    		'gdescr' => 'required',
    		'gprice' => 'required',
    		'size' => 'required',
    		'gtock' => 'required',
    		'xinghao' => 'required',
    
    	],[

    		'gname.required' => '请填写商品名称',
    		'gcompany.required' => '请填写生产厂家',
    		'gdescr.required' => '请填写简介',
    		'gprice.required' => '请填写单价',
    		'size.required' => '请填写尺寸',
    		'gtock.required' => '请填写库存量',
    		'xinghao.required' => '请填写型号',
    
    	]);



    	//获取添加事件
        $gaddtime=date('Y-m-d H:i:s',time()+8*60*60);
        //将数据压入数据库
        $goods = new Goods;
        $goods->tid = $request->input('tid','');
        $goods->gname = $request->input('gname',''); 
        $goods->gcompany = $request->input('gcompany','');
        $goods->gdescr = $request->input('gdescr','');
        $goods->gprice = $request->input('gprice',0.00);
        $goods->size = $request->input('size','');
        $goods->gstatus = $request->input('gstatus','');
        $goods->gtock = $request->input('gtock',0);
        $goods->gaddtime = $gaddtime;
        $goods->xinghao = $request->input('xinghao','');
        $res1 = $goods->save();

        //判断
        if($res1){
        	return redirect('admin/goods')->with('success','添加成功');
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
    public function edit(request $request,$id)
    {
    	$cha = Goods::where('id',$id)->first();
    	

    	$id = $request->input('id',0);
        //跳转修改
       	return view('admin.goods.edit',['cha'=>$cha,'id'=>$id,'cates'=>self::getCateData()]);
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
        //执行修改语句
         //将数据压入数据库
        $goods = new Goods;

       $goods = Goods::find($id);

        $goods->tid = $request->input('tid','');
        $goods->gname = $request->input('gname',''); 
        $goods->gcompany = $request->input('gcompany','');
        $goods->gdescr = $request->input('gdescr','');
        $goods->gprice = $request->input('gprice',0.00);
        $goods->size = $request->input('size','');
        $goods->gstatus = $request->input('gstatus','');
        $goods->gtock = $request->input('gtock',0);

        $goods->xinghao = $request->input('xinghao','');
        $res1 =$goods->save();

        //判断
        if($res1){
        	return redirect('admin/goods')->with('success','修改成功');
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
        $res = Goods::destroy($id);
        
        //判断
        if($res){
        	return redirect('admin/goods')->with('success','删除成功');
        }else{
        	return back()->with('error','删除失败');
        }
    }
}
