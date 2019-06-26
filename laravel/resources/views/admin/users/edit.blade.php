@extends('admin.public.index')


@section('content')

	<!-- 显示错误信息 开始 -->
	@if (count($errors) > 0)
	    <div class="mws-form-message error">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	<!-- 显示错误信息 结束 -->

	<!-- 内容 开始 -->
	<div class="mws-panel grid_8">
		<div class="mws-panel-header">
	    	<span>用户修改页面 : </span>
	    </div>
	    <div class="mws-panel-body no-padding">
	        <form class="mws-form" action="/admin/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
	        	{{ csrf_field() }}
	        	{{ method_field('PUT') }}
	            <div class="mws-form-inline">

	                <div class="mws-form-row">
	                    <label class="mws-form-label">
	                        用户名
	                    </label>
	                    <div class="mws-form-item" >
	                        <input type="text" class="small" name="uname" value="{{  $user->uname }}" disabled style="width:300px">
	                    </div>
	                </div>

	                <div class="mws-form-row">
	                    <label class="mws-form-label">
	                        手机号
	                    </label>
	                    <div class="mws-form-item" >
	                        <input type="text" class="small" name="phone" value="{{  $user->phone }}" style="width:300px">
	                    </div>
	                </div>

	                <div class="mws-form-row">
	                    <label class="mws-form-label">
	                        邮箱
	                    </label>
	                    <div class="mws-form-item" >
	                        <input type="text" class="small" name="email" value="{{ $user->email }}" style="width:300px">
	                    </div>
	                </div>

	                
	                <div class="mws-form-row">
	                	<img src="/uploads/{{ $user->profile }}" style="border-radius: 5px;border: 1px solid #ccc; width: 100px;margin-left: 16px; " alt="">
	                	<input type="hidden" name="old_profile" value="{{ $user->profile }}">
					    <label class="mws-form-label" >
					       头像
					    </label>
					    <div class="mws-form-item" style="width:300px;">				    
					     <input type="file" name="profile" style="position: absolute; top: 0px; right: 0px; margin: 0px; cursor: pointer; font-size: 999px; opacity: 0; z-index: 999;">    
					    </div>
					</div>           
	            </div>
	            <div class="mws-button-row">
	                <input type="submit" value="提交" class="btn btn-info">               
	            </div>
	        </form>
	    </div>   	
	</div>
	<!-- 内容 结束 -->
@endsection