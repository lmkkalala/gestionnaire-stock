			<main class="content">
				<div class="container-fluid p-0" id="modifier">

					<div class="mb-3">
						<h1 class="h3 d-inline align-middle"><button class="btn bg-secondary text-white shadow-none" onclick="history.back()"><i class="align-middle display-3" data-feather="chevron-left"></i></button> Profile</h1>
						<a class="badge bg-dark text-white ms-2" href=""> Contacter LMK </a>
					</div>
					<div class="row">
						<div class="col-md-5 col-xl-4">
							<div class="card mb-4">
								<div class="card-header">
									<h5 class="card-title mb-0">Details Profile</h5>
								</div>
								<div class="card-body text-center">
									<img src="<?=base_url('static/img/user/')?><?=$this->session->profile?>" alt="<?=$this->session->name?>" class="img-fluid rounded-circle mb-2" width="128" height="128" />
									<h5 class="card-title mb-2"><strong><i class="align-middle" data-feather="user"></i> </strong> <?=$this->session->name?></h5>
									<div class="text-muted mb-2"><strong><i class="align-middle" data-feather="mail"></i> </strong> <?=$this->session->email?></div>
                                    <div class="text-muted mb-2"><strong><i class="align-middle" data-feather="phone"></i> </strong><?=$this->session->phone?></div>
								</div>
								<hr class="my-0" />
							</div>
                            <div class="card mt-2">
                                <a href="#" class="btn btn-secondary w-100" data-bs-target="#ajouter" data-bs-toggle="modal">Ajouter Admin</a>
                            </div>
						</div>

						<div class="col-md-7 col-xl-8">
							<div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Modifier Information</h5>
								</div>
								<div class="card-body h-100">
                                    <form id="update_user_connected" enctype="multipart/form-data">
										<div class="d-flex align-items-start">
											<input type="hidden" name="user_id" id="user_id" value="<?=$this->session->userID?>">
											<input type="hidden" name="user_profile_old" id="user_profile_old" value="<?=$this->session->profile?>">
											<input type="file" name="user_profile" id="user_profile" class="form-control" value="" >
										</div>
										<hr />
										<div class="d-flex align-items-start">
											<input type="text" name="user_name" id="user_name" class="form-control" value="<?=$this->session->name?>" >
										</div>
										<hr />
										<div class="d-flex align-items-start">
											<input type="email" name="user_email" id="user_email" class="form-control" value="<?=$this->session->email?>" >
										</div>
										<hr />
										<div class="d-flex align-items-start">
											<input type="tel" name="user_phone" id="user_phone" class="form-control" value="<?=$this->session->phone?>" >
										</div>
										<hr />
										<div class="d-grid">
											<button type="submit" class="btn btn-secondary w-100">Modifier</button>
										</div>
									</form>
								</div>
							</div>
						</div>
                        <div class="col-md-12">
                            <div class="card">
								<div class="card-header">
									<form class="row" method="post">
                                        <h5 class="card-title mb-1">Filter par noms ou par date.</h5>
                                        <div class="col-md-3 mt-1">
                                            <input type="text" name="user_name" class="form-control shadow-none" placeholder="Noms . . .">
                                        </div>
                                        <div class="col-md-3 mt-1">
                                            <input type="text" name="date"  class="form-control shadow-none" placeholder="2022-07-18">
                                        </div>
										<div class="col-md-3 mt-1">
                                            <button type="submit" class="form-control shadow-none"> <i class="align-middle" data-feather="refresh-ccw"></i> <strong> Filtrer</strong></button>
                                        </div>
                                    </form>
								</div>
								<div class="card-body">
                                    <table class="table table-hover my-0">
                                        <thead>
                                            <tr>
                                                <th>Profile</th>
                                                <th>Noms</th>
                                                <th>Email</th>
                                                <th>Telephone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php foreach ($list_user as $key => $value) { ?>
											<tr>
                                                <td><img src="<?=base_url('static/img/user/').$list_user[$key]['image']?>" width="36" height="36" class="rounded-circle me-2" alt="<?=$list_user[$key]['name']?>"></td>
                                                <td><?=$list_user[$key]['name']?></td>
                                                <td><?=$list_user[$key]['email']?></td>
                                                <td><?=$list_user[$key]['phone']?></td>
                                                <td>
                                                    <button class="btn shadow-none bg-secondary text-white mt-1"  data-bs-target="#updateUser" data-bs-toggle="modal" data-id="<?=$list_user[$key]['id']?>"><i class="align-middle" data-feather="edit"></i> Modifier</button>
                                                    <button class="btn shadow-none bg-secondary text-white mt-1" onclick="deleteThis('<?=$list_user[$key]['id']?>','user')"><i class="align-middle" data-feather="trash-2"></i> Supprimer</button>
                                                </td>
                                            </tr>
											<?php }?>
                                        
                                        </tbody>
                                    </table>
								</div>
							</div>
                        </div>
					</div>

				</div>
			</main>

			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								&copy; <a class="text-muted" href="" target="_blank"><strong>Backend of LMK Kalala</strong></a><a class="text-muted" href="https://adminkit.io/" target="_blank"><strong> & AdminKit</strong></a>
							</p>
						</div>
						<!-- <div class="col-6 text-end">
							<ul class="list-inline">
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Support</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Help Center</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Privacy</a>
								</li>
								<li class="list-inline-item">
									<a class="text-muted" href="https://adminkit.io/" target="_blank">Terms</a>
								</li>
							</ul>
						</div> -->
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="<?=base_url('static/')?>js/app.js"></script>
<div class="modal fade"  id="ajouter" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">NOUVELLE UTILISATEUR</h5>
        <button type="button" style="background-color: transparent; border: none;"  id="close_validation" data-bs-dismiss="myModal" aria-label="Close"><span style="font-size:20px;"><i class="icon-copy ion-ios-close"></i></span></button>
      </div>
      <div class="modal-body">
        
        <div id="modal-validation-body">
            <form class="col-md-12" id="new_user" autofill="false" autocomplete="off" autofill="false" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Profile</label>
                    <input type="file" name="new_user_profile" id="new_user_profile" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                </div>

				<div class="form-group">
                    <label>Noms</label>
                	<input type="text" name="new_user_name" id="new_user_name" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                </div>

				<div class="form-group">
                    <label>Email</label>
                    <input type="email" name="new_user_email" id="new_user_email" autocomplete="false" class="form-control" required="">
                </div>

                <div class="form-group">
                    <label>Telephone</label>
                    <input type="tel" name="new_user_phone" id="new_user_phone" autocomplete="false" class="form-control" required="">
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-secondary w-100">
						<!-- <div class="spinner-border d-none-r" id="load_enrg_3" role="status"></div> -->
					Confirmer</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade"  id="updateUser" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">MODIFIER UTILISATEUR</h5>
        <button type="button" style="background-color: transparent; border: none;"  id="close_validation" data-bs-dismiss="myModal" aria-label="Close"><span style="font-size:20px;"><i class="icon-copy ion-ios-close"></i></span></button>
      </div>
      <div class="modal-body">
        
        <div id="modal-validation-body">
            <form class="col-md-12" id="update_user" autofill="false" autocomplete="off" autofill="false" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Profile</label>
					<input type="hidden" name="update_user_id" id="update_user_id" >
					<input type="hidden" name="update_user_profile_old" id="update_user_profile_old">
                    <input type="file" name="update_user_profile" id="update_user_profile" autocomplete="false" class="form-control" minlength="2" placeholder="">
                </div>

				<div class="form-group">
                    <label>Noms</label>
                	<input type="text" name="update_user_name" id="update_user_name" autocomplete="false" class="form-control" minlength="2" placeholder="">
                </div>

				<div class="form-group">
                    <label>Email</label>
                    <input type="email" name="update_user_email" id="update_user_email" autocomplete="false" class="form-control">
                </div>

                <div class="form-group">
                    <label>Telephone</label>
                    <input type="tel" name="update_user_phone" id="update_user_phone" autocomplete="false" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-secondary w-100">
						<!-- <div class="spinner-border d-none-r" id="load_enrg_3" role="status"></div> -->
					Confirmer</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>