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
                    	<span><i class="icon-ok"></i>秒杀商品修改</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form id="mws-validate" class="mws-form" action="/admin/miao/{{ $miao->id }}" method="post" enctype="multipart/form-data">
                    		{{ csrf_field() }}
                    		{{ method_field('PUT') }}
                        	<div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        	<div class="mws-form-inline">
                        		<div class="mws-form-row">
                                	<label class="mws-form-label">商品名称</label>
                                	<div class="mws-form-item">
                    					<select class="small"  name="gid">
                                        	<option value="0">--请选择--</option>
										
                                        	@foreach($goods as $k=>$v)
                                        	
                                        	<option value="{{ $v->id }}" readonly>{{ $v->gname }}</option>
                                        	@endforeach 
                    					</select>
                                    </div>
                                </div>
                     
                                <div class="mws-form-row">
                                	<label class="mws-form-label">状态</label>
                                	<div class="mws-form-item">
                    					<select class="small"  name="status">
                                        	<option value="1">--开启秒杀--</option>
                                        	<option value="0">--停止秒杀--</option>
                    					</select>
                                    </div>
                                </div>
                                
                            	 <div class="mws-form-row">
                                	<label class="mws-form-label">秒杀数量</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="mouse" class="small" value="{{ $miao->mouse }}">
                                    </div>
                                </div>

                                 <div class="mws-form-row">
                                	<label class="mws-form-label">价格</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="maney" class="small" value="{{ $miao->maney }}">
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