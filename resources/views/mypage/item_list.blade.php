@extends("layouts.mypage")
@section('content')
<style>
	td, th {
		text-align: center !important;
		vertical-align: middle !important;
		border: 1px solid #aaa !important;
		padding: 2px 2px !important;
	}
	
	#rakuten-table td,
	#rakuten-table th,
	#yahoo-table td,
	#yahoo-table th {
		font-size: 10px !important;
	}

	#rakuten-table thead tr th:first-child,
	#rakuten-table tbody tr td:first-child,
	#yahoo-table thead tr th:first-child,
	#yahoo-table tbody tr td:first-child  {
		position: sticky;
		left: 0px;
	}

	/* #rakuten-table thead tr th:nth-child(2),
	#rakuten-table tbody tr td:nth-child(2),
	#yahoo-table thead tr th:nth-child(2),
	#yahoo-table tbody tr td:nth-child(2)  {
		position: sticky;
		left: 30px;
	}

	#rakuten-table thead tr th:nth-child(3),
	#rakuten-table tbody tr td:nth-child(3),
	#yahoo-table thead tr th:nth-child(3),
	#yahoo-table tbody tr td:nth-child(3)  {
		position: sticky;
		left: 180px;
	} */

	#rakuten-table tbody tr td:first-child,
	#rakuten-table tbody tr td:nth-child(2),
	#rakuten-table tbody tr td:nth-child(3),
	#yahoo-table tbody tr td:first-child,
	#yahoo-table tbody tr td:nth-child(2),
	#yahoo-table tbody tr td:nth-child(3)  {
		background-color: white;
		z-index: 1;
	}

	#rakuten-table,
	#yahoo-table  {
		/* min-width: 1400px; */
		font-size: 12px;
	}
	
	#rakuten-table thead,
	#yahoo-table thead {
		text-align: center;
		position: sticky;
		top: -1px;
		z-index: 2;
		background: white;
	}

	.btn-revision {
		width: 70px;
		background: #eee;
		color: black;
		font-size: 10px;
		border: 1px solid gray;
		border-radius: 2px !important;
		margin-top: 2px !important;
	}				
</style>
<?php
$applicationId = "dj00aiZpPVJpRFdoRUdpY3pUaSZzPWNvbnN1bWVyc2VjcmV0Jng9MWE-";
$secret = "jOr0rr7kmvXR9r5T6ERkXfN7KpGTu4vmd8TC8Ahv";
// echo base64_encode($applicationId.":".$secret);
?>

