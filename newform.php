
<?php
// Create connection
$conn = mysqli_connect("localhost", "root", "","registration");

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//
//echo "Connected successfully";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
     $isformValid= true ;
    if (empty($_POST["firstname"])) {
      $isformValid=false;
    $error['firstname'] =" firstname is required";
    }else{
      $firstname=$_POST['firstname'];
    }


    if (empty($_POST["lastname"])) {
      $isformValid=false;
      $error['lastname'] =" lastname is required";
    }else{
      $lastname=$_POST['lastname'];
    }


    if (empty($_POST["email"])) {
      $isformValid=false;
      $error['email'] =" email is required";
    }else{
      $email=$_POST['email'];
    }

    if (empty($_POST["password"])) {
      $isformValid=false;
      $error['password'] =" password is required";
    }else{
      $password=$_POST['password'];
    }

    if (empty($_POST["cpassword"])) {
      $isformValid=false;
     $error['cpassword'] =" confirm password is required";    
    }else{
      $cpassword=$_POST['cpassword'];
    }

   
    if(($_POST["password"])!==($_POST["cpassword"])){
       
     $error['cpassword'] ="password is not matched";
    }
    


    if (empty($_POST["gender"])) {
      $isformValid=false;
       $error['gender'] =" gender is required";
    }else{
      $gender=$_POST["gender"];
    }
  
    if (empty($_POST["course"])) {
      $isformValid=false;
      $error['course'] =" course is required";
    }else{
       $course=$_POST["course"];
    }


    if (empty($_POST["qualify"])) {
      $isformValid=false;
      $error['qualify'] =" qualification is required";
    }else{
       $qualify=$_POST["qualify"];
    }


    if (empty($_POST["yrs_of_qualification"])) {
      $isformValid=false;
      $error['yrs_of_qualification'] =" yrs_of_qualification is required";
    }else{
       $yrs_of_qualification=$_POST["yrs_of_qualification"];
    }
			
	if($isformValid===true){

    $icypass=md5($_POST["password"]);
   
  
   $insert="INSERT INTO `register`( `first_name`, `last_name`, `email`, `password`, `gender`, `courses`, `qualification`, `hobbies`, `yrs_of_qualification`, `created_at`, `modified_at`) VALUES (' $firstname','$lastname','$email','$icypass',' $gender' ,'$course')";

         if ($conn->query($insert) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $insert . "<br>" . $conn->error;
          }
          
          $conn->close();
        }
      }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>registration</title>
  <style>
   .error{
       color:red;
   }
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
         <h1>Registration</h1>
         </center>
    <form action=""  method="POST">
       <div class="form-group">
           <label for="email">firstname:*</label>
           <input type="text" class="form-control" placeholder="first name" id="name" name="firstname" value="<?php echo (!empty($_POST['firstname'])) ? $_POST['firstname'] :''; ?>">
            
           <span class="error"><?php echo !empty($error['firstname']) ? $error['firstname'] :'';?> </span> 
        </div>

        <div class="form-group">
           <label for="email">lastname:*</label>
           <input type="text" class="form-control" placeholder="last name" id="name"  name="lastname" value="<?php echo (!empty($_POST['lastname'])) ? $_POST['lastname'] :'';?>">
           <span class="error"><?php echo !empty($error['lastname']) ?  $error['lastname'] :'';?> </span> 
        </div>

        <div class="form-group">
           <label for="email">Email:*</label>
           <input type="email" class="form-control" placeholder="Enter email" id="email"  name="email" value="<?php echo ( !empty($_POST['email'])) ? $_POST['email'] :'';?>">
           <span class="error"><?php echo !empty($error['email']) ?  $error['email']:'';?> </span> 
        </div>

        <div class="form-group">
           <label for="pwd">Password:*</label>
           <input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password" value="<?php echo ( !empty($_POST['password']) )? $_POST['password'] :'';?>">
           <span class="error"><?php echo !empty($error['password']) ?  $error['password']:'';?> </span>
        </div>

        <div class="form-group">
           <label for="pwd"> confirm Password:*</label>
           <input type="password" class="form-control" placeholder="confirm password" id="pwd" name="cpassword" value="<?php echo ( !empty($_POST['cpassword'])) ? $_POST['cpassword'] :'';?>">
           <span class="error"><?php echo !empty($error['cpassword']) ? $error['cpassword']:'';?> </span>
        </div><br>


        <div>
        <h6>gender:*</h6>
        <div class="form-check">
             <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gender" value="Male"  <?php echo ( !empty($_POST['gender']) && $_POST['gender']=="Male") ? 'checked="checked"':'';?> >Male
            </label>
        </div>
 
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gender" value="Female"<?php echo ( !empty($_POST['gender']) && $_POST['gender']=="Female") ? 'checked="checked"':'';?>  >Female
            </label>
        </div>

        
        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="gender" value="Transgender" <?php echo ( !empty($_POST['gender']) && $_POST['gender']=="Transgender") ? 'checked="checked"':'';?> >Transgender
            </label>
        </div>
        <span class="error"><?php echo !empty($error['gender']) ?  $error['gender']:'';?> </span>
        </div>
        <br>

         <div>
                <div class="form-group" >
                    <label for="sel1">course:*</label>
                        <select class="form-control" id="sel1" name="course">                    
                            <option value="">--select--</option>
                            <option value="B.TECH" <?php echo ( !empty($_POST['course']) && $_POST['course']=="B.TECH") ? 'selected="selected"' : '';?>>B.TECH</option>
                            <option  value="MBA"  <?php echo ( !empty($_POST['course']) && $_POST['course']=="MBA") ? 'selected="selected"'  : '';?>>MBA</option>
                            <option   value="MCA" <?php echo ( !empty($_POST['course']) && $_POST['course']=="MCA") ? 'selected="selected"' : '';?>  >MCA</option>
                            <option  value="MBBS"<?php echo ( !empty($_POST['course']) && $_POST['course']=="MBBS") ? 'selected="selected"' : '';?>  >MBBS</option>                            
                        </select>
                        <span class="error"><?php echo !empty($error['course']) ? $error['course']:'';?> </span>
                </div>
        </div>

        <div>
                <div class="form-group" >
                    <label for="sel1">qualification:*</label>
                    <select class="form-control" id="sel1" name="qualify"> 
                    <option value="">--select--</option>
                    <option value="GRADUATE" <?php echo ( !empty($_POST['qualify']) && $_POST['qualify']=="GRADUATE") ? 'selected="selected"' : '';?>>GRADUATE</option>
                    <option  value="UNDER GRADUATE"  <?php echo ( !empty($_POST['qualify']) && $_POST['qualify']=="UNDER GRADUATE") ? 'selected="selected"'  : '';?>>UNDER GRADUATE</option>
                    <option   value="POST GRADUATE" <?php echo ( !empty($_POST['qualify']) && $_POST['qualify']=="POST GRADUATE") ? 'selected="selected"' : '';?>>POST GRADUATE</option>
                    <option  value="DIPLOMA"<?php echo ( !empty($_POST['qualify']) && $_POST['qualify']=="DIPLOMA") ? 'selected="selected"' : '';?>>DIPLOMA</option>                            
                    </select>

                    
                        <span class="error"><?php echo !empty($error['qualify']) ? $error['qualify']:'';?> </span>
                </div>

          <div>
            
             <h6>years of qualification:* </h6>

                <select  class="form-control" name="yrs_of_qualification" value="<?php echo (!empty($_POST['yrs_of_qualification'])) ? $_POST['yrs_of_qualification'] :'';?>">
                    <option>--select--</option>

                         <?php for($i=1996;$i<=date("Y");$i++) { ?>
                    <option value="<?php echo $i;?>" <?php echo ( !empty($_POST['yrs_of_qualification']) && $_POST['yrs_of_qualification']=="$i") ? 'selected="selected"':'';?> > <?php echo $i;?></option>
                   <?php } ?> 



                   

                </select>
                <span class="error"><?php echo !empty($error['yrs_of_qualification']) ? $error['yrs_of_qualification'] :'';?></span><br>     

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>                                                                                                         