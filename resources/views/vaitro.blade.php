@extends('default')
@section('title', 'Vai trò')
@section('content')
<div class="br-mainpanel">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
        <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Vai trò</h4>
    </div>
    <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="shadow-base bg-white pd-15">
            <div class="">
                <label for="" id="info-data-table" class="tx-bold tx-gray-800"></label>
                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table" style="width: 100%">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-primary" style="color: white;width: 5%;">#</th>
                            <th scope="col" class="bg-primary" style="color: white;width: 55%;">Tên vai
                            trò</th>
                            <th scope="col" class="bg-primary" style="color: white;width: 25%;">Ngày
                            tạo</th>
                            <th scope="col" class="bg-primary" style="color: white;width: 15%;">Thao
                            tác</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div><!-- row -->
    </div><!-- br-pagebody -->
    <div>
        <!-- Modal chi tiết-->
        <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document"
        style="max-width: none;width: 50em;vertical-align: top;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title tx-gray-900" id="titleEdit"></h5>
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>

        <div class="modal-body">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="navVaitro" data-toggle="tab"
                    href="#vaiTro">Thông tin vai trò</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="navQuyen" data-toggle="tab"
                    href="#quyen">Quyền</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div id="vaiTro" class="tab-pane active"><br>
                    <div class="col-md-12">
                        <label for="" class="tx-gray-800 tx-bold">Tên
                        vai trò</label>
                        <input type="hidden" id="id">
                        <input type="text" class="form-control" id="name" disabled="disabled">
                    </div>
                    {{-- <div class="col-md-12 mg-t-10">
                        <input type="checkbox" id="macDinh"
                        class="mg-r-10">
                        <label for="macDinh">Mặc định</label>
                    </div> --}}
                </div>
                <div id="quyen" class="tab-pane fade"><br>
                    <div id="jstree">
                        <!-- in this example the tree is populated from inline HTML -->
                        <ul>
                            <li>Trang
                                <ul>
                                    <li data-value="Seller">Bán hàng</li>

                                            {{-- <ul>
                                                <li>Giảm giá</li>
                                                <li>Thay đổi giá bán</li>
                                                <li>Thay đổi thời gian bán
                                                </li>
                                            </ul> --}}
                                        {{--   </li> --}}
                                        <li data-value="Report">Báo cáo
                                        {{--    <ul>
                                                <li>Báo cáo bán hàng theo
                                                bác sĩ</li>
                                                <li>Báo cáo doanh thu bán
                                                hàng</li>
                                                <li>Báo cáo doanh thu theo
                                                ca làm việc</li>
                                                <li>Báo cáo doanh thu theo
                                                    nhân viên
                                                    <ul>
                                                        <li>Xem tất cả</li>
                                                    </ul>
                                                </li>
                                                <li>Báo cáo lợi nhuận bán
                                                hàng</li>
                                                <li>Báo cáo nhập hàng</li>
                                                <li>Báo cáo nhập hàng chi
                                                tiết</li>
                                                <li>Báo cáo phản ứng có hại
                                                của thuốc</li>
                                                <li>Báo cáo thất thoát nhầm
                                                    lẫn thuốc kiểm soát đặc
                                                biệt</li>
                                                <li>Báo cáo xuất nhập tồn
                                                    thuốc kiểm soát đặc biệt
                                                </li>
                                                <li>Sổ kiểm soát chất lượng
                                                định kỳ và đột xuất</li>
                                                <li>Sổ theo dõi bán thuốc
                                                không theo đơn</li>
                                                <li>Sổ theo dõi bán thuốc
                                                theo đơn</li>
                                                <li>Sổ theo dõi hạn dùng
                                                </li>
                                                <li>Sổ theo dõi mua bán
                                                thuốc</li>
                                                <li>Sổ theo dõi nhiệt độ độ
                                                ẩm</li>
                                                <li>Sổ theo dõi thông tin
                                                bệnh nhân</li>
                                                <li>Sổ theo dõi thu hồi
                                                thuốc</li>
                                                <li>Sổ theo dõi vệ sinh</li>
                                                <li>Sổ theo dõi xuất nhập
                                                thuốc</li>
                                                <li>Sổ theo dõi xử lý khiếu
                                                nại</li>
                                            </ul> --}}
                                        </li>
                                        <li data-value="Category" >Danh mục
                                            {{-- <ul>
                                                <li>Ca làm việc</li>
                                                <li>Cấu hình giá</li>
                                                <li>Đơn thuốc mẫu</li>
                                                <li>Hàng hoá</li>
                                                <li>Nhóm hàng hoá</li>
                                                <li>Nhóm khách hàng</li>
                                                <li>Nhóm nhà cung cấp</li>
                                            </ul> --}}
                                        </li>
                                        <li data-value="Partner">Đối tác
                                            {{-- <ul>
                                                <li>Bác sĩ</li>
                                                <li>Khách hàng</li>
                                                <li>Nhà cung cấp</li>
                                            </ul> --}}
                                        </li>
                                        <li data-value="Invoice">Quản lý hoá đơn
                                            {{-- <ul>
                                                <li>Huỷ hoá đơn</li>
                                                <li>In phiếu</li>
                                                <li>Tạo phiếu khách trả</li>
                                                <li>Thêm mới từ excel</li>
                                                <li>Xem chi tiết</li>
                                            </ul> --}}
                                        </li>
                                        <li data-value="Inventory">Quản lý kho
                                            {{-- <ul>
                                                <li>Kiểm kho</li>
                                                <li>Khách hàng trả lại</li>
                                                <li>Nhập tồn</li>
                                                <li>Nhập từ nhà cung cấp
                                                </li>
                                                <li>Tồn kho</li>
                                                <li>Truy xuất hàng hoá</li>
                                                <li>Xuất huỷ</li>
                                                <li>Xuất trả nhà cung cấp
                                                </li>
                                            </ul> --}}
                                        </li>
                                        <li data-value="Administration">Quản trị
                                            {{-- <ul>
                                                <li>Cài đặt</li>
                                                <li>Cấu hình hệ thống</li>
                                                <li>Các hình mẫu in</li>
                                                <li>Cấu hình tem in</li>
                                                <li>Lịch sử thao tác</li>
                                                <li>Nạp tiền đăng ký gói
                                                cước</li>
                                                <li>Người dùng
                                                    <ul>
                                                        <li>Chỉnh sửa người
                                                        dùng</li>
                                                        <li>Đăng nhập cho
                                                        người dùng</li>
                                                        <li>Tạo người dùng
                                                        mới</li>
                                                        <li>Thay đổi quyền
                                                        truy cập</li>
                                                        <li>Xoá người dùng
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>Vai trò
                                                    <ul>
                                                        <li>Sửa vai trò</li>
                                                        <li>Tạo mới vai trò
                                                        </li>
                                                        <li>Xoá vai trò</li>
                                                    </ul>
                                                </li>
                                            </ul> --}}
                                        </li>
                                        <li data-value="Warehouse">Sổ quỹ
                                            {{-- <ul>
                                                <li>Huỷ phiếu</li>
                                                <li>In phiếu</li>
                                                <li>Tạo phiếu chi</li>
                                                <li>Tạo phiếu thu</li>
                                                <li>Xem chi tiết</li>
                                                <li>Xuất file excel</li>
                                            </ul> --}}
                                        </li>
                                        <li data-value="Overview">Tổng quan</li>
                                        <li data-value="Notification">Thông báo</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="changeRole" class="btn btn-primary" ><em class="fa fa-save"></em> Lưu</button>
                <button type="button" class="btn btn-danger"
                data-dismiss="modal"><em class="fa fa-close"></em> Đóng</button>
            </div>

        </div>
    </div>
