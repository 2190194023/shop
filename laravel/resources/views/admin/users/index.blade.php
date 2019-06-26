@extends('admin.public.index')

@section('css')
	<style>
        .pagination{

            margin:0px;
        }

        .pagination li{
            float: left;
            height: 20px;
            padding: 0 10px;
            display: block;
            font-size: 12px;
            line-height: 20px;
            text-align: center;
            cursor: pointer;
            outline: none;
            background-color: #444444;
           
            text-decoration: none;
            border-right: 1px solid rgba(0, 0, 0, 0.5);
            border-left: 1px solid rgba(255, 255, 255, 0.15);
            box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
        }

        .pagination a{
             color: #fff;
        }

        .pagination .active{
            
            color: #323232;
            border: none;
            background-image: none;
            box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
            background-color: #f08dcc;
        }

	</style>
@endsection

@section('content')
	<div class="mws-panel grid_8">
    	<div class="mws-panel-header">
        	<span><i class="icon-table"></i> 用户列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
            	<div class="dataTables_filter" id="DataTables_Table_1_filter">
            		<form action="/admin/users" method="get">
	            		<label>
	            			用户名 : 
	            			<input type="text" name="search_uname" value="{{ $params['search_uname'] or '' }}">
	            		</label>
	            		<label>
	            			邮箱 : 
	            			<input type="text" name="search_email" value="{{ $params['search_email'] or '' }}">
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
	                        <th>用户名</th>
	                        <th>手机号</th>
	                        <th>邮箱</th>
	                        <th>头像</th>
	                        <th>注册时间</th>
	                        <th>操作</th>
	                    </tr>
	                </thead>
	                
		            <tbody role="alert" aria-live="polite" aria-relevant="all">
		            	@foreach($users as $k=>$v)
		            	<tr class="odd">
		                    <td style="text-align: center;">{{ $v->id }}</td>
		                    <td style="text-align: center;">{{ $v->uname }}</td>
		                    <td style="text-align: center;">{{ $v->phone }}</td>
		                    <td style="text-align: center;">{{ $v->email }}</td>
		                    <td style="text-align: center;">
								<img src="/uploads/{{$v->profile}}" style="border-radius: 5px;border: 1px solid #ccc; width: 100px; " alt="">  
		                    </td>
		                    <td style="text-align: center;">{{ $v->created_at }}</td>
		                    <td style="text-align: center;">
								<a href="/admin/users/{{ $v->id }}/edit" class="btn btn-info">修改</a>
								<form action="/admin/users/{{ $v->id }}" method="post" style="display: inline-block;">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
									<input type="submit" value="删除" class="btn btn-success">
								</form>
		                    </td>
		                </tr>
		               @endforeach
		            </tbody>

	        	</table>

	            
	            	<div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
               			{{ $users->appends($params)->links() }}
                
            		</div>

        	</div>
        </div>
    </div>

@endsection