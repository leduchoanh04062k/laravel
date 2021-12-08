@extends('default')
@section('title', 'Phản ứng của thuốc')
@section('content')
<div class="br-mainpanel pos-relative">
    <!-- tab1 -->
    <div id="tab1">
        <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
            <div class="row">
                <h4 class="tx-gray-800 mg-b-5 col-6 tx-uppercase">Báo cáo có hại phản ứng của thuốc</h4>
                <div class="col-6 d-flex justify-content-end">
                    <div class="mg-r-10">
                        <!-- Button thêm mới -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            <em class="fa fa-plus"></em> Thêm mới
                        </button>

                        <!-- Modal thêm mới-->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Báo
                                            cáo phản ứng có hại của thuốc</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" id="phanUngCuaThuoc" name="phanUngCuaThuoc" method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <!-- Tab panes -->
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="info">
                                                    <table class="table table-bordered btn_thongtin">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col" rowspan="3" class="btn_th">
                                                                    <h3>BÁO CÁO PHẢN ỨNG CÓ HẠI CỦA THUỐC</h3>
                                                                    <p>(SUSPECTED ADVERSE DRUGS REACTION REPORT)</p>

                                                                </th>
                                                                <th scope="col" colspan="10" class="btn_th border_th">
                                                                    <div style="display:flex"> Tên đơn vị
                                                                        <input type="text" name="name_dv"
                                                                            class="btn_input form-control mg-l-5"
                                                                            style="height: 20px">
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th scope="col" class="btn_th border_th">
                                                                    <div style="display:flex">
                                                                        Mã số báo cáo của đơn vị
                                                                        <input type="text" name="code_dv"
                                                                            class="btn_input1 form-control mg-l-5"
                                                                            style="height: 20px">
                                                                    </div>
                                                                </th>

                                                            </tr>
                                                            <tr>
                                                                <th scope="col" class="border_th btn_th">
                                                                    <div class="row">
                                                                        <div class="col-6">
                                                                            <div>
                                                                                Mã
                                                                                số báo
                                                                                cáo của Trung tâm:
                                                                                (do bộ phận lưu trữ của Trung tâm
                                                                                quản lý)
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-6">
                                                                            <div class="btn_input2">
                                                                                <input type="text" name="code_tt"
                                                                                    class="form-control"
                                                                                    style="height: 20px">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tb-boder-ex">
                                                <h3> I. Thông tin về phản ứng có hại ADR</h3>
                                            </div>
                                            <table class="table table-bordered btn_thongtin">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" colspan="7">Thông tin về bệnh nhân</th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" class="text_bold">
                                                            <label for="">Họ và tên <span>*</span></label>
                                                            <input type="text" name="name_bn" class="form-control"
                                                                style="height: 20px">
                                                            {{-- <label id="name_bn-error" class="error" for="name_bn"
                                                                style="font-size:9px"></label> --}}
                                                        </th>
                                                        <th scope="col" class="text_bold">
                                                            <label for="">Dân Tộc </label>
                                                            <input type="text" name="nation" class="form-control"
                                                                style="height: 20px">
                                                        </th>
                                                        <th scope="col" class="text_bold">
                                                            <label for=""> Cân nặng </label>
                                                            <input type="text" name="weight" class="form-control"
                                                                style="height: 20px">
                                                        </th>
                                                        <th scope="col" class="text_bold">
                                                            <label for="">Chiều cao(cm) </label>
                                                            <input type="text" name="height" value="0"
                                                                class="form-control" style="height: 20px">
                                                        </th>
                                                        <th scope="col" class="text_bold2">
                                                            <label for="">Tuổi </label>
                                                            <input type="text" name="age" value="0" class="form-control"
                                                                style="height: 20px">
                                                        </th>
                                                        <th scope="col" class="text_bold1">
                                                            <label for="">Giới tính </label>
                                                            <div>
                                                                <input type="radio" name="gender" id="gridRadios1"
                                                                    value="Nam">
                                                                <label for="gridRadios1">
                                                                    Nam
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="gender" id="gridRadios2"
                                                                    value="Nữ" checked>
                                                                <label for="gridRadios2">
                                                                    Nữ
                                                                </label>
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="text_bold">
                                                            <label>Ngày bắt đầu phản ứng <span>*</span></label>
                                                            <input type="date" class="form-control" style="height: 20px"
                                                                value="<?php echo date('Y-m-d') ?>" name="start_date">
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" colspan="7">Mô tả phản ứng và nhận xét(bao
                                                            gồm kết quả xét nghiệm)
                                                            <label for="mt1">Example
                                                                textarea</label>
                                                            <textarea class="form-control" id="mt1" name="note_pu"
                                                                rows="3"></textarea>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <div class="tb-boder-ex">
                                                <h3> II. Thông tin về thuốc nghi ngờ gây ADR</h3>
                                            </div>
                                            <table class="table table-bordered btn_thongtin display" id="example"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                            <label>Tên các thuốc nghi ngờ (bao gồm tên gốc)
                                                                <span>*</span>
                                                            </label>
                                                        </th>
                                                        <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                            <label> Hàm lượng hoặc nồng độ <span>*</span></label>
                                                        </th>
                                                        <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                            <label>Liều dùng một lần <span>*</span></label>
                                                        </th>
                                                        <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                            <label>Số lần
                                                                dùng
                                                                (ngày, tuần,
                                                                tháng) <span>*</span>
                                                            </label>
                                                        </th>
                                                        <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                            <label>Đường
                                                                dùng <span>*</span>
                                                            </label>
                                                        </th>
                                                        <th scope="col" class="text_bold btn_tieude" colspan="2">
                                                            <label>Ngày điều
                                                                trị
                                                                (ngày, tháng, năm) <span>*</span>
                                                            </label>
                                                        </th>
                                                        <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                            <label>
                                                                Lô sản xuất -
                                                                Hạn dùng <span>*</span>
                                                            </label>
                                                        </th>
                                                        <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                            <label>Tên nhà sản
                                                                xuất <span>*</span>
                                                            </label>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th>Bất đầu</th>
                                                        <th>Kết thúc</th>

                                                    </tr>

                                                    <tr>
                                                        <th>
                                                            <textarea class="form-control" rows="2"
                                                                name="name_thuoc"></textarea>
                                                            <label id="name_thuoc-error" class="error" for="name_thuoc"
                                                                style="font-size:8px"></label>
                                                        </th>
                                                        <th>
                                                            <textarea class="form-control" rows="2"
                                                                name="content"></textarea>
                                                            <label id="content-error" class="error" for="content"
                                                                style="font-size:8px"></label>
                                                        </th>
                                                        <th>
                                                            <textarea class="form-control" rows="2"
                                                                name="dosage"></textarea>
                                                            <label id="dosage-error" class="error" for="dosage"
                                                                style="font-size:8px"></label>
                                                        </th>
                                                        <th>
                                                            <textarea class="form-control" rows="2"
                                                                name="time"></textarea>
                                                            <label id="time-error" class="error" for="time"
                                                                style="font-size:8px"></label>
                                                        </th>
                                                        <th>
                                                            <textarea class="form-control" rows="2"
                                                                name="route"></textarea>
                                                            <label id="route-error" class="error" for="route"
                                                                style="font-size:8px"></label>
                                                        </th>
                                                        <th>
                                                            <textarea class="form-control" rows="2"
                                                                name="begin"></textarea>
                                                            <label id="begin-error" class="error" for="begin"
                                                                style="font-size:8px"></label>
                                                        </th>
                                                        <th>
                                                            <textarea class="form-control" rows="2"
                                                                name="finish"></textarea>
                                                            <label id="finish-error" class="error" for="finish"
                                                                style="font-size:8px"></label>
                                                        </th>
                                                        <th>
                                                            <textarea class="form-control" rows="2"
                                                                name="production"></textarea>
                                                            <label id="production-error" class="error" for="production"
                                                                style="font-size:8px"></label>
                                                        </th>
                                                        <th>
                                                            <textarea class="form-control" rows="2"
                                                                name="name_sx"></textarea>
                                                            <label id="name_sx-error" class="error" for="name_sx"
                                                                style="font-size:8px"></label>
                                                            <div class="text-right text-primary">
                                                                <i class="fa fa-plus" class="" onclick="addUnit();"></i>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="12">
                                                            Chẩn đoán và chỉ định điều trị:
                                                            <textarea class="form-control" rows="2"
                                                                name="nam_cd"></textarea>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="5" class="btn_th border_th">
                                                            <div style="display: flex">
                                                                Tái sử dụng thuốc:
                                                                <input type="text" name="nam_tsd" class="form-control"
                                                                    style="height: 20px;width:75%">
                                                            </div>
                                                        </th>
                                                        <th colspan="4" class="btn_th border_th">
                                                            <div>
                                                                <input type="radio" name="trieuchng" id="tc1"
                                                                    value="Các triệu chứng cũ lặp lại">
                                                                <label for="tc1">
                                                                    Các triệu chứng cũ lặp lại
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="trieuchng" id="tc2"
                                                                    value="Không xuất hiện triệu chứng cũ">
                                                                <label for="tc2">
                                                                    Không xuất hiện triệu chứng cũ
                                                                </label>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <div class="tb-boder-ex">
                                                <h3> III. Các thuốc dùng đồng thời và bệnh sử</h3>
                                            </div>
                                            <table class="table table-bordered btn_thongtin">
                                                <thead>
                                                    <tr>
                                                        <th colspan="12">
                                                            Các thuốc dùng đồng thời và số ngày sử dụng (ngoại trừ
                                                            các thuốc điều trị phản ứng)
                                                            <textarea class="form-control" rows="2"
                                                                name="name_dt"></textarea>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="12">
                                                            Các bệnh sử có liên quan khác (chẩn đoán lâm sàng, dị
                                                            ứng, đang mang thai ở tháng cuối.v.v)
                                                            <textarea class="form-control" rows="2"
                                                                name="benhkhac"></textarea>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <div class="tb-boder-ex">
                                                <h3> IV. Cách xử trí ADR</h3>
                                            </div>
                                            <table class="table table-bordered btn_thongtin">
                                                <thead>
                                                    <tr>
                                                        <th class="border_th btn_ngungsudung">
                                                            <div style="display: flex">
                                                                Ngưng sử dụng thuốc
                                                                <input type="text" name="ngung_sd"
                                                                    class="btn_input1 form-control"
                                                                    style="height: 20px">
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="text_bold1">
                                                            <div>
                                                                <input type="radio" name="going_well" id="tt1"
                                                                    value="Tiến triển tốt">
                                                                <label for="tt1">Tiến triển tốt</label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="going_well" id="ktt"
                                                                    value="Không tiến triển">
                                                                <label for="ktt">Không tiến triển</label>
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="text_bold1">

                                                            <div>
                                                                <input type="radio" name="continue_one" id="pt1"
                                                                    value="Phải điều trị tiếp tục">
                                                                <label for="pt1">Phải điều trị tiếp tục</label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="continue_one" id="kb"
                                                                    value="Không biết">
                                                                <label for="kb">Không biết </label>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th class="border_th btn_ngungsudung">
                                                            <div style="display: flex">
                                                                Sử dụng thuốc khác
                                                                <input type="text" name="other_drug1"
                                                                    class="btn_input1 form-control"
                                                                    style="height: 20px">
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="text_bold1">
                                                            <div>
                                                                <input type="radio" name="tientrien" id="ttt"
                                                                    value="Tiến triển tốt">
                                                                <label for="ttt">
                                                                    Tiến triển tốt
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="tientrien" id="ktt"
                                                                    value="Không tiến triển">
                                                                <label for="ktt">
                                                                    Không tiến triển
                                                                </label>
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="text_bold1">
                                                            <div>
                                                                <input type="radio" name="phaitt" id="ptt0"
                                                                    value=" Phải điều trị tiếp tục">
                                                                <label for="ptt0">
                                                                    Phải điều trị tiếp tục
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="phaitt" id="kb0"
                                                                    value=" Không biết">
                                                                <label for="kb0">
                                                                    Không biết
                                                                </label>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <div class="tb-boder-ex">
                                                <h3> V. Kết quả cách xử trí ADR</h3>
                                            </div>
                                            <table class="table table-bordered btn_thongtin">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text_bold1">
                                                            <div>
                                                                <input type="radio" name="kdichung" id="ph"
                                                                    value="Hồi phục không có di chứng">
                                                                <label for="ph">
                                                                    Hồi phục không có di chứng
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="kdichung" id="ph1"
                                                                    value=" Hồi phục có di chứng">
                                                                <label for="ph1">
                                                                    Hồi phục có di chứng
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="kdichung" id="ph2"
                                                                    value="  Không hồi phục">
                                                                <label for="ph2">
                                                                    Không hồi phục
                                                                </label>
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="text_bold1">
                                                            <div>
                                                                <input type="radio" name="ADR" value=" Chết do ADR">
                                                                <label for="ADR">
                                                                    Chết do ADR
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="ADR" id="klq"
                                                                    value="Chết không liên quan tới thuốc">
                                                                <label for="klq">
                                                                    Chết không liên quan tới thuốc
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="ADR" id="kxd"
                                                                    value=" Không xác định">
                                                                <label for="kxd">
                                                                    Không xác định
                                                                </label>
                                                            </div>
                                                        </th>
                                                    </tr>

                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <div class="tb-boder-ex">
                                                <h3> VI. Phần bình luận của bác sỹ điều trị</h3>
                                            </div>
                                            <table class="table table-bordered btn_thongtin">
                                                <thead>
                                                    <tr>
                                                        <th colspan="12">
                                                            <textarea class="form-control" rows="2"
                                                                name="comment"></textarea>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                            <div class="tb-boder-ex">
                                                <h3> VII. Phần thẩm định ADR</h3>
                                            </div>
                                            <table class="table table-bordered btn_thongtin">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text_bold1">
                                                            <h3>Ý kiến của đơn vị Y tế:</h3>
                                                            <div>
                                                                <input type="radio" name="certain" id="cc"
                                                                    value="Chắc chắn">
                                                                <label for="cc" style="font-size: 12px">
                                                                    1. Chắc chắn (certain)
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="certain" id="ckn"
                                                                    value="Có khả năng">
                                                                <label for="ckn" style="font-size: 12px">
                                                                    2. Có khả năng (probable)
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="certain" id="ct"
                                                                    value="Có thể">
                                                                <label for="ct" style="font-size: 12px">
                                                                    3. Có thể (possible)
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="certain" id="kcc"
                                                                    value="Không chắc chắn">
                                                                <label for="kcc" style="font-size: 12px">
                                                                    4. Không chắc chắn (unlikely)
                                                                </label>
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="text_bold1">
                                                            <h3>Ý kiến của chuyên gia:</h3>
                                                            <div>
                                                                <input type="radio" name="certain_cg" id="cc1"
                                                                    value="Chắc chắn">
                                                                <label for="cc1" style="font-size: 12px">
                                                                    1. Chắc chắn (certain)
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="certain_cg" id="ckn1"
                                                                    value="Có khả năng">
                                                                <label for="ckn1" style="font-size: 12px">
                                                                    2. Có khả năng (probable)
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="certain_cg" id="ct1"
                                                                    value="Có thể">
                                                                <label for="ct1" style="font-size: 12px">
                                                                    3. Có thể (possible)
                                                                </label>
                                                            </div>
                                                            <div>
                                                                <input type="radio" name="certain_cg" id="kcc1"
                                                                    value="Không chắc chắn">
                                                                <label for="kcc1" style="font-size: 12px">
                                                                    4. Không chắc chắn (unlikely)
                                                                </label>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="12">
                                                            <label for="">Ý kiến của chuyên gia thẩm định (phần dành
                                                                cho
                                                                Hội đồng thẩm định ADR)</label>
                                                            <textarea class="form-control" rows="2"
                                                                name="comment_cg"></textarea>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                            <div class="tb-boder-ex">
                                                <h3> VIII. Thông tin người báo cáo</h3>
                                            </div>
                                            <table class="table table-bordered btn_thongtin">
                                                <thead>
                                                    <tr>
                                                        <th scope="col" class="text_bold1 btn_th border_th">
                                                            <div style="display:flex">
                                                                Tên : <input type="text" name="name_bc"
                                                                    class="btn_input_a form-control"
                                                                    style="height: 20px">
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="text_bold1 btn_tieude">
                                                            <div style="display:flex">
                                                                Chức vụ: <input type="text" name="name_cv"
                                                                    class="btn_input_a2 form-control"
                                                                    style="height: 20px">
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" class="text_bold1 btn_th border_th">
                                                            <div style="display:flex">
                                                                Số điện thoại: <input type="text" name="position_bc"
                                                                    class="btn_input_a1 form-control"
                                                                    style="height: 20px">
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="text_bold1">
                                                            <div style="display:flex">
                                                                Số fax: <input type="text" name="fax_bc"
                                                                    class="btn_input_a3 form-control"
                                                                    style="height: 20px">
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" class="text_bold1 btn_th border_th">
                                                            <div style="display:flex">
                                                                Địa chỉ Email: <input type="text" name="email_bc"
                                                                    class="btn_input_a1 form-control"
                                                                    style="height: 20px">
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="text_bold1">
                                                            Dạng báo cáo
                                                            <div class="form-check form-check-inline"
                                                                style="margin-left:50px;">
                                                                <input class="form-check-input" type="radio"
                                                                    name="first" id="ld" value="Lần đầu">
                                                                <label class="form-check-label" for="ld">
                                                                    Lần đầu</label>
                                                            </div>
                                                            <div class="form-check form-check-inline form-check_box"
                                                                style="margin-left: 50px;">
                                                                <input class="form-check-input" type="radio"
                                                                    name="first" id="bs" value="Bổ sung">
                                                                <label class="form-check-label" for="bs">
                                                                    Bổ sung</label>
                                                            </div>

                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th scope="col" class="text_bold1 btn_th border_th">
                                                            <div style="display:flex">
                                                                Ngày báo cáo: <input type="date" name="date_bc"
                                                                    class="btn_input_a1 form-control"
                                                                    style="height: 20px"
                                                                    value="<?php echo date('Y-m-d') ?>">
                                                            </div>
                                                        </th>
                                                        <th scope="col" class="text_bold1">
                                                            <div style="display:flex">
                                                                Chữ ký:
                                                            </div>
                                                        </th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"
                                                    aria-hidden="true"></em>Lưu</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                    class="fa fa-close" aria-hidden="true"></em>Đóng</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mg-r-10">
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
                                value="<?php echo date("d/m/Y"); ?>" placeholder="MM/DD/YYYY">
                        </div>
                    </div>
                    <div class="col-md-7 row">
                        <div class="col-md-9">
                            <label for="">Từ khoá tìm kiếm</label>
                            <input type="text" class="form-control" placeholder="Tìm kiếm theo bệnh nhân, dân tộc"
                                id="searchBySupplier">
                        </div>
                        <div class="col-md-2 align-self-end">
                            <button class="btn btn-info" onclick="searchDateTable()"><em class="fa fa-search"></em>Tìm
                                kiếm</button>
                        </div>
                    </div>
                </div>

                <div class="mg-t-20">
                    <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" style="width:100%" id="data-table1">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-primary" style="color: white;">#</th>
                                <th scope="col" class="bg-primary" style="color: white;">Ngày báo cáo</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tên báo cáo</th>
                                <th scope="col" class="bg-primary" style="color: white;">Họ và tên bệnh nhân</th>
                                <th scope="col" class="bg-primary" style="color: white;">Dân tộc</th>
                                <th scope="col" class="bg-primary" style="color: white;">Tuổi
                                </th>
                                <th scope="col" class="bg-primary" style="color: white;">Giới tính</th>
                                <th scope="col" class="bg-primary" style="color: white;">tên người báo cáo</th>
                                <th scope="col" class="bg-primary" style="color: white;">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div><!-- br-pagebody -->
                <!--  -->
            </div>

            <!-- Modal thêm mới-->
            <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document" style="max-width:none;width:80em;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Báo
                                cáo phản ứng có hại của thuốc</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="" id="suaPhanUngCuaThuoc" name="suaPhanUngCuaThuoc" method="post">
                            @csrf
                            <div class="modal-body">
                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active" id="info">
                                        <table class="table table-bordered btn_thongtin">
                                            <thead>
                                                <tr>
                                                    <th scope="col" rowspan="3" class="btn_th">
                                                        <h3>BÁO CÁO PHẢN ỨNG CÓ HẠI CỦA THUỐC</h3>
                                                        <p>(SUSPECTED ADVERSE DRUGS REACTION REPORT)</p>

                                                    </th>
                                                    <th scope="col" colspan="10" class="btn_th border_th">
                                                        <input type="hidden" name="id" id="id">
                                                        <div style="display:flex"> Tên đơn vị
                                                            <input type="text" name="name_dv" id="name_dv"
                                                                class="btn_input form-control mg-l-5"
                                                                style="height: 20px">
                                                        </div>
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th scope="col" class="btn_th border_th">
                                                        <div style="display:flex">
                                                            Mã số báo cáo của đơn vị
                                                            <input type="text" name="code_dv" id="code_dv"
                                                                class="btn_input1 form-control mg-l-5"
                                                                style="height: 20px">
                                                        </div>
                                                    </th>

                                                </tr>
                                                <tr>
                                                    <th scope="col" class="border_th btn_th">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <div>
                                                                    Mã
                                                                    số báo
                                                                    cáo của Trung tâm:
                                                                    (do bộ phận lưu trữ của Trung tâm
                                                                    quản lý)
                                                                </div>
                                                            </div>

                                                            <div class="col-6">
                                                                <div class="btn_input2">
                                                                    <input type="text" name="code_tt" id="code_tt"
                                                                        class="form-control" style="height: 20px">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tb-boder-ex">
                                    <h3> I. Thông tin về phản ứng có hại ADR</h3>
                                </div>
                                <table class="table table-bordered btn_thongtin">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="7">Thông tin về bệnh nhân</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text_bold">
                                                <label for="">Họ và tên <span>*</span></label>
                                                <input type="text" name="name_bn" id="name_bn" class="form-control"
                                                    style="height: 20px">
                                            </th>
                                            <th scope="col" class="text_bold">
                                                <label for="">Dân Tộc </label>
                                                <input type="text" name="nation" id="nation" class="form-control"
                                                    style="height: 20px">
                                            </th>
                                            <th scope="col" class="text_bold">
                                                <label for=""> Cân nặng </label>
                                                <input type="text" name="weight" id="weight" class="form-control"
                                                    style="height: 20px">
                                            </th>
                                            <th scope="col" class="text_bold">
                                                <label for="">Chiều cao(cm) </label>
                                                <input type="text" name="height" id="height" value="0"
                                                    class="form-control" style="height: 20px">
                                            </th>
                                            <th scope="col" class="text_bold2">
                                                <label for="">Tuổi </label>
                                                <input type="text" name="age" id="age" value="0" class="form-control"
                                                    style="height: 20px">
                                            </th>
                                            <th scope="col" class="text_bold1">
                                                <label for="">Giới tính </label>
                                                <div>
                                                    <input type="radio" name="gender" id="gridRadios1" value="Nam">
                                                    <label for="gridRadios1">
                                                        Nam
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="gender" id="gridRadios2" value="Nữ"
                                                        checked>
                                                    <label for="gridRadios2">
                                                        Nữ
                                                    </label>
                                                </div>
                                            </th>
                                            <th scope="col" class="text_bold">
                                                <label>Ngày bắt đầu phản ứng <span>*</span></label>
                                                <input type="date" class="form-control" style="height: 20px"
                                                    value="<?php echo date('Y-m-d') ?>" name="start_date"
                                                    id="start_date">
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" colspan="7">Mô tả phản ứng và nhận xét(bao
                                                gồm kết quả xét nghiệm)
                                                <label for="mt1">Example
                                                    textarea</label>
                                                <textarea class="form-control" id="mt1" name="note_pu" id="note_pu"
                                                    rows="3"></textarea>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="tb-boder-ex">
                                    <h3> II. Thông tin về thuốc nghi ngờ gây ADR</h3>
                                </div>
                                <table class="table table-bordered btn_thongtin display" id="example"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                <label>Tên các thuốc nghi ngờ (bao gồm tên gốc)
                                                    <span>*</span>
                                                </label>
                                            </th>
                                            <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                <label> Hàm lượng hoặc nồng độ <span>*</span></label>
                                            </th>
                                            <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                <label>Liều dùng một lần <span>*</span></label>
                                            </th>
                                            <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                <label>Số lần
                                                    dùng
                                                    (ngày, tuần,
                                                    tháng) <span>*</span>
                                                </label>
                                            </th>
                                            <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                <label>Đường
                                                    dùng <span>*</span>
                                                </label>
                                            </th>
                                            <th scope="col" class="text_bold btn_tieude" colspan="2">
                                                <label>Ngày điều
                                                    trị
                                                    (ngày, tháng, năm) <span>*</span>
                                                </label>
                                            </th>
                                            <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                <label>
                                                    Lô sản xuất -
                                                    Hạn dùng <span>*</span>
                                                </label>
                                            </th>
                                            <th scope="col" class="text_bold1 btn_tieude" rowspan="2">
                                                <label>Tên nhà sản
                                                    xuất <span>*</span>
                                                </label>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th>Bất đầu</th>
                                            <th>Kết thúc</th>

                                        </tr>

                                        <tr>
                                            <th>
                                                <textarea class="form-control" rows="2" name="name_thuoc"
                                                    id="name_thuoc"></textarea>
                                                <label id="name_thuoc-error" class="error" for="name_thuoc"
                                                    style="font-size:8px"></label>
                                            </th>
                                            <th>
                                                <textarea class="form-control" rows="2" name="content"
                                                    id="content"></textarea>
                                                <label id="content-error" class="error" for="content"
                                                    style="font-size:8px"></label>
                                            </th>
                                            <th>
                                                <textarea class="form-control" rows="2" name="dosage"
                                                    id="dosage"></textarea>
                                                <label id="dosage-error" class="error" for="dosage"
                                                    style="font-size:8px"></label>
                                            </th>
                                            <th>
                                                <textarea class="form-control" rows="2" name="time"
                                                    id="time"></textarea>
                                                <label id="time-error" class="error" for="time"
                                                    style="font-size:8px"></label>
                                            </th>
                                            <th>
                                                <textarea class="form-control" rows="2" name="route"
                                                    id="route"></textarea>
                                                <label id="route-error" class="error" for="route"
                                                    style="font-size:8px"></label>
                                            </th>
                                            <th>
                                                <textarea class="form-control" rows="2" name="begin"
                                                    id="begin"></textarea>
                                                <label id="begin-error" class="error" for="begin"
                                                    style="font-size:8px"></label>
                                            </th>
                                            <th>
                                                <textarea class="form-control" rows="2" name="finish"
                                                    id="finish"></textarea>
                                                <label id="finish-error" class="error" for="finish"
                                                    style="font-size:8px"></label>
                                            </th>
                                            <th>
                                                <textarea class="form-control" rows="2" name="production"
                                                    id="production"></textarea>
                                                <label id="production-error" class="error" for="production"
                                                    style="font-size:8px"></label>
                                            </th>
                                            <th>
                                                <textarea class="form-control" rows="2" name="name_sx"
                                                    id="name_sx"></textarea>
                                                <label id="name_sx-error" class="error" for="name_sx"
                                                    style="font-size:8px"></label>
                                                <div class="text-right text-primary">
                                                    <i class="fa fa-plus" class="" onclick="addUnit();"></i>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="12">
                                                Chẩn đoán và chỉ định điều trị:
                                                <textarea class="form-control" rows="2" name="nam_cd"
                                                    id="nam_cd"></textarea>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="5" class="btn_th border_th">
                                                <div style="display: flex">
                                                    Tái sử dụng thuốc:
                                                    <input type="text" name="nam_tsd" id="nam_tsd" class="form-control"
                                                        style="height: 20px;width:75%">
                                                </div>
                                            </th>
                                            <th colspan="4" class="btn_th border_th">
                                                <div>
                                                    <input type="radio" name="trieuchng" id="tc1"
                                                        value="Các triệu chứng cũ lặp lại">
                                                    <label for="tc1">
                                                        Các triệu chứng cũ lặp lại
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="trieuchng" id="tc2"
                                                        value="Không xuất hiện triệu chứng cũ">
                                                    <label for="tc2">
                                                        Không xuất hiện triệu chứng cũ
                                                    </label>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="tb-boder-ex">
                                    <h3> III. Các thuốc dùng đồng thời và bệnh sử</h3>
                                </div>
                                <table class="table table-bordered btn_thongtin">
                                    <thead>
                                        <tr>
                                            <th colspan="12">
                                                Các thuốc dùng đồng thời và số ngày sử dụng (ngoại trừ
                                                các thuốc điều trị phản ứng)
                                                <textarea class="form-control" rows="2" name="name_dt"
                                                    id="name_dt"></textarea>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="12">
                                                Các bệnh sử có liên quan khác (chẩn đoán lâm sàng, dị
                                                ứng, đang mang thai ở tháng cuối.v.v)
                                                <textarea class="form-control" rows="2" name="benhkhac"
                                                    id="benhkhac"></textarea>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="tb-boder-ex">
                                    <h3> IV. Cách xử trí ADR</h3>
                                </div>
                                <table class="table table-bordered btn_thongtin">
                                    <thead>
                                        <tr>
                                            <th class="border_th btn_ngungsudung">
                                                <div style="display: flex">
                                                    Ngưng sử dụng thuốc
                                                    <input type="text" name="ngung_sd" id="ngung_sd"
                                                        class="btn_input1 form-control" style="height: 20px">
                                                </div>
                                            </th>
                                            <th scope="col" class="text_bold1">
                                                <div>
                                                    <input type="radio" name="going_well" id="tt1"
                                                        value="Tiến triển tốt">
                                                    <label for="tt1">Tiến triển tốt</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="going_well" id="ktt"
                                                        value="Không tiến triển">
                                                    <label for="ktt">Không tiến triển</label>
                                                </div>
                                            </th>
                                            <th scope="col" class="text_bold1">

                                                <div>
                                                    <input type="radio" name="continue_one" id="pt1"
                                                        value="Phải điều trị tiếp tục">
                                                    <label for="pt1">Phải điều trị tiếp tục</label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="continue_one" id="kb" value="Không biết">
                                                    <label for="kb">Không biết </label>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th class="border_th btn_ngungsudung">
                                                <div style="display: flex">
                                                    Sử dụng thuốc khác
                                                    <input type="text" name="other_drug1"
                                                        class="btn_input1 form-control" style="height: 20px"
                                                        id="other_drug1">
                                                </div>
                                            </th>
                                            <th scope="col" class="text_bold1">
                                                <div>
                                                    <input type="radio" name="tientrien" id="ttt"
                                                        value="Tiến triển tốt">
                                                    <label for="ttt">
                                                        Tiến triển tốt
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="tientrien" id="ktt"
                                                        value="Không tiến triển">
                                                    <label for="ktt">
                                                        Không tiến triển
                                                    </label>
                                                </div>
                                            </th>
                                            <th scope="col" class="text_bold1">
                                                <div>
                                                    <input type="radio" name="phaitt" id="ptt0"
                                                        value=" Phải điều trị tiếp tục">
                                                    <label for="ptt0">
                                                        Phải điều trị tiếp tục
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="phaitt" id="kb0" value=" Không biết">
                                                    <label for="kb0">
                                                        Không biết
                                                    </label>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="tb-boder-ex">
                                    <h3> V. Kết quả cách xử trí ADR</h3>
                                </div>
                                <table class="table table-bordered btn_thongtin">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text_bold1">
                                                <div>
                                                    <input type="radio" name="kdichung" id="ph"
                                                        value="Hồi phục không có di chứng">
                                                    <label for="ph">
                                                        Hồi phục không có di chứng
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="kdichung" id="ph1"
                                                        value=" Hồi phục có di chứng">
                                                    <label for="ph1">
                                                        Hồi phục có di chứng
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="kdichung" id="ph2"
                                                        value="  Không hồi phục">
                                                    <label for="ph2">
                                                        Không hồi phục
                                                    </label>
                                                </div>
                                            </th>
                                            <th scope="col" class="text_bold1">
                                                <div>
                                                    <input type="radio" name="ADR" value="Chết do ADR">
                                                    <label for="ADR">
                                                        Chết do ADR
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="ADR" id="klq"
                                                        value="Chết không liên quan tới thuốc">
                                                    <label for="klq">
                                                        Chết không liên quan tới thuốc
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="ADR" id="kxd" value=" Không xác định">
                                                    <label for="kxd">
                                                        Không xác định
                                                    </label>
                                                </div>
                                            </th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="tb-boder-ex">
                                    <h3> VI. Phần bình luận của bác sỹ điều trị</h3>
                                </div>
                                <table class="table table-bordered btn_thongtin">
                                    <thead>
                                        <tr>
                                            <th colspan="12">
                                                <textarea class="form-control" rows="2" name="comment"
                                                    id="comment"></textarea>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                                <div class="tb-boder-ex">
                                    <h3> VII. Phần thẩm định ADR</h3>
                                </div>
                                <table class="table table-bordered btn_thongtin">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text_bold1">
                                                <h3>Ý kiến của đơn vị Y tế:</h3>
                                                <div>
                                                    <input type="radio" name="certain" id="cc" value="Chắc chắn">
                                                    <label for="cc" style="font-size: 12px">
                                                        1. Chắc chắn (certain)
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="certain" id="ckn" value="Có khả năng">
                                                    <label for="ckn" style="font-size: 12px">
                                                        2. Có khả năng (probable)
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="certain" id="ct" value="Có thể">
                                                    <label for="ct" style="font-size: 12px">
                                                        3. Có thể (possible)
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="certain" id="kcc" value="Không chắc chắn">
                                                    <label for="kcc" style="font-size: 12px">
                                                        4. Không chắc chắn (unlikely)
                                                    </label>
                                                </div>
                                            </th>
                                            <th scope="col" class="text_bold1">
                                                <h3>Ý kiến của chuyên gia:</h3>
                                                <div>
                                                    <input type="radio" name="certain_cg" id="cc1" value="Chắc chắn">
                                                    <label for="cc1" style="font-size: 12px">
                                                        1. Chắc chắn (certain)
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="certain_cg" id="ckn1" value="Có khả năng">
                                                    <label for="ckn1" style="font-size: 12px">
                                                        2. Có khả năng (probable)
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="certain_cg" id="ct1" value="Có thể">
                                                    <label for="ct1" style="font-size: 12px">
                                                        3. Có thể (possible)
                                                    </label>
                                                </div>
                                                <div>
                                                    <input type="radio" name="certain_cg" id="kcc1"
                                                        value="Không chắc chắn">
                                                    <label for="kcc1" style="font-size: 12px">
                                                        4. Không chắc chắn (unlikely)
                                                    </label>
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="12">
                                                <label for="">Ý kiến của chuyên gia thẩm định (phần dành
                                                    cho
                                                    Hội đồng thẩm định ADR)</label>
                                                <textarea class="form-control" rows="2" name="comment_cg"
                                                    id="comment_cg"></textarea>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                                <div class="tb-boder-ex">
                                    <h3> VIII. Thông tin người báo cáo</h3>
                                </div>
                                <table class="table table-bordered btn_thongtin">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="text_bold1 btn_th border_th">
                                                <div style="display:flex">
                                                    Tên : <input type="text" name="name_bc" id="name_bc"
                                                        class="btn_input_a form-control" style="height: 20px">
                                                </div>
                                            </th>
                                            <th scope="col" class="text_bold1 btn_tieude">
                                                <div style="display:flex">
                                                    Chức vụ: <input type="text" name="name_cv" id="name_cv"
                                                        class="btn_input_a2 form-control" style="height: 20px">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text_bold1 btn_th border_th">
                                                <div style="display:flex">
                                                    Số điện thoại: <input type="text" name="position_bc"
                                                        id="position_bc" class="btn_input_a1 form-control"
                                                        style="height: 20px">
                                                </div>
                                            </th>
                                            <th scope="col" class="text_bold1">
                                                <div style="display:flex">
                                                    Số fax: <input type="text" name="fax_bc" id="fax_bc"
                                                        class="btn_input_a3 form-control" style="height: 20px">
                                                </div>
                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text_bold1 btn_th border_th">
                                                <div style="display:flex">
                                                    Địa chỉ Email: <input type="text" name="email_bc" id="email_bc"
                                                        class="btn_input_a1 form-control" style="height: 20px">
                                                </div>
                                            </th>
                                            <th scope="col" class="text_bold1">
                                                Dạng báo cáo
                                                <div class="form-check form-check-inline" style="margin-left:50px;">
                                                    <input class="form-check-input" type="radio" name="first" id="ld"
                                                        value="Lần đầu">
                                                    <label class="form-check-label" for="ld">
                                                        Lần đầu</label>
                                                </div>
                                                <div class="form-check form-check-inline form-check_box"
                                                    style="margin-left: 50px;">
                                                    <input class="form-check-input" type="radio" name="first" id="bs"
                                                        value="Bổ sung">
                                                    <label class="form-check-label" for="bs">
                                                        Bổ sung</label>
                                                </div>

                                            </th>
                                        </tr>
                                        <tr>
                                            <th scope="col" class="text_bold1 btn_th border_th">
                                                <div style="display:flex">
                                                    Ngày báo cáo: <input type="date" name="date_bc"
                                                        class="btn_input_a1 form-control" style="height: 20px"
                                                        value="<?php echo date('Y-m-d') ?>">
                                                </div>
                                            </th>
                                            <th scope="col" class="text_bold1">
                                                <div style="display:flex">
                                                    Chữ ký:
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary"><em class="fa fa-save"
                                        aria-hidden="true"></em>Lưu</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                        class="fa fa-close" aria-hidden="true"></em>Đóng</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div><!-- br-mainpanel -->
