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
// Phan Products
$(document).ready(function() {
    window.lastURL = $('#fieldID_img').val();
        setInterval(function () {
            if($('#fieldID_img').val() != window.lastURL) {
                var url =  $('#fieldID_img').val();
                if(url == '')url = "assets/upload/config/no-image.png";
                 $('.imagePreview_img').attr('src', url);
                 window.lastURL = url;
             };
         });
    window.lastURL = $('#fieldID_img1').val();
        setInterval(function () {
            if($('#fieldID_img1').val() != window.lastURL) {
                var url =  $('#fieldID_img1').val();
                if(url == '')url = "assets/upload/config/no-image.png";
                 $('.imagePreview_img1').attr('src', url);
                 window.lastURL = url;
             };
         });
    window.lastURL = $('#fieldID_img2').val();
        setInterval(function () {
            if($('#fieldID_img2').val() != window.lastURL) {
                var url =  $('#fieldID_img2').val();
                if(url == '')url = "assets/upload/config/no-image.png";
                 $('.imagePreview_img2').attr('src', url);
                 window.lastURL = url;
             };
         });
    window.lastURL = $('#fieldID_img3').val();
        setInterval(function () {
            if($('#fieldID_img3').val() != window.lastURL) {
                var url =  $('#fieldID_img3').val();
                if(url == '')url = "assets/upload/config/no-image.png";
                 $('.imagePreview_img3').attr('src', url);
                 window.lastURL = url;
             };
         });
});

// Section Img-color
$(document).ready(function() {
     window.lastURL = $('#fieldID_img_color').val();
        setInterval(function () {
            if($('#fieldID_img_color').val() != window.lastURL) {
                var url =  $('#fieldID_img_color').val();
                if(url == '')url = "assets/upload/config/no-image.png";
                 $('.Preview_img_color').attr('src', url);
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

     $('#list_add_pro').on('click', '.del_pro_options', function() {
         if (!confirm('Bạn chắc chắn muốn xóa')) {
             return false;
         }else{
            $(this).closest('li').remove();
         }
     });
});

// Phan add Products - img - color - options
$(document).ready(function() {
    var count = 1;
     $('.add_products_color').click(function() {
          count += 1;
        var url = "javascript:open_popup('http://localhost/assets/filemanager/dialog.php?type=1&popup=1&field_id=fieldID_img_color"+count +"')";
          var html ='<li>';
                html  +='<div class="col-md-2 col-sm-2 col-xs-3" >';
                html  +='<a style="height: 100%; margin-bottom: 0px;"  href="'+url+'" class="thumbnail"><img class="Preview_img_color'+count +'" src="assets/upload/config/no-image.png" alt=""> </a><small>* images color product</small> <input id="fieldID_img_color'+count +'" type="hidden" value="" name="color[]" /><a href="'+url+'">';
                html  +='<button style="margin-bottom: 10px" type="button" class="btn btn-sm btn-success">Choose IMG</button> </a><button style="float: right" type="button" class="btn btn-sm btn-danger del_pro_img"><i class="fa fa-trash" style=""></i></button>';
                html  +='</div>';
                html  +='</li>';
          $('#list_img_pro_color').append(html);

        window.lastURL = $('#fieldID_img_color'+count+'').val();
        setInterval(function () {
            if($('#fieldID_img_color'+count+'').val() != window.lastURL) {
                var url =  $('#fieldID_img_color'+count+'').val();
                if(url == '')url = "assets/upload/config/no-image.png";
                 $('.Preview_img_color'+count+'').attr('src', url);
                 window.lastURL = url;
             };
         });
     });
     $('#list_img_pro_color').on('click', '.del_pro_img', function() {
         if (!confirm('Bạn chắc chắn muốn xóa')) {
             return false;
         }else{
            $(this).closest('li').remove();
         }
     });
});



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



