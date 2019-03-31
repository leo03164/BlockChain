<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="mystyle.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="http://static.runoob.com/assets/js/jquery-treeview/jquery.treeview.css" />
<link rel="stylesheet" href="http://static.runoob.com/assets/js/jquery-treeview/screen.css" />
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<!--<script src="http://static.runoob.com/assets/js/jquery-treeview/jquery.cookie.js"></script> -->
<script src="http://static.runoob.com/assets/js/jquery-treeview/jquery.treeview.js" type="text/javascript"></script>

<!-- treeView -->
<script type="text/javascript">
      $(document).ready(function(){
            $("#browser").treeview({
                  toggle: function() {
                        console.log("%s was toggled.", $(this).find(">span").text());
                  }
            });

            $("#add").click(function() {
                  var branches = $("<li><span class='folder'>New Sublist</span><ul>" +
                        "<li><span class='file'>Item1</span></li>" +
                        "<li><span class='file'>Item2</span></li></ul></li>").appendTo("#browser");
                  $("#browser").treeview({
                        add: branches
                  });
            });
      });
</script>



<!-- bid -->
<script>
        function vote() {
            var money = prompt('請輸入投標金額:');

            let tokenAddress = "0x50C01fc9000829C26ABF0E0075C5E4bBD75feBc5";
            let toAddress = "0xb20cB125D9f1e0A8bfEf9d91259c4dbe769B987d";
            let decimals = web3.toBigNumber(0);
            // how much Learning coin do you want to cost?
            let amount = web3.toBigNumber(money);
            let minABI = [
            // transfer
            {
                "constant": false,
                "inputs": [
                {
                    "name": "_to",
                    "type": "address"
                },
                {
                    "name": "_value",
                    "type": "uint256"
                }
                ],
                "name": "transfer",
                "outputs": [
                {
                    "name": "",
                    "type": "bool"
                }
                ],
                "type": "function"
            }
            ];
            // Get ERC20 Token contract instance
            let contract = web3.eth.contract(minABI).at(tokenAddress);
            // calculate ERC20 token amount
            let value = amount.times(web3.toBigNumber(10).pow(decimals));
            // call transfer function
            contract.transfer(toAddress, value, (error, txHash) => {
            // it returns tx hash because sending tx
            console.log(txHash);
            });
      }

      var dialog;
      window.onload=function(){
            dialog=document.getElementById("dialog");
      };

      //開課查詢
      function showDialog(){
            dialog.style.display="block";
      }
      function closeDialog(){
            dialog.style.display="none";
      } 
</script>

<style >
      table{
            border:5px#7FFFD4 dashed ;
            padding:10px;
            width: 100%;
      }
      .dialog{
            position:fixed;top:180px;left:50%;transform:translate(-100px,0px); width:350px;
            border:1px solid #770077 ;
            background-color:#AAFFEE;
            box-shadow:0px 0px 20px #FFFF33;
            display:none;
            padding:30px;
      }

      .dialog>.close{
            position:absolute; top:0px ;right:5px ; cursor:pointer;
      }
</style>

</head>


<body>
<p id="demo"></p>
<div class="container">
  <div class="row justify-content-md-center">
    <div class="col col-lg-2"></div>
    <div class="col-md-auto">
      <font face="標楷體" size="10px" color="黑色"> 校園選課系統</font>      
    </div>
    <div class="col col-lg-2"></div>
  </div>
</div>

<?php
include("mysql_connect.inc.php");

//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
if($_SESSION['username'] != null){

        $id = $_SESSION['username'];
        //將資料庫裡的所有會員資料顯示在畫面上
        $sql = "SELECT * FROM member where username ='$id'";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_row($result))
        {            
            echo "學號：$row[1]<br>";
            echo "電話：$row[3]<br>";
            if($row[4] == Null){                
                echo '<a href="binding_setting.php">學分幣位址綁定</a><br>';
            }else{
                echo "錢包：$row[4]<br>";
            }
        }
}else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
}
echo '<a href="logout.php">登出</a><br>';
?>

