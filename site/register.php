<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE);
include ("function_connect_database.php");
include ("func_code.php");


/*
print "<pre>";
	print_r($_GET);
	print_r($_POST);
	print_r($_SESSION);
print "</pre>";
*/

$system_check =  "Form Register";
$btn_edit_member = " Continue to Register ";
$frm_action_to = "frm_register.php";

if(isset($_SESSION['sid'])){
	
	$frm_action_to = "frm_update_member.php";	
	$session_name_member = $_SESSION['sid'];
	$btn_edit_member = " Modify Data ";
	$system_check =  "Form <ins>".$session_name_member."</ins>";
	$member_sql = "SELECT * FROM `member` WHERE email_member ='$_SESSION[sid]' ";
	$result = $conn->query($member_sql);

	if ($result->num_rows > 0) {	  // แสดงข้อมูล จากตารางฐานข้อมูล ภายใต้ ตัวแปร $row
	  while($row = $result->fetch_assoc()) {
		$id_member = $row["id_member"];
		$name_member = $row["name_member"];
		$fname_member = $row["fname_member"];
		$email_member = $row["email_member"];
		$pwd_member = $row["pwd_member"];
		$address_member = $row["address_member"]; 
		$address2_member = $row["address2_member"];
		$county_member = $row["county_member"];
		$state_member = $row["state_member"];
		$zip_member = $row["zip_member"];
		$authen_member = $row["authen_member"];
	  }
	}
	else {
		$system_check = "SYSTEM ERROR ";
	}
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Bootstrap 5">
    <title>Register · Website - Bootstrap 5</title>

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

              <div class="collapse bg-danger " id="navbarHeader">
                <div class="container">
                  <div class="row">
                  
                                <div class="col-sm-9 col-md-8 py-2">
                                        <h4 class="text-white">Header</h4>
                                        <p class="text-muted">
                                        <img src="img/header_1.png" class="img-fluid" alt="Hello" >
                                        </p>
                                </div>
                    
                                <div class="col-sm-3 offset-md-1 py-2">
                                        <h4 class="text-white">Menu</h4>
                                        <ul class="list-unstyled">
                                          <li><a href="#" class="text-white">Register</a></li>
                                          <li><a href="#" class="text-white">Login</a></li>
                                          <li><a href="#" class="text-white">Logout</a></li>
                                        </ul>
                                </div>
                                
                  </div>
                </div>
              </div>
  
              <div class="navbar navbar-dark bg-dark shadow-sm">
                      <div class="container">
                        <a href="#" class="navbar-brand d-flex align-items-center"><strong>Navbar</strong></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button>
                      </div>
              </div>
  
</header>


<main>
      <form id="frm_register" action="<?=$frm_action_to;?>" method="get">
              <section class="py-5 text-left container">
                  <div class="container">
                  <div class="row">
                  <div class="col-lg-8 col-md-12 mx-auto">
                  
                    <h1 class="font-weight-light">
						<?php
							print $system_check;
						?>
					</h1>
                    <p class="lead text-muted"> PHP + Bootstrap 5 </p>
                              <p>
                              <div class="row ">                         	               
                                        <div class="col-lg-6 col-md-12 py-2">
                                          <label for="firstName" class="form-label">First name</label>
                                          <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="<?=$name_member;?>" required>
                                          <div class="invalid-feedback">
                                            Valid first name is required.
                                          </div>
                                        </div>
                        
                                        <div class="col-lg-6 col-md-12 py-2">
                                          <label for="lastName" class="form-label">Last name</label>
                                          <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="<?=$fname_member;?>" required>
                                          <div class="invalid-feedback">
                                            Valid last name is required.
                                          </div>
                                        </div>
                        
<div class="col-12 py-2">
  <label for="email" class="form-label">Email <span class="text-muted">(Username)</span></label>									
    <input type="email" class="form-control" name="email"  id="email" value="<?=$email_member;?>" placeholder="you@email.com">
    <?=$email_member;?>
  <div class="invalid-feedback">Please enter a valid email address for register.</div>
</div>
                                  
                                  <div class="col-12 py-2">
                                    <label for="username" class="form-label">Password</label>
                                    <div class="input-group">
                                      <span class="input-group-text"> * * </span>    
                                      <input type="password" class="form-control" name="password" id="password" value="<?=$pwd_member;?>" placeholder="password" required>
                                    <div class="invalid-feedback">Your password is required.</div>
                                    </div>
                                  </div>
                                  
                                        
                                  <div class="col-12 py-2">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" id="address"    value="<?=$address_member;?>"  placeholder="4/234 Main ..... " required>
                                    <div class="invalid-feedback">Please enter your shipping address.</div>
                                  </div>
                                  
                                  <div class="col-12 py-2">
                                    <label for="address2" class="form-label">Address 2 <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" name="address2" id="address2" value="<?=$address2_member;?>" placeholder="Apartment or suite">
                                  </div>
                        
                                  <div class="col-md-5 py-2">
                                    <label for="country" class="form-label">Country</label>
									
                                    <select class="form-select" name="country"   id="country" required>									
                                      <option value="<?=$county_member;?>">Choose ... <?=$county_member;?></option>
                                      <option>Thailand</option>
                                      <option>Japan</option>
                                      <option>United States</option>
                                    </select>
									
                                    <div class="invalid-feedback">Please select a valid country.</div>
                                  </div>
                        
                                  <div class="col-md-4 py-2">
                                    <label for="state" class="form-label">State</label>
                                    <select class="form-select" name="state" id="state" required>
                                      <option value="<?=$state_member;?>">Choose ... <?=$state_member;?></option>
                                      <option>Road 1</option>
                                      <option>Road 2</option>
                                      <option>Road 3</option>
                                      <option>Road 4</option>
                                      <option>Road 5</option>
                                    </select>
                                    <div class="invalid-feedback">Please provide a valid state.</div>
                                  </div>
                        
                                  <div class="col-md-3 py-2">
                                    <label for="zip" class="form-label">Zip</label>
                                    <input type="text" class="form-control" name="zip" id="zip" placeholder=""  value="<?=$zip_member;?>" required>
                                    <div class="invalid-feedback">Zip code required.</div>
                                  </div>                          
                        </div>
                        </p>
                        
                        <hr >    
                      
                        <p class=" py-4">
								
                              <button class="btn btn-success btn-lg btn-block" type="submit">
  							    <?php
									print $btn_edit_member;
								?>
							  </button>
                              <a href="login.php" class="btn btn-primary btn-block">Login</a>
                        </p>
                 
                  </div>
                  </div>
                  </div>
              </section>
      </form>
</main>


<footer class="text-muted bg-dark py-5">
  <div class="container text-light">
    <p class="float-right mb-1">
      <a href="#" class="btn btn-info">Back to top</a>
    </p>
    <p class="mb-1">Album example is &copy; Bootstrap 5</p>
    <p class="mb-0">New to Bootstrap5</p>
  </div>
</footer>


    <script src="js/bootstrap.min.js"></script>
      
  </body>
</html>
