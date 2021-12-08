<div class="dropdown">
    <button aria-expanded="false" aria-haspopup="true" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton" type="button">
        <i aria-hidden="true" class="fa fa-cog">
        </i>
        Thao tác
    </button>
    <div aria-labelledby="dropdownMenuButton" class="dropdown-menu" style="overflow: hidden;">
        <!-- Button chi tiết -->
        <button class="btn btn-primary dropdown-item nutThaoTacSaoChep pd-l-15" data-target="#chiTiet" data-toggle="modal" onclick="editFunc({{ $id }})" type="button">
            <i aria-hidden="true" class="fa fa-eye">
            </i>
            Chi tiết phiếu
        </button>
        <!-- Button dropdown3 -->
        <button class="btn btn-primary dropdown-item pd-l-15" id="in" type="button">
            <i aria-hidden="true" class="fa fa-print">
            </i>
            In phiếu
        </button>
        <!-- Button dropdown4 -->
        <button class="btn btn-primary dropdown-item pd-l-15" type="button">
            <i aria-hidden="true" class="fa fa-file-excel-o">
            </i>
            Xuất excel
        </button>
        <button class="btn btn-primary dropdown-item pd-l-15" onclick="changeFunc({{ $id }})" type="button">
            <i aria-hidden="true" class="fa fa-times">
            </i>
            Ngừng hoạt động
        </button>
    </div>
</div>
<script>
    $(document).ready(function() {
                //Thao tâc sao chep
                $(".nutThaoTacSaoChep").click(function() {
                    $(".tab1").addClass("hidden");
                    $(".tab2").removeClass("hidden");
                });
            })
</script>
