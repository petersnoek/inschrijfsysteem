<!doctype html>
<html>
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Login</title>

	<!-- font awesome -->
	<script src="https://use.fontawesome.com/bf8ab24a40.js"></script>
</head>
<body>

<!-- show the topmenu bar -->
<div class="topbar">
@if(isset($_SESSION['userEmail']))
	<span class="">{{ $_SESSION['userEmail'] }}</span>
	<span class="" style="float:right;"><a href="logout_action.php">Logout</a></span>
@else
	<span class=""/><span>No user logged in</span>
@endif
<span style="float:left;"></span>
</div>

<!-- show errors, if present -->
@if(isset($errors))				{{-- does $errors exist? --}}
	@if($errors->any())			{{-- does $errors have any errors? --}}
	<div class="errors" >
	<ul>
		@foreach ($errors->all() as $error)		
			<li>{!! $error !!}</li>
		@endforeach
	</ul>
	</div>
	@endif
@endif

<!-- content goes here -->
<div class="content">
@yield('content')
</div>


<div style="display:none;" class="debugbar">
	<div class="debugbar-inner">
		<div class="col">
			<h3>Cookie contents: </h3>
			<p><?php print_r($_COOKIE); ?></p>
		</div>

		<div class="col">
			<h3>Session contents: </h3>
			<p><?php print_r($_SESSION); ?></p>
		</div>

	</div>
</div>

</body>
</html>
