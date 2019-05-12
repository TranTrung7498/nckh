@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h3><i class="fa fa-check-square-o"></i> Nghiệm thu đề tài</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{url('admin/accept/postUpdate')}}" method="post" role="form">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="id" value="<?php echo $dulieu["id"] ?>" />
                                    <input type="hidden" name="topicID" value="<?php echo $dulieu["topicID"] ?>" />
                                    <h4>Điểm đánh giá</h4>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('situationScore') ? ' has-error' : '' }}">
                                                <label for="situationscore">Điểm tổng quan tình hình (MAX.15)</label>
                                                <input type="number" name="situationScore" id="situationscore" class="form-control" value="<?php echo $dulieu["situationScore"] ?>"/>
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
                                                <input type="number" name="ideaScore" id="ideascore" class="form-control" value="<?php echo $dulieu["ideaScore"] ?>"/>
                                                @if ($errors->has('ideaScore'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('ideaScore') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group{{ $errors->has('targetScore') ? ' has-error' : '' }}">
                                                <label for="targetscore">Điểm Mục tiêu đề tài (MAX.10)</label>
                                                <input type="number" name="targetScore" id="targetscore" class="form-control" value="<?php echo $dulieu["targetScore"] ?>"/>
                                                @if ($errors->has('targetScore'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('targetScore') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4{{ $errors->has('methodScore') ? ' has-error' : '' }}">
                                            <div class="form-group">
                                                <label for="methodscore">Điểm Phương pháp nghiên cứu (MAX.10)</label>
                                                <input type="number" name="methodScore" id="methodscore" class="form-control" value="<?php echo $dulieu["methodScore"] ?>"/>
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
                                                <input type="number" name="researchScore" id="researchscore" class="form-control" value="<?php echo $dulieu["researchScore"] ?>"/>
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
                                                <input type="number" name="appearanceScore" id="appearancescore" class="form-control" value="<?php echo $dulieu["appearanceScore"] ?>"/>
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
                                                <input type="number" name="publishScore" id="publishscore" class="form-control" value="<?php echo $dulieu["publishScore"] ?>"/>
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
                                                <input type="number" name="totalScore" id="totalscore" class="form-control" value="<?php echo $dulieu["totalScore"] ?>"/>
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
                                            <div class="form-group{{ $errors->has('appearanceComment') ? ' has-error' : '' }}">
                                                <label for="appearancecomment">Hình thức, bố cục, trình bày</label>
                                                <textarea name="appearanceComment" id="appearancecomment" rows="10" class="form-control"><?php echo $dulieu["appearanceComment"] ?></textarea>
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
                                            <div class="form-group{{ $errors->has('situationComment') ? ' has-error' : '' }}">
                                                <label for="situationcomment">Tổng quan tình hình nghiên cứu thuộc lĩnh vực đề tài</label>
                                                <textarea name="situationComment" id="situationcomment" rows="10" class="form-control"><?php echo $dulieu["situationComment"] ?></textarea>
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
                                                <textarea name="meaningComment" id="meaningcomment" rows="10" class="form-control"><?php echo $dulieu["meaningComment"] ?></textarea>
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
                                                <textarea name="contentComment" id="contentcomment" rows="10" class="form-control"><?php echo $dulieu["contentComment"] ?></textarea>
                                                @if ($errors->has('contentComment'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('contentComment') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12{{ $errors->has('resultComment') ? ' has-error' : '' }}">
                                            <div class="form-group">
                                                <label for="resultcomment">Kết quả nghiên cứu đạt được</label>
                                                <textarea name="resultComment" id="resultcomment" rows="10" class="form-control"><?php echo $dulieu["resultComment"] ?></textarea>
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
                                            <div class="form-group{{ $errors->has('conclusion') ? ' has-error' : '' }}">
                                                <label for="conclusions">Kết luận và kiến nghị</label>
                                                <textarea name="conclusion" id="conclusions" rows="10" class="form-control"><?php echo $dulieu["conclusion"] ?></textarea>
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
                                                <textarea name="proplem" id="proplems" rows="10" class="form-control"><?php echo $dulieu["proplem"] ?></textarea>
                                                @if ($errors->has('proplem'))
                                                    <span class="help-block">
                                                    <strong>{{ $errors->first('proplem') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-warning pull-right">Cập nhật</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop