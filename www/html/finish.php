<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
require_once MODEL_PATH . 'order_model.php';

session_start();

if(is_logined() === false){
  redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);

$carts = get_user_carts($db, $user['user_id']);

if(purchase_carts($db, $carts) === false){
  set_error('商品が購入できませんでした。');
  redirect_to(CART_URL);
} 

$cart_id = get_post('cart_id');

if(add_order($db,$user['user_id'],$cart_id)){
  set_message('購入履歴に追加しました');
}else{
  set_error('失敗しました');
}

$orders = get_user_orders($db,$user_id['user_id']);

$total_price = sum_carts($carts);

include_once '../view/finish_view.php';