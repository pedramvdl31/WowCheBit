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
use App\Search;
use App\Page;
use App\Layout;
use App\WebsiteBrand;
use App\Setup;
use App\KrakenAPI;
use App\Paymentmethod;
use App\Buysell;

class BuysellsController extends Controller
{
    public function postBuy()
    {
        if(Request::ajax()){
            $status = 400;
            $adata = Input::get('d_a');

            $currency_price = $adata['currency_price'];
            $amount = $adata['buy_amount'];
            $total = $amount * $currency_price;

            $buys = new Buysell();
            $buys->total = $total;
            $buys->currency_price = $currency_price;
            $buys->wallet_address = $adata['wallet_address'];
            $buys->method = $adata['method'];
            $buys->qty = $amount;
            $buys->currency = $adata['currency_type'];
            $buys->ps = $adata['message'];
            $buys->type = 1;//buy
            $buys->status = 1;

            if ($buys->save()) {
                $status = 200;
            }

            return Response::json(array(
                'status' => $status
                ));
        }
    }
}
