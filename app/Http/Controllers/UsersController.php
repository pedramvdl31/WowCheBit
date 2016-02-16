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
use App\RoleUser;
use App\QuestionsNAnswer;
use App\Review;

class UsersController extends Controller
{
    public function __construct() {
        // // THIRD TEMPLATE
        $this->layout = "layouts.default";

    }

    public function getRegistration()
    {
        $country_code = Job::country_code();
        return view('users.registration')
        ->with('country_code',$country_code)
        ->with('layout',$this->layout);
    }
    public function postRegistration()
    {
        $validator = Validator::make(Input::all(), User::$registration);
        if ($validator->passes()) {
            $rand_sting = Job::generateRandomString(25);
            $rand = Request::root().'/verify-email/'.$rand_sting;
            $mailer_return = Job::VerificationMailer(Input::get('email'),$rand);

            $user = new User;
            $user->roles = 5;
            $user->status = 2;
            $user->email = Input::get('email');
            $user->username = Input::get('email');
            $user->wallet_address = Input::get('wallet_address');
            $user->varification_token = $rand_sting;
            $user->password = Hash::make(Input::get('password')); 
             if($user->save()) { // Save the user and redirect to owners home
                //ASSIGN LEVEL TWO ACL (GUESTS)
                $new_rule = new RoleUser;
                $new_rule->role_id = 5;
                $new_rule->user_id = $user->id;
                if($new_rule->save()) {
                    if (Auth::attempt(array('username'=> $user->username, 'password'=>Input::get('password')))) {
                        $redirect = (Session::get('redirect')) ? Session::get('redirect') : null; 
                        if(isset($redirect)) {
                            Flash::success('You have successfully been registered as '.$user->username.'!');
                            return Redirect::to(Session::get('redirect'));
                        } else {
                            Flash::success('You have successfully been registered as '.$user->username.'!');
                            //SESION DOESN'T EXIST
                            return Redirect::route('home_index');
                        }
                    }
                }
            }

        } else {
            // validation has failed, display error messages    
            return Redirect::back()
            ->with('message', 'The following errors occurred')
            ->with('alert_type','alert-danger')
            ->withErrors($validator)
            ->withInput();
        }

    }
    public function getLogin()
    {
        return view('users.login')
        ->with('layout',$this->layout);
    }
    public function postLogin()
    {
        $username = Input::get('username');
        $password = Input::get('password');

        if (Auth::attempt(array('username'=>$username, 'password'=>$password))) {
            Flash::success('Welcome back '.$username.'!');
            return redirect()->action('HomeController@postIndex');
        } else { //LOGING FAILED
            if (isset($direct_login)) {
                return view('users.login')
                    ->with('layout',$this->layout)
                    ->with('wrong',1);
            } else {
                return view('users.login')
                    ->with('layout',$this->layout)
                    ->with('wrong',1); 
            }
        }
    }   
 
    public function postLoginModal()
    {
        $username = Input::get('username');
        $password = Input::get('password');
        if (Auth::attempt(array('username'=>$username, 'password'=>$password))) {
            $redirect = (Session::get('redirect_flash')) ? Session::get('redirect_flash') : null; 
            if(isset($redirect)) {
                Flash::success('Welcome back '.$username.'!');
                return Redirect::to($redirect);
            } else { //SESSION DOESN'T EXIST
                return Redirect::action('HomeController@getHomepage');
            }
        } else { //LOGIN FAILED
            return view('users.login')
                ->with('layout',$this->layout)
                ->with('wrong',1); 
        }
    }
    public function getLogout()
    {
            Auth::logout();
            return Redirect::action('HomeController@getHomepage');
    }
    public function postLogout()
    {
        Auth::logout();
        return Redirect::action('HomeController@getHomepage');
    }

