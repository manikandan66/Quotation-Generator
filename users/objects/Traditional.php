<?php
	class Traditional{
		public static function getTraditionalPrice($db, $qty, $imp){
			try{
				$stmt  = $db->prepare("SELECT * FROM printing_price WHERE qty = :qty");
	        	$stmt->bindparam(":qty", $qty);
				$stmt->execute();
				$row=$stmt->fetch(PDO::FETCH_ASSOC);
				return $row[$imp];
			}catch(PDOException $ex)
			{
				echo $ex->getMessage();
			}
		}
		public static function deleteData($db, $id){
			try{
				$stmt  = $db->prepare("DELETE FROM traditional_data WHERE id = :id");
	        	$stmt->bindparam(":id", $id);
		        $stmt->execute();
				return $stmt;

			}catch(PDOException $ex)
			{
				echo $ex->getMessage();
			}
		}
		public static function getsaveDataTrad($db){
			try{
				$stmt  = $db->prepare("SELECT * FROM traditional_data");
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

		public static function saveDataTrad($db, $cname, $Phone, $dates, $saleperson, $status, $quantity, $impression, $card_price, $print_price, $dtp_chrg, $finishing_amt, $sub_total, $gst, $grand_total, $advance, $balance){
			try{
				$stmt  = $db->prepare("INSERT INTO traditional_data (cname, Phone, dates, saleperson, status, quantity, impression, card_price, print_price, dtp_chrg, finishing_amt, sub_total, gst, grand_total, advance, balance) VALUES (:cname, :Phone, :dates, :saleperson, :status, :quantity, :impression, :card_price, :print_price, :dtp_chrg, :finishing_amt, :sub_total, :gst, :grand_total, :advance, :balance)");

				$stmt->bindparam(":cname", $cname);
                $stmt->bindparam(":Phone", $Phone);
                $stmt->bindparam(":dates", $dates);
                $stmt->bindparam(":saleperson", $saleperson);
                $stmt->bindparam(":status", $status);
                $stmt->bindparam(":quantity", $quantity);
                $stmt->bindparam(":impression", $impression);
                $stmt->bindparam(":card_price", $card_price);
                $stmt->bindparam(":print_price", $print_price);
                $stmt->bindparam(":dtp_chrg", $dtp_chrg);
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