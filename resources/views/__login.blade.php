<!DOCTYPE HTML>
<html>
  <title>用户登录</title>
  @include('__header')
  <body>
	<table class="body-table" style="background:rgba(0,0,0,0) url(/css/<?php echo $locale; ?>_bg.jpg) no-repeat scroll 0 0 / cover;">
      <tr>
		<td class="nav-left">
		  <div class="nav-item dropdown-container" style="margin-left:21px;">
			<a href="javascript:;" pushstate="no" class="nav-item bold-medium" style="height:40px;line-height:40px;">
			  <?php echo Lang::get('login.Language');?>：<?php echo Lang::get('login.Location');?> &nbsp;
			  <span class="octicon" style="font-size:13px;">&#xf0a3;</span>
			</a>
			<div class="pop-layout" style="top:38px;left:-7px;">
			  <b class="angle-up" style="left:32%;top:-5px;"></b>
			  <div class="content-board radius-4 shadow-3">
				<div class="dropdown-menu" style="height:85px;width:204px;">
				  <ul>
					<li><a class="radius-3" native="yes" href="?locale=cn">简体中文</a></li>
					<li><a class="radius-3" native="yes" href="?locale=tw">繁體中文</a></li>
					<li><a class="radius-3" native="yes" href="?locale=kr">한국어</a></li>
					<li><a class="radius-3" native="yes" href="?locale=jp">日本語</a></li>
					<li><a class="radius-3" native="yes" href="?locale=en">English</a></li>
				  </ul>
				</div>
			  </div>
			</div>
		  </div>
		</td>
		<td class="nav-right"></td>
      </tr>
      <tr>
		<td class="body-right" colspan="2">
		  <div class="content-board radius-4 login-form" style="position:absolute;left:15%;top:50%;">
			<!-- Login Form [begin] //-->
			<form action="/login/signin" method="post">
			<input type="hidden" name="_token" value="{{csrf_token()}}" />
			  <div style="width:265px;position:relative;">
				<dl>
				  <dd>
					<input type="text" class="text-input" maxlength="50" name="account" validation="/email:请填写邮箱账号/" placeholder="请填写邮箱账号" value="" />
				  </dd>
				</dl>
			  </div>
			  <table style="margin:6px 0;">
				<tbody>
				  <tr>
					<td style="width:99%;">
					  <div style="width:187px;position:relative;">
						<dl>
						  <dd>
							<input type="password" class="text-input" maxlength="50" name="password" validation="/!empty:请输入密码/" placeholder="请输入密码" value="" />
						  </dd>
						</dl>
					  </div>
					</td><td style="width:1%;">
					  <div>
						<button type="submit" class="disable-btn" style="width:70px;"><?php echo Lang::get('login.Login');?></button>
					  </div>
					</td>
				  </tr>
				</tbody>
			  </table>
			  <div style="height:22px;line-height:22px;">
				<label style="color:#8899a6">
				  <input type="checkbox" name="rember" value="1">
				  <span><?php echo Lang::get('login.Remember me');?></span>
				</label>
				<span class="separator">·</span>
				<span><a href="javascript:$.KTAnchor.showSlidMessage('send mail to koocyton(AT)gmail.com');" native="yes" style="color:#0084b4"><?php echo Lang::get('login.Forgot password');?></a></span>
			  </div>
			</form>
			<!-- Login Form [End] //-->
		  </div>
		</td>
      </tr>
    </table>
  </body>
</html>
