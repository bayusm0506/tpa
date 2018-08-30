<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Login">
	<meta name="author" content="Romadansyah">
    <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="../images/favicon.ico" />

	<link href="../assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="../assets/css/style.css" rel="stylesheet">
	<script language='JavaScript'>
	var txt="TPPA | Tes Personaliti dan Potensi Akademik Universitas Medan Area ";
	var f = 300;
	var r = null;
	function m() { document.title=txt;
	txt=txt.substring(1,txt.length)+txt.charAt(0);
	r = setTimeout("m()",f);}m();
	</script>
    <script type="text/javascript" src="../assets/js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.validate.min.js"></script>
      
</head>
<body>

<div class="navbar navbar-static-top">
	<div class="navbar-inner">
		<a class="brand" href="http://uma.ac.id">UNIVERSITAS MEDAN AREA</a>
	</div>
</div>
<div class="row">
	<div class="dialog">
		<div class="title"><h4 class="text-center">ADMIN AREA</h1></div>
		<div class="block">
		<form name="postform" id="postform" method="post" action="login.php">
			<div class="input-prepend">
				<span class="add-on"><i class="icon-user"></i></span>
				<input class="input-medium user" id="prependedInput" type="text" name="username" placeholder="Username" >
			</div>
			<div class="input-prepend">
				<span class="add-on"><i class="icon-lock"></i></span>
				<input class="input-medium pass" id="prependedInput" name="password" type="password" placeholder="Password" >
			</div>
			<button class="btn btn-success btn-block btn-login" type="submit" id="login">
				Login
			</button>
		</form>
		</div>
	</div>
</div>
</body>
</html>
