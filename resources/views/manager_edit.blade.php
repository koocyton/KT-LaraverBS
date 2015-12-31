
				<div style="top:0px;position:relative;">
					<div style="padding:20px;">

					    <div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　权限管理 － <?php echo $manager->email;?></b>
									</td>
									<td class="ct-nav-right">
										<a href="javascript:;" style="margin-right:10px;">
											<button class="gray-btn" style="height:25px;line-height:25px;width:60px;">重置密码</button>
										</a>
									</td>
								</tr>
							</table>
						</div>

                        <div class="content-body radius-4 content-border" style="margin-top:20px;">
							<form action="/manager/update/<?php echo $manager->id;?>" method="post">
								<input type="hidden" name="_token" value="{{csrf_token()}}" />
								<div style="height:35px;line-height:35px;">　ID：<?php echo $manager->id;?></div>
								<div style="height:35px;line-height:35px;">　Email：<?php echo $manager->email;?></div>
								<div style="height:35px;line-height:35px;">　创建时间：<?php echo $manager->created_at;?></div>
								<div style="height:35px;line-height:35px;">　最近登录：<?php echo $manager->updated_at;?></div>
								<div class="input-box" style="height:35px;line-height:35px;">　设置密码：
									<div class="input-box" style="width:200px;position:relative;">
										<input type="text" class="text-input" name="password" value="********">
									</div>
									<div class="input-box">
										<button type="submit" style="margin-left:15px;width:80px;" class="submit-btn">更新密码</button>
									</div>
								</div>
							</form>
                        </div>

                        <div class="content-body" style="margin:20px 0 0 0;padding:10px 0 0 0">
							<b>配置权限</b>
                        </div>

                        <div class="content-body" style="margin-top:5px;padding:0;">
							<form action="/manager/update/<?php echo $manager->id;?>" method="post">
								<input type="hidden" name="_token" value="{{csrf_token()}}" />
								<div style="height:25px;padding:0 0 0 20px;"><b>主控</b></div>
									<div style="height:25px;padding:0 0 0 40px;"><label>添加广告 <input type="checkbox" name="limits[]" value="advert" <?php echo empty($privileges_checked["advert"]) ? "" : "checked";?>></label></div>
									<div style="height:25px;padding:0 0 0 40px;"><label>添加素材 <input type="checkbox" name="limits[]" value="resouse" <?php echo empty($privileges_checked["resouse"]) ? "" : "checked";?>></label></div>
									<div style="height:25px;padding:0 0 0 40px;"><label>添加联盟 <input type="checkbox" name="limits[]" value="union" <?php echo empty($privileges_checked["union"]) ? "" : "checked";?>></label></div>
									<div style="height:25px;padding:0 0 0 27px;">
										<span class="octicon" style="font-size:12px;width:10px;padding:0 0 3px 0">&#xf0a3;</span>
										数据统计
									</div>
										<div style="height:25px;padding:0 0 0 60px;"><label>数据简报 <input type="checkbox" name="limits[]" value="bulletin" <?php echo empty($privileges_checked["bulletin"]) ? "" : "checked";?>></label></div>
										<div style="height:25px;padding:0 0 0 60px;"><label>各项统计 <input type="checkbox" name="limits[]" value="count" <?php echo empty($privileges_checked["count"]) ? "" : "checked";?>></label></div>
										<div style="height:25px;padding:0 0 0 60px;"><label>优化分析 <input type="checkbox" name="limits[]" value="optimize" <?php echo empty($privileges_checked["optimize"]) ? "" : "checked";?>></label></div>
								<div style="height:25px;padding:0 0 0 20px;"><b>管理员</b></div>
									<div style="height:25px;padding:0 0 0 40px;"><label>操作日志 <input type="checkbox" name="limits[]" value="log" <?php echo empty($privileges_checked["log"]) ? "" : "checked";?>></label></div>
									<div style="height:25px;padding:0 0 0 40px;"><label>权限管理 <input type="checkbox" name="limits[]" value="manager" <?php echo empty($privileges_checked["manager"]) ? "" : "checked";?>></label></div>
								<div style="height:25px;padding:0 0 0 20px;">
									<button button-class="submit-btn" type="submit" class="submit-btn">更新权限</button>
								</div>
							</form>
						</div>

                    </div>
                </div>
