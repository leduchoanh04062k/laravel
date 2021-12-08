<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog" aria-hidden="true"></i>
        Thao tác
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="overflow: hidden;">
        <!-- Button chi tiết -->
        <button type="button" onClick="detailFunc({{ $id }})" href="javascript:void(0)"
            class="btn btn-primary dropdown-item pd-l-15" data-toggle="modal" data-target="#chiTiet">
            <i class="fa fa-eye" aria-hidden="true"></i>
            Chi tiết phiếu
        </button>
        {{-- <button type="button" class="btn btn-primary dropdown-item" onClick="deleteFunc({{ $id }})">Xoá</button> --}}
    </div>
</div>