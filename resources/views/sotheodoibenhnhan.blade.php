@extends('default')
@section('title','Sổ theo dõi thông tin bệnh nhân')
@section('content')
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Sổ theo dõi thông tin bệnh nhân</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn_in" style="padding-right:10px;">
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo">
                            <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="btn_excel" style="padding-right:10px;">
                        <form>
                            <button class="btn bg-primary text-white" onclick="window.print()"><em
                                    class="fa fa-print"></em> In sổ</button>
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
                        <label for="">Tìm kiếm theo </label>
                        <select class="js-example-basic-single form-control" id="date" name="state">
                            <option value="">Ngày bán</option>
                            <option value="">Ngày kê đơn</option>
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
                    <div class="col-md-5 row">
                        <div class="col-md-10">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control" placeholder="Tìm kiếm theo mã hoá đơn...."
                                id="searchBySupplier">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" onclick="searchDateTable()"><em class="fa fa-search"></em>Tìm
                                kiếm</button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20">
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:10px;width:2%;text-align:center;">#</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:50px;width:10%;text-align:center;">Mã hóa đơn</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:50px;width:10%;text-align:center;">Ngày bán</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:50px;width:10%;text-align:center;">Mã đơn thuốc</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:50px;width:10%;text-align:center;">Ngày kê đơn</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:150px;width:10%;text-align:center;">Bệnh nhân
                                </th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:50px;width:10%;text-align:center;">BS kê đơn
                                </th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:50px;width:10%;text-align:center;">Cơ sở khám bệnh
                                </th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:50px;width:10%;text-align:center;">Chuẩn đoán bệnh
                                </th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:80px;width:10%;text-align:center;">Thuốc sử dụng</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:150px;width:10%;text-align:center;">Thông tin thuốc
                                </th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:30px;width:10%;text-align:center;">ĐVT
                                </th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:30px;width:10%;text-align:center;">Số lượng</th>
                                <th scope="col" class="bg-primary"
                                    style="color: white;min-width:30px;width:10%;text-align:center;">Cách sử dụng</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
                <div class="d-flex justify-content-end  mg-t-15">
                    <a href="{{asset('baocao')}}">
                        <button class="btn btn-danger" id="outTab2">
                            <em class="fa fa-reply"></em>
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
    function total(){}
    function decialNumber(number){
		return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
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
		.draw();

	}
}

    $(document).ready(function () {
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
    url: "{{ url('sotheodoibenhnhan') }}",
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
        { data: null,
			"render": function(data,type,row) { return "HD"+checkRangeValue(data["id"]) }
		},
        { data: null,
            "render": function(data,type,row) { return data["date"] +' '+data["hour"]}
        },
        { data: null,
			"render": function(data,type,row) { return "HD"+checkRangeValue(data["id"]) }
		},
		{ data: null,
            "render": function(data,type,row) { return data["date"] +' '+data["hour"]}
        },
        { data: null,
            "render": function(data,type,row) {
                return "<strong>Tên :</strong>" +data['patient'] +'</br><strong>Tuổi :</strong>'+(data['year_old'])+
                '</br><strong>Giới tính :</strong>'+(data['male_female'])+
                '</br><strong>Địa chỉ bệnh nhân :</strong>'+(data['address'])+
                '</br><div><strong>Người giám hộ :</strong>'+(data['guardian'])+'</div>'
            }
        },
        { data: 'doctor', name: 'doctor',},
        { data: 'medical_facility', name: 'medical_facility',},
        { data: 'diagnostic', name: 'diagnostic',},
        { data: 'name', name: 'name',},
        { data: null,
            "render": function(data,type,row) {
                return "<strong>Số lô :</strong>" +data['lot_no'] +'</br><strong>Hạn sử dụng :</strong>'+(data['exp_date'])+
                '</br><strong>Số đăng ký :</strong>'+(data['reg_no'])+
                '</br><strong>Hàm lượng :</strong>'+(data['content'])+
                '</br><strong>Hoạt chất chính  :</strong>'+(data['manufacture'])+
                '</br><strong>Hãng SX:</strong>'+(data['ingredient'])+
                '</br><div><strong>Nước SX :</strong>'+(data['made_in'])+'</div>'
            }
        },
        { data: 'unit', name: 'unit',},
        { data: 'qty', name: 'qty',},
        { data: 'note', name: 'note',},
		],
        dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'SoTheoDoiBenhNhan'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
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
        v: 'SỔ THEO DÕI BỆNH NHÂN'
      }
      ]);

      sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + sheet.childNodes[0].childNodes[1].innerHTML;
    },

  }
</script>
@endsection
