<?php

$data = array();
$query = "SELECT * FROM news";

$con = mysqli_connect('localhost', 'root', '', 'nyt_news');
$result = mysqli_query($con, $query);

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data);
