<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - FYPOS</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('dashboard/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('dashboard/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('dashboard/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('dashboard/assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('dashboard/assets/css/style.css')}}" rel="stylesheet">

  
</head>

<body>

  <!-- ======= Header ======= -->
  @include('layout.header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layout.sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Teacher Dashboard</h1>
      
    </div><!-- End Page Title -->

    <section class="section dashboard">
      
      {{-- @extends('layouts.app') --}}
      <div class="container">
        <h1 class="mb-4">Project Overview</h1>

        <div class="project-metrics mb-4">
            <h2>Project Metrics</h2>
            <p>Total Tasks: <strong>20</strong></p>
            <p>Completed Tasks: <strong>12</strong></p>
            <p>Pending Tasks: <strong>8</strong></p>
            <p>Overall Progress: <strong>60%</strong></p>
            <p>Start Date: <strong>January 1, 2023</strong></p>
            <p>End Date: <strong>March 31, 2023</strong></p>
        </div>

        <div class="task-tracking mb-4">
            <h2>Task Tracking</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Task</th>
                        <th>Status</th>
                        <th>Assigned To</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Task 1: Requirement Gathering</td>
                        <td><span class="badge badge-success">Completed</span></td>
                        <td>Cipoqo@gmail.com</td>
                    </tr>
                    <tr>
                        <td>Task 2: Design Prototype</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                        <td>affan@gmail.com</td>
                    </tr>
                    <!-- Add more tasks -->
                </tbody>
            </table>
        </div>

        <!-- Add styles and content for Project Timeline, Resource Allocation, and Issues and Bugs sections -->
    </div>


<style>
    .project-metrics p {
        margin: 0.5rem 0;
    }

    .task-tracking .badge {
        font-size: 14px;
    }

    /* Add more custom styles as needed */
</style>
      
      



    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer" style="position:fixed;bottom:0px;">
    <div class="copyright">
      <p align="center">&copy; Copyright <strong><span>FYP</span></strong>. All Rights Reserved</p>
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