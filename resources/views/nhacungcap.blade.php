@extends('default')
@section('title', 'Nhà cung cấp')
@section('content')
<!-- ########## END: RIGHT PANEL ########## --->

<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
        <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Nhà cung cấp</h4>
        <div class="d-flex" style="flex-wrap:wrap;">
            <div class="mg-r-10">
                <!-- Button thêm mới -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class='fas fa-plus' style='font-size:15px;'></i>
                    Thêm mới
                </button>

                <!-- Modal thêm mới-->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width:80%;">
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
                                                    <select name="group_id" id="group_id" class="form-control select2"
                                                        style="width:100%">
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
                                    <button type="submit" class="btn btn-primary" id="submit"><em
                                            class="fa fa-save"></em> Lưu và thêm mới</button>
                                    <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu và
                                        đóng</button>
                                    <button type="submit" class="btn btn-danger" data-dismiss="modal"><em
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
                    <i class='far fa-file-excel' style='font-size:15px;padding:2px'></i>
                    Thêm mới từ excel
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width:80%;vertical-align: top;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Nhập nhà cung cấp từ file
                                    excel</h5>
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
                                                                    style="color: white;">Tên nhà cung cấp</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Thông tin nhà cung cấp</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Nhóm NCC</th>
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
                                                                    style="color: white;">Tên nhà cung cấp</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Thông tin nhà cung cấp</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Nhóm NCC</th>
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
                                                mẫu <a href="{{ url('./download/fileMauNhaCungCap.xlsx') }}">tại
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

                <!-- Modal chi tiết-->
                <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: none;width: 80%;vertical-align: top;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalDetailName"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="#" id="suaNhaCungCap" name="suaNhaCungCap" method="POST">
                                @csrf
                                <div class="modal-body">
                                    <div class="shadow-base pd-10 mg-b-10">
                                        <span class="tx-20">Tổng mua:</span>
                                        <strong class="tx-bold tx-20">0.00</strong>
                                        <span class="tx-20">Tổng trả lại:</span>
                                        <strong class="tx-bold tx-20">0.00</strong>
                                        <span class="tx-20">Tổng nợ cần trả:</span>
                                        <strong class="tx-bold tx-20">0.00</strong>
                                    </div>
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#inf">Thông tin nhà cung
                                                cấp</a>
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
                                                    <input type="hidden" name="id" id="id">
                                                    <label for="" class="tx-gray-800 tx-bold">Mã nhà cung cấp</label>
                                                    <input type="text" name="supplier_id" id="supplier_id"
                                                        class="form-control" placeholder="Mã tự động">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="" class="tx-gray-800 tx-bold">Tên nhà cung cấp <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="name" id="name" class="form-control">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Mã số thuế <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="tax_number" id="tax_number"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="row mg-t-10">
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Nhóm nhà cung cấp</label>
                                                    <select name="group_id" id="group_id" class="form-control select2"
                                                        style="width:100%">
                                                        @foreach (App\Models\SupplierGroup::all() as $groupid)
                                                        <option value="{{ $groupid->id }}">
                                                            {{ $groupid->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Email</label>
                                                    <input type="text" class="form-control" id="email" name="email">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                                    <input type="text" class="form-control" name="phone">
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="" class="tx-gray-800 tx-bold">Website</label>
                                                    <input type="text" class="form-control" id="website" name="website">
                                                </div>
                                            </div>
                                            <div class="row mg-t-10">
                                                <div class="col-md-12">
                                                    <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                                    <input type="text" class="form-control" name="address" id="address">
                                                </div>
                                            </div>
                                            <div class="row mg-t-10">
                                                <div class="col-md-12">
                                                    <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                                    <textarea cols="30" rows="5" class="form-control" name="note"
                                                        id="note"></textarea>
                                                </div>
                                            </div>
                                            <div class="mg-t-10 " style="text-align: end;">
                                                <button type="submit" class="btn btn-primary"><em
                                                        class="fa fa-save"></em> Lưu</button>
                                                <button type="submit" class="btn btn-danger" data-dismiss="modal"><em
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
                                                <div class="col-md-2 align-self-end">
                                                    <button class="btn btn-info">
                                                        <i class="fas fa-search" style="padding: 3px"></i>
                                                        Tìm kiếm
                                                    </button>
                                                </div>
                                                <div class="mg-t-20 col-md-12">
                                                    <table id="data-table4" style="width:100%"
                                                        class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" class="bg-primary" id="thID"
                                                                    style="color: white;">#</th>
                                                                <th scope="col" class="bg-primary" id="thMa"
                                                                    style="color: white;">Mã phiếu</th>
                                                                <th scope="col" class="bg-primary" id="thLoai"
                                                                    style="color: white;">Ngày thời gian</th>
                                                                <th scope="col" class="bg-primary" id="thNgay"
                                                                    style="color: white;">Loại phiếu</th>
                                                                <th scope="col" class="bg-primary" id="thDoi"
                                                                    style="color: white;">Giá trị</th>
                                                                <th scope="col" class="bg-primary" id="thChech"
                                                                    style="color: white;">Dư nợ</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="mg-t-10" style="text-align: end;">
                                                <button class="btn btn-info"><em class="fa fa-file-excel-o"></em> Xuất
                                                    file excel</button>
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

                <!-- Modal điều chỉnh công nợ-->
                <div class="modal fade" id="congNo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: none;vertical-align: top;width: 50em;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-dark" id="exampleModalLabel">Điều chỉnh công nợ khách hàng
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ url('nhacungcap/{id}') }}" id="congNoNhaCungCap" name="congNoNhaCungCap"
                                method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="modal-body">
                                    <div class="row">
                                        <input type="hidden" name="id" class="id" value="">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold">Nợ hiện tại</label>
                                            <input type="text" class="form-control debt" readonly="">
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold">Nợ thực tế</label>
                                            <input type="text" class="form-control congno" name="debt"
                                                placeholder="0.00">
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" id="submit" class="btn btn-primary nutCongNo"><em
                                            class="fa fa-save"></em> Lưu</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                            class="fa fa-close"></em> Đóng</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-info" id="exportExcelDB">
                    <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
                </button>
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
                <div class="col-md-5">
                    <label for="">Từ khoá tìm kiếm</label>
                    <input id="searchBySupplier" type="text" class="form-control"
                        placeholder="Tìm kiếm theo mã hoặc tên nhà cung cấp">
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
                            <th scope="col" class="bg-primary" style="color: white;width:9%">Mã NCC</th>
                            <th scope="col" class="bg-primary" style="color: white;width:14%">Tên nhà cung cấp</th>
                            <th scope="col" class="bg-primary" style="color: white;width:13%">Tổng tiền mua</th>
                            <th scope="col" class="bg-primary" style="color: white;width:13%">Tổng tiền trả lại</th>
                            <th scope="col" class="bg-primary" style="color: white;width:13%">Nợ cần trả</th>
                            <th scope="col" class="bg-primary" style="color: white;width:11%">Ghi chú</th>
                            <th scope="col" class="bg-primary" style="color: white;width:10%">Trạng thái</th>
                            <th scope="col" class="bg-primary" style="color: white;width:12%"></th>
                        </tr>
                    </thead>
                    <tbody id="searchData"></tbody>
                </table>
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
                                    <input type="hidden" class="form-control" name="type" value="payment">
                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="payment_receipt_type"
                                        value="Chi tiền trả nhà cung cấp trả">
                                    <input type="hidden" name="id_supplier_chi" id="idSupplier">
                                    <input type="hidden" name="name" id="nameSupplier">
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Ngày thanh toán</label>
                                        <input type="datetime-local" class="form-control fc-datepicker" name="date"
                                            value="<?php echo Date('Y-m-d\TH:i',time()) ?>" placeholder="MM/DD/YYYY">
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Phương thức</label>
                                        <select name="" id="" class="form-control" style="width:100%">
                                            <option value="">Tiền mặt</option>
                                        </select>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="" class="tx-gray-800 tx-bold">Nợ hiện tại</label>
                                        <input type="number" class="form-control debt" readonly="">
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
                                                <input type="text" class="form-control money" autocomplete="off"
                                                    id="money" name="money">
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
                                                    <th scope="col" class="bg-primary" style="color: white;">Mã phiếu
                                                    </th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Ngày nhập
                                                    </th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Tổng tiền
                                                    </th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Đã thanh
                                                        toán
                                                    </th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Còn nợ</th>
                                                    <th scope="col" class="bg-primary" style="color: white;">Thanh toán
                                                    </th>
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
                                            class="fa fa-save"></em> Tạo phiếu chi</button>
                                    <button type="button" class="btn btn-primary nutThanhToan"><em
                                            class="fa fa-print"></em>Tạo phiếu chi và in</button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                            class="fa fa-close"></em> Đóng</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>


        </div><!-- row -->
    </div><!-- br-pagebody -->
