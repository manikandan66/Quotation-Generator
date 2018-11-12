<?php
	include('../users/includes/init.php');
	if(isset($_POST['card_type'])){
		$card_type = $_POST['card_type'];
		$Phone = $_POST['Phone'];
		$dates = $_POST['dates'];
		$quantity = $_POST['quantity'];
		$card_size = $_POST['card_size'];
		$board_type = $_POST['board_type'];
		$print_side = $_POST['print_side'];
		$design_chrg = $_POST['design_chrg'];
		$finishing = @$_POST['finishing'];
		$cname = $_POST['cname'];
		$saleperson = $_POST['saleperson'];
		$status = $_POST['status'];
		$advance = $_POST['advance'];
		$save = $_POST['save'];
		if($card_type == "Customized"){

			if($board_type == "Matt"){
				$board_type="matt_price";
			}else if($board_type == "Texture"){
				$board_type="texture_price";
			}

			if($print_side == "Single"){
				$print_side = 1;
			}else if($print_side == "Double"){
				$print_side = 2;
			}

			if($card_size !="VISITING CARD"){
				if($quantity<=200){
					$lamination = $quantity*6;
				}else if($quantity<=300){
					$lamination = $quantity*4;
				}else if($quantity<=400){
					$lamination = $quantity*3;
				}else if($quantity<=500){
					$lamination = $quantity*2.5;
				}else{
					$lamination = $quantity*2;
				}
			}
			
			$card_price = Customized::getPriceBySize($db, $card_size, $board_type, $print_side);
			$card_price = $card_price*$quantity;
		}else if($card_type=="Traditional"){
			$impression = $_POST['impression'].'imp';
			$dtp_chrg = $_POST['dtp_chrg'];
			$per_card_price = $_POST['card_price'];
			$print_price = Traditional::getTraditionalPrice($db, $quantity, $impression);
			$card_price = $per_card_price*$quantity;

		}

		if(!empty($finishing)){
			foreach($finishing AS $value){
				$finishing_chg[] = Customized::getFinishingChrg($db, $value);
			}

			$finishing_amt = array_sum($finishing_chg);
			$finishing_amt = $finishing_amt * $quantity;
		}

		$sub_total = $card_price+@$lamination+@$finishing_amt;

		if($card_type == "Customized"){
			$sub_total = $sub_total+$design_chrg;
		}else{
			$sub_total = $sub_total+$dtp_chrg+$print_price;
		}
		$gst = $sub_total*12/100;
		$grand_total = $sub_total + $gst; 
		$balance = $grand_total - $advance;
		if ($save == "save") {
			if ($card_type == "Traditional" && !empty($print_price ) && !empty($finishing_amt) && !empty($impression)) {
				Traditional::saveDataTrad($db, $cname, $Phone, $dates, $saleperson, $status, $quantity, $impression, $card_price, $print_price, $dtp_chrg, $finishing_amt, $sub_total, $gst, $grand_total, $advance, $balance);
				echo "Successfully Saved";
			}
			elseif ($card_type == "Customized" && !empty($lamination) && !empty($design_chrg)) {
				Customized::saveDataCust($db, $cname, $Phone, $dates, $saleperson, $status, $quantity, $card_price, $design_chrg, $lamination, $finishing_amt, $sub_total, $gst, $grand_total, $advance, $balance);
				echo "Successfully Saved";
			}
		}
		elseif ($save == "estimate")
		{
			$card_response = '<tr><th>Customer Name</th><td>'.$cname.'</td></tr>';
			$card_response .= '<tr><th>Phone No</th><td>'.$Phone.'</td></tr>';
			$card_response .= '<tr><th>Date</th><td>'.$dates.'</td></tr>';
			$card_response .= '<tr><th>Sales Person</th><td>'.$saleperson.'</td></tr>';
			$card_response .= '<tr><th>Status</th><td>'.$status.'</td></tr>';
			$card_response .= '<tr><th>Card Price</th><td>'.$card_price.'</td></tr>';
			if(!empty($print_price ) && $card_type == "Traditional"){
				$card_response .= '<tr><th>Printing Charge</th><td>'.$print_price.'</td></tr>';
			}
			if(!empty($design_chrg ) && $card_type == "Customized"){
				$card_response .= '<tr><th>Design Charge</th><td>'.$design_chrg.'</td></tr>';
			}
			if(!empty($dtp_chrg) && $card_type == "Traditional"){
				$card_response .= '<tr><th>DTP Charge</th><td>'.$dtp_chrg.'</td></tr>';
			}
			if(!empty($lamination)){
				$card_response .= '<tr><th>Lamination Charge</th><td>'.$lamination.'</td></tr>';
			}

			if(!empty($finishing_amt)){
				$card_response .= '<tr><th>Finishing Charge</th><td>'.$finishing_amt.'</td></tr>';
			}
			$card_response .= '<tr><th>Subtotal</th><td>'.$sub_total.'</td></tr>';
			$card_response .= '<tr><th>GST(12%)</th><td>'.$gst.'</td></tr>';
			$card_response .= '<tr><th>TOTAL</th><td><b>Rs.'.$grand_total.'</b></td></tr>';	
			if ($advance > 0) {
				$card_response .= '<tr><th>Advance</th><td><b>Rs.'.$advance.'</b></td></tr>';
				$card_response .= '<tr><th>Balance</th><td><b>Rs.'.$balance.'</b></td></tr>';
			}
			echo $card_response;
		}
	}

	if(isset($_POST['quotation'])){
		$finishings = Customized::getFinishing($db);
		
		foreach ($finishings as $key => $value) {
			echo '<div class="col-sm-3">
	    		<label class="checkbox-inline">
	      		<input type="checkbox" name="finishing" class="input" id="finishing" value='.$value['id'].'>'.$value['name'].' -Rs.'.$value['charge'].'
	    		</label>
	    	</div>';
		}
	}

	if(isset($_POST['add_finishing'])){
		$service = $_POST['service'];
		$price = $_POST['price'];

		if(Customized::addFinishing($db, $service, $price)){
			echo "Success";
		}
	}
?>