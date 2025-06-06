<?php
$insert = false; 
if(isset($_POST['name'])) {

    //connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a connection
    $con = mysqli_connect($server, $username, $password);

    //$con deliver false if connection fails
    if (!$con) {
        die("Connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the database";

    //inserting data
    
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $salary = isset($_POST['salary']) ? $_POST['salary'] : '';
    $sql = "INSERT INTO `zs employees`.`employees`( `name`, `address`, `salary`) VALUES ('$name','$address','$salary');";
    // echo $sql;


    //objected operator
    if($con -> query($sql) == true){
        $insert = true;  //variable to check if the data is inserted
    } else {
        echo "ERROR: $sql <br> $con->error";    //accessing error property of the object
    }

    $con->close();  //closing the connection
   
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to IIT Kharagpur US Trip form</h3>
        <p>Enter your details and submit this form to confirm your participation in the trip </p>
        
        <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
        }
    ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name">
            <input type="text" name="address" id="address" placeholder="Enter your address">
            <input type="number" name="salary" id="salary" placeholder="Enter salary">
            <button class="btn">Submit</button> 
        </form>
    </div>
    
</body>
</html>