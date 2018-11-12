<?php 
	include('users/includes/init.php');
?>
<!DOCTYPE html>
<html>
<head>
	  <title>That1card</title>
	 <!-- <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">-->
	  <!--bootstrap-->
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	  <!--datetable css-->
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
	  <!--datatable-->
	  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	  <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
	<div class="container" style="margin-top: 40px;">
		<div class="row">
			<div class="col-sm-5">
				<h4 style="color: green;">Customized Card Saved Estimates:</h4>
			</div>
			<div class="col-sm-5">
				<a href="index.php" class="btn btn-primary pull-right" role="button">Go Back</a>
			</div>
		</div>
		<br/>
		<br/>
		<div class="table-responsive">
			<table id="example" class="table table-striped table-bordered" style="width:100%;">
			        <thead>
			            <tr>
			                <th>Customer Name</th>
			                <th>Customer Phone</th>
			                <th>Date</th>
			                <th>Sales Person</th>
			                <th>Status</th>
			                <th>Quantiity</th>
			                <th>Card Price</th>
			                <th>Design Charge</th>
			                <th>Lamination Charge</th>
			                <th>Finishing Charge</th>
			                <th>Sub Total</th>
			                <th>GST(12%)</th>
			                <th>Total</th>
			                <th>Advance</th>
			                <th>Balance</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>

			        	<?php
							$savedata = Customized::getsaveDataCust($db);
							foreach ($savedata as $key => $value) {
						?>
							<tr <?php if($value['status'] == 'Converted'): ?> style="background-color:#87CEEB;" <?php endif; ?>>
									<td><?php echo $value['cname']; ?></td>
									<td><?php echo $value['Phone']; ?></td>
									<td><?php echo $value['dates']; ?></td>
									<td><?php echo $value['saleperson']; ?></td>
									<td><?php echo $value['status']; ?></td>
									<td><?php echo $value['quantity']; ?></td>
									<td><?php echo $value['card_price']; ?></td>
									<td><?php echo $value['design_chrg']; ?></td>
									<td><?php echo $value['lamination']; ?></td>
									<td><?php echo $value['finishing_amt']; ?></td>
									<td><?php echo $value['sub_total']; ?></td>
									<td><?php echo $value['gst']; ?></td>
									<td><?php echo $value['grand_total']; ?></td>
									<td><?php echo $value['advance']; ?></td>
									<td><?php echo $value['balance']; ?></td>
									<td>
										<form method="post">
												<input type="submit" name="delete" class="btn btn-danger" value="Delete"/>
				                                <input type="hidden" name="id" value="<?php echo $value['id'];?>"/>
			                            </form>
									</td>
							</tr>
						<?php
						 } 
						?>
			        	
			        </tbody>
			</table>
		</div>
	</div>
	<?php
		if(isset($_POST['delete'])){
			$id = $_POST['id'];
	       	Customized::deleteData($db, $id);
	       	header('location:view.php');
		}
		elseif(isset($_POST['delete1'])){
			$id = $_POST['id'];
	       	Traditional::deleteData($db, $id);
	       	header('location:view.php');
		}
	?>
	<div class="container" style="margin-top: 60px;">
		<div>
			<h4 style="color: green;">Traditional Card Saved Estimates:</h4>
		</div>
		<br/>
		<br/>
		<div class="table-responsive">
			<table id="example1" class="table table-striped table-bordered" style="width:100%;">
			        <thead>
			            <tr>
			                <th>Customer Name</th>
			                <th>Customer Phone</th>
			                <th>Date</th>
			                <th>Sales Person</th>
			                <th>Status</th>
			                <th>Quantity</th>
			                <th>Impression</th>
			                <th>Card Price</th>
			                <th>Printing Charge</th>
			                <th>DTP Charge</th>
			                <th>Finishing Charge</th>
			                <th>Sub Total</th>
			                <th>GST(12%)</th>
			                <th>Total</th>
			                <th>Advance</th>
			                <th>Balance</th>
			                <th>Action</th>
			            </tr>
			        </thead>
			        <tbody>

			        	<?php
							$savedata = Traditional::getsaveDataTrad($db);
							foreach ($savedata as $key => $value) {
						?>
							<tr <?php if($value['status'] == 'Converted'): ?> style="background-color:#87CEEB;" <?php endif; ?>>
									<td><?php echo $value['cname']; ?></td>
									<td><?php echo $value['Phone']; ?></td>
									<td><?php echo $value['dates']; ?></td>
									<td><?php echo $value['saleperson']; ?></td>
									<td><?php echo $value['status']; ?></td>
									<td><?php echo $value['quantity']; ?></td>
									<td><?php echo $value['impression']; ?></td>
									<td><?php echo $value['card_price']; ?></td>
									<td><?php echo $value['print_price']; ?></td>
									<td><?php echo $value['dtp_chrg']; ?></td>
									<td><?php echo $value['finishing_amt']; ?></td>
									<td><?php echo $value['sub_total']; ?></td>
									<td><?php echo $value['gst']; ?></td>
									<td><?php echo $value['grand_total']; ?></td>
									<td><?php echo $value['advance']; ?></td>
									<td><?php echo $value['balance']; ?></td>
									<td>
										<form method="post">
												<input type="submit" name="delete1" class="btn btn-danger" value="Delete"/>
				                                <input type="hidden" name="id" value="<?php echo $value['id'];?>"/>
			                            </form>
									</td>
							</tr>
						<?php
						 } 
						?>
			        	
			        </tbody>
			</table>
		</div>
	</div>
	<br>
	<br>
	<script type="text/javascript">
	 		$(document).ready(function() {
			    $('#example').DataTable();
			} );
	</script>
	<script type="text/javascript">
	 		$(document).ready(function() {
			    $('#example1').DataTable();
			} );
	</script>
</body>
</html>