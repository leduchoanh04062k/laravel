@extends('default')
@section('title','Báo cáo')
@section('content')
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Sổ theo dõi thu hồi thuốc</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="mg-r-10">
                        <!-- Button thêm mới -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <em class="fa fa-plus"></em>
                            Thêm mới
                        </button>

                        <!-- Modal thêm mới-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title tx-gray-900 text-white" id="exampleModalLabel">Phiếu theo
                                            dõi thu hồi thuốc</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" name="theoDoiThuHoiThuoc" id="theoDoiThuHoiThuoc" method="post">
                                        @csrf
                                        <div class="modal-body">

                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="info">
                                                    <div class="row mg-t-10">
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-bold">Ngày tạo <span
                                                                    class="text-danger">*</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon"><i
                                                                        class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                                <input type="text" name="date"
                                                                    class="form-control fc-datepicker"
                                                                    value="<?php echo date("d/m/Y"); ?>"
                                                                    placeholder="MM/DD/YYYY">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Nơi yêu cầu thu
                                                                hồi <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" name="recall">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Địa điểm thu hồi
                                                                <span class="text-danger">*</span></label>
                                                            <input type="text" name="location" class="form-control"
                                                                value="Hộ Kinh Doanh Nhà Thuốc Morioka">
                                                        </div>
                                                    </div>
                                                    <div class="row mg-t-10">
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Hàng hóa thu hồi
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <div class='pos-relative'>
                                                                <input type="text" name="name" id="autoSearchImage"
                                                                    class="form-control"
                                                                    placeholder="Nhập từ khoá tìm kiếm"
                                                                    autocomplete="off">
                                                                <div id="resetFormThemHangHoa"
                                                                    class="btn btn-danger pos-absolute r-0 t-0 "><i
                                                                        class="fa fa-times"></i></div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Hàm lượng
                                                            </label>
                                                            <input type="text" class="form-control" readonly
                                                                name="ingredient" id="ingredient">
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Nơi sản
                                                                xuất</label>
                                                            <input type="text" class="form-control" readonly
                                                                name="made_in" id="made_in">
                                                        </div>
                                                    </div>
                                                    <div class="row mg-t-10">
                                                        <div class="col-md-4 ">
                                                            <label for="" class="tx-gray-800 tx-bold">Số lô <span
                                                                    class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="lot_no" class="form-control"
                                                                id="searchLotNo">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="" class="tx-gray-800 tx-bold">Số lượng thu hồi
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" name="qty_th" class="form-control"
                                                                placeholder="" value="1">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="" class="tx-gray-800 tx-bold">Đơn vị tính<span
                                                                    class="text-danger">*</span></label>
                                                            <select
                                                                class="form-control unitfirst select2 select2-container"
                                                                style="width:100%" name="unit_th">
                                                                @foreach (App\Models\Unit::all() as $units)
                                                                <option value=""></option>
                                                                <option value="{{ $units->unit }}">
                                                                    {{ $units->unit }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            <label id="unit_th-error" class="error"
                                                                for="unit_th"></label>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="" class="tx-gray-800 tx-bold">Số lượng bán ra
                                                                <span class="text-danger">*</span>

                                                            </label>
                                                            <input type="text" class="form-control" value="1"
                                                                name="qty_br">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="" class="tx-gray-800 tx-bold">Đơn vị tính <span
                                                                    class="text-danger">*</span></label>
                                                            <select
                                                                class="form-control unitfirst select2 select2-container"
                                                                style="width:100%" name="unit_br">
                                                                @foreach (App\Models\Unit::all() as $units)
                                                                <option value=""></option>
                                                                <option value="{{ $units->unit }}">
                                                                    {{ $units->unit }}
                                                                </option>
                                                                @endforeach
                                                            </select>
                                                            <label id="unit_br-error" class="error"
                                                                for="unit_br"></label>
                                                        </div>
                                                    </div>
                                                    <div class="row mg-t-10">
                                                        <div class="col-md-3 col-lg-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Nhà cung cấp
                                                            </label>
                                                            <select
                                                                class="js-example-basic-single form-control select2 select2-container"
                                                                name="spplier" style="width:100%">
                                                                @foreach (App\Models\Supplier::all() as $spplier)
                                                                <option value=""></option>
                                                                <option value="{{ $spplier->name }}">
                                                                    {{ $spplier->name }}
                                                                </option>
                                                                @endforeach

                                                            </select>
                                                            <label id="spplier-error" class="error"
                                                                for="spplier"></label>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Địa chỉ
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <input type="text" class="form-control" placeholder=""
                                                                name="address">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Số điện thoại
                                                            </label>
                                                            <input type="text" class="form-control" value=""
                                                                name="phone">
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label for="" class="tx-gray-800 tx-bold">Fax
                                                            </label>
                                                            <input type="text" class="form-control" name="fax">
                                                        </div>
                                                    </div>
                                                    <div class="row mg-t-10">
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Lý do thu hồi
                                                                <span class="text-danger">*</span>
                                                            </label>
                                                            <textarea class="form-control" rows="3"
                                                                name="reason"></textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Dự kiến biện pháp
                                                                xử lý<span class="text-danger">*</span>
                                                            </label>
                                                            <textarea class="form-control" rows="3"
                                                                name="reason_xl"></textarea>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class="tx-gray-800 tx-bold">Ghi chú
                                                            </label>
                                                            <textarea class="form-control" rows="3"
                                                                name="note"></textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em>
                                                Lưu và thêm mới</button>
                                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em>
                                                Lưu và đóng</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                    class="fa fa-close" aria-hidden="true"></em> Đóng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="btn_in" style="padding-right:10px;">
                        <button type="button" class="btn btn-info" id="exportExcelDBLotNo">
                            <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
                        </button>
                    </div>
                    <div class="btn_excel" style="padding-right:10px;">
                        <button class="btn bg-primary text-white" onclick="window.print()">
                            <em class="fa fa-print"></em>
                            In sổ
                        </button>
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
                        <label for="">Từ ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByStartDate"
                                value="<?php echo date("01/m/Y"); ?>" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Tới ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" id="searchByEndDate"
                                value="<?php echo date("d/m/Y"); ?> " placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-5 row">
                        <div class="col-md-10">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control" placeholder="Tìm kiếm nơi thu hồi...."
                                id="searchBySupplier">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <div class="col-md-2 align-self-end">
                                <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"> <i
                                        class="fas fa-search" style="padding: 3px"></i>Tìm kiếm</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20">
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" style="100%" id="data-table1">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày tạo</th>
                                <th scope="col" class="bg-primary" style="color: white;">Nơi yêu cầu thu hồi</th>
                                <th scope="col" class="bg-primary" style="color: white;"> Tên hàng hóa</th>
                                <th scope="col" class="bg-primary" style="color: white;">Số lượng thu hồi</th>
                                <th scope="col" class="bg-primary" style="color: white;">Số lượng bán ra
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Địa điểm
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Lý do thu hồi</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ghi chú</th>
                                <th scope="col" class="bg-primary" style="color: white;"> Thao Tác</th>
                            </tr>
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
        <!-- Modal sua theo doi thuoc-->
        <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
                <div class="modal-content">
                    <div class="modal-header bg-primary">
                        <h5 class="modal-title tx-gray-900 text-white" id="exampleModalLabel">Phiếu theo dõi thu hồi
                            thuốc</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" name="suaTheoDoiThuHoiThuoc" id="suaTheoDoiThuHoiThuoc" method="post">
                        @csrf
                        <div class="modal-body">

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane active" id="info">
                                    <div class="row mg-t-10">
                                        <div class="col-md-4">
                                            <label for="" class="tx-bold">Ngày tạo <span
                                                    class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-addon"><i
                                                        class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                                                <input type="hidden" id="id" name="id">
                                                <input type="text" name="date" id="date"
                                                    class="form-control fc-datepicker"
                                                    value="<?php echo date("d/m/Y"); ?>" placeholder="MM/DD/YYYY">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Nơi yêu cầu thu hồi <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="recall" id="recall">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Địa điểm thu hồi <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" name="location" class="form-control"
                                                value="Hộ Kinh Doanh Nhà Thuốc Morioka">
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Hàng hóa thu hồi <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <div class='pos-relative'>
                                                <input type="text" name="name" id="autoSearchImage"
                                                    class="form-control name" placeholder="Nhập từ khoá tìm kiếm"
                                                    autocomplete="off" readonly>
                                                <div id="resetFormThemHangHoa"
                                                    class="btn btn-danger pos-absolute r-0 t-0 "><i
                                                        class="fa fa-times"></i></div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Hàm lượng
                                            </label>
                                            <input type="text" class="form-control ingredient" readonly
                                                name="ingredient">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Nơi sản
                                                xuất</label>
                                            <input type="text" class="form-control made_in" readonly name="made_in"
                                                id="">
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-4 ">
                                            <label for="" class="tx-gray-800 tx-bold">Số lô <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="lot_no" class="form-control lot_no"
                                                id="searchLotNo">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="tx-gray-800 tx-bold">Số lượng thu hồi
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" name="qty_th" id="qty_th" class="form-control"
                                                placeholder="" value="1">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="tx-gray-800 tx-bold">Đơn vị tính<span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control unitfirst select2 select2-container"
                                                style="width:100%" name="unit_th" id="unit_th">
                                                @foreach (App\Models\Unit::all() as $units)
                                                <option value="{{ $units->unit }}">
                                                    {{ $units->unit }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label id="unit_th-error" class="error" for="unit_th"></label>
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="tx-gray-800 tx-bold">Số lượng bán ra
                                                <span class="text-danger">*</span>

                                            </label>
                                            <input type="text" class="form-control" value="1" name="qty_br" id="qty_br">
                                        </div>
                                        <div class="col-md-2">
                                            <label for="" class="tx-gray-800 tx-bold">Đơn vị tính <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control unitfirst select2 select2-container"
                                                style="width:100%" name="unit_br" id="unit_br">
                                                @foreach (App\Models\Unit::all() as $units)
                                                <option value="{{ $units->unit }}">
                                                    {{ $units->unit }}
                                                </option>
                                                @endforeach
                                            </select>
                                            <label id="unit_br-error" class="error" for="unit_br"></label>
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-3 col-lg-3">
                                            <label for="" class="tx-gray-800 tx-bold">Nhà cung cấp </label>
                                            <select
                                                class="js-example-basic-single form-control select2 select2-container"
                                                id="spplier" name="spplier" style="width:100%">
                                                @foreach (App\Models\Supplier::all() as $spplier)
                                                <option value=""></option>
                                                <option value="{{ $spplier->name }}">
                                                    {{ $spplier->name }}
                                                </option>
                                                @endforeach

                                            </select>
                                            <label id="spplier-error" class="error" for="spplier"></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Địa chỉ
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input type="text" class="form-control" placeholder="" name="address"
                                                id="address">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Số điện thoại
                                            </label>
                                            <input type="text" class="form-control" value="" name="phone" id="phone">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="" class="tx-gray-800 tx-bold">Fax
                                            </label>
                                            <input type="text" class="form-control" name="fax" id="fax">
                                        </div>
                                    </div>
                                    <div class="row mg-t-10">
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Lý do thu hồi <span
                                                    class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control" rows="3" name="reason"
                                                id="reason"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Dự kiến biện pháp xử lý<span
                                                    class="text-danger">*</span>
                                            </label>
                                            <textarea class="form-control" rows="3" name="reason_xl"
                                                id="reason_xl"></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="" class="tx-gray-800 tx-bold">Ghi chú
                                            </label>
                                            <textarea class="form-control" rows="3" name="note" id="note"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu và thêm
                                mới</button>
                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu và
                                đóng</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><em class="fa fa-close"
                                    aria-hidden="true"></em> Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    var DataTable_hanghoa = [];
    var DataTable_unit = [];
    var hangHoa2 = [];
    var hangHoa1 = [];
    var listLotNo = [];
    var listLotNoArr = [];
    var dataUnit = [];
    var searchLotNo = [];


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

    $('#autoSearchImage').typeahead({
    source: function(query, process) {
        return $.get("{{ url('khachhangtralai/autosearchimage') }}", {
            query: query
        }, function(data) {
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
        html += '<div>Tên: <strong>'+data.name+'| '+data.lot_no+'</strong></div>';
        html += '<div>SĐK: <strong>'+data.reg_no+'</strong> | Mã HH: <strong>HH0000'+data.id+'</strong></div>';
        html += '<div>Quy cách ĐG: <strong>'+data.packaging+'</strong> | Hãng SX: <strong>'+data.made_in+'</strong></div>';
        html += '</div>';
        html += '</div>';
        return html;
    },
    updater: function(item) {
        $('#made_in').val(item.made_in);
        $('#ingredient').val(item.ingredient);
        // $('#searchLotNo').val(item.lot_no);
        $('#autoSearchImage').focus();
        listLotNoArr = getlistlotno(item.id);
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
					html = `${data.name} `
					return html;
				},
				updater: function(item) {
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
				data: {id:item.id},
				success: function(response) {
					$('.unitfirst').val(response[0].unit);
					DataTable_unit = response;
					loadDataUnit();
				}
			});
			// return false;

return item;
    }
});

function editFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('theodoithuhoithuoc/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#id').val(res.id);
        $('#recall').val(res.recall);
        $('#date').val(res.date);
        $('.name').val(res.name);
        $('.ingredient').val(res.ingredient);
        $('.made_in').val(res.made_in);
        $('.lot_no').val(res.lot_no);
        $('#qty_th').val(res.qty_th);
        $('#unit_th').val(res.unit_th);
        $('#qty_br').val(res.qty_br);
        $('#unit_br').val(res.unit_br);
        $('#spplier').val(res.spplier);
        $('#address').val(res.address);
        $('#phone').val(res.phone);
        $('#fax').val(res.fax);
        $('#reason').val(res.reason);
        $('#reason_xl').val(res.reason_xl);
        $('#note').val(res.note);
      }
    });
  }



