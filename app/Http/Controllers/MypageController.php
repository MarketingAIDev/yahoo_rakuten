<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Recruitment;
use App\Models\RecruitmentFavourite;
use App\Models\AmazonAddList;
use App\Models\AmazonList;
use App\Models\User;
use App\Models\Benefit;
use App\Models\Profit;
use App\Models\Deliver;
use App\Models\Category;
use App\Models\Item;
use App\Models\PriceRevision;
use App\Models\TimePattern;
use App\Models\UserProductPattern;
use App\Models\CustomPricePattern;
use App\Models\CustomTimePattern;
use App\Models\DefaultPricePattern;
use Revolution\Amazon\ProductAdvertising\Facades\AmazonProduct;

use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class MypageController extends Controller
{  
	public $amazon_category_array = array();

	public function index()
	{        
		$user = Auth::user();
		return view('mypage.dashboard', ['user' => $user]);
		
	}

	public function itemSave(Request $request)
	{
		$res = $request->all();

		$res["user_id"] = Auth::user()->id;
		
		$common_id = Item::select('id')->where('id', $res["sel"])->where('user_id', Auth::user()->id)->get();

		$row = [];
		if($res["ec_kind"] == "yahoo"){
			$row["y_manager_true"] = $res["manager_true"];
			$row["user_id"] = Auth::user()->id;
		}else{
			$row["r_item_url"] = $res["item_url"];
			$row["r_tax_true"] = $res["tax_true"];
			$row["r_manager_true"] = $res["manager_true"];
			$row["user_id"] = Auth::user()->id;
		}

		if(count($common_id) > 0){			
			$sel = $res["sel"];			
			Item::where("id", $sel)->update($row);
			$sel = Item::where("id", $sel)->get();
			echo json_encode($sel);
		}else{			
			$sel = Item::create($row);
			$sel = Item::where("id", $sel["id"])->get();
			echo json_encode($sel);
		}
	}

	public function priceSave(Request $request)
	{
		$res = $request->all();

		$res["user_id"] = Auth::user()->id;
		
		$common_id = Item::select('id')->where('id', $res["sel"])->where('user_id', Auth::user()->id)->get();

		$row = [];
		if($res["ec_kind"] == "yahoo"){
			$row["y_search_kind"] = $res["search_kind"];
			$row["y_point_true"] = $res["point_true"];
			$row["y_deli_true"] = $res["deli_true"];
			$row["y_free_deli_true"] = $res["free_deli_true"];
			$row["y_tracking_shop"] = $res["tracking_shop"];
			$row["y_low_price"] = $res["low_price"];
			$row["y_out_keyword"] = $res["out_keyword"];
			$row["y_out_store_ranking"] = $res["out_store_ranking"];
			$row["y_survey_url"] = $res["survey_url"];
			$row["user_id"] = Auth::user()->id;
		}else{
			$row["r_search_kind"] = $res["search_kind"];
			$row["r_point_true"] = $res["point_true"];
			$row["r_deli_true"] = $res["deli_true"];
			$row["r_free_deli_true"] = $res["free_deli_true"];
			$row["r_tracking_shop"] = $res["tracking_shop"];
			$row["r_low_price"] = $res["low_price"];
			$row["r_out_keyword"] = $res["out_keyword"];			
			$row["r_survey_url"] = $res["survey_url"];
			$row["user_id"] = Auth::user()->id;
		}

		if(count($common_id) > 0){			
			$sel = $res["sel"];			
			Item::where("id", $sel)->update($row);
			$sel = Item::where("id", $sel)->get();
			echo json_encode($sel);
		}else{			
			$sel = Item::create($row);
			$sel = Item::where("id", $sel["id"])->get();
			echo json_encode($sel);
		}

		$pattern = new DefaultPricePattern;
		$shinai = PriceRevision::find(0);

		if($res["ec_kind"] == "yahoo"){
			$sel = $res["sel"];
			$pattern["y_search_kind"] = $res["search_kind"];
			$pattern["y_point_true"] = $res["point_true"];
			$pattern["y_deli_true"] = $res["deli_true"];
			$pattern["y_free_deli_true"] = $res["free_deli_true"];
			// $pattern["y_tracking_shop"] = $res["tracking_shop"];
			// $pattern["y_low_price"] = $res["low_price"];
			// $pattern["y_out_keyword"] = $res["out_keyword"];
			// $pattern["y_out_store_ranking"] = $res["out_store_ranking"];
			// $pattern["y_survey_url"] = $res["survey_url"];
			$pattern["_item_id"] = $res["sel"];
			
			$shinai["mode"] = $res["search_kind"];
			$shinai["pointer"] = $res["point_true"];
			$shinai["post_price"] = $res["deli_true"];
			$shinai["ignore"] = $res["free_deli_true"];
			// $shinai["coupon"] = $res["coupon"];
			// $shinai["same_size"] = $res["same_size"];
			// $shinai["post_price"] = $res["post_price"];
		}else{
			$pattern["r_search_kind"] = $res["search_kind"];
			$pattern["r_point_true"] = $res["point_true"];
			$pattern["r_deli_true"] = $res["deli_true"];
			$pattern["r_free_deli_true"] = $res["free_deli_true"];
			// $pattern["r_tracking_shop"] = $res["tracking_shop"];
			// $pattern["r_low_price"] = $res["low_price"];
			// $pattern["r_out_keyword"] = $res["out_keyword"];			
			// $pattern["r_survey_url"] = $res["survey_url"];
			$pattern["_item_id"] = $res["sel"];

			$shinai["mode"] = $res["search_kind"];
			$shinai["pointer"] = $res["point_true"];
			$shinai["post_price"] = $res["deli_true"];
			$shinai["ignore"] = $res["free_deli_true"];
			// $shinai["coupon"] = $res["coupon"];
			// $shinai["same_size"] = $res["same_size"];
			// $shinai["post_price"] = $res["post_price"];
		}

		$pattern->save();
		$shinai->save();
		return $shinai;
	}

	public function commonSave(Request $request)
	{
		$res = $request->all();
		$res["user_id"] = Auth::user()->id;
		
		$common_id = Item::select('id')->where('id', $res["sel"])->where('user_id', Auth::user()->id)->get();
		if(count($common_id) > 0){			
			$sel = $res["sel"];
			unset($res["sel"]);
			Item::where("id", $sel)->update($res);
			$sel = Item::where("id", $sel)->get();
			echo json_encode($sel);
		}else{
			unset($res["sel"]);
			$sel = Item::create($res);
			$sel = Item::where("id", $sel["id"])->get();
			echo json_encode($sel);
		}
	}

	public function itemAdd()
	{
		$user = Auth::user();
		return view('mypage.item_add', ['user' => $user]);		
	}
	
	public function itemConfirm()
	{
		$user = Auth::user();
		$user->selected_pattern;
		$user->custom_price_pattern;
		$user->custom_time_pattern;
		$items = Item::where('user_id', Auth::user()->id)->paginate(10);
		$timepatterns = TimePattern::all();
		$patterns = PriceRevision::all();
		// return $user;
		return view('mypage.item_list', ['user' => $user, 'items' => $items, 'patterns' => $patterns, 'timepatterns' => $timepatterns]);
	}

	public function savePattern(Request $request) {
		$req = json_decode($request->all()['pattern'], true);
		if ($req['id'] == '' || $req['id'] === 'undefined') {
			$pattern = new PriceRevision;
		} else {
			$pattern = PriceRevision::find($req['id']);
		}
		
		$pattern->display = $req['display'];
		$pattern->name = $req['name'];
		$pattern->color = $req['color'];
		$pattern->mode = $req['mode'];
		$pattern->same_size = $req['same_size'];
		$pattern->pointer = $req['pointer'];
		$pattern->coupon = $req['coupon'];
		$pattern->post_price = $req['post_price'];
		$pattern->ignore = $req['ignore'];
		
		$pattern->save();
	}

	public function getPattern() {
		$patterns = PriceRevision::all();
		$timepatterns = TimePattern::all();
		$user = Auth::user();
		return view('mypage.pattern_setting', ['user' => $user, 'patterns' => $patterns, 'timepatterns' => $timepatterns]);
	}

	public function saveTimePattern(Request $request) {
		$req = json_decode($request->all()['pattern'], true);
		if ($req['id'] == '' || $req['id'] === 'undefined') {
			$pattern = new TimePattern;
		} else {
			$pattern = TimePattern::find($req['id']);
		}

		$pattern->display = $req['display'];
		$pattern->name = $req['name'];
		$pattern->color = $req['color'];
		$pattern->mon = $req['mon'];
		$pattern->tue = $req['tue'];
		$pattern->wed = $req['wed'];
		$pattern->thu = $req['thu'];
		$pattern->fri = $req['fri'];
		$pattern->sat = $req['sat'];
		$pattern->sun = $req['sun'];
		$pattern->open_time = $req['open_time'];
		$pattern->close_time = $req['close_time'];
		$pattern->open_datetime = $req['open_datetime'];
		$pattern->close_datetime =$req['close_datetime'];
		$pattern->is_sale = $req['is_sale'];
		$pattern->pro = $req['pro'];
		$pattern->yen = $req['yen'];

		$pattern->save();
	}

	public function setPattern(Request $request) {
		$req = json_decode($request->all()['pattern'], true);
		$item = UserProductPattern::where('user_id', Auth::user()->id)->where('product_id', $req['product_num'])->where('market_name', $req['market_name'])->first();
		
		if ($item == null) {
			$item = new UserProductPattern;
		}

		$item['user_id'] = Auth::user()->id;
		$item['product_id'] = $req['product_num'];
		$product = Item::find($req['product_num']);

		if (isset($req['price_pattern'])) {
			$item['price_pattern_id'] = $req['price_pattern'];
			if ($req['market_name'] == 'rakuten') {
				$product['r_search_condition'] = $req['price_pattern'];
			} else if ($req['market_name'] == 'yahoo') {
				$product['y_search_condition'] = $req['price_pattern'];
			}
		}
		if (isset($req['time_pattern'])) {
			$item['time_pattern_id'] = $req['time_pattern'];
			if ($req['market_name'] == 'rakuten') {
				$product['r_time_condition'] = $req['time_pattern'];
			} else if ($req['market_name'] == 'yahoo') {
				$product['y_time_condition'] = $req['time_pattern'];
			}
		}
		
		$item['market_name'] = $req['market_name'];

		$item->save();
		$product->save();

		// set item model
		if (isset($req['price_pattern'])) {
			$pattern = PriceRevision::find($req['price_pattern']);
			$item = Item::find($req['product_num']);
			if ($req['market_name'] == 'rakuten') {
				$item['r_search_kind'] = $pattern['mode'];
				$item['r_same_size'] = $pattern['same_size'];
				$item['r_point_true'] = $pattern['pointer'];
				$item['r_coupon'] = $pattern['coupon'];
				$item['r_deli_true'] = $pattern['post_price'];
				$item['r_free_deli_true'] = $pattern['ignore'];
			} else if ($req['market_name'] == 'yahoo') {
				$item['y_search_kind'] = $pattern['mode'];
				$item['y_same_size'] = $pattern['same_size'];
				$item['y_point_true'] = $pattern['pointer'];
				$item['y_coupon'] = $pattern['coupon'];
				$item['y_deli_true'] = $pattern['post_price'];
				$item['y_free_deli_true'] = $pattern['ignore'];
			}
			$item->save();
		}
		// if (isset($req['time_pattern'])) {
		// 	$pattern = TimePattern::find($req['id']);
		// }
		
	}

	public function itemEdit($id) {
		$user = Auth::user();
		$item = Item::find($id);
		return view('mypage.item_edit', ['user' => $user, 'item' => $item]);
	}

	public function external_setting() {
		$user = Auth::user();
		return view('mypage.external_setting', ['user' => $user]);
	}

	public function custom_price_save(Request $request) {
		$user = Auth::user();
		$req = json_decode($request->all()['pattern'], true);
		
		$pattern = CustomPricePattern::where('user_id', $user->id)->first();
		if ($pattern == null) {
			$pattern = new CustomPricePattern;
		}

		$pattern->display = $req['display'];
		$pattern->name = $req['name'];
		$pattern->color = $req['color'];
		$pattern->mode = $req['mode'];
		$pattern->same_size = $req['same_size'];
		$pattern->pointer = $req['pointer'];
		$pattern->coupon = $req['coupon'];
		$pattern->post_price = $req['post_price'];
		$pattern->ignore = $req['ignore'];
		$pattern->user_id = $user->id;
		
		$pattern->save();

		$item = Item::find($req['product_num']);
		if ($req['market_name'] == 'rakuten') {
			$item['r_search_kind'] = $pattern['mode'];
			$item['r_same_size'] = $pattern['same_size'];
			$item['r_point_true'] = $pattern['pointer'];
			$item['r_coupon'] = $pattern['coupon'];
			$item['r_deli_true'] = $pattern['post_price'];
			$item['r_free_deli_true'] = $pattern['ignore'];
		} else if ($req['market_name'] == 'yahoo') {
			$item['y_search_kind'] = $pattern['mode'];
			$item['y_same_size'] = $pattern['same_size'];
			$item['y_point_true'] = $pattern['pointer'];
			$item['y_coupon'] = $pattern['coupon'];
			$item['y_deli_true'] = $pattern['post_price'];
			$item['y_free_deli_true'] = $pattern['ignore'];
		}
		$item->save();

		return $item;
	}

	public function custom_time_save(Request $request) {
		$user = Auth::user();
		$req = json_decode($request->all()['pattern'], true);
		
		$pattern = CustomTimePattern::where('user_id', $user->id)->first();
		if ($pattern == null) {
			$pattern = new CustomTimePattern;
		}

		$pattern->display = $req['display'];
		$pattern->name = $req['name'];
		$pattern->color = $req['color'];
		$pattern->mon = $req['mon'];
		$pattern->tue = $req['tue'];
		$pattern->wed = $req['wed'];
		$pattern->thu = $req['thu'];
		$pattern->fri = $req['fri'];
		$pattern->sat = $req['sat'];
		$pattern->sun = $req['sun'];
		$pattern->open_time = $req['open_time'];
		$pattern->close_time = $req['close_time'];
		$pattern->open_datetime = $req['open_datetime'];
		$pattern->close_datetime =$req['close_datetime'];
		$pattern->is_sale = $req['is_sale'];
		$pattern->pro = $req['pro'];
		$pattern->yen = $req['yen'];
		$pattern->user_id = $user->id;

		$pattern->save();
	}
}
