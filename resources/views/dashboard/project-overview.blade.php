<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

   @include('layout.script-student')
  
</head>

<body>
 <!-- ======= Header ======= -->
 @include('layout.header-student')
 <!-- End Header -->

 <!-- ======= Sidebar ======= -->
 @include('layout.sidebar-student')
 <!-- End Sidebar-->



  
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Student Dashboard</h1>
      
    </div><!-- End Page Title -->

    
    {{-- @extends('layouts.app') --}}

    {{-- @section('content') --}}
        <div class="container">
            <h2>Project Overview Dashboard</h2>
            dd($totalSubmissions);
            <p>Total Submissions: {{ $totalSubmissions }}</p>
            {{-- <p>Completed Tasks: {{ $completedTasks }}</p> --}}
            <!-- Display other metrics here -->
        </div>
    {{-- @endsection --}}
    




  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>FYP</span></strong>. All Rights Reserved
    </div>
    
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('dashboard/assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/chart.js/chart.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('dashboard/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('dashboard/assets/js/main.js')}}"></script>

</body>

</html>