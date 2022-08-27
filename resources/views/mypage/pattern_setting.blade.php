@extends("layouts.mypage")
@section('content')
<style>
td, th {
  text-align: center;
  vertical-align: middle !important;
}
</style>

<div class="content-wrapper">  
  <div class="content" style="padding-top: 0.5rem;">
    <div class="col-12">
      <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
          <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="price-tab" data-toggle="pill" href="#price" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">価格改定</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="time-tab" data-toggle="pill" href="#time" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">タイムセール</a>
            </li>
          </ul>     
        </div>
          
        <div class="card-body">
          <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade show active" id="price" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab" style="overflow: auto; max-height: 600px;">
              <table class="table table-bordered table-hover" id="patternTable">
                <thead style="position: sticky; top: -1px; background: white; z-index: 2;">
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
                <tbody>
                  @foreach($patterns as $pattern)
                  @if ($pattern['user_id'] != $user['id'] && $pattern['user_id'] != 0)
                    @continue
                  @endif
                  <tr>
                    <td data-field="id-num" style="display: none;">
                      <input type="hidden" name="id-num" value="{{$pattern['id']}}">
                    </td>
                    <td onclick="savePattern(event)"><span><i class="fa fa-save"></i></span></td>
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
                      <input type="text" maxlength="10" name="name" value="{{$pattern['name']}}" />
                      @else
                      <input type="text" maxlength="10" name="name" />
                      @endif
                    </td>
                    <td data-field="color">
                      <input type="color" name="color" value="{{$pattern['color']}}" />
                    </td>
                    <td data-field="mode" style="text-align: left;">
                      <div class="form-check" style="line-height: 1;">
                        <input class="form-check-input" type="radio" name="{{'mode'.$pattern['id']}}" value="0" @if ($pattern['mode'] == '0') checked @endif >
                        <label class="form-check-label">JAN</label>
                      </div>

                      <div class="form-check" style="line-height: 1;">
                        <input class="form-check-input" type="radio" name="{{'mode'.$pattern['id']}}" value="1" @if ($pattern['mode'] == '1') checked @endif />
                        <label class="form-check-label">キーワード</label>
                      </div>

                      <div class="form-check" style="line-height: 1;">
                        <input class="form-check-input" type="radio" name="{{'mode'.$pattern['id']}}" value="2" @if ($pattern['mode'] == '2') checked @endif />
                        <label class="form-check-label">自社商品</label>
                      </div>
                    </td>
                    <td data-field="same_size">
                      <input type="checkbox" name="same_size" @if ($pattern['same_size']) checked @endif />
                    </td>
                    <td data-field="pointer">
                      <input type="checkbox" name="pointer" @if ($pattern['pointer']) checked @endif />
                    </td>
                    <td data-field="coupon">
                      <input type="checkbox" name="coupon" @if ($pattern['coupon']) checked @endif />
                    </td>
                    <td data-field="post_price">
                      <input type="checkbox" name="post_price" @if ($pattern['post_price']) checked @endif />
                    </td>
                    <td data-field="ignore">
                      <input type="checkbox" name="ignore" @if ($pattern['ignore']) checked @endif />
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>

            <div class="tab-pane fade show" id="time" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab" style="overflow: auto; max-height: 600px;">
              <table class="table table-bordered table-hover" id="time-pattern-table">
                <thead style="position: sticky; top: -1px; background: white; z-index: 2;">
                  <tr>
                    <th rowspan="1" colspan="1" style="display: none;">id</th>
                    <th rowspan="1" colspan="1">操作</th>
                    <th rowspan="1" colspan="1">並替</th>
                    <th rowspan="1" colspan="1">表示</th>
                    <th rowspan="1" colspan="1">名称</th>
                    <th rowspan="1" colspan="1">表示色</th>
                    <th rowspan="1" colspan="7">曜日</th>
                    <th rowspan="1" colspan="1">時間帯</th>
                    <th rowspan="1" colspan="1">日時</th>
                    <th rowspan="1" colspan="1" style="width: 100px !important;">指定時間<br/>のみ販売</th>
                    <th rowspan="1" colspan="1">価格変更<br/>・円</th>
                    <th rowspan="1" colspan="1">価格変更<br/>・％</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($timepatterns as $pattern)
                  @if ($pattern['user_id'] != $user['id'] && $pattern['user_id'] != 0)
                    @continue
                  @endif
                  <tr>
                    <td data-field="id-num" style="display: none;">
                      <input type="hidden" name="id-num" value="{{$pattern['id']}}" />
                    </td>

                    <td onclick="saveTimePattern(event)">
                      <span><i class="fa fa-save"></i></span>
                    </td>

                    <td>
                      <span><i class="fa fa-sort"></i></span>
                    </td>

                    <td>
                      <input type="checkbox" name='time-display' @if ($pattern['display']) checked @endif />  
                    </td>

                    <td>
                      <input type="text" name='time-name' value="{{$pattern['name']}}" style="width: 100px;" />
                    </td>

                    <td>
                      <input type="color" name='time-color' value="{{$pattern['color']}}" />
                    </td>

                    <td style="border-right: 1px solid transparent;">
                      <input type="checkbox" name="time-mon" @if ($pattern['mon']) checked @endif onclick="sync(event)" />
                      <label for="time-mon">月</label>
                    </td>

                    <td style="border-right: 1px solid transparent;">
                      <input type="checkbox" name="time-tue" @if ($pattern['tue']) checked @endif onclick="sync(event)"/>
                      <label for="time-tue">火</label>
                    </td>

                    <td style="border-right: 1px solid transparent;">
                      <input type="checkbox" name="time-wed" @if ($pattern['wed']) checked @endif onclick="sync(event)" />
                      <label for="time-wed">水</label>
                    </td>
                    
                    <td style="border-right: 1px solid transparent;">
                      <input type="checkbox" name="time-thu" @if ($pattern['thu']) checked @endif onclick="sync(event)" />
                      <label for="time-thu">木</label>
                    </td style="border: 1px solid transparent;">
                    
                    <td style="border-right: 1px solid transparent;">
                      <input type="checkbox" name="time-fri" @if ($pattern['fri']) checked @endif onclick="sync(event)" />
                      <label for="time-fri">金</label>
                    </td>
                    
                    <td style="border-right: 1px solid transparent;">
                      <input type="checkbox" name="time-sat" @if ($pattern['sat']) checked @endif onclick="sync(event)" />
                      <label for="time-sat">土</label>
                    </td>
                    
                    <td>
                      <input type="checkbox" name="time-sun" @if ($pattern['sun']) checked @endif onclick="sync(event)" />
                      <label for="time-sun">日</label>
                    </td>

                    <td>
                      <div>
                        <label for="appt">開始:</label>
                        <input type="time" name="time-open" value="{{$pattern['open_time']}}" onchange="sync(event)" />
                      </div>
                      <div>
                        <label for="appt">終了:</label>
                        <input type="time" name="time-close" value="{{$pattern['close_time']}}" onchange="sync(event)" />
                      </div>
                    </td>

                    <td>
                      <div>
                        <label for="appt">開始:</label>
                        <input type="datetime-local" name="time-dateopen" value="{{$pattern['open_datetime']}}" onchange="sync(event)" />
                      </div>
                      <div>
                        <label for="appt">終了:</label>
                        <input type="datetime-local" name="time-dateclose" value="{{$pattern['close_datetime']}}" onchange="sync(event)" />
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
            </div>
          </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
          <button type="button" class="btn btn-info float-right" id="addPattern">パータン追加</button>
        </div>
        <!-- /.card-footer -->
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
      $("#patternTable")[0].parentElement.style.maxHeight = window.innerHeight - 250 + "px";
      $("#time-pattern-table")[0].parentElement.style.maxHeight = window.innerHeight - 250 + "px";
			
      $("#addPattern").on("click", function() {
        if ($(".tab-pane.active").attr('id') == 'price') {
          let newRow = 
            '<tr>' + 
              '<td data-field="id-num" style="display: none;"><input type="hidden" name="id-num" value="" /></td>' + 
              '<td onclick="savePattern(event)"><span><i class="fa fa-save"></i></span></td>' +
              '<td data-field="order"><span><i class="fa fa-sort"></i></span></td>' + 
              '<td data-field="display"><input type="checkbox" name="display" /></td>' + 
              '<td data-field="name"><input type="text" name="name" /></td>' + 
              '<td data-field="color"><input type="color" name="color" /></td>' + 
              '<td data-field="mode" style="text-align: left;">' + 
                '<div  class="form-check" style="line-height: 1;">' + 
                  '<input class="form-check-input" type="radio" name="mode" value="jan" />' + 
                  '<label class="form-check-label">JAN</label>' + 
                '</div>' +
                '<div  class="form-check" style="line-height: 1;">' + 
                  '<input class="form-check-input" type="radio" name="mode" value="keyword" />' +
                  '<label class="form-check-label">キーワード</label>' +
                '</div>' +
                '<div  class="form-check" style="line-height: 1;">' + 
                  '<input class="form-check-input" type="radio" name="mode" value="self" />' + 
                  '<label class="form-check-label">自社商品</label>' + 
                '</div>' + 
              '</td>' + 
              '<td data-field="same_size"><input type="checkbox" name="same_size" /></td>' + 
              '<td data-field="pointer"><input type="checkbox" name="pointer" /></td>' + 
              '<td data-field="coupon"><input type="checkbox" name="coupon" /></td>' + 
              '<td data-field="post_price"><input type="checkbox" name="post_price" /></td>' + 
              '<td data-field="ignore"><input type="checkbox" name="ignore" /></td>' + 
            '</tr>';
          $('#patternTable').append(newRow);
        } else if ($(".tab-pane.active").attr('id') == 'time') {
          let newRow = 
            '<tr>' + 
              '<td data-field="id-num" style="display: none;">' + 
                '<input type="hidden" name="id-num" value="">' + 
              '</td>' + 

              '<td onclick="saveTimePattern(event)">' +
                '<span><i class="fa fa-save"></i></span>' + 
              '</td>' +

              '<td>' +
                '<span><i class="fa fa-sort"></i></span>' +
              '</td>' +

              '<td>' +
                '<input type="checkbox" name="time-display">' +
              '</td>' +
              
              '<td>' +
                '<input type="text" name="time-name" value="" style="width: 100px;" />' +
              '</td>' +

              '<td>' +
                '<input type="color" name="time-color" value="" />' +
              '</td>' +

              '<td>' +
                '<input type="checkbox" name="time-mon" />' +
                '<label for="time-mon">月</label>' +
              '</td>' + 

              '<td>' +
                '<input type="checkbox" name="time-tue" />' +
                '<label for="time-tue">火</label>' +
              '</td>' + 

              '<td>' +  
                '<input type="checkbox" name="time-wed" />' +
                '<label for="time-wed">水</label>' +
              '</td>' + 

              '<td>' +  
                '<input type="checkbox" name="time-thu" />' +
                '<label for="time-thu">木</label>' +
              '</td>' + 

              '<td>' +    
                '<input type="checkbox" name="time-fri" />' +
                '<label for="time-fri">金</label>' +
              '</td>' + 

              '<td>' +  
                '<input type="checkbox" name="time-sat" />' +
                '<label for="time-sat">土</label>' +
              '</td>' + 

              '<td>' +  
                '<input type="checkbox" name="time-sun" />' +
                '<label for="time-sun">日</label>' +
              '</td>' +

              '<td>' +
                '<div>' +
                  '<label for="appt">開始:</label>' +
                  '<input type="time" name="time-open">' +
                '</div>' +
                '<div>' +
                  '<label for="appt">終了:</label>' +
                  '<input type="time" name="time-close">' +
                '</div>' +
              '</td>' +

              '<td>' +
                '<div>' +
                  '<label for="appt">開始:</label>' +
                  '<input type="datetime-local" name="time-dateopen">' +
                '</div>' +
                '<div>' +
                  '<label for="appt">終了:</label>' +
                  '<input type="datetime-local" name="time-dateclose">' +
                '</div>' +
              '</td>' +

              '<td>' +
                '<div>' +
                  '<input type="checkbox" name="time-sale">' +
                  '<label for="time-sale">' +
                  '</label>' +
                '</div>' +
              '</td>' +

              '<td>' +
                '<input type="number" name="time-yen" style="width: 70px;" value="0" />' +
                '<label>円</label>' +
              '</td>' +

              '<td>' +
                '<input type="number" name="time-pro" style="width: 70px;" value="0" />' +
                '<label>%</label>' +
              '</td>' +
            '</tr>';
          $('#time-pattern-table').append(newRow);
        } else {

        } 
      });
    });

    var sPage = "1";
    function item_add() {
      location.href = "./item_add";
    }

    const savePattern = (e) => {
      let siblings = $(e.currentTarget).siblings();
      let postData = {
        id: siblings[0].children[0].value,
        // display: siblings[2].children[0].checked,
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

      if (!confirm("データを保存しますか？")) {
        return;
      } else {
        $.ajax({
          url:'/mypage/price/pattern/save',
          type: "post",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            pattern: JSON.stringify(postData)
          },
          success: function(result, status, xhr) {
            // location.href = './pattern_setting';
            alert("パターンが正常に保存されました");
          },
        });
      }
    };

    const saveTimePattern = (e) => {
      let siblings = $(e.currentTarget).siblings();
      let postData = {
        id: siblings[0].querySelector('input[name="id-num"]').value,
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

      if (!confirm("データを保存しますか？")) {
        return;
      } else {
        $.ajax({
          url:'/mypage/price/time_pattern/save',
          type: "post",
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: {
            pattern: JSON.stringify(postData)
          },
          success: function(result, status, xhr) {
            // location.href = './pattern_setting';
            alert("パターンが正常に保存されました");
          },
        });
      }
    };

    const sync = (e) => {
      // if (e.target.type == 'checkbox' || e.target.type == 'time') {
      //   if ($(e.target).parents('tr')[0].querySelector('input[name^="time-"]:checked')) {
      //     $(e.target).parents('td').siblings()[13].querySelector('input[type="datetime-local"]').disabled = true;
      //   }
      // } else if (e.target.type == 'date-timeheckbox') {
      //   $(e.target).parents('td').siblings()[13].querySelector('input[type="datetime-local"]').disabled = false;
      //   $(e.target).parents('td').siblings()[12].children.style.disabled = true;
      //   $(e.target).parents('td').siblings()[13].children.style.disabled = true;
      // }
    }
  </script>
  
@endsection

