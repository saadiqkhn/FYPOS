{{-- ======= Sidebar ======= --}}
<aside id="sidebar" class="sidebar">

  <ul class="sidebar-nav" id="sidebar-nav">

    <li class="nav-item">
      <a class="nav-link " href="/studentdashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/generalguidelines">
        <i class="bi bi-grid"></i>
        <span>General Guidelines  <i class="badge badge-warning text-dark">{{count($guides)}} </i> </span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="#">
        <i class="bi bi-grid"></i>
        <span>Project Status</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link" href="{{ route('submissions.show_student', $user[0]->id) }}">
        <i class="bi bi-grid"></i>
        <span>Document Submission</span>
    </a>
    
    
    
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
      <a class="nav-link " href="/studentdashboard">
        <i class="bi bi-grid"></i>
        <span>Marks and Reviews</span>
      </a>
    </li><!-- End Dashboard Nav -->
    <li class="nav-item">
                <!--<i class="bi bi-grid"></i>-->
        <span class="text-primary"><strong>Members</strong></span>
         @foreach($members as $member)
         <li>{{$member}}</li>
         @endforeach
         <br/>
    </li><!-- End Dashboard Nav -->

    <li class="nav-item">
                <!--<i class="bi bi-grid"></i>-->
        <span class="text-primary"><strong>Supervisors</strong></span>
        @foreach($supervisors as $supervisor)
        <li>{{$supervisor}}</li>
        @endforeach
    </li><!-- End Dashboard Nav -->

  </ul>

</aside><!-- End Sidebar-->
