@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Thông tin đề tài</h4>
                                <p class="card-category">Những thông tin của đề tài</p>
                            </div>
                            <div class="card-body">
                                <div class="card border-primary mb-3">
                                    <div class="card-header">Thông tin chi tiết</div>
                                    <div class="card-body text-primary">
                                        <table>
                                            <thead></thead>
                                            <tbody>
                                            @foreach($group as $gr)
                                                <tr>
                                                    <th style="width: 350px">Tên nhóm</th>
                                                    <td>{{$gr["groupName"]}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card border-danger mb-3">
                                    <div class="card-header">Giảng viên hướng dẫn</div>
                                    <div class="card-body text-danger">
                                        <table>
                                            <thead></thead>
                                            <tbody>
                                            @foreach($teacher as $tc)
                                                <tr>
                                                    <th style="width: 350px">Tên giảng viên</th>
                                                    <td>{{$tc["teacherName"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Số điện thoại</th>
                                                    <td>{{$tc["phone"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{$tc["email"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Trình độ</th>
                                                    <td>{{$tc["degree"]}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @foreach($student as $st)
                                    <div class="card border-success mb-3">
                                        <div class="card-header">Thành viên</div>
                                        <div class="card-body text-success">
                                            <table>
                                                <thead></thead>
                                                <tbody>
                                                <tr>
                                                    <th style="width: 350px">Tên sinh viên</th>
                                                    <td style="width: 400px">{{$st["studentName"]}}</td>
                                                    <td rowspan="8">
                                                        <img class="pull-right" src="{{asset('image/'.$st["image"])}}" alt="{{$st["studentName"]}}">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Mã sinh viên</th>
                                                    <td>{{$st["studentCode"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Ngày sinh</th>
                                                    <td>{{$st["dateOfBirth"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nơi sinh</th>
                                                    <td>{{$st["placeOfBirth"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Khóa</th>
                                                    <td>{{$st["year"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Địa chỉ</th>
                                                    <td>{{$st["address"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Số điện thoại</th>
                                                    <td>{{$st["phone"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{$st["email"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Xếp loại năm nhất</th>
                                                    <td>{{$st["year1Rating"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Thành tựu năm nhất</th>
                                                    <td>{{$st["year1Achievement"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Xếp loại năm hai</th>
                                                    <td>{{$st["year2Rating"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Thành tựu năm hai</th>
                                                    <td>{{$st["year2Achievement"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Xếp loại năm ba</th>
                                                    <td>{{$st["year3Rating"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Thành tựu năm ba</th>
                                                    <td>{{$st["year3Achievement"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Xếp loại năm tư</th>
                                                    <td>{{$st["year4Rating"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Thành tựu năm tư</th>
                                                    <td>{{$st["year4Achievement"]}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                                    </div>
                                </div>
                                <!--End -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop