<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Dashboard</title>

  <!-- Custom fonts for this template-->
  @include('layout.style')

</head>

<body id="page-top">

@include('layout.navbar')

  <div id="wrapper">

    <!-- Sidebar -->
 @include('layout.sidebar')

@include('layout.main')
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  @include('layout.logoutmodal')

  <!-- Bootstrap core JavaScript-->
  @include('layout.script')
</body>

</html>
