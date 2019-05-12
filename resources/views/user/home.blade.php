@extends('user.layout.index')
@section('body')
    <div class="content-page">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">directions_boat</i>
                    </div>
                    <p class="card-category">Khoa học biển và Hải đảo</p>
                    <h3 class="card-title">{{$sl[10]}}
                        <small><a href="{{url('homeDetailU/11')}}" class="text-info"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">filter_drama</i>
                    </div>
                    <p class="card-category">Khoa Khí tượng, Thủy văn </p>
                    <h3 class="card-title">{{$sl[9]}}
                        <small><a href="{{url('homeDetailU/10')}}" class="text-info"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">perm_media</i>
                    </div>
                    <p class="card-category">Khoa Quản lý đất đai </p>
                    <h3 class="card-title">{{$sl[3]}}
                        <small><a href="{{url('homeDetailU/4')}}" class="text-danger"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">map</i>
                    </div>
                    <p class="card-category">Khoa Trắc địa - Bản đồ </p>
                    <h3 class="card-title">{{$sl[4]}}
                        <small><a href="{{url('homeDetailU/5')}}" class="text-warning"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">monetization_on</i>
                    </div>
                    <p class="card-category">Khoa Kinh tế Tài nguyên</p>
                    <h3 class="card-title">{{$sl[5]}}
                        <small><a href="{{url('homeDetailU/6')}}" class="text-danger"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">gavel</i>
                    </div>
                    <p class="card-category">Khoa Lý luận chính trị </p>
                    <h3 class="card-title">{{$sl[7]}}
                        <small><a href="{{url('homeDetailU/8')}}" class="text-primary"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">local_drink</i>
                    </div>
                    <p class="card-category">Khoa Tài nguyên nước </p>
                    <h3 class="card-title">{{$sl[1]}}
                        <small><a href="{{url('homeDetailU/2')}}" class="text-info"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">code</i>
                    </div>
                    <p class="card-category">Khoa Công nghệ thông tin </p>
                    <h3 class="card-title">{{$sl[0]}}
                        <small><a href="{{url('homeDetailU/1')}}" class="text-primary"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">spa</i>
                    </div>
                    <p class="card-category">Khoa Môi trường</p>
                    <h3 class="card-title">{{$sl[2]}}
                        <small><a href="{{url('homeDetailU/3')}}" class="text-success"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-secondary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">gradient</i>
                    </div>
                    <p class="card-category">Khoa Địa chất</p>
                    <h3 class="card-title">{{$sl[6]}}
                        <small><a href="{{url('homeDetailU/7')}}" class="text-secondary"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">timeline</i>
                    </div>
                    <p class="card-category">Khoa Khoa học đại cương </p>
                    <h3 class="card-title">{{$sl[8]}}
                        <small><a href="{{url('homeDetailU/9')}}" class="text-success"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">import_contacts</i>
                    </div>
                    <p class="card-category">Bộ môn Biến đổi khí hậu </p>
                    <h3 class="card-title">{{$sl[11]}}
                        <small><a href="{{url('homeDetailU/12')}}" class="text-warning"> đề tài</a></small>
                    </h3>
                </div>
            </div>
        </div>
    </div>
    </div>
@stop