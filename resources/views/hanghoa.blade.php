@extends('default')
@section('title','Hàng hóa')
@section('content')
<div class="br-mainpanel">
	<div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
		<h4 class="tx-gray-800 mg-b-5 tx-uppercase">Quản lý hàng hoá</h4>
		<div class="d-flex">
			<div class="mg-r-10">
				<!-- Button thêm mới hàng hoá -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
					<i class="fa fa-plus" aria-hidden="true"></i>
					Thêm mới hàng hoá
				</button>

				<!-- Modal thêm mới hàng hoá-->
				<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document" style="max-width:none;width:75em;vertical-align: top;">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thêm mới hàng hoá</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>

							<form id="addStockForm" name="addStockForm">
								<div class="modal-body" style="padding-bottom:0px;padding-left:25px;padding-right:25px">
									<div class="row">
										<div class="col-md-12">
											<label for="" class="tx-gray-800 tx-bold">Sao chép thông tin thuốc</label>
											<input type="text" id="autoSearchTable" class="form-control"
											placeholder="Nhập thông tin thuốc muốn sao chép">
										</div>
									</div>
									<div class="row mg-t-10">
										<div class="col-md-6">
											<label for="" class="tx-gray-800 tx-bold">Tên hàng hoá <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="name" name="name">
										</div>
										<div class="col-md-3">
											<label for="" class="tx-gray-800 tx-bold">Mã hàng hoá</label>
											<input type="text" class="form-control" id="" placeholder="Mã tự động">
										</div>
										<div class="col-md-3">
											<label for="" class="tx-gray-800 tx-bold">Bán theo đơn</label><br>
											<input type="hidden" name="prescription_drug" class="prescription_drug">
											<div class="toggle-wrapper">
												<div class="toggle toggle-modern primary">
													<div class="toggle-slide">
														<div class="toggle-inner" style="width: 94px; margin-left: -24pxpx;">
															<div class="toggle-off active"
															style="height: 26px; width: 47px; margin-left: -13px; text-indent: 8.66667px; line-height: 26px;">
														</div>
														<div class="toggle-blob" style="height: 26px; width: 26px; margin-left: -13px;">
														</div>
														<div class="toggle-on"
														style="height: 26px; width: 47px; text-indent: -8.66667px; line-height: 26px;">
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row mg-t-10">
								<div class="col-md-6">
									<div>
										<label for="" class="tx-gray-800 tx-bold">Loại hàng hoá</label>
									</div>
									<select name="stock_type" id="stock_type" class="form-control select2" style="width: 100%">
										<option value="Dược phẩm">Dược phẩm</option>
										<option value="Vật tư y tế">Vật tư y tế</option>
										<option value="Hàng hoá khác">Hàng hoá khác</option>
									</select>
								</div>
								<div class="col-md-6">
									<label for="" class="tx-gray-800 tx-bold">Nhóm hàng hoá</label>
									<div class="pos-relative">
										<select name="stock_group" class="form-control" id="stock_group" style="width: 100%">
											<option></option>
											@foreach (App\Models\StockGroup::all() as $stockgroup)
											<option value="{{ $stockgroup->name }}">
												{{ $stockgroup->name }}
											</option>
											@endforeach
										</select>
										<!-- Button cộng -->
                        {{-- <button type="button" class="btn btn-primary pos-absolute r-0 t-0" data-toggle="modal"
                     data-target="#cong">
                     <i class="fa fa-plus" aria-hidden="true"></i>
                 </button> --}}
             </div>
         </div>
     </div>
     <div class="row mg-t-10">
     	<div class="col-md-3">
     		<label for="" class="tx-gray-800 tx-bold">Số đăng ký <span class="text-danger">*</span></label>
     		<input type="text" class="form-control" id="reg_no" name="reg_no">
     	</div>
     	<div class="col-md-3">
     		<label for="" class="tx-gray-800 tx-bold">Hoạt chất</label>
     		<input type="text" class="form-control" id="ingredient" name="ingredient">
     	</div>
     	<div class="col-md-3">
     		<label for="" class="tx-gray-800 tx-bold">Hàm lượng</label>
     		<input type="text" class="form-control" id="content" name="content">
     	</div>
     	<div class="col-md-3">
     		<label for="" class="tx-gray-800 tx-bold">Quy cách đóng gói</label>
     		<input type="text" class="form-control" id="packaging" name="packaging">
     	</div>
     </div>
     <div class="row mg-t-10">
     	<div class="col-md-6">
     		<label for="" class="tx-gray-800 tx-bold">Hãng sản xuất</label>
     		<input type="text" class="form-control" id="manufacture" name="manufacture">
     	</div>
     	<div class="col-md-3">
     		<label for="" class="tx-gray-800 tx-bold">Nước sản xuất</label>
     		<input type="text" class="form-control" id="made_in" name="made_in">
     	</div>
     	<div class="col-md-3">
     		<label for="" class="tx-gray-800 tx-bold">VAT(%)</label>
     		<input type="text" class="form-control" id="VAT_sell" value="0">
     	</div>
     	<div class="col-md-12 mg-t-10">
     		<label for="" class="tx-gray-800 tx-bold">Mô tả</label>
     		<input type="text" class="form-control" id="note" name="note">
     	</div>
     </div>
     <div class="row mg-t-10">
     	<label for="" class="tx-gray-900 tx-bold pd-l-10" id="info-data-table-unit"></label>
     	<div class="col-md-12 ng-t-10">
     		<table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table-unit">
     			<thead>
     				<tr class="bg-primary">
     					<th scope="col" class="col1UnitEdit" style="color: white;">Tên
     						đơn vị <span class="text-danger">*</span></th>
     						<th scope="col" class="col2UnitEdit" style="color: white;">Quy
     							đổi <span class="text-danger">*</span></th>
     							<th scope="col" class="col3UnitEdit" style="color: white;">Giá
     							bán</th>
     							<th scope="col" class="col4UnitEdit" style="color: white;">Mã
     							vạch</th>
     							<th scope="col" class="col5UnitEdit" style="color: white;">Bán
     							hàng</th>
     							<th scope="col" class="col6UnitEdit" style="color: white;">C.Báo
     							hết hàng</th>
     							<th scope="col" class="col7UnitEdit" style="color: white;">S.lg
     							</th>
     							<th scope="col" class="col8UnitEdit" style="color: white;"></th>
     						</tr>
     					</thead>
     					<tbody>
     					</tbody>
     				</table>
     			</div>
     		</div>
     	</div>
     	<div class="col-md-12 pd-l-25">
     		<i class="fa fa-plus"></i>
     		<span><a href="#" onclick="addUnit();">Thêm đơn vị tính</a></span>
     	</div>
     	<div class="modal-footer">
     		<button type="button" class="btn btn-primary" id="addStock"><em class="fa fa-save"></em> Lưu và thêm
     		mới</button>
     		<button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em>
     		Đóng</button>
     	</div>
     </form>

 </div>
</div>
</div>
</div>
<div class="mg-r-10">
	<!-- Button trigger modal -->
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importExcelModal">
		<i class="fa fa-file-excel-o" aria-hidden="true"></i> Thêm mới hàng hoá từ excel
	</button>

	<!-- Modal -->
	<div class="modal fade" id="importExcelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="max-width:none;width:80em;vertical-align: top;">
		<div class="modal-content">
			<div class="modal-header" style="padding-bottom:10px">
				<h5 class="modal-title text-dark" id="exampleModalLabel">Thêm mới hàng hoá từ file excel
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form id="importExcelForm" method="POST" enctype="multipart/form-data">
				<div class="modal-body" style="padding-top:5px;padding-bottom:6px;">
					<div class="row">
						<div class="col-12 tx-gray-700">
							<label class="font-weight-bold" style="cursor:none">File excel (Dung lượng
							không vượt quá 2mb)</label>
							<div class="form-control bg-light">
								<div class="row">
									<div class="col-lg-4 text-center">
										<label for="importExcelFile" id="hoverLabel" class="form-control" style="width:100%;">Click
											để tải file
										lên</label>
										<input type="file" name="file" id="importExcelFile" class="form-control"
										accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
									</div>
									<div class="col-lg-8" id="statusUploadFile" style="display:none">
									</div>
								</div>
							</div>
						</div>
						<div class="mg-t-10 col-12">
							<!-- Nav tabs -->
							<ul class="nav nav-tabs">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#tab3">DS hợp lệ
										<span class="badge rounded-pill bg-primary" id="info-dataTableHopLe"
										style="font-size: 90%"></span>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#tab4">
										DS không hợp lệ <span class="badge rounded-pill bg-danger" id="info-dataTableKhongHopLe"
										style="font-size: 90%"></span>
									</a>
								</li>
							</ul>

							<!-- Tab panes -->
							<div class="tab-content mg-t-10">
								<div class="tab-pane active" id="tab3">
									<table id="dataTableHopLe" style="width:100%"
									class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
									<thead>
										<tr>
											<th scope="col" class="bg-primary" style="min-width:20px;color: white;">STT</th>
											<th scope="col" class="bg-primary" style="min-width:120px;color: white;">Tên Hàng Hoá
											</th>
											<th scope="col" class="bg-primary" style="min-width:100px;color: white;">Số đăng ký
											</th>
											<th scope="col" class="bg-primary" style="min-width:150px;color: white;">Hoạt chất</th>
											<th scope="col" class="bg-primary" style="min-width:100px;color: white;">Hãng sản xuất
											</th>
											<th scope="col" class="bg-primary" style="min-width:100px;color: white;">Nước sản xuất
											</th>
											<th scope="col" class="bg-primary" style="min-width:50px;color: white;">VAT bán</th>
											<th scope="col" class="bg-primary" style="min-width:100px;color: white;">ĐVT - Giá bán
											</th>
										</tr>
									</thead>
									<tbody>
									</tbody>
								</table>
							</div>
							<div class="tab-pane fade" id="tab4">
								<table style="width:100%" id="dataTableKhongHopLe"
								class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
								<thead>
									<tr>
										<th scope="col" class="bg-primary" style="min-width:20px;color: white;">STT</th>
										<th scope="col" class="bg-primary" style="min-width:120px;color: white;">Tên Hàng Hoá
										</th>
										<th scope="col" class="bg-primary" style="min-width:100px;color: white;">Số đăng ký
										</th>
										<th scope="col" class="bg-primary" style="min-width:150px;color: white;">Hoạt chất</th>
										<th scope="col" class="bg-primary" style="min-width:100px;color: white;">Hãng sản xuất
										</th>
										<th scope="col" class="bg-primary" style="min-width:100px;color: white;">Nước sản xuất
										</th>
										<th scope="col" class="bg-primary" style="min-width:50px;color: white;">VAT bán</th>
										<th scope="col" class="bg-primary" style="min-width:100px;color: white;">ĐVT - Giá bán
										</th>
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="modal-body" style="border-top:1px solid #e9ecef;padding-top:8px">
			<div class="row">
				<div class="col-sm-9">
					<em class="iconImportBulb"></em> <span class="text-dark font-weight-bold">Tải file excel mẫu <a
						href="{{ url('./download/fileMauHangHoa.xlsx') }}">tại
					đây</a></span>
				</div>
				<div class="col-sm-3">
					<button type="button" class="btn btn-primary mg-r-6" id="submitImport"><em
						class="fa fa-save"></em> Lưu hàng hoá</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em>
						Đóng</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
</div>
</div>

<div class="mg-r-10">
	<button class="btn btn-info" id="exportExcelDB"><i class="fa fa-file-excel-o" aria-hidden="true"></i>
	</button>
</div>
<div class="mg-r-10">
	<!-- Button in mã vạch -->
	<button type="button" class="btn btn-light" data-toggle="modal" data-target="#inMa">
		<i class="fa fa-list" aria-hidden="true"></i> In mã vạch
	</button>

	<!-- Modal -->
	<div class="modal fade" id="inMa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
		<div class="modal-content">
			<div class="modal-header pd-b-10">
				<h5 class="modal-title tx-gray-900" >In mã vạch</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="">
				<div class="modal-body">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#kq">
								Kết quả tìm kiếm <span class="badge rounded-pill bg-primary" id="info-dataTableInMaVach"
								style="font-size: 90%"></span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#dsIn">
								Danh sách in <span class="badge rounded-pill bg-danger" id="info-dataTableSelectMaVach"
								style="font-size: 90%"></span>
							</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="kq" class="tab-pane active pd-t-10">
							<div class="row">
								<div class="col-md-3">
									<label for="" class="tx-gray-800 tx-bold">Loại hàng hoá</label>
									<select name="" id="" class="form-control select2" style="width:100%">
										<option value="">Tất cả</option>
										<option value="">Dược phẩm</option>
										<option value="">Vật tư y tế</option>
										<option value="">Hàng hoá khác</option>
									</select>
								</div>
								<div class="col-md-3">
									<label for="" class="tx-gray-800 tx-bold">Nhóm hàng</label>
									<select name="" id="" class="form-control select2" style="width:100%">
										<option value="">Tất cả</option>
										<option value="">Hô hấp</option>
										<option value="">Nhỏ tai</option>
										<option value="">Nhỏ mũi</option>
									</select>
								</div>
								<div class="col-md-4">
									<label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
									<input type="text" class="form-control"
									placeholder="Tìm kiếm theo tên hàng hoá, mã hàng hoá">
								</div>
								<div class="col-md-1 align-self-end">
									<button type="button" class="btn btn-primary">
										<i class="fa fa-search" aria-hidden="true"></i>
										Tìm kiếm
									</button>
								</div>
							</div>
							<div class="mg-t-20 bd-b ">
								<table id="dataTableInMaVach" style="width:100%" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd table-hover table-striped">
									<thead>
										<tr>
											<th scope="col" class="bg-primary" style="color: white;min-width:30px"></th>
											<th scope="col" class="bg-primary" style="color: white;min-width:80px">Mã
											HH</th>
											<th scope="col" class="bg-primary" style="color: white;min-width:260px">Tên
											</th>
											<th scope="col" class="bg-primary" style="color: white;min-width:80px">Đơn
											vị tính </th>
											<th scope="col" class="bg-primary" style="color: white;min-width:80px">
											Loại</th>
											<th scope="col" class="bg-primary" style="color: white;min-width:130px">Số
											ĐK</th>
											<th scope="col" class="bg-primary" style="color: white;min-width:240px">Quy
											cách đóng gói</th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="row mg-t-20">
								<div class="col-md-12" style="text-align: end;">
									<button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em> Đóng</button>
								</div>
							</div>

						</div>
						<div id="dsIn" class="tab-pane fade">
							<div class="row pd-t-10">
								<div class="col-md-3">
									<label for="" class="tx-gray-800 tx-bold">Loại giấy</label>
									<select name="" id="" class="form-control select2" style="width:100%">
										<option value="">Loại 3 nhãn</option>
										<option value="">Loại 12 nhãn</option>
										<option value="">Loại 65 nhãn</option>
									</select>
								</div>
								<div class="col-md-3">
									<label for="" class="tx-gray-800 tx-bold">Bảng giá</label>
									<select name="" id="" class="form-control select2" style="width:100%">
										<option value="">Bảng giá mặc định</option>
									</select>
								</div>
							</div>
							<div class="row mg-t-20">
								<div class="col-md-6">
									<table id="dataTableSelectMaVach" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" style="width:100%">
										<thead>
											<tr>
												<th scope="col" class="bg-primary" style="color: white;min-width:60px">Mã
												HH</th>
												<th scope="col" class="bg-primary" style="color: white;min-width:160px">Tên
												</th>
												<th scope="col" class="bg-primary" style="color: white;min-width:40px">ĐVT</th>
												<th scope="col" class="bg-primary" style="color: white;min-width:70px">Giá
												bán</th>
												<th scope="col" class="bg-primary" style="color: white;min-width:35px">
												S.lg</th>
												<th scope="col" class="bg-primary" style="color: white;min-width:15px">
												</th>
											</tr>
										</thead>
									</table>
								</div>
								<div class="col-md-6">
									<div id="contentModalInMa" style="overflow: scroll; height:340px;">

										<div class="row">
											<div class="col-md-6" style="text-align:center;">
												<div class="text-dark font-weight-bold tenNhaThuocModalInMa"></div>
												<div class="tenThuocModalInMa text-dark"></div>
												<svg class="maVachThuocModalInMa"></svg>
												<div class="giaBanVaDonViModalInMa">
													<span class="font-weight-bold text-dark giaBanModalInMa"></span>
													<span class="font-weight-bold text-dark donViModalInMa"></span>
												</div>
											</div>
											<div class="col-md-6" style="text-align:center;">
												<div class="text-dark font-weight-bold tenNhaThuocModalInMa"></div>
												<div class="tenThuocModalInMa text-dark"></div>
												<svg class="maVachThuocModalInMa"></svg>
												<div class="giaBanVaDonViModalInMa">
													<span class="font-weight-bold text-dark giaBanModalInMa"></span>
													<span class="font-weight-bold text-dark donViModalInMa"></span>
												</div>
											</div>
										</div>
										<div class="row pd-t-10">
											<div class="col-md-6" style="text-align:center;">
												<div class="text-dark font-weight-bold tenNhaThuocModalInMa"></div>
												<div class="tenThuocModalInMa text-dark"></div>
												<svg class="maVachThuocModalInMa"></svg>
												<div class="giaBanVaDonViModalInMa">
													<span class="font-weight-bold text-dark giaBanModalInMa"></span>
													<span class="font-weight-bold text-dark donViModalInMa"></span>
												</div>
											</div>
											<div class="col-md-6" style="text-align:center;">
												<div class="text-dark font-weight-bold tenNhaThuocModalInMa"></div>
												<div class="tenThuocModalInMa text-dark"></div>
												<svg class="maVachThuocModalInMa"></svg>
												<div class="giaBanVaDonViModalInMa">
													<span class="font-weight-bold text-dark giaBanModalInMa"></span>
													<span class="font-weight-bold text-dark donViModalInMa"></span>
												</div>
											</div>

										</div>

									</div>
								</div>
							</div>
							<div class="row mg-t-20">
								<div class="col-md-12" style="text-align: end;">
									<button type="button" id="buttonInMaModalInMa" class="btn btn-info"><em class="fa fa-print"></em> In mã vạch</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal">
										<em class="fa fa-close"></em> Đóng
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Modal cộng-->
<div class="modal fade" id="cong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document" style="max-width: none;width: 50em;vertical-align: top;">
	<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title tx-gray-900" id="modalAddNewStockGroup">Thêm mới nhóm hàng hoá
			</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>

		<form action="" id="nhomHangHoa">
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12">
						<label for="" class="tx-gray-800 tx-bold">Nhóm hàng hoá</label>
						<input type="text" class="form-control" name="name" id="stockgroup">
					</div>
					<div class="col-md-12">
						<label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
						<textarea name="note" id="" cols="30" rows="2" class="form-control"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu và
				thêm mới</button>
				<button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu và
				đóng</button>
				<button type="button" class="btn btn-danger" id="closeCong"><em class="fa fa-close"></em>
				Đóng</button>
			</div>
		</form>

	</div>
</div>
</div>
</div>

<div class="mg-r-10">
	<!-- Button in mã vạch -->
	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#cauHinh">
		<i class="fa fa-cog mg-r-10" aria-hidden="true"></i>Cấu hình tem in
	</button>

	<!-- Modal -->
	<div class="modal fade" id="cauHinh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title tx-gray-900" id="exampleModalLabel">Cấu hình tem in</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="">
				<div class="modal-body pd-t-10">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#cauHinhTem">Cấu hình tem
							in</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#huongDanTem">Hướng dẫn cấu hình
							tem in</a>
						</li>
					</ul>
					<!-- Tab panes -->
					<div class="tab-content">
						<div id="cauHinhTem" class="tab-pane active">
							<div class="row pd-t-10">
								<div class="col-md-6">
									<label for="" class="tx-gray-800 tx-bold">Loại giấy</label>
									<select name="" id="" class="form-control">
										<option value="">Loại 1 nhãn</option>
										<option value="">Loại 2 nhãn</option>
										<option value="">Loại 3 nhãn</option>
										<option value="">Loại 12 nhãn</option>
									</select>
								</div>
								<div class="col-md-6 align-self-end">
									<input type="checkbox" class="mg-r-10">
									<label for="" class="tx-gray-800 tx-bold">Mặc định</label>
								</div>
							</div>
							<div class="shadow-base mg-t-20 bd">
								<div class="tx-20 tx-white bg-info pd-5 ">
									<i class="fa fa-cogs" aria-hidden="true"></i>
									Cấu hình bố cục
								</div>
								<div class="pd-10">
									<div class="row">
										<div class="col-md-3 col-sm-6">
											<div class="row">
												<div class="col-md-12 mg-t-10">
													<input type="checkbox" id="tenNhaThuoc">
													<label for="tenNhaThuoc" class="tx-gray-800 tx-bold mg-l-10">Hiển thị tên
														nhà
													thuốc</label>
												</div>
												<div class="col-md-12 mg-t-10">
													<input type="text" class="form-control" disabled="disabled"
													placeholder="Nhà thuốc Dược Thiện">
												</div>
												<div class="col-md-12 mg-t-10">
													<input type="checkbox" id="tenSanPham">
													<label for="tenSanPham" class="tx-gray-800 tx-bold mg-l-10">Hiển thị tên
														sản
													phẩm</label>
												</div>
												<div class="col-md-12 mg-t-10">
													<input type="checkbox" id="tenVietTat">
													<label for="tenVietTat" class="tx-gray-800 tx-bold mg-l-10">Hiển thị tên
														sản phẩm
													viết tắt</label>
												</div>
											</div>
										</div>
										<div class="col-md-3 col-sm-6">
											<div class="row">
												<div class="col-md-12 mg-t-10">
													<input type="checkbox" id="hienThiGia">
													<label for="hienThiGia" class="tx-gray-800 tx-bold mg-l-10">Hiển thị
													giá</label>
												</div>
												<div class="col-md-12 mg-t-10">
													<input type="checkbox" id="donViTien">
													<label for="donViTien" class="tx-gray-800 tx-bold mg-l-10">Hiển thị đơn
														vị tiền
													tệ</label>
												</div>
												<div class="col-md-12 mg-t-10">
													<input type="text" class="form-control">
												</div>
												<div class="col-md-12 mg-t-10">
													<input type="checkbox" id="donViTinh">
													<label for="donViTinh" class="tx-gray-800 tx-bold mg-l-10">Hiển thị đơn
														vị tính của
													sản phẩm</label>
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-6 tx-center">
											<div style="width:300px;margin: 0 auto;">
												<div class="bd pd-5 tx-gray-800 mg-t-10">Nhà thuốc Dược
												Thiện</div>
												<div class="bd pd-5 tx-gray-800 mg-t-10">Tên sản phẩm
												</div>
												<div class="mg-t-10 pd-10 bd">Mã vạch</div>
												<div class="bd pd-5 tx-gray-800 mg-t-10">Giá VNĐ/ Đơn vị
												tính</div>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="shadow-base mg-t-20 bd">
								<div class="tx-20 tx-white bg-info pd-5 ">
									<i class="fa fa-cogs" aria-hidden="true"></i>
									Cấu hình khổ giấy
								</div>
								<div class="pd-10">
									<div class="row">
										<div class="col-md-6 col-sm-6">
											<div class="col-md-12">
												<label for="" class="tx-gray-800 tx-bold bd-b bd-info tx-uppercase">Căn
													khổ
												giấy</label>
											</div>
											<div class="row mg-t-10">
												<div class="col-md-6">
													<label for="" class="tx-gray-800 tx-bold">Chiều
													rộng(mm)</label>
													<input type="number" class="form-control">
												</div>
												<div class="col-md-6">
													<label for="" class="tx-gray-800 tx-bold">Chiều
													dài(mm)</label>
													<input type="number" class="form-control">
												</div>
											</div>
											<div class="row mg-t-10">
												<div class="col-md-6">
													<label for="" class="tx-gray-800 tx-bold">Số
													cột</label>
													<input type="number" class="form-control">
												</div>
												<div class="col-md-6">
													<label for="" class="tx-gray-800 tx-bold">Số
													dòng</label>
													<input type="number" class="form-control">
												</div>
											</div>
										</div>
										<div class="col-md-6 col-sm-6">
											<div class="col-md-12">
												<label for="" class="tx-gray-800 tx-bold bd-b bd-info tx-uppercase">Căn
													lề
												giấy</label>
											</div>
											<div class="row mg-t-10">
												<div class="col-md-6">
													<label for="" class="tx-gray-800 tx-bold">Lề
													trên(mm)</label>
													<input type="number" class="form-control">
												</div>
												<div class="col-md-6">
													<label for="" class="tx-gray-800 tx-bold">Lề
													dưới(mm)</label>
													<input type="number" class="form-control">
												</div>
											</div>
											<div class="row mg-t-10">
												<div class="col-md-6">
													<label for="" class="tx-gray-800 tx-bold">Lề
													trái</label>
													<input type="number" class="form-control">
												</div>
												<div class="col-md-6">
													<label for="" class="tx-gray-800 tx-bold">Lề
													phải</label>
													<input type="number" class="form-control">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row mg-t-20">
								<div class="col-md-6">
									<button class="btn btn-info"><em class="fa fa-undo"></em> Khôi phục ban đầu</button>
								</div>
								<div class="col-md-6" style="text-align: end;">
									<button class="btn btn-primary"><em class="fa fa-save"></em>
									Lưu</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal"><em
										class="fa fa-close"></em> Đóng</button>
									</div>
								</div>

							</div>
							<div id="huongDanTem" class="tab-pane fade" style="height: 700px;overflow-x: auto;">
								<br>
								<div style="width:800px;margin: 0 auto;">
									<p>Để cấu hình tem in, trước hết người dùng cần cấu hình máy in đang
										dùng để khổ giấy phù hợp
									với khổ giấy sẽ in trên hệ thống</p>
									<h4 class="tx-gray-900">1. Cấu hình máy in</h4>
									<p>Với mỗi loại máy in sẽ có một cách cấu hình khác nhau, dưới đây là
										các hướng dẫn cấu hình
									máy in đối với một số mẫu máy in mẫu:</p>
									<p>Bước 1: Gõ từ khóa “Control panel” vào thanh tìm kiếm của máy tính,
									sau đó ấn enter</p>
									<p>Bước 2: Kích chọn “View devices and printers”</p>
									<p>Bước 3: Tại đúng máy in của người dùng, kích chuột phải chọn
									“Printing Preferences”</p>
									<p>Bước 4: Xuất hiện hộp thoại Printing Preferences, kích chọn “Page
									setup”</p>
									<h5 class="tx-gray-800">1.1. Máy in Godex</h5>
									<p>- Kích “New” để tạo mới khổ giấy in</p>
									<p>- Nhập tên khổ giấy, kích “Type” chọn “Continuous(Fixed Length)”,
										thiết lập kích thước khổ
									giấy (width,length)</p>
									<img src="https://gpp.com.vn/Common/Images/cau-hinh-in-1.png" alt="">
									<p>- Kích “OK” để tạo mới khổ giấy</p>
									<p>- Kích “Apply” để áp dụng khổ giấy in => chọn “OK” để hoàn tất cấu
										hình khổ giấy cho máy
									in.</p>
									<h5 class="tx-gray-800">1.2. Máy in Antech</h5>
									<p>- Kích “Option” để thiết lập khổ giấy in</p>
									<p>- Cài đặt số bản in, tốc độ, độ sáng, kích “Stocks” chọn “User
										defined” , định dạng khổ
										giấy(inch, potrait, rotate 180⸰) và thiết lập kích thước khổ giấy
									(width,length)</p>
									<img src="https://gpp.com.vn/Common/Images/cau-hinh-in-2.png" alt="">
									<p>- Kích “OK” để tạo mới khổ giấy</p>
									<p>- Kích “Apply” để áp dụng khổ giấy in => chọn “OK” để hoàn tất cấu
										hình khổ giấy cho máy
									in.</p>
									<h4 class="tx-gray-900">2. Cấu hình tem in</h4>
									<p>Với một hàng hóa, người dùng có thể tùy chọn in các kiểu mẫu tem khác
									nhau</p>
									<p>Bước 1: Chọn Loại giấy</p>
									<p>Bước 2: Cấu hình bố cục => Kích chọn các tùy chọn người dùng muốn
									hiển thị trên mẫu tem</p>
									<p>Lưu ý: nếu tên sản phẩm quá dài người dùng nên chọn hiển thị tên sản
										phẩm viết tắt để định
									dạng mẫu tem in được đẹp và đúng chuẩn nhất.</p>
									<p>Bước 3: Cấu hình khổ giấy => Người dùng tùy chỉnh lại kích thước khổ
										giấy tương ứng với
									chiều dài, chiều rộng khổ giấy đã cấu hình bên máy in</p>
									<p>Bước 4: Kích chọn vào “Đặt in mặc định” để lưu mẫu tem in cho các lần
									in tiếp theo</p>
									<p>Bước 5: Lưu các thông tin cấu hình</p>
									<h4 class="tx-gray-900">3. In mã vạch</h4>
									<p>Bước 1: Màn hình Quản lý hàng hóa, tại hàng hóa => chọn Thao tác “In
										mã vạch” hoặc nhấn
									phím tắt F9</p>
									<p>Bước 2: Chọn các tùy chọn in: loại giấy, bảng giá mặc định, đơn vị
									tính, số lần in</p>
									<p>Bước 3: In</p>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
