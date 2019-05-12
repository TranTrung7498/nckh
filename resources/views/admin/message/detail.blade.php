@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Nội dung thông báo</h4>
                                <p class="card-category">Chi tiết thông báo</p>
                            </div>
                            <div class="card-body">
                                <div class="card border-primary mb-3">
                                    <div class="card-header">Thông tin chi tiết</div>
                                    <div class="card-body text-primary">
                                        <table>
                                            <thead></thead>
                                            <tbody>
                                            @foreach($data as $dt)
                                                <tr>
                                                    <th style="width: 350px">Người gửi</th>
                                                    <td>{{$dt->sender}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Ngày gửi</th>
                                                    <td>{{$dt->date}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tiêu đề</th>
                                                    <td>{{$dt->description}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nội dung</th>
                                                    <td>{{$dt->content}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!--End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop