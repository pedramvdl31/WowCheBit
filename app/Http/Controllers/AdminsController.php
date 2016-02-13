<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Input;
use Validator;
use Redirect;
use Hash;
use Route;
use Response;
use Auth;
use URL;
use Session;
use Laracasts\Flash\Flash;
use View;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Job;
use App\User;
use App\Admin;
use App\Role;
use App\RoleUser;
use App\Permission;
use App\PermissionRole;
use App\Setup;
use App\Event;
use App\Paymentmethod;

class AdminsController extends Controller
{
    public function __construct() {
    //     // Define layout

       if (Auth::user()) {
            switch (Auth::user()->roles) {
                case 1:
                    $this->layout = 'layouts.admins';
                    break;
                case 2:
                    $this->layout = 'layouts.admins';
                    break;
                case 3:
                    $this->layout = 'layouts.admins_simple';
                    break;
                
                default:
                    # code...
                    break;
            }
        } 

        Role::AutoFillRoles();

    }
    
    public function getIndex() {

        return view('admins.index')
        ->with('layout','layouts.admins');
    }

    public function getSetProfit() {
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


        $setup_data = Setup::find(1);

        return view('admins.set_profit')
        ->with('layout','layouts.admins')
        ->with('setup_data',$setup_data);
    }

    public function postSetProfit() {
        $validator = Validator::make(Input::all(), Setup::$percentage);
        if ($validator->passes()) {
            $setups = Setup::find(1);
            if (isset($setups)) {
                $setups->sell_percentage = Input::get('sell-profit');
                $setups->buy_percentage = Input::get('buy-profit');
                if ($setups->save()) {
                    Flash::success('Successfully Saved!');
                    return Redirect::route('set_profit');
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



    public function getSimpleIndex() {
        $_layout = 'layouts.admins_simple';
        return view('admins.index')
        ->with('layout',$_layout);
    }

    public function getLogin() {

        $this->layout = 'layouts.master-layout';
        return view('admins.login')
            ->with('layout',$this->layout);
    }

    public function postLogin() {
        $username = Input::get('email');
        $password = Input::get('password');
        // Session::reflash();

        if (Auth::attempt(array('username'=>$username, 'password'=>$password))) {
            Flash::success('Welcome back '.$username.'!');
            // return redirect()->action('AdminsController@getIndex');
            // Check for intended redirect, if not exists then go to default /admins page

            return (Session::has('intended_url')) ? Redirect::to(Session::get('intended_url')) : redirect()->intended('/admins');
        } else { //LOGING FAILED
            Flash::error('Wrong Username or Password!');
            $this->layout = 'layouts.master-layout';
            return view('admins.login')
            ->with('layout',$this->layout);
        }
    }

    public function getLogout() {
        Auth::logout();
        Flash::success('You have successfully been logged out');
        return Redirect::action('AdminsController@getLogin');
    
    }
    public function getViewAcl() {   
        return view('admins.acl_view')
        ->with('layout',$this->layout);
               
    }

    //USERS SETTING
    public function getUsersIndex() {
        $search_by = User::search_by();
        return view('admins.users_setting.index')
         ->with('layout',$this->layout)
         ->with('search_by',$search_by);
    }
    
    public function getUsersAdd() {
        return view('admins.users_setting.add')
         ->with('layout',$this->layout);
    }
    
    public function postUsersAdd() {

    }
    
    public function getUsersEdit($id = null) {
        $users = User::find($id);
        $roles = Role::PerpareRolesForSelect();
        $user_role_id = RoleUser::GetUserRoleId($users->id);
        return view('admins.users_setting.edit')
         ->with('layout',$this->layout)
         ->with('roles',$roles)
         ->with('users',$users)
         ->with('user_role_id',$user_role_id); 
    }
    
    public function postUsersEdit() {

        $username = Input::get('username');
        $fname = Input::get('fname');
        $lname = Input::get('lname');
        $email = Input::get('email');
        $role_id = Input::get('role_id');
        $id = Input::get('id');

        $users = User::find($id);
        $users->username = $username;
        $users->firstname = $fname;
        $users->lastname = $lname;
        $users->roles = $role_id;
        $users->email = $email;

        $role_users = RoleUser::where('user_id',$id)->first();
        $role_users->role_id = $role_id;

        if ($users->save() && $role_users->save()) {
            Flash::success('Successfully Updated');
        } else {
            Flash::Error('Error');
        }
        return Redirect::back();
    }


    public function getPaymentMethodsIndex()
    {   
        $all_payment_methods = Paymentmethod::PrepareForIndex(Paymentmethod::all());
        return view('payment_methods.index')
        ->with('layout',$this->layout)
        ->with('all_payment_methods',$all_payment_methods);
    }

    public function getPaymentMethodsAdd()
    {   
        return view('payment_methods.add')
        ->with('layout',$this->layout);
    }

        public function postPaymentMethodsAdd()
    {   
        $validator = Validator::make(Input::all(), Setup::$paymentmethods);
        if ($validator->passes()) {
            $description = Input::get('description');
            $new_method = new Paymentmethod();
            $new_method->title = Input::get('title');
            $new_method->address = Input::get('address');
            $new_method->description = json_encode($description);
            $new_method->default_wait_hours = Input::get('hours');
            $new_method->status = 1;
            $new_method->type = Input::get('type');
            if ($new_method->save()) {
                Flash::success('Successfully Added');
                return Redirect::route('payment_method_index');
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

        public function getPaymentMethodsEdit($id = null)
    {   
        $payment_methods = Paymentmethod::PreparePaymentMethodsForEdit(Paymentmethod::find($id));
        return view('payment_methods.edit')
        ->with('layout',$this->layout)
        ->with('this_id',$id)
        ->with('data',$payment_methods);
    }

        public function postPaymentMethodsEdit()
    {   
        $validator = Validator::make(Input::all(), Setup::$paymentmethods);
        if ($validator->passes()) {
            $this_id = Input::get('this_id');
            $description = Input::get('description');
            $new_method = Paymentmethod::find($this_id);
            $new_method->title = Input::get('title');
            $new_method->address = Input::get('address');
            $new_method->description = json_encode($description);
            $new_method->default_wait_hours = Input::get('hours');
            $new_method->status = 1;
            $new_method->type = Input::get('type');
            if ($new_method->save()) {
                Flash::success('Successfully Added');
                return Redirect::route('payment_method_index');
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

    public function getPaymentMethodsView($id = null)
    {   

    }

    public function getPaymentMethodsRemove($id = null)
    {   
        $method = Paymentmethod::find($id);
        if (isset($method)) {
            if ($method->delete()) {
                Flash::success("Method Deleted!");
                return Redirect::route('payment_method_index');
            }
        } else {
                Flash::success("Method doesn't exist");
                return Redirect::route('payment_method_index');
        }
    }




}
