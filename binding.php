<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");

$pw = $_POST['pw'];
$wallet = $_POST['wallet'];

?>

<?php
//紅色字體為判斷密碼是否填寫正確
if($_SESSION['username'] != null){
        $id = $_SESSION['username'];
        $sql = "SELECT * FROM member where username = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = @mysqli_fetch_row($result);
        
        //更新資料庫資料語法
        if($row[2] == $pw){
                $sql = "UPDATE member set wallet='$wallet' where username='$id'";
                if(mysqli_query($conn,$sql)){
                        echo '修改成功!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
                }else{
                        echo '修改失敗!';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
                }  
        }else{
                echo '修改失敗!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=member.php>';
        }
        
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.html>';
}
?>