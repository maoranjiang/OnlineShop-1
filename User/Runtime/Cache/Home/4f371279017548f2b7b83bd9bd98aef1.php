<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>易买网</title>
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
		<h2>用户管理</h2>
		<div class="manage">
			<form id="regForm" method="post" action="/onlineshop1.0/index.php/Home/Index/UserInfoModifySave" onsubmit="return checkForm(this);">
				<table class="list">
					<tr>
						<td>姓名</td>
						<td><input class="text" type="text" id="name" name="name" onfocus="FocusItem(this)" /><span> </span></td>
					</tr>
					<tr>
						<td>性别</td>
						<td><input class="text" type="text" id="sex" name="sex" onfocus="FocusItem(this)"/><span> </span></td>
					</tr>
					<tr>
						<td>生日</td>
						<td><input class="text" type="text" id="birthday" name="birthday" onfocus="FocusItem(this)"/> <span></span></td>
					</tr>
					<tr>
						<td>手机</td>
						<td><input class="text" type="text" id="tel" name="tel" onfocus="FocusItem(this)"/><span> </span></td>
					</tr>
					<tr>
						<td>邮箱</td>
						<td><input class="text" type="text" id="email" name="email" onfocus="FocusItem(this)"/><span> </span></td>
					</tr>
					<tr>
						<td></td>
						<td><label class="ui-green"><input type="submit" name="submit" value="保存" /></label></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<div class="clear"></div>
</div>
</body>
</html>