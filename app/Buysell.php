<?php

namespace App;
use DateTime;
use DateInterval;

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
   static public function UpdateAllTimers($all_buynsell) {
	   	if (isset($all_buynsell)) {
	   		foreach ($all_buynsell as $bskey => $bsvalue) {
	   			
	   			$this_wait_hour = $bsvalue->wait_hour;
	   			$this_created = $bsvalue->created_at;
				$dt = new DateTime($this_created);
	   			$dt->add(new DateInterval('PT'.$this_wait_hour.'H'));
	   			$dt_new = $dt->format('Y-m-d H:i:s');
	   			$this_string_tt = strtotime($dt_new);
	   			$now_time = time();
	   			if ($this_string_tt<=$now_time) {
	   				$bsvalue->status = 4;
	   			}
	   			$bsvalue->save();
	   		}
	   	}
    }
   //  static public function PreparePendingTable($all_buynsell) {
   //  	$html_table='';
   //  	if (isset($all_buynsell)) {
			// $html_table .= '	<div class="table-responsive">
			// 					<table class="table"> 
			// 					<thead> 
			// 						<tr> 
			// 						<th>Id</th> 
			// 						<th>Total</th> 
			// 						<th>Date</th> 
			// 						<th>Action</th> 
			// 						</tr> 
			// 					</thead> 
			// 					<tbody>';
   //  		foreach ($all_buynsell as $key => $value) {
			// 	if(isset($value['status'])) {
			// 		switch ($value['status']) {
			// 			case 1: // Set but not paid
			// 				$st = 'Not Verified';
			// 				$tc = 'warning';
			// 				break;
			// 			case 2: // Recieved payment & success
			// 				$st = 'Pending';
			// 				$tc = 'info';
			// 				break;
			// 		}
			// 	}
					 
			// 	$html_table .='
			// 			<tr class="'.$tc.' tr-'.$value->id.'"> 
			// 				<th scope="row">'.$st.'</th> 
			// 				<td>'.number_format($value->paper_amount,2).'</td> 
			// 				<td>'.$value->created_at.'</td> 
			// 				<td>';

			// 	if ($value->status == 1) {
			// 		$html_table .= '<form id="form-'.$value->id.'" this-id="'.$value->id.'"  row_id="'.$value->id.'" timer="'.$value->wait_hour.'" class="var-form" action="" method="post" enctype="multipart/form-data">
			// 						<input  type="file" class="pen-file" name="file" id="file" required />
			// 						<button type="submit" class="pen-btn pull-left btn btn-info">submit</button>
			// 					</form>';
			// 	} else {
			// 		$html_table .= 'Submited.';
			// 	}



			// 	$html_table .='</td> 
			// 			</tr> ';
					
   //  		}
			// $html_table .= '</tbody>
			// 				</table>
			// 	</div>';
   //  	}

   //  	return $html_table;
   //  }
    static public function PrepareOrdersTable($all_buynsell) {
    	$html_table='';
    	if (isset($all_buynsell)) {
			$html_table .= '	<div class="table-responsive" style="max-height: 500px;">
								<table class="table"> 
								<thead> 
									<tr> 
									<th>Id</th> 
									<th>Status</th> 
									<th>Total</th> 
									<th>Date</th> 
									<th>Details</th> 
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
						case 3: // Recieved payment & success
							$st = 'Verify';
							$tc = 'success';
							break;
						case 4: // Recieved payment & success
							$st = 'Expired';
							$tc = 'danger';
							break;
					}
				}
					
				$hours_left = null;	
				$this_wait_hour = $value->wait_hour;
	   			$this_created = $value->created_at;
				$dt = new DateTime($this_created);
	   			$dt->add(new DateInterval('PT'.$this_wait_hour.'H'));
	   			$dt_new = $dt->format('Y-m-d H:i:s');
	   			$this_string_tt = strtotime($dt_new);
	   			$now_time = time();
	   			if ($this_string_tt>=$now_time) {
	   				$left_time = $this_string_tt-$now_time;
	   				$hours_left = date( "H:i:s",$left_time) ;
	   			}

				$html_table .='
						<tr class="'.$tc.' tr-'.$value->id.'" this-ref="'.$value->ref.'" this-id="'.$value->id.'" wal-ad="'.$value->wallet_address.'" this-date="'.$value->created_at.'"
						this-total="'.number_format($value->paper_amount,2).'" this-status-html="'.$st.'" this-status="'.$value['status'].'" timer="'.$hours_left.'"> 
							<th scope="row">'.$value->ref.'</th> 
							<td>'.$st.'</td> 
							<td>'.number_format($value->paper_amount,2).'</td> 
							<td>'.$value->created_at.'</td>';
							if ($value['status'] == 1) {
								$html_table .='<td class="pointer order-details upload-img">Upload Image</td>';
							} else {
								$html_table .='<td class="pointer order-details">View Detail</td>';
							}
				$html_table .=	'<td>';
				$html_table .='</td> 
						</tr> ';
    		}
			$html_table .= '</tbody>
							</table>
				</div>';
    	}

    	return $html_table;
    }

}
