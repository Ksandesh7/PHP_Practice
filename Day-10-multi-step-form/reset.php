<?php
session_start();
session_unset();
session_destroy();
header("Location: step1.php");
exit;