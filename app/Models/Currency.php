<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Currency extends Model
{
    const CURRENCY_USD = "USD";
    const CURRENCY_EUR = "EUR";
    use HasFactory;

    public static function getCurrencies()
    {
        $currencies = self::whereIn('currency', function ($query) {
            $query->select('currency')
                ->from('currencies')
                ->groupBy('currency')
                ->havingRaw('date = MAX(date)');
        })->get()->toArray();
        return $currencies;
    }
}
