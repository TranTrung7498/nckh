@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="card mb-3">
                        <div class="card-header">
                            <h3><i class="fa fa-check-square-o"></i> Xét duyệt đề cương</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{url('admin/outline/addOutline')}}" method="post" role="form">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="<?php echo $id ?>" />
                                <h4>Điểm đánh giá</h4>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('titleScore') ? ' has-error' : '' }}">
                                            <label for="titlescore">Điểm tên đề tài (MAX.10)</label>
                                            <input type="number" name="titleScore" id="titlescore" class="form-control" onkeyup="sum();"/>
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
                                            <input type="number" name="resultScore" id="resultscore" class="form-control" onkeyup="sum();"/>
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
                                            <input type="number" name="targetScore" id="targetscore" class="form-control" onkeyup="sum();"/>
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
                                            <input type="number" name="contentScore" id="contentscore" class="form-control" onkeyup="sum();"/>
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
                                            <input type="number" name="applyScore" id="applyscore" class="form-control" onkeyup="sum();"/>
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
                                            <input type="number" name="summaryScore" id="summaryscore" class="form-control" readonly/>
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
{{--                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-6"><input type="radio" name="status" value="Chờ nghiệm thu" checked><b> Chờ nghiệm thu</b></div>
                                            <br>
                                            <div class="col-md-6"><input type="radio" name="status" value="Không được xét duyệt"><b> Không được xét duyệt</b></div>
                                        </div>
                                    </div>
                                </div>--}}
                                <button type="submit" class="btn btn-primary pull-right">Xét duyệt</button>
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
        function sum() {
            var firstNum = document.getElementById('titlescore').value;
            var secondNum = document.getElementById('resultscore').value;
            var thirdNum = document.getElementById('targetscore').value;
            var fourthNum = document.getElementById('contentscore').value;
            var fiveNum = document.getElementById('applyscore').value;
            var result = parseInt(firstNum) + parseInt(secondNum) + parseInt(thirdNum) + parseInt(fourthNum) + parseInt(fiveNum);
            if (!isNaN(result)) {
                document.getElementById('summaryscore').value = result;
            }
        }
    </script>
@stop