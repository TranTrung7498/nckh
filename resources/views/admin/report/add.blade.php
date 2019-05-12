@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Báo cáo tiến độ đề tài</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/report/post')}}" method="post" role="form">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="topicID" value="{{$id}}" />
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('mainContent') ? ' has-error' : '' }}">
                                                <label for="MainContent">Nội dung chính của đề tài</label>
                                                <textarea name="mainContent" id="MainContent" rows="10" class="form-control"></textarea>
                                                @if ($errors->has('mainContent'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('mainContent') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group{{ $errors->has('result') ? ' has-error' : '' }}">
                                                <label for="Result">Kết quả dự kiến đạt được </label>
                                                <textarea name="result" id="Result" rows="10" class="form-control"></textarea>
                                                @if ($errors->has('result'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('result') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12{{ $errors->has('difficulty') ? ' has-error' : '' }}">
                                            <div class="form-group">
                                                <label for="Difficulty">Khó khăn, vướng mắc gặp phải</label>
                                                <textarea name="difficulty" id="Difficulty" rows="10" class="form-control"></textarea>
                                                @if ($errors->has('difficulty'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('difficulty') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12{{ $errors->has('methods') ? ' has-error' : '' }}">
                                            <div class="form-group">
                                                <label for="Methods">Phương hướng giải quyết</label>
                                                <textarea name="methods" id="Methods" rows="10" class="form-control"></textarea>
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
                                            <div class="form-group{{ $errors->has('intendTime') ? ' has-error' : '' }}">
                                                <label for="IntendTime">Thời gian dự kiến hoàn thành</label>
                                                <input type="date" class="form-control" id="IntendTime" name="intendTime">
                                                @if ($errors->has('intendTime'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('intendTime') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary pull-right">Báo cáo</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop