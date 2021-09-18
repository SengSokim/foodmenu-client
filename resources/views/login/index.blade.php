
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="{{asset('css/web/animate.css')}}">
        
        <link rel="stylesheet" href="{{asset('css/web/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/web/owl.theme.default.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/web/magnific-popup.css')}}">

        <link rel="stylesheet" href="{{asset('css/web/bootstrap-datepicker.css')}}">
        <link rel="stylesheet" href="{{asset('css/web/jquery.timepicker.css')}}">

        <!-- <link rel="stylesheet" href="{{asset('css/web/flaticon.css')}}"> -->
        <link rel="stylesheet" href="{{asset('css/web/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/login.css')}}">

        
    </head>
    <body>   
        <div class="container" id="container" >
			<div class="row">
				<div class="col-md-6">
				<div class="form-container log-in-container">
					<form action="#" id="login">
					<img src="images/emenu-black-transparent.png" alt="" style="width: 150px;">
					<h6 style="font-weight: 200;margin: 0;color: #FFB300;font-weight: 400;">Sign in to start your session</h6>
					
					<input type="phonesnumber" placeholder="012 930 477" required="" />
					<input type="password" placeholder="Password" required="" />
					<button class="btn btn-Green" style="margin:2vh">log In</button>
					<a href="#" data-toggle="modal" data-target="#myModal" style="font-size: 12px;">Forgot your password?</a>
					<p>Don't have account?<a href="index.html" style="font-size: 11px;">Create an account?</a>
					</p>

					</form>
				
				</div>
						
				</div>
				
				<div class="col-md-6" id="img-benner">
					<img src="images/banner3.png" alt="" >
					
				</div>
				
			</div>
		


			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog" >
				
					<div class="modal-content" style="padding: 5vh;">
						<form action="#" id="fromfroget-password"  >
							<img src="images/emenu-black-transparent.png" alt="" style="width: 150px;">

							<h5 style="font-weight: 600;margin: 0;">Reset Your Password</h5>
							<p>Enter your PhoneNumber below to reset your password</p>
							<div class="field">
								<input type="text" id="forgot-phonenumber" name="forgot-phonenumber" placeholder="012 930 477" required="" style="padding: 5px;width: 100%;">
							</div>
							<button class="btn btn-passwordReset" style="margin:2vh" >Reset password</button>
							<!-- <p>Already have account?<a href="login.html" style="font-size: 11px;">Sign in</a> -->


					
						</form>
					</div>
				
				</div>
			</div>
		</div>    

       
        <!-- loader -->
        <script src="{{asset('js/web/jquery.min.js')}}"></script>

        <script src="{{asset('js/web/jquery-migrate-3.0.1.min.js')}}"></script>

        <script src="{{asset('js/web/popper.min.js')}}"></script>

        <script src="{{asset('js/web/bootstrap.min.js')}}"></script>

        <script src="{{asset('js/web/jquery.easing.1.3.js')}}"></script>

        <script src="{{asset('js/web/jquery.waypoints.min.js')}}"></script>

        <script src="{{asset('js/web/jquery.stellar.min.js')}}"></script>
        <script src="{{asset('js/web/owl.carousel.min.js')}}"></script>
        <script src="{{asset('js/web/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('js/web/jquery.animateNumber.min.js')}}"></script>
        <script src="{{asset('js/web/bootstrap-datepicker.js')}}"></script>
        <script src="{{asset('js/web/scrollax.min.js')}}"></script>
        <script src="{{asset('js/web/main.js')}}"></script>


    
    
    </body>
</html>

