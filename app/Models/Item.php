<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Item extends Model
{
    use HasFactory;

    public function currency()
    {
        return $this->belongsTo(Currency::class, "currency", "currency");
    }

    public static function getItemsWithCurrencyRubPrice($params)
    {
        $category = !empty($params['category']) ? $params['category'] : 3;

        $query = self::join("currencies", "items.currency", "=", "currencies.currency")
            ->select("items.id", "items.name", "items.category", "items.currency", "items.price", DB::raw("items.price * currencies.value AS priceRUB"), "currencies.date AS DATEСurrency")
            ->where("currencies.date", "=", function($query) {
                $query->select(DB::raw("MAX(date)"))
                    ->from("currencies")
                    ->whereRaw("currencies.currency = items.currency")
                    ->limit(1);
            })
            ->where("items.category", "=", $category);

        if(!empty($params['limit'])){
            $query->limit($params['limit']);
        }
        $items = $query->get();

        return $items;
    }

    public static function getItems($params)
    {
        $category = !empty($params['category']) ? $params['category'] : 3;

        $query = self::select("*")
            ->where("items.category", "=", $category);

        if(!empty($params['limit'])){
            $query->limit($params['limit']);
        }
        $items = $query->get();

        return $items;
    }
}
