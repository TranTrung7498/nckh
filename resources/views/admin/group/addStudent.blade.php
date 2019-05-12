@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i>Thêm thông tin Sinh viên</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/group/postStudent')}}" enctype="multipart/form-data" method="post" role="form">
                                {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="Name">Họ và tên</label>
                                                <input type="text" name="name" class="form-control" id="Name" >
                                                @if ($errors->has('name'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                                                <label for="Code">Mã sinh viên</label>
                                                <input type="text" name="code" class="form-control" id="Code" >
                                                @if ($errors->has('code'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('code') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                                                <label for="DOB">Ngày sinh</label>
                                                <input type="date" name="dob" class="form-control" id="DOB" >
                                                @if ($errors->has('dob'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('dob') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('place') ? ' has-error' : '' }}">
                                                <label for="Place">Nơi sinh</label>
                                                <input type="text" name="place" class="form-control" id="Place" >
                                                @if ($errors->has('place'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('place') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group{{ $errors->has('year') ? ' has-error' : '' }}">
                                                <label for="Place">Khóa</label>
                                                <input type="number" name="year" class="form-control" id="Year" >
                                                @if ($errors->has('year'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('year') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Classes">Lớp</label>
                                                <select name="classes" id="Classes" class="select2 form-control">
                                                    @foreach ($lop as $l)
                                                        <option value="{{$l->id}}">{{$l->className}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12{{ $errors->has('address') ? ' has-error' : '' }}">
                                            <div class="form-group">
                                                <label for="Address">Địa chỉ</label>
                                                <input type="text" name="address" class="form-control" id="Address" >
                                                @if ($errors->has('address'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                                <label for="Phone">Điện thoại</label>
                                                <input type="text" name="phone" class="form-control" id="Phone" >
                                                @if ($errors->has('phone'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="Email">Email</label>
                                                <input type="text" name="email" class="form-control" id="Email" >
                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Year1R">Xếp loại năm nhất</label>
                                                <input type="text" name="year1r" class="form-control" id="Year1R" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Year1Achie">Thành tích năm nhất</label>
                                                <textarea name="year1achi" id="Year1Achie" class="form-control" rows="5" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Year2R">Xếp loại năm hai</label>
                                                <input type="text" name="year2r" class="form-control" id="Year2R" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Year2Achie">Thành tích năm hai</label>
                                                <textarea name="year2achi" id="Year2Achie" class="form-control" rows="5" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Year3R">Xếp loại năm ba</label>
                                                <input type="text" name="year3r" class="form-control" id="Year3R" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Year3Achie">Thành tích năm ba</label>
                                                <textarea name="year3achi" id="Year3Achie" class="form-control" rows="5" ></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Year4R">Xếp loại năm tư</label>
                                                <input type="text" name="year4r" class="form-control" id="Year4R" >
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Year4Achie">Thành tích năm tư</label>
                                                <textarea name="year4achi" id="Year4Achie" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                                <label for="IMG">Upload ảnh</label>
                                                <input type="file" name="image" id="IMG" class="form-control">
                                                @if ($errors->has('image'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('image') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <br><hr>
                                    <button type="submit" class="btn btn-primary pull-right">Thêm mới</button>
                                    <!--End topic-->
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('page-scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop