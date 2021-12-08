@extends('default')
@section('title','Cài đặt')
@section('content')
  <!-- ########## START: MAIN PANEL ########## -->
  <div class="br-mainpanel">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 ">
      <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Cài đặt</h4>
    </div>
    <div class="br-pagebody pd-x-20 pd-sm-x-30">
      <div class="shadow-base bg-white pd-15">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#heThong" role="tab" aria-controls="heThong" aria-selected="true">Cấu hình hệ thống</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#mauIn" role="tab" aria-controls="mauIn" aria-selected="false">Cấu hình mẫu in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#temIn" role="tab" aria-controls="temIn" aria-selected="false">Cấu hình tem in</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#huongDan" role="tab" aria-controls="huongDan" aria-selected="false">Hướng dẫn cấu hình tem in</a>
          </li>
        </ul>
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="heThong" role="tabpanel" aria-labelledby="heThong-tab">
            <div class="row mg-t-10">
              <div class="col-md-4">
                <div class="row">
                  <div class="col-md-12">
                    <div class="">
                      <div class="bg-info pd-t-15 pd-r-15 pd-l-15 pd-b-10 d-flex justify-content-between">
                        <i class="fa fa-cog tx-white" aria-hidden="true"><span class="tx-white tx-20 mg-l-5">Cấu hình cảnh báo hàng hoá</span> </i>
                        <div>
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Thao tác
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <!-- Button trigger modal -->
                              <button type="button" class="btn dropdown-item" data-toggle="modal" data-target="#exampleModal">
                                Sửa
                              </button>
                            </div>
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="max-width: none;width: 50em;vertical-align: top;">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Cấu hình hàng hoá</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Hạn sử dụng tối thiểu</label>
                                        <div class="input-group">
                                          <input type="number" class="form-control tx-right" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                          <div class="input-group-append bg-secondary align-self-center pd-10">
                                            <span class="input-group-text tx-white" id="basic-addon2" >Tháng</span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Lưu</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                  </div>
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="bd pd-15">
                        <label for="" class="tx-gray-800 tx-bold">Hạn sử dụng tối thiểu</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control tx-right" placeholder="5" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled="disabled">
                          <div class="input-group-append bg-secondary align-self-center pd-10">
                            <span class="input-group-text tx-white" id="basic-addon2">Tháng</span>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                  <div class="col-md-12 mg-t-15">
                    <div class="">
                      <div class="bg-info pd-t-15 pd-r-15 pd-l-15 pd-b-10 d-flex justify-content-between">
                        <i class="fa fa-cog tx-white align-self-center" aria-hidden="true"><span class="tx-white tx-20 mg-l-5">Cấu hình làm tròn</span> </i>
                        <div >
                          <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Thao tác
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                              <!-- Button trigger modal -->
                              <button type="button" class="btn dropdown-item" data-toggle="modal" data-target="#lamTron">
                                Sửa
                              </button>
                            </div>
                          </div>
                          <!-- Modal -->
                          <div class="modal fade" id="lamTron" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="max-width: none;width: 50em;vertical-align: top;">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Chuyển đổi định dạng dữ liệu dạng thập phân</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="">
                                  <div class="modal-body">
                                    <div class="row">
                                      <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Làm tròn tối đa</label>
                                        <div class="input-group">
                                          <input type="number" class="form-control tx-right" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                          <div class="input-group-append bg-secondary align-self-center pd-10">
                                            <span class="input-group-text tx-white" id="basic-addon2" >Chữ số</span>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">Lưu</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                                  </div>
                                </form>

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="bd pd-15">
                        <label for="" class="tx-gray-800 tx-bold">Làm tròn tối đa</label>
                        <div class="input-group mb-3">
                          <input type="text" class="form-control tx-right" placeholder="5" aria-label="Recipient's username" aria-describedby="basic-addon2" disabled="disabled">
                          <div class="input-group-append bg-secondary align-self-center pd-10">
                            <span class="input-group-text tx-white" id="basic-addon2">Chữ số</span>
                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="">
                  <div class="bg-info pd-t-15 pd-r-15 pd-l-15 pd-b-10 d-flex justify-content-between">
                    <i class="fa fa-cog tx-white align-self-center" aria-hidden="true"><span class="tx-white tx-20 mg-l-5">Cấu hình làm tròn</span> </i>
                    <div >
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Thao tác
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                          <!-- Button trigger modal -->
                          <button type="button" class="btn dropdown-item" data-toggle="modal" data-target="#capNhat">
                            Sửa
                          </button>
                          <a href="#" class="dropdown-item">Xoá dữ liệu</a>
                        </div>
                      </div>
                      <!-- Modal -->
                      <div class="modal fade" id="capNhat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width: none;width: 50em;vertical-align: top;">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Cập nhật thông tin nhà thuốc</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="">
                              <div class="modal-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <label for="" class="tx-gray-800 tx-bold">Tên nhà thuốc</label>
                                    <input type="text" placeholder="Nhà thuốc Dược Thiện" class="form-control" disabled="disabled">
                                  </div>
                                </div>
                                <div class="row mg-t-10">
                                  <div class="col-md-6">
                                    <label for="" class="tx-gray-800 tx-bold">Số đăng ký</label>
                                    <input type="number"  class="form-control" >
                                  </div>
                                  <div class="col-md-6">
                                    <label for="" class="tx-gray-800 tx-bold">Giấy chứng nhận đủ điều kiện kinh doanh</label>
                                    <input type="number"  class="form-control" >
                                  </div>
                                  <div class="col-md-6 mg-t-10">
                                    <label for="" class="tx-gray-800 tx-bold">Tên khách hàng</label>
                                    <input type="text" placeholder="Nguyễn Quốc Tiến" class="form-control" disabled="disabled">
                                  </div>
                                  <div class="col-md-6 mg-t-10">
                                    <label for="" class="tx-gray-800 tx-bold">CMND</label>
                                    <input type="text" placeholder="123456789" class="form-control" disabled="disabled">
                                  </div>
                                  <div class="col-md-6 mg-t-10">
                                    <label for="" class="tx-gray-800 tx-bold">Email</label>
                                    <input type="email"  class="form-control" >
                                  </div>
                                  <div class="col-md-6 mg-t-10">
                                    <label for="" class="tx-gray-800 tx-bold">Điện thoại</label>
                                    <input type="email"  class="form-control" >
                                  </div>
                                  <div class="col-md-6 mg-t-10">
                                    <label for="" class="tx-gray-800 tx-bold">Người chịu trách nhiệm chuyên môn</label>
                                    <input type="text"  class="form-control" >
                                  </div>
                                  <div class="col-md-6 mg-t-10">
                                    <label for="" class="tx-gray-800 tx-bold">CMND/CCCD</label>
                                    <input type="text"  class="form-control" >
                                  </div>
                                  <div class="col-md-6 mg-t-10">
                                    <label for="" class="tx-gray-800 tx-bold">Trình độ chuyên môn</label>
                                    <input type="text"  class="form-control" >
                                  </div>
                                  <div class="col-md-6 mg-t-10">
                                    <label for="" class="tx-gray-800 tx-bold">Chứng chỉ</label>
                                    <input type="text"  class="form-control" >
                                  </div>
                                </div>
                                <div class="row mg-t-10">
                                  <div class="col-md-4">
                                    <label for="" class="tx-gray-800 tx-bold">Mã DQG</label>
                                    <input type="number"  class="form-control" >
                                  </div>
                                  <div class="col-md-4">
                                    <label for="" class="tx-gray-800 tx-bold">Tài khoản DQG</label>
                                    <input type="text"  class="form-control" >
                                  </div>
                                  <div class="col-md-4">
                                    <label for="" class="tx-gray-800 tx-bold">Mật khẩu DQG</label>
                                    <input type="password"  class="form-control" >
                                  </div>
                                </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Lưu</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                              </div>
                            </form>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="bd pd-15">
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Mã nhà thuốc:</label>hni01g8030588 (76393-47990)
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Tên khách hàng:</label>Nguyễn Quốc Tiến
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Chứng minh nhân dân:</label>024090000293
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Email:</label>linhnh7@viettel.com.vn
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Điện thoại:</label>0985982610
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Ngày hết hạn sử dụng:</label>0985982610
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Số đăng ký:</label>01G8030588
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Giấy chứng nhận đủ điều kiện kinh doanh:</label>01G8030588
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Người chịu trách nhiệm chuyên môn:</label>01G8030588
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Mã DQG:</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Tài khoản DQG:</label>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="mauIn" role="tabpanel" aria-labelledby="mauIn-tab">
            <div class="row mg-t-10 loaiMauIn">
              <div class="col-md-2 col-lg-2">
                <label for="" class="tx-gray-800 tx-bold">Trạng thái</label>
                <select name="" id="" class="form-control">
                  <option value="">Hoạt động</option>
                  <option value="">Không hoạt động</option>
                </select>
              </div>
              <div class="col-md-3 col-lg-2">
                <label for="" class="tx-gray-800 tx-bold">Loại mẫu in</label>
                <select name="" id="" class="form-control">
                  <option value="">Tất cả</option>
                  <option value="">Mẫu hoá đơn</option>
                  <option value="">Mẫu phiếu nhập</option>
                  <option value="">Mẫu phiếu nhập tồn</option>
                  <option value="">Mẫu phiếu khách hàng trả lại</option>
                </select>
              </div>
              <div class="col-md-3 col-lg-2">
                <label for="" class="tx-gray-800 tx-bold">Loại kích thước</label>
                <select name="" id="" class="form-control">
                  <option value="">Tất cả</option>
                  <option value="">Mẫu in hoá đơn A4</option>
                  <option value="">Mẫu in hoá đơn A5</option>
                  <option value="">Mẫu in hoá đơn nhiệt</option>
                </select>
              </div>
              <div class="col-lg-4 col-md-3">
                <label for="" class="tx-gray-800 tx-bold">Từ khoá</label>
                <div class="pos-relative">
                  <input type="text" class="form-control" list="theoMauIn">
                  <button class="btn btn-info pos-absolute r-0 t-0"><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
                <datalist id="theoMauIn">
                  <option value="Tất cả">Tất cả</option>
                </datalist>
              </div>
              <div class="col-md-2 col-lg-2 align-self-end">
                <button class="btn btn-primary btnTaoMauIn">Tạo mẫu in</button>
              </div>
              <div class="col-md-12 mg-t-20">
                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                  <thead>
                    <tr>
                      <th scope="col" class="bg-primary" style="color: white;">#</th>
                      <th scope="col" class="bg-primary" style="color: white;">Tên mẫu in</th>
                      <th scope="col" class="bg-primary" style="color: white;">Loại kích thước</th>
                      <th scope="col" class="bg-primary" style="color: white;">Loại mẫu in</th>
                      <th scope="col" class="bg-primary" style="color: white;">Chiều rộng</th>
                      <th scope="col" class="bg-primary" style="color: white;">Chiều dài</th>
                      <th scope="col" class="bg-primary" style="color: white;">Trạng thái</th>
                      <th scope="col" class="bg-primary" style="color: white;">Thao tác</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Mark</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                      <td>Otto</td>
                      <td>@mdo</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
            <form method="POST" action="" class="taoMauIn none"> 
            @csrf
              <div class="row mg-t-10">
                <div class="col-md-3">
                  <label for="" class="tx-gray-800 tx-bold">Trạng thái</label>
                  <select name="trangThai" id="" class="form-control">
                    <option value="1">Hoạt động</option>
                    <option value="0">Không hoạt động</option>
                  </select>
                </div>
                <div class="col-md-6">
                    <label  for="" class="tx-gray-800 tx-bold">Tên mẫu in <span style="color:red;">*</span></label>
                    <input name="tenMauIn" type="text" class="form-control">
                </div>
                <div class="col-md-2 align-self-end">
                  <div class="row">
                    <div class="col-md-6">
                      <button class="btn btn-primary " type="submit">
                        <i class="fa fa-floppy-o" aria-hidden="true"></i>
                        <span class="mg-l-5 btnLuu">Lưu</span>
                      </button>
                    </div>
                    <div class="col-md-6">
                      <button class="btn btn-danger" type="button">
                        <i class="fa fa-reply" aria-hidden="true"></i>
                        <span class="mg-l-5 btnTroVe">Trở về</span>
                      </button>
                    </div>            
                  </div>                    
                </div>
              </div>
              <div class="row mg-t-10">
                <div class="col-md-3">
                  <label for="" class="tx-gray-800 tx-bold">Loại mẫu in <span style="color:red;">*</span></label>
                  <select name="loaiMauIn" id="mauInHoaDon" class="form-control">
                    <option value="mauhoadon">Mẫu hoá đơn</option>
                    <option value="mauphieunhap">Mẫu phiếu nhập</option>
                    <option value="mauphieunhapton">Mẫu phiếu nhập tồn</option>
                    <option value="mauphieukhachhangtralai">Mẫu phiếu khách hàng trả lại</option>
                    <option value="mauphieuxuattrancc">Mẫu phiếu xuất trả nhà cung cấp</option>
                    <option value="mauphieuxuathuy">Mẫu phiếu xuất huỷ</option>
                    <option value="mauphieukiemkho">Mẫu phiếu kiểm kho</option>
                    <option value="mauphieucapphat">Mẫu phiếu cấp phát</option>
                    <option value="mauphieuxuattracapphat">Mẫu phiếu xuất trả cấp phát</option>
                    <option value="mauphieudieuchuyen">Mẫu phiếu điều chuyển</option>
                    <option value="mauphieuthuchi">Mẫu phiếu thu chi</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="" class="tx-gray-800 tx-bold">Loại kích thước <span style="color:red;">*</span></label>
                  <select name="loaiKichThuoc" id="mauInKichThuocHoaDon" class="form-control">
                    <option value="mauina4">Mẫu in hoá đơn A4</option>
                    <option value="mauina5">Mẫu in hoá đơn A5</option>
                    <option value="mauinnhiet">Mẫu hoá đơn in nhiệt(72mm)</option>
                    <option value="mauhoadon58">Mẫu in hoá đơn(58mm)</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="" class="tx-gray-800 tx-bold">Chiều rộng <span style="color:red;">*</span></label>
                  <input name="chieuRong" type="text" class="form-control chieuRong" value="210">
                </div>
                <div class="col-md-3">
                  <label for="" class="tx-gray-800 tx-bold">Chiều dài <span style="color:red;">*</span></label>
                  <input name="chieuDai" type="text" class="form-control chieuDai" value="297">
                </div>
              </div>
              <div class="row mg-t-10">
                <div class="col-md-2">
                  <div class="portlet" style="border:1px solid #1bbc9b;">
                     <div class="portlet__title d-flex tx-white" style="background-color:#1bbc9b;padding:11px 10px;font-size:20px;">
                        <div class="portlet__title-icon mg-r-5"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                        <div class="portlet__title-text">Từ khoá</div>
                     </div>
                     <div class="portlet__body tx-gray-700" style="overflow:scroll;">
                        <ul class="portlet__body-select" style="list-style:none;padding:15px;height:500px;padding-top:7px;">
                          <li class="select__item bg-gray pd-10">{Ten_Cua_Hang}</li>
                          <li class="select__item pd-10">{Dia_chi_cua_hang}</li>
                          <li class="select__item pd-10"><span style="color:red;">*</span>{Ma_quoc_gia}</li>
                          <li class="select__item pd-10"><span style="color:red;">*</span>{QR_code}</li>
                          <li class="select__item pd-10">{So_dien_thoai_cua_hang}</li>
                          <li class="select__item pd-10">{Ho_ten_khach_hang}</li>
                          <li class="select__item pd-10">{Dia_chi_khach_hang}</li>
                          <li class="select__item pd-10">{So_dien_thoai_khach_hang}</li>
                          <li class="select__item pd-10">{Ma_so_thue}</li>
                          <li class="select__item pd-10">{Ten_cong_ty}</li>
                          <li class="select__item pd-10">{Email_khach_hang}</li>
                          <li class="select__item pd-10">{Ma_don_hang}</li>
                          <li class="select__item pd-10">{Ngay_thang_nam}</li>
                          <li class="select__item pd-10">{Ghi_chu}</li>
                          <li class="select__item pd-10">{Lieu_dung}</li>
                          <li class="select__item pd-10">{So_dang_ky}</li>
                          <li class="select__item pd-10">{STT}</li>
                          <li class="select__item pd-10">{Ten_thuoc}</li>
                          <li class="select__item pd-10">{So_lo}</li>
                          <li class="select__item pd-10">{HSD}</li>
                          <li class="select__item pd-10">{Hang_san_xuat}</li>
                          <li class="select__item pd-10">{Hoat_chat_chinh}</li>
                          <li class="select__item pd-10">{DVT}</li>
                          <li class="select__item pd-10">{So_luong}</li>
                          <li class="select__item pd-10">{Don_gia}</li>
                          <li class="select__item pd-10">{Thanh_tien}</li>
                          <li class="select__item pd-10">{Tong_tien_truoc_thue}</li>
                          <li class="select__item pd-10">{Tong_vat}</li>
                          <li class="select__item pd-10">{Giam_gia}</li>
                          <li class="select__item pd-10">{Thanh_toan}</li>
                          <li class="select__item pd-10">{Cong_no}</li>
                          <li class="select__item pd-10">{Tong_tien}</li>
                          <li class="select__item pd-10">{Tong_tien_bang_chu}</li>
                          <li class="select__item pd-10">{Bac_sy}</li>
                          <li class="select__item pd-10">{Co_so_kham_benh}</li>
                          <li class="select__item pd-10">{Benh_nhan}</li>
                          <li class="select__item pd-10">{Dia_chi_benh_nhan}</li>
                          <li class="select__item pd-10">{Gioi_tinh_benh_nhan}</li>
                          <li class="select__item pd-10">{Tuoi_benh_nhan}</li>
                          <li class="select__item pd-10">{Loai_tuoi_benh_nhan}</li>
                          <li class="select__item pd-10">{Can_nang_benh_nhan}</li>
                        </ul>
                     </div>
                  </div>
                </div>
                <div class="col-md-5">
                  <div class="setting" style="border:1px solid #1bbc9b;">
                    <div class="setting__title d-flex tx-white" style="background-color:#1bbc9b;padding:11px 10px;font-size:20px;">
                      <div class="setting__title-icon mg-r-5"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                      <div class="setting__title-text">Tuỳ chỉnh mẫu in</div>
                    </div>
                    <textarea name="setting__body" class="setting__body" id="editor"></textarea>
                  </div>  
                </div>
                <div class="col-md-5" style="">
                  <div class="preview  tx-gray-700" style="border:1px solid #1bbc9b;overflow:hidden;">
                      <div class="preview__title d-flex tx-white" style="background-color:#1bbc9b;padding:11px 10px;font-size:20px;width:100%;">
                        <div class="preview__title-icon mg-r-5"><i class="fa fa-cogs" aria-hidden="true"></i></div>
                        <div class="preview__title-text">Xem trước mẫu in</div>
                      </div>
                      <div class="preview__body1" style="height:520px;overflow:scroll;padding:5px;">
                        <div class="preview__body" style="width:210mm;height:297mm;"></div>
                      </div>
                    </div>  
                  </div>
              </div>
            </form>
            
          </div>
          <div id="temIn" class="tab-pane fade"  role="tabpanel" aria-labelledby="temIn-tab"><br>
            <div class="row">
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
            </div >
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
                        <label for="tenNhaThuoc" class="tx-gray-800 tx-bold mg-l-10">Hiển thị tên nhà thuốc</label>
                      </div>
                      <div class="col-md-12 mg-t-10">
                        <input type="text" class="form-control" placeholder="Nhà thuốc Dược Thiện" id="hienThiTenNhaThuoc">
                      </div>
                      <div class="col-md-12 mg-t-10">
                        <input type="checkbox" id="tenSanPham">
                        <label for="tenSanPham" class="tx-gray-800 tx-bold mg-l-10">Hiển thị tên sản phẩm</label>
                      </div>
                      <div class="col-md-12 mg-t-10">
                        <input type="checkbox" id="tenVietTat">
                        <label for="tenVietTat" class="tx-gray-800 tx-bold mg-l-10">Hiển thị tên sản phẩm viết tắt</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                    <div class="row">
                      <div class="col-md-12 mg-t-10">
                        <input type="checkbox" id="hienThiGia">
                        <label for="hienThiGia" class="tx-gray-800 tx-bold mg-l-10">Hiển thị giá</label>
                      </div>
                      <div class="col-md-12 mg-t-10">
                        <input type="checkbox" id="donViTien" disabled>
                        <label for="donViTien" class="tx-gray-800 tx-bold mg-l-10">Hiển thị đơn vị tiền tệ</label>
                      </div>
                      <div class="col-md-12 mg-t-10">
                        <input type="text" class="form-control" id="nhapDonViTien" value="VNĐ">
                      </div>
                      <div class="col-md-12 mg-t-10">
                        <input type="checkbox" id="donViTinh" disabled>
                        <label for="donViTinh" class="tx-gray-800 tx-bold">Hiển thị đơn vị tính của sản phẩm</label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6 tx-center">
                      <div style="width:300px;margin: 0 auto;">
                        <div class="bd pd-5 tx-gray-800 mg-t-10" id="hienTenNhaThuoc" style="display:none;">Nhà thuốc Dược Thiện</div>
                        <div class="bd pd-5 tx-gray-800 mg-t-10" id="hienTenSanPham" style="display:none;">Tên sản phẩm</div>
                        <div class="bd pd-5 tx-gray-800 mg-t-10" id="hienTenSanPhamVietTat" style="display:none;">Tên sản phẩm viết tắt</div>
                        <div class="mg-t-10 pd-10 bd" id="hienMaVach">Mã vạch</div>
                        <div class="bd pd-5 tx-gray-800 mg-t-10" id="hienGia" style="display:none;">Giá</div>
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
                      <label for="" class="tx-gray-800 tx-bold bd-b bd-info tx-uppercase">Căn khổ giấy</label>
                    </div>
                    <div class="row mg-t-10">
                      <div class="col-md-6">
                        <label for="" class="tx-gray-800 tx-bold">Chiều rộng(mm)</label>
                        <input type="number" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label for="" class="tx-gray-800 tx-bold">Chiều dài(mm)</label>
                        <input type="number" class="form-control">
                      </div>
                    </div>
                    <div class="row mg-t-10">
                      <div class="col-md-6">
                        <label for="" class="tx-gray-800 tx-bold">Số cột</label>
                        <input type="number" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label for="" class="tx-gray-800 tx-bold">Số dòng</label>
                        <input type="number" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6 col-sm-6">
                    <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold bd-b bd-info tx-uppercase">Căn lề giấy</label>
                    </div>
                    <div class="row mg-t-10">
                      <div class="col-md-6">
                        <label for="" class="tx-gray-800 tx-bold">Lề trên(mm)</label>
                        <input type="number" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label for="" class="tx-gray-800 tx-bold">Lề dưới(mm)</label>
                        <input type="number" class="form-control">
                      </div>
                    </div>
                    <div class="row mg-t-10">
                      <div class="col-md-6">
                        <label for="" class="tx-gray-800 tx-bold">Lề trái</label>
                        <input type="number" class="form-control">
                      </div>
                      <div class="col-md-6">
                        <label for="" class="tx-gray-800 tx-bold">Lề phải</label>
                        <input type="number" class="form-control">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mg-t-20">
              <div class="col-md-6">
                <button class="btn btn-info">Khôi phục ban đầu</button>
              </div>
              <div class="col-md-6" style="text-align: end;">
                <button class="btn btn-primary">Lưu</button>
              </div>
            </div>

          </div>
          <div id="huongDan" class="tab-pane fade" role="tabpanel" aria-labelledby="huongDan-tab" style="height: 700px;overflow-x: auto;"><br>
            <div style="width:800px;margin: 0 auto;">
              <iframe src="https://www.youtube.com/embed/tgbNymZ7vqY" frameborder="0" style="width: 100%;height: 500px;"></iframe>
              <p>Để cấu hình tem in, trước hết người dùng cần cấu hình máy in đang dùng để khổ giấy phù hợp với khổ giấy sẽ in trên hệ thống</p>
              <h4 class="tx-gray-900">1. Cấu hình máy in</h4>
              <p>Với mỗi loại máy in sẽ có một cách cấu hình khác nhau, dưới đây là các hướng dẫn cấu hình máy in đối với một số mẫu máy in mẫu:</p>
              <p>Bước 1: Gõ từ khóa “Control panel” vào thanh tìm kiếm của máy tính, sau đó ấn enter</p>
              <p>Bước 2: Kích chọn “View devices and printers”</p>
              <p>Bước 3: Tại đúng máy in của người dùng, kích chuột phải chọn “Printing Preferences”</p>
              <p>Bước 4: Xuất hiện hộp thoại Printing Preferences, kích chọn “Page setup”</p>
              <h5 class="tx-gray-800">1.1. Máy in Godex</h5>
              <p>- Kích “New” để tạo mới khổ giấy in</p>
              <p>- Nhập tên khổ giấy, kích “Type” chọn “Continuous(Fixed Length)”, thiết lập kích thước khổ giấy (width,length)</p>
              <img src="https://gpp.com.vn/Common/Images/cau-hinh-in-1.png" alt="">
              <p>- Kích “OK” để tạo mới khổ giấy</p>
              <p>- Kích “Apply” để áp dụng khổ giấy in => chọn “OK” để hoàn tất cấu hình khổ giấy cho máy in.</p>
              <h5 class="tx-gray-800">1.2. Máy in Antech</h5>
              <p>- Kích “Option” để thiết lập khổ giấy in</p>
              <p>- Cài đặt số bản in, tốc độ, độ sáng, kích “Stocks” chọn “User defined” , định dạng khổ giấy(inch, potrait, rotate 180⸰) và thiết lập kích thước khổ giấy (width,length)</p>
              <img src="https://gpp.com.vn/Common/Images/cau-hinh-in-2.png" alt="">
              <p>- Kích “OK” để tạo mới khổ giấy</p>
              <p>- Kích “Apply” để áp dụng khổ giấy in => chọn “OK” để hoàn tất cấu hình khổ giấy cho máy in.</p>
              <h4 class="tx-gray-900">2. Cấu hình tem in</h4>
              <p>Với một hàng hóa, người dùng có thể tùy chọn in các kiểu mẫu tem khác nhau</p>
              <p>Bước 1: Chọn Loại giấy</p>
              <p>Bước 2: Cấu hình bố cục => Kích chọn các tùy chọn người dùng muốn hiển thị trên mẫu tem</p>
              <p>Lưu ý: nếu tên sản phẩm quá dài người dùng nên chọn hiển thị tên sản phẩm viết tắt để định dạng mẫu tem in được đẹp và đúng chuẩn nhất.</p>
              <p>Bước 3: Cấu hình khổ giấy => Người dùng tùy chỉnh lại kích thước khổ giấy tương ứng với chiều dài, chiều rộng khổ giấy đã cấu hình bên máy in</p>
              <p>Bước 4: Kích chọn vào “Đặt in mặc định” để lưu mẫu tem in cho các lần in tiếp theo</p>
              <p>Bước 5: Lưu các thông tin cấu hình</p>
              <h4 class="tx-gray-900">3. In mã vạch</h4>
              <p>Bước 1: Màn hình Quản lý hàng hóa, tại hàng hóa => chọn Thao tác “In mã vạch” hoặc nhấn phím tắt F9</p>
              <p>Bước 2: Chọn các tùy chọn in: loại giấy, bảng giá mặc định, đơn vị tính, số lần in</p>
              <p>Bước 3: In</p>
            </div>
          </div>
        </div>
      </div><!-- row -->
    </div><!-- br-pagebody -->
  </div><!-- br-mainpanel -->
  <!-- ########## END: MAIN PANEL ########## -->
  <style>
    .none{
      display: none;
    }
  </style>
  <script src="//cdn.ckeditor.com/4.16.1/full/ckeditor.js"></script>
  <script>
    $(document).ready(function(){
      var previewBody = document.querySelector('.preview__body');
      var chieuRong = document.querySelector('.chieuRong');
      var chieuDai = document.querySelector('.chieuDai');
      var preview__body = document.querySelector('.preview__body');
      var taoMauIn = document.querySelector('.taoMauIn');
      var loaiMauIn = document.querySelector('.loaiMauIn');
      var btnTaoMauIn = document.querySelector('.btnTaoMauIn');
      var btnLuu = document.querySelector('.btnLuu');
      var btnTroVe = document.querySelector('.btnTroVe');
      var mauInHoaDon = document.querySelector('#mauInHoaDon');
      var mauInKichThuocHoaDon = document.querySelector('#mauInKichThuocHoaDon');
      var settingBody =document.querySelector(".setting__body");

      //Thêm ckeditor
      var editor = CKEDITOR.replace('setting__body',{});

      //Sự kiện thay đổi nội dung
      editor.on( 'change', function(  ) {
        // getData() returns CKEditor's HTML content.
        previewBody.innerHTML = editor.getData();
      });

      let selectOption = {
          init:function(){
            this.change();
            this.setForm();
            this.button();
          },
          //Chọn cài đặt mẫu in
          button:function(){
            btnTaoMauIn.addEventListener('click',function(){
              taoMauIn.classList.remove('none');
              loaiMauIn.classList.add('none');
            })

            btnTroVe.addEventListener('click',function(){
              loaiMauIn.classList.remove('none');
              taoMauIn.classList.add('none');
            })
          },

          //Chọn chiều dài chiều rộng mẫu in
          setForm:function(){
            chieuRong.addEventListener('change',function(){
              preview__body.style.width = chieuRong.value + "mm";
            })

            chieuDai.addEventListener('change',function(){
              preview__body.style.height = chieuDai.value + "mm";
            })
          },

          //Thay đổi mẫu in
          change:function(){
            var receipt = [{
              "{Ten_cua_hang}":"Nhà thuốc Dược Thiện",
              "{Ma_don_hang}":"HD00001",
              "{Dia_chi_cua_hang}":"Số 58, phố Phạm Thận Duật",
              "{So_dien_thoai_cua_hang}": 0985982610 ,
            }]

            //Form ban đầu
            let object = receipt.map(mauIna4a5);
            CKEDITOR.instances.editor.setData(object.join(""));
            previewBody.innerHTML = editor.getData();

            //Thay đổi loại kích thước mẫu in
            mauInKichThuocHoaDon.addEventListener('change',function(){
              if(mauInKichThuocHoaDon.value == "mauina4"){
                preview__body.style.height =  "297mm";
                chieuDai.value ="297";
                preview__body.style.width =  "210mm";
                chieuRong.value ="210";
                let object = receipt.map(mauIna4a5);
                CKEDITOR.instances.editor.setData(object.join(""));
              }
              else if(mauInKichThuocHoaDon.value == "mauina5"){
                preview__body.style.height =  "148mm";
                chieuDai.value ="148";
                preview__body.style.width =  "210mm";
                chieuRong.value ="210";
                let object = receipt.map(mauIna4a5);
                CKEDITOR.instances.editor.setData(object.join(""));
              }
              else if(mauInKichThuocHoaDon.value == "mauinnhiet"){
                preview__body.style.height =  "120mm";
                chieuDai.value ="120";
                preview__body.style.width =  "72mm";
                chieuRong.value ="72";
                preview__body.style.margin =  "0 auto";
                let object = receipt.map(mauInNhiet);
                CKEDITOR.instances.editor.setData(object.join(""));
              }
              else if(mauInKichThuocHoaDon.value == "mauhoadon58"){
                preview__body.style.height =  "210mm";
                chieuDai.value ="210";
                preview__body.style.width =  "58mm";
                chieuRong.value ="58";
                preview__body.style.margin =  "0 auto";
                let object = receipt.map(mauInHoaDon58);
                CKEDITOR.instances.editor.setData(object.join(""));
              }
            });

            //Thay đổi loại mẫu in
            mauInHoaDon.addEventListener('change',function(){
              if(mauInHoaDon.value == "mauhoadon"){
                $("#mauInKichThuocHoaDon").children().remove().end();
                $("#mauInKichThuocHoaDon").append("<option value='mauina4'> Mẫu in hoá đơn A4 </option>");
                $("#mauInKichThuocHoaDon").append("<option value='mauina5'> Mẫu in hoá đơn A5 </option>");
                $("#mauInKichThuocHoaDon").append("<option value='mauinnhiet'> Mẫu in nhiệt(72mm) </option>");
                $("#mauInKichThuocHoaDon").append("<option value='mauhoadon58'> Mẫu in hoá đơn(58mm) </option>");
                let object = receipt.map(mauIna4a5);
                CKEDITOR.instances.editor.setData(object.join(""));
              }
              else{
                $("#mauInKichThuocHoaDon").children().remove().end();
                preview__body.style.height =  "297mm";
                chieuDai.value ="297";
                preview__body.style.width =  "210mm";
                chieuRong.value ="210";
                if(mauInHoaDon.value == "mauphieunhap"){
                  $("#mauInKichThuocHoaDon").append("<option value='mauphieunhapa4'> Mẫu in phiếu nhập A4 </option>");
                  let object = receipt.map(mauNhapPhieuA4);
                  CKEDITOR.instances.editor.setData(object.join(""));
                }
                if(mauInHoaDon.value == "mauphieunhapton"){
                  $("#mauInKichThuocHoaDon").append("<option value='mauphieunhaptona4'> Mẫu phiếu nhập tồn A4 </option>");
                  let object = receipt.map(mauPhieuNhapTonA4);
                  CKEDITOR.instances.editor.setData(object.join(""));
                }
                if(mauInHoaDon.value == "mauphieukhachhangtralai"){
                  $("#mauInKichThuocHoaDon").append("<option value='mauphieukhachhangtralaia4'> Mẫu phiếu khách hàng trả lại A4 </option>");
                  let object = receipt.map(mauPhieuNhapKHTraLaiA4);
                  CKEDITOR.instances.editor.setData(object.join(""));
                }
                if(mauInHoaDon.value == "mauphieuxuattrancc"){
                  $("#mauInKichThuocHoaDon").append("<option value='mauphieuxuattranccA4'> Mẫu phiếu xuất trả nhà cung cấp A4 </option>");
                  let object = receipt.map(mauPhieuPhieuXuatTraNhaCungCap);
                  CKEDITOR.instances.editor.setData(object.join(""));
                }
                if(mauInHoaDon.value == "mauphieuxuathuy"){
                  $("#mauInKichThuocHoaDon").append("<option value='mauphieuxuathuyA4'> Mẫu phiếu xuất huỷ A4 </option>");
                  let object = receipt.map(mauPhieuXuatHuy);
                  CKEDITOR.instances.editor.setData(object.join(""));
                }
                if(mauInHoaDon.value == "mauphieukiemkho"){
                  $("#mauInKichThuocHoaDon").append("<option value='mauphieukiemkhoA4'> Mẫu phiếu kiểm kho A4 </option>");
                  let object = receipt.map(mauPhieuKiemKho);
                  CKEDITOR.instances.editor.setData(object.join(""));
                }
                if(mauInHoaDon.value == "mauphieucapphat"){
                  $("#mauInKichThuocHoaDon").append("<option value='mauphieucapphatA4'> Mẫu phiếu cấp phát A4 </option>");
                  let object = receipt.map(mauPhieuCapPhat);
                  CKEDITOR.instances.editor.setData(object.join(""));
                }
                if(mauInHoaDon.value == "mauphieuxuattracapphat"){
                  $("#mauInKichThuocHoaDon").append("<option value='mauphieuxuattracapphatA4'> Mẫu phiếu xuất trả cấp phát A4 </option>");
                  let object = receipt.map(mauPhieuXuatTraCapPhat);
                  CKEDITOR.instances.editor.setData(object.join(""));
                }
                if(mauInHoaDon.value == "mauphieudieuchuyen"){
                  $("#mauInKichThuocHoaDon").append("<option value='mauphieudieuchuyenA4'> Mẫu phiếu điều chuyển A4 </option>");
                  let object = receipt.map(mauPhieuDieuChuyen);
                  CKEDITOR.instances.editor.setData(object.join(""));
                }
                if(mauInHoaDon.value == "mauphieuthuchi"){
                  $("#mauInKichThuocHoaDon").append("<option value='mauphieuthuchiA4'> Mẫu phiếu thu chi A4 </option>");
                  let object = receipt.map(mauPhieuThuChi);
                  CKEDITOR.instances.editor.setData(object.join(""));
                }
              }
            })

            //Form mau in a4 a5
            function mauIna4a5(object1){
              return `
                  <table class="tx-13 tx-gray-700 mg-b-0 " style="width:100%;" cellpadding="1" cellspacing="1">
                    <tbody>
                      <tr>
                        <td><strong>${object1["{Ten_cua_hang}"]}</strong></td>
                        <td style="text-align:right;">Mã:</td>
                        <td><strong>{Ma_don_hang}</strong></td>
                      </tr>
                      <tr>
                        <td >Địa chỉ:{Dia_chi_cua_hang}</td>
                        <td style="text-align:right;">Ngày:</td>
                        <td><strong>{Ngay_thang_nam}</strong></td>
                      </tr>
                      <tr>
                        <td >Điện thoại:{So_dien_thoai_cua_hang}</td>
                        <td style="text-align:right;">Mã QG:</td>
                        <td><strong>{Ma_quoc_gia}</strong></td>
                      </tr>
                    </tbody>
                  </table>
                  <p style="text-align:center;"><strong>HOÁ ĐƠN</strong></p>
                  <table class="tx-13 tx-gray-700 mg-b-0" style="width:100%;">
                      <tbody>
                        <tr>
                          <td >Họ và tên khách hàng:<strong> {Ho_ten_khach_hang}</strong></td>
                          <td rowspan="4" style="text-align:center;">{QR_CODE}</td>
                        </tr>
                        <tr>
                          <td >Địa chỉ:<strong>{Dia_chi_khach_hang}</strong></td>
                        </tr>
                        <tr>
                          <td >Điện thoại:<strong>{So_dien_thoai_khach_hang}</strong></td>              
                        </tr>
                        <tr>
                          <td ></td>               
                        </tr>
                      </tbody>
                  </table>
                  <p></p>
                  <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" style="width:100%;">
                      <tbody>
                        <tr>
                          <td>#</td>
                          <td >Tên thuốc</td>
                          <td>Số lô/hạn dùng</td>
                          <td >Số đăng ký</td>
                          <td>Hãng sản xuất</td>
                          <td >Hoạt chất chính</td>
                          <td>Liều dùng</td>
                          <td >ĐVT</td>
                          <td>S>L</td>
                          <td >Đơn giá</td>
                          <td >Thành tiền</td>
                        </tr>
                        <tr>
                          <td>{STT}</td>
                          <td >{Ten_thuoc}</td>
                          <td>{So_lo} {HSD}</td>
                          <td >{So_dang_ky}</td>
                          <td>{Hang_san_xuat}</td>
                          <td >{Hoat_chat_chinh}</td>
                          <td>{Lieu_dung}</td>
                          <td >{DVT}</td>
                          <td>{So_luong}</td>
                          <td >{Don_gia}</td>
                          <td >{Thanh_tien}</td>
                        </tr>
                        
                      </tbody>
                  </table>
                  <p></p>
                  <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" cellpadding="5" cellspacing="1" style="width:100%;">
                    <tbody>
                      <tr>
                        <td style="width:18%;"><strong>Bác sĩ kê đơn:</strong></td>
                        <td ><strong>{Bac_sy}</strong></td>
                        <td style="width:25%;text-align: right;"><strong>Tổng tiền trước thuế:</strong></td>
                        <td style="width:15%;text-align: right;"><strong>{Tong_tien_truoc_thue}</strong></td>
                      </tr>
                      <tr>
                        <td style="width:18%;"><strong>Cơ sở khám bệnh:</strong></td>
                        <td ><strong>{Co_so_kham_benh}</strong></td>
                        <td style="width:25%;text-align: right;"><strong>Tổng VAT:</strong></td>
                        <td style="width:15%;text-align: right;"><strong>{Tong_vat}</strong></td>
                      </tr>
                      <tr>
                        <td style="width:18%;"><strong>Bệnh nhân:</strong></td>
                        <td ><strong>{Benh_nhan}</strong></td>
                        <td style="width:25%;text-align: right;"><strong>Giảm giá:</strong></td>
                        <td style="width:15%;text-align: right;"><strong>{Giam_gia}</strong></td>
                      </tr>
                      <tr>
                        <td style="width:18%;"><strong>Địa chỉ:</strong></td>
                        <td ><strong>{Đia_chi_benh_nhan}</strong></td>
                        <td style="width:25%;text-align: right;"><strong>Tổng tiền:</strong></td>
                        <td style="width:15%;text-align: right;"><strong>{Tong_tien}</strong></td>
                      </tr>
                      <tr>
                        <td style="width:18%;"><strong>Giới tính:</strong></td>
                        <td ><strong>{Gioi_tinh_benh_nhan}</strong></td>
                        <td style="width:25%;text-align: right;"><strong>Thanh toán:</strong></td>
                        <td style="width:15%;text-align: right;"><strong>{Thanh_toan}</strong></td>
                      </tr>
                      <tr>
                        <td style="width:18%;"><strong>Tuổi:</strong></td>
                        <td ><strong>{Tuoi_benh_nhan} {Loai_tuoi_benh_nhan}</strong></td>
                        <td style="width:25%;text-align: right;"><strong>Công nợ:</strong></td>
                        <td style="width:15%;text-align: right;"><strong>{Cong_no}</strong></td>
                      </tr>
                      <tr>
                        <td style="width:18%;"><strong>Cân nặng:</strong></td>
                        <td ><strong>{Can_nang_benh_nhan}</strong></td>
                        <td style="width:25%;text-align: right;"></td>
                        <td style="width:15%;text-align: right;"></td>
                      </tr>
                      
                    </tbody>
                  </table>
                  <p>Tổng số tiền(viết bằng chữ):{Tong_tien_bang_chu}</p>
                  <p>Ghi chú:<strong> {Ghi_chu}</strong></p>
                  <table class="tx-13 tx-gray-700 mg-b-0" style="width:100%;">
                    <tbody>
                      <tr>
                        <td style="text-align:center;"><strong>Người mua</strong></td>
                        <td style="text-align:center;"><strong>Người bán</strong></td>
                      </tr>
                    </tbody>
                  </table>
              `
            };

            //Form mẫu in nhiệt
            function mauInNhiet(info){
              return `<p style="text-align:center;"><strong>${info["{Ten_cua_hang}"]}</strong></p>
                  <p style="text-align:center;">${info["{Dia_chi_cua_hang}"]}</p>
                  <p style="text-align:center;">${info["{So_dien_thoai_cua_hang}"]}</p>
                  <p style="text-align:center;">************</p>
                  <p style="text-align:center;"><strong>HOÁ ĐƠN</strong></p>
                  <p style="text-align:center;">Mã QG: {Ma_Quoc_Gia}</p>
                  <table class="tx-13 tx-gray-700 mg-b-0 " style="width:100%;" cellpadding="1" cellspacing="1">
                    <tbody>
                      <tr>
                        <td>Mã: {Ma_Don_Hang}</td>
                        <td rowspan="3">{QR_Code}</td>
                      </tr>
                      <tr>
                        <td >Ngày bán: {Ngay_Thang_Nam}</td>
                      </tr>
                      <tr>
                        <td >Khách hàng: {Ho_Ten_Khach_Hang}</td>
                      </tr>
                    </tbody>
                  </table>
                  <p></p>
                  <table border="0" cellpadding="3" cellspacing="1" style="width:100%" class=" cke_show_border">
                    <tbody>
                      <tr>
                        <td colspan="2" rowspan="1" style="border-color:#ffffff; text-align:right; vertical-align:top">
                          <span><span>S.L</span></span></td>
                        <td style="text-align:center">
                          <span ><span>ĐVT</span></span></td>
                        <td style="text-align:right">
                          <span><span>Đ.Giá</span></span>
                        </td>
                        <td style="text-align:right">
                        <span><span>T.Tiền</span></span>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="5" style="text-align:center; vertical-align:top">----------------------------------------------</td>
                      </tr>
                      <tr>
                        <td colspan="5"><span><span>{Ten_Thuoc};</span></span></td>
                      </tr>
                      <tr>
                      <td colspan="2" rowspan="1" style="text-align:right">
                        <span><span>{So_Luong}</span></span>
                      </td>
                      <td style="text-align:center">
                        <span><span>{DVT}</span></span>
                      </td>
                      <td style="text-align:right">
                        <span><span>{Don_Gia}</span></span>
                      </td>
                      <td style="text-align:right">
                        <span><span>{Thanh_Tien}</span></span></td>
                      </tr>
                    </tbody>
                  </table>
                  <p style="text-align:center">---------------------------------------------</p>
                  <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border">
                    <tbody>
                      <tr>
                        <td style="text-align:left; vertical-align:top; width:30%">
                          <strong><span><span>Tổng tiền:</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Tong_Tien_Truoc_Thue}</span></span></strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="text-align:left; vertical-align:top; width:30%">
                        <span><span><strong>Tổng VAT:</strong></span></span>
                        </td>
                      <td style="text-align:right; vertical-align:top">
                        <span><span ><strong>{Tong_VAT}</strong></span></span>
                      </td>
                      </tr>
                      <tr>
                        <td style="text-align:left; vertical-align:top; width:30%">
                          <strong><span><span>Giảm giá:</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Giam_Gia}</span></span></strong></td>
                        </tr>
                      <tr>
                        <td style="text-align:left; vertical-align:top; width:30%">
                          <span><span><strong>Thành tiền:</strong></span></span>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <span><span><strong>{Tong_Tien}</strong></span></span>
                        </td>
                      </tr>
                      <tr>
                        <td style="text-align:left; vertical-align:top; width:30%">
                          <strong><span><span>Thanh toán:</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Thanh_Toan}</span></span></strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="text-align:left; vertical-align:top; width:30%">
                          <strong><span><span>Công nợ:</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Cong_No}</span></span></strong>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                  <p></p>
                  <p style="text-align:center"><span><span>Xin cảm ơn và hẹn gặp lại quý khách!</span></span></p>`
            };

            //Form mẫu in hoá đơn(58mm)
            function mauInHoaDon58(info){
              return `<p style="text-align:center;"><strong>${info["{Ten_cua_hang}"]}</strong></p>
                  <p style="text-align:center;">${info["{Dia_chi_cua_hang}"]}</p>
                  <p style="text-align:center;">${info["{So_dien_thoai_cua_hang}"]}</p>
                  <p style="text-align:center;">************</p>
                  <p style="text-align:center;"><strong>HOÁ ĐƠN</strong></p>
                  <p style="text-align:center;">Mã QG: {Ma_Quoc_Gia}</p>
                  <table class="tx-13 tx-gray-700 mg-b-0 " style="width:100%;" cellpadding="1" cellspacing="1">
                    <tbody>
                      <tr>
                        <td>Mã: {Ma_Don_Hang}</td>
                        <td rowspan="3">{QR_Code}</td>
                      </tr>
                      <tr>
                        <td >Ngày bán: {Ngay_Thang_Nam}</td>
                      </tr>
                      <tr>
                        <td >Khách hàng: {Ho_Ten_Khach_Hang}</td>
                      </tr>
                    </tbody>
                  </table>
                  <p></p>
                  <table border="0" cellpadding="3" cellspacing="1" style="width:100%" class=" cke_show_border">
                    <tbody>
                      <tr>
                        <td colspan="2" rowspan="1" style="border-color:#ffffff; text-align:right; vertical-align:top">
                          <span><span>S.L</span></span></td>
                        <td style="text-align:center">
                          <span ><span>ĐVT</span></span></td>
                        <td style="text-align:right">
                          <span><span>Đ.Giá</span></span>
                        </td>
                        <td style="text-align:right">
                        <span><span>T.Tiền</span></span>
                        </td>
                      </tr>
                      <tr>
                        <td colspan="5" style="text-align:center; vertical-align:top">----------------------------------------------</td>
                      </tr>
                      <tr>
                        <td colspan="5"><span><span>{Ten_Thuoc};</span></span></td>
                      </tr>
                      <tr>
                      <td colspan="2" rowspan="1" style="text-align:right">
                        <span><span>{So_Luong}</span></span>
                      </td>
                      <td style="text-align:center">
                        <span><span>{DVT}</span></span>
                      </td>
                      <td style="text-align:right">
                        <span><span>{Don_Gia}</span></span>
                      </td>
                      <td style="text-align:right">
                        <span><span>{Thanh_Tien}</span></span></td>
                      </tr>
                    </tbody>
                  </table>
                  <p style="text-align:center">---------------------------------------------</p>
                  <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border">
                    <tbody>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                        <strong><span><span>Tổng tiền trước thuế;</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Tong_Tien_Truoc_Thue}</span></span></strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                          <strong><span><span >Tổng VAT</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span >{Tong_VAT}</span></span></strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                          <strong><span><span>Tổng giảm giá</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span ><span>{Giam_Gia}</span></span></strong>
                        </td>
                      </tr>
                        <tr>
                        <td style="vertical-align:top; width:30%">
                          <span ><span ><strong>Tổng tiền:</strong></span></span>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <span><span><strong>{Tong_Tien}</strong></span></span>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                          <strong><span><span>Thanh toán:</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Thanh_Toan}</span></span></strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                        <strong><span><span>Công nợ:</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Cong_No}</span></span></strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                          <span><span><strong>Bác sỹ:</strong></span></span>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                        <span>
                          <span><strong>{Bac_Sy}</strong></span></span>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                          <strong><span><span>Cơ sở:</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Co_So_Kham_Benh}</span></span></strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                        <strong><span><span>Bệnh nhân:</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Benh_Nhan}</span></span></strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                          <strong><span><span>Địa chỉ:</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Dia_Chi_Benh_Nhan}</span></span></strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                        <strong><span><span >Giới tính:</span></span></strong
                        td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Gioi_Tinh_Benh_Nhan}</span></span></strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                          <strong><span><span>Tuổi:</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Tuoi_Benh_Nhan} {Loai_Tuoi_Benh_Nhan}</span></span></strong>
                        </td>
                      </tr>
                      <tr>
                        <td style="vertical-align:top; width:30%">
                          <strong><span><span>Cân nặng:</span></span></strong>
                        </td>
                        <td style="text-align:right; vertical-align:top">
                          <strong><span><span>{Can_Nang_Benh_Nhan}</span></span></strong>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                    <p></p>
                    <p style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Xin cảm ơn và hẹn gặp lại quý khách!</span></span></p>
              `
            }

            //Form mẫu nhập A4
            function mauNhapPhieuA4(){
              return `
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border">
                <tbody>
                  <tr>
                    <td colspan="2" rowspan="1" style="vertical-align:top">
                      <strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Cua_Hang}</span></span></strong>
                    </td>
                    <td style="text-align:right; vertical-align:top; width:12%">
                      <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã phiếu:&nbsp;</span></span>
                    </td>
                    <td style="text-align:right; vertical-align:top; width:15%">
                      <strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ma_Phieu}</span></span></strong>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" rowspan="1" style="vertical-align:top">
                      <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang}</span></span>
                    </td>
                    <td style="text-align:right; vertical-align:top; width:12%">
                      <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày:&nbsp;</span></span>
                    </td>
                    <td style="text-align:right; vertical-align:top; width:15%">
                      <strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ngay_Thang_Nam}</span></span></strong>
                    </td>
                  </tr>
                </tbody>
              </table>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border">
                <tbody>
                  <tr>
                    <td colspan="4">
                      <p style="text-align:center"><br></p>
                      <p style="text-align:center">
                      <strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">PHIẾU NHẬP TỪ NHÀ CUNG CẤP</span></span></strong>
                      </p>
                      <p style="text-align:center"><br></p>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align:top; width:12%">
                      <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Nhà cung cấp:</span></span>
                    </td>
                    <td style="vertical-align:top">
                      <strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Nha_Cung_Cap}</span></span></strong>
                    </td>
                    <td style="text-align:right; vertical-align:top; width:12%">
                      <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã hoá đơn:</span></span>
                    </td>
                    <td style="text-align:right; vertical-align:top; width:15%">
                      <strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ma_Hoa_Don}</span></span></strong>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align:top; width:12%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Địa chỉ:</span></span>
                    </td>
                    <td style="vertical-align:top"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Nha_Cung_Cap}</span></span></strong>
                    </td>
                    <td style="text-align:right; vertical-align:top; width:12%">
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày tạo:</span></span>
                    </td>
                    <td style="text-align:right; vertical-align:top; width:15%">
                    <strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ngay_Tao_Hoa_Don}</span></span></strong>
                    </td>
                  </tr>
                  <tr>
                    <td style="vertical-align:top; width:12%">
                      <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Số điện thoại:</span></span>
                    </td>
                    <td style="vertical-align:top">
                     <strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Dien_Thoai_Nha_Cung_Cap}</span></span></strong>
                    </td>
                    <td style="text-align:right; vertical-align:top; width:12%"><br>
                    </td>
                    <td style="text-align:right; vertical-align:top; width:15%"><br>
                    </td>
                  </tr>
                </tbody>
              </table>
              <p><br></p>
              <table border="1" cellpadding="5" cellspacing="1" style="width:100%">
                <tbody>
                <tr>
                  <td>
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>#</strong></span></span>
                  </td>
                  <td>
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Mã HH</strong></span></span>
                  </td>
                  <td>
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tên hàng hoá</strong></span></span>
                  </td>
                  <td>
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lô</strong></span></span>
                  </td>
                  <td>
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>HSD</strong></span></span>
                  </td>
                  <td style="text-align:right; width:10%"><span style="font-size:14px">
                    <span style="font-family:Times New Roman,Times,serif"><strong>Số lượng</strong></span></span>
                  </td>
                  <td style="text-align:right; width:10%"><span style="font-size:14px"><
                    span style="font-family:Times New Roman,Times,serif"><strong>Đơn giá</strong></></span>
                  </td>
                  <td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng giảm giá</strong></span></span>
                  </td>
                  <td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>VAT</strong></span></span>
                  </td>
                  <td style="text-align:right; width:10%">
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Thành tiền</strong></span></span>
                  </td>
                </tr>
                <tr>
                  <td>
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{STT}</span></span>
                  </td>
                  <td>
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ma_Hang_Hoa}</span></span>
                  </td>
                  <td>
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Hang_Hoa}</span></span>
                  </td>
                  <td>
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Lo}</span></span>
                  </td>
                  <td>
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{HSD}</span></span>
                  </td>
                  <td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Luong} ({DVT})</span></span>
                  </td>
                  <td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Don_Gia}</span></span>
                  </td>
                  <td style="text-align:right">
                    <span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Giam_Gia}</span></span>
                  </td>
                  <td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{VAT}</span></span>
                  </td>
                  <td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Tien}</span></span>
                  </td>
                </tr>
                </tbody>
              </table>
              <p><br></p>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border">
                <tbody>
                  <tr>
                    <td rowspan="10" style="width:50%"><br></td><td style="text-align:right"><span style="font-size:14px"><strong><span style="font-family:Times New Roman,Times,serif">Tổng tiền hàng</span></strong></span>
                    </td>
                    <td style="text-align:right">
                      <span style="font-size:14px"><strong><span style="font-family:Times New Roman,Times,serif">{Tong_Tien_Hang} </span></strong></span>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align:right">
                     <strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">Giảm giá:</span></span></strong>
                    </td>
                    <td style="text-align:right">
                      <strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{Tong_Giam_Gia}</span></span></strong>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align:right">
                      <strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">Tổng tiền trước thuế:</span></span></strong>
                    </td>
                    <td style="text-align:right">
                      <strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{Tong_Tien_Truoc_Thue}</span></span></strong>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align:right">
                      <strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">Tổng VAT:</span></span></strong>
                    </td>
                    <td style="text-align:right">
                     <strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{Tong_VAT}</span></span></strong>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align:right">
                      <strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">Tổng tiền:</span></span></strong>
                    </td>
                    <td style="text-align:right">
                      <strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{Tong_Tien_Sau_Thue}</span></span></strong>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align:right">
                      <strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">Thanh toán:</span></span></strong>
                    </td>
                    <td style="text-align:right"><strong><span style="font-family:Times New Roman,Times,serif">
                      <span style="font-size:14px">{Thanh_Toan}</span></span></strong>
                    </td>
                  </tr>
                  <tr>
                    <td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Công nợ:</span></span></strong>
                    </td>
                    <td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Cong_No}</span></span></strong>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="2" rowspan="1" style="text-align:center">
                    <strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">NGƯỜI NHẬP</span></span></strong>
                    </td>
                  </tr>
                </tbody>
              </table>
              <p><br></p>
              `;
            }

            //Form mẫu phiếu nhập tồn
            function mauPhieuNhapTonA4(){
              return `<table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Cua_Hang}</strong></span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã phiếu:&nbsp;</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ma_Phieu}</strong></span></span></td></tr><tr><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang}</span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày:&nbsp;</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ngay_Thang_Nam}</strong></span></span></td></tr><tr><td colspan="3" style="text-align:center"><p><br></p><p><span style="font-size:16px"><span style="font-family:Times New Roman,Times,serif"><strong>PHIẾU NHẬP TỒN</strong></span></span></p></td></tr></tbody></table>
              <p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">&nbsp;</span></span></p>
              <table border="1" cellpadding="5" cellspacing="1" style="width:100%"><tbody><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>#</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Mã HH</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tên hàng hoá</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lô</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>HSD</strong></span></span></td><td style="text-align:right; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lượng</strong></span></span></td><td style="text-align:right; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Đơn giá</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng giảm giá</strong></span></span></td><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">VAT</span></span></strong></td><td style="text-align:right; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Thành tiền</strong></span></span></td></tr><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{STT}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ma_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Lo}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{HSD}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Luong} ({DVT})</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Don_Gia}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Giam_Gia}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{VAT}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Tien}</span></span></td></tr></tbody></table>
              <p><br></p>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td rowspan="8" style="width:50%"><br></td><td style="text-align:right"><span style="font-size:14px"><strong><span style="font-family:Times New Roman,Times,serif">Tổng tiền hàng</span></strong></span></td><td style="text-align:right"><span style="font-size:14px"><strong><span style="font-family:Times New Roman,Times,serif">{Tong_Tien_Hang} </span></strong></span></td></tr><tr><td style="text-align:right"><strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">Giảm giá:</span></span></strong></td><td style="text-align:right"><strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{Tong_Giam_Gia}</span></span></strong></td></tr><tr><td style="text-align:right"><strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">Tổng tiền trước thuế:</span></span></strong></td><td style="text-align:right"><strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{Tong_Tien_Truoc_Thue}</span></span></strong></td></tr><tr><td style="text-align:right"><strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">Tổng VAT:</span></span></strong></td><td style="text-align:right"><strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{Tong_VAT}</span></span></strong></td></tr><tr><td style="text-align:right"><strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">Tổng tiền:</span></span></strong></td><td style="text-align:right"><strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{Tong_Tien_Sau_Thue}</span></span></strong></td></tr><tr><td colspan="2" rowspan="1" style="text-align:center"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">NGƯỜI NHẬP</span></span></strong></td></tr></tbody></table>
              <p><br></p>`;
            }

            //Form mẫu phiếu khách hàng trả lại A4
            function mauPhieuNhapKHTraLaiA4(){
              return `<table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="2" rowspan="1" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Cua_Hang}</strong></span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã phiếu:&nbsp;</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ma_Phieu}</strong></span></span></td></tr><tr><td colspan="2" rowspan="1" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang}</span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày:&nbsp;</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ngay_Thang_Nam}</strong></span></span></td></tr></tbody></table>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="4" style="text-align:center"><p><br></p><p><span style="font-size:16px"><span style="font-family:Times New Roman,Times,serif"><strong>PHIẾU KHÁCH HÀNG TRẢ LẠI</strong></span></span></p></td></tr><tr><td><br></td><td><br></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã hoá đơn:</span></span></td><td style="text-align:right; width:15%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ma_Hoa_Don}</span></span></strong></td></tr><tr><td><br></td><td><br></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày tạo</span></span></td><td style="text-align:right; width:15%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ngay_Tao_Hoa_Don}</span></span></strong></td></tr></tbody></table>
              <p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">&nbsp;</span></span></p>
              <table border="1" cellpadding="5" cellspacing="1" style="width:100%"><tbody><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>#</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Mã HH</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tên hàng hoá</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lô</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>HSD</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lượng</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Đơn giá</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Thành tiền</strong></span></span></td></tr><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{STT}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ma_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Lo}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{HSD}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Luong} ({DVT})</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Don_Gia}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Tien}</span></span></td></tr></tbody></table>
              <p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">&nbsp;</span></span></p>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td rowspan="9" style="width:50%"><br></td><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Tổng tiền:</span></span></strong></td><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Tien_Truoc_Thue}</span></span></strong></td></tr><tr><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Giảm giá:</span></span></strong></td><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Giam_Gia}</span></span></strong></td></tr><tr><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Tổng VAT</span></span></strong></td><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_VAT}</span></span></strong></td></tr><tr><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Tổng tiền:</span></span></strong></td><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Tien_Sau_Thue}</span></span></strong></td></tr><tr><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Thanh toán:</span></span></strong></td><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Thanh_Toan}</span></span></strong></td></tr><tr><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Công nợ:</span></span></strong></td><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Cong_No}</span></span></strong></td></tr><tr><td colspan="2" rowspan="1" style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>NGƯỜI NHẬP</strong></span></span></td></tr></tbody></table>`;
            }

            //Form mẫu phiếu xuất trả nhà cung cấp A4
            function mauPhieuPhieuXuatTraNhaCungCap(){
              return `<table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="2" rowspan="1" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Cua_Hang}</strong></span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã phiếu:&nbsp;</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ma_Phieu}</strong></span></span></td></tr><tr><td colspan="2" rowspan="1" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang}</span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày:&nbsp;</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ngay_Thang_Nam}</strong></span></span></td></tr></tbody></table>
                      <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="4" style="text-align:center"><p><br></p><p><span style="font-size:16px"><span style="font-family:Times New Roman,Times,serif"><strong>PHIẾU XUẤT TRẢ NHÀ CUNG CẤP</strong></span></span></p></td></tr><tr><td style="vertical-align:top; width:12%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Nhà cung cấp:</span></span></td><td style="vertical-align:top"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Nha_Cung_Cap}</span></span></strong></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã hoá đơn:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ma_Hoa_Don}</span></span></strong></td></tr><tr><td style="vertical-align:top; width:12%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Địa chỉ:</span></span></td><td style="vertical-align:top"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Nha_Cung_Cap}</span></span></strong></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày tạo:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ngay_Tao_Hoa_Don}</span></span></strong></td></tr><tr><td style="vertical-align:top; width:12%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Số điện thoại:</span></span></td><td style="vertical-align:top"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Dien_Thoai_Nha_Cung_Cap}</span></span></strong></td><td style="text-align:right; vertical-align:top; width:10%"><br></td><td style="text-align:right; vertical-align:top; width:15%"><br></td></tr></tbody></table>
                      <p><br></p>
                      <table border="1" cellpadding="5" cellspacing="1" style="width:100%"><tbody><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>#</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Mã HH</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tên hàng hoá</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lô</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>HSD</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lượng</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Đơn giá</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng giảm giá</strong></span></span></td><td style="text-align:right"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><strong>VAT</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Thành tiền</strong></span></span></td></tr><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{STT}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ma_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Lo}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{HSD}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Luong} ({DVT})</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Don_Gia}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Giam_Gia}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{VAT}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Tien}</span></span></td></tr></tbody></table>
                      <p><br></p>
                      <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="2" rowspan="7" style="width:50%"><br></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng tiền hàng:</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_Tien_Hang} </strong></span></span></td></tr><tr><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Giảm giá:</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_Giam_Gia}</strong></span></span></td></tr><tr><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng tiền trước thuế:</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_Tien_Truoc_Thue}</strong></span></span></td></tr><tr><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng VAT:</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_VAT}</strong></span></span></td></tr><tr><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng tiền:</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_Tien_Sau_Thue}</strong></span></span></td></tr><tr><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Nhà cung cấp trả:</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Thanh_Toan}</strong></span></span></td></tr><tr><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Công nợ:</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Cong_No}</strong></span></span></td></tr><tr><td colspan="2" rowspan="1" style="width:50%"><br></td><td colspan="2" rowspan="1" style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>NGƯỜI NHẬP</strong></span></span></td></tr></tbody></table>
                      <p style="text-align:center"><br></p>`;
            }

            //Form mẫu phiếu xuất huỷ 
            function mauPhieuXuatHuy(){
              return `<table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Cua_Hang}</strong></span></span></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã phiếu:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ma_Phieu}</strong></span></span></td></tr><tr><td style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang}</span></span></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ngay_Thang_Nam}</strong></span></span></td></tr><tr><td colspan="3"><p style="text-align:center"><br></p><p style="text-align:center"><span style="font-size:16px"><span style="font-family:Times New Roman,Times,serif"><strong>PHIẾU XUẤT HUỶ&nbsp;</strong></span></span></p></td></tr></tbody></table>
              <p><br></p>
              <table border="1" cellpadding="5" cellspacing="1" style="width:100%"><tbody><tr><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">#</span></span></strong></td><td style="width:10%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã HH</span></span></strong></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tên hàng hoá</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lô</strong></span></span></td><td style="width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>HSD</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lượng</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Đơn giá</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Lý do huỷ</strong></span></span></td><td style="text-align:right; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Thành tiền</strong></span></span></td></tr><tr><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{STT}</span></span></td><td style="width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ma_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Lo}</span></span></td><td style="width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{HSD}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Luong} ({DVT})</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Don_Gia}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ly_Do}</span></span></td><td style="text-align:right; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Tien}</span></span></td></tr></tbody></table>
              <p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">&nbsp;</span></span></p>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td style="width:50%"><br></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng tiền:</strong></span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_Tien_Phieu}</strong></span></span></td></tr><tr><td style="width:50%"><br></td><td colspan="2" rowspan="1" style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>NGƯỜI NHẬP</strong></span></span></td></tr></tbody></table>
              <p style="text-align:center"><br></p>`;
            }

            //Form mẫu phiếu kiểm kho
            function mauPhieuKiemKho(){
              return `<table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="2" rowspan="1" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Cua_Hang}</strong></span></span></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã phiếu:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ma_Phieu}</strong></span></span></td></tr><tr><td colspan="2" rowspan="1" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang}</span></span></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày kiểm:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ngay_Thang_Nam}</strong></span></span></td></tr><tr><td colspan="4" style="text-align:center"><p><br></p><p><span style="font-size:16px"><span style="font-family:Times New Roman,Times,serif"><strong>PHIẾU KIỂM KHO</strong></span></span></p></td></tr><tr><td style="vertical-align:top; width:11%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Kho:</span></span></td><td colspan="3" rowspan="1" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Kho}</strong></span></span></td></tr><tr><td style="vertical-align:top; width:11%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Số điện thoại:</span></span></td><td colspan="3" rowspan="1" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{So_Dien_Thoai_Kho}</strong></span></span></td></tr></tbody></table>
              <p><br></p>
              <table border="1" cellpadding="5" cellspacing="1" style="width:100%"><tbody><tr><td style="text-align:right"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">#</span></span></strong></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Thông tin hàng hoá</strong></span></span></td><td style="width:5%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lô</strong></span></span></td><td style="width:10%"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><strong>HSD</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>SL trước kiểm</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>SL thực tế</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>SL chênh lệch</strong></span></span></td><td style="text-align:right; width:7%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Giá vốn</strong></span></span></td><td style="width:4%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>ĐVT</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Lý do</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Giá trị chênh lệch</strong></span></span></td></tr><tr><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{STT}</span></span></td><td><p><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><strong>Mã hàng hóa:&nbsp;</strong>{Ma_Hang_Hoa}</span></span></p><p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tên hàng hóa: </strong>{Ten_Hang_Hoa}</span></span></p><p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>SĐK:&nbsp;</strong>{So_Dang_Ky}</span></span></p></td><td style="width:5%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Lo}</span></span></td><td style="width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{HSD}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Luong_Truoc_Kiem}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Luong_Thuc_Te}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Luong_Chenh_Lech}</span></span></td><td style="text-align:right; width:7%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Don_Gia}</span></span></td><td style="width:4%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{DVT}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ly_Do}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Tien}</span></span></td></tr></tbody></table>
              <p><br></p>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="1" rowspan="4" style="width:50%"><br></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng trước kiểm:</strong></span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_Truoc_Kiem}</strong></span></span></td></tr><tr><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng sau kiểm:</strong></span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_Sau_Kiem}</strong></span></span></td></tr><tr><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng chênh lệch:</strong></span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_Chenh_Lech}</strong></span></span></td></tr><tr><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng giá trị chênh lệch:</strong></span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_Tien_Chenh_Lech}</strong></span></span></td></tr><tr><td style="width:50%"><br></td><td colspan="2" rowspan="1" style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>NGƯỜI KIỂM</strong></span></span></td></tr></tbody></table>
              <p><br></p>
              <p style="text-align:center"><br></p>`;
            }

            //Form mẫu phiếu cấp phát
            function mauPhieuCapPhat(){
              return `<table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="2" rowspan="1" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Cua_Hang}</strong></span></span></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã phiếu:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ma_Phieu}</strong></span></span></td></tr><tr><td colspan="2" rowspan="2" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang}</span></span></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ngay_Thang_Nam}</strong></span></span></td></tr><tr><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Trạng thái:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Trang_Thai}</strong></span></span></td></tr></tbody></table>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="2" style="text-align:center"><p><br></p><p><span style="font-size:16px"><span style="font-family:Times New Roman,Times,serif"><strong>PHIẾU CẤP PHÁT</strong></span></span></p><p><br></p></td></tr><tr><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Nhà thuốc gửi:&nbsp;</strong><strong>{Ten_Cua_Hang_Gui}</strong></span></span></td><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Nhà thuốc nhận:&nbsp;</strong><strong>{Ten_Cua_Hang_Nhan}</strong></span></span></td></tr><tr><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang_Gui}</span></span></td><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang_Nhan}</span></span></td></tr></tbody></table>
              <p><br></p>
              <table border="1" cellpadding="5" cellspacing="1" style="width:100%"><tbody><tr><td style="text-align:right"><strong><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">#</span></span></strong></td><td style="width:10%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã HH</span></span></strong></td><td><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Tên hàng hoá</span></span></strong></td><td style="width:5%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Số lô</span></span></strong></td><td style="width:9%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">HSD</span></span></strong></td><td style="text-align:right; width:10%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Số lượng</span></span></strong></td><td style="text-align:right; width:10%"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><strong>Đơn giá</strong></span></span></td><td style="text-align:right; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng giảm giá</strong></span></span></td><td style="text-align:right; width:5%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">VAT</span></span></strong></td><td style="text-align:right; width:10%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Thành tiền</span></span></strong></td></tr><tr><td style="text-align:right"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{STT}</span></span></td><td style="width:10%"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{Ma_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Hang_Hoa}</span></span></td><td style="width:5%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Lo}</span></span></td><td style="width:9%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{HSD}</span></span></td><td style="text-align:right; width:3%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Luong} ({DVT})</span></span></td><td style="text-align:right; width:3%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Don_Gia}</span></span></td><td style="text-align:right; width:5%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Giam_Gia}</span></span></td><td style="text-align:right; width:5%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{VAT}</span></span></td><td style="text-align:right; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Tien}</span></span></td></tr></tbody></table>
              <p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">&nbsp;</span></span></p>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="1" rowspan="1" style="width:50%"><br></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng tiền:</strong></span></span></td><td style="text-align:right; vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_Tien_Sau_Thue}</strong></span></span></td></tr><tr><td style="text-align:center; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>NGƯỜI NHẬP</strong></span></span></td><td colspan="2" rowspan="1" style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>NGƯỜI XUẤT</strong></span></span></td></tr></tbody></table>
              <p><br></p>`;
            }

            //Form mẫu phiếu xuất trả cấp phát
            function mauPhieuXuatTraCapPhat(){
              return `<table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="2" rowspan="1" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Cua_Hang}</strong></span></span></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã phiếu:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ma_Phieu}</strong></span></span></td></tr><tr><td colspan="2" rowspan="2" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang}</span></span></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ngay_Thang_Nam}</strong></span></span></td></tr><tr><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Trạng thái:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Trang_Thai}</strong></span></span></td></tr></tbody></table>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="2" style="text-align:center"><p><br></p><p><span style="font-size:16px"><span style="font-family:Times New Roman,Times,serif"><strong>PHIẾU XUẤT TRẢ CẤP PHÁT</strong></span></span></p><p><br></p></td></tr><tr><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Nhà thuốc gửi:&nbsp;</strong><strong>{Ten_Cua_Hang_Gui}</strong></span></span></td><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Nhà thuốc nhận:&nbsp;</strong><strong>{Ten_Cua_Hang_Nhan}</strong></span></span></td></tr><tr><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang_Gui}</span></span></td><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang_Nhan}</span></span></td></tr></tbody></table>
              <p><br></p>
              <table border="1" cellpadding="5" cellspacing="1" style="width:100%"><tbody><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>#</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Mã HH</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tên hàng hoá</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lô</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>HSD</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lượng</strong></span></span></td><td style="text-align:right"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><strong>Đơn giá</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng giảm giá</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>VAT</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Thành tiền</strong></span></span></td></tr><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{STT}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ma_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Lo}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{HSD}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Luong} ({DVT})</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Don_Gia}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Giam_Gia}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{VAT}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Tien}</span></span></td></tr></tbody></table>
              <p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">&nbsp;</span></span></p>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="1" rowspan="1" style="text-align:right"><br></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tổng tiền:</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Tong_Tien_Sau_Thue}</strong></span></span></td></tr><tr><td style="text-align:center; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>NGƯỜI NHẬP</strong></span></span></td><td colspan="2" rowspan="1" style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>NGƯỜI XUẤT</strong></span></span></td></tr></tbody></table>
              <p><br></p>`;
            }

            //Form mẫu phiếu điều chuyển
            function mauPhieuDieuChuyen(){
              return `<table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="2" rowspan="1" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Cua_Hang}</strong></span></span></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã phiếu:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ma_Phieu}</strong></span></span></td></tr><tr><td colspan="2" rowspan="2" style="vertical-align:top"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang}</span></span></td><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ngay_Thang_Nam}</strong></span></span></td></tr><tr><td style="text-align:right; vertical-align:top; width:10%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Trạng thái:</span></span></td><td style="text-align:right; vertical-align:top; width:15%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Trang_Thai}</strong></span></span></td></tr></tbody></table>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="2" style="text-align:center"><p><br></p><p><span style="font-size:16px"><span style="font-family:Times New Roman,Times,serif"><strong>PHIẾU ĐIỀU CHUYỂN</strong></span></span></p><p><br></p></td></tr><tr><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Nhà thuốc gửi:&nbsp;</strong><strong>{Ten_Cua_Hang_Gui}</strong></span></span></td><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Nhà thuốc nhận:&nbsp;</strong><strong>{Ten_Cua_Hang_Nhan}</strong></span></span></td></tr><tr><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang_Gui}</span></span></td><td style="vertical-align:top; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Dia_Chi_Cua_Hang_Nhan}</span></span></td></tr></tbody></table>
              <p><br></p>
              <table border="1" cellpadding="5" cellspacing="1" style="width:100%"><tbody><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>#</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Mã HH</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Tên hàng hoá</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lô</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>HSD</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số lượng</strong></span></span></td><td style="text-align:right"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><strong>Đơn giá</strong></span></span></td><td style="text-align:right"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><strong>Tổng giảm giá</strong></span></span></td><td style="text-align:right"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><strong>VAT</strong></span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Thành tiền</strong></span></span></td></tr><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{STT}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ma_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Hang_Hoa}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Lo}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{HSD}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{So_Luong} ({DVT})</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Don_Gia}</span></span></td><td style="text-align:right"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{Giam_Gia}</span></span></td><td style="text-align:right"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px">{VAT}</span></span></td><td style="text-align:right"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Tong_Tien}</span></span></td></tr></tbody></table>
              <p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">&nbsp;</span></span></p>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td colspan="1" rowspan="1" style="text-align:right"><br></td><td style="text-align:right"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><strong>Tổng tiền:</strong></span></span></td><td style="text-align:right"><span style="font-family:Times New Roman,Times,serif"><span style="font-size:14px"><strong>{Tong_Tien_Sau_Thue}</strong></span></span></td><td style="text-align:right; vertical-align:top"><br></td></tr><tr><td style="text-align:center; width:50%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>NGƯỜI NHẬP</strong></span></span></td><td colspan="2" rowspan="1" style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>NGƯỜI XUẤT</strong></span></span></td></tr></tbody></table>
              <p><br></p>`;
            }

            //Form mẫu phiếu thu chi
            function mauPhieuThuChi(){
              return `<table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Cua_Hang}</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Mã phiếu:</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ma_Phieu}</strong></span></span></td></tr><tr><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Địa chỉ: {Dia_Chi_Cua_Hang}</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">Ngày:</span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ngay_Thang_Nam}</strong></span></span></td></tr></tbody></table>
              <p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">&nbsp;</span></span></p>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Phieu}</strong></span></span></td></tr></tbody></table>
              <p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">&nbsp;</span></span></p>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td style="width:20%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số điện thoại:</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Sdt_Nguoi_Nop_Nhan}</strong></span></span></td></tr><tr><td style="width:20%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Lbl_Ten_Nguoi_Nop_Nhan}:</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ten_Nguoi_Nop_Nhan}</strong></span></span></td></tr><tr><td style="width:20%"><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Lbl_Ly_Do}:</span></span></strong></td><td><strong><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">{Ten_Loai_Thu_Chi}</span></span></strong></td></tr><tr><td style="width:20%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Ghi chú:</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Ly_Do}</strong></span></span></td></tr><tr><td style="width:20%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Số tiền:</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{So_Tien}</strong></span></span></td></tr><tr><td style="width:20%"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Bằng chữ:</strong></span></span></td><td><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{So_Tien_Bang_Chu}</strong></span></span></td></tr></tbody></table>
              <p><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif">&nbsp;</span></span></p>
              <table border="0" cellpadding="1" cellspacing="1" style="width:100%" class=" cke_show_border"><tbody><tr><td><br></td><td><br></td><td style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><em>Ngày.......tháng.......năm.......</em></span></span></td></tr><tr><td style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Người lập phiếu</strong></span></span></td><td style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>{Lbl_Nguoi_Nop_Nhan}</strong></span></span></td><td style="text-align:center"><span style="font-size:14px"><span style="font-family:Times New Roman,Times,serif"><strong>Thủ quỹ</strong></span></span></td></tr></tbody></table>
              <p><br></p>`;
            }
          },
      }
      selectOption.init();
      
      let selectStamp ={
        init:function(){
          this.settingLayout();
        },
        settingLayout:function(){
          let tenNhaThuoc = $('#tenNhaThuoc');
          let hienTenNhaThuoc = $('#hienTenNhaThuoc');
          let hienThiTenNhaThuoc = $('#hienThiTenNhaThuoc');
          let tenSanPham = $('#tenSanPham');
          let hienTenSanPham = $('#hienTenSanPham');
          let tenVietTat = $('#tenVietTat');
          let hienTenSanPhamVietTat = $('#hienTenSanPhamVietTat');
          let hienThiGia = $('#hienThiGia');
          let hienGia = $('#hienGia');
          let donViTien = $('#donViTien');
          let nhapDonViTien = $('#nhapDonViTien');
          let donViTinh = $('#donViTinh');


          tenNhaThuoc.change(function(){
             if(tenNhaThuoc.prop('checked'))
             {
              hienTenNhaThuoc.css("display","block");
             }
             else
             {
              hienTenNhaThuoc.css("display","none");
             }
          });

          hienThiTenNhaThuoc.change(function(){
            hienTenNhaThuoc.html(hienThiTenNhaThuoc.val());
          })

          tenSanPham.change(function(){
             if(tenSanPham.prop('checked'))
             {
              tenVietTat.prop('checked',false);
              hienTenSanPham.css("display","block");
              hienTenSanPhamVietTat.css("display","none");
             }
             else
             {
              hienTenSanPham.css("display","none");
             }
          });

          tenVietTat.change(function(){
             if(tenVietTat.prop('checked'))
             {
              tenSanPham.prop('checked',false);
              hienTenSanPhamVietTat.css("display","block");
              hienTenSanPham.css("display","none");
             }
             else
             {
              hienTenSanPhamVietTat.css("display","none");
             }
          });

          hienThiGia.change(function(){
             if(hienThiGia.prop('checked'))
             {
              hienGia.css("display","block");
              donViTinh.removeAttr("disabled");
              donViTien.removeAttr("disabled");
             }
             else
             {
              hienGia.css("display","none");
              donViTinh.attr("disabled","disabled");
              donViTien.attr("disabled","disabled");
             }
          });

          donViTien.change(function(){
             if(donViTien.prop('checked'))
             {
               hienGia.html(hienGia.text().concat(" ", nhapDonViTien.val()));
               nhapDonViTien.change(function(){
                let x = "Giá";
                hienGia.html(x.concat(" ",nhapDonViTien.val()));
              });
             }
             else
             {
                let x = "Giá";
                hienGia.html(x);
                nhapDonViTien.val("VNĐ");
             }
          });

          
          donViTinh.change(function(){
            
             if(donViTinh.prop('checked'))
             {
                hienGia.html(hienGia.text().concat(" ","/ ĐƠN VỊ TÍNH"));
             }
             else
             {
               let x = hienGia.text().length - 13;
              hienGia.html(hienGia.text().slice(0,x));
             }
          });
        } 
      }

      selectStamp.init();
    })
    
    
    
  </script>
@endsection