    public function getProfile($username)
    {
        if (Auth::user()->username == $username) {
            $categories_for_select = Category::prepareForSelect(Category::where('status',1)->get());
            $categories_for_side = Category::prepareForSide(Category::where('status',1)->get());
            $current_user = User::find(Auth::user()->id);
            $profile_image = Job::imageValidator($current_user->profile_image);
            $email = $current_user->email;
            $fname = $current_user->firstname;
            $lname = $current_user->lastname;
            return view('users.profile')
            ->with('layout',$this->layout)
            // ->with('threads',$prepared_thread)
            ->with('categories_for_select',$categories_for_select)
            ->with('categories_for_side',$categories_for_side)
            ->with('profile_image',$profile_image)        
            ->with('email',$email)
            ->with('fname',$fname)
            ->with('lname',$lname);
        } else {
            abort(404);
        }
    }
    public function postProfile()
    {
        $validator = Validator::make(Input::all(), User::updatevalidation());
        if ($validator->passes()) {
            $user = User::find(Auth::user()->id);
            $user->firstname = Input::get('fname');
            $user->lastname = Input::get('lname');
            if ($user->save()) {
                Flash::success('Profile Successfully Updated');
                return Redirect::action('UsersController@getProfile',$user->username);
            //     $redirect = (Session::get('redirect')) ? Session::get('redirect') : null; 
            //     if(isset($redirect)) {
            //        return Redirect::to(Session::get('redirect'));
            //    } else {
            //         //SESION DOESN'T EXIST
            //     return Redirect::to('/');
            // }
        }
    } else {
            // validation has failed, display error messages    
        return Redirect::back()
        ->with('message', 'The following errors occurred')
        ->with('alert_type','alert-danger')
        ->withErrors($validator)
        ->withInput();
    }
}

public function postValidate()
{
    
    $reg_form = null;
    parse_str(Input::get('reg_form'), $reg_form);

    $validation_results = Job::validate_data($reg_form);
    if(Request::ajax()){
        return Response::json(array(
            'status' => 200,
            'validation_callback' => $validation_results
            ));
    }
}



public function postUserAuth()
{
    if(Request::ajax()){
        $status = 400;
        if (Auth::check()) {
            $status = 200;
        }
        return Response::json(array(
            'status' => $status
            ));
    }
}

public function postSendFile()
{
    if(Request::ajax()){
        $status = 400;
        $imagePath = public_path(DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."profile-images".DIRECTORY_SEPARATOR."perm".DIRECTORY_SEPARATOR);
        $imagename = $_FILES[0]['name'];
        $imagetemp = $_FILES[0]['tmp_name'];
        $image_ex = explode('.', $imagename);
        $image_type = $image_ex[1];
        $now_time = time();
        $new_imagename = $now_time . '-' . $imagename[0];
            // check if $folder is a directory
        if( ! \File::isDirectory($imagePath) ) {
                // Params:
                // $dir = name of new directory
                //
                // 493 = $mode of mkdir() function that is used file File::makeDirectory (493 is used by default in \File::makeDirectory
                //
                // true -> this says, that folders are created recursively here! Example:
                // you want to create a directory in company_img/username and the folder company_img does not
                // exist. This function will fail without setting the 3rd param to true
                // http://php.net/mkdir  is used by this function

            \File::makeDirectory($imagePath, 493, true);
        }
        if (!is_writable(dirname($imagePath))) {
            Job::dump('DIRECTORY IS NOT WRITEABLE');
            $status = 401;
            return Response::json(array(
                "error" => 'Destination Unwritable'
                ));
        } else {

            $final_path = preg_replace('#[ -]+#', '-', $new_imagename);

            if (move_uploaded_file($imagetemp, $imagePath . $final_path.'.'.$image_type)) {
                $status = 200;
                    //SAVE THE NEW IMAGE NAME INTO USERS TABLE
                $user = User::find(Auth::user()->id);
                    //DELETE USERS PREVIOUS IMAGE
                if ($user->profile_image != 'blank_male.png') {
                    $old_image = public_path(DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."profile-images".DIRECTORY_SEPARATOR."perm".DIRECTORY_SEPARATOR.$user->profile_image);
                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }
                }

                $user->profile_image = $final_path.'.'.$image_type;
                $db_imagepath = null;
                if ($user->save()) {
                 $db_imagepath = $user->profile_image;
             }
             return Response::json(array(
                'status' => 'success',
                "image_name" => $new_imagename,
                "image_type" => $image_type
                ));
         }
     }
     return Response::json(array(
        'error' => 'error'
        ));
 }
}

public function postSendFileTemp()
{
    if(Request::ajax()){
            // $imagePath = "img/tmp/";
        $status = 400;
        $imagePath = public_path(DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."profile-images".DIRECTORY_SEPARATOR."tmp".DIRECTORY_SEPARATOR);
        $imagename = $_FILES[0]['name'];
        $imagetemp = $_FILES[0]['tmp_name'];

        $image_ex = explode('.', $imagename);
        $image_type = $image_ex[1];

        $now_time = time();
        $new_imagename = $now_time . '-' . $imagename[0];
            // check if $folder is a directory
        if( ! \File::isDirectory($imagePath) ) {

                // Params:
                // $dir = name of new directory
                //
                // 493 = $mode of mkdir() function that is used file File::makeDirectory (493 is used by default in \File::makeDirectory
                //
                // true -> this says, that folders are created recursively here! Example:
                // you want to create a directory in company_img/username and the folder company_img does not
                // exist. This function will fail without setting the 3rd param to true
                // http://php.net/mkdir  is used by this function

            \File::makeDirectory($imagePath, 493, true);
        }
        if (!is_writable(dirname($imagePath))) {
            $status = 401;
            return Response::json(array(
                "error" => 'Destination Unwritable'
                ));
        } else {
            $final_path = preg_replace('#[ -]+#', '-', $new_imagename);
            if (move_uploaded_file($imagetemp, $imagePath . $final_path.'.'.$image_type)) {
                $status = 200;
                return Response::json(array(
                    'status' => 'success',
                    "image_name" => $new_imagename,
                    "image_type" => $image_type
                    ));
            }
        }
        return Response::json(array(
            'error' => 'error'
            ));

    }
}
public function postReturnUsers()
{
    if(Request::ajax()){
        $status = 400;
        if (Auth::check()) {
            $search = Input::get('search');
            $users = array();
            $status = 200;
            $message = 'Successfully found users!';
            if($search) {
                foreach ($search as $key => $value) {
                    $type = $key;
                    switch ($type) {
                        case 'name':
                        $first_name = $value['first_name'];
                        $last_name = $value['last_name'];
                        $users = User::where('firstname','LIKE','%'.$first_name.'%')
                            ->where('lastname','LIKE','%'.$last_name.'%')
                            ->get();

                        if(count($users) == 0){
                            $status = 401;
                            $message = 'No such name.';
                        }
                        break;
                        default:
                        foreach ($value as $column_name => $column_value) {
                            $users = User::where($column_name,'LIKE','%'.$column_value.'%')->get();
                        }

                        if(count($users) == 0) {
                            $status = 401;
                            $message = 'No such user';
                        }
                        break;
                    }
                }
            }

            $users_tbody = User::PrepareUsersData($users);
            return Response::json(array(
                'status' => $status,
                'message' => $message,
                'users_tbody'   => $users_tbody
                ));
        }
    }
}
public function postInvoiceUsers()
{
    if(Request::ajax()){
        $status = 400;
        if (Auth::check()) {
            $search = Input::get('search');
            $users = array();
            $status = 200;
            $message = 'Successfully found users!';
            if($search) {
                foreach ($search as $key => $value) {
                    $type = $key;
                    switch ($type) {
                        case 'name':
                        $first_name = $value['first_name'];
                        $last_name = $value['last_name'];
                        $users = User::where('firstname','LIKE','%'.$first_name.'%')
                            ->where('lastname','LIKE','%'.$last_name.'%')
                            ->get();

                        if(count($users) == 0){
                            $status = 401;
                            $message = 'No such name.';
                        }
                        break;
                        default:
                        foreach ($value as $column_name => $column_value) {
                            $users = User::where($column_name,'LIKE','%'.$column_value.'%')->get();
                        }

                        if(count($users) == 0) {
                            $status = 401;
                            $message = 'No such user';
                        }
                        break;
                    }
                }
            }
            $user_data = ['users_tbody' => '', 'user' => '']; 
            $user_data['users_tbody'] = User::PrepareUsersDataInvoice($users);
            $user_data['user'] = $users;
            return Response::json(array(
                'status' => $status,
                'message' => $message,
                'user_data'   => $user_data
                ));
        }
    }
}

public function postUserInfo()
{
    if(Request::ajax()){
        $status = 400;
        if (Auth::check()) {
            $id = Input::get('id');
            $users = User::find($id);
            if (isset($users)) {
                $status = 200;
            }
            return Response::json(array(
                'status' => $status,
                'users' => $users
                ));
        }
    }
}


public function postUsersAuthCheck()
{
    if(Request::ajax()){
        $status = 400;
        if (Auth::check()) {
            $status = 200;
        }
        return Response::json(array(
        'status' => $status
        ));
    }
}

public function postUsersAuthCheckReview()
{
    if(Request::ajax()){
        $status = 400;
        if (Auth::check()) {
            $inventory_id = Input::get('inventory_id');
            $p_reviews = Review::where('user_id',Auth::user()->id)->where('inventory_id',$inventory_id)->first();
            $status = isset($p_reviews)?201:200;
        }
        return Response::json(array(
        'status' => $status
        ));
    }
}

    public function getEmailVerify($id=null)
    {
        $user = User::where('varification_token',$id)->first();
        if (isset($user)) {
            $user->status = 1;
            $user->varification_token = 'expired';
            $user->save();
            Flash::success('Thank you for verifying your email.');
        } else {
            Flash::Error('This link has been expired');
        }
        
        return Redirect::route('home_index');
    }

    public function postUpdateProfile()
    {
        if(Request::ajax()){
            $status = 400;
            if (Auth::check()) {
                $wa = Input::get('wa');
                $tu = User::find(Auth::user()->id);
                if (isset($tu)) {
                    $tu->wallet_address = $wa;
                    if ($tu->save()) {
                        $status = 200;
                    }
                }
            }
            return Response::json(array(
            'status' => $status
            ));
        }
    }




}
