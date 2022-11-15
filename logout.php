<?php

include 'bootstrapper.php';

session_destroy();
header('location:' .URLROOT.'/index.php');



?>