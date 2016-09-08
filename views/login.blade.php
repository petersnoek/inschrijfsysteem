<!doctype html>
<html>
<head>
	<link href="css/style.css" rel="stylesheet">
	<title>Login</title>
</head>
<body>

<div class="topbar">
@if(isset($_SESSION['userEmail']))
	{{ $_SESSION['userEmail'] }}
	<a href="logout.php">Logout</a>
@endif
</div>

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

<h1>Login</h1>
<form method="POST" action="login_action.php" class="loginform">
	<label for="email">Email</label>  
	<input name="email" type="email" ><br>
	
	<label for="pass">Password</label>  
	<input name="pass" type="password" ><br>

	<input type="submit"><br>
</form>

</body>
</html>
