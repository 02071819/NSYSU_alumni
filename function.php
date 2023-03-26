<?php
function get_photo($conn, $limit = '', $cat_id = '')
{
    $sql = "select * from photo where status=1 ";
    
    if ($cat_id != '') {
        $sql .= " and cat_id=$cat_id";
    }
    $sql .= " order by id desc";
    
    if ($limit != '') {
        $sql .= " limit $limit";
    }
    $res = mysqli_query($conn, $sql);
    $data = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $data[] = $row;
    }
    return $data;
}
// select products DB的所有資料