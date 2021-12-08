@extends('default')
@section('title', 'Sổ quỹ')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
        <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Sổ quỹ</h4>
        <div class="d-flex">
            <div class="mg-r-10">
                <!-- Button thêm mới -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class='fas fa-plus' style='font-size:15px;'></i>
                    Tạo phiếu thu
                </button>
                <!-- Modal thêm mới-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width:50em;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Tạo phiếu thu</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" name="soQuy" id="soQuy" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">Ngày tạo</label>
                                            <div class="input-group">
                                                <input type="hidden" id="idInHoaDon">
                                                <input type="hidden" class="form-control" name="type" value="receipt">
                                                <input type="datetime-local" class="form-control fc-datepicker"
                                                    name="date" value="<?php echo Date('Y-m-d\TH:i',time()) ?>"
                                                    placeholder="MM/DD/YYYY">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mg-t-10">
                                            <label for="" class="tx-gray-800 tx-bold">Loại thu <span
                                                    class="text-danger">*</span></label>
                                            <br>
                                            <select style="width:100%"
                                                class="js-example-basic-single form-control loaiThu select2 select2-container"
                                                id="receipt_type" name="payment_receipt_type">
                                                <option></option>
                                                <option value="Thu tiền khách hàng trả">Thu tiền khách hàng trả</option>
                                                <option value="Thu tiền nhà cung cấp trả">Thu tiền nhà cung cấp trả
                                                </option>
                                                <option value="Thu tiền nhân viên nộp">Thu tiền nhân viên nộp</option>
                                                <option value="Khác">Khác</option>
                                            </select>
                                            <label id="receipt_type-error" class="error" for="receipt_type"></label>
                                        </div>
                                        {{-- Khách hàng --}}
                                        <div class="col-md-12 mg-t-10 khachHangTra" style="display: none;">
                                            <label for="" class="tx-bold tx-gray-800">Tên người nộp<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-12 mg-t-10 khachHangTra" style="display: none;">
                                            <div class="pos-relative">
                                                <input type="hidden" name="id" id="id">
                                                <input type="hidden" name="id_customer" id="idCustomer">
                                                <input type="text" name="name" autocomplete="off" class="form-control"
                                                    id="autoSearch"
                                                    placeholder="Nhập mã, tên, sđt để tìm kiếm khách hàng">
                                                <button type="button" id="buttonCustomer"
                                                    class=" btn pos-absolute r-0 t-0 pd-7 bg-primary tx-white"
                                                    data-toggle="modal" data-target="#ThemKhachHang"
                                                    style="height: 39px">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </button>

                                                <div id="buttonCustomerClose"
                                                    class="btn btn-danger pos-absolute r-0 t-0 hidden"><i
                                                        class="fa fa-times"></i></div>
                                            </div>
                                        </div>

                                        {{-- Nhà cung cấp --}}
                                        <div class="col-md-12 mg-t-10 nhaCungCap" style="display: none;">
                                            <label for="" class="tx-bold tx-gray-800">Tên người nộp<span
                                                    class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-md-12 mg-t-10 nhaCungCap" style="display: none;">
                                            <div class="pos-relative">
                                                <input type="hidden" name="id" id="id">
                                                <input type="hidden" name="id_supplier" id="idSupplier">
                                                <input type="text" name="name" autocomplete="off" class="form-control"
                                                    id="autoSearchNCC"
                                                    placeholder="Nhập mã, tên, sđt để tìm kiếm nhà cung cấp">
                                                <button type="button" id="buttonSupplier"
                                                    class="btn pos-absolute r-0 t-0 pd-7 bg-primary tx-white"
                                                    data-toggle="modal" data-target="#NhaCungCap" style="height: 39px">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </button>
                                                <div id="buttonSupplierClose"
                                                    class="btn btn-danger pos-absolute r-0 t-0 hidden"><i
                                                        class="fa fa-times"></i></div>
                                            </div>
                                        </div>

                                        {{-- Tên người nộp --}}
                                        <div class="col-md-12 mg-t-10 tenNguoiNop" style="display: none;">
                                            <label for="" class="tx-bold tx-gray-800">Tên người nộp<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="tenNguoiNop"
                                                autocomplete="off">
                                        </div>
                                        {{-- Khác --}}
                                        <div class="col-md-12 mg-t-10 tenLoaiThu" style="display: none;">
                                            <label for="" class="tx-gray-800 tx-bold">Tên loại thu chi
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control a" value=""
                                                name="payment_receipt_type" autocomplete="off">
                                        </div>
                                        <div class="col-md-12 mg-t-10 tenLoaiThu">
                                            <label for="" class="tx-gray-800 tx-bold">Tên người nộp <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="tenLoaiChi"
                                                autocomplete="off">
                                        </div>
                                        <div class="col-md-12 mg-t-10">
                                            <label for="" class="tx-gray-800 tx-bold">Giá trị <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control giatrithuchi" name="money"
                                                placeholder="0.00" autocomplete="off">
                                        </div>
                                        <div class="col-md-12 mg-t-10">
                                            <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                            <textarea name="note" cols="30" rows="5" class="form-control"
                                                autocomplete="off"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"
                                            aria-hidden="true"></em> Lưu</button>
                                    <button type="submit" class="btn btn-primary inHoaDon" id="submit"><em
                                            class="fa fa-save" aria-hidden="true"></em>
                                        Lưu và in</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                            class="fa fa-close" aria-hidden="true"></em> Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mg-r-10">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                    <i class='fas fa-plus' style='font-size:15px;'></i>
                    Tạo phiếu chi
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width:50em;vertical-align: top;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Tạo phiếu chi
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" name="taoPhieuChi" id="taoPhieuChi" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold">Ngày tạo</label>
                                            <div class="input-group">
                                                <input type="hidden" id="idInHoaDon">
                                                <input type="hidden" class="form-control" name="type" value="payment">
                                                <input type="datetime-local" class="form-control fc-datepicker"
                                                    name="date" value="<?php echo Date('Y-m-d\TH:i',time()) ?>"
                                                    placeholder="MM/DD/YYYY">
                                            </div>
                                        </div>
                                        <div class="col-md-12 mg-t-10">
                                            <label for="" class="tx-gray-800 tx-bold">Loại chi <span
                                                    class="text-danger">*</span></label>
                                            <br>
                                            <select style="width:100%"
                                                class="js-example-basic-single form-control a loaiChi select2 select2-container"
                                                name="payment_receipt_type" id="payment_type">
                                                <option value=""></option>
                                                <option value="Chi tiền khách hàng trả">Chi tiền khách hàng trả</option>
                                                <option value="Chi tiền trả nhà cung cấp trả">Chi tiền trả nhà cung cấp
                                                    trả</option>
                                                <option value="Chi tiền trả nhân viên">Chi tiền trả nhân viên</option>
                                                <option value="Chi khác">Chi khác</option>
                                            </select>
                                        </div>

                                        {{-- Khách hàng --}}
                                        <div class="col-md-12 mg-t-10 ChikhachHangTra" style="display: none;">
                                            <label for="" class="tx-bold tx-gray-800">Tên người nộp<span
                                                    class="text-danger">(*)</span></label>
                                        </div>
                                        <div class="col-md-12 mg-t-10 ChikhachHangTra" style="display: none;">
                                            <div class="pos-relative">
                                                <input type="hidden" name="id" id="id">
                                                <input type="hidden" name="id_customer_chi" id="idCustomerChi">
                                                <input type="text" name="name" autocomplete="off" class="form-control"
                                                    id="autoSearchChi"
                                                    placeholder="Nhập mã, tên, sđt để tìm kiếm khách hàng">
                                                <button type="button" id="buttonCustomer"
                                                    class="btn pos-absolute r-0 t-0 pd-7 bg-primary tx-white"
                                                    data-toggle="modal" data-target="#ThemKhachHang"
                                                    style="height: 39px">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </button>
                                                <div id="buttonCustomerCloseChi"
                                                    class="btn btn-danger pos-absolute r-0 t-0 hidden"><i
                                                        class="fa fa-times"></i></div>
                                            </div>
                                        </div>
                                        {{-- Nhà cung cấp --}}
                                        <div class="col-md-12 mg-t-10 ChiNhaCungCap" style="display: none;">
                                            <label for="" class="tx-bold tx-gray-800">Tên người nộp<span
                                                    class="text-danger">(*)</span></label>
                                        </div>
                                        <div class="col-md-12 mg-t-10 ChiNhaCungCap" style="display: none;">
                                            <div class="pos-relative">
                                                <input type="hidden" name="id" id="id">
                                                <input type="hidden" name="id_supplier_chi" id="idSupplierChi">
                                                <input type="text" name="name" autocomplete="off" class="form-control"
                                                    id="autoSearchNCCChi"
                                                    placeholder="Nhập mã, tên, sđt để tìm kiếm nhà cung cấp">
                                                <button type="button" id="buttonSupplier"
                                                    class="pos-absolute r-0 t-0 pd-7 bg-primary tx-white"
                                                    data-toggle="modal" data-target="#NhaCungCap" style="height: 39px">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </button>
                                                <div id="buttonSupplierCloseChi"
                                                    class="btn btn-danger pos-absolute r-0 t-0 hidden"><i
                                                        class="fa fa-times"></i></div>
                                            </div>
                                        </div>

                                        {{-- Tên người nộp --}}
                                        <div class="col-md-12 mg-t-10 ChitenNguoiNop" style="display: none;">
                                            <label for="" class="tx-bold tx-gray-800">Tên người nộp<span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="ChiNguoiNop"
                                                autocomplete="off">
                                        </div>
                                        {{-- Khác --}}

                                        <div class="col-md-12 mg-t-10 tenLoaiChi" style="display:none;">
                                            <label for="" class="tx-gray-800 tx-bold">Tên loại thu chi
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control b" value=""
                                                name="payment_receipt_type" autocomplete="off">
                                        </div>
                                        <div class="col-md-12 mg-t-10 tenLoaiChi">
                                            <label for="" class="tx-gray-800 tx-bold">Tên người nhận <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name" id="ChiTenNguoiNop"
                                                autocomplete="off">
                                        </div>
                                        <div class="col-md-12 mg-t-10">
                                            <label for="" class="tx-gray-800 tx-bold">Giá trị <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control giatriphieuchi" name="money"
                                                autocomplete="off">
                                        </div>
                                        <div class="col-md-12 mg-t-10">
                                            <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                            <textarea name="note" cols="30" rows="5" class="form-control"
                                                autocomplete="off"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"
                                            aria-hidden="true"></em> Lưu</button>
                                    <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"
                                            aria-hidden="true"></em> Lưu và in</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                            class="fa fa-close" aria-hidden="true"></em> Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-info" id="exportExcelDBLotNo"><i class="fa fa-file-excel-o mr-2"
                        aria-hidden="true"></i></button>
            </div>
        </div>
    </div>
    <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="row ">
            <div class="col-sm-6 col-xl-3">
                <div class="bg-teal rounded overflow-hidden pos-relative bg-info">
                    <div class="pd-25">
                        <i class="ion ion-earth tx-60 lh-0 tx-white op-7 pos-absolute l-20"
                            style="opacity:0.3;top:50%;transform:translateY(-50%);"></i>
                        <div style="text-align:end;font-weight:700;">
                            <p class="tx-12 tx-spacing-1 tx-uppercase tx-white mg-b-10">Quỹ đầu kỳ</p>
                            <p class="tx-14 tx-white tx-lato mg-b-2 lh-1">0.00</p>
                        </div>
                    </div>
                </div>
            </div><!-- col-6 -->
            <div class="col-sm-6 col-xl-3">
                <div class="bg-teal rounded overflow-hidden pos-relative bg-primary">
                    <div class="pd-25">
                        <i class="ion ion-bag tx-60 lh-0 tx-white op-7 pos-absolute l-20"
                            style="opacity:0.3;top:50%;transform:translateY(-50%);"></i>
                        <div style="text-align:end;font-weight:700;">
                            <p class="tx-12 tx-spacing-1 tx-uppercase tx-white mg-b-10">Tổng thu</p>
                            <p class="tx-14 tx-white tx-lato mg-b-2 lh-1" id="revenueThisMonth"></p>
                        </div>
                    </div>
                </div>
            </div><!-- col-6 -->
            <div class="col-sm-6 col-xl-3">
                <div class="bg-teal rounded overflow-hidden pos-relative bg-danger">
                    <div class="pd-25">
                        <i class="ion ion-monitor tx-60 lh-0 tx-white op-7 pos-absolute l-20"
                            style="opacity:0.3;top:50%;transform:translateY(-50%);"></i>
                        <div class="mg-l-20" style="text-align:end;font-weight:700;">
                            <p class="tx-12 tx-spacing-1 tx-uppercase tx-white mg-b-10">Tổng chi</p>
                            <p class="tx-14 tx-white tx-lato mg-b-2 lh-1" id="revenueThisMonthChi"></p>
                        </div>
                    </div>
                </div>
            </div><!-- col-6 -->
            <div class="col-sm-6 col-xl-3">
                <div class="bg-teal rounded overflow-hidden pos-relative">
                    <div class="pd-25">
                        <i class="ion ion-clock tx-60 lh-0 tx-white op-7 pos-absolute l-20"
                            style="opacity:0.3;top:50%;transform:translateY(-50%);"></i>
                        <div class="mg-l-20" style="text-align:end;font-weight:700;">
                            <p class="tx-12 tx-spacing-1 tx-uppercase tx-white mg-b-10">Tồn quỹ</p>
                            <p class="tx-14 tx-white tx-lato mg-b-2 lh-1">0.00</p>
                        </div>
                    </div>
                </div>
            </div><!-- col-6 -->
        </div><!-- row -->
        <div class="shadow-base bg-white mg-t-20">
            <div class="pd-15">
                <div class="row">
                    <div class="col-md-3 col-lg-2">
                        <label for="">Từ ngày</label>
                        <div class="input-group">
                            <input type="text" class="form-control fc-datepicker" id="searchByStartDate"
                                value="<?php echo date("01/m/Y"); ?>" placeholder="MM/DD/YYYY">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Từ ngày</label>
                        <div class="input-group">
                            <input type="text" class="form-control fc-datepicker" id="searchByEndDate"
                                value="<?php echo date("d/m/Y"); ?>" placeholder="MM/DD/YYYY">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="" class="tx-gray-800 tx-bold">Trạng thái</label>
                        <select name="" id="searchByStatus" class="form-control select2 select2-container">
                            <option value="Hoàn thành">Đã thanh toán</option>
                            <option value="">Đã sửa</option>
                            <option value="Đã hủy">Đã huỷ</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="" class="tx-gray-800 tx-bold">Giá trị</label>
                        <select name="" id="Price1" class="form-control select2 select2-container">
                            <option value="0">Tất cả</option>
                            <option value="1">Dưới 1 triệu</option>
                            <option value="15">Trên 1 triệu - 5 triệu</option>
                            <option value="51">Trên 5 triệu - 10 triệu</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="" class="tx-gray-800 tx-bold">Loại phiếu</label>
                        <br>
                        <select name="" id="Thu_chi" class="form-control select2 select2-container" style="width:75%">
                            <option value="Thu tiền">Phiếu thu</option>
                            <option value="Chi tiền">Phiếu chi</option>
                        </select>
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-md-4">
                        <label for="" class="tx-gray-800 tx-bold">Nhà thuốc</label>
                        <div class="">
                            <!-- Button nhà thuốc -->
                            <button type="button" class="form-control" data-toggle="modal" data-target="#nhaThuoc">
                                Nhà thuốc Morioka
                            </button>

                            <!-- Modal nhà thuốc-->
                            <div class="modal fade" id="nhaThuoc" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document"
                                    style="max-width: none;width: 50em;vertical-align: top;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Danh sách nhà
                                                thuốc trong chuỗi</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div
                                                            class="input-group hidden-xs-down transition align-items-center">
                                                            <input id="searchbox" type="text" class="form-control"
                                                                placeholder="Tìm kiếm tên nhà thuốc theo mã">
                                                            <span class="input-group-btn">
                                                                <button class="btn btn-secondary" type="button"><i
                                                                        class="fa fa-search"></i></button>
                                                            </span>
                                                        </div><!-- input-group -->
                                                    </div>
                                                </div>
                                                <div class="row mg-t-10">
                                                    <div class="col-md-12">
                                                        <nav>
                                                            <div class="nav nav-tabs flex-column" id="nav-tab"
                                                                role="tablist">
                                                                <a class="nav-item nav-link active" id="nav-all-tab"
                                                                    data-toggle="tab" href="#nav-all" role="tab"
                                                                    aria-controls="nav-home"
                                                                    aria-selected="true">All</a>
                                                                <a class="nav-item nav-link" id="nav-nhaThuoc-tab"
                                                                    data-toggle="tab" href="#nav-nhaThuoc" role="tab"
                                                                    aria-controls="nav-profile"
                                                                    aria-selected="false">Nhà thuốc Dược Thiện</a>
                                                            </div>
                                                        </nav>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-primary">Chọn nhà thuốc</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Đóng</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="" class="tx-gray-800 tx-bold">Loại thu chi</label>
                        <select name="" id="thuchi" class="form-control select2 select2-container">
                            <option value="">Tất cả</option>
                            <option value="Thu tiền khách hàng trả">Thu tiền khách hàng trả</option>
                            <option value="Chi tiền trả khách hàng">Chi tiền khách trả</option>
                            <option value="Thu tiền nhà cung cấp trả">Thu tiền nhà cung cấp trả</option>
                            <option value="Chi tiền trả nhà cung cấp">Chi tiền trả nhà cung cấp</option>
                            <option value="Thu tiền nhân viên nộp">Thu tiền nhân viên nộp</option>
                            <option value="Chi tiền trả nhân viên">Chi tiền trả nhân viên</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label for="" class="tx-gray-800 tx-bold">Loại người nộp nhận</label>
                        <select name="" id="LoaiKhachHang" class="form-control select2 select2-container">
                            <option value="">Tất cả</option>
                            <option value="Khách hàng">Khách hàng</option>
                            <option value="">Nhà cung cấp</option>
                            <option value="">Nhân viên</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="" class="tx-gray-800 tx-bold">Tìm kiếm</label>
                        <input type="text" class="form-control" id="searchBySupplier"
                            placeholder="Tìm kiếm theo mã phiếu, tên phiếu">
                    </div>
                    <div class="col-md-0 align-self-end">
                        <button class="btn btn-info" id="searchData" onclick="searchDateTable()">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            Tìm kiếm
                        </button>
                    </div>
                </div>
                <div class="row mg-t-20">
                    <div class="col-md-12">
                        <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1">
                            <thead>
                                <tr>
                                    <th scope="col" class="bg-primary" style="color: white;">#</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Mã phiếu</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Thời gian</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Loại thu chi</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Người nộp/nhận</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Giá trị</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Trạng thái</th>
                                    <th scope="col" class="bg-primary" style="color: white;"></th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal thêm mới Nhà Cung Cấp -->
    <div class="modal fade" id="NhaCungCap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thêm mới nhà cung cấp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" name="thongTinNhaCungCap" id="thongTinNhaCungCap" method="post">
                    @csrf
                    <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#info">Thông tin nhà cung
                                    cấp</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="info">
                                <div class="row mg-t-10">
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Mã nhà cung cấp</label>
                                        <input type="text" class="form-control" name="supplier_id"
                                            placeholder="Mã tự động">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="tx-gray-800 tx-bold">Tên nhà cung cấp <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Mã số thuế <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="tax_number" class="form-control">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Nhóm nhà cung cấp</label>
                                        <select name="group_id" id="group_id" class="form-control">
                                            @foreach (App\Models\SupplierGroup::all() as $groupid)
                                            <option value="{{ $groupid->id }}">
                                                {{ $groupid->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                        <input type="number" class="form-control" name="phone">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Website</label>
                                        <input type="text" class="form-control" name="website">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                        <textarea name="" id="" cols="30" rows="3" class="form-control"
                                            name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"
                                aria-hidden="true"></em> Lưu và thêm mới</button>
                        <button type="submit" class="btn btn-primary"><em class="fa fa-save" aria-hidden="true"></em>
                            Lưu và đóng</button>
                        <button type="submit" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"
                                aria-hidden="true"></em> Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal thêm mới khách hàng-->
<div class="modal fade" id="ThemKhachHang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title tx-gray-800" id="exampleModalLabel">Thêm mới khách hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" name="thongTinKhachHang" id="thongTinKhachHang" method="post">
                @csrf
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#info">Thông tin khách hàng</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="info">
                            <div class="row mg-t-10">
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Mã khách hàng</label>
                                    <input type="text" class="form-control" id="" name="code" placeholder="Mã tự động">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Tên khách hàng <samp
                                            class="text-danger">*</samp></label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Nhóm khách hàng</label>
                                    <select name="group_id" id="" class="form-control">
                                        @foreach (App\Models\CustomerGroup::all() as $groupid)
                                        <option value="{{ $groupid->id }}">
                                            {{ $groupid->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Loại khách hàng</label>
                                    <div>
                                        <input type="radio" id="" name="customer_type" value="canhan" checked>
                                        <label for="canhan" class="tx-gray-800 mg-r-10">Cá nhân</label>
                                        <input type="radio" id="" name="customer_type" value="congty">
                                        <label for="congty" class="tx-gray-800">Công ty</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">CMND</label>
                                    <input type="text" class="form-control" id="" name="ID_code">
                                </div>
                                <div class="col-md-1">
                                    <label for="" class="tx-gray-800 tx-bold">Tuổi</label>
                                    <input type="text" class="form-control" id="" name="age">
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="tx-gray-800 tx-bold">Loại</label>
                                    <div>
                                        <input type="radio" id="" name="age_type" value="tuoi" checked>
                                        <label for="tuoi" class="tx-gray-800 mg-r-10">Tuổi</label>
                                        <input type="radio" id="" name="age_type" value="thang">
                                        <label for="thang" class="tx-gray-800">Tháng</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Ngày sinh</label>
                                    <input type="date" class="form-control" id="" name="dob">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Giới tính</label>
                                    <div>
                                        <input type="radio" name="gender" value="nam" checked>
                                        <label for="nam" class="tx-gray-800 mg-r-10">Nam</label>
                                        <input type="radio" name="gender" value="nu">
                                        <label for="nu" class="tx-gray-800">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Mã số thuế</label>
                                    <input type="text" class="form-control" id="" name="tax_number">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                    <input type="text" class="form-control" id="" name="phone">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Email</label>
                                    <input type="email" class="form-control" id="" name="email">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Công ty</label>
                                    <input type="text" class="form-control" id="" name="company">
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-12">
                                    <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                    <input type="text" class="form-control" id="" name="address">
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-12">
                                    <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                    <textarea cols="30" rows="1" class="form-control" id="" name="note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"
                            aria-hidden="true"></em> Lưu và thêm mới</button>
                    <button type="submit" class="btn btn-primary" id="submitandclose"><em class="fa fa-save"
                            aria-hidden="true"></em> Lưu và đóng</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"
                            aria-hidden="true"></em>Đóng</button>
                </div>
            </form>

        </div>
    </div>
</div>


{{-- Chi tiết phiếu --}}

<!-- Modal dropdown1-->
<div class="modal fade" id="dropdown1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết phiếu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row mg-t-10">
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Mã phiếu</label>
                            <input type="text" id="detailid" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Tên phiếu</label>
                            <input type="text" id="detailmoney1" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Ngày nhập</label>
                            <input type="text" id="detaildate" placeholder="" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mg-t-10">
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Loại người nhận</label>
                            <input type="text" id="detailpayment_receipt_type" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Tên người nhận</label>
                            <input type="text" id="detailname" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Giá trị</label>
                            <input type="text" id="detailmoney" disabled=disabled class="form-control">
                        </div>
                    </div>
                    <div class="mg-t-10 ">
                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table4">
                            <thead>
                                <tr>
                                    <th scope="col" class="bg-primary" style="color: white;">#</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Mã phiếu</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Ngày tạo phiếu</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Tổng tiền</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Đã thu trước</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Thanh toán</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"
                            aria-hidden="true"></em>Đóng</button>
                </div>
            </form>
        </div>
    </div> <!-- Modal thêm mới Nhà Cung Cấp -->
    <div class="modal fade" id="NhaCungCap" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thêm mới nhà cung cấp</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="#" name="thongTinNhaCungCap" id="thongTinNhaCungCap" method="post">
                    @csrf
                    <div class="modal-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#info">Thông tin nhà cung
                                    cấp</a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="info">
                                <div class="row mg-t-10">
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Mã nhà cung cấp</label>
                                        <input type="text" class="form-control" name="supplier_id"
                                            placeholder="Mã tự động">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="tx-gray-800 tx-bold">Tên nhà cung cấp <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Mã số thuế <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="tax_number" class="form-control">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Nhóm nhà cung cấp</label>
                                        <select name="group_id" id="group_id" class="form-control">
                                            @foreach (App\Models\SupplierGroup::all() as $groupid)
                                            <option value="{{ $groupid->id }}">
                                                {{ $groupid->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Email</label>
                                        <input type="email" class="form-control" name="email">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                        <input type="number" class="form-control" name="phone">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Website</label>
                                        <input type="text" class="form-control" name="website">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                        <input type="text" class="form-control" name="address">
                                    </div>
                                </div>
                                <div class="row mg-t-10">
                                    <div class="col-md-12">
                                        <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                        <textarea name="" id="" cols="30" rows="3" class="form-control"
                                            name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"
                                aria-hidden="true"></em>Lưu và thêm mới</button>
                        <button type="submit" class="btn btn-primary"><em class="fa fa-save" aria-hidden="true"></em>Lưu
                            và đóng</button>
                        <button type="submit" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"
                                aria-hidden="true"></em>Đóng</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal thêm mới khách hàng-->
<div class="modal fade" id="ThemKhachHang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title tx-gray-800" id="exampleModalLabel">Thêm mới khách hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" name="thongTinKhachHang" id="thongTinKhachHang" method="post">
                @csrf
                <div class="modal-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#info">Thông tin khách hàng</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="info">
                            <div class="row mg-t-10">
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Mã khách hàng</label>
                                    <input type="text" class="form-control" id="" name="code" placeholder="Mã tự động">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Tên khách hàng <samp
                                            class="text-danger">*</samp></label>
                                    <input type="text" class="form-control" name="name">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Nhóm khách hàng</label>
                                    <select name="group_id" id="" class="form-control">
                                        @foreach (App\Models\CustomerGroup::all() as $groupid)
                                        <option value="{{ $groupid->id }}">
                                            {{ $groupid->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Loại khách hàng</label>
                                    <div>
                                        <input type="radio" id="" name="customer_type" value="canhan" checked>
                                        <label for="canhan" class="tx-gray-800 mg-r-10">Cá nhân</label>
                                        <input type="radio" id="" name="customer_type" value="congty">
                                        <label for="congty" class="tx-gray-800">Công ty</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">CMND</label>
                                    <input type="text" class="form-control" id="" name="ID_code">
                                </div>
                                <div class="col-md-1">
                                    <label for="" class="tx-gray-800 tx-bold">Tuổi</label>
                                    <input type="text" class="form-control" id="" name="age">
                                </div>
                                <div class="col-md-2">
                                    <label for="" class="tx-gray-800 tx-bold">Loại</label>
                                    <div>
                                        <input type="radio" id="" name="age_type" value="tuoi" checked>
                                        <label for="tuoi" class="tx-gray-800 mg-r-10">Tuổi</label>
                                        <input type="radio" id="" name="age_type" value="thang">
                                        <label for="thang" class="tx-gray-800">Tháng</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Ngày sinh</label>
                                    <input type="date" class="form-control" id="" name="dob">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Giới tính</label>
                                    <div>
                                        <input type="radio" name="gender" value="nam" checked>
                                        <label for="nam" class="tx-gray-800 mg-r-10">Nam</label>
                                        <input type="radio" name="gender" value="nu">
                                        <label for="nu" class="tx-gray-800">Nữ</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Mã số thuế</label>
                                    <input type="text" class="form-control" id="" name="tax_number">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                    <input type="text" class="form-control" id="" name="phone">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Email</label>
                                    <input type="email" class="form-control" id="" name="email">
                                </div>
                                <div class="col-md-3">
                                    <label for="" class="tx-gray-800 tx-bold">Công ty</label>
                                    <input type="text" class="form-control" id="" name="company">
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-12">
                                    <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                    <input type="text" class="form-control" id="" name="address">
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-12">
                                    <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                    <textarea cols="30" rows="1" class="form-control" id="" name="note"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="submit"><em class="fa fa-save"
                            aria-hidden="true"></em>Lưu và thêm mới</button>
                    <button type="submit" class="btn btn-primary" id="submitandclose"><em class="fa fa-save"
                            aria-hidden="true"></em>Lưu và đóng</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"
                            aria-hidden="true"></em>Đóng</button>
                </div>
            </form>

        </div>
    </div>
</div>


{{-- Chi tiết phiếu --}}

<!-- Modal dropdown1-->
<div class="modal fade" id="dropdown1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chi tiết phiếu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="row mg-t-10">
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Mã phiếu</label>
                            <input type="text" id="detailid" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Tên phiếu</label>
                            <input type="text" id="detailmoney1" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Ngày nhập</label>
                            <input type="text" id="detaildate" placeholder="" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row mg-t-10">
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Loại người nhận</label>
                            <input type="text" id="detailpayment_receipt_type" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Tên người nhận</label>
                            <input type="text" id="detailname" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Giá trị</label>
                            <input type="text" id="detailmoney" disabled=disabled class="form-control">
                        </div>
                    </div>
                    <div class="mg-t-10 ">
                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table4">
                            <thead>
                                <tr>
                                    <th scope="col" class="bg-primary" style="color: white;">#</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Mã phiếu</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Ngày tạo phiếu</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Tổng tiền</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Đã thu trước</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Thanh toán</th>
                                    <th scope="col" class="bg-primary" style="color: white;">Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <em class="fa fa-close" aria-hidden="true"></em>Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<script>
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
        .columns(6).search($("#searchByStatus").val())
        .columns(5).search($("#Price1").val())
        .columns(3).search($("#thuchi").val())
        .columns(3).search($("#Thu_Chi").val())
        .columns(4).search($("#LoaiKhachHang").val())
        .draw();

        }
        $(document).ready(function() {
            $('#revenueThisMonth').text(decimalNumber({{ $dstn }}));
            $('#revenueThisMonthChi').text(decimalNumber({{ $dstc }}));
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            let toalRevenue =0;
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

                ajax: {
                    url: "{{ url('soquy') }}",

                },
                columns: [
                    { data: 'id', name: 'id', orderable: false,},
                    { data: null,
                      "render": function(data,type,row) {
                        if(row['payment_receipt_type'] =="Chi tiền trả nhân viên"){
                            return "PT"+checkRangeValue(data["id"])
                            }else if(row['payment_receipt_type'] =="Thu tiền nhân viên nộp"){
                                return "PT"+checkRangeValue(data["id"])
                            }
                            else if(row['payment_receipt_type'] =="Thu tiền khách hàng trả"){
                                return "PT"+checkRangeValue(data["id"])
                            }
                            else if(row['payment_receipt_type'] =="Thu tiền nhà cung cấp trả"){
                                return "PTHD"+checkRangeValue(data["id"])
                            }
                            else if(row['payment_receipt_type'] =="Chi tiền trả khách"){
                                return "PCPKT"+checkRangeValue(data["id"])
                            }
                            else if(row['payment_receipt_type'] =="Chi tiền trả nhà cung cấp"){
                                return "PC"+checkRangeValue(data["id"])
                            }
                            else if(row['payment_receipt_type'] =="Chi khác"){
                                return "PC"+checkRangeValue(data["id"])
                            }else{
                                return "PT"+checkRangeValue(data["id"])
                            }

                            }
                    },
                    {
                        data: 'date',
                        name: 'date', orderable: false,
                    },
                    {
                        data: 'payment_receipt_type',
                        name: 'payment_receipt_type',orderable: false

                    },
                    { data: 'name', name: 'name', orderable: false},
                    { data: null,
                      "render": function(data,type,row) {
                            if(row['type'] =="receipt"){

                                return decialNumber(data["money"]);
                            }
                            else if(row['type'] == "payment"){

                                return "-"+decialNumber(data["money"]);

                            }else{
                                return "0.00"
                            }
                          }
                    },
                    {
                        data: 'status',
                        name: 'status',orderable: false,
                    },
                    {
                        data: 'action',
                        name: 'action'
                    },
                ],
                columnDefs: [
                    {
                        targets: 5,
                        render: $.fn.dataTable.render.number(',', 0, '')
                    },
                        ],
                        dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'SoQuy_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
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
        });

function changeFunc(id){
    Swal.fire({
      title: 'Cảnh báo!',
      title: " Bạn chắc chắn muốn huỷ phiếu này BS0000"+id+ "?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type:"POST",
          url: "{{ url('soquy/active') }}",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            $("#data-table1").load(
              $.toast({
                text : "Bạn hủy thành công sổ quỹ",
                position: "bottom-right",
                icon:"success",
                stack:1,
                loader:false
              }));
              $('#data-table1').DataTable().ajax.reload();
          }
        });
      } else {
        swal("Cancelled Successfully");
      }
    });
  }

  function detailFunc(id){
        $.ajax({
          type:"GET",
          url: "{{ url('soquy/edit') }}",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            $('#detailid').val("PC"+checkRangeValue(res.id));
            $('#detailname').val(res.name);
            $('#detaildate').val(res.date);
            $('#detailpayment_receipt_type').val(res.payment_receipt_type)
            $('#detailmoney').val(decialNumber(res.money));
            // $('#detailmoney').val(res.pre_collected);
            $('#detailmoney1').val(res.payment_receipt_type);
            console.log(res);
          }
        });
        $.ajax({
          type:"GET",
          url: "{{ url('soquy/editstock') }}",
          data: { id: id },
          dataType: 'json',
          success: function(response){
            var table4 = $('#data-table4').DataTable({
                "responsive": true,
                "destroy": true,
                "lengthChange": false,
                "ordering" : false,
                "paging": false,
                "info": false,
              aaData: response,
              columns: [
              { data: 'id', name: 'id'},
              { data: null,
              'render':function(data,type,row){

                  return 'PN'+checkRangeValue(data['id']);
              }
            },
              { data: 'date', name: 'date' },
              { data: null,
                      "render": function(data,type,row) {
                            if(row['type'] =="receipt"){

                                return decialNumber(data["money"]);
                            }
                            else if(row['type'] == "payment"){

                                return "-"+decialNumber(data["money"]);

                            }else{
                                return "0.00"
                            }
                          }
                    },
                    { data: null,
							"render": function(data,type,row) {
								return decialNumber(data['receipt_type']);
							}
				},
                { data: null,
                      "render": function(data,type,row) {
                            if(row['type'] =="receipt"){

                                return decialNumber(data["money"]-data['receipt_type']);
                            }
                            else if(row['type'] == "payment"){

                                return "-"+decialNumber(data["money"] - data['receipt_type']);

                            }else{
                                return "0.00"
                            }
                          }
                    },
              { data: 'status', name: 'status' },
              ],
              "columnDefs": [
              {
                "targets": 6,
                "data": "id",
                "render": function ( data, type, row, meta ) {
                  if(data=="1"){
                    return '<button class="font-weight-bold tx-gray-700" style="color:white;background-color: #36c6d3;border:none;font-family: "Open Sans",sans-serif;">Đã thanh toán</button>';
                  }else{
                    return '<button class="font-weight-bold tx-gray-700" style="color:white;background-color:red;border:none;font-family: "Open Sans",sans-serif;">Đã hủy</button>';
                  }
                }
              }
            ],
            });
            table4.on('order.dt search.dt', function () {
            table4.column(0).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
        }).draw();
          }
        });
      }

      $('#autoSearch').typeahead({
        source:  function (query, process) {
          return $.get(
            "{{ url('khachhangtralai/autosearch') }}",
            { query: query },
            function (data) {
              return process(data);
          });
      },
      updater: function(item) {
          console.log(item);
          $('#idCustomer').val(item.id);
          inputCustomer();
          return item;
      }
  });





  function inputCustomer(){
        $('#autoSearch').css({'color':'#23527c' , 'text-decoration':'underline', 'cursor':'pointer'});
        $("#buttonCustomer").addClass("hidden");
        $("#buttonCustomerClose").removeClass("hidden");
        $('#buttonCustomerClose').on('click', function(){
          $('#idCustomer').val("");
          $('#autoSearch').val("");
          $('#autoSearch').trigger('propertychange.typeahead');
          $('#autoSearch').removeAttr("style");
          $("#buttonCustomer").removeClass("hidden");
          $("#buttonCustomerClose").addClass("hidden");
      });
        $('#autoSearch').on('click', function(){
            if($('#autoSearch').val()!=''){
          $('#exampleModal').modal('show');
          $.ajax({
            type: "GET",
            url: "{{ url('khachhang/{id}/edit') }}",
            data: {id:$("#idCustomer").val()},
            success: function(res) {
              $('#idUpdate').val(res.id);
              $('#code').val(res.code);
              $('#name').val(res.name);
              $('#tax_number').val(res.tax_number);
              $('#group_id').val(res.group_id);
              $('#email').val(res.email);
              $('#phone').val(res.phone);
              $('#website').val(res.website);
              $('#address').val(res.address);
              $('#note').val(res.note);
          }
      });
            }
      });
    }


    $('#autoSearchChi').typeahead({
        source:  function (query, process) {
          return $.get(
            "{{ url('khachhangtralai/autosearch') }}",
            { query: query },
            function (data) {
              return process(data);
          });
      },
      updater: function(item) {
          console.log(item);
          $('#idCustomerChi').val(item.id);
          inputCustomerChi();
          return item;
      }
  });


  function inputCustomerChi(){
        $('#autoSearchChi').css({'color':'#23527c' , 'text-decoration':'underline', 'cursor':'pointer'});
        $("#buttonCustomer").addClass("hidden");
        $("#buttonCustomerCloseChi").removeClass("hidden");
        $('#buttonCustomerCloseChi').on('click', function(){
          $('#idCustomerChi').val("");
          $('#autoSearchChi').val("");
          $('#autoSearchChi').trigger('propertychange.typeahead');
          $('#autoSearchChi').removeAttr("style");
          $("#buttonCustomer").removeClass("hidden");
          $("#buttonCustomerCloseChi").addClass("hidden");
      });
        $('#autoSearchChi').on('click', function(){
            if($('#autoSearchChi').val()!=''){
          $('#exampleModal').modal('show');
          $.ajax({
            type: "GET",
            url: "{{ url('khachhang/{id}/edit') }}",
            data: {id:$("#idCustomerChi").val()},
            success: function(res) {
              $('#idUpdate').val(res.id);
              $('#code').val(res.code);
              $('#name').val(res.name);
              $('#tax_number').val(res.tax_number);
              $('#group_id').val(res.group_id);
              $('#email').val(res.email);
              $('#phone').val(res.phone);
              $('#website').val(res.website);
              $('#address').val(res.address);
              $('#note').val(res.note);
          }
      });
            }
      });
    }


    // autoSearch nhà cung cấp
            $('#autoSearchNCC').typeahead({
                source:  function (query, process) {
                  return $.get(
                    "{{ url('nhaptunhacungcap/autosearch') }}",
                    { query: query },
                    function (data) {
                      return process(data);
                    });
                },
                updater: function(item) {
                  console.log(item);
                  $('#idSupplier').val(item.id);
                  inputSupplier();
                  return item;
                }
              });


              function inputSupplier(){
                $('#autoSearchNCC').css({'color':'#23527c' , 'text-decoration':'underline', 'cursor':'pointer'});
                $("#buttonSupplier").addClass("hidden");
                $("#buttonSupplierClose").removeClass("hidden");
                $('#buttonSupplierClose').on('click', function(){
                  $('#idSupplier').val("");
                  $('#autoSearchNCC').val("");
                  $('#autoSearchNCC').removeAttr("style");
                  $("#buttonSupplier").removeClass("hidden");
                  $("#buttonSupplierClose").addClass("hidden");
                });

                $('#autoSearchNCC').on('click', function(){
                  if($('#autoSearchNCC').val()!=''){
                    $('#exampleModal').modal('show');
                    $.ajax({
                      type: "GET",
                      url: "{{ url('nhacungcap/{id}/edit') }}",
                      data: {id:$("#idSupplier").val()},
                      success: function(res) {
                        $('#idUpdate').val(res.id);
                        $('#supplier_id').val(res.supplier_id);
                        $('#name').val(res.name);
                        $('#tax_number').val(res.tax_number);
                        $('#group_id').val(res.group_id);
                        $('#email').val(res.email);
                        $('#phone').val(res.phone);
                        $('#website').val(res.website);
                        $('#address').val(res.address);
                        $('#note').val(res.note);
                      }
                    });
                  }
                });
              }

              $('#autoSearchNCCChi').typeahead({
                source:  function (query, process) {
                  return $.get(
                    "{{ url('nhaptunhacungcap/autosearch') }}",
                    { query: query },
                    function (data) {
                      return process(data);
                    });
                },
                updater: function(item) {
                  console.log(item);
                  $('#idSupplierChi').val(item.id);
                  inputSupplierChi();
                  return item;
                }
              });



              function inputSupplierChi(){
                $('#autoSearchNCCChi').css({'color':'#23527c' , 'text-decoration':'underline', 'cursor':'pointer'});
                $("#buttonSupplier").addClass("hidden");
                $("#buttonSupplierCloseChi").removeClass("hidden");
                $('#buttonSupplierCloseChi').on('click', function(){
                  $('#idSupplierChi').val("");
                  $('#autoSearchNCCChi').val("");
                  $('#autoSearchNCCChi').removeAttr("style");
                  $("#buttonSupplier").removeClass("hidden");
                  $("#buttonSupplierCloseChi").addClass("hidden");
                });

                $('#autoSearchNCCChi').on('click', function(){
                  if($('#autoSearchNCCChi').val()!=''){
                    $('#exampleModal').modal('show');
                    $.ajax({
                      type: "GET",
                      url: "{{ url('nhacungcap/{id}/edit') }}",
                      data: {id:$("#idSupplierChi").val()},
                      success: function(res) {
                        $('#idUpdate').val(res.id);
                        $('#supplier_id').val(res.supplier_id);
                        $('#name').val(res.name);
                        $('#tax_number').val(res.tax_number);
                        $('#group_id').val(res.group_id);
                        $('#email').val(res.email);
                        $('#phone').val(res.phone);
                        $('#website').val(res.website);
                        $('#address').val(res.address);
                        $('#note').val(res.note);
                      }
                    });
                  }
                });
              }



function printFunc(id){
	$.ajax({
		type:"GET",
		url: "{{ url('soquy/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			$.ajax({
				type:"GET",
				url: "{{ url('soquy/editstock') }}",
				data: { id: id },
				dataType: 'json',
				success: function(response){
					var mywindow = window.open('', 'PRINT','height=800,width=1100');
					mywindow.document.write(`
						<table style="width:100%">
						<tbody>
						<tr>
						<td class="text-uppercase"><strong>Hộ Kinh Doanh Nhà Thuốc Morioka</strong></td>
						<td style="text-align:right">Mã phiếu:</td>
						<td><strong>PT`+checkRangeValue(res.id)+`</strong></td>
						</tr>
						<tr>
						<td>Địa chỉ:</td>
						<td style="text-align:right">Ngày:</td>
						<td><strong>`+res.date +`</strong></td>
						</tr>
						</tbody>
						</table>

						<p style="text-align:center"><strong>PHIẾU THU CHI</strong></p>

						<table class="mg-b-0 tx-13 tx-gray-700" style="width:100%">
						<tbody>
						<tr>
                        <td>Số điện thoại<strong>`+(res.phone || '')+`</strong></td>
                        </tr>
                        <tr>
                        <td>Họ và tên người nộp:<strong>`+(res.name||'')+`</strong></td>
                        </tr>
						<tr><td>Lý do nộp:<strong>`+(res.payment_receipt_type||'')+`</strong></td></tr>
                        <tr><td>Ghi chú:<strong>`+(res.note|| '')+`</strong></td></tr>
                        <tr><td>Số tiền:<strong>`+decialNumber(res.money)+`</strong></td></tr>
                       <tr> <td>Bằng chữ:<strong>`+decialNumber(res.money)+`</strong></td></tr>

						<td>&nbsp;</td>
						</tr>
						</tbody>
						</table>
                        <table class="mg-b-0 tx-13 tx-gray-700" style="width:100%">
						<tbody>
                        <tr>
						<td class="text-uppercase mg-t-20"><strong>Người lập phiếu</strong></td>
						<td style="text-align:center"><strong>Người nộp</strong></td>
						<td style="text-align:right">Ngày .... tháng .... năm ....<p style="padding-right:70px"><strong>Thủy quỹ</strong></p></td>
						</tr>
                    </tbody>
						</table>
						</tr>`);

					mywindow.document.close();
					mywindow.focus();

					mywindow.print();
					mywindow.close();
					return true;
				}
			});
}
});
}



</script>
<script>
    // Datepicker
    var DataTable_hanghoa = [];
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

        $(document).ready(function() {
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

            new AutoNumeric.multiple(['input[name=money]'],{
            minimumValue: 0,
            modifyValueOnWheel: false,
            unformatOnHover: false
        });
            $(function() {
                let soQuy = $("#soQuy");
                if (soQuy.length) {
                    soQuy.validate({
                        rules: {
                            date:{
                                required: true
                            },
                            payment_receipt_type: {
                                required: true
                            },
                            money: {
                                required: true,

                            }
                        },
                        messages: {
                            date:{
                                required:'Vui lòng điền ngày giờ'
                            },
                            payment_receipt_type: {
                                required: 'Vui lòng chọn loại thu'
                            },
                            money: {
                                required: 'Giá trị phải lớn hơn 0',

                            }
                        },
                        submitHandler: function(form) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                }
                            });

                            $("#submit").attr("disabled", true);
                            if( $('#autoSearch').val()==''){
                                ( $('#autoSearch').attr("disabled", true));
                            }
                            if( $('#autoSearchNCC').val()==''){
                                ( $('#autoSearchNCC').attr("disabled", true));
                            }
                            if( $('#tenNguoiNop').val()==''){
                                ( $('#tenNguoiNop').attr("disabled", true));
                            }
                            if( $('#tenLoaiChi').val()==''){
                                ( $('#tenLoaiChi').attr("disabled", true));
                            }

                            $.ajax({
                                url: "{{ url('soquy') }}",
                                type: "POST",
                                data: $('#soQuy').serialize()+"&money="+replaceCurrency($('input[name=money]').val()),
                                success: function(response) {
                                    $('#data-table1').DataTable().ajax.reload();
                                    $('#exampleModal').modal('hide');
                                    $('#soQuy').trigger("reset");
                                    $('#submit').html('Lưu và thêm mới');
                                    $("#submit").attr("disabled", false);
                                    $("#submit").load(
                                        $.toast({
                                            text: "Thêm mới phiếu thu thành công",
                                            position: "bottom-right",
                                            icon: "success",
                                            stack: 1,
                                            loader: false
                                        }));

                                }
                            });
                        }

                    })
                }
            })
            new AutoNumeric.multiple(['.giatriphieuchi'],{
            minimumValue: 0,
            modifyValueOnWheel: false,
            unformatOnHover: false
        });
            $(function() {
                let taoPhieuChi = $("#taoPhieuChi");
                if (taoPhieuChi.length) {
                    taoPhieuChi.validate({
                        rules: {
                            date:{
                                required: true
                            },
                            name:{
                                required:true
                            },
                            payment_receipt_type: {
                                required: true
                            },
                            money: {
                                required: true
                            }

                        },
                        messages: {
                            date:{
                                required:'Vui lòng điền ngày giờ'
                            },
                            name:{
                                required:'Vui lòng điện thông tin đầy đủ'
                            },
                            payment_receipt_type: {
                                required: 'Vui lòng chọn loại chi'
                            },
                            money: {
                                required: 'Giá trị phải lớn hơn 0'
                            }
                        },
                        submitHandler: function(form) {
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                }
                            });

                            $("#submit").attr("disabled", true);
                            if( $('#autoSearchChi').val()==''){
                                ( $('#autoSearchChi').attr("disabled", true));
                            }
                            if( $('#autoSearchNCCChi').val()==''){
                                ( $('#autoSearchNCCChi').attr("disabled", true));
                            }
                            if( $('#ChiNguoiNop').val()==''){
                                ( $('#ChiNguoiNop').attr("disabled", true));
                            }
                            if( $('#ChiTenNguoiNop').val()==''){
                                ( $('#ChiTenNguoiNop').attr("disabled", true));
                            }


                            $.ajax({
                                url: "{{ url('soquy') }}",
                                type: "POST",
                                data: $('#taoPhieuChi').serialize()+"&money="+replaceCurrency($('.giatriphieuchi').val()),
                                success: function(response) {
                                    $('#data-table1').DataTable().ajax.reload();
                                    $('#exampleModal1').modal('hide');
                                    $('#taoPhieuChi').trigger("reset");
                                    $('#submit').html('Lưu và thêm mới');
                                    $("#submit").attr("disabled", false);
                                    $("#submit").load(
                                        $.toast({
                                            text: "Thêm mới phiếu thu thành công",
                                            position: "bottom-right",
                                            icon: "success",
                                            stack: 1,
                                            loader: false
                                        }));
                                        resetTab();
                                }
                            });
                        }

                    })
                }
            });

