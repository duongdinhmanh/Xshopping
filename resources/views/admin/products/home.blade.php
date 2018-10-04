@extends('admin.index')
@section('content')
<div class="">
	<div class="page-title">
		<div class="title_left">
			<h3>Products <small>List</small></h3>
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
                    <li><a href="{!! route('change_lang',['vi']) !!}">
                        <img id="vi"  src="assets/upload/config/vn.png" alt=""> Việt Nam
                    </a>
                    </li>
                    <li><a href="{!! route('change_lang',['en']) !!}">
                            <img src="assets/upload/config/en.png" alt="">
                            English
                        </a>
                    </li>
                </ul>
            </div>
		</div>
	</div>
	<div class="clearfix"></div>
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
              @include('admin.message')
			<table class="table table-hover display" id="users-table" style="width:100%">
				<thead>
					<tr>
						<th>ID</th>
						<th>{{ trans('config.images') }}</th>
						<th>{{ trans('config.name_pro') }}</th>
					{{-- 	<th>{{ trans('config.category') }}</th> --}}
						<th>{{ trans('config.location') }}</th>
                        <th>{{ trans('config.Created_at') }}</th>
						<th>{{ trans('config.Status') }}</th>
						<th>{{ trans('config.Action') }}</th>
					</tr>
				</thead>
				<tfoot class="data-table">
					<tr>
						<th></th>
						<th class="row_none"></th>
						{{-- <th></th> --}}
						<th></th>
						<th class="row_none"></th>
                        <th></th>
						<th class="row_none"></th>
						<th class="row_none"></th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
@endsection
@push('scripts_products')
<script>
  $(function() {
    $('#users-table').DataTable({
          "processing": true,
          "serverSide": true,
          "ajax": "{{ route('getdata_pro') }}",
         "columns": [
            { "data": 'id', "name": 'id' },
            { "data": 'images', "name": 'images',
                "render": function (data, type, full, meta) {
                 return "<img src=\"assets/upload/products/" + data + "\" height=\"auto\" \" width=\"50\"/>";
            },
            },
            { "data": 'name', "name": 'name' },
            // { "data": 'cat_id', "name": 'cat_id ' },
            { "data": 'location', "name": 'location',orderable: false, searchable: false},
            { "data": 'created_at', "name": 'created_at' },
            { "data": 'status', "name": 'status',
                "render": function (data) {
                    if (data == 0) {
                        return "<button class=\"btn btn-xs btn-warning\">no checked</button>";
                    }else{
                         return "<button class=\"btn btn-xs btn-success\">checked</button>";
                    }
                },
            },
            { "data": 'action', "name": 'action',
                "render":function(data,id){
                    return '<a href=\"  \" class=\"btn btn-xs btn-primary\" title=\"order_detail\" ><i class=\"glyphicon glyphicon-edit\"></i> '+@json(__('config.Edit')) +'</a><a href=\" \" class=\"btn btn-xs btn-danger\" title=\"delete order\"><i class=\"fa fa-trash\" style=\"padding: 3px\"></i></a>';
                },orderable: false, searchable: false},
          ],
          initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    });
                column.data().unique().sort().each( function ( d, j ) {
                    if(column.search() === '^'+d+'$'){
                        select.append( '<option value="'+d+'" selected="selected">'+d+'</option>' )
                    } else {
                        select.append( '<option value="'+d+'">'+d+'</option>' )
                    }
                } );
            } );
            $('.radio input[type="radio"]').on('click', function() {
                var $this = $(this);
                var locations_url = $(this).attr('locations');
                var val = $(this).val();
                if (del_pro('you really want to change locations..?')==true) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        type: 'GET',
                        url: locations_url+'/'+val ,
                        data: {
                        location: $(this).is(':checked') ? val : null
                        },
                        dataType: "JSON",
                        success: function(result){
                          if(result.flag == 'success') {
                            alert(result.message);
                            $this.closest('tr').find('.radio input[type="radio"]').removeAttr('checked');
                            $this.prop('checked', true);
                          }
                      },
                      error: function(err){
                          console.log(err);
                        }
                    })
                }
            });
        }
    });

});
</script>
@endpush
