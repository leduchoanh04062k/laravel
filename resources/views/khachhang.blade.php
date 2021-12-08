@extends('default')
@section('title','Khách hàng')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
        <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Khách hàng</h4>
        <div class="d-flex" style="flex-wrap:wrap;">
            <div class="mg-r-10">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class='fas fa-plus' style='font-size:15px;'></i>
                    Thêm mới
                </button>

                <!-- Modal thêm mới khách hàng-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width:80%;">
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
                                            <a class="nav-link active" data-toggle="tab" href="#info">Thông tin khách
                                                hàng</a>
                                        </li>
                                    </ul>

                                    <!-- Tab panes -->
                                    <div class="tab-content">
                                        <div class="tab-pane active" id="info">
                                            <div class="row mg-t-10">
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Mã khách hàng</label>
                                                    <input type="text" class="form-control" id="" name="code"
                                                        placeholder="Mã tự động">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Tên khách hàng <samp
                                                            class="text-danger">*</samp></label>
                                                    <input type="text" class="form-control" name="name">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Nhóm khách hàng</label>
                                                    <select name="group_id" id="" class="form-control select2"
                                                        style="width:100%">
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
                                                        <input type="radio" id="" name="customer_type" value="canhan"
                                                            checked>
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
                                                    <textarea cols="30" rows="1" class="form-control" id=""
                                                        name="note"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary" id="submit"><em
                                            class="fa fa-save"></em> Lưu và thêm mới</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                            class="fa fa-close"></em> Đóng</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="mg-r-10">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1">
                    <i class='far fa-file-excel' style='font-size:15px'></i>
                    Thêm mới từ excel
                </button>
                <!-- Modal thêm mới từ excel-->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width:80%;vertical-align: top;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title tx-gray-800" id="exampleModalLabel">Nhập khách hàng từ file excel
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" id="importExcelForm" method="POST" enctype="multipart/form-data">
                                <div class="modal-body" style="padding-top:5px;padding-bottom:6px;">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold" style="cursor:none">File excel
                                                (Dung lượng không vượt quá 2mb)</label>
                                            <div class="form-control bg-light">
                                                <div class="row">
                                                    <div class="col-lg-4 text-center">
                                                        <label for="importExcelFile" id="hoverLabel"
                                                            class="form-control" style="width:100%;">Click để tải file
                                                            lên</label>
                                                        <input type="file" name="file" id="importExcelFile"
                                                            class="form-control"
                                                            accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" />
                                                    </div>
                                                    <div class="col-lg-8" id="statusUploadFile" style="display:none">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mg-t-20">
                                            <!-- Nav tabs -->
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-toggle="tab" href="#tab3">DS hợp lệ
                                                        <span class="badge rounded-pill bg-primary"
                                                            id="info-dataTableHopLe" style="font-size: 90%"></span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab" href="#tab4">
                                                        DS không hợp lệ <span class="badge rounded-pill bg-danger"
                                                            id="info-dataTableKhongHopLe" style="font-size: 90%"></span>
                                                    </a>
                                                </li>
                                            </ul>
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab3"><br>
                                                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                        id="dataTableHopLe" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Tên khách hàng</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Thông tin khách hàng</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Nhóm KH</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Loại KH</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Ghi chú</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Trạng thái</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Lỗi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane fade" id="tab4"><br>
                                                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                        id="dataTableKhongHopLe" style="width:100%">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Tên khách hàng</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Thông tin khách hàng</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Nhóm KH</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Loại KH</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Ghi chú</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Lỗi</th>
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
                                            <em class="iconImportBulb"></em> <span
                                                class="text-dark font-weight-bold">Tải file
                                                excel
                                                mẫu <a href="{{ url('./download/fileMauKhachHang.xlsx') }}">tại
                                                    đây</a></span>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="button" class="btn btn-primary mg-r-6" id="submitImport"><em
                                                    class="fa fa-save"></em> Lưu hàng hoá</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                    class="fa fa-close"></em> Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <a class="btn btn-info" href="#{{-- {{ 'khachhang/export' }} --}}"><i class='far fa-file-excel'
                        style='font-size:15px;padding:2px'></i> Xuất file excel</a>
            </div>
        </div>
    </div>

    <div>
        <!-- Modal chi tiết-->
        <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width:none;width:75%;vertical-align:top;">
                <div class="modal-content">
                    <div class="modal-header pd-b-5">
                        <h5 class="modal-title text-dark" id="modalDetailName"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="" id="suaKhachHang" name="suaKhachHang" method="post">
                        @csrf
                        <div class="modal-body pd-t-10">
                            <div class="row m-lg-auto"
                                style="background: #f0f0f0;border-color: #0d3d79;color: #010407;">
                                <div class="col-12 mt-2 mb-2">
                                    <span>Tổng bán: <strong></strong></span>-
                                    <span>Tổng Trả lại: <strong></strong></span>-
                                    <span>Nợ cần thu: <strong></strong></span>
                                </div>
                            </div>
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs mt-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#inf">Thông tin khách hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#history">Lịch sử giao dịch</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div id="inf" class="tab-pane active">
                                    <div class="row mg-t-10">
                                        <div class="col-md-3">
                                            <input type="hidden" name="id" class="id" value="">
                                            <label for="" class="tx-gray-800 tx-bold">Mã khách hàng</label>
                                            <input type="text" id="code" name="code" class="form-control"
                                                placeholder="Mã tự động" readonly="">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Tên khách hàng</label>
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Nhóm khách hàng</label>
                                            <select name="group_id" id="group_id" class="form-control select2"
                                                style="width:100%">
                                                @foreach (App\Models\CustomerGroup::all() as $groupid)
                                                <option value="{{ $groupid->id }}">
                                                    {{ $groupid->name }}
                                                </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Loại khách hàng</label>
                                            <div class="">
                                                <input type="radio" value="canhan" id="customer_type1"
                                                    name="customer_type">
                                                <label for="canhan" class="tx-gray-800 mg-r-10">Cá nhân</label>
                                                <input type="radio" value="congty" id="customer_type2"
                                                    name="customer_type">
                                                <label for="congty" class="tx-gray-800">Công ty</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">CMND</label>
                                            <input type="text" id="ID_code" name="ID_code" class="form-control">
                                        </div>
                                        <div class="col-md-1">
                                            <label for="" class="tx-gray-800 tx-bold">Tuổi</label>
                                            <input type="number" id="age" name="age" class="form-control">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="tx-gray-800 tx-bold">Loại</label>
                                            <div class="">
                                                <input type="radio" value="tuoi" id="age_type1" name="age_type">
                                                <label for="tuoi" class="tx-gray-800 mg-r-10">Tuổi</label>
                                                <input type="radio" value="thang" id="age_type2" name="age_type">
                                                <label for="thang" class="tx-gray-800">Tháng</label>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Ngày sinh</label>
                                            <input type="date" id="dob" name="dob" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Giới tính</label>
                                            <div class="">
                                                <input type="radio" value="nam" id="gender1" name="gender">
                                                <label for="nam" class="tx-gray-800 mg-r-10">Nam</label>
                                                <input type="radio" value="nu" id="gender2" name="gender">
                                                <label for="nu" class="tx-gray-800">Nữ</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Mã số thuế</label>
                                            <input type="text" id="tax_number" name="tax_number" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                            <input type="text" id="phone" name="phone" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Email</label>
                                            <input type="email" id="email" name="email" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Công ty</label>
                                            <input type="text" id="company" name="company" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                            <input type="text" id="address" name="address" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                            <textarea name="note" id="note" cols="30" rows="1"
                                                class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mg-t-20" style="text-align: end;">
                                        <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em>
                                            Lưu</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                class="fa fa-close"></em> Đóng</button>
                                    </div>
                                </div>
                                <div id="history" class="tab-pane fade">
                                    <div class="row mg-t-10">
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Từ ngày</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Tới ngày</label>
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
                                            <input type="text" class="form-control"
                                                placeholder="Tìm kiếm theo mã phiếu">
                                        </div>
                                        <div class="col-md-2 align-self-end" style="top:-3px">
                                            <button type="button" class="btn btn-info"><em class="fa fa-search"></em>Tìm
                                                kiếm</button>
                                        </div>
                                        <div class="mg-t-20 col-md-12">
                                            <table style="width:100%"
                                                class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                                                id="data-table-kh">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" id="thId" class="bg-primary"
                                                            style="color: white;">#</th>
                                                        <th scope="col" id="thMa" class="bg-primary"
                                                            style="color: white;">Mã đơn hàng</th>
                                                        <th scope="col" id="thNgay" class="bg-primary"
                                                            style="color: white;">Ngày giao dịch</th>
                                                        <th scope="col" id="thLoai" class="bg-primary"
                                                            style="color: white;">Loại phiếu</th>
                                                        <th scope="col" id="thThanh" class="bg-primary"
                                                            style="color: white;">Thanh toán</th>
                                                        <th scope="col" id="thNo" class="bg-primary"
                                                            style="color: white;">Dư nợ</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="mg-t-20" style="text-align: end;">
                                        <button class="btn btn-info"><em class="fa fa-file-excel-o"></em> Xuất file
                                            excel</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                class="fa fa-close"></em> Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


        <!-- Modal thanh toán -->
        <div class="modal fade" id="thanhToan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: none;width: 80%;vertical-align: top;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thanh toán</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="formThanhToan" method="POST">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="hidden" class="form-control" name="type" value="receipt">
                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="payment_receipt_type" value="Thu tiền khách hàng trả">
                                    <input type="hidden" name="id_customer" id="idCustomer">
                                    <input type="hidden" name="name" id="nameCustomer">
                                    <label for="" class="tx-gray-800 tx-bold">Ngày thanh toán</label>
                                    <input type="datetime-local" class="form-control fc-datepicker" name="date"
                                        value="<?php echo Date('Y-m-d\TH:i',time()) ?>" placeholder="MM/DD/YYYY">
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="tx-gray-800 tx-bold">Phương thức</label>
                                    <select name="" id="" class="form-control">
                                        <option value="">Tiền mặt</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="" class="tx-gray-800 tx-bold">Nợ hiện tại</label>
                                    <input type="text" class="form-control debt" id="detailmoney" readonly="">
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-8">
                                    <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                    <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                                </div>
                                <div class="col-md-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold">Thanh toán</label>
                                            <input type="text" class="form-control money" autocomplete="off" id="money"
                                                name="money">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold">Nợ sau</label>
                                            <input type="text" class="form-control" id="totaldebt" name="debt"
                                                readonly="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-12">
                                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Mã phiếu</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Ngày nhập</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Tổng tiền</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Đã thanh toán
                                                </th>
                                                <th scope="col" class="bg-primary" style="color: white;">Còn nợ</th>
                                                <th scope="col" class="bg-primary" style="color: white;">Thanh toán</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row" colspan="7">
                                                    <div class="row">
                                                        <div class="col-md-8"></div>
                                                        <div class="col-md-4 row">
                                                            <div class="col-md-8">Tổng tiền thanh toán:</div>
                                                            <div class="col-md-4" id="tongTienThanhToan">0.00</div>
                                                        </div>
                                                    </div>
                                                </th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="submit" class="btn btn-primary nutThanhToan"><em
                                        class="fa fa-save"></em> Tạo phiếu thu</button>
                                <button type="button" class="btn btn-primary nutThanhToan"><em
                                        class="fa fa-print"></em>Tạo phiếu thu và in</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                        class="fa fa-close"></em> Đóng</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div>
        <!-- Modal điều chỉnh công nợ-->
        <div class="modal fade" id="congNo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: none;vertical-align: top;width: 50em;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Điều chỉnh công nợ khách hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{ url('khachhang/{id}') }}" id="congNoKhachHang" name="congNoKhachHang" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <input type="hidden" name="id" class="id" value="">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="" class="tx-gray-800 tx-bold">Nợ hiện tại</label>
                                    <input type="text" class="form-control debt" readonly="">
                                </div>
                            </div>
                            <div class="row mg-t-10">
                                <div class="col-md-12">
                                    <label for="" class="tx-gray-800 tx-bold">Nợ thực tế</label>
                                    <input type="text" class="form-control" name="debt">
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary nutCongNo">Lưu</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                    </form>
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
                <select name="" id="searchByStatus" class="form-control">
                    <option value="Hoạt động">Hoạt động</option>
                    <option value="Ngừng h.động">Không hoạt động</option>
                </select>
            </div>
            <div class="col-md-4 col-lg-2">
                <label for="">Nhóm khách hàng</label>
                <select name="" id="" class="form-control">
                    <option value="0">Tất cả</option>
                    @foreach (App\Models\CustomerGroup::all() as $groupid)
                    <option value="{{ $groupid->id }}">
                        {{ $groupid->name }}
                        @endforeach
                </select>
            </div>
            <div class="col-md-5">
                <label for="">Từ khoá tìm kiếm</label>
                <input id="searchBySupplier" type="text" class="form-control"
                    placeholder="Tìm kiếm theo mã hoặc tên khách hàng">
            </div>
            <div class="col-md-2 align-self-end">
                <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"> <i class="fas fa-search"
                        style="padding: 3px"></i>Tìm kiếm</button>
            </div>
        </div>

        <div class="mg-t-20">
            <label for="" id="info-data-table1" class="tx-bold tx-gray-800"></label>
            <table id="data-table1" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                <thead>
                    <tr>
                        <th scope="col" class="bg-primary" style="color: white;width:4%">#</th>
                        <th scope="col" class="bg-primary" style="color: white;width:9%">Mã KH</th>
                        <th scope="col" class="bg-primary" style="color: white;width:10%">Tên khách hàng</th>
                        <th scope="col" class="bg-primary" style="color: white;width:10%">Tổng tiền bán</th>
                        <th scope="col" class="bg-primary" style="color: white;width:10%">Tổng tiền trả lại</th>
                        <th scope="col" class="bg-primary" style="color: white;width:10%">Nợ cần thu</th>
                        <th scope="col" class="bg-primary" style="color: white;width:10%">Ghi chú</th>
                        <th scope="col" class="bg-primary" style="color: white;width:11%">Trạng thái</th>
                        <th scope="col" class="bg-primary" style="color: white;width:12%"></th>
                    </tr>
                </thead>
            </table>
        </div>
    </div><!-- row -->
