<?php

    $link = mysqli_connect("localhost", "root", "", "transaction");

    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    $sender = mysqli_real_escape_string($link, $_POST['sender']);
    $receiver = mysqli_real_escape_string($link, $_POST['receiver']);
    $credits = mysqli_real_escape_string($link, $_POST['credits']);
    $sql ="INSERT INTO Transfer_details (sender,receiver,credits) VALUES ('$sender', '$receiver','$credits')";
    if (mysqli_query($link,$sql)){
          echo "<script>alert('Transferred SUCCESSFULLY');</script>";
          }
          else
          {
              echo "<script>alert('FAILED TO INSERT');</script>";
          }

?>

