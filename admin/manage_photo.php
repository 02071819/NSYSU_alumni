<?php
$msg = "";//紅色警語
$pname = "";
$cat_id = "";

include("top.inc.php");
include("left.inc.php");

//select DB photo的資料
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $display = mysqli_query($conn, "select * from photo where id = '$id'");
    $res = mysqli_fetch_assoc($display);
    $pname = $res['pname'];
    $cat_id = $res['cat_id'];
}

//按下submit, select DB photo的資料 
if (isset($_POST['submit'])) {
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);

    $img = $_FILES['pimage']['name'];
    $temp = $_FILES['pimage']['tmp_name'];
    move_uploaded_file($temp, "./assets/images/".$img);


    $check = mysqli_query($conn, "select * from photo where
        pname = '$pname'");
    $num = mysqli_num_rows($check);

    //$check確認catname欄位是否有相同的名稱
    if ($num > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $res = mysqli_fetch_assoc($check);
            if ($id == $res['id']) {
            } else {
                $msg = "photo name ready exist";
            }
        } else {
            $msg = "photo name ready exist";
        }
    }

    //同樣在紅色警語沒出現的情況下,若get到該id,則就是Edit觸發，update catname欄位指定的資料名稱並返回category.php, 
    //反之,則就是Add Categories觸發，做insert
    if ($msg == "") {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $update = mysqli_query($conn, "UPDATE `photo` SET 
                                    `cat_id`='$cat_id',`pname`='$pname',`create_at`= NOW() WHERE id ='$id'");
            header("location:photo.php");
            die();
        } else {
            $query = mysqli_query($conn, "INSERT INTO `photo`(`cat_id`, `pname`, `pimage`, `status`, `create_at`) 
                                VALUES ('$cat_id','$pname','$img', '1', NOW())");
            if ($query) {
                header("location:photo.php");
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
        <h2>相片管理</h2>
        <!-- <a href="manage_categories.php">Add Products</a> -->
    </div>
    <form method="post" action="" enctype="multipart/form-data">
        <input type="text" name="pname" placeholder="相片名稱" value="<?php echo $pname; ?>" required>
        
        <select name="cat_id">
            <?php
                $cat = mysqli_query($conn,"select * from categories");
                while($get=mysqli_fetch_assoc($cat)){
                    if($get['id']==$cat_id){
                        echo "
                        <option selected value=".$get['id'].">".$get['cname']."</option>
                        ";
                    }else{
                        echo "<option value=".$get['id'].">".$get['cname']."</option>";
                    }
                }
            ?>
        </select>

        <input type="file" name="pimage">
        <!-- <input type="text" name="status" placeholder="Category Name" value="<?php echo $catname; ?>" required>
        <input type="text" name="create" placeholder="Category Name" value="<?php echo $catname; ?>" required> -->
        <input type="submit" name="submit" value="確認">

        <div class="msg"><?php echo $msg; ?></div>
    </form>
</div>
