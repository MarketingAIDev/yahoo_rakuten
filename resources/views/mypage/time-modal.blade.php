<style type="text/css" id="surveyModalStyle">
	.btn-custom {
		background-color: lightgray;
		color: black;
		border: solid 1px darkgray;
		border-radius: 1px;
		margin-right: 2px;
	}

	.btn-custom:hover {
		background-color: gray;
	}

	.input-group {
		padding: 2px;
		margin: 2px;
	}
	.input-group-text {
		background-color: lightgray;
	}
</style>

<div class="modal fade in" id="timeModal">
	<div class="modal-dialog modal-xl modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><b>【カスタム】パターン設定</b></h4>
				<span class="btn btn-close text-right" data-dismiss="modal" style="font-size: 20px;">&times</span>
			</div>

			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item list-group-item-primary">
						<span>プリセットから呼び出す。</span>
						<div class="btn-group">
						@foreach ($timepatterns as $pattern)
							<button class="btn btn-custom" data-id="{{$pattern['id']}}" onclick="getTimePattern(event)">{{$pattern['name']}}</button>
							@endforeach
						</div>
					</li>

					<li class="list-group-item">
						<table class="table table-bordered table-hover text-center" id="time-pattern-table">
							<thead class="thead-dark">
								<tr>
									<th style="display: none;">id</th>
									<th>操作</th>
									<th>並替</th>
									<th>表示</th>
									<th>名称</th>
									<th>表示色</th>
									<th colspan="7">曜日</th>
									<th>時間帯</th>
									<th>日時</th>
									<th>指定時間<br/>のみ販売</th>
									<th>価格変更<br/>・円</th>
									<th>価格変更<br/>・％</th>
								</tr>
							</thead>
							<tbody id="timepatternTableBody" style="overflow-x: true;">
								@foreach ($timepatterns as $pattern)
								<tr style="display: none;" data-tr-id="{{$pattern['id']}}">
									<td data-field="id-num" style="display: none;">
										<input type="hidden" name="id-num" value="{{$pattern['id']}}" />
									</td>

									<td onclick="saveCustomTimePattern(event)">
										<span><i class="fa fa-save"></i></span>
									</td>

									<td>
										<span><i class="fa fa-sort"></i></span>
									</td>

									<td>
										<input type="checkbox" name='time-display' @checked(old('time-display', $pattern['display'])) />
									</td>

									<td>
										<input type="text" name='time-name' value="カスタム" disabled />
									</td>

									<td>
										<input type="color" name='time-color' value="{{$pattern['color']}}" />
									</td>

									<td>
										<input type="checkbox" name="time-mon" @if ($pattern['mon']) checked @endif />
										<label for="time-mon">月</label>
										<!-- <input type="checkbox" name="time-mon" @if ($pattern['mon']) checked @endif /> -->
									</td>

									<td>
										<input type="checkbox" name="time-tue" @if ($pattern['tue']) checked @endif />
										<label for="time-tue">火</label>
									</td>

									<td>
										<input type="checkbox" name="time-wed" @if ($pattern['wed']) checked @endif />
										<label for="time-wed">水</label>
									</td>
									
									<td>
										<input type="checkbox" name="time-thu" @if ($pattern['thu']) checked @endif />
										<label for="time-thu">木</label>
									</td>
									
									<td>
										<input type="checkbox" name="time-fri" @if ($pattern['fri']) checked @endif />
										<label for="time-fri">金</label>
									</td>
									
									<td>
										<input type="checkbox" name="time-sat" @if ($pattern['sat']) checked @endif />
										<label for="time-sat">土</label>
									</td>
									
									<td>
										<input type="checkbox" name="time-sun" @if ($pattern['sun']) checked @endif />
										<label for="time-sun">日</label>
									</td>

									<td>
										<div>
											<label for="appt">開始:</label>
											<input type="time" name="time-open" value="{{$pattern['open_time']}}" />
										</div>
										<div>
											<label for="appt">終了:</label>
											<input type="time" name="time-close" value="{{$pattern['close_time']}}" />
										</div>
									</td>

									<td>
										<div>
											<label for="appt">開始:</label>
											<input type="datetime-local" name="time-dateopen" value="{{$pattern['open_datetime']}}" />
										</div>
										<div>
											<label for="appt">終了:</label>
											<input type="datetime-local" name="time-dateclose" value="{{$pattern['close_datetime']}}" />
										</div>
									</td>

									<td>
										<div>
											<input type="checkbox" name="time-sale" @if ($pattern['sun']) checked @endif />
											<label for="time-sale">
											</label>
										</div>
									</td>

									<td>
										<input type="number" name="time-yen" style="width: 70px;" value="{{$pattern['yen']??0}}" />
										<label>円</label>
									</td>

									<td>
										<input type="number" name="time-pro" style="width: 70px;" value="{{$pattern['pro']??0}}" />
										<label>%</label>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>