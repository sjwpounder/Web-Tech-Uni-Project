<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Leading Choice Getaways Holidays</title>
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
        <li><a class="active" href="holidays.php">View Holidays</a></li>
        <li><a href="admin.html">Admin</a></li>
        <li><a href="credits.html">Credits</a></li>
        <li><a href="Wireframes.pdf">Wireframes</a></li>
      </ul>
</nav>
<!--This is the code for the navbar-->
<div class="gridContainer">
<main>
    <section>
        <h2>Holidays Currently available:</h2>
        <?php
  include 'database_conn.php';	  // make db connection

  $sql = "SELECT holidayTitle, catDesc, holidayDuration, locationName, country, holidayPrice, holidayDescription
    FROM LCG_holidays
  	  INNER JOIN LCG_category
	  ON LCG_category.catID = LCG_holidays.catID
    INNER JOIN LCG_location
    ON LCG_location.locationID = LCG_holidays.locationID
    ORDER BY holidayTitle";

    // db query

  $queryResult = $dbConn->query($sql);

  // Check for and handle query failure
  if($queryResult === false) {
	echo "<p>Query failed: ".$dbConn->error."</p>\n</body>\n</html>";
	exit;
  }
  // Otherwise fetch all the rows returned by the query one by one
   else {
     while($rowObj = $queryResult->fetch_object()){
	echo "<div><b>{$rowObj->holidayTitle}</b>, {$rowObj->catDesc} holiday, {$rowObj->holidayDuration} days, {$rowObj->locationName}, {$rowObj->country}, £{$rowObj->holidayPrice}. {$rowObj->holidayDescription}<br><br></div>";
     }
     // this code formats the output from the SQL query and prints it to the screen
  }
  $queryResult->close();
  $dbConn->close();
  // this code closes the query and the database connection
?>
    </section>
</main>
<!--This code is for the main section of the page. It holds the sections-->
</div>
<footer>
    &copy; Leading Choice Getaways
</footer>
<!--This is my footer code which I am using to hold the copyright text-->
</body>
</html>