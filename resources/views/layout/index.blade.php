<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gestion - Forage</title>

  {{--  <!-- Custom fonts for this template-->  --}}
  @include('layout.style')

</head>

<body id="page-top">

@include('layout.navbar')

  <div id="wrapper">

   {{--   <!-- Sidebar -->  --}}
 @include('layout.sidebar')
 <div id="content-wrapper">

    <div class="container-fluid">

     {{--   <!-- Breadcrumbs-->  --}}
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Overview</li>
      </ol>
@section('content')
@include('layout.main')
   {{--   <!-- /.content-wrapper -->  --}}
@show
</div>
{{--  <!-- /.container-fluid -->  --}}

{{--  <!-- Sticky Footer -->  --}}
@include('layout.footer')

</div>
  </div>
  {{--  <!-- /#wrapper -->  --}}

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  {{--  <!-- Logout Modal-->  --}}
  @include('layout.logoutmodal')

  {{--  <!-- Bootstrap core JavaScript-->  --}}
  @include('layout.script')
</body>

</html>
