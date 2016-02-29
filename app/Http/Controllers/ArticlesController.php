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
use App\Article;


class ArticlesController extends Controller
{
     public function __construct() {
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
    }    
  
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function getIndex()
    {
        $articles = Article::PrepareArticlesForIndex(Article::all());
        return view('articles.index')
            ->with('layout',$this->layout)
            ->with('articles',$articles);

    }
    /**
     * Adds a task 
     *
     * @return Response
     */
    public function getAdd()
    {
        return view('articles.add')
            ->with('layout',$this->layout);
    }  
    /**
     * Process Task Request
     *
     * @return Response
     */
    public function postAdd()
    {       
        $validator = Validator::make(Input::all(), Article::$articles_add);
        if ($validator->passes()) {
            $title = Input::get('title');
            $description = Input::get('content');
            $articles_data = new Article;
            $articles_data->title = $title;
            $articles_data->description = json_encode($description);
            if ($articles_data->save()) {

                $images = Input::get('files');
                $image_name = null;
                if (isset($images) && !empty($images)) {
                    foreach ($images as $imkey => $imvalue) {
                        $array_count = 0;
                        $image_ex_pre = explode(DIRECTORY_SEPARATOR, $imvalue['path']);
                        $array_count = sizeof($image_ex_pre);
                        $image_ex_name_type_pre = $image_ex_pre[$array_count-1];
                        $image_name = $image_ex_name_type_pre;
                    }
                    if (isset($image_name)) {
                        $tmp_path = "assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."articles".DIRECTORY_SEPARATOR."tmp".DIRECTORY_SEPARATOR;
                        $new_path = "assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."articles".DIRECTORY_SEPARATOR."perm".DIRECTORY_SEPARATOR;
                        if (!file_exists($tmp_path)) {
                            mkdir($tmp_path, 0777, true);
                        }               
                        if (!file_exists($new_path)) {
                            mkdir($new_path, 0777, true);
                        }               
                        $oldpath = public_path($tmp_path.$image_name);
                        $newpath = public_path($new_path.$image_name);
                        if (file_exists($tmp_path.$image_name)) {
                            rename($oldpath, $newpath);
                        }   
                        $files = glob($tmp_path.'*'); // get all file names
                        foreach($files as $file){ // iterate files
                          if(is_file($file))
                            unlink($file); // delete file
                        }
                    }
                }
                $articles_data->avatar = $image_name;
                $articles_data->save();
                Flash::success('Successfully added!');
                return Redirect::route('articles_index');
            }
        }
        else {
             // validation has failed, display error messages    
            return Redirect::back()
            ->with('message', 'The following errors occurred')
            ->with('alert_type','alert-danger')
            ->withErrors($validator)
            ->withInput(); 
        } 
        
    }  
    /**
     * /admins/tasks/edit.
     * @param $id - task_id
     * @return Response
     */
    public function getEdit($id = null)
    {
        if (isset($id)) {
            $articles = Article::PrepareForEdit(Article::find($id));
                return view('articles.edit')
                ->with('layout',$this->layout)
                ->with('articles',$articles);
        } else {
            Redirect::back();
        }
    } 
    /**
     * Process Task Edit Request
     *
     * @return Response
     */
    public function postEdit()
    {
        $validator = Validator::make(Input::all(), Article::$articles_add);
        if ($validator->passes()) {
            $id = Input::get('article_id');
            $articles_data = Article::find($id);
            if (isset($articles_data)) {
                $title = Input::get('title');
                $description = Input::get('content');
                $articles_data->title = $title;
                $articles_data->description = json_encode($description);
                if ($articles_data->save()) {
                    $images = Input::get('files');
                    $image_name = null;
                    if (isset($images) && !empty($images)) {
                        foreach ($images as $imkey => $imvalue) {
                            $array_count = 0;
                            $image_ex_pre = explode(DIRECTORY_SEPARATOR, $imvalue['path']);
                            $array_count = sizeof($image_ex_pre);
                            $image_ex_name_type_pre = $image_ex_pre[$array_count-1];
                            $image_name = $image_ex_name_type_pre;
                        }
                        if (isset($image_name)) {
                            $tmp_path = "assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."articles".DIRECTORY_SEPARATOR."tmp".DIRECTORY_SEPARATOR;
                            $new_path = "assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."articles".DIRECTORY_SEPARATOR."perm".DIRECTORY_SEPARATOR;
                            if (!file_exists($tmp_path)) {
                                mkdir($tmp_path, 0777, true);
                            }               
                            if (!file_exists($new_path)) {
                                mkdir($new_path, 0777, true);
                            }               
                            $oldpath = public_path($tmp_path.$image_name);
                            $newpath = public_path($new_path.$image_name);
                            if (file_exists($tmp_path.$image_name)) {
                                rename($oldpath, $newpath);
                            }   
                            $files = glob($tmp_path.'*'); // get all file names
                            foreach($files as $file){ // iterate files
                              if(is_file($file))
                                unlink($file); // delete file
                            }
                        }
                    }
                    $articles_data->avatar = $image_name;
                    $articles_data->save();
                     Flash::success('Successfully added!');
                     return Redirect::route('articles_index');
                }
            }


        }
        else {
             // validation has failed, display error messages    
            return Redirect::back()
            ->with('message', 'The following errors occurred')
            ->with('alert_type','alert-danger')
            ->withErrors($validator)
            ->withInput(); 
        } 
        
    }  
    /**
     * /admins/tasks/view.
     * @param $id - task_id
     * @return Response
     */
    public function getView($id = null)
    {

    } 

    public function postRemove()
    {

    } 

    public function getRemove($id = null)
    {
        if (isset($id)) {
            $article = Article::find($id);
            if (isset($article)) {
                if ($article->delete()) {
                    Flash::success('Successfully Removed!');
                    return Redirect::route('articles_index');
                }
            }
        }
    } 

    public function postAddImages()
    {
        error_reporting(E_ALL | E_STRICT);
        $destinationPath = public_path("assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."articles".DIRECTORY_SEPARATOR."tmp".DIRECTORY_SEPARATOR);
        $savePath = DIRECTORY_SEPARATOR."assets".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."articles".DIRECTORY_SEPARATOR."tmp".DIRECTORY_SEPARATOR;
            // Check if directory is made for this company if not then create a new directory
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0777, true);
        }    
        $files = Input::file('files');
        $fileName = str_random(12).'.jpg';

        // Save image and rename it to new name
        if(Input::file('files')->move($destinationPath, $fileName)){
            return Response::json([
                'success'=>true,
                'path'=> $savePath.$fileName
                ]);
        } else {
            return Response::json([
                'success'=>false,
                'reason'=> 'Error saving image.' 
                ]);
        } 

    }

  
}
