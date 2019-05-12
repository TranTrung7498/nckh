@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Cập nhật biểu mẫu</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/form/postUpdate')}}" enctype="multipart/form-data" method="post" role="form">
                                    {{ csrf_field() }}
                                    @foreach($data as $dt)
                                        <input type="hidden" name="id" value="{{$dt->id}}">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Title">Tiêu đề</label>
                                                <input type="text" name="title" class="form-control" id="Title" value="{{$dt->title}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Description">Mô tả</label>
                                                <textarea name="description" id="Description" rows="5" class="form-control">{{$dt->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Form">Upload biểu mẫu</label>
                                                <input type="file" name="form" id="Form" class="form-control">
                                                <small>Nếu không cập nhật file biểu mẫu hãy giữ nguyên trường này !</small>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <button type="submit" class="btn btn-primary pull-right">Cập nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop