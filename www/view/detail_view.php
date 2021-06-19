<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include VIEW_PATH . 'templates/head.php'; ?>
    <title>購入履歴</title>
    <link rel="stylesheet" href="<?php print(STYLESHEET_PATH . 'cart.css'); ?>">
</head>
<body>
    <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
    <h1>購入明細</h1>
    <div class="container">
    <?php include VIEW_PATH . 'templates/messages.php'; ?>
   
    <tr>
        <th>注文番号:<?php print($order['order_id']);?></th>
        <th>購入日時:<?php print($order['created']);?></th>
        <th>合計金額:<?php print($order['total']);?></th>
    </tr>
    <?php if(count($details) > 0){ ?>
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th>商品名</th>
                    <th>商品価格</th>
                    <th>購入数</th>
                    <th>小計</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($details as $detail){ ?>
                <tr>
                    <td><?php print($detail['name']);?></td>
                    <td><?php print(number_format($detail['price']));?>円</td>
                    <td><?php print(number_format($detail['amount']));?>個</td>
                    <td><?php print(number_format($detail['price']* $detail['amount']));?>円</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>    
    <?php } else { ?>
        <p>注文はありません</p>
    <?php } ?>
    </div>
    <script>
    $('.delete').on('click', () => confirm('本当に削除しますか？'))
    </script>
</body>
</html>