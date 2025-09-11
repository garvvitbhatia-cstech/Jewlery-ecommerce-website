@php
$siteUrl = env('SITE_URL');
@endphp
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->

<title>@yield('title')</title>
<meta name="title" content="@yield('title')">
<meta name="description" content="@yield('description')">
<meta name="keyword" content="@yield('keywords')">
<meta name="robots" content="@yield('robots')">
<meta name="csrf-token" content="{{ csrf_token() }}">

<!--Favicons-->

<link href="{{ asset('public/admin/images/logo/favicon.png') }}" rel="apple-touch-icon" sizes="180x180">
<link href="{{ asset('public/admin/images/logo/favicon.png') }}" rel="icon" sizes="32x32" type="image/png">
<link href="{{ asset('public/admin/images/logo/favicon.png') }}" rel="icon" sizes="16x16" type="image/png">
<!-- plugin css -->
  

<!-- Stylesheets -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('public/css//animate.css') }}"/>
<link rel="stylesheet" href="{{ asset('public/css/owl.carousel.css') }}"/>
<link rel="stylesheet" href="{{ asset('public/css/stylesheet.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@100..900&display=swap" rel="stylesheet">

<link href="{{ asset('public/css/sweet-alert.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('public/admin/css/toastify.css') }}">
<script src="https://code.jquery.com/jquery-2.2.4.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.js"></script>
<script src="{{ asset('public/admin/js/toastify.js') }}" type="text/javascript"></script>


<script>
	var SiteUrl = '<?= $siteUrl ?>';
</script>

<style>
.loadingScreen {
  position: absolute;
  z-index: 5;
  width: 100%;
  height: 100vh;
  background-color: white;
  display: flex;
  align-items: center;
  justify-content: center;
}
</style>

</head>

<body data-base-url="{{ url('/') }}">

<div class="wrapper">
<!--My content is the word "soundscape" but the o is replaced with a disc-->
      
  
@include('element.header')

@yield('content')

@include('element.footer') 

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
<script src="{{ asset('public/js/wow.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/owl.carousel.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/custom.js') }}" type="text/javascript"></script>
<script src="{{ asset('public/js/sweet-alert.min.js') }}" ></script> 
<script src="{{ asset('public/js/validation.js') }}"></script>

<script>        
    $(document).ready(function() {
        $('.minus').click(function () {
          var $input = $(this).parent().find('input');
          var count = parseInt($input.val()) - 1;
          count = count < 1 ? 1 : count;
          $input.val(count);
          $input.change();
          return false;
        });
        $('.plus').click(function () {
          var $input = $(this).parent().find('input');
          $input.val(parseInt($input.val()) + 1);
          $input.change();
          return false;
        });
      });
</script>



<script>
  $(function() {
   $( "#slider-range" ).slider({
     range: true,
     min: 130,
     max: 500,
     values: [ 130, 250 ],
     slide: function( event, ui ) {
      $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
    }
  });
   $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
     " - $" + $( "#slider-range" ).slider( "values", 1 ) );
 });
</script>
<script>
    const imgs = document.querySelectorAll('.img-select a');
const imgBtns = [...imgs];
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);
</script>

</div>

</body>

</html>