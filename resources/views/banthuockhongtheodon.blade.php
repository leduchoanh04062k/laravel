@extends('default')
@section('title','Sổ theo dõi bán thuốc không theo đơn')
@section('content')
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Sổ theo dõi bán thuốc theo đơn</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn_in" style="padding-right:10px;">
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo">
                            <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="btn_excel" style="padding-right:10px;">
                        <form>
                            <button class="btn bg-primary text-white" onclick="window.print()">
                                <em class="fa fa-print"></em>
                                In sổ
                                nhập trước</button>
                        </form>
                    </div>
                    <div class="mg-r-10 btn_trove">
                        <a href="{{asset('baocao')}}">
                            <button type="button" class="btn btn-danger" id="inTab2">
                                <em class="fa fa-reply"></em>
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
                </div>
                <div class="row tx-gray-900 mg-t-20">
                    <div class="col-md-5">
                        <label for="">Tìm kiếm theo hàng hóa</label>
                        <input class="form-control mr-sm-2" type="search"
                            placeholder="Nhập mã hoặc tên hàng hóa,Ấn Enter để tìm" aria-label="Search">
                    </div>
                    <div class="col-md-7 row">
                        <div class="col-md-9">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control" id="searchBySupplier"
                                placeholder="Tìm kiếm theo mã hoá đơn....">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"> <i
                                    class="fas fa-search" style="padding: 3px"></i>Tìm kiếm</button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20">
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã hóa đơn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày bán</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tên thuốc</th>
                                <th scope="col" class="bg-primary" style="color: white;">Hoạt chất chính</th>
                                <th scope="col" class="bg-primary" style="color: white;">Hàm lượng
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Số lượng</th>
                                <th scope="col" class="bg-primary" style="color: white;">Chú ý</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end  mg-t-15">
                    <a href="{{asset('baocao')}}">
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
    function total(){
	}
    function searchDateTable(){

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
            (~data[3].toLowerCase().indexOf(supplierName))
            ) ? true : false;
    }
    );

$('#data-table1').DataTable()
.draw();

}

$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

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
			url: "{{ url('banthuockhongtheodon') }}",
            "dataSrc" : function (result) {
				result['data'].forEach(item=>{
					item.total = total(item.qty,item.price,item.discount,item.VAT);
				});
				var newData = [], idArr = [];

				result['data'].forEach(function (a) {
					if (!this[a.id]) {
						this[a.id] = { id: a.id, total: 0, stockName : ''};
						idArr.push(this[a.id]);
					}
					this[a.id].total += parseFloat(a.total);
					this[a.id].stockName += a.stockName + ' ';
				}, Object.create(null));

				idArr.forEach(item=>{
					var flag = 0;
					Object.keys(result['data']).forEach(function(key) {
						if (result['data'][key]['id'] == item.id){
							flag++;
							if(flag==1){
								result['data'][key]['total'] = item.total;
								result['data'][key]['stockName'] = item.stockName;
								newData.push(result['data'][key]);
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
		{ data: null,
            "render": function(data,type,row) { return "HD0000"+data["id"]}
        },
		{ data: null,
            "render": function(data,type,row) { return data["date"] +' '+data["hour"]}
        },
		{ data: 'name', name: 'name',},
		{ data: 'ingredient', name: 'ingredient',},
		{ data: 'content', name: 'content',},
        { data: null,
            "render": function(data,type,row) {
                return data['qty'] +' <span class="font-weight-bold">'+data['unit']+''
            }
        },
		{ data: 'note', name: 'note',},
		],
        dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'SoTheoDoiThuocKhongTheoDon'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
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
        k: 'D',
        v: 'BÁO CÁO THEO DÕI BÁN THUỐC THEO ĐƠN'
      }
      ]);

      sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + sheet.childNodes[0].childNodes[1].innerHTML;
    },
    exportOptions: {
      columns: [1, 2, 3, 4, 5, 6,7]
    },
  }
</script>
@endsection
