@extends('backend.master')
@section('title','Danh sách slider')
@section('main')
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Slider</h1>
			</div>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-xs-12 col-md-12 col-lg-12">
				
				<div class="panel panel-primary">
					<div class="panel-heading">Danh sách slider</div>
					<div class="panel-body">
						<div class="bootstrap-table">
							<div class="table-responsive">
								<a href="{{asset('admin/slider/add')}}" class="btn btn-primary">Thêm</a>
								<table class="table table-bordered" style="margin-top:20px;">				
									<thead>
										<tr class="bg-primary">
											<th>ID</th>
											<th width="50%">Ảnh Slider</th>
											<th width="30%">Tùy chọn</th>
											{{-- <th width="20%">Xóa</th> --}}
										</tr>
									</thead>
									<tbody>
										@foreach($sliderlist as $slider)
										<tr>
											<td>{{$slider->id}}</td>
											<td>
											<img width="500px" src="{{asset('lib/storage/app/avatar/'.$slider->img)}}" class="thumbnail">
											</td>
											{{-- <td>
												@if($slider->status==0)
												<a href="{{\Illuminate\Support\Facades\URL::to('admin/slider/'.$slider->id)}}">ẩn</a>
											@else
												<a href="{{\Illuminate\Support\Facades\URL::to('admin/slider/'.$slider->id)}}">hiện</a>
											@endif
											</td> --}}
											<td>
												<a href="{{asset('admin/slider/edit/'.$slider->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
												<a onclick="return confirm('Bạn chắc chắn muốn xóa slider này không!') " href="{{asset('admin/slider/delete/'.$slider->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->
	@stop
	