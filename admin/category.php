<?php
include("top.inc.php");
include("left.inc.php");

//針對該id做delete動作
if(isset($_GET['id']) && $_GET['id']!='') {
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $delete = mysqli_query($conn, "DELETE FROM `categories` WHERE id = '$id'");
}
?>

<div class="rightDiv">
    <div class="headTitle">
        <h2>年次</h2>
        <a href="manage_categories.php">新增年次</a>
    </div>
    <div class="view">
        <table width="100%" border="1px" cellpadding="0" cellspacing="0">
            <tr>
                <th>S1 No</th>
                <th>年次名稱</th>
                <th>操作</th>
            </tr>
            <?php
                $display = mysqli_query($conn,"select * from categories");
                
                $i=1;
                while($data = mysqli_fetch_assoc($display)) //關聯數組
                {
                    echo "
                    <tr>
                        <td>".$i++."</td>
                        <td>".$data['cname']."</td>
                        <td>
                            <a href='?id=".$data['id']."'>刪除</a> &nbsp;
                                &nbsp;
                            <a href='manage_categories.php?id=".$data['id']."'>編輯</a>
                        </td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </div>
</div>

<!-- 按下Edit,針對該id連結到manage_categories.php -->