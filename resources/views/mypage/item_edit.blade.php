@extends("layouts.mypage")
@section('content')
<?php
$applicationId = "dj00aiZpPVJpRFdoRUdpY3pUaSZzPWNvbnN1bWVyc2VjcmV0Jng9MWE-";
$secret = "jOr0rr7kmvXR9r5T6ERkXfN7KpGTu4vmd8TC8Ahv";

//echo base64_encode($applicationId.":".$secret);

?>
<div class="content-wrapper">  
  <div class="content" style="padding-top: 0.5rem;">
    <div class="col-12">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
          <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-common-tab" data-toggle="pill" href="#custom-tabs-common" role="tab" aria-controls="custom-tabs-common" aria-selected="true">共通項目</a>
            </li>  
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-price-tab" data-toggle="pill" href="#custom-tabs-price" role="tab" aria-controls="custom-tabs-price" aria-selected="false">価格調査用設定</a>
            </li>       
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-config-tab" data-toggle="pill" href="#custom-tabs-config" role="tab" aria-controls="custom-tabs-config" aria-selected="false">反映用設定</a>
            </li>
          </ul>		  
        </div>
		
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade show active" id="custom-tabs-common" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
              <form class="form-horizontal">
                <div class="card-body" style="padding:0px">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">マスターコード<font color="#ff0000">※必須</font></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="master_code" name="master_code" placeholder="マスターコード" value="{{$item['master_code']}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">商品名<font color="#ff0000">※必須</font></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="item_name" name="item_name" placeholder="商品名" value="{{$item['item_name']}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">JAN<font color="#ff0000">※必須</font></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="jan_code" name="jan_code" placeholder="商品名" value="{{$item['jan_code']}}">
                    </div>
                  </div>                  
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">グループ設定</label>
                    <div class="col-sm-10">
                      <select class="form-control" id="group_set" name="group_set">
                        <option value="0"></option>
                        <option value="1" @if ($item['group_set'] == 1) selected @endif>グループ 1</option>
                        <option value="2" @if ($item['group_set'] == 2) selected @endif>グループ 2</option>
                        <option value="3" @if ($item['group_set'] == 3) selected @endif>グループ 3</option>
                        <option value="4" @if ($item['group_set'] == 4) selected @endif>グループ 4</option>
                        <option value="5" @if ($item['group_set'] == 5) selected @endif>グループ 5</option>
                        <option value="6" @if ($item['group_set'] == 6) selected @endif>グループ 6</option>
                        <option value="7" @if ($item['group_set'] == 7) selected @endif>グループ 7</option>
                        <option value="8" @if ($item['group_set'] == 8) selected @endif>グループ 8</option>
                        <option value="9" @if ($item['group_set'] == 9) selected @endif>グループ 9</option>
                        <option value="10" @if ($item['group_set'] == 10) selected @endif>グループ 10</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">メモ</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="memo" name="memo" placeholder="メモ" value="{{$item['memo']}}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">価格</label>
                    <div class="col-sm-10">
                    <table class="table table-bordered">
                      <thead style="text-align: center">
                        <tr>                       
                          <th >モール名</th>
                          <th >下限価格</th>
                          <th >利益率(%)</th>
                          <th >原価</th>
                          <th >上限価格</th>
                          <th >現在価格</th>
                          <th >自社送料</th>
                        </tr>                        
                      </thead>
                      <tbody>
                        <tr>
                          <td>共通</td>
                          <td><input type="number" class="form-control" id="common_low_price" name="common_low_price" placeholder="0" style="width:100%" value="{{$item['common_low_price']}}"></td>
                          <td><input type="number" class="form-control" id="common_pro_price" name="common_pro_price" placeholder="0" style="width:100%" onchange="common_low_price_func()" value="{{$item['common_pro_price']}}"></td>
                          <td><input type="number" class="form-control" id="common_normal_price" name="common_normal_price" placeholder="0" style="width:100%" onchange="common_low_price_func()" value="{{$item['common_normal_price']}}"></td>
                          <td><input type="number" class="form-control" id="common_high_price" name="common_high_price" placeholder="0" style="width:100%" value="{{$item['common_high_price']}}"></td>
                          <td><input type="number" class="form-control" id="common_now_price" name="common_now_price" placeholder="0" style="width:100%" value="{{$item['common_now_price']}}"></td>
                          <td><input type="number" class="form-control" id="common_deli_price" name="common_deli_price" placeholder="0" style="width:100%" value="{{$item['common_deli_price']}}"></td>
                        </tr>
                        <tr>
                          <td>楽天</td>
                          <td><input type="number" class="form-control" id="rakuten_low_price" name="rakuten_low_price" placeholder="0" style="width:100%" value="{{$item['rakuten_low_price']}}"></td>
                          <td><input type="number" class="form-control" id="rakuten_pro_price" name="rakuten_pro_price" placeholder="0" style="width:100%" onchange="rakuten_low_price_func()" value="{{$item['rakuten_pro_price']}}"></td>
                          <td><input type="number" class="form-control" id="rakuten_normal_price" name="rakuten_normal_price" placeholder="0" style="width:100%" onchange="rakuten_low_price_func()" value="{{$item['rakuten_normal_price']}}"></td>
                          <td><input type="number" class="form-control" id="rakuten_high_price" name="rakuten_high_price" placeholder="0" style="width:100%" value="0"></td>
                          <td><input type="number" class="form-control" id="rakuten_now_price" name="rakuten_now_price" placeholder="0" style="width:100%" value="{{$item['rakuten_high_price']}}"></td>
                          <td><input type="number" class="form-control" id="rakuten_deli_price" name="rakuten_deli_price" placeholder="0" style="width:100%" value="{{$item['rakuten_deli_price']}}"></td>
                        </tr>
                        <tr>
                          <td>ヤフー</td>
                          <td><input type="number" class="form-control" id="yahoo_low_price" name="yahoo_low_price" placeholder="0" style="width:100%" value="{{$item['yahoo_low_price']}}"></td>
                          <td><input type="number" class="form-control" id="yahoo_pro_price" name="yahoo_pro_price" placeholder="0" style="width:100%" onchange="yahoo_low_price_func()" value="{{$item['yahoo_pro_price']}}"></td>
                          <td><input type="number" class="form-control" id="yahoo_normal_price" name="yahoo_normal_price" placeholder="0" style="width:100%" onchange="yahoo_low_price_func()" value="{{$item['yahoo_normal_price']}}"></td>
                          <td><input type="number" class="form-control" id="yahoo_high_price" name="yahoo_high_price" placeholder="0" style="width:100%" value="{{$item['yahoo_high_price']}}"></td>
                          <td><input type="number" class="form-control" id="yahoo_now_price" name="yahoo_now_price" placeholder="0" style="width:100%" value="{{$item['yahoo_now_price']}}"></td>
                          <td><input type="number" class="form-control" id="yahoo_deli_price" name="yahoo_deli_price" placeholder="0" style="width:100%" value="{{$item['yahoo_deli_price']}}"></td>
                        </tr>
                      </tbody>						
                    </table>
                    </div>
                  </div>
                </div>
				
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="button" class="btn btn-info float-right" onclick="common_save()">共通項目保存する</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>  

			      <div class="tab-pane fade" id="custom-tabs-price" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
              <form class="form-horizontal">

                <div class="card-body" style="padding:0px">
                  <div class="form-group row">
                    <input type="checkbox" data-toggle="switchbutton" id="ec_kind" data-onlabel="Rakuten" data-offlabel="Yahoo" data-onstyle="success" data-offstyle="danger" width="250px" checked>
                  </div>
                  <div class="form-group row">
                    価格調査方法
                  </div>
                  <div class="form-group row">                                  
                    <div class="col-sm-10" style="padding-top: calc(0.375rem + 1px);">
                      
                      <div class="col-sm-12 form-group clearfix">
                        <div class="col-sm-12 icheck-primary d-inline">
                          <input type="radio" id="search_kind_rakuten" value="1" name="search_kind" checked>
                          <label for="search_kind_rakuten">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                              JANを利用
                            </font></font>
                            <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                          </label>
                        </div>
                        <div class="col-sm-12 icheck-danger d-inline">
                          <input type="radio" id="search_kind_yahoo" value="0" name="search_kind">
                          <label for="search_kind_yahoo">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                              キーワードを利用
                            </font></font>
                            <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                          </label>
                        </div>                                     
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    価格調査対象 <br><font color="#FF0000">※「商品価格」で価格調査が行われます。</font>
                  </div>
                  <div class="row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">ポイント 
                    <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                    </label>
                    <div class="col-sm-10" style="padding-top: calc(0.375rem + 1px);">
                      <div class="col-sm-12 clearfix">
                        <div class="col-sm-12 icheck-primary d-inline">
                          <input type="radio" id="point_true" name="point" value="1" @if ($item['r_point_true'])) checked @endif>
                          <label for="point_true">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            含まない
                            </font></font>                                          
                          </label>
                        </div>
                        <div class="col-sm-12 icheck-danger d-inline">
                          <input type="radio" id="point_false" name="point"  value="0" @if (!$item['r_point_true'])) checked @endif>
                          <label for="point_false">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            含む
                            </font></font>
                          </label>
                        </div>                                     
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">送料  
                    <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                    </label>
                    <div class="col-sm-10" style="padding-top: calc(0.375rem + 1px);">
                      <div class="col-sm-12 form-group clearfix">
                        <div class="col-sm-12 icheck-primary d-inline">
                          <input type="radio" id="deli_true" name="deli" value="1" @if ($item['r_deli_true'])) checked @endif>
                          <label for="deli_true">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            含まない
                            </font></font>                                          
                          </label>
                        </div>
                        <div class="col-sm-12 icheck-danger d-inline">
                          <input type="radio" id="deli_false" name="deli" value="0" @if (!$item['r_deli_true'])) checked @endif>
                          <label for="deli_false">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            含む
                            </font></font>
                          </label>
                        </div>                                     
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">送料無料  
                    <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                    </label>
                    <div class="col-sm-10" style="padding-top: calc(0.375rem + 1px);">
                      <div class="col-sm-12 form-group clearfix">
                        <div class="col-sm-12 icheck-primary d-inline">
                          <input type="radio" id="free_deli_true" name="free_deli" value="1"  @if ($item['r_free_deli_true'])) checked @endif>
                          <label for="free_deli_true">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            含まない
                            </font></font>                                          
                          </label>
                        </div>
                        <div class="col-sm-12 icheck-danger d-inline">
                          <input type="radio" id="free_deli_false" value="0" name="free_deli"@if (!$item['r_free_deli_true'])) checked @endif>
                          <label for="free_deli_false">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            含む
                            </font></font>
                          </label>
                        </div>                                     
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">追尾ショップ
                    <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                    </label>
                    
                    <div class="col-sm-10">
                      <div>
                        <input type="text" class="form-control" id="tracking_shop" name="tracking_shop" placeholder="メモ" value="{{$item['r_tracking_shop']}}">
                      </div>
                      <div style="color:#FF0000" id="tracking_shop_div">
                        ※カンマ区切りで複数登録可<br>
                        ※「https://www.rakuten.co.jp/●●●/」の●●●の部分を入れてください。
                      </div>
                    </div>
                  </div>

                  <div class="form-group">
                    調査除外設定
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">調査下限価格
                    <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                    </label>
                    
                    <div class="col-sm-10">
                      <div>
                        <input type="number" class="form-control" id="low_price" name="low_price" placeholder="調査下限価格" value="{{$item['r_low_price']}}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">調査除外キーワード
                    <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                    </label>                                  
                    <div class="col-sm-10">
                      <div>
                        <input type="text" class="form-control" id="out_keyword" name="out_keyword" placeholder="調査除外キーワード" value="{{$item['r_out_keyword']}}">
                      </div>
                    </div>
                  </div>
                  <div class="form-group row" style="display:none" id="out_store_ranking_div">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">調査除外ストア評価
                    <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                    </label>
                    <div class="col-sm-10">
                      <select class="form-control" id="out_store_ranking" name="out_store_ranking">
                        <option></option>
                        <option @if($item['y_out_store_ranking'] == 1) selected @endif>1</option>
                        <option @if($item['y_out_store_ranking'] == 2) selected @endif>2</option>
                        <option @if($item['y_out_store_ranking'] == 3) selected @endif>3</option>
                        <option @if($item['y_out_store_ranking'] == 4) selected @endif>4</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">調査除外ショップURL
                    <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                    </label>
                    
                    <div class="col-sm-10">
                      <div>
                        <input type="text" class="form-control" id="survey_url" name="survey_url" placeholder="調査除外ショップURL" value="{{$item['r_survey_url']}}">
                      </div>
                      <div style="color:#FF0000" id="survey_url_div">
                        ※カンマ区切りで複数登録可<br>
                        ※「https://www.rakuten.co.jp/●●●/」の●●●の部分を入れてください。
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="button" class="btn btn-info float-right" onclick="price_save()">価格調査用設定する</button>
                </div>			
              </form>
            </div>

            <div class="tab-pane fade" id="custom-tabs-config" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
              <form class="form-horizontal">
                <div class="card-body" style="padding:0px">
                  <div class="form-group row" >
                    <input type="checkbox" data-toggle="switchbutton" checked id="ec_kind_1" data-onlabel="Rakuten" data-offlabel="Yahoo" data-onstyle="success" data-offstyle="danger" width="250px">
                  </div>

                  <div class="form-group row" id="item_url_div">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">商品管理番号（商品URL）
                    <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                    </label>
                    
                    <div class="col-sm-10">
                      <div>
                        <input type="text" class="form-control" id="item_url" name="item_url" placeholder="商品管理番号（商品URL）" value="{{$item['r_item_url']}}">
                      </div>
                    </div>
                  </div>
                  <div class="row" id="tax_div">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">税抜価格反映   
                    <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                    </label>
                    <div class="col-sm-10" style="padding-top: calc(0.375rem + 1px);">
                      <div class="col-sm-12 form-group clearfix">
                        <div class="col-sm-12 icheck-primary d-inline">
                          <input type="radio" id="tax_true" value="1" name="tax" @if ($item['r_tax_true']) checked @endif>
                          <label for="tax_true">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            する
                            </font></font>                                          
                          </label>
                        </div>
                        <div class="col-sm-12 icheck-danger d-inline">
                          <input type="radio" id="tax_false" value="0" name="tax" @if (!$item['r_tax_true']) checked @endif>
                          <label for="tax_false">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            しない
                            </font></font>
                          </label>
                        </div>                                     
                      </div>
                      <div style="color:#FF0000">
                        ※通常は税込価格で反映します。<br>
                        （RMSの消費税設定を「消費税別」で設定している場合のみ使用します。）
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">管理   
                    <i _ngcontent-bso-c80="" placement="right" class="far fa-question-circle tooltip-wide"></i>
                    </label>
                    <div class="col-sm-10" style="padding-top: calc(0.375rem + 1px);">
                      <div class="col-sm-12 form-group clearfix">
                        <div class="col-sm-12 icheck-primary d-inline">
                          <input type="radio" id="manager_true" name="manager" value="1" @if ($item['r_manager_true']) checked @endif>
                          <label for="manager_true">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            する
                            </font></font>                                          
                          </label>
                        </div>
                        <div class="col-sm-12 icheck-danger d-inline">
                          <input type="radio" id="manager_false" value="0" name="manager" @if (!$item['r_manager_true']) checked @endif>
                          <label for="manager_false">
                            <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
                            しない
                            </font></font>
                          </label>
                        </div>
                      </div>
                      <div style="color:#FF0000">
                        ※「対象」を選択した場合、価格更新を開始します。
                      </div>
                    </div>
                  </div>
                  <div class="card-footer">
                    <button type="button" class="btn btn-info float-right" onclick="item_save()">反映用設定保存する</button>
                  </div>
                </div>
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
    var sel = 0;
    var sel_item_info = {
      user_id : '',
      master_code: '',
      item_name: '',
      jan_code: '',
      group_set: '',
      memo: '',

      common_low_price: '',
      common_pro_price: '',
      common_normal_price: '',
      common_high_price: '',
      common_deli_price: '',

      rakuten_low_price: '',
      rakuten_pro_price: '',
      rakuten_normal_price: '',
      rakuten_high_price: '',
      rakuten_deli_price: '',

      yahoo_low_price: '',
      yahoo_pro_price: '',
      yahoo_normal_price: '',
      yahoo_high_price: '',
      yahoo_deli_price: '',

      r_search_kind: '',
      y_search_kind: '',
      r_point_true: 1,
      y_point_true: 1,
      r_deli_true: 1,
      y_deli_true: 1,
      r_free_deli_true: 1,
      y_free_deli_true: 1,
      r_tracking_shop: '',
      y_tracking_shop: '',
      r_low_price: '',
      y_low_price: '',
      r_out_keyword: '',
      y_out_keyword: '',
      y_out_store_ranking: '',
      r_survey_url: '',
      y_survey_url: '',
      
      r_item_url: '',
      r_tax_ture: 1,
      r_manager_ture: 1,
      y_manager_ture: 1
    };

    function yahoo_low_price_func(){     
      $("#yahoo_low_price").val($("#yahoo_normal_price").val() * (1 + $("#yahoo_pro_price").val() / 100));
    }
    function rakuten_low_price_func(){
      $("#rakuten_low_price").val($("#rakuten_normal_price").val() * (1 + $("#rakuten_pro_price").val() / 100));
    }
    function common_low_price_func(){
      $("#common_low_price").val($("#common_normal_price").val() * (1 + $("#common_pro_price").val() / 100));
    }
    function item_save(){
      var ec_kind = "rakuten";
      if($("#ec_kind_1").prop('checked') == false){ 
        ec_kind = "yahoo";
      }

      jQuery.ajax({
          url: "./item_save",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "post",
          data: {
            sel : sel,
            ec_kind : ec_kind,
            item_url : $("#item_url").val(),
            tax_ture : $("input[name=tax]:checked").val(),
            manager_ture : $("input[name=manager]:checked").val(),            

          },
          success: function (response) {   
            alert("保存されました。");

            sel_item_info = jQuery.parseJSON(response)[0];
            sel = sel_item_info.id;

            alert(sel);

          },
          error: function (responseError) {

          },

        });

    }

    function price_save(){
      var ec_kind = "rakuten";

      if($("#ec_kind").prop('checked') == false){ 
        ec_kind = "yahoo";
      }
      
      jQuery.ajax({
          url: "./price_save",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "post",
          data: {
            sel : sel,
            ec_kind : ec_kind,
            search_kind : $("input[name=search_kind]:checked").val(),
            point_true : $("input[name=point]:checked").val(),
            deli_true : $("input[name=deli]:checked").val(),
            free_deli_true : $("input[name=free_deli]:checked").val(),

            tracking_shop : $("#tracking_shop").val(),
            low_price : $("#low_price").val(),
            out_keyword : $("#out_keyword").val(),
            out_store_ranking : $("#out_store_ranking").val(),
            survey_url : $("#survey_url").val(),            

          },
          success: function (response) {   
            alert("保存されました。");
            sel_item_info = jQuery.parseJSON(response)[0];
            sel = sel_item_info.id;
          },
          error: function (responseError) {

          },

        });

    }

    function common_save(){
      
      let addr =  "https://app.rakuten.co.jp/services/api/IchibaItem/Search/20170706?format=json&keyword=" + $("#item_name").val() + "&genreId=555086&applicationId=1006686799015924310";
      $.ajax({
        url: addr,
        type: "get",
        data:{},
        success: function(result) {
          console.log(result);
        }
      });

      if(window.confirm("共通項目を保存しますか？")){

        if($("#master_code").val() == ""){
          alert("マスターコードは必須項目です。")
          return false;
        }
        if($("#item_name").val() == ""){
          alert("商品名は必須項目です。")
          return false;
        }
        if($("#jan_code").val() == ""){
          alert("JANは必須項目です。")
          return false;
        }

        jQuery.ajax({
          url: "./common_save",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          type: "post",
          data: {
            sel : sel,
            master_code : $("#master_code").val(),
            item_name : $("#item_name").val(),
            jan_code : $("#jan_code").val(),
            group_set : $("#group_set").val(),
            memo : $("#memo").val(),

            common_low_price : $("#common_low_price").val(),
            common_pro_price : $("#common_pro_price").val(),
            common_normal_price : $("#common_normal_price").val(),
            common_high_price : $("#common_high_price").val(),
            common_deli_price : $("#common_deli_price").val(),

            rakuten_low_price : $("#rakuten_low_price").val(),
            rakuten_pro_price : $("#rakuten_pro_price").val(),
            rakuten_normal_price : $("#rakuten_normal_price").val(),
            rakuten_high_price : $("#rakuten_high_price").val(),
            rakuten_deli_price : $("#rakuten_deli_price").val(),

            yahoo_low_price : $("#yahoo_low_price").val(),
            yahoo_pro_price : $("#yahoo_pro_price").val(),
            yahoo_normal_price : $("#yahoo_normal_price").val(),
            yahoo_high_price : $("#yahoo_high_price").val(),
            yahoo_deli_price : $("#yahoo_deli_price").val(),

          },
          success: function (response) {   
            alert("保存されました。");
            sel_item_info = jQuery.parseJSON(response)[0];
            sel = sel_item_info.id;
          },
          error: function (responseError) {

          },
        });
      }
    }

    $('#ec_kind_1').change(function() {
      //item_url_div
      if($(this).prop('checked') == false){ 
        $("#item_url_div").attr('style', 'display : none');
        $("#tax_div").attr('style', 'display : none');
       
        $("input[name=manager][value=" + sel_item_info.y_manager_ture + "]").prop('checked', true);
       
      }else{
        $("#item_url_div").attr('style', 'display : ""');
        $("#tax_div").attr('style', 'display : ""');
        
        if(sel_item_info.r_manager_ture == null)sel_item_info.r_manager_ture = 1;
        $("input[name=manager][value=" + sel_item_info.r_manager_ture + "]").prop('checked', true);
        if(sel_item_info.r_tax_ture == null)sel_item_info.r_tax_ture = 1;
        $("input[name=tax][value=" + sel_item_info.r_tax_ture + "]").prop('checked', true);
      }

      console.log(sel_item_info);
    });

    $('#ec_kind').change(function() {
      
      if($(this).prop('checked') == false){      
        
        $("#out_store_ranking_div").attr('style', 'display : ""');
        $("#tracking_shop_div").html('※カンマ区切りで複数登録可<br>※「https://store.shopping.yahoo.co.jp/●●●/」の●●●の部分を入れてください。');
        $("#survey_url_div").html('※カンマ区切りで複数登録可<br>※「https://store.shopping.yahoo.co.jp/●●●/」の●●●の部分を入れてください。');
        
      }else{
       
        $("#out_store_ranking_div").attr('style', 'display : none');
        $("#tracking_shop_div").html('※カンマ区切りで複数登録可<br>※「https://www.rakuten.co.jp/●●●/」の●●●の部分を入れてください。');
        $("#survey_url_div").html('※カンマ区切りで複数登録可<br>※「https://www.rakuten.co.jp/●●●/」の●●●の部分を入れてください。');
      }
    })
  </script>
@endsection
