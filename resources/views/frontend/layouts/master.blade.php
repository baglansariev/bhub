<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <title>BHub | @yield('title')</title> -->
	<title>BHub | {{ $data["title"] ?? '' }}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/bootstrap-4.5.3/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('css/nav.css') }}">
	<link rel="stylesheet" href="{{ asset('css/main.css') }}">
	<link rel="stylesheet" href="{{ asset('css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

	@yield('styles')

	<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-4.5.3/bootstrap.min.js') }}"></script>
	<script src="https://kit.fontawesome.com/8298cc323a.js" crossorigin="anonymous"></script>
</head>
<body>
<!--========================================================
                              HEADER
=========================================================-->
	<header>
		@include('frontend.partials._header', ['title' => $data['title']])
	</header>
<!--========================================================
                              CONTENT
=========================================================-->
	@yield('content')
	
<!--========================================================
                              FOOTER
=========================================================-->
    <section class="footer">
    	@include('frontend.partials._footer')
	</section>
	<script type="text/javascript" src="{{ asset('js/script.js') }}"></script>

<!-- Likes dislikes for comments -->
	<script type="text/javascript">
    $(document).ready(function() {     


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('.like').click(function(e){   
            e.preventDefault(); 
            var id = $(this).parent(".likes-area").data('id');
            var c = $('#'+this.id+'-bs3').html();
            var cObjId = this.id;
            var cObj = $(this);
            var popover = $('#likes-popover-' + id);
            var status = $(this).children();
            //console.log(popover.data('comment-id'));
            //console.log("c: " + c);  
            console.log("status: " + status.attr('class'));

            $.ajax({
               type:'get',
               url:"/ajaxRequest",
               data:{
               	id:id,
               	status:status.attr('class')
               },
               success:function(data){
                console.log(data);
                  // if(jQuery.isEmptyObject(data.success.attached)){
                  //   $('#'+cObjId+'-bs3').html(parseInt(c)-1);
                  //   $(cObj).removeClass("like-post");
                  // }else{
                  //   $('#'+cObjId+'-bs3').html(parseInt(c)+1);
                  //   $(cObj).addClass("like-post");
                  // }
                  if (data.success == null) {
                    //$(popover).fadeIn().html(data.message);
                    //$(popover).fadeOut().html(data.message).delay(3);
                    $(popover).animate({top: "-60px", opacity: 1}, "fast", "linear").css({"pointer-events": "all"}).text(data.message).fadeIn().delay(1000).animate({top: "-0px", opacity: 0}).css({"pointer-events": "none"});
                    console.log("123");
                  } else {
                  	$('#'+cObjId+'-bs3').html(parseInt(c) + 1);
                  }
               }
            });


        });      


        $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });                                        
    }); 
</script>

</body>
</html>