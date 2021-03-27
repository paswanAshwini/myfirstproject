
<?php
$conn = mysqli_connect("localhost", "root", "","registration");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
/echo "Connected successfully";

$firstnameerr=$lastnameerr=$emailerr=$passworderr=$cpasserr=$gendererr=$courseserr=$qualificationerr=$hobbyerr=$yrsofqualificationerr="";
$first_name= $last_name= $email= $password= $pass= $gender= $courses=$qualification=$hobby=$yrs_of_qualification="";


//Input fields validation  



     if(isset($_POST["submit"]))
       {
        // $first_name=$_POST["first_name"];
        // $last_name=$_POST["last_name"];
        // $email=$_POST["email"];
        // $password=$_POST["password"];
        // $pass=$_POST["cpass"];
        // $gender=$_POST["gender"];
        // $courses=$_POST["courses"];
        // $qualification=$_POST["qualification"];
        // $hobby=$_POST["hobby"];
        // $yrs_of_qualification=$_POST["yrs_of_qualification"];
        // $hobby=implode(",",$hobby);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
          }
          


          if (empty($_POST["first_name"])) {
              $firstnameerr = "Name is required";
          }else {
                    $first_name = test_input($_POST["first_name"]);
                    // check if name only contains letters and whitespace
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$first_name)) {
                     $firstnameerr = "Only letters and white space allowed"; die();
                    }
                 }
      
          if (empty($_POST["first_name"])) {
              $lastnameerr = "Name is required";
            } else {
              $last_name = test_input($_POST["last_name"]);
              // check if name only contains letters and whitespace
              if (!preg_match("/^[a-zA-Z-' ]*$/",$last_name)) {
                  $lastnameerr = "Only letters and white space allowed";
              }
            }
      
            if (empty($_POST["email"])) {
              $emailerr = "Email is required";
            } else {
              $email = test_input($_POST["email"]);
              // check if e-mail address is well-formed
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailerr = "Invalid email format";
              }
            }
      
      
            if (empty($_POST["password"])) {
              $passworderr = "password is required";
            } else {
              $password = test_input($_POST["password"]);
            }
           
            if (empty($_POST["cpass"])) {
              $cpasserr = "password is required";
            } else {
              $cpass = test_input($_POST["cpass"]);
            }
      
            
            if (empty($_POST["gender"])) {
              $gendererr = "Gender is required";
            } else {
              $gender = test_input($_POST["gender"]);
            }
      
            if (empty($_POST["courses"])) {
              $courseserr = "course is required";
            } else {
              $courses = test_input($_POST["courses"]);
            }     
      
            
            if (empty($_POST["qualification"])) {
              $qualificationerr = "qualification is required";
            } else {
              $qualification = test_input($_POST["qualification"]);
            }
      
      
            if (empty($_POST['hobby'])){  
              $hobbyerr = "Accept terms of services before submit.";  
            } else {  
              $hobby = input_data($_POST["hobby"]);  
            }  
              
      
      
           
             if (empty($_POST["yrs_of_qualification"])) {  
              $yrsofqualificationerr = " yrs_of_qualification no is required"; 
      
            } else { 
              $yrs_of_qualification = test_input($_POST["yrs_of_qualification"]);
             }

             if($yrsofqualificationerr && $hobbyerr && $qualificationerr &&  $courseserr && $gendererr && $cpasserr == ''){
           echo"validate error"; die();


             }else{
            
              
          $insert= "INSERT INTO `form`(`first_name`, `last_name`, `email`, `password`, `gender`, `courses`, `qualification`, `hobby`, `yrs_of_qualification`) VALUES (' $first_name',' $last_name',' $email',' $password',' $gender','$courses','$qualification',' $hobby','$yrs_of_qualification')";
          
          if ($conn->query($insert) === TRUE) {
            echo "New record created successfully";
            } else {
            echo "Error: " . $insert . "<br>" . $conn->error;
            }
        
        }
            

            
               
      }

    

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <style>
         .error {color: #FF0000;}
  </style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
                   <center>
                     <h1  style="color:red;">Registration</h1>
                   </center>
        
        <form action="" method="POST">
        
                   <div class="form-group">
                   
                            <label for=" first name"><h5  style="color:blue;" >first name:</h5></label>
                            <span class="error">* <?php echo $firstnameerr; ?> </span> 
                            <input type="text" class="form-control" placeholder="first name " name="first_name" id="first name">
                        
                    </div>
                        <div class="form-group">
                        
                            <label for="last name"><h5  style="color:blue;" >last name :</h5></label>
                            <span class="error">* <?php echo $lastnameerr; ?> </span> 
                            <input type="text" class="form-control" placeholder=" last name"   name="last_name" id="last name">
                            
                    </div>
                    <div class="form-group">
                            <label for="email"><h5  style="color:blue;" >Email address:</h5></label>
                            <span class="error">* <?php echo $emailerr; ?> </span>  
                            <input type="email" class="form-control" placeholder=" email"    name="email" id="email">
                           
                    </div>
                    <div class="form-group">
                            <label for="pwd"><h5  style="color:blue;" >Password:</h5></label>
                            <span class="error">* <?php echo $passworderr; ?> </span> 
                            <input type="password" class="form-control" placeholder=" password"   name="password"  id="pwd">
                             
                    </div>
                    <div class="form-group">
                            <label for="pwd"> <h5  style="color:blue;" >confirm Password:</h5></label>
                            <span class="error">* <?php echo $cpasserr; ?> </span>  
                            <input type="password" class="form-control" placeholder=" confirm Passwordword"  name="cpass" id="pwd">
                            
                    </div>
                    <br>
                    <h5  style="color:blue;">Gender:</h5>
                    <span class="error">* <?php echo $gendererr; ?> </span>
                    <div class="form-check">  
                           <label class="form-check-label">
                               <input type="radio" class="form-check-input" name="gender" value="Male">Male
                           </label>
                    </div>
                    
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender"  value="Female">Female
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="gender" value="Transgender" >Transgender
                        </label>
                      
                    </div><br>

                    <div class="form-group">
                            <label for="sel1"><h5  style="color:blue;" >Courses:</h5></label>
                            <span class="error">* <?php echo $courseserr; ?> </span> 
                                      <select class="form-control" id="sel1" name="courses">

                                                <option  VALUE="">--select--</option>
                                                <option VALUE="MBBS">MBBS</option>
                                                <option  VALUE="B.TECH">B.TECH</option>
                                                <option  VALUE="DIPLOMA">BCOM</option>
                                                <option  VALUE="MBA">MBA</option>
                                                <option  VALUE="MCA">MCA</option>
                                      </select>
                                     
                    </div><br>

                    <div class="form-group">
                            <label for="sel1"><h5 style="color:blue;">Qualification</h5></label>
                            <span class="error">* <?php echo $qualificationerr; ?> </span>  
                                      <select class="form-control" id="sel1" name="qualification">
                                      
                                                <option  VALUE="">--select--</option>
                                                <option VALUE="graduate">graduate</option>
                                                <option  VALUE="postgraduate">postgraduate</option>
                                                <option  VALUE=">undergraduate<">undergraduate</option>
                                                <option  VALUE="diploma">diploma</option>
                                                
                                      </select>
                                     
                    </div> 
                    <br>
                    
                    <h5  style="color:blue;">Hobby</h5>
                     <span class="error">* <?php echo $hobbyerr; ?> </span>

                     <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name=hobby[]  value= "cricket">cricket
                                </label>
                    </div>

                     <div class="form-check">

                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name=hobby[]   value="football">football
                                </label>
                    </div>
                    <div class="form-check">

                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input"  name=hobby[] value="hockey" >hockey
                                </label> 
                    <div><br>
                    <div>
                    <h5  style="color:blue;"> Years Of Qualification</h5>  
                     <span class="error">*<?php echo $yrsofqualificationerr;?> </span> <br> 
                        <select name="yrs_of_qualification">
                            <option>--select--</option>
                            <?php  for($i=1996;$i<=date("Y");$i++) {?>
                            <option value="<?php echo $i;?>" ><?php echo $i;?></opion>
                            <?php }?>
                        </select>
                        </div><br>
                    <div class="form-group form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"> Remember me
                            </label>
                    </div><br>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </div>
        </form>
  
  
  

</body>
</html>