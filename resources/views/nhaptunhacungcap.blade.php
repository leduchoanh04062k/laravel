@extends('default')
@section('title','Nhập từ nhà cung cấp')
@section('content')
<!-- ########## START: MAIN PANEL ########## -->
<div class="br-mainpanel pos-relative">

    <!-- tab1 -->
    <div class="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Phiếu nhập từ nhà cung cấp</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="mg-r-10">
                        <button type="button" class="btn btn-primary" id="inTab2">
                            <i class='fas fa-plus' style='font-size:15px;'></i>
                            Nhập từ nhà cung cấp
                        </button>
                    </div>
                    <div class="mg-r-10">
                        <!-- Button trigger modal nhập tồn từ excel-->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#importExcelModal">
                            <i class='far fa-file-excel' style='font-size:15px'></i>
                            Nhập hàng từ file excel
                        </button>

                        <!-- Modal nhập tòn từ excel-->
                        <div class="modal fade" id="importExcelModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document" style="max-width:none;width: 80em;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title tx-gray-900" >Tạo phiếu nhập từ nhà cung cấp từ file excel</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form id="importSupplier">
                                    <div class="modal-body shadow-base pd-t-0">
                                        <div class="row">
                                            <div class="col-md-8 mg-t-10">
                                                <label for="" class="tx-bold tx-gray-800">Nhà cung cấp</label>
                                                <div class="col-12 pl-0">
                                                    <input type="text" name="name" autocomplete="off" id="autoSearchImport" class="form-control"
                                                    placeholder="Nhập mã, tên, sđt để tìm kiếm nhà cung cấp">
                                                    <input type="hidden" id="idSupplierImport" name="idsupplier" />
                                                    <div id="buttonCloseImportExcel" class="btn btn-danger pos-absolute r-0 t-0"><i
                                                        class="fa fa-times"></i></div>
                                                    </div>
                                            </div>
                                            <div class="col-md-4 mg-t-10">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="" class="tx-bold tx-gray-800">Thành tiền</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" id="totalImportExcel" readonly="" value="0.00" class="form-control">
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
                                                        <input type="text" readonly="" placeholder="Mã phiếu tự động"
                                                        class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mg-t-10">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="" class="tx-bold tx-gray-800">Ngày nhập <span class="text-danger">(*)</span></label>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="input-group">
                                                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                            <input type="text" class="form-control fc-datepicker" name="date" readonly="" id="dateImportExcel"
                                                            value="<?php echo date("d/m/Y"); ?>" placeholder="MM/DD/YYYY">
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mg-t-10">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <label for="" class="tx-bold tx-gray-800">Giờ nhập <span class="text-danger">(*)</span></label>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                    class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                                                    <input type="text" name="hour" class="form-control"
                                                                    value="<?php date_default_timezone_set("Asia/Ho_Chi_Minh"); echo date("H:i:s");?>"
                                                                    name="" readonly id="hourImportExcel" placeholder="Set time">
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
                                                                <input type="text" id="totalPaidImportExcel" value="0.00"
                                                                class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4 mg-t-10">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="" class="tx-bold tx-gray-800">Mã hoá đơn</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <input type="text" class="form-control" readonly="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mg-t-10">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label for="" class="tx-bold tx-gray-800">Ngày nhập hoá
                                                                đơn</label>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                        class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                                        <input type="text" class="form-control fc-datepicker"
                                                                        placeholder="MM/DD/YYYY" readonly="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 mg-t-10">
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <label for="" class="tx-bold tx-gray-800">Giờ nhập hoá
                                                                    đơn</label>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="input-group">
                                                                        <span class="input-group-addon"><i
                                                                            class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                                                            <input type="text" class="form-control"
                                                                            value="<?php date_default_timezone_set("Asia/Ho_Chi_Minh"); echo date("H:i:s");?>"
                                                                            name="" readonly >
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
                                                                        <input type="text" readonly="" id="debtImportExcel" value="0.00"
                                                                        class="form-control">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <form id="importExcelForm" method="POST" enctype="multipart/form-data">
                                                        <div class="row">
                                                            <div class="col-12 tx-gray-700 pd-t-10">
                                                                <label class="font-weight-bold" style="cursor:none">File excel (Dung lượng
                                                                không vượt quá 1mb)</label>
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
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="shadow-base bg-white pd-15">
                                                    <!-- Nav tabs -->
                                                    <ul class="nav nav-tabs" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" data-toggle="tab" href="#hopLe">DS hợp
                                                                lệ <span class="badge rounded-pill bg-primary" id="info-dataTableHopLe"
                                                                style="font-size: 90%"></span></a>
                                                            </li>
                                                            <li class="nav-item">
                                                                <a class="nav-link" data-toggle="tab" href="#khongHopLe">DS không
                                                                    hợp lệ <span class="badge rounded-pill bg-danger" id="info-dataTableKhongHopLe"
                                                                    style="font-size: 90%"></span></a>
                                                                </li>
                                                            </ul>
                                                            <!-- Tab panes -->
                                                            <div class="tab-content">
                                                                <div id="hopLe" class="container tab-pane active"><br>
                                                                    <table id="dataTableHopLe" style="width:100%" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:30px">STT</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:120px">Tên hàng hoá</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:90px">Số lô</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:80px">Hạn sử dụng</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:50px">S.lượng</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:40px">ĐVT</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:100px">Giá nhập</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:80px">Tổng g.giá</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:40px">VAT(%) </th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:100px">Thành tiền </th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                                <div id="khongHopLe" class="container tab-pane fade"><br>
                                                                    <table style="width:100%" id="dataTableKhongHopLe" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:30px">STT</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:120px">Tên hàng hoá</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:90px">Số lô</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:80px">Hạn sử dụng</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:50px">S.lượng</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:40px">ĐVT</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:100px">Giá nhập</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:80px">Tổng g.giá</th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:40px">VAT(%) </th>
                                                                                <th scope="col" class="bg-primary"
                                                                                style="color: white;min-width:100px">Thành tiền </th>
                                                                            </tr>
                                                                        </thead>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-body" style="border-top:1px solid #e9ecef;padding-top:8px">
                                                            <div class="row">
                                                                <div class="col-sm-9">
                                                                    <em class="iconImportBulb"></em> <span class="text-dark font-weight-bold">Tải file excel mẫu <a
                                                                        href="{{ url('./download/fileMauNhapTuNhaCungCap.xlsx') }}">tại
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

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div>
                                                <a class="btn btn-info" href="#" id="exportExcel">
                                                    <i class='far fa-file-excel' style='font-size:15px'></i>
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
                                                <label for="">Từ ngày</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                    <input type="text" class="form-control fc-datepicker" id="searchByStartDate"
                                                    value="<?php echo date("01/m/Y",strtotime("-1 month")); ?>" placeholder="MM/DD/YYYY">
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
                                            <div class="col-md-3 col-lg-2">
                                                <label for="">Trạng thái</label>
                                                <select name="" id="searchByStatus" class="form-control">
                                                    <option value="">Tất cả</option>
                                                    <option value="hoàn thành">Hoàn thành</option>
                                                    <option value="đã huỷ">Đã huỷ</option>
                                                    <option value="3">Chờ xử lý</option>
                                                </select>
                                            </div>
                                            <div class="col-md-3 col-lg-4">
                                                <label for="">Nhà thuốc</label>
                                                <div class="form-control">
                                                    <a href="#">Hộ Kinh Doanh Nhà thuốc Morioka</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row tx-gray-900 mg-t-20">
                                            <div class="col-md-6">
                                                <label for="">Tìm kiếm theo hàng hoá</label>
                                                <input type="text" class="form-control" placeholder="Nhập mã hoặc tên hàng hoá"
                                                id="searchByStock" autocomplete="off">
                                            </div>
                                            <div class="col-md-3 col-lg-4 ">
                                                <label for="">Từ khoá tìm kiếm</label>
                                                <input type="text" class="form-control"
                                                placeholder="Tìm kiếm theo mã phiếu hoặc tên nhà cung cấp" id="searchBySupplier">
                                            </div>
                                            <div class="col-md-2 col-lg-2 align-self-end">
                                                <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"> <i
                                                    class="fas fa-search" style="padding: 3px"></i>Tìm kiếm</button>
                                                </div>
                                            </div>
                                            <div class="mg-t-20">
                                                <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                                                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table1" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col" class="bg-primary" style="color: white; max-width: 2%">#</th>
                                                            <th scope="col" class="bg-primary" style="color: white; max-width: 8%">Mã phiếu</th>
                                                            <th scope="col" class="bg-primary" style="color: white; max-width: 15%">Ngày nhập</th>
                                                            <th scope="col" class="bg-primary" style="color: white; max-width: 25%">Nhà cung cấp
                                                            </th>
                                                            <th scope="col" class="bg-primary" style="color: white; max-width: 15%">Tổng tiền</th>
                                                            <th scope="col" class="bg-primary" style="color: white; max-width: 15%">Ghi chú</th>
                                                            <th scope="col" class="bg-primary" style="color: white; max-width: 13%">Trạng thái</th>
                                                            <th scope="col" class="bg-primary" style="color: white; max-width: 7%"></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                        </div><!-- row -->
                                    </div><!-- br-pagebody -->
                                    <!--  -->
                                </div>
                                <!-- tab2 -->
                                <div class="pos-absolute t-0 l-0 hidden tab2" style="width:100%;">
                                    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                                        <div class="row">
                                            <h4 class="tx-gray-800 mg-b-5 col-6" id="labelTaoMoiPhieuNhap"></h4>
                                            <div class="col-6 justify-content-end d-flex">
                                                <div>
                                                    <!-- Button trigger modal nhập tồn từ excel-->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#themTuDM">
                                                        <i class='fas fa-plus' style='font-size:15px;'></i>
                                                        Thêm vào từ danh mục
                                                    </button>
                                                    <!-- Modal thêm hàng hoá vào phiếu-->
                                                    <div class="modal fade" id="themTuDM" role="dialog" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog" role="document" style="max-width:none;width:70em;">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thêm hàng hoá vào
                                                                phiếu</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>

                                                            <form id="themHangHoa" method="post">
                                                                <div class="shadow-base bg-white pd-15">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <input type="hidden" name="stock_id" id="idStockTable">
                                                                            <input type="hidden" name="id">
                                                                            <input type="hidden" name="prescription_drug"
                                                                            class="prescription_drug">
                                                                            <input type="hidden" id="tenHangHoaTable">
                                                                            <label for="" class="tx-gray-700 tx-bold">Hàng hoá <span
                                                                                class="text-danger">(*)</span></label>
                                                                                <div class='pos-relative'>
                                                                                    <input type="text" name="name" id="autoSearchTable"
                                                                                    class="form-control" placeholder="Nhập từ khoá tìm kiếm"
                                                                                    autocomplete="off">
                                                                                    <div id="resetFormThemHangHoa"
                                                                                    class="btn btn-danger pos-absolute r-0 t-0 "><i
                                                                                    class="fa fa-times"></i></div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Loại hàng hoá
                                                                                    <span class="text-danger">(*)</span></label> <br>
                                                                                    <select name="stock_type" id="stock_type"
                                                                                    class="form-control select2" style="width: 100%">
                                                                                    <option value="Dược phẩm">Dược phẩm</option>
                                                                                    <option value="Vật tư y tế">Vật tư y tế</option>
                                                                                    <option value="Hàng hoá khác">Hàng hoá khác</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Nhóm hàng
                                                                                hoá</label> <br>
                                                                                <select name="stock_group" class="form-control" id="stock_group"
                                                                                style="width: 100%">
                                                                                <option></option>
                                                                                @foreach (App\Models\StockGroup::all() as $stockgroup)
                                                                                <option value="{{ $stockgroup->name }}">
                                                                                    {{ $stockgroup->name }}
                                                                                </option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <label for="" class="tx-gray-700 mg-t-10 tx-bold">Số đăng ký <span
                                                                                class="text-danger">(*)</span></label> <br>
                                                                                <input type="text" name="reg_no" class="form-control" id="reg_no">
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Hoạt chất
                                                                                chính</label> <br>
                                                                                <input type="text" name="ingredient" class="form-control"
                                                                                id="ingredient">
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Hàm lượng</label>
                                                                                <br>
                                                                                <input type="text" name="content" class="form-control" id="content">
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Đơn vị cơ
                                                                                bản</label> <br>
                                                                                <select class="form-control unitfirst select2" style="width: 100%">
                                                                                    @foreach (App\Models\UnitList::all() as $units)
                                                                                    <option value="{{ $units->name }}">
                                                                                        {{ $units->name }}
                                                                                    </option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <label for="" class="tx-gray-700 mg-t-10 tx-bold">Quy cách đóng gói
                                                                                    <span class="text-danger">(*)</span></label> <br>
                                                                                    <input type="text" name="packaging" class="form-control"
                                                                                    id="packaging">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for="" class="tx-gray-700 mg-t-10 tx-bold">Hãng sản
                                                                                    xuất</label> <br>
                                                                                    <input type="text" name="manufacture" class="form-control"
                                                                                    id="manufacture">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for="" class="tx-gray-700 mg-t-10 tx-bold">Nước sản
                                                                                    xuất</label> <br>
                                                                                    <input type="text" name="made_in" class="form-control" id="made_in">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for="" class="tx-gray-700 mg-t-10 tx-bold">VAT(bán)</label>
                                                                                    <br>
                                                                                    <input type="text" class="form-control" id="VAT_sell"
                                                                                    name="VAT_sell">
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <input type="hidden" name="unit_id" id="unit_id">
                                                                                    <label for="" class="tx-gray-700 mg-t-10 tx-bold">Đơn vị nhập <span
                                                                                        class="text-danger">(*)</span></label> <br>
                                                                                        <select class="form-control select2" id="unit" name="unit"
                                                                                        style="width: 100%">
                                                                                        @foreach (App\Models\UnitList::all() as $units)
                                                                                        <option value="{{ $units->name }}">
                                                                                            {{ $units->name }}
                                                                                        </option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <label for="" class="tx-gray-700 mg-t-10 tx-bold">Tỷ lệ quy đổi
                                                                                        <span class="text-danger">(*)</span></label> <br>
                                                                                        <input type="text" class="form-control" id="exchange" disabled>
                                                                                    </div>
                                                                                    <div class="col-md-3">
                                                                                        <label for="" class="tx-gray-700 mg-t-10 tx-bold">Số lô <span
                                                                                            class="text-danger">(*)</span></label> <br>
                                                                                            <input type="text" name="lot_no" class="form-control lot_no"
                                                                                            id="searchLotNo" autocomplete="off">
                                                                                        </div>
                                                                                        <input type="hidden" name="lotno_id" id="lotno_id">
                                                                                        <div class="col-md-3">
                                                                                            <label for="" class="tx-gray-700 mg-t-10 tx-bold">Hạn sử dụng <span
                                                                                                class="text-danger">(*)</span></label> <br>
                                                                                                <div class="input-group"><span class="input-group-addon"><i
                                                                                                    class="icon ion-calendar tx-16 lh-0 op-6"></i></span><input
                                                                                                    type="text" name="exp_date"
                                                                                                    class="form-control fc-datepicker" id="exp_date"
                                                                                                    placeholder="MM/DD/YYYY"></div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row">
                                                                                                <div class="col-md-3">
                                                                                                    <label for="" class="tx-gray-700 mg-t-10 tx-bold">Số lượng nhập
                                                                                                        <span class="text-danger">(*)</span></label> <br>
                                                                                                        <input type="text" class="form-control" id="qty" value="0"
                                                                                                        name="qty" onchange="haChange()">
                                                                                                    </div>
                                                                                                    <div class="col-md-3">
                                                                                                        <label for="" class="tx-gray-700 mg-t-10 tx-bold">Đơn giá</label>
                                                                                                        <br>
                                                                                                        <input type="text" class="form-control" id="price" name="price"
                                                                                                        value="0" onchange="haChange()">
                                                                                                    </div>
                                                                                                    <div class="col-md-3">
                                                                                                        <label for="" class="tx-gray-700 mg-t-10 tx-bold">Tổng giảm
                                                                                                        giá</label> <br>
                                                                                                        <input type="text" class="form-control" id="discount"
                                                                                                        name="discount" onchange="haChange()" value="0">
                                                                                                    </div>
                                                                                                    <div class="col-md-3">
                                                                                                        <label for="" class="tx-gray-700 mg-t-10 tx-bold">VAT(nhập)</label>
                                                                                                        <br>
                                                                                                        <input type="text" class="form-control" name="VAT" value="0"
                                                                                                        id="VAT" onchange="haChange()">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="row">
                                                                                                    <div class="col-md-3">
                                                                                                        <label for="" class="tx-gray-700 mg-t-10 tx-bold">Giá bán</label>
                                                                                                        <br>
                                                                                                        <input type="text" class="form-control" id="price_sell" disabled>
                                                                                                    </div>
                                                                                                    <div class="col-md-3">
                                                                                                        <label for="" class="tx-gray-700 mg-t-10 tx-bold">Mã vạch</label>
                                                                                                        <br>
                                                                                                        <input type="text" class="form-control barcode"
                                                                                                        placeholder="Mã tự động">
                                                                                                    </div>
                                                                                                    <div class="col-md-6">
                                                                                                        <label for="" class="tx-gray-700 mg-t-10 tx-bold">Thành tiền</label>
                                                                                                        <br>
                                                                                                        <input type="text" class="form-control" id="thanhTien" disabled
                                                                                                        placeholder="0.00"><input type="hidden" class="form-control"
                                                                                                        id="noteStock" name="note">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-md-12 mg-t-20">
                                                                                                <label for="" class="tx-gray-900 tx-bold" id="info-data-table-unit"></label>
                                                                                                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd responsive"
                                                                                                id="data-table-unit" style="width:100%">
                                                                                                <thead>
                                                                                                    <tr>
                                                                                                        <th scope="col" class="bg-primary"
                                                                                                        style="color: white;width:140px;">Tên đơn vị <span
                                                                                                        class="text-danger">*</span></th>
                                                                                                        <th scope="col" class="bg-primary"
                                                                                                        style="color: white;width:60px;">Quy đổi <span
                                                                                                        class="text-danger">*</span></th>
                                                                                                        <th scope="col" class="bg-primary"
                                                                                                        style="color: white;width:80px;">Giá bán</th>
                                                                                                        <th scope="col" class="bg-primary"
                                                                                                        style="color: white;width:45px;">Mã vạch</th>
                                                                                                        <th scope="col" class="bg-primary"
                                                                                                        style="color: white;width:65px;">Bán hàng</th>
                                                                                                        <th scope="col" class="bg-primary"
                                                                                                        style="color: white;width:115px;">Cảnh báo hết hàng</th>
                                                                                                        <th scope="col" class="bg-primary"
                                                                                                        style="color: white;width:30px;">Số lượng</th>
                                                                                                        <th scope="col" class="bg-primary"
                                                                                                        style="color: white;width:20px;"></th>
                                                                                                    </tr>
                                                                                                </thead>
                                                                                                <tbody>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </div>
                                                                                        <div class="col-md-12 mg-t-10">
                                                                                            <i class="fa fa-plus"></i>
                                                                                            <span><a href="#" onclick="addUnit();">Thêm đơn vị tính</a></span>
                                                                                        </div>
                                                                                        <div class="modal-footer">
                                                                                            <button type="button" id="submitHangHoa1" class="btn btn-primary">
                                                                                                <i class='fas fa-plus' style='font-size:15px;'></i>
                                                                                            Thêm và đóng</button>
                                                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">
                                                                                                <i class='fas fa-close' style='font-size:15px;'></i> Đóng</button>
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
                                                            <!-- Modal thêm mới-->
                                                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title tx-gray-900" id="labelThemMoiNhaCC">Thêm mới nhà cung cấp</h5>
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
                                                                                            <input type="hidden" name="id" id="idUpdate">
                                                                                            <label for="" class="tx-gray-800 tx-bold">Mã nhà cung cấp</label>
                                                                                            <input type="text" class="form-control" id="supplier_id" readonly="" placeholder="Mã tự động">
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <label for="" class="tx-gray-800 tx-bold">Tên nhà cung cấp <span
                                                                                                class="text-danger">*</span></label>
                                                                                                <input type="text" id="name" name="name" class="form-control">
                                                                                            </div>
                                                                                            <div class="col-md-3">
                                                                                                <label for="" class="tx-gray-800 tx-bold">Mã số thuế <span
                                                                                                    class="text-danger"></span></label>
                                                                                                    <input type="text" id="tax_number" name="tax_number" class="form-control">
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
                                                                                                    <input type="email" class="form-control" name="email" id="email">
                                                                                                </div>
                                                                                                <div class="col-md-3">
                                                                                                    <label for="" class="tx-gray-800 tx-bold">Số điện thoại</label>
                                                                                                    <input type="number" class="form-control" name="phone" id="phone">
                                                                                                </div>
                                                                                                <div class="col-md-3">
                                                                                                    <label for="" class="tx-gray-800 tx-bold">Website</label>
                                                                                                    <input type="text" class="form-control" id="website" name="website">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row mg-t-10">
                                                                                                <div class="col-md-12">
                                                                                                    <label for="" class="tx-gray-800 tx-bold">Địa chỉ</label>
                                                                                                    <input type="text" class="form-control" id="address" name="address">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="row mg-t-10">
                                                                                                <div class="col-md-12">
                                                                                                    <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                                                                                    <textarea name="note" id="note" cols="30" rows="3"
                                                                                                    class="form-control"></textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="submit" id="saveandclose" class="btn btn-primary">
                                                                                        <i class='fas fa-plus' style='font-size:15px;'></i>
                                                                                    Lưu và đóng</button>
                                                                                    <button type="submit" class="btn btn-danger" data-dismiss="modal">
                                                                                        <em class="fa fa-close"></em> Đóng</button>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!--Modal -->
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

                                                                                    <div class="modal-body">
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
                            {{-- <nav>
                <div class="nav nav-tabs" id="nav-tab" role="tablist" id="mytab">
                  <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Home</a>
                  <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profile</a>
                  <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contact</a>
                </div>
            </nav> --}}
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane active" id="nav-home" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <div class="row mg-t-10">
                    <div class="col-md-6">
                        <input type="hidden" name="stock_id" id="stock_id">
                        <label for="" class="tx-gray-800 tx-bold">Tên hàng hoá <span
                            class="text-danger">*</span></label>
                            <input type="text" class="form-control name" name="name">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Mã hàng hoá</label>
                            <input type="text" class="form-control" readonly id="barcode" placeholder="Mã tự động">
                        </div>
                        <div class="col-md-3">
                            <input type="hidden" name="prescription_drug" class="prescription_drug"
                            value="0">
                            <label for="" class="tx-gray-800 tx-bold">Bán theo đơn</label><br>
                            <div class="toggle-wrapper">
                                <div class="toggle toggle-modern primary">
                                    <div class="toggle-slide">
                                        <div class="toggle-inner"
                                        style="width: 94px; margin-left: 0px;">
                                        <div class="toggle-on "
                                        style="height: 26px; width: 47px; text-indent: -8.66667px; line-height: 26px;">
                                    </div>
                                    <div class="toggle-blob"
                                    style="height: 26px; width: 26px; margin-left: -13px;">
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
                <!-- Button cộng -->
                                                {{--   <button type="button" class="btn btn-primary pos-absolute r-0 t-0"
                   data-toggle="modal" data-target="#cong">
                   <i class="fa fa-plus" aria-hidden="true"></i>
               </button> --}}

           </div>

       </div>
   </div>
   <div class="row mg-t-10">
    <div class="col-md-3">
        <label for="" class="tx-gray-800 tx-bold">Số đăng ký <span
            class="text-danger">*</span></label>
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
            <table class="table table-borderless bd bd-white bg-white"
            id="data-table-unit-edit">
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
    <div class="tab-pane fade" id="nav-profile" role="tabpanel"
    aria-labelledby="nav-profile-tab">
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
        <div class="col-md-1.5 align-self-end mg-r-10">
            <button type="button" class="btn btn-info" id="searchDBLotNo"><i
                class="fa fa-search mr-2" aria-hidden="true"></i>Tìm kiếm</button>
            </div>
            <div class="col-md-1.5 align-self-end mg-r-10">
                <button type="button" class="btn btn-info" id="exportExcelDBLotNo"><i
                    class="fa fa-file-excel-o mr-2" aria-hidden="true"></i></button>
                </div>
            </div>
            <div class="row mg-t-10">
                <div class="col-md-12">
                    <table id="data-table-select-lotno"
                    class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                    style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-primary" id="thID"
                            style="color: white;">STT</th>
                            <th scope="col" class="bg-primary" id="thMa"
                            style="color: white;">Mã phiếu</th>
                            <th scope="col" class="bg-primary" id="thLoai"
                            style="color: white;">Loại phiếu</th>
                            <th scope="col" class="bg-primary" id="thNgay"
                            style="color: white;">Ngày giao dịch</th>
                            <th scope="col" class="bg-primary" id="thDoi"
                            style="color: white;">Đối tác giao dịch</th>
                            <th scope="col" class="bg-primary" id="thChech"
                            style="color: white;">Chênh lệch</th>
                            <th style="display:none">Giá</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="tab-pane fade" id="nav-contact" role="tabpanel"
    aria-labelledby="nav-contact-tab">
    <div class="row mg-t-10">
        <div class="col-md-6">
            <label for="" class="tx-gray-700 tx-bold">Từ khoá tìm kiếm</label>
            <input type="text" class="form-control" id="searchDSLotNo">
        </div>
        <div class="col-md-2 align-self-end">
            <button id="buttonDSLotNo" type="button" class="btn btn-info"><i class="fa fa-search mr-2" aria-hidden="true"></i>Tìm kiếm</button>
        </div>
    </div>
    <div class="row mg-t-10">
        <div class="col-md-12">
            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
            id="data-table-lotno" style="width: 100%">
            <thead>
                <tr>
                    <th scope="col" class="bg-primary" id="thSTT"
                    style="color: white;">STT</th>
                    <th scope="col" class="bg-primary" id="thSolo"
                    style="color: white;">Số lô</th>
                    <th scope="col" class="bg-primary" id="thHanDung"
                    style="color: white;">Hạn dùng</th>
                    <th scope="col" class="bg-primary" id="thSoLuong"
                    style="color: white;">Số lượng</th>
                    <th scope="col" class="bg-primary" id="thGiaVon"
                    style="color: white;">Giá vốn</th>
                    <th scope="col" class="bg-primary" id="thEdit"
                    style="color: white;"></th>
                </tr>
            </thead>
        </table>
    </div>
