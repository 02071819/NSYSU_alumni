<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    $name = $_GET['uname'];
    $uid = $_GET['uid'];
    $isPartner = $_GET['isPartner'];
    $payType = $_GET['payType'];
    $amount = 3000;
    if($isPartner == '是'){
        $amount = 4500;
    }
    $payTypeName = '信用卡';
    if($payType == 2){
        $payTypeName = 'ATM轉帳';
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <title>校友中心</title>
  </head>
  <body>
    <div><h1 class="row justify-content-md-center pt-4">繳款資訊確認</h1> </div>
    <div class="d-flex p-4 bd-highlight">
      <table class="table table-bordered">
      <thead>
      </thead>
      <tbody>
        <tr>
          <td>姓名</td>
          <td><?php echo $name ?></td>
        </tr>
        <tr>
          <td>是否攜伴</td>
          <td><?php echo $isPartner ?></td>
        </tr>
        <tr>
          <td>應付金額</td>
          <td><?php echo $amount ?></td>
        </tr>
        <tr>
          <td>付款方式</td>
          <td><?php echo $payTypeName ?></td>
        </tr>
      </tbody>
      </table>
    </div>
<!-- 
    <div class="container- text-center">
        <div class="row">
            <div class="col-6 "><label>姓名</label></div>
            <div class="col-6"><?php echo $name ?></div>
        </div>
        <div class="row">
            <div class="col-6">是否攜伴</div>
            <div class="col-6"><?php echo $isPartner ?></div>
        </div>
        <div class="row">
            <div class="col-6">金額</div>
            <div class="col-6"><?php echo $amount ?></div>
        </div>
        <div class="row">
            <div class="col-6">付款方式</div>
            <div class="col-6"><?php echo $payTypeName ?></div>
        </div>
    </div> -->
    <div class="container text-center">
        <form action="https://payment.nsysu.edu.tw/rcvserv/rcv.asp" method="post">
            <input type="hidden" name="pay type" value="3361">
            <input type="hidden" name="uname" value="<?php echo $name ?>">
            <input type="hidden" name="uid" value="<?php echo $uid ?>">
            <input type="hidden" name="amount" value="<?php echo $amount ?>">
            <input type="hidden" name="TRPayType" value="<?php echo $payType ?>">
            <input type="hidden" name="reg_failpage" value="goldflow.php">
            <?php if($payType == '1'){ ?>
                <input type="hidden" name="card_succpage" value="index.php">
                <input type="hidden" name="card_failpage" value="goldflow.php">
                <input type="hidden" name="currency" value="TWD">
            <?php } else{?>
                <input type="hidden" name="atm_succpage" value="index.php">
                <input type="hidden" name="atm_failpage" value="goldflow.php">
            <?php } ?>
            <input type="submit" name="submit" value="確認送出" onClick="submitForm">
        </form>
    </div>
    <!-- js -->
    <script>
      function submitForm() {
        const uname = document.getElementById("uname");
        const paytype = "3361";
        console.log("123")
      }
    </script>
  </body>
</html>