<?php
require_once '../conf/const.php';
require_once MODEL_PATH .'functions.php';
require_once MODEL_PATH .'user.php';
require_once MODEL_PATH .'item.php';
require_once MODEL_PATH .'cart.php';
require_once MODEL_PATH .'order_model.php';
require_once MODEL_PATH .'detail_model.php';

session_start();

$db = get_db_connect();
$user = get_login_user($db);

$orders = get_user_orders($db,$user['user_id']);

include_once VIEW_PATH . 'order_view.php';

