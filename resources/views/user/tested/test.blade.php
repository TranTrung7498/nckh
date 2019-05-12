@extends('user.layout.index')
@section('body')
    <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Kiểm tra trùng lặp</h4>
                                <p class="card-category">Kiểm tra đề tài nghiên cứu khoa học bị trùng lặp ý tưởng</p>
                            </div>
                            <div class="card-body">
                                <form class="navbar-form" role="form" method="post" action="{{url('user/tested/post')}}">
                                    {{ csrf_field() }}
                                    <div class="input-group no-border">
                                        <input type="text" value="" name="inputText" class="form-control" placeholder="Nhập tên đề tài cần kiểm tra trùng lặp...">
                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                            <i class="fa fa-check"></i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop