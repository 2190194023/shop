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
                    	<span><i class="icon-ok"></i>商品图片添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form id="mws-validate" class="mws-form" action="/admin/goodsimg" method="post" enctype="multipart/form-data">
                    		{{ csrf_field() }}
                        	<div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        	<div class="mws-form-inline">
                        		<div class="mws-form-row">
                                	<label class="mws-form-label">商品名称</label>
                                	<div class="mws-form-item">
                    					<select class="small"  name="gid">
                                        	<option value="0">--请选择--</option>
                                        	@foreach($goods as $k=>$v)
                                        	<option value="{{ $v->id }}">{{ $v->gname }}</option>
                                        	@endforeach 
                    					</select>
                                    </div>
                                </div>
                     
                                <div class="mws-form-row">
                                	<label class="mws-form-label">图片名称</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="gpic" class="small">
                                    </div>
                                </div>
                                <div class="mws-form-row">
                                	<label class="mws-form-label">图片</label>
                                	<div class="mws-form-item"  style="width:550px;">
                                    	<input type="file" name="lujing">
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