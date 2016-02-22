

<link href="/css/login.css" rel="stylesheet"/>   
    <div class="container" style="margin-top:40px">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<strong> Sign up </strong>
						<?php
						if (isset($_GET['type']))
						{
							echo '<a id="instructor-signup" href="register.php" style="">Or sign up as a student?</a>';
						}
						else
						{
							echo '<a id="instructor-signup" href="register.php?type=instructor" style="">Or sign up as an instructor?</a>';
						}
						?>
					</div>
					<div class="panel-body">
						<form role="form" action="#" method="POST">
							<fieldset>
								<div class="row">
									<div class="center-block">
										<a href="/">
										<img class="logo"
											src="/img/logo_small.png" alt="">
											</a>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" id="nombre" onkeyup="validateName()" placeholder="Name" name="name" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-user"></i>
												</span> 
												<input class="form-control" id="email" placeholder="Email" name="email" type="text" autofocus>
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" id="password" onkeyup="validatePassword()" placeholder="Password" name="password" type="password" value="">
											</div>
										</div>
										<div class="form-group">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="glyphicon glyphicon-lock"></i>
												</span>
												<input class="form-control" id="confirmation" onkeyup="validatePassword()" placeholder="Confirm Password" name="confirmation" type="password" value="">
											</div>
										</div>
										
										<!-- begin icon bullshittery -->
										
										<div class="password-match">
											<p id="matchText"><FONT COLOR="#66cc66">Passwords match! <span class="glyphicon glyphicon-ok"></span></FONT></p>
											<script>document.getElementById("matchText").style.display="none"</script>
										</div>
										
										<div class="password-mismatch">
											<p id="mismatchText"><FONT COLOR="#cc6666">Passwords do not match! <span class="glyphicon glyphicon-remove"></span></FONT></p>
											<script>document.getElementById("mismatchText").style.display="none"</script>
										</div>
										
										<div class="password-length">
											<p id="passwordLength"><FONT COLOR="#cc6666">Password must be 6-30 characters in length <span class="glyphicon glyphicon-remove"></span></FONT></p>
											<script>document.getElementById("passwordLength").style.display="none"</script>
										</div>
										
										<div class="password-empty">
											<p id="passwordEmpty"> <span class="glyphicon" ></span></p>
											<script>document.getElementById("passwordEmpty").style.visibility="hidden"</script>
										</div>
										
										<!-- end icon bullshittery -->
										
										<div class="form-group">
											<input type="submit" id="signupButton" onmouseover="validateAll()" class="btn btn-lg btn-primary btn-block" value="Sign Up">
										</div>
										
									</div>
								</div>
							</fieldset>
						</form>
					</div>
					<div class="panel-footer ">
						Already Registered? <a href="/login.php" onClick=""> Log in Here </a>
					</div>
                </div>
                
                <!-- Error notice below -->
				
				<div class="panel panel-default" id="errorMessage">
				<script>document.getElementById("errorMessage").style.display="none"</script>
					<div class="panel-heading">
						<strong> Whoops! </strong>
					</div>
					<div class="panel-body">
						<form role="form" action="#" method="POST">
							<fieldset>
								<div class="row">
									<div class="col-sm-12 col-md-10  col-md-offset-1 ">
										<div class="emptyNameField">
											<p id="noNombre"><FONT COLOR="#cc6666">A name is required <span class="glyphicon glyphicon-remove"></span></FONT></p>
											<!--
											<script>document.getElementById("noNombre").style.display="none"</script>
											-->
										</div>
										<div class="invalid-email">
											<p id="invalidEmail"><FONT COLOR="#cc6666">Invalid email address <span class="glyphicon glyphicon-remove"></span></FONT></p>
											<script>document.getElementById("invalidEmail").style.display="none"</script>
											<!--
											-->
										</div>
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>
				
                <!-- Error notice above -->
                
			</div>
		</div>
	</div>
	
<script>

function validateName()
{
	var name = document.getElementById("nombre");
	if(name.value.length == 0)
	{
		document.getElementById("errorMessage").style.display="block"
		document.getElementById("noNombre").style.display="block";
		document.getElementById("signupButton").removeAttribute("disabled");
		return false;
	}
	else
	{
		document.getElementById("noNombre").style.display="none";
		document.getElementById("errorMessage").style.display="none"
		document.getElementById("signupButton").removeAttribute("disabled");
		return true;
	}
}

function validateEmail()
{
	var email = document.getElementById("email");
	var re = /.*@.*\..*/;
	if(re.test(email.value))
	{
		document.getElementById("invalidEmail").style.display="none";
		document.getElementById("errorMessage").style.display="none"
		document.getElementById("signupButton").removeAttribute("disabled");
		return true;
	}
	else
	{
		document.getElementById("invalidEmail").style.display="block";
		document.getElementById("errorMessage").style.display="block"
		document.getElementById("signupButton").setAttribute("disabled", "disabled");
		return false;
	}
}

function validatePassword()
{
	var password = document.getElementById("password");
	var confirmation = document.getElementById("confirmation");
	
	if(password.value.length == 0)
	{
    	document.getElementById("mismatchText").style.display="none";
		document.getElementById("matchText").style.display="none";
		document.getElementById("passwordEmpty").style.display="block";
		document.getElementById("passwordLength").style.display="none";
		document.getElementById("signupButton").setAttribute("disabled", "disabled");
		return false;
	}
	if(password.value.length < 6 || password.value.length > 30)
	{
		document.getElementById("mismatchText").style.display="none";
		document.getElementById("matchText").style.display="none";
		document.getElementById("passwordEmpty").style.display="none";
		document.getElementById("passwordLength").style.display="block";
		document.getElementById("signupButton").setAttribute("disabled", "disabled");
		return false;
	}
	else if (password.value != confirmation.value)
    {
		document.getElementById("mismatchText").style.display="block";
		document.getElementById("matchText").style.display="none";
		document.getElementById("passwordEmpty").style.display="none";
		document.getElementById("passwordLength").style.display="none";
		document.getElementById("signupButton").setAttribute("disabled", "disabled");
		return false;
    }
    else if (password.value == confirmation.value)
    {
		document.getElementById("mismatchText").style.display="none";
		document.getElementById("matchText").style.display="block";
		document.getElementById("passwordEmpty").style.display="none";
		document.getElementById("passwordLength").style.display="none";
		document.getElementById("signupButton").removeAttribute("disabled");
		return true;
    }

}

function validateAll()
{
	if(validateName() && validatePassword()/* && validateEmail()*/)
	{
		document.getElementById("errorMessage").style.display="none"
		document.getElementById("signupButton").removeAttribute("disabled");
		return true;
	}
	else
	{
		document.getElementById("signupButton").setAttribute("disabled", "disabled");
		document.getElementById("errorMessage").style.display="block"
		return false;
	}
}
</script>

	
<!--	
<script>


</script>
-->