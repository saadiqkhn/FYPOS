@include('top')

  <!-- ======= Header ======= -->
@include('header')  
  <!-- ======= Hero Section ======= -->

<section class="vh-90 mt-5">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        @if(session('message')) 
              <strong><font color='red'>{{ session('message') }}</font></strong> 
         @endif
        <form action="/dologin" method="post">
          @csrf
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3"><strong>Email address</strong></label>
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" name="email" />
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4"><strong>Password</strong></label>
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="password" />
            
          </div>

          
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" id="inlineRadio1" name="role" value="1" checked>
  <label class="form-check-label" for="inlineRadio1">Student</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio"  id="inlineRadio2" name="role" value="2">
  <label class="form-check-label" for="inlineRadio2">Teacher</label>
</div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/register"
                class="link-danger">Register</a></p>
          </div>
<div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <!--<div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>-->
            <a href="#" class="text-body">Forgot password?</a>
          </div>
        </form>
      </div>
    </div>
  </div>
  
</section>
@include('footer')