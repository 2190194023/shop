@extends('admin.public.index')

@section('css')
	<style type="text/css">
		.page_page ul,.page_page li{
			margin: 0;
			padding: 0;
			list-style-type: none;
		}
		.page_page ul,.page_page li{
		    position: relative;
		    float: left;
		    padding: 6px 12px;
		    margin-left: -1px;
		    line-height: 1.42857143;
		    color: #444444;
		    text-decoration: none;
		    background-color: #444444;
		}
		.page_page .active{
			background: green;
			color: #fff;
		}
		
	</style>
@endsection

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span><i class="icon-table"></i> 权限列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            	<div class="dataTables_filter" id="DataTables_Table_1_filter">
            		<form action="/admin/adminuser" method="get">
	            		<label>
	            			用户名 : 
	            			<input type="text" name="search_uname" value="">
	            		</label>
	            		<label>
	            			邮箱 : 
	            			<input type="text" name="search_email" value="">
	            		</label>
	            		<label>
							<input type="submit"  class="btn btn-info">
	            		</label>
            		</form>
            	</div>
            	<table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">

	                <thead>
	                    <tr>
	                        <th>id</th>
	                        <th>权限名称</th>
	                        <th>控制器名称</th>
	                        <th>方法名称</th>
	                        <th>操作</th>
	                    </tr>
	                </thead>
	                
		            <tbody role="alert" aria-live="polite" aria-relevant="all">
		            	@foreach($data as $k=>$v)
		            	<tr class="odd">
		                    <td style="text-align: center;">{{ $v->id }}</td>
		                    <td style="text-align: center;">{{ $v->desc }}</td>
		                    <td style="text-align: center;">{{ $v->cname }}</td>
		                    <td style="text-align: center;">{{ $v->aname }}</td>

		                    <td style="text-align: center;">
								<a href="" class="btn btn-info">修改</a>
								<form action="" method="post" style="display: inline-block;">
									
									<input type="submit" value="删除" class="btn btn-success">
								</form>
		                    </td>
		                </tr>
		              	@endforeach
		            </tbody>

	        	</table>

	            <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
	            	
	            	<div class="page_page">
						
	            	</div>
	            </div>
        	</div>
        </div>
    </div>
@endsection