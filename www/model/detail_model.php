<?php
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_order_details($db,$order_id){
    $sql = "
        SELECT
            items.item_id,
            items.name,
            items.price,
            items.stock,
            items.status,
            items.images,
            details.detail_id,
            details.order_id,
            details.item_id,
            details.amount,
            details.subtotal,
            details.created,
            details.updated
        FROM
            details
        JOIN
            items
        ON
            details.item_id = items.item_id
        WHERE
            details.order_id ={$order_id}
            ";
        return fetch_all_query($db,$ssql);
}

function get_order_detail($db,$order_id,$item_id){
    $sql = "
        SELECT
            items.item_id,
            items.name,
            items.price,
            items.stock,
            items.status,
            items.image,
            details.detail_id,
            detials.order_id,
            details.item_id,
            details.amount,
            details.subtotal,
            details.created,
            details.updated
        FROM
            details
        JOIN
            items
        ON
            details.item_id = items.item_id
        WHERE
            details.order_id = {$order_id}
        AND
            items.item_id = {$item_id}
    ";

    return fetch_query($db,$sql);
}

function add_detail($db,$user_id,$item_id){
    $detail = get_user_detail($db,$user_id,$item_id);
    if($cart === false){
        return insert_detail($db,$user_id,$item_id);
    }
    return detail_cart_amount($db,$detail['detail_id'],$detail['amount'] + 1);
}

function insert_detail($db,$user_id,$item_id,$amount = 1){
    $sql = "
    INSERT INTO
        details(
            order_id,
            item_id,
            amount,
        )
        VALUES{($order_id},{$item_id},{$amount})
    ";

    return execute_query($db,$sql);
}

function update_detail_amount($db,$detail_id,$amount){
    $sql = "
        UPDATE
            details
        SET
            amount = {$amount}
        WHERE
            detail_id = {$detail_id}
        LIMIT 1
        ";
    return execute_query($db,$sql);
}

function delete_detail($db,$detail_id){
    $sql = "
        DELETE FROM
            details
        WHERE
            detail_id = {$detail_id}
        LIMIT 1
    ";
    return execute_query($db,$sql);
}

function sum_detail($details){
    $total = 0;
    foreach($details as $detail){
        $total += $detail['price'] * $detail['amount'];
    }
    return $total;
}


