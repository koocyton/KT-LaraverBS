
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
										<td style="text-align:left;">&nbsp;操作</td>
									</tr>
    							</thead>
								<tbody>
									<tr>
										<td>102</td>
										<td>koocyton@gmail.com</td>
										<td>2015-12-25 12:12:12</td>
										<td style="text-align:left;">&nbsp;/manager/edit/123</td>
									</tr>
    								<tr>
										<td>101</td>
										<td>koocyton@gmail.com</td>
										<td>2015-12-25 12:12:12</td>
										<td style="text-align:left;">&nbsp;/manager</td>
									</tr>
                                </tbody>
                            </table>
                        </div>

                        <div style="margin-top:20px;">
                            <div class="paging-container" style="text-align:right;" tatal="1000" current="<?php echo $paging["c"]?>" limit="30"></div>
                        </div>

                    </div>
                </div>
