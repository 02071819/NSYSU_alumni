<?php
$msg = "";//紅色警語
$cname = "";
include("top.inc.php");
include("left.inc.php");

//針對id做select DB categories的資料
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $display = mysqli_query($conn, "select * from categories where id = '$id'");
    $res = mysqli_fetch_assoc($display);
    $cname = $res['cname'];
}

//按下submit, select DB categories的資料 
if (isset($_POST['submit'])) {
    $cname = mysqli_real_escape_string($conn, $_POST['cname']);
    $check = mysqli_query($conn, "select * from categories where cname = '$cname'");
    $num = mysqli_num_rows($check);

    //$check確認catname欄位是否有相同的名稱
    if ($num > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $res = mysqli_fetch_assoc($check);
            if ($id == $res['id']) {
            } else {
                $msg = "Category name ready exist";
            }
        } else {
            $msg = "Category name ready exist";
        }
    }

    //同樣在紅色警語沒出現的情況下,若get到該id,則就是Edit觸發，update catname欄位指定的資料名稱並返回category.php, 
    //反之,則就是Add Categories觸發，做insert
    if ($msg == "") {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $update = mysqli_query($conn, "UPDATE `categories` SET `cname`='$cname',`created_on`= NOW() WHERE id='$id'");
            header("location:category.php");
            die();
        } else {
            $query = mysqli_query($conn, "INSERT INTO `categories`(`cname`, `created_on`) VALUES ('$cname', NOW())");
            if ($query) {
                header("location:category.php");
                die();
            } else {
                $msg = "Error";
            }
        }
    }
}
?>

<div class="rightDiv">
    <div class="headTitle">
        <h2>年次管理</h2>
        <a href="manage_categories.php">新增年次</a>
    </div>
    <form method="post" action="">
        <input type="text" name="cname" placeholder="年次" value="<?php echo $cname; ?>" required>
        <input type="submit" name="submit" value="確認">

        <div class="msg"><?php echo $msg; ?></div>
    </form>
</div>