                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>

					<div class="container">
						<div class="row">
							
							<!-- <div class="justify-content-center"> -->
								<div class="col-md" >

								 
									<div class="card" style="height: 650px;">
										<div class="card-body">
											<div class="overflow-scroll" style="height: 500px;">
												<div class="row ">
												<?php foreach ($pm as $p) : ?>	
													<?php if($p['user_id_from']!=$user['id']): ?>		
													<?php
														$uId=$p['user_id_from'];
														$us=$user['id'];
														$qUs="SELECT id, name, image, status FROM user WHERE id=$uId AND id != $us";
														$dtU=$this->db->query($qUs)->row_array();

														$dU=$dtU['id'];

														$qM="SELECT * FROM inbox WHERE user_id_from=$dU OR user_id_to=$dU ORDER BY id_inbox DESC LIMIT 1";
														$dtM=$this->db->query($qM)->row_array();
														
													?>			

													<div class="col-md-1 pr-0 m-0" >
														<img style="height: 50px; width: 50px; margin-top: 3px;" class="img-profile rounded-circle" src="<?php echo base_url('assets/img/profile/') . $dtU['image']; ?>">
														<?php if($dtU['status']==1):?>
															<div class="status-indicator mt-0 mb-0 text-success" ><p class="pl-0 pr-0 mb-0 mt-0" ><i class="fas fa-circle fa-xs"></i></p> </div>
														<?php else:?>
															<div class="status-indicator mb-0 mt-0 "  ><p class="pl-0 pr-0 mt-0 mb-0"><i class="fas fa-circle fa-xs"></i></p> </div>
														<?php endif;?>
													</div>
													
													
													<div class="card col-md-11 ml-0 mb-4"  >
														<a href="<?php echo base_url('forum/message/'.$dtU['id']); ?>">
															<div class="card-body pt-0 pb-0 pl-0 mb-2">
																	
																<h5 class="mb-1 p-0 mt-2 text-truncate"><?php echo $dtU['name']?></h5>
																<p class="mt-0 mb-0 "><?php echo $dtM['message']?></p>
																	
															</div>
														</a>
													</div>	

													

													
													
													<?php endif; ?>
												
												<?php endforeach; ?>
												</div>
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



            