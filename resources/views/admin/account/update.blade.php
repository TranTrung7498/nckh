@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i>Thêm mới tài khoản</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/account/postUpdate')}}" method="post" role="form">
                                    {{ csrf_field() }}
                                    @foreach($data as $dt)
                                        <input type="hidden" name="id" value="{{$dt->id}}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                                <label for="Username">Tên đăng nhập</label>
                                                <input type="text" name="username" id="Username" class="form-control" value="{{$dt->username}}"/>
                                                @if ($errors->has('username'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="Pass">Mật khẩu</label>
                                                <input type="text" name="password" id="Pass" class="form-control" />
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <label for="Permission" class="col-md-4 control-label">Loại tài khoản</label>
                                            <select name="permission" id="Permission" class="form-control">
                                                <option value="1">Cán bộ phòng KHCN</option>
                                                <option value="2">Cán bộ Khoa</option>
                                                <option value="3">Giảng viên</option>
                                                <option value="4">Sinh viên</option>
                                            </select>
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