</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<script>
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

            function decialNumber(number){
		return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
	}
    $(document).ready(function() {
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
                url: "{{ url('nhacungcap') }}",
                data: function(d) {
                    d.search = $('input[type="search"]').val()
                }
            },
            columns: [
            { data: 'id', name: 'id',orderable:false,},
            { data: null,
            "render": function(data,type,row) { return "NCC"+checkRangeValue(data["id"])}
            },
            {
                data: 'name',orderable:false,
                name: 'name',
            },
            { data: null,
                    'render':function(data,type,row){
                        if (data['type']=='import_from_supplier') {
                            return decialNumber(total(data["qty"],data["price"],data["discount"],data["VAT"]))

                        }else{
                        return '0.00';
                        }
                    }
                    },
                    { data: null,
                    'render':function(data,type,row){
                            return decialNumber(data['pay_supplier'])
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
            {
                data: 'note',
                name: 'note',
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'action',
                name: 'action'
            },
            ],
      dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, {
                extend: 'excelHtml5',
                title: 'DanhNhaCungCap_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
                exportOptions: {
                    columns: [1, 2, 3,4,5,6]
                    },
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table1"]').appendTo('#exportExcelDB');
        });
        $('#data-table1').DataTable().on('order.dt search.dt', function () {
     $('#data-table1').DataTable().column(0).nodes().each(function (cell, i) {
       cell.innerHTML = i + 1;
     });
   }).draw();
    searchDateTable();

    function deleteFunc(id) {
        $.ajax({
      type:"GET",
      url: "{{ url('nhacungcap/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
            title: "Bạn chắc chắn muốn xóa nhà cung cấp["+res.name+"] này không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('nhacungcap/{id}') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $("#data-table1").load(
                            $.toast({
                                text: "Xóa thành công nhà cung cấp",
                                position: "bottom-right",
                                icon: "success",
                                stack: 1,
                                loader: false
                            }));
                            $('#data-table1').DataTable().ajax.reload();
                    }
                });
            } else {
                swal("Cancelled Successfully");
                return false;
            }
        })
      }
        });
    }

    function changeFunc(id) {
     $.ajax({
      type:"GET",
      url: "{{ url('nhacungcap/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
            title: "Bạn chắc chắn muốn ngừng hoạt động nhà cung cấp ["+res.name+"] không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('nhacungcap/active') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $("#data-table1").load(
                            $.toast({
                                text: "Tạm dừng hoạt động nhập nhà cung cấp",
                                position: "bottom-right",
                                icon: "success",
                                stack: 1,
                                loader: false
                            }));
                            $('#data-table1').DataTable().ajax.reload();
                    }
                });
            } else {
                swal("Cancelled Successfully");
                return false;
            }
        })
      }
        });
    }


    function changeFuncsua(id) {
        $.ajax({
        type:"GET",
        url: "{{ url('nhacungcap/{id}/edit') }}",
        data: { id: id },
        dataType: 'json',
        success: function(res){
        Swal.fire({
            title: "Bạn chắc chắn muốn hoạt động nhà cung cấp['"+res.name+"'] này không?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Đồng ý!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: "POST",
                    url: "{{ url('nhacungcap/active1') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        $("#data-table1").load(
                            $.toast({
                                text: "Tạm dừng hoạt động nhập nhà cung cấp",
                                position: "bottom-right",
                                icon: "success",
                                stack: 1,
                                loader: false
                            }));
                            $('#data-table1').DataTable().ajax.reload();
                    }
                });
            } else {
                swal("Cancelled Successfully");
                return false;
            }
        })
        }
        });
    }


    function editFunc(id) {
        $.ajax({
            type: "GET",
            url: "{{ url('nhacungcap/{id}/edit') }}",
            data: {
                id: id
            },
            dataType: 'json',
            success: function(res) {
                $('#modalDetailName').empty();
                var info = '';
                info = "Nhà cung cấp - NCC0000"+res.id+" - "+res.name;
                $('#modalDetailName').append(info);
                $('#id').val(res.id);
                $('#supplier_id').val(res.supplier_id);
                $('#name').val(res.name);
                $('#tax_number').val(res.tax_number);
                $('#group_id').val(res.group_id);
                $('#email').val(res.email);
                $('#phone').val(res.phone);
                $('#website').val(res.website);
                $('#address').val(res.address);
                $('#note').val(res.note);
                $.ajax({
                type:"GET",
                url: "{{ url('nhacungcap/detailNhaCungCap') }}",
                data: { id: id },
                dataType: 'json',
                success: function(response){
                    var table4 = $('#data-table4').DataTable({
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
                        if (data['supplier_id']!=null) {
                        return 'PN'+checkRangeValue(data['cusId']);
                        }else if (data['return_supplier_id']!=null) {
                        return 'PX'+checkRangeValue(data['sellId']);
                        }else if (data['id_supplier']!=null) {
                        return 'PTP'+checkRangeValue(data['payId']);
                        }else if (data['id_supplier_chi']!=null) {
                        return 'PCPN'+checkRangeValue(data['payId']);
                        }else{
                        return 'lỗi';
                        }
                    }
                    },
                    { data: 'created_at', name: 'created_at'},
                    { data: null,
                    'render':function(data,type,row){
                        if (data['supplier_id']!=null) {
                        return '<label class="font-weight-bold tx-gray-700" style="color:blue">Phiếu nhập từ nhà cung cấp</label>';
                        }else if (data['return_supplier_id']!=null) {
                        return '<label class="font-weight-bold tx-gray-700" style="color:blue">Phiếu xuất trả nhà cung cấp</label>';
                        }else if (data['id_supplier']!=null) {
                        return '<label class="font-weight-bold tx-gray-700" style="color:blue">Phiếu thu nhà cung cấp</label>';
                        }else if (data['id_supplier_chi']!=null) {
                            return '<label class="font-weight-bold tx-gray-700" style="color:blue">Phiếu chi nhà cung cấp</label>';
                        }else{
                        return 'lỗi';
                        }
                    }
                    },
                    { data: null,
                    'render':function(data,type,row){
                        if (data['type']=='import_from_supplier') {
                            return decialNumber(total(data["qty"],data["price"],data["discount"],data["VAT"]))

                        }else if (data['type']=='return_from_supplier') {
                            return "-" +decialNumber(total(data["qty"],data["price"],data["discount"],data["VAT"]))
                        }else if (data['id_supplier_chi']!=null || data['id_supplier']!=null) {
                        return data['money'];
                        }else{
                        return 'lỗi';
                        }
                    }
                    },
                    { data: null,
                    'render':function(data,type,row){
                        if (data['type']=='import_from_supplier') {
                            return decialNumber(total(data["qty"],data["price"],data["discount"],data["VAT"]))

                        }else if (data['type']=='return_from_supplier') {
                            return "-" +decialNumber(total(data["qty"],data["price"],data["discount"],data["VAT"]))
                        }else if (data['id_supplier_chi']!=null || data['id_supplier']!=null) {
                        return data['money'];
                        }else{
                        return 'lỗi';
                        }
                    }
                    },
                    ],
                //     "columnDefs": [
                // {
                //     "targets": 3,
                //     "data": "id",
                //     "render": function ( data, type, row, meta ) {
                //     if(data=="import_from_supplier"){
                //         return '<label class="font-weight-bold tx-gray-700" style="color:blue">Phiếu nhập từ nhà cung cấp</label>';
                //     }else if(data =="import_inventory"){
                //         return '<label class="font-weight-bold tx-gray-700" style="color:blue">Phiếu nhập tồn</label>';
                //     }else{
                //         return 'lôi';
                //     }
                //     }
                // }
                // ]

                    });
                    table4.on('order.dt search.dt', function () {
                    table4.column(0).nodes().each(function (cell, i) {
                        cell.innerHTML = i + 1;
                    });
                }).draw();
                $('#data-table4_length select').select2({
          minimumResultsForSearch: -1
        });
        $('#data-table4_paginate').after($('#data-table4_length'));
                }
                });
            }
        });
    }


    $('#suaNhaCungCap').submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: "{{ url('nhacungcap') }}",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: (data) => {
                $("#chiTiet").modal('hide');
                $("#chiTiet").load(
                    $.toast({
                        text: "Lưu dữ liệu thành công",
                        position: "bottom-right",
                        icon: "success",
                        stack: 1,
                        loader: false
                    }));
                    $('#data-table1').DataTable().ajax.reload();
            },
            error: function(data) {
                console.log(data);
            }
        });
    });


