@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Thêm mới đề tài</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/search/postAdd')}}" method="post" role="form">
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
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group" id="a">
                                                </div>
                                                <input type ='button' id="id" onClick="a();" value="Thêm thành viên">
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
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
                                        <hr>
                                        <h4>Đánh giá đề cương</h4>
                                        <hr>
                                        <h5>Điểm đánh giá</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group{{ $errors->has('titleScore') ? ' has-error' : '' }}">
                                                    <label for="titlescore">Điểm tên đề tài (MAX.10)</label>
                                                    <input type="number" name="titleScore" id="titlescore" class="form-control" />
                                                    @if ($errors->has('titleScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('titleScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group{{ $errors->has('resultScore') ? ' has-error' : '' }}">
                                                    <label for="resultscore">Điểm tổng quan kết quả nghiên cứu (MAX.20)</label>
                                                    <input type="number" name="resultScore" id="resultscore" class="form-control" />
                                                    @if ($errors->has('resultScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('resultScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group{{ $errors->has('targetScore') ? ' has-error' : '' }}">
                                                    <label for="targetscore">Điểm mục tiêu, tính cấp thiết (MAX.20)</label>
                                                    <input type="number" name="targetScore" id="targetscore" class="form-control" />
                                                    @if ($errors->has('targetScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('targetScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4{{ $errors->has('contentScore') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="contentscore">Điểm nội dung, tiến độ, phương pháp (MAX.30)</label>
                                                    <input type="number" name="contentScore" id="contentscore" class="form-control" />
                                                    @if ($errors->has('contentScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('contentScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4{{ $errors->has('applyScore') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="applyscore">Điểm ứng dụng kết quả nghiên cứu (MAX.20)</label>
                                                    <input type="number" name="applyScore" id="applyscore" class="form-control" />
                                                    @if ($errors->has('applyScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('applyScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4{{ $errors->has('summaryScore') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="summaryscore">Tổng điểm (MAX.100)</label>
                                                    <input type="number" name="summaryScore" id="summaryscore" class="form-control" />
                                                    @if ($errors->has('summaryScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('summaryScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <h4>Nhận xét đề cương</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('appearanceComment') ? ' has-error' : '' }}">
                                                    <label for="appearancecomment">Hình thức, bố cục, trình bày</label>
                                                    <textarea name="appearanceComment" id="appearancecomment" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('appearanceComment'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('appearanceComment') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('targetComment') ? ' has-error' : '' }}">
                                                    <label for="targetcomment">Mục tiêu nghiên cứu</label>
                                                    <textarea name="targetComment" id="targetcomment" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('targetComment'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('targetComment') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('summaryComment') ? ' has-error' : '' }}">
                                                    <label for="summarycomment">Nhận xét tổng quan</label>
                                                    <textarea name="summaryComment" id="summarycomment" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('summaryComment'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('summaryComment') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12{{ $errors->has('methodComment') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="methodcomment">Phương pháp nghiên cứu</label>
                                                    <textarea name="methodComment" id="methodcomment" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('methodComment'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('methodComment') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12{{ $errors->has('resultComment') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="resultcomment">Dự kiến kết quả đạt được</label>
                                                    <textarea name="resultComment" id="resultcomment" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('resultComment'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('resultComment') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('additionalComment') ? ' has-error' : '' }}">
                                                    <label for="additionalcomment">Các vấn đề cần bổ sung, chỉnh sửa</label>
                                                    <textarea name="additionalComment" id="additionalcomment" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('additionalComment'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('additionalComment') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('adjustedComment') ? ' has-error' : '' }}">
                                                    <label for="adjustedcomment">Ý kiến nhận xét và điều chỉnh</label>
                                                    <textarea name="adjustedComment" id="adjustedcomment" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('adjustedComment'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('adjustedComment') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <h4>Kết quả nghiệm thu</h4>
                                        <hr>
                                        <h5>Điểm đánh giá</h5>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group{{ $errors->has('situationScore') ? ' has-error' : '' }}">
                                                    <label for="situationscore">Điểm tổng quan tình hình (MAX.15)</label>
                                                    <input type="number" name="situationScore" id="situationscore" class="form-control" />
                                                    @if ($errors->has('situationScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('situationScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group{{ $errors->has('ideaScore') ? ' has-error' : '' }}">
                                                    <label for="ideascore">Điểm Ý tưởng của đề tài (MAX.15)</label>
                                                    <input type="number" name="ideaScore" id="ideascore" class="form-control" />
                                                    @if ($errors->has('ideaScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('ideaScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group{{ $errors->has('targetScore1') ? ' has-error' : '' }}">
                                                    <label for="targetscore1">Điểm Mục tiêu đề tài (MAX.10)</label>
                                                    <input type="number" name="targetScore1" id="targetscore1" class="form-control" />
                                                    @if ($errors->has('targetScore1'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('targetScore1') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4{{ $errors->has('methodScore') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="methodscore">Điểm Phương pháp nghiên cứu (MAX.10)</label>
                                                    <input type="number" name="methodScore" id="methodscore" class="form-control" />
                                                    @if ($errors->has('methodScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('methodScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4{{ $errors->has('researchScore') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="researchscore">Điểm Kết quả nghiên cứu (MAX.40)</label>
                                                    <input type="number" name="researchScore" id="researchscore" class="form-control" />
                                                    @if ($errors->has('researchScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('researchScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4{{ $errors->has('appearanceScore') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="appearancescore">Hình thức trình bày báo cáo (MAX.5)</label>
                                                    <input type="number" name="appearanceScore" id="appearancescore" class="form-control" />
                                                    @if ($errors->has('appearanceScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('appearanceScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4{{ $errors->has('publishScore') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="publishscore">Điểm Công bố khoa học (MAX.5)</label>
                                                    <input type="number" name="publishScore" id="publishscore" class="form-control" />
                                                    @if ($errors->has('publishScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('publishScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4{{ $errors->has('totalScore') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="totalscore">Tổng điểm (MAX.100)</label>
                                                    <input type="number" name="totalScore" id="totalscore" class="form-control" />
                                                    @if ($errors->has('totalScore'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('totalScore') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <h4>Nhận xét đề cương</h4>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('appearanceComment1') ? ' has-error' : '' }}">
                                                    <label for="appearancecomment1">Hình thức, bố cục, trình bày</label>
                                                    <textarea name="appearanceComment1" id="appearancecomment1" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('appearanceComment1'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('appearanceComment1') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('situationComment') ? ' has-error' : '' }}">
                                                    <label for="situationcomment">Tổng quan tình hình nghiên cứu thuộc lĩnh vực đề tài</label>
                                                    <textarea name="situationComment" id="situationcomment" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('situationComment'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('situationComment') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('meaningComment') ? ' has-error' : '' }}">
                                                    <label for="meaningcomment">Ý nghĩa khoa học và ý nghĩa thực tiễn của đề tài</label>
                                                    <textarea name="meaningComment" id="meaningcomment" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('meaningComment'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('meaningComment') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12{{ $errors->has('contentComment') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="contentcomment">Nội dung, mục tiêu và phương pháp nghiên cứu</label>
                                                    <textarea name="contentComment" id="contentcomment" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('contentComment'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('contentComment') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12{{ $errors->has('resultComment1') ? ' has-error' : '' }}">
                                                <div class="form-group">
                                                    <label for="resultcomment1">Kết quả nghiên cứu đạt được</label>
                                                    <textarea name="resultComment1" id="resultcomment1" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('resultComment1'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('resultComment1') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('conclusion') ? ' has-error' : '' }}">
                                                    <label for="conclusions">Kết luận và kiến nghị</label>
                                                    <textarea name="conclusion" id="conclusions" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('conclusion'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('conclusion') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group{{ $errors->has('proplem') ? ' has-error' : '' }}">
                                                    <label for="proplems">Các vấn đề cần làm rõ, bổ sung, chỉnh sửa</label>
                                                    <textarea name="proplem" id="proplems" rows="10" class="form-control"></textarea>
                                                    @if ($errors->has('proplem'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('proplem') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
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
@stop