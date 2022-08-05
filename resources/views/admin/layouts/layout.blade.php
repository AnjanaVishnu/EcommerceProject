<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  @include('admin.layouts.header_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      @include('admin.layouts.header')
      @include('admin.layouts.sidebar')

@yield('content')


    </div>
  
  </div>
  @include('admin.layouts.footer')
  @include('admin.layouts.js_footer')
@stack('js')

</body>

</html>