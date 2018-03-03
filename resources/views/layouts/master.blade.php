
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin-@yield('title')</title>

    @include('layouts.head')

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
  
    <div class="wrapper">

      @include('layouts.header')
     
    <!-- Left side column. contains the logo and sidebar -->
     @include('layouts.sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      

      <!-- Main content -->
          @yield('content')
      <!-- /.content -->
    </div>

    @include('layouts.footer')

  </body>
</html>
