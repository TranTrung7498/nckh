@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Cập nhật thông tin nhóm</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/group/postUpdate')}}" method="post" role="form">
                                {{ csrf_field() }}
                                <!--Topic-->
                                    <input type="hidden" name="groupID" value="{{$grid}}">
                                    <h4>Thông tin nhóm</h4>
                                    <hr>
                                    @foreach ($group as $gr)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="Title">Tên nhóm</label>
                                                    <input type="text" name="title" id="Title" class="form-control" value="{{$gr["groupName"]}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Teacher">Giảng viên hướng dẫn</label>
                                                <select name="teacher" id="Teacher" class="select2 form-control">
                                                    @for ($i = 1; $i < 13; $i++)
                                                        @foreach($khoa as $k)
                                                            @if ($k['id']==$i)
                                                                <optgroup label="{{$k['facultyName']}}">
                                                                    @foreach($giangvien as $gv)
                                                                        @if ($gv['facultyID']==$i)
                                                                            <option value="{{$gv['id']}}">{{$gv['teacherName']}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </optgroup>
                                                            @endif
                                                        @endforeach
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <h5>Sinh viên thực hiện</h5>
                                    <hr>
                                        <h5>Sinh viên thực hiện</h5>
                                        <hr>
                                    @foreach($student as $st)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Mã sinh viên</label>
                                                    <input class="form-control" name="code[]" type="text" value="{{$st["studentCode"]}}"/>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" id="member">
                                                </div>
                                                <a href="javascript:;" id="add-new-person" class="add-new-person">Thêm thành viên</a>
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                    <button type="submit" class="btn btn-warning pull-right">Cập nhật</button>
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
        let i = 2;
        document.getElementById('add-new-person').onclick = function() {
            let template = `
            <div class="form-group">
                <label>Mã sinh viên ${i}</label>
                <input class="form-control" name="code[]" type="text" />
            </div>
            `;
            let container = document.getElementById('member');
            let div = document.createElement('div');
            div.innerHTML = template;
            container.appendChild(div);
            i++;
        }
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@stop