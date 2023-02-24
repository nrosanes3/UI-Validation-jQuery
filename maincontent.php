<?php

require("mysql_connect.php");

$result = mysqli_query($con,"SELECT * FROM ajax_maincontent") or die (mysqli_error($con));

$display_article = $_REQUEST['display_article'];

if(isset($display_article)) {

    $result = mysqli_query($con,"SELECT * FROM ajax_maincontent WHERE id LIKE $display_article") or die (mysqli_error($con));
    if($row = mysqli_fetch_array($result)){
    
        $content = ($row['content']);
        $artist = ($row['artist']);
    
        echo "<div>\n";
        echo "<h2>$artist</h2>";
        echo "<div>$content</div>";
        echo "</div>";
        echo "\n</div>\n";
    }
}

?>


