<?php
$servername = "localhost";
$username = "toxic";
$password = "sysop2018";
$dbname = "oversurgery";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // sql to create table
    $sql = "CREATE TABLE profile (
    id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, 
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    gender VARCHAR(6) NOT NULL,
    dob INT(11) NOT NULL,
    address VARCHAR(255) NOT NULL,
    tel_number INT(15) NOT NULL,
    email VARCHAR(255) NOT NULL
    )";

    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New table created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>