</div>
</div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" id="editStock"><em
        class="fa fa-save"></em> Lưu</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal"><em
            class="fa fa-close"></em> Đóng</button>
        </div>
    </form>

</div>
</div>
</div>
</div>
<!-- Modal cộng-->
<div class="modal fade" id="cong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document" style="max-width: none;width: 50em;vertical-align: top;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thêm mới nhóm hàng hoá</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" id="nhomHangHoa">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Nhóm hàng hoá</label>
                        <input type="text" class="form-control" name="nhomhanghoa">
                    </div>
                    <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                        <textarea name="" id="" cols="30" rows="2" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    <i class='fas fa-plus' style='font-size:15px;'></i>
                    Lưu và thêm mới
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class='fas fa-plus' style='font-size:15px;'></i>
                    Lưu và đóng
                </button>
                <button type="button" class="btn btn-danger" id="closeCong">Đóng</button>
            </div>
        </form>
    </div>
</div>

</div>
<!-- nhập thông tin -->

<div class="br-pagebody pd-x-20 pd-sm-x-30">
    <div class="shadow-base bg-white pd-15">

        <form id="submitNhaCungCap">
            <div class="mg-b-20">
                <div class="row">
                    <div class="col-md-6 mg-t-10">
                        <label for="" class="tx-bold tx-gray-800">Nhà cung cấp <span class="text-danger"> *
                        </span></label>
                        <div class="col-12 pl-0">
                            <input type="hidden" name="id" id="id">
                            <input type="hidden" name="idsupplier" id="idSupplier">
                            <input type="hidden" id="tenNhaCungCap">
                            <input type="text" name="name" autocomplete="off" id="autoSearch" class="form-control"
                            placeholder="Nhập mã, tên, sđt để tìm kiếm nhà cung cấp">
                            <button type="button" id="buttonSupplier"
                            class="pos-absolute r-0 t-0 btn btn-primary tx-white" data-toggle="modal"
                            data-target="#exampleModal">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        </button>
                        <div id="buttonSupplierClose" class="btn btn-danger pos-absolute r-0 t-0 hidden"><i
                            class="fa fa-times"></i></div>
                        </div>
                    </div>

                    <div class="col-md-3 mg-t-10">
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="tx-bold tx-gray-800">Tổng tiền</label>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control haCurrency" id="totalPrice"
                                placeholder="0.00" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mg-t-10">
                        <div class="row">
                            <div class="col-12">
                                <label for="" class="tx-bold tx-gray-800">Tổng giảm giá</label>
                            </div>
                            <div class="col-12">
                                <input type="text" class="form-control haCurrency" id="totalDiscount"
                                placeholder="0.00" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2 mg-t-10">
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
                                <label for="" class="tx-bold tx-gray-800">Ngày nhập <span
                                    class="text-danger">*</span></label>
                                </div>
                                <div class="col-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                            class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                            <input type="text" class="form-control fc-datepicker"
                                            value="<?php echo date("d/m/Y"); ?>" name="date" id="dateImport"
                                            placeholder="MM/DD/YYYY">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2 mg-t-10">
                                <div class="row">
                                    <div class="col-12">
                                        <label for="" class="tx-bold tx-gray-800">Giờ nhập <span
                                            class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                    class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                                    <input id="tpBasic" type="text" class="form-control"
                                                    value="<?php date_default_timezone_set("Asia/Ho_Chi_Minh"); echo date("H:i:s");?>"
                                                    name="hour" id="hourImport" placeholder="Set time">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mg-t-10">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="" class="tx-bold tx-gray-800">Tổng VAT</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" placeholder="0.00" id="totalVAT" class="form-control haCurrency"
                                                disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 mg-t-10">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="" class="tx-bold tx-gray-800">Thành tiền</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" placeholder="0.00" class="form-control haCurrency"
                                                id="totalMoney" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 mg-t-10">
                                        <div class="row">
                                            <div class="col-12">
                                                <label for="" class="tx-bold tx-gray-800">Mã hoá đơn</label>
                                            </div>
                                            <div class="col-12">
                                                <input type="text" class="form-control">
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
                                                    <span class="input-group-addon"><i
                                                        class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                        <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
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
                                                        <span class="input-group-addon"><i
                                                            class="fa fa-clock-o tx-16 lh-0 op-6"></i></span>
                                                            <input id="tpBasic1" type="text" class="form-control" placeholder="Set time">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mg-t-10">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="" class="tx-bold tx-gray-800">Thanh toán</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" placeholder="0.00" class="form-control haCurrency"
                                                        id="totalPaid">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3 mg-t-10">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <label for="" class="tx-bold tx-gray-800">Công nợ</label>
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="text" placeholder="0.00" class="form-control haCurrency" id="totalDebt"
                                                        disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mg-t-10">
                                            <div class="col-md-12">
                                                <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                                <textarea cols="30" rows="1" class="form-control note" name="note"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="shadow-base bg-white pd-15 mg-t-25">
                                <div>
                                    <label for="browser" class="tx-gray-900 tx-bold">Thêm hàng hoá vào phiếu</label>
                                    <div class="pos-relative">
                                        <input autocomplete="off" id="autoSearchImage" class="form-control"
                                        placeholder="Nhập tên hàng hoá để tìm kiếm">
                                        <a href="" class="btn btn-primary btn-with-icon pos-absolute r-0 t-0" data-toggle="modal"
                                        data-target="#timkiem">
                                        <div class="ht-40 justify-content-between">
                                            <span class="icon wd-40">
                                                <i class="fas fa-plus-circle"></i>
                                            </span>
                                            <span class="pd-x-15">Tìm kiếm nâng cao</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="shadow-base bg-white pd-15 mg-t-25 col-md-12">

                            <div style="overflow-x: auto;">
                                <label for="" class="tx-bold tx-gray-800" id="info-data-table3"></label>
                                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:10px;width:2%;text-align:center;">#</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:46px;width:5%;text-align:center">Mã HH</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:145px;width:18%;text-align:center">Tên HH</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:120px;width:9%;text-align:center">Số lô (*)</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:60px;width:8%;text-align:center">HSD (*)</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:60px;width:8%;text-align:center">ĐVT (*)</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:80px;width:8%;text-align:center">S.lg (*)</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:110px;width:91%;text-align:center">Đơn giá</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:110px;width:9%;text-align:center">Tổng giảm giá</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:55px;width:4%;text-align:center">VAT(%)</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:120px;width:8%;text-align:center">Giá nhập</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:120px;width:8%;text-align:center">Thành tiền</th>
                                            <th scope="col" class="bg-primary"
                                            style="color:white;min-width:20px;width:4%;text-align:center"></th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                        <div class="d-flex justify-content-end  mg-t-15">
                            <button class="btn btn-primary mg-r-10" id="submitPhieuNhap">
                                <i class='far fa-save' style='font-size:13px;padding:2px'></i>
                                Lưu
                            </button>
                            <button class="btn btn-danger" id="outTab2">
                                <i class='fa fa-reply' style='font-size:13px'></i>
                                Trở về
                            </button>
                        </div>

                    </div>
                </div>
                <!-- end tab2 -->

            </div><!-- br-mainpanel -->
            <!-- Modal tìm kiếm nâng cao-->
            <div class="modal fade" id="timkiem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Tìm kiếm nâng cao</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="">
                            <div class="modal-body">
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
                                            <option value="">Tuần hoàn não</option>
                                            <option value="">Hàng hoá khác</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Hạn sử dụng</label>
                                        <select name="" id="" class="form-control select2" style="width:100%">
                                            <option value="">Tất cả</option>
                                            <option value="">Sử dụng tốt</option>
                                            <option value="">Sắp hết hạn</option>
                                            <option value="">Đã hết hạn</option>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="" class="tx-gray-800 tx-bold">Chỉ tìm kiếm hàng tồn kho</label><br>
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
                        <div class="row">
                            <div class="col-md-9 pd-t-10">
                                <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
                                <input id="inputTimKiemNangCao" type="text" class="form-control"
                                placeholder="Nhập từ khoá tìm kiếm, ấn enter để tìm">
                            </div>
                            <div class="col-md-2 align-self-end">
                                <button type="button" class="btn btn-primary" id="timKiemNangCao">
                                    <i class="fa fa-search mg-r-5" aria-hidden="true"></i>
                                    Tìm kiếm
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 pd-t-10">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#" id="info-data-table2"></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#" id="select-data-table2"></a>
                                    </li>
                                </ul>
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div id="" class="tab-pane active pd-t-5">
                                        <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table2"
                                        style="width: 100%">
                                        <thead>
                                            <tr>
                                                <th scope="col" class="bg-primary mahh"
                                                style="color: white;">Mã HH</th>
                                                <th scope="col" class="bg-primary tenhh"
                                                style="color: white;">Tên</th>
                                                <th scope="col" class="bg-primary tonkho"
                                                style="color: white;">Tồn kho</th>
                                                <th scope="col" class="bg-primary dvt"
                                                style="color: white;">ĐVT</th>
                                                <th scope="col" class="bg-primary sdk"
                                                style="color: white;">Số ĐK</th>
                                                <th scope="col" class="bg-primary qcdg"
                                                style="color: white;">Quy cách đóng gói
                                            </th>
                                            <th scope="col" class="bg-primary hsx"
                                            style="color: white;">Hãng sản xuất</th>
                                            <th scope="col" class="bg-primary hcc"
                                            style="color: white;">Hoạt chất chính
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <div id="" class="tab-pane fade"><br>
                            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                <thead>
                                    <tr>
                                        <th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
                                        <th scope="col" class="bg-primary" style="color: white;">Tên</th>
                                        <th scope="col" class="bg-primary" style="color: white;">Tồn kho</th>
                                        <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                                        <th scope="col" class="bg-primary" style="color: white;">Số ĐK</th>
                                        <th scope="col" class="bg-primary" style="color: white;">Quy cách đóng
                                        gói</th>
                                        <th scope="col" class="bg-primary" style="color: white;">Hãng sản xuất
                                        </th>
                                        <th scope="col" class="bg-primary" style="color: white;">Hàm lượng</th>
                                        <th scope="col" class="bg-primary" style="color: white;"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="submitHangHoa2" class="btn btn-primary">
                <em class="fa fa-check"></em> Xong</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    <em class="fa fa-close"></em> Đóng</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal chi tiet --}}
