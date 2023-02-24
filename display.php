
<?php
// Note that there is NO design in this page (other than embedded tags that will be styled at the master page). No doctype, <head>, <style>, etc.


require("mysql_connect.php");

// DEFAULT QUERY: RETRIEVE EVERYTHING
$result = mysqli_query($con,"SELECT * FROM cd_catalog_class") or die (mysqli_error($con));

// FILTERING YOUR DB: On your own....If $_GET vars are present, please use them to filter your DB results (genre, year, decade, label). You can just redefine the previous query.

$displayby = $_REQUEST['displayby'];
$displayvalue = $_REQUEST['displayvalue'];

//echo "<h1>$displayby, $displayvalue</h1>";

//http://nrosanes3.dmitstudent.ca/dmit2503/ajax_students/ajax_site/display.php?displayby=genre&displayvalue=rock
if(isset($displayby) && isset($displayvalue)) {

    //on your own limit to 4 random results 

    $result = mysqli_query($con,"SELECT * FROM cd_catalog_class WHERE $displayby LIKE '$displayvalue' ORDER BY RAND() LIMIT 4") or die (mysqli_error($con));
}



while ($row = mysqli_fetch_array($result)) {
	/// This should out put artist names: On your own....create thumbnail views with images, album names, etc.

    //title, artist, image
	$artist = ($row['artist']);
    $artwork = ($row['artwork']);
    $title = ($row['title']);
    $genre = $_GET['displayvalue'];
    
	echo "<div class=\"cd-card\">\n";
    echo "<div class=\"cd-image\">";
	echo "<img src=\"artwork/thumbs100/$artwork\" alt=\"$title\">";
    echo "</div>";
    echo "<div class=\"cd-context\">";
	echo "<h4> $artist</h4>";
    echo "<p> $title</p>";
    echo "</div>";

	echo "\n</div>\n";
}

?>


