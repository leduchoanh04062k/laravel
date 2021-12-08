@extends('default')
@section('title','Đơn thuốc mẫu')
@section('content')
<div class="br-mainpanel pos-relative">
  <div class="tab1">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
      <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Đơn thuốc mẫu</h4>
      <div class="d-flex">
        <div class="mg-r-10">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" id="inTab2">
            <i class='fas fa-plus' style='font-size:15px;'></i>
            Thêm mới
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
              <option value="Ngừng h.động">Ngừng hoạt động</option>
            </select>
          </div>
          <div class="col-md-5">
            <label for="">Từ khoá tìm kiếm</label>
            <input id="searchBySupplier" type="text" class="form-control" placeholder="Tìm kiếm theo tên đơn mẫu thuốc">
          </div>
          <div class="col-md-2 align-self-end">
            <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"> <i class="fas fa-search" style="padding: 3px"></i>Tìm kiếm</button>
          </div>
        </div>

        <div class="mg-t-20">
            <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
          <table id="data-table1" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" style="width: 100%">
            <thead>
              <tr>
                <th scope="col" class="bg-primary" style="color: white;width:4%;">#</th>
                <th scope="col" class="bg-primary" style="color: white;min-width:100px;width:25%;" >Tên đơn thuốc mẫu</th>
                <th scope="col" class="bg-primary" style="color: white;min-width:100px;width:30%;" >Nhà thuốc áp dụng</th>
                <th scope="col" class="bg-primary" style="color: white;min-width:100px;width:20%;" >Thời hạn</th>
                <th scope="col" class="bg-primary" style="color: white;width:12%;" >Trạng thái</th>
                <th scope="col" class="bg-primary" style="color: white;width:11%;"></th>
              </tr>
            </thead>
          </table>
        </div>
      </div><!-- row -->
    </div><!-- br-pagebody -->
  </div>

  <!-- tab2 -->
  <div class="pos-absolute t-0 l-0 hidden tab2" style="width:100%;">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30">
      <div class="row">
        <h4 class="tx-gray-800 mg-b-5 col-6">Đơn thuốc mẫu > Tạo mới đơn thuốc mẫu</h4>
      </div>
    </div>

    <!-- nhập thông tin -->
    {{-- <form action="" id="donThuocMau"> --}}
      <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="shadow-base bg-white pd-15">
            <form id="submitdonthuocmau">
          <div class="mg-b-20">
            <div class="row">
              <div class="col-md-4 mg-t-10">
                <label for="" class="tx-bold tx-gray-800">Tên đơn thuốc mẫu <span class="text-danger">*</span></label>
                <input type="hidden" name="id" class="id" value="">
                <input class="form-control name" type="text" name="name">
              </div>
              <div class="col-md-4 mg-t-10">
                <label for="" class="tx-bold tx-gray-800">Nhà thuốc áp dụng</label>
                <div class="">
                  <!-- Button nhà thuốc -->
                  <button type="button" class="form-control text-info" data-toggle="modal" data-target="#nhaThuoc">
                    Nhà thuốc Morioka
                  </button>

                  <!-- Modal nhà thuốc-->
                  <div class="modal fade" id="nhaThuoc" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width: none;width: 50em;vertical-align: top;">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Danh sách nhà thuốc trong chuỗi</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="input-group hidden-xs-down transition align-items-center">
                                <input id="searchbox" type="text" class="form-control" placeholder="Tìm kiếm tên nhà thuốc theo mã">
                                <span class="input-group-btn">
                                  <button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
                                </span>
                              </div><!-- input-group -->
                            </div>
                          </div>
                          <div class="row mg-t-10">
                            <div class="col-md-12">
                              <nav>
                                <div class="nav nav-tabs flex-column" id="nav-tab" role="tablist">
                                  <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-home" aria-selected="true">All</a>
                                  <a class="nav-item nav-link" id="nav-nhaThuoc-tab" data-toggle="tab" href="#nav-nhaThuoc" role="tab" aria-controls="nav-profile" aria-selected="false">Nhà thuốc Morioka</a>
                                </div>
                              </nav>
                            </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary">Chọn nhà thuốc</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 mg-t-10">
                <label for="" class="tx-bold tx-gray-800">Trạng thái</label> <br>
                <input type="radio" name="status"  value="1"checked> <label for="" class="tx-gray-800 mg-r-10">Hoạt động</label>
                <input type="radio" name="status" value="0"> <label for="" class="tx-gray-800">Ngừng hoạt động</label>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mg-t-10">
                <div class="row">
                    <div class="col-12">
                        <label for="" class="tx-bold tx-gray-800">Ngày bắt đầu áp dụng  <span class="text-danger">*</span></label>
                    </div>
                    <div class="col-12">
                        <input type="date" class="form-control  date" name="start_date" value="<?php echo date('Y-m-d') ?>">
                    </div>
                </div>
              </div>
              <div class="col-md-4 mg-t-10">
                <label for="" class="tx-bold tx-gray-800">Ngày kết thúc áp dụng</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="icon ion-calendar tx-16 lh-0 op-6"></i></span>
                  <input type="text" class="form-control fc-datepicker" name="end_date" value="<?php echo date('Y-m-d') ?>">
                </div>
              </div>
              <div class="col-md-4 mg-t-10">
                <label for="" class="tx-bold tx-gray-800">Ghi chú</label>
                <textarea name="note" cols="30" rows="1" class="form-control"></textarea>
              </div>
            </div>
          </div>
        </div>
    </form>
        <div class="shadow-base bg-white pd-15 mg-t-25">
          <div >
            <label class="tx-gray-900 tx-bold">Thêm hàng hoá vào phiếu</label>
            <div class="pos-relative">
             <input autocomplete="off" onfocus="this.value=''" class="form-control" id="autoSearchImage">
              <button class="btn btn-primary pos-absolute r-0 t-0" data-toggle="modal" data-target="#search">
                <i class="fa fa-plus-circle mg-r-5" aria-hidden="true"></i>
                Tìm kiếm nâng cao
              </button>

            </div>
          </div>
        </div>

        <div class="shadow-base bg-white pd-15 mg-t-25">
          <div style="overflow-x: auto;">
            <label for="" class="tx-bold tx-gray-800" id="info-data-table3"></label>
          <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table3">
            <thead>
              <tr>
                <th scope="col" class="bg-primary" style="color: white;">#</th>
                <th scope="col" class="bg-primary" style="color: white;">Mã hàng hoá</th>
                <th scope="col" class="bg-primary" style="color: white;">Tên hàng hoá</th>
                <th scope="col" class="bg-primary" style="color: white;">Liều dùng</th>
                <th scope="col" class="bg-primary" style="color: white;">Số lượng</th>
                <th scope="col" class="bg-primary" style="color: white;">Đơn vị tính</th>
                <th scope="col" class="bg-primary" style="color: white;"></th>
              </tr>
            </thead>
            <tbody>
            </tbody>
          </table>
        </div>
      </div>

        <div class="d-flex justify-content-end  mg-t-15">
          <button type="submit" id="submit" class="btn btn-primary mg-r-10 submitPhieuNhap">
            <i class='far fa-save' style='font-size:13px;padding:2px'></i>
            Lưu
        </button>
          <button class="btn btn-danger" id="outTab2"><i class='fas fa-reply' style='font-size:13px'></i>Trở về</button>
        </div>
      </div>
    </form>
    <!-- Modal tìm kiếm nâng cao-->
    <div class="modal fade" id="search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                  <select name="" id="" class="form-control">
                    <option value="">Dược phẩm</option>
                    <option value="">Vật tư y tế</option>
                    <option value="">Hàng hoá khác</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="" class="tx-gray-800 tx-bold">Nhóm hàng</label>
                  <select name="" id="" class="form-control">
                    <option value="">Hô hấp</option>
                    <option value="">Tuần hoàn não</option>
                    <option value="">Hàng hoá khác</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="" class="tx-gray-800 tx-bold">Hạn sử dụng</label>
                  <select name="" id="" class="form-control">
                    <option value="">Sử dụng tốt</option>
                    <option value="">Sắp hết hạn</option>
                    <option value="">Đã hết hạn</option>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="" class="tx-gray-800 tx-bold">Chỉ tìm kiếm hàng tồn kho</label><br>
                  <div class="toggle-wrapper">
                    <div class="toggle toggle-modern primary" >
                      <div class="toggle-slide">
                        <div class="toggle-inner" style="width: 94px; margin-left: 0px;">
                          <div class="toggle-on active" style="height: 26px; width: 47px; text-indent: -8.66667px; line-height: 26px;" ></div>
                          <div class="toggle-blob" style="height: 26px; width: 26px; margin-left: -13px;"></div>
                          <div class="toggle-off" style="height: 26px; width: 47px; margin-left: -13px; text-indent: 8.66667px; line-height: 26px;"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-9">
                  <label for="" class="tx-gray-800 tx-bold">Từ khoá tìm kiếm</label>
                  <input type="text" class="form-control" placeholder="Nhập từ khoá tìm kiếm, ấn enter để tìm">
                </div>
                <div class="col-md-2 align-self-end">
                  <button class="btn btn-primary">
                    <i class="fa fa-search mg-r-5" aria-hidden="true"></i>
                    Tìm kiếm
                  </button>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#timKiem">Kết quả tìm kiếm</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#daChon">Đã chọn</a>
                    </li>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div id="timKiem" class="tab-pane active"><br>
                      <table id="data-table2" class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" width="100%">
                        <thead>
                          <tr>
                            <th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
                            <th scope="col" class="bg-primary" style="color: white;">Tên</th>
                            <th scope="col" class="bg-primary" style="color: white;">Tồn kho</th>
                            <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                            <th scope="col" class="bg-primary" style="color: white;">Số ĐK</th>
                            <th scope="col" class="bg-primary" style="color: white;">Quy cách đóng gói</th>
                            <th scope="col" class="bg-primary" style="color: white;">Hãng sản xuất</th>
                            <th scope="col" class="bg-primary" style="color: white;">Hoạt chất chính</th>
                          </tr>
                        </thead>
                        <tbody>

                        </tbody>
                      </table>
                    </div>
                    <div id="daChon" class="tab-pane fade"><br>
                      <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd">
                        <thead>
                          <tr>
                            <th scope="col" class="bg-primary" style="color: white;">Mã HH</th>
                            <th scope="col" class="bg-primary" style="color: white;">Tên</th>
                            <th scope="col" class="bg-primary" style="color: white;">Tồn kho</th>
                            <th scope="col" class="bg-primary" style="color: white;">ĐVT</th>
                            <th scope="col" class="bg-primary" style="color: white;">Số ĐK</th>
                            <th scope="col" class="bg-primary" style="color: white;">Quy cách đóng gói</th>
                            <th scope="col" class="bg-primary" style="color: white;">Hãng sản xuất</th>
                            <th scope="col" class="bg-primary" style="color: white;">Hàm lượng</th>
                            <th scope="col" class="bg-primary" style="color: white;"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Mark</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" id="submitHangHoa2" class="btn btn-primary">Xong</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- end tab2 -->


