<?php

namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Request;
use Route;
use Response;
use Auth;
use URL;
use Mail;
use Session;
use Laracasts\Flash\Flash;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use App\Page;
use App\Layout;
use App\WebsiteBrand;
use App\Setup;
use App\KrakenAPI;
use App\Buysell;
use App\Paymentmethod;
class BuysellsController extends Controller
{
    public function postBuy()
    {
        if(Request::ajax()){
            $status = 400;
            $adata = Input::get('d_a');
            // your api credentials
            $key = 'YDtA/aoJWmyEarzUUKZf8FWwUC7mXVtkVhKaT1khVFjGIoQ7CYxDtxr0';
            $secret = 'S50fivrc/0jjm7IB01/IPUpFiztlfbYLA4xpnTe3KBbaQwaUiFiM8xTBlWqoMWB799UlrlZb5UGtXryRIFJa5A==';
            // set which platform to use (currently only beta is operational, live available soon)
            $beta = true; 
            $url = 'https://api.kraken.com';
            $sslverify = $beta ? false : true;
            $version = 0;
            $kraken = new KrakenAPI($key, $secret, $url, $version, $sslverify);
            // Query a public list of active assets and their properties: 
            $res = $kraken->QueryPublic('Ticker', array('pair' => 'XBTCZEUR'));
            //BUY RATE
            if (isset($res['result']['XXBTZEUR']['a'][0])) {
                $currency_price = $res['result']['XXBTZEUR']['a'][0];

                $paper_amount = $adata['paper_amount'];
                $calc_btc_amount = $paper_amount/$currency_price;

                $buys = new Buysell();
                $buys->currency_price = $currency_price;
                $buys->wallet_address = $adata['wallet_address'];
                $buys->method = $adata['method'];
                $buys->currency = $adata['currency_type'];
                $buys->ps = $adata['message'];
                $buys->paper_amount = $paper_amount;
                $buys->btc_amount = $calc_btc_amount;
                $buys->type = 1;//buy
                $buys->status = 1;

                if ($buys->save()) {
                    $status = 200;
                }
            }

            return Response::json(array(
                'status' => $status
                ));
        }
    }
}