</div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<script type="text/javascript">
    function replaceCurrency(number){
    if(checkTypeOf(number)){
      return number = number.replace(/,/g,'');
    }else{
      return number;
    }
  }
  function checkTypeOf(value){
    if(typeof(value) === 'string'){
      return true;
    }else{
      return false;
    }
  }
  function total(a,b,c,d){
    a = replaceCurrency(a);
    b = replaceCurrency(b);
    c = replaceCurrency(c);
    d = replaceCurrency(d);
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
  function searchDateTable(){
    $.fn.dataTable.ext.search.push(
      function (settings, data, dataIndex){
        if ( settings.nTable.id !== 'data-table1' ) {
          return true;
        }
        var supplierName = $("#searchBySupplier").val().toLowerCase();
        return (
          (~data[1].toLowerCase().indexOf(supplierName)) ||
          (~data[2].toLowerCase().indexOf(supplierName))
          ) ? true : false;
      }
      );
    $('#data-table1').DataTable()
    .columns(7).search($("#searchByStatus").val())
    .draw();
  };
  function checkRangeValue(value){
    if(value<10){
      return "00000"+value
    }else if(value<100){
      return "0000"+value
    }else{
      return "000"+value
    }
  }
  function decialNumber(number){
    return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
  }
  $(document).ready( function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    var table1 = $('#data-table1').DataTable({
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
     ajax: {
      url: "{{ url('khachhang') }}",
    },
    columns: [
    { data: null ,orderable:false},
    { data: null,
      "render": function(data,type,row) { return "KH"+checkRangeValue(data["id"])}
    },
    { data: 'name', name: 'name' ,orderable:false},
    { data: null, orderable:false,
      "render": function(data,type,row) {
        if(data['price_imports']==null){
          return '0.00'
        }else{
          return decialNumber(data['price_imports']);
        }
      }
    },
    { data: null,orderable:false,
      "render": function(data,type,row) {
        if(data['prices']==null){
          return '0.00'
        }else{
          return decialNumber(total(data['qtys'],data['prices'],data['discounts'],data['VATs']));
        }
      }
    },
    { data: null,orderable:false,
      "render": function(data,type,row) {
        if(data['money']==null){
          return '0.00'
        }else{
          return "-"+decialNumber(data['money'])
        }
      }
    },
    { data: 'note', name: 'note' ,orderable:false},
    { data: 'status', name: 'status',orderable:false},
    { data: 'action', name: 'action',orderable:false},
    ],
  });
    $('#data-table1').DataTable().on('order.dt search.dt', function () {
     $('#data-table1').DataTable().column(0).nodes().each(function (cell, i) {
       cell.innerHTML = i + 1;
     });
   }).draw();
    searchDateTable()
  });
  function deleteFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('khachhang/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
          title: 'Bạn có chắc chắn muốn xoá khách hàng [ '+res.name+' ] không?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type:"DELETE",
              url: "{{ url('khachhang/{id}') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                $('#data-table1').DataTable().ajax.reload();
                $.toast({
                  text : "Xóa dữ liệu thành công",
                  position: "bottom-right",
                  icon:"success",
                  stack:1,
                  loader:false
                });
                var oTable = $('#data-table1').dataTable();
                oTable.fnDraw(false);
              }
            });
          } else {
            swal("Cancelled Successfully");
          }
        });
      }
    })
  }
  function changeFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('khachhang/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
          title: "Bạn chắc chắn muốn tạm dừng hoạt động khách hàng '"+res.name+"' không?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type:"POST",
              url: "{{ url('khachhang/active') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                $('#data-table1').DataTable().ajax.reload();
                $.toast({
                  text : "Tạm dừng hoạt động khách hàng",
                  position: "bottom-right",
                  icon:"success",
                  stack:1,
                  loader:false
                });
                var oTable = $('#data-table1').dataTable();
                oTable.fnDraw(false);
              }
            });
          } else {
            swal("Cancelled Successfully");
          }
        });
      }
    })
  }
  function unChangeFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('khachhang/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
          title: "Bạn chắc chắn muốn kích hoạt khách hàng '"+res.name+"' này không?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type:"POST",
              url: "{{ url('khachhang/unactive') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                $('#data-table1').DataTable().ajax.reload();
                $.toast({
                  text : "kích hoạt động khách hàng thành công",
                  position: "bottom-right",
                  icon:"success",
                  stack:1,
                  loader:false
                });
                var oTable = $('#data-table1').dataTable();
                oTable.fnDraw(false);
              }
            });
          } else {
            swal("Cancelled Successfully");
          }
        })
      }
    });
  }
  function editFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('khachhang/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#modalDetailName').empty();
        var info = '';
        info = "Khách hàng - KH0000"+res.id+" - "+res.name;
        $('#modalDetailName').append(info);
        if(res.customer_type == 'canhan'){
          document.getElementById("customer_type1").checked = true;
        }else{
          document.getElementById("customer_type2").checked = true;
        }
        if(res.age_type == 'tuoi'){
          document.getElementById("age_type1").checked = true;
        }else{
          document.getElementById("age_type2").checked = true;
        }
        if(res.gender == 'nam'){
          document.getElementById("gender1").checked = true;
        }else{
          document.getElementById("gender2").checked = true;
        }
        $('#code').val("KH"+checkRangeValue(res.id));
        $('.id').val(res.id);
        $('#name').val(res.name);
        $('#group_id').val(res.group_id);
        $('#ID_code').val(res.ID_code);
        $('#age').val(res.age);
        $('#dob').val(res.dob);
        $('#tax_number').val(res.tax_number);
        $('#phone').val(res.phone);
        $('#email').val(res.email);
        $('#company').val(res.company);
        $('#address').val(res.address);
        $('#note').val(res.note);
        $.ajax({
          type:"GET",
          url:"{{ url('khachhang/detailKhachHang') }}",
          data: { id: id },
          dataType:'json',
          success: function(response){
            console.log(response);
            var table5 = $('#data-table-kh').DataTable({
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
              aaData: response,
              columns: [
              { data: 'id', name: 'id'},
              { data: null,
                'render':function(data,type,row){
                  if (data['customer_id']!=null) {
                    return 'PKT'+checkRangeValue(data['cusId']);
                  }else if (data['sell_id']!=null) {
                    return 'HD'+checkRangeValue(data['sellId']);
                  }else if (data['id_customer']!=null) {
                    return 'PT'+checkRangeValue(data['payId']);
                  }else if (data['id_customer_chi']!=null) {
                    return 'PC'+checkRangeValue(data['payId']);
                  }else{
                    return 'lỗi';
                  }
                }
              },
              { data:'created_at', name: 'date' },
              { data: null,
                'render':function(data,type,row){
                  if (data['customer_id']!=null) {
                    return 'Phiếu khách hàng trả lại';
                  }else if (data['sell_id']!=null) {
                    return 'Phiếu hóa đơn';
                  }else if (data['id_customer']!=null) {
                    return 'Phiếu thu';
                  }else if (data['id_customer_chi']!=null) {
                    return 'Phiếu chi';
                  }else{
                    return 'lỗi';
                  }
                }
              },
              { data: null,
                'render':function(data,type,row){
                  if (data['type']=='return_from_customer' || data['type']=='sell') {
                    return decialNumber(total(data["qty"],data["price"],data["discount"],data["VAT"])-data["paid"])
                  }else if (data['id_customer_chi']!=null || data['id_customer']!=null) {
                    return data['money'];
                  }else{
                    return 'lỗi';
                  }
                }
              },
              { data: null,
                'render':function(data,type,row){
                  if (data['type']=='return_from_customer' || data['type']=='sell') {
                   return decialNumber(total(data["qty"],data["price"],data["discount"],data["VAT"]))
                 }else if (data['id_customer_chi']!=null || data['id_customer']!=null) {
                  return data['money'];
                }else{
                  return 'lỗi';
                }
              }
            }
            ]
          });
            table5.on('order.dt search.dt', function () {
              table5.column(0).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
              });
            }).draw();
            $('#data-table-kh_length select').select2({
              minimumResultsForSearch: -1
            });
            $('#data-table-kh_paginate').after($('#data-table-kh_length'));
          }
        })
}
});
}


