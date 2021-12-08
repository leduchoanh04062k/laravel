@extends('default')
@section('title','Tổng quan')
@section('content')
<div class="br-mainpanel">
	<div class="pd-30">
		<h4 class="tx-gray-800 mg-b-5">Quầy thuốc</h4>
	</div><!-- d-flex -->

	<div class="br-pagebody mg-t-5 pd-x-30">
		<div class="row ">
			<div class="col-sm-6 col-xl-3">
				<div class="bg-teal rounded overflow-hidden pos-relative">
					<div class="pd-25">
						<i class="ion ion-earth tx-80 lh-0 tx-white op-7 pos-absolute l-20" style="opacity:0.3;top:50%;transform:translateY(-50%);"></i>
						<div style="text-align:end;font-weight:700;" >
							<p class="tx-12 tx-spacing-1 tx-uppercase tx-white mg-b-10">Doanh số</p>
							<p class="tx-14 tx-white tx-lato mg-b-2 lh-1">Tháng trước: <span id="revenueLastMonth" style="font-size: 150%"></span> </p>
							<span class="tx-14 tx-roboto tx-white">Tháng này: <span id="revenueThisMonth" style="font-size: 150%"></span></span>
						</div>
					</div>
				</div>
			</div><!-- col-6 -->
			<div class="col-sm-6 col-xl-3 mg-t-20 mg-sm-t-0">
				<div class="bg-danger rounded overflow-hidden pos-relative">
					<div class="pd-25">
						<i class="ion ion-bag tx-60 lh-0 tx-white op-7 pos-absolute l-20" style="opacity:0.3;top:50%;transform:translateY(-50%);"></i>
						<div style="text-align:end;font-weight:700;" >
							<p class="tx-12 tx-spacing-1 tx-uppercase tx-white mg-b-10">Hoá đơn</p>
							@if($hoadonhtt > 0)
							<p class="tx-14 tx-white tx-lato mg-b-2 lh-1">Tháng trước: <span style="font-size: 150%" > {{ $hoadontt }} </span>đơn ({{ $hoadonhtt }}đ.hủy)</p>
							@else
							<p class="tx-14 tx-white tx-lato mg-b-2 lh-1">Tháng trước: <span style="font-size: 150%" > {{ $hoadontt }} </span>đơn</p>
							@endif
							{{-- <p class="tx-14 tx-white tx-lato mg-b-2 lh-1">Tháng trước: <span> {{ $hoadontt }} </span>đơn ({{ $hoadonhtt }} đ.hủy)</p> --}}
							@if($hoadonhtn > 0)
							<span class="tx-14 tx-roboto tx-white">Tháng này: <span style="font-size: 150%" >{{ $hoadontn }} </span>đơn ({{ $hoadonhtn }}đ.hủy)</span>
							@else
							<span class="tx-14 tx-roboto tx-white">Tháng này: <span style="font-size: 150%" >{{ $hoadontn }} </span>đơn</span>
							@endif
							{{-- <span class="tx-14 tx-roboto tx-white">Tháng này: {{ $hoadontn }} đơn ({{ $hoadonhtn }}đ.hủy)</span> --}}
						</div>
					</div>
				</div>
			</div><!-- col-6 -->
			<div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
				<div class="bg-primary rounded overflow-hidden pos-relative">
					<div class="pd-25 ">
						<i class="ion ion-monitor tx-60 lh-0 tx-white op-7 pos-absolute l-20" style="opacity:0.3;top:50%;transform:translateY(-50%);"></i>
						<div style="text-align:end;font-weight:700;">
							<p class="tx-12 tx-spacing-1 tx-uppercase tx-white mg-b-10">Báo cáo trong ngày</p>
							@if($hoadonh > 0)
							<p class="tx-14 tx-white tx-lato mg-b-2 lh-1">Hoá đơn: <span style="font-size: 150%" >{{ $hoadon }} </span>đơn ({{ $hoadonh }}đ.hủy)</p>
							@else
							<p class="tx-14 tx-white tx-lato mg-b-2 lh-1">Hoá đơn: <span style="font-size: 150%" >{{ $hoadon }} </span>đơn</p>
							@endif
							<span class="tx-14 tx-roboto tx-white">Doanh số: <span id="revenuePerDay" style="font-size: 150%" ></span></span>
						</div>
					</div>
				</div>
			</div><!-- col-6 -->
			<div class="col-sm-6 col-xl-3 mg-t-20 mg-xl-t-0">
				<div class="bg-br-primary rounded overflow-hidden pos-relative">
					<div class="pd-25">
						<i class="ion ion-clock tx-60 lh-0 tx-white op-7 pos-absolute l-20" style="opacity:0.3;top:50%;transform:translateY(-50%);"></i>
						<div style="text-align:end;font-weight:700;">
							<p class="tx-12 tx-spacing-1 tx-uppercase tx-white mg-b-10">Thuốc sắp hết hạn</p>
							<p class="tx-14 tx-white tx-lato mg-b-2 lh-1">Tháng này: <span style="font-size: 150%" id="thuocSapHetHan" ></span> loại</p>
							<span class="tx-14 tx-roboto tx-white">H.Hóa sắp hết hàng: <span style="font-size: 150%" id="hangHoaSapHetHang" ></span> loại</span>
						</div>
					</div>
				</div>
			</div><!-- col-6 -->
		</div><!-- row -->

		<div class="row mg-t-20">
			<div class="col-8 ">
				<div class="card  bd-0 shadow-base">
					<div class="pd-x-30 pd-t-30 pd-b-15">
						<div class=" align-items-center justify-content-between">
							<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Doanh số bán hàng tháng này</h6>
							<div id="morrisBar1" class="ht-200 ht-sm-300 bd"></div>
							<div class="text-center">
								{{-- span --}}
							</div>
						</div><!-- d-flex -->
					</div>
				</div><!-- card -->
			</div><!-- col-8 -->

			<div class="col-4" id="style-1">
				<div class="card bd-0 shadow-base pd-30" style="max-height: 370px;">
					<!-- Nav pills -->
					<ul class="nav nav-pills">
						<li class="nav-item">
							<a class="nav-link" data-toggle="pill" href="#tab1">Hoạt động gần đây</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" data-toggle="pill" href="#tab2">Câu hỏi thường gặp</a>
						</li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content" style="overflow-y:auto;">
						<div class="tab-pane fade" id="tab1">
							<ul class="feeds ng-scope">
								<li ng-repeat="" class="ng-scope" style="">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success ng-scope" >
													<em class="fa fa-ambulance"></em>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc ng-binding">
													<a href="#" class="ng-binding">hni01g8030588_admin</a> vừa <a ng-click="" class="ng-binding">
														tạo phiếu nhập từ nhà cung cấp [PN000063] với giá trị
													</a>
													<strong class="ng-binding">229,977.00</strong>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date ng-binding"><i>05/08/2021 15:45</i></div>
										</div>
									</div>
								</li>
								<li ng-repeat="" class="ng-scope" style="">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success ng-scope" >
													<em class="fa fa-ambulance"></em>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc ng-binding">
													<a href="#" class="ng-binding">hni01g8030588_admin</a> vừa <a ng-click="" class="ng-binding">
														tạo phiếu nhập từ nhà cung cấp [PN000063] với giá trị
													</a>
													<strong class="ng-binding">229,977.00</strong>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date ng-binding"><i>05/08/2021 15:45</i></div>
										</div>
									</div>
								</li>
								<li ng-repeat="" class="ng-scope" style="">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success ng-scope" >
													<em class="fa fa-ambulance"></em>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc ng-binding">
													<a href="#" class="ng-binding">hni01g8030588_admin</a> vừa <a ng-click="" class="ng-binding">
														tạo phiếu nhập từ nhà cung cấp [PN000063] với giá trị
													</a>
													<strong class="ng-binding">229,977.00</strong>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date ng-binding"><i>05/08/2021 15:45</i></div>
										</div>
									</div>
								</li>
								<li ng-repeat="" class="ng-scope" style="">
									<div class="col1">
										<div class="cont">
											<div class="cont-col1">
												<div class="label label-sm label-success ng-scope" >
													<em class="fa fa-ambulance"></em>
												</div>
											</div>
											<div class="cont-col2">
												<div class="desc ng-binding">
													<a href="#" class="ng-binding">hni01g8030588_admin</a> vừa <a ng-click="" class="ng-binding">
														tạo phiếu nhập từ nhà cung cấp [PN000063] với giá trị
													</a>
													<strong class="ng-binding">229,977.00</strong>
												</div>
											</div>
										</div>
										<div class="col2">
											<div class="date ng-binding"><i>05/08/2021 15:45</i></div>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<div class="tab-pane active" id="tab2">
							<ul id="haoi" class="pd-0" style="list-style:none;">
								<a href="{{ asset('huongdansudung') }}" class="text-muted active">
									<li class="d-flex mg-t-10 btN_hover pd-10 bd-b" >
										<div style="align-self:center;width: 10%;color:#78e0e8" class="tx-20"><i class="fas fa-question-circle" aria-hidden="true"></i></div>
										<div style="width:90%;">Làm thế nào khi bán hàng gặp lỗi "Có lỗi xảy ra trong quá trình xử lý"?</div>
									</li >
								</a>
								<a href="{{ asset('huongdansudung') }}" class="text-muted">
									<li class="d-flex btN_hover pd-10 bd-b">
										<div style="align-self:center;width: 10%;color:#78e0e8" class="tx-20"><i class="fas fa-question-circle" aria-hidden="true"></i></div>
										<div style="width:90%;">Làm sao biết hệ thống có liên thông dữ liệu lên hệ thống quốc gia?</div>
									</li>
								</a>
								<a href="{{ asset('huongdansudung') }}" class="text-muted">
									<li class="d-flex btN_hover pd-10 bd-b">
										<div style="align-self:center;width: 10%;color:#78e0e8" class="tx-20"><i class="fas fa-question-circle" aria-hidden="true"></i></div>
										<div style="width:90%;">Làm thế nào để reset dữ liệu, để nhập lại?</div>
									</li>
								</a>
								<a href="{{ asset('huongdansudung') }}" class="text-muted">
									<li class="d-flex pd-10 bd-b btN_hover">
										<div style="align-self:center;width: 10%;color:#78e0e8" class="tx-20"><i class="fas fa-question-circle" aria-hidden="true"></i></div>
										<div style="width:90%;">Làm thế nào khi không quét được mã vạch?</div>
									</li>
								</a>
								<a href="{{ asset('huongdansudung') }}" class="text-muted">
									<li class="d-flex pd-10 bd-b btN_hover">
										<div style="align-self:center;width: 10%;color:#78e0e8" class="tx-20"><i class="fas fa-question-circle" aria-hidden="true"></i></div>
										<div style="width:90%;"> Làm thế nào để đổi mật khẩu tài khoản?</div>
									</li>
								</a>
								<a href="{{ asset('huongdansudung') }}" class="text-muted">
									<li class="d-flex pd-10 bd-b btN_hover">
										<div style="align-self:center;width: 10%;color:#78e0e8" class="tx-20"><i class="fas fa-question-circle" aria-hidden="true"></i></div>
										<div style="width:90%;">Làm thế nào khi có thắc mắc cần được hỗ trợ, yêu cầu các chức năng mới?</div>
									</li>
								</a>
								<a href="{{ asset('huongdansudung') }}" class="text-muted">
									<li class="d-flex pd-10 bd-b btN_hover">
										<div style="align-self:center;width: 10%;color:#78e0e8" class="tx-20"><i class="fas fa-question-circle" aria-hidden="true"></i></div>
										<div style="width:90%;">Làm thế nào để cập nhật nhiệt độ, độ ẩm?</div>
									</li>
								</a>
							</ul>
						</div>
					</div>
				</div><!-- card -->

			</div><!-- col-4 -->
		</div><!-- row -->

		<div class="col-12 mg-t-20 pd-0">
			<div class="card pd-0 bd-0 shadow-base pd-x-30 pd-t-30 pd-b-15">
				<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1 pd-b-10">Cảnh báo hàng hoá</h6>
				<!-- Nav tabs -->
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#tab21">
							Hàng hoá sắp hết hàng <span class="badge rounded-pill bg-primary" id="info-data-table1" style="font-size: 90%"></span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#tab22">
							Hàng hoá sắp hết hạn <span class="badge rounded-pill bg-warning" id="info-data-table2" style="font-size: 90%"></span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#tab23">
							Hàng hoá đã hết hạn <span class="badge rounded-pill bg-danger" id="info-data-table3" style="font-size: 90%"></span>
						</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content mg-t-20">
					<div class="tab-pane active" id="tab21">
						<table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1" style="width: 100%" >
							<thead>
								<tr>
									<th scope="col" class="bg-primary" style="color: white;width: 20%">Mã HH</th>
									<th scope="col" class="bg-primary" style="color: white;width: 65%">Tên HH</th>
									<th scope="col" class="bg-primary" style="color: white;width: 15%">S.lượng</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
					<div class="tab-pane  fade" id="tab22">
						<table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table2" style="width: 100%;">
							<thead>
								<tr>
									<th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
									<th scope="col" class="bg-primary" style="color: white;">Tên HH</th>
									<th scope="col" class="bg-primary" style="color: white;">Số lô</th>
									<th scope="col" class="bg-primary" style="color: white;">S.lượng</th>
									<th scope="col" class="bg-primary" style="color: white;">HSD</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
					<div class="tab-pane  fade" id="tab23">
						<table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3" style="width: 100%;">
							<thead>
								<tr>
									<th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
									<th scope="col" class="bg-primary" style="color: white;">Tên HH</th>
									<th scope="col" class="bg-primary" style="color: white;">Số lô</th>
									<th scope="col" class="bg-primary" style="color: white;">S.lượng</th>
									<th scope="col" class="bg-primary" style="color: white;">HSD</th>
								</tr>
							</thead>
							<tbody>

							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

		<div class="col-12 mg-t-20 pd-0">
			<div class="card pd-0 bd-0 shadow-base pd-x-30 pd-t-30 pd-b-15">
				<h6 class="tx-13 tx-uppercase tx-inverse tx-semibold tx-spacing-1">Top 10 hàng hoá bán chạy</h6>
				<div class="bd pd-t-30 pd-b-20 pd-x-20"><canvas id="chartBar1" height="160"></canvas></div>
			</div>

		</div>
	</div>

