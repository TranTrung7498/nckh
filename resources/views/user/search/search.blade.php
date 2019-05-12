@extends('user.layout.index')
@section('body')
    <div class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Tra cứu</h4>
                                <p class="card-category">Tìm kiếm đề tài nghiên cứu khoa học của sinh viên trường Đại học Tài nguyên và Môi trường Hà Nội</p>
                            </div>
                            <div class="card-body">
                                <form class="navbar-form" role="form" method="post" action="{{url('user/search/postSearch')}}">
                                    {{ csrf_field() }}
                                    <div class="input-group no-border">
                                        <input type="text" value="" name="inputText" class="form-control" placeholder="Tìm kiếm...">
                                        <button type="submit" class="btn btn-white btn-round btn-just-icon">
                                            <i class="fa fa-search"></i>
                                            <div class="ripple-container"></div>
                                        </button>
                                    </div>
                                    <br>
                                    <hr>
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
                                            <option value="<?php echo $value["teacherName"] ?>"><?php echo $value["degree"]?> <?php echo $value["teacherName"]?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <br>
                                    <div>
                                        <p>Theo tình trạng: </p>
                                        <select name="status" class="custom-select">
                                            <option value="">Tất cả</option>
                                            <option value="Chờ xét duyệt">Chờ xét duyệt</option>
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@stop