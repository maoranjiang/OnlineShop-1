<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>易买网 - 个人中心</title>
	<link type="text/css" rel="stylesheet" href="/onlineshop1.0/Public/css/style.css" />
	<script type="text/javascript" src="/onlineshop1.0/Public/scripts/function.js"></script>
</head>
<body>
<div id="header" class="wrap">
	<div id="logo"><img src="../images/logo.gif" /></div>
	<div class="help"><a href="/onlineshop1.0/index.php/Home/Index/showLoginHome">返回首页</a></div>
</div>
<div id="main" class="wrap">
	<div id="menu-mng" class="lefter">
		<div class="box">
			<dl>
				<dt></dt>
				<dd><em><a href="/onlineshop1.0/index.php/Home/Index/showUserInfoModify">修改</a></em><a href="/onlineshop1.0/index.php/Home/Index/DisplayUserInfo">个人信息</a></dd>
				<dt></dt>
				<dd><a href="/onlineshop1.0/index.php/Home/Index/showUserBasket">购物车</a></dd>
				<dd><a href="/onlineshop1.0/index.php/Home/Index/showUserOrder">查看订单</a></dd>
				<dt></dt>
				<dd><em><a href="/onlineshop1.0/index.php/Home/Index/showUserAddressModify">修改</a></em><a href="/onlineshop1.0/index.php/Home/Index/showUserAddress">送货地址</a></dd>
				<dt></dt>
				<dd><a href="/onlineshop1.0/index.php/Home/Index/showUserPassword">密码修改</a></dd>
			</dl>
		</div>
	</div>
	<div class="main">
		<h2>个人中心</h2>
		<div id="welcome" class="manage">
			<div class="shadow">
				<div class="box">
					<table class="list">
						<tr>
							<td>送货地址</td>
							<td><?php echo ($_SESSION['address']); ?></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>