@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <h5>Bạn có muốn tiếp tục thêm sinh viên mới ?</h5>
                                <hr>
                                <div class="row">
                                    <div class="col-md-11">
                                        <a role="button" href="{{url('admin/group/addStudent')}}" class="btn btn-success pull-right">Tiếp tục</a>
                                    </div>
                                    <div class="col-md-1">
                                        <a role="button" href="{{url('admin/home')}}" class="btn btn-danger pull-right">Không</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
