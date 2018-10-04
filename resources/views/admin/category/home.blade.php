@extends('admin.index')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3><i style="padding-right: 20px" class="fa fa-sort-amount-desc"></i></i>LIST - CATEGORY</h3>
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
                        <img id="vi" src="assets/upload/config/vn.png" alt=""> Việt Nam
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
<div class="clearfix clearfix_top"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('admin.message')
            <div class="table-responsive">
                <div class="col-md-6 col-sm-6 col-xs-6 title_create_left">
                    <h5 class="box-title">
                      <i class="fa fa-sort-alpha-asc"></i>
                        All categories
                    </h5>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 title_create_right">
                    <a  href="{{ route('Category.create') }}" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Create - New</a>
                </div>
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                        <tr class="headings">
                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>
                            <th>STT </th>
                            <th class="column-title" style="display: table-cell;">{{ trans('config.Category_name') }} </th>
                            <th class="column-title" style="display: table-cell;">{{ trans('config.Slug') }}</th>
                            <th class="column-title" style="display: table-cell;">{{  trans('config.Created_at') }} </th>
                            <th class="column-title" style="display: table-cell;">{{ trans('config.Status') }}</th>
                            <th class="column-title" style="display: table-cell;">{{ trans('config.Action') }} </th>
                            <th class="bulk-actions" colspan="7" style="display: none;">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt">1 Records Selected</span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody  id="cat_list">
                        @foreach ($categories as $cat)
                            <tr  class="even pointer" style="background: #3cc" >
                                <td class="a-center ">
                                    <div class="icheckbox_flat-green hover active" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                </td>
                                <td class="a-center "><i class="fa fa-check-circle" style="color: green"></i> </td>
                                <td class=" "><b>==|| {{ $cat->name}}</b></td>
                                <td class=" ">{{ $cat->slug }}</td>
                                <td class=" ">{{ $cat->created_at }}</td>
                                <td class="status" >
                                    @if ($cat->status == 1)
                                         <button class="btn btn-xs btn-success ">current</button>
                                    @else
                                         <button class="btn btn-xs btn-warning">hidden</button>
                                    @endif
                                </td>
                                <td>
                                    <a href=" {{ route('Category.edit',$cat->id) }} " class="btn btn-xs btn-primary" title="edit - category">
                                        <i class="glyphicon glyphicon-edit"></i>
                                        Edit
                                    </a>
                                    @if ($cat->status == 1)
                                        <a href_page="{!! route('del_category',$cat->id) !!}" id="{{ $cat->id }}" class="btn btn-xs btn-warning del_item"  title="delete category" >
                                            <i class="fa fa-eye-slash" style="padding: 3px"></i>
                                        </a>
                                    @else
                                        <a href_page="{!! route('show_sub_category',$cat->id) !!}" id="{{ $cat->id }}"  class="btn btn-xs btn-success show_item" title="Show item category"  >
                                            <i class="fa fa-eye"  style="padding: 3px"></i>
                                        </a>
                                    @endif
                                </td>
                             </tr>
                            @php
                            $sub_category = DB::table('category')->select(DB::raw('category.*,categoryTranslation.name as name,categoryTranslation.slug as slug,categoryTranslation.locale as locale'))->join('categoryTranslation', 'category.id', '=', 'categoryTranslation.category_id')->where('category.parent_id',$cat->id)->where('categoryTranslation.locale',Session::get('website_language', config('app.locale')))->get();
                            @endphp
                                @foreach ($sub_category as $sub_cat)
                                    <tr class="even pointer" >
                                        <td class="a-center ">
                                            <div class="icheckbox_flat-green hover active" style="position: relative;"><input type="checkbox" class="flat" name="table_records" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div>
                                        </td>
                                        <td class="a-center "><i class="fa fa-check-circle" style="color: green"></i> </td>
                                        <td class=" ">==|| ==|| {{ $sub_cat->name}}</td>
                                        <td class=" ">{{ $sub_cat->slug }}</td>
                                        <td class=" ">{{ $sub_cat->created_at }}</td>
                                        <td class="status">
                                             @if ($sub_cat->status == 1)
                                                 <button class="btn btn-xs btn-success ">current</button>
                                            @else
                                                 <button class="btn btn-xs btn-warning">hidden</button>
                                            @endif
                                        </td>
                                        <td class="">
                                            <a href="  {{ route('Category.edit',$sub_cat->id) }} " class="btn btn-xs btn-primary" title="edit - category">
                                                <i class="glyphicon glyphicon-edit"></i>
                                                Edit
                                            </a>
                                            @if ($sub_cat->status == 1)
                                                <a href_page="{!! route('del_sub_category',$sub_cat->id) !!}" id="{{ $sub_cat->id }}" class="btn btn-xs btn-warning del_item" title="delete category" >
                                                    <i class="fa fa-eye-slash" style="padding: 3px"></i>
                                                </a>
                                            @else
                                                <a href_page="{!! route('show_sub_category',$sub_cat->id) !!}"  id="{{ $sub_cat->id }}"  class="btn btn-xs btn-success show_item" title="Show item category"  >
                                                    <i class="fa fa-eye"  style="padding: 3px"></i>
                                                </a>
                                            @endif
                                                <form action="{{ route('Category.destroy',$sub_cat->id) }}" method="POST" class="del_sub_item" enctype="multipart/form-data">
                                                {{method_field('delete')}}
                                                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                                                    <button type="submit" class="btn btn-xs btn-danger" onclick="return del_pro('You really want to delete this category')">
                                                        <i class="fa fa-trash" style="padding: 3px"></i>
                                                    </button>
                                                </form>
                                        </td>
                                    </tr>
                                @endforeach
                        @endforeach
                        <tr style="text-align: right">
                            <td colspan="7" rowspan="" headers="">   {{ $categories->links() }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

