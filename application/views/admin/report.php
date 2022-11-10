                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>


					<div class="containner-fluid">
						<div class="col-md">
							<div class="table-responsive">
								<table class="table table-sm" id="dtU">
									<thead class="thead-light">

									<?php if(($lap_id>=1 && $lap_id<=7)||$lap_id==15||$lap_id==16||$lap_id==17): ?>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Title</th>
											<th scope="col">Image</th>
											<th scope="col">Date</th>
										</tr>
									<?php elseif($lap_id>=8 && $lap_id<=10 ):?>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Name</th>
											<th scope="col">E-mail</th>
											<th scope="col">Status</th>
										</tr>
									<?php elseif($lap_id==11||$lap_id==12||$lap_id==19):?>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Message</th>
											<th scope="col">From</th>
											<th scope="col">To</th>
											<th scope="col">Date</th>
										</tr>
									<?php elseif($lap_id==13||$lap_id==14||$lap_id==18):?>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Comment</th>
											<th scope="col">Id Post</th>
											<th scope="col">Date</th>
										</tr>
									<?php else:?>
										<tr>
											<th scope="col">No</th>
											<th scope="col">Category</th>
										</tr>
									<?php endif; ?>
									</thead>
									<tbody>

										<?php $i=1; ?>
										<?php foreach ($laporan as $l): ?>

										<?php if(($lap_id>=1 && $lap_id<=7)||$lap_id==15||$lap_id==16||$lap_id==17): ?>
											<tr>
												<td scope="row"><?php echo $i; ?></td>
												<td><?php echo $l['title']; ?></td>
												<td><?php echo $l['image']; ?></td>
												<td><?php echo date('H:i d/m/y ', $l['time']);?></td>
											</tr>
										<?php elseif($lap_id>=8 && $lap_id<=10 ):?>
											<tr>
												<td scope="row"><?php echo $i; ?></td>
												<td><?php echo $l['name']; ?></td>
												<td><?php echo $l['email']; ?></td>
												<td><?php 
												if($l['status']==1){
													echo 'Online';												
												}
												else{
													echo 'Offline';
												}
												?></td>
											</tr>
										<?php elseif($lap_id==11 || $lap_id==12 || $lap_id==19):?>
											<tr>
												<td scope="row"><?php echo $i; ?></td>
												<td><?php echo $l['message']; ?></td>
												<td><?php echo $l['user_id_from']; ?></td>
												<td><?php echo $l['user_id_to']; ?></td>
												<td><?php echo date('H:i d/m/y ', $l['date']);?></td>
											</tr>
										<?php elseif($lap_id==13 || $lap_id==14 || $lap_id==18):?>
											<tr>
												<td scope="row"><?php echo $i; ?></td>
												<td><?php echo $l['comment']; ?></td>
												<td><?php echo $l['post_id']; ?></td>
												<td><?php echo date('H:i d/m/y ', $l['date']);?></td>
											</tr>
										<?php else:?>
											<tr>
												<td scope="row"><?php echo $i; ?></td>
												<td><?php echo $l['categori']; ?></td>
											</tr>
										<?php endif; ?>

										

										<?php $i++; ?>
										<?php endforeach; ?>
														
									</tbody>
								</table>
							</div>
						</div>
					</div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


