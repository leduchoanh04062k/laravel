@extends('default')
@section('title','Báo cáo bán hàng theo bác sỹ')
@section('content')
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Báo cáo bán hàng theo bác sỹ
                </h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn_in" style="padding-right:10px;">
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo">
                            <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo1" style="display:none">
                            <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
                        </button>
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo2" style="display:none">
                            <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="mg-r-10 btn_trove">
                        <a href="{{ route('baocao') }}">
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
                        <label for="">Kiểu hiển thị</label>
                        <select class="js-example-basic-single form-control" id="typeVote" name="state">
                            <option value="sup">Tiền</option>
                            <option value="import">Phiếu</option>
                            <option value="">Hàng hóa</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Loại thời gian</label>
                        <select class="js-example-basic-single form-control" name="state">
                            <option value="">Năm</option>
                            <option value="">Quý</option>
                            <option value="">Tháng</option>
                            <option value="">Ngày</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Từ ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByStartDate"
                                value="<?php echo date("01/m/Y"); ?>" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Tới ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByEndDate"
                                value="<?php echo date("d/m/Y"); ?>" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                </div>
                <div class="row tx-gray-900 mg-t-20">
                    <div class="col-md-3">
                        <label for="">Nhà thuốc</label>
                        <div class="form-control">
                            <a href="#">Hộ Kinh Doanh Nhà Thuốc Morioka</a>
                        </div>
                    </div>
                    <div class="col-md-9 row">
                        <div class="col-md-9">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input id="searchBySupplier" type="text" class="form-control"
                                placeholder="Tìm kiếm theo tên bác sỹ">

                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" onclick="searchDateTable()">
                                <em class="fa fa-search"></em>
                                Tìm kiếm
                            </button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20" id="table1">
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Bác sỹ</th>
                                <th scope="col" class="bg-primary" style="color: white;">Thời gian</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền hóa đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;">TỔng giảm giá hóa đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền khách hàng trả lại
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng giảm giá cho khách</th>
                                <th scope="col" class="bg-primary" style="color: white;">Doanh thu</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="mg-t-20" style="display:none" id="table2">
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table2" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Bác sỹ</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã phiếu</th>
                                <th scope="col" class="bg-primary" style="color: white;">Khách hàng</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày giao dịch</th>
                                <th scope="col" class="bg-primary" style="color: white;">Bệnh nhân</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền hàng</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tổng giảm giá</th>
                                <th scope="col" class="bg-primary" style="color: white;">Doanh thu</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="mg-t-20" style="display:none;" id="table3">
                    <div style="overflow-x: auto;">
                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3"
                            style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col" class="bg-primary"
                                        style="color:white;min-width:10px;width:2%;text-align:center;">#</th>
                                    <th scope="col" class="bg-primary"
                                        style="color:white;min-width:100px;width:8%;text-align:center;">Bác sỹ</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:100px;width:8%;text-align:center;">Mã hàng hóa
                                    </th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:100px;width:8%;text-align:center;">Tên hàng hóa
                                    </th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:80px;width:8%;text-align:center;">Số lô</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:80px;width:8%;text-align:center;">ĐVT</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:100px;width:8%;text-align:center;">Tỷ lệ quy đổi
                                    </th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:100px;width:8%;text-align:center;">Số lượng bán
                                    </th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:80px;width:8%;text-align:center;">Giá bán</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:150px;width:8%;text-align:center;">Tổng tiền hoá
                                        đơn</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:180px;width:8%;text-align:center;">Tổng giảm giá
                                        hóa đơn</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:100px;width:8%;text-align:center;">Số lượng trả
                                    </th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:100px;width:8%;text-align:center;">Đơn giá trả
                                    </th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:220px;width:8%;text-align:center;">Tổng tiền khách
                                        hàng trả lại</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:250px;width:8%;text-align:center;">Tổng giảm giá
                                        khách trả</th>
                                    <th scope="col" class="bg-primary"
                                        style="color: white;min-width:80px;width:8%;text-align:center;">Doanh thu</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="d-flex justify-content-end  mg-t-15">
                    <a href="{{ route('baocao') }}">
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

