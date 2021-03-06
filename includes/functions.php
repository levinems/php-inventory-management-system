<?PHP
function prettyOrderId($id,$date){
    $id = str_pad($id, 5, "0",STR_PAD_LEFT);
    $prefix = str_replace("-","",$date);

    return $prefix.$id;
}

function getNextId(){
    global $db_prefix, $connect;
    $query="select max(order_id) from " . $db_prefix . "orders";;
  
    $query_result = $connect->query($query);
    $result = $query_result->fetch_row();
    return $result[0] + 1;
}

function getProdQty($id){
    global $db_prefix, $connect;
    $query="select quantity from " . $db_prefix . "product where product_id=" . $id;
  
    $query_result = $connect->query($query);
    $result = $query_result->fetch_row();
    return $result[0];
}