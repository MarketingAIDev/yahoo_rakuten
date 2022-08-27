@extends("layouts.mypage")
@section('content')
<style>
	td, th {
		text-align: center !important;
		vertical-align: middle !important;
		border: 1px solid #aaa !important;
	}

	#shopList {
		padding-top: 0px;
		padding-right: 1rem;
		padding-left: 1rem;
	}
</style>

<div class="content-wrapper">
	<div class="content" style="padding-top: 0.5rem;">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h2 class="card-title" style="font-size: 2rem;">商品ランキング</h2>
				
						<!-- <div class="card-tools">
							<div class="input-group input-group-sm" style="width: 150px;">
							<input type="text" name="table_search" class="form-control float-right" placeholder="Search">
				
							<div class="input-group-append">
								<button type="submit" class="btn btn-default">
								<i class="fas fa-search"></i>
								</button>
							</div>
							</div>
						</div> -->
					</div>
					<!-- /.card-header -->
					<div class="card-body table-responsive" id="shopList">
						<table class="table table-head-fixed">
							<thead>
								<tr>
									<th style="width: 70%;">商品名</th>
									<th>店舗名</th>
									<th>商品価格</th>
								</tr>
							</thead>
							<tbody>
								@if ($kind == 1)
									@foreach($lists as $list)
									<tr>
										<td>{{$list['itemName']}}</td>
										<td><a href="{{$list['itemUrl']}}" target="_blank">{{$list['shopName']}}</a></td>
										<td>{{$list['itemPrice']}}円</td>
									</tr>
									@endforeach
								@elseif ($kind == 2)
									@foreach($lists as $list)
									<tr>
										<td>{{$list['itemName']}}</td>
										<td><a href="{{$list['itemUrl']}}" target="_blank">{{$list['shopName']}}</a></td>
										<td>{{$list['itemPrice']}}円</td>
									</tr>
									@endforeach
								@endif
							</tbody>
						</table>
					</div>
					<!-- /.card-body -->
				</div>
				<!-- /.card -->
			</div>
		</div>
	</div>
</div>
@endsection
@section("script")
	@include("js.js_my")
	<script>
		$(document).ready(function() {
			$("#shopList")[0].style.height = window.innerHeight - 150 + 'px';
		});
	</script>
@endsection