<script>
    function total(){};
    function decialNumber(number){
		return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
	}
    function searchDateTable(){
	if($('#searchByStartDate').val()==''){
		$.toast({
			text : "Ngày tìm kiếm không được để trống",
			position: "bottom-right",
			icon:"error",
			stack:1,
			loader:false
		})
		$('#searchByStartDate').focus();
	}else if($('#searchByEndDate').val()==''){
		$.toast({
			text : "Ngày tìm kiếm không được để trống",
			position: "bottom-right",
			icon:"error",
			stack:1,
			loader:false
		})
		$('#searchByEndDate').focus();
	}else{
		$.fn.dataTable.ext.search.push(
			function (settings, data, dataIndex){
				if ( settings.nTable.id !== 'data-table1' ) {
					return true;
				}

				var minDay = $('#searchByStartDate').val().split("/");
				var maxDay = $('#searchByEndDate').val().split("/");
				var temp = data[2].split(" ");
				var tempDate = temp[0].split("/");

				date = new Date(tempDate[1] + '/' + tempDate[0] + '/' + tempDate[2])
				startDate = new Date(minDay[1] + '/' + minDay[0] + '/' + minDay[2]);
				endDate = new Date(maxDay[1] + '/' + maxDay[0] + '/' + maxDay[2]);

				return (
					(startDate === null && endDate === null) ||
					(startDate === null && date <= endDate) ||
					(startDate <= date && endDate === null ) ||
					(startDate <= date && date <= endDate )
					) ? true : false;
			}
			);

		$.fn.dataTable.ext.search.push(
			function (settings, data, dataIndex){
				if ( settings.nTable.id !== 'data-table1' ) {
					return true;
				}
				var supplierName = $("#searchBySupplier").val().toLowerCase();
				return (
					(~data[1].toLowerCase().indexOf(supplierName)) ||
					(~data[2].toLowerCase().indexOf(supplierName))
					) ? true : false;
			}
			);

		$('#data-table1').DataTable()
		.draw();

	}
}


    $(document).ready(function(){

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
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	var table1 = $('#data-table1').DataTable({
        "pagingType": "full_numbers",
      "lengthChange": false,
      "ordering": false,
      "lengthMenu": [5],
      "order": [[ 1, "desc" ]],
      "language": {
        "processing": "Đang xử lý...",
        "sLengthMenu": " _MENU_ Bản ghi hiển thị",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "info": "_TOTAL_",
        "infoEmpty": "0",
        "infoFiltered": "",
        "emptyTable": "Không có dữ liệu",
        "loadingRecords": "Đang tải...",
        "paginate": {
          "first":"Đầu",
          "last":"Cuối",
          "next": "Sau",
          "previous": "Trước"
        },
		},
        ajax : {
    url: "{{ url('banhangtheobacsi/data') }}",
    "dataSrc" : function (json) {
      json['data'].forEach(item=>{
        item.total = total(item.qty,item.price_import,item.VAT,item.discount);
      });
      var newData = [], idArr = [];

      json['data'].forEach(function (a) {
        if (!this[a.id]) {
          this[a.id] = { id: a.id, total: 0 };
          idArr.push(this[a.id]);
        }
        this[a.id].total += parseFloat(a.total);
      }, Object.create(null));

      idArr.forEach(item=>{
        var flag = 0;
        Object.keys(json['data']).forEach(function(key) {
          if (json['data'][key]['id'] == item.id){
            flag++;
            if(flag==1){
              json['data'][key]['total'] = item.total
              newData.push(json['data'][key]);
            }
          }
        });
      })
      console.log(newData);
      return newData;
    }
  },
		columns: [
		{ data: 'id', name: 'id',},
		{ data: 'doctor', name: 'doctor',},
		{ data: null,
            "render": function(data,type,row) { return data["date"] +' '+data["hour"]}
        },
		{ data: null,
            "render": function(data,type,row) { return decialNumber(data["totalMoney"])}
        },
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["sale"])}
        },
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["totalpaid"])}
        },
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["discounts"])}
        },
        { data: null, orderable: false,
            "render": function(data,type,row) { return decialNumber(row['totalMoney']-row['totalpaid']+row['discounts']-row['sales'])}
          },
		],
        dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'BaoCaoBanHangTheoBacSi'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
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
    searchDateTable();

    var table2 = $('#data-table2').DataTable({
        "pagingType": "full_numbers",
      "lengthChange": false,
      "ordering": false,
      "lengthMenu": [5],
      "order": [[ 1, "desc" ]],
      "language": {
        "processing": "Đang xử lý...",
        "sLengthMenu": " _MENU_ Bản ghi hiển thị",
        "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
        "info": "_TOTAL_",
        "infoEmpty": "0",
        "infoFiltered": "",
        "emptyTable": "Không có dữ liệu",
        "loadingRecords": "Đang tải...",
        "paginate": {
          "first":"Đầu",
          "last":"Cuối",
          "next": "Sau",
          "previous": "Trước"
        },
		},
        ajax : {
    url: "{{ url('banhangtheobacsi/data_import') }}",
    "dataSrc" : function (json) {
      json['data'].forEach(item=>{
        item.total = total(item.qty,item.price_import,item.VAT,item.discount);
      });
      var newData = [], idArr = [];

      json['data'].forEach(function (a) {
        if (!this[a.id]) {
          this[a.id] = { id: a.id, total: 0 };
          idArr.push(this[a.id]);
        }
        this[a.id].total += parseFloat(a.total);
      }, Object.create(null));

      idArr.forEach(item=>{
        var flag = 0;
        Object.keys(json['data']).forEach(function(key) {
          if (json['data'][key]['id'] == item.id){
            flag++;
            if(flag==1){
              json['data'][key]['total'] = item.total
              newData.push(json['data'][key]);
            }
          }
        });
      })
      console.log(newData);
      return newData;
    }
  },
		columns: [
		{ data: 'id', name: 'id',},
		{ data: 'doctor', name: 'doctor',},
        { data: null,
        "render": function(data,type,row) {
                        if(data["id"]<10){
                            return "HD00000"+data["id"]
                        }else if(data["id"]<100){
                            return "HD0000"+data["id"]
                        }else{
                            return "HD000"+data["id"]
                        }
                    }
                },
        { data: null,
            "render": function(data,type,row) {
                if(data['name'] ==null){
                    return 'Khách kẻ'
                }else{
                    return ""+data["name"]
                }
            }
        },
        { data: null,
            "render": function(data,type,row) { return data["date"] +' '+data["hour"]}
        },
        {data:'patient',name:'patient'},
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["totalMoney"])}
        },
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["discounts"])}
        },
        { data: null, orderable: false,
            "render": function(data,type,row) { return decialNumber(row['totalMoney']-row['discounts'])}
          },
		],
        dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'BaoCaoBanHangTheoBacSi'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table2"]').appendTo('#exportExcelDBLotNo1');
	table2.on('order.dt search.dt', function () {
		table2.column(0).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();

    var table3 = $('#data-table3').DataTable({
        "ordering" : false,
		"paging":false,
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
        url: "{{ url('banhangtheobacsi/data_import_commodity') }}",
        },
		columns: [
		{ data: 'id', name: 'id',},
		{ data: 'doctor', name: 'doctor',},
        { data: null,
        "render": function(data,type,row) {
            if(data["id"]<10){
                return "HD00000"+data["id"]
            }else if(data["id"]<100){
                return "HD0000"+data["id"]
            }else{
                return "HD000"+data["id"]
            }
        }
    },
        { data: 'namesale', name: 'namesale',},
        { data: 'lotno_name', name: 'lotno_name',},
        { data: 'unit', name: 'unit',},
        { data: 'dosage', name: 'dosage',},
        { data: 'qty', name: 'qty',},
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["price_import"])}
        },
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["price_import"]*data["qty"])}
        },
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["sale"])}
        },
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["sale"])}
        },
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["sale"])}
        },
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["sale"])}
        },
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["discount"])}
        },
        { data: null,
            "render": function(data,type,row) { return decialNumber(data["discount"]- data["sale"])}
        },
		],
        dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'BaoCaoBanHangTheoBacSi'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table3"]').appendTo('#exportExcelDBLotNo2');
	table3.on('order.dt search.dt', function () {
		table3.column(0).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();
})


$(document).ready(function(){
        // Datepicker
        $('.fc-datepicker').datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			dateFormat:'dd/mm/yy'
		});
        $('#datepickerNoOfMonths').datepicker({
        	showOtherMonths: true,
        	selectOtherMonths: true,
        	numberOfMonths: 2
        });

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
        })
        $(document).ready(function () {
        	$('#ten').select2({
        		width: "95%"
        	});
        	$('#time').select2({
        		width: "95%"
        	});


        });
})


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
        v: 'BÁO CÁO BÁN HÀNG THEO BÁC SĨ:'
      }
      ]);
    //   var r4 = Addrow(4, [{
    //     k: 'C',
    //     v: 'Từ ngày'
    //   }
    //   ]);

      sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + sheet.childNodes[0].childNodes[1].innerHTML;
    },

  }
</script>
@endsection
