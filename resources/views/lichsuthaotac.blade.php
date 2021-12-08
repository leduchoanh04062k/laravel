@extends('default')
@section('title','Lịch sử thao tác')
@section('content')

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel pos-relative">
        <!-- tab1 -->
        <div id="tab1" >
          <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
              <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase" >Lịch sử thao tác</h4>
            </div>
          </div>
          <!-- Content -->
          <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
              <div class="row tx-gray-900">
                <div class="col-md-2">
                  <label for="">Từ ngày</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                    <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                  </div>
                </div>
                <div class="col-md-2">
                  <label for="">Tới ngày</label>
                  <div class="input-group">
                    <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                    <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                  </div>
                </div>
                <div class="col-md-2">
                  <label for="">Tên đăng nhập</label>
                  <input type="text" class="form-control">
                </div>
                <div class="col-md-2">
                  <label for="">Dịch vụ</label>
                  <input type="text" class="form-control">
                </div>
                <div class="col-md-2">
                  <label for="">Trạng thái</label>
                  <select name="" id="" class="form-control">
                    <option value="">Tất cả</option>
                    <option value="">Thành công</option>
                    <option value="">Có lỗi</option>
                  </select>
                </div>
              </div>
              <div class="row tx-gray-900 mg-t-20">
                <div class="col-md-4">
                  <label for="">Hoạt động</label>
                  <input type="text" class="form-control">
                </div>
                <div class="col-md-6">
                    <label for="">Trình duyệt</label>
                    <input type="text" class="form-control" >
                </div>
                <div class="col-md-2 align-self-end">
                  <button class="btn btn-info">Tìm kiếm</button>
                </div>
              </div>
              <div class="mg-t-20" style="overflow-x: auto;">
                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                  <thead>
                    <tr>
                      <th scope="col" class="bg-primary" style="color: white;min-width: 20px;width: 3%;">#</th>
                      <th scope="col" class="bg-primary" style="color: white;min-width: 150px;;">Thời gian</th>
                      <th scope="col" class="bg-primary" style="color: white;min-width: 70px;">Tên đăng nhập</th>
                      <th scope="col" class="bg-primary" style="color: white;min-width: 200px;">Dịch vụ</th>
                      <th scope="col" class="bg-primary" style="color: white;min-width: 90px;">Hoạt động</th>
                      <th scope="col" class="bg-primary" style="color: white;min-width: 90px;">Thời lượng</th>
                      <th scope="col" class="bg-primary" style="color: white;min-width: 100px;">Địa chỉ ip</th>
                      <th scope="col" class="bg-primary" style="color: white;min-width: 140px;">Client</th>
                      <th scope="col" class="bg-primary" style="color: white;min-width: 90px;">Trình duyệt</th>
                      <th scope="col" class="bg-primary" style="color: white;min-width: 70px;">Trạng thái</th>
                      <th scope="col" class="bg-primary" style="color: white;min-width: 50px;"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>2021-04-07 21:55:11</td>
                      <td>hni01g8030588_admin</td>
                      <td>@newPSG.PMS.Sessions.SessionAppService</td>
                      <td>UserSession</td>
                      <td>0 ms</td>
                      <td>42.118.39.40</td>
                      <td>Otto</td>
                      <td>Chrome / 85.0 / WinNT</td>
                      <td> Thành công</td>
                      <td>
                        <!-- Button search -->
                        <button type="button" class="btn btn-light" data-toggle="modal" data-target="#search">
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </button>

                        <!-- Modal search-->
                        <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document" style="max-width: none;width: 50em;vertical-align: top;">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Chi tiết nhật ký</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <form action="">
                                <div class="modal-body">
                                  <h4>THÔNG TIN NGƯỜI DÙNG</h4>
                                  <div class="mg-t-10">
                                    <div class="row mg-t-10">
                                      <div class="col-md-3" style="text-align: end;"><label for="" class="tx-gray-800 tx-bold ">Tên đăng nhập:</label></div>
                                      <div class="col-md-9">hni01g8030588_admin</div>
                                    </div>
                                    <div class="row mg-t-10">
                                      <div class="col-md-3"  style="text-align: end;"><label for="" class="tx-gray-800 tx-bold">Địa chỉ IP:</label></div>
                                      <div class="col-md-9">42.118.39.40</div>
                                    </div>
                                    <div class="row mg-t-10">
                                      <div class="col-md-3"  style="text-align: end;"><label for="" class="tx-gray-800 tx-bold">Client:</label></div>
                                      <div class="col-md-9"></div>
                                    </div>
                                    <div class="row mg-t-10">
                                      <div class="col-md-3"  style="text-align: end;"><label for="" class="tx-gray-800 tx-bold">Trình duyệt:</label></div>
                                      <div class="col-md-9">Chrome / 85.0 / WinNT</div>
                                    </div>
                                  </div>
                                  <div class="mg-t-10">
                                  </div>
                                  <h4>ACTION IFNORMATIONS</h4>
                                  <div class="mg-t-10">
                                    <div class="row mg-t-10">
                                      <div class="col-md-3" style="text-align: end;"><label for="" class="tx-gray-800 tx-bold ">Dịch vụ:</label></div>
                                      <div class="col-md-9">newPSG.PMS.Sessions.SessionAppService</div>
                                    </div>
                                    <div class="row mg-t-10">
                                      <div class="col-md-3"  style="text-align: end;"><label for="" class="tx-gray-800 tx-bold">Hoạt động:</label></div>
                                      <div class="col-md-9">UserSession</div>
                                    </div>
                                    <div class="row mg-t-10">
                                      <div class="col-md-3"  style="text-align: end;"><label for="" class="tx-gray-800 tx-bold">Thời gian:</label></div>
                                      <div class="col-md-9">31 phút trước (2021-04-07 21:55:11)</div>
                                    </div>
                                    <div class="row mg-t-10">
                                      <div class="col-md-3"  style="text-align: end;"><label for="" class="tx-gray-800 tx-bold">Thời lượng:</label></div>
                                      <div class="col-md-9">Chrome / 85.0 / WinNT</div>
                                    </div>
                                    <div class="row mg-t-10">
                                      <div class="col-md-3"  style="text-align: end;"><label for="" class="tx-gray-800 tx-bold">Thông số</label></div>
                                      <div class="col-md-9"><input type="text" class="form-control" placeholder="{}" disabled="disabled"></div>
                                    </div>
                                  </div>
                                  <div class="mg-t-10">
                                    <h4>DỮ LIỆU TUỲ CHỈNH</h4>
                                  </div>
                                  <div class="mg-t-10">
                                    <h4>ERROR STATE</h4>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                </div>
                              </form>

                            </div>
                          </div>
                        </div>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div><!-- row -->
          </div><!-- br-pagebody -->
          <!--  -->
        </div>

        <!-- tab2 -->
        <div class="pos-absolute t-0 l-0 hidden" id="tab2" >
          <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
              <h4 class="tx-gray-800 mg-b-5 col-6">Tạo mới phiếu nhập</h4>
              <div class="col-6 justify-content-end d-flex">
                <div>
                  <!-- Button trigger modal nhập tồn từ excel-->
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themTuDM">
                    Thêm vào từ danh mục
                  </button>

                  <!-- Modal thêm hàng hoá vào phiếu-->
                  <div class="modal fade" id="themTuDM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width: 80em;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thêm hàng hoá vào phiếu</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <form action="">
                          <div class="shadow-base bg-white pd-15">
                            <div class="row">
                              <div class="col-md-12">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Tên hàng hoá</label>
                                  <input type="text" class="form-control" placeholder="Nhập từ khoá tìm kiếm" list="search">
                                  <datalist id="search">
                                    <option value="sancoba">sancoba</option>
                                    <option value="rohto">rohto</option>
                                  </datalist>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Loại hàng hoá</label> <br>
                                <select name="" id="" class="form-control">
                                  <option value="">Dược phẩm</option>
                                  <option value="">Vật tư y tế</option>
                                  <option value="">Hàng hoá khác</option>
                                </select>
                              </div>
                              <div class="col-md-6">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Nhóm hàng hoá</label> <br>
                                <select name="" id="" class="form-control">
                                  <option value=""></option>
                                  <option value="">Kháng viêm</option>
                                  <option value="">Dị ứng</option>
                                  <option value="">Đông dược</option>
                                  <option value="">Hạ sốt giảm đau</option>
                                </select>
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Số đăng ký</label> <br>
                                <input type="text" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold" >Hoạt chất chính</label> <br>
                                <input type="text" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold" >Hàm lượng</label> <br>
                                <input type="text" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold" >Đơn vị cơ bản</label> <br>
                                <select name="" id="" class="form-control">
                                  <option value="">Bánh</option>
                                  <option value="">Bình</option>
                                  <option value="">Bịch</option>
                                  <option value="">Bộ</option>
                                </select>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Quy cách đóng gói</label> <br>
                                <input type="text" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Hãng sản xuất</label> <br>
                                <input type="text" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Nước sản xuất</label> <br>
                                <input type="text" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">VAT(bán)</label> <br>
                                <input type="text" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Đơn vị nhập</label> <br>
                                <select name="" id="" class="form-control">
                                  <option value="">Bánh</option>
                                  <option value="">Bình</option>
                                  <option value="">Bịch</option>
                                  <option value="">Bộ</option>
                                </select>
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Tỷ lệ quy đổi</label> <br>
                                <input type="text" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Số lô</label> <br>
                                <input type="text" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Hạn sử dụng</label> <br>
                                <div class="input-group ">
                                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                  <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Số lượng nhập</label> <br>
                                <input type="text" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Đơn giá</label> <br>
                                <input type="number" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Tổng giảm giá</label> <br>
                                <input type="text" class="form-control">
                              </div>
                              <div class="col-md-3">
                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">VAT(nhập)</label> <br>
                                <input type="text" class="form-control">
                              </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                  <label for="" class="tx-gray-700 mg-t-10 tx-bold">Giá bán</label> <br>
                                  <input type="number" class="form-control">
                                </div>
                                <div class="col-md-3">
                                  <label for="" class="tx-gray-700 mg-t-10 tx-bold">Mã vạch</label> <br>
                                  <input type="text" class="form-control" placeholder="Mã tự động">
                                </div>
                                <div class="col-md-6">
                                  <label for="" class="tx-gray-700 mg-t-10 tx-bold">Thành tiền</label> <br>
                                  <input type="number" class="form-control">
                                </div>
                            </div>
                          </div>
                          <div class="col-md-12 mg-t-20">
                            <label for="" class="tx-gray-900 tx-bold">Danh sách đơn vị tính(2 đơn vị tính)</label>
                            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                              <thead>
                                <tr>
                                  <th scope="col" class="bg-primary" style="color: white;">Tên đơn vị</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Quy đổi</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Giá bán</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Mã vạch</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Bán hàng</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Cảnh báo hết hàng</th>
                                  <th scope="col" class="bg-primary" style="color: white;">Số lượng</th>
                                  <th scope="col" class="bg-primary" style="color: white;"></th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr>
                                  <td style="width:20%;">
                                    <select name="" id="" class="form-control">
                                      <option value="">Bánh</option>
                                      <option value="">Bình</option>
                                      <option value="">Bịch</option>
                                      <option value="">Bộ</option>
                                    </select>
                                  </td>
                                  <td style="width: 8%;">
                                    <input type="number" class="form-control">
                                  </td>
                                  <td style="width: 10%;">
                                    <input type="number" class="form-control">
                                  </td>
                                  <td style="width: 10%;">
                                    <input type="text" class="form-control" placeholder="Mã tự động">
                                  </td>
                                  <td style="width: 7%;text-align: center;">
                                    <input type="checkbox"  placeholder="Mã tự động">
                                  </td>
                                  <td style="width: 12%;text-align: center;">
                                    <input type="checkbox"  placeholder="Mã tự động">
                                  </td>
                                  <td style="width: 8%;">Mark</td>
                                  <td style="width: 3%;">Mark</td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary">Thêm và tiếp tục</button>
                            <button type="button" class="btn btn-primary">Thêm và đóng</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- nút thêm vào từ danh mục -->
              </div>
            </div>
          </div>

          <!-- nhập thông tin -->
          <div class="br-pagebody pd-x-20 pd-sm-x-30">
            <div class="shadow-base bg-white pd-15">
              <div class="mg-b-20">
                <div class="row">
                  <div class="col-md-8 mg-t-10">
                    <label for="" class="tx-bold tx-gray-800">Nhà cung cấp</label>
                    <input type="text" placeholder="Tìm kiếm nhà cung cấp theo mã, tên hoặc số điện thoại" list="NCC" class="form-control">
                    <datalist id="NCC">
                      <option value="aa">aa</option>
                      <option value="bb">bb</option>
                    </datalist>
                  </div>
                  <div class="col-md-4 mg-t-10">
                    <div class="row">
                      <div class="col-12">
                        <label for="" class="tx-bold tx-gray-800">Thành tiền</label>
                      </div>
                      <div class="col-12">
                          <input type="number" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 mg-t-10">
                    <div class="row">
                      <div class="col-12">
                        <label for="" class="tx-bold tx-gray-800">Mã phiếu</label>
                      </div>
                      <div class="col-12">
                        <input type="text" placeholder="Ghi chú" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 mg-t-10">
                    <div class="row">
                      <div class="col-12">
                        <label for="" class="tx-bold tx-gray-800">Ngày nhập</label>
                      </div>
                      <div class="col-12">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                          <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY"">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 mg-t-10">
                    <div class="row">
                      <div class="col-12">
                        <label for="" class="tx-bold tx-gray-800">Giờ nhập</label>
                      </div>
                      <div class="col-12">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                          <input id="tpBasic" type="text" class="form-control" placeholder="Set time">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mg-t-10">
                    <div class="row">
                      <div class="col-12">
                        <label for="" class="tx-bold tx-gray-800">Thanh toán</label>
                      </div>
                      <div class="col-12">
                        <input type="number" placeholder="0.00" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mg-t-10">
                    <div class="row">
                      <div class="col-12">
                        <label for="" class="tx-bold tx-gray-800">Mã hoá đơn</label>
                      </div>
                      <div class="col-12">
                        <input type="text"  class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 mg-t-10">
                    <div class="row">
                      <div class="col-12">
                        <label for="" class="tx-bold tx-gray-800">Ngày nhập hoá đơn</label>
                      </div>
                      <div class="col-12">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                          <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY"">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-2 mg-t-10">
                    <div class="row">
                      <div class="col-12">
                        <label for="" class="tx-bold tx-gray-800">Giờ nhập hoá đơn</label>
                      </div>
                      <div class="col-12">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                          <input id="tpBasic1" type="text" class="form-control" placeholder="Set time">
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mg-t-10">
                    <div class="row">
                      <div class="col-12">
                        <label for="" class="tx-bold tx-gray-800">Công nợ</label>
                      </div>
                      <div class="col-12">
                        <input type="number" placeholder="0.00" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="shadow-base bg-white pd-15 mg-t-25">
              <div class="col-md-12 row">
                <label for="browser" class="tx-gray-900 tx-bold">Thêm hàng hoá vào phiếu</label>
                <input list="browsers" name="browser" id="browser" class="form-control">
                <datalist id="browsers">
                  <option value="Edge">
                  <option value="Firefox">
                  <option value="Chrome">
                  <option value="Opera">
                  <option value="Safari">
                </datalist>
              </div>
            </div>

            <div class="shadow-base bg-white pd-15 mg-t-25">
              <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                <thead>
                  <tr>
                    <th scope="col" class="bg-primary" style="color: white;">#</th>
                    <th scope="col" class="bg-primary" style="color: white;">Tên HH</th>
                    <th scope="col" class="bg-primary" style="color: white;">Số lô</th>
                    <th scope="col" class="bg-primary" style="color: white;">HSD</th>
                    <th scope="col" class="bg-primary" style="color: white;">S.lg</th>
                    <th scope="col" class="bg-primary" style="color: white;">Đơn vị tính</th>
                    <th scope="col" class="bg-primary" style="color: white;">Quy đổi</th>
                    <th scope="col" class="bg-primary" style="color: white;">Giá bán</th>
                    <th scope="col" class="bg-primary" style="color: white;">Giá nhập</th>
                    <th scope="col" class="bg-primary" style="color: white;">Giảm giá</th>
                    <th scope="col" class="bg-primary" style="color: white;">VAT(%)</th>
                    <th scope="col" class="bg-primary" style="color: white;">Thành tiền</th>
                    <th scope="col" class="bg-primary" style="color: white;"></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>@mdo</td>
                    <td></td>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>Mark</td>
                    <td>Mark</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="d-flex justify-content-end  mg-t-15">
              <button class="btn btn-primary mg-r-10">Lưu</button>
              <button class="btn btn-primary" id="outTab2">Trở về</button>
            </div>
          </div>
        </div>
        <!-- end tab2 -->

      </div><!-- br-mainpanel -->
      <!-- ########## END: MAIN PANEL ########## -->
      <script>
        //Trạng thái
        $('.toggle').toggles({
            on: true,
            height: 26
          });
        // Datepicker
        $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
          });

          $('#tpBasic').timepicker();
          $('#tpBasic1').timepicker();

          $("#inTab2").click(function(){
            $("#tab1").addClass("hidden");
            $("#tab2").removeClass("hidden");
          })
          $("#outTab2").click(function(){
            $("#tab1").removeClass("hidden");
            $("#tab2").addClass("hidden");
          })

      </script>
@endsection
