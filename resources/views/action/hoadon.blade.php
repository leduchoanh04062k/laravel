<div class="dropdown">
    <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
        id="dropdownMenuButton" type="button">
        <i aria-hidden="true" class="fa fa-cog">
        </i>
        Thao tác
    </button>
    <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="overflow: hidden;">
        <!-- Button chi tiết -->
        <button class="btn btn-primary dropdown-item pd-l-15" data-target="#chiTiet" data-toggle="modal"
            onclick="detailFunc({{ $id }})" type="button">
            <i aria-hidden="true" class="fa fa-eye">
            </i>
            Chi tiết phiếu
        </button>
        <!-- Button in phiếu -->
        <button class="btn btn-primary dropdown-item pd-l-15" onclick="printFunc({{ $id }})" data-target="#thanhToanInHd" data-toggle="modal"
            type="button">
            <i aria-hidden="true" class="fa fa-print">
            </i>
            In phiếu
        </button>
        <!-- Button huỷ hoá đơn -->
        <button class="btn btn-primary dropdown-item pd-l-15" data-target="#congNo" data-toggle="modal"
            onclick="changeFunc1({{ $id }})" type="button">
            <i aria-hidden="true" class="fa fa-times"></i> Huỷ hoá đơn
        </button>
        <button class="btn btn-primary dropdown-item pd-l-15 nutThaoTacSua" onclick="editFunc({{ $id }})" type="button">
            <em class="fa fa-reply"></em>
            Tạo phiếu khách trả
        </button>
    </div>
</div>
<style type="text/css">
    .fa-times {
        font-size: 1.2em;
        margin-right: 0.3em;
    }
</style>
<script>
    $(document).ready(function() {
                    $(".nutThaoTacSua").click(function() {
                    $(".tab1").addClass("hidden");
                    $(".tab2").removeClass("hidden");
                    })

            })
</script>
