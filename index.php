<?php
$insert = false;
if(isset($_POST['name'])){
  //Set connection variables
 $server = "localhost";
 $username = "root";
 $password = "";

 //create a database connection
 $con = mysqli_connect($server, $username, $password);

 // check for connection success
 if(!$con){
  die("connection to this database failed due to". mysqli_connect_error());
 }
  // echo "Success connecting to the db";
  
  // collect post variables: 
  $name = $_POST['name'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $phone  = $_POST['phone'];
  $desc  = $_POST['desc'];
  $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";
  // echo $sql;

  // execute the query : 
  if($con->query($sql) == true){
    // echo "Successfully inserted";
    //flag for successful insertion:
    $insert = true;
  }
  else {
    echo "ERROR: $sql <br> $con->error";
  }
  //close the database connection:
  $con->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to SVNIT Travel Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.png" alt="SVNIT">
    <div class="container">
        <h1>Welcome to SVNIT US Trip Form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>
        <?php
        if($insert == true){
       echo "<p class='submitMsg'>Thansks for submitting your form. We are happy to see you joining us for the US trip</p>";
      }
        ?>
        <form action="" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="number" name="age" id="age" placeholder="Enter your age">
            <input type="text" name="gender" id="gender" placeholder="Enter your gender">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <input type="number" name="phone" id="phone" placeholder="Enter your Phone No.">
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button>
        </form>
    </div>
    <script src="index.js"></script>
    </body>
</html>