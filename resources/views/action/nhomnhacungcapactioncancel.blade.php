<div class="dropdown">
    <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" type="button">
        <i aria-hidden="true" class="fa fa-cog">
        </i>
        Thao tác
    </button>
    <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="overflow: hidden;">
        <!-- Button chi tiết -->
        <button class="btn btn-primary dropdown-item" data-target="#chiTiet" data-toggle="modal" onclick="editF({{ $id }})" type="button">
            <i class="far fa-edit">
            </i>
            Chi tiết
        </button>
        <button class="btn btn-primary dropdown-item" id="changeF" onclick="unChangeFunc({{ $id }})" type="button">
            <i class="fa fa-check-circle tx-success pd-r-3" aria-hidden="true"></i>
            Kích hoạt
        </button>
    </div>
</div>