<div class="content-wrapper">	
	<div class="content" style="padding-top: 0.5rem;">
		<div class="col-12">
			<div class="card card-primary card-outline card-outline-tabs">
				<div class="card-header p-0 border-bottom-0">
					<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">楽天</a>
						</li>				 
						<li class="nav-item">
							<a class="nav-link" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile-tab" aria-selected="false">ヤフショ</a>
						</li>
					</ul>			
				</div>
				<!-- /.card-header -->
				<div class="card-body">
					<div class="tab-content" id="custom-tabs-four-tabContent">
						<div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
							<div class="row">										
								<div style="overflow: auto;">
									<table class="table table-bordered" id="rakuten-table">
										<thead>
											<tr>
												<th rowspan="3" colspan="1" style="width: 30px; z-index: 5; background: white;">#</th>
												<th rowspan="3" colspan="1" style="width: 150px; z-index: 5; background: white;">商品画像<br>(⾃社トップ画像)</th>
												<th rowspan="3" colspan="1" style="width: 100px; z-index: 5; background: white;">商品名<br>商品管理番号</th>
												<th rowspan="1" colspan="4">価格改定設定（楽天/選択式）</th>
												<th rowspan="1" colspan="2">楽天価格<br>調整</th>
												<th rowspan="1" colspan="1">楽天タイムセール<br/>（選択式）</th>
												<th rowspan="1" colspan="6">楽天情報</th>
												<th rowspan="1" colspan="3">楽天情報</th>
											</tr>
											<tr>
												<th rowspan="2" style="width: 50px;">セット<br/>数</th>
												<th rowspan="2" style="width: 100px;">検索方式</th>
												<th rowspan="1" style="width: 100px;">検索ワード</th>
												<th rowspan="2" style="width: 150px;">カスタム</th>
												<th rowspan="2" style="width: 50px;">円</th>
												<th rowspan="2" style="width: 50px;">%</th>
												<th rowspan="2" style="width: 220px;">カスタム</th>
												<th rowspan="2" style="width: 50px;">販売<br/>状態</th>
												<th rowspan="2" style="width: 50px;">出品価格</th>
												<th rowspan="2" style="width: 50px;">原価</th>
												<th rowspan="2" style="width: 50px;">下限</th>
												<th rowspan="2" style="width: 50px;">上限</th>
												<th rowspan="2" style="width: 50px;">監視</th>
												<th rowspan="2" style="width: 50px;">セラー名</th>
												<th rowspan="2" style="width: 50px;">実質<br/>最安値</th>
												<th rowspan="2" style="width: 50px;">価格差</th>
											</tr>
											<tr>
												<th>除外ワード</th>
											</tr>
										</thead>
										<tbody>
											@foreach($items as $item)
											<tr data-product="{{$item['id']}}">
												<td rowspan="2">
													<a href="{{url('/mypage/item/edit/'.$item['id'])}}">
														<i class="fa fa-edit" aria-hidden="true"></i>
													</a>
												</td>
												<td rowspan="2">
													<img src="{{$item['r_img_url']}}" style="width: 128px; height: 128px;" />
												</td>
												<td rowspan="2">
													<a style="color:#007bff; text-decoration: underline;" data-toggle="tooltip" title="{{$item['memo']}}" href="{{url('/mypage/item/edit/'.$item['id'])}}">{{$item["item_name"]}}</a><br>
													{{$item["jan_code"]}}
													<textarea class="form-control" style="font-size: 10px;" disabled>{{$item['memo']}}</textarea>
												</td>
												<td rowspan="2"></td>
												<!-- @if($item["r_search_kind"] == 1)
												<td rowspan="2" style="background-color:rgb(238, 130, 238); color:#FFF">
													JAN
												</td>
												@else
												<td rowspan="2" style="background-color:#495057; color:#FFF">
													キーワード
												</td>
												@endif -->

												@if ($item['r_search_condition'] == '9999')
													<td rowspan="2" style="background: #eee">
														カスタム
													</td>
												@else
													@foreach ($patterns as $pattern)
														@if ($item['r_search_condition'] == $pattern['id'])
															<td rowspan="2" style="background: {{$pattern['color']}}">
																{{$pattern['name']}}
															</td>
														@endif
													@endforeach
												@endif

												<td>{{$item["r_out_keyword"]}}</td>
												<td rowspan="2" data-field="search-pattern">
													@foreach ($patterns as $pattern)
														@if ($pattern['display'])
															@if ($item['r_search_condition'] == $pattern['id'])
																<button type="button" class="btn btn-xs btn-revision" data-bgcolor="{{$pattern['color']}}" data-pid="{{$pattern['id']}}" style="background: {{$pattern['color']}}; border: 1px solid black; font-weight: bold; font-size: 10px;" data-clicked="1" onclick="selectPattern(event)">{{$pattern['name']}}</button>
															@else
																<button type="button" class="btn btn-xs btn-revision" data-bgcolor="{{$pattern['color']}}" data-pid="{{$pattern['id']}}" style="background: #eee; border: 1px solid gray; font-size: 9px;" onclick="selectPattern(event)">{{$pattern['name']}}</button>
															@endif
														@endif
													@endforeach

													@if ($item['r_search_condition'] == '9999')
														<button type="button" class="btn btn-xs btn-revision" data-bgcolor="#eee" data-pid="9999" data-toggle="modal" data-target="#customModal" style="background: #eee; border: 1px solid black; font-weight: bold; font-size: 10px;" data-clicked="1" onclick="selectPattern(event)">カスタム</button>
													@else
														<button type="button" class="btn btn-xs btn-revision" data-bgcolor="#eee" data-pid="9999" data-toggle="modal" data-target="#customModal" style="background: #eee; border: 1px solid gray; font-size: 9px;" onclick="selectPattern(event)">カスタム</button>
													@endif
												</td>
												<td rowspan="2"></td>
												<td rowspan="2">{{$item["rakuten_pro_price"]}}%</td>
												<td rowspan="2" data-field="time-pattern" data-selected="">
													<!-- customer setting button -->
													@foreach ($timepatterns as $pattern)
														@if ($pattern['display'])
															@if ($item['r_time_condition'] == $pattern['id'])
																<button type="button" class="btn btn-xs btn-revision" data-bgcolor="{{$pattern['color']}}" data-tid="{{$pattern['id']}}" style="background: {{$pattern['color']}}; border: 1px solid black; font-weight: bold; font-size: 10px;"  data-sale="{{$pattern}}" data-clicked="1" onclick="selectPattern(event)">{{$pattern['name']}}</button>
															@else
																<button type="button" class="btn btn-xs btn-revision" data-bgcolor="{{$pattern['color']}}" data-tid="{{$pattern['id']}}" style="background: #eee; border: 1px solid gray; font-size: 9px;" data-sale="{{$pattern}}" onclick="selectPattern(event)">{{$pattern['name']}}</button>
															@endif
														@endif
													@endforeach

													@if ($item['r_time_condition'] == '9999')
														<button type="button" class="btn btn-xs btn-revision" data-bgcolor="#eee" data-tid="9999" data-toggle="modal" data-target="#timeModal" style="background: #eee; border: 1px solid black; font-weight: bold; font-size: 10px;" data-sale="{{$user['custom_time_pattern'][0]}}" data-clicked="1" onclick="selectPattern(event)">カスタム</button>
													@else
														<button type="button" class="btn btn-xs btn-revision" data-bgcolor="#eee" data-tid="9999" data-toggle="modal" data-target="#timeModal" style="background: #eee; border: 1px solid gray; font-size: 9px;" data-sale="{{$user['custom_time_pattern'][0]}}" onclick="selectPattern(event)">カスタム</button>
													@endif
												</td>
												<td rowspan="2" style="background: #eee; color: black;"></td>
												<td rowspan="2" style="background: #eee; color: black;"></td>
												<td rowspan="2" style="background: #eee; color: black;">{{$item["rakuten_normal_price"]}}円</td>
												<td rowspan="2" style="background: #eee; color: black;">{{$item["rakuten_low_price"]}}円</td>
												<td rowspan="2" style="background: #eee; color: black;">{{$item["rakuten_high_price"]}}円</td>
												@if($item["r_manager_true"] == 1)
												<td rowspan="2" style="background-color: #eee; color: black">
													有
												</td>
												@else
												<td rowspan="2" style="background-color: #eee; color: black">
													●
												</td>
												@endif
												<td rowspan="2" id="r_seller_<?=$item["id"]?>">
												<?php
													$r_shop = json_decode($item->r_shop_list, true);
													// var_export($r_shop[0]);
													if(is_array($r_shop)){
														$cnt = min(count($r_shop), 5);
														for($i = 0; $i < $cnt; $i++){									
															echo "<div><a href='".$r_shop[$i]["Item"]["itemUrl"]."'>".$r_shop[$i]["Item"]["shopName"]."</a></div>";
														}
													}
												?>
												</td>													
												<td rowspan="2" id="r_low_<?=$item["id"]?>">{{$item->r_real_low_price}}</td>
												<td rowspan="2" id="r_diff_<?=$item["id"]?>"></td>
											</tr>
											<tr>
												<td style="background: #fff; z-index: 0;">{{$item["r_out_keyword"]}}</td>
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
							<div class="row">										
								<div style="overflow: auto;">
									<table class="table table-bordered" id="yahoo-table">
										<thead>
											<tr>
												<th rowspan="3" style="width: 30px; z-index: 5; background: white;">#</th>
												<th rowspan="3" style="width: 150px; z-index: 5; background: white;">商品画像<br>(⾃社トップ画像)</th>
												<th rowspan="3" style="width: 100px; z-index: 5; background: white;">商品名<br>商品管理番号</th>
												<th colspan="4">価格改定設定（ヤフショ/選択式）</th>
												<th colspan="2">ヤフショ価格<br>調整</th>
												<th>ヤフショタイムセール<br/>（選択式）</th>
												<th colspan="6">ヤフー情報</th>
												<th colspan="3">ヤフー情報</th>
											</tr>
											<tr>
												<th rowspan="2" style="width: 50px;">セット<br/>数</th>
												<th rowspan="2" style="width: 100px;">検索方式</th>
												<th rowspan="1" style="width: 100px;">検索ワード</th>
												<th rowspan="2" style="width: 150px;">カスタム</th>
												<th rowspan="2" style="width: 50px;">円</th>
												<th rowspan="2" style="width: 50px;">%</th>
												<th rowspan="2" style="width: 220px;">カスタム</th>
												<th rowspan="2" style="width: 50px;">販売状態</th>
												<th rowspan="2" style="width: 50px;">出品価格</th>
												<th rowspan="2" style="width: 50px;">原価</th>
												<th rowspan="2" style="width: 50px;">下限</th>
												<th rowspan="2" style="width: 50px;">上限</th>
												<th rowspan="2" style="width: 50px;">監視</th>
												<th rowspan="2" style="width: 50px;">セラー名</th>
												<th rowspan="2" style="width: 50px;">実質<br/>最安値</th>
												<th rowspan="2" style="width: 50px;">価格差</th>
											</tr>
											<tr>
												<th>除外ワード</th>
											</tr>
										</thead>	
										<tbody>
											@foreach($items as $item)
											<tr data-product="{{$item['id']}}">
												<td rowspan="2">
													<a data-toggle="tooltip" title="{{$item['memo']}}" href="{{url('/mypage/item/edit/'.$item['id'])}}">
														<i class="fa fa-edit" aria-hidden="true"></i>
													</a>
												</td>
												<td rowspan="2">
													<img src="{{$item['y_img_url']}}" style="width: 128px; height: 128px;" />
												</td>
												<td rowspan="2">
													<a style="color:#007bff; text-decoration: underline;"  data-toggle="tooltip" title="{{$item['memo']}}" href="{{url('/mypage/item/edit/'.$item['id'])}}">{{$item["master_code"]}}</a>
													{{$item["name"]}}
													<textarea class="form-control" style="font-size: 10px;" disabled>{{$item['memo']}}</textarea>
												</td>
												<td rowspan="2"></td>
												<!-- @if($item["y_search_kind"] == 1)
												<td rowspan="2" style="background-color:#ea4435; color:#FFF" data-field="search-mode">
													Jan
												</td>
												@else
												<td rowspan="2" style="background-color:#495057; color:#FFF" data-field="search-mode">
													キーワード
												</td>
												@endif -->

												@if ($item['y_search_condition'] == '9999')
													<td rowspan="2" style="background: #eee">
														カスタム
													</td>
												@else
													@foreach ($patterns as $pattern)
														@if ($item['y_search_condition'] == $pattern['id'])
															<td rowspan="2" style="background: {{$pattern['color']}}">
																{{$pattern['name']}}
															</td>
														@endif
													@endforeach
												@endif

												<td>{{$item['y_out_keyword']}}</td>
												<td rowspan="2" data-field="search-pattern">
													@foreach ($patterns as $pattern)
														@if ($pattern['display'])
															@if ($item['y_search_condition'] == $pattern['id'])
																<button type="button" class="btn btn-xs btn-revision" data-bgcolor="{{$pattern['color']}}" data-pid="{{$pattern['id']}}" style="background: {{$pattern['color']}}; border: 1px solid black; font-weight: bold; font-size: 10px;" data-clicked="1" onclick="selectPattern(event)">{{$pattern['name']}}</button>
															@else
																<button type="button" class="btn btn-xs btn-revision" data-bgcolor="{{$pattern['color']}}" data-pid="{{$pattern['id']}}" style="background: #eee; border: 1px solid gray; font-size: 9px;" onclick="selectPattern(event)">{{$pattern['name']}}</button>
															@endif
														@endif
													@endforeach

													@if ($item['y_search_condition'] == '9999')
														<button type="button" class="btn btn-xs btn-revision" data-bgcolor="#eee" data-pid="9999" data-toggle="modal" data-target="#customModal" style="background: #eee; border: 1px solid black; font-weight: bold; font-size: 10px;" data-clicked="1" onclick="selectPattern(event)">カスタム</button>
													@else
														<button type="button" class="btn btn-xs btn-revision" data-bgcolor="#eee" data-pid="9999" data-toggle="modal" data-target="#customModal" style="background: #eee; border: 1px solid gray; font-size: 9px;" onclick="selectPattern(event)">カスタム</button>
													@endif
												</td>
												<td rowspan="2"></td>
												<td rowspan="2"></td>
												<td rowspan="2" data-field="time-pattern" data-selected="">
													@foreach ($timepatterns as $pattern)
														@if ($pattern['display'])
															@if ($item['y_time_condition'] == $pattern['id'])
																<button type="button" class="btn btn-xs btn-revision" data-bgcolor="{{$pattern['color']}}" data-tid="{{$pattern['id']}}" style="background: {{$pattern['color']}}; border: 1px solid black; font-weight: bold; font-size: 10px;" data-sale="{{$pattern}}" data-clicked="1" onclick="selectPattern(event)">{{$pattern['name']}}</button>
															@else
																<button type="button" class="btn btn-xs btn-revision" data-bgcolor="{{$pattern['color']}}" data-tid="{{$pattern['id']}}" style="background: #eee; border: 1px solid gray; font-size: 9px;" data-sale="{{$pattern}}" onclick="selectPattern(event)">{{$pattern['name']}}</button>
															@endif
														@endif
													@endforeach

													@if ($item['y_time_condition'] == '9999')
														<button type="button" class="btn btn-xs btn-revision" data-bgcolor="#eee" data-tid="9999" data-toggle="modal" data-target="#timeModal" style="background: #eee; border: 1px solid black; font-weight: bold; font-size: 10px;" data-sale="{{$user['custom_time_pattern'][0]}}" data-clicked="1" onclick="selectPattern(event)">カスタム</button>
													@else
														<button type="button" class="btn btn-xs btn-revision" data-bgcolor="#eee" data-tid="9999" data-toggle="modal" data-target="#timeModal" style="background: #eee; border: 1px solid gray; font-size: 9px;" data-sale="{{$user['custom_time_pattern'][0]}}" onclick="selectPattern(event)">カスタム</button>
													@endif
												</td>
												<td rowspan="2" style="background: #eee; color: black;"></td>
												<td rowspan="2" style="background: #eee; color: black;"></td>
												<td rowspan="2" style="background: #eee; color: black;">{{$item["yahoo_normal_price"]}}円</td>
												<td rowspan="2" style="background: #eee; color: black;">{{$item["yahoo_low_price"]}}円</td>
												<td rowspan="2" style="background: #eee; color: black;">{{$item["yahoo_high_price"]}}円</td>
												@if($item["r_manager_true"] == 1)
												<td rowspan="2" style="background-color: #eee; color: black">
													有
												</td>
												@else
												<td rowspan="2" style="background-color: #eee; color: black">
													●
												</td>
												@endif
												<td rowspan="2" id="y_seller_<?=$item["id"]?>">
												<?php
													$y_shop = json_decode($item->y_shop_list, true);
													//var_export($y_shop[0]);
													if(is_array($y_shop)){
														$cnt = min(count($y_shop), 5);
														for($i = 0; $i < $cnt; $i++){													
															echo "<div><a href='".$y_shop[$i]["guid"]."'>".substr($y_shop[$i]["subStoreName"],0,6)."...</a></div>";
														}
													}
												?>
												</td>													
												<td rowspan="2" id="y_low_<?=$item["id"]?>">{{$item->y_real_low_price}}</td>
												<td rowspan="2" id="y_diff_<?=$item["id"]?>"></td>
											</tr>
											<tr>
												<td style="background: #fff; z-index: 0;">{{$item["y_out_keyword"]}}</td>
											</tr>
											@endforeach
										</tbody>						
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.card-body -->
				
				<div class="card-footer">
					{{ $items->links('mypage.pagination') }}
					<button type="button" class="btn btn-info float-left" onclick="item_add()">商品追加</button>
				</div>
				<!-- /.card-footer -->
			</div>
		</div>
	</div>
