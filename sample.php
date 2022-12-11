<?php

include 'db.php';


$sql = "SELECT * FROM courses";
$result = $mysqli->query($sql);



if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
    {
            echo "id = " . $row['course_id']. "Name " . $row['course_name']. "image " . $row['course_img']. "<br>";
    }
}
else
{
    echo "0 Results";
}

?>


