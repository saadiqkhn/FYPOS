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
              <h1>Edit Submission</h1>
      
              <form action="{{ route('submissions.update', $submission->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <input type="text" hidden name="add_date" value="{{$submission->add_date}}"/>
      
                  <div class="form-group">
                      <label for="title">Title</label>
                      <input type="text" name="title" id="title" class="form-control" value="{{ $submission->title }}">
                  </div>
      
                  <div class="form-group">
                      <label for="submission_date">Submission Date</label>
                      <input type="date" name="submission_date" id="submission_date" class="form-control" value="{{ $submission->submission_date }}">
                  </div>
      
                  <div class="form-group">
                      <label for="total_marks">Total Marks</label>
                      <input type="number" name="total_marks" id="total_marks" class="form-control" value="{{ $submission->total_marks }}">
                  </div>

                  <div class="form-group">
                    <label for="total_marks">Earned Marks</label>
                    <input type="number" name="earned_marks" id="earned_marks" class="form-control" value="{{ $submission->earned_marks }}">
                </div>
      
                  <div class="form-group">
                      <label for="notes">Notes</label>
                      <textarea name="notes" id="notes" class="form-control">{{ $submission->notes }}</textarea>
                  </div>
      
                  <button type="submit" class="btn btn-primary">Save</button>
              </form>
          </div>
      
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