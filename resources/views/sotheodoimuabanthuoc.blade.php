@extends('default')
@section('title','Sổ theo dõi mua bán thuốc')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Sổ theo dõi mua bán thuốc</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn_in" style="padding-right:10px;">
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo"><i
                                class="fa fa-file-excel-o mr-2" aria-hidden="true"></i></button>
                    </div>
                    <div class="btn_excel" style="padding-right:10px;">
                        <form>
                            <button class="btn bg-primary text-white" onclick="window.print()"><em
                                    class="fa fa-print"></em> In sổ</button>
                        </form>
                    </div>
                    <div class="mg-r-10 btn_trove">
                        <a href="{{ asset('baocao')}}">
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
                    <div class="col-md-8 row">
                        <div class="col-md-6">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control" placeholder="Tìm kiếm theo mã phiếu"
                                id="searchBySupplier">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" onclick="searchDateTable()"><em class="fa fa-search"></em>Tìm
                                kiếm</button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20">
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày giao dịch</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã phiếu</th>
                                <th scope="col" class="bg-primary" style="color: white;">Đối tác</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tên thuốc</th>
                                <th scope="col" class="bg-primary" style="color: white;">Thông tin thuốc
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                                <th scope="col" class="bg-primary" style="color: white;">Số lượng nhập</th>
                                <th scope="col" class="bg-primary" style="color: white;">Số lượng xuất</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end  mg-t-15">
                    <a href="{{ asset('baocao')}}">
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
    function checkRangeValue(value){
        if(value<10){
            return "00000"+value
        }else if(value<100){
            return "0000"+value
        }else{
            return "000"+value
        }
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
        ajax: "{{ url('sotheodoimuabanthuoc') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'created_at', name: 'name'},
            {data: null,
                'render':function(data,type,row) {
                    if(data['type']=='import_from_supplier'){
                        return 'PN' +checkRangeValue(data['supplier_id']);
                    }else if(data['type']=='sell'){
                        return 'HD' +checkRangeValue(data['sell_id']);
                    }else if(data['type']=='import_inventory'){
                        return 'PNT' +checkRangeValue(data['inventory_id']);;
                    }else if(data['type']=='return_from_customer'){
                        return 'PKT' +checkRangeValue(data['customer_id']);;
                    }else if(data['type']=='return_from_supplier'){
                        return 'PX' +checkRangeValue(data['return_supplier_id']);;
                    }else if(data['type']=='destruction_export'){
                        return 'PXH' +checkRangeValue(data['destructions_id']);;
                    }else if(data['type']=='import_check_inventory'){
                        return 'PKK' +checkRangeValue(data['check_inventory_id']);;
                    }

                }
            },
            {data: null,
               'render':function(data,type,row){
                        return '';
                }
            },
            {data: 'name', name: 'phone'},
            {data: null,
                'render':function(data,type,row){
                    return '<strong>Số lô:</strong>'+data['lot_no']
                            +'<br/>'+'<strong>HSD:</strong>'+data['exp_date']
                            +'<br/>'+'<strong>Số đăng kí:</strong>'+data['reg_no']
                            +'<br/>'+'<strong>Hàm lượng:</strong>'+data['ingredient']
                            +'<br/>'+'<strong>Hoạt chất chính:</strong>'+data['ingredient']
                            +'<br/>'+'<strong>Hãng SX:</strong>'+data['manufacture']
                            +'<br/>'+'<strong>Nước SX:</strong>'+data['made_in']
                }
            },
            {data: 'unit', name: 'dob'},
            {data: null,
                'render':function(data,type,row){
                    if (data['type']=='import_from_supplier' || data['type']=='import_inventory' || data['type']=='import_check_inventory') {
                        return data['qty'];
                    }else{
                        return '';
                    }
                }
            },
            {data: null,
               'render':function(data,type,row){
                    if (data['type']=='return_from_customer' || data['type']=='return_from_supplier' || data['type']=='destruction_export' || data['type']=='sell') {
                        return data['qty'];
                    }else{
                        return '';
                    }
                }
            },
        ],
        dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'SoTheoDoiThuoc'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
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


    $('.fc-datepicker').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true
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

    });
// Xuất execl
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
        k: 'E',
        v: 'BÁO CÁO THEO DÕI BÁN THUỐC THEO ĐƠN'
      }
      ]);

      sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + sheet.childNodes[0].childNodes[1].innerHTML;
    },
    exportOptions: {
      columns: [1, 2, 3, 4, 5, 6,7,8]
    },
  }
</script>
@endsection