</div>
<div class="br-pagebody pd-x-20 pd-sm-x-30">
	<div class="shadow-base bg-white pd-15">
		<div class="row tx-gray-900">
			<div class="col-md-2 col-lg-2">
				<label for="">Trạng thái</label>
				<select name="" id="status" class="form-control">
					<option value="1">Hoạt động</option>
					<option value="0">Ngừng hoạt động</option>
				</select>
			</div>
			<div class="col-md-3 col-lg-2">
				<label for="">Loại hàng hoá</label>
				<select name="" id="" class="form-control">
					<option value="">Dược phẩm</option>
					<option value="">Hàng y tế</option>
					<option value="">Hàng hoá khác</option>
				</select>
			</div>
			<div class="col-md-3 col-lg-2">
				<label for="">Nhóm hàng</label>
				<select name="" id="" class="form-control">
					<option value="">Dạ dày</option>
					<option value="">Dị ứng</option>
					<option value="">Đông dược</option>
				</select>
			</div>
			<div class="col-md-4 col-lg-4">
				<label for="">Từ khoá tìm kiếm</label>
				<input type="text" class="form-control" placeholder="Tìm kiếm theo mã, số ĐK hoặc tên hàng hoá"
				id="searchProduct" autocomplete="off" />
			</div>
			<div class="col-md-1 col-lg-1 align-self-end">
				<button class="btn btn-info"><i class="fas fa-search" style="padding: 3px"></i>Tìm kiếm</button>
			</div>
		</div>

		<div class="mg-t-20">
			<label for="" class="tx-bold tx-gray-800" id="info-data-table"></label>
			<table id="data-table" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" style="width: 100%">
				<thead>
					<tr>
						<th scope="col" class="bg-primary" style="color: white;min-width: 4%">#</th>
						<th scope="col" class="bg-primary" style="color: white;min-width: 7%">Mã HH</th>
						<th scope="col" class="bg-primary" style="color: white;min-width: 20%">Tên HH</th>
						<th style="display:none">Số đăng ký</th>
						<th style="display:none">Hoạt chất chính</th>
						<th style="display:none">Hàm lượng</th>
						<th style="display:none">Quy cách đóng gói</th>
						<th style="display:none">Hãng sản xuất</th>
						<th style="display:none">Nước sản xuất</th>
						<th scope="col" class="bg-primary" style="color: white;min-width: 11%">Loại hàng hoá</th>
						<th scope="col" class="bg-primary" style="color: white;min-width: 10%">Giá vốn</th>
						<th scope="col" class="bg-primary" style="color: white;min-width: 17%">Giá bán</th>
						<th scope="col" class="bg-primary" style="color: white;min-width: 10%">Tổng tồn</th>
						<th scope="col" class="bg-primary" style="color: white;min-width: 9%">Trạng thái</th>
						<th scope="col" class="bg-primary" style="color: white;max-width: 12%"></th>
					</tr>
				</thead>
			</table>
		</div>
	</div><!-- row -->
