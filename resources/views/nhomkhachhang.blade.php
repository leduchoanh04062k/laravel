@extends('default')
@section('title','Nhóm khách hàng')
@section('content')
<div class="br-mainpanel">
    <div class="pd-x-20 pd-sm-x-30 pd-t-20 pd-sm-t-30 d-flex justify-content-between">
        <h4 class="tx-gray-800 mg-b-5 tx-uppercase">Nhóm khách hàng</h4>
        <div class="d-flex">
            <div class="mg-r-10">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class='fas fa-plus' style='font-size:15px;'></i>
                    Thêm mới
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width:50em;vertical-align: top;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Thêm nhóm khách hàng</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="" id="customer_group" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="" class="tx-gray-800 tx-bold">Mã nhóm</label>
                                            <input type="text" name="group_type" class="form-control"
                                                placeholder="Mã tự động">
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="" class="tx-gray-800 tx-bold">Tên nhóm khách hàng <span
                                                    class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="name">
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                            <textarea name="note" cols="30" rows="2" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu và
                                        thêm mới</button>
                                    <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu và
                                        đóng</button>
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

                <!-- Modal -->
                <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document" style="max-width:none;width:80em;vertical-align: top;">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nhập nhóm khách hàng từ file excel</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form id="importExcelForm" name="importExcelForm" method="POST"
                                enctype="multipart/form-data">
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
                                                                    style="color: white;">Trạng thái</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Ghi chú</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Tên nhóm khách hàng</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Ghi chú nhóm khách hàng</th>
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
                                                                    style="color: white;">Ghi chú</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Tên nhóm khách hàng</th>
                                                                <th scope="col" class="bg-primary"
                                                                    style="color: white;">Ghi chú nhóm khách hàng</th>
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
                                                mẫu <a href="{{ url('./download/fileMauNhomKhachHang.xlsx') }}">tại
                                                    đây</a></span>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="button" class="btn btn-primary mg-r-6" id="submitImport"><em
                                                    class="fa fa-save"></em> Lưu hàng hoá</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                                    class="fa fa-close"></em>
                                                Đóng</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <button type="button" class="btn btn-info" id="exportExcelDBLotNo">
                    <i class="fa fa-file-excel-o mr-2" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Modal chi tiết-->
    <div>
        <div class="modal fade" id="chiTiet" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: none;width: 50em;vertical-align: top;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title tx-gray-900" id="exampleModalLabel">Nhóm khách hàng</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="" id="suaKhachHang" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="id" name="id">
                                    <label for="" class="tx-gray-800 tx-bold">Mã nhóm</label>
                                    <input type="text" class="form-control" name="group_type" id="group_type"
                                        placeholder="Mã tự động">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="" class="tx-gray-800 tx-bold">Tên nhóm khách hàng <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="nameCustomer">
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="" class="tx-gray-800 tx-bold">Ghi chú</label>
                                    <textarea name="note" id="noteCustomer" cols="30" rows="2"
                                        class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary"><em class="fa fa-save"></em> Lưu</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><em
                                    class="fa fa-close"></em>
                                Đóng</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal chi tiết-->
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
                    <input id="searchBySupplier" type="text" class="form-control"
                        placeholder="Tìm kiếm theo mã hoá đơn hoặc tên khách hàng">
                </div>
                <div class="col-md-2 align-self-end">
                    <button class="btn btn-info" id="searchButton" onclick="searchDateTable()"> <i class="fas fa-search"
                            style="padding: 3px"></i>Tìm kiếm</button>
                </div>
            </div>

            <div class="mg-t-20">
                <label for="" class="tx-bold tx-gray-800" id="info-data-table1"></label>
                <table class="table table-bordered tx-13 tx-gray-700 mg-b-0 bd" style="width: 100%" id="data-table1">
                    <thead>
                        <tr>
                            <th scope="col" class="bg-primary" style="color: white;max-width:4%">#</th>
                            <th scope="col" class="bg-primary" style="color: white;max-width:13%">Mã nhóm</th>
                            <th scope="col" class="bg-primary" style="color: white;max-width:24%">Tên nhóm khách hàng
                            </th>
                            <th scope="col" class="bg-primary" style="color: white;max-width:26%">Ghi chú</th>
                            <th scope="col" class="bg-primary" style="color: white;max-width:12%">Trạng thái</th>
                            <th scope="col" class="bg-primary" style="color: white;max-width:10%"></th>
                        </tr>
                    </thead>
                    <tbody id="searchData">

                    </tbody>
                </table>
            </div>
        </div><!-- row -->
    </div><!-- br-pagebody -->
