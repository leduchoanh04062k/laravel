@extends('default')
@section('title','Báo cáo nhập hàng')
@section('content')
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Báo cáo nhập hàng</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn_in" style="padding-right:10px;">
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo"><i
                                class="fa fa-file-excel-o mr-2" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo1" style="display:none"><i
                                class="fa fa-file-excel-o mr-2" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo2" style="display:none"><i
                                class="fa fa-file-excel-o mr-2" aria-hidden="true"></i></button>
                    </div>
                    <div class="btn_excel" style="padding-right:10px;">
                        <form>
                            <button type="button" class="btn bg-primary text-white" onclick="window.print()">
                                <i class="fa fa-print" aria-hidden="true"></i>
                                In sổ nhập trước
                            </button>
                        </form>
                    </div>
                    <div class="mg-r-10 btn_trove">
                        <a href="{{ asset('baocao') }}">
                            <button type="button" class="btn btn-danger" id="inTab2">
                                <i class="fa fa-reply" aria-hidden="true"></i>
                                Trở về
                            </button>
                        </a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Content -->
        <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
                <div class="row tx-gray-900">
                    <div class="col-md-3 col-lg-2">
                        <label for="">Loại phiếu nhập</label>
                        <select class="js-example-basic-single form-control" id="typeVote" name="state">
                            <option value="sup">Nhập từ nhà cung cấp</option>
                            <option value="import">Nhập tồn</option>
                            <option value="return">Nhập khách hàng trả lại</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Kiểu hiển thị</label>
                        <select class="js-example-basic-single form-control" id="hienthi" name="state">
                            <option value="">Tổng hợp</option>
                            <option value="">Chi tiết</option>

                        </select>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Trạng thái</label>
                        <select class="js-example-basic-single form-control" id="status" name="state">
                            <option value="">Tất cả</option>
                            <option value="">Hoàn thành</option>
                            <option value="">Đã hủy</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Từ ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" value="<?php echo(date('01/m/Y'))?>"
                                placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Tới ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" value="<?php echo(date('d/m/Y'))?>"
                                placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                </div>
                <div class="row tx-gray-900 mg-t-20">
                    <div class="col-md-5">
                        <label for="">Nhà thuốc</label>
                        <div class="form-control">
                            <a href="#" class="text-primary">Hộ Kinh Doanh Nhà thuốc Morioka</a>
                        </div>
                    </div>
                    <div class="col-md-7 row">
                        <div class="col-md-9">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control"
                                placeholder="Tìm kiếm theo mã phiếu hoặc tên đối tác" id="searchProduct">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" id="searchData"><i class="fas fa-search"
                                    style="padding: 3px"></i> Tìm
                                kiếm</button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20" id="table1" style="display: block;">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1" width="100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã phiếu nhập</th>
                                <th scope="col" class="bg-primary" style="color: white;">Loại phiếu nhập</th>
                                <th scope="col" class="bg-primary" style="color: white;">Đối tác</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày nhập</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã hóa đơn
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày xuất hóa đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Trạng thái</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền</th>
                            </tr>
                        </thead>

                        <thead>

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="mg-t-20" id="table2" style="display: none;">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table3"></label>
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3" width="100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã phiếu nhập</th>
                                <th scope="col" class="bg-primary" style="color: white;">Loại phiếu nhập</th>
                                <th scope="col" class="bg-primary" style="color: white;">Đối tác</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày nhập</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã hóa đơn
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày xuất hóa đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Trạng thái</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền</th>
                            </tr>
                        </thead>

                        <thead>

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="mg-t-20" id="table3" style="display: none;">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table4"></label>
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table4" width="100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã phiếu nhập</th>
                                <th scope="col" class="bg-primary" style="color: white;">Loại phiếu nhập</th>
                                <th scope="col" class="bg-primary" style="color: white;">Đối tác</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày nhập</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã hóa đơn
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày xuất hóa đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Trạng thái</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền</th>
                            </tr>
                        </thead>

                        <thead>

                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end  mg-t-15">
                    <a href="{{ asset('baocao') }}">
                        <button class="btn btn-danger" id="outTab2">
                            <i class="fa fa-reply" aria-hidden="true"></i>
                            Trở về
                        </button>
                    </a>
                </div>
            </div><!-- row -->
        </div><!-- br-pagebody -->
        <!--  -->
    </div>

    <!-- tab2 -->
    <div class="pos-absolute t-0 l-0 hidden" id="tab2">
    </div>
    <!-- end tab2 -->

