
        <div class="dropdown" style="text-align:-webkit-center">
            <button type="button" class="btn btn-info" onClick="duplicatedFunc({{ $id }})" class="btn btn-primary dropdown-item pd-l-15 nutThaoTacSaoChep">
                <i class="fa fa-retweet" aria-hidden="true"></i>
            </button>
            <div>
            </div>
          </div>
          <script>
              $(document).ready(function() {
                      $(".nutThaoTacSaoChep").click(function() {
                      $(".tab1").addClass("hidden");
                      $(".tab2").removeClass("hidden");
                      })

              })
          </script>


