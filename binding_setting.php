<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
.title_setting {
	text-align: left;
	margin-left: 1050px;
}
</style>
<form name="form" method="post" action="binding.php">
<style>

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit]:hover {
	box-sizing: content-box;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 15px;
	text-align: center;
	
}

.col-3 {
    float: left;
    width: 3%;
    margin-top: 6px;
}
.col-5{
	float: left;
	width: 5%;
	margin-top: 2px;
	margin-left: 940px;
	text-align: center;
}
.col-5-text{
	float:left;
	width: 5%;
	margin-top:14px;
	margin-left:0px;
}

.col-10 {
    float: left;
    width: 12%;
    margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
    content: "";
    display: table;
    clear: both;
}
.button {
    border: none;
    color: white;
    text-align: right;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
}
.button2 {
    border: none;
    color: white;
    text-align:left;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
	
}
.sent{
	margin-left:105px;
}


/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
    .col-3, .col-10, input[type=submit] {
        width: 100%;
        margin-top: 0;
    }
}
.title1 {
	text-align: left;
	margin-left: 1000px;
}
</style>


<h2 class="title_setting">錢包設定</h2>

<div class="container">
	<div class="row">
      <div class="col-5">
      	<label for="lname"><font size="3 px">請輸入密碼：</font></label>
      </div>
      <div class="col-5-text">
        <input type="password" id="pw" name="pw">
      </div>
    </div>
	<div class="row">
    	<div class="col-5">
    	  <label for="lname"><font size="3 px">請輸入錢包：</font></label>   	  
      </div>
      <div class="col-5-text">
      <input type="text" id="wallet" name="wallet">
	</div>	
</div>
<div class="sent">
<input type="submit" name="button" value="確定" />
</div>
<!--<input type="button" id="send" value="送出修改內容"-->
</form>