@extends('admin.public.index')

@section('content')

				

			@if (count($errors) > 0)
			    <div class="alert alert-danger">
			        <ul>
			            @foreach ($errors->all() as $error)
			                <li>{{ $error }}</li>
			            @endforeach
			        </ul>
			    </div>
			@endif

                
            	<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span><i class="icon-ok"></i>活动添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form id="mws-validate" class="mws-form" action="/admin/dong" method="post">
                    		{{ csrf_field() }}
                        	<div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        	<div class="mws-form-inline">

                            	<div class="mws-form-row">
                                	<label class="mws-form-label">活动折扣</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="zhekou" class="small" value="0">
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                	<label class="mws-form-label">活动金额</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="jine" class="small" value="0">
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                	<label class="mws-form-label">活动减价</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="jianjia" class="small" value="0">
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                	<label class="mws-form-label">活动买</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="mai" class="small" value="0">
                                    </div>
                                </div>

                                <div class="mws-form-row">
                                	<label class="mws-form-label">活动赠</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="zeng" class="small" value="0">
                                    </div>
                                </div>
                            	
                            	
                            </div>
                            <div class="mws-button-row">
                            	<input type="submit" class="btn btn-danger">
                            </div>
                        </form>
                    </div>    	
                </div>
@endsection