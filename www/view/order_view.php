<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <title>購入履歴</title>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'cart.css'); ?>">
</head>
<body>
    <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
    <h1>購入履歴</h1>
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
        <thead class="thead-light">
            <tr>
                <th>注文番号</th>
                <th>購入日時</th>
                <th>合計金額</th>
            </tr>
        </thead>
    <?php foreach($orders as $order){ ?>
        <tr>
            <th>注文番号<?php print($order['order_id']);?></th>
            <th>購入日時<?php print($order['created']);?></th>
            <th>合計金額<?php print($order['total']);?>円</th>
        </tr>
    <?php }  ?>
</body>
</html>    

