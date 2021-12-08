@extends('default')
@section('title','Báo cáo xuất nhập tồn thuốc')
@section('content')
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Báo cáo xuất nhập tồn thuốc kiểm soát và đặc biệt
                </h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="btn_in" style="padding-right:10px;">
                        <button class="btn btn-info"><em class="fa fa-file-excel-o"></em>Xuất file excel</button>
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
                            <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-3 col-lg-2">
                        <label for="">Tới ngày</label>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                            <input type="text" class="form-control fc-datepicker" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-2">
                        <label for="">Trạng thái hàng hóa</label>
                        <select class="js-example-basic-single form-control" id="status" name="state">
                            <option value="">Tất cả</option>
                            <option value="">Kích hoạt</option>
                            <option value="">Tạm dừng</option>
                        </select>
                    </div>
                    <div class="col-md-4 col-lg-2">
                        <label for="">Tồn kho</label>
                        <select class="js-example-basic-single form-control" id="tonkho" name="state">
                            <option value="">Tất cả</option>
                            <option value="">Hàng còn tồn trong kỳ</option>
                            <option value="">Hàng đã hết</option>

                        </select>
                    </div>
                    <div class="col-md-4 col-lg-2">
                        <label for="">Hạn sử dụng</label>
                        <select class="js-example-basic-single form-control" id="hansudung" name="state">
                            <option value="">Tất cả</option>
                            <option value="">Sử dụng tốt</option>
                            <option value="">Sắp hết hạn</option>
                            <option value="">Đã hết hạn</option>
                        </select>
                    </div>
                </div>
                <div class="row tx-gray-900 mg-t-20">
                    <div class="col-md-4 col-lg-2">
                        <label for="">Nhóm hàng</label>
                        <select class="js-example-basic-single form-control" name="state">
                            <option value="">Kiểm soát đặc biệt</option>
                        </select>
                    </div>
                    <div class="col-md-9 row">
                        <div class="col-md-9">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control"
                                placeholder="Tìm kiếm theo mã hoá đơn, mã phiếu hoặc nhà cung cấp">

                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info"><em class="fa fa-search"></em>Tìm kiếm</button>
                        </div>
                    </div>
                </div>
                <div class="mg-t-20">
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Mã hàng hóa</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ttên hàng hóa</th>
                                <th scope="col" class="bg-primary" style="color: white;">Số lô</th>
                                <th scope="col" class="bg-primary" style="color: white;">Hạn dùng</th>
                                <th scope="col" class="bg-primary" style="color: white;">ĐVT
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Tồn đầu</th>
                                <th scope="col" class="bg-primary" style="color: white;">Nhập</th>
                                <th scope="col" class="bg-primary" style="color: white;">Xuất</th>
                                <th scope="col" class="bg-primary" style="color: white;">Thất thoát nhầm lẫn</th>
                                <th scope="col" class="bg-primary" style="color: white;">Hao hụt</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tồn cuối</th>
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
        <!--  -->
    </div>

    <!-- tab2 -->
    <div class="pos-absolute t-0 l-0 hidden" id="tab2">
    </div>
    <!-- end tab2 -->

</div><!-- br-mainpanel -->
<script>
    // Datepicker
        $('.fc-datepicker').datepicker({
        	showOtherMonths: true,
        	selectOtherMonths: true
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

</script>
@endsection