</div><!-- br-pagebody -->
<div>
	<!-- Modal chi tiết-->
	<div class="modal fade" id="chiTiet" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width: none;width: 70%;vertical-align: top;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title tx-gray-900" id="labelThongTinHangHoa"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>

				<form id="editStockForm">

					<div class="modal-body" style="padding-bottom:0px">
						<ul class="nav nav-tabs" role="tablist" id="mytab">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="tab" href="#nav-home" id="rmActive">Thêm
								hàng hoá tổng</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#nav-profile" id="addActive">Thẻ kho</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" data-toggle="tab" href="#nav-contact" id="listSoLo">Danh sách số
								lô</a>
							</li>
						</ul>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								<div class="row mg-t-10">
									<div class="col-md-6">
										<input type="hidden" name="stock_id" id="id">
										<label for="" class="tx-gray-800 tx-bold">Tên hàng hoá <span class="text-danger">*</span></label>
										<input type="text" class="form-control name" name="name">
									</div>
									<div class="col-md-3">
										<label for="" class="tx-gray-800 tx-bold">Mã hàng hoá</label>
										<input type="text" class="form-control" readonly id="barcode" placeholder="Mã tự động">
									</div>
									<div class="col-md-3">
										<input type="hidden" name="prescription_drug" class="prescription_drug" value="0">
										<label for="" class="tx-gray-800 tx-bold">Bán theo đơn</label><br>
										<div class="toggle-wrapper">
											<div class="toggle toggle-modern primary">
												<div class="toggle-slide">
													<div class="toggle-inner" style="width: 94px; margin-left: 0px;">
														<div class="toggle-on "
														style="height: 26px; width: 47px; text-indent: -8.66667px; line-height: 26px;">
													</div>
													<div class="toggle-blob" style="height: 26px; width: 26px; margin-left: -13px;">
													</div>
													<div class="toggle-off active"
													style="height: 26px; width: 47px; margin-left: -13px; text-indent: 8.66667px; line-height: 26px;">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row mg-t-10">
							<div class="col-md-6">
								<label for="" class="tx-gray-800 tx-bold">Loại hàng hoá</label>
								<select name="stock_type" class="form-control stock_type">
									<option value="Dược phẩm">Dược phẩm</option>
								</select>
							</div>
							<div class="col-md-6">
								<label for="" class="tx-gray-800 tx-bold">Nhóm hàng hoá</label>
								<div class="pos-relative">
									<select name="stock_group" class="form-control stock_group">
										@foreach (App\Models\StockGroup::all() as $stockgroup)
										<option value="{{ $stockgroup->name }}">
											{{ $stockgroup->name }}
										</option>
										@endforeach
									</select>
								</div>
							</div>
						</div>
						<div class="row mg-t-10">
							<div class="col-md-3">
								<label for="" class="tx-gray-800 tx-bold">Số đăng ký <span class="text-danger">*</span></label>
								<input type="text" class="form-control reg_no" name="reg_no">
							</div>
							<div class="col-md-3">
								<label for="" class="tx-gray-800 tx-bold">Hoạt chất</label>
								<input type="text" class="form-control ingredient" name="ingredient">
							</div>
							<div class="col-md-3">
								<label for="" class="tx-gray-800 tx-bold">Hàm lượng</label>
								<input type="text" class="form-control content" name="content">
							</div>
							<div class="col-md-3">
								<label for="" class="tx-gray-800 tx-bold">Quy cách đóng gói</label>
								<input type="text" class="form-control packaging" name="packaging">
							</div>
						</div>
						<div class="row mg-t-10">
							<div class="col-md-6">
								<label for="" class="tx-gray-800 tx-bold">Hãng sản xuất</label>
								<input type="text" class="form-control manufacture" name="manufacture">
							</div>
							<div class="col-md-3">
								<label for="" class="tx-gray-800 tx-bold">Nước sản xuất</label>
								<input type="text" class="form-control made_in" name="made_in">
							</div>
							<div class="col-md-3">
								<label for="" class="tx-gray-800 tx-bold">VAT(%)</label>
								<input type="text" class="form-control VAT_sell">
							</div>
							<div class="col-md-12 mg-t-10">
								<label for="" class="tx-gray-800 tx-bold">Mô tả</label>
								<input type="text" class="form-control note" name="note">
							</div>
						</div>
						<div class="row mg-t-10">
							<div class="col-md-12 tx-gray-800 tx-bold" id="info-data-table-unit-edit"></div>
							<div class="col-md-12 ng-t-10">
								<table class="table table-borderless bd bd-white bg-white" id="data-table-unit-edit">
									<thead>
										<tr class="bg-primary">
											<th scope="col" class="col1UnitEdit" style="color: white;">Tên
												đơn vị <span class="text-danger">*</span></th>
												<th scope="col" class="col2UnitEdit" style="color: white;">Quy
													đổi <span class="text-danger">*</span></th>
													<th scope="col" class="col3UnitEdit" style="color: white;">Giá
													bán</th>
													<th scope="col" class="col4UnitEdit" style="color: white;">Mã
													vạch</th>
													<th scope="col" class="col5UnitEdit" style="color: white;">Bán
													hàng</th>
													<th scope="col" class="col6UnitEdit" style="color: white;">C.Báo
													hết hàng</th>
													<th scope="col" class="col7UnitEdit" style="color: white;">S.lg
													</th>
													<th scope="col" class="col8UnitEdit" style="color: white;"></th>
												</tr>
											</thead>
											<tbody>
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-md-12 mg-t-10">
									<i class="fa fa-plus"></i>
									<span><a href="#" onclick="addUnitEdit();">Thêm đơn vị tính</a></span>
								</div>
							</div>
							<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
								<div class="row mg-t-10">
									<div class="col-md-3">
										<label for="" class="tx-bold tx-gray-700">Từ ngày</label>
										<input type="date" class="form-control">
									</div>
									<div class="col-md-3">
										<label for="" class="tx-bold tx-gray-700">Tới ngày</label>
										<input type="date" class="form-control">
									</div>
									<div class="col-md-6">
										<label for="" class="tx-bold tx-gray-700">Loại phiếu</label>
										<select name="" id="searchLoaiPhieu" class="form-control select2" style="width:100%">
											<option value="">Tất cả</option>
											<option value="Hoá đơn">Hoá đơn</option>
										</select>
									</div>
								</div>
								<div class="row mg-t-10">
									<div class="col-md-6">
										<label for="" class="tx-bold tx-gray-700 mg-r-5">Số lô</label>
										<select id="selectLotNo" style="width:100%" class="form-control">
										</select>
									</div>
									<div class="col-md-1.5 align-self-end mg-r-6">
										<button type="button" class="btn btn-info" id="searchDBLotNo"><i class="fa fa-search mr-2"
											aria-hidden="true"></i>Tìm kiếm</button>
										</div>
										<div class="col-md-1.5 align-self-end mg-r-6">
											<button type="button" class="btn btn-info" id="exportExcelDBLotNo"><i
												class="fa fa-file-excel-o mr-2" aria-hidden="true"></i></button>
											</div>
										</div>
										<div class="row mg-t-10">
											<div class="col-md-12">
												<table id="data-table-select-lotno" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
												style="width: 100%">
												<thead>
													<tr>
														<th scope="col" class="bg-primary" id="thID" style="color: white;">
														STT</th>
														<th scope="col" class="bg-primary" id="thMa" style="color: white;">
														Mã phiếu</th>
														<th scope="col" class="bg-primary" id="thLoai" style="color: white;">Loại phiếu</th>
														<th scope="col" class="bg-primary" id="thNgay" style="color: white;">Ngày giao dịch</th>
														<th scope="col" class="bg-primary" id="thDoi" style="color: white;">
														Đối tác giao dịch</th>
														<th scope="col" class="bg-primary" id="thChech" style="color: white;">Chênh lệch</th>
														<th style="display:none">Giá</th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
									<div class="row mg-t-10">
										<div class="col-md-6">
											<label for="" class="tx-gray-700 tx-bold">Từ khoá tìm kiếm</label>
											<input type="text" class="form-control" id="searchDSLotNo" placeholder="Tìm kiếm theo số lô">
										</div>
										<div class="col-md-2 align-self-end">
											<button id="buttonDSLotNo" type="button" class="btn btn-info"><i class="fa fa-search mr-2"
												aria-hidden="true"></i>Tìm kiếm</button>
											</div>
										</div>
										<div class="row mg-t-10">
											<div class="col-md-12">
												<table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table-lotno"
												style="width: 100%">
												<thead>
													<tr>
														<th scope="col" class="bg-primary" id="thSTT" style="color: white;">
														STT</th>
														<th scope="col" class="bg-primary" id="thSolo" style="color: white;">Số lô</th>
														<th scope="col" class="bg-primary" id="thHanDung" style="color: white;">Hạn dùng</th>
														<th scope="col" class="bg-primary" id="thSoLuong" style="color: white;">Số lượng</th>
														<th scope="col" class="bg-primary" id="thGiaVon" style="color: white;">Giá vốn</th>
														<th scope="col" class="bg-primary" id="thEdit" style="color: white;"></th>
													</tr>
												</thead>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" id="editStock"><em class="fa fa-save"></em>
								Lưu</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em>
								Đóng</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>

		{{-- thao tac --}}

		{{-- modal chi tiết mã vạch --}}
		<div class="modal fade" id="barCodeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
		aria-hidden="true">
		<div class="modal-dialog" role="document" style="max-width:none;width:45em;vertical-align: top;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title text-dark" id="barCodeTitle"></h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body pd-t-10">
					<div class="row">
						<div class="col-md-6">
							<label for="" class="tx-gray-800 tx-bold">Loại giấy</label>
							<select name="" id="" class="form-control select2 select2-container" style="width:100%">
								<option value="">Loại nhãn 2</option>
								<option value="">Loại nhãn 3</option>
								<option value="">Loại nhãn 12</option>
								<option value="">Loại nhãn 65</option>
							</select>
						</div>
						<div class="col-md-6">
							<label for="" class="tx-gray-800 tx-bold">Bảng giá</label>
							<select name="" id="" class="form-control select2 select2-container" style="width:100%">
								<option value="">Bảng giá mặc định</option>
								<option value="">Bảng giá mặc 1</option>
							</select>
						</div>
						<div class="col-md-6 pt-2">
							<label for="" class="tx-gray-800 tx-bold">Đơn vị tính</label>
							<select name="" id="" class="form-control select2 select2-container" style="width:100%">
								<option value="">Viên</option>
							</select>
						</div>
					</div>
					<div class="modal-body bd-y pd-b-10" style="margin-top:15px">
						<div class="contentMaVach" style="overflow: scroll; height: 300px;">
							<div class="row">
								<div class="col-md-6" style="text-align:center;">
									<div class="text-dark font-weight-bold">HKD Nhà Thuốc Morioka</div>
									<div class="tenThuoc text-dark"></div>
									<svg class="maVachThuoc"></svg>
									<div class="giaBanVaDonVi">
										<span class="font-weight-bold text-dark giaBan"></span>
										<span class="font-weight-bold text-dark donVi"></span>
									</div>
								</div>
								<div class="col-md-6" style="text-align:center;">
									<div class="text-dark font-weight-bold">HKD Nhà Thuốc Morioka</div>
									<div class="tenThuoc text-dark"></div>
									<svg class="maVachThuoc"></svg>
									<div class="giaBanVaDonVi">
										<span class="font-weight-bold text-dark giaBan"></span>
										<span class="font-weight-bold text-dark donVi"></span>
									</div>
								</div>
							</div>
							<div class="row pd-t-10">
								<div class="col-md-6" style="text-align:center;">
									<div class="text-dark font-weight-bold">HKD Nhà Thuốc Morioka</div>
									<div class="tenThuoc text-dark"></div>
									<svg class="maVachThuoc"></svg>
									<div class="giaBanVaDonVi">
										<span class="font-weight-bold text-dark giaBan"></span>
										<span class="font-weight-bold text-dark donVi"></span>
									</div>
								</div>
								<div class="col-md-6" style="text-align:center;">
									<div class="text-dark font-weight-bold">HKD Nhà Thuốc Morioka</div>
									<div class="tenThuoc text-dark"></div>
									<svg class="maVachThuoc"></svg>
									<div class="giaBanVaDonVi">
										<span class="font-weight-bold text-dark giaBan"></span>
										<span class="font-weight-bold text-dark donVi"></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer" style="border: none;">
						<button type="button" id="inMaVach" class="btn btn-primary"> <em class="fa fa-print"></em> In
						mã vạch</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"></em>
						Đóng</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		var prescription_drug = 0;
		var DataTable_unit = [];
		var dataUnit = [];
		let dataMaVach = {};

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
		function checkTypeOf(value){
			if(typeof(value) === 'string'){
				return true;
			}else{
				return false;
			}
		}
		function replaceCurrency(number){
			if(checkTypeOf(number)){
				return number = number.replace(/,/g,'');
			}else{
				return number;
			}
		}
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
		function addUnit(){
			DataTable_unit.push({
				id : null,
				unit : null,
				exchange : 1,
				price_sell : 0,
				barcode : null,
				useforsale : 1,
				outofstock : 0,
				qty : 1
			});
			console.log(DataTable_unit);
			loadDataUnit();
		}
		function addUnitEdit(){
			DataTable_unit.push({
				id : null,
				stock_id : DataTable_unit[0].stock_id,
				unit : null,
				exchange : 1,
				price_sell : DataTable_unit[0].price_sell,
				barcode : null,
				useforsale : 1,
				outofstock : 0,
				qty : 1
			});
			console.log(DataTable_unit);
			loadDataUnitEdit();
		}
		function getUnit(list,selected){
			var unitList = [];
			if(Array.isArray(list)){
				list.forEach(item => {
					if(item.name == selected){
						unitList = unitList + '<option value="'+item.name+'" selected>'+item.name+'</option>';
					}else{
						unitList = unitList + '<option value="'+item.name+'">'+item.name+'</option>';
					}
				});
			}else{
				unitList = '<option value="'+list+'">'+list+'</option>';
			}
			return unitList;
		}
		function valueCheckBox(data){
			var key = $(data).attr("data-id");
			var value = $(data).attr("data-name");
			if($(data).val() == '1'){
				$(data).val('0');
				DataTable_unit[key][value] = '0'
			}else{
				$(data).val('1');
				DataTable_unit[key][value] = '1'
			}
		}
		function updateDataUnit(data){
			var key = $(data).attr("data-id");
			var value = $(data).attr("data-name");
			DataTable_unit[key][value] = $(data).val();
			console.log(DataTable_unit);
			loadDataUnit();
		}
		function updateDataUnitSelect(data){
			let unitCheck = $(data).val();
			let key = $(data).attr("data-id");
			let temp = 0;
			DataTable_unit.forEach(item=>{
				if(unitCheck === item.unit){
					temp = 1;
				}
			})
			if(temp==1){
				$(data).empty();
				$(data).append('<option value="">Chọn đơn vị tính</option>'+getUnit(dataUnit));
				$.toast({
					text : "Đơn vị tính "+unitCheck+" đã được chọn",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
			}else{
				DataTable_unit[key]['unit'] = unitCheck;
			}
			console.log(DataTable_unit);
		}
		function deleteUnit(index){
			DataTable_unit.splice(index,1);
			console.log(DataTable_unit);
			loadDataUnit();
		}
		function deleteUnitEdit(index){
			DataTable_unit.splice(index,1);
			console.log(DataTable_unit);
			loadDataUnitEdit();
		}
		function loadDataUnit(){
			let index=0;
			$('#data-table-unit').DataTable().clear().draw();
			DataTable_unit.forEach(item=>{
				$('#data-table-unit').DataTable().row.add([
					'<select data-name="unit"  data-id="'+index+'" onchange="updateDataUnitSelect(this)" style="width:100%" ><option value="">Chọn đơn vị tính</option>'+getUnit(dataUnit,DataTable_unit[index].unit)+'</select>',
					'<input class="form-control" type="text" data-name="exchange" data-id="'+index+'" value="'+(DataTable_unit[index]['exchange'])+'" onchange="updateDataUnit(this)" style="width:70%" >',
					'<input class="form-control" type="text" data-name="price_sell" data-id="'+index+'" value="'+(DataTable_unit[index]['price_sell'] || '0.00' )+'" onchange="updateDataUnit(this)" style="width:70%" >',
					'<input class="form-control" type="text" data-name="barcode" data-id="'+index+'" value="'+(DataTable_unit[index]['barcode'] || '')+'" placeholder="Mã tự động" onchange="updateDataUnit(this)" style="width:70%" >',
					'<input type="checkbox" data-name="useforsale" data-id="'+index+'" value="'+DataTable_unit[index].useforsale+'" '+checkBoxChecked(DataTable_unit[index].useforsale)+' onchange="valueCheckBox(this)" style="width:100%;margin-top:10px" >',
					'<input type="checkbox" data-name="outofstock" data-id="'+index+'" value="'+DataTable_unit[index].outofstock+'" '+checkBoxChecked(DataTable_unit[index].outofstock)+' onchange="valueCheckBox(this)" style="width:100%;margin-top:10px" >',
					'<input class="form-control" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_unit[index]['qty'] || 1 )+'" onchange="updateDataUnit(this)" style="width:30%" disabled >',
					'<span class="fas fa-trash-alt" data-name="delunit" data-id="'+index+'" onclick="deleteUnit('+index+')" style="padding-top:40%;width:100%;color:red"></span>'
					]).draw( false );
				$("input[data-name='exchange'][data-id='0']").val(1);
				DataTable_unit[0]['exchange'] = 1;
				$("select[data-name='unit']").select2();
				$("span[data-name='delunit'][data-id='0']").addClass("hidden");
				new AutoNumeric("input[data-name='price_sell'][data-id='"+index+"']", {
					minimumValue: 0,
					modifyValueOnWheel: false,
					unformatOnHover: false
				});
				new AutoNumeric("input[data-name='exchange'][data-id='"+index+"']", {
					minimumValue: 0,
					decimalPlaces: 0,
					modifyValueOnWheel: false,
					unformatOnHover: false
				});
				index++;
			});
		}
		function loadDataUnitEdit(){
			let index=0;
			$('#data-table-unit-edit').DataTable().clear().draw();
			DataTable_unit.forEach(item=>{
				$('#data-table-unit-edit').DataTable().row.add([
					'<select data-name="unit" onchange="updateDataUnitSelect(this)" data-id="'+index+'" style="width:100%" ><option value="">Chọn đơn vị tính</option>'+getUnit(dataUnit,DataTable_unit[index].unit)+'</select>',
					'<input class="form-control" type="text" data-name="exchange" data-id="'+index+'" value="'+(DataTable_unit[index]['exchange'])+'" onchange="updateDataUnit(this)" style="width:80%" >',
					'<input class="form-control" type="text" data-name="price_sell" data-id="'+index+'" value="'+(DataTable_unit[index]['price_sell'] || '0.00' )+'" onchange="updateDataUnit(this)" style="width:80%" >',
					'<input class="form-control" type="text" data-name="barcode" data-id="'+index+'" value="'+(DataTable_unit[index]['barcode'] || '')+'" placeholder="Mã tự động" onchange="updateDataUnit(this)" style="width:80%" >',
					'<input type="checkbox" data-name="useforsale" data-id="'+index+'" value="'+DataTable_unit[index].useforsale+'" '+checkBoxChecked(DataTable_unit[index].useforsale)+' onchange="valueCheckBox(this)" style="width:100%;margin-top:10px" >',
					'<input type="checkbox" data-name="outofstock" data-id="'+index+'" value="'+DataTable_unit[index].outofstock+'" '+checkBoxChecked(DataTable_unit[index].outofstock)+' onchange="valueCheckBox(this)" style="width:100%;margin-top:10px" >',
					'<input class="form-control" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_unit[index]['qty'] || 1 )+'" onchange="updateDataUnit(this)" style="width:80%" disabled >',
					'<span class="fas fa-trash-alt" data-name="delunit" data-id="'+index+'" onclick="deleteUnitEdit('+index+')" style="width:100%;color:red;padding-top:40%"></span>'
					]).draw( false );
				$("select[data-name='unit']").select2();
				$("span[data-name='delunit'][data-id='0']").addClass("hidden");
				new AutoNumeric("input[data-name='price_sell'][data-id='"+index+"']", {
					minimumValue: 0,
					modifyValueOnWheel: false,
					unformatOnHover: false
				});
				new AutoNumeric("input[data-name='exchange'][data-id='"+index+"']", {
					minimumValue: 0,
					decimalPlaces: 0,
					modifyValueOnWheel: false,
					unformatOnHover: false
				});
				index++;
			});
		}
		function checkBoxChecked(Boolean){
			if(Boolean){
				return "checked"
			}else{
				return ""
			}
		}

		$("#searchProduct").on("keyup", function() {
			$.fn.dataTable.ext.search.push(
				function (settings, data, dataIndex){
					if ( settings.nTable.id !== 'data-table' ) {
						return true;
					}
					var supplierName = $("#searchProduct").val().toLowerCase();
					return (
						(~data[1].toLowerCase().indexOf(supplierName)) ||
						(~data[2].toLowerCase().indexOf(supplierName))
						) ? true : false;
				}
				);
			$('#data-table').DataTable()
			.draw();
		});
		$(document).ready(function () {
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$('#data-table-select-lotno').DataTable({
				"ordering": false,
				"paging": false,
				"language": {
					"processing": "Đang xử lý...",
					"sLengthMenu": " _MENU_ Bản ghi hiển thị",
					"zeroRecords": "Không tìm thấy dữ liệu phù hợp",
					"info": "Danh sách dữ liệu (_TOTAL_ bản ghi) ",
					"infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
					"infoFiltered": "",
					"emptyTable": "Không có dữ liệu",
					"loadingRecords": "Đang tải...",
				},
			});
			$('#data-table-lotno').DataTable({
				"ordering": false,
				"paging": false,
				"language": {
					"processing": "Đang xử lý...",
					"sLengthMenu": " _MENU_ Bản ghi hiển thị",
					"zeroRecords": "Không tìm thấy dữ liệu phù hợp",
					"info": "Danh sách dữ liệu (_TOTAL_ bản ghi) ",
					"infoEmpty": "Danh sách số lô (0 bản ghi)",
					"infoFiltered": "",
					"emptyTable": "Không có dữ liệu",
					"loadingRecords": "Đang tải...",
				},
			});

			var table = $('#data-table').DataTable({
				processing: true,
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
					url: "{{ url('hanghoa') }}",
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
						return newData;
					}

				},
				columns: [
				{ data: 'id', name: 'id', searchable: false , orderable: false },
				{ data: null,
					"render": function(data,type,row) {
						return "HH"+checkRangeValue(data["id"]);
					}
				},
				{ data: 'name', name: 'name', orderable: false},
				{ data: 'reg_no', orderable:false,"visible":false,searchable:false },
				{ data: 'ingredient', orderable:false,"visible":false,searchable:false },
				{ data: 'content', orderable:false,"visible":false,searchable:false },
				{ data: 'packaging', orderable:false,"visible":false,searchable:false },
				{ data: 'manufacture', orderable:false,"visible":false,searchable:false },
				{ data: 'made_in', orderable:false,"visible":false,searchable:false },
				{ data: 'stock_type', name: 'stock_type', orderable: false, searchable: false},
				{ data: null, orderable: false, searchable: false,
					"render": function(data,type,row) { return '<a class="font-weight-bold" style="width:100%;color:#337ab7;cursor:pointer;" onClick="editFunc('+data["id"]+',2)" data-toggle="modal" data-target="#chiTiet">Chi tiết giá vốn</a>'}
				},
				{ data: 'unitWithPrice', name: 'unitWithPrice', orderable: false, searchable: false},
				{ data: null, searchable: false,
					"render": function(data,type,row) {
						if(data['qty']){
							return new Intl.NumberFormat('en-US').format(data['qty']) +' '+ data['unit'];
						}else{
							return  0+' '+data['unit'];
						}
					}
				},
				{ data: 'status', name: 'status', orderable: false, searchable: false},
				{ data: 'action', name: 'action', orderable: false, searchable: false}
				],
				dom: 'Blfrtip',
				buttons: [
				{
					extend: 'excelHtml5',
					title: 'DanhSachHangHoa_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
					text:'<span class="text-light">Xuất file Excel</span>',
					exportOptions: {
						columns: [1, 2, 3, 4, 5, 6, 7, 8, 9, 11, 12]
					},
				}
				]
			});

$('.dt-buttons a[aria-controls="data-table"]').appendTo('#exportExcelDB');

$('#data-table').DataTable().on('order.dt search.dt', function () {
	$('#data-table').DataTable().column(0).nodes().each(function (cell, i) {
		cell.innerHTML = i + 1;
	});
}).draw();
var tableUnit = $('#data-table-unit').DataTable({
	"ordering" : false,
	"paging" : false,
	"language": {
		"processing": "Đang xử lý...",
		"sLengthMenu": " _MENU_ Bản ghi hiển thị",
		"zeroRecords": "Không tìm thấy dữ liệu phù hợp",
		"info": "Danh sách đơn vị tính (_TOTAL_ bản ghi) ",
		"infoEmpty": "Danh sách đơn vị tính (0 bản ghi)",
		"infoFiltered": "",
		"emptyTable": "Không có dữ liệu",
		"loadingRecords": "Đang tải...",
		"paginate": {
			"first": "Đầu tiên",
			"last": "Cuối cùng",
			"next": "Sau",
			"previous": "Trước"
		},
	}
});
$('#data-table-unit_info').detach().appendTo('#info-data-table-unit');
$('.toggle').click(function(){
	if(prescription_drug==0){
		prescription_drug = 1;
		$('.prescription_drug').val(prescription_drug);
	}else{
		prescription_drug = 0;
		$('.prescription_drug').val(prescription_drug);
	}
});
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.ui.autocomplete.prototype._renderMenu = function(ul, items) {
	var self = this;
	ul.append("<table class='table table-bordered tx-13 tx-gray-700 mg-b-0 bd'><thead aria-hidden='true'><tr><th class='bg-primary' style='color: white; width: 20%'>Tên thuốc</th><th class='bg-primary' style='color: white; width: 12%'>Số đăng ký</th><th class='bg-primary' style='color: white; width:20%'>Hoạt chất</th><th class='bg-primary' style='color: white; width: 12%'>Hàm lượng</th><th class='bg-primary' style='color: white; width: 16%'>Quy cách đóng gói</th><th class='bg-primary' style='color: white; width: 20%'>Hãng sản xuất</th></tr></thead><tbody></tbody></table>");
	$.each( items, function( index, item ) {
		self._renderItemData(ul, ul.find("table tbody"), item );
	});
};
$.ui.autocomplete.prototype._renderItemData = function(ul,table, item) {
	return this._renderItem( table, item ).data( "ui-autocomplete-item", item );
};
$.ui.autocomplete.prototype._renderItem = function(table, item) {
	return $( "<tr class='ui-menu-item' role='presentation'></tr>" )
	.append( "<td>"+item.name+"</td>"+"<td>"+item.reg_no+"</td>"+"<td>"+(item.main_ingredient ?? '')+"</td>"+"<td>"+(item.content ?? '')+"</td>"+"<td>"+item.packaging+"</td>"+"<td>"+item.manufacture+"</td>" )
	.appendTo( table );
};
$("#autoSearchTable").autocomplete({
	source: function( request, response ) {
		$.ajax({
			url:"{{url('hanghoa/autosearchtable')}}",
			type: 'post',
			dataType: "json",
			data: {
				_token: CSRF_TOKEN,
				search: request.term
			},
			success: function( data ) {
				response( data );
			}
		});
	},
	select: function (event, ui) {
		console.log(ui.item);
		$('#autoSearchTable').val('');
		$('#name').val(ui.item.name);
		$('#stock_type').val("Dược phẩm");
		$('#stock_type').attr('disabled', true);
		$('#stock_group').val(ui.item.stock_group);
		$('#reg_no').val(ui.item.reg_no);
		$('#ingredient').val(ui.item.main_ingredient);
		$('#manufacture').val(ui.item.manufacture);
		$('#content').val(ui.item.content);
		$('#made_in').val(ui.item.made_in);
		$('#packaging').val(ui.item.packaging);
		$('#note').val(ui.item.note);
		DataTable_unit = [];
		DataTable_unit.push({
			id : null,
			stock_id : null,
			unit : ui.item.unit,
			exchange : 1,
			price_sell : 0,
			barcode : null,
			useforsale : 1,
			outofstock : 0,
			qty : 1
		});
		console.log(DataTable_unit);
		loadDataUnit();
		return false;
	}
});
});
function editFunc(id,a=0){
	if(a===1){
		$('#rmActive').removeClass('active');
		$('#nav-home').removeClass('active');
		$('#listSoLo').removeClass('active');
		$('#nav-contact').removeClass('active');
		$('#nav-profile').removeClass('fade');
		$('#addActive').addClass('active');
		$('#nav-profile').addClass('active');
	}else if(a===2){
		$('#rmActive').removeClass('active');
		$('#nav-home').removeClass('active');
		$('#addActive').removeClass('active');
		$('#nav-profile').removeClass('active');
		$('#nav-contact').removeClass('fade');
		$('#listSoLo').addClass('active');
		$('#nav-contact').addClass('active');
	}else{
		$('#addActive').removeClass('active');
		$('#nav-profile').removeClass('active');
		$('#listSoLo').removeClass('active');
		$('#nav-contact').removeClass('active');
		$('#nav-home').removeClass('fade');
		$('#rmActive').addClass('active');
		$('#nav-home').addClass('active');
	}

	$('#data-table-lotno').DataTable().clear().draw();
	$('#data-table-select-lotno').DataTable().clear().draw();
	$('#selectLotNo').empty();
	var optionData = '';
	$.ajax({
		type:"GET",
		url: "{{ url('hanghoa/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			$('#labelThongTinHangHoa').text('');
			$('#labelThongTinHangHoa').text('Thông tin hàng hóa: '+res.name);
			if(res.prescription_drug==1){
				$('.toggle').toggles({
					on: true,
					height: 26
				});
			}else{
				$('.toggle').toggles({
					on: false,
					height: 26
				});
			}
			$('#id').val(res.id);
			$('#barcode').val("HH"+checkRangeValue(res.id));
			$('.name').val(res.name);
			$('.prescription_drug').val(res.prescription_drug);
			$('.stock_type').val("Dược phẩm");
			$('.stock_type').attr('disabled', true);
			$('.stock_group').val(res.stock_group);
			$('.stock_group').attr('disabled', true);
			$('.reg_no').val(res.reg_no);
			$('.group_id').val(res.group_id);
			$('.ingredient').val(res.ingredient);
			$('.manufacture').val(res.manufacture);
			$('.content').val(res.content);
			$('.made_in').val(res.made_in);
			$('.packaging').val(res.packaging);
			AutoNumeric.getAutoNumericElement('.VAT_sell').set(res.VAT_sell);
			$('.note').val(res.note);
			var prescription_drug = $('.prescription_drug').val();
			$('.toggle').click(function(){
				if(prescription_drug==0){
					prescription_drug = 1;
					$('.prescription_drug').val(prescription_drug);
				}else{
					prescription_drug = 0;
					$('.prescription_drug').val(prescription_drug);
				}
			});
			var tableUnitEdit = $('#data-table-unit-edit').DataTable({
				"ordering" : false,
				"paging" : false,
				"destroy": true,
				"language": {
					"processing": "Đang xử lý...",
					"sLengthMenu": " _MENU_ Bản ghi hiển thị",
					"zeroRecords": "Không tìm thấy dữ liệu phù hợp",
					"info": "Danh sách đơn vị tính (_TOTAL_ bản ghi) ",
					"infoEmpty": "Danh sách đơn vị tính (0 bản ghi)",
					"infoFiltered": "",
					"emptyTable": "Không có dữ liệu",
					"loadingRecords": "Đang tải...",
					"paginate": {
						"first": "Đầu tiên",
						"last": "Cuối cùng",
						"next": "Sau",
						"previous": "Trước"
					},
				}
			});
			$('#info-data-table-unit-edit').text('');
			$('#data-table-unit-edit_info').detach().appendTo('#info-data-table-unit-edit');
			$.ajax({
				type: "GET",
				url: "{{ url('nhaptunhacungcap/getlistunitwithid') }}",
				data: {id:res.id},
				success: function(response) {
					console.log(response);
					response.forEach(item=>{
						item.price_sell = decimalNumber(item.price_sell)
					})
					DataTable_unit = response;
					loadDataUnitEdit();
				}
			});
		}
	});

	$.ajax({
		type:"GET",
		url: "{{ url('nhaptunhacungcap/editlotno') }}",
		data: {id:id},
		dataType: 'json',
		success: function(response){
			let danhSachSoLo = [];
			let dataDanhSachLotNo = [];

			response.forEach(function (a) {
				if (!this[a.lotno_id]) {
					this[a.lotno_id] = { lotno_id: a.lotno_id, qty: 0};
					danhSachSoLo.push(this[a.lotno_id]);
				}
				if((a.type==='import_from_supplier') || (a.type==='import_inventory') || (a.type==='return_from_customer')){
					this[a.lotno_id].qty += parseInt(a.qty);
				}else{
					this[a.lotno_id].qty -= parseInt(a.qty);
				}
			}, Object.create(null));

			danhSachSoLo.forEach(item=>{
				var flag = 0;
				Object.keys(response).forEach(function(key) {
					if (response[key]['lotno_id'] == item.lotno_id){
						flag++;
						if(flag==1){
							response[key]['qty'] = item.qty;
							dataDanhSachLotNo.push(response[key]);
						}
					}
				});
			})

			dataDanhSachLotNo.forEach(item=>{
				item.name = item.lot_no
			})
			dataDanhSachLotNo.forEach(item=>{
				optionData = '<option value="'+item.id+'">Số lô: '+item.lot_no+' - HSD: '+item.exp_date+' - Giá nhập: '+decimalNumber(item.price_import)+'</option>';
				$('#selectLotNo').append(optionData);
			})
			DataTableSelectLotNo(dataDanhSachLotNo[0].id);

			var tableLotNo = $('#data-table-lotno').DataTable({
				"destroy": true,
				"ordering": false,
				"pageLength": 5,
				"lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
				"pagingType": "full_numbers",
				"language": {
					"processing": "Đang xử lý...",
					"sLengthMenu": " _MENU_ Bản ghi hiển thị",
					"zeroRecords": "Không tìm thấy dữ liệu phù hợp",
					"info": "Danh sách số lô (_TOTAL_ bản ghi) ",
					"infoEmpty": "Danh sách số lô (0 bản ghi)",
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
				aaData: dataDanhSachLotNo,
				columns: [
				{ data: 'id', name: 'id'},
				{ data:'lot_no', name: 'lot_no' },
				{ data: 'exp_date', name: 'exp_date' },
				{ data: 'qty', name: 'qty' },
				{ data: null,
					"render": function(data,type,row) { return decimalNumber(data['price_import']) }
				},
				{ data: null,
					"render": function ( data, type, row, meta ) {
						return '<a class="fa fa-edit"></a>';
					}
				}
				]
			});
			tableLotNo.on('order.dt search.dt', function () {
				tableLotNo.column(0).nodes().each(function (cell, i) {
					cell.innerHTML = i + 1;
				});
			}).draw();

			$('#buttonDSLotNo').click(function(){
				tableLotNo
				.columns(1)
				.search( $('#searchDSLotNo').val() )
				.draw();
			});

			$('#data-table-lotno_length select').select2({
				minimumResultsForSearch: -1
			});
			$('#data-table-lotno_paginate').after($('#data-table-lotno_length'));
		}
	});

	$("#selectLotNo").select2();

	$('#selectLotNo').on('change', function(){
		let data = $("#selectLotNo option:selected").val();
		DataTableSelectLotNo(data);
	})

}

