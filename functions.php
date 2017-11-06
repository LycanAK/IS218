<?php

class User  {
    var $host = 'sql2.njit.edu';
    var $user = 'ecm6';
    var $pass = 'ctnpCOd7';
    var $db = 'ecm6';
    var $myconn;

    public function connect() {
        $conn = new mysqli('sql2.njit.edu', 'ecm6', 'ctnpCOd7', 'ecm6');
        if ($conn->connect_error) {
            die("Failed to connect to MySQL: " . $conn->connect_error);
        } 
		echo "Connected Successfully to Evan's Database!";
	}
    public function close() {
        mysqli_close($myconn);
        echo 'Connection closed!';
    }
	public function selectAll() {
		$sql = "SELECT * FROM ecm6.accounts";
		$result = $conn->query($sql);
		
		// output data of each row into HTML table
		if ($result->num_rows > 0){
			echo "<table border = '1'>
				<tr>
				<th>id</th>
				<th>email</th>
				<th>fname</th>
				<th>lname</th>
				<th>phone</th>
				<th>birthday</th>
				<th>gender</th>
				<th>password</th>
				</tr>";
			while($row = mysqli_fetch_row($result)) {
				echo "<tr>";
				echo "<td>" . $row["id"]. "</td>";
				echo "<td>" . $row["email"]. "</td>";
				echo "<td>" . $row["fname"]. "</td>";
				echo "<td>" . $row["lname"]. "</td>";
				echo "<td>" . $row["phone"]. "</td>";
				echo "<td>" . $row["birthday"]. "</td>";
				echo "<td>" . $row["gender"]. "</td>";
				echo "<td>" . $row["password"]. "</td>";
				echo "</tr>";
			}
				echo "</table>";
				mysql_free_result($result);
				return $result;
		}
		else{
			echo "There are no records matching this request";
		}
	}
	public function writeMessage() {
		echo "you are really a nice person <br><br>";
	}
}

$connection = new User;
$connection->connect();

// call the function
$msg->writeMessage();
selectAll();
?>