<?php
$text=$_POST['search']."*";

$mysqli = new mysqli('localhost', 'root', '', 'nyt_news');
if ($mysqli) {
  echo "No se pudo realizar la conexion "
}
else {
  $sql = "SELECT * FROM news WHERE MATCH (title, description) AGAINT ('".$text." IN BOOLEAN MODE')";
  $result = $mysqli->query($sql);
  if ($result) {
    $row_cnt = $result->num_rows;
    if($row_cnt==0){
      echo "<h4>Not found</h4>";
    }
    $data = array();
    while ($row = $result->fetch_array(MYSQLI_BOTH)) {
      $data[] = $row;
      shuffle($data)
    }
    echo json_encode($data);
  } else {
    echo "<h4>Not found</h4>";
  }
  $mysqli->close();
}
