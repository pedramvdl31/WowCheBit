<?php

namespace App\Http\Controllers;
use Input;
use Validator;
use Redirect;
use Hash;
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
use App\Thread;
use App\Category;
use App\Search;
use App\Inventory;
use App\Page;
use App\Layout;
use App\Invoice;
use App\Event;
use App\WebsiteBrand;
use App\Like;
use App\Setup;
use App\KrakenAPI;

class HomeController extends Controller
{
    public function __construct() {
        $this->layout = "layouts.index-layouts.index";
        //CHECK IF THE HOMEPAGE IS SET
    }

    public function getSetPreferedLayoutSession($layout_title=null,$id=null)
    {
        $data = [];
        $error = true;
        if (isset($layout_title,$id)) {
            $data['layout_title'] = $layout_title;
            $data['layout_id'] = $id;
            $error = false;
        } 
        Session::forget('prefered_layout_session');
        Session::put('prefered_layout_session',$data);

        if (Session::get('_previous')) {
            $route_ = Session::get('_previous');
            return Redirect::to($route_['url']);
            $error = false;
        } 
        if ($error == true) {
            return Redirect::route('home_index');
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */

        public function getHomePage()
    {


        $setups = Setup::find(1);
        if (!isset($setups)) {
            $new_setups = new Setup;
            $new_setups->sell_percentage = 0;
            $new_setups->buy_percentage = 0;
            $new_setups->save();
        } else {
            if (!isset($setups->sell_percentage)) {
                $setups->sell_percentage = 0;
                $setups->save();
            }
            if (!isset($setups->buy_percentage)) {
                $setups->buy_percentage = 0;
                $setups->save();
            }      
        }




        $buy = 0;
        $sell = 0;

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
        if (isset($res['result']['XXBTZEUR']['a'])) {
            $buy = $res['result']['XXBTZEUR']['a']['0'];
        }
        //SELL RATE
        if (isset($res['result']['XXBTZEUR']['b'])) {
            $sell = $res['result']['XXBTZEUR']['b']['0'];
        }

        $setup_data = Setup::find(1);
        $sell_percentage = $setup_data->sell_percentage / 100;
        $buy_percentage = $setup_data->buy_percentage / 100;

        $sell_percentage_calc = $sell_percentage * $sell;
        $buy_percentage_calc = $buy_percentage * $buy;

        $final_sell = $sell_percentage_calc + $sell;
        $final_buy = $buy_percentage_calc + $buy;


        $new_buy = number_format($final_buy,2);
        $new_sell = number_format($final_sell,2);

        $layout_title = 'layouts.customize';
        $pages = Page::take(1)->first();
        if (isset($pages)) {
            $prefered_layout_set = null;
            $all_categories = Category::where('status',1)->get();
            $layout_titles = Layout::PrepareLayout(Layout::select('title','id')->take(3)->get());
            $slider_images = Page::PareparePageSlider($pages);
            $param1_lowered = $pages->param_one;
            $prefered_layout_set = Layout::CheckUserPreferedLayout();
            $all_inventories = Inventory::PrepareInventoriesForIndex(Inventory::orderBy('order')
                                    ->where('status',1)->get(),$prefered_layout_set);
            $likes_count = count(Like::get());
            $likes_count += 14;

            return view('home.homepage')
            ->with('layout',$layout_title)
            ->with('all_categories',$all_categories)
            ->with('all_inventories',$all_inventories)
            ->with('slider_images',$slider_images)
            ->with('layout_titles',$layout_titles)
            ->with('param1_lowered',$param1_lowered)
            ->with('prefered_layout',$prefered_layout_set)
            ->with('is_home',1)
            ->with('likes_count',$likes_count)
            ->with('buy',$new_buy)
            ->with('sell',$new_sell)
            ->with('slider_option',$pages->slider_option);
        }
    }



    public function postUpdateData()
    {
        if(Request::ajax()){
            $status = 400;
            $last = 0;
            $high = 0;
            $low = 0;
            $volume = 0;
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

            if (isset($res)) {
                $status = 200;
            }

            if (isset($res['result']['XXBTZEUR']['a'])) {
                $last = $res['result']['XXBTZEUR']['a']['0'];
            }
            if (isset($res['result']['XXBTZEUR']['h'])) {
                $high = $res['result']['XXBTZEUR']['h']['1'];
            }
            if (isset($res['result']['XXBTZEUR']['l'])) {
                $low = $res['result']['XXBTZEUR']['l']['1'];
            }
            if (isset($res['result']['XXBTZEUR']['v'])) {
                $volume = number_format($res['result']['XXBTZEUR']['v']['1'],2);
            }

            return Response::json(array(
                'status' => $status,
                'last' => $last,
                'high' => $high,
                'low' => $low,
                'volume' => $volume,

                ));
        }
    }

    public function postSendEmail()
    {
        if(Request::ajax()){
            $status = 400;
            $email = Input::get('email');
            $message_text = Input::get('message');

            if (Mail::send('emails.send_message', array(
                        'email' => $email,
                        'message_text' => $message_text
                    ), function($message) use ($email,$message_text)
                    {
                        $message->from('postmaster@webprinciples.com');
                        $message->to('pedramkhoshnevis666@yahoo.com');
                        $message->subject('Message from Your Website!');
                    })) {
                $status = 200;
            }
            return Response::json(array(
                'status' => $status
                ));
        }
    }
}
