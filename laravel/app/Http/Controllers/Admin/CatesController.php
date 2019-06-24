<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cates;
use DB;

class CatesController extends Controller
{
	//设置个静态的方法 给 子分类加--
	public static function getCateData()
	{
	//查询所有数据   并分级
     $cates = Cates::select('*',DB::raw("concat(path,',',id) as paths"))->orderBy('paths','asc')->paginate(10);

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
    	$search = $request->input('search','');

        //显示 分类列表页
        return view('admin.cates.index',['search'=>$search,'cates'=>self::getCateData()]);
       
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
        return view('admin.cates.create',['id'=>$id,'cates'=>self::getCateData()]);
       
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
    		'cname' => 'required',
    
    	],[

    		'cname.required' => '请填写分类名称',
    
    	]);

        //添加
        //获取 pid
        $pid = $request->input('pid',0);

        //获取 path
        if($pid == 0){
        	$path = 0;
        }else{
        //获取父级数据
        $parent_data = Cates::find($pid);
        $path = $parent_data->path.','.$parent_data->id;
        }

        //将数据压入到数据库
        
        $cate = new Cates;
        $cate->cname = $request->input('cname','');
        $cate->pid = $pid;
        $cate->path = $path;
        $res1 = $cate->save();

        //判断
        if($res1){
        	return redirect('admin/cates')->with('success','添加成功');
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
        //
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
    }
}
