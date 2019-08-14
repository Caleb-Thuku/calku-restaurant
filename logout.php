<?php
session_start();
session_destroy();
  header("Location: ../../project/calku.php.php?logged-out");
?>