function barCode(id){
	$.ajax({
		type:"GET",
		url: "{{ url('hanghoa/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			$.ajax({
				type: "GET",
				url: "{{ url('nhaptunhacungcap/getlistunitwithid') }}",
				data: {id:res.id},
				success: function(response) {
					dataMaVach.unit = response[0].unit;
					dataMaVach.price_sell = response[0].price_sell;
					dataMaVach.stock_id = res.id;
					dataMaVach.name = res.name;
					dataMaVach.stock_type = res.stock_type;
					dataMaVach.reg_no = res.reg_no;
					dataMaVach.packaging = res.packaging;
					$('#barCodeTitle').text("In mã vạch hàng hoá: "+res.name);
					$('.tenThuoc').text(res.name);
					let test = "HH"+checkRangeValue(res.id);
					JsBarcode(".maVachThuoc",test,{
						margin: 0,
						width:2,
						height:45
					});
					$('.giaBan').text(decimalNumber(response[0].price_sell)+" VNĐ");
					$('.donVi').text(response[0].unit);
				}
			});
		}
	})
}

$('#inMaVach').click(function(){
	console.log(dataMaVach);
	$.ajax({
		type: "POST",
		url: "{{ url('hanghoa/luuLichSuInMaVach') }}",
		dataType:'json',
		contentType: 'json',
		data: JSON.stringify(dataMaVach),
		contentType: 'application/json; charset=utf-8',
		success: function(success){
		}
	});

	var mywindow = window.open('', 'PRINT', 'height=600,width=1000');
	mywindow.document.write(`
		<div style="">
		${$('.contentMaVach').html()}
		</div>
		`);

	mywindow.document.close();
	mywindow.focus();

	mywindow.print();
	mywindow.close();

	return true;
});

