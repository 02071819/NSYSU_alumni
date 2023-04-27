<?php
    $name = $_GET['uname'];
    $uid = $_GET['uid'];
    $isPartner = $_GET['isPartner'];
    $payType = $_GET['payType'];
    $amount = 100;
    if($isPartner == '是'){
        $amount = 200;
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
    <div class="row justify-content-md-center">繳款資訊確認</div>
    <div class="container text-center">
        <div class="row">
            <div class="col-6 text-right">姓名</div>
            <div class="col-6 text-left"><?php echo $name ?></div>
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
    </div>
    <div class="container text-center">
        <form action="https://payment.nsysu.edu.tw/rcvserv/rcv.asp" method="post">
            <input type="hidden" name="pay type" value="3361">
            <input type="hidden" name="uname" value="<?php echo $name ?>">
            <input type="hidden" name="uid" value="<?php echo $uid ?>">
            <input type="hidden" name="amount" value="<?php echo $amount ?>">
            <input type="hidden" name="TRPayType" value="<?php echo $payType ?>">
            <?php if($payType == '1'){ ?>
                <input type="hidden" name="currency" value="TWD">
            <?php } ?>
            <input type="submit" name="submit" value="確認送出">
        </form>
    </div>
    <!-- js -->
    <script>
      function submitForm() {
        const uname = document.getElementById("uname");
        const paytype = "3361";
      }
    </script>
  </body>
</html>