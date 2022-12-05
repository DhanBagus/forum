                <!-- Begin Page Content -->
                <div class="container-fluid">

                	<!-- Page Heading -->
                	<h1 class="h3 mb-4 text-gray-800"><?php echo $title; ?></h1>

                	<?php echo form_error('forum', '<div class="alert alert-danger" role="alert">', '</div>') ?>
                	<?php echo $this->session->flashdata('message'); ?>
                	<?php ?>
                	<div class="row">
                		<div class="col-lg">
                			<div class="card">
                				<div class="card-body">
                					<?php
									$nama = $posts['id_user'];
									$qUser = "SELECT name FROM user WHERE id=$nama";
									$postU = $this->db->query($qUser)->row_array();

									$kategori = $posts['category_id'];
									$qKat = "SELECT categori FROM categori WHERE id_categori=$kategori";
									$kat = $this->db->query($qKat)->row_array();

									$posts_id = $posts['id_post'];
									$qCom = "SELECT COUNT(*) as total FROM comment WHERE post_id=$posts_id";
									$tCom = $this->db->query($qCom)->row_array();
									?>

                					<div class="row">
                						<div class="col-lg-11 ml-0">
                							<img style="height: 30px; width: 30px; float:left;" class="img-profile rounded-circle" src="<?php echo base_url('assets/img/profile/') . $user['image']; ?>">
                							<h5 style="margin-left: 40px; margin-top: 5px;"><?php echo $postU['name'] ?></h5>
                						</div>
                						<div class="col-lg-1">
                							<h6><?php echo $kat['categori'] ?></h6>
                						</div>
                					</div>
                					<hr>

                					<?php if ($posts['image']) : ?>
                						<div class="row">
                							<div class="col-lg-2">
                								<a href="" data-toggle="modal" data-target="#newImageModal">
                									<img style="height: 15rem; width: 15rem; overflow: hidden;" class="img-fluid" src="<?php echo base_url('assets/img/image_post/') . $posts['image']; ?>">
                								</a>
                							</div>
                							<div class="col-lg-10">
                								<p><?php echo $posts['content'] ?></p>
                							</div>
                						</div>
                					<?php else : ?>
                						<div class="row">
                							<div class="col-lg-12">
                								<p><?php echo $posts['content'] ?></p>
                							</div>
                						</div>
                					<?php endif; ?>


                					<div class="row mt-3">
                						<div class="col-lg-1">
                							<a href="<?php echo base_url('forum/vComment/' . $posts['id_post']); ?>" style="size: 60pt;"><i class="fas fa-comments primary fa-lg"></i><small class="text-muted"><?php echo $tCom['total']; ?></small></a>
                						</div>
                						<div class="col-lg-10">
                							<a href=""><i class="fas fa-envelope primary fa-lg" style="size: 50px;"></i></a>
                						</div>
                						<div class="col-lg-1">
                							<p class="card-text"><small class="text-muted"><?php echo date('H:i d/m/y ', $posts['time']); ?></small></p>
                						</div>
                					</div>

                				</div>
                			</div>

                			<br>


                			<!-- Card -->
                			<div class="container mb-3">
                				<div class="row justify-content-center">
                					<div class="card col-lg">
                						<div class="card-body">
                							<form action="<?php echo base_url('forum/comment/') . $posts['id_post']; ?>" method="post">
                								<div class="row mb-0">
                									<div class="col-lg-11 mb-3 ml-0">
                										<input type="text" class="form-control" id="komen" name="komen" placeholder="Input Your Comment Here.......">
                									</div>
                									<div class="col-lg-1">
                										<button class="btn btn-primary" type="submit"><i class="far fa-paper-plane"></i></button>
                									</div>
                								</div>
                							</form>
                							<div class="mb-3">
                								Comment...
                							</div>
                							<?php foreach ($komentar as $c) : ?>
                								<?php
												$uC = $c['user_id'];
												$qC = "SELECT name,image FROM user WHERE id=$uC";
												$Com = $this->db->query($qC)->row_array();
												?>
                								<div class="row mb-2">
                									<div class="col-lg-1">
                										<img class="img-profile rounded-circle mt-2" style="width: 50px; height: 50px;" src="<?php echo base_url('assets/img/profile/') . $Com['image']; ?>">

                									</div>
                									<div class="col-lg-10">
                										<p class="mb-0 p-o"><?php echo $Com['name'] ?></p>
                										<div class="card  p-0 mt-0 bg-light">
                											<div class="mt-1 mb-1 text-dark">
                												<?php echo $c['comment']; ?>
                											</div>
                										</div>
                									</div>

                									<div class="col-lg-1">
                										<p class="card-text"><small class="text-muted"><?php echo date('H:i d/m/y ', $c['date']); ?></small></p>
                									</div>
                								</div>
                							<?php endforeach; ?>

                						</div>
                					</div>
                				</div>
                			</div>


                		</div>

                	</div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->


                <!-- Modal -->
                <div class="modal fade" id="newImageModal" tabindex="-1" aria-labelledby="newImageModalLabel" aria-hidden="true">
                	<div class="modal-dialog">
                		<div class="modal-content">
                			<div class="modal-header">

                				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                			</div>


                			<div class="modal-body">
                				<div class="col-lg">
                					<img class="img-fluid" src="<?php echo base_url('assets/img/image_post/') . $posts['image']; ?>">
                				</div>
                			</div>

                			<div class="modal-footer">
                				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                			</div>


                		</div>
                	</div>
                </div>