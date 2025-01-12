<!DOCTYPE html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg"
  data-sidebar-image="none" data-preloader="disable" data-theme="default" data-theme-colors="default">
<!-- Mirrored from themesbrand.com/velzon/html/master/tables-gridjs.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 29 Oct 2024 07:32:45 GMT -->
<x-head />

<body>
  <!-- Begin page -->
  <div id="layout-wrapper">
    <x-header />

    <!-- /.modal -->
    <!-- ========== App Menu ========== -->
    <x-sidebar />
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">
      @yield('content')
    </div>
    <!-- End Page-content -->

    <x-footer />
  </div>
  <!-- end main content-->
  </div>
  <!-- END layout-wrapper -->

  <!--start back-to-top-->
  <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
  </button>
  <!--end back-to-top-->


  <x-script />
</body>


</html>