</div>
<script type="text/javascript">
    function checkRangeValue(value){
      if(value<10){
        return "00000"+value
      }else if(value<100){
        return "0000"+value
      }else{
        return "000"+value
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
		.columns(4).search($("#searchByStatus").val())
		        // .columns(1).search($("#searchBySupplier").val())
		        .draw();

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

		    		ajax: {
		    			url: "{{ url('nhomkhachhang') }}",
			},
			columns: [
			{ data: 'id', name: 'id', orderable: false },
			{ data: null,
				"render": function(data,type,row) { return "NKH"+checkRangeValue(data["id"])}
			},
			{ data: 'name', name: 'name',orderable: false},
			{ data: 'note', name: 'note',orderable: false},
			{ data: 'status', name: 'status',orderable: false },
			{ data: 'action', name: 'action',orderable: false},
			],
            dom: 'Blfrtip',
          buttons: [
          $.extend(true, {}, {
                extend: 'excelHtml5',
                title: 'NhomKhachHang'+new Date().toLocaleDateString()+'_'+new Date().toLocaleTimeString(),
                text:'<span class="text-light">Xuất file Excel</span>',
                exportOptions: {
                    columns: [1, 2, 3]
                    },
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

	})
		    function deleteFunc(id){
		    	Swal.fire({
		    		title: 'Cảnh báo!',
		    		text: "Bạn chắc chắn muốn xóa này?",
		    		icon: 'warning',
		    		showCancelButton: true,
		    		confirmButtonColor: '#3085d6',
		    		cancelButtonColor: '#d33',
		    		confirmButtonText: 'Đồng ý!'
		    	}).then((result) => {
		    		if (result.value) {
		    			$.ajax({
		    				type:"DELETE",
		    				url: "{{ url('nhomkhachhang/{id}') }}",
		    				data: { id: id },
		    				dataType: 'json',
		    				success: function(res){
		    					$("#delete1").modal('hide');
		    					$('#data-table1').DataTable().ajax.reload();
		    					$("#delete1").load(
		    						$.toast({
		    							text : "Xóa dữ liệu thành công",
		    							position: "bottom-right",
		    							icon:"success",
		    							stack:1,
		    							loader:false
		    						}));
		    					var oTable = $('#data-table1').dataTable();
		    					oTable.fnDraw(false);
		    				}
		    			});
		    		} else {
		    			swal("Cancelled Successfully");
		    		}
		    	});
		    }
		    $('#suaKhachHang').submit(function(e){
		    	e.preventDefault();
		    	var formData = new FormData(this);
		    	$.ajax({
		    		type:'post',
		    		url:"{{ url('nhomkhachhang') }}",
		    		data: formData,
		    		cache:false,
		    		contentType: false,
		    		processData:false,
		    		success: (data)=>{
		    			$('#chiTiet').modal('hide');
		    			$('#data-table1').DataTable().ajax.reload();
		    			$('#chiTiet').load(
		    				$.toast({
		    					text:'Sửa dữ liệu thành công',
		    					position:"bottom-right",
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
		    	})
		    })
		    function editFunc(id){
		    	$.ajax({
		    		type:"GET",
		    		url: "{{ url('nhomkhachhang/{id}/edit') }}",
		    		data: { id: id },
		    		dataType: 'json',
		    		success: function(res){
		    			$('#id').val(res.id);
		    			$('#group_type').val(res.group_type);
		    			$('#nameCustomer').val(res.name);
		    			$('#noteCustomer').val(res.note);
		    		}
		    	});
		    }
		    function changeFunc(id){
		    	Swal.fire({
		    		title: 'Cảnh báo!',
		    		text: "Bạn chắc chắn muốn xóa này?",
		    		icon: 'warning',
		    		showCancelButton: true,
		    		confirmButtonColor: '#3085d6',
		    		cancelButtonColor: '#d33',
		    		confirmButtonText: 'Đồng ý!'
		    	}).then((result) => {
		    		if (result.value) {
		    			$.ajax({
		    				type:"POST",
		    				url: "{{ url('nhomkhachhang/active') }}",
		    				data: { id: id },
		    				dataType: 'json',
		    				success: function(res){
		    					$('#changeF').modal('hide');
		    					$('#data-table1').DataTable().ajax.reload();
		    					$.toast({
		    						text:'Dữ liệu đã ngừng hoạt động',
		    						position:"bottom-right",
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
		    function unChangeFunc(id){
		    	Swal.fire({
		    		title: 'Cảnh báo!',
		    		text: "Bạn chắc chắn muốn hoạt động?",
		    		icon: 'warning',
		    		showCancelButton: true,
		    		confirmButtonColor: '#3085d6',
		    		cancelButtonColor: '#d33',
		    		confirmButtonText: 'Đồng ý!'
		    	}).then((result) => {
		    		if (result.value) {
		    			$.ajax({
		    				type:"POST",
		    				url: "{{ url('nhomkhachhang/unactive') }}",
		    				data: { id: id },
		    				dataType: 'json',
		    				success: function(res){
		    					$('#changeF').modal('hide');
		    					$('#data-table1').DataTable().ajax.reload();
		    					$.toast({
		    						text:'Dữ liệu hoạt động',
		    						position:"bottom-right",
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

</script>
<script>
    $(document).ready(function () {

				$(function () {
					let suaKhachHang = $("#suaKhachHang");
					console.log(suaKhachHang);
					if (suaKhachHang.length) {
						suaKhachHang.validate({
							rules: {
								name: {
									required: true
								}

							},
							messages: {
								name: {
									required: 'Vui lòng điền thông tin'
								}
							}
						})
					}
				});


		$('.fc-datepicker').datepicker({
			showOtherMonths: true,
			selectOtherMonths: true
		});
		$(function () {
			let themKhachHang = $("#customer_group");
			console.log(themKhachHang);
			if (themKhachHang.length) {
				themKhachHang.validate({
					rules: {
						name: {
							required: true
						}

					},
					messages: {
						name: {
							required: 'Vui lòng điền thông tin'
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
							url: "{{ url('nhomkhachhang') }}",
							type: "POST",
							data: $('#customer_group').serialize(),
							success: function( response ) {
								$('#submit').html('Lưu và thêm mới');
								$("#submit"). attr("disabled", false);
								// alert('Đã thêm thành công khách hàng');
								$('#data-table1').DataTable().ajax.reload();
								$("#submit").load(
									$.toast({
										text:"Thêm mới nhóm khách hàng thành công",
										position:"bottom-right",
										icon:"success",
										stack:1,
										loader:false
									}));
								document.getElementById("customer_group").reset();
							}
						});
					}
				})
			}
		});

		$('.btn-remove').on('click', function () {
			Swal.fire({
				text: "Bạn có muốn tạm dừng hoạt động nhóm khách hàng này không?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Đồng ý!'
			}).then((result) => {
				if (result.value) {
					var url = $(this).attr('href');
					window.location.href = url;
				}
			})
			return false;
		})


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
                url: "{{ url('nhomkhachhang/import') }}",
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
                            'note': dataImportArr[i][2],
                            // 'note': dataImportArr[i][3],
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
                        if(item.errors || !item.name ){
                            dataNotOk.push(item);
                        }else{
                            dataOk.push(item);
                        }
                    });

                    let divUpload = `<span style="color:#3ea44e">
                                    <em class="fa fa-check"></em> Tải file lên thành công
                                    <strong>${filename}.</strong></span><p style="margin:0px;padding-top:3px;color:#337ab7">Có <strong>${dataNotOk.length}</strong> nhóm khách hàng không hợp lệ. Vui lòng kiểm tra lại</p>`;
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
                                return "<span style='background-color:#f1c40f;color:white;height:15px;padding:5px;border-radius:5px'>Chờ xử lý</span>"
                            }
                        },
                        { data: null,
                            "render": function(data,type,row) {
                            return  '';
                        }

                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(data['errors']){
                                    return '<span class="font-weight-bold">'+data['name']+'</span> <span class="text-danger">'+data['errors']+'</span>';
                                }else if(data['name']){
                                    return "<span class='font-weight-bold'>"+data['name']+"</span>";
                                }else{
                                    return "<span class='text-danger'>Tên nhóm khách hàng là bắt buộc</span>";
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
                                if(data['name'] == null){
                                return '';
                            }else{
                                return "<span class='text-danger' style='font-size:15px'>"+data['errors']+"</span>";
                              }
                                }
                        },
                        { data: null,
                            "render": function(data,type,row){
                                if(data['errors']){
                                    return '<span class="font-weight-bold">'+data['name']+'</span>';
                                }else if(data['name']){
                                    return "<span class='font-weight-bold'>"+data['name']+"</span>";
                                }else{
                                    return "<span class='text-danger'>Tên nhóm khách hàng là bắt buộc</span>";
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
                            url: '{{ url('nhomkhachhang/insertDataExcel') }}',
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
    })
</script>
@endsection
