$(document).ready(function () {
    $("#outTab2").click(function(){
        if(DataTable_hanghoa!=''){
          Swal.fire({
            title: 'Thông tin phiếu chưa được lưu, bạn có muốn trở về danh sách không ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Có',
            cancelButtonText: 'Không'
          }).then((result) => {
            if(result.value){
              $('.submitPhieuNhap').trigger("reset");

              DataTable_hanghoa = [];
              loadData();
              $(".tab1").removeClass("hidden");
              $(".tab2").addClass("hidden");
            }
          });
        }else{
          $('.submitPhieuNhap').trigger("reset");

          DataTable_hanghoa = [];
          loadData();
          $(".tab1").removeClass("hidden");
          $(".tab2").addClass("hidden");
        }
      })
})
