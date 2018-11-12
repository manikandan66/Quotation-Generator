<?php 
	include('users/includes/init.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
	  	<title>That1Card | Quotation</title>
	  	<?php include('templates/header.php'); ?>
	</head>
	<body>
		<div class="container">
			<br>
			<form class="form-horizontal" action="/action_page.php" id="quotation-form">
				<div class="form-group">
			      	<label class="control-label col-sm-2" for="cname">Customer Name:</label>
					<div class="col-sm-10">
			        	<input class="form-control input" type="text" name="cname" id="cname">
			      	</div>
    			</div>
    			<div class="form-group">
			      	<label class="control-label col-sm-2" for="Phone">Customer Phone:</label>
					<div class="col-sm-10">
			        	<input class="form-control input" type="text" name="Phone" id="Phone">
			      	</div>
    			</div>
    			<div class="form-group">
			      	<label class="control-label col-sm-2" for="dates">Select Date:</label>
					<div class="col-sm-10">
			        	<input class="form-control input" type="date" name="dates" id="dates">
			      	</div>
    			</div>
    			<div class="form-group">
			      	<label class="control-label col-sm-2" for="saleperson">Sales Person:</label>
			      	<div class="col-sm-10">
			        	<select class="form-control input" name="saleperson" id="saleperson">
			        		<option>Prasanth</option>
			        		<option>Durgesh Kumar</option>
			        		<option>Prabhu</option>
			        		<option>Jayashree</option>
			        		<option>Bharath</option>
			        		<option>Manikandan</option>
			        	</select>
			      	</div>
    			</div>
    			<div class="form-group">
			      	<label class="control-label col-sm-2" for="status">Status:</label>
			      	<div class="col-sm-10">
			        	<select class="form-control input" name="status" id="status">
			        		<option>Lead</option>
			        		<option>Converted</option>
			        	</select>
			      	</div>
    			</div>
    			<div class="form-group">
    				<label class="control-label col-sm-2" for="advance">Advance Amount:</label>
    				<div class="col-sm-10">
    					<input class="form-control input" type="text" name="advance" id="advance">
    				</div>
    			</div>
				<div class="form-group">
			      	<label class="control-label col-sm-2" for="card_type">Card Type:</label>
			      	<div class="col-sm-10">
			        	<select class="form-control input" name="card_type" id="card_type">
			        		<option>Customized</option>
			        		<option>Traditional</option>
			        		<!-- <option>Seed Invitation</option> -->
			        	</select>
			      	</div>
    			</div>
    			<div class="form-group">
			      	<label class="control-label col-sm-2" for="email">Quantity:</label>
			      	<div class="col-sm-10">
			        	<input class="form-control input" type="text" name="quantity" id="quantity">
			      	</div>
    			</div>
    			<div id="traditional_form">
    				<div class="form-group">
				      	<label class="control-label col-sm-2" for="card_price">Per Card Price:</label>
				      	<div class="col-sm-10">
				        	<input class="form-control input" type="text" name="card_price" id="card_price">
				      	</div>
    				</div>
    				<div class="form-group">
			      		<label class="control-label col-sm-2" for="email">No of Impression:</label>
				      	<div class="col-sm-10">
				        	<select class="form-control input" name="impression" id="impression">
				        		<option>1</option>
				        		<option>2</option>
				        		<option>3</option>
				        		<option>4</option>
				        		<option>5</option>
				        		<option>6</option>
				        		<option>7</option>
				        		<option>8</option>
				        		<option>9</option>
				        		<option>10</option>
				        	</select>
				      	</div>
    				</div>
    				<div class="form-group">
				      	<label class="control-label col-sm-2" for="dtp">DTP:</label>
				      	<div class="col-sm-10">
				        	<input class="form-control input" type="text" name="dtp_chrg" id="dtp_chrg">
				      	</div>
    				</div>

    			</div>
    			<div id="customize_form">
	    			<div class="form-group">
				      	<label class="control-label col-sm-2" for="email">Card Size:</label>
				      	<div class="col-sm-10">
				        	<select class="form-control input" name="card_size" id="card_size">
				        		<option>A4</option>
				        		<option>A5</option>
				        		<option>A6</option>
				        		<option>KAYAL ( 11*5.5)</option>
				        		<option>5.5 SINGLE INSERT</option>
				        		<option>BOARDING PASS </option>
				        		<option>7*7 INCHES</option>
				        		<option>VISITING CARD</option>
				        	</select>
				      	</div>
	    			</div>
	    			<div class="form-group">
				      	<label class="control-label col-sm-2" for="email">Board Type:</label>
				      	<div class="col-sm-10">
				        	<select class="form-control input" name="board_type" id="board_type">
				        		<option>Matt</option>
				        		<option>Texture</option>
				        	</select>
				      	</div>
	    			</div>
	    			<div class="form-group">
				      	<label class="control-label col-sm-2" for="email">Printing Side:</label>
				      	<div class="col-sm-10">
				        	<select class="form-control input" name="print_side" id="print_side">
				        		<option>Single</option>
				        		<option>Double</option>
				        	</select>
				      	</div>
	    			</div>
	    			<div class="form-group">
					    <label class="control-label col-sm-2" for="design">Design Charge:</label>
					    <div class="col-sm-10">
					        <input class="form-control input" type="text" name="design_chrg" id="design_chrg">
					    </div>
	    			</div>
    			</div>
    			<div id="finishing">
    				<div class="form-group">
    					<label class="control-label col-sm-2" for="dtp">Finishing:</label>
    					<div id="finish_res">
	    				</div>
     				</div>
    			</div>
    			<div class="col-sm-12 text-center">
    				<button class="btn btn-primary" id="estimate">Estimate</button>
    				<button class="btn btn-primary" id="save">Save Data</button>
    				<a href="view.php" class="btn btn-primary" role="button">View Data</a>
    			</div>
    		</form>
    		<div class='text-right'>
               	<button class='btn btn-success' data-toggle="modal" data-target='#addFinishing'>Add Finishing</button>
            </div>
    		<div class="col-sm-3">
    			<button class="btn btn-primary" id="print">Print</button>
    		</div>
    		<div id="print_cont">
	    		<div class="col-sm-6">
		    		<table class="table table-bordered" id="response">
		    			
		    		</table>
		    	</div>
	    	</div>
	    	<div class="col-sm-3"></div>
		</div>
		<?php include ("modal/add-finishing.php"); ?>
		<?php include('templates/footer.php'); ?>
	</body>
</html>