@extends('admin.public.index')

@section('content')


<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>分类显示</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>父类名称</th>
                                    <th>父级ID</th>
                                    <th>分类路径</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($cates as $k=>$v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->cname }}</td>
                                    <td>{{ $v->pid }}</td>
                                    <td>{{ $v->path }}</td>
                                    <td>
                                    	@if(substr_count($v->path,',') < 2)
                                    	<a href="/admin/cates/create?id={{ $v->id }}" class="btn btn-primary">添加子分类</a>
                                    	@endif
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                       
                    </div>
                </div>

                 <div class="pull-right">
						<!-- 显示页码 -->
						{{ $cates->appends(['search'=>$search])->links() }}
				</div>
				<style type="text/css">
        #pull_right{
            text-align:center;
        }
        .pull-right {
            /*float: left!important;*/
        }
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        .pagination > li {
            display: inline;
        }
        .pagination > li > a,
        .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #428bca;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .pagination > li > a:hover,
        .pagination > li > span:hover,
        .pagination > li > a:focus,
        .pagination > li > span:focus {
            color: #2a6496;
            background-color: #eee;
            border-color: #ddd;
        }
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #428bca;
            border-color: #428bca;
        }
        .pagination > .disabled > span,
        .pagination > .disabled > span:hover,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > a,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }
        .clear{
            clear: both;
        }
    </style>
			
@endsection