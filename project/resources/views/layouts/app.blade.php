
<!DOCTYPE html>
<html lang="en">
    
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		<meta name="csrf-token" content="{{ csrf_token() }}">
        <title>CSPMS -  @yield('title')</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}">
	
		<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/fontawesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}">
		
		@yield('style')

		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
</head>
<body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
            <div class="header">
			
				<!-- Logo -->
                <div class="header-left">
                    <a href="{{ route('home') }}" class="logo">
						CSPMS
					</a>
					<a href="index.html" class="logo logo-small">
						<img src="{{ asset('assets/img/logo-small.png') }}" alt="Logo" width="30" height="30">
					</a>
                </div>
				<!-- /Logo -->
				
				<a href="javascript:void(0);" id="toggle_btn">
					<i class="fas fa-align-left"></i>
				</a>
				
				<!-- Search Bar -->
				<div class="top-nav-search">
					<form action="{{ route('search') }}" method="get">
						<input type="text" class="form-control" name="query" value=""  placeholder="Search here">
						<button class="btn" type="submit"><i class="fas fa-search"></i></button>
					</form>
				</div>
				<!-- /Search Bar -->
				
				<!-- Mobile Menu Toggle -->
				<a class="mobile_btn" id="mobile_btn">
					<i class="fas fa-bars"></i>
				</a>
				<!-- /Mobile Menu Toggle -->
				
				<!-- Header Right Menu -->
				<ul class="nav user-menu">

					<!-- Notifications -->
					<li class="nav-item dropdown noti-dropdown">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<i class="far fa-bell"></i> <span class="badge badge-pill">{{ $notifications->count() }}</span>
						</a>
						<div class="dropdown-menu notifications">
							<div class="topnav-dropdown-header">
								<span class="notification-title">Notifications</span>
								{{-- <a href="javascript:void(0)" class="clear-noti"> Clear All </a> --}}
							</div>
							<div class="noti-content">
								<ul class="notification-list">

									@foreach ($notifications as $notification)

									{{-- {{ $notification->type }} --}}


									@if ($notification->type === 'App\Notifications\NewUserNotification')
										
									<li class="notification-message">
										<a href="#">
											<div class="media">
												{{-- <span class="avatar avatar-sm">
													<img class="avatar-img rounded-circle" alt="User Image" src="{{ asset('assets/img/profiles/avatar-02.jpg') }}">
												</span> --}}
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">{{ $notification->data['firstname'] }} {{ $notification->data['lastname'] }} ({{ $notification->data['email'] }})</span> just <span class="noti-title"> Registered.</span></p>
													<p class="noti-time"><span class="notification-time">{{ $notification->created_at }}</span></p>
												</div>
											</div>
										</a>
									</li>

									@endif
									@if ($notification->type === 'App\Notifications\DeletedUserNotification')
										
									<li class="notification-message">
										<a href="#">
											<div class="media">
												
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">{{ $notification->data['firstname'] }} {{ $notification->data['lastname'] }} ({{ $notification->data['email'] }})</span> account was just <span class="noti-title">Deleted</span></p>
													<p class="noti-time"><span class="notification-time">{{ $notification->created_at }}</span></p>
												</div>
											</div>
										</a>
									</li>

									@endif
									@if ($notification->type === 'App\Notifications\UpdatedUserNotification')
										
									<li class="notification-message">
										<a href="#">
											<div class="media">
												
												<div class="media-body">
													<p class="noti-details"><span class="noti-title"> Profile Updated was successful!.</span> </p>
													<p class="noti-time"><span class="notification-time">{{ $notification->created_at }}</span></p>
												</div>
											</div>
										</a>
									</li>

									@endif

									@if ($notification->type === 'App\Notifications\UpdatedProjectNotification')
										
									<li class="notification-message">
										<a href="#">
											<div class="media">
												
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">{{ $notification->data['filename'] }} ({{ $notification->data['file'] }}) {{ $notification->data['label'] }}</span> was just <span class="noti-title">Updated</span></p>
													<p class="noti-time"><span class="notification-time">{{ $notification->created_at }}</span></p>
												</div>
											</div>
										</a>
									</li>

									@endif

									@if ($notification->type === 'App\Notifications\RequestNotification')
										
									<li class="notification-message">
										<a href="#">
											<div class="media">
												
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">{{ $notification->data['username'] }} ({{ $notification->data['email'] }})</span> is Requesting for the filename : <span class="noti-title">{{ $notification->data['filename'] }} ({{ $notification->data['file'] }}) {{ $notification->data['label'] }}</span>  <span class="noti-title"></span></p>
													<p class="noti-time"><span class="notification-time">{{ $notification->created_at }}</span></p>
												</div>
											</div>
										</a>
									</li>

									@endif

									@if ($notification->type === 'App\Notifications\NewProjectNotification')
										
									<li class="notification-message">
										<a href="#">
											<div class="media">
												
												<div class="media-body">
													<p class="noti-details">New<span class="noti-title"> {{ $notification->data['filename'] }} ({{ $notification->data['file'] }}) {{ $notification->data['label'] }}</span> was just <span class="noti-title">Created</span></p>
													<p class="noti-time"><span class="notification-time">{{ $notification->created_at }}</span></p>
												</div>
											</div>
										</a>
									</li>

									@endif

									@if ($notification->type === 'App\Notifications\DeletedProjectNotification')
										
									<li class="notification-message">
										<a href="#">
											<div class="media">
												
												<div class="media-body">
													<p class="noti-details"><span class="noti-title">{{ $notification->data['filename'] }} ({{ $notification->data['file'] }}) {{ $notification->data['label'] }}</span> was just <span class="noti-title">Deleted</span></p>
													<p class="noti-time"><span class="notification-time">{{ $notification->created_at }}</span></p>
												</div>
											</div>
										</a>
									</li>

									@endif

									@if ($notification->type === 'App\Notifications\NewEventNotification')
										
									<li class="notification-message">
										<a href="#">
											<div class="media">
												
												<div class="media-body">
													<p class="noti-details">New Event<span class="noti-title"> {{ $notification->data['title'] }} (Starts: {{ $notification->data['start'] }}) </span> was just <span class="noti-title">Created</span> for you</p>
													<p class="noti-time"><span class="notification-time">{{ $notification->created_at }}</span></p>
												</div>
											</div>
										</a>
									</li>

									@endif


									@endforeach


								</ul>
							</div>
							<div class="topnav-dropdown-footer">
								<a  class="clear-noti" onclick="event.preventDefault();
								document.getElementById('markasread-form').submit();" 
								style="cursor: pointer;">Clear all Notifications</a>

								

						 <form id="markasread-form" action="{{ route('markasread') }}" method="POST" class="d-none">
							 @csrf
						 </form>	
							</div>
						</div>
					</li>
					<!-- /Notifications -->
					
					<!-- User Menu -->
					<li class="nav-item dropdown has-arrow">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
							<span class="user-img"><img class="rounded-circle" src="{{ $profileImage }}" width="31" alt="{{ $user->firstname }}"></span>
						</a>
						<div class="dropdown-menu">
							<div class="user-header">
								<div class="avatar avatar-sm">
									<img src="{{ $profileImage }}" alt="User Image" class="avatar-img rounded-circle">
								</div>
								<div class="user-text">
									<h6>{{ $user->firstname }} {{ $user->lastname }}</h6>
									
									@if ($user->isAdmin == 0)
										@if ($user->role == 1)
										<p class="text-muted mb-0">Student</p>
										
										@else
										<p class="text-muted mb-0">Teacher</p>
											
										@endif
									@else
									
									<p class="text-muted mb-0">Administrator</p>
									@endif


								</div>
							</div>
							@if ($user->isAdmin)
								
							<a class="dropdown-item" href="{{ route('admin.profile') }}">My Profile</a>
							@else
								
							<a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>
							@endif
							<a class="dropdown-item" href="{{ route('home') }}">Homepage</a>
							
							<a class="dropdown-item" href="{{ route('logout') }}"
							onclick="event.preventDefault();
										  document.getElementById('logout-form').submit();">
							 {{ __('Logout') }}
						 </a>

						 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
							 @csrf
						 </form>
						</div>
					</li>
					<!-- /User Menu -->
					
				</ul>
				<!-- /Header Right Menu -->
				
            </div>
			<!-- /Header -->
			
			<!-- Sidebar -->
            <div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>
							<li class="menu-title"> 
								<span>Main Menu</span>
							</li>
							<li class="active"> 
								@if ($user->isAdmin)
									
								<a href="{{ route('admin.dash') }}"><i class="fas fa-th-large"></i> <span>Dashboard</span></a>
								@else
									
								<a href="{{ route('dash') }}"><i class="fas fa-th-large"></i> <span>Dashboard</span></a>
								@endif
							</li>
							@if ($user->isAdmin == 0)
							@if ($user->role == 1)
							{{-- Student --}}
							<li class="submenu">
								<a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
								<ul>
									
									<li><a href="{{ route('student.show') }}">Student Detail</a></li>
									<li><a href="{{ route('student.edit') }}">Student Edit</a></li>
									
								</ul>
							</li>
							
							@else
							{{-- Teacher --}}
							<li class="submenu">
								<a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span class="menu-arrow"></span></a>
								<ul>
									
										
									<li><a href="{{ route('teacher.show') }}">Teacher Detail</a></li>
									<li><a href="{{ route('teacher.edit') }}">Teacher Edit</a></li>
									
								</ul>
							</li>
								
							@endif
						@else
						<li class="submenu">
							{{-- Administrator --}}
							<a href="#"><i class="fas fa-user-graduate"></i> <span> Students</span> <span class="menu-arrow"></span></a>
							<ul>
								
								<li><a href="{{ route('admin.students') }}">Students</a></li>
								<li><a href="{{ route('admin.student.create') }}"> Add New</a></li>
								{{-- <li><a href="{{ route('student.show') }}">Student Detail</a></li> --}}
								{{-- <li><a href="{{ route('student.edit') }}">Student Edit</a></li> --}}
								
								

							</ul>
						</li>
						<li class="submenu">
							<a href="#"><i class="fas fa-chalkboard-teacher"></i> <span> Teachers</span> <span class="menu-arrow"></span></a>
							<ul>
								
									
								<li><a href="{{ route('admin.teachers') }}">Teachers</a></li>
								<li><a href="{{ route('admin.teacher.create') }}"> Add New</a></li>

								{{-- <li><a href="{{ route('teacher.show') }}">Teacher Detail</a></li> --}}
								{{-- <li><a href="{{ route('teacher.edit') }}">Teacher Edit</a></li> --}}
								

							</ul>
						</li>
						@endif

						
							@if ($user->isAdmin == 0)
								
							<li class="submenu">
								<a href="#"><i class="fas fa-clipboard-list"></i> <span>My Project</span> <span class="menu-arrow"></span></a>
								<ul>
									
									<li><a href="{{ route('project.index') }}">Projects</a></li>

									<li><a href="{{ route('project.create') }}">Add New</a></li>
								</ul>
							</li>
							@endif
							
							
							<li class="menu-title"> 
								<span>Management</span>
							</li>
							
							
							@if ($user->isAdmin == 1)
								
							<li class="submenu">
								<a href="#"><i class="fas fa-clipboard-list"></i> <span>Projects</span> <span class="menu-arrow"></span></a>
								<ul>
									
										
									<li><a href="{{ route('admin.project') }}">Projects</a></li>
									
									<li><a href="{{ route('admin.project.new') }}">Add New</a></li>
								</ul>
							</li>
							@endif
							<li> 
								<a href="{{ route('repo') }}"><i class="fas fa-clipboard-list"></i> <span>Repository</span></a>
							</li>
							<li> 
								<a href="{{ route('event.index') }}"><i class="fas fa-calendar-day"></i> <span>Events</span></a>
							</li>
						

							{{-- <li class="menu-title"> 
								<span>Pages</span>
							</li>

							<li class="submenu">
								<a href="#"><i class="fas fa-shield-alt"></i> <span> Authentication </span> <span class="menu-arrow"></span></a>
								<ul>
									<li><a href="login.html">Login</a></li>
									<li><a href="register.html">Register</a></li>
									<li><a href="forgot-password.html">Forgot Password</a></li>
									<li><a href="error-404.html">Error Page</a></li>
								</ul>
							</li> --}}
						
								</ul>
							</li>
						</ul>
					</div>
                </div>
            </div>
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
			
                @yield('content')
				
				<!-- Footer -->
				<footer>
					<p>Copyright © 2020 Gloria.</p>					
				</footer>
				<!-- /Footer -->

			</div>
			<!-- /Page Wrapper -->

			
		
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
		
		<!-- Slimscroll JS -->
		<script src="{{ asset('assets/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
		
		<!-- Chart JS -->
		<script src="{{ asset('assets/plugins/apexchart/apexcharts.min.js') }}"></script>
		<script src="{{ asset('assets/plugins/apexchart/chart-data.js') }}"></script>
		
		
		<!-- Custom JS -->
		<script  src="{{ asset('assets/js/script.js') }}"></script>
        @yield('script')
		
    </body>

</html>