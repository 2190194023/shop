@extends('admin.public.index')

@section('content')
<div class="container">
    <div class="mws-panel grid_8">
	    <div class="mws-panel-header">
	        <span><i class="icon-plus"></i>&nbsp;添加角色</span>
	    </div>
	    <div class="mws-panel-body no-padding">
	        <form class="mws-form" action="/admin/roles" method="post">
	        	{{ csrf_field() }}
	            <div class="mws-form-inline">
	                <div class="mws-form-row">
	                    <label class="mws-form-label">
	                        角色名
	                    </label>
	                    <div class="mws-form-item">
	                        <input type="text" class="small" name="rname" style="width:300px">
	                    </div>
	                </div> 

	                <div class="mws-form-row">
        				<label class="mws-form-label">角色权限</label>
        				<div class="mws-form-item clearfix">
        					<ul class="mws-form-list inline" style="width:550px;border:1px solid #000;padding:5px;">
        						@foreach($list as $k=>$v)
        						<h4>{{ $conall[$k] }} <small>{{ $k }}</small></h4>
									@foreach($v as $kk=>$vv)
        							<li style="width:120px;border:1px solid #000;padding:3px">
        								<input type="checkbox" name="nids[]" value="{{ $vv['id'] }}">
        								<label>{{ $vv['desc'] }}</label>
        							</li>
        							@endforeach
        						@endforeach
        					</ul>
        				</div>
        			</div>               
             
	            </div>
	            <div class="mws-button-row">
	                <input type="submit" value="添加" class="btn btn-info">               
	            </div>
	        </form>
	    </div>
	</div>
             
</div>
@endsection