@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Xuất báo cáo</h4>
                                <p class="card-category">Các tiêu chí xuất báo cáo</p>
                            </div>
                            <div class="card-body">
                                <form class="navbar-form" role="form" method="post" action="{{url('admin/search/download')}}">
                                    {{ csrf_field() }}
                                    <div>
                                        <p>Theo khoa/ngành đào tạo: </p>
                                        <select name="facultyName" class="custom-select">
                                            <option value="">Tất cả</option>
                                            <?php foreach ($khoa as $key=>$value) {?>
                                            <option value="<?php echo $value["facultyName"]?>"><?php echo $value["facultyName"]?></option><?php }?>
                                        </select>
                                    </div>
                                    <br>
                                    <div>
                                        <p>Theo năm: </p>
                                        <select name="year" class="custom-select">
                                            <option value="">Tất cả</option>
                                            <?php foreach ($nam as $key=>$value) { ?>
                                            <option value="<?php echo $value["year"]?>"><?php echo $value["year"]?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div>
                                        <p>Theo Giảng viên hướng dẫn: </p>
                                        <select name="teacher" class="custom-select">
                                            <option value="">Tất cả</option>
                                            <?php foreach ($giangvien as $key=>$value) { ?>
                                            <option value="<?php echo $value["id"] ?>"><?php echo $value["teacherName"]?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div>
                                        <p>Theo tình trạng: </p>
                                        <select name="status" class="custom-select">
                                            <option value="">Tất cả</option>
                                            <option value="Chờ xét duyệt">Chờ xét duyệt</option>
                                            <option value="Đang thực hiện">Đang thực hiện</option>
                                            <option value="Chờ nghiệm thu">Chờ nghiệm thu</option>
                                            <option value="Đã nghiệm thu">Đã nghiệm thu</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div>
                                        <p>Theo xếp loại: </p>
                                        <select name="rating" class="custom-select">
                                            <option value="">Tất cả</option>
                                            <option value="Xuất sắc">Xuất sắc</option>
                                            <option value="Tốt">Tốt</option>
                                            <option value="Khá">Khá</option>
                                            <option value="Đạt">Đạt</option>
                                        </select>
                                    </div>
                                    <br>
                                    <div>
                                        <button type="submit" class="btn btn-success pull-right">Xuất báo cáo</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop