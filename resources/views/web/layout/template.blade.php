<!doctype html>
<html lang="en">

<head>
<title>@yield('title')</title>
  @include('web.layout.header_css')
  @stack('css')
</head>

<body>
   @include('web.navigation') 
@yield('content')

@include('web.layout.footer')
  @include('web.layout.js_footer')
@stack('js')
</body>

</html>