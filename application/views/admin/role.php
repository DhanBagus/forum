                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>




                    <div class="row">
                    	<div class="col-lg-6">
                    		<?php echo form_error('menu','<div class="alert alert-danger" role="alert">','</div>') ?>

                    		<?php echo $this->session->flashdata('message'); ?>

                    		<a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newRoleModal"><i class="fas fa-plus "></i>  Add New Role</a>

                    		<table class="table table-bordered" id="dataTable">
							  <thead>
							    <tr>
							      <th scope="col">#</th>
							      <th scope="col">role</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>

							  	<?php $i=1; ?>

							  	<?php foreach ($role as $r) : ?>

							    <tr>
							      <th scope="row"><?php echo $i; ?></th>
							      <td><?php echo $r['role']; ?></td>
							      <td>
							      	<a href="<?php echo base_url('admin/roleaccess/') . $r['id'];?>" class="btn btn-warning btn-sm">Access</a>
							      	<a href="" class="btn btn-success btn-sm">Edit</a>
							      	<a href="" class="btn btn-danger btn-sm">Delete</a>
							      </td>

							      <?php $i++; ?>

							    <?php endforeach; ?>

							  </tbody>
							</table>
                    		
                    	</div>
                    </div>
                    

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



<!-- Modal -->
<div class="modal fade" id="newRoleModal" tabindex="-1" aria-labelledby="newRoleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newRoleModalLabel">Add New Role</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>

	      <form action="<?php echo base_url('admin/role'); ?>" method="post">
	      <div class="modal-body">
	        <div class="mb-3">
				  <label for="formGroupExampleInput" class="form-label">Role Name</label>
				  <input type="text" class="form-control" id="role" name="role" placeholder="Input Role Name">
				</div>
	      </div>     
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Add</button>
	      </div>
	      </form>

    </div>
  </div>
</div>
