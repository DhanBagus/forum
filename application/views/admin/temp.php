

					<div class="container-fluid">
						<div class="row mb-3">
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										<div class="">
											<h6 style="float: left;">Category</h6>
											<a href="" class="ml-2"><i class="fas fa-plus"></i></a>
										</div>
										<hr>
										<div class="table-responsive">
											<table class="table table-sm" id="dataTable">
												<thead class="thead-light">
													<tr>
													<th scope="col">No</th>
													<th scope="col">Category</th>
													</tr>
												</thead>
												<tbody>

													<?php $i=1; ?>
													<?php foreach ($category as $c): ?>

													<tr>
														<td scope="row"><?php echo $i; ?></td>
														<td><?php echo $c['categori']; ?></td>
													</tr>

													<?php $i++; ?>
							    					<?php endforeach; ?>
													
												</tbody>
											</table>
										</div>
										
										
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										<div class="">
											<h6>Mamber forum</h6>
											
										</div>
										<hr>
										<div class="table-responsive">
											<table class="table table-sm" id="dtU">
												<thead class="thead-light">
													<tr>
													<th scope="col">No</th>
													<th scope="col">Category</th>
													<th scope="col">E-mail</th>
													</tr>
												</thead>
												<tbody>

													<?php $j=1; ?>
													<?php foreach ($mamber as $m): ?>

													<tr>
														<td scope="row"><?php echo $j; ?></td>
														<td><?php echo $m['name']; ?></td>
														<td><?php echo $m['email']; ?></td>
													</tr>

													<?php $j++; ?>
							    					<?php endforeach; ?>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										This is some text within a card body.
									</div>
								</div>
							</div>
						</div>

						<div class="row mb-3">
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										This is some text within a card body.

										<div class="row">
											<div class="col-md-5">
												<input type="date" class="form-control form-control-sm" id="tm" name="tm" placeholder="Start date">
											</div>
											<div class="col-md-5">
												<input type="date" class="form-control form-control-sm" id="ta" name="ta" placeholder="End date">
											</div>
											<div class="col-md-2">
												<button class="btn btn-primary btn-sm"><i class="fas fa-search"></i></button>
											</div>
										</div>
										
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										This is some text within a card body.
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
									<div class="card-body">
										This is some text within a card body.
									</div>
								</div>
							</div>
						</div>
					</div>
                    