</div>
@include("mypage.custom-modal")
@include("mypage.time-modal")
@endsection
@section("script")
	@include("js.js_my")

	<script>
		$(document).ready(function() {
			// format_pattern();
			// $(".main-footer").css("display", "none");
			// $(".main-header").css("display", "none");
			

			$("#rakuten-table")[0].parentElement.style.maxHeight = window.innerHeight - 250 + "px";
			$("#yahoo-table")[0].parentElement.style.maxHeight = window.innerHeight - 250 + "px";
			
			$('[data-toggle="tooltip"]').tooltip();

			$('[data-field="time-pattern"]').children('[data-clicked=1]').click();
		});

		var sPage = "1";
		function item_add() {
			location.href = "./item_add";
		}

		let num = 0;
		
		const selectPattern = (e) => {
			let bgColor = e.target.dataset.bgcolor;
			// changing appearance of the button which has been selected
			$(e.target).siblings().css({
				"background": "#eee",
				"border": "1px solid gray",
				"fontWeight": "normal",
				"fontSize": "9px",
			});
			
			$(e.target).css({
				"background": bgColor,
				"border": "1px solid black",
				"fontWeight": "bold",
				"fontSize": "10px",
			});
			
			for (let i = 0, len = $(e.target).siblings().length; i < len; i++) {
				$(e.target).siblings()[i].dataset.clicked = 0;
			}
			e.target.dataset.clicked = 1;

			// logic for selected pattern
			let t = e.target;
			let postData = {
				product_num: t.parentElement.parentElement.dataset.product,
			};

			num = postData.product_num;

			if ($('.nav-link.active').html() == "楽天") {
				postData.market_name = 'rakuten';
			} else if ($('.nav-link.active').html() == "ヤフショ") {
				postData.market_name = 'yahoo';
			}
			
			let keyword = t.innerText;
			if (t.parentElement.dataset.field == 'search-pattern') {
				$(t.parentElement).siblings()[4].style.backgroundColor = bgColor;
				$(t.parentElement).siblings()[4].innerHTML = keyword;
				postData.price_pattern = t.dataset.pid;
			} else if (t.parentElement.dataset.field == 'time-pattern') {
				postData.time_pattern = t.dataset.tid;
			}
			postData.key = keyword;

			$.ajax({
				url: '/mypage/price/pattern/set',
				type: 'post',
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					pattern: JSON.stringify(postData),
				},
				success: function(result) {
					console.log(result);
				}
			});

			e.target.parentElement.dataset.selected = e.target.dataset.sale;
			let time_condition = JSON.parse(e.target.parentElement.dataset.selected);
			
			// tracking time condition
			const timeTracking = () => {
				const d = new Date();
				const weekday = ["sun","mon","tue","wed","thu","fri","sat"];
				let day = weekday[d.getDay()];
	
				let openTime = time_condition.open_time;
				let closeTime = time_condition.close_time;
				let currentTime = d.getHours() + ":" + d.getMinutes();
				if (time_condition[day]) {
					if (currentTime > openTime && currentTime < closeTime) {
						alert("IT IS TIME!");
					} else {
						
					}
				} else {

				}
	
				let openDatetime = new Date(time_condition.open_datetime);
				let closeDatetime = new Date(time_condition.close_datetime);
				let currentDatetime = d;
	
				if (currentDatetime > openDatetime && currentDatetime < closeDatetime) {
					alert("IT IS TIME");
				} else {
					
				}
			};

			setInterval(timeTracking, 5000);

		};


		const getPattern = (e) => {
			let _id = $(e.target).data('id');
			$(e.target).siblings().removeClass("btn-primary");
			$(e.target).addClass("btn-primary");

			$('#patternTableBody tr[data-tr-id="' + _id + '"]').css("display", '');
			$('#patternTableBody tr[data-tr-id!="' + _id + '"]').css("display", 'none');
		};

		const getTimePattern = (e) => {
			let _id = $(e.target).data('id');
			$(e.target).siblings().removeClass("btn-primary");
			$(e.target).addClass("btn-primary");
			
			$('#timepatternTableBody tr[data-tr-id="' + _id + '"]').css("display", '');
			$('#timepatternTableBody tr[data-tr-id!="' + _id + '"]').css("display", 'none');
		};
		
		const saveCustomPattern = (e) => {
			let siblings = $(e.currentTarget).siblings();
			let postData = {
				display: siblings[2].children[0].checked?1:0,
				name: siblings[3].children[0].value,
				color: siblings[4].children[0].value,
				
				// mode: siblings[5].children[0].value,
				mode: siblings[5].querySelector('input[name="mode' + siblings[0].children[0].value + '"]:checked').value,
				same_size: siblings[6].children[0].checked?1:0,
				pointer: siblings[7].children[0].checked?1:0,
				coupon: siblings[8].children[0].checked?1:0,
				post_price: siblings[9].children[0].checked?1:0,
				ignore: siblings[10].children[0].checked?1:0,
			};

			postData.product_num = num;

			if ($('.nav-link.active').html() == "楽天") {
				postData.market_name = 'rakuten';
			} else if ($('.nav-link.active').html() == "ヤフショ") {
				postData.market_name = 'yahoo';
			}


			$.ajax({
				url:'/mypage/price_pattern/custom_save',
				type: "post",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					pattern: JSON.stringify(postData)
				},
				success: function(result, status, xhr) {
					location.href = './item_list';
					alert("パターンが正常に保存されました");
				},
			});
		};

		const saveCustomTimePattern = (e) => {
			let siblings = $(e.currentTarget).siblings();
			let postData = {
				display: siblings[2].querySelector('input[name="time-display"]').checked?1:0,
				name: siblings[3].querySelector('input[name="time-name"]').value,
				color: siblings[4].querySelector('input[name="time-color"]').value,
				
				mon: siblings[5].querySelector('input[name="time-mon"]').checked?1:0,
				tue: siblings[6].querySelector('input[name="time-tue"]').checked?1:0,
				wed: siblings[7].querySelector('input[name="time-wed"]').checked?1:0,
				thu: siblings[8].querySelector('input[name="time-thu"]').checked?1:0,
				fri: siblings[9].querySelector('input[name="time-fri"]').checked?1:0,
				sat: siblings[10].querySelector('input[name="time-sat"]').checked?1:0,
				sun: siblings[11].querySelector('input[name="time-sun"]').checked?1:0,

				open_time: siblings[12].querySelector('input[name="time-open"]').value,
				close_time: siblings[12].querySelector('input[name="time-close"]').value,

				open_datetime: siblings[13].querySelector('input[name="time-dateopen"]').value,
				close_datetime: siblings[13].querySelector('input[name="time-dateclose"]').value,

				is_sale: siblings[14].querySelector('input[name="time-sale"]').checked?1:0,

				yen: siblings[15].querySelector('input[name="time-yen"]').value,
				pro: siblings[16].querySelector('input[name="time-pro"]').value,
			};

			$.ajax({
				url:'/mypage/time_pattern/custom_save',
				type: "post",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: {
					pattern: JSON.stringify(postData)
				},
				success: function(result, status, xhr) {
					location.href = './item_list';
					alert("パターンが正常に保存されました");
				},
			});
		};
	</script>
@endsection