$('#suaTheoDoiThuHoiThuoc').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "{{ url('theodoithuhoithuoc')}}",
      data: formData,
      cache:false,
      contentType: false,
      processData: false,
      success: (data) => {
        $("#chiTiet").modal('hide');
        $("#chiTiet").load(
          $.toast({
            text : "Lưu dữ liệu thành công",
            position: "bottom-right",
            icon:"success",
            stack:1,
            loader:false
          }));
        $('#data-table1').DataTable().ajax.reload();
      },
      error: function(data){
        console.log(data);
      }
    });
  });


  function deleteFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('theodoithuhoithuoc/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
          title: "Bạn chắc chắn muốn xóa phiếu thu hồi: "+res.name+" này không ?",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type:"DELETE",
              url: "{{ url('theodoithuhoithuoc/{id}') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                $("#data-table1").load(
                  $.toast({
                    text : "Xóa dữ liệu thành công",
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
        })
      }
    });
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

            var minDay = $('#searchByStartDate').val().split("/");
            var maxDay = $('#searchByEndDate').val().split("/");
            var temp = data[1].split(" ");
            var tempDate =temp[0].split("/");

            date = new Date(tempDate[1] + '/' + tempDate[0] + '/' + tempDate[2])
            startDate = new Date(minDay[1] + '/' + minDay[0] + '/' + minDay[2]);
            endDate = new Date(maxDay[1] + '/' + maxDay[0] + '/' + maxDay[2]);

            return (
                (startDate === null && endDate === null) ||
                (startDate === null && date <= endDate) ||
                (startDate <= date && endDate === null ) ||
                (moment(date).isSameOrAfter(startDate) && moment(date).isSameOrBefore(endDate))
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
                (~data[2].toLowerCase().indexOf(supplierName))
                ) ? true : false;
        }
        );

    $('#data-table1').DataTable()
    .draw();
}
};
        $(document).ready(function () {
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
            url: "{{ url('theodoithuhoithuoc') }}",
        },


            columns: [
            { data: 'id', name: 'id', orderable: false},
            { data: 'date', name: 'date', orderable: false},
            { data: 'recall', name: 'recall', orderable: false},
            { data: 'name', name: 'name', orderable: false},
            { data: 'qty_th', name: 'qty_th', orderable: false},
            { data: 'qty_br', name: 'qty_br', orderable: false},
            { data: 'location', name: 'location', orderable: false},
            { data: 'reason', name: 'reason', orderable: false},
            { data: 'note', name: 'note', orderable: false},
            { data: 'action', name: 'action'},
    ],
    dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, xlsBuilder, {
                extend: 'excelHtml5',
                title: 'SoTheoDoiThuHoiThuoc'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
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

            $('#resetFormThemHangHoa').click(function(){
            $('#exampleModal').attr('disabled', false);
            $('#autoSearchImage').attr('disabled', false);
            $('#theoDoiThuHoiThuoc').trigger("reset");
            DataTable_unit = [];
            loadDataUnit();
            })

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


     $(function(){
      let theoDoiThuHoiThuoc = $("#theoDoiThuHoiThuoc");
      if(theoDoiThuHoiThuoc.length){
        theoDoiThuHoiThuoc.validate({
          rules:{
            name:{
              required:true
            },
            recall:{
              required:true
            },
            lot_no:{
              required:true
            },
            // spplier:{
            //   required:true
            // },
            address:{
              required:true
            },
            reason:{
              required:true
            },
            reason_xl:{
              required:true
            },
            qty_th:{
              required:true
            },
            unit_th:{
              required:true
            },
            qty_br:{
              required:true
            },
            unit_br:{
              required:true
            },
          },
          messages:{
            name:{
              required:'Vui lòng điền thông tin hàng hóa'
            },
            recall:{
              required:'Vui lòng điền thông tin'
            },
            lot_no:{
                required:'Vui lòng điền thông tin'
            },
            // spplier:{
            //     required:'Vui lòng điền thông tin'
            // },
            address:{
                required:'Vui lòng điền thông tin'
            },
            reason:{
                required:'Vui lòng điền thông tin'
            },
            reason_xl:{
                required:'Vui lòng điền thông tin'
            },
            qty_th:{
                required:'Vui lòng điền đơn vị tính'
            },
            unit_th:{
                required:'Vui lòng điền thông tin'
            },
            qty_br:{
                required:'Vui lòng điền thông tin'
            },
            unit_br:{
                required:'Vui lòng điền đơn vị tính'
            },
          },
          submitHandler: function(form) {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });
            $("#submit"). attr("disabled", true);
            $.ajax({
              url: "{{ url('theodoithuhoithuoc') }}",
              type: "POST",
              data: $('#theoDoiThuHoiThuoc').serialize(),
              success: function( response ) {
                $('#data-table1').DataTable().ajax.reload();
                $("#submit").attr("disabled", false);
                $("#submit").load(
                  $.toast({
                    text : "Thêm mới sổ theo dõi thu hồi thuốc thành công",
                    position: "bottom-right",
                    icon:"success",
                    stack:1,
                    loader:false
                  }));
                document.getElementById("theoDoiThuHoiThuoc").reset();
              }
            });
          }
        })
      }
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
        k: 'E',
        v: 'SỔ THEO DÕI THU HỒI THUỐC'
      }
      ]);

      sheet.childNodes[0].childNodes[1].innerHTML = r1 + r2 + r3 + sheet.childNodes[0].childNodes[1].innerHTML;
    },
    exportOptions: {
      columns: [1, 2, 3, 4, 5, 6,7,8]
    },
  }
</script>
@endsection
