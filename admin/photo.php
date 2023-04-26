<?php
include("top.inc.php");
include("left.inc.php");

//針對該id做delete動作
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $img = mysqli_query($conn, "select * from photo where id = '$id'");
    $result = mysqli_fetch_assoc($img);
    unlink("images/" . $result['pimage']);
    $delete = mysqli_query($conn, "DELETE FROM `photo` WHERE id = '$id'");
    header("location:photo.php");
}
?>

<div class="rightDiv">
    <div class="headTitle">
        <h2>相片</h2>
        <a href="manage_photo.php">新增相片</a>
    </div>
    <div class="view">
        <table width="100%" border="1px" cellpadding="0" cellspacing="0">
            <tr>
                <th>S1 No</th>
                <th>相片名稱</th>
                <th>操作</th>
            </tr>
            <?php
            $display = mysqli_query($conn, "select * from photo");

            $i=1;
            while ($data = mysqli_fetch_assoc($display)) {
                echo "
                    <tr>
                        <td>" . $i++ . "</td>
                        <td>" . $data['pname'] . "</td>
                        <td>
                            <a href='?id=" . $data['id'] . "'>刪除</a> &nbsp;
                                &nbsp;
                            <a href='manage_photo.php?id=" . $data['id'] . "'>編輯</a>
                        </td>

                        <td>"; ?>
            <?php
            }
            ?>
        </table>
    </div>
</div>

<!-- 按下Edit,針對該id連結到manage_categories.php -->