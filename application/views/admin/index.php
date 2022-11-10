                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>

					<div class="container-fluid">
						<!-- <div class="card">
							<div class="card-body"> -->
								<div class="card">
									<div class="card-header">
										Report List
									</div>
									<div class="card-body">
										<div class="table-responsive">
											<table class="table table-sm" id="dtU">
												<thead class="thead-light">
													<tr>
													<th scope="col">No</th>
													<th scope="col">Report list</th>
													<th scope="col">Action</th>
													</tr>
												</thead>
												<tbody>

													<tr>
														<td scope="row">1</td>
														<td>Report by programming  category </td>
														<td><a href="<?php echo base_url('admin/report/1'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">2</td>
														<td>Report by sports category</td>
														<td><a href="<?php echo base_url('admin/report/2'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">3</td>
														<td>Report by politic  category</td>
														<td><a href="<?php echo base_url('admin/report/3'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">4</td>
														<td>Report by art category</td>
														<td><a href="<?php echo base_url('admin/report/4'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">5</td>
														<td>Report by technology  category</td>
														<td><a href="<?php echo base_url('admin/report/5'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">6</td>
														<td>Report by automotive category</td>
														<td><a href="<?php echo base_url('admin/report/6'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">7</td>
														<td>Report by multimedia category</td>
														<td><a href="<?php echo base_url('admin/report/7'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">8</td>
														<td>Report of mamber list</td>
														<td><a href="<?php echo base_url('admin/report/8'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">9</td>
														<td>Report of active user</td>
														<td><a href="<?php echo base_url('admin/report/9'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">10</td>
														<td>User reports by post</td>
														<td><a href="<?php echo base_url('admin/report/10'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">11</td>
														<td>Report of inbox list</td>
														<td><a href="<?php echo base_url('admin/report/11'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">12</td>
														<td>User inbox report</td>
														<td><a href=""data-toggle="modal" data-target="#userModal"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">13</td>
														<td>Report of comment list</td>
														<td><a href="<?php echo base_url('admin/report/13'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">14</td>
														<td>User comment report</td>
														<td><a href=""data-toggle="modal" data-target="#commentModal"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">15</td>
														<td>User post report</td>
														<td><a href=""data-toggle="modal" data-target="#postModal"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">16</td>
														<td>Post reports with pictures</td>
														<td><a href="<?php echo base_url('admin/report/16'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">17</td>
														<td>Post report by date</td>
														<td><a href=""data-toggle="modal" data-target="#postTglModal"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">18</td>
														<td>Comment report by date</td>
														<td><a href=""data-toggle="modal" data-target="#comTglModal"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">19</td>
														<td>Inbox report by date</td>
														<td><a href=""data-toggle="modal" data-target="#inboxTglModal"> <i class="fas fa-print"></i> </a></td>
													</tr>
													<tr>
														<td scope="row">20</td>
														<td>Category list report</td>
														<td><a href="<?php echo base_url('admin/report/20'); ?>"> <i class="fas fa-print"></i> </a></td>
													</tr>
													

												</tbody>
											</table>
										</div>
									</div>
								</div>
							<!-- </div>
						</div> -->
					</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->




<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="userModalLabel">Choose User</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>

	 	
	      <div class="modal-body">
		  		
					<?php 
						$qU="SELECT id,name FROM user";
						$Us=$this->db->query($qU)->result_array();
					?>		

					<?php $i=1; ?>
					<?php foreach($Us as $u):?>
						
						<a href="<?php echo base_url('admin/reportPerUser/12/'.$u['id']); ?>">
							<div class="row">
								<div class="col-lg-1">
									<?php echo $i; ?>
								</div>
								<div class="col-lg-11">
									<?php echo $u['name']; ?>
								</div>
							</div>
						</a>
						
					
					<?php $i++; ?>
					<?php endforeach;?>
	      </div>     
		 
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        
	      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="commentModal" tabindex="-1" aria-labelledby="commentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="commentModalLabel">Choose User</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>

	      <div class="modal-body">
		  		
					<?php 
						$qU="SELECT id,name FROM user";
						$Us=$this->db->query($qU)->result_array();
					?>		

					<?php $i=1; ?>
					<?php foreach($Us as $u):?>
						
						<a href="<?php echo base_url('admin/reportPerUser/14/'.$u['id']); ?>">
							<div class="row">
								<div class="col-lg-1">
									<?php echo $i; ?>
								</div>
								<div class="col-lg-11">
									<?php echo $u['name']; ?>
								</div>
							</div>
						</a>
						
					
					<?php $i++; ?>
					<?php endforeach;?>
	      </div>     
		 
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        
	      </div>
    </div>
  </div>
</div>



<!-- Modal -->
<div class="modal fade" id="postModal" tabindex="-1" aria-labelledby="postModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="postModalLabel">Choose User</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>

	      <div class="modal-body">
		  		
					<?php 
						$qU="SELECT id,name FROM user";
						$Us=$this->db->query($qU)->result_array();
					?>		

					<?php $i=1; ?>
					<?php foreach($Us as $u):?>
						
						<a href="<?php echo base_url('admin/reportPerUser/15/'.$u['id']); ?>">
							<div class="row">
								<div class="col-lg-1">
									<?php echo $i; ?>
								</div>
								<div class="col-lg-11">
									<?php echo $u['name']; ?>
								</div>
							</div>
						</a>
						
					
					<?php $i++; ?>
					<?php endforeach;?>
	      </div>     
		 
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        
	      </div>
    </div>
  </div>
</div>


<!-- Modal -->
<div class="modal fade" id="postTglModal" tabindex="-1" aria-labelledby="postTglModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="postTglModalLabel">Select Date</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>

	  	<form action="<?php echo base_url('admin/reportTgl/17'); ?>" method="post">
	      	<div class="modal-body">
		  	<div class="row">
				<div class="col-md-6">
					<input type="date" class="form-control form-control-sm" id="tm" name="tm" placeholder="Start date">
				</div>
				<div class="col-md-6">
					<input type="date" class="form-control form-control-sm" id="ta" name="ta" placeholder="End date">
				</div>
			</div>

	      </div>     
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Select</button>
	      </div>
	      </form>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="comTglModal" tabindex="-1" aria-labelledby="comTglModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="comTglModalLabel">Select Date</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>

	  	<form action="<?php echo base_url('admin/reportTgl/18'); ?>" method="post">
	      	<div class="modal-body">
		  	<div class="row">
				<div class="col-md-6">
					<input type="date" class="form-control form-control-sm" id="tm" name="tm" placeholder="Start date">
				</div>
				<div class="col-md-6">
					<input type="date" class="form-control form-control-sm" id="ta" name="ta" placeholder="End date">
				</div>
			</div>

	      </div>     
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Select</button>
	      </div>
	      </form>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="inboxTglModal" tabindex="-1" aria-labelledby="inboxTglModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="inboxTglModalLabel">Select Date</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>

	  	<form action="<?php echo base_url('admin/reportTgl/19'); ?>" method="post">
	      	<div class="modal-body">
		  	<div class="row">
				<div class="col-md-6">
					<input type="date" class="form-control form-control-sm" id="tm" name="tm" placeholder="Start date">
				</div>
				<div class="col-md-6">
					<input type="date" class="form-control form-control-sm" id="ta" name="ta" placeholder="End date">
				</div>
			</div>

	      </div>     
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Select</button>
	      </div>
	      </form>

    </div>
  </div>
</div>

