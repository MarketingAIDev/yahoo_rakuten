@extends("layouts.mypage")
@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h2 class="m-0">出品価格設定</h2>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">設定</a></li>
            <li class="breadcrumb-item active">出品価格設定</li>
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
              <a class="nav-link active" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Yahoo設定</a>
            </li>           
          </ul>
        </div>
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
              <form class="form-horizontal">
                <h5 class="mt-4 mb-2"><b>Amazonの販売価格 X 増加率(%) = Yahooの販売価格</b></h5>
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">増加率(%)</label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="yahoo_pro" name="yahoo_pro" placeholder="1.0" value="{{Auth::user()->yahoo_pro}}">
                    </div>
                  </div>                                 
                </div>
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
    var _token = "{{ csrf_token() }}";

    $("#yahoo").click(function() {
      
      $.ajax({
        method: "POST",
        url: "external_save",
        data: { yahoo_pro: $("#yahoo_pro").val(), _token : _token }
      })
      .done(function( msg ) {
        
      });

    });
    
  </script>

@endsection

