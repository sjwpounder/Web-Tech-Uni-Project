<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Leading Choice Getaways Home Page</title>
	<link href="lcgStyle.css" type="text/css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1,user-scalable=no">
</head>
<body>
<header class="top">
    <div class="topTitleLogoClass">
        <img id="logo" src="images/logoLCG.png" alt="Leading Choice Gateways Logo">
        <h1 id="title">Leading Choice Getaways</h1>
    </div>
</header>
<!--This is the code for the header-->
<nav class="navbar">
    <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="holidays.php">View Holidays</a></li>
        <li><a class="active" href="admin.html">Admin</a></li>
        <li><a href="credits.html">Credits</a></li>
        <li><a href="Wireframes.pdf">Wireframes</a></li>
      </ul>
</nav>
<!--This is the code for the navbar-->
<?php
include 'database_conn.php';	  // make db connection

    $title = $_REQUEST['title'];
    $location = $_REQUEST['location'];
    $category = $_REQUEST['category'];
    $description = $_REQUEST['description'];
    $duration = $_REQUEST['duration'];
    $price = $_REQUEST['price'];

    $sql = "INSERT INTO LCG_holidays (holidayTitle, holidayDescription, holidayDuration, locationID, catID, holidayPrice)
    VALUES ('$title', '$description', '$duration', '$location', '$category', '$price')";
    $result = $dbConn->query($sql);

    $newSQL = "SELECT catDesc, locationName
    FROM LCG_holidays 
    LEFT JOIN LCG_category ON LCG_category.catID = LCG_holidays.catID
    LEFT JOIN LCG_location ON LCG_location.locationID = LCG_holidays.locationID
    WHERE  LCG_location.locationID = '$location' and LCG_category.catID = '$category'";

    $newResult = $dbConn->query($newSQL);
    $row = $newResult->fetch_object();

    echo "<h1>Holiday was submitted successfully! Here's a preview:</h1>";
    echo "<h2>$title</h2>";
    echo "<p>Holiday Catagory: " . $row->catDesc . "</p>";
    echo "<p>Holiday Location: " . $row->locationName."</p>";
    echo "<p>$description<p>";
    echo "<p>$duration days<p>";
    echo "<p>£ $price<p>";
?>
<!--This code handles the information retrieval from the form on the admin.html page and then formats it into a clean output-->
<footer>
    &copy; Leading Choice Getaways
</footer>
<!--This is my footer code which I am using to hold the copyright text-->
</body>
</html>