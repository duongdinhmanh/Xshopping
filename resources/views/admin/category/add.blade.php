@extends('admin.index')
@section('content')
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3><i style="padding-right: 20px" class="fa fa-database"></i>ADD - NEW - CATEGORY</h3>
		</div>
		<div class="title_right">
			<div class="btn-group">
			 	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			 	<i class="fa fa-language"></i>
			    <span id="current_lang" class="public-icon">
			    	</span>{{ trans('config.Language') }}<span class="caret">
			    </span>
			  </button>
			  <ul id="lang" class="dropdown-menu" style="z-index: 999999">
			    <li>
                    <a href="{!! route('change_lang',['vi']) !!}">
			    		<img src="assets/upload/config/vn.png" alt=""> Việt Nam
			    	</a>
			    </li>
			    <li><a href="{!! route('change_lang',['en']) !!}">
                    <img src="assets/upload/config/en.png" alt="">  English
                    </a>
                </li>
			 	</ul>
			</div>
		</div>
	</div>
	<div class="clearfix clearfix_top"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="x_panel">
                 @if (count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $add)
                            <ul>
                                <li>{{$add}}</li>
                            </ul>
                        @endforeach
                    </div>
                @endif
                <div class="x_content">
                @if ( Session::get('website_language') == 'en')
                    <form class="form-horizontal form-label-left" action="{{ route('Category.store') }}"  method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    					<div class="item form-group">
    						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Name - Category <span class="required">*</span>
    						</label>
    						<div class="col-md-8 col-sm-8 col-xs-12">
    							<input id="name" class="form-control col-md-7 col-xs-12 input_slug"  data-validate-words="2" name="name" placeholder="Name category...." type="text">
                                <p><small>* The name should not contain a sign (-), the letters separated by a space .. ( NAME CATEGORY..)</small></p>
    						</div>
    					</div>
    					<div class="item form-group">
    						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Slug <span class="required">*</span>
    						</label>
    						<div class="col-md-8 col-sm-8 col-xs-12">
    							<input type="text"  name="slug" class="form-control col-md-7 col-xs-12 output_slug" placeholder="slug - category ...">
    							<p><small>* You can change the slug, the words are not capitalized and separated by dashes .. ( how-are-you ..)</small></p>
    						</div>
    					</div>
    					<div class="item form-group">
    						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Category-Parent <span class="required">*</span>
    						</label>
    						<div class="col-md-8 col-sm-8 col-xs-12">
    	                         <select class="form-control" name="parent_id">
    	                            <option value="0">==|| {{ trans('config.Category_Parent') }} </option>
                                    @foreach ($category as $cat)
                                          <option value="{{ $cat->id }}">==||==|| {{ $cat->name }}</option>
                                    @endforeach
    	                         </select>
                            </div>
    					</div>
                        <div id="none_cat">
    						<script type="text/javascript">
    			                function open_popup(url){
    			                      var w = 1180;
    			                      var h = 770;
    			                      var l = Math.floor((screen.width-w)/2);
    			                      var t = Math.floor((screen.height-h)/2);
    			                      var win = window.open(url, 'ResponsiveFilemanager', "scrollbars=1,width=" + w + ",height=" + h + ",top=" + t + ",left=" + l);
    			                }
    			            </script>
    						<div class="form-group">
    				            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Category-Image <span class="required">*</span></label>
    			                <div class="col-md-4 col-sm-4 col-xs-12" >
    		                 		<a   style="height: 100%"  href="javascript:open_popup('{!!url('')!!}/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID')" class="thumbnail">
    		                 			<img class="imagePreview" src="assets/upload/config/no-image.png" alt="">
    		                 		</a>
                                    <small>* Unmarked image file name, and image file (..png, .jpg, .jpeg)</small>
    			                </div>
    			                <div class="clearfix"></div>
    			                <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
    			                <div class="col-md-9 col-sm-9 col-xs-12">
    			                  	<input id="fieldID" type="hidden" value="" name="images" />
    			                  	<a href="javascript:open_popup('{!!url('')!!}/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID')">
    			                     <button style="margin-bottom: 10px" type="button" class="btn btn-success">Choose IMG</button>
    			                  	</a>
    			                </div>
    			            </div>
                        </div>
    					<div class="item form-group">
    						<label class="control-label col-md-3 col-sm-3 col-xs-12" >Status <span class="required">*</span>
    						</label>
    						<div class="col-md-8 col-sm-8 col-xs-12">
    							<div class="radio">
    	                            <label class="">
    	                              	<div class="iradio_flat-green checked" style="position: relative;">
                                            <input type="radio" class="flat" checked="" value="1" name="status" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"> </ins>
                                            </div> Checked
    	                            </label>
                         		</div>
                         		<div class="radio">
    	                            <label class="">
    	                              	<div class="iradio_flat-green checked" style="position: relative;"><input type="radio" value="0" class="flat" name="status" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Un Checked
    	                            </label>
                         		</div>
    						</div>
    					</div>
                         <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-ban"> Cancel</i></button>
                                    <button id="send" type="submit" class="btn btn-success"><i class="fa fa-save"> Save</i></button>
                                </div>
                            </div>
                    </form>
                @else
                    <form class="form-horizontal form-label-left" action="{{ route('add_category_lang') }}"  method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Tên Danh Mục <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input id="name_vi" class="form-control col-md-7 col-xs-12 input_slug_vi"  name="name_vi" placeholder="Tên Danh Mục...." type="text">
                                <p><small>* Tên Danh Mục Nên Viết Hoa Và Không Để Dấu (-) Giữa  Các Chữ ..(Ví Dụ : TÊN DANH MỤC)</small></p>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Link <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <input type="text"  name="slug_vi" class="form-control col-md-7 col-xs-12 output_slug_vi" placeholder="Link Danh mục ...">
                                <p><small>* Bạn Có Thể Thay Đổi Đường Dẫn Link, Không Viết Hoa, Nên Để Chữ Thường Và Ngăn Cách Nhau Bằng (-) (Ví Dụ : ten-danh-muc)</small></p>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" >Danh Mục  Chuyển Ngữ <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                 <select class="form-control" name="category_id">
                                    @foreach ($category_lang as $cat)
                                        <option value="{!! $cat->category_id !!}" > ==|| {{ $cat->name }}</option>
                                    @endforeach
                                 </select>
                                   <p><small>
                                           * Lựa chọn Danh Mục bạn muốn chuyển ngôn ngữ ....
                                       </small>
                                   </p>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Status <span class="required">*</span>
                            </label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="radio">
                                    <label class="">
                                        <div class="iradio_flat-green checked" style="position: relative;"><input type="radio" value="1" class="flat" checked="" name="status" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Sử Dụng
                                    </label>
                                </div>
                                <div class="radio">
                                    <label class="">
                                        <div class="iradio_flat-green checked" style="position: relative;"><input type="radio" value="0" class="flat"  name="status" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Không Sử Dụng
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-ban"> Cancel</i></button>
                                    <button id="send" type="submit" class="btn btn-success"><i class="fa fa-save"> Save</i></button>
                                </div>
                            </div>
                    </form>
                @endif
    			 </div>
            </div>
		</div>
	</div>
</div>
@endsection
