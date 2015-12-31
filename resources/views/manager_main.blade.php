
				<div style="top:0px;position:relative;">
					<div style="padding:20px;">

					    <div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　权限管理</b>
									</td>
									<td class="ct-nav-right">
										<div class="ct-nav-create dropdown-container" style="margin-right:15px;">
											<a href="javascript:;" title="新增管理员" style="display:inline-block;">
												<span class="octicon" style="font-size:13px;">&#xf05d;</span>
												<span class="octicon" style="font-size:25px;">&#xf018;</span>
											</a>
											<div class="pop-layout" style="top:38px;left:-60px;display:none;">
												<b class="angle-up" style="left:67px;top:-5px;"></b>
												<div class="content-board radius-4 shadow-3" style="width:278px;padding:20px;">
													<form action="/manager/create" method="post">
													<input type="hidden" name="_token" value="{{csrf_token()}}" />
														<div style="margin-top:10px;">
															<div class="input-box" style="width:55px;">
																<span>邮箱</span>
															</div>
															<div class="input-box" style="width:205px;">
																<dl>
																	<dd>
																		<input type="text" class="text-input" name="email" placeholder="请填写一个邮箱" validation="/email:请填写合法的邮箱/" />
																	</dd>
																</dl>
															</div>
														</div>
														<div style="margin-top:10px;">
															<div class="input-box" style="width:55px;">
																<span>密码</span>
															</div>
															<div class="input-box" style="width:205px;">
																<dl>
																	<dd>
																		<input type="text" class="text-input" name="password" placeholder="输入 8~16 位长数字和字母" validation="/password:输入 8~16 位长数字和字母/" />
																	</dd>
																</dl>
															</div>
														</div>
														<div style="margin-top:10px;text-align:center;">
															<button type="submit" class="disable-btn">添加，并设置权限</button>
														</div>
												</form>
											  </div>
											</div>
										</div>
			                            <div class="ct-nav-search">
			                                <form action="/manager" method="get">
			                                    <div class="input-box" style="width:200px;">
			                                        <dl>
			                                            <dd>
			                                                <input type="text" class="text-input" name="q" validation="/!empty:请填写搜索条件/" placeholder="请填写搜索条件" value="<?php echo $q;?>" />
			                                            </dd>
			                                        </dl>
			                                    </div>
			                                    <div class="ct-search-icon">
			                                        <span style="font-family:octicons;font-size:23px;">&#xf02e;</span>
			                                    </div>
			                                </form>
			                            </div>
									</td>
								</tr>
							</table>
						</div>

                        <div style="margin-top:20px;">
                            <table class="list-table">
    							<thead>
    								<tr>
										<td style="width:80px;">ID</td>
										<td style="width:160px;">Email</td>
										<td style="width:130px;">最近登录</td>
										<td style="text-align:left;">&nbsp;权限</td>
									</tr>
    							</thead>
    							<tbody>
                                    <?php foreach($managers as $manager) {?>
                                    <tr>
										<td><?php echo $manager->id?></td>
										<td><a class="normal-anchor" href="/manager/edit/<?php echo $manager->id?>"><?php echo $manager->email?></a></td>
										<td title="<?php echo $manager->updated_at?>">
										<?php
										if ($manager->updated_at=="0000-00-00 00:00:00") {
											echo "<span style=\"color:#bbb;\">从未登录</span>";
										}
										else {
											$ut = strtotime($manager->updated_at);
											$nt = time();
											$dt = $nt - $ut;
											// 一个小时内，显示多少分钟前
											if ($dt<3600) {
												echo "<span style=\"color:#555;\">".floor($dt/60)." 分钟前</span>";
											}
											// 一个天内，显示多少小时前
											else if ($dt<86400) {
												echo "<span style=\"color:#555;\">".floor($dt/3600)." 小时前</span>";
											}
											// 一周内，显示多少天前
											else if ($dt<603800) {
												echo "<span style=\"color:#555;\">".floor($dt/86400)." 天前</span>";
											}
											// 一月内，显示多少周前
											else if ($dt<2678400) {
												echo "<span style=\"color:#555;\">".floor($dt/603800)." 周前</span>";
											}
											// 一年内，显示多少月前
											else if ($dt<31536000) {
												echo "<span style=\"color:#555;\">".floor($dt/2678400)." 月前</span>";
											}
											else {
												echo "<span style=\"color:#555;\">".floor($dt/31536000)." 年前</span>";
											}
										}
										?>
										</td>
										<td style="text-align:left;"><?php echo $manager->privileges?></td>
									</tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                        <div style="margin-top:20px;">
                            <div class="paging-container" style="text-align:right;" total="<?php echo $paging["total"]?>" current="<?php echo $paging["current"]?>" limit="<?php echo $paging["limit"]?>"></div>
                        </div>

                    </div>
                </div>
