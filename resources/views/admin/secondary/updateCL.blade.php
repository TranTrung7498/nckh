@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Cập nhật lớp</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/secondary/postUpdateCL')}}" method="post" role="form">
                                    {{ csrf_field() }}
                                    <hr>
                                    <input type="hidden" name="id" value="{{$id}}">
                                    @foreach($data as $dt)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('className') ? ' has-error' : '' }}">
                                                    <label for="className">Tên lớp</label>
                                                    <input type="text" name="className" id="className" class="form-control" value="{{$dt->className}}"/>
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