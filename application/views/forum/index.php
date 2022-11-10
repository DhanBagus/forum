                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800"><?php echo $title;?></h1>

					<div class="row" >
						<div class="col-lg">
							<?php echo form_error('menu','<div class="alert alert-danger" role="alert">','</div>') ?>

							<?php echo $this->session->flashdata('message'); ?>

							<!-- <a href="" class="btn btn-primary mb-3" data-toggle="modal" data-target="#newPostModal"><i class="fas fa-paper-plane "></i>  Add New Post</a> -->
							<?php if($title=='My Forum'):?>
							<div class="card">
								<div class="card-body pb-1">
								<?php echo form_open_multipart('forum'); ?>

									<div class="row ml-1">
										<div class="mb-3 mr-2">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="image_post" name="image_post">
												<label class="custom-file-label" for="image_post" >Choose file</label>
											</div>
										</div>

										<div class="mb-3 ">
											<select name="kategori" id="kategori" class="form-control">
												<option value="">Select Category</option>
												<?php foreach ($category as $c) : ?>
													<option value="<?php echo $c['id_categori'] ?>"><?php echo $c['categori'] ?></option>
												<?php endforeach; ?>
											</select>
										</div>
									</div>
									<div class="row mb-3 col-lg-4">
										<input type="text" class="form-control" id="title" name="title" placeholder="Input Title">
									</div>									
									<div class="row mb-0">
										<div class="form-floating mb-3 col-lg-11">
											<textarea class="form-control" placeholder="Input your content" name="content" id="content" style="height: 100px"></textarea>
										</div>
										<!-- <div class="col-lg-11 mb-3">
											<input type="text" class="form-control" id="content" name="content" placeholder="Input content">
										</div> -->
										<div class="col-lg mb-3 mt-auto">
											<button class="btn btn-primary" type="submit"><i class="far fa-paper-plane"></i></button>
										</div>
									</div>
								</form>
								</div>     
							</div>

							<hr>
							<?php endif; ?>
							

							<?php foreach ($posts as $p) :?>
							<div class="card">
								<div class="card-body">
									<!-- Query data yang dibutuhkan -->
									<?php
									$nama=$p['id_user'];
									$qUser="SELECT name,image FROM user WHERE id=$nama";
									$postU=$this->db->query($qUser)->row_array();

									// tammpil kategori pada forum
									$kategori=$p['category_id'];
									$qKat="SELECT categori FROM categori WHERE id_categori=$kategori";
									$kat=$this->db->query($qKat)->row_array();

									// icon jumlah comment
									$comment=$p['id_post'];
									$qComment="SELECT COUNT(*) as total FROM comment WHERE post_id=$comment";
									$com=$this->db->query($qComment)->row_array();
									?>
									
									<div class="row">
										<div class="row col-lg-10 ml-0">
											<a href="<?php echo base_url('forum/vComment/'.$p['id_post']); ?>">
											<h4><?php echo $p['title']?></h4>
											</a>
											<h6 style="float: left; margin-top: 10px; margin-left: 10px;"><?php echo $kat['categori']?></h6>
										</div>
										<div class="col-lg-2"> 
											
											<img style="height: 30px; width: 30px; float:left;" class="img-profile rounded-circle" src="<?php echo base_url('assets/img/profile/') . $postU['image']; ?>">
											<h6 style="margin-left: 40px; margin-top: 5px;"><?php echo $postU['name']?></h6>
										</div>
									
									</div>
									<hr>

									
									<div class="row">
										<div class="col-lg-12">
											<p style="text-align: justify;"><?php echo $p['content']?></p>
										</div>
									</div>
									
									<div class="row mt-3">
										<div class="col-lg-1">
											<a href="<?php echo base_url('forum/vComment/'.$p['id_post']); ?>"><i class="fas fa-comments primary fa-lg"></i><small class="text-muted"><?php echo $com['total']; ?></small></a>
										</div>
										<div class="col-lg-10">
											<a href="<?php echo base_url('forum/message/'.$p['id_user']); ?>"><i class="fas fa-envelope primary fa-lg" data-toggle="modal" data-target="#newPmModal"></i></a>
										</div>
										<div class="col-lg-1">
											<p class="card-text"><small class="text-muted"><?php echo date('H:i d/m/y ', $p['time']);?></small></p>
										</div>
										

									</div>
									
								</div>
							</div>
							<br>
							<?php endforeach; ?>

						</div>

					</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


<!-- Modal -->
<div class="modal fade" id="newPostModal" tabindex="-1" aria-labelledby="newPostModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="newPostModalLabel">Add New Post</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>

	  	<?php echo form_open_multipart('forum'); ?>
	      <div class="modal-body">
		  	<div class="mb-3">
		  		<label for="formGroupExampleInput" class="form-label">Content</label>
				<div class="custom-file">
				    <input type="file" class="custom-file-input" id="image_post" name="image_post">
				    <label class="custom-file-label" for="image_post" >Choose file
				    </label>
				</div>
			</div>
	        <div class="mb-3">
				<input type="text" class="form-control" id="content" name="content" placeholder="Input content">
			</div>

			<div class=mb-3>
				<select name="kategori" id="kategori" class="form-control">
					<option value="">Select Category</option>
					<?php foreach ($category as $c) : ?>
						<option value="<?php echo $c['id_categori'] ?>"><?php echo $c['categori'] ?></option>
					<?php endforeach; ?>
				</select>
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




