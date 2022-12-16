 <!doctype html>
 <html lang="en">
 <?php require APPROOT . '/views/includes/head.php'; ?>

 <body>

 	<!--Topbar -->
 	<?php require APPROOT . '/views/includes/nav.php'; ?>
 	<?php require APPROOT . '/views/includes/sidebar.php'; ?>

 	<div class="sidebar-overlay"></div>


 	<!--Content Start-->
 	<div class="content-start transition ">
 		<div class="container-fluid dashboard">
 			<div class="content-header">
 				<h1>Rooms</h1>
 			</div>
 			<div class="col-md-12">
 				<div class="card">
 					<div class="card-header">
 						<h4>Rooms available</h4>
 						<div class="form-group">
 							<!-- Button trigger for login form modal -->
 							<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#inlineForm">
 								Add room
 							</button>

 							<!--login form Modal -->
 							<div class="modal fade text-left" id="inlineForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
 								<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
 									<div class="modal-content">
 										<div class="modal-header">
 											<h4 class="modal-title" id="myModalLabel33">Add room </h4>
 											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 										</div>
 										<form action="<?php echo URLROOT; ?>/admins/rooms" method="POST">
 											<div class="modal-body">
 												<label>Num: </label>
 												<div class="form-group">
 													<input name="num" type="number" placeholder="Room num" class="form-control <?php echo (!empty($data['num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['num']; ?>">
 													<span class="invalid-feedback"><?php echo $data['num_err'];  ?></span>
 												</div>
 												<label>Capacity: </label>
 												<div class="form-group">
 													<input name="capacity" type="number" placeholder="Capacity" class="form-control <?php echo (!empty($data['capacity_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['capacity']; ?>">
 													<span class="invalid-feedback"><?php echo $data['capacity_err'];  ?></span>
 												</div>
 												<label>Price: </label>
 												<div class="form-group">
 													<input name="price" type="number" placeholder="Price" class="form-control <?php echo (!empty($data['price_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['price']; ?>">
 													<span class="invalid-feedback"><?php echo $data['price_err'];  ?></span>
 												</div>
 												<label>Type: </label>
 												<div class="form-group">
 													<select class="form-control <?php echo (!empty($data['type_err'])) ? 'is-invalid' : ''; ?>" name="type" id="room_type">
 														<option value="">Select type</option>
 														<option value="single">single</option>
 														<option value="double">double</option>
 														<option value="suite">suite</option>
 													</select>
 													<span class="invalid-feedback"><?php echo $data['type_err'];  ?></span>

 												</div>
 												<label>Suite type: </label>
 												<div class="form-group">
 													<select class="form-control <?php echo (!empty($data['suite_type_err'])) ? 'is-invalid' : ''; ?>" name="suite_type" id="suite_type">
 														<option value="">Select suite type</option>
 														<option value="Standard suite rooms">Standard suite rooms</option>
 														<option value="Junior">Junior</option>
 														<option value="Presidential suite">Presidential suite</option>
 														<option value="Honeymoon suites">Honeymoon suites</option>
 														<option value="Bridal suites">Bridal suites</option>
 													</select>
 													<span class="invalid-feedback"><?php echo $data['suite_type_err'];  ?></span>

 												</div>
 											</div>
 											<div class="modal-footer">
 												<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
 													<i class="bx bx-x d-block d-sm-none"></i>
 													<span class="d-none d-sm-block">Close</span>
 												</button>
 												<button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
 													<i class="bx bx-check d-block d-sm-none"></i>
 													<span class="d-none d-sm-block">Add</span>
 												</button>
 											</div>
 										</form>
 									</div>
 								</div>
 							</div>
 						</div>

 					</div>
 					<div class="card-body">
 						<div class="table-responsive">
 							<table class="table table-striped">
 								<thead>
 									<tr>
 										<th scope="col">Room num</th>
 										<th scope="col">Capacity</th>
 										<th scope="col">Type</th>
 										<th scope="col">Price</th>
 										<th scope="col">Status</th>
 										<th scope="col">Payment Method</th>
 										<th scope="col">Operations</th>
 									</tr>
 								</thead>
 								<tbody>
 									<tr>
 										<th scope="row">#SK2548 </th>
 										<td>Neal Matthews</td>
 										<td>07 Oct, 2022</td>
 										<td>$400</td>
 										<td><span class="text-success">Paid</span></td>
 										<td>Mastercard</td>
 										<td>
 											<button class="btn btn-primary">Update</button>
 											<button style="background-color: red;" class="btn btn-primary">Delete</button>
 										</td>
 									</tr>

 									<tr>
 										<th scope="row">#SK2548 </th>
 										<td>Neal Matthews</td>
 										<td>07 Oct, 2022</td>
 										<td>$400</td>
 										<td><span class="text-success">Paid</span></td>
 										<td>Visa</td>
 										<td>
 											<button class="btn btn-primary">Update</button>
 											<button class="btn btn-primary">Delete</button>
 										</td>
 									</tr>

 									<tr>
 										<th scope="row">#SK2548 </th>
 										<td>Neal Matthews</td>
 										<td>07 Oct, 2022</td>
 										<td>$400</td>
 										<td><span class="text-danger">Chargeback</span></td>
 										<td>Paypal</td>
 										<td>
 											<button class="btn btn-primary">Update</button>
 											<button class="btn btn-primary">Delete</button>
 										</td>
 									</tr>

 									<tr>
 										<th scope="row">#SK2548 </th>
 										<td>Neal Matthews</td>
 										<td>07 Oct, 2022</td>
 										<td>$400</td>
 										<td><span class="text-warning">Refund</span></td>
 										<td>Visa</td>
 										<td>
 											<button class="btn btn-primary">Update</button>
 											<button class="btn btn-primary">Delete</button>
 										</td>

 									</tr>
 								</tbody>
 							</table>
 						</div>
 					</div>
 				</div>
 			</div>

 			<!-- Form and scrolling Components start -->
 			<section id="form-and-scrolling-components">
 				<div class="row">
 					<div class="col-md-6 col-12">
 						<div class="card">
 							<div class="card-content">

 							</div>
 						</div>
 					</div>

 				</div>
 			</section>
 			<!--End Start Modal-->


 		</div><!-- End Container-->
 	</div><!-- End Content-->


 	<!-- Preloader -->
 	<div class="loader">
 		<div class="spinner-border text-light" role="status">
 			<span class="sr-only">Loading...</span>
 		</div>
 	</div>

 	<!-- Loader -->
 	<div class="loader-overlay"></div>

 	<?php require APPROOT . '/views/includes/footer.php'; ?>
 </body>

 </html>