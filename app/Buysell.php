<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buysell extends Model
{
	public static $add_roles = array(
        'inventory-title'=>'required',
        'inventory-description'=>'required',
        'price' => 'required'
    );
    static public function PrepareForIndex($all_buynsell) {

    	if(isset($all_buynsell)) {
    		foreach ($all_buynsell as $ackey => $acvalue) {
				if(isset($acvalue['created_at'])) {
					$acvalue['created_at_html'] = date ( 'Y/n/d g:ia',  strtotime($acvalue['created_at']) );
				}    		
				if(isset($acvalue['type'])) {
					switch ($acvalue['type']) {
						case 1:
							$acvalue['type_html'] = 'Buy';
							break;
						case 2:
							$acvalue['type_html'] = 'Sell';
							break;
						
						default:
							$acvalue['type_html'] = 'ERROR';
							break;
					}
				}    		
				if(isset($acvalue['currency'])) {
					switch ($acvalue['currency']) {
						case 1:
							$acvalue['currency_html'] = 'EUR';
							break;
						case 2:
							$acvalue['currency_html'] = 'USD';
							break;
						
						default:
							$acvalue['currency_html'] = 'ERROR';
							break;
					}
				}    		
				if(isset($acvalue['method'])) {
					$methods = Paymentmethod::find($acvalue['method']);
					if (isset($methods)) {
						$acvalue['method_html'] = $methods->title;
					} else {
						$acvalue['method_html'] = 'error';
					}
				}    		
				if(isset($acvalue['status'])) {
					switch ($acvalue['status']) {
						case 1: // Set but not paid
							$acvalue['status_html']= '<span class="label label-info">Not Verified</span>';
							break;
						case 2: // Recieved payment & success
							$acvalue['status_html']= '<span class="label label-primary">Pending</span>';
							break;
						case 3: // Recieved payment & success
							$acvalue['status_html']= '<span class="label label-success">Verified</span>';
							break;
						case 4: // Recieved payment & success
							$acvalue['status_html']= '<span class="label label-warning">Expired</span>';
							break;



						default:
							$acvalue['status_html']= '<span class="label label-default">Deleted</span>';
							break;

					}
				}
			}

    	}

    	return $all_buynsell;
    }
    static public function PreparePendingTable($all_buynsell) {
    	$html_table='';
    	if (isset($all_buynsell)) {
			$html_table .= '	<div class="table-responsive">
								<table class="table"> 
								<thead> 
									<tr> 
									<th>Id</th> 
									<th>Status</th> 
									<th>Total</th> 
									<th>Date</th> 
									<th>Action</th> 
									</tr> 
								</thead> 
								<tbody>';
    		foreach ($all_buynsell as $key => $value) {
				if(isset($value['status'])) {
					switch ($value['status']) {
						case 1: // Set but not paid
							$st = 'Not Verified';
							$tc = 'warning';
							break;
						case 2: // Recieved payment & success
							$st = 'Pending';
							$tc = 'info';
							break;
					}
				}
					 
				$html_table .='
						<tr> 
							<tr class="'.$tc.'"> 
							<th scope="row">'.$value->id.'</th> 
							<td>'.$st.'</td> 
							<td>'.$value->paper_amount.'</td> 
							<td>'.$value->created_at.'</td> 
							<td>action</td> 
						</tr> 
				';
					 
					
    		}
			$html_table .= '</tbody>
							</table>
				</div>';
    	}

    	return $html_table;
    }

}