</div><!-- br-mainpanel -->
<!-- ########## END: MAIN PANEL ########## -->
<style type="text/css">
  input[type="radio"] {
    font-size: 1.33333333em;
    cursor: pointer;
  }
</style>
<script src="../lib/jquery-ui/jquery-ui.js"></script>

<script>
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
          $('#autoSearchImage').typeahead({
            source: function(query, process) {
              return $.get("{{ url('donthuocmau/autosearchimage') }}", {
                query: query
              }, function(data) {
                return process(data);
              });
            },
            highlighter: function (item, data) {
              var parts = item.split('#'),
              html = '<div class="d-flex">';
              html += '<div class="tx-center">';
              html += '<img src="{{ asset('image/medicine-default.jpg') }}" alt="" width=86em >';
              html += '</div>';
              html += '<div class="mg-l-10 align-self-center">';
              html += '<div>Tên: <strong>'+data.name+' -- '+data.unit+' </strong></div>';
              html += '<div>Mã HH: <strong>'+data.id+'</strong> | SĐK: <strong>'+data.reg_no+'</strong> | Hoạt chất: <strong>'+data.ingredient+'</strong></div>';
              html += '<div>Quy cách ĐG: <strong>'+data.packaging+'</strong> | Hãng SX: <strong>'+data.manufacture+'</strong></div>';
              html += '</div>';
              html += '</div>';
              return html;
            },
            updater: function(result) {
              result.stock_id = result.id;
              result.note = null;
              result.dose=null;
              result.VAT=0;
              result.packaging=null;
              result.dataunit = getDataUnitStock(result.stock_id);
              result.datalotno = getDataLonoStock(result.stock_id);
              result.id = null;
              DataTable_hanghoa.push(result);
              loadData();
              return result;
            }
          });
          function updateData(data) {
            var key = $(data).attr("data-id");
            var value = $(data).attr("data-name");
            DataTable_hanghoa[key][value] = $(data).val();
            loadData();
            console.log(DataTable_hanghoa);
          }


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


          function removeData(index){
            DataTable_hanghoa.splice(index,1);
            console.log(DataTable_hanghoa);
            loadData();
          }

          function duplicatedData(index){
            DataTable_hanghoa.push({
            id : null,
             stock_id : DataTable_hanghoa[index].stock_id,
             unit_id :DataTable_hanghoa[index].unit_id,
             lotno_id: DataTable_hanghoa[index].lotno_id,
             note :DataTable_hanghoa[index].note,
             VAT :DataTable_hanghoa[index].VAT,
              name: DataTable_hanghoa[index].name,
              dose: DataTable_hanghoa[index].dose,
              qty: DataTable_hanghoa[index].qty,
              unit:DataTable_hanghoa[index].unit
            });
            loadData();
            console.log(DataTable_hanghoa);
          }

          function loadData(){
            var index=0;
            $('#data-table3').DataTable().clear().draw();
            DataTable_hanghoa.forEach(item=>{
              $('#data-table3').DataTable().row.add([
                '<div style="width:100%;border:0" data-name="id" data-id="'+index+'" class="form-control" >'+(index+1)+'</div>',
			          '<div style="width:100%;color:black;border:0" data-name="code" data-id="'+index+'" onclick="editInfoStock('+item.stock_id+')" class="form-control" >HH0000'+item.stock_id+'</div>',
			          '<div style="width:100%;color:black;border:0;" data-name="name" data-id="'+index+'" onclick="editInfoStock('+item.stock_id+')" class="form-control" >'+item.name+'</div>',
                '<input class="form-control" style="width:80%;" type="text" data-name="dose" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['dose'] || '')+'" onchange="updateData(this)" placeholder="Liều dùng" />',
                '<input class="form-control" style="width:80%;" type="text" data-name="qty" data-id="'+index+'" value="'+(DataTable_hanghoa[index]['qty'] || '')+'" onchange="updateData(this)" placeholder="số lượng" />',
                '<select disabled style="width:100%;" data-name="unit" data-id="'+index+'" onchange="updateData(this)"><option value="'+item.unit+'">'+item.unit+'</option>',
                '<span class="fa fa-plus-square" style="color:#0753a1" data-id="'+index+'" onclick="duplicatedData('+index+')"></span> <span class="fas fa-trash-alt" style="color:#bd2130" data-id="'+index+'" onclick="removeData('+index+')"></span>'
                ]).draw( false );
                $("#data-table3 select[data-name='unit']").select2({
                  minimumResultsForSearch : -1
                });

            new AutoNumeric("input[data-name='qty'][data-id='"+index+"']", {
			minimumValue: 0,
			decimalPlaces: 0,
			modifyValueOnWheel: false,
			unformatOnHover: false
		});
            index++;
            });
            sumTotal = $("input[data-name='total']")
            .map(function(){return $(this).val();}).get();
            $('.total').val(sum(sumTotal));
            }

            function qty_import(a,b,c){
            if(a==0){
                    return a=b-c;
                }else{
                    return a=b
                }
            }

            function total(a,b,c,d){
                var e;
                if(a==0){
                    return a=((b-c)*d)
                }else{
                    return a=b
                }
            }
          function sum(arr){
            var total = 0;
            arr.forEach(item=>{
            total+=parseFloat(item);
            });
            return total;
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
              .columns(4).search($("#searchByStatus").val())
              .draw();

          };

        $(document).ready(function(){
          $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });


          var table1 = $('#data-table1').DataTable({
           processing: true,
           ordering: false,
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
           url: "{{ url('donthuocmau') }}",
          },
          columns:
            [
              { data: 'DT_RowIndex', name: 'DT_RowIndex',orderable: false},
              { data: 'name', name: 'name', orderable: false},
              {
                data: null,orderable: false,
                "render": function(data,type,row) { return "<p style='cursor:pointer' class='text-primary'>Nhà thuốc Morioka</p>"}
              },
              { data:'start_date', name: 'start_date', orderable: false},
              { data: 'status', name: 'status', orderable: false},
              { data: 'action', name: 'action',orderable: false},
            ]
        });
        searchDateTable();



    var table2 = $('#data-table2').DataTable({
      "responsive": true,
      "select": true,
      "lengthChange": false,
      "ordering": false,
      "info":     false,
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
    dataWarehouse.forEach(function (a) {
     if (!this[a.lotno_id]) {
      this[a.lotno_id] = { lotno_id: a.lotno_id, qty: 0};
      warehouse.push(this[a.lotno_id]);
  }
  if((a.type==='import_from_supplier') || (a.type==='import_inventory') || (a.type==='return_from_customer')){
      this[a.lotno_id].qty += a.qty;
  }else{
      this[a.lotno_id].qty -= a.qty;
  }
}, Object.create(null));
    console.log(warehouse);

    for(let i = 0; i< data.length;i++){
     for(let j = 0;j< warehouse.length;j++){
      if(data[i].lotno_id == warehouse[j].lotno_id){
       data[i].qty = warehouse[j].qty;
   }
}
}
return data;
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


          var table3 = $('#data-table3').DataTable({
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
          });

          $('#data-table2 tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    });

    $("#submitHangHoa2" ).click(function() {
      hangHoa2 = table2.rows('.selected').data().toArray();
      table2.$('tr.selected').removeClass('selected');
      $('#search').modal('hide');
      hangHoa2.forEach(item=>{
       item.stock_id = item.id;
       item.discount = 0;
       item.id = null;
       item.price = 0;
       item.qty = 0;
       item.VAT = 0;
       item.dose =0;
       item.dataunit = getDataUnitStock(item.stock_id);
       DataTable_hanghoa.push(item);
   });
      loadData();
  });


    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ui.autocomplete.prototype._renderMenu = function(ul, items) {
      var self = this;
      ul.append("<table class='table table-bordered tx-13 tx-gray-700 mg-b-0 bd'><thead><tr><th class='bg-primary' style='color: white;'>ID</th><th class='bg-primary' style='color: white;'>Tên thuốc</th><th class='bg-primary' style='color: white;'>SĐK</th><th class='bg-primary' style='color: white;'>Đơn vị tính</th><th class='bg-primary' style='color: white;'>Hoạt chất</th><th class='bg-primary' style='color: white;'>Quy cách</th><th class='bg-primary' style='color: white;'>Hãng sản xuất</th></tr></thead><tbody></tbody></table>");
      $.each( items, function( index, item ) {
        self._renderItemData(ul, ul.find("table tbody"), item );
    });
  };
  $.ui.autocomplete.prototype._renderItemData = function(ul,table, item) {
      return this._renderItem( table, item ).data( "ui-autocomplete-item", item );
  };
  $.ui.autocomplete.prototype._renderItem = function(table, item) {
      return $( "<tr class='ui-menu-item' role='presentation'></tr>" )

      .append( "<td>"+item.id+"</td>"+"<td>"+item.name+"</td>"+"<td>"+item.code+"</td>"+"<td>"+item.unit+"</td>"+"<td>"+item.main_ingredient+"</td>"+"<td>"+item.packaging+"</td>"+"<td>"+item.manufacture+"</td>" )
      .appendTo( table );
  };

      });

    function editInfoStock(idStock){
    $.ajax({
      type: "GET",
      url: "{{ url('donthuocmau/editinfostock') }}",
      data: {id:idStock},
      success: function(success) {
        $('#stockname').val(success[0].name);
        $('.stock_type').val(success[0].stock_type);
        $('.stock_type').attr('disabled',true);
        $('.reg_no').val(success[0].reg_no);
        $('.ingredient').val(success[0].ingredient);
        $('.manufacture').val(success[0].manufacture);
        $('.content').val(success[0].content);
        $('.made_in').val(success[0].made_in);
        $('.packaging').val(success[0].packaging);
        $('.VAT').val(success[0].VAT);
        $('.note').val(success[0].note);
      }
    });
    $("#selectLotNo").select2();
    $.ajax({
      type:"GET",
      url: "{{ url('donthuocmau/editlotno') }}",
      data: {id:idStock},
      dataType: 'json',
      success: function(response){
        response.forEach(item=>{
          item.name = item.lot_no
        })
        console.log(response);
        response.forEach(item=>{
          var optionData = '<option value="'+item.id+'">Số lô: '+item.lot_no+' - HSD: '+item.exp_date+' - Giá nhập: '+item.price_import+'</option>';
          $('#selectLotNo').append(optionData);
        })
      }
    });
  }
      $(".submitPhieuNhap").click(function(){
        if(DataTable_hanghoa==''){
              $.toast({
                text : "Chưa có hàng hoá",
                position: "bottom-right",
                icon:"error",
                stack:1,
                loader:false
              })
            }else if($("input[name='name']").val()==''){
              $.toast({
                text : "Bạn chưa nhập tên đơn mẫu thuốc",
                position: "bottom-right",
                icon:"error",
                stack:1,
                loader:false
              })
            }else if($("input[name ='start_date']").val()==''){
                $.toast({
                text : "Bạn chưa nhập ngày bắt đầu",
                position: "bottom-right",
                icon:"error",
                stack:1,
                loader:false
              })
            }else if($("input[data-name ='qty']").val()==''){
                $.toast({
                text : "Số lượng của bạn phải lớn hơn 0",
                position: "bottom-right",
                icon:"error",
                stack:1,
                loader:false
              })
            }else{
        $.ajax({
          url: "{{ url('donthuocmau/submitdonthuocmau') }}",
          type: "POST",
          data: $('#submitdonthuocmau').serialize(),
          success: function( response ) {
            DataTable_hanghoa.forEach(item => {
                  item.idha = response.id;
                  item.qty = replaceCurrency(item.qty);
                });
            console.log(DataTable_hanghoa);
            $.ajax({
              url: "{{ url('donthuocmau/submitphieunhap') }}",
              type: "POST",
              dataType:'json',
              contentType: 'json',
              data: JSON.stringify(DataTable_hanghoa),
              contentType: 'application/json; charset=utf-8',
              success: function( data ) {
                console.log(DataTable_hanghoa);
                $('#data-table1').DataTable().ajax.reload();
                $(".submitPhieuNhap").load(
                  $.toast({
                    text : "Tạo phiếu thành công",
                    position: "bottom-right",
                    icon:"success",
                    stack:1,
                    loader:false
                  }));
                  $(".tab1").removeClass("hidden");
                $(".tab2").addClass("hidden");
              }

            });
          }
        });
            }
      });

      function getDataUnitStock(stock_id){
        var dataUnitStock = [];
        $.ajax({
          type: "GET",
          url: "{{ url('donthuocmau/getlistunitwithid') }}",
          data: {id:stock_id},
          async: false,
          success: function(response) {
            response.forEach(item=>{
              dataUnitStock.push({
                name : item.unit
              });
            });
          }
        });
        return dataUnitStock;
      }


      function getDataLonoStock(stock_id){
        var dataLotnoStock = [];
        $.ajax({
          type: "GET",
          url: "{{ url('donthuocmau/getlistlotnowithid') }}",
          data: {id:stock_id},
          async: false,
          success: function(response) {
            response.forEach(item=>{
                dataLotnoStock.push({
                name : item.price_import
              });
            });
          }
        });
        return dataLotnoStock;
      }


      function editFunc(id){
        $.ajax({
          type:"GET",
          url: "{{ url('donthuocmau/edit') }}",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            $('.id').val(res.id);
            $('.autosearch').val(res.name);
            $('.name').val(res.name);
            $('.date').val(res.start_date);
            $.ajax({
              type:"GET",
              url: "{{ url('donthuocmau/editstock') }}",
              data: { id: id },
              dataType: 'json',
              success: function(response){
                DataTable_hanghoa = response;
                loadData();
                console.log(response);

              }
            });
          }
        });
      }

  function changeFunc(id){
    Swal.fire({
      title: 'Cảnh báo!',
      text: "Bạn chắc chắn muốn dừng hoạt động này không?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type:"POST",
          url: "{{ url('donthuocmau/active') }}",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            $('#data-table1').DataTable().ajax.reload();
            $("#data-table").load(
              $.toast({
                text : "Tạm dừng hoạt động đơn thuốc mẫu",
                position: "bottom-right",
                icon:"success",
                stack:1,
                loader:false
              }));
            var oTable = $('#data-table').dataTable();
            oTable.fnDraw(false);
          }
        });
      } else {
        swal("Cancelled Successfully");
      }
    });
  }
  function unChangeFunc(id){
    Swal.fire({
      title: 'Cảnh báo!',
      text: "Bạn chắc chắn muốn kích hoạt động này không?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Đồng ý!'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          type:"POST",
          url: "{{ url('donthuocmau/unactive') }}",
          data: { id: id },
          dataType: 'json',
          success: function(res){
            $('#data-table1').DataTable().ajax.reload();
            $("#data-table").load(
              $.toast({
                text : "Kích hoạt động đơn thuốc mẫu thành công",
                position: "bottom-right",
                icon:"success",
                stack:1,
                loader:false
              }));
            var oTable = $('#data-table').dataTable();
            oTable.fnDraw(false);
          }
        });
      } else {
        swal("Cancelled Successfully");
      }
    });
  }
</script>
<script>
 $(document).ready(function() {

    // Datepicker
    $('.fc-datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true
    });

    $("#inTab2").click(function(){
      $(".tab1").addClass("hidden");
      $(".tab2").removeClass("hidden");
    })
    $('.toggle').toggles({
      on: true,
      height: 26
    });

    $("#submitdonthuocmau").validate({
      rules:{
        name:{
          required:true,
          minlength:6
        },
        start_date:{
            required:true,
        }
      },
      messages:{
        name:{
         required: "Vui lòng nhập tên",
         minlength:"Vui lòng nhập trên 5 kí tự"
       },
       start_date:"Vui lòng nhập ngày",
     }
   });
    $("#searchProduct").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#searchData tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  })
</script>
@endsection