</div>
</div>
</div><!-- br-mainpanel -->
<style type="text/css">
    input[disabled]{
        cursor: not-allowed;
    }
</style>
<!-- ########## END: MAIN PANEL ########## -->
<script>
    function editFunc(id){
        $('#id').val(id);
        $("#jstree").jstree(true).uncheck_all();
        $.ajax({
            type:"GET",
            url: "{{ url('vaitro/edit') }}",
            data: { id: id },
            dataType: 'json',
            success: function(res){
                let role = res.role;
                let permissions = res.permissions;
                if(role[0].name=='Admin'){
                    $('#name').val(role[0].name);
                }
                if(role[0].name=='Management'){
                    $('#name').val("Quản lý");
                }
                if(role[0].name=='Seller'){
                    $('#name').val("Bán hàng");
                }
                if(role[0].name=='Warehouse'){
                    $('#name').val("Kho");
                }
                $('#titleEdit').text("Sửa vai trò: "+$('#name').val());
                permissions.forEach(item=>{
                    if(item.name){
                        $('#jstree').jstree(true)
                        .select_node('j1_'+(parseInt(item.id)+1));
                    }
                })
            }
        });        
    } 

    $(document).ready(function() {
        $('#changeRole').click(function(){
            let data = [];
            let dataRole = $('#jstree').jstree("get_selected", true);

            dataRole.forEach(item=>{
                data.push(item.data.value);
            })

            let checkha = data.includes("Administration");
            if(!checkha && $('#name').val()=="Admin"){
                toastr.error('Admin bắt buộc phải có quyền quản trị ', {timeOut:2400});
            }else if(dataRole==''){
                toastr.error('Hãy chọn ít nhất một quyền cho vai trò '+$('#name').val(), {timeOut:2400});
            }else{
                $.ajax({
                    type: "POST",
                    url: "{{ url('vaitro') }}",
                    data: {id:$('#id').val(),data:data},
                    success: function(res){
                        if(res){
                            toastr.success('Thay đổi quyền cho '+$('#name').val()+' thành công', {timeOut:2400});
                            $('#chiTiet').modal('toggle');
                        }
                    }
                })
            }
        })

        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
        var table = $('#data-table').DataTable({
          processing: true,
          responsive: true,
          "ordering": false,
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
            url: "{{ url('vaitro') }}",
        },
        columns: [
        { data: 'id', name: 'id'},
        { data: null,
            "render": function(data,type,row){
                if(data['name']=='Admin'){
                    return 'Admin'
                }
                if(data['name']=='Management'){
                    return 'Quản lý'
                }
                if(data['name']=='Seller'){
                    return 'Bán hàng'
                }
                if(data['name']=='Warehouse'){
                    return 'Kho'
                }
            }
        },
        { data: 'created_at', name: 'created_at'},
        { data: 'action', name: 'action'},
        ]
    });

        $('.fc-datepicker').datepicker({
            showOtherMonths: true,
            selectOtherMonths: true
        });

        $('#jstree').jstree({
            "checkbox" : {
              "keep_selected_style" : false
          },

          "plugins" : [ "checkbox", "wholerow" ]
      }
      ).on('ready.jstree', function(){ $(this).jstree('open_all') });
    });

</script>
@endsection
