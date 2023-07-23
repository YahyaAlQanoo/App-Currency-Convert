<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index()
    {
        // Response Countries And Currency Symbol
        $symbols = Http::get('https://api.apilayer.com/fixer/symbols?apikey=ne4LE73O5prf5okT5ODEQIvffR60J1IY');
 dd($symbols);
        $currency["USD"] = '';
        $currency["ILS"] = '';
        $currency["JOD"] = '';
        $currency["EGP"] = '';
        $currency["AED"] = '';
        $currency["EUR"] = '';


         return view('index',[
            'countries' => $symbols,
            'currency' => $currency,
            'currency_code' => ''

        ]);
    }

    public function store(Request $request)
    {
        $currency_code = $request->currency; 
        $count = $request->number; 

        // Response Currency Convert 
        $currency = Http::get('https://api.apilayer.com/fixer/latest?symbols=USD,ILS,JOD,EGP,AED,EUR&base='. $currency_code .'&apikey=ne4LE73O5prf5okT5ODEQIvffR60J1IY');
        $currency = $currency["rates"];

        // Response Countries And Currency Symbol
        $symbols = Http::get('https://api.apilayer.com/fixer/symbols?apikey=ne4LE73O5prf5okT5ODEQIvffR60J1IY');


        return view('index',[
            'currency' => $currency,
            'count' => $count,
            'countries' => $symbols,
            'currency_code' =>$currency_code
        ]);

    }
}
