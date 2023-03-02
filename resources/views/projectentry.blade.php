@include('top')

  <!-- ======= Header ======= -->
@include('header')  
  <!-- ======= Hero Section ======= -->
  
    <div class="container mb-5 pb-5">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up" class="text-primary">Welcome to FYPOS</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Please Enter your Project Title, Team Members and Project Dead Line</h2>
          <div data-aos="fade-up" data-aos-delay="800">
           <!-- <a href="#about" class="btn-get-started scrollto">Get Started</a>-->
          </div>
        </div>
		
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200" style="margin-top:100px;" >
        	@if(session('pmess')) 
              <strong><font color='red'>{{ session('pmess') }}</font></strong> 
         @endif
          <form action="/doprojectentry" method="post">
          	@csrf
          	<input type="hidden" value="{{session('cuser')}}" name="cuser"/>     
          	<div class="form-group">
          		<label> <strong>Project Title:</strong></label>
          		<input type="text" class="form-control" name="ptitle" placeholder="*" value="{{old('ptitle')}}" required>
          	</div>
          	<div class="form-group">
          		<label> <strong>Project Members:</strong></label>
          		<input type="email" class="form-control" name="student[]" placeholder="*"  value="{{old('student[0]')}}" >
          		<input type="email" class="form-control" name="student[]" placeholder=""  value="{{old('student[1]')}}" >
          		<input type="email" class="form-control" name="student[]" placeholder="" value="{{old('student[2]')}}" >
          	</div>
          	<div class="form-group">
          		<label> <strong>Project Supervisor:</strong></label>
          		<input type="email" class="form-control" name="teacher[]" placeholder="*"  value="{{old('teacher[0]')}}" >
          		<input type="email" class="form-control" name="teacher[]" placeholder="" value="{{old('teacher[1]')}}" >
          		
          	</div>
          	<div class="form-group">
          		<label> <strong>Project Deadline:</strong></label>
          		<input type="date" class="form-control" placeholder="*"  name="pddate" required>

          	</div>

          	<button type="submit" class="btn btn-primary mt-2"> Create Project</button>
          </form>
        </div>
      </div>
    </div>

  

  
  <!-- ======= Footer ======= -->
 @include('footer')