</div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<style type="text/css">
	div#data-table1_paginate{
		float:none;
		text-align:center
	}
	div#data-table3_paginate{
		float:none;
		text-align:center
	}
	.btN_hover:hover {
		background-color: #f7f8f9;
	}
	.feeds {
		border-left: 2px solid #ccc;
		padding: 0 0 10px 32px;
		margin-left: 15px;
	}
	.feeds li {
		background: transparent;
		position: relative;
		left: -44px;
	}
	.feeds li .cont-col2 {
		margin-left: 50px;
		width: auto;
	}
	.feeds li .col1>.cont>.cont-col1 {
		float: left;
		margin-right: -100%;
	}
	.feeds li .col2 {
		margin-left: 50px;
		margin-top: 10px;
		width: auto;
	}
	.feeds li .col2>.date {
		margin-top:5px;
		padding: 0;
		text-align: left;
		font-size: 13px;
	}
	.feeds li .col1>.cont {
		float: left;
		margin-right: 40px;
		overflow: hidden;
	}
	.feeds li .col1>.cont>.cont-col1>.label {
		margin-top: 14px;
		border-radius: 48%;
	}
	.feeds li .col1>.cont>.cont-col1>.label {
		display: inline-block;
		padding: 5px 4px 6px 8px;
		vertical-align: middle;
		text-align: center;
	}
	.label:not(.md-skip).label-sm {
		font-size: 14px;
		font-weight: 600;
		padding: 3px 6px 3px 6px;
	}
	.label.label-sm {
		font-size: 13px;
		padding: 2px 5px 2px 5px;
	}
	.md-shadow-z-1, .alert, .badge, .btn:not(.md-skip):not(.bs-select-all):not(.bs-deselect-all), .btn-group>.btn:not(.md-skip):not(.bs-select-all):not(.bs-deselect-all), .btn.btn-link:not(.md-skip):not(.bs-select-all):not(.bs-deselect-all):hover, .icon-btn, .label:not(.md-skip), .note, .panel, .social-icons li>a, .social-icons.social-icons-color>li>a, .well {
		box-shadow: 0 1px 3px rgb(0 0 0 / 10%), 0 1px 2px rgb(0 0 0 / 18%);
	}
	.label-success {
		background-color: #337ab7;
	}
	.label {
		text-shadow: none!important;
		font-size: 14px;
		font-weight: 300;
		padding: 3px 6px 3px 6px;
		color: #fff;
		font-family: "Open Sans",sans-serif;
	}
