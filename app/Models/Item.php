<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = '_items';

    protected $fillable = [
        'user_id',
        'img_url',
        'master_code',
        'item_name',
        'jan_code',
        'group_set',
        'memo',

        'common_low_price',
        'common_pro_price',
        'common_normal_price',
        'common_high_price',
        'common_deli_price',

        'rakuten_low_price',
        'rakuten_pro_price',
        'rakuten_normal_price',
        'rakuten_high_price',
        'rakuten_deli_price',

        'yahoo_low_price',
        'yahoo_pro_price',
        'yahoo_normal_price',
        'yahoo_high_price',
        'yahoo_deli_price',

        'r_search_kind',
        'y_search_kind',
        'r_same_size',
        'y_same_size',
        'r_point_true',
        'y_point_true',
        'r_coupon',
        'y_coupon',
        'r_deli_true',
        'y_deli_true',
        'r_free_deli_true',
        'y_free_deli_true',
        'r_tracking_shop',
        'y_tracking_shop',
        'r_low_price',
        'y_low_price',
        'r_out_keyword',
        'y_out_keyword',
        'y_out_store_ranking',
        'r_survey_url',
        'y_survey_url',

        'r_item_url',
        'r_tax_ture',
        'r_manager_ture',
        'y_manager_ture',

        'r_search_condition',
        'y_search_condition',
        'r_time_condition',
        'y_time_condition',
        'r_shop_list',
        'y_shop_list',
        'r_real_low_price',
        'y_real_low_price'
    ];
}
