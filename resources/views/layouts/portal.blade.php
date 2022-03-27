<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Babcock University Facilities Management System | Home </title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('css/style-liberty.css') }}">


  <!-- google fonts -->
  <link href="//fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
</head>

    <!-- material icons -->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">

<body class="sidebar-menu-collapsed">
  <div class="se-pre-con"></div>
<section>
  <!-- sidebar menu start -->
  <div class="sidebar-menu sticky-sidebar-menu">

    <!-- logo start -->
    <div class="logo">
      <h1><a href="index.html">BU FMS</a></h1>
    </div>

  <!-- if logo is image enable this -->
    <!-- image logo --
    <div class="logo">
      <a href="index.html">
        <img src="image-path" alt="Your logo" title="Your logo" class="img-fluid" style="height:35px;" />
      </a>
    </div>
    <!-- //image logo -->

    <div class="logo-icon text-center">
      <a href="index.html" title="logo"><img src="{{ asset('images/logo.png') }}" alt="logo-icon"> </a>
    </div>
    <!-- //logo end -->

    <div class="sidebar-menu-inner">

      <!-- sidebar nav start -->
      <ul class="nav nav-pills nav-stacked custom-nav">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-tachometer"></i><span> Dashboard</span></a>
        </li>

        <!-- chack if user can crud facilities -->
        @can('create', App\Models\Facility::class)
        <!--Manage Facilities-->
        <li class="menu-list">
          <a href="#"><i class="fa fa-building"></i>
            <span>Facilities <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="{{ route('facility.index') }}">Manage Facilities</a></li>
            <li><a href="{{ route('facility.create') }}">Add Facility</a> </li>
          </ul>
        </li>
        @endcan

        <!-- check if user can crud roles -->
        @can('create', App\Models\Role::class)
        <!--Manage Roles-->
        <li class="menu-list">
          <a href="#"><i class="fa fa-users"></i>
            <span>Roles <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="{{ route('role.index') }}">Manage Roles</a></li>
            <li><a href="{{ route('role.create') }}">Add Role</a></li>
          </ul>
        </li>
        @endcan
        
        <!-- checking if user can create categories -->
        @can('create', App\Models\Category::class)
          <!--Manage Categories-->
        <li class="menu-list">
          <a href="#"><i class="fa fa-clone"></i>
            <span>Categories <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="{{ route('category.index') }}">Manage Categories</a></li>
            <li><a href="{{ route('category.create') }}">Add Category</a> </li>
          </ul>
        </li>
          
        @endcan

        <!-- check if user can crud utilities -->
        @can('create', App\Models\Utility::class)
        <!--Manage Utilities-->
        <li class="menu-list">
          <a href="#"><i class="fa fa-wrench"></i>
            <span>Utilities <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="{{ route('utility.index') }}">Manage Utilities</a></li>
            <li><a href="{{ route('utility.create') }}">Add Utility</a></li>
          </ul>
        </li>
        @endcan

        <!-- check if user can crud materials -->
        @can('create', App\Models\Material::class)
        <!--Manage Materials-->
        <li class="menu-list">
          <a href="#"><i class="fa fa-lightbulb-o"></i>
            <span>Materials <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="{{ route('material.index') }}">Manage Materials</a></li>
            <li><a href="{{ route('material.create') }}">Add Material</a></li>
          </ul>
        </li>
        @endcan

        <!-- check if user can crud units -->
        @can('create', App\Models\Unit::class)
        <!--Manage Units-->
        <li class="menu-list">
          <a href="#"><i class="fa fa-th"></i>
            <span>Units <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="{{ route('unit.index') }}">Manage Units</a></li>
            <li><a href="{{ route('unit.create') }}">Add Unit</a></li>
            <li><a href="{{ route('job.index') }}">Manage Jobs</a></li>
            <li><a href="{{ route('job.create') }}">Add Job</a></li>
          </ul>
        </li>
        @endcan

        <!-- check if user can crud rooms -->
        @can('create', App\Models\Room::class)
        <!--Manage Rooms-->
        <li class="menu-list">
          <a href="#"><i class="fa fa-columns"></i>
            <span>Rooms <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="{{ route('room.index') }}">Manage Rooms</a></li>
            <li><a href="{{ route('room.create') }}">Add Rooms</a></li>
          </ul>
        </li>
        @endcan

        <!-- check if user can crud complaints-->
        @can('create', App\Models\Complaint::class)
        <!--Manage Complaints-->
        <li class="menu-list">
          <a href="#"><i class="fa fa-edit"></i>
            <span>Complaint <i class="lnr lnr-chevron-right"></i></span></a>
          <ul class="sub-menu-list">
            <li><a href="{{ route('my_complaint') }}">Manage my complaints</a></li>
            <li><a href="{{ route('complaint.create') }}">New complain</a></li>
          </ul>
        </li>
        @endcan

        <!-- check if user can crud complaints approval -->
        @can('create', App\Models\Complaint::class)
        <!-- Complaints Approval -->
        <li class="active"><a href="{{ route('complaint.index') }}"><i class="fa fa-file-text"></i> <span>Complaint approval</span></a></li>
        
        @endcan

        <!-- check if user can crud unit approval-->
       
        <!-- Complaints Approval -->
        <li class="active"><a href="{{ route('unit_complaints') }}"><i class="fa fa-file-text"></i> <span>Unit Complaints</span></a></li>
        
        <!-- check if user can crud all complaints-->
        @can('create', App\Models\Complaint::class)
        <!-- Complaints Approval -->
        <li class="active"><a href="{{ route('complaint.index') }}"><i class="fa fa-file-text"></i> <span>All Complaints</span></a></li>
        
        @endcan

        <!-- check if user can crud assigned complaints-->
        @can('create', App\Models\Complaint::class)
        <!-- Complaints Approval -->
        <li class="active"><a href="{{ route('complaint.index') }}"><i class="fa fa-file-text"></i> <span>Assigned complaints</span></a></li>
        @endcan
       
      </ul>
      <!-- //sidebar nav end -->
      <!-- toggle button start -->
      <a class="toggle-btn">
        <i class="fa fa-angle-double-left menu-collapsed__left"><span>Collapse Sidebar</span></i>
        <i class="fa fa-angle-double-right menu-collapsed__right"></i>
      </a>
      <!-- //toggle button end -->
    </div>
  </div>
  <!-- //sidebar menu end -->
  <!-- header-starts -->
  <div class="header sticky-header">

    <!-- notification menu start -->
    <div class="menu-right">
      <div class="navbar user-panel-top">
        <div class="search-box">
          <form action="#search-results.html" method="get">
            <input class="search-input" placeholder="Search Here..." type="search" id="search">
            <button class="search-submit" value=""><span class="fa fa-search"></span></button>
          </form>
        </div>
        <div class="user-dropdown-details d-flex">
          <div class="profile_details_left">
            <ul class="nofitications-dropdown">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-bell-o"></i><span class="badge blue">3</span></a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="notification_header">
                      <h3>You have 3 new notifications</h3>
                    </div>
                  </li>
                  <li><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('images/avatar1.jpg') }}" alt=""></div>
                      <div class="notification_desc">
                        <p>Johnson purchased template</p>
                        <span>Just Now</span>
                      </div>
                    </a></li>
                  <li class="odd"><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('images/avatar2.jpg') }}" alt=""></div>
                      <div class="notification_desc">
                        <p>New customer registered </p>
                        <span>1 hour ago</span>
                      </div>
                    </a></li>
                  <li><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('images/avatar3.jpg') }}" alt=""></div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor sit amet </p>
                        <span>2 hours ago</span>
                      </div>
                    </a></li>
                  <li>
                    <div class="notification_bottom">
                      <a href="#all" class="bg-primary">See all notifications</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                    class="fa fa-comment-o"></i><span class="badge blue">4</span></a>
                <ul class="dropdown-menu">
                  <li>
                    <div class="notification_header">
                      <h3>You have 4 new messages</h3>
                    </div>
                  </li>
                  <li><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('images/avatar1.jpg') }}" alt=""></div>
                      <div class="notification_desc">
                        <p>Johnson purchased template</p>
                        <span>Just Now</span>
                      </div>
                    </a></li>
                  <li class="odd"><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('images/avatar2.jpg') }}" alt=""></div>
                      <div class="notification_desc">
                        <p>New customer registered </p>
                        <span>1 hour ago</span>
                      </div>
                    </a></li>
                  <li><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('images/avatar3.jpg') }}" alt=""></div>
                      <div class="notification_desc">
                        <p>Lorem ipsum dolor sit amet </p>
                        <span>2 hours ago</span>
                      </div>
                    </a></li>
                  <li><a href="#" class="grid">
                      <div class="user_img"><img src="{{ asset('images/avatar1.jpg') }}" alt=""></div>
                      <div class="notification_desc">
                        <p>Johnson purchased template</p>
                        <span>Just Now</span>
                      </div>
                    </a></li>
                  <li>
                    <div class="notification_bottom">
                      <a href="#all" class="bg-primary">See all messages</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
          <div class="profile_details">
            <ul>
              <li class="dropdown profile_details_drop">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu3" aria-haspopup="true"
                  aria-expanded="false">
                  <div class="profile_img">
                    <img src="{{ asset('images/people1.png') }}" class="rounded-circle" alt="" />
                    <div class="user-active">
                      <span></span>
                    </div>
                  </div>
                </a>
                <ul class="dropdown-menu drp-mnu" aria-labelledby="dropdownMenu3">
                  <li class="user-info">
                    <h5 class="user-name">{{ Auth::user()->firstname }} {{ Auth::user()->surname }}</h5>
                    <span class="status ml-2">{{ Auth::user()->role->title }}</span>
                  </li>
                  <li> <a href="#"><i class="lnr lnr-user"></i>My Profile</a> </li>
                  <li class="logout"> <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fa fa-power-off"></i> Logout</a> </li>

                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none">
                    @csrf
                  </form>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!--notification menu end -->
  </div>
  <!-- //header-ends -->
  <!-- main content start -->