$('#suaKhachHang').submit(function(e) {
  e.preventDefault();
  var formData = new FormData(this);
  $.ajax({
    type:'POST',
    url: "{{ url('khachhang')}}",
    data: formData,
    cache:false,
    contentType: false,
    processData: false,
    success: (data) => {
      $("#chiTiet").modal('hide');
      $('#data-table1').DataTable().ajax.reload();
      $("#chiTiet").load(
        $.toast({
          text : "Lưu dữ liệu thành công",
          position: "bottom-right",
          icon:"success",
          stack:1,
          loader:false
        }));
      var oTable = $('#data-table1').dataTable();
      oTable.fnDraw(false);
    },
    error: function(data){
      console.log(data);
    }
  });
});




$(function(){
    let congNoKhachHang = $("#congNoKhachHang");
    if(congNoKhachHang.length){
        congNoKhachHang.validate({
            rules:{
                debt:{
                    required:true,
                    number:true
                }
            },
            messages:{
                debt:{
                    required:"Vui lòng nhập nợ thực tế.",
                    number:"Vui lòng nhập số!"
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
                    url: "{{ url('khachhang/{id}') }}",
                    type: "POST",
                    data: $('#congNoKhachHang').serialize(),
                    success: function( response ) {
                        $('#data-table1').DataTable().ajax.reload();
                        $("#submit").attr("disabled", false);
                        $("#submit").load(
                            $.toast({
                                text : "Thêm mới khách hàng thành công",
                                position: "bottom-right",
                                icon:"success",
                                stack:1,
                                loader:false
                            }));
                        document.getElementById("congNoKhachHang").reset();
                        $("#congNo").modal('hide');
                        var oTable = $('#data-table1').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        })
    }
})
$(function(){
    let formThanhToan = $("#formThanhToan");
    if(formThanhToan.length){
        formThanhToan.validate({
            rules:{
                payment:{
                    required:true,
                    number:true
                }
            },
            messages:{
                payment:{
                    required:"Vui lòng nhập thanh toán",
                    number:"Vui lòng nhập số!"
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
                    url: "{{ url('soquy') }}",
                    type: "POST",
                    data: $('#formThanhToan').serialize()+"&id_customer="+$('#idCustomer').val()+"&name="+$('#nameCustomer').val()+"&money="+replaceCurrency($('input[name=money]').val()),
                    success: function( response ) {
                        $('#data-table1').DataTable().ajax.reload();
                        $("#submit").attr("disabled", false);
                        $("#submit").load(
                            $.toast({
                                text : "Thêm mới khách hàng thành công",
                                position: "bottom-right",
                                icon:"success",
                                stack:1,
                                loader:false
                            }));
                        document.getElementById("formThanhToan").reset();
                        $("#thanhToan").modal('hide');
                        var oTable = $('#data-table1').dataTable();
                        oTable.fnDraw(false);
                    }
                });
            }
        })
    }
})

function editFuncdebt(id) {
    $.ajax({
          type:"GET",
          url: "{{ url('khachhang/{id}/edit') }}",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            $('#idCustomer').val(res.id);
            $('#nameCustomer').val(res.name);
            console.log(res);
          }
        });
      }
</script>
<script>
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
        new AutoNumeric.multiple(['input[name=money]'],{
            minimumValue: 0,
            modifyValueOnWheel: false,
            unformatOnHover: false
        });
    var debt=$(".debt");

    $("#money").change(function(){
      var totaldebt=isNaN(parseInt(debt.val()- replaceCurrency($("#money").val()))) ? 0 :(debt.val()- replaceCurrency($("#money").val()))
      console.log(totaldebt)
      $("#totaldebt").val(decialNumber(totaldebt+'.00'));
    });

    $('.fc-datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });
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
                $('#data-table1').DataTable().ajax.reload();
                $("#submit").attr("disabled", false);
                $("#submit").load(
                  $.toast({
                    text : "Thêm mới khách hàng thành công",
                    position: "bottom-right",
                    icon:"success",
                    stack:1,
                    loader:false
                  }));
                document.getElementById("thongTinKhachHang").reset();
              }
            });
          }
        })
      }
    })
    $(function(){
      let suaKhachHang = $("#suaKhachHang");
      if(suaKhachHang.length){
        suaKhachHang.validate({
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
        })
      }
    })

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
                url: "{{ url('khachhang/import') }}",
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
                            'gender': dataImportArr[i][3],
                            'dob': dataImportArr[i][2],
                            'address': dataImportArr[i][4],
                            'phone': dataImportArr[i][5],
                            'email': dataImportArr[i][6],
                            'company': dataImportArr[i][7],
                            'tax_number': dataImportArr[i][8],
                            'note': dataImportArr[i][9],
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
                        if(item.errors || !item.name){
                            dataNotOk.push(item);
                        }else{
                            dataOk.push(item);
                        }
                    });
                    let divUpload = `<span style="color:#3ea44e">
                                    <em class="fa fa-check"></em> Tải file lên thành công
                                    <strong>${filename}.</strong></span><p style="margin:0px;padding-top:3px;color:#337ab7">Có <strong>${dataNotOk.length}</strong> khách hàng không hợp lệ. Vui lòng kiểm tra lại</p>`;
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
                                if(data['errors']||data['dob']==null||data['address']==null||data['phone']==null||data['email']==null||data['company']==null||data['tax_number']==null){
                                    return "<span>Mã khách hàng: </span>"+'KH'+checkRangeValue(data["id"])+
                                    '</br><strong>Giới tính :</strong>'+''+
                                    '</br><strong>Ngày sinh:</strong>'+''+
                                    '</br><strong>Địa chỉ :</strong>'+''+
                                    '</br><strong>Số điện thoại  :</strong>'+''+
                                    '</br><strong>Email  :</strong>'+''+
                                    '</br><strong>Công ty  :</strong>'+''+
                                    '</br><strong>Mã số thuế :</strong>'+''+
                                    '</span>';
                                }else if(data['errors']||data['dob']==null||data['address']==null||data['phone']==null||data['email']==null||data['company']==null||data['tax_number']==null){
                                 return "<span>Mã khách hàng: </span>"+'KH'+checkRangeValue(data["id"])+
                                '</br><strong>Giới tính :</strong>'+(data['gender'])+
                                '</br><strong>Ngày sinh:</strong>'+(data['dob'])+
                                '</br><strong>Địa chỉ :</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại  :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</br><strong>Công ty  :</strong>'+(data['company'])+
                                '</br><strong>Mã số thuế :</strong>'+(data['tax_number'])+
                                '</span>';
                                }else if(data['name']){
                                    return "<span>Mã khách hàng: </span>"+'KH'+checkRangeValue(data["id"])+
                                '</br><strong>Giới tính :</strong>'+(data['gender'])+
                                '</br><strong>Ngày sinh:</strong>'+(data['dob'])+
                                '</br><strong>Địa chỉ :</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại  :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</br><strong>Công ty  :</strong>'+(data['company'])+
                                '</br><strong>Mã số thuế :</strong>'+(data['tax_number'])+
                                '</span>';
                                }else{
                                    return 'Lỗi'
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['group_id'] == null){
                            return ''
                        }else{
                            return  data['group_id'];
                        }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['customer_type'] != null){
                                return  data['customer_type'];
                        }else{
                            return '';
                        }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['note'] == null){
                            return ''
                        }else{
                            return  data['note'];
                        }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                return "<span style='background-color:#f1c40f;color:white;height:15px;padding:5px;border-radius:5px'>Chờ xử lý</span>"
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            return  '';
                        }
                        },
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
                                if(data['errors']){
                                    return '<span class="font-weight-bold">'+data['name']+'</span>';
                                }else if(data['name']){
                                    return "<span class='font-weight-bold'>"+data['name']+"</span>";
                                }else{
                                    return "<span class='text-danger'>Tên hàng hoá là bắt buộc</span>";
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(data['errors']||data['dob']==null||data['address']==null||data['phone']==null||data['email']==null||data['company']==null||data['tax_number']==null){
                                    return "<span>Mã khách hàng: </span>"+'KH'+checkRangeValue(data["id"])+
                                    '</br><strong>Giới tính :</strong>'+''+
                                    '</br><strong>Ngày sinh:</strong>'+''+
                                    '</br><strong>Địa chỉ :</strong>'+''+
                                    '</br><strong>Số điện thoại  :</strong>'+''+
                                    '</br><strong>Email  :</strong>'+''+
                                    '</br><strong>Công ty  :</strong>'+''+
                                    '</br><strong>Mã số thuế :</strong>'+''+
                                    '</span>';
                                }else if(data['errors']||data['dob']==null||data['address']==null||data['phone']==null||data['email']==null||data['company']==null||data['tax_number']==null){
                                 return "<span>Mã khách hàng: </span>"+'KH'+checkRangeValue(data["id"])+
                                '</br><strong>Giới tính :</strong>'+(data['gender'])+
                                '</br><strong>Ngày sinh:</strong>'+(data['dob'])+
                                '</br><strong>Địa chỉ :</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại  :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</br><strong>Công ty  :</strong>'+(data['company'])+
                                '</br><strong>Mã số thuế :</strong>'+(data['tax_number'])+
                                '</span>';
                                }else if(data['name']){
                                    return "<span>Mã khách hàng: </span>"+'KH'+checkRangeValue(data["id"])+
                                '</br><strong>Giới tính :</strong>'+(data['gender'])+
                                '</br><strong>Ngày sinh:</strong>'+(data['dob'])+
                                '</br><strong>Địa chỉ :</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại  :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</br><strong>Công ty  :</strong>'+(data['company'])+
                                '</br><strong>Mã số thuế :</strong>'+(data['tax_number'])+
                                '</span>';
                                }else{
                                    return 'Lỗi'
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['group_id'] == null){
                            return ''
                        }else{
                            return  data['group_id'];
                        }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['customer_type'] != null){
                                return  data['customer_type'];
                        }else{
                            return '';
                        }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            if(data['note'] == null){
                            return ''
                        }else{
                            return  data['note'];
                        }
                            }
                        },
                         { data: null,
                            "render": function(data,type,row){
                                if(data['name'] == null){
                                return '';
                            }else{
                                return "<span class='text-danger' style='font-size:15px'>"+data['errors']+"</span>";
                              }
                                }
                        },
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
                            toastr.info('Danh sách khách hàng hợp lệ là 0 xin vui lòng kiểm tra lại');
                        }else{
                        $.ajax({
                            type: 'POST',
                            url: '{{ url('khachhang/insertDataExcel') }}',
                            data: JSON.stringify(dataOk),
                            dataType:'json',
                            contentType: 'json',
                            contentType: 'application/json; charset=utf-8',
                            success: function(success){
                                dataOk = [];
                                $('#data-table1').DataTable().ajax.reload();
                                $('#exampleModal1').modal('hide');
                                toastr.success('Thêm mới hàng hoá thành công');
                                console.log(success);
                        }
                    });
                }
            });


    $('#exampleModal1').on('shown.bs.modal', function () {
        $('#importExcelForm').trigger("reset");
        $('#statusUploadFile').empty();
        datatableHopLeImport();
        datatableKhongHopLeImport();
    });
    })

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
    });
</script>
<style>
    #thId {
        width: 8% !important;
    }

    #thMa {
        width: 16% !important;
    }

    #thNgay {
        width: 20% !important;
    }

    #thLoai {
        width: 20% !important;
    }

    #thThanh {
        width: 18% !important;
    }

    #thNo {
        width: 18% !important;
    }

    #data-table-kh_length {
        margin-left: 10px;
    }
</style>
@endsection