<div class="row ">
  <div class="col-sm-2">
    <table>
      <tr><td>
            <ul id="browser" class="filetree treeview-famfamfam">
                  <li class="closed"><span class="folder">理工學院</span>
                        <ul>
                            <li><span class="file"><a href="javascript:departmentSelect('E_U');">學士班</a></span></li>
                              <li class="closed"><span class="folder">應用數學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('AM_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('AM_UMA');">數學科學組(學士班)</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('AM_UST');">統計科學組(學士班)</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('AM_M');">碩士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('AM_MST');">統計碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">化學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('CHEML_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('CHEML_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                               <li class="closed"><span class="folder">生命科學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('LF_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('LF_M');">生物技術碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">物理系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('PHY_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('PHY_UPH');">物理組(學士班)</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('PHY_UN');">奈米與光電科學組(學士班)</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('PHY_MN');">應用物理碩士班一般組</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('PHY_MI');">應用物理碩士班國際組</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">資訊工程系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('CSIE_UN');">資工組(學士班)</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('CSIE_UI');">國際組(學士班)</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('CSIE_MN');">資工組(碩士班)</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('CSIE_MI');">國際組(碩士班)</a></span></li>
                                    </ul>
                              </li>
                               <li class="closed"><span class="folder">材料科學與工程學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('MS_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('MS_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">電機工程學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('EE_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('EE_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">光電工程學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('OE_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('OE_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                        </ul>
                  </li>
                  <li class="closed"><span class="folder">管理學院</span>
                        <ul>
                              <li><span class="file"><a href="javascript:departmentSelect('MSF_U');">學士班</a></span></li>
                              <li class="closed"><span class="folder">管理學院管理科學與財金國際學士學位學程</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('MA_U');">學士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">企業管理學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('BM_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('BM_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                               <li class="closed"><span class="folder">國際企業學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('IB_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('IB_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">會計學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('ACCT_U');">學士班</a></span></li>
                                    </ul>
                              </li>
                               <li class="closed"><span class="folder">會計與財務碩士學位學程</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('ACCT_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">資訊管理學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('IM_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('IM_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">財務金融學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('FIN_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('FIN_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">運籌管理研究所</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('GSL_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">觀光暨休閒遊憩學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('TRLS_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('TRLS_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                        </ul>
                  </li>
                  <li class="closed"><span class="folder">人文社會科學學院</span>
                        <ul>
                               <li><span class="file"><a href="javascript:departmentSelect('HASS_U');">學士班</a></span></li>
                               <li class="closed"><span class="folder">華文文學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('SILII_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('SILII_M');">碩士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('SILII_MD');">創作組(碩士班)</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('SILII_MC');">文學暨文化研究組(碩士班)</a></span></li>
                                    </ul>
                              </li>
                               <li class="closed"><span class="folder">英美語文學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('EL_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('EL_MT');">英語教學組(碩士班)</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('EL_MM');">文學媒體組(碩士班)</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">歷史學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('HIST_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('HIST_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                               <li class="closed"><span class="folder">諮商與臨床心理學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('CP_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('CP_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">經濟學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('EC_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('EC_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">中國語文學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('CLL_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('CLL_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">臺灣文化學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('TS_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('TS_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">社會學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('SD_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('SD_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">公共行政學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('PA_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('PA_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">財經法律研究所</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('FEL_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">法律學士學位學程</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('UPOL_U');">學士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">法律學士學位學程原住民專班</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('UPIL_U');">學士班</a></span></li>
                                    </ul>
                              </li>
                        </ul>
                  </li>
                  <li class="closed"><span class="folder">原住民民族院</span>
                        <ul>
                              <li><span class="file"><a href="javascript:departmentSelect('CIS_U');">學士班</a></span></li>
                              <li class="closed"><span class="folder">族群關係與文化學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('ERC_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('ERC_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">民族語言與傳播學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('LCL_U');">學士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">民族事務與發展學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('IDSW_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('IDSW_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">民族社會工作學士學位學程</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('ISW_U');">學士班</a></span></li>
                                    </ul>
                              </li>
                        </ul>
                  </li>
                  <li class="closed"><span class="folder">藝術學院</span>
                        <ul>
                              <li><span class="file"><a href="javascript:departmentSelect('AD_U');">學士班</a></span></li>
                              <li class="closed"><span class="folder">藝術創意產業學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('ACI_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('ACI_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">音樂學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('MUS_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('MUS_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">藝術與設計學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('AD_UU');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('AD_MM');">碩士班</a></span></li>
                                    </ul>
                              </li>
                        </ul>
                  </li>
                  <li class="closed"><span class="folder">花師教育學院</span>
                        <ul>
                              <li><span class="file"><a href="javascript:departmentSelect('CE_U');">學士班</a></span></li>
                              <li class="closed"><span class="folder">幼兒教育學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('ECE_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('ECE_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">特殊教育學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('SPE_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('SPE_M');">身心障礙與輔助科技碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">教育行政與管理學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('EAM_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('EAM_M');">碩士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('EAM_MM');">學校行政碩士學位班(碩士班)</a></span></li>
                                    </ul>
                              </li>
                               <li class="closed"><span class="folder">教育與潛能開發學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('CDPD_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('CDPD_M');">教育碩士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('ME_M');">多元文化教育碩士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('SCE_M');">科學教育碩士班</a></span></li>
                                    </ul>
                              </li>
                              <li class="closed"><span class="folder">體育與運動科學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('PE_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('PE_M');">碩士班</a></span></li>                                          
                                    </ul>
                              </li>
                        </ul>
                  </li>
                  <li class="closed"><span class="folder">環境學院</span>
                        <ul>
                              <li><span class="file"><a href="javascript:departmentSelect('CES_U');">學士班</a></span></li>
                              <li class="closed"><span class="folder">自然資源與環境學系</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('NRE_U');">學士班</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('NRE_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                               <li class="closed"><span class="folder">人文與環境碩士學位學程</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('HES_M');">碩士班</a></span></li>
                                    </ul>
                              </li>
                        </ul>
                  </li>
                  <li class="closed"><span class="folder">海洋學院</span>
                        <ul>
                              <li><span class="file"><a href="javascript:departmentSelect('MBE_M');">海洋生物碩士班</a></span></li>
                        </ul>
                  </li>
                  <li class="closed"><span class="folder">師資培育中心</span>
                        <ul>
                              <li><span class="file"><a href="javascript:departmentSelect('TH_U');">小學教育(學士班)</a></span></li>
                              <li><span class="file"><a href="javascript:departmentSelect('EP_U');">中學教育(學士班)</a></span></li>
                              <li><span class="file"><a href="javascript:departmentSelect('ETH_U');">卓越儲備教師增能學程(學士班)</a></span></li>
                        </ul>
                  </li>
                  <li class="closed"><span class="folder">通識教育中心</span>
                        <ul>
                              <li class="closed"><span class="folder">校核心課程(新生)</span>
                                    <ul>
                                          <li><span class="file"><a href="javascript:departmentSelect('GC_U');">語文</a></span></li>
                                          <li><span class="file"><a href="javascript:departmentSelect('YY_U');">體育與軍訓</a></span></li>
                                    </ul>
                              </li>                              
                        </ul>
                  </li>
            </ul>
      </td></tr>
    </table>
  </div>
<div id = "test"></div>
<div class="col-sm-9">
  <input type="submit" name="print_pre-select" value="列印預排課表" >
  <input type="submit" name="print_formal-select" value="列印正式課表" >

  <table cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_grd_subjs" style="width:100%;border-collapse:collapse;">
    <tr><td colspan="14">
            <table  class="table table-bordered table-hover">
                  <th>課程編號</th>
                  <th>課程名稱</th>
                  <th>必選修　</th>
                  <th>教師　　</th>
                  <th>時間　　</th>
                  <th>教室　　</th>
                  <th>學分　　</th>
                  <th>限修人數</th>
                  <th>通識領域</th>
                  <th>備註　　</th>
            </table>
      </td></tr>      
  </table>
  <br>

  <table cellspacing="0" rules="all" border="1" id="ContentPlaceHolder1_grd_subjs" style="width:100%;border-collapse:collapse;">
    <tr>
      <td colspan="14">
          <button style="font-family:標楷體;background-color:#AAFFEE ;font-size:20pt; width:180px ; height:40px; color:  #00008B"  onclick="showDialog();">開放課程查詢</button>
                  <div id="dialog" class="dialog">
                        <div onclick="closeDialog();" class="close">X</div>
                              <div class="items">
                                    <form name="form1" method="post">
                                          <span id=""> 課程名稱:</span>
                                                <input name="Course_name" type="text" maxlength="64" id="Course_name"><br>
                                          <br>
                                          <span id=""> 授課教師:</span>
                                                <input name="Course_te" type="text" maxlength="64" id="Course_te"><br>
                                          <br>
                                          <span id=""> 上課時間:</span>
                                                <input name="Course_time" type="text" maxlength="24" id="Course_time"><br>
                                          <br>
                                          <span id=""> 上課教室:</span>
                                                <input name="Course_room" type="text" maxlength="24" id="Course_room"><br>
                                          <br>
                                          		<input name="department" type="hidden" maxlength="24" id="department"> <br>
                                                <input type="submit" name="submit" value="確定" id = "submit"><!--要靠右對齊-->                                    
                              </div>
                  </div>                  
<!---------------------------- 顯示所有資工系課程 ---------------------------->
      <table  class="table table-bordered table-hover" id = tb_body>
            <th>課程編號</th>
            <th>課程名稱</th>
            <th>必選修　</th>
            <th>教師　　</th>
            <th>時間　　</th>
            <th>教室　　</th>
            <th>學分　　</th>
            <th>限修人數</th>
            <th>通識領域</th>
            <th>備註　　</th>

<script>
function departmentSelect(name){
        var ini = document.getElementById('tb_body');
        ini.innerHTML = '';
        
        var URLs = "course.php";
        $.ajax({
        url:URLs,
        async: true,
        data:{'department':name},
        type:"POST",
        datatype:'JSON',

        success:function(msg){
          var data = JSON.parse(msg);        
          var str;          

          for(var i in data){
            
            str = "<tr><th>"+data[i].course_code+"</th>"+
              "<th>"+data[i].course_name+"</th>"+
              "<th>"+data[i].required_ornot+"</th>"+
              "<th>"+data[i].teacher+"</th>"+
              "<th>"+data[i].time+"</th>"+
              "<th>"+data[i].classroom+"</th>"+
              "<th>"+data[i].credit+"</th>"+
              "<th>"+data[i].max_student+"</th>"+
              "<th>"+data[i].field+"</th>"+
              "<th>"+data[i].PS+"</th></tr>";                  
              document.getElementById('tb_body').insertAdjacentHTML('beforeend',str);
              //console.log(str);
          }          

        },

        error:function(xhr,ajaxOptions,thrownError){
          alert(xhr.status);
          alert(thrownError);
        }
      });
      }  
</script>
</tr>
<?php
if(isset($_POST["Course_name"]) || isset($_POST["Course_te"]) || isset($_POST["Course_room"])){        
      searchCourse();
  }
  
  function searchCourse(){
      include("mysql_connect.inc.php");

      $nameTF = isset($_POST["Course_name"]);
      $teTF = isset($_POST["Course_te"]);
      $roomTF = isset($_POST["Course_room"]);
      $dpTF = isset($_POST["department"]);

      if($nameTF){
          $Course_name = $_POST["Course_name"]; 
      }
      if($teTF){
          $Course_te = $_POST["Course_te"];  
      }
      if($roomTF){
          $Course_room = $_POST["Course_room"];
      }
      if($dpTF){
          $department = $_POST["department"];
      }

      $sql_select = "SELECT * FROM course where course_name like '%$Course_name%' and teacher like '%$Course_te%' and  classroom like '%$Course_room%'";  
      
      //3.data 解析
      $result = mysqli_query($conn,$sql_select);
  
      while($row = mysqli_fetch_row($result)){   
          echo "<tr>";          
          echo "<th><a href='javascript:void(0);' onclick='vote()'>$row[0]</a></th>";  
          //echo "<th>$row[0] </th>";
          echo "<th>$row[1] </th>";
          echo "<th>$row[2] </th>";
          echo "<th>$row[3] </th>";
          echo "<th>$row[4] </th>";
          echo "<th>$row[5] </th>";
          echo "<th>$row[6] </th>";
          echo "<th>$row[7] </th>";
          echo "<th>$row[8] </th>";
          echo "<th>$row[9] </th>";
          echo "</td>";
          echo "</tr>"; 
      }

  }
?>

      </table>
     </td>
    </tr>    
    
</table>

</div>
</div>

</form>
</body>
</html>