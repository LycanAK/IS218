<?php // Create a database connection.
$dbhost = "sql2.njit.edu";
$dbuser = "ecm6";
$dbpass = "ctnpCOd7";
$dbname = "ecm6";
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

//Test if connection occurred.
if (mysqli_connect_errno()) {
die("Database connection failed: " .
mysqli_connect_error() .
" (" . mysqli_connect_errno() . ")"
);
}

//Perform database query
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$phone = $_POST['phone'];
$birthday = $_POST['birthday'];
$gender = $_POST['gender'];
$password = $_POST['password'];

//This function will clean the data and add slashes.
// Since I'm using the newer MySQL v. 5.7.14 I have to addslashes
$email = mysqli_real_escape_string($connection, $email);
$fname = mysqli_real_escape_string($connection, $fname);
$lname = mysqli_real_escape_string($connection, $lname);
$phone = mysqli_real_escape_string($connection, $phone);
$birthday = mysqli_real_escape_string($connection, $birthday);
$gender = mysqli_real_escape_string($connection, $gender);
$password = mysqli_real_escape_string($connection, $password);

//This should retrive HTML form data and insert into database
$query  = "INSERT INTO accounts (email, fname, lname, phone, birthday, gender, password) 
            VALUES ('".$_POST["email"]."','".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["phone"]."','".$_POST["birthday"]."','".$_POST["gender"]."','".$_POST["password"]."')";

        $result = mysqli_query($connection, $query);
        //Test if there was a query error
        if ($result) {
            //SUCCESS
        header('Location: success.php');
        } else {
            //FAILURE
            die("Database query failed. " . mysqli_error($connection)); 
            //last bit is for me, delete when done
        }

mysqli_close($connection);
?>