$(function(){
    let congNoNhaCungCap = $("#congNoNhaCungCap");
    if(congNoNhaCungCap.length){
        congNoNhaCungCap.validate({
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
                    url: "{{ url('nhacungcap/{id}') }}",
                    type: "POST",
                    data: $('#congNoNhaCungCap').serialize(),
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
                        document.getElementById("congNoNhaCungCap").reset();
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
                    data: $('#formThanhToan').serialize()+"&id_supplier_chi="+$('#idSupplier').val()+"&name="+$('#nameSupplier').val()+"&money="+replaceCurrency($('input[name=money]').val()),
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
          url: "{{ url('nhacungcap/{id}/edit') }}",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            $('#idSupplier').val(res.id);
            $('#nameSupplier').val(res.name);
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
    // Datepicker
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
                        $('#data-table1').DataTable().ajax.reload();
                        $("#submit").attr("disabled", false);
                        $("#submit").load(
                            $.toast({
                                text: "Thêm mới nhà cung cấp thành công",
                                position: "bottom-right",
                                icon: "success",
                                stack: 1,
                                loader: false
                            }));
                        document.getElementById("thongTinNhaCungCap").reset();
                    }
                });
            }
        })
    }
})

$('#datepickerNoOfMonths').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    numberOfMonths: 2
});

