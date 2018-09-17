@extends('admin.index')
@section('content')
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3><i style="padding-right: 20px" class="fa fa-database"></i>ADD - NEW - PRODUCTS</h3>
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
        @if ( Session::get('website_language') == 'en')
            <form class="form-horizontal form-label-left" action="{{ route('Products.store') }}"  method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
        		<div class="col-md-9 col-sm-9 col-xs-12">
        			<div class="x_panel">
                        <div class="x_content">
            					<div class="item form-group">
            						<label class="control-label col-md-2 col-sm-2 col-xs-12" >{{ trans('config.name_pro') }} <span class="required">*</span>
            						</label>
            						<div class="col-md-10 col-sm-10 col-xs-12">
            							<input type="text" class="form-control col-md-7 col-xs-12 input_slug"   name="name" placeholder="Name product...." >
                                        <p><small>* The name should not contain a sign (-), the letters separated by a space .. (ex: NAME PRODUCT..)</small></p>
            						</div>
            					</div>
            					<div class="item form-group">
            						<label class="control-label col-md-2 col-sm-2 col-xs-12" >{{ trans('config.Slug') }} <span class="required">*</span>
            						</label>
            						<div class="col-md-10 col-sm-10 col-xs-12">
            							<input type="text"  name="slug" class="form-control col-md-7 col-xs-12 output_slug" placeholder="slug - product ...">
            							<p><small>* You can change the slug, the words are not capitalized and separated by dashes .. (ex: name-profucts ..)</small></p>
            						</div>
            					</div>
            					<div class="item form-group">
            						<label class="control-label col-md-2 col-sm-2 col-xs-12" >Category <span class="required">*</span>
            						</label>
            						<div class="col-md-10 col-sm-10 col-xs-12">
            	                         <select class="form-control" name="cat_id">
                                           @php
                                               cate_parent($cat_pro);
                                           @endphp
            	                         </select>
                                         <small>* Please select the appropriate category for the product...</small>
                                    </div>
            					</div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Options <span class="required">*</span>
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <ul id="list_add_pro">
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-6 col-sm-6 col-xs-12 add_pro">
                                                        <input type="text"  name="size[]" class="form-control" placeholder="Size - product ...">
                                                    </div>
                                                    <div class="col-md-6 col-sm-6 col-xs-12 add_pro">
                                                        <input type="text"  name="price[]" class="form-control " placeholder="Price- product ...">
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-danger del_pro_options" style="margin-bottom: 12px">
                                                            <i class="fa fa-trash" style=""></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" > <span class="required"></span>
                                    </label>
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <button type="button" class="btn btn-success add_products">add options</button>
                                        </div>
                                </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Sale - Product <span class="required">*</span>
                                    </label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <input type="numbers"  name="sale" class="form-control col-md-7 col-xs-12 " placeholder="sale - product ...">
                                        <p><small>* Sale Product...(note : the number and the sale price is the price you have deducted     % )</small></p>
                                    </div>
                                </div>
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
        				            <label class="control-label col-md-2 col-sm-2 col-xs-12" >Product-Image <span class="required">*</span></label>
        			                <div class="col-md-4 col-sm-4 col-xs-12" >
        		                 		<a   style="height: 100%"  href="javascript:open_popup('{!!url('')!!}/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID')" class="thumbnail">
        		                 			<img class="imagePreview" src="assets/upload/config/no-image.png" alt="">
        		                 		</a>
        			                </div>
        			                <div class="clearfix"></div>
        			                <label class="control-label col-md-2 col-sm-2 col-xs-12"></label>
        			                <div class="col-md-9 col-sm-9 col-xs-12">
        			                  	<input id="fieldID" type="hidden" value="" name="images" />
        			                  	<a href="javascript:open_popup('{!!url('')!!}/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID')">
        			                     <button style="margin-bottom: 10px" type="button" class="btn btn-success">Choose IMG</button>
        			                  	</a>
        			                </div>
        			            </div>
                                <div class="form-group" id="img_product">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Products-Image-involve <span class="required">*</span></label>
                                    <div class="col-md-9 col-sm-9 col-xs-6">
                                        <ul id="list_add_img_pro">
                                              @for ($i = 1; $i <= 3 ; $i++)
                                                <li>
                                                <div class="col-md-2 col-sm-2 col-xs-3" >
                                                    <a   style="height: 100%"  href="javascript:open_popup('{!!url('')!!}/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID_img{{ $i }}')" class="thumbnail">
                                                        <img class="imagePreview_img{{ $i }}" src="assets/upload/config/no-image.png" alt="">
                                                    </a>
                                                    <small>* images details</small>
                                                    <input id="fieldID_img{{ $i }}" type="hidden" value="" name="images_detail[]" />
                                                    <a href="javascript:open_popup('{!!url('')!!}/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID_img{{ $i }}')">
                                                        <button style="margin-bottom: 10px" type="button" class="btn btn-success">Choose IMG</button>
                                                    </a>
                                                </div>
                                            </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >{{ trans('config.info_products') }}<span class="required">*</span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <textarea class="form-control article-ckeditor" name="info" rows="4" placeholder="Miêu tả sản phẩm">
                                            <div style="width:80%">
                                                <h3>* Info Products</h3>
                                                <table border="" cellpadding="0" cellspacing="0" style="width:350px">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:100px" class="disabled"> <strong>Brand :</strong> </td>
                                                            <td style="width:250px">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:100px" class="disabled"> <strong>Stored : </strong></td>
                                                            <td style="width:250px">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:100px" class="disabled"> <strong>VAT :</strong> </td>
                                                            <td style="width:250px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </textarea>
                                        <small>* fill out basic information about the product...</small>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >{{ trans('config.info_sale_products') }}<span class="required">*</span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <textarea class="form-control article-ckeditor" name="info_sale_product" rows="7" placeholder="Miêu tả sản phẩm">
                                        </textarea>
                                        <small>* Fill out the product highlights....</small>
                                    </div>
                                </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >{{ trans('config.Descriptions') }}  <span class="required">*</span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                        <textarea class="form-control article-ckeditor" name="description" rows="7" placeholder="Miêu tả sản phẩm">
                                        </textarea>
                                        <small>* fill in details of the product...</small>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >Locations <span class="required">*</span></label>
                                    <div class="col-md-10 col-sm-10 col-xs-12">
                                          <div class="radio">
                                            <label class="">
                                                <div class="iradio_flat-green checked" style="position: relative;"><input type="radio" checked="" value="2" class="flat" name="location" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> LATEST
                                        </div>
                                        <div class="radio">
                                            <label class="">
                                                <div class="iradio_flat-green checked" style="position: relative;"><input type="radio" value="2" class="flat" name="location" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> TOP RATING
                                        </div>
                                        <div class="radio">
                                            <label class="">
                                                <div class="iradio_flat-green checked" style="position: relative;"><input type="radio" value="3" class="flat" name="location" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>  FAVOURITE
                                            </label>
                                        </div>
                                    </div>
                                </div>
            			 </div>
                    </div>
        		</div>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >Post <span class="required">*</span></label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    <div class="checkbox">
                                        <label class="">
                                          <div class="icheckbox_flat-green" style="position: relative;"><input value="1" type="checkbox" name="post[]" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Checked
                                        </label>
                                      </div>
                                       <div class="checkbox">
                                        <label class="">
                                          <div class="icheckbox_flat-green" style="position: relative;"><input value="2" type="checkbox" name="post[]" class="flat"  style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Checked
                                        </label>
                                      </div>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" >{{ trans('config.Status') }} <span class="required">*</span>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
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
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-ban"> Cancel</i></button>
                            <button id="send" type="submit" class="btn btn-success"><i class="fa fa-save"> Save</i></button>
                        </div>
                    </div>
            </form>
        @else
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                    <form class="form-horizontal form-label-left" action=""  method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" >{{ trans('config.name_pro') }} <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" class="form-control col-md-7 col-xs-12 input_slug"   name="name_vi" placeholder="Tên Sản Phẩm...." >
                                    <p><small>* Tên không nên chứa một ký tự (-), the letters separated by a space .. (ex: TÊN SẢN PHÂM ..)</small></p>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" >{{ trans('config.Slug') }} <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12">
                                    <input type="text"  name="slug_vi" class="form-control col-md-7 col-xs-12 output_slug" placeholder="Tiêu Đề ...">
                                    <p><small>* Bạn có thể thay đổi một slug, không để dấu và các chữ cách nhau bằng dấu (-) . (ex: tên-sản-phẩm ..)</small></p>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" >Sản Phẩm Chuyển Ngữ <span class="required">*</span>
                                </label>
                                <div class="col-md-8 col-sm-8 col-xs-12 typeahead">
                                    <ul id="add_list_products">
                                        <li>
                                          <input style="margin-bottom: 15px" value="" type="name" class="form-control search-input" id="name" placeholder="Search for...">
                                          <i style="position: absolute; top: 10px; right: 20px;" class="fa fa-search"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-2 col-sm-2 col-xs-12" >{{ trans('config.info_products') }}<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea class="form-control article-ckeditor" name="info_vi" rows="4" placeholder="Miêu tả sản phẩm">
                                            <div style="width:80%">
                                                <h3>* Thông Tin Sản Phẩm</h3>
                                                <table border="" cellpadding="0" cellspacing="0" style="width:350px">
                                                    <tbody>
                                                        <tr>
                                                            <td style="width:150px" class="disabled"> <strong>THƯƠNG HIÊỤ :</strong> </td>
                                                            <td style="width:250px">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:100px" class="disabled"> <strong>TÌNH TRẠNG : </strong></td>
                                                            <td style="width:250px">&nbsp;</td>
                                                        </tr>
                                                        <tr>
                                                            <td style="width:100px" class="disabled"> <strong>VAT :</strong> </td>
                                                            <td style="width:250px">&nbsp;</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </textarea>
                                        <small>* điền thông tin cơ bản về sản phẩm ...</small>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >{{ trans('config.info_sale_products') }}<span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea class="form-control article-ckeditor" name="info_sale_product_vi" rows="7" placeholder="Miêu tả sản phẩm">
                                        </textarea>
                                        <small>* Điền vào các chương trình nổi bật của sản phẩm ....</small>
                                    </div>
                                </div>
                                 <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" >{{ trans('config.Descriptions') }} <span class="required">*</span></label>
                                    <div class="col-md-8 col-sm-8 col-xs-12">
                                        <textarea class="form-control article-ckeditor" name="description_vi" rows="7" placeholder="Miêu tả sản phẩm">
                                        </textarea>
                                        <small>* điền vào các chi tiết của sản phẩm ...</small>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="email">{{ trans('config.Status') }} <span class="required">*</span>
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
                            </div>
                         </div>
                        <div class="ln_solid"></div>
                            <div class="form-group">
                                <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: right">
                                    <button id="send" type="submit" class="btn btn-success"><i class="fa fa-save"> Save</i></button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-ban"> Cancel</i></button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            </div>
        @endif
	</div>
