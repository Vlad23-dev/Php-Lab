<?php
require_once 'connection.php';


$link = mysqli_connect($host, $user, $password, $database) 
        or die("Error here." . mysqli_error($link));

$ses_id = $_COOKIE["PHPSESSID"];

$query = "SELECT firstName, sex, married, cities, comm  
FROM userdata WHERE session_id = '$ses_id' ORDER BY id DESC LIMIT 1";

$result = mysqli_query($link, $query) or die("Error " . mysqli_error($link));


if(isset($_POST['firstname']) && isset($_POST['sex']) && 
    isset($_POST['comment']) && isset($_POST['cities']) && $result->num_rows == 0) {

    $name = htmlentities($_POST['firstname']);
    $sex = htmlentities($_POST['sex']);
    $married = "No";

    if(isset($_POST['married'])) { $married = "Yes"; }

    $comment = htmlentities($_POST['comment']);
    $cities = $_POST['cities'];
    $cities_str = implode(",", $cities);

    $output ="
    <html>
    	<head>
    		<title>Your Data</title>
    	</head>
    <body>
        <h2>Input Data</h2>
    	Name: $name<br />
    	Sex: $sex<br />
    	Married: $married<br />
    	Selected cities: $cities_str<br />
        Your comment: $comment<br />";
        "</body></html>";

    echo $output;

    session_start();
    $session_id = session_id();


    $sql = "INSERT INTO userdata 
    VALUES ('$session_id', '$name', '$sex', '$married', '$cities_str', '$comment', NULL)";

    if ($link->query($sql) === TRUE) {
        echo "New record created successfully";
    }else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }   

    mysqli_close($link);
}
elseif($result->num_rows > 0){

    $row = mysqli_fetch_row($result);

    $output ="
    <html>
        <head>
            <title>Your Data</title>
        </head>
    <body>
        <h2>You already input this data</h2>
        Name: $row[0]<br />
        Sex: $row[1]<br />
        Married: $row[2]<br />
        Selected cities:$row[3]<br />
        Your comment: $row[4]<br />
        </body></html>";
        
    echo $output;
}
else {   
    echo "The data you entered is incorrect";
}
?>