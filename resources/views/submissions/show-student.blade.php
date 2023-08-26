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

    <div class="pagetitle row justify-content-between">
      <h1>Student Dashboard</h1>
      @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      @elseif($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
      @endif
    </div><!-- End Page Title -->

    <section class="section dashboard">
      {{-- <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          
              <h3 class="text-danger mt-3" align="right"><font size="7">{{$days}}</font> days </h3>

              <div class="news">
                <div class="post-item clearfix">
                  <img src="assets/img/news-1.jpg" alt="">
                  <h4 align="right"><a href="#">remaining until Final Project Presentation</p></a></h4>
                </div>
              </div><!-- End sidebar recent posts-->
          
          <div class="card" style="margin-top:100px;">
            

            <div class="card-body pb-0">
              <h3 class="text-danger mt-3">News</h3>

              <div class="news">
                <div class="post-item clearfix">
                  <img src="assets/img/news-1.jpg" alt="">
                  <h4><a href="#">Here are some project managmenent tools.</a></h4>
                  <p>Click Up.. All in one project management tool...</p>
                  <p>Trello.. Dashboards with real-time reporting...</p>
                  <p>.. Check new AI courses, and blogs...</p>
                </div>

                

                
                
              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->

          <div class="card" style="margin-top:100px;">
            

            <div class="card-body pb-0">
              

                

                
                
              </div><!-- End sidebar recent posts-->

            </div>
          </div><!-- End News & Updates -->
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-4">

          {{-- <!-- Recent Activity -->
          <div class="card">
            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Recent Activity <span>| Today</span></h5>

              <div class="activity">

                <div class="activity-item d-flex">
                  <div class="activite-label">32 min</div>
                  <i class='bi bi-circle-fill activity-badge text-success align-self-start'></i>
                  <div class="activity-content">
                    Quia quae rerum <a href="#" class="fw-bold text-dark">explicabo officiis</a> beatae
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">56 min</div>
                  <i class='bi bi-circle-fill activity-badge text-danger align-self-start'></i>
                  <div class="activity-content">
                    Voluptatem blanditiis blanditiis eveniet
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 hrs</div>
                  <i class='bi bi-circle-fill activity-badge text-primary align-self-start'></i>
                  <div class="activity-content">
                    Voluptates corrupti molestias voluptatem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">1 day</div>
                  <i class='bi bi-circle-fill activity-badge text-info align-self-start'></i>
                  <div class="activity-content">
                    Tempore autem saepe <a href="#" class="fw-bold text-dark">occaecati voluptatem</a> tempore
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">2 days</div>
                  <i class='bi bi-circle-fill activity-badge text-warning align-self-start'></i>
                  <div class="activity-content">
                    Est sit eum reiciendis exercitationem
                  </div>
                </div><!-- End activity item-->

                <div class="activity-item d-flex">
                  <div class="activite-label">4 weeks</div>
                  <i class='bi bi-circle-fill activity-badge text-muted align-self-start'></i>
                  <div class="activity-content">
                    Dicta dolorem harum nulla eius. Ut quidem quidem sit quas
                  </div>
                </div><!-- End activity item-->

              </div>

            </div>
          </div><!-- End Recent Activity --> 

          <!-- Budget Report -->
          

          <!-- Website Traffic -->
          
          <!-- News & Updates Traffic -->
          

        </div>

      </div> --}}
          <div class="container">
            <div class="row">
              @foreach($submissions as  $submission)
                <div class="col-6">
                  <div class="card">
                    <div class="card-header justify-content-center">
                      <h2>{{ $submission->title }}</h2>
                      <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-11">
                                <div class="card">
                                    <div class="card-header">{{ __('Upload Document') }}</div>
                
                                    <div class="card-body">
                                      @if($submission->document == null)
                                        <form method="POST" action="{{ route('submissions.storeDocument', $submission->id) }}" enctype="multipart/form-data">
                                            @csrf
                
                                            <div class="form-group row mb-1">
                
                                                <div class="col-md-12">
                                                    <input id="document" type="file" class="form-control"  name="document" required>
                                                </div>
                                            </div>
                
                                            <div class="form-group row mb-0">
                                                <div class="col-md-6 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Upload') }}
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                      @else
                                        <div class="row">
                                          <div class="col-12">
                                            <p>Document: {{ $submission->document }}</p>
                                          </div>
                                          <div class="col-12">
                                            <p>Submission Date: {{ $submission->date_submitted }}</p>
                                          </div>
                                        </div>
                                      @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-12">
                          <p>Submission Date: {{ $submission->submission_date }}</p>
                        </div>
                        <div class="col-12">
                          <p>Total Marks: {{ $submission->total_marks }}</p>
                        </div>
                        <div class="col-12">
                          <p>Notes: {{ $submission->notes }}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
  
    </section>

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