
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
			<?php wp_footer();?>
		<script>
			$(document).ready(function(){
				var c2a = $("#cta");
				var form = $("#form");
				var acS = "<div class='col-lg-4' style='margin-top: 45px' id='cta'><div class='row'><div class='col-lg-4'></div><div class='col-lg-4'><button class='btn btn-primary' style='background-color: #CD162D; border-color: #CD162D; width:115px' id='adv'> Advertiser </button><div class='row' style='padding:20px'></div><button class='btn btn-primary' style='background-color: #CD162D; border-color: #CD162D; width:115px'> Publisher </button></div><div class='col-lg-4'></div></div></div>";
				
				$("#adv").click(function(e){
					e.preventDefault();
					$("#context").fadeOut(400,function(){
						$(this).replaceWith(function(){
							form.removeClass("hidden");
							c2a.addClass("hidden");
							return $(form).hide().fadeIn(400);
						});
					});
				});
				
				$("#abort").click(function(e){
					e.preventDefault();
					location.reload();
				});
				
				$("#submit").click(function(e){
					e.preventDefault();
					
					var emailValid = $("emailPlace").size ? $("#emailBox").addClass("has-error") : false; 
					var nameValid = $("namePlace").size ? $("#nameBox").addClass("has-error"): false;
					var companyValid = $("phonePlace").size ? $("#phoneBox").addClass("has-error"): false;
					var phoneValid = $("companyPlace").size ? $("#companyBox").addClass("has-error"): false;
					var roleValid = $("rolePlace").size ? $("#roleBox").addClass("has-error"): false;
					
					if (emailValid == false || nameValid == false || companyValid == false || phoneValid == false || roleValid == false)
					{
						var headers = {
						"WP-API-KEY": "WP_nEhj6FkTJNiFfiS5moVeUE",
						}
										
						$.ajax({
							url: 'http://192.168.1.2:8000/api/users/register/lead/',
							type: 'post',
							data: $("#singupForm").serialize(),
							headers: headers,
							
							success: function (data) {
										console.log("Success");
										console.log(data);
									},
							error: function(error) {
									console.log("Error");
									console.log(error);
									}
						});
					}
				});
			});
		</script>
		
	</body>
</html>