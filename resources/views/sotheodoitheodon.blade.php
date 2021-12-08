@extends('default')
@section('title','Sổ theo dõi theo đơn')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Sổ theo dõi bán thuốc theo đơn</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn_in" style="padding-right:10px;">
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo"><i
                                class="fa fa-file-excel-o mr-2" aria-hidden="true"></i></button>
                    </div>
                    <div class="btn_excel" style="padding-right:10px;">
                        <form>
                            <button class="btn bg-primary text-white" onclick="window.print()">
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
                        <label for="">Từ ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByStartDate"
                                value="<?php echo(date('01/m/Y'))?>" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Tới ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByEndDate"
                                value="<?php echo(date('d/m/Y'))?>" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="tx-gray-800 tx-bold">Bán theo đơn</label><br>
                        <div class="toggle-wrapper">
                            <div class="toggle toggle-modern primary">
                                <div class="toggle-slide">
                                    <div class="toggle-inner" style="width: 94px; margin-left: 0px;">
                                        <div class="toggle-on active"
                                            style="height: 26px; width: 47px; text-indent: -8.66667px; line-height: 26px;">
                                        </div>
                                        <div class="toggle-blob" style="height: 26px; width: 26px; margin-left: -13px;">
                                        </div>
                                        <div class="toggle-off"
                                            style="height: 26px; width: 47px; margin-left: -13px; text-indent: 8.66667px; line-height: 26px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row tx-gray-900 mg-t-20">
                    <div class="col-md-5">
                        <label for="">Tìm kiếm theo hàng hóa</label>
                        <input class="form-control mr-sm-2" type="search"
                            placeholder="Nhập mã hoặc tên hàng hóa,Ấn Enter để tìm " aria-label="Search">
                    </div>
                    <div class="col-md-7 row">
                        <div class="col-md-9">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control" placeholder="Tìm kiếm theo tên bác sĩ..."
                                id="searchBySupplier">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" onclick="searchDateTable()"><em class="fa fa-search"></em> Tìm
                                kiếm</button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20">
                    <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1" width="100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã hóa đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày bán</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày kê đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tên bệnh nhân</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tên bác sỹ kê đơn
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Cơ sở hành nghề</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tên thuốc</th>
                                <th scope="col" class="bg-primary" style="color: white;">Hoạt chất chính</th>
                                <th scope="col" class="bg-primary" style="color: white;">Hàm lượng</th>
                                <th scope="col" class="bg-primary" style="color: white;">Số lượng</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ghi chú</th>
                            </tr>
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
					(~data[5].toLowerCase().indexOf(supplierName))
					) ? true : false;
			}
			);

		$('#data-table1').DataTable()
		// .columns(6).search($("#searchByStatus").val())
		// .columns(8).search($("#searchByStock").val())
		.draw();

	}
}
    // Datepicker
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
        ajax: "{{ url('sotheodoitheodon') }}",
            columns: [
                { data: 'id', name: 'id'},
                { data: null,
                    "render": function(data,type,row) { return "HD0000"+data["id"]}
                },
                { data: null,
                    "render": function(data,type,row) { return data["date"] + ' '+data["hour"]}
                },
                { data: 'created_at', name: 'id' },
                { data: 'patient', name: 'id' },
                { data: 'doctor', name: 'id' },
                { data: 'medical_facility', name: 'id' },
                { data: 'name'},
                { data: 'manufacture', name: 'id' },
                { data: 'ingredient', name: 'id' },
                { data: null,
                    "render": function(data,type,row) {
                        return data['qty'] +' <span class="font-weight-bold">'+data['unit']+''
                    }
                },
                { data: 'note'},
            ],
        dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'SoTheoDoiThuocTheoDon'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
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
        selectOtherMonths: true,
        dateFormat:'dd/mm/yy'
    });

    $('#datepickerNoOfMonths').datepicker({
        showOtherMonths: true,
        selectOtherMonths: true,
        numberOfMonths: 2
    });
    $('.toggle').toggles({
        on: true,
        height: 26
    });
    $('#closeCong').click(function () {
        $('#cong').modal("hide");
    })

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
      columns: [1, 2, 3, 4, 5, 6,7,8,9,10,11]
    },
  }
</script>
@endsection