</div><!-- br-mainpanel -->

<!-- ########## END: MAIN PANEL ########## -->
<script>
    // Datepicker
    function total(a,b,c,d){
        d = d/100;
        var f;
        var e;
        if(d==0){
            e = (b-c/a);
        }else{
            e = (b-c/a)+(b-c/a)*d;
        }
        f = (parseFloat(e*a) || 0).toFixed(2);
        return f;
    }
    function checkRangeValue(value){
      if(value<10){
        return "00000"+value
      }else if(value<100){
        return "0000"+value
      }else{
        return "000"+value
      }
    }
    function decialNumber(number){
		return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
	}
    $(document).ready(function () {
        var table1 = $('#data-table1').DataTable({
        processing: true,
        responsive: true,
        "order": [[ 1, "desc" ]],
        "language": {
            "processing": "Đang xử lý...",
            "sLengthMenu": " _MENU_ Bản ghi hiển thị",
            "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
            "info": "Danh sách dữ liệu (_TOTAL_ bản ghi) ",
            "infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
            "infoFiltered": "",
            "emptyTable": "Không có dữ liệu",
            "loadingRecords": "Đang tải...",
            "paginate": {
                "first": "Đầu tiên",
                "last": "Cuối cùng",
                "next": "Sau",
                "previous": "Trước"
            },
        },
        ajax : {
            url: "{{ url('bcnhaphang/nhapnhacc') }}",
        },
        columns: [
        { data: 'id', name: 'id'},
        { data: null,
            "render": function(data,type,row) {
               return "PN" +checkRangeValue(data['id']);
            }
        },
        { data: null,
            "render": function(data,type,row) {
                if(data['type'] =="import_from_supplier"){
                    return 'Nhập từ nhà cung cấp'
                }else{
                    return 'Lỗi'
                }
            }
        },
        { data: 'supplier_name', name: 'id'},
        { data: 'created_at'},
        { data: null,
            "render": function(data,type,row) {
               return "HD" +checkRangeValue(data['id']);
            }
        },
        { data: null,
            "render": function(data,type,row) {
        return data['date'] +'<span> - </span>'+data['hour'];
            }
        },
        { data: null,
            "render": function(data,type,row) {
                if(data['status'] ==1){
                    return '<button class="form-control" style="color: #fff;background-color: #36c6d3;width:70%;text-transform: uppercase;font-size: 10px;">Hoàn thành</button>';
                }else if(data['status'] ==0){
                    return '<button class="form-control" style="color: #fff;background-color:red;width:70%;text-transform: uppercase;font-size: 10px;">Hoàn thành</button>';
                }else if(data['supplier_status'] ==null && data['customer_status']==1 && data['status']==null){
                    return '<button class="form-control" style="color: #fff;background-color: #36c6d3;width:70%;text-transform: uppercase; font-size: 10px;">Hoàn thành</button>';
                }else if(data['supplier_status'] ==null && data['customer_status']==0 && data['status']==null){
                    return '<button class="form-control" style="color: #fff;background-color: red;width:70%;text-transform: uppercase;font-size: 10px;">Hoàn thành</button>';
                }
            }
        },
        { data: null,
            "render": function(data,type,row,meta) {
                return '<label class="font-weight-bold tx-gray-700" style="color:black">'+decialNumber(total(data["qty"],data["price"],data["discount"],data["VAT"]))+'</label>';
            }
        },
        ],
          dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'BaoCaoNhapHang'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table1"]').appendTo('#exportExcelDBLotNo');
      table1.on('order.dt search.dt', function () {
		table1.column(0).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();
    // $('.dt-buttons a[aria-controls="data-table1"]').detach().appendTo('#exportExcelDBLotNo');
    // $('.buttons-excel').appendTo('#exportExcelDBLotNo');
    $("#searchProduct").keyup(function(event) {
    $("#searchData").click();
    });

    $("#searchData").click(function() {
    table1
    // .columns(1)
    // .columns(3)
    .search( $('#searchProduct').val())
    .draw();
    });

        var table2 = $('#data-table3').DataTable({
        processing: true,
        // responsive: true,
        "order": [[ 1, "desc" ]],
        "language": {
            "processing": "Đang xử lý...",
            "sLengthMenu": " _MENU_ Bản ghi hiển thị",
            "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
            "info": "Danh sách dữ liệu (_TOTAL_ bản ghi) ",
            "infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
            "infoFiltered": "",
            "emptyTable": "Không có dữ liệu",
            "loadingRecords": "Đang tải...",
            "paginate": {
                "first": "Đầu tiên",
                "last": "Cuối cùng",
                "next": "Sau",
                "previous": "Trước"
            },
        },
        ajax : {
            url: "{{ url('bcnhaphang/nhapton') }}",
        },
        columns: [
        { data: 'id', name: 'id'},
        { data: null,
            "render": function(data,type,row) {
               return "PNT" +checkRangeValue(data['id']);
            }
        },
        { data: null,
            "render": function(data,type,row) {
                if(data['type'] =="import_inventory"){
                    return 'Nhập tồn'
                }else{
                    return ''
                }
            }
        },
        { data: null,
            "render": function(data,type,row) {
               return "" ;
            }
        },
        { data: null,
            "render": function(data,type,row) {
        return data['date'] +'<span> - </span>'+data['hour'];
            }
        },
        { data: null,
            "render": function(data,type,row) {
               return "HD" +checkRangeValue(data['id']);
            }
        },
        { data: null,
            "render": function(data,type,row) {
        return data['date'] +'<span> - </span>'+data['hour'];
            }
        },
        { data: null,
            "render": function(data,type,row) {
                 if(data['status']==1){
                    return '<button class="form-control" style="color: #fff;background-color: #36c6d3;width:70%;text-transform: uppercase;font-size: 10px;">Hoàn thành</button>';
                }else if(data['status']==0){
                    return '<button class="form-control" style="color: #fff;background-color:red;width:70%;text-transform: uppercase;font-size: 10px;">Đã hủy</button>';
                }
            }
        },
        { data: null,
            "render": function(data,type,row,meta) {
                return '<label class="font-weight-bold tx-gray-700" style="color:black">'+decialNumber(total(data["qty"],data["price"],data["discount"],data["VAT"]))+'</label>';
            }
        },
        ],
          columnDefs: [
            {
                targets: [4],
                render: $.fn.dataTable.render.number(',', 0, '')
            }
          ],
          dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'BaoCaoNhapHang'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table3"]').appendTo('#exportExcelDBLotNo1');
      table2.on('order.dt search.dt', function () {
		table2.column(0).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();
    $("#searchProduct").keyup(function(event) {
    $("#searchData").click();
    });

    $("#searchData").click(function() {
    table2
    // .columns(1)
    // .columns(3)
    .search( $('#searchProduct').val())
    .draw();
    });

    var table4 = $('#data-table4').DataTable({
        processing: true,
        // responsive: true,
        "order": [[ 1, "desc" ]],
        "language": {
            "processing": "Đang xử lý...",
            "sLengthMenu": " _MENU_ Bản ghi hiển thị",
            "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
            "info": "Danh sách dữ liệu (_TOTAL_ bản ghi) ",
            "infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
            "infoFiltered": "",
            "emptyTable": "Không có dữ liệu",
            "loadingRecords": "Đang tải...",
            "paginate": {
                "first": "Đầu tiên",
                "last": "Cuối cùng",
                "next": "Sau",
                "previous": "Trước"
            },
        },
        ajax : {
            url: "{{ url('bcnhaphang/khachhangtralai') }}",
        },
        columns: [
        { data: 'id', name: 'id'},
        { data: null,
            "render": function(data,type,row) {
                if(data['type']=='sell'){
                    return "PKT" +checkRangeValue(data['sell_id']);
                }else{
                    return "PKT" +checkRangeValue(data['customer_id']);
                }
            }
        },
        { data: null,
            "render": function(data,type,row) {
                if(data['type'] ==""){
                    return '';
                }else{
                    return 'Khách hàng trả lại'
                }
            }
        },
        { data: null,
            'render':function(data,type,row){
                if(data['name']!=null && data['sellname']==null){
                    return data['name'];
                }else if(data['sellname']!=null && data['name']==null){
                    return data['sellname'];
                }else{
                    return "khách lẻ";
                }
            }
        },
        { data: 'created_at'},
        { data: null,
            "render": function(data,type,row) {
                if(data['type']=='sell'){
                    return "HD" +checkRangeValue(data['sell_id']);
                }else{
                    return "";
                }
            }
        },
        { data: null,
            "render": function(data,type,row) {
                if(data['type']=='sell'){
                    return data['dateSell'] +'<span> - </span>'+data['hourSell'];
                }else{
                    return '';
                }
            }
        },

        { data: null,
            "render": function(data,type,row) {
                    return '<button class="form-control" style="color: #fff;background-color: #36c6d3;width:70%;text-transform: uppercase;font-size: 10px;">Hoàn thành</button'
            }
        },
        { data: null,
            "render": function(data,type,row,meta) {
                return '<label class="font-weight-bold tx-gray-700" style="color:black">'+decialNumber(total(data["qty"],data["price"],data["discount"],data["VAT"]))+'</label>';
            }
        },
        ],
          dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'BaoCaoNhapHang'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table4"]').appendTo('#exportExcelDBLotNo2');

      table4.on('order.dt search.dt', function () {
		table4.column(0).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();
    $("#searchProduct").keyup(function(event) {
    $("#searchData").click();
    });

    $("#searchData").click(function() {
    table4
    // .columns(1)
    // .columns(3)
    .search( $('#searchProduct').val())
    .draw();
    });

    // searchDateTable();
    $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true
    });

    $('#datepickerNoOfMonths').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        numberOfMonths: 2
    });
    $('#data-table4_paginate').after($('#data-table4_length'));
      $('#data-table4_info').detach().appendTo('#info-data-table4');
    $('#tpBasic').timepicker();
    $('#tpBasic1').timepicker();
    $('#tpBasic2').timepicker();

    $("#inTab2").click(function () {
        $("#tab1").addClass("hidden");
        $("#tab2").removeClass("hidden");
    })
    $("#outTab2").click(function () {
        $("#tab1").removeClass("hidden");
        $("#tab2").addClass("hidden");
    });
    $('#typeVote').on('change',function(){
        if($(this).val()=='sup'){
          $('#table3').css("display","none");
          $('#table2').css("display","none");
          $('#table1').css("display","block");
          $('#exportExcelDBLotNo2').css("display","none");
          $('#exportExcelDBLotNo1').css("display","none");
          $('#exportExcelDBLotNo').css("display","block");
        }else if($(this).val()=='import'){
           $('#table3').css("display","none");
          $('#table2').css("display","block");
          $('#table1').css("display","none");
          $('#exportExcelDBLotNo2').css("display","none");
          $('#exportExcelDBLotNo1').css("display","block");
          $('#exportExcelDBLotNo').css("display","none");
        }else{
          $('#table3').css("display","block");
          $('#table2').css("display","none");
          $('#table1').css("display","none");
          $('#exportExcelDBLotNo2').css("display","block");
          $('#exportExcelDBLotNo1').css("display","none");
          $('#exportExcelDBLotNo').css("display","none");
        }
    })
});
    var xlsBuilder = {
    customize: function(xlsx) {
      var sheet = xlsx.xl.worksheets['sheet1.xml'];
      var downrows = 5;
      var clRow = $('row', sheet);
      var msg;

      clRow.each(function() {
        var attr = $(this).attr('r');
        var ind = parseInt(attr);
        ind = ind + downrows;
        $(this).attr("r", ind);
      });


      $('row c ', sheet).each(function() {
        var attr = $(this).attr('r');
        var pre = attr.substring(0, 1);
        var ind = parseInt(attr.substring(1, attr.length));
        ind = ind + downrows;
        $(this).attr("r", pre + ind);
      });

      function Addrow(index, data) {

        msg = '<row r="' + index + '">';
        for (var i = 0; i < data.length; i++) {
          var key = data[i].k;
          var value = data[i].v;
          msg += '<c t="inlineStr" r="' + key + index + '">';
          msg += '<is>';
          msg += '<t>' + value + '</t>';
          msg += '</is>';
          msg += '</c>';
        }
        msg += '</row>';
        return msg;
      }
      var r1 = Addrow(1, [{
        k: 'A',
        v: 'Hộ Kinh Doanh Nhà Thuốc Morioka'
      }
      ]);
      var r2 = Addrow(2, [{
        k: 'A',
        v: '68 Ngõ 10 Nguyễn Thị Định'
      }
      ]);
      var r3 = Addrow(3, [{
        k: 'C',
        v: 'BÁO CÁO NHẬP HÀNG:'
      }
      ]);
    //   var r4 = Addrow(4, [{
    //     k: 'C',
    //     v: 'Từ ngày'
    //   }
    //   ]);

      sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + sheet.childNodes[0].childNodes[1].innerHTML;
    },
    exportOptions: {
      columns: [1, 2, 3, 4, 5, 6,7,8]
    },
  }


</script>
@endsection
