@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Kiểm tra trùng lặp</h4>
                                <p class="card-category">Kiểm tra đề tài nghiên cứu khoa học bị trùng lặp ý tưởng</p>
                            </div>
                            <div class="card-body">
                                <form class="navbar-form" role="form" method="post" action="{{url('admin/tested/post')}}">
                                    {{ csrf_field() }}
                                    <div class="input-group no-border">
                                        <input type="text" value="" name="inputText" class="form-control" placeholder="Nhập tên đề tài cần kiểm tra trùng lặp....">
                                        <button type="submit" class="btn btn-primary btn-just-icon" style="margin-left: 5px">KIỂM TRA</button>
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