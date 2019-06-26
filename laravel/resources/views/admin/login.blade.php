
<!DOCTYPE HTML>
<html>
<head>
<title>Purple_loginform Website Template | Home :: w3layouts</title>
<link href="/logins/css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
</head>
<body>
<!-- contact-form -->	
<div class="message warning">
<div class="inset">
	<div class="login-head">
		<h1>Yun Shopping</h1>
	</div>
		@if(session('error'))
            <div class="mws-form-message error">
                 {{ session('error') }}
            </div>
        @endif
		<form action="/admin/dologin" method="post">
			{{ csrf_field() }}
			<li>
				<input type="text" name="uname" class="text" value=""><a href="" class=" icon user"></a>
			</li>

			<div class="clear"> </div>

			<li>
				<input type="password" name="password" value=""><a href="" class="icon lock"></a>
			</li>
			<div class="clear"> </div>

			<div class="submit">
				<input type="submit" value="登录">
				
			<div class="clear">  </div>	
			</div>
				
		</form>
</div>					
</div>
	<div class="clear"> </div>
<!--- footer --->
<div class="footer">
	<p>Copyright &copy; 2014.</p>
</div>

</body>
</html>