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
use Session;
use Laracasts\Flash\Flash;
use View;
use Mail;

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
            ->with('slider_option',$pages->slider_option);
        }
    }

    public function getEvents()
    {
        $events = Event::PrepareEventsForEventPage();
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.events')
        ->with('layout',$layout_title)
        ->with('events',$events);
    }

    public function getCalendar()
    {
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.calendar')
        ->with('layout',$layout_title);
    }

    public function getVideos()
    {
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.videos')
        ->with('layout',$layout_title);
    }

    public function getPrema()
    {
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.prema')
        ->with('layout',$layout_title);
    }
    public function getJo()
    {
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.jo')
        ->with('layout',$layout_title);
    }    
    public function getJean()
    {
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.jean')
        ->with('layout',$layout_title);
    }    
    public function getBbtr()
    {
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.bbtr')
        ->with('layout',$layout_title);
    }
    public function getBbtrSession()
    {
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.bbtr_session')
        ->with('layout',$layout_title);
    }
    public function getCocoon()
    {
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.cocoon')
        ->with('layout',$layout_title);
    }
    public function getCocoonModality()
    {
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.cocoon_modality')
        ->with('layout',$layout_title);
    }
    public function getCocoonMassage()
    {
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.cocoon_massage')
        ->with('layout',$layout_title);
    }

    public function getGiten()
    {
        $layout_title = 'layouts.customize';
        return view('pages.website_pages.giten')
        ->with('layout',$layout_title);
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
