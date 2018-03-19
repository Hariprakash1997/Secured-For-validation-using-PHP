<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Validation</title>
    <link href="bootstrap.min.css" rel="stylesheet" type="text/css">
    <style>
        
        label {
            vertical-align: top;
            margin-top: 9%;
        }
        
    </style>
</head>
<body>

<?php
    
    $nameErr = $emailErr = $genderErr = $websiteErr = "";
    $name = $email = $website = $comment = $gender = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
//        $name = test_input($_POST["name"]);
//        $email = test_input($_POST["email"]);
//        $website = test_input($_POST["website"]);
//        $comment = test_input($_POST["comment"]);
//        $gender = test_input($_POST["gender"]);
        
        if(empty($_POST["name"])){
            $nameErr = " Name is required";
        } else {
            $name = test_input($_POST["name"]);
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed"; 
            }
        }
        
        if(empty($_POST["email"])){
            $emailErr = " Email is required";
        } else {
            $email = test_input($_POST["email"]);
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailErr = "Invalid email format"; 
            }
        }
        
        if(empty($_POST["website"])){
            $websiteErr = "";
        } else {
            $website = test_input($_POST["website"]);
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
                $websiteErr = "Invalid URL"; 
            }
        }
        
        if(empty($_POST["comment"])){
            $comment = "";
        } else {
            $comment = test_input($_POST["comment"]);
        }
        
        if(empty($_POST["gender"])){
            $genderErr = " Gender is Required";
        } else {
            $gender = test_input($_POST["gender"]);
        }
    }

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>
   
   <div class="container">
       <div class="row">
           <div class="col-sm-6">
              <h2 class="text-center text-primary">PHP Form validation example</h2>
               <span class="text-danger">* required field</span>
               <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                   <div class="form-group">
                       <label for="name">Name</label>
                       <input name="name" type="text" class="form-control">
                       <span class="text-danger">* <?php echo $nameErr; ?> </span>
                   </div>
                   <div class="form-group">
                       <label for="email">Email</label>
                       <input type="email" name="email" class="form-control">
                       <span class="text-danger">* <?php echo $emailErr; ?> </span>
                   </div>
                   <div class="form-group">
                       <label for="website">Website</label>
                       <input type="text" name="website" class="form-control">
                       <span class="text-danger"> <?php echo $websiteErr; ?> </span>
                   </div>
                   <div class="form-group">
                       <label for="comment">Comment</label>
                       <textarea name="comment" id="" cols="40" rows="5"></textarea>
                   </div>
                   <div class="form-group">
                       <input type="radio" name="gender" value="male">Male
                       <input type="radio" name="gender" value="female">Female
                       <span class="text-danger">* <?php echo $genderErr; ?> </span>
                   </div>
                   <input type="submit" value="Submit" class="btn btn-primary">
               </form>
           </div>
       </div>
   </div>
   


    <?php
        echo "<h2>Your input</h2>";
        echo $name;
        echo "<br>";
        echo $email;
        echo "<br>";
        echo $website;
        echo "<br>";
        echo $comment;
        echo "<br>";
        echo $gender;
    ?>
    
</body>
</html>