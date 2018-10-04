<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  {{--   <meta property="fb:app_id" content="408850159583877"/>
    <meta property="fb:admins" content="100015475292155"/> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
	  <link rel="icon" href="images/favicon.ico" type="image/ico" />
    <title>Xshopping! | Thời Trang 4 Mùa</title>
    <base href="{{asset('')}}">
    <link href="assets/vendors_style/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="assets/vendors_style/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="assets/vendors_style/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/vendors_style/iCheck/skins/flat/green.css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="assets/vendors_style/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="assets/vendors_style/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="assets/vendors_style/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <link href="assets/vendors_style/ion.rangeSlider/css/ion.rangeSlider.css" rel="stylesheet">
    <link href="assets/vendors_style/ion.rangeSlider/css/ion.rangeSlider.skinFlat.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="assets/build/css/custom.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="assets/admin/css/admin.css">
    {{-- <script>CKEDITOR.dtd.$removeEmpty['span'] = false;</script> --}}

  </head>
  <body class="nav-md">
    {{-- <script>
  window.fbAsyncInit = function() {
    FB.init({
              appId            : '408850159583877',
              autoLogAppEvents : true,
              xfbml            : true,
              version          : 'v3.1'
        });
      };
      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "https://connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));
</script> --}}
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          @include('admin.nav_left')
        </div>
        <!-- top navigation -->
        <div class="top_nav">
          @include('admin.nav_top')
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- CONTENT -->
            @yield('content')
          <!-- CONTENT -->

        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="assets/vendors_style/jquery/dist/jquery.min.js"></script>
    <!-- TypeHead js -->
    <script src="assets/admin/js/typeahead.bundle.min.js"></script>
    <script src="assets/admin/js/bloodhound.min.js"></script>
    <!-- Bootstrap -->
    <script src="assets/vendors_style/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <!-- FastClick -->
    <script src="assets/vendors_style/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="assets/vendors_style/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="assets/vendors_style/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="assets/vendors_style/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="assets/vendors_style/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/vendors_style/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="assets/vendors_style/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="assets/vendors_style/Flot/jquery.flot.js"></script>
    <script src="assets/vendors_style/Flot/jquery.flot.pie.js"></script>
    <script src="assets/vendors_style/Flot/jquery.flot.time.js"></script>
    <script src="assets/vendors_style/Flot/jquery.flot.stack.js"></script>
    <script src="assets/vendors_style/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="assets/vendors_style/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="assets/vendors_style/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="assets/vendors_style/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="assets/vendors_style/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="assets/vendors_style/jqvmap/dist/jquery.vmap.js"></script>
    <script src="assets/vendors_style/jqvmap/dist/maps/jquery.vmap.world.js"></script>
     <!-- Ion.RangeSlider -->
    <script src="assets/vendors_style/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
    <script src="assets/vendors_style/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="assets/vendors_style/moment/min/moment.min.js"></script>
    <script src="assets/vendors_style/bootstrap-daterangepicker/daterangepicker.js"></script>

    <script language="javascript" src="ckeditor/ckeditor.js" type="text/javascript"></script>

    <!-- Custom Theme Scripts -->
    <script src="assets/build/js/custom.min.js"></script>
    <script type="text/javascript">
        function del_pro(smg){
          // var confirm1 = confirm('Are you Sure : You are delete this..?');
            if (window.confirm(smg)) {
                return true;
            } else {
                return false;
            }
        }
    </script>
     <script>
        jQuery(".article-ckeditor").each(function() {
            CKEDITOR.replace(this,{
                language:'en-gb',
                filebrowserImageUploadUrl : '{!!url('')!!}/assets/upload?type=Images&_token=',
                filebrowserBrowseUrl : '{!!url('')!!}/assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                filebrowserUploadUrl : '{!!url('')!!}/assets/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
                filebrowserImageBrowseUrl : '{!!url('')!!}/assets/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
            });
        });
         CKEDITOR.config.contentsCss = '{!!url('')!!}/ckeditor/plugins/fontawesome/font-awesome/css/font-awesome.min.css';
          function myFunction() {
            document.getElementById("myForm").reset();
        }
    </script>

	{{-- ben list_order  --}}
    @stack('scripts_products')
    {{-- add - products --}}
    @stack('search')
    <script src="assets/admin/js/admin.js"></script>
    <script src="assets/admin/js/ajax.js"></script>
  </body>
</html>
