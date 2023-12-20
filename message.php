<?php
  if(isset($_SESSION['message'])){
    echo "<h5>".$_SESSION['message']."</h5>";
    unset($_SESSION['message']);
  }
?>