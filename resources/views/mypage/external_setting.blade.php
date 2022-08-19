@extends("layouts.mypage")
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0">外部連携設定</h2>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">設定</a></li>
            <li class="breadcrumb-item active">外部連携設定</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->

    </div><!-- /.container-fluid -->
  </div>
  <div class="content">
    <div class="col-12">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
          <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Rakuten設定</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Yahoo設定</a>
            </li>           
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
              <form class="form-horizontal">
                <h5 class="mt-4 mb-2"><b>・PA-API連携設定</b></h5>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Rakuten_API_KEY</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pa_api_key" name="pa_api_key" placeholder="API_KEY" value="{{Auth::user()->pa_api_key}}">
                    </div>
                  </div>        
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Rakuten_API_SECRET_KEY</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pa_api_secret_key" name="pa_api_secret_key" placeholder="API_SECRET_KEY" value="{{Auth::user()->pa_api_secret_key}}">
                    </div>
                  </div>                            
                </div>
                <!-- /.card-footer -->
                <h5 class="mt-4 mb-2"><b>・SP-API連携設定</b></h5>
                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-info" id="Rakuten">保管</button>
                  <button type="button" class="btn btn-default float-right">キャンセル</button>
                </div>
                
              </form>
            </div>
            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
              <form class="form-horizontal">
              <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">	店舗ID : </label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="yahoo_shope_id" placeholder="店舗ID" value="{{Auth::user()->yahoo_shope_id}}">
                    </div>
                  </div>                    
                </div>
                <h5 class="mt-4 mb-2"><b>・Yahoo API連携設定</b></h5>
                
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Client ID</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="yahoo_client_id" placeholder="Client ID" value="dj00aiZpPTBmY2hkSjNYbDBUNyZzPWNvbnN1bWVyc2VjcmV0Jng9M2Q-">
                    </div>
                  </div>   
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">シークレット</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="yahoo_sec_key" placeholder="シークレット：" value="MXdvUOj6CU9bl4GdwNRdOddOK6FNheprxm3z4zXi">
                    </div>
                  </div>                               
                </div>
                <input type="button" value="YahooTokenTest" onclick="yahoo_token_test()">                
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-info" id="yahoo">保管</button>
                  <button type="button" class="btn btn-default float-right">キャンセル</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>            
          </div>
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
    function yahoo_token_test(){

      // $.ajax({
      //   method: "POST",
      //   url: "external_save",
      //   data: { 
      //     pa_api_key: $("#pa_api_key").val(), 
      //     pa_api_secret_key: $("#pa_api_secret_key").val()
      //   }
      // })
      // .done(function( msg ) {
      //   alert("データが保存されました。");
      //   console.log(msg);
      // });

      location = 'https://auth.login.yahoo.co.jp/yconnect/v2/authorization?response_type=code&client_id=' + $("#yahoo_client_id").val() + 
	'&redirect_uri=http://127.0.0.1:8000/mypage/yahoo_token&scope=openid';

    }
    var _token = "{{ csrf_token() }}";

    $("#Rakuten").click(function() {
      
      $.ajax({
        method: "POST",
        url: "ecinfo_save",
        data: { 
          pa_api_key: $("#pa_api_key").val(), 
          pa_api_secret_key: $("#pa_api_secret_key").val(), 
          yahoo_shope_id : $("#yahoo_shope_id").val(), 
          yahoo_client_id : $("#yahoo_client_id").val(), 
          yahoo_sec_key : $("#yahoo_sec_key").val(), 

          _token : _token }
      })
      .done(function( msg ) {
        alert("データが保存されました。");
      });

    });

    $("#yahoo").click(function() {
      
      $.ajax({
        method: "POST",
        url: "{{ asset('/mypage/external_save') }}",
        data: {  yahoo_crt: $("#yahoo_crt").val(), yahoo_key: $("#yahoo_key").val(), yahoo_shope_id: $("#yahoo_shope_id").val(), _token : _token }
      })
      .done(function( msg ) {
        
      });

    });
  </script>

@endsection
