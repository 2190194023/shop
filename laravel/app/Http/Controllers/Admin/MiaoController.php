<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Goods;
use App\Models\Miao;

class MiaoController extends Controller
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
       //判断 是否查询
     	if(empty($search)){
     	//查询数据
	     	$miao = Miao::paginate(8);
	     	$temp = [];
	     //遍历
	     	foreach($miao as $k=>$v){
	     //按照gid 查询商品
	     		$goodname = Goods::where('id',$v->gid)->get();
	     //遍历查询出的商品  取出gname
	     		foreach($goodname as $key=>$val){
	     			$temp[] = $goodname[$key]->gname;
	     		}
	     		
	     	}
	     }else{
	     //按照条件查询 商品
	     	$goods = Goods::where('gname','like','%'.$search.'%')->paginate(8);
	     	$miao = [];
	     //遍历 按照 商品 id 查询出miao表的数据
	     	foreach($goods as $k => $v){
	     		$tmp = Miao::where('gid',$v->id)->paginate(8);
	     		foreach($tmp as $key=>$val){
	     			$miao[] = $val;
	     		}
	     	}
	     	$tap = [];
     		foreach($miao as $k=>$v){
	     		$goodname = Goods::where('id',$v->gid)->get();
	     		$tap[] = $goodname;
     		}
     		$temp = [];
     		foreach($tap as $k=>$v){
     			$temp[] = $tap[$k][0]->gname;
     		}
	     }
		

     	
       return view('admin.miao.index',['miao'=>$miao,'search'=>$search,'temp'=>$temp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	//查询所有商品
    	$goods = Goods::get();

        return view('admin.miao.create',['goods'=>$goods]);
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
    		'gid' => 'required|unique:miao',
    		
    		'mouse' => 'required',
    		'maney' => 'required',
    		
    
    	],[
    		'gid.unique' => '该商品已经添加过',
    		'gid.required' => '请选择商品',
    		'mouse.required' => '请添加数量',
    		'maney.required' => '请添加价格',
    
    	]);


        //将数据压入到数据库
        
        $miao = new Miao;
        $miao->gid = $request->input('gid','');
        $miao->status = $request->input('status',0);
        $miao->mouse = $request->input('mouse','');
        $miao->maney = $request->input('maney','');
        $res1 = $miao->save();

        //判断
        if($res1){
        	return redirect('admin/miao')->with('success','添加成功');
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
    	
    	//查询所有商品
    	$goods = Goods::get();
    	//dd($goods);
    	//按照 id 回填
        $miao = Miao::where('id',$id)->first();
      //  dd($miao);
        return view('admin.miao.update',['miao'=>$miao,'goods'=>$goods]);
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
    		'gid' => 'required|unique:miao',
    		
    		'mouse' => 'required',
    		'maney' => 'required',
    		
    
    	],[
    		'gid.unique' => '该商品已经添加过',
    		'gid.required' => '请选择商品',
    		'mouse.required' => '请添加数量',
    		'maney.required' => '请添加价格',
    
    	]);

    	//修改
        $miao = Miao::find($id);
        //将数据压入s
        $miao->gid =$request->input('gid','');
        $miao->status =$request->input('status',0);
        $miao->mouse =$request->input('mouse','');
        $miao->maney =$request->input('maney','');
        $res = $miao->save();
        if($res){
        	return redirect('admin/miao')->with('success','修改成功');
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
        $res = Miao::destroy($id);

        //判断
        if($res){
        	return redirect('admin/miao')->with('success','添加成功');
        }else{
        	return back()->with('error','添加失败');
        }
    }
}
