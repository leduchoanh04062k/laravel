<!-- Modal đổi mật khẩu-->
<div class="modal fade" id="doiMatKhauLayOut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document" style="width:50%;vertical-align:top;">
		<div class="modal-content">

			<form id="changePasswordForm" method="POST" >
				@csrf
				<div class="modal-header bg-primary">
					<h5 class="modal-title tx-white">Đổi mật khẩu</h5>
				</div>
				<div class="modal-body pd-t-8">
					<div class="row">
						<div class="col-sm-12">
							<label class="text-bold">Mật khẩu hiện tại <span class="text-danger">(*)</span></label>
							<input type="password" name="currentPassword" class="form-control" >
						</div>
						<div class="col-sm-12 pd-t-7">

							<label class="text-bold">Mật khẩu mới <span class="text-danger">(*)</span></label>
							<input type="password" id="newPassword" name="newPassword" class="form-control" >

						</div>
						<div class="col-sm-12 pd-t-7">

							<label class="text-bold">Mật khẩu mới (lặp lại) <span class="text-danger">(*)</span></label>
							<input type="password" name="newPasswordRepeat" class="form-control" >

						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">
						<i class="fa fa-close"></i> Huỷ
					</button>
					<button type="submit" class="btn btn-primary">
						<i class="fa fa-save"></i> Lưu
					</button>
				</div>
			</form>

		</div>
	</div>
</div>

<style>
	.error{
		padding-top:6px;
		margin-bottom: 0px!important;
	}
	button{
		cursor: pointer;
	}
	button[disabled]{
		cursor: not-allowed;
	}
</style>
<script>	
	$(document).ready(function(){
		$(function(){
			let changePasswordForm = $("#changePasswordForm");
			if (changePasswordForm.length) {
				changePasswordForm.validate({
					rules:{
						currentPassword:{
							required:true,
							minlength:6
						},
						newPassword:{
							required:true,
							minlength:6
						},
						newPasswordRepeat:{
							required:true,
							equalTo: "#newPassword",
							minlength:6
						}
					},
					messages:{
						currentPassword:{
							required:"Vui lòng điền đầy đủ thông tin",
							minlength:"Vui lòng nhập trên 6 kí tự"
						},
						newPassword:{
							required:"Vui lòng điền đầy đủ thông tin",
							minlength:"Vui lòng nhập trên 6 kí tự"
						},
						newPasswordRepeat:{
							required:"Vui lòng điền đầy đủ thông tin",
							equalTo: 'Mật khẩu không trùng khớp',
							minlength:"Vui lòng nhập trên 6 kí tự"
						},
					},
					submitHandler: function(form) {
						$.ajax({
							type: "POST",
							url: "{{ url('changepassword') }}",
							data: changePasswordForm.serialize(),
							success: function( response ) {
								console.log(response);
								if(response=='success'){
									toastr.options.positionClass = 'toast-bottom-right';
									toastr.info('Đổi mật khẩu thành công', {timeOut:2400});
									changePasswordForm.trigger("reset");
									$('#doiMatKhauLayOut').modal('toggle');
								}else{
									$('input[name="currentPassword"]').focus();
									$('#taoTenDangNhap').focus();
									toastr.options.positionClass = 'toast-bottom-right';
									toastr.error('Mật khẩu đã nhập chưa chính xác', {timeOut:2400});
								}
							}
						});
					}
				})
			}
		})
	})

</script>