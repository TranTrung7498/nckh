@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Đăng ký đề tài</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/regtopic/post')}}" method="post" role="form">
                                {{ csrf_field() }}
                                <!--Topic-->
                                    <h4>Thông tin đề tài</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                                <label for="Title">Tên đề tài</label>
                                                <input type="text" name="title" id="Title" class="form-control" />
                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('title') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('timeStart') ? ' has-error' : '' }}">
                                                <label for="TimeStart">Thời gian bắt đầu</label>
                                                <input type="date" name="timeStart" id="TimeStart" class="form-control" />
                                                @if ($errors->has('timeStart'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('timeStart') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group{{ $errors->has('timeFinish') ? ' has-error' : '' }}">
                                                <label for="TimeFinish">Thời gian hoàn thành</label>
                                                <input type="date" name="timeFinish" id="TimeFinish" class="form-control" />
                                                @if ($errors->has('timeFinish'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('timeFinish') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Faculty">Khoa</label>
                                                <select name="faculty" id="Faculty" class="form-control">
                                                    <option value="" selected >Chọn khoa</option>
                                                    @foreach($khoa as $k)
                                                        <option value="{{$k["id"]}}">{{$k["facultyName"]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Giảng viên hướng dẫn</label>
                                                    @for ($i = 1; $i < 13; $i++)
                                                        @foreach($khoa as $k)
                                                            @if ($k['id']==$i)
                                                                <select name="teacher[]" id="{{$k['sign']}}" class="form-control">
                                                                    <option value="" selected>- Chọn giảng viên -</option>
                                                                    @foreach($giangvien as $gv)
                                                                        @if ($gv['facultyID']==$i)
                                                                            <option value="{{$gv['id']}}">{{$gv['teacherName']}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                            @endif
                                                        @endforeach
                                                    @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Sinh viên thực hiện</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="student1">Sinh viên thứ nhất</label>
                                                <select name="student[]" id="student1" class="select2 form-control">
                                                    <option value="">-Chọn sinh viên-</option>
                                                    @foreach ($student as $st)
                                                        <option value="{{$st["id"]}}">{{$st["studentName"]}} - {{$st["studentCode"]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="student2">Sinh viên thứ hai</label>
                                                <select name="student[]" id="student2" class="select2 form-control">
                                                    <option value="" selected>-Chọn sinh viên-</option>
                                                    @foreach ($student as $st)
                                                        <option value="{{$st["id"]}}">{{$st["studentName"]}} - {{$st["studentCode"]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="student3">Sinh viên thứ ba</label>
                                                <select name="student[]" id="student3" class="select2 form-control">
                                                    <option value="" selected>-Chọn sinh viên-</option>
                                                    @foreach ($student as $st)
                                                        <option value="{{$st["id"]}}">{{$st["studentName"]}} - {{$st["studentCode"]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="student4">Sinh viên thứ tư</label>
                                                <select name="student[]" id="student4" class="select2 form-control">
                                                    <option value="" selected>-Chọn sinh viên-</option>
                                                    @foreach ($student as $st)
                                                        <option value="{{$st["id"]}}">{{$st["studentName"]}} - {{$st["studentCode"]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="student5">Sinh viên thứ năm</label>
                                                <select name="student[]" id="student5" class="select2 form-control">
                                                        <option value="" selected>-Chọn sinh viên-</option>
                                                    @foreach ($student as $st)
                                                        <option value="{{$st["id"]}}">{{$st["studentName"]}} - {{$st["studentCode"]}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('overview') ? ' has-error' : '' }}">
                                                <label for="overview">Tổng quan vấn đề nghiên cứu liên quan đến đề tài </label>
                                                <textarea type="text" name="overview" id="overview" rows="10" class="form-control"></textarea>
                                                @if ($errors->has('overview'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('overview') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('target') ? ' has-error' : '' }}">
                                                <label for="target">Mục tiêu nghiên cứu</label>
                                                <textarea type="text" name="target" id="target" rows="10" class="form-control"></textarea>
                                                @if ($errors->has('target'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('target') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('contents') ? ' has-error' : '' }}">
                                                <label for="content">Nội dung nghiên cứu</label>
                                                <textarea type="text" name="contents" id="content" rows="10" class="form-control"></textarea>
                                                @if ($errors->has('contents'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('contents') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('methods') ? ' has-error' : '' }}">
                                                <label for="methods">Phương pháp nghiên cứu</label>
                                                <textarea type="text" name="methods" id="methods" rows="10" class="form-control"></textarea>
                                                @if ($errors->has('methods'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('methods') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('expected') ? ' has-error' : '' }}">
                                                <label for="expected">Dự kiến kết quả nghiên cứu</label>
                                                <textarea type="text" name="expected" id="expected" rows="10" class="form-control"></textarea>
                                                @if ($errors->has('expected'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('expected') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label for="Description">Chú ý</label>
                                                <textarea type="text" name="description" id="Description" rows="10" class="form-control"></textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                            <strong>{{ $errors->first('description') }}</strong>
                                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Đăng ký</button>
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
        var counter=0;

        function a(){
            if(counter<5){
                document.getElementById('a').innerHTML += "<div class=\"form-group\">\n" + "<label>Mã sinh viên </label>\n" +
                    "<input class=\"form-control\" name=\"code[]\" type=\"text\" />\n" + "</div>";
                counter++;
            }
            else{
                document.getElementById("id").disabled=true;
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    <script>
        $(document).ready(function() {

            $("#Faculty").change(function () {

                var chosenFaculty = $("#Faculty").val();

                if (chosenFaculty == 1) {
                    $("#CNTT").css("display", "block");
                    $("#TNN").css("display", "none");
                    $("#MT").css("display", "none");
                    $("#QLDD").css("display", "none");
                    $("#TD").css("display", "none");
                    $("#KTTN").css("display", "none");
                    $("#DC").css("display", "none");
                    $("#LLCT").css("display", "none");
                    $("#KHDC").css("display", "none");
                    $("#KTTV").css("display", "none");
                    $("#BHD").css("display", "none");
                    $("#GDTX").css("display", "none");
                }
                if (chosenFaculty == 2) {

                    $("#CNTT").css("display", "none");
                    $("#TNN").css("display", "block");
                    $("#MT").css("display", "none");
                    $("#QLDD").css("display", "none");
                    $("#TD").css("display", "none");
                    $("#KTTN").css("display", "none");
                    $("#DC").css("display", "none");
                    $("#LLCT").css("display", "none");
                    $("#KHDC").css("display", "none");
                    $("#KTTV").css("display", "none");
                    $("#BHD").css("display", "none");
                    $("#GDTX").css("display", "none");

                }
                if (chosenFaculty == 3) {

                    $("#CNTT").css("display", "none");
                    $("#TNN").css("display", "none");
                    $("#MT").css("display", "block");
                    $("#QLDD").css("display", "none");
                    $("#TD").css("display", "none");
                    $("#KTTN").css("display", "none");
                    $("#DC").css("display", "none");
                    $("#LLCT").css("display", "none");
                    $("#KHDC").css("display", "none");
                    $("#KTTV").css("display", "none");
                    $("#BHD").css("display", "none");
                    $("#GDTX").css("display", "none");

                }
                if (chosenFaculty == 4) {

                    $("#CNTT").css("display", "none");
                    $("#TNN").css("display", "none");
                    $("#MT").css("display", "none");
                    $("#QLDD").css("display", "block");
                    $("#TD").css("display", "none");
                    $("#KTTN").css("display", "none");
                    $("#DC").css("display", "none");
                    $("#LLCT").css("display", "none");
                    $("#KHDC").css("display", "none");
                    $("#KTTV").css("display", "none");
                    $("#BHD").css("display", "none");
                    $("#GDTX").css("display", "none");

                }
                if (chosenFaculty == 5) {

                    $("#CNTT").css("display", "none");
                    $("#TNN").css("display", "none");
                    $("#MT").css("display", "none");
                    $("#QLDD").css("display", "none");
                    $("#TD").css("display", "block");
                    $("#KTTN").css("display", "none");
                    $("#DC").css("display", "none");
                    $("#LLCT").css("display", "none");
                    $("#KHDC").css("display", "none");
                    $("#KTTV").css("display", "none");
                    $("#BHD").css("display", "none");
                    $("#GDTX").css("display", "none");

                }
                if (chosenFaculty == 6) {

                    $("#CNTT").css("display", "none");
                    $("#TNN").css("display", "none");
                    $("#MT").css("display", "none");
                    $("#QLDD").css("display", "none");
                    $("#TD").css("display", "none");
                    $("#KTTN").css("display", "block");
                    $("#DC").css("display", "none");
                    $("#LLCT").css("display", "none");
                    $("#KHDC").css("display", "none");
                    $("#KTTV").css("display", "none");
                    $("#BHD").css("display", "none");
                    $("#GDTX").css("display", "none");

                }
                if (chosenFaculty == 7) {

                    $("#CNTT").css("display", "none");
                    $("#TNN").css("display", "none");
                    $("#MT").css("display", "none");
                    $("#QLDD").css("display", "none");
                    $("#TD").css("display", "none");
                    $("#KTTN").css("display", "none");
                    $("#DC").css("display", "block");
                    $("#LLCT").css("display", "none");
                    $("#KHDC").css("display", "none");
                    $("#KTTV").css("display", "none");
                    $("#BHD").css("display", "none");
                    $("#GDTX").css("display", "none");

                }
                if (chosenFaculty == 8) {

                    $("#CNTT").css("display", "none");
                    $("#TNN").css("display", "none");
                    $("#MT").css("display", "none");
                    $("#QLDD").css("display", "none");
                    $("#TD").css("display", "none");
                    $("#KTTN").css("display", "none");
                    $("#DC").css("display", "none");
                    $("#LLCT").css("display", "block");
                    $("#KHDC").css("display", "none");
                    $("#KTTV").css("display", "none");
                    $("#BHD").css("display", "none");
                    $("#GDTX").css("display", "none");

                }
                if (chosenFaculty == 9) {

                    $("#CNTT").css("display", "none");
                    $("#TNN").css("display", "none");
                    $("#MT").css("display", "none");
                    $("#QLDD").css("display", "none");
                    $("#TD").css("display", "none");
                    $("#KTTN").css("display", "none");
                    $("#DC").css("display", "none");
                    $("#LLCT").css("display", "none");
                    $("#KHDC").css("display", "block");
                    $("#KTTV").css("display", "none");
                    $("#BHD").css("display", "none");
                    $("#GDTX").css("display", "none");

                }
                if (chosenFaculty == 10) {

                    $("#CNTT").css("display", "none");
                    $("#TNN").css("display", "none");
                    $("#MT").css("display", "none");
                    $("#QLDD").css("display", "none");
                    $("#TD").css("display", "none");
                    $("#KTTN").css("display", "none");
                    $("#DC").css("display", "none");
                    $("#LLCT").css("display", "none");
                    $("#KHDC").css("display", "none");
                    $("#KTTV").css("display", "block");
                    $("#BHD").css("display", "none");
                    $("#GDTX").css("display", "none");

                }
                if (chosenFaculty == 11) {

                    $("#CNTT").css("display", "none");
                    $("#TNN").css("display", "none");
                    $("#MT").css("display", "none");
                    $("#QLDD").css("display", "none");
                    $("#TD").css("display", "none");
                    $("#KTTN").css("display", "none");
                    $("#DC").css("display", "none");
                    $("#LLCT").css("display", "none");
                    $("#KHDC").css("display", "none");
                    $("#KTTV").css("display", "none");
                    $("#BHD").css("display", "block");
                    $("#GDTX").css("display", "none");

                }
                if (chosenFaculty == 12) {

                    $("#CNTT").css("display", "none");
                    $("#TNN").css("display", "none");
                    $("#MT").css("display", "none");
                    $("#QLDD").css("display", "none");
                    $("#TD").css("display", "none");
                    $("#KTTN").css("display", "none");
                    $("#DC").css("display", "none");
                    $("#LLCT").css("display", "none");
                    $("#KHDC").css("display", "none");
                    $("#KTTV").css("display", "none");
                    $("#BHD").css("display", "none");
                    $("#GDTX").css("display", "block");

                }
            });
        });
    </script>
@stop
