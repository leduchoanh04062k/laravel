@extends('default')
@section('title','Báo cáo')
@section('content')
 <!-- ########## END: RIGHT PANEL ########## --->

    <!-- ########## START: MAIN PANEL ########## -->
    <div class="br-mainpanel pos-relative">
        <div>
            <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
                <div class="row">
                    <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Báo Cáo</h4>
                </div>
            </div>
            <!-- Content -->
            <div class="br-pagebody pd-x-20 pd-sm-x-30">
                <!-- <div class=”container"> -->
                <div class="row">
                    <a href="{{asset('bcdoanhthubanhang')}}" >
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Báo cáo doanh thu bán hàng</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{asset('bcdoanhthubanhang')}}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('bcnhaphang') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Báo cáo nhập hàng</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ asset('bcnhaphang') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('sotheodoidoam') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Số theo dõi nhiệt độ- độ ẩm</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ asset('sotheodoidoam') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{asset ('sotheodoitheodon') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Sổ theo dõi bán theo theo đơn</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{asset ('sotheodoitheodon') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('baocaoloinhuan') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Báo cáo lợi nhuận bán hàng</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ asset('baocaoloinhuan') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('sotheodoimuabanthuoc') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Sổ theo dõi mua bán thuốc</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ asset('sotheodoimuabanthuoc') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('sotheodoivesinh') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Sổ theo dõi vệ sinh</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ asset('sotheodoivesinh') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('banthuockhongtheodon') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Số theo dõi bán thuốc không theo đơn</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ asset('banthuockhongtheodon') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('bcdoanhthucalamviec') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Báo cáo doanh thu theo ca làm việc</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ asset('bcdoanhthucalamviec') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('sotheodoixuatnhapkhautungthuoc') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Sổ theo dõi xuất nhập khẩu từng thuốc</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ asset('sotheodoixuatnhapkhautungthuoc') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('sotheodoibenhnhan') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Sổ theo dõi thông tin bệnh nhân</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ asset('sotheodoibenhnhan') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ asset('sokiemsoatdinhky') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Sổ kiểm soát chất lượng định kỳ và đột xuất</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ asset('sokiemsoatdinhky') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('doanhthubanhangtheonv') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Báo cáo doanh thu bán hàng theo nhân viên</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ route('doanhthubanhangtheonv') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('theodoihandung') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Sổ theo dõi hạn dùng</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ route('theodoihandung') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('theodoisulykhieunai') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Sổ theo dõi xử lý khiếu nạn</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ route('theodoisulykhieunai') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('xuatnhaptonthuoc') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Báo cáo xuất nhập tồn thuốc kiểm soát đặc biệt</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ route('xuatnhaptonthuoc') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('banhangtheobacsi') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Báo cáo bán hàng theo bác sỹ</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ route('banhangtheobacsi') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('theodoithuhoithuoc') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Sổ theo dõi thu hồi thuốc</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ route('theodoithuhoithuoc') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('phanungcuathuoc') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Báo cáo phản ứng có hại của thuốc</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ route('phanungcuathuoc') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="{{ route('thatthoatnhamlan') }}" class="btn_detail">
                        <div class="col-xl-3 gpp-report-padding">
                            <div class="gpp-report">
                                <div class="gpp-report-left">
                                    <img src="../img/screen21.png" alt="">
                                    <h4>Báo cáo thất thoát nhầm lẫn thuốc kiểm soát đặc biệt</h4>
                                </div>
                            </div>
                            <div class="gpp-report-more">
                                <div class="gpp-report-more-a">
                                    <a href="{{ route('thatthoatnhamlan') }}"> Chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </a>
                    <!-- </div> -->
                </div>
            </div><!-- br-pagebody -->
            <!--  -->
        </div>
    </div><!-- br-mainpanel -->
    <!-- ########## END: MAIN PANEL ########## -->

    <script>
        // Datepicker
        $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });

    </script>
@endsection
