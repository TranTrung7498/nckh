@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Cập nhật giảng viên</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/secondary/postUpdateTC')}}" method="post" role="form">
                                    {{ csrf_field() }}
                                    <hr>
                                    <input type="hidden" name="id" value="{{$id}}">
                                    @foreach($data as $dt)
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('teacherName') ? ' has-error' : '' }}">
                                                <label for="teacherName">Tên giảng viên</label>
                                                <input type="text" name="teacherName" id="teacherName" class="form-control" value="{{$dt->teacherName}}"/>
                                                @if ($errors->has('teacherName'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('teacherName') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="teacherCode">Mã giảng viên</label>
                                                <input type="text" name="teacherCode" id="teacherCode" class="form-control" value="{{$dt->teacherCode}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="phone">Số điện thoại</label>
                                                <input type="text" name="phone" id="phone" class="form-control" value="{{$dt->phone}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" name="email" id="email" class="form-control" value="{{$dt->email}}"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="degree">Học vị</label>
                                                <select name="degree" id="degree" class="form-control">
                                                    <option value="Thạc sĩ">Thạc sĩ</option>
                                                    <option value="Tiến sĩ">Tiến sĩ</option>
                                                    <option value="Phó giáo sư">Phó giáo sư</option>
                                                    <option value="Giáo sư">Giáo sư</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="faculty">Khoa</label>
                                                <select name="faculty" id="faculty" class="form-control">
                                                    @foreach($faculty as $f)
                                                        <option value="{{$f->id}}">{{$f->facultyName}}</option>
                                                    @endforeach
                                                </select>
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