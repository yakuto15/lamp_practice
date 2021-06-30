<?php 
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';

function get_user_orders($db,$user_id){
    $sql = "
        SELECT
            orders.order_id,
            orders.user_id,
            orders.total,
            orders.created,
            orders.updated,
            carts.cart_id,
            carts.user_id,
            carts.amount
        FROM
            orders
        JOIN
            carts
        ON
            orders.user_id = carts.user_id
        WHERE
            orders.user_id = {$user_id}
        ";
        return fetch_query($db,$sql);
}

function get_user_order($db,$user_id,$cart_id){
    $sql = "
    SELECT
        orders.order_id,
        orders.user_id,
        orders.total,
        orders.created,
        orders.updated,
        carts.cart_id,
        carts.user_id,
        carts.amount
    FROM
        orders
    JOIN
        carts
    ON
        orders.user_id = carts.user_id
    WHERE
        orders.user_id = {$user_id}
    AND
        carts.cart_id = {$cart_id}
    ";

    return fetch_query($db,$sql);
}



function delete_order($db,$order_id){
    $sql = "
    DELETE FROM
        orders
    WHERE
        order_id = {$order_id}
    LIMIT 1
    ";

    return execute_query($db,$sql);
}

function delete_user_orders($db,$user_id){
    $sql = "
    DELETE FROM
        orders
    WHERE
        user_id = {$user_id}
    ";

    execute_query($db,$sql);
}

function get_order($db,$order_id){
    $sql = "
        SELECT
            order_id,
            user_id,
            total,
            created,
            updated,
            status
        FROM
            orders
        WHERE
            order_id = {$order_id}
    ";

    return fetch_query($db,$sql);
}

function get_orders($db,$is_open = false){
    $sql = '
    SELECT
        order_id,
        user_id,
        total,
        created,
        updated,
        status
    FROM
        orders
    ';
    if($is_open === true){
        $sql = '
        WHERE status = 1
        ';
    }
}

function get_open_orders($db){
    return get_orders($db,true);
}

function insert_order($db,$order_id,$user_id,$total,$created){
    $sql = "
        INSERT_INTO
            orders(
                order_id,
                user_id,
                total,
                created
            )
        VALUES{($order_id},{$user_id},{$total},{$created})
    ";

    return execute_query($db,$sql);
}

function add_order($db,$user_id,$cart_id,$total,$created){
    $orders = get_user_order($db,$user_id,$total,$cart_id);
    if($orders === false){
        $created = date('Y/m/d H:i:s');
        return insert_order($db,$user_id,$cart_id,$total,$created);
    }
    return update_order_time($db,$order['order_id'],$order['created']);
}

function update_order_time($db,$cart,$created){
    $sql = "
        UPDATE
            orders
        SET
            created = {$created}
        WHERE
            order_id = {$order_id}
        LIMIT 1
    ";
    return execute_query($db,$sql);
}