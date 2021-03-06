@extends('backend.master')
@section('title','Đăng ký')
@section('main')
		<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">User</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Đăng ký</div>
					<div class="panel-body">
					@include('errors.note')
						<form method="post" enctype="multipart/form-data">
							<div class="row" style="margin-bottom:40px">
                                <div class="form-group" >
                                    <label>Tên</label>
                                    <input required type="text" name="name" class="form-control" placeholder=" Mời bạn nhập tên">
                                </div>
                                <div class="form-group" >
                                    <label>Email</label>
                                    <input required type="email" name="email" class="form-control" placeholder=" Mời bạn nhập email">
                                </div>
                                <div class="form-group" >
                                    <label>Password</label>
                                    <input required type="password" name="password" class="form-control" placeholder=" Mời bạn nhập password">
                                </div>
                                <div class="form-group" >
                                    <label>Level</label>
                                    <input required type="level" name="level" class="form-control" placeholder=" Mời bạn nhập level">
                                </div>
									<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
									<a href="{{asset('admin/user')}}" class="btn btn-danger">Hủy bỏ</a>
								</div>
							</div>
							{{csrf_field()}}
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	@stop