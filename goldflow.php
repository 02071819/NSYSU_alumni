<?php
  header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
  include "connect.inc.php";
  if(isset($_POST['uname'])){
    $name = $_POST['uname'];
    $inputBirth = $_POST['inputBirth'];
    $inputID = $_POST['inputID'];
    $inputPhone = $_POST['inputPhone'];
    $inputDepartment = $_POST['inputDepartment'];
    $inputEmail = $_POST['inputEmail'];
    $inputAddr = $_POST['inputAddr'];
    $inputEname = $_POST['inputEname'];
    $inputEphone = $_POST['inputEphone'];

    $eat = $_POST['eat'];

    $go = 'none';
    if(isset($_POST['secret'])){
      if($go=='none'){
        $go = $_POST['secret'];
      } else {
        $go = $go."、".$_POST['secret'];
      }
      
    }
    if(isset($_POST['water'])){
      if($go=='none'){
        $go = $_POST['water'];
      } else {
        $go = $go."、".$_POST['water'];
      }
    }
    if(isset($_POST['noGo'])){
      $go = $_POST['noGo'];
    }

    $partner = $_POST['isPartner'];
    

    $inputPname = 'none';
    $inputPbirth = 'none';
    $inputPID = 'none';
    $inputPphone = 'none';
    $Pgo = 'none';
    
    if($partner == '是'){
      $inputPname = $_POST['inputPname'];
      $inputPbirth = $_POST['inputPbirth'];
      $inputPID = $_POST['inputPID'];
      $inputPphone = $_POST['inputPphone'];
      if(isset($_POST['Psecret'])){
        if($Pgo=='none'){
          $Pgo = $_POST['Psecret'];
        } else {
          $Pgo = $Pgo."、".$_POST['Psecret'];
        }
        
      }

      if(isset($_POST['Pwater'])){
        if($Pgo=='none'){
          $Pgo = $_POST['Pwater'];
        } else {
          $Pgo = $Pgo."、".$_POST['Pwater'];
        }
      }
      if(isset($_POST['PnoGo'])){
        $Pgo = $_POST['PnoGo'];
      }
  
    }

    $payType = 'none';
    if(isset($_POST['payType'])){
      $payType = $_POST['payType'];
    }
    
    $number = strval(rand(10000,99999));
    $type = '3361';
    $testId = $type.$number;

    function check_uid($test, $conn)
    {
      $sql="SELECT `uid` FROM register WHERE `uid`='$test'";
      $result = mysqli_query($conn, $sql);
      $result = mysqli_fetch_array($result);
      if($result == null){
        return true;
      } else{
        return false;
      }
    }

    while(check_uid($testId, $conn) == false){
      $number = strval(rand(10000,99999));
      $type = '3361';
      $testId = $type.$number;
    }

    $sql2="INSERT INTO `register` (`uid`, `name`,`birth`, `id`, `phone`, `department`, `email`, `addr`, `eName`, `ePhone`, `eat`, `go`, `isPartner`, `pName`, `pBirth`, `pid`, `pPhone`, `pGo`, `TRPayType`) VALUES ('$testId', '$name', '$inputBirth', '$inputID', '$inputPhone', '$inputDepartment', '$inputEmail', '$inputAddr', '$inputEname', '$inputEphone', '$eat', '$go', '$partner', '$inputPname', '$inputPbirth', '$inputPID', '$inputPphone', '$Pgo', '$payType');";
    $result2 = mysqli_query($conn, $sql2);
    
    mysqli_close($conn);
    header("Location: check.php?uname=".$name."&uid=".$testId."&isPartner=".$partner."&payType=".$payType);
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
    <div class="py-4">
      <h1 style="text-align: center">2023畢業 30 年校友回娘家-報名表單</h1>
    </div>
    <div id="registerForm" class="row justify-content-md-center">
      <div class="col-md-10 py-4 mb-2 border border-2 ">
        <p>離開學校30年的你~有多久沒有回來學校走走？</p>
        <p>
          中山路上的一步一履，有大家留下的足跡，年輕青澀的求學生活，熱血奮鬥的閃亮回憶，心靈繾綣的相依，成為我們離校30年生命歷程上的回憶點滴。
        </p>
        <p>
          看看當年騁馳球場的戰友，是否勇如當年呢？昔日經過窗前的女孩，是否風采依舊呢？
        </p>
        <p>
          活動當天我們邀請當年指導您學習的老師一同回系上，由系上與您們聊聊這30年的變化，中午於沙灘會館與老師同學們共享午餐，除此之外學校亦規劃校園戶外活動，讓各位再一次體驗校園生活~
        </p>
        <p>
          歡迎畢業學長姐返校共襄盛舉，期待您的參與將會使活動更為精采，相約92見。
        </p>
        <li>主辦單位：校友服務暨社會責任中心</li>
        <li>連絡電話：07-525-2000分機6687</li>
      </div>
    </div>
    <div>
      <label></label>
    </div>
    <div class="mt-10">
      <form class="row g-3" method="post">
        <div class="row justify-content-md-center">
          <div class="col-md-5">
            <label for="uname" class="form-label">姓名</label>
            <input type="text" class="form-control" name="uname" required/>
          </div>
          <div class="col-md-5">
            <label for="inputBirth" class="form-label">生日</label>
            <input type="text" class="form-control" name="inputBirth" required/>
          </div>
          <div class="col-md-5 pt-2">
            <label for="inputID" class="form-label">身分證字號</label>
            <input
              type="text"
              class="form-control"
              name="inputID"
              required
            />
          </div>
          <div class="col-md-5 pt-2">
            <label for="inputPhone" class="form-label">電話</label>
            <input type="text" class="form-control" name="inputPhone" required/>
          </div>
          <div class="col-md-5 pt-2">
            <label for="inputDepartment" class="form-label">畢業系所</label>
            <select
              class="form-select form-select-sm"
              aria-label=".form-select-sm example"
              name="inputDepartment"
              required
            >
              <option selected value="">請選擇畢業系所</option>
              <option value="中國文學系">中國文學系</option>
              <option value="外國語文系">外國語文系</option>
              <option value="音樂學系">音樂學系</option>
              <option value="化學系">化學系</option>
              <option value="物理學系">物理學系</option>
              <option value="生物科學系">生物科學系</option>
              <option value="應用數學系">應用數學系</option>
              <option value="電機工程學系">電機工程學系</option>
              <option value="機械與機電工程學系">機械與機電工程學系</option>
              <option value="材料與光電科學學系">材料與光電科學學系</option>
              <option value="環境工程研究所">環境工程研究所</option>
              <option value="企業管理學系">企業管理學系</option>
              <option value="資訊管理學系">資訊管理學系</option>
              <option value="財務管理學系">財務管理學系</option>
              <option value="海洋生物科技暨資源學系">海洋生物科技暨資源學系</option>
              <option value="海洋環境及工程學系">海洋環境及工程學系</option>
              <option value="海洋科學系">海洋科學系</option>
              <option value="中國與亞太區域研究所">中國與亞太區域研究所</option>
            </select>
          </div>
          <div class="col-md-5 pt-2 ">
            <label for="inputEmail" class="form-label">email</label>
            <input type="email" class="form-control" name="inputEmail" required/>
          </div>
          <div class="col-md-10 pt-2">
            <label for="inputAddr" class="form-label">地址</label>
            <input type="text" class="form-control" name="inputAddr" required/>
          </div>
          <div class="col-md-5 pt-2">
            <label for="inputEname" class="form-label">緊急聯絡人姓名</label>
            <input type="text" class="form-control" name="inputEname" required/>
          </div>
          <div class="col-md-5 pt-2">
            <label for="inputEphone" class="form-label"
              >緊急聯絡人電話</label
            >
            <input type="text" class="form-control" name="inputEphone" required/>
          </div>
          <div class="col-md-5 pt-2">
            <label>飲食</label>
            <div class="form-check col-2">
              <input
                id = "eat1"
                class="form-check-input"
                type="radio"
                name="eat"
                value="葷"
                checked
              />
              <label class="form-check-label" for="eat1">葷</label>
            </div>
            <div class="form-check col-2">
              <input
                id = "eat2"
                class="form-check-input"
                type="radio"
                name="eat"
                value="全素"
              />
              <label class="form-check-label" for="eat2">全素</label>
            </div>
            <div class="form-check col-2">
              <input
                id = "eat3"
                class="form-check-input"
                type="radio"
                name="eat"
                value="蛋奶素"
              />
              <label class="form-check-label" for="eat3"
                >蛋奶素</label
              >
            </div>
          </div>
          <div class="col-md-5 pt-2">
            <label>下午校園活動是否參與？</label>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="隧道秘境"
                name="secret"
              />
              <label
                class="form-check-label"
                for="secret"
              >
                隧道秘境
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="海域體驗 - 獨木舟"
                name="water"
              />
              <label class="form-check-label" for="water">
                海域體驗 - 獨木舟
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                type="checkbox"
                value="不參加"
                name="noGo"
              />
              <label class="form-check-label" for="noGo">
                不參加
              </label>
            </div>
          </div>
          <div class="col-md-10 pt-2">
            <label>是否攜伴？</label>
            <div class="form-check col-2">
              <input
                class="form-check-input"
                type="radio"
                name="isPartner"
                value="是"
                id="isPartnerY"
                checked
              />
              <label class="form-check-label" for="isPartnerY">是</label>
            </div>
            <div class="form-check col-2">
              <input
                class="form-check-input"
                type="radio"
                name="isPartner"
                value="否"
                id="isPartnerN"
              />
              <label class="form-check-label" for="isPartnerN">否</label>
            </div>
          </div>
          <div class="col-md-5 pt-2">
            <label for="inputPname" class="form-label">眷屬姓名</label>
            <input type="text" class="form-control" name="inputPname"/>
          </div>
          <div class="col-md-5 pt-2">
            <label for="inputPbirth" class="form-label">眷屬生日</label>
            <input type="text" class="form-control" name="inputPbirth"/>
          </div>
          <div class="col-md-5 pt-2">
            <label for="inputPID" class="form-label">眷屬身分證字號</label>
            <input type="text" class="form-control" name="inputPID"/>
          </div>
          <div class="col-md-5 pt-2">
            <label for="inputPphone" class="form-label">眷屬電話</label>
            <input type="text" class="form-control" name="inputPphone"/>
          </div>
          <div class="row justify-content-md-center">
            <div class="col-md-10 pt-2">
              <label>是否參與下午的活動？</label>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="隧道秘境"
                  name="Psecret"
                />
                <label
                  class="form-check-label"
                  for="Psecret"
                >
                  隧道秘境
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="海域體驗 - 獨木舟"
                  name="Pwater"
                />
                <label class="form-check-label" for="Pwater">
                  海域體驗 - 獨木舟
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="不參加"
                  id="PnoGo"
                  name="PnoGo"
                />
                <label class="form-check-label" for="PnoGo">
                  不參加
                </label>
              </div>
            </div>
            <div class="col-md-5 pt-2">
            <label for="payType" class="form-label">付款方式</label>
            <select
              class="form-select form-select-sm"
              aria-label=".form-select-sm example"
              name="payType"
            >
              <option selected value="">請選擇付款方式</option>
              <option value=1>信用卡</option>
              <option value=2>ATM轉帳</option>
            </select>
          </div>
            <div class="col-md-10 border mt-4 px-4">
              <div>
                <h2 class="row justify-content-center p-4">個人資料同意書</h2>
              </div>
              <div>
                本同意書說明本主辦單位（以下簡稱本單位）將如何處理本表單所蒐集到的個人資料。當您按下「提交」(即【資料送出按鈕】)，即表示您已閱讀、瞭解，並同意接受本同意書之所有內容及其後修改變更規定。依個人資料保護法規範，請您於【各項活動】前務必詳細閱讀本聲明書之各項內容，若您參與本單位所舉辦的活動，表示您同意【活動承辦單位】蒐集、處理、利用您與相關人員之下列個人資料，始繼續進行後續相關步驟。
              </div>
              <div>
                <h4>一、 基本資料之蒐集、更新及保管</h4>
                <ol>
                  <li>
                    本單位蒐集您的個人資料在中華民國「個人資料保護法」與相關法令之規範下，依據本單位【資安之隱私權政策聲明】、【個人資料保護政策】蒐集、處理及利用您的個人資料。
                  </li>
                  <li>請於申請時提供您本人正確、最新及完整的個人資料。</li>
                  <li>
                    本單位因執行各項活動辦理業務，依目的不同，將蒐集您的個人資料包括：
                  </li>
                  <ol>
                    <li>姓名、職稱、國民身分證統一編號、出生年月日</li>
                    <li>聯絡方式(戶籍地址、通訊地址、電話、電子信箱)</li>
                  </ol>
                  <li>
                    若您的個人資料有任何異動，請主動向活動承辦人員申請更正，使其保持正確、最新及完整。
                  </li>
                  <li>
                    若您提供錯誤、不實、過時或不完整或具誤導性的資料，您將損失參加活動之相關權益。
                  </li>
                  <li>
                    您可依中華民國「個人資料保護法」，於「活動報名期間」、「活動辦理期間」及「活動結案期間」，就您的個人資料行使以下權利：(1)請求查詢或閱覽。(2)製給複製本。(3)
                    請求補充或更正。(4)請求停止蒐集、處理及利用。（本項於上述三段期間，將停止您參加活動的權益）(5)請求刪除。
                    （本項於上述三段期間，將停止您參加活動的權益）
                  </li>
                  <ul>
                    <li>
                      您行使上述權利時，須填具申請表並檢具身分證明文件向本單位提出申請。
                    </li>
                    <li>
                      委託他人辦理，須另出具委託書並同時提供受託人身份證明文件以供核對。
                    </li>
                    <li>
                      若申請人不符前述規定，本單位得請申請人補充資料，以為憑辦。
                    </li>
                    <li>本單位執行職務或業務所必須者，本單位得拒絕之。</li>
                    <li>
                      您欲執行上述權利時，請直接聯繫【活動業務承辦人員】，詳細聯絡方式請參考個別活動說明。因您行使上述權利，而導致權益受損時，本單位將不負相關賠償責任。
                    </li>
                  </ul>
                  <li>
                    報名平台上，所有活動之個人資料，一律於活動結束後一週自動刪除，不予保留。
                  </li>
                </ol>
                <h4>二、 蒐集個人資料之目的</h4>
                <ol>
                  <li>本單位為執行「各項活動報名及管理」需蒐集您的個人資料</li>
                  <li>
                    本單位利用您的個人資料期間為「活動報名期間」起，經「活動辦理期間」至「活動結案期間」，若依個別活動管理需要，延長個人資料保存期間，則活動承辦人員將於活動說明，另行告知期限。您的個人資料利用地區為台灣地區。
                  </li>
                </ol>
                <h4>三、 基本資料之保密</h4>
                <ul>
                  <li>
                    您的個人資料受到本單位【資安之隱私權政策聲明】之保護及規範。
                  </li>
                  <li>
                    請閱讀【資安之隱私權政策聲明】以查閱本單位完整【資安之隱私權政策聲明】。
                  </li>
                  <li>
                    本單位各項活動承辦人員將克盡善良管理人責任，如違反「個人資料保護法」規定或因天災、事變或其他不可抗力所致者，致您的個人資料被竊取、洩漏、竄改、遭其他侵害者，本單位將於查明後以電話、信函、電子郵件或網站公告等方法，擇適當方式通知您。
                  </li>
                </ul>
                <h4>四、 同意書之效力</h4>
                <ol>
                  <li>
                    當您按下「提交」(即【資料送出按鈕】)表示您已簽署本同意書時，即表示您已閱讀、瞭解並同意本同意書之所有內容，您如違反下列條款時，本單位得隨時終止對您所提供之所有權益或服務。
                  </li>
                  <li>
                    本單位保留隨時修改本同意書規範之權利，本單位將於修改規範時，於本單位網頁(站)公告修改之事實，不另作個別通知。如果您不同意修改的內容，請勿繼續接受本服務。否則將視為您已同意並接受本同意書該等增訂或修改內容之拘束。
                  </li>
                  <li>
                    您自本同意書取得的任何建議或資訊，無論是書面或口頭形式，除非本同意書條款有明確規定，均不構成本同意條款以外之任何保證。
                  </li>
                </ol>
              </div>
              <div class="checkbox mb-2">
                <label> <input type="checkbox" required/> 本人同意</label>
              </div>
            </div>
          </div>
        </div>
        <div class="d-grid gap-2 col-1 mx-auto p-2">
          <button type="submit" class="btn btn-primary" value="提交">
            提交
          </button>
        </div>
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

