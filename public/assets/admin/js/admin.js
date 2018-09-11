$(document).ready(function() {
	$('div.alert').delay(2000).slideUp();
});

$(document).ready(function() {
     window.lastURL = $('#fieldID').val();
     setInterval(function () {
         if($('#fieldID').val() != window.lastURL) {
             var url = $('#fieldID').val();
             if(url == '')url = "assets/upload/config/no-image.png";
             $('.imagePreview').attr('src', url);
             window.lastURL = url;
         };
     });
});

$(document).ready(function() {
	$(function () {
	    $(".input_slug").keyup(function () {
	        var text = $(this).val();
            text = text.toLowerCase();
	        var text_create;
	       text_create = text.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a").replace(/\ /g, '-').replace(/đ/g, "d").replace(/đ/g, "d").replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y").replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u").replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ.+/g,"o").replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ.+/g, "e").replace(/ì|í|ị|ỉ|ĩ/g,"i");
            var content = text_create.replace(' ', '-');
	        $('.output_slug').val(content);
	    }).keyup();
	});
});
$(document).ready(function() {
	$(function () {
	    $(".input_slug_vi").keyup(function () {
	        var text = $(this).val();
            text = text.toLowerCase();
	        var text_create;
	       text_create = text.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a").replace(/\ /g, '-').replace(/đ/g, "d").replace(/đ/g, "d").replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y").replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u").replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ.+/g,"o").replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ.+/g, "e").replace(/ì|í|ị|ỉ|ĩ/g,"i");
            var content = text_create.replace(' ', '-');
	        $('.output_slug_vi').val(content.toLowerCase());
	    }).keyup();
	});
});

// Phan add Products - options
$(document).ready(function() {
     $('.add_products').click(function() {
          var html = $('#list_add_pro li').html();
          $('#list_add_pro').append('<li>'+html+'</li>');
     });

     $('#list_add_pro').on('click', '.add_list_address', function() {
         if (!confirm('Bạn chắc chắn muốn xóa')) {
             return false;
         }else{
            $(this).closest('li').remove();
         }
     });
});



// $(document).ready(function() {
// 	$('.input_slug').keyup(function(){
// 		var input = $(this).val();
// 		$('.output_slug').val(input);
// 	});

// 	$('.input_slug_vi').keyup(function(){
// 		var input = $(this).val();
// 		$('.output_slug_vi').val(input);
// 	})
// });
// $(document).ready(function() {
// 	window.lastURL = $('#fieldID').val();
// 	setInterval(function () {
// 		if($('#fieldID').val() != window.lastURL) {
// 			var url = $('#fieldID').val();
// 			if(url == '')url = "assets/upload/category/700x300.png";
// 			$('.imagePreview').attr('src', url);
// 			window.lastURL = url;
// 		};
// 	});
// });

// $(document).ready(function() {
// 	window.lastURL = $('#fieldID_logo').val();
// 	setInterval(function () {
// 		if($('#fieldID_logo').val() != window.lastURL) {
// 			var url = $('#fieldID_logo').val();
// 			if(url == '')url =  "assets/upload/logo/demo_logo.png";
// 			$('.imagePreview_logo').attr('src', url);
// 			window.lastURL = url;
// 		};
// 	});
// });

// $(document).ready(function() {
// 	window.lastURL = $('#fieldID_slide').val();
// 	setInterval(function () {
// 		if($('#fieldID_slide').val() != window.lastURL) {
// 			var url = $('#fieldID_slide').val();
// 			if(url == '')url =  "assets/upload/slide/slide_demo.png";
// 			$('.imagePreview_slide').attr('src', url);
// 			window.lastURL = url;
// 		};
// 	});
// });