function changeFunc(id){
	$.ajax({
		type:"GET",
		url: "{{ url('hanghoa/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			Swal.fire({
				title: "Bạn chắc chắn muốn tạm dừng sử dụng [ "+res.name+" ] không?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Đồng ý!',
				cancelButtonText: 'Không!'
			}).then((result) => {
				if (result.value) {
					$.ajax({
						type:"POST",
						url: "{{ url('hanghoa/active') }}",
						data: { id: id },
						dataType: 'json',
						success: function(res){
							$.toast({
								text : "Ngừng hoạt động hàng hoá thành công",
								position: "bottom-right",
								icon:"success",
								stack:1,
								loader:false
							});
							$('#data-table').DataTable().ajax.reload();
						}
					});
				} else {
					swal("Cancelled Successfully");
				}
			});
		}
	})
}
</script>
<script>
	$(document).ready(function () {

		$("#editStock" ).click(function() {
			let haCheck = 0;
			if($('.name').val()==''){
				haCheck=1;
				$.toast({
					text : "Thiếu thông tin hàng hoá",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
				$('.name').focus();
			}else if($('.reg_no').val()==''){
				haCheck=1;
				$.toast({
					text : "Số đăng ký không được phép để trống",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
				$('.reg_no').focus();
			}
			for(let i =0;i<DataTable_unit.length;i++){
				if((DataTable_unit[i]['unit']==null)||(DataTable_unit[i]['unit']=='')){
					haCheck=1;
					$.toast({
						text : "Tên đơn vị tính số "+(i+1)+" không được để trống",
						position: "bottom-right",
						icon:"error",
						stack:1,
						loader:false
					})
				}else if(DataTable_unit[i]['exchange']==''){
					haCheck=1;
					$.toast({
						text : "Giá trị quy đổi không được để trống",
						position: "bottom-right",
						icon:"error",
						stack:1,
						loader:false
					})
					$("input[data-name='exchange'][data-id='"+i+"']").focus();
				}
			}
			if(haCheck==0){
				$('#chiTiet').modal('hide');
				$('.stock_type').attr('disabled', false);
				$('.stock_group').attr('disabled', false);
				$.ajax({
					url: "{{ url('hanghoa') }}",
					type: "POST",
					data: $('#editStockForm').serialize()+"&VAT_sell="+replaceCurrency($('.VAT_sell').val()),
					success: function( response ) {
					}
				});
				DataTable_unit.forEach(item=>{
					item.exchange = replaceCurrency(item.exchange);
					item.price_sell = replaceCurrency(item.price_sell);
				})
				$.ajax({
					url: "{{ url('hanghoa/submitunit') }}",
					type: "POST",
					dataType:'json',
					contentType: 'json',
					data: JSON.stringify(DataTable_unit),
					contentType: 'application/json; charset=utf-8',
					success: function( success ) {
						$('#data-table').DataTable().ajax.reload();
						toastr.success('Lưu thông tin hàng hoá thành công');
					}
				});
			}
		});

		new AutoNumeric("#VAT_sell",{
			maximumValue: 100,
			minimumValue: 0,
			decimalPlaces: 0,
			modifyValueOnWheel: false,
			unformatOnHover: false
		});
		new AutoNumeric(".VAT_sell",{
			maximumValue: 100,
			minimumValue: 0,
			decimalPlaces: 0,
			modifyValueOnWheel: false,
			unformatOnHover: false
		});
		$('#datepickerNoOfMonths').datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			numberOfMonths: 2
		});
		$('#closeCong').click(function () {
			if($('#stockgroup').val()!=''){
				Swal.fire({
					title: 'Thông tin chưa được lưu, bạn có muốn tiếp tục thoát ?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Đồng ý',
					cancelButtonText: 'Không'
				}).then((result) => {
					if(result.value){
						$('#cong').modal("hide");
					}
				});
			}else{
				$('#cong').modal("hide");
			}
		});
		$('.fc-datepicker').datepicker({
			showOtherMonths: true,
			selectOtherMonths: true
		});
		$(function () {
			let nhomHangHoa = $("#nhomHangHoa");
			if (nhomHangHoa.length) {
				nhomHangHoa.validate({
					rules: {
						name: {
							required: true
						}
					},
					messages: {
						name: {
							required: 'Vui lòng điền thông tin'
						}
					},
					submitHandler: function(form) {
						$.ajaxSetup({
							headers: {
								'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							}
						});
						$.ajax({
							url: "{{ url('nhomhanghoa') }}",
							type: "POST",
							data: nhomHangHoa.serialize(),
							success: function( response ) {
								$('#nhomHangHoa').trigger("reset");
								$('#cong').modal("hide");
							}
						});
					}
				})
			}
		})

	})

</script>
<script type="text/javascript">
	$('#exampleModal').on('show.bs.modal', function (){
		$('#addStockForm').trigger("reset");
		$('.toggle').toggles({
			on: false,
			height: 26
		});
		$('#stock_group').select2({
			minimumResultsForSearch: -1
		});
		$('.prescription_drug').val(0);
		$('#data-table-unit').DataTable().clear().draw();

		DataTable_unit=[];
		addUnit();
		loadDataUnit();
	});
	var form_original_data = $("#addStockForm").serialize();
	$(document).ready(function(){
		let dataOk = [];
		$('#importExcelFile').change(function(){
			$('#statusUploadFile').css("display","block");

			var filename = $(this).val().replace(/C:\\fakepath\\/i, '');

			if(this.files[0].size > 2000000) {
				let divUpload = `<span class="text-danger" style="font-size:108%;padding-top:"><em class="fa fa-close"></em> Tải file lên thất bại <strong>${filename} (${(this.files[0].size/1000000).toFixed(2)}mb)</strong> .Dung lượng file vượt quá 2mb.</span>`;
				$('#statusUploadFile').html(divUpload);
				datatableHopLeImport();
				datatableKhongHopLeImport();
				$('#importExcelForm').trigger("reset");
			}else if(!filename.match(/.(?:xlsx|xls)$/)){
				let divUpload = `<span class="text-danger" style="padding-top:10px;font-size:108%"><em class="fa fa-close"></em> Tải file lên thất bại <strong>${filename}</strong> .Định dạng file ko hợp lệ.</span>`;
				$('#statusUploadFile').html(divUpload);
				datatableHopLeImport();
				datatableKhongHopLeImport();
				$('#importExcelForm').trigger("reset");
			}else{
				var form = $('#importExcelForm')[0];
				var formData = new FormData(form);

				$.ajax({
					type: 'POST',
					url: "{{ url('hanghoa/import') }}",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success: (data) => {
						$('#importExcelForm').trigger("reset");
						let dataImport = [];
						let dataError = [];
						let dataImportArr = data['data'];
						let dataNotOk = [];
						dataOk = [];

						data['errors'].forEach(item=>{
							dataError.push({
								'id': parseInt(item.row)-2,
								'errors': item.errors[0]
							})
						});

						for(let i=0;i<dataImportArr.length;i++){
							dataImport.push({
								'id': i,
								'name': dataImportArr[i][1],
								'stock_type': dataImportArr[i][2],
								'reg_no': dataImportArr[i][3],
								'stock_group': dataImportArr[i][4],
								'ingredient': dataImportArr[i][5],
								'manufacture': dataImportArr[i][6],
								'content': dataImportArr[i][7],
								'made_in': dataImportArr[i][8],
								'packaging': dataImportArr[i][9],
								'VAT_sell': dataImportArr[i][10],
								'note': dataImportArr[i][11],
								'unit': dataImportArr[i][12],
								'price_sell': dataImportArr[i][13]
							})
						}

						dataError.forEach(item=>{
							var flag = 0;
							Object.keys(dataImport).forEach(function(key) {
								if (dataImport[key]['id'] == item.id){
									flag++;
									if(flag==1){
										dataImport[key]['errors'] = item.errors;
									}
								}
							});
						});

						dataImport.forEach(item=>{
							if(item.errors || !item.reg_no || !item.name || !item.unit || (typeof(parseInt(item.VAT_sell))=='string') || (parseInt(item.VAT_sell)>100) || (parseInt(item.VAT_sell)<0) ){
								dataNotOk.push(item);
							}else{
								dataOk.push(item);
							}
						});

						let divUpload = `<span style="color:#3ea44e">
						<em class="fa fa-check"></em> Tải file lên thành công
						<strong>${filename}.</strong></span><p style="margin:0px;padding-top:3px;color:#337ab7">Có <strong>${dataNotOk.length}</strong> hàng hoá không hợp lệ. Vui lòng kiểm tra lại</p>`;
						$('#statusUploadFile').html(divUpload);

						$('#dataTableHopLe').DataTable({
							"destroy": true,
							"ordering": false,
							"pageLength": 5,
							"lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
							"pagingType": "full_numbers",
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
									"first": "Đầu tiên",
									"last": "Cuối cùng",
									"next": "Sau",
									"previous": "Trước"
								},
							},
							aaData: dataOk,
							columns: [
							{ data: null,
								"render": function(data,type,row){
									return '<span class="text-center">'+(parseInt(data["id"])+1)+'</span>';
								}
							},
							{ data: null,
								"render": function(data,type,row){
									return '<span class="font-weight-bold">'+data['name']+'</span>'
								}
							},
							{ data: 'reg_no'},
							{ data: 'ingredient'},
							{ data: 'manufacture'},
							{ data: 'made_in'},
							{ data: 'VAT_sell'},
							{ data: null,
								"render": function(data,type,row){
									return decimalNumber(data['price_sell'])+'/'+data['unit'];
								}
							}
							]
						});
						$('#dataTableHopLe_paginate').after($('#dataTableHopLe_length'));
						$('#dataTableHopLe_length select').select2({
							minimumResultsForSearch: -1
						});
						$('#info-dataTableHopLe').empty();
						$('#dataTableHopLe_info').detach().appendTo('#info-dataTableHopLe');

						$('#dataTableKhongHopLe').DataTable({
							"destroy": true,
							"ordering": false,
							"pageLength": 5,
							"lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
							"pagingType": "full_numbers",
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
									"first": "Đầu tiên",
									"last": "Cuối cùng",
									"next": "Sau",
									"previous": "Trước"
								},
							},
							aaData: dataNotOk,
							columns: [
							{ data: null,
								"render": function(data,type,row){
									return '<span class="text-center">'+(parseInt(data["id"])+1)+'</span>';
								}
							},
							{ data: null,
								"render": function(data,type,row){
									if(data['errors']){
										return '<span class="font-weight-bold">'+data['name']+'</span> <span class="text-danger">'+data['errors']+'</span>';
									}else if(data['name']){
										return "<span class='font-weight-bold'>"+data['name']+"</span>";
									}else{
										return "<span class='text-danger'>Tên hàng hoá là bắt buộc</span>";
									}
								}
							},
							{ data: null,
								"render": function(data,type,row){
									if(data['reg_no']){
										return data['reg_no'];
									}else{
										return "<span class='text-danger'>Số đăng ký là bắt buộc</span>";
									}
								}
							},
							{ data: 'ingredient'},
							{ data: 'manufacture'},
							{ data: 'made_in'},
							{ data: null,
								"render": function(data,type,row){
									if(data['VAT_sell']){
										if(typeof(data['VAT_sell'])=='string'){
											return "<span class='text-danger'>VAT bán phải là số</span>";
										}else if(parseInt(data['VAT_sell'])>100){
											return "<span class='text-danger'>VAT bán phải nhỏ hơn 100</span>";
										}else if(parseInt(data['VAT_sell'])<0){
											return "<span class='text-danger'>VAT bán phải lớn hơn hoặc bằng 0</span>";
										}else{
											return data['VAT_sell'];
										}
									}else{
										return '';
									}
								}
							},
							{ data: null,
								"render": function(data,type,row){
									if(data['unit']){
										return decimalNumber(data['price_sell'])+'/'+data['unit'];
									}else{
										return "<span class='text-danger'>Đơn vị tính là bắt buộc</span>";
									}
								}
							}
							]
						});
						$('#dataTableKhongHopLe_paginate').after($('#dataTableKhongHopLe_length'));
						$('#dataTableKhongHopLe_length select').select2({
							minimumResultsForSearch: -1
						});
						$('#info-dataTableKhongHopLe').empty();
						$('#dataTableKhongHopLe_info').detach().appendTo('#info-dataTableKhongHopLe');
					},
					error: function(data) {
					}
				});
}
});

$('#submitImport').click(function(){
	if(dataOk.length==0){
		toastr.info('Danh sách hàng hoá hợp lệ là 0 xin vui lòng kiểm tra lại');
	}else{
		$.ajax({
			type: 'POST',
			url: '{{ url('hanghoa/insertDataExcel') }}',
			data: JSON.stringify(dataOk),
			dataType:'json',
			contentType: 'json',
			contentType: 'application/json; charset=utf-8',
			success: function(success){
				dataOk = [];
				toastr.success('Thêm mới hàng hoá thành công');
				console.log(success);
			}
		});
	}
});

$('#importExcelModal').on('shown.bs.modal', function () {
	$('#importExcelForm').trigger("reset");
	$('#statusUploadFile').empty();
	datatableHopLeImport();
	datatableKhongHopLeImport();
});
function datatableHopLeImport(){
	$('#dataTableHopLe').DataTable({
		"destroy": true,
		"ordering": false,
		"pageLength": 5,
		"lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
		"pagingType": "full_numbers",
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
				"first": "Đầu tiên",
				"last": "Cuối cùng",
				"next": "Sau",
				"previous": "Trước"
			},
		},
		aaData: []
	});
	$('#dataTableHopLe_paginate').after($('#dataTableHopLe_length'));
	$('#dataTableHopLe_length select').select2({
		minimumResultsForSearch: -1
	});
	$('#info-dataTableHopLe').empty();
	$('#dataTableHopLe_info').detach().appendTo('#info-dataTableHopLe');
}
function datatableKhongHopLeImport(){
	$('#dataTableKhongHopLe').DataTable({
		"destroy": true,
		"ordering": false,
		"pageLength": 5,
		"lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
		"pagingType": "full_numbers",
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
				"first": "Đầu tiên",
				"last": "Cuối cùng",
				"next": "Sau",
				"previous": "Trước"
			},
		},
		aaData: []
	});
	$('#dataTableKhongHopLe_paginate').after($('#dataTableKhongHopLe_length'));
	$('#dataTableKhongHopLe_length select').select2({
		minimumResultsForSearch: -1
	});
	$('#info-dataTableKhongHopLe').empty();
	$('#dataTableKhongHopLe_info').detach().appendTo('#info-dataTableKhongHopLe');
}

