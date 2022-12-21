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
 			<?php flash('room_success'); ?>
 			<?php flash('room_message'); ?>
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
 										<form action="<?php echo URLROOT; ?>/rooms/rooms" method="POST" enctype="multipart/form-data">
 											<div class="modal-body">
 												<label>Num: </label>
 												<div class="form-group">
 													<input name="num" type="number" placeholder="Room num" class="form-control <?php echo (!empty($data['num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['num']; ?>">
 													<span class="invalid-feedback"><?php echo $data['num_err'];  ?></span>
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

 												<label class="suite_type">Suite type: </label>
 												<div class="form-group">
 													<select class="form-control <?php echo (!empty($data['suite_type_err'])) ? 'is-invalid' : ''; ?> suite_type" name="suite_type" id="suite_type">
 														<option value="">Select suite type</option>
 														<option value="Standard suite rooms">Standard suite rooms</option>
 														<option value="Junior">Junior</option>
 														<option value="Presidential suite">Presidential suite</option>
 														<option value="Honeymoon suites">Honeymoon suites</option>
 														<option value="Bridal suites">Bridal suites</option>
 													</select>
 													<span class="invalid-feedback"><?php echo $data['suite_type_err'];  ?></span>

 												</div>
 												<label>Capacity: </label>
 												<div class="form-group">
 													<input id="capacity" name="capacity" type="number" placeholder="Capacity" class="form-control <?php echo (!empty($data['capacity_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['capacity']; ?>">
 													<span class="invalid-feedback"><?php echo $data['capacity_err'];  ?></span>
 												</div>
 												<label>Images: </label>
 												<div class="form-group">
 													<input name="media[]" type="file" placeholder="Images" class="form-control <?php echo (!empty($data['media_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['media']; ?>" multiple>
 													<span class="invalid-feedback"><?php echo $data['media_err'];  ?></span>
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
 										<th scope="col">Update</th>
 										<th scope="col">Delete</th>
 									</tr>
 								</thead>
 								<tbody>
 									<?php foreach ($data['rooms'] as $room) : ?>
 										<tr>
 											<th scope="row"><?php echo $room->num; ?> </th>
 											<td><?php echo $room->capacity; ?></td>
 											<td><?php echo $room->type; ?></td>
 											<td><?php echo $room->price; ?></td>
 											<td><?php if ($room->reserved == 0) {
														echo '<span class="text-success">Free</span>';
													} else {
														echo '<span class="text-danger">Reserved</span>';
													} ?></td>
 											<td>
 												<!-- Button trigger for login form modal -->
 												<form action="<?php echo URLROOT; ?>/rooms/update/<?php echo $room->id; ?>" method="POST">
 													<button type="button" style="width: 75px;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inlineForm1">
 														Update
 													</button>

 												</form>


 												<!--login form Modal -->
 												<div class="modal fade text-left" id="inlineForm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
 													<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
 														<div class="modal-content">
 															<div class="modal-header">
 																<h4 class="modal-title" id="myModalLabel33">Update room </h4>
 																<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
 															</div>
 															<form action="<?php echo URLROOT; ?>/rooms/update/<?php echo $data['id']; ?>" method="POST" enctype="multipart/form-data">
 																<div class="modal-body">
 																	<label>Num: </label>
 																	<div class="form-group">
 																		<input name="num" type="number" placeholder="Room num" class="form-control <?php echo (!empty($data['num_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['num']; ?>">
 																		<span class="invalid-feedback"><?php echo $data['num_err'];  ?></span>
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
 																	<label class="suite_type">Suite type: </label>
 																	<div class="form-group">
 																		<select class="form-control <?php echo (!empty($data['suite_type_err'])) ? 'is-invalid' : ''; ?> suite_type" name="suite_type" id="suite_type">
 																			<option value="">Select suite type</option>
 																			<option value="Standard suite rooms">Standard suite rooms</option>
 																			<option value="Junior">Junior</option>
 																			<option value="Presidential suite">Presidential suite</option>
 																			<option value="Honeymoon suites">Honeymoon suites</option>
 																			<option value="Bridal suites">Bridal suites</option>
 																		</select>
 																		<span class="invalid-feedback"><?php echo $data['suite_type_err'];  ?></span>

 																	</div>
 																	<label>Capacity: </label>
 																	<div class="form-group">
 																		<input name="capacity" type="number" placeholder="Capacity" class="form-control <?php echo (!empty($data['capacity_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['capacity']; ?>">
 																		<span class="invalid-feedback"><?php echo $data['capacity_err'];  ?></span>
 																	</div>
 																	<label>Images: </label>
 																	<div class="form-group">
 																		<input name="media[]" type="file" placeholder="Images" class="form-control <?php echo (!empty($data['media_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['media']; ?>" multiple>
 																		<span class="invalid-feedback"><?php echo $data['media_err'];  ?></span>
 																	</div>
 																</div>
 																<div class="modal-footer">
 																	<button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
 																		<i class="bx bx-x d-block d-sm-none"></i>
 																		<span class="d-none d-sm-block">Close</span>
 																	</button>

 																	<button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
 																		<i class="bx bx-check d-block d-sm-none"></i>
 																		<span class="d-none d-sm-block">Update</span>
 																	</button>
 																</div>
 															</form>
 														</div>
 													</div>
 												</div>


 											</td>
 											<td>
 												<form action="<?php echo URLROOT; ?>/rooms/delete/<?php echo $room->id; ?>" method="POST">
 													<button type="submit" style="background-color: red;" class="btn btn-primary">Delete</button>
 												</form>
 											</td>
 										</tr>
 									<?php endforeach; ?>
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