// $(document).ready(function() {
// 	window.lastURL = $('#fieldID_post').val();
// 	setInterval(function () {
// 		if($('#fieldID_post').val() != window.lastURL) {
// 			var url = $('#fieldID_post').val();
// 			if(url == '')url =  "assets/upload/post/demo.png";
// 			$('.imagePreview_post').attr('src', url);
// 			window.lastURL = url;
// 		};
// 	});
// });
// $(document).ready(function() {
// 	window.lastURL = $('#fieldID_logo_web').val();
// 	setInterval(function () {
// 		if($('#fieldID_logo_web').val() != window.lastURL) {
// 			var url = $('#fieldID_logo_web').val();
// 			if(url == '')url =  "assets/upload/config/demo.png";
// 			$('.imagePreview_logo_web').attr('src', url);
// 			window.lastURL = url;
// 		};
// 	});
// });
// $(document).ready(function() {
// 	window.lastURL = $('#fieldID_favicon').val();
// 	setInterval(function () {
// 		if($('#fieldID_favicon').val() != window.lastURL) {
// 			var url = $('#fieldID_favicon').val();
// 			if(url == '')url =  "assets/upload/config/demo.png";
// 			$('.imagePreview_favicon').attr('src', url);
// 			window.lastURL = url;
// 		};
// 	});
// });
// $(document).ready(function() {
// 	window.lastURL = $('#fieldID_quang_cao').val();
// 	setInterval(function () {
// 		if($('#fieldID_quang_cao').val() != window.lastURL) {
// 			var url = $('#fieldID_quang_cao').val();
// 			if(url == '')url =  "assets/upload/config/demo.png";
// 			$('.imagePreview_quang_cao').attr('src', url);
// 			window.lastURL = url;
// 		};
// 	});
// });


// Phần config

// $(document).ready(function() {
// 	$('.add').click(function() {
// 		var html 	= '<li>';
// 			html 	+= '<div class="form-group"> <label class="control-label col-md-3 col-sm-3 col-xs-12">Thành Phố </label><div class="col-md-9 col-sm-9 col-xs-12"><input type="text" class="form-control" name="city_detail" placeholder="Nhập tên Thành Phố"></div></div> <div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12">Địa chỉ </label><div class="col-md-9 col-sm-9 col-xs-12"><input type="text" class="form-control" name="addess_detail" placeholder="Điạ chỉ cty..."></div></div><div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12">Hotline</label><div class="col-md-9 col-sm-9 col-xs-12"><input type="text" class="form-control" name="hotline_detail" placeholder="hotline..."></div></div>';
//             html    += '<div class="form-group"><label class="control-label col-md-3 col-sm-3 col-xs-12"> </label><div class="col-md-9 col-sm-9 col-xs-12"> <button style="float: right" type="button" class="btn btn-danger delete">Xóa</button></div></div> ';
//             html 	+= '</li>';

//         $('#add_list_address').append(html);
// 	});

// 	$('#add_list_address').on('click', '.delete', function() {
// 		if (!confirm('Bạn chắc chắn muốn xóa')) {
// 			return false;
// 		}else{
// 			$(this).closest('li').remove();
// 		}
// 	});

// 	$('#my_form').submit(function(){
// 		var _City = $('input[name = "city_detail"]');
// 		var value_key = '';
// 		for (var i = 0; i < _City.length ; i++) {
// 			value_key += ','+$(_City[i]).val();
// 		}
// 		var _address = $('input[name="addess_detail"]');
// 		var value_config = '';
// 		for (var i = 0; i < _address.length ; i++) {
// 			value_config += ','+$(_address[i]).val();
// 		}

// 		var hotline = $('input[name="hotline_detail"]');
// 		var value_hotline = '';
// 		for (var i = 0; i < hotline.length ; i++) {
// 			value_hotline += ','+$(hotline[i]).val();
// 		}

// 		$('input[name = "City"]').val(value_key);
// 		$('input[name = "hotline"]').val(value_hotline);
// 		$('input[name="address"]').val(value_config);
// 	})
// });

//************* ADD category ***********
$(document).ready(function() {
	$( "select" ).change(function () {
	    $( "select option:selected" ).each(function() {
	    	if ($( "select option:selected" ).val() != 0) {
	    		$("#none_cat").css('display', 'none');
	    	}
	    });
  	}).change();

  	$( "select" ).change(function () {
	    $( "select option:selected" ).each(function() {
	    	if ($( "select option:selected" ).val() == 0) {
	    		$("#none_cat").css('display', 'block');
	    	}
	    });
  	}).change();
});


