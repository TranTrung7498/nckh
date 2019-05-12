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
                                            @foreach($tp as $topic)
                                            <tr>
                                                <th style="width: 350px">Tên đề tài</th>
                                                <td>{{$topic["name"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Thời gian bắt đầu nghiên cứu</th>
                                                <td>{{$topic["timeStart"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Thời gian hoàn thành nghiên cứu</th>
                                                <td>{{$topic["timeFinish"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Xếp loại</th>
                                                <td>{{$topic["rating"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tổng quan vấn đề nghiên cứu liên quan đến đề tài </th>
                                                <td>{{$topic["overview"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Mục tiêu nghiên cứu</th>
                                                <td>{{$topic["target"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Nội dung nghiên cứu</th>
                                                <td>{{$topic["content"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Phương pháp nghiên cứu</th>
                                                <td>{{$topic["method"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Dự kiến kết quả nghiên cứu</th>
                                                <td>{{$topic["expected"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Chú ý</th>
                                                <td>{{$topic["description"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Trạng thái</th>
                                                <td>{{$topic["status"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Năm</th>
                                                <td>{{$topic["year"]}}</td>
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
                                <div class="card border-dark mb-3">
                                    <div class="card-header">Đánh giá đề cương</div>
                                    <div class="card-body text-dark">
                                        <table>
                                            <thead></thead>
                                            <tbody>
                                            @foreach($outline as $o)
                                            <tr>
                                                <th style="width: 350px">Điểm tên đề tài</th>
                                                <td>{{$o["titleScore"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Điểm tổng quan kết quả nghiên cứu </th>
                                                <td>{{$o["resultScore"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Điểm mục tiêu, tính cấp thiết </th>
                                                <td>{{$o["targetScore"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Điểm nội dung, tiến độ, phương pháp</th>
                                                <td>{{$o["contentScore"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Điểm ứng dụng kết quả nghiên cứu</th>
                                                <td>{{$o["applyScore"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Tổng điểm </th>
                                                <td>{{$o["totalScore"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Hình thức, bố cục, trình bày</th>
                                                <td>{{$o["appearanceComment"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Mục tiêu nghiên cứu</th>
                                                <td>{{$o["targetComment"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Nhận xét tổng quan</th>
                                                <td>{{$o["summaryComment"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Phương pháp nghiên cứu</th>
                                                <td>{{$o["methodComment"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Dự kiến kết quả đạt được</th>
                                                <td>{{$o["resultComment"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Các vấn đề cần bổ sung, chỉnh sửa</th>
                                                <td>{{$o["additional"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Ý kiến nhận xét và điều chỉnh</th>
                                                <td>{{$o["adjusted"]}}</td>
                                            </tr>
                                            <tr>
                                                <th>Ngày xét duyệt</th>
                                                <td>{{$o["date"]}}</td>
                                            </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @foreach($report as $rp)
                                    <div class="card border-primary mb-3">
                                        <div class="card-header">Thông tin báo cáo tiến độ</div>
                                        <div class="card-body text-primary">
                                            <table>
                                                <thead></thead>
                                                <tbody>
                                                <tr>
                                                    <th style="width: 350px">Nội dung chính của đề tài</th>
                                                    <td>{{$rp->mainContent}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Kết quả dự kiến đạt được</th>
                                                    <td>{{$rp->result}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Khó khăn, vướng mắc gặp phải</th>
                                                    <td>{{$rp->difficulty}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Phương hướng giải quyết</th>
                                                    <td>{{$rp->method}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Thời gian dự kiến hoàn thành</th>
                                                    <td>{{$rp->intendTime}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endforeach
                                <!--End -->
                                <div class="card border-dark mb-3">
                                    <div class="card-header">Nghiệm thu đề tài</div>
                                    <div class="card-body text-dark">
                                        <table>
                                            <thead></thead>
                                            <tbody>
                                            @foreach($accept as $ac)
                                                <tr>
                                                    <th style="width: 350px">Điểm tổng quan tình hình nghiên cứu</th>
                                                    <td>{{$ac["situationScore"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Điểm ý tưởng đề tài </th>
                                                    <td>{{$ac["ideaScore"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Điểm mục tiêu đề tài </th>
                                                    <td>{{$ac["targetScore"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Điểm phương pháp nghiên cứu</th>
                                                    <td>{{$ac["methodScore"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Điểm kết quả nghiên cứu</th>
                                                    <td>{{$ac["researchScore"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Điểm hình thức trình bày </th>
                                                    <td>{{$ac["appearanceScore"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Điểm công bố kết quả nghiên cứu khoa học</th>
                                                    <td>{{$ac["publishScore"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Tổng điểm</th>
                                                    <td>{{$ac["totalScore"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nhận xét bố cục trình bày</th>
                                                    <td>{{$ac["appearanceComment"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nhận xét tổng quan tình hình nghiên cứu</th>
                                                    <td>{{$ac["situationComment"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nhận xét ý nghĩa khoa học, thực tiễn</th>
                                                    <td>{{$ac["meaningComment"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nhận xét nội dung, mục tiêu, phương pháp</th>
                                                    <td>{{$ac["contentComment"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Nhận xét kết quả nghiên cứu</th>
                                                    <td>{{$ac["resultComment"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>kết luận và kiến nghị</th>
                                                    <td>{{$ac["conclusion"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Các vấn đề cần làm rõ, bổ sung chỉnh sửa</th>
                                                    <td>{{$ac["proplem"]}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Ngày nghiệm thu</th>
                                                    <td>{{$ac["date"]}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
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