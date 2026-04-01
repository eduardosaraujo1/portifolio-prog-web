<?php
require 'scripts/autoload.php';

session_start();
session_destroy();
redirect('/');
