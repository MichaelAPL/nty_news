<?php
$data = json_decode(file_get_contents('php://input', true));
// var_dump($data);
$title = $data->title;
$link = $data->link;
$description = $data->description;
$publishedAt = $data->publishedAt;

$query = "INSERT INTO news (title, link, description, publishedAt) VALUES (?, ?, ?, ?);";

$con = mysqli_connect('localhost', 'root', '', 'nyt_news');
$stmt = mysqli_prepare($con, $query);

mysqli_stmt_bind_param($stmt, 'ssss', $title, $link, $description, $publishedAt);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($con);
