<!doctype html>
<html>
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Login</title>
</head>
<body>

<!-- show the topmenu bar -->
<div class="topbar">
@if(isset($_SESSION['userEmail']))
	<span>{{ $_SESSION['userEmail'] }}</span>
	<span style="float:right;"><a href="logout_action.php">Logout</a></span>
@else
	<span>No user logged in</span>	
@endif
<span style="float:left;"></span>
</div>

<!-- show errors, if present -->
@if(isset($errors))				{{-- does $errors exist? --}}
	@if($errors->any())			{{-- does $errors have any errors? --}}
	<div class="errors" >
	<ul>
		@foreach ($errors->all() as $error)		
			<li>{{ $error }}</li>
		@endforeach
	</ul>
	</div>
	@endif
@endif

<!-- content goes here -->
@yield('content')


</body>
</html>