</div>
@endsection
@push('search')
    <script type="text/javascript">
        jQuery.fn.outerHTML = function(s) {
    return s
        ? this.before(s).remove()
        : jQuery("<p>").append(this.eq(0).clone()).html();
};
        $(document).ready(function($) {
            var engine1 = new Bloodhound({
                remote: {
                    url: '/api/admin/products?value=%QUERY%',
                    wildcard: '%QUERY%'
                },
                limit: 10,
                datumTokenizer: Bloodhound.tokenizers.whitespace('value'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });
            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1,
            },
            [
                {
                    source: engine1.ttAdapter(),
                    name: 'services-name',
                    display: function(data) {
                        return data.name;
                    },
                    templates: {
                        empty: [
                            '<div class="header-title"><h2>Danh sách tìm kiếm</h2></div><div class="list-group search-results-dropdown"><div class="list-group-item">Không tìm thấy..?</div></div>'
                        ],
                        header: [
                            '<div class="header-title"><h2>Search List Products</h2></div><div class="list-group search-results-dropdown"></div>'
                        ],
                        suggestion: function (data) {

                            return '<a id="services-list" data-id='+ data.id + ' onclick="return clickServicesList(this);" class="list-group-item"><div class="row"><div class="col-md-1 col-sm-1 col-xs-1"><img style="width: 50px; height: auto; overflow: hidden; border-right: 1px solid #dcdcdc" src="assets/upload/products/'+data.images+'" alt=""></div><div class="col-md-11 col-sm-11 col-xs-11"><p>'+data.name+'</p></div></div><input type="hidden" name="products_id" value="'+data.id+'" /></a>';
                        }
                    }
                },
            ]);
        });
         function clickServicesList(element) {
            var html = $(element).outerHTML();
            $("#add_list_products>li").append(html);
            return false;
        }

        function getIdList() {
            var ids = [];
            $("#add_list_products>li>.list-group-item").each(function() {
                ids.push($(this).data('id'));
            });
            return ids;
        }

        $(document).ready(function() {
            $('.myform').submit(function(event) {
                $('input[name="services_hot"]').val(getIdList());
            });
            return false;
        });
    </script>
@endpush