<script>
    //   $(document).ready(function () {
        //     var t = $('#example').DataTable();
        //     var counter = '<textarea class="form-control" rows="2" style="width:80%"></textarea>'

        //     $('#addRow').on( 'click', function () {
        //         t.row.add( [
        //             counter +'.',
        //             counter +'.',
        //             counter +'.',
        //             counter +'.',
        //             counter +'.',
        //             counter +'.',
        //             counter +'.',
        //             counter +'.',
        //             counter +'.'
        //         ] ).draw( false );

        //         counter++;
        //     } );

        //     // Automatically add a first row of data
        //     $('#addRow').click();

function editFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('phanungcuathuoc/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        $('#id').val(res.id);
        $('#name_dv').val(res.name_dv);
        $('#code_dv').val(res.code_dv);
        $('#code_tt').val(res.code_tt);
        $('#name_bn').val(res.name_bn);
        $('#nation').val(res.nation);
        $('#weight').val(res.weight);
        $('#height').val(res.height);
        $('#age').val(res.age);
        $('#start_date').val(res.start_date);
        $('#mt1').val(res.note_pu);
        $('#name_thuoc').val(res.name_thuoc);
        $('#content').val(res.content);
        $('#dosage').val(res.dosage);
        $('#time').val(res.time);
        $('#route').val(res.route);
        $('#begin').val(res.begin);
        $('#finish').val(res.finish);
        $('#production').val(res.production);
        $('#name_sx').val(res.name_sx);
        $('#nam_cd').val(res.nam_cd);
        $('#nam_tsd').val(res.nam_tsd);
        $('#name_dt').val(res.name_dt);
        $('#benhkhac').val(res.benhkhac);
        $('#ngung_sd').val(res.ngung_sd);
        $('#other_drug1').val(res.other_drug1);
        $('#comment').val(res.comment);
        $('#comment_cg').val(res.comment_cg);
        $('#name_bc').val(res.name_bc);
        $('#position_bc').val(res.position_bc);
        $('#email_bc').val(res.email_bc);
        $('#date_bc').val(res.date_bc);
        $('#name_cv').val(res.name_cv);
        $('#fax_bc').val(res.fax_bc);
      }
    });
  }



