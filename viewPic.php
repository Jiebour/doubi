<?php 
$openID = $_GET["openID"];
$whichPic = $_GET["whichPic"];
$end = false;

if($whichPic >= 4){
	$end = true;
	$next1 = "img/done.png";
}
else{
	$end = false;
	$next1 = "img/next.png";
}

$url = "viewPic.php?openID=" . $openID . "&" . "whichPic=" . ($whichPic+1);
?>



<!DOCTYPE HTML>

<html>

<head>
	<meta http-equiv="Content-Type"  content="text/html;  charset=utf-8"  />
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
	<link href="css/db.css" rel="stylesheet">
	<script type="text/javascript" charset="utf-8" src="js/jquery.min.js"></script>
	<script type="text/javascript" charset="utf-8" src="js/jquery.raty.js"></script>

	<style>

html {
	height: 100%;
  background: url(img/bg.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

body{
	height:100%;
	min-height: 100%;
	padding: 0;
	margin: 0;
	color:#787878;
}


/*图片预览区域CSS*/


#preview {
	width: 100%;
	background: url(img/viewPicBg.png);
    /*background-size: 289px 344px;*/
    background-size: 100% 100%;
    background-repeat: no-repeat;
    text-align: center;
}

#preview2 {
	margin-right: auto;
	margin-left: auto;
	display: block;
}

/*隐藏file input*/
		#file {
			display: none;
		}

		.imgFit{
			max-width: 100%;
    		max-height: 100%;
		}


input{
align-items: flex-start;
text-align: center;
cursor: default;
color: buttontext;
padding: 0px;
border: 0px !important;
}

button{
padding: 0px;
border: 0px !important;
box-sizing:initial;
}

.uploadBtn{
	margin-top: 20px;
	width: 100%;
	text-align: center;
	height: 50px;
	line-height: 50px;
	background: #ccc;
	border:1px solid #aaaaaa;
}

.dian30{
	width: 30%;
	float: left;
	height: 20px;
}
.dian10{
	width: 10%;
	float: left;
	height: 20px;
	background: #
}

.dot{
	width: 8px;
	height:8px;
	border-radius: 50%;
	border: 1px solid #000000;

	display: block;
	margin-right: auto;
	margin-left: auto;
}

#wrap {display:block;
		right:8px !important;
		width:60px;
		height: 60px;
		border-radius: 50%;

		line-height:60px;
		position:fixed;
		border:1px solid #fff;
		text-align:center;
		color:#fff; 
		background:#bbb;}

#content {
	width: 100%;
	text-align: center;
}

#done{
	color: white; 
	opacity: 0.9; 
	background: #aaaaaa;
	position: fixed;
	top:0;
    width: 100%;
    display: none;
}

.helper {
    display: inline-block;
    height: 100%;
    vertical-align: middle;
}

#comment{
	width: 70%;
	margin-right: auto;
	margin-left: auto;
	display: block;
}

</style>

</head>

<body onload="shit();">



<div id="done">
	<img id="meToo" src="img/meToo.png" style="width:200px; margin-bottom:16px;" class="imgCenter">
	<img src="img/downloadApp.png" style="width:200px;" class="imgCenter">
</div>





<div id="mainStuff">

<div style="margin-top:14px;">
	<div class="dian30"></div>
	<div class="dian10">
		<div class="dot" id="dot1"></div>
	</div>
	<div class="dian10">
		<div class="dot" id="dot2"></div>
	</div>
	<div class="dian10">
		<div class="dot" id="dot3"></div>
	</div>
	<div class="dian10">
		<div class="dot" id="dot4"></div>
	</div>
	<div class="dian30"></div>
	<div style="clear:both;"></div>
</div>

<!--
<p style="text-align:center; margin:0;">2014<br/>最壕的一天</p>
-->






<div style="width:90%; margin-left:5%; margin-right:5%;">

	<div>

<!-- 图片预览区域 -->
		<div id="preview">
			<div id="paddingDiv"><br>2014最壕的一天</div>
			<div id="preview2">
				<img id="mainImg" src="<?php echo "upload/" . $whichPic . ".jpg"; ?>" class="imgFit" />
			</div>
		</div>
		<!--下面这个div放的是评论的标签图片-->
		<div id="comment" style="display:none;">
			<img class="imgRes" src="img/label.png">
		</div>

		<!--This is the "next" button(in image) should be restyle-->
		<img id="next1" src="img/next.png" style="float:right; width:65px; height:65px;" onClick="next();">

	<div style="clear:both;"></div>
	</div><!-- /content -->


</div><!-- /page -->


<!--星星-->
<div id="content" style="margin-top:-40px; display:none;">
	<div id="click"></div>
</div>	



</div><!--mainStuff-->



<!--底部-->
<div style="height:50px;"></div>
<div id="footer" style="height:50px;">
  <img src="img/bottom.png" class="img-responsive imgCenter">    
</div>


		<script type="text/javascript">
			$(function() {
				$('#click').raty({
					click: function(score, evt) {
						//alert('ID: ' + $(this).attr('id') + '\nscore: ' + score + '\nevent: ' + evt);
						$('#comment').css({"position":"fixed", "top":preBottom, "display":"block", "z-index":"9"});
					}
				});
			});

			var preBottom = 0;
			function shit(){

			preBottom = $('#preview').offset().top + $('#preview').height() - 65;
			alert(preBottom);
			$('#click img').css({"width":"15%", "margin":"0 2% 0 2%"});
			$('#content').css({"display":"block"});
			
		}
		</script>



<script type="text/javascript">

$(document).ready(function(){

	//alert($(window).height());
	//alert($(window).width());
	//alert(document.body.clientWidth);
	//alert(document.body.clientHeight + " " + $('#footer').height());
	//alert(document.body.clientHeight);

	$('#done').css("height", (document.body.clientHeight - $('#footer').height()) + "px");
	$('#meToo').css("margin-top", $(window).height()*0.41 + "px");
	
	var preW = $('#preview').width();
	$('#preview').height(preW*1.2);
	$('#preview2').width(preW*0.8);
	$('#preview2').height(preW*0.8);
	$('#paddingDiv').css("height", preW*0.2);



	$('#next1').css({"position":"relative", "top":"-60px"});




	$("#dot" + "<?php echo $whichPic; ?>").css("background", "#000000");

	var end = "<?php echo $end; ?>";
	//alert(done);

	$("#next1").attr("src", "<?php echo $next1; ?>");
});

function next()
{

window.location.href="<?php echo $url?>"; 


/*
    $('#mainStuff').css('z-index', '-1');
    $('#done').css('display','block');
    $('#done').css('z-index','1');
    */

}
</script>


</body>

</html>
