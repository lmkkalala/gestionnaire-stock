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
									<img src="<?=base_url('static/img/user/')?><?=$this->session->profile?>" alt="<?=$this->session->name?>" class="img-fluid rounded mb-2" width="128" height="128" />
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

						<div class="col-md-6 col-xl-6">
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
										<div class="col-md-3 mt-1">
                                                    <select name="" class="form-control shadow-none fw-bold" id="dates">
                                                        <option value="date">Annee-Mois-Jour</option>
                                                        <option value="month">Annee-Mois</option>
                                                        <option value="number">Annee</option>
                                                    </select>
                                            </div>
                                        <div class="col-md-3 mt-1">
                                            <input type="text" name="user_name" class="form-control shadow-none" placeholder="Noms . . .">
                                        </div>
                                        <div class="col-md-3 mt-1">
                                            <input type="date" name="date"  class="form-control shadow-none" placeholder="2022" value="<?=date('d-m-Y',time())?>">
                                        </div>
										<div class="col-md-3 mt-1">
                                            <button type="submit" class="form-control shadow-none"> <i class="align-middle" data-feather="refresh-ccw"></i> <strong> OK</strong></button>
                                        </div>
                                    </form>
								</div>
								<div class="card-body">
                                    <table class="table table-hover my-0 mt-2" style="width:100%" id="profile">
                                        <thead class="bg-secondary text-white w-100">
                                            <tr>
												<th>Plus</th>
                                                <th>Profile</th>
                                                <th>Noms</th>
                                                <th>Email</th>
                                                <th>Telephone</th>
                                                <th>Modifier</th>
												<th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											<?php foreach ($list_user as $key => $value) { ?>
											<tr>
												<td><button class="btn fw-bold shadow-none bg-secondary text-white"><i class="align-middle" data-feather="plus-circle"></i></button></td>
                                                <td><img src="<?=base_url('static/img/user/').$list_user[$key]['image']?>" width="36" height="36" class="rounded-circle me-2" alt="<?=$list_user[$key]['name']?>"></td>
                                                <td><?=$list_user[$key]['name']?></td>
                                                <td><?=$list_user[$key]['email']?></td>
                                                <td><?=$list_user[$key]['phone']?></td>
                                                <td>
                                                    <button class="btn shadow-none bg-secondary text-white mt-1"  data-bs-target="#updateUser" data-bs-toggle="modal" data-id="<?=$list_user[$key]['id']?>"><i class="align-middle" data-feather="edit"></i> Modifier</button>
												</td>
												<td>
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


<div class="container-fluid">
			<div class="row">
			<div class="row mb-2">
						<div class="col-md-6 mt-1">
							<a href="<?=base_url('Panel/pages/')?>vue_global" class="btn btn-secondary shadow-none">
								<h5 class="h5 text-white"><strong>Vue </strong> Global</h5>
							</a>
						</div>
					</div>
					<div class="col-md-12 mb-2">
							<form class="row" method="post">
								<div class="col-md-4 mt-1">
									<input type="text"  class="form-control shadow-none fw-bold" readonly="" value="LE MEILLEUR OUTIL POUR VOUS ...">
								</div>
								<div class="col-md-3 mt-1">
									<input type="text" name="article"  class="form-control shadow-none" value="<?=$article_s?>" placeholder="Article . . .">
								</div>
								<div class="col-md-3 mt-1">
									<input type="date" name="date"  class="form-control shadow-none" value="<?=$date?>">
								</div>
								<div class="col-md-2 mt-1">
									<button type="submit" class="form-control shadow-none"> 
										<i class="align-middle" data-feather="refresh-ccw"></i> 
										<strong> ok</strong></button>
								</div>
							</form>
						</div>
						<div class="col-md-12 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>article" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">PV Valeur Stock Article</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><small><?=$count_pvt?></small> $</h1>
													<div class="mb-0">
														<!-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
														<span class="text-muted">Since last week</span> -->
														<strong class="text-muted">Prix de vente Total</strong>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>article" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">PA de la valeur Stock Article</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><small><?=$count_pat?></small> $</h1>
													<div class="mb-0">
														<!-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
														<span class="text-muted">Since last week</span> -->
														<strong class="text-muted">Prix d'achat Total</strong>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>article" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Nombre Stock Article</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="truck"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><small><?=$n_article?></small></h1>
													<div class="mb-0">
														<!-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
														<span class="text-muted">Since last week</span> -->
														<strong class="text-muted">Article enregister</strong>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>vente" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Ventes</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><small><?=$nos_vente?></small> $</h1>
													<div class="mb-0">
														<!-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
														<span class="text-muted">Since last week</span>-->
														<strong class="text-muted">cout de vente total</strong>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>vente" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Nombre Ventes</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="shopping-cart"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><small><?=$n_vente?></small></h1>
													<div class="mb-0">
														<!-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
														<span class="text-muted">Since last week</span>-->
														<strong class="text-muted">Nombre de vente total</strong>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>article" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Achats</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><small><?=$count_pa?></small> $</h1>
													<div class="mb-0">
														<!-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
														<span class="text-muted">Since last week</span> -->
														<strong class="text-muted">Cout d'approvisionnement</strong>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>article" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Nombre Achat</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="shopping-bag"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><small><?=$n_achet?></small></h1>
													<div class="mb-0">
														<!-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
														<span class="text-muted">Since last week</span> -->
														<strong class="text-muted">Nombre d'approvisionnement</strong>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>benefice" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Benefices</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><?=$benefice?> $</h1>
													<div class="mb-0">
														<!-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
														<span class="text-muted">Since last week</span> -->
														<strong class="text-muted">Nos benefice total</strong>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>depense" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">DEPENSE</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><?=$spent?> $</h1>
													<div class="mb-0">
														<!-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
														<span class="text-muted">Since last week</span> -->
														<strong class="text-muted">Nos depenses total</strong>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>

						
					</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">MONTANT VENDU PAR MOIS</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Article le plus vendu</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="row">
										<div class="col-6">
											<table class="table mb-0">
												<tbody id="product"></tbody>
											</table>
										</div>
										<div class="col-6 py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Real-Time</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div> 
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>

					<div class="row">
						<!-- <div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Projects</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Start Date</th>
											<th class="d-none d-xl-table-cell">End Date</th>
											<th>Status</th>
											<th class="d-none d-md-table-cell">Assignee</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Project Apollo</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Fireball</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project Hades</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Nitro</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Phoenix</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project X</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Romeo</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Christina Mason</td>
										</tr>
										<tr>
											<td>Project Wombat</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div> -->
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">QUANTITE VENDU PAR MOIS</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
				


			</main>
<script>
    $(document).ready(function(){
        var profile = $('#profile').DataTable({
			"lengthMenu": [[50, 100, -1], [50, 100, "All"]],
            responsive: true
        });

        new $.fn.dataTable.FixedHeader( profile );
    });
</script>
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-6 text-start">
							<p class="mb-0">
								&copy; <a class="text-muted" href="https://lucienkalala.github.io/Portfolio" target="_blank"><strong>LMK Kalala</strong></a><a class="text-muted" href="https://adminkit.io/" target="_blank"><strong> & AdminKit</strong></a>
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
        <button type="button" class="btn shadow-none" data-bs-dismiss="modal" aria-label="Close">
            <span style="font-size:20px;"><i class="align-middle" data-feather="minus-circle"></i></span>
        </button>
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
        <button type="button" class="btn shadow-none" data-bs-dismiss="modal" aria-label="Close">
            <span style="font-size:20px;"><i class="align-middle" data-feather="minus-circle"></i></span>
        </button>
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

<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart

			$.ajax({
					type:'POST',
					url:'<?=base_url('Panel/')?>money',
					dataType:'json',	
					success: function(data){
						$('button').prop('disabled',false);
						if(data.status == 'success'){
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: data.money
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});

						}

					},
					error: function (data) {
						console.log('Error:', data);
					}
			});

		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			$.ajax({
				type:'POST',
					url:'<?=base_url('Panel/')?>bestsoldProduct',
					dataType:'json',	
					success: function(data){
						$('button').prop('disabled',false);
						if(data.status == 'success'){
							var labels = data.sellers;
							var montant = data.montant;
							$('#product').html(data.product);
							// labels = ["Chrome","Firefox","IE"];
							// data = [4306,3801,1689];
							new Chart(document.getElementById("chartjs-dashboard-pie"), {
								type: "pie",
								data: {
									labels: labels,
									datasets: [{
										data: montant,
										backgroundColor: [
											window.theme.primary,
											window.theme.warning,
											window.theme.danger,
											window.theme.success,
											window.theme.info
										],
										borderWidth: 5
									}]
								},
								options: {
									responsive: !window.MSInputMethodContext,
									maintainAspectRatio: false,
									legend: {
										display: false
									},
									cutoutPercentage: 75
								}
							});
						}else{
							console.log('Error Best seller');
						}
					},
					error: function (data) {
						console.log('Error:', data);
					}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			$.ajax({
					type:'POST',
					url:'<?=base_url('Panel/')?>number',
					dataType:'json',	
					success: function(data){
						$('button').prop('disabled',false);
						if(data.status == 'success'){

							new Chart(document.getElementById("chartjs-dashboard-bar"), {
								type: "bar",
								data: {
									labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
									datasets: [{
										label: "No",
										backgroundColor: window.theme.primary,
										borderColor: window.theme.primary,
										hoverBackgroundColor: window.theme.primary,
										hoverBorderColor: window.theme.primary,
										data: data.number,//[54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
										barPercentage: .75,
										categoryPercentage: .5
									}]
								},
								options: {
									maintainAspectRatio: false,
									legend: {
										display: false
									},
									scales: {
										yAxes: [{
											gridLines: {
												display: false
											},
											stacked: false,
											ticks: {
												stepSize: 20
											}
										}],
										xAxes: [{
											stacked: false,
											gridLines: {
												color: "transparent"
											}
										}]
									}
								}
							});
						}

					},
					error: function (data) {
						console.log('Error:', data);
					}
				});
			});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		// document.addEventListener("DOMContentLoaded", function() {
		// 	var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
		// 	var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
		// 	document.getElementById("datetimepicker-dashboard").flatpickr({
		// 		inline: true,
		// 		prevArrow: "<span title=\"Previous month\">&laquo;</span>",
		// 		nextArrow: "<span title=\"Next month\">&raquo;</span>",
		// 		defaultDate: defaultDate
		// 	});
		// });
	</script>

</html>