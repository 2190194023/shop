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
                    	<span><i class="icon-ok"></i>分类添加</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                    	<form id="mws-validate" class="mws-form" action="/admin/cates" method="post">
                    		{{ csrf_field() }}
                        	<div id="mws-validate-error" class="mws-form-message error" style="display:none;"></div>
                        	<div class="mws-form-inline">
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">分类名称</label>
                                	<div class="mws-form-item">
                                    	<input type="text" name="cname" class="small">
                                    </div>
                                </div>
                            	
                            	<div class="mws-form-row">
                                	<label class="mws-form-label">所属分类</label>
                                	<div class="mws-form-item">
                    					<select class="small"  name="pid">
                                        	<option value="0">--请选择--</option>
                                        	@foreach($cates as $k=>$v)
                                        	<option value="{{ $v->id }}" {{ $v->id == $id ? 'selected' : '' }}>{{ $v->cname }}</option>
                                        	@endforeach 
                    					</select>
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