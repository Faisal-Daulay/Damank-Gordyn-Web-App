<?php
session_start();
unset($_SESSION['status']);
unset($_SESSION['username']);
header("location:../");
