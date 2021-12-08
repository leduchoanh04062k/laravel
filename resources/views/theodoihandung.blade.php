@extends('default')
@section('title','Sổ theo dõi hạn dùng')
@section('content')
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Sổ theo dõi hạn dùng</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn_excel" style="padding-right:10px;">
                        <form>
                            <button class="btn bg-primary text-white" onclick="window.print()"><em
                                    class="fa fa-print"></em> In sổ</button>
                        </form>
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
                        <label for="">Năm</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="year" class="form-control fc-datepicker" placeholder="YYYY">
                        </div>
                    </div>
                    <div class="col-md-7 row">
                        <div class="col-md-9">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control" placeholder="Tìm kiếm theo tên hàng hóa..."
                                id="searchBySupplier">

                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" onclick="searchDateTable()"><em class="fa fa-search"></em> Tìm
                                kiếm</button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20">
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" style="width:100%" id="data-table1">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;" style="text-align: center;">Tên
                                    hàng hóa
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Hàm lượng</th>
                                <th scope="col" class="bg-primary" style="color: white;">Số lượng</th>
                                <th scope="col" class="bg-primary" style="color: white;text-align: center;">Hạn sử dụng
                                </th>
                                <th scope="col" class="bg-primary" style="color: white; ">Ghi chú</th>
                            </tr>
                            {{-- <tr>
                                <th scope="col" class="bg-primary" style="color: white;">1</th>
                                <th scope="col" class="bg-primary" style="color: white;">2
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">3</th>
                                <th scope="col" class="bg-primary" style="color: white;">4</th>
                                <th scope="col" class="bg-primary" style="color: white;">5</th>
                                <th scope="col" class="bg-primary" style="color: white;">6
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">7
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">8
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">9
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">10
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">11
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">12
                                </th>
                            </tr> --}}
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
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
    function getdatawarehouse(){
    let dataWarehouse = [];
    $.ajax({
      type:"GET",
      url: "{{ url('hanghoa/getdatawarehouse') }}",
      dataType: 'json',
      async: false,
      success: function(res){
        dataWarehouse = res;
      }
    });
    return dataWarehouse;
  }
  let dataWarehouse = getdatawarehouse();
  getDataUnit();
  function getDataUnit(){
    $.ajax({
      type:"GET",
      url: "{{ url('nhaptunhacungcap/getlistunit') }}",
      dataType: 'json',
      success: function(res){
        dataUnit = res;
      }
    })
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
					(~data[3].toLowerCase().indexOf(supplierName))
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
		ajax : {
			url: "{{ url('theodoihandung') }}",
            "dataSrc" : function (json) {
      var data = json['data'];
      var newData = [], unit = [], idUnit = [], warehouse = [];

      data.forEach(function (a) {
        if (!this[a.UNITID]) {
          this[a.UNITID] = { UNITID: a.UNITID, unit: a.unit, price_sell: a.price_sell, id : a.id};
          idUnit.push(this[a.UNITID]);
        }
      }, Object.create(null));

      idUnit.forEach(function (a){
        if (!this[a.id]) {
          this[a.id] = { id: a.id, unit: '' };
          unit.push(this[a.id]);
        }
        this[a.id].unit += a.unit + ': ' + decimalNumber(a.price_sell) + '; ';
      }, Object.create(null));

      dataWarehouse.forEach(function (a) {
        if (!this[a.stock_id]) {
          this[a.stock_id] = { stock_id: a.stock_id, qty: 0};
          warehouse.push(this[a.stock_id]);
        }
        if((a.type==='import_from_supplier') || (a.type==='import_inventory') || (a.type==='return_from_customer')){
          this[a.stock_id].qty += parseInt(a.qty);
        }else{
          this[a.stock_id].qty -= parseInt(a.qty);
        }
      }, Object.create(null));

      unit.forEach(item=>{
        var flag = 0;
        Object.keys(data).forEach(function(key) {
          if (data[key]['id'] == item.id){
            flag++;
            if(flag==1){
              data[key]['unitWithPrice'] = item.unit;
              newData.push(data[key]);
            }
          }
        });
      })

      for(let i = 0; i< newData.length;i++){
        for(let j = 0;j< warehouse.length;j++){
          if(newData[i].id == warehouse[j].stock_id){
            newData[i].qty = warehouse[j].qty;
          }
        }
      }
      console.log(newData);
      return newData;
    }
		},

		columns: [
		{ data: 'id', name: 'id'},
        { data: 'name', name: 'name'},
        { data: 'content', name: 'content'},
        { data: null, searchable: false,
        "render": function(data,type,row) {
        if(data['qty']){
            return new Intl.NumberFormat('en-US').format(data['qty']);
        }else{
            return  0;
        }
        }
    },
        { data: 'exp_date', name: 'exp_date'},
        { data: 'note', name: 'note'},
		],
	});
	table1.on('order.dt search.dt', function () {
		table1.column(0).nodes().each(function (cell, i) {
			cell.innerHTML = i + 1;
		});
	}).draw();
    searchDateTable();
        // Datepicker
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
</script>
@endsection
