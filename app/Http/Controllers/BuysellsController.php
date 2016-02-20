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
    public function __construct() {
        if (Auth::user()) {
            switch (Auth::user()->roles) {
                case 1:
                case 2:
                    $this->layout = 'layouts.admins';
                    break;
                default:
                    # code...
                    break;
            }
        }
    }

    public function getIndex()
    {   
        $all = Buysell::PrepareForIndex(Buysell::all());
        return view('buysells.index')
        ->with('layout',$this->layout)
        ->with('all',$all);
    }

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
                $this_method = Paymentmethod::find($adata['method']);
                if (isset($this_method) && Auth::check()) {
                    $setups = Setup::find(1);
                    $wait_hours = $this_method->default_wait_hours?$this_method->default_wait_hours:2;
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
                    $buys->profit_percentage = $setups->buy_percentage?$setups->buy_percentage:0;
                    $buys->wait_hour =  $wait_hours;
                    $buys->user_id =  Auth::user()->id;
                    $buys->type = 1;//buy
                    $buys->status = 1;
                }
                if ($buys->save()) {
                    
                    // if (Mail::send('emails.purchase', array(
                    //     'email' => $email,
                    //     'message_text' => $message_text
                    // ), function($message) use ($email,$message_text)
                    // {
                    //     $message->from('postmaster@webprinciples.com');
                    //     $message->to('pedramkhoshnevis@gmail.com');
                    //     $message->subject('Buy Notification!');
                    // }));
                                //prepare pending table
                    $all_bs = Buysell::PreparePendingTable(Buysell::orderBy('id', 'desc')->where('user_id',Auth::user()->id)->where('status',1)->orWhere('status',2)->get());
                    $status = 200;
                }
            }


            return Response::json(array(
                'status' => $status,
                'hours' => isset($wait_hours)?$wait_hours:null,
                'all_bs' => isset($all_bs)?$all_bs:null,
                'all_count' => isset($all_bs)?count(Buysell::where('user_id',Auth::user()->id)->where('status',1)->get()):null
                ));
        }
    }

     public function postUploadVar()
    {
        if(Request::ajax()){
            $status = 400;
            Job::dump(Input::all());

            return Response::json(array(
                'status' => $status
                ));
        }
    }
}
