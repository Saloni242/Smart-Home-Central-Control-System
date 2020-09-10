<?php
    $key=$_GET['key'];
    $array = array();
    $con=mysqli_connect("localhost","root","","plan");
    $query=mysqli_query($con, "select * from transaction where plan LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['plan'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>