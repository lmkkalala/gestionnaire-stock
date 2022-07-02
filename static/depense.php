			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><button class="btn bg-secondary text-white shadow-none" onclick="history.back()"><i class="align-middle display-3" data-feather="chevron-left"></i></button> LES DEPENSES</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
                                        <h5 class="card-title mb-1">Filter par noms ou par date.</h5>
                                        <form class="row" method="post">
                                            <div class="col-md-3 mt-1">
                                                <input type="date" name="date" class="form-control shadow-none">
                                            </div>
                                            <div class="col-md-3 mt-1">
                                                <button type="submit" class="form-control shadow-none"> <i class="align-middle" data-feather="refresh-ccw"></i> <strong> Filtrer</strong></button>
                                            </div>
                                            <div class="col-md-3 mt-1">
                                                <button type="button" class="form-control shadow-none" data-bs-target="#depense" data-bs-toggle="modal"> + Enregistrer Depense</button>
                                            </div>
                                        </form>
                                        <div class="row d-flex justify-content-center mt-1">
                                            <?php
                                                if($spent >= $benefice){
                                                    $color = 'danger';
                                                }else{
                                                    $color = 'info';
                                                }
                                            ?>
                                            <div class="col-md-4 mt-1">
                                                <h5 class="text-success">BENEFICE <strong><?=$benefice?></strong> $</h5> 
                                            </div>
                                            <div class="col-md-4 mt-1">
                                                <h5 class="text-<?=$color?>">DEPENSE <strong><?=$spent?></strong> $</h5>
                                            </div> 
                                        </div>
                                    </div>
								</div>
								<div class="card-body d-none d-sm-block">
                                    <table class="table table-hover my-0">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Montant</th>
                                                <th>Raison</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($list_depense as $key => $value) { ?>
                                            <tr>
                                                <td><?=date($list_depense[$key]['date'])?></td>
                                                <td><?=$list_depense[$key]['montant']?></td>
                                                <td><?=$list_depense[$key]['description']?></td>
                                                <td>
                                                    <button class="btn shadow-none bg-secondary text-white mt-1" data-bs-target="#UpdateDepense" data-bs-toggle="modal" data-id="<?=$list_depense[$key]['id']?>"><i class="align-middle" data-feather="edit"></i> Modifier</button>
                                                </td>
                                                <td>
                                                    <button class="btn shadow-none bg-secondary text-white mt-1" onclick="deleteThis('<?=$list_depense[$key]['id']?>','depense')"><i class="align-middle" data-feather="trash-2"></i></i> Supprimer</button>
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
								<a class="text-muted" href="https://adminkit.io/" target="_blank"><strong>AdminKit</strong></a> &copy;
							</p>
						</div>
						<div class="col-6 text-end">
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
						</div>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="<?=base_url('static/')?>js/app.js"></script>
<div class="modal fade"  id="depense" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">NOUVELLE DEPENSE</h5>
        <button type="button" style="background-color: transparent; border: none;"  id="close_validation" data-bs-dismiss="myModal" aria-label="Close"><span style="font-size:20px;"><i class="icon-copy ion-ios-close"></i></span></button>
      </div>
      <div class="modal-body">
        
        <div id="modal-validation-body">
            <form class="col-md-12" id="new_depense" autofill="false" autocomplete="off" autofill="false">
                <div class="form-group">
                    <label>Montant</label>
                    <input type="number" name="new_depense_amount" id="new_depense_amount" autocomplete="false" class="form-control" required="" minlength="10" placeholder="">
                </div>

				<div class="form-group">
                    <label>Date</label>
                    <input type="date" name="new_depense_date" id="new_depense_date" autocomplete="false" class="form-control" required="">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea  name="new_depense_description" id="new_depense_description" autocomplete="false" class="form-control" required="" minlength="2"></textarea>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-secondary w-100">
						<!-- <div class="spinner-border d-none-r" id="load_enrg_3" role="status"></div> -->
						Confirmer
					</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade"  id="UpdateDepense" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">MODIFIER DEPENSE</h5>
        <button type="button" style="background-color: transparent; border: none;"  id="close_validation" data-bs-dismiss="myModal" aria-label="Close"><span style="font-size:20px;"><i class="icon-copy ion-ios-close"></i></span></button>
      </div>
      <div class="modal-body">
        
        <div id="modal-validation-body">
            <form class="col-md-12" id="update_depense" autofill="false" autocomplete="off" autofill="false">
                <div class="form-group">
                    <label>Montant</label>
                    <input type="hidden" name="update_depense_id" id="update_depense_id">
                    <input type="number" name="update_depense_amount" id="update_depense_amount" autocomplete="false" class="form-control" required="" minlength="10" placeholder="">
                </div>

				<div class="form-group">
                    <label>Date</label>
                    <input type="date" name="update_depense_date" id="update_depense_date" autocomplete="false" class="form-control" required="">
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea  name="update_depense_description" id="update_depense_description" autocomplete="false" class="form-control" required="" minlength="2"></textarea>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="btn btn-secondary w-100">
						<!-- <div class="spinner-border d-none-r" id="load_enrg_3" role="status"></div> -->
						Confirmer
					</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>
</body>

</html>