$('#addStock').click(function() {
	let haCheck = 0;
	for(let i =0;i<DataTable_unit.length;i++){
		if($('#name').val()==''){
			haCheck=1;
			toastr.error('Thiếu tên hàng hoá');
			$('#name').focus();
		}else if($('#reg_no').val()==''){
			haCheck=1;
			toastr.error('Số đăng ký không được phép để trống');
			$('#reg_no').focus();
		}else if((DataTable_unit[i]['unit']==null)||(DataTable_unit[i]['unit']=='')){
			haCheck=1;
			toastr.error('Tên đơn vị tính số '+(i+1)+' không được phép để trống');
		}else if(DataTable_unit[i]['exchange']==''){
			haCheck=1;
			toastr.error('Giá trị quy đổi không được phép để trống');
			$("input[data-name='exchange'][data-id='"+i+"']").focus();
		}
	}
	if(haCheck==0){
		$('#stock_type').attr('disabled', false);
		$.ajax({
			url: "{{ url('hanghoa') }}",
			type: "POST",
			data: $('#addStockForm').serialize()+"&VAT_sell="+replaceCurrency($('#VAT_sell').val()),
			success: function( response ) {
				DataTable_unit.forEach(item=>{
					item.stock_id = response.id
					item.exchange = replaceCurrency(item.exchange);
					item.price_sell = replaceCurrency(item.price_sell);
				})
				$.ajax({
					url: "{{ url('hanghoa/submitunit') }}",
					type: "POST",
					dataType:'json',
					contentType: 'json',
					data: JSON.stringify(DataTable_unit),
					contentType: 'application/json; charset=utf-8',
					success: function( success ){
						$('#addStockForm').trigger("reset");
						$('#data-table').DataTable().ajax.reload();
						DataTable_unit = [];
						addUnit();
						loadDataUnit();
						if(success){
							toastr.success('Thêm mới hàng hoá từ excel thành công');
						}
					}
				});
			}
		});
	}
});

