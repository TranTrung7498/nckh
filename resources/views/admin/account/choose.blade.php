@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Quản lý tài khoản</h4>
                                <p class="card-category">Quản lý các tài khoản</p>
                            </div>
                            <div class="card-body">
                                <form class="navbar-form" role="form" method="post" action="{{url('admin/account/postChoose')}}">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <p>Chon loại tài khoản</p>
                                        <select name="choose" id="Choose" class="form-control">
                                            <option value="0">Tất cả</option>
                                            <option value="1">Cán bộ phòng KHCN</option>
                                            <option value="2">Cán bộ Khoa</option>
                                            <option value="3">Giảng viên</option>
                                            <option value="4">Sinh viên</option>
                                        </select>
                                        <br>
                                        <hr>
                                        <button type="submit" class="btn btn-primary pull-right">Chọn</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop