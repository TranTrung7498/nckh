@extends('admin.layout.index')
@section('content')
    <div class="content-page">
        <div class="jumbotron">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header card-header-success">
                                <h4 class="card-title">Kết quả kiểm tra trùng lặp</h4>
                                <p class="card-category">Những đề tài nghiên cứu khoa học có thể bị trùng lặp ý tưởng</p>
                            </div>
                            <div class="card-body">
                                <div class="alert alert-danger" id="total"></div>
                                <table class="table table-bordered" id="myTable">
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên đề tài</th>
                                        <th style="width: 80px">Chi tiết</th>
                                    </tr>
                                    <?php $i = 1 ?>
                                    @foreach ($data as $dt)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td>{{$dt["name"]}}</td>
                                            <td><a href="{{url('admin/search/detail/'.$dt->id)}}" class="text-purple">Chi tiết</a></td>
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
        var rows = document.getElementById('myTable').getElementsByTagName("tr").length;
        var $row = rows-1;
        var p = document.createElement("p");
        var node = document.createTextNode("Tổng số đề tài có thể bị trùng ý tưởng : "+ $row +"  đề tài.");
        p.appendChild(node);
        var div = document.getElementById("total");
        div.appendChild(p);
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