//   Khách hàng

$(function(){
      let thongTinKhachHang = $("#thongTinKhachHang");
      if(thongTinKhachHang.length){
        thongTinKhachHang.validate({
          rules:{
            name:{
              required:true
            }
          },
          messages:{
            name:{
              required:'Vui lòng điền thông tin'
            }
          },
          submitHandler: function(form) {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $("#submit"). attr("disabled", true);
            $.ajax({
              url: "{{ url('khachhang/save') }}",
              type: "POST",
              data: $('#thongTinKhachHang').serialize(),
              success: function( response ) {
                document.getElementById("thongTinKhachHang").reset();
                $("#submit").attr("disabled", false);
                $("#submit").load(
                  $.toast({
                    text : "Thêm mới khách hàng thành công",
                    position: "bottom-right",
                    icon:"success",
                    stack:1,
                    loader:false
                  }));
                  resetTab();
              }
            });
          }
        })
      }
    })


    // Nhà cung cấp
    $(function() {
    let thongTinNhaCungCap = $("#thongTinNhaCungCap");
    if (thongTinNhaCungCap.length) {
        thongTinNhaCungCap.validate({
            rules: {
                name: {
                    required: true,
                    minlength: 6
                },
                tax_number: {
                    required: true,
                    number: true
                }
            },
            messages: {
                name: {
                    required: "Vui lòng bạn nhập tên nhà cung cấp.",
                    minlength: "vui lòng bạn nhập tên trên 5 kí tự"
                },
                tax_number: {
                    required: "Vui lòng bạn nhập mã thếu",
                    number: "Vui lòng bạn nhập số"
                }
            },
            submitHandler: function(form) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                            'content')
                    }
                });

                $("#submit").attr("disabled", true);

                $.ajax({
                    url: "{{ url('nhacungcap') }}",
                    type: "POST",
                    data: $('#thongTinNhaCungCap').serialize(),
                    success: function(response) {
                        $('#data-table1').DataTable().ajax.reload()
                        $("#submit").attr("disabled", false);
                        $("#submit").load(
                            $.toast({
                                text: "Thêm mới nhà cung cấp thành công",
                                position: "bottom-right",
                                icon: "success",
                                stack: 1,
                                loader: false
                            }));

                            resetTab();
                    }
                });
            }
        })
    }
})

            $(".loaiThu").change(function() {
                if ($(".loaiThu").val() == 'Khác') {
                    $('.tenLoaiThu').css('display', 'block');
                } else {
                    $('.tenLoaiThu').css('display', 'none');
                    $('.a').val($('.loaiThu').val());
                    console.log($('.loaiThu').val())
                }
            })

            $(".loaiThu").change(function() {
                if ($(".loaiThu").val() == 'Thu tiền khách hàng trả') {
                    $('.khachHangTra').css('display', 'block');
                    // $('.d').val($('.khachHangTra').val());
                    // console.log($('.khachHangTra').val());
                } else {
                    $('.khachHangTra').css('display', 'none');
                }
            })


            $(".loaiThu").change(function() {
                if ($(".loaiThu").val() == 'Thu tiền nhà cung cấp trả') {
                    $('.nhaCungCap').css('display', 'block');
                } else {
                    $('.nhaCungCap').css('display', 'none');
                }
            })

            $(".loaiThu").change(function() {
                if ($(".loaiThu").val() == 'Thu tiền nhân viên nộp') {
                    $('.tenNguoiNop').css('display', 'block');
                } else {
                    $('.tenNguoiNop').css('display', 'none');
                }
            })

            $(".loaiChi").change(function() {
                if ($(".loaiChi").val() == 'Chi tiền khách hàng trả') {
                    $('.ChikhachHangTra').css('display', 'block');
                } else {
                    $('.ChikhachHangTra').css('display', 'none');
                }
            })

            $(".loaiChi").change(function() {
                if ($(".loaiChi").val() == 'Chi tiền trả nhà cung cấp trả') {
                    $('.ChiNhaCungCap').css('display', 'block');
                } else {
                    $('.ChiNhaCungCap').css('display', 'none');
                }
            })

            $(".loaiChi").change(function() {
                if ($(".loaiChi").val() == 'Chi tiền trả nhân viên') {
                    $('.ChitenNguoiNop').css('display', 'block');
                } else {
                    $('.ChitenNguoiNop').css('display', 'none');
                }
            })
            $(".loaiChi").change(function() {
                if ($(".loaiChi").val() == 'Chi khác') {
                    $('.tenLoaiChi').css('display', 'block');


                } else {
                    $('.tenLoaiChi').css('display', 'none');
                    $('.b').val($('.loaiChi').val());
                    console.log($('.loaiChi').val());
                    console.log($('.b').val());
                }
            })

        })

        function resetTab(){
		$('#idSupplier').val("");
        $('#idCustomer').val("");
		$('#autoSearch').val("");
        $('#idCustomerChi').val("");
        $('#autoSearchChi').val("");
		$('#id').val("");
        $('#autoSearchNCC').val("");
        $('#idSupplierChi').val("");
        $('#autoSearchNCCChi').val("");
        $('#autoSearchNCCChi').removeAttr("style");
         $('#autoSearchNCC').removeAttr("style");
		$('#soQuy').trigger("reset");
        $('#taoPhieuChi').trigger("reset");
		$('#autoSearch').removeAttr("style");
		$("#buttonSupplier").removeClass("hidden");
		$("#buttonSupplierClose").addClass("hidden");
        $("#buttonCustomer").removeClass("hidden");
          $("#buttonCustomerClose").addClass("hidden");
          $('#autoSearchChi').removeAttr("style");
          $("#buttonCustomer").removeClass("hidden");
          $("#buttonCustomerCloseChi").addClass("hidden");
		$(".tab1").removeClass("hidden");
		$(".tab2").addClass("hidden");
        loadData();
	}


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
        k: 'C',
        v: 'CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM'
      }
      ]);
      var r4 = Addrow(4, [{
        k: 'C',
        v: 'Độc lập - Tự do - Hạnh phúc'
      }
      ]);
      var r5 = Addrow(5, [{
        k: 'C',
        v: '....., ngày.....tháng.....năm 20.....'
      }
      ]);
      var r6 = Addrow(6, [{
        k: 'C',
        v: 'CHI TIẾT SỔ QUỸ'
      }
      ]);

      sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3+ r4 + r5+ r6 + sheet.childNodes[0].childNodes[1].innerHTML;
    },
    exportOptions: {
      columns: [1, 2, 3, 4, 5, 6]
    },
  }

</script>
@endsection
