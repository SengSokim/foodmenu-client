<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Signin</title>
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
        <link rel="stylesheet" href="{{asset('css/signin.css')}}">

        
    </head>
<body>
  <section class="singin">

    <div class="container">
      <h3>Restaurant Information</h3>

  <center>   
      <form action="/action_page.php">
        <div class="row">
          <div class="col-md-6">
            <canvas id= "canv1" ></canvas>
            <p>
              <input type="file" id="img-input" multiple="false" accept="image/*" id=finput onchange="upload()">
              <input type="button" value="Browse Profile"  onclick="document.getElementById('img-input').value='';document.getElementById('img-input').click();" class="btn-upload btn btn-primary form-control" style="width: 130px;border-radius: 20px;">
              <span class="help-block"></span>
            </p>
          </div>
          <div class="col-md-6">
            <canvas id= "canv2" ></canvas>
            <p>
              <input type="file" id="img-input"  multiple="false" accept="image/*" id=picinput onchange="upload()">
              <input type="button" value="Browse Benner" onclick="document.getElementById('img-input').value='';document.getElementById('img-input').click();" class="btn-upload btn btn-primary form-control" style="width: 130px;border-radius: 20px">
              <span class="help-block"></span>
            </p>
          </div>
        </div>
      </center> 
      <div class="row">
        <div class="col-md-6">
          <label for="fname" class="required">Restaurant Name</label>
          <input type="text" id="fname" name="firstname" placeholder="Your Restaurant Name.." required="" />
      
          <label for="phonenumber" class="required">Phone Number</label>
          <input type="text" id="tel" name="phonenumber" placeholder="Your PhoneNumber.." required="" />
          <label for="fname" class="required">Website URL</label>
          <input type="text" id="link" name="website URL" placeholder="....." required="" />
        </div>
        <div class="col-md-6">
          <label for="address" class="required">Address</label>
        <input type="text" id="Address" name="Address" placeholder="Your Address.." required="" />
    
        <label for="Category" class="required">Restaurant Category</label>
        <select id="Category" name="Category">
          <option value="australia"></option>
          <option value="canada"></option>
          <option value="usa"></option>
        </select>
    
        <label for="subject">About</label>
        <textarea id="subject" name="subject" placeholder="Write something.." style="height:50px"></textarea>
        </div>
      </div>
        
        <button class="btn btn-create"> Create</button>
        <button class="btn btn-dark" onclick="myFunction()">Cancel</button>

        <!-- <input type="create" value="Create"> -->
        <!-- <input type="cancel" value="Cancel"> -->
      </form>
    </div>
    
  </section>

  

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
<script src="{{asset('js/script.js')}}"></script>




</body>
</html>