<?php
ignore_user_abort(true);
set_time_limit(0);
ob_start();

header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Credentials: True');
header('Access-Control-Max-Age: 120');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With, Authorization, Login, Password");
header("Access-Control-Allow-Methods: GET");

