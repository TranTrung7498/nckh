@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Danh sách tài khoản</h4>
                                <a href="{{url('admin/account/add')}}" class="btn btn-primary pull-right">Thêm mới</a>
                                <p class="card-category">Danh sách tài khoản</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên đang nhập</th>
                                        <th>Quyền hạn</th>
                                        <th style="width: 150px"></th>
                                    </tr>
                                    <?php $i = 1 ?>
                                    @foreach($data as $dt)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$dt->username}}</td>
                                            <td>
                                                @if ($dt->permission == 1)
                                                    {{"Quản trị"}}
                                                @elseif ($dt->permission == 2)
                                                    {{"Giảng viên"}}
                                                @elseif ($dt->permission == 3)
                                                    {{"Giảng viên"}}
                                                @else
                                                    {{"Sinh viên"}}
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/account/delete/'.$dt->id) }}" class="btn btn-danger btn-sm"
                                                   data-tr="{{$dt->id}}"
                                                   data-placement="left" data-singleton="true">
                                                    Xóa
                                                </a>
                                                <a href="{{ url('admin/account/update/'.$dt->id) }}" class="btn btn-warning btn-sm"
                                                   data-tr="{{$dt->id}}"
                                                   data-placement="left" data-singleton="true">
                                                    Cập nhật
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