$('#inMa').on('shown.bs.modal',function(){
	$('#dataTableInMaVach').DataTable({
		"destroy": true,
		"ordering": false,
		"pageLength": 5,
		"lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
		"pagingType": "full_numbers",
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
				"first": "Đầu tiên",
				"last": "Cuối cùng",
				"next": "Sau",
				"previous": "Trước"
			},
		},
		ajax: "{{ url('hanghoa/dataTableInMaVach') }}",
		columns: [
		{data:null, orderable:false, searchable:false,
			"render": function(data,type,row){
				return "<input type='checkbox' data-name='inmavach' />";
			}
		},
		{data:null, orderable:false, searchable:false,
			"render": function(data,type,row){
				return "HH"+checkRangeValue(data['stock_id']);
			}
		},
		{data:'name', name: 'name', orderable:false},
		{data:'unit', name: 'unit', orderable:false, searchable:false},
		{data:'stock_type', name: 'stock_type', orderable:false, searchable:false},
		{data:'reg_no', name: 'reg_no', orderable:false, searchable:false},
		{data:'packaging', name: 'packaging', orderable:false, searchable:false},
		]
	});
	$('#dataTableInMaVach_paginate').after($('#dataTableInMaVach_length'));
	$('#dataTableInMaVach_length select').select2({
		minimumResultsForSearch: -1
	});
	$('#info-dataTableInMaVach').empty();
	$('#dataTableInMaVach_info').detach().appendTo('#info-dataTableInMaVach');	

	$('#dataTableInMaVach').on('click','td',function(){
		let dataDanhSachIn = [];
		$(':checkbox',$(this).parents('tr')).trigger("click");
		dataDanhSachIn.push($('#dataTableInMaVach').DataTable().row( $(this).parents('tr') ).data());
		console.log(dataDanhSachIn);

		$('.tenNhaThuocModalInMa').text('HKD Nhà Thuốc Morioka');
		$('.tenThuocModalInMa').text(dataDanhSachIn[0].name);
		let maHHModalInMa = "HH"+checkRangeValue(dataDanhSachIn[0].id);
		JsBarcode(".maVachThuocModalInMa",maHHModalInMa,{
			margin: 0,
			width:2,
			height:45
		});
		$('.giaBanModalInMa').text(decimalNumber(dataDanhSachIn[0].price_sell)+" VNĐ");
		$('.donViModalInMa').text(dataDanhSachIn[0].unit);

		$('#dataTableSelectMaVach').DataTable({
			"destroy": true,
			"ordering": false,
			"pageLength": 5,
			"lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
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
					"next": "Sau",
					"previous": "Trước"
				},
			},
			aaData: dataDanhSachIn,
			columns: [
			{data:null, orderable:false, searchable:false,
				"render": function(data,type,row){
					return "HH"+checkRangeValue(data['stock_id']);
				}
			},
			{ data: 'name', name: 'name',  orderable:false, searchable:false,},
			{ data: 'unit', name: 'unit',  orderable:false, searchable:false,},
			{data:null, orderable:false, searchable:false,
				"render": function(data,type,row){
					return decimalNumber(data['price_sell']);
				}
			},
			{data:null, orderable:false, searchable:false,
				"render": function(data,type,row){
					return "4";
				}
			},
			{data:null, orderable:false, searchable:false,
				"render": function(data,type,row){
					return `<span class="fas fa-trash-alt" style="padding-top:20%;width:100%;color:red" aria-hidden="true"></span>`;
				}
			},
			]
		});
		$('#dataTableSelectMaVach_paginate').after($('#dataTableSelectMaVach_length'));
		$('#dataTableSelectMaVach_length select').select2({
			minimumResultsForSearch: -1
		});
		$('#info-dataTableSelectMaVach').empty();
		$('#dataTableSelectMaVach_info').detach().appendTo('#info-dataTableSelectMaVach');

	})
});

$('#buttonInMaModalInMa').click(function(){
	var mywindow = window.open('', 'PRINT', 'height=600,width=1000');
	mywindow.document.write(`
		<div style="">
		${$('#contentModalInMa').html()}
		</div>
		`);

	mywindow.document.close();
	mywindow.focus();

	mywindow.print();
	mywindow.close();

	return true;
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
			k: 'C',
			v: 'Hộ Kinh Doanh Nhà Thuốc Morioka'
		}
		]);
		var r2 = Addrow(2, [{
			k: 'C',
			v: 'TRUY XUẤT HÀNG HOÁ'
		}
		]);
		var r3 = Addrow(3, [{
			k: 'A',
			v: 'Mã HH:'
		}, {
			k: 'B',
			v: $('#barcode').val()
		}, {
			k: 'D',
			v: 'Tên HH:'
		}, {
			k: 'E',
			v: $('.name').val()
		}
		]);
		var r4 = Addrow(4, [{
			k: 'A',
			v: 'Số đăng ký:'
		}, {
			k: 'B',
			v: $('.reg_no').val()
		}, {
			k: 'D',
			v: 'Hãng sản xuất:'
		}, {
			k: 'E',
			v: $('.manufacture').val()
		}
		]);
		var r5 = Addrow(5, [{
			k: 'A',
			v: $("#selectLotNo option:selected").text()
		}
		]);

		sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + r4 + r5 + sheet.childNodes[0].childNodes[1].innerHTML;

		$('row:eq(0) c', sheet).attr( 's', '3' );
		$('row:eq(1) c', sheet).attr( 's', '2' );
		$('row:eq(5) c', sheet).attr( 's', '7' );

	},
	exportOptions: {
		columns: [1, 2, 3, 4, 5, 6]
	},
}

function DataTableSelectLotNo(dataha){
	$.ajax({
		type:"GET",
		url: "{{ url('nhaptunhacungcap/selectlotno') }}",
		data: {id:dataha},
		dataType: 'json',
		success: function(res){
			console.log(res);
			var table6 = $('#data-table-select-lotno').DataTable({
				"destroy": true,
				"ordering": false,
				"pageLength": 5,
				"lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
				"pagingType": "full_numbers",
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
				aaData: res,
				columns: [
				{ data: 'stock_id', name: 'stock_id'},
				{ data: null ,
					"render": function(data,type,row) {
						if(data["idSupplier"]!==null){
							return "PN"+checkRangeValue(data["idSupplier"]);
						}else if(data["idCustomer"]!==null){
							return "PKT"+checkRangeValue(data["idCustomer"]);
						}else if(data["idIventor"]!==null){
							return "PNT"+checkRangeValue(data["idIventor"]);
						}else{
							return "HD"+checkRangeValue(data["idSell"]);
						}
					}
				},
				{ data: 'type', name: 'type'},
				{ data: null,
					"render": function(data,type,row) {
						if(data["dateSupplier"]!==null){
							return data["dateSupplier"] +' '+data["hourSupplier"];
						}else if(data["dateCustomer"]!==null){
							return data["dateCustomer"] +' '+data["hourCustomer"];
						}else if(data["dateSell"]!==null){
							return data["dateSell"] +' '+data["hourSell"];
						}else{
							return data["dateIventor"] +' '+data["hourIventor"];
						}
					}
				},
				{ data: null,
					"render": function(data,type,row) {
						if(data["nameSupplier"]!==null){
							return data["nameSupplier"];
						}else if(data["nameCustomer"]!==null){
							return data["nameCustomer"];
						}else if(data["nameSell"]!==null){
							return data["nameSell"];
						}else if(data["type"]=="import_inventory"){
							return "";
						}else{
							return 'Khách lẻ'
						}
					}
				},
				{ data: null,
					"render": function(data,type,row,meta) {
						if((data['type']==="import_from_supplier")||(data['type']==="import_inventory")||(data['type']==="return_from_customer")){
							return '<label class="font-weight-bold tx-gray-700" style="color:#3598dc">+'+data['qty']+'</label>';
						}else{
							return '<label class="font-weight-bold tx-gray-700" style="color:#e7505a">-'+data['qty']+'</label>';
						}
					}
				},
				{ data: 'price'}
				],
				"columnDefs": [
				{
					"targets": 2,
					"render": function ( data, type, row, meta ) {
						if(data=="import_from_supplier"){
							return '<label class="font-weight-bold tx-gray-700" style="color:#3598dc">Phiếu nhập từ nhà cung cấp</label>';
						}
						if(data=="import_inventory"){
							return '<label class="font-weight-bold tx-gray-700" style="color:#3598dc">Phiếu nhập tồn</label>';
						}
						if(data=="return_from_customer"){
							return '<label class="font-weight-bold tx-gray-700" style="color:#3598dc">Phiếu khách hàng trả lại</label>';
						}
						if(data=="return_from_supplier"){
							return '<label class="font-weight-bold tx-gray-700" style="color:#e7505a">Phiếu xuất trả nhà cung cấp</label>';
						}
						if(data=="return_from_supplier"){
							return '<label class="font-weight-bold tx-gray-700" style="color:#e7505a">Phiếu xuất huỷ</label>';
						}
						if(data=="sell"){
							return '<label class="font-weight-bold tx-gray-700" style="color:#e7505a">Hoá đơn</label>';
						}
					}
				},
				{
					"targets": [ 6 ],
					"visible": false,
					"searchable": false
				}
				],
				dom: 'Blfrtip',
				buttons: [
				$.extend(true, {}, xlsBuilder, {
					extend: 'excelHtml5',
					title: 'TruyXuatHangHoa_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
					text:'<span class="text-light">Xuất file Excel</span>'
				})
				]
			});

			$('.dt-buttons a[aria-controls="data-table-select-lotno"]').appendTo('#exportExcelDBLotNo');

			table6.on('order.dt search.dt', function () {
				table6.column(0).nodes().each(function (cell, i) {
					cell.innerHTML = i + 1;
				});
			}).draw();

			$('#searchDBLotNo').click(function(){
				table6
				.columns(2)
				.search( $('#searchLoaiPhieu option:selected').val() )
				.draw();
			});

			$('#data-table-select-lotno_length select').select2({
				minimumResultsForSearch: -1
			});
			$('#data-table-select-lotno_paginate').after($('#data-table-select-lotno_length'));
		}
	});
}
$('#addActive').click(function(){
	$('#nav-contact').removeClass('active');
	$('#nav-home').removeClass('active');
})
$('#listSoLo').click(function(){
	$('#nav-profile').removeClass('active');
	$('#nav-home').removeClass('active');
})
$('#rmActive').click(function(){
	$('#nav-profile').removeClass('active');
	$('#nav-contact').removeClass('active');
})

</script>
<style type="text/css">
	#data-table-select-lotno_info {
		padding-right: 10px;
	}

	#data-table-lotno_info {
		padding-right: 10px;
	}
	input[data-name="inmavach"] {
		height: 18px;
		width: 18px;
		vertical-align: middle !important;
		text-align: center !important;
		cursor: pointer;
	}
	#dataTableInMaVach tr {
		cursor: pointer;
	}
	input[data-name="useforsale"],
	input[data-name="outofstock"] {
		height: 20px;
		width: 20px;
		vertical-align: middle !important;
		text-align: center !important;
		cursor: pointer;
	}

	span[data-name="delunit"] {
		font-size: 1.33333333em;
		line-height: .75em;
		vertical-align: -15%;
		cursor: pointer;
		vertical-align: middle !important;
		text-align: center !important;
	}

	input[disabled] {
		cursor: not-allowed;
	}

	.select-dropdown {
		position: static;
	}

	#data-table-select-lotno #thID {
		width: 5% !important;
	}

	#data-table-select-lotno #thMa {
		width: 10% !important;
	}

	#data-table-select-lotno #thLoai {
		width: 31% !important;
	}

	#data-table-select-lotno #thNgay {
		width: 17% !important;
	}

	#data-table-select-lotno #thDoi {
		width: 22% !important;
	}

	#data-table-select-lotno #thChech {
		width: 15% !important;
	}

	#data-table-lotno #thSTT {
		width: 10% !important;
	}

	#data-table-lotno #thSolo {
		width: 30% !important;
	}

	#data-table-lotno #thHanDung {
		width: 20% !important;
	}

	#data-table-lotno #thSoLuong {
		width: 15% !important;
	}

	#data-table-lotno #thGiaVon {
		width: 20% !important;
	}

	#data-table-lotno #thEdit {
		width: 5% !important;
	}

	.col1UnitEdit {
		width: 23% !important;
	}

	.col2UnitEdit {
		width: 10% !important;
	}

	.col3UnitEdit {
		width: 15% !important;
	}

	.col4UnitEdit {
		width: 12% !important;
	}

	.col5UnitEdit {
		width: 12% !important;
	}

	.col6UnitEdit {
		width: 16% !important;
	}

	.col7UnitEdit {
		width: 6% !important;
	}

	.col8UnitEdit {
		width: 7% !important;
	}
</style>
@endsection

