@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Thêm mới lớp</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/secondary/postClasses')}}" method="post" role="form">
                                    {{ csrf_field() }}
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('className') ? ' has-error' : '' }}">
                                                <label for="className">Tên lớp</label>
                                                <input type="text" name="className" id="className" class="form-control" />
                                                @if ($errors->has('className'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('className') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="faculty">Khoa</label>
                                                <select name="faculty" id="faculty" class="form-control">
                                                    @foreach($data as $dt)
                                                        <option value="{{$dt->id}}">{{$dt->facultyName}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Thêm mới</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop