@extends('admin.public.index')

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span><i class="icon-table"></i> 角色列表</span>
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
	                        <th>角色名</th>
	                        <th>操作</th>
	                    </tr>
	                </thead>
	                
		            <tbody role="alert" aria-live="polite" aria-relevant="all">
		            	@foreach($roles_data as $k=>$v)
		            	<tr class="odd">
		                    <td style="text-align: center;">{{ $v->id }}</td>
		                    <td style="text-align: center;">{{ $v->rname }}</td>
		                    <td style="text-align: center;">
		                    	<a href="" class="btn btn-warning">角色</a>
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