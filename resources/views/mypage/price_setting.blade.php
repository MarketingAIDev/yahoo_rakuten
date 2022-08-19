@extends('layouts.mypage')

@section('content')
	
	<div class="content-wrapper">
		<div class="content-header">
	    <div class="container-fluid">
	      <div class="row mb-2">
	        <div class="col-sm-6">
	          <h2 class="m-0">出品設定</h2>
	        </div><!-- /.col -->
	        <div class="col-sm-6">
	          <ol class="breadcrumb float-sm-right">
	            <li class="breadcrumb-item"><a href="#">設定</a></li>
	            <li class="breadcrumb-item active">出品設定</li>
	          </ol>
	        </div><!-- /.col -->
	      </div><!-- /.row -->
	    </div><!-- /.container-fluid -->
	  </div>
		<div class="container-fluid">
			<div class="col-12">
				<div class="card card-primary card-outline card-outline-tabs">
					<div class="card-header p-0 border-bottom-0">
						<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="amazon-tab" data-toggle="pill" href="#amazon" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">(Amazon JP/US)取得設定</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="common-tab" data-toggle="pill" href="#common" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">出品設定ー共通</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="yahoo-tab" data-toggle="pill" href="#yahoo" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false">出品設定－yahoo</a>
							</li>
						</ul>
					</div>
					<div class="card-body">
						<form action="external_save/price" id="amazon-form" method="post">
							@csrf
							<div class="tab-content" id="custom-tabs-four-tabContent">
							
								<div class="tab-pane fade show active" id="amazon" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
								
									<div class="row mb-2">
										<h5> ・(Amazon JP/US)価格　取得条件</h5>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3" >
											<label for="second-goods">中古品</label>
										</div>
										<div class="col-sm-2">
											<div class="input-group-text">
												<input class="form-control" type="checkbox" id="second-goods" name="second-goods" {{ $user->second_goods ? 'checked' : '' }}/>
											</div>
										</div>
										<div class="col-sm-1"></div>

										<div class="col-sm-3">
											<label for="select-ic">Item Condition</label>
										</div>
										<div class="col-sm-2">
											<select class="form-control" id="select-ic" name="select-ic">
												<option value="-1" {{ ($user->item_condition == '-1') ? 'selected' : '' }}> </option>
												<option value="excellent" {{ ($user->item_condition == 'excellent') ? 'selected' : '' }}>非常に良い</option>
												<option value="ok" {{ ($user->item_condition == 'ok') ? 'selected' : '' }}>良い</option>
												<option value="good" {{ ($user->item_condition == 'good') ? 'selected' : '' }}>可</option>
											</select>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="select-fc">Fulfillment Channel</label>	
										</div>
										<div class="col-sm-2">
											<select class="form-control" id="select-fc" name="select-fc">
												<option value="all" {{ ($user->ful_channel == 'all') ? 'selected' : '' }}>All</option>
												<option value="merhant" {{ ($user->ful_channel == 'merhant') ? 'selected' : '' }}>Merhant</option>
												<option value="fba" {{ ($user->ful_channel == 'fba') ? 'selected' : '' }}>FBA</option>
												<option value="fba-first" {{ ($user->ful_channel == 'fba-first') ? 'selected' : '' }}>FBA優先</option>
											</select>
										</div>
										<div class="col-sm-1"></div>

										<div class="col-sm-3">
											<label for="select-st">Shipping Time</label>
										</div>

										<div class="col-sm-2">
											<select class="form-control" id="select-st" name="select-st">
												<option value="all" {{ ($user->shipping_time == 'all') ? 'selected' : '' }}>All</option>
												<option value="two" {{ ($user->shipping_time == 'two') ? 'selected' : '' }}>2日以内</option>
												<option value="three-seven" {{ ($user->shipping_time == 'three-seven') ? 'selected' : '' }}>3-7日</option>
												<option value="thirteen" {{ ($user->shipping_time == 'thirteen') ? 'selected' : '' }}>13日以上</option>
											</select>
										</div>
									</div>
									
									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="seller">Seller Feedback</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="seller" name="seller" value="{{ $user->feedback }}" />
										</div>
										<div class="col-sm-1"></div>

										<div class="col-sm-3">
											<label for="ration">高評価率</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="ration" name="ration" value="{{ $user->high_rate }}" />
										</div>
									</div>
									<div class="row mb-2">
										<h5> ・アマゾン取得条件設定</h5>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="del-seller">セラー削除</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="del-seller" name="del-seller" value="{{ $user->seller_del }}" />
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="low-p-bound">販売価格下限（円）</label>	
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="low-p-bound" name="low-p-bound" value="{{ $user->low_price_bound }}" />
										</div>
										<div class="col-sm-1"></div>

										<div class="col-sm-3">
											<label for="up-p-bound">販売価格上限（円）</label>	
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="up-p-bound" name="up-p-bound" value="{{ $user->up_price_bound }}" />
										</div>
									</div>
									
									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="up-w-bound">出品商品重量上限（ｇ）</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="up-w-bound" name="up-w-bound" value="{{ $user->up_weight_bound }}" />
										</div>
										<div class="col-sm-1"></div>

										<div class="col-sm-3">
											<label for="size-info">サイズ情報取得不可の場合除外する</label>
										</div>
										<div class="col-sm-2">
											<div class="input-group-text">
												<input class="form-control" type="checkbox" id="size-info" name="size-info" {{ $user->size_info ? 'checked' : '' }}/>
											</div>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="up-3l-bound">出品商品3辺の長さ上限（cm）</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="up-3l-bound" name="up-3l-bound" value="{{ $user->up_3l_bound }}" />
										</div>
										<div class="col-sm-1"></div>

										<div class="col-sm-3">
											<label for="up-l-bound">出品商品長辺の長さ上限（cm）</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="up-l-bound" name="up-l-bound" value="{{ $user->up_l_bound }}" />
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="ranking">ASINランキング（以内）</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="ranking" name="ranking" value="{{ $user->asin }}" />
										</div>
									</div>
								</div>

								<div class="tab-pane fade show" id="common" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
									<div class="row mb-2">
										<h5>・出品設定（共通）</h5>
									</div>

									<div class="row mb-2">
										<div class="input-group">
											<div class="input-group-text">
												<input class="form-control" type="checkbox" id="inventory" name="inventory" />
											</div>
											<div class="input-group-append">
												<label for="inventory" class="text-danger">在庫のみ連携(※出品価格が変更しない)</label>
											</div>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="code">商品コード命名（半角英数字）</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="code" name="code" value="{{ $user->code }}" />
										</div>
										<div class="col-sm-1"></div>

										<div class="col-sm-3">
											<label for="stock">在庫数</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="stock" name="stock" value="{{ $user->stock }}" />
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="prefix">商品名の前につける文字</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="prefix" name="prefix" value="{{ $user->prefix }}" />
										</div>
										<div class="col-sm-1"></div>

										<div class="col-sm-3">
											<label for="postfix">商品名の後ろにつける文字</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="postfix" name="postfix" value="{{ $user->postfix }}" />
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="header">商品ヘッダー部</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="text" id="header" name="header" value="{{ $user->header }}" />
										</div>
										<div class="col-sm-1"></div>

										<div class="col-sm-3">
											<label for="footer">商品フッター部</label>
										</div>
										<div class="col-sm-2">
											<textarea class="form-control" rows="5" id="footer" name="footer">{{ $user->footer }}</textarea>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="JANCD">JANCD非表示</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="checkbox" id="JANCD" name="JANCD"  {{ $user->JANCD ? 'checked' : '' }} />
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="description">商品説明非表示</label>
										</div>
										<div class="col-sm-2">
											<input class="form-control" type="checkbox" id="description" name="description" {{ $user->description ? 'checked' : '' }} />
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="caption">CAPTION (※ページ下に表示)</label>
										</div>
										<div class="col-sm-6">
											<textarea class="form-control" rows="10" id="caption" name="caption">{{ $user->caption }}</textarea>
										</div>
									</div>
								</div>

								<div class="tab-pane fade show" id="yahoo" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">

									<div class="row mb-2">
										<h5>・出品設定（yahoo）</h5>
									</div>

									<div class="row mb-2">
										<div class="col-sm-2">
											<label for="date-info">発送日情報管理番号</label>	
										</div>
										<div class="col-sm-3">
											<input class="form-control" type="text" name="date-info" id="date-info" value="{{ $user->date_info }}" />
										</div>
										<div class="col-sm-1"></div>

										<div class="col-sm-3">
											<label for="delivery">デリバリー </label>
										</div>

										<div class="col-sm-3">
											<select class="form-control" id="delivery" name="delivery">
												<option value="none" {{ ($user->delivery == 'none') ? 'selected' : '' }}>なし（送料がかかる場合）</option>
												<option value="free" {{ ($user->delivery == 'free') ? 'selected' : '' }}>無料</option>
												<option value="condtion" {{ ($user->delivery == 'condition') ? 'selected' : '' }}>条件付送料無料</option>
											</select>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-2">
											<label for="date-info-out">発送日情報管理番号(在庫切れ時)</label>
										</div>
										<div class="col-sm-3">
											<input class="form-control" type="text" name="date-info-out" id="date-info-out" value="{{ $user->date_info_out }}" />
										</div>
										<div class="col-sm-1"></div>

										<div class="col-sm-3">
											<label for="deli-group">配送グループ(半角数字のみ)</label>
										</div>
										<div class="col-sm-3">
											<input class="form-control" type="text" name="deli-group" id="deli-group" value="{{ $user->deli_group }}" />
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="smartphone">SP-ADDITIONAL ※スマホ用説明欄</label>
										</div>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" id="smartphone" name="smartphone">{{ $user->smartphone }}</textarea>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="option">オプション付加文字</label>
										</div>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5" id="option" name="option">{{ $user->option }}</textarea>
										</div>
									</div>

									<div class="row mb-2">
										<div class="col-sm-3">
											<label for="category">ストアカテゴリ</label>
										</div>
										<div class="col-sm-6">
											<input class="form-control" type="text" id="category" name="category" value="{{ $user->category }}">
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<!-- /.card-body -->
          <div class="card-footer">
            <button type="button" class="btn btn-info" id="save-setting">保管</button>
            <button type="button" class="btn btn-default float-right">キャンセル</button>
          </div>
          <!-- /.card-footer -->
				</div>
			</div>
		</div>		
	</div>
@endsection

@section("script")
	@include("js.js_my")

	<script>
		var _token = "{{ csrf_token() }}";

		$(document).ready(function() {
			$("#save-setting").click(function() {
				$("#amazon-form").submit();
			});
		});
		
	</script>

@endsection