<?php
session_start();
require_once 'config.php';

$core = new core();
$core->run();