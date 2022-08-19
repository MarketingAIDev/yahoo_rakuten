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

<div class="modal fade in" id="customModal">
	<div class="modal-dialog modal-xl modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title"><b>【カスタム】パターン設定</b></h4>
				<!-- <span><a href="#">使い方を見る</a></span> -->
				<span class="btn btn-close text-right" data-dismiss="modal" style="font-size: 20px;">&times</span>
			</div>

			<div class="modal-body">
				<ul class="list-group">
					<li class="list-group-item list-group-item-primary">
						<span>プリセットから呼び出す。</span>
						<div class="btn-group">
						@foreach ($patterns as $pattern)
							<button class="btn btn-custom" data-id="{{$pattern['id']}}" onclick="getPattern(event)">{{$pattern['name']}}</button>
							@endforeach
						</div>
					</li>

					<li class="list-group-item">
						<table class="table table-bordered table-hover text-center" id="patternTable">
							<thead class="thead-dark">
								<tr>
									<th style="display: none;">id</th>
									<th>操作</th>
									<th>並替</th>
									<th>表示</th>
									<th>名称</th>
									<th>表示色</th>
									<th>調査方式</th>
									<th>等倍設定</th>
									<th>ポイント考慮</th>
									<th>クーポン考慮</th>
									<th>送料考慮</th>
									<th>送料無料のみ</th>
								</tr>
							</thead>
							<tbody id="patternTableBody">
								@foreach($patterns as $pattern)
								<tr style="display: none;" data-tr-id="{{$pattern['id']}}">
									<td data-field="id-num" style="display: none;">
										<input type="hidden" name="id-num" value="{{$pattern['id']}}" />
									</td>
									<td onclick="saveCustomPattern(event)"><span><i class="fa fa-save"></i></span></td>
									<td><span><i class="fa fa-sort"></i></span></td>
									<td data-field="display">
										@if ($pattern['display'])
										<input type="checkbox" name="display" checked />
										@else
										<input type="checkbox" name="display" />
										@endif
									</td>
									<td data-field="name">
										@if ($pattern['name'])
										<input type="text" maxlength="10" name="name" value="カスタム" readonly />
										@else
										<input type="text" maxlength="10" name="name" />
										@endif
									</td>
									<td data-field="color">
										<input type="color" name="color" value="{{$pattern['color']}}" />
									</td>
									<td data-field="mode" style="text-align: left !important;">
										<div class="form-check" style="line-height: 1;">
											<input class="form-check-input" type="radio" name="{{'mode'.$pattern['id']}}" value="1" @if ($pattern['mode'] == '1') checked @endif >
											<label class="form-check-label">JAN</label>
										</div>

										<div class="form-check" style="line-height: 1;">
											<input class="form-check-input" type="radio" name="{{'mode'.$pattern['id']}}" value="2" @if ($pattern['mode'] == '2') checked @endif />
											<label class="form-check-label">キーワード</label>
										</div>

										<div class="form-check" style="line-height: 1;">
											<input class="form-check-input" type="radio" name="{{'mode'.$pattern['id']}}" value="3" @if ($pattern['mode'] == '3') checked @endif />
											<label class="form-check-label">自社商品</label>
										</div>
									</td>
									<td data-field="same_size">
										@if ($pattern['same_size'])
										<input type="checkbox" name="same_size" checked/>
										@else
										<input type="checkbox" name="same_size" />
										@endif
									</td>
									<td data-field="pointer">
										@if ($pattern['pointer'])
										<input type="checkbox" name="pointer" checked/>
										@else
										<input type="checkbox" name="pointer" />
										@endif
									</td>
									<td data-field="coupon">
										@if ($pattern['coupon'])
										<input type="checkbox" name="coupon" checked/>
										@else
										<input type="checkbox" name="coupon" />
										@endif
									</td>
									<td data-field="post_price">
										@if ($pattern['post_price'])
										<input type="checkbox" name="post_price" checked/>
										@else
										<input type="checkbox" name="post_price" />
										@endif
									</td>
									<td data-field="ignore">
										@if ($pattern['ignore'])
										<input type="checkbox" name="ignore" checked/>
										@else
										<input type="checkbox" name="ignore" />
										@endif
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