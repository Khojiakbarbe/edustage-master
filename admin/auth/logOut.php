<?php

include "../connect.php";

session_destroy();
session_unset();
header("location: ./login.php");