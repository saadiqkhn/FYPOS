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
        @if ($errors->any())
           <div class="alert alert-danger">
           <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
           </ul>
      </div>
        @endif
        <form action="/doregister" method="post">
          @csrf
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3"><strong>Display Name:</strong></label>
            <input type="text" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter Display Name" name="userfullname" value="{{old('userfullname')}}"/>
            
          </div>
          
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3"><strong>Email address</strong></label>
            <input type="email" id="form3Example3" class="form-control form-control-lg"
              placeholder="Enter a valid email address" name="email" value="{{old('email')}}"/>
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4"><strong>Password</strong></label>
            <input type="password" id="form3Example4" class="form-control form-control-lg"
              placeholder="Enter password" name="userpassword" />
            
          </div>
          <!-- Password input -->
          
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
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="/login"
                class="link-danger">Sign in</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>
@include('footer')