<div>
    <!-- Modal dropdown1-->
    {{-- chi tiet phieu --}}
    <div class="modal fade" id="dropdown1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark" id="labelChiTietPhieuNhap"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="" id="nhapTuNhaCUngCap" name="nhapTuNhaCUngCap" method="POST">
                @csrf
                <div class="modal-body pd-t-0">
                    <div class="row mg-t-10">
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Mã phiếu</label>
                            <input type="text" id="detailid" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Ngày nhập</label>
                            <input type="text" id="detaildate" disabled=disabled class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="" class="tx-gray-800 tx-bold">Nhà cung cấp</label>
                            <input type="text" id="detailname" disabled=disabled class="form-control">
                        </div>
                    </div>
                    <div class="row mg-t-10">
                        <div class="col-md-12">
                            <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                            <textarea cols="30" rows="1" class="form-control" id="detailnote"
                            disabled="disabled"></textarea>
                        </div>
                    </div>
                    <div class="mg-t-10 ">
                        <table id="data-table4" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd"
                        style="width: 100%">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary"
                                style="color: white; width:3%;text-align:center">#</th>
                                <th scope="col" class="bg-primary" style="color: white; width:18%">Hàng hoá</th>
                                <th scope="col" class="bg-primary" style="color: white; width:15%">Số lô</th>
                                <th scope="col" class="bg-primary" style="color: white; width:13%">Đơn giá</th>
                                <th scope="col" class="bg-primary" style="color: white; width:9%">S.lượng</th>
                                <th scope="col" class="bg-primary" style="color: white; width:13%">Tổng giảm giá
                                </th>
                                <th scope="col" class="bg-primary" style="color: white; width:8%">Tổng VAT</th>
                                <th scope="col" class="bg-primary" style="color: white; width:15%">Thành tiền
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                    <div class="row mg-t-10">
                        <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                            <div class="col-md-6 font-weight-bold">
                                Tổng tiền:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="font-weight-bold" style="border:0;background:none;"
                                id="detailPrice" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mg-t-10">
                        <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                            <div class="col-md-6 font-weight-bold">
                                Tổng giảm giá:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="font-weight-bold" id="detailDiscount"
                                style="border:0;background:none;" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="row mg-t-10">
                        <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                            <div class="col-md-6 font-weight-bold">
                                Tổng VAT:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="font-weight-bold" id="detailVAT" disabled
                                style="border:0;background:none;">
                            </div>
                        </div>
                    </div>
                    <div class="row mg-t-10">
                        <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                            <div class="col-md-6 font-weight-bold">
                                Thành tiền:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="font-weight-bold" id="detailMoney" disabled
                                style="border:0;background:none;">
                            </div>
                        </div>
                    </div>
                    <div class="row mg-t-10">
                        <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                            <div class="col-md-6 font-weight-bold">
                                Thanh toán:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="font-weight-bold" id="detailPaid" disabled
                                style="border:0;background:none;">
                            </div>
                        </div>
                    </div>
                    <div class="row mg-t-10">
                        <div class="col-md-4 col-md-push-8 d-flex" style="margin-left: 66%;">
                            <div class="col-md-6 font-weight-bold">
                                Công nợ:
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="font-weight-bold" id="detailDebt" disabled
                                style="border:0;background:none;">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger font-weight-bold text-uppercase"
                data-dismiss="modal"><i class="fas fa-times"></i> Đóng</button>
            </div>
        </form>
    </div>
</div>

</div>

<!-- Modal dropdown2 -->
<div class="modal fade" id="dropdown2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document" style="max-width: none;width: 80em;vertical-align: top;">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">In mã vạch</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="" id="formThanhToan">
            <div class="modal-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link " id="home-tab" data-toggle="tab" href="#kqTimKiem" role="tab"
                        aria-controls="home" aria-selected="true">KQ Tìm Kiếm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#danhSachIn"
                        role="tab" aria-controls="profile" aria-selected="false">Danh sách in</a>
                    </li>
                </ul>
                <div class="tab-content mg-t-10" id="myTabContent">
                    <div class="tab-pane fade " id="kqTimKiem" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-3">
                                <label for="" class="tx-gray-800 tx-bold">Loại hàng hoá</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Tất cả</option>
                                    <option value="">Dược phẩm</option>
                                    <option value="">Vật tư y tế</option>
                                    <option value="">Hàng hoá khác</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="" class="tx-gray-800 tx-bold">Nhóm hàng</label>
                                <select name="" id="" class="form-control">
                                    <option value="">Tất cả</option>
                                    <option value="">Nhỏ tai</option>
                                    <option value="">Nhỏ mũi</option>
                                    <option value="">Hô hấp</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
                                <input type="text" class="form-control"
                                placeholder="Tìm kiếm theo tên hàng hoá, mã hàng hoá. Ấn enter để tìm kiếm">
                            </div>
                            <div class="col-md-1 align-self-end">
                                <button class="btn btn-primary">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    Tìm kiếm
                                </button>
                            </div>
                        </div>
                        <div class="row mg-t-10">
                            <div class="col-md-12">
                                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="bg-primary"
                                            style="color: white;width: 3%;text-align: center;"><input
                                            type="checkbox"></th>
                                            <th scope="col" class="bg-primary" style="color: white;width: 8%;">
                                            Mã HH</th>
                                            <th scope="col" class="bg-primary" style="color: white;width: 20%;">
                                            Tên</th>
                                            <th scope="col" class="bg-primary" style="color: white;width: 20%;">
                                            Đơn vị tính</th>
                                            <th scope="col" class="bg-primary" style="color: white;width: 8%;">
                                            Loại</th>
                                            <th scope="col" class="bg-primary" style="color: white;width: 10%;">
                                            Số ĐK</th>
                                            <th scope="col" class="bg-primary" style="color: white;width: 16%;">
                                            Quy cách đóng gói</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                    </div>
                    <div class="tab-pane fade show active" id="danhSachIn" role="tabpanel"
                    aria-labelledby="profile-tab">
                    <div class="row">
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Loại giấy</label>
                            <select name="" id="" class="form-control">
                                <option value="">Loại 1 nhãn</option>
                                <option value="">Loại 2 nhãn</option>
                                <option value="">Loại 3 nhãn</option>
                                <option value="">Loại 4 nhãn</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="tx-gray-800 tx-bold">Bảng giá</label>
                            <select name="" id="" class="form-control">
                                <option value="">Bảng giá mặc định</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mg-t-10">
                        <div class="col-md-6">
                            <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                                <thead>
                                    <tr>
                                        <th scope="col" class="bg-primary" style="color: white;width: 12%;">
                                        Mã HH</th>
                                        <th scope="col" class="bg-primary" style="color: white;width: 25%;">
                                        Tên</th>
                                        <th scope="col" class="bg-primary" style="color: white;width: 15%;">
                                        Đơn vị tính</th>
                                        <th scope="col" class="bg-primary" style="color: white;width: 15%;">
                                        Giá bán</th>
                                        <th scope="col" class="bg-primary" style="color: white;width: 7%;">
                                        S.lượng</th>
                                        <th scope="col" class="bg-primary" style="color: white;width: 3%;">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-info">In mã vạch</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
