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
            <i class='far fa-edit'></i>
            Chi tiết phiếu
        </button>
        <!-- Button dropdown2 -->
        <button type="button" onClick="duplicatedFunc({{ $id }})" class="btn btn-primary dropdown-item pd-l-15 nutThaoTacSaoChep">
            <i class="fa fa-files-o" aria-hidden="true"></i>
            Sao chép phiếu
        </button>
    </div>
    <div>
    </div>

