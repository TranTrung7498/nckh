@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Báo cáo tiến độ</h4>
                                <p class="card-category">Chi tiết báo cáo tiến độ</p>
                            </div>
                            <div class="card-body">
                                @foreach($data as $dt)
                                <div class="card border-primary mb-3">
                                    <div class="card-header">Thông tin chi tiết</div>
                                    <div class="card-body text-primary">
                                        <table>
                                            <thead></thead>
                                            <tbody>
                                                <tr>
                                                    <th style="width: 350px">Tên đề tài</th>
                                                    <td>{{$dt->name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nội dung chính của đề tài</th>
                                                    <td>{{$dt->mainContent}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kết quả dự kiến đạt được</th>
                                                    <td>{{$dt->result}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Khó khăn, vướng mắc gặp phải</th>
                                                    <td>{{$dt->difficulty}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phương hướng giải quyết</th>
                                                    <td>{{$dt->method}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Thời gian dự kiến hoàn thành</th>
                                                    <td>{{$dt->intendTime}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                                <!--End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop