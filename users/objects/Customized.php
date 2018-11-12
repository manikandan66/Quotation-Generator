<?php 
	class Customized{
		public static function getPriceBySize($db, $card_size, $board_type, $print_side){
			try{
				$stmt  = $db->prepare("SELECT * FROM customized_card WHERE card_size = :card_size AND card_side = :card_side");
	        	$stmt->bindparam(":card_size", $card_size);
	        	$stmt->bindparam(":card_side", $print_side);
		        $stmt->execute();
				$row=$stmt->fetch(PDO::FETCH_ASSOC);
				return $row[$board_type];

			}catch(PDOException $ex)
			{
				echo $ex->getMessage();
			}
		}

		public static function getFinishingChrg($db, $finishing_id){
			try{
				$stmt  = $db->prepare("SELECT * FROM finishing_chrg WHERE id = :id");
	        	$stmt->bindparam(":id", $finishing_id);

		        $stmt->execute();
				$row=$stmt->fetch(PDO::FETCH_ASSOC);
				return $row['charge'];

			}catch(PDOException $ex)
			{
				echo $ex->getMessage();
			}
		}
		public static function deleteData($db, $id){
			try{
				$stmt  = $db->prepare("DELETE FROM customized_data WHERE id = :id");
	        	$stmt->bindparam(":id", $id);
		        $stmt->execute();
				return $stmt;

			}catch(PDOException $ex)
			{
				echo $ex->getMessage();
			}
		}
		public static function getFinishing($db){
			try{
				$stmt  = $db->prepare("SELECT * FROM finishing_chrg");
	        	$stmt->execute();
	        	$finishing = array();
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					$finishing[] = $row;
				}
				return $finishing;

			}catch(PDOException $ex)
			{
				echo $ex->getMessage();
			}
		}
		public static function getsaveDataCust($db){
			try{
				$stmt  = $db->prepare("SELECT * FROM customized_data");
	        	$stmt->execute();
	        	$savedata = array();
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
					$savedata[] = $row;
				}
				return $savedata;

			}catch(PDOException $ex)
			{
				echo $ex->getMessage();
			}
		}
		public static function addFinishing($db, $service, $price){
			try{
				$stmt  = $db->prepare("INSERT INTO finishing_chrg(name, charge) VALUES(:service, :price)");
				$stmt->bindparam(":service", $service);
                $stmt->bindparam(":price", $price);
	        	$stmt->execute();
	        	return $stmt;
			}catch(PDOException $ex)
			{
				echo $ex->getMessage();
			}
		}
		
		public static function saveDataCust($db, $cname, $Phone, $dates, $saleperson, $status, $quantity, $card_price, $design_chrg, $lamination, $finishing_amt, $sub_total, $gst, $grand_total, $advance, $balance){
			try{
				$stmt  = $db->prepare("INSERT INTO customized_data (cname, Phone, dates, saleperson, status, quantity, card_price, design_chrg, lamination, finishing_amt, sub_total, gst, grand_total, advance, balance) VALUES (:cname, :Phone, :dates, :saleperson, :status, :quantity, :card_price, :design_chrg, :lamination, :finishing_amt, :sub_total, :gst, :grand_total, :advance, :balance)");

				$stmt->bindparam(":cname", $cname);
                $stmt->bindparam(":Phone", $Phone);
                $stmt->bindparam(":dates", $dates);
                $stmt->bindparam(":saleperson", $saleperson);
                $stmt->bindparam(":status", $status);
                $stmt->bindparam(":quantity", $quantity);
                $stmt->bindparam(":card_price", $card_price);
                $stmt->bindparam(":design_chrg", $design_chrg);
                $stmt->bindparam(":lamination", $lamination);
                $stmt->bindparam(":finishing_amt", $finishing_amt);
                $stmt->bindparam(":sub_total", $sub_total);
                $stmt->bindparam(":gst", $gst);
                $stmt->bindparam(":grand_total", $grand_total);
                $stmt->bindparam(":advance", $advance);
                $stmt->bindparam(":balance", $balance);
	        	$stmt->execute();
	        	return $stmt;
			}catch(PDOException $ex)
			{
				echo $ex->getMessage();
			}
		}
	}
?>