<div class="main-content">
  <!-- content -->
    @yield('content')
  <!-- //content -->
</div>
<!-- main content end-->
</section>
  <!--footer section start-->
<footer class="dashboard">
  <p>&copy 2022 BU Facility Management System. All Rights Reserved.</p>
</footer>
<!--footer section end-->
<!-- move top -->
<button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
  <span class="fa fa-angle-up"></span>
</button>
<script>
  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction()
  };

  function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("movetop").style.display = "block";
    } else {
      document.getElementById("movetop").style.display = "none";
    }
  }

  // When the user clicks on the button, scroll to the top of the document
  function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
</script>
<!-- /move top -->


<script src="{{ asset('js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/jquery-1.10.2.min.js') }}"></script>

<!-- chart js -->
<script src="{{ asset('js/Chart.min.js') }}"></script>
<script src="{{ asset('js/utils.js') }}"></script>
<!-- //chart js -->

<!-- Different scripts of charts.  Ex.Barchart, Stackedchart, Linechart, Piechart -->
<script src="{{ asset('js/bar.js') }}"></script>
<script src="{{ asset('js/stacked.js') }}"></script>
<script src="{{ asset('js/linechart.js') }}"></script>
<script src="{{ asset('js/pie.js') }}"></script>
<!-- //Different scripts of charts.  Ex.Barchart, Stackedchart, Linechart, Piechart -->

<!-- data tables js -->
<script>
  $(document).ready(function () {
    $('#example').DataTable();
  });
</script>
<!-- //data tables js -->

<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>


<script src="{{ asset('js/faq.js') }}"></script>

<script src="{{ asset('js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('js/scripts.js') }}"></script>

<!-- close script -->
<script>
  var closebtns = document.getElementsByClassName("close-grid");
  var i;

  for (i = 0; i < closebtns.length; i++) {
    closebtns[i].addEventListener("click", function () {
      this.parentElement.style.display = 'none';
    });
  }
</script>
<!-- //close script -->

<!-- disable body scroll when navbar is in active -->
<script>
  $(function () {
    $('.sidebar-menu-collapsed').click(function () {
      $('body').toggleClass('noscroll');
    })
  });
</script>
<!-- disable body scroll when navbar is in active -->

 <!-- loading-gif Js -->
 <script src="{{ asset('js/modernizr.js') }}"></script>
 <script>
     $(window).load(function () {
         // Animate loader off screen
         $(".se-pre-con").fadeOut("slow");;
     });
 </script>
 <!--// loading-gif Js -->


<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

</body>

</html>