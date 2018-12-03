<?php
// Connect to server and select databse.
if (isset($_POST['title'], $_POST['link'], $_POST['description'], $_POST['publishedAt'])){
    echo $_POST['title'];
    $title = $_POST['title'];
    $link = $_POST['link'];
    $description = $_POST['description'];
    $publishedAt = $_POST['publishedAt'];
}

$query = "INSERT INTO news (title, link, description, publishedAt) VALUES (?, ?, ?, ?);";

$con = mysqli_connect('localhost', 'root', '', 'nyt_news');
$stmt = mysqli_prepare($con, $query);

mysqli_stmt_bind_param($stmt, 'ssss', $title, $link, $description, $publishedAt);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);
mysqli_close($con);
