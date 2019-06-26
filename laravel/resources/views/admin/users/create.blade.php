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
	    	<span><i class="icon-plus"></i>&nbsp;添加用户</span>
	    </div>
	    <div class="mws-panel-body no-padding">
	        <form class="mws-form" action="/admin/users" method="post" enctype="multipart/form-data">
	        	{{ csrf_field() }}
	            <div class="mws-form-inline">

	                <div class="mws-form-row">
	                    <label class="mws-form-label">
	                        用户名
	                    </label>
	                    <div class="mws-form-item" >
	                        <input type="text" class="small" name="uname" value="{{ old('uname') }}" style="width:300px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color:red">用户名数字母下划线组成6-12位，必须以字母开头</span>
	                    </div>
	                </div>

	                <div class="mws-form-row" >
	                    <label class="mws-form-label">
	                        密码
	                    </label>
	                    <div class="mws-form-item" >
	                        <input type="password" class="small" name="password" id="pwd" style="width:300px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	                    </div>
	                </div>

	                <div class="mws-form-row">
	                    <label class="mws-form-label">
	                        确认密码
	                    </label>
	                    <div class="mws-form-item" >
	                        <input type="password" class="small" name="repass" style="width:300px">
	                    </div>
	                </div>

	                <div class="mws-form-row">
	                    <label class="mws-form-label">
	                        手机号
	                    </label>
	                    <div class="mws-form-item" >
	                        <input type="text" class="small" name="phone" value="{{ old('phone') }}" style="width:300px">
	                    </div>
	                </div>

	                <div class="mws-form-row">
	                    <label class="mws-form-label">
	                        邮箱
	                    </label>
	                    <div class="mws-form-item" >
	                        <input type="text" class="small" name="email" value="{{ old('email') }}" style="width:300px">
	                    </div>
	                </div>

	                           
	                <div class="mws-form-row">
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