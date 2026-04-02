<?php
require 'scripts/global.php';

session_start();
session_destroy();
redirect('/');
