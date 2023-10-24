<?php
$request_uri = $_SERVER['REQUEST_URI'];

$request_uri = ltrim($request_uri, '/');

$parts = explode('/', $request_uri);

$page = 'login';

if (!empty($parts[0])) {
  $page = $parts[0];
}

$page_file = "pages/$page.php";
if (file_exists($page_file)) {
  include($page_file);
} else if (isset($_GET['error'])) {
  include("pages/login.php");
}
