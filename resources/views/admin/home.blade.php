@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="flex-fill">
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fa fa-book"></i>Tổng quan</h4>
                            Số lượng đề tài của các khoa
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-secondary">
                                        <i class="fa fa-terminal float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Khoa Công nghệ thông tin</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[0]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/1')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-primary">
                                        <i class="fa fa-cloud float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Khoa Khí tượng, Thủy văn</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[9]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/10')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-danger">
                                        <i class="fa fa-bank float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Khoa Kinh tế tài nguyên</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[5]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/6')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-warning">
                                        <i class="fa fa-graduation-cap float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Bộ môn Biến đổi khí hậu</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[11]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/12')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-danger">
                                        <i class="fa fa-bell-o float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Khoa Trắc địa bản đồ</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[4]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/5')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-warning">
                                        <i class="fa fa-tasks float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Khoa Địa chất</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[6]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/7')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-info">
                                        <i class="fa fa-tint float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Khoa Tài nguyên nước</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[1]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/2')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-success">
                                        <i class="fa fa-leaf float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Khoa Môi trường</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[2]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/3')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-primary">
                                        <i class="fa fa-ship float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Khoa học biển và Hải đảo</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[10]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/11')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-warning">
                                        <i class="fa fa-legal float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Khoa lý luận chính trị</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[7]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/8')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-danger">
                                        <i class="fa fa-superscript float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Khoa Khoa học đại cương</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[8]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/9')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-6 col-lg-6 col-xl-3">
                                    <div class="card-box noradius noborder bg-secondary">
                                        <i class="fa fa-map-o float-right text-white"></i>
                                        <h6 class="text-white text-uppercase m-b-20">Khoa Quản lý đất đai</h6>
                                        <h1 class="m-b-20 text-white counter">{{$sl[3]}}</h1>
                                        <span class="text-white">Đề tài</span>
                                        <a href="{{url('homeDetail/4')}}" class="pull-right text-white">Chi tiết...</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card-->
                </div>
            </div>
        </div>
    </div>
@stop