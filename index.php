<?php
require_once 'include.php';
?>
<!DOCTYPE html>
<html lang="zh-CN" ng-app="indexApp">
<head>
	<meta charset="UTF-8">
	<title>带你飞上海网-主页</title>
	<link rel="stylesheet" type="text/css" href="style/reset.css">
	<link rel="stylesheet" type="text/css" href="style/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="style/common.css">
	<link rel="stylesheet" type="text/css" href="style/index.css">
</head>
<body>
	<header>
		<div class="login-part" ng-controller="doLogin">
			<ul ng-hide="isLogined">
				<li><a href="javascript:;" ng-click="">服务中心</a></li>
				<li><a href="javascript:;" ng-click="login()">登录</a></li>
				<li><a href="javascript:;" ng-click="register()">注册</a></li>
			</ul>
			<ul ng-show="isLogined">
				<li><a href="javascript:;" ng-click="exit()">退出</a></li>
				<li><a href="javascript:;" ng-click="">服务中心</a></li>
				<li><a href="javascript:;">Welcome! {{userName}}</a></li>
			</ul>
		</div>
		<div class="search-part">
			<div class="logo"><a href="#"><img src="images/logo.jpg"></a></div>
			<div class="search">
				<div class="search-bar">
					<input type="text" class="" placeholder="搜索关键字">
					<i class="search-btn fa fa-search"></i>
				</div>
			</div>
		</div>
		<nav class="nav-part">
			<ul>
				<li><a href="javascript:;" class="main">全部分类</a></li>
				<li><a href="" class="tab on">首页</a></li>
				<li><a href="" class="tab">推荐</a></li>
				<li><a href="" class="tab">游记</a></li>
				<li><a href="" class="tab">论坛</a></li>
			</ul>
		</nav>
	</header>
	<div class="container clearfix">
		<aside class="clearfix">
			<nav>
				<dl>
					<dt><a href="list.html">景点</a></dt>
					<dd><a href="list.html" class="hot">热门景点</a></dd>
					<dd><a href="list.html">冷门景点</a></dd>
					<i class="fa fa-angle-right"></i>
					<span></span>
					<div class="detail">
						<h3>景点频道</h3>
						<ul>
							<li><a href="list.html">自然风光</a></li>
							<li><a href="list.html">展馆展览</a></li>
							<li><a href="list.html">游乐园</a></li>
							<li><a href="list.html">特色街区</a></li>
							<li><a href="list.html">古镇</a></li>
							<li><a href="list.html">影视基地</a></li>
						</ul>
					</div>
				</dl>
				<dl>
					<dt><a href="list.html">美食</a></dt>
					<dd><a href="list.html">本帮菜</a></dd>
					<dd><a href="list.html" class="hot">特色小吃</a></dd>
					<i class="fa fa-angle-right"></i>
					<div class="detail">
						<h3>美食频道</h3>
						<ul>
							<li><a href="list.html">火锅</a></li>
							<li><a href="list.html">本帮菜</a></li>
							<li><a href="list.html">面包甜点</a></li>
							<li><a href="list.html">咖啡厅</a></li>
							<li><a href="list.html">自助餐</a></li>
							<li><a href="list.html">快餐</a></li>
							<li><a href="list.html">韩国料理</a></li>
							<li><a href="list.html">西餐</a></li>
							<li><a href="list.html">烧烤</a></li>
							<li><a href="list.html">台湾菜</a></li>
							<li><a href="list.html">川菜</a></li>
							<li><a href="list.html">新疆菜</a></li>
							<li><a href="list.html">清真菜</a></li>
						</ul>
					</div>
				</dl>
				<dl>
					<dt><a href="list.html">住宿</a></dt>
					<dd><a href="list.html">豪华酒店</a></dd>
					<dd><a href="list.html" class="hot">快捷酒店</a></dd>
					<i class="fa fa-angle-right"></i>
					<div class="detail">
						<h3>住宿频道</h3>
						<ul>
							<li><a href="list.html">经济型</a></li>
							<li><a href="list.html">五星级豪华型</a></li>
							<li><a href="list.html">四星级高档型</a></li>
							<li><a href="list.html">三星级舒适型</a></li>
							<li><a href="list.html">青年旅社</a></li>
							<li><a href="list.html">公寓式酒店</a></li>
							<li><a href="list.html">度假村</a></li>
						</ul>
					</div>
				</dl>
				<dl>
					<dt><a href="list.html">购物</a></dt>
					<dd><a href="list.html" class="hot">购物中心</a></dd>
					<dd><a href="list.html">购物街</a></dd>
					<i class="fa fa-angle-right"></i>
					<div class="detail">
						<h3>购物频道</h3>
						<ul>
							<li><a href="list.html">服饰鞋包</a></li>
							<li><a href="list.html">超市便利店</a></li>
							<li><a href="list.html">综合商场</a></li>
							<li><a href="list.html">药店</a></li>
							<li><a href="list.html">化妆品</a></li>
							<li><a href="list.html">珠宝</a></li>
						</ul>
					</div>
				</dl>
				<dl>
					<dt><a href="list.html">休闲娱乐</a></dt>
					<dd><a href="list.html" class="hot">KTV</a></dd>
					<dd><a href="list.html">洗浴</a></dd>
					<i class="fa fa-angle-right"></i>
					<div class="detail">
						<h3>休闲娱乐频道</h3>
						<ul>
							<li><a href="list.html">KTV</a></li>
							<li><a href="list.html">足疗按摩</a></li>
							<li><a href="list.html">私人影院</a></li>
							<li><a href="list.html">洗浴</a></li>
							<li><a href="list.html">酒吧</a></li>
							<li><a href="list.html">网吧网咖</a></li>
							<li><a href="list.html">DIY手工坊</a></li>
							<li><a href="list.html">密室</a></li>
							<li><a href="list.html">轰趴馆</a></li>
							<li><a href="list.html">桌游馆</a></li>
							<li><a href="list.html">茶馆</a></li>
							<li><a href="list.html">真人CS</a></li>
						</ul>
					</div>
				</dl>
			</nav>
			<img src="images/aside.jpg">
		</aside>
		<article class="main">
			<article class="center">
				<section class="slide">
					<ul class="slide-box">
						<li><img src="images/slide1.jpg"></li>
						<li><img src="images/slide2.png"></li>
						<li><img src="images/slide3.jpg"></li>
					</ul>
					<ul class="slide-btns">
						<li><a href="javascript:;" class="on">1</a></li>
						<li><a href="javascript:;">2</a></li>
						<li><a href="javascript:;">3</a></li>
					</ul>
				</section>
				<section class="hot-nav">
					<h2>热门导航<a href="">更多</a></h2>
					<article>
						<dl class="clearfix">
							<dt>分类</dt>
							<dd><a href="list.html">本帮菜</a></dd>
							<dd><a href="list.html">火锅</a></dd>
							<dd><a href="list.html">小吃快餐</a></dd>
							<dd><a href="list.html">日本菜</a></dd>
							<dd><a href="list.html">西餐</a></dd>
							<dd><a href="list.html">自助餐</a></dd>
							<dd><a href="list.html">川菜</a></dd>
							<dd><a href="list.html">下午茶</a></dd>
							<dd><a href="list.html">人文景点</a></dd>
							<dd><a href="list.html">自然景点</a></dd>
							<dd><a href="list.html">游乐园</a></dd>
							<dd><a href="list.html">酒店</a></dd>
						</dl>
						<dl class="clearfix">
							<ddclass="onerow">排行榜</dt>
							<dd><a href="list.html">热门景点</a></dd>
							<dd><a href="list.html">热门餐厅</a></dd>
							<dd><a href="list.html">热门购物</a></dd>
							<dd><a href="list.html">热门休闲</a></dd>
						</dl>
					</article>
				</section>
				<section class="good-topics">
					<h2>精选内容<a href="">更多</a></h2>
					<article class="clearfix">
						<div class="topic-img"><img src="images/topic.png"></div>
						<div class="topic-list">
							<h2>兔斯基、龙猫、迪士尼都来开店啦</h2>
							<ul>
								<li><a href="">[小编推荐] 魔都这些撩妹的甜品店</a></li>
								<li><a href="">[榜单精选] 韩国排队餐厅上海都能吃到</a></li>
								<li><a href="">[有料放送] 小白领，活在买买买里</a></li>
								<li><a href="">[社区热帖] 开启魔都春游模式</a></li>
							</ul>
						</div>
					</article>
				</section>
				<section class="new-comment">
					<h2>最新点评<a href="">更多</a></h2>
					<article>
						<ul>
							<li class="floor clearfix">
								<a href=""><img src="images/icon.jpg"></a>
								<div class="content">
									<h3><a href="">Yuki宝oO</a> @ <a href="">丸龟制面(徐汇星游城店)</a><span>16-04-09</span></h3>
									<div class="comment">
										<span class="star-mark star3"></span>
										<dl>
											<dt>口味:</dt>
											<dd>3</dd>
											<dt>环境:</dt>
											<dd>3</dd>
											<dt>服务:</dt>
											<dd>3</dd>
										</dl>
									</div>
									<p>真的不错啊！</p>
								</div>
							</li>
							<li class="floor clearfix">
								<a href=""><img src="images/icon.jpg"></a>
								<div class="content">
									<h3><a href="">Yuki宝oO</a> @ <a href="">丸龟制面(徐汇星游城店)</a><span>16-04-09</span></h3>
									<div class="comment">
										<span class="star-mark star3"></span>
										<dl>
											<dt>口味:</dt>
											<dd>3</dd>
											<dt>环境:</dt>
											<dd>3</dd>
											<dt>服务:</dt>
											<dd>3</dd>
										</dl>
									</div>
									<p>真的不错啊！</p>
								</div>
							</li>
							<li class="floor clearfix">
								<a href=""><img src="images/icon.jpg"></a>
								<div class="content">
									<h3><a href="">Yuki宝oO</a> @ <a href="">丸龟制面(徐汇星游城店)</a><span>16-04-09</span></h3>
									<div class="comment">
										<span class="star-mark star3"></span>
										<dl>
											<dt>口味:</dt>
											<dd>3</dd>
											<dt>环境:</dt>
											<dd>3</dd>
											<dt>服务:</dt>
											<dd>3</dd>
										</dl>
									</div>
									<p>真的不错啊！</p>
								</div>
							</li>
						</ul>
					</article>
				</section>
			</article>
			<article class="right">
				<section class="rank-views">
					<ul>
						<h3>热门景点</h3>
						<li>
							<a href="">
								<img src="images/yuyuan.jpg">
								<div class="resume">
									<h4>豫园</h4>
									<span class="star-mark star5">(1121)</span>
								</div>
							</a>
						</li>
						<li>
							<a href="">
								<img src="images/dongfangmingzhu.jpg">
								<div class="resume">
									<h4>东方明珠</h4>
									<span class="star-mark star5">(999)</span>
								</div>
							</a>
						</li>
						<li>
							<a href="">
								<img src="images/huanlegu.jpg">
								<div class="resume">
									<h4>欢乐谷</h4>
									<span class="star-mark star45">(778)</span>
								</div>
							</a>
						</li>
						<li>
							<a href="">
								<img src="images/dongtan.jpg">
								<div class="resume">
									<h4>崇明东滩湿地公园</h4>
									<span class="star-mark star45">(778)</span>
								</div>
							</a>
						</li>
						<li>
							<a href="">
								<img src="images/nanjinglu.jpg">
								<div class="resume">
									<h4>南京路步行街</h4>
									<span class="star-mark star4">(678)</span>
								</div>
							</a>
						</li>
						<a href="">>>>更多</a>
					</ul>
				</section>
				<section class="rank-restaurants">
					<ul>
						<h3>热门餐厅</h3>
						<li>
							<a href="">
								<img src="images/yuyuan.jpg">
								<div class="resume">
									<h4>豫园</h4>
									<span class="star-mark star5">(1121)</span>
								</div>
							</a>
						</li>
						<li>
							<a href="">
								<img src="images/dongfangmingzhu.jpg">
								<div class="resume">
									<h4>东方明珠</h4>
									<span class="star-mark star5">(999)</span>
								</div>
							</a>
						</li>
						<li>
							<a href="">
								<img src="images/huanlegu.jpg">
								<div class="resume">
									<h4>欢乐谷</h4>
									<span class="star-mark star45">(778)</span>
								</div>
							</a>
						</li>
						<li>
							<a href="">
								<img src="images/dongtan.jpg">
								<div class="resume">
									<h4>崇明东滩湿地公园</h4>
									<span class="star-mark star45">(778)</span>
								</div>
							</a>
						</li>
						<li>
							<a href="">
								<img src="images/nanjinglu.jpg">
								<div class="resume">
									<h4>南京路步行街</h4>
									<span class="star-mark star4">(678)</span>
								</div>
							</a>
						</li>
						<a href="">>>>更多</a>
					</ul>
				</section>
			</article>
		</article>
	</div>
	<footer>
		<div>@fantasydl-s-granduation-project</div>
	</footer>
	<script type="text/javascript" src="http://apps.bdimg.com/libs/angular.js/1.4.6/angular.min.js"></script>
	<script type="text/javascript" src="script/app.js"></script>
	<script type="text/javascript" src="script/login.js"></script>
</body>
</html>