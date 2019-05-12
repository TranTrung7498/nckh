@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Tạo nhóm mới</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/group/post')}}" method="post" role="form">
                                {{ csrf_field() }}
                                <!--Topic-->
                                    <h4>Thông tin nhóm</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Title">Tên nhóm</label>
                                                <input type="text" name="title" id="Title" class="form-control"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="Teacher">Giảng viên</label>
                                                <select name="teacher" id="Teacher" class="select2 form-control">
                                                @for ($i = 1; $i < 13; $i++)
                                                    @foreach($khoa as $k)
                                                        @if ($k['id']==$i)
                                                            <optgroup label="{{$k['facultyName']}}">
                                                                @foreach($giangvien as $gv)
                                                                    @if ($gv['facultyID']==$i)
                                                                        <option value="{{$gv['id']}}">{{$gv['degree']}} {{$gv['teacherName']}}</option>
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
                                    <h5>Sinh viên</h5>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group" id="member">
                                            </div>
                                            <a href="javascript:;" id="add-new-person" class="add-new-person">Thêm thành viên</a>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
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
        let i = 2;
        document.getElementById('add-new-person').onclick = function() {
            let template = `
            <div class="row">
                 <div class="col-md-12">
                     <div class="form-group">
                          <label>Sinh viên ${i}</label>
                              <select name="student[]" class="select2 form-control">
                                    <option value="" selected>-Chọn sinh viên-</option>
                                   @foreach ($student as $st)
                                    <option value="{{$st["id"]}}">{{$st["studentName"]}} - {{$st["studentCode"]}}</option>
                                   @endforeach
                              </select>
                            </div>
                        </div>
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