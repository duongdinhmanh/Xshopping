@if (Session::has('info_add'))
  <div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Title!</strong> {{Session::get('info_add')}}
  </div>
@endif
@if (Session::has('info_edit'))
  <div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Title!</strong> {{Session::get('info_edit')}}
  </div>
@endif
@if (Session::has('show'))
  <div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <strong>Title!</strong> {{Session::get('show')}}
  </div>
@endif
@if (Session::has('info_del'))
  <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true" onclick="">&times;</button>
    <strong>Title!</strong> {{Session::get('info_del')}}
  </div>
@endif