$("#xuatTra").click(function() {
    $("#tab1").addClass("hidden");
    $("#tab2").removeClass("hidden");
})
$("#thoatXuatHuy2").click(function() {
    $("#tab1").removeClass("hidden");
    $("#tab2").addClass("hidden");
})



$('.fc-datepicker').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true
});
var table = $('#dsDuLieu').DataTable({
    lengthChange: false,
    buttons: ['copy', 'excel', 'pdf', 'colvis']
});



      // import excel

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
                url: "{{ url('nhacungcap/import') }}",
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
                            'tax_number': dataImportArr[i][5],
                            'address' :dataImportArr[i][2],
                            'phone':  dataImportArr[i][3],
                            'email':  dataImportArr[i][4],
                            'website':  dataImportArr[i][6],
                            'note':  dataImportArr[i][7],
                            'group_id':  dataImportArr[i][8],
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
                                    <strong>${filename}.</strong></span><p style="margin:0px;padding-top:3px;color:#337ab7">Có <strong>${dataNotOk.length}</strong> nhà cung cấp không hợp lệ. Vui lòng kiểm tra lại</p>`;
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
                                    return '<span class="font-weight-bold">'+data['name']+'</span>';
                                }else if(data['name']){
                                    return "<span class='font-weight-bold'>"+data['name']+"</span>";
                                }else{
                                    return "<span class='text-danger'>Tên nhà cung cấp phải bắt buộc có</span>";
                                }
                            }
                        },
                            { data: null,
                            "render": function(data,type,row){
                                if(data['errors']||data['address']==null||data['phone']==null||data['email']==null||data['website'] ==null){
                                return "<span>Mã nhà cung cấp: </span>"+'NCC'+checkRangeValue(data["id"])+
                                '</br><strong>Mã số thuế:</strong>'+(data['tax_number'])+
                                '</br><strong>Địa chỉ:</strong>'+''+
                                '</br><strong>Số điện thoại :</strong>'+''+
                                '</br><strong>Email  :</strong>'+''+
                                '</br><strong>Website  :</strong>'+''+'</span>';
                                }else if(data['errors']||data['address']==null||data['phone']==null||data['email']==null||data['website'] ==null){
                                    return "<span>Mã nhà cung cấp: </span>"+'NCC'+checkRangeValue(data["id"])+
                                '</br><strong>Mã số thuế:</strong>'+(data['tax_number'])+
                                '</br><strong>Địa chỉ:</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</br><strong>Website  :</strong>'+(data['website'])+
                                '</span>';
                                }else if(data['name']){
                                return "<span>Mã nhà cung cấp: </span>"+'NCC'+checkRangeValue(data["id"])+
                                '</br><strong>Mã số thuế:</strong>'+(data['tax_number'])+
                                '</br><strong>Địa chỉ:</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</br><strong>Website  :</strong>'+(data['website'])+
                                '</span>';
                                }else{
                                    return "<span class='text-danger'>Mã số thuế là bắt buộc</span>";
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
                                if(data['errors']||data['address']==null||data['phone']==null||data['email']==null||data['website'] ==null){
                                return "<span>Mã nhà cung cấp: </span>"+'NCC'+checkRangeValue(data["id"])+
                                '</br><strong>Mã số thuế:</strong>'+(data['tax_number'])+
                                '</br><strong>Địa chỉ:</strong>'+''+
                                '</br><strong>Số điện thoại :</strong>'+''+
                                '</br><strong>Email  :</strong>'+''+
                                '</br><strong>Website  :</strong>'+''+'</span>';
                                }else if(data['errors']||data['address']==null||data['phone']==null||data['email']==null||data['website'] ==null){
                                    return "<span>Mã nhà cung cấp: </span>"+'NCC'+checkRangeValue(data["id"])+
                                '</br><strong>Mã số thuế:</strong>'+(data['tax_number'])+
                                '</br><strong>Địa chỉ:</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</br><strong>Website  :</strong>'+(data['website'])+
                                '</span>';
                                }else if(data['name']){
                                return "<span>Mã nhà cung cấp: </span>"+'NCC'+checkRangeValue(data["id"])+
                                '</br><strong>Mã số thuế:</strong>'+(data['tax_number'])+
                                '</br><strong>Địa chỉ:</strong>'+(data['address'])+
                                '</br><strong>Số điện thoại :</strong>'+(data['phone'])+
                                '</br><strong>Email  :</strong>'+(data['email'])+
                                '</br><strong>Website  :</strong>'+(data['website'])+
                                '</span>';
                                }else{
                                    return "<span class='text-danger'>Mã số thuế là bắt buộc</span>";
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
                            toastr.info('Danh sách nhóm khách hàng hợp lệ là 0 xin vui lòng kiểm tra lại');
                        }else{
                        $.ajax({
                            type: 'POST',
                            url: '{{ url('nhacungcap/insertDataExcel') }}',
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
    })



    $('#exampleModal1').on('shown.bs.modal', function () {
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

});

</script>
<style>
    #data-table4 #thID {
        width: 5% !important;
    }

    #data-table4 #thMa {
        width: 10% !important;
    }

    #data-table4 #thLoai {
        width: 25% !important;
    }

    #data-table4 #thNgay {
        width: 25% !important;
    }

    #data-table4 #thDoi {
        width: 22% !important;
    }

    #data-table4 #thChech {
        width: 15% !important;
    }
</style>
@endsection
