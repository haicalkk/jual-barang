<?php
require_once 'controllers/BarangController.php';
require_once 'controllers/PenjualanController.php';
require_once 'controllers/PembelianController.php';
require_once 'controllers/PenggunaController.php';

session_start();

// Get the URL path
$request_uri = trim($_SERVER['REQUEST_URI'], '/');
$segments = explode('/', $request_uri);

// Define default controller and action
$controller_name = isset($segments[1]) && !empty($segments[1]) ? ucfirst($segments[1]) . 'Controller' : 'BarangController';
$action = isset($segments[2]) ? $segments[2] : 'index';
$params = array_slice($segments, 3); // Capture any additional parameters

// Define accessible pages when not logged in
$public_pages = ['pengguna/login', 'pengguna/register'];

// Check if user is logged in
$is_logged_in = isset($_SESSION['user_id']);

if (!$is_logged_in && !in_array($segments[1] . '/' . $action, $public_pages)) {
    header("Location: /jual-barang/pengguna/login");
    exit();
}

// Instantiate the controller
if (class_exists($controller_name)) {
    $controller = new $controller_name();
} else {
    die('Controller not found.');
}

// Check if the action exists in the controller
if (method_exists($controller, $action)) {
    // Call the action with parameters
    call_user_func_array([$controller, $action], $params);
} else {
    die('Action not found.');
}
?>
