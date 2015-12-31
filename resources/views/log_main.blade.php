
				<div style="top:0px;position:relative;">
					<div style="padding:20px;">

					    <div class="radius-4 ct-nav">
							<table class="ct-nav-table">
								<tr>
									<td class="ct-nav-left">
										<b>　查看操作日志</b>
									</td>
									<td class="ct-nav-right">

			                            <div class="ct-nav-search">
			                                <form action="/log" method="get">
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
										<td style="width:160px;">用户</td>
										<td style="width:130px;">时间</td>
										<td style="width:130px;">IP</td>
										<td style="text-align:left;">&nbsp;操作</td>
									</tr>
    							</thead>
								<tbody>
                                    <?php foreach($logs as $log) {?>
                                    <tr>
										<td><?php echo $log->id?></td>
										<td><?php echo $log->account?></td>
										<td><?php echo $log->created_at?></td>
										<td><?php echo $log->request_ip?></td>
										<td style="text-align:left;">&nbsp;[ <?php echo $log->request_method?> ] &nbsp; <?php echo $log->request_action?></td>
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
