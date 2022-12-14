<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=5">
    <meta name="description" content="">
    <meta name="author" content="Bootstrap 5">
    <title> FLOW LOGIN TO AUTHENTICATION </title>

    <!-- Bootstrap core CSS -->
     <link href="css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  
<body>
    
<header>
  
              <div class="navbar navbar-dark  bg-primary bg-gradient ">
                      <div class=" container-fluid">
                        <a href="#" class="navbar-brand d-flex align-items-center"><strong>Navbar</strong></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      </div>
              </div>
  
</header>

<main>
      <form id="frm_login" action="flow_login.php" method="post">
        <section class="py-4 text-center container-fluid">
        <div class="row">
        <div class=" py-lg-4">
		
	<div class="col-lg-6 col-md-8 mx-auto">
	<h2 class="font-weight-light"> Dev. Form Login <br> MySQLi + PHP + Bootstrap5 </h2>
	<p>            	              
	<div class="col-12">
		<label for="username" class="form-label">Username</label>
			<div class="input-group">
			<span class="input-group-text">@</span>
													  
			<input type="text" class="form-control" name="txt_username"  id="txt_username" placeholder="Username" required>
													  
			</div>
	</div>
						  
	<div class="col-12">
		<label for="username" class="form-label">Password</label>
			<div class="input-group">
			<span class="input-group-text"> * * </span>
								
			<input type="password" class="form-control" name="txt_password"  id="txt_password" placeholder="password" required>
							
			</div>
	</div>   
								  
	</p>

	<hr>    
		<p>
			<button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
			<a href="register.php" class="btn btn-warning btn-block">Register</a>
		</p>                                            
	</div>

            </div>
        </div>
        </section>
      </form>
</main>


<footer class="text-muted bg-dark py-5">
  <div class="container text-light">
    <p class="float-right mb-1"> 3 SYSTEM </p>
    <p class="mb-1"> DEVELOPMENT WEB APPLICATION</p>
    <p class="mb-0"> Website : https://Banrukcom.net // Email Chayjarung@gmail.com </p>
  </div>
</footer>

    <script src="js/bootstrap.bundle.min.js"></script>
      
  </body>
  
</html>