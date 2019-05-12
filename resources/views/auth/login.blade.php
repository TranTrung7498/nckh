@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <div class="card-header">Đăng nhập</div>
                    <div class="card-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/postLogin') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Tên đăng nhập</label>

                                <div class="col-md-12">
                                    <input id="email" type="text" class="form-control" name="username" value="{{ old('username') }}" required autofocus>

                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Mật khẩu</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--<div class="form-group">
                                <label for="permission" class="col-md-4 control-label">Quyền hạn</label>
                                <div class="col-md-12 col-md-offset-4">
                                    <select name="permission" class="form-control">
                                        <option value="4">Sinh viên</option>
--}}{{--                                        <option value="3">Giảng viên</option>--}}{{--
                                        <option value="2">Giảng viên</option>
                                        <option value="1">Quản trị</option>
                                    </select>
                                </div>
                            </div>--}}

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Đăng nhập
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection