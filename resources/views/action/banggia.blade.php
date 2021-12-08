<div class="dropdown">
                      <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog" aria-hidden="true"></i>
                        Thao tác
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="overflow: hidden;">
                        <button type="button" onClick="editFunc({{ $id }})" class="btn btn-primary dropdown-item inTab3" data-toggle="modal">
                          <i class='far fa-edit'></i>
                          Chi tiết
                        </button>
                        <button type="button" class="btn btn-primary dropdown-item" onClick="changeFunc({{ $id }})">
                            <i class="fa fa-times" aria-hidden="true"></i>
                            Ngừng hoạt động
                        </button>
                        <a class="dropdown-item" href="#" id="in">
                          <i class="fa fa-print" aria-hidden="true"></i>
                          In
                        </a>
                        <a class="dropdown-item" href="#">
                          <i class="fa fa-file-excel-o" aria-hidden="true"></i>
                          Xuất file excel
                        </a>
                      </div>
                    </div>
      <!-- tab3 -->
<script>
        $(".inTab3").click(function(){
          $(".tab1").addClass("hidden");
          $(".tab2").removeClass("hidden");
        })
</script>