$('#suaPhanUngCuaThuoc').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
      type:'POST',
      url: "{{ url('phanungcuathuoc')}}",
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
		// $.fn.dataTable.ext.search.push(
		// 	function (settings, data, dataIndex){
		// 		if ( settings.nTable.id !== 'data-table1' ) {
		// 			return true;
		// 		}

		// 		var minDay = $('#searchByStartDate').val().split("/");
		// 		var maxDay = $('#searchByEndDate').val().split("/");
		// 		var temp = data[1].split(" ");
		// 		var tempDate = temp[0].split("/");

		// 		date = new Date(tempDate[1] + '/' + tempDate[0] + '/' + tempDate[2])
		// 		startDate = new Date(minDay[1] + '/' + minDay[0] + '/' + minDay[2]);
		// 		endDate = new Date(maxDay[1] + '/' + maxDay[0] + '/' + maxDay[2]);

		// 		return (
		// 			(startDate === null && endDate === null) ||
		// 			(startDate === null && date <= endDate) ||
		// 			(startDate <= date && endDate === null ) ||
		// 			(startDate <= date && date <= endDate )
		// 			) ? true : false;
		// 	}
		// 	);

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
		.draw();

	}
}



function deleteFunc(id){
    $.ajax({
      type:"GET",
      url: "{{ url('phanungcuathuoc/{id}/edit') }}",
      data: { id: id },
      dataType: 'json',
      success: function(res){
        Swal.fire({
          title: "Bạn chắc chắn muốn hủy phiếu theo dõi Báo cáo phản ứng có hại của bệnh nhân - "+res.name_bn+"",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Đồng ý!'
        }).then((result) => {
          if (result.value) {
            $.ajax({
              type:"DELETE",
              url: "{{ url('phanungcuathuoc/{id}') }}",
              data: { id: id },
              dataType: 'json',
              success: function(res){
                $("#data-table1").load(
                  $.toast({
                    text : "Hủy dữ liệu thành công",
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
            url: "{{ url('phanungcuathuoc') }}",
            data: function(d) {
                    d.search = $('input[type="search"]').val()
                }
        },


            columns: [
            { data: 'id', name: 'id', orderable: false},
            { data: 'date_bc', name: 'date_bc', orderable: false},
            { data: null,
                "render": function(data,type,row) {
                    return 'Báo cáo phản ứng có hại của bệnh nhân -<br>'+ data['name_bn']
                }
            },
            { data: 'name_bn', name: 'name_bn', orderable: false},
            { data: 'nation', name: 'nation', orderable: false},
            { data: 'age', name: 'age', orderable: false},
            { data: 'gender', name: 'gender', orderable: false},
            { data: 'name_bc', name: 'name_bc', orderable: false},
            { data: 'action', name: 'action'},
    ],

    });

        table1.on('order.dt search.dt', function () {
            table1.column(0).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

        searchDateTable();

        $(function(){
      let phanUngCuaThuoc = $("#phanUngCuaThuoc");
      if(phanUngCuaThuoc.length){
        phanUngCuaThuoc.validate({
          rules:{
            name_bn:{
              required:true
            },
            start_date:{
              required:true
            },
            name_thuoc:{
              required:true
            },
            content:{
              required:true
            },
            dosage:{
              required:true
            },
            time:{
              required:true
            },
            route:{
              required:true
            },
            begin:{
              required:true
            },
            finish:{
              required:true
            },
            production:{
              required:true
            },
            name_sx:{
              required:true
            },
          },
          messages:{
            name_bn:{
              required:'Vui lòng điền thông tin'
            },
            start_date:{
                required:'Vui lòng điền thông tin'
            },
            name_thuoc:{
                required:'Điền thông tin đẩy đủ'
            },
            content:{
                required:'Điền thông tin đẩy đủ'
            },
            dosage:{
                required:'Điền thông tin đẩy đủ'
            },
            time:{
                required:'Điền thông tin đẩy đủ'
            },
            route:{
                required:'Điền thông tin đẩy đủ'
            },
            begin:{
                required:'Điền thông tin đẩy đủ'
            },
            finish:{
                required:'Điền thông tin đẩy đủ'
            },
            production:{
                required:'Điền thông tin đẩy đủ'
            },
            name_sx:{
                required:'Điền thông tin đẩy đủ'
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
              url: "{{ url('phanungcuathuoc') }}",
              type: "POST",
              data: $('#phanUngCuaThuoc').serialize(),
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
                document.getElementById("phanUngCuaThuoc").reset();
              }
            });
          }
        })
      }
    })
        $('.fc-datepicker').datepicker({
        	showOtherMonths: true,
        	selectOtherMonths: true,
            // dateFormat:'dd/mm/yy'
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

    });
</script>
@endsection
