
{{-- <div id="messenge"></div>
@section("script")
    @include('BackEnd.models.handle_chosse_img')
@endsection --}}


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
       
       // handle when chosse image
       $("#img").on("input", function() {
          var message = "<div class=\"alert alert-success\" role=\"alert\" style=\"position: fixed; top: 50px; right: 16px; width: auto; z-index: 9999\" id=\"myAlert\"><i class='icon fas fa-check'></i> Bạn đã chọn ảnh thành công </div>";
          $("#messenge").html(message);
          setTimeout(function() {
             $("#messenge").fadeOut(500);
          }, 3000);
       });
    });
    
 </script>