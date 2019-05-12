@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Danh sách lớp</h4>
                                <a href="{{url('admin/secondary/addCL')}}" class="btn btn-primary pull-right">Thêm mới</a>
                                <p class="card-category">Danh sách các lớp trường Đại học Tài nguyên và Môi trường Hà Nội</p>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header card-header-success">
                                            <h4 class="card-title">Kết quả tìm kiếm</h4>
                                            <p class="card-category">Danh sách đề tài nghiên cứu khoa học của sinh viên trường Đại học Tài nguyên và Môi trường Hà Nội</p>
                                        </div>
                                        <div class="card-body">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <select name="faculty" id="mySelect" onchange="secondFunction()" class="form-control">
                                                                <option value="">-Tất cả-</option>
                                                                <option value="Công nghệ thông tin">Công nghệ thông tin</option>
                                                                <option value="Tài nguyên nước">Tài nguyên nước</option>
                                                                <option value="Môi trường">Môi trường</option>
                                                                <option value="Quản lý Đất đai">Quản lý Đất đai</option>
                                                                <option value="Trắc địa - Bản đồ">Trắc địa - Bản đồ</option>
                                                                <option value="Kinh tế Tài nguyên và Môi trường">Kinh tế Tài nguyên và Môi trường</option>
                                                                <option value="Địa chất">Địa chất</option>
                                                                <option value="Lý luận chính trị">Lý luận chính trị</option>
                                                                <option value="Khoa học đại Cương">Khoa học đại Cương</option>
                                                                <option value="Khí tượng, Thủy văn">Khí tượng, Thủy văn</option>
                                                                <option value="Khoa học Biển và Hải đảo">Khoa học Biển và Hải đảo</option>
                                                                <option value="Biến đổi khí hậu và phát triển bền vững">Biến đổi khí hậu và phát triển bền vững</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" id="myInput" placeholder="Tìm kiếm tên lớp" title="Tìm kiếm tên lớp" class="form-control"><br>
                                                    </div>
                                                </div>
                                            </div>
                                <table class="table table-bordered" id="myTable">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên lớp</th>
                                        <th>Khoa</th>
                                        <th>Cập nhật</th>
                                    </tr>
                                    <?php  $i =1 ?>
                                    @foreach($lop as $l)
                                        <tr>
                                           <td>{{$i++}}</td>
                                            <td>{{$l->className}}</td>
                                            <td>{{$l->facultyName}}</td>
                                            <td>
                                                <a href="{{ url('admin/secondary/updateCL/'.$l->id) }}" class="btn btn-warning btn-sm"
                                                   data-tr="{{$l->id}}"
                                                   data-placement="left" data-singleton="true">
                                                    Cập nhật
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
                                    td = tr[i].getElementsByTagName("td")[1];
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
                        input.addEventListener("keyup", myFunction);
                    </script>
                    <script>
                        function secondFunction() {
                            var input, filter, table, tr, td, i;
                            input = document.getElementById("mySelect");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[2];
                                if (td) {
                                    if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>
                    <script>
                        var $table = document.getElementById("myTable"),
                            $n = 20,
                            $rowCount = $table.rows.length,
                            $firstRow = $table.rows[0].firstElementChild.tagName,
                            $hasHead = ($firstRow === "TH"),
                            $tr = [],
                            $i,$ii,$j = ($hasHead)?1:0,
                            $th = ($hasHead?$table.rows[(0)].outerHTML:"");
                        var $pageCount = Math.ceil($rowCount / $n);
                        if ($pageCount > 1) {
                            for ($i = $j,$ii = 0; $i < $rowCount; $i++, $ii++)
                                $tr[$ii] = $table.rows[$i].outerHTML;
                            $table.insertAdjacentHTML("afterend","<div id='buttons'></div>");
                            sort(1);
                        }

                        function sort($p) {
                            var $rows = $th,$s = (($n * $p)-$n);
                            for ($i = $s; $i < ($s+$n) && $i < $tr.length; $i++)
                                $rows += $tr[$i];
                            $table.innerHTML = $rows;
                            document.getElementById("buttons").innerHTML = pageButtons($pageCount,$p);
                            document.getElementById("id"+$p).setAttribute("class","active");
                        }


                        function pageButtons($pCount,$cur) {
                            var $prevDis = ($cur == 1)?"disabled":"",
                                $nextDis = ($cur == $pCount)?"disabled":"",
                                $buttons = "<input type='button' value='&lt;&lt; Prev' onclick='sort("+($cur - 1)+")' "+$prevDis+">";
                            for ($i=1; $i<=$pCount;$i++)
                                $buttons += "<input type='button' id='id"+$i+"'value='"+$i+"' onclick='sort("+$i+")'>";
                            $buttons += "<input type='button' value='Next &gt;&gt;' onclick='sort("+($cur + 1)+")' "+$nextDis+">";
                            return $buttons;
                        }
                    </script>
@stop