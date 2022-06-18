<!DOCTYPE html>  
<html>  
<head>  
<style>  
.error {color: #FF0001;}  
</style>  
</head>  
<body>
<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
      $name = $_POST["name"];
      $email = $_POST["email"];
      $password = $_POST["password"];
      
      
      $sql = "INSERT INTO `registration` (`name`, `email`,`password`) VALUES ('$name', '$email','$password')";
      $result = mysqli_query($conn, $sql);
    
      if($result){ 
          $insert = true;
      }
      else{
          echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
      }
    }


$name=$email=$password="";
$nameErr=$emailErr=$passwordErr="";

//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
  //String Validation  
      if (empty($_POST["name"])) {  
           $nameErr = "Name is required";  
      } else {  
          $name = input_data($_POST["name"]);  
          // check if name only contains letters and whitespace  
          if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
              $nameErr = "Only alphabets and white space are allowed";  
          }  
      }
  //Email Validation   
      if (empty($_POST["email"])) {  
          $emailErr = "Email is required";  
      } else {  
          $email = input_data($_POST["email"]);  
          // check that the e-mail address is well-formed  
          if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
              $emailErr = "Invalid email format";  
          }  
      } 
     

}

function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
} 

?>

<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form class="mx-1 mx-md-4" method ="POST"  action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="text" id="name" name="name" class="form-control" />
                                            <label class="form-label" for="form3Example1c">Your Name</label>
                                            <span class="error">* <?php echo $nameErr; ?> </span> 
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="email" id="email" name="email" class="form-control" />
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                            <span class="error">* <?php echo $emailErr; ?> </span> 
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input type="password" id="password" name="password" class="form-control" />
                                          
                                            <label class="form-label" for="form3Example4c">Password</label>
                                            <!--<span class="error">* <?php echo $passwordErr; ?> </span>-->
                                          </div>
                                    </div>

                                    

                                    <div class="form-check d-flex justify-content-center mb-5">
                                        <input class="form-check-input me-2" type="checkbox" value=""
                                            id="form2Example3c" />
                                        <label class="form-check-label" for="form2Example3">
                                            I agree all statements in <a href="#!">Terms of service</a>
                                        </label>
                                    </div>

                                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" name ="submit" value="submit" class="btn btn-primary btn-lg">Register</button>
                                        
                                      </div>

                                      <div>
                                      <p class="small fw-bold mt-2 pt-1 mb-0">Go To Login Page <a href="/crud/login.php"
                class="link-danger">Login</a></p>  
                                    </div>

                                </form>

                            </div>
                            <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                                <img src="/crud/draw1.webp" class="img-fluid" alt="Sample image">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>




<!---
<script>
    $namee=getElementById("name").innerHTML;
    console.log($namee);
</script>
--->

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.css" rel="stylesheet" />
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.2.0/mdb.min.js"></script>

</body>
</html>