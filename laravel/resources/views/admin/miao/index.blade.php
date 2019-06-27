@extends('admin.public.index')

@section('content')

<style type="text/css">
	.sb{
		overflow:hidden;
		text-overflow:ellipsis;
		white-space:nowrap;
	}
</style>

		<!-- 搜索 开始 -->
        <div class="form-body" style="height:50px;padding-top:30px" data-example-id="simple-form-inline">
          <form class="form-inline" action="/admin/miao">
            <div class="form-group">
              <input type="text" class="form-control" name="search" value="{{ $search }}" placeholder="链接名称">
            <button type="submit" class="btn btn-success">搜索</button>
          </div>
        </form>
        </div>
        <!-- 搜索 结束 <--></-->

<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>秒杀商品显示</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>ID</th>                         
                                    <th>商品名称</th>
                                    <th>秒杀商品状态</th>
                                    <th>秒杀商品数量</th>
                                    <th>秒杀商品价格</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            	@foreach($miao as $k=>$v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td>{{ $temp[$k] }}</td>
                                    <td>{{ $v->status }}</td>
                                    <td>{{ $v->mouse }}</td>
                                    <td>{{ $v->maney }}</td>
                                    <td>
                                    	
                                    	<a href="/admin/miao/{{ $v->id }}/edit" class="btn btn-primary">修改</a>
                                    	<form action="/admin/miao/{{ $v->id }}" method="post" style="display:inline-block;">
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
				<!-- 页码样式 -->
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