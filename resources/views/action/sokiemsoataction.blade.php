<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-cog" aria-hidden="true"></i>
        Thao tác
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="overflow: hidden;">
        <button class="btn btn-primary dropdown-item pd-l-15" type="button">
            <i aria-hidden="true" class="fa fa-file-excel-o">
            </i>
            Xuất excel
        </button>

        <!-- Button chi tiết -->
        <button type="button" onClick="detailFunc({{ $id }})" class="btn btn-primary dropdown-item pd-l-15"
            data-toggle="modal" data-target="#chiTiet">
            <i class="fa fa-eye" aria-hidden="true"></i>
            Chi tiết
        </button>
        <button class="btn btn-primary dropdown-item nutThaoTacSaoChep pd-l-15" data-target="#exampleModal"
            data-toggle="modal" onclick="editFunc({{ $id }})" type="button">
            <em class="fa fa-edit"></em>
            </i>
            Sửa
        </button>
        <!-- Button dropdown3 -->
        <button class="btn btn-primary dropdown-item pd-l-15" id="in" type="button">
            <i aria-hidden="true" class="fa fa-print">
            </i>
            In phiếu
        </button>
        <button class="btn btn-primary dropdown-item pd-l-15" onclick="deleteFunc({{ $id }})" type="button">
            <i aria-hidden="true" class="fa fa-times">
            </i>
            Hủy
        </button>
    </div>
    <div>
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
