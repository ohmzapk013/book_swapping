@extends('admin.layouts.admin_layout')

@section('title')
Manage City
@endsection

@section('css_extend')
@parent
<link href="{{ asset('css/city.css') }}" rel="stylesheet" type="text/css"/>
@endsection

@section('js_extend')
<script type="text/javascript" src="{{ asset('js/city.js') }}"></script>
@endsection

@section('content')
<div class="portlet-body">
    <div id="sample_1_wrapper" class="dataTables_wrapper no-footer">
        <div class="row" style="border-bottom: 1px solid #eee; padding-bottom:10px;">
            <h3>Manage City</h3><br>
            @if (session('success'))
                <div class="alert alert-success">
                    {!! session('success') !!}
                </div>
            @endif

            @if (count($errors))
              <div class="alert alert-danger">
                <strong>Whoops!</strong> <span class="text-danger">{{ $errors->first('name') }}</span>
              </div>
            @endif
            <div class="col-md-12 col-sm-6">
                <a class="btn btn-info" id="add_city"><i class="fa fa-plus" aria-hidden="true"></i> Add City</a>
                <form method="POST" action="{{route('add_city')}}" style="display: none">
                    {{ csrf_field() }}
                    <input type="text" name="name">
                    <button type="submit" class="btn btn-info">
                        <i class="fa fa-check" aria-hidden="true"></i> OK
                    </button>
                </form>
            </div><br>
        </div>
        <div class="table-scrollable">
            <table class="table table-striped table-bordered table-hover table-checkable order-column dataTable no-footer" id="sample_1" role="grid" aria-describedby="sample_1_info">
                <thead>
                    <tr role="row">
                        <th>#</th>
                        <th style="width:160px;"> Name </th>
                        <th>
                            Destrict List
                        </th>
                        <th style="width:160px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cities as $index => $city)
                        <tr class="gradeX odd" role="row">
                            <td>{{++$index}}</td>
                            <td>
                                <form action="{{route('update_city', $city->id)}}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="text" name="city_name" value="{{$city->name}}" readonly="" class="input_like_label" id="{{ 'city' . $city->id}}">
                                </form>
                            </td>
                            <td>
                                <button data-id="{{$city->id}}" class="btn btn-info add_district">
                                    <i class="fa fa-plus"></i>
                                </button>
                                <form method="POST" action="{{route('add_district')}}" style="display: none">
                                    {{ csrf_field() }}
                                    <input type="text" name="name">
                                    <input type="hidden" name="city_id" value="{{$city->id}}">
                                    <button type="submit" class="btn btn-info add_district">
                                        <i class="fa fa-check" aria-hidden="true"></i>
                                    </button>
                                </form>
                                <div class="listAttributes" style="border: 0.1px solid #eee; padding:10px;">
                                    <?php $districts = $city->districts; ?>
                                    @foreach ($districts as $district)
                                        <form method="POST" action="{{route('update_district', $district->id)}}">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <li class="checkEmpty" style="margin-bottom:20px;">
                                                        <input type="text" name="name" value="{{$district->name}}" class="input_like_label" readonly="">
                                                        <input type="hidden" name="city_id" value="{{$city->id}}">
                                                    </li>
                                                </div>
                                                <div class="col-md-4" style="display: block;">
                                                    <a class="btn btn-sm btn-warning edit-attribute-value edit_district">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                    <a data-id="{{$district->id}}" data-toggle="modal" data-target="#delete_district" class="btn btn-sm btn-danger delete-attribute-value delete_district">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                </div>
                                                <div class="col-md-4" style="display: none;">
                                                    <button type="submit" class="btn btn-sm btn-info edit-attribute-value">
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    <a class="btn btn-sm btn-danger delete-attribute-value close_edit">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    @endforeach
                                </div>
                            </td>
                            <td>
                                <div class="action">
                                    <button class="btn btn-sm btn-warning btn-circle edit_city" data-id="{{$city->id}}">
                                        <i class="fa fa-pencil"></i> Edit
                                    </button>
                                    <button class="btn btn-sm btn-danger btn-circle delete_city" data-id="{{$city->id}}" data-toggle="modal" data-target="#delete_city"> 
                                    <i class="fa fa-trash-o"></i> Delete
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- show confirm delete City -->
<form class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="delete_city" action="" method="POST">
    {!! csrf_field() !!}
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="lbl_delete_category"></h4>
            <strong><font color="red">All District Of City will be delete</font></strong>
          </div>
          <div class="modal-footer" style="margin-top: 0px;">
            <button type="submit" class="btn btn-default" id="modal-btn-yes">Yes</button>
            <button type="button" class="btn btn-primary" id="modal-btn-no" data-dismiss="modal">No</button>
          </div>
        </div>
    </div>
</form>

<!-- show confirm delete Post -->
<form class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="delete_district" action="" method="POST">
    {!! csrf_field() !!}
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="lbl_delete_district"></h4>
          </div>
          <div class="modal-footer" style="margin-top: 0px;">
            <button type="submit" class="btn btn-default" id="modal-btn-yes">Yes</button>
            <button type="button" class="btn btn-primary" id="modal-btn-no" data-dismiss="modal">No</button>
          </div>
        </div>
    </div>
</form>
@endsection