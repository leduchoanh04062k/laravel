<div class="dropdown">
	<button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
	data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	<i class="fa fa-cog" aria-hidden="true"></i>
	Thao tác
	</button>
	<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
		<!-- Button chi tiết -->
		<button type="button" class="btn btn-primary dropdown-item" data-toggle="modal"
		data-target="#chiTiet">
		Thông tin hàng hóa
	</button>
	<button class="dropdown-item" href="#">Thẻ kho</button>
	<button class="dropdown-item" href="#">In mã vạch</button>
	<button type="button" class="btn btn-primary dropdown-item" onClick="changeFunc({{ $id }})">Ngừng hoạt động</button>
	</div>
	<div>
		<!-- Modal chi tiết-->
		<div class="modal fade" id="chiTiet" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document"
			style="max-width: none;width: 100em;vertical-align: top;">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thông tin hàng hóa</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="" id="themHangHoaTong">
						<div class="modal-body">
							<ul class="nav nav-tabs" role="tablist" id="mytab">
				              <li class="nav-item">
				                <a class="nav-link active" data-toggle="tab" href="#nav-home">Thêm hàng hoá tổng</a>
				              </li>
				              <li class="nav-item">
				                <a class="nav-link" data-toggle="tab" href="#nav-profile">Thẻ kho</a>
				              </li>
				              <li class="nav-item">
				                <a class="nav-link" data-toggle="tab" href="#nav-contact">Danh sách số lô</a>
				              </li>
				            </ul>
							{{-- <nav>
							  <div class="nav nav-tabs" id="nav-tab" role="tablist" id="mytab">
							    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
							    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
							    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
							  </div>
							</nav> --}}
							<div class="tab-content" id="nav-tabContent">
							  	<div class="tab-pane active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
								  	<div class="row">
										<div class="col-md-12">
											<label for="" class="tx-gray-800 tx-bold">Sao chép thông tin thuốc</label>
											<input type="text" class="form-control"
											placeholder="Nhập thông tin thuốc muốn sao chép">
										</div>
									</div>
									<div class="row mg-t-10">
										<div class="col-md-6">
											<label for="" class="tx-gray-800 tx-bold">Tên hàng hoá <span
											class="text-danger">*</span></label>
											<input type="text" class="form-control" name="name">
										</div>
										<div class="col-md-3">
											<label for="" class="tx-gray-800 tx-bold">Mã hàng hoá</label>
											<input type="text" class="form-control" placeholder="Mã tự động">
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
															<div class="toggle-blob"
															style="height: 26px; width: 26px; margin-left: -13px;"></div>
															<div class="toggle-off"
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
											<select name="" id="" class="form-control">
												<option value="">Dược phẩm</option>
												<option value="">Vật tư y tế</option>
												<option value="">Hàng hoá khác</option>
											</select>
										</div>
										<div class="col-md-6">
											<label for="" class="tx-gray-800 tx-bold">Nhóm hàng hoá</label>
											<div class="pos-relative">
												<select name="" id="" class="form-control">
													<option value="">Hô hấp</option>
													<option value="">Vật tư y tế</option>
													<option value="">Hàng hoá khác</option>
												</select>
												<!-- Button cộng -->
												<button type="button" class="btn btn-primary pos-absolute r-0 t-0"
												data-toggle="modal" data-target="#cong">
												<i class="fa fa-plus" aria-hidden="true"></i>
												</button>

											</div>

										</div>
									</div>
									<div class="row mg-t-10">
										<div class="col-md-3">
											<label for="" class="tx-gray-800 tx-bold">Số đăng ký <span
											class="text-danger">*</span></label>
											<input type="text" class="form-control" name="sodangky">
										</div>
										<div class="col-md-3">
											<label for="" class="tx-gray-800 tx-bold">Hoạt chất</label>
											<input type="text" class="form-control">
										</div>
										<div class="col-md-3">
											<label for="" class="tx-gray-800 tx-bold">Hàm lượng</label>
											<input type="text" class="form-control">
										</div>
										<div class="col-md-3">
											<label for="" class="tx-gray-800 tx-bold">Quy cách đóng gói</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="row mg-t-10">
										<div class="col-md-6">
											<label for="" class="tx-gray-800 tx-bold">Hãng sản xuất</label>
											<input type="text" class="form-control">
										</div>
										<div class="col-md-3">
											<label for="" class="tx-gray-800 tx-bold">Nước sản xuất</label>
											<input type="text" class="form-control">
										</div>
										<div class="col-md-3">
											<label for="" class="tx-gray-800 tx-bold">VAT(%)</label>
											<input type="number" class="form-control" placeholder="0.00">
										</div>
										<div class="col-md-12 mg-t-10">
											<label for="" class="tx-gray-800 tx-bold">Mô tả</label>
											<input type="text" class="form-control">
										</div>
									</div>
									<div class="row mg-t-10">
										<div class="col-md-12 tx-gray-800 tx-bold">Danh sách đơn vị tính</div>
										<div class="col-md-12 ng-t-10">
											<table class="table table-borderless bd">
												<thead>
													<tr class="bg-primary">
														<th scope="col" style="color: white;width: 20%;">Tên đơn vị <span
															class="text-danger">*</span></th>
															<th scope="col" style="color: white;">Quy đổi <span
																class="text-danger">*</span></th>
																<th scope="col" style="color: white;">Giá bán</th>
																<th scope="col" style="color: white;">Mã vạch</th>
																<th scope="col" style="color: white;">Bán hàng</th>
																<th scope="col" style="color: white;">Cảnh báo hết hàng</th>
																<th scope="col" style="color: white;">S.lg</th>
															</tr>
														</thead>
														<tbody>
															<tr>
																<th scope="row">
																	<select name="tendonvi" class=" form-control">
																		<option value="">Chọn đơn vị</option>
																		<option value="">Bánh</option>
																		<option value="">Bình</option>
																		<option value="">Bịch</option>
																	</select>
																</th>
																<td>
																	<input type="number" placeholder="1" disabled="disabled"
																	class="form-control">
																</td>
																<td>
																	<input type="number" placeholder="1" class="form-control">
																</td>
																<td>
																	<input type="text" placeholder="Mã tự động" class="form-control">
																</td>
																<td>
																	<input type="checkbox">
																</td>
																<td>
																	<input type="checkbox">
																</td>
																<td>
																	<input type="number" placeholder="1" class="form-control">
																</td>
															</tr>
														</tbody>
													</table>
											</div>
									</div>
								</div>
							  	<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
							  		<div class="row mg-t-10">
					                  <div class="col-md-3">
					                    <label for="" class="tx-bold tx-gray-700">Từ ngày</label>
					                    <input type="time" class="form-control">
					                  </div>
					                  <div class="col-md-3">
					                    <label for="" class="tx-bold tx-gray-700">Tới ngày</label>
					                    <input type="time" class="form-control">
					                  </div>
					                  <div class="col-md-6">
					                    <label for="" class="tx-bold tx-gray-700">Loại phiếu</label>
					                    <select name="" id="" class="form-control">
					                      <option value="">Tất cả</option>
					                      <option value="">Hoá đơn</option>
					                    </select>
					                  </div>
					                </div> 
					                <div class="row mg-t-10">
					                  <div class="col-md-6">
					                    <label for="" class="tx-bold tx-gray-700">Số lô</label>
					                    <select name="" id="" class="form-control">
					                      <option value="">Tất cả</option>
					                      <option value="">Hoá đơn</option>
					                    </select>
					                  </div>
					                  <div class="col-md-2 align-self-end">
					                    <button class="btn btn-info"><i class="fa fa-search mr-2" aria-hidden="true"></i>Tìm kiếm</button>
					                  </div>
					                  <div class="col-md-2 align-self-end">
					                    <button class="btn btn-info"><i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>Xuất excel file</button>
					                  </div>
					                </div>
					                <div class="row mg-t-10">
					                  <div class="col-md-12">
					                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
					                      <thead>
					                        <tr>
					                          <th scope="col" class="bg-primary" style="color: white;">STT</th>
					                          <th scope="col" class="bg-primary" style="color: white;">Mã phiếu</th>
					                          <th scope="col" class="bg-primary" style="color: white;">Loại phiếu</th>
					                          <th scope="col" class="bg-primary" style="color: white;">Ngày giao dịch</th>
					                          <th scope="col" class="bg-primary" style="color: white;">Đối tác giao dịch</th>
					                          <th scope="col" class="bg-primary" style="color: white;">Chênh lệch</th>
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
					                    <input type="text" class="form-control">
					                  </div>
					                  <div class="col-md-2 align-self-end">
					                  <button class="btn btn-info"><i class="fa fa-search mr-2" aria-hidden="true"></i>Tìm kiếm</button>
					                  </div>
					                </div>
					                <div class="row mg-t-10">
					                  <div class="col-md-12">
					                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
					                      <thead>
					                        <tr>
					                          <th scope="col" class="bg-primary" style="color: white;">STT</th>
					                          <th scope="col" class="bg-primary" style="color: white;">Số lô</th>
					                          <th scope="col" class="bg-primary" style="color: white;">Hạn dùng</th>
					                          <th scope="col" class="bg-primary" style="color: white;">Số lượng</th>
					                          <th scope="col" class="bg-primary" style="color: white;">Giá vốn</th>
					                          <th scope="col" class="bg-primary" style="color: white;"></th>
					                        </tr>
					                      </thead>
					                    </table>
					                  </div>                  
					                </div>
							  	</div>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary">Lưu và thêm mới</button>
								<button type="submit" class="btn btn-primary">Lưu và đóng</button>
								<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
							</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
 <script>
$('#mytab a').on('click', function (e) {
  e.preventDefault()
  $('.tab-pane').removeClass('active');
})
</script>