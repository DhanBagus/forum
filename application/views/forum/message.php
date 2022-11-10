                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>

					<div class="container">
						<div class="row">
							
							<!-- <div class="justify-content-center"> -->
								<div class="col-sm mb-3" >
									<div class="card" >
										<div class="card-body">
											<div class="row mb-3 ml-3">
												
												<div>
													<img style="height: 30px; width: 30px; margin-right: 5px;" class="img-profile rounded-circle" src="<?php echo base_url('assets/img/profile/') . $to['image']; ?>"> 
												</div>
												<div>
												<h4><?php echo $to['name'] ?></h4>
												</div>
												
												
											</div>
											<hr>
											<div class="overflow-auto" style="height: 310px;">
												<?php foreach ($pm as $p) : ?>	
													<div class="row">													
														<!-- <div class="col-sm-9"> -->
															
															<?php if ($p['user_id_from'] == $user['id']):?>
															<div class="col-sm">
																<p class="card-text" style="text-align: right;"><small class="text-muted"><?php echo date(' d/m/y H:i', $p['date']);?></small></p>
															</div>
															<div class="card bg-primary ml-3 mb-0 mr-3" >
																<div class="card-body p-0 pl-3 pr-3 pt-1 mb-0">
																	<p class="mb-1" style="color: white;"><?php echo $p['message'];?></p>
																</div>
															</div>

															
															<?php else:?>
															<div class="card bg-light ml-3 mb-0">
																<div class="card-body p-0 pl-3 pr-3 pt-1 mb-0">
																	<p class="mb-1"><?php echo $p['message'];?></p>
																</div>
															</div>
															<div class="col-sm">
																<p class="card-text"><small class="text-muted"><?php echo date(' d/m/y H:i', $p['date']);?></small></p>
															</div>
															<?php endif;?>
																
															
														<!-- </div> -->
														
													</div>	
												<?php endforeach; ?>											
											</div>

											<div class="col-lg">
												<!-- <div class="container"> -->
												<form action="<?php echo base_url('forum/message/').$to['id']; ?>" method="post">
													<div class="row mb-2">
														<div class="col-sm-11 mt-3 ">
															<input type="text" class="form-control" id="message" name="message" placeholder="Input message">
														</div>
														<div class="col-sm-1  mt-3">
															<button class="btn btn-primary" type="submit"><i class="far fa-paper-plane"></i></button>
														</div>
													</div>
												</form>
												<!-- </div> -->

											</div>

											
										</div>
										
										
										
									</div>
									
								</div>
							<!-- </div> -->
						</div>
					</div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            