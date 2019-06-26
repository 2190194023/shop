@extends('admin.public.index')

@section('content')
<div class="container">
    <div class="mws-panel grid_8">
	    <div class="mws-panel-header">
	        <span><i class="icon-plus"></i>&nbsp;添加权限</span>
	    </div>
	    <div class="mws-panel-body no-padding">
	        <form class="mws-form" action="/admin/nodes" method="post">
	        	{{ csrf_field() }}
	            <div class="mws-form-inline">
	                <div class="mws-form-row">
	                    <label class="mws-form-label">
	                        权限名称
	                    </label>
	                    <div class="mws-form-item">
	                        <input type="text" class="small" name="desc" style="width:300px">
	                    </div>
	                </div>  

	                <div class="mws-form-row">
	                    <label class="mws-form-label">
	                       控制器名称
	                    </label>
	                    <div class="mws-form-item">
	                        <input type="text" class="small" name="cname" style="width:300px">
	                    </div>
	                </div> 

	                <div class="mws-form-row">
	                    <label class="mws-form-label">
	                       方法名称
	                    </label>
	                    <div class="mws-form-item">
	                        <input type="text" class="small" name="aname" style="width:300px">
	                    </div>
	                </div> 

	            </div>
	            <div class="mws-button-row">
	            	<input type="hidden" name="" value="">
	            	
	                <input type="submit" value="添加" class="btn btn-info">               
	            </div>
	        </form>
	    </div>
	</div>
             
</div>
@endsection