<!-- ########## END: MAIN PANEL ########## -->
<script type="text/javascript">
    var DataTable_hanghoa = [];
    var DataTable_unit = [];
    var hangHoa2 = [];
    var hangHoa1 = [];
    var listLotNo = [];
    var listLotNoArr = [];
    var dataUnit = [];
    var searchLotNo = [];

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
function sumTwoNumber(a,b){
  a = replaceCurrency(a);
  b = replaceCurrency(b);
  return parseFloat(a || 0)+parseFloat(b || 0);
}
function substrac(a,b){
  return a-b;
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
function price_import(a,b,c,d){
  a = replaceCurrency(a);
  b = replaceCurrency(b);
  c = replaceCurrency(c);
  d = replaceCurrency(d);
  d = d/100;
  if(d==0){
   e = ((b-c/a) || 0);
}else{
   e = (((b-c/a)+(b-c/a)*d) || 0);
}
e = isFinite(e) && e || 0;
return e.toFixed(2);
}
function sum(arr){
  var total = 0;
  arr.forEach(item=>{
   total+=parseFloat(item);
});
  return total;
}
function decialNumber(number){
  return new Intl.NumberFormat('en-US',{style: "decimal", minimumFractionDigits: 2, maximumFractionDigits:2}).format(number);
}

$('#searchByStock').typeahead({
  source: function(query, process) {
   return $.get("{{ url('nhaptunhacungcap/searchbystock') }}", {
    query: query
}, function(data) {
    data.forEach(item=>{
        item.ten = item.name;
        item.name = item.name + " HH"+checkRangeValue(item.id)
    })
    return process(data);
});
},
highlighter: function (item, data) {
   var parts = item.split('#'),
   html = '<div class="d-flex" style="white-space: pre-line">';
   html += '<div class="tx-center">';
   html += '<img src="{{ asset('image/medicine-default.jpg') }}" alt="" width=80px>';
   html += '</div>';
   html += '<div class="mg-l-10 align-self-center">';
   html += '<div>Tên: <strong>'+data.ten+'</strong></div>';
   html += '<div>SĐK: <strong>'+(data.reg_no || '')+'</strong> | Mã HH: <strong>HH'+checkRangeValue(data.id)+'</strong></div>';
   html += '<div>Quy cách ĐG: <strong>'+(data.packaging || '')+'</strong> | Hãng SX: <strong>'+(data.manufacture || '')+'</strong></div>';
   html += '</div>';
   html += '</div>';
   return html;
},
updater: function(result) {
   return result.ten;
}
});

$('#autoSearchImage').typeahead({
  source: function(query, process) {
   return $.get("{{ url('nhaptunhacungcap/autosearchimage') }}", {
    query: query
}, function(data) {
    return process(data);
});
},
highlighter: function (item, data) {
   var parts = item.split('#'),
   html = '<div class="d-flex" style="white-space: pre-line" >';
   html += '<div class="tx-center">';
   html += '<img src="{{ asset('image/medicine-default.jpg') }}" alt="" width="86em" >';
   html += '</div>';
   html += '<div class="mg-l-10 align-self-center" style="white-space: pre-line">';
   html += '<div>Tên: <strong>'+data.name+' -- '+data.unit+'</strong></div>';
   html += '<div>Mã HH: <strong>HH'+checkRangeValue(data.id)+'</strong> | SĐK: <strong>'+(data.reg_no || '')+'</strong> | Hoạt chất: <strong>'+(data.ingredient || '')+'</strong></div>';
   html += '<div>Quy cách ĐG: <strong>'+(data.packaging || '')+'</strong> | Hãng SX: <strong>'+(data.manufacture || '')+'</strong></div>';
   html += '</div>';
   html += '</div>';
   return html;
},
updater: function(result) {
   result.stock_id = result.id;
   result.discount = 0;
   result.price = 0;
   result.qty = 0;
   result.VAT = 0;
   result.lot_no = '';
   result.exp_date = '';
   result.dataunit = getDataUnitStock(result.stock_id);
   result.id = null;
   DataTable_hanghoa.push(result);
   loadData();
   $('#autoSearchImage').focus();
}
});

$('#autoSearch').typeahead({
  source:  function (query, process) {
   return $.get(
    "{{ url('nhaptunhacungcap/autosearch') }}",
    { query: query },
    function (data) {
     return process(data);
 });
},
highlighter: function (item, data) {
   if(data.tax_number){
    var parts = item.split('#'),
    html = '<div><strong>'+data.name+' ('+data.tax_number+')'+'</strong></div>';
}else{
    var parts = item.split('#'),
    html = '<div><strong>'+data.name+'</strong></div>';
}
return html;
},
updater: function(item) {
   console.log(item);
   $('#idSupplier').val(item.id);
   $('#tenNhaCungCap').val(item.name);
   inputSupplier();
   return item;
}
});

$('#buttonSupplier').click(function(){
    $('#labelThemMoiNhaCC').text('');
    $('#labelThemMoiNhaCC').text('Thêm mới nhà cung cấp');
})

function inputSupplier(){
  $('#autoSearch').css({'color':'#23527c' , 'text-decoration':'underline', 'cursor':'pointer'});
  $("#autoSearch").addClass("font-weight-bold");
  $("#buttonSupplier").addClass("hidden");
  $("#buttonSupplierClose").removeClass("hidden");
  $('#buttonSupplierClose').on('click', function(){
   $('#idSupplier').val("");
   $('#autoSearch').val("");
   $('#idUpdate').val("");
   $('#tenNhaCungCap').val("");
   $("#autoSearch").removeClass("font-weight-bold");
   $('#autoSearch').removeAttr("style");
   $("#buttonSupplier").removeClass("hidden");
   $("#buttonSupplierClose").addClass("hidden");
   $('#thongTinNhaCungCap').trigger("reset");
});

  $('#autoSearch').on('click', function(){
   if(($('#autoSearch').val()!='')&&($('#idSupplier').val()!='')){
    $('#exampleModal').modal('show');
    $.ajax({
     type: "GET",
     url: "{{ url('nhacungcap/{id}/edit') }}",
     data: {id:$("#idSupplier").val()},
     success: function(res) {
        $('#labelThemMoiNhaCC').text('');
        $('#labelThemMoiNhaCC').text('Thông tin nhà cung cấp: '+res.name)
        $('#supplier_id').val("NCC"+checkRangeValue(res.id))
        $('#idUpdate').val(res.id);
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

function updateData(data) {
  var key = $(data).attr("data-id");
  var value = $(data).attr("data-name");

  let inputDiscount = replaceCurrency($("input[data-name='discount'][data-id='"+key+"']").val());
  let inputTotal = replaceCurrency($("input[data-name='total'][data-id='"+key+"']").val());
  if(parseFloat(inputDiscount)>parseFloat(inputTotal)){
   $.toast({
    text : "Tổng giảm giá vượt quá thành tiền",
    position: "bottom-right",
    icon:"info",
    stack:1,
    loader:false
})
   $("input[data-name='discount'][data-id='"+key+"']").val(0);
}

let inputDate = ($("input[data-name='exp_date'][data-id='"+key+"']").val()).split("/");
if(parseInt(inputDate[0])>32){
   $.toast({
    text : "Ngày sử dụng hàng hoá "+DataTable_hanghoa[key]['name']+" không hợp lệ",
    position: "bottom-right",
    icon:"error",
    stack:1,
    loader:false
})
   $("input[data-name='exp_date'][data-id='"+key+"']").val('');
}else if(parseInt(inputDate[1])>13){
   $.toast({
    text : "Tháng sử dụng hàng hoá "+DataTable_hanghoa[key]['name']+" không hợp lệ",
    position: "bottom-right",
    icon:"error",
    stack:1,
    loader:false
})
   $("input[data-name='exp_date'][data-id='"+key+"']").val('');
}else if((parseInt(inputDate[2])<1900) || (parseInt(inputDate[2])>2100)){
   $.toast({
    text : "Năm sử dụng hàng hoá "+DataTable_hanghoa[key]['name']+" không hợp lệ",
    position: "bottom-right",
    icon:"error",
    stack:1,
    loader:false
})
   $("input[data-name='exp_date'][data-id='"+key+"']").val('');
}

if(value=='unit'){
   DataTable_hanghoa[key]['unit_id'] = $('option:selected', data).attr('data-ha');
}


DataTable_hanghoa[key][value] = $(data).val();
loadData();
if(parseFloat(inputDiscount)>parseFloat(inputTotal))
   $("input[data-name='discount'][data-id='"+key+"']").focus();

console.log(DataTable_hanghoa);
}

function removeData(index){
  DataTable_hanghoa.splice(index,1);
  listLotNo.splice(index,1);
  console.log(DataTable_hanghoa);
  loadData();
}

function duplicatedData(index){
  DataTable_hanghoa.push({
   id : null,
   stock_id : DataTable_hanghoa[index].stock_id,
   supplier_id : DataTable_hanghoa[index].supplier_id,
   unit_id : DataTable_hanghoa[index].unit_id,
   name: DataTable_hanghoa[index].name,
   lot_no: DataTable_hanghoa[index].lot_no,
   lotno_id: DataTable_hanghoa[index].lotno_id,
   exp_date: DataTable_hanghoa[index].exp_date,
   unit: DataTable_hanghoa[index].unit,
   dataunit: DataTable_hanghoa[index].dataunit,
   qty: DataTable_hanghoa[index].qty,
   price: DataTable_hanghoa[index].price,
   discount: DataTable_hanghoa[index].discount,
   VAT: DataTable_hanghoa[index].VAT
});
  loadData();
  console.log(DataTable_hanghoa);
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
  var index=0;
  $('#data-table-unit').DataTable().clear().draw();
  DataTable_unit.forEach(item=>{
   $('#data-table-unit').DataTable().row.add([
    '<select data-name="unit" onchange="updateDataUnitSelect(this)" data-id="'+index+'" style="width:160px" ><option value="">Chọn đơn vị tính</option>'+getUnit(dataUnit,DataTable_unit[index].unit)+'</select>',
    '<input class="form-control" type="text" data-name="exchange" data-id="'+index+'" value="'+(DataTable_unit[index]['exchange'])+'" onchange="updateDataUnit(this)" style="width:40px" >',
    '<input class="form-control" type="text" data-name="price_sell" data-id="'+index+'" value="'+(DataTable_unit[index]['price_sell'] || '0.00' )+'" onchange="updateDataUnit(this)" style="width:80px" >',
    '<input class="form-control" type="text" data-name="barcode" data-id="'+index+'" value="'+(DataTable_unit[index]['barcode'] || '')+'" placeholder="Mã tự động" onchange="updateDataUnit(this)" style="width:50px" >',
    '<input type="checkbox" data-name="useforsale" data-id="'+index+'" value="'+DataTable_unit[index].useforsale+'"  placeholder="Mã tự động" '+checkBoxChecked(DataTable_unit[index].useforsale)+' onchange="valueCheckBox(this)" style="width:60px;margin-top:10px" >',
    '<input type="checkbox" data-name="outofstock" data-id="'+index+'" value="'+DataTable_unit[index].outofstock+'" placeholder="Mã tự động" '+checkBoxChecked(DataTable_unit[index].outofstock)+' onchange="valueCheckBox(this)" style="width:120px;margin-top:10px" >',
    '<input class="form-control" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_unit[index]['qty'] || 1 )+'" onchange="updateDataUnit(this)" style="width:40px" disabled >',
    '<span class="fas fa-trash-alt" data-name="delunit" data-id="'+index+'" onclick="deleteUnit('+index+')" style="padding-top:60%;width:20px;color:red"></span>'
    ]).draw( false );

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

   DataTable_unit[0]['exchange'] = 1;
   $("#data-table-unit select[data-name='unit']").select2();
   $("span[data-name='delunit'][data-id='0']").addClass("hidden");

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
    '<input type="checkbox" data-name="useforsale" data-id="'+index+'" value="'+DataTable_unit[index].useforsale+'"  placeholder="Mã tự động" '+checkBoxChecked(DataTable_unit[index].useforsale)+' onchange="valueCheckBox(this)" style="width:100%;margin-top:10px" >',
    '<input type="checkbox" data-name="outofstock" data-id="'+index+'" value="'+DataTable_unit[index].outofstock+'" placeholder="Mã tự động" style="width:100%;margin-top:10px" '+checkBoxChecked(DataTable_unit[index].outofstock)+' onchange="valueCheckBox(this)" >',
    '<input class="form-control" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_unit[index]['qty'] || 1 )+'" onchange="updateDataUnit(this)" style="width:80%" disabled >',
    '<span class="fas fa-trash-alt" data-name="delunit" data-id="'+index+'" onclick="deleteUnitEdit('+index+')" style="padding-top:60%;width:100%;color:red"></span>'
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

function checkBoxChecked(Boolean){
  if(Boolean){
   return "checked"
}else{
   return ""
}
}

function editInfoStock(idStock){
  $('#data-table-lotno').DataTable().clear().draw();
  $('#data-table-select-lotno').DataTable().clear().draw();
  $('#selectLotNo').empty();
  var optionData = '';
  $.ajax({
   type: "GET",
   url: "{{ url('nhaptunhacungcap/editinfostock') }}",
   data: {id:idStock},
   success: function(success) {
    $('#labelThongTinHangHoa').text('');
    $('#labelThongTinHangHoa').text('Thông tin hàng hóa: '+success[0].name);
    if(success[0].prescription_drug){
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
 $('#barcode').val("HH"+checkRangeValue(idStock));
 $('.prescription_drug').val(success[0].prescription_drug);
 $('#stock_id').val(idStock);
 $('.name').val(success[0].name);
 $('.stock_type').val(success[0].stock_type);
 $('.stock_type').attr('disabled',true);
 $('.stock_group').val(success[0].stock_group);
 $('.stock_group').attr('disabled', true);
 $('.reg_no').val(success[0].reg_no);
 $('.ingredient').val(success[0].ingredient);
 $('.manufacture').val(success[0].manufacture);
 $('.content').val(success[0].content);
 $('.made_in').val(success[0].made_in);
 $('.packaging').val(success[0].packaging);
 AutoNumeric.getAutoNumericElement('.VAT_sell').set(success[0].VAT_sell);
 $('.note').val(success[0].note);
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
     data: {id:idStock},
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
   data: {id:idStock},
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

  $("#editStock" ).click(function() {
   let haCheck = 0;
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
        if(success){
            $.toast({
                text : "Lưu thông tin hàng hoá thành công",
                position: "bottom-right",
                icon:"success",
                stack:1,
                loader:false
            });
        }
    }
});
}
});
}

function getlistlotno(stock_id){
  var arrlotno = [];
  $.ajax({
   type: "GET",
   url: "{{ url('nhaptunhacungcap/getlistlotno') }}",
   data: {id:stock_id},
   async: false,
   success: function(success) {
    arrlotno = success
}
});
  return arrlotno;
}

function checkValue(str, max) {
    if (str.charAt(0) !== '0' || str == '00') {
      var num = parseInt(str);
      if (isNaN(num) || num <= 0 || num > max) num = 1;
      str = num > parseInt(max.toString().charAt(0)) && num.toString().length == 1 ? '0' + num : num.toString();
  };
  return str;
};

function loadData(){
  var index=0;
  $('#data-table3').DataTable().clear().draw();
  DataTable_hanghoa.forEach(item=>{
   $('#data-table3').DataTable().row.add([
    '<div style="width:100%;border:0" data-name="id" data-id="'+index+'" class="form-control" >'+(index+1)+'</div>',
    '<div data-toggle="modal" data-target="#chiTiet" style="width:100%;color:#23527c;text-decoration:underline;cursor:pointer;border:0;" data-name="code" data-id="'+index+'" onclick="editInfoStock('+item.stock_id+')" class="form-control font-weight-bold" >HH'+checkRangeValue(item.stock_id)+'</div>',

    '<div data-toggle="modal" data-target="#chiTiet" style="width:100%;color:#23527c;text-decoration:underline;cursor:pointer;border:0;" data-name="name" data-id="'+index+'" onclick="editInfoStock('+item.stock_id+')" class="form-control font-weight-bold" >'+item.name+'</div>',

    '<input style="width:70%;" data-name="lot_no" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['lot_no'] || '')+'" onchange="updateData(this)" placeholder="Số lô" class="form-control" />',

    '<div class="input-group"><span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span><input style="width:90px;" class="form-control" type="text" data-name="exp_date" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['exp_date'] || '')+'" onchange="updateData(this)" placeholder="DD/MM/YYYY" /></div>',

    '<select style="width:100%;" onchange="updateData(this)" data-name="unit" data-id="'+index+'">'+getUnit(DataTable_hanghoa[index].dataunit,DataTable_hanghoa[index].unit)+'</select>',

    '<input style="width:60%;" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['qty'] || 0)+'" onchange="updateData(this)" class="form-control" />',
    '<input style="width:70%;" type="text" data-name="price" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['price'] || 0)+'" onchange="updateData(this)" class="form-control" />',
    '<input style="width:70%;" type="text" data-name="discount" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['discount'] || 0)+'" onchange="updateData(this)" class="form-control" />',
    '<input style="width:50%;" type="text" data-name="VAT" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['VAT'] || 0)+'" onchange="updateData(this)" class="form-control" />',
    '<input type="text" style="width:100%;border:0;background:none" data-name="price_import" data-id="'+index+'" onchange="updateData(this)" class="form-control" value="'+decialNumber(price_import(DataTable_hanghoa[index]['qty'] || 0,DataTable_hanghoa[index]['price'] || 0,DataTable_hanghoa[index]['discount'] || 0,DataTable_hanghoa[index]['VAT'] || 0))+'" disabled />',
    '<input type="text" style="width:100%;border:0;background:none" data-name="total" data-id="'+index+'" onchange="updateData(this)" class="form-control" value="'+decialNumber(total(DataTable_hanghoa[index].qty || 0,DataTable_hanghoa[index].price || 0,DataTable_hanghoa[index].discount || 0,DataTable_hanghoa[index].VAT || 0))+'" disabled />',
    '<span class="fa fa-plus-square" style="color:#0753a1;cursor:pointer;font-size:125%" data-id="'+index+'" onclick="duplicatedData('+index+')"></span> <span class="fas fa-trash-alt" style="color:#bd2130;cursor:pointer;font-size:125%" data-id="'+index+'" onclick="removeData('+index+')"></span>'
    ]).draw( false );

   $("#data-table3 select[data-name='unit']").select2({
    minimumResultsForSearch : -1
});

   new DateTime($("input[data-name='exp_date'][data-id='"+index+"']"),{
    format: 'DD/MM/YYYY',
});

   new AutoNumeric("input[data-name='qty'][data-id='"+index+"']", {
    minimumValue: 0,
    modifyValueOnWheel: false,
    unformatOnHover: false,
    decimalPlaces: 0,
});
   new AutoNumeric("input[data-name='price'][data-id='"+index+"']",{
    minimumValue: 0,
    modifyValueOnWheel: false,
    unformatOnHover: false
});
   new AutoNumeric("input[data-name='discount'][data-id='"+index+"']",{
    minimumValue: 0,
    modifyValueOnWheel: false,
    unformatOnHover: false
});
   new AutoNumeric("input[data-name='VAT'][data-id='"+index+"']", {
    maximumValue: 100,
    minimumValue: 0,
    decimalPlaces: 0,
    modifyValueOnWheel: false,
    unformatOnHover: false
});

   $("input[data-name='exp_date'][data-id='"+index+"']").bind('keyup', function(e) {
    this.type = 'text';
    var input = this.value;
    if (/\D\/$/.test(input)) input = input.substr(0, input.length - 3);
    var values = input.split('/').map(function(v) {
     return v.replace(/\D/g, '')
 });
    if (values[0]) values[0] = checkValue(values[0], 31);
    if (values[1]) values[1] = checkValue(values[1], 12);
    var output = values.map(function(v, i) {
     return v.length == 2 && i < 2 ? v + '/' : v;
 });
    this.value = output.join('').substr(0, 10);
});

   if(!(index in listLotNo)){
    listLotNo[index] = getlistlotno(item.stock_id);
}

$("input[data-name='lot_no']").on("click", function(){
    var id = $(this).attr("data-id");
    listLotNoArr = [];
    listLotNo[id].forEach(item=>{
     listLotNoArr.push({
      index : id,
      id : item.id,
      name : item.lot_no,
      exp_date : item.exp_date,
      price_import : item.price_import
  });
 });
    ev = $.Event("keydown")
    ev.keyCode = ev.which = 40
    $(this).trigger(ev)
    return true
});

$("input[data-name='lot_no']").typeahead({
    minLength: 0,
    source: function(query, process) {
     return process(listLotNoArr);
 },
 highlighter: function (item, data) {
     var parts = item.split('#'),
     html = 'Số lô: '+data.name+' - HSD: '+data.exp_date+' - Giá nhập: '+data.price_import;
     return html;
 },
 updater: function(item) {
     DataTable_hanghoa[item.index].lot_no = item.name;
     DataTable_hanghoa[item.index].exp_date = item.exp_date;
     DataTable_hanghoa[item.index].price = item.price_import;
     DataTable_hanghoa[item.index].lotno_id = item.id;
     return item;
 }
});
index++;
});

var sumTotal = $("input[data-name='total']")
.map(function(){return replaceCurrency($(this).val());}).get();
var fixTotalMoney = decialNumber(sum(sumTotal));
$('#totalMoney').val(fixTotalMoney);
const element = AutoNumeric.getAutoNumericElement('#totalPaid');
element.set(fixTotalMoney);


var sumDiscount = $("input[data-name='discount']")
.map(function(){return replaceCurrency($(this).val());}).get();
$('#totalDiscount').val(decialNumber(sum(sumDiscount)));

var sumQty = $("#data-table3 input[data-name='qty']")
.map(function(){return replaceCurrency($(this).val());}).get();
var sumPrice = $("input[data-name='price']")
.map(function(){return replaceCurrency($(this).val());}).get();
var sumArr = sumQty.map((a, i) => parseFloat(a)*parseFloat(sumPrice[i]));

$('#totalPrice').val(decialNumber(sum(sumArr)));

var tempMoney = parseFloat(replaceCurrency($('#totalMoney').val()));
var tempPrice = parseFloat(replaceCurrency($('#totalPrice').val()));
var tempDiscount = parseFloat(replaceCurrency($('#totalDiscount').val()));
var tempPaid = parseFloat(replaceCurrency($('#totalPaid').val()));
$('#totalVAT').val(decialNumber(tempMoney-tempPrice+tempDiscount));

$('#totalDebt').val(decialNumber(substrac(tempMoney,tempPaid) || 0));
}

$('#totalPaid').change(function(){
	var tempMoney = parseFloat(replaceCurrency($('#totalMoney').val()));
	var tempPaid = parseFloat(replaceCurrency($('#totalPaid').val()));

	if(tempPaid>tempMoney){
		AutoNumeric.getAutoNumericElement('#totalPaid').set($('#totalMoney').val());
		$('#totalDebt').val("0.00");
	}else{
		$('#totalDebt').val(decialNumber(tempMoney-tempPaid));
	}
})

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
					(~data[3].toLowerCase().indexOf(supplierName))
					) ? true : false;
			}
			);

		$('#data-table1').DataTable()
		.columns(6).search($("#searchByStatus").val())
		.columns(8).search($("#searchByStock").val())
		.draw();

	}
}

$(document).ready(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

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
			url: "{{ url('nhaptunhacungcap') }}",
			"dataSrc" : function (result) {
				result['data'].forEach(item=>{
					item.total = total(item.qty,item.price,item.discount,item.VAT);
				});
				var newData = [], idArr = [];

				result['data'].forEach(function (a) {
					if (!this[a.id]) {
						this[a.id] = { id: a.id, total: 0, stockName : ''};
						idArr.push(this[a.id]);
					}
					this[a.id].total += parseFloat(a.total);
					this[a.id].stockName += a.stockName + ' ';
				}, Object.create(null));

				idArr.forEach(item=>{
					var flag = 0;
					Object.keys(result['data']).forEach(function(key) {
						if (result['data'][key]['id'] == item.id){
							flag++;
							if(flag==1){
								result['data'][key]['total'] = item.total;
								result['data'][key]['stockName'] = item.stockName;
								newData.push(result['data'][key]);
							}
						}
					});
				})

				return newData;
			}
		},
		columns: [
		{ data: 'id', name: 'id', orderable: false},
		{ data: null,
			"render": function(data,type,row) { return "PN"+checkRangeValue(data["id"]) }
		},
		{ data: null, orderable: false,
			"render": function(data,type,row) { return data["date"]+' '+data['hour']}
		},
		{ data: 'name', name: 'name', orderable: false},
		{ data: null, orderable: false,
			"render": function(data,type,row) { return decialNumber(data["total"])}
		},
		{ data: 'note', name: 'note' , orderable: false},
		{ data: 'status', name: 'status', orderable: false},
		{ data: 'action', name: 'action', orderable: false},
		{ data: 'stockName', name: 'stockName', orderable: false},
		],
        dom: 'Blfrtip',
        buttons: [
        {
            extend: 'excelHtml5',
            title: 'PhieuNhapTuNhaCungCap_'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
            text:'<span class="text-light">Xuất file Excel</span>',
            exportOptions: {
                columns: [1, 2, 3, 4, 5]
            },
        }
        ],
        "columnDefs": [
        {
         "targets": [ 8 ],
         "visible": false
     },
     ]
 });
    $('.dt-buttons a[aria-controls="data-table1"]').appendTo('#exportExcel');
    table1.on('order.dt search.dt', function () {
      table1.column(0).nodes().each(function (cell, i) {
         cell.innerHTML = i + 1;
     });
  }).draw();

    searchDateTable();
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
  dataWarehouse = getdatawarehouse();

  var table2 = $('#data-table2').DataTable({
      "responsive": true,
      "select": true,
      "lengthChange": false,
      "ordering": false,
      "pagingType": "full_numbers",
      "language": {
         "processing": "Đang xử lý...",
         "sLengthMenu": " _MENU_ Bản ghi hiển thị",
         "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
         "info": "Kết quả tìm kiếm (_TOTAL_ bản ghi) ",
         "infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
         "infoFiltered": "",
         "emptyTable": "Không có dữ liệu",
         "loadingRecords": "Đang tải...",
         "select": {
            "rows": {
               "_": "Đã chọn (%d)"
           }
       },
       "paginate": {
        "first": "Đầu",
        "last": "Cuối",
        "next": "Sau",
        "previous": "Trước"
    },
},
ajax : {
 url: "{{ url('banhang/autosearchimage') }}",
 "dataSrc" : function (data) {
    let warehouse = [];
    let lotnoArr = [];
    data.forEach(function (a) {
        if (!this[a.lotno_id]) {
            this[a.lotno_id] = { lotno_id: a.lotno_id, qty: 0};
            lotnoArr.push(this[a.lotno_id]);
        }
        if((a.type=='import_from_supplier') || (a.type=='import_inventory') || (a.type=='return_from_customer')){
            this[a.lotno_id].qty += parseInt(a.qty);
        }else{
            this[a.lotno_id].qty -= parseInt(a.qty);
        }
    }, Object.create(null));

    lotnoArr.forEach(item=>{
        var flag = 0;
        Object.keys(data).forEach(function(key) {
            if (data[key]['lotno_id'] == item.lotno_id){
                flag++;
                if(flag==1){
                    data[key]['qty'] = item.qty;
                    warehouse.push(data[key]);
                }
            }
        });
    })
    return warehouse;
}
},
columns: [
{ data: null,
 "render": function(data,type,row) { return "HH"+checkRangeValue(data["id"])}
},
{ data: 'name', name: 'name' },
{ data: null,
 "render": function(data,type,row) {
    if(data['qty']>0){
       return data["qty"]
   }else{
       return 0;
   }
}
},
{ data: 'unit', name: 'unit' },
{ data: 'reg_no', name: 'reg_no' },
{ data: 'packaging', name: 'packaging' },
{ data: 'made_in', name: 'made_in' },
{ data: 'ingredient', name: 'ingredient' },
]
});
  $( "#timKiemNangCao" ).click(function(){
      $('#data-table2').DataTable().search( $( "#inputTimKiemNangCao" ).val()).draw();
      console.log($( "#searchProduct" ).val());
  });

  var table3 = $('#data-table3').DataTable({
      "ordering" : false,
      "paging":false,
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
});

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
    }
});
  $('#data-table-unit_info').detach().appendTo('#info-data-table-unit');


  $('#data-table2 tbody').on( 'click', 'tr', function () {
      $(this).toggleClass('selected');
  });

  $("#submitHangHoa1" ).click(function(){
      let haCheck = 0;
      if($('#autoSearchTable').val()==''){
         haCheck = 1;
         $.toast({
            text : "Chưa nhập tên hàng hoá",
            position: "bottom-right",
            icon:"error",
            stack:1,
            loader:false
        })
         $('#autoSearchTable').focus();
     }else if($('#tenHangHoaTable').val()==''){
         haCheck = 1;
         $.toast({
            text : "Chưa nhập tên hàng hoá",
            position: "bottom-right",
            icon:"error",
            stack:1,
            loader:false
        })
         $('#autoSearchTable').focus();
     }else if($('#qty').val()==0){
         haCheck = 1;
         $.toast({
            text : "Số lượng nhập phải lớn hơn 0",
            position: "bottom-right",
            icon:"error",
            stack:1,
            loader:false
        })
         $('#qty').focus();
     }else if($('.lot_no').val()==''){
         haCheck = 1;
         $.toast({
            text : "Số lô không được phép để trống",
            position: "bottom-right",
            icon:"error",
            stack:1,
            loader:false
        })
         $('.lot_no').focus();
     }else if($('#exp_date').val()==''){
         haCheck = 1;
         $.toast({
            text : "Hạn sử dụng không được phép để trống",
            position: "bottom-right",
            icon:"error",
            stack:1,
            loader:false
        })
         $('#exp_date').focus();
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

    let exp_date = $('#exp_date').val();
    let formatDate = exp_date.split("/");

    if(parseInt(formatDate[0])>32){
     haCheck = 1;
     $.toast({
        text : "Xin hãy nhập hạn sử dụng hợp lệ",
        position: "bottom-right",
        icon:"error",
        stack:1,
        loader:false
    })
     $('#exp_date').val('');
     $('#exp_date').focus();
 }else if(parseInt(formatDate[1])>13){
     haCheck = 1;
     $.toast({
        text : "Xin hãy nhập hạn sử dụng hợp lệ",
        position: "bottom-right",
        icon:"error",
        stack:1,
        loader:false
    })
     $('#exp_date').val('');
     $('#exp_date').focus();
 }else if((parseInt(formatDate[2])<1900) || (parseInt(formatDate[2])>2100)){
     haCheck = 1;
     $.toast({
        text : "Xin hãy nhập hạn sử dụng hợp lệ",
        position: "bottom-right",
        icon:"error",
        stack:1,
        loader:false
    })
     $('#exp_date').val('');
     $('#exp_date').focus();
 }
 if(haCheck==0){

     $('#themTuDM').modal('hide');
     $('#autoSearchTable').attr('disabled', false);
     $('#stock_type').attr('disabled', false);
     $('#stock_group').attr('disabled', false);
     hangHoa1 = [];
     hangHoa1 = $('#themHangHoa').serializeArray();

     $.ajax({
        url: "{{ url('hanghoa') }}",
        type: "POST",
        data: hangHoa1,
        success: function( response ) {
        }
    });

     $.ajax({
        url: "{{ url('hanghoa/submitunit') }}",
        type: "POST",
        dataType:'json',
        contentType: 'json',
        data: JSON.stringify(DataTable_unit),
        contentType: 'application/json; charset=utf-8',
        success: function( success ) {
        }
    });

     var hangHoa1Object = {};
     $.each(hangHoa1,
        function(i, v) {
           hangHoa1Object[v.name] = v.value;
       });

     hangHoa1Object.exp_date = exp_date;
     hangHoa1Object.dataunit = getDataUnitStock(hangHoa1Object.stock_id);
     DataTable_hanghoa.push(hangHoa1Object);
     loadData();
     console.log(DataTable_hanghoa);
     document.getElementById("themHangHoa").reset();
     $('#data-table-unit').DataTable().clear().draw();

 }

});

$('#resetFormThemHangHoa').click(function(){
  $('#autoSearchTable').attr('disabled', false);
  $('#stock_group').attr('disabled', false);
  $('#stock_type').attr('disabled', false);
  $('.unitfirst').attr('disabled', false);
  $('#unit').attr('disabled', false);
  $('#themHangHoa').trigger("reset");
  DataTable_unit = [];
  loadDataUnit();
})

$("#submitHangHoa2" ).click(function() {
  hangHoa2 = table2.rows('.selected').data().toArray();
  table2.$('tr.selected').removeClass('selected');
  $('#timkiem').modal('hide');
  hangHoa2.forEach(item=>{
     item.stock_id = item.id;
     item.discount = 0;
     item.id = null;
     item.price = 0;
     item.qty = 0;
     item.VAT = 0;
     item.dataunit = getDataUnitStock(item.stock_id);
     DataTable_hanghoa.push(item);
 });
  loadData();
});

var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$.ui.autocomplete.prototype._renderMenu = function(ul, items) {
  var self = this;
  ul.append("<table style='width:100%' class='table table-bordered tx-13 tx-gray-700 mg-b-0 bd'><thead><tr><th class='bg-primary' style='color: white;'>ID</th><th class='bg-primary' style='color: white;'>Tên thuốc</th><th class='bg-primary' style='color: white;'>SĐK</th><th class='bg-primary' style='color: white;'>ĐVT</th><th class='bg-primary' style='color: white;'>Hoạt chất</th><th class='bg-primary' style='color: white;'>Quy cách</th><th class='bg-primary' style='color: white;'>Hãng sản xuất</th></tr></thead><tbody></tbody></table>");
  $.each( items, function( index, item ) {
     self._renderItemData(ul, ul.find("table tbody"), item );
 });
};
$.ui.autocomplete.prototype._renderItemData = function(ul,table, item) {
  return this._renderItem( table, item ).data( "ui-autocomplete-item", item );
};
$.ui.autocomplete.prototype._renderItem = function(table, item) {
  return $( "<tr class='ui-menu-item' role='presentation'></tr>" )
  .append( "<td>"+item.id+"</td>"+"<td>"+item.name+"</td>"+"<td>"+item.reg_no+"</td>"+"<td>"+item.unit+"</td>"+"<td>"+(item.ingredient || '')+"</td>"+"<td>"+(item.packaging || '')+"</td>"+"<td>"+(item.manufacture || '')+"</td>" )
  .appendTo( table );
};

$("#autoSearchTable").autocomplete({
  source: function( request, response ) {
     $.ajax({
        url:"{{url('nhaptunhacungcap/autosearchtable')}}",
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
     $('#autoSearchTable').val(ui.item.name);
     $('#tenHangHoaTable').val(ui.item.name);
     $('#autoSearchTable').attr('disabled', true);
     $('.prescription_drug').val(ui.item.prescription_drug);
     $('#idStockTable').val(ui.item.id)
     $('#stock_type').val(ui.item.stock_type);
     $('#stock_type').attr('disabled', true);
     $('#stock_group').val(ui.item.stock_group);
     $('#stock_group').attr('disabled', true);
     $('#reg_no').val(ui.item.reg_no);
     $('#ingredient').val(ui.item.ingredient);
     $('#unit').attr('disabled', true);
     $('#unit').val(ui.item.unit);
     $('#unit_id').val(ui.item.unit_id);
     $('#manufacture').val(ui.item.manufacture);
     $('#content').val(ui.item.content);
     $('#made_in').val(ui.item.made_in);
     $('#packaging').val(ui.item.packaging);
     AutoNumeric.getAutoNumericElement('#VAT_sell').set(ui.item.VAT_sell);
     AutoNumeric.getAutoNumericElement('#price_sell').set(ui.item.price_sell);
     $('#noteStock').val(ui.item.note);

     listLotNoArr = getlistlotno(ui.item.id);
     listLotNoArr.forEach(item=>{
        item.name = item.lot_no
    });

     $("#searchLotNo").typeahead({
        minLength: 0,
        source: function(query, process) {
            return process(listLotNoArr);
        },
        highlighter: function (item, data) {
            var parts = item.split('#'),
            html = `Số lô: ${data.name} - HSD: ${data.exp_date} - Giá nhập: ${data.price_import}`
            return html;
        },
        updater: function(item) {
            $('#searchLotNo').val(item.lot_no);
            $('#exp_date').val(item.exp_date);
            $('#lotno_id').val(item.id);
            AutoNumeric.getAutoNumericElement('#price').set(item.price_import);
            return item;
        }
    });

     $("#searchLotNo").on("click", function(){
        ev = $.Event("keydown")
        ev.keyCode = ev.which = 40
        $(this).trigger(ev)
        return true
    });

     $.ajax({
        type: "GET",
        url: "{{ url('nhaptunhacungcap/getlistunitwithid') }}",
        data: {id:ui.item.id},
        success: function(response) {
           $('.unitfirst').val(response[0].unit);
           $('.unitfirst').attr('disabled', true);
           DataTable_unit = response;
           loadDataUnit();
       }
   });
     return false;
 }
});
});

function getUnit(list,selected){
	var unitList = [];
	if(Array.isArray(list)){
		list.forEach(item => {
			if(item.name == selected){
				unitList = unitList + '<option data-ha="'+item.unit_id+'" value="'+item.name+'" selected>'+item.name+'</option>';
			}else{
				unitList = unitList + '<option data-ha="'+item.unit_id+'" value="'+item.name+'">'+item.name+'</option>';
			}
		});
	}else{
		unitList = '<option data-ha="'+item.unit_id+'" value="'+list+'">'+list+'</option>';
	}
	return unitList;
}

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

function getDataUnitStock(stock_id){
	var dataUnitStock = [];
	$.ajax({
		type: "GET",
		url: "{{ url('nhaptunhacungcap/getlistunitwithid') }}",
		data: {id:stock_id},
		async: false,
		success: function(response) {
			response.forEach(item=>{
				dataUnitStock.push({
					name : item.unit,
					unit_id: item.id
				});
			});
		}
	});
	return dataUnitStock;
}

function addUnit(){
	if($('#autoSearchTable').val()){
		DataTable_unit.push({
			id : null,
			stock_id : DataTable_unit[0].stock_id,
			unit : null,
			exchange : 0,
			price_sell : DataTable_unit[0].price_sell,
			barcode : null,
			useforsale : 1,
			outofstock : 0,
			qty : 1
		});
	}else{
		DataTable_unit.push({
			id : null,
			unit : null,
			stock_id : null,
			exchange : 0,
			price_sell : 0,
			barcode : null,
			useforsale : 1,
			outofstock : 0,
			qty : 1
		});
	}
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

$("#submitPhieuNhap").click(function(){
	if(DataTable_hanghoa==''){
		$.toast({
			text : "Chưa có hàng hoá",
			position: "bottom-right",
			icon:"error",
			stack:1,
			loader:false
		})
	}else{
		let haCheck = 0;
		for(let i =0;i<DataTable_hanghoa.length;i++){
			if($('#autoSearch').val()==''){
				haCheck = 1;
				$.toast({
					text : "Chưa chọn nhà cung cấp",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
				$('#autoSearch').focus();
			}else if($('#tenNhaCungCap').val()==''){
				haCheck = 1;
				$.toast({
					text : "Hãy chọn lại nhà cung cấp đã được lưu trong cơ sở dữ liệu hoặc tạo mới nhà cung cấp",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
				$('#autoSearch').focus();
			}else if($('#dateImport').val()==''){
				haCheck = 1;
				$.toast({
					text : "Ngày nhập hàng không được để trống",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
				$('#dateImport').focus();
			}else if($('#hourImport').val()==''){
				haCheck = 1;
				$.toast({
					text : "Giờ nhập hàng không được để trống",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
				$('#hourImport').focus();
			}else if(DataTable_hanghoa[i]['lot_no']==''){
				haCheck = 1;
				$.toast({
					text : "Số lô hàng hoá "+DataTable_hanghoa[i]['name']+" không được để trống",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
				$("input[data-name='lot_no'][data-id='"+i+"']").focus();
			}else if(DataTable_hanghoa[i]['exp_date']==''){
				haCheck = 1;
				$.toast({
					text : "Hạn sử dụng hàng hoá "+DataTable_hanghoa[i]['name']+" ko được để trống",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
				$("input[data-name='exp_date'][data-id='"+i+"']").focus();
			}else if(DataTable_hanghoa[i]['qty']==0){
				haCheck = 1;
				$.toast({
					text : "Số lượng phải lớn hơn không",
					position: "bottom-right",
					icon:"error",
					stack:1,
					loader:false
				})
				$("input[data-name='qty'][data-id='"+i+"']").focus();
			}
		}

		if(haCheck==0){
			$.ajax({
				url: "{{ url('nhaptunhacungcap/submitnhacungcap') }}",
				type: "POST",
				data: $('#submitNhaCungCap').serialize()+"&totalpaid="+replaceCurrency($('#totalPaid').val()),
				success: function( response ) {
					DataTable_hanghoa.forEach(item => {
						item.idha = response.id;
						item.qty = replaceCurrency(item.qty);
						item.price = replaceCurrency(item.price);
						item.discount = replaceCurrency(item.discount);
						item.VAT = replaceCurrency(item.VAT);
                        item.type = "import_from_supplier"
                    });
					$.ajax({
						url: "{{ url('nhaptunhacungcap/submitlotno') }}",
						type: "POST",
						dataType:'json',
						contentType: 'json',
						data: JSON.stringify(DataTable_hanghoa),
						contentType: 'application/json; charset=utf-8',
						success: function( ress ) {
							let i = 0;
							DataTable_hanghoa.forEach(item => {
								item.lotno_id = ress[i].id;
								i++;
							});
							console.log(DataTable_hanghoa);
							$.ajax({
								url: "{{ url('nhaptunhacungcap/submitphieunhap') }}",
								type: "POST",
								dataType:'json',
								contentType: 'json',
								data: JSON.stringify(DataTable_hanghoa),
								contentType: 'application/json; charset=utf-8',
								success: function( data ) {
									$('#data-table1').DataTable().ajax.reload();
									$.toast({
										text: "Tạo phiếu thành công",
										position: "bottom-right",
										icon: "success",
										stack: 1,
										loader: false
									});
									resetTab();
								}
							});
						}
					});
				}
			});
		}
	}
});

function detailFunc(id){
	$.ajax({
		type:"GET",
		url: "{{ url('nhaptunhacungcap/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
            $('#labelChiTietPhieuNhap').html(`Phiếu nhập từ nhà cung cấp - PN${checkRangeValue(res.id)}`)
			$('#detailid').val("PN"+checkRangeValue(res.id));
			$('#detailname').val(res.name);
			$('#detaildate').val(res.date);
			$('#detailnote').val(res.note);
			$('#detailPaid').val(decialNumber(res.totalpaid));
			console.log(res);

			$.ajax({
				type:"GET",
				url: "{{ url('nhaptunhacungcap/editstock') }}",
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
							"render": function(data,type,row) {
								return data['name'] +'</br><div class="font-weight-bold">HH'+checkRangeValue(data['stock_id'])+'</div>'
							}
						},
						{ data: null,
							"render": function(data,type,row) {
								return data['lot_no'] +'</br><span class="font-weight-bold">HSD: </span>'+data['exp_date']
							}
						},
						{ data: null,
							"render": function(data,type,row) {
								return decialNumber(data['price'])}
							},
							{ data: null,
								"render": function(data,type,row) {
									return data['qty'] +' <span class="font-weight-bold">('+data['unit']+')'
								}
							},
							{ data: null,
								"render": function(data,type,row) {
									return decialNumber(data['discount'])
								}
							},
							{ data: null,
								"render": function(data,type,row) {
									return data['VAT']+'%'
								}
							},
							{ data: null,
								"render": function(data,type,row) { return decialNumber(total(data["qty"],data["price"],data["discount"],data["VAT"]))}
							},
							]
						});

					table4.on('order.dt search.dt', function () {
						table4.column(0).nodes().each(function (cell, i) {
							cell.innerHTML = i + 1;
						});
					}).draw();

					var detailPrice = response.reduce((a,b)=>
						a+b.qty*parseFloat(b.price),0
						);
					var detailDiscount = response.reduce((a, b)=>
						parseFloat(a) + parseFloat(b.discount),0
						);
					var detailMoney = response.reduce((a, b)=>
						parseFloat(a) + parseFloat(total(b.qty,b.price,b.discount,b.VAT)),0
						);

					$('#detailPrice').val(decialNumber(detailPrice));
					$('#detailDiscount').val(decialNumber(detailDiscount));
					$('#detailMoney').val(decialNumber(detailMoney));

					var tempMoney = parseFloat(replaceCurrency($('#detailMoney').val()));
					var tempPrice = parseFloat(replaceCurrency($('#detailPrice').val()));
					var tempDiscount = parseFloat(replaceCurrency($('#detailDiscount').val()));
					$('#detailVAT').val(decialNumber(tempMoney-tempPrice+tempDiscount));

					var tempPaid = parseFloat(replaceCurrency($('#detailPaid').val()));
					$('#detailDebt').val(decialNumber(substrac(tempMoney,tempPaid)));
					console.log(response);
				}
			});
		}
	});

}

function editFunc(id){
	$.ajax({
		type:"GET",
		url: "{{ url('nhaptunhacungcap/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
            $('#labelTaoMoiPhieuNhap').html(`Nhập từ nhà cung cấp > Sửa phiếu: PN${checkRangeValue(res.id)}`);
            $('#id').val(res.id);
            $('#idSupplier').val(res.idsupplier);
            $('#autoSearch').val(res.name);
            $('#tenNhaCungCap').val(res.name);
            $('#dateImport').val(res.date);
            $('#hourImport').val(res.hour);
            $('.note').val(res.note);
            inputSupplier();
            $.ajax({
                type:"GET",
                url: "{{ url('nhaptunhacungcap/editstock') }}",
                data: { id: id },
                dataType: 'json',
                success: function(response){
                   response.forEach(item=>{
                      item.dataunit = getDataUnitStock(item.stock_id);
                      item.totalPaid = res.totalpaid
                  })
                   DataTable_hanghoa = response;
                   console.log(DataTable_hanghoa);
                   loadData();

                   AutoNumeric.getAutoNumericElement('#totalPaid').set(new Intl.NumberFormat('en-US').format(res.totalpaid));
                   var tempMoney = parseFloat(replaceCurrency($('#totalMoney').val()));
                   $('#totalDebt').val(new Intl.NumberFormat('en-US').format(tempMoney-res.totalpaid));
               }
           });
        }
    });
}

function duplicatedFunc(id){
	$.ajax({
		type:"GET",
		url: "{{ url('nhaptunhacungcap/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			$('#idSupplier').val(res.idsupplier);
			$('#autoSearch').val(res.name);
			$('#tenNhaCungCap').val(res.name);
			$('#dateImport').val(res.date);
			$('#hourImport').val(res.hour);
			$('.note').val(res.note);
			inputSupplier();
			$.ajax({
				type:"GET",
				url: "{{ url('nhaptunhacungcap/editstock') }}",
				data: { id: id },
				dataType: 'json',
				success: function(response){
					response.forEach(item => {
						item.dataunit = getDataUnitStock(item.stock_id);
						item.supplier_id = null;
						item.id = null
					});
					DataTable_hanghoa = response;
					console.log(DataTable_hanghoa);
					loadData();
				}
			});
		}
	});
}

function printFunc(id){
	$.ajax({
		type:"GET",
		url: "{{ url('nhaptunhacungcap/edit') }}",
		data: { id: id },
		dataType: 'json',
		success: function(res){
			$.ajax({
				type:"GET",
				url: "{{ url('nhaptunhacungcap/editstock') }}",
				data: { id: id },
				dataType: 'json',
				success: function(response){
					var detailPrice = response.reduce((a,b)=>
						a+b.qty*parseFloat(b.price),0
						);
					var detailDiscount = response.reduce((a, b)=>
						parseFloat(a) + parseFloat(b.discount),0
						);
					var detailMoney = response.reduce((a, b)=>
						parseFloat(a) + parseFloat(total(b.qty,b.price,b.discount,b.VAT)),0
						);
					var mywindow = window.open('', 'PRINT','height=800,width=1100');
					mywindow.document.write(`
						<table style="width:100%">
						<tbody>
						<tr>
						<td class="text-uppercase"><strong>Hộ Kinh Doanh Nhà Thuốc Morioka</strong></td>
						<td style="text-align:right">Mã phiếu:</td>
						<td><strong>PN`+checkRangeValue(res.id)+`</strong></td>
						</tr>
						<tr>
						<td>Địa chỉ:</td>
						<td style="text-align:right">Ngày:</td>
						<td><strong>`+res.date +' '+ res.hour +`</strong></td>
						</tr>
						</tbody>
						</table>

						<p style="text-align:center"><strong>PHIẾU NHẬP TỪ NHÀ CUNG CẤP</strong></p>

						<table class="mg-b-0 tx-13 tx-gray-700" style="width:100%">
						<tbody>
						<tr>
						<td>Nhà cung cấp:<strong>`+res.name+`</strong></td>
						<td style="text-align:right"></td>
						<td>Mã hoá đơn:<strong></strong></td>
						</tr>
						<tr>
						<td>Địa chỉ:<strong>`+(res.address || '')+`</strong></td>
						<td style="text-align:right"></td>
						<td>Ngày tạo:<strong></strong></td>
						</tr>
						<tr>
						<td>Số điện thoại:<strong>`+(res.phone || '')+`</strong></td>
						</tr>
						<tr>
						<td>&nbsp;</td>
						</tr>
						</tbody>
						</table>
						<p>&nbsp;</p>
						<table style="border-collapse:collapse;width:100%;font-size:90%;" border="1" cellpadding="6" cellspacing="6">
						<tbody>
						<tr>
						<th>#</th>
						<th>Mã HH</th>
						<th>Tên hàng hoá</th>
						<th>Số lô</th>
						<th>HSD</th>
						<th>Số lượng</th>
						<th>Đơn giá</th>
						<th>Tổng giảm giá</th>
						<th>VAT</th>
						<th>Thành tiền</th>
						</tr>`);

					let dem = 0
					response.forEach(item=>{
						dem++;
						mywindow.document.write(`
							<tr>
							<td class="center">`+dem+`</td>
							<td>`+checkRangeValue(item.stock_id)+`</td>
							<td>`+item.name+`</td>
							<td>`+item.lot_no+`</td>
							<td>`+item.exp_date+`</td>
							<td>`+item.qty+' ('+item.unit+`)</td>
							<td>`+decialNumber(item.price)+`</td>
							<td>`+decialNumber(item.discount)+`</td>
							<td>`+item.VAT+`%</td>
							<td>`+decialNumber(total(item.qty,item.price,item.discount,item.VAT))+`</td>
							</tr>`)
					});

					mywindow.document.write(`
						</tbody>
						</table>
						<p>&nbsp;</p>
						<table class="mg-b-0 tx-13 tx-gray-700" style="width:100%;margin-top:50px">
						<tbody>
						<tr>
						<td style="text-align:right"><strong>Tổng tiền hàng:&ensp;`+decialNumber(detailPrice)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Giảm giá:&ensp;`+decialNumber(detailDiscount)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Tổng tiền trước thuế:&ensp;</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Tổng VAT:&ensp;`+decialNumber(detailMoney-detailPrice-detailDiscount)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Tổng tiền:&ensp;`+decialNumber(detailMoney)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Thanh toán:&ensp;`+decialNumber(detailMoney)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>Công nợ:&ensp;`+decialNumber(detailMoney-res.totalpaid)+`</strong></td>
						</tr>
						<tr>
						<td style="text-align:right"><strong>NGƯỜI NHẬP</strong></td>
						</tr>
						</tbody>
						</table>`);
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

function changeFunc(id){
	Swal.fire({
		title: "Hệ thống sẽ huỷ các phiếu chi có liên quan đến phiếu PN0000"+id+ " Bạn chắc chắn muốn huỷ phiếu này?",
		icon: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		confirmButtonText: 'Đồng ý!'
	}).then((result) => {
		if (result.value) {
			$.ajax({
				type:"POST",
				url: "{{ url('nhaptunhacungcap/active') }}",
				data: { id: id },
				dataType: 'json',
				success: function(res){
					$.toast({
						text : "Huỷ phiếu thành công",
						position: "bottom-right",
						icon:"success",
						stack:1,
						loader:false
					});
					$('#data-table1').DataTable().ajax.reload();
				}
			});
		} else {
			swal("Cancelled Successfully");
		}
	});
}

$('#thongTinNhaCungCap').submit(function(e) {
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
			console.log(data);
			$("#thongTinNhaCungCap").load(
				$.toast({
					text: "Lưu dữ liệu thành công",
					position: "bottom-right",
					icon: "success",
					stack: 1,
					loader: false
				}));
			$('#exampleModal').modal('hide');
			$('#thongTinNhaCungCap').trigger("reset");
		},
		error: function(data) {
			console.log(data);
		}
	});
});

</script>
<script type="text/javascript">
    $( "#themTuDM" ).on('shown.bs.modal', function(){
      $('#themHangHoa').trigger("reset");
      $('#autoSearchTable').attr('disabled', false);
      $('#stock_group').attr('disabled', false);
      $('#stock_type').attr('disabled', false);
      $('.unitfirst').attr('disabled', false);
      $('#unit').attr('disabled', false);

      $('#data-table-unit').DataTable().clear().draw();
      $('#stock_group').select2({
       minimumResultsForSearch: -1
   });
      DataTable_unit=[];
      addUnit();
      loadDataUnit();
  });

    function haChange(){
      let qty = $('#qty').val();
      let price = $('#price').val();
      let discount = $('#discount').val();
      let VAT = $('#VAT').val();
      $('#thanhTien').val(decialNumber(total(qty || 0,price || 0,discount || 0,VAT || 0)));
      let thanhTien = $('#thanhTien').val();
      if(parseFloat(replaceCurrency(discount))>parseFloat(replaceCurrency(thanhTien))){
       $.toast({
        text : "Tổng giảm giá vượt quá thành tiền",
        position: "bottom-right",
        icon:"info",
        stack:1,
        loader:false
    })
       AutoNumeric.getAutoNumericElement('#discount').set(0)
   }
}

$(document).ready(function(){

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
    "infoEmpty": "Danh sách dữ liệu (0 bản ghi)",
    "infoFiltered": "",
    "emptyTable": "Không có dữ liệu",
    "loadingRecords": "Đang tải...",
},
});

  new DateTime($("#exp_date"),{
   format: 'DD/MM/YYYY',
});

  new AutoNumeric("#totalPaid",{
   minimumValue: 0,
   modifyValueOnWheel: false,
   unformatOnHover: false
});
  new AutoNumeric("#qty", {
   minimumValue: 0,
   decimalPlaces: 0,
   modifyValueOnWheel: false,
   unformatOnHover: false
});
  new AutoNumeric("#price", {
   minimumValue: 0,
   modifyValueOnWheel: false,
   unformatOnHover: false
});
  new AutoNumeric("#price_sell", {
   minimumValue: 0,
   modifyValueOnWheel: false,
   unformatOnHover: false
});
  new AutoNumeric("#discount", {
   minimumValue: 0,
   modifyValueOnWheel: false,
   unformatOnHover: false
});
  new AutoNumeric("#VAT", {
   maximumValue: 100,
   minimumValue: 0,
   decimalPlaces: 0,
   modifyValueOnWheel: false,
   unformatOnHover: false
});
  new AutoNumeric("#VAT_sell", {
   maximumValue: 100,
   minimumValue: 0,
   decimalPlaces: 0,
   modifyValueOnWheel: false,
   unformatOnHover: false
});
  new AutoNumeric(".VAT_sell", {
   maximumValue: 100,
   minimumValue: 0,
   decimalPlaces: 0,
   modifyValueOnWheel: false,
   unformatOnHover: false
});

  $('.fc-datepicker').datepicker({
   showOtherMonths: true,
   selectOtherMonths: true,
   dateFormat:'dd/mm/yy'
});
  $('.toggle').toggles({
   on: true,
   height: 26
});
  $('#closeCong').click(function () {
   $('#cong').modal("hide");
});
  $('#tpBasic').timepicker();
  $('#tpBasic1').timepicker();

  $("#inTab2").click(function(){
    $('#labelTaoMoiPhieuNhap').html(`Nhập từ nhà cung cấp > Tạo mới`);
    resetTab();
    $(".tab1").addClass("hidden");
    $(".tab2").removeClass("hidden");
})

  $("#outTab2").click(function(){
   if(DataTable_hanghoa!=''){
    Swal.fire({
     title: "Thông tin phiếu chưa được lưu, bạn có muốn trở về danh sách không ?",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Đồng ý!'
 })
}else{
    resetTab();
}
})

});
$(function() {
  let thongTinNhaCungCap = $("#thongTinNhaCungCap");
  if (thongTinNhaCungCap.length) {
   thongTinNhaCungCap.validate({
    rules: {
     name: {
      required: true,
      minlength: 6
  }
},
messages: {
 name: {
  required: "Vui lòng bạn nhập tên nhà cung cấp.",
  minlength: "vui lòng bạn nhập tên trên 5 kí tự"
}
},
})
}
})


</script>
<script type="text/javascript">
    function resetTab(){
      $('#idSupplier').val("");
      $('#autoSearch').val("");
      $('#autoSearchImage').val("");
      $('#tenNhaCungCap').val("");
      $('#idUpdate').val("");
      $('#id').val("");
      $('#submitNhaCungCap').trigger("reset");
      $('#autoSearch').removeAttr("style");
      $('#autoSearch').removeClass("font-weight-bold");
      $("#buttonSupplier").removeClass("hidden");
      $("#buttonSupplierClose").addClass("hidden");
      $(".tab1").removeClass("hidden");
      $(".tab2").addClass("hidden");
      DataTable_hanghoa = [];
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

function checkNameStock(name){
  let res = [];
  $.ajax({
     type: "GET",
     url: "{{ url('nhaptunhacungcap/checkNameStock') }}",
     data: {name:name},
     async: false,
     success: function(success) {
        res = success
    }
});
  return res;
}

$(document).ready(function(){
    new AutoNumeric("#totalPaidImportExcel", {
        minimumValue: 0,
        modifyValueOnWheel: false,
        unformatOnHover: false
    });
    let dataOk = [];
    let totalImportExcel = 0;
    $('#importExcelFile').change(function(){
        $('#statusUploadFile').css("display","block");

        var filename = $(this).val().replace(/C:\\fakepath\\/i, '');

        if(this.files[0].size > 1000000) {
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
                url: "{{ url('nhaptunhacungcap/import') }}",
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
                            'maHH': dataImportArr[i][0],
                            'name': dataImportArr[i][1],
                            'lot_no': dataImportArr[i][2],
                            'exp_date': dataImportArr[i][3],
                            'qty': dataImportArr[i][4],
                            'unit': dataImportArr[i][5],
                            'price': dataImportArr[i][6],
                            'discount': dataImportArr[i][7],
                            'VAT': dataImportArr[i][8]
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
                        if(!item.errors || !item.name || !item.lot_no || !item.exp_date || !item.unit || (typeof(parseInt(item.qty))=='string') || (typeof(parseFloat(item.price))=='string') || (typeof(parseFloat(item.discount))=='string') || (typeof(parseInt(item.VAT))=='string') || (parseInt(item.qty)<0) || (parseInt(item.price)<0) || (parseInt(item.discount)<0) || (parseInt(item.VAT)>100) || (parseInt(item.VAT)<0) ){
                            dataNotOk.push(item);
                        }else{
                            let dataTemp = checkNameStock(item.name);
                            let dataUnitTemp = [];
                            dataTemp['units'].forEach(uh=>{
                                if(item.unit.toLowerCase()==uh.unit.toLowerCase()){
                                    item.unit_id = uh.id;
                                }
                            })
                            let checkDate = item.exp_date.split('/');
                            let checkDataOk = 0;
                            if(parseInt(checkDate[0])<0 || parseInt(checkDate[0])>31){
                                checkDataOk = 1;
                            }
                            if(parseInt(checkDate[1])<0 || parseInt(checkDate[1])>12){
                                checkDataOk = 1;
                            }
                            if(parseInt(checkDate[2])<2021){
                                checkDataOk = 1;
                            }

                            if(checkDataOk==0){
                                item.lotnos = dataTemp['lotnos'];
                                dataOk.push(item);
                            }else{
                                dataNotOk.push(item);
                            }
                        }
                    });
                    totalImportExcel = 0;
                    dataOk.forEach(item=>{
                        item.total = parseFloat(total(parseInt(item['qty']) || 0,parseFloat(item['price']) || 0,parseFloat(item['discount']) || 0,parseInt(item['VAT']) || 0));
                        totalImportExcel += item.total
                    });
                    $("#totalImportExcel").val(decimalNumber(totalImportExcel));
                    AutoNumeric.getAutoNumericElement('#totalPaidImportExcel').set(totalImportExcel);

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
                        { data: 'lot_no'},
                        { data: 'exp_date'},
                        { data: null,
                            "render": function(data,type,row){
                                return new Intl.NumberFormat('en-US').format(data['qty']);
                            }
                        },
                        { data: 'unit'},
                        { data: null,
                            "render": function(data,type,row){
                                return decimalNumber(data['price']);
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                return decimalNumber(data['discount']);
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                return data['VAT'];
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                return decialNumber(data['total']);
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
                                if(data['name']){
                                    if(data['errors']){
                                        return data['name'];
                                    }else{
                                        return `<span class='text-danger'><strong class="text-dark">HH ${data['name']}</strong> chưa có trong hàng hoá</span>`;
                                    }
                                }else{
                                    return "<span class='text-danger'>Tên HH là bắt buộc</span>";
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(data['lot_no']){
                                    return data['lot_no'];
                                }else{
                                    return "<span class='text-danger'>Số lô là bắt buộc</span>";
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(data['exp_date']){
                                    return data['exp_date'];
                                }else{
                                    return "<span class='text-danger'>Số đăng ký là bắt buộc</span>";
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(typeof(parseInt(data['qty']))=='string'){
                                    return "<span class='text-danger'>Số lượng không hợp lệ</span>";
                                }else{
                                    return new Intl.NumberFormat('en-US').format(data['qty']);
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(data['unit']){
                                    return data['unit'];
                                }else{
                                    return "<span class='text-danger'>Đơn vị tính là bắt buộc</span>";
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(typeof(parseFloat(data['price']))=='string'){
                                    return "<span class='text-danger'>Giá nhập không hợp lệ</span>";
                                }else{
                                    return decimalNumber(data['price']);
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(typeof(parseFloat(data['discount']))=='string'){
                                    return "<span class='text-danger'>Giá nhập không hợp lệ</span>";
                                }else{
                                    return decimalNumber(data['discount']);
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(typeof(parseInt(data['VAT']))=='string'){
                                    return "<span class='text-danger'>VAT nhập không hợp lệ</span>";
                                }else{
                                    return data['VAT'];
                                }
                            }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                return "<span class='text-danger'>Không hợp lệ</span>";
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

$("#totalPaidImportExcel").change(function(){
    let valueTotalImport = replaceCurrency($('#totalImportExcel').val());
    let valueTotalPaidImport = replaceCurrency($('#totalPaidImportExcel').val());
    let valueDebtImport = replaceCurrency($('#debtImportExcel').val());
    if(parseFloat(valueTotalPaidImport)>parseFloat(totalImportExcel)){
        AutoNumeric.getAutoNumericElement('#totalPaidImportExcel').set(totalImportExcel);
        $("#debtImportExcel").val("0.00");
    }else{
        let calcul = valueTotalImport - valueTotalPaidImport;
        AutoNumeric.getAutoNumericElement('#totalPaidImportExcel').set(valueTotalPaidImport);
        $("#debtImportExcel").val(decimalNumber(calcul));
    }
})

$('#autoSearchImport').typeahead({
  source:  function (query, process) {
   return $.get(
    "{{ url('nhaptunhacungcap/autosearch') }}",
    { query: query },
    function (data) {
     return process(data);
 });
},
highlighter: function (item, data) {
   if(data.tax_number){
    var parts = item.split('#'),
    html = '<div><strong>'+data.name+' ('+data.tax_number+')'+'</strong></div>';
}else{
    var parts = item.split('#'),
    html = '<div><strong>'+data.name+'</strong></div>';
}
return html;
},
updater: function(item) {
   $('#idSupplierImport').val(item.id);
   $('#autoSearchImport').addClass("font-weight-bold");
   $('#autoSearchImport').attr("readonly",true);
   $('#autoSearchImport').css({'color':'#23527c' , 'text-decoration':'underline', 'cursor':'pointer'});
   return item;
}
});

$('#submitImport').click(function(){
    if(dataOk.length==0){
        toastr.info('Danh sách hàng hoá hợp lệ là 0 xin vui lòng kiểm tra lại');
    }else if(!$('#autoSearchImport').val()){
        $('#autoSearchImport').focus();
        toastr.info('Hãy chọn nhà cung cấp');
    }else if( !$('#idSupplierImport').val()){
        $('#autoSearchImport').focus();
        toastr.info('Hãy chọn nhà cung cấp');
    }else{
        $.ajax({
            url: "{{ url('nhaptunhacungcap/submitnhacungcap') }}",
            type: "POST",
            data: $('#importSupplier').serialize()+"&totalpaid="+replaceCurrency($('#totalPaidImportExcel').val()),
            success: function( response ) {
                dataOk.forEach(item => {
                    item.id = null;
                    item.idha = response.id;
                    item.type = "import_from_supplier";
                    let checkLotNoDataOk = 0;
                    item.lotnos.forEach(lotno=>{
                        let price_importWithoutDot = lotno.price_import.split('.'); 
                        item.stock_id = lotno.stock_id;
                        if(lotno.lot_no!==item.lot_no){
                            checkLotNoDataOk = 1;
                        }
                        if(lotno.exp_date!==item.exp_date){
                            checkLotNoDataOk = 1;
                        }
                        if(price_importWithoutDot[0]!==item.price){
                            checkLotNoDataOk = 1;
                        }
                        if(checkLotNoDataOk==0){
                            item.lotno_id = lotno.id;
                            console.log(lotno.id);
                            console.log(item.lotno_id);
                        }else{
                            item.lotno_id = null;
                        }
                    });
                });

                $.ajax({
                    url: "{{ url('nhaptunhacungcap/submitlotno') }}",
                    type: "POST",
                    dataType:'json',
                    contentType: 'json',
                    data: JSON.stringify(dataOk),
                    contentType: 'application/json; charset=utf-8',
                    success: function( ress ) {
                        let i = 0;
                        dataOk.forEach(item => {
                            item.lotno_id = ress[i].id;
                            i++;
                        });
                        $.ajax({
                            url: "{{ url('nhaptunhacungcap/submitphieunhap') }}",
                            type: "POST",
                            dataType:'json',
                            contentType: 'json',
                            data: JSON.stringify(dataOk),
                            contentType: 'application/json; charset=utf-8',
                            success: function( data ) {
                                $('#data-table1').DataTable().ajax.reload();
                                toastr.success('Thêm mới phiếu nhập từ excel thành công');
                                $('#importExcelModal').modal('toggle');
                            }
                        });
                    }
                });
            }
        });
    }
});

$('#importExcelModal').on('shown.bs.modal', function () {
    $("#autoSearchImport").removeClass("font-weight-bold");
    $('#autoSearchImport').removeAttr("style");
    $('#autoSearchImport').removeAttr("readonly");
    $('#autoSearchImport').val("");
    $('#idSupplierImport').val("");

    $('#importExcelForm').trigger("reset");
    $('#statusUploadFile').empty();
    datatableHopLeImport();
    datatableKhongHopLeImport();
});
$('#buttonCloseImportExcel').click(function(){
    $("#autoSearchImport").removeClass("font-weight-bold");
    $('#autoSearchImport').removeAttr("style");
    $('#autoSearchImport').removeAttr("readonly");
    $('#autoSearchImport').val("");
    $('#idSupplierImport').val("");
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
})
</script>
<style type="text/css">
    #data-table-select-lotno_length select {
        width: 50px;
    }

    #data-table-lotno_length select {
        width: 50px;
    }

    #data-table-select-lotno_info {
        padding-right: 10px;
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
    #data-table2 .mahh{
        width: 5%!important;
    }
    #data-table2 .tenhh{
        width: 20%!important;
    }
    #data-table2 .tonkho{
        width: 10%!important;
    }
    #data-table2 .dvt{
        width: 5%!important;
    }
    #data-table2 .sdk{
        width: 15%!important;
    }
    #data-table2 .qcdg{
        width: 20%!important;
    }
    #data-table2 .hsx{
        width: 15%!important;
    }
    #data-table2 .hcc{
        width: 10%!important;
    }
</style>
@endsection

