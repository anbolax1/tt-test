<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ItemController extends Controller
{
    public function index()
    {
        $params = [
            'limit' => 10,
            'category' => 3
        ];

        $startTime = microtime(true);

        $items  = Item::getItemsWithCurrencyRubPrice($params);

        $result = [
            'time' => '',
            'result' => []
        ];
        foreach ($items as $item){
            $result['result'][] = [
                'name' => $item->name,
                'category' => $item->category,
                'price' => $item->price,
                'currency' => $item->currency,
                'priceRUB' => $item->priceRUB,
                'dateСurrency' => $item->DATEСurrency,
            ];
        }

        $endTime = microtime(true);
        $executionTime = round($endTime - $startTime, 4);

        $result['time'] = $executionTime;
        $result = json_encode($result, JSON_UNESCAPED_UNICODE);

        dump($result);


        $startTime = microtime(true);

        $result = [
            'time' => '',
            'result' => []
        ];

        $items = Item::getItems($params);
        $currencies = Currency::getCurrencies();
        $currencies = array_column($currencies, null, 'currency');

        foreach ($items as $item) {
            $result['result'][] = [
                'name' => $item->name,
                'category' => $item->category,
                'price' => $item->price,
                'currency' => $item->currency,
                'priceRUB' => $currencies[$item->currency]['value'] * $item->price,
                'dateСurrency' => $currencies[$item->currency]['date'],
            ];
        }

        $endTime = microtime(true);
        $executionTime = round($endTime - $startTime, 4);

        $result['time'] = $executionTime;
        $result = json_encode($result, JSON_UNESCAPED_UNICODE);

        dump($result);
    }
}
