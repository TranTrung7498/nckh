@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Danh sách biểu mẫu</h4>
                                <a href="{{url('admin/form/new')}}" class="btn btn-primary pull-right">Thêm mới</a>
                                <p class="card-category">Các biểu mẫu liên quan</p>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tiêu đề</th>
                                        <th>Mô tả</th>
                                        <th>Tên file</th>
                                        <th style="width: 110px">Tải xuống</th>
                                        <th style="width: 100px">Cập nhật</th>
                                        <th style="width: 30px">Xóa</th>
                                    </tr>
                                    <?php $i = 1 ?>
                                    @foreach($data as $dt)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$dt->title}}</td>
                                            <td>{{$dt->description}}</td>
                                            <td>{{$dt->fileName}}</td>
                                            <td>
                                                <a href="{{ url('admin/form/download/'.$dt->id) }}" class="btn btn-primary btn-sm"
                                                   data-tr="{{$dt->id}}"
                                                   data-placement="left" data-singleton="true">
                                                    Tải xuống
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/form/update/'.$dt->id) }}" class="btn btn-warning btn-sm"
                                                   data-tr="{{$dt->id}}"
                                                   data-placement="left" data-singleton="true">
                                                    Cập nhật
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/form/delete/'.$dt->id) }}" class="btn btn-danger btn-sm"
                                                   data-tr="{{$dt->id}}"
                                                   data-placement="left" data-singleton="true">
                                                    Xóa
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
