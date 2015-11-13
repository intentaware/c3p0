<html>
	<head>
		<title>IntentAware
		</title>
		<link href="wp-includes/css/bootstrap.min.css" rel="stylesheet">
		<link href="wp-includes/css/style.css" rel="stylesheet">
	</head>
	<body style="font-family: Fira Sans Light">
		<nav class="navbar navbar-default " style=" margin-top:-50px ; z-index:-1; background-color:white;" >
        </nav>
		<div class="row">
			<div class="col-md-2 col-md-offset-5">
				<li style="margin-top:-50px;  text-align:center; list-style: none;"><a href="#" id="spin"><img src="wp-includes/images/logo.png" id="logo"></a></li>
			</div>
		</div>
		<div class="container">
			<div class="row" style="margin-top: 145px; margin-bottom: 150px" id="wSection">
				<div class="col-lg-8 c-section" id="context">
					<h3 style="font-family: Fira Sans Bold; font-size:270%">The World's First Intent Aware Advertising</h3>
						<p style="font-size:120%">
							We are IntentAware, and we have fundamentally changed how display ads function on internet.
							Through data-aware ads we enable advertisers and publishers to get unbelievable conversion rates.
							<br>
							IntentAware makes AD's Intelligent by leveraging Artificial Intelligence and Machine Learning.
							This makes our engine better than retargeting, contextual ads or any other ads.
						</p>
				</div>
				<div class="col-lg-4 " style="margin-top: 45px" id="cta">
					<div class="row">
						<div class="col-lg-4">
						</div>
						<div class="col-lg-4">
							<button class="btn btn-primary" style="background-color: #CD162D; border-color: #CD162D; width:115px" id="adv"> Advertiser </button>
							<div class="row" style="padding:20px"></div>
							<button class="btn btn-primary" style="background-color: #CD162D; border-color: #CD162D; width:115px"> Publisher </button>
						</div>
						<div class="col-lg-4">
						</div>
					</div>					
				</div>
			</div>
			<div id="form" class="col-lg-8 hidden" >
			<div class="s-form" style="padding: 5 5 5">
				<h3>Register</h3>
				<form class="form-horizontal">
					<fieldset>
						<div class="form-group">
							<label for="inputEmail" class="col-sm-2 control-label">Email</label>
							<div class="col-sm-10">
								<input type="email" class="form-control" id="inputEmail" placeholder="Email">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Password</label>
							<div class="col-sm-10">
								<input type="password" class="form-control" id="inputPassword" placeholder="Password">
							</div>
						</div>
						<div class="form-group">
							<label for="inputPassword" class="col-sm-2 control-label">Role</label>
							<div class="col-sm-10">
								<select class="form-control">
									<option selected disabled > Select One</Option>
										<option>Publisher</option>
										<option>Advertiser</option>
										<option>Small Business</option>
								</select>
							</div>
						</div>
						<div class="checkbox">
							<label>
								<input type="checkbox" id="blankCheckbox" value="option1" aria-label="Accept Terms & Conditions">
								Accept Terms & Conditions
							</label>
						</div>
						<button type="submit" class="btn btn-primary" style="background-color: #CD162D; border-color: #CD162D; width:115px">Submit</button>
						<button type="reset" class="btn btn-primary" style="background-color: #CD162D; border-color: #CD162D; width:115px" id="abort">Cancel</button>
					</fieldset>
				</form>
				</div>
			</div>
		</div>
		
		<div class= "nav navbar-default ">
			<div class="container-fluid">
				<ul class="nav navbar-nav navbar-center" style=" margin-left:350px ;" >
					<li><a href="#">Platforms</a></li>
					<li><a href="#">Labs</a></li>
					<li><a href="#">Articles</a></li>
					<li><a href="#">Career</a></li>
					<li><a href="#">Contact</a></li>
					<li><a href="#">Privacy</a></li>
					<li><a href="#">Opt-Out</a></li>
					<li><a href="#">Brand Guidelines</a></li>
				</ul>
			</div>
		</div>
			
		<script src="wp-includes/js/jquery-1.11.3.min.js"></script>
		<script src="wp-includes/js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				var c2a = $("#c2a");
				var form = $("#form");
				var acS = "<div class='col-lg-4' style='margin-top: 45px' id='cta'><div class='row'><div class='col-lg-4'></div><div class='col-lg-4'><button class='btn btn-primary' style='background-color: #CD162D; border-color: #CD162D; width:115px' id='adv'> Advertiser </button><div class='row' style='padding:20px'></div><button class='btn btn-primary' style='background-color: #CD162D; border-color: #CD162D; width:115px'> Publisher </button></div><div class='col-lg-4'></div></div></div>";
				
				$("#adv").click(function(e){
					e.preventDefault();
					$("#context").fadeOut(400,function(){
						$(this).replaceWith(function(){
							form.removeClass("hidden");
							return $(form).hide().fadeIn(400);
						});
					});
				});
				
				$("#abort").click(function(e){
					e.preventDefault();
					$("#form").fadeOut(400,function(){
						$("wSection").append(acS).hide().fadeIn(400);
						
					});
				});
			});
		</script>
	</body>
</html>