@extends("layouts.mypage")
@section('content')
<div class="content-wrapper">
	<div class="content" style="padding-top: 0.5rem;">
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">ショップアカウントを登録してください。</h3>
              </div>

              <form action="{{route('shop_register')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="rakuten-account">楽天</label>
                    <input type="text" class="form-control" id="rakuten-account" name="rakuten-account" placeholder="abc@gmail.com, def@gmail.com...">
                  </div>
                  <div class="form-group">
                    <label for="yahoo-account">ヤフー</label>
                    <input type="text" class="form-control" id="yahoo-account" name="yahoo-account" placeholder="abc@gmail.com, def@gmail.com...">
                  </div>

                  <div class="form-group">
                    <p class="text-danger">【登録ショップ間では価格競争をしない】</p>
                  </div>
                </div>
                
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">登録</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
@endsection

@section('script')
  @include("js.js_my")
	<script>
		$(document).ready(function() {
			// $("#shopList")[0].style.height = window.innerHeight - 150 + 'px';
		});
	</script>
@endsection