</style>
<script>
	$.ajax({
		type: "GET",
		url: "{{ url('tongquan/hoatDongGanDay') }}",
		dateType: "json",
		success: function(res){
			res.forEach(item=>{
				item.total = item.qty*item.price;
			})
			console.log(res);
		}
	});

	function daysInMonth() {
		var dt = new Date();
		const month = dt.getMonth()+1;
		const year = dt.getFullYear();
		return new Date(year, month, 0).getDate();
	}

	let dataLotNo = [];
	let hanghoaTongQuan = [];
	$.ajax({
		type:"GET",
		url: "{{ url('tongquan/getdatalotno') }}",
		dataType: 'json',
		async: false,
		success: function(suc){
			dataLotNo = suc;
		}
	});
	dataLotNo.forEach(function (a) {
		if (!this[a.lotno_id]) {
			this[a.lotno_id] = { lotno_id: a.lotno_id, qty: 0,name:a.name,stock_id:a.stock_id,exp_date:a.exp_date,lot_no:a.lot_no};
			hanghoaTongQuan.push(this[a.lotno_id]);
		}
		if((a.type=='import_from_supplier') || (a.type=='import_inventory') || (a.type=='return_from_customer')){
			this[a.lotno_id].qty += parseInt(a.qty);
		}else{
			this[a.lotno_id].qty -= parseInt(a.qty);
		}
	}, Object.create(null));

	$(document).ready(function() {
		$('#revenueLastMonth').text(decimalNumber({{ $dstt }}));
		$('#revenueThisMonth').text(decimalNumber({{ $dstn }}));
		$('#revenuePerDay').text(decimalNumber({{ $hoadon1 }}));

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
		let dataTable1 = [];
		let dataTable2 = [];
		let dataTable3 = [];
		let topBanChay = [];
		hanghoaTongQuan.forEach(item=>{
			if(item.qty<=10){
				dataTable1.push(item);
			}
		})
		$('#hangHoaSapHetHang').text(dataTable1.length);

		$.ajax({
			type: "GET",
			url: "{{ url('tongquan/sell_product') }}",
			async: false,
			success: function(response){
				topBanChay = response;
			}
		})

		hanghoaTongQuan.forEach(item=>{
			let temp = (item.exp_date).split('/');
			item.checkDate = temp[2]+'-'+temp[1]+'-'+temp[0];
		})

		let today = new Date();
		let aMonthFromNow = new Date(today.setMonth(today.getMonth()+1));
		let yesterday = new Date(Date.now() - ( 3600 * 1000 * 24));

		hanghoaTongQuan.forEach(item=>{
			let asd = '';
			asd = new Date(item.checkDate);
			if((asd.getTime() < aMonthFromNow.getTime())&&(asd.getTime() >= yesterday.getTime())){
				dataTable2.push(item);
			}
		})

		$('#thuocSapHetHan').text(dataTable2.length);

		hanghoaTongQuan.forEach(item=>{
			let asd = '';
			asd = new Date(item.checkDate);
			if(asd.getTime() < yesterday.getTime()){
				dataTable3.push(item);
			}
		})

		var table1 = $('#data-table1').DataTable({
			"responsive": true,
			"pagingType": "full_numbers",
			"lengthChange": false,
			"ordering": false,
			"lengthMenu": [5],
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
			aaData: dataTable1,
			columns: [
			{ data: null,
				"render": function(data,type,row) { return "HH"+checkRangeValue(data["stock_id"])}
			},
			{ data: 'name', name: 'name' },
			{ data: 'qty', name: 'qty' },
			]
		});
		var table2 = $('#data-table2').DataTable({
			"responsive": true,
			"pagingType": "full_numbers",
			"lengthChange": false,
			"ordering": false,
			"lengthMenu": [5],
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
			aaData: dataTable2,
			columns: [
			{ data: null,
				"render": function(data,type,row) { return "HH"+checkRangeValue(data["stock_id"])}
			},
			{ data: 'name', name: 'name' },
			{ data: 'lot_no', name: 'lot_no' },
			{ data: 'qty', name: 'qty' },
			{ data: 'exp_date', name: 'exp_date' },
			]
		});
		var table3 = $('#data-table3').DataTable({
			"responsive": true,
			"pagingType": "full_numbers",
			"lengthChange": false,
			"ordering": false,
			"lengthMenu": [5],
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
			aaData: dataTable3,
			columns: [
			{ data: null,
				"render": function(data,type,row) { return "HH"+checkRangeValue(data["stock_id"])}
			},
			{ data: 'name', name: 'name' },
			{ data: 'lot_no', name: 'lot_no' },
			{ data: 'qty', name: 'qty' },
			{ data: 'exp_date', name: 'exp_date' },
			]
		});

		const months = daysInMonth();
		var dates = [];

		for(let i=1;i<=months;i++){
			dates.push(i);
		}

		function getTotalRevenueThisMonth(){
			let valueA =[];
			$.ajax({
				type: "get",
				url: '{{url('tongquan/lastDayChart') }}',
				async: false,
				success: function(res){
					valueA = res;
				}
			});
			return valueA;
		}
		function getTotalRevenueLastMonth(){
			let valueB = [];
			$.ajax({
				type: "get",
				url: '{{url('tongquan/dayChart') }}',
				async: false,
				success: function(response){
					valueB = response;
				}
			});
			return valueB;
		}

		let valueA = getTotalRevenueThisMonth();
		let valueB = getTotalRevenueLastMonth();
		var z=0;
		var myArray = [];

		for (tot=dates.length; z < tot; z++) {
			myArray.push({'y': dates[z], 'a': valueA[z], 'b': valueB[z]});
		}

		Morris.Bar({
			element: 'morrisBar1',
			data: myArray,
			xkey: 'y',
			ykeys: ['a', 'b'],
			labels: ['Tháng trước', 'Tháng này'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true,
			fillOpacity: 0.25,
			barColors: ['#5058AB', '#14A0C1'],
			parseTime: false,
			xLabelFormat: function (x) {
				var month = dates[x.x];
				return month;
			},
		});

		let labelBestSeller = [];
		let dataBestSeller = [];
		topBanChay.forEach(item=>{
			labelBestSeller.push(item.name);
			dataBestSeller.push(item.qtys)
		})

		var ctx = document.getElementById('chartBar1').getContext('2d');
		new Chart(ctx, {
			type: 'horizontalBar',
			data: {
				labels: labelBestSeller,
				datasets: [{
					label: 'Tổng số lượng bán',
					data: dataBestSeller,
					backgroundColor: '#27AAC8'
				}]
			},
			options: {
				legend: {
					display: false,
					labels: {
						display: false
					}
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true,
							fontSize: 14
						}
					}],
					xAxes: [{
						ticks: {
							beginAtZero:true,
							fontSize: 11
						}
					}]
				}
			}
		});


	})
$(function(){
	'use strict'
        // FOR DEMO ONLY
        // menu collapsed by default during first page load or refresh with screen
        // having a size between 992px and 1299px. This is intended on this page only
        // for better viewing of widgets demo.
        $(window).resize(function(){
        	minimizeMenu();
        });
        minimizeMenu();
        function minimizeMenu() {
        	if(window.matchMedia('(min-width: 992px)').matches && window.matchMedia('(max-width: 1299px)').matches) {
            // show only the icons and hide left menu label by default
            $('.menu-item-label,.menu-item-arrow').addClass('op-lg-0-force d-lg-none');
            $('body').addClass('collapsed-menu');
            $('.show-sub + .br-menu-sub').slideUp();
        } else if(window.matchMedia('(min-width: 1300px)').matches && !$('body').hasClass('collapsed-menu')) {
        	$('.menu-item-label,.menu-item-arrow').removeClass('op-lg-0-force d-lg-none');
        	$('body').removeClass('collapsed-menu');
        	$('.show-sub + .br-menu-sub').slideDown();
        }
    }

});
</script>
@endsection
