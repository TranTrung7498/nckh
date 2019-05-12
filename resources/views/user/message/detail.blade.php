@extends('user.layout.index')
@section('body')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Nội dung thông báo</h4>
                            <p class="card-category">Nội dung chi tiết của thông báo</p>
                        </div>
                        <div class="card-body">
                            <div class="card border-primary mb-3">
                                <div class="card-header">Nội dung chi tiết</div>
                                <div class="card-body text-dark">
                                    <table>
                                        <thead></thead>
                                        <tbody>
                                        @foreach($data as $dt)
                                            <tr>
                                                <th style="width: 100px">Người gửi</th>
                                                <td>{{$dt->sender}}</td>
                                            </tr>
                                            <tr>
                                                <th>Ngày gửi</th>
                                                <td>{{$dt->date}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tiêu đề</th>
                                                <td style="height: 50px">{{$dt->description}}</td>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
