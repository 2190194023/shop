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
                                    <th>活动折扣</th>
                                    <th>活动金额</th>
                                    <th>活动减价</th>
                                    <th>活动买</th>
                                    <th>活动赠</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            	
                            	@foreach($huodong as $k=>$v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $v->zhekou }}</td>                                
                                    <td>{{ $v->jine }}</td>
                                    <td>{{ $v->jianjia }}</td>
                                    <td>{{ $v->mai }}</td>
                                    <td>{{ $v->zeng }}</td>
                                    <td>
                                    	<a href="/admin/dong/{{ $v->id }}/edit" class="btn btn-primary">修改</a>
                                    	<form action="/admin/dong/{{ $v->id }}" method="post" style="display:inline-block;">
                                    		{{ csrf_field() }}
                                    		{{ method_field('DELETE') }}
                                    		<input type="submit" value="删除" class="btn btn-success">
                                    	</form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                       
                    </div>
                </div>

                 <div class="pull-right">
						<!-- 显示页码 -->
						
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