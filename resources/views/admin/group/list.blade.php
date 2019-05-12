@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Danh sách nhóm</h4>
                                <a href="{{url('admin/group/add')}}" class="btn btn-primary pull-right">Thêm mới</a>
                                <p class="card-category">Danh sách các nhóm nghiên cứu khoa học của sinh viên trường Đại học Tài nguyên và Môi trường Hà Nội</p>
                            </div>
                            <div class="card-body">
                                <input type="text" id="myInput" placeholder="Tìm kiếm tên nhóm" title="Nhập tên nhóm" class="form-control"><br>
                                <table class="table table-bordered" id="myTable">
                                    <tr>
                                        <th>Tên nhóm</th>
                                        <th style="width: 240px">Giảng viên hướng dẫn</th>
                                        <th style="width: 100px">Cập nhật</th>
                                        <th style="width: 70px">Xóa</th>
                                    </tr>
                                    @foreach($data as $dt)
                                        <tr>
                                            <td>{{$dt->groupName}}<br>
                                                <a href="{{url('admin/group/detail/'.$dt->id)}}" class="text-purple">Chi tiết</a>
                                            </td>
                                            <td>{{$dt->degree}} {{$dt->teacherName}}</td>
                                            <td>
                                                <a href="{{ url('admin/group/update/'.$dt->id) }}" class="btn btn-warning btn-sm"
                                                   data-tr="{{$dt->id}}"
                                                   data-placement="left" data-singleton="true">
                                                    Cập nhật
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/group/delete/'.$dt->id) }}" class="btn btn-danger btn-sm"
                                                   data-tr="{{$dt->id}}"
                                                   data-placement="left" data-singleton="true">
                                                    Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </table>
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
        var input = document.getElementById("myInput");
        function myFunction() {
            var filter, table, tr, td, i;
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            if (!filter) {
                table.style.display = "";
            }else{
                for (i = 0; i < tr.length; i++) {
                    td = tr[i].getElementsByTagName("td")[0];
                    if (td) {
                        if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                            table.style.display = "table";
                            tr[i].style.display = "";
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                }
            }
        }
        //gán sự kiện cho thẻ input
        input.addEventListener("keyup", myFunction);
    </script>
@stop