@extends('user.layout.index')
@section('body')
    <div class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-success">
                            <h4 class="card-title">Danh sách thông báo</h4>
                            <p class="card-category">Các thông báo đề tài nghiên cứu khoa học của sinh viên trường Đại học Tài nguyên và Môi trường Hà Nội</p>
                        </div>
                        <div class="card-body">
                            <input type="text" id="myInput" placeholder="Tìm kiếm theo từ khóa" title="Nhập từ khóa" class="form-control"><br>
                            <table class="table table-bordered" id="myTable">
                                <tr>
                                    <th>STT</th>
                                    <th>Tiêu đề</th>
                                    <th>Mô tả</th>
                                    <th>Tên file</th>
                                    <th style="width: 110px">Tải xuống</th>
                                </tr>
                                <?php $i = 1 ?>
                                @foreach($data as $dt)
                                    <tr>
                                        <td>{{$i++}}</td>
                                        <td>{{$dt->title}}</td>
                                        <td>{{$dt->description}}</td>
                                        <td>{{$dt->fileName}}</td>
                                        <td>
                                            <a href="{{ url('user/form/download/'.$dt->id) }}" class="btn btn-primary btn-sm"
                                               data-tr="{{$dt->id}}"
                                               data-placement="left" data-singleton="true">
                                                Tải xuống
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
@stop

@section('script')
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
                    td = tr[i].getElementsByTagName("td")[2];
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
        var $table = document.getElementById("myTable"),
            $n = 10,
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