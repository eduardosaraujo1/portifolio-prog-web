<?php
session_start();

require 'middleware/auth.php';

header("Location: dashboard.php");
