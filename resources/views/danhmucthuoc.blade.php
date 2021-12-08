@extends('default')
@section('title','Danh mục thuốc')
@section('content')
<div class="br-mainpanel">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
        <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Danh mục thuốc quốc gia</h4>
        <div>
            <button type="button" class="btn btn-info" id="exportExcelDBLotNo">
                <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
            </button>
        </div>
    </div>
    <div class="br-pagebody pd-x-20 pd-sm-x-30">
        <div class="shadow-base bg-white pd-15">
            <div class="row tx-gray-900">
                <div class="col-md-10">
                    <input id="searchProduct" type="text" class="form-control" autocomplete="off"
                        placeholder="Tìm kiếm theo mã hoặc tên thuốc">
                </div>
                <div class="col-md-2 align-self-end">
                    <button class="btn btn-info" id="searchData"><i class="fas fa-search" style="padding: 3px"></i>Tìm
                        kiếm</button>
                </div>
            </div>
            <div class="mg-t-5">
                <label for="" id="info-data-table" class="tx-bold tx-gray-800"></label>
                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" id="data-table" style="width:100%">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-primary "
                                style="color: white;min-width: 4%;text-transform: none;">STT</th>
                            <th scope="col" class="bg-primary" style="color: white;min-width: 5%;text-transform: none;">
                                Mã thuốc</th>
                            <th scope="col" class="bg-primary"
                                style="color: white;min-width: 10%;text-transform: none;">Số đăng ký</th>
                            <th scope="col" class="bg-primary"
                                style="color: white;min-width: 17%;text-transform: none;">Tên thuốc</th>
                            <th scope="col" class="bg-primary"
                                style="color: white;min-width: 16%;text-transform: none;">Hãng sản xuất</th>
                            <th scope="col" class="bg-primary"
                                style="color: white;min-width: 12%;text-transform: none;">Nước sản xuất</th>
                            <th scope="col" class="bg-primary" style="color: white;min-width: 6%;text-transform: none;">
                                ĐVT</th>
                            <th scope="col" class="bg-primary"
                                style="color: white;min-width: 15%;text-transform: none;">Đóng gói</th>
                            <th scope="col" class="bg-primary"
                                style="color: white;min-width: 15%;text-transform: none;">Hoạt chất chính</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div><!-- row -->
    </div><!-- br-pagebody -->

</div>
<script type="text/javascript">
  $(document).ready( function () {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    var table = $('#data-table').DataTable({
      "processing": true,
      "serverSide": true,
      "ordering": false,
      "responsive": true,
      "pageLength": 20,
      "lengthMenu": [[5, 10, 20, 50, 100], [5, 10, 20, 50, 100]],
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
      ajax: "{{ url('danhmucthuoc') }}",
      columns: [
      { data: 'id', name: 'id' ,searchable: false},
      { data: null,
        "render": function(data,type,row) {
          return "DQG"+checkRangeValue(data["id"])
        }
      },
      { data: 'reg_no', name: 'reg_no',searchable: false},
      { data: 'name', name: 'name' },
      { data: 'manufacture', name: 'manufacture',searchable: false },
      { data: 'made_in', name: 'made_in',searchable: false },
      { data: 'unit', name: 'unit',searchable: false },
      { data: 'packaging', name: 'packaging',searchable: false},
      { data: 'main_ingredient', name: 'main_ingredient',searchable: false},
      ],
      dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, {
                extend: 'excelHtml5',
                title: 'DanhMucThuocQuocGia'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
            })
            ]
      });
      $('.dt-buttons a[aria-controls="data-table"]').appendTo('#exportExcelDBLotNo');

    $("#searchProduct").keyup(function(event) {
      if (event.keyCode === 13) {
        $("#searchData").click();
      }
    });

    $("#searchData").click(function() {
      table
      .columns(3)
      .search( $('#searchProduct').val() )
      .draw();
    });

  });
</script>
@endsection
