<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paymentmethod extends Model
{
    static public function PrepareForIndex($all_methods) {

    	if(isset($all_methods)) {
    		foreach ($all_methods as $ackey => $acvalue) {
				if(isset($acvalue['created_at'])) {
					$acvalue['created_at_html'] = date ( 'Y/n/d g:ia',  strtotime($acvalue['created_at']) );
				}    		
				if(isset($acvalue['status'])) {

					if ($acvalue['status'] == 3) {
						$acvalue['status_message']= '<span class="label label-danger">Deleted</span>';
					} else {
						$this_date = strtotime($acvalue->event_date);
			    		$now_time = time();
			    		if ($this_date > $now_time) {
			    			$acvalue['status_message']= '<span class="label label-success">Active</span>';
			    		} else {
			    			$acvalue['status_message']= '<span class="label label-warning">Ended</span>';
			    		}
					}
				}
			}

    	}

    	return $all_methods;
    }

    
    static public function PrepareForHome($all_methods) {


        if(isset($all_methods)) {
            foreach ($all_methods as $ackey => $acvalue) {
                if(isset($acvalue['created_at'])) {
                    $acvalue['created_at_html'] = date ( 'Y/n/d g:ia',  strtotime($acvalue['created_at']) );
                }           
                if(isset($acvalue['description'])) {
                    $acvalue['description_html'] = json_decode($acvalue['description']);
                }           

            }

        }

        return $all_methods;
    }

    static public function PreparePaymentMethodsForEdit($event) {

    	if(isset($event)) {
                if(isset($event['created_at'])) {
                    $event['created_at_html'] = date ( 'Y/n/d g:ia',  strtotime($event['created_at']) );
                }
                if(isset($event['description'])) {
                	$event['decoded_description'] = json_decode($event['description']);
                }           
          
    	}

    	return $event;
    }

    public static function PerparePaymentMethodSelect() {
        $data =  Paymentmethod::all();
        $ps = array(''=>'Select Payment Method');
        if(isset($data)) {
            foreach ($data as $dkey => $dvalue) {
                
                $idd = $dvalue->id;
                $title = $dvalue['title'];
                $ps[$idd] = $title.' ('.$dvalue->address.')' ; 
            }

        }
        return $ps;
    }
}
