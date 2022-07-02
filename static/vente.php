			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><button class="btn bg-secondary text-white shadow-none" onclick="history.back()"><i class="align-middle display-3" data-feather="chevron-left"></i></button> ARTICLE VENDU</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
                                        <h5 class="card-title mb-1">Filtrer par noms ou par date.</h5>
                                        <form class="row" method="post">
                                            <div class="col-md-3 mt-1">
                                                <input type="text" name="article" class="form-control shadow-none" placeholder="Article">
                                            </div>
                                            <div class="col-md-3 mt-1">
                                                <input type="date" name="date" class="form-control shadow-none">
                                            </div>
                                            <div class="col-md-3 mt-1">
                                                <button type="submit" class="form-control shadow-none"> <i class="align-middle" data-feather="refresh-ccw"></i> <strong> Filtrer</strong></button>
                                            </div>
                                        </form>
                                    </div>
								</div>
								<div class="card-body mt-n2 d-none d-sm-block">
                                    <table class="table table-hover my-0">
                                        <thead>
                                            <tr>
                                                <th>Article</th>
                                                <th>Qte Vendu</th>
                                                <th>Qte Restannt</th>
                                                <th>Date VENTE</th>
                                                <th>PVU</th>
                                                <th>PVT</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($list_vente as $key => $value) { ?>
                                            <tr>
                                                <td><?=$list_vente[$key]['article']?></td>
                                                <td><?=$list_vente[$key]['quantite_vendu']?></td>
                                                <td><?=$list_vente[$key]['quantite_stock']?></td>
                                                <td><?=date($list_vente[$key]['sold_date'])?></td>
                                                <td><?=$list_vente[$key]['pvu']?></td>
                                                <td><?=$list_vente[$key]['pvt']?></td>
                                                <td>
                                                    <button class="btn shadow-none bg-secondary text-white mt-1" data-bs-target="#UpdateVente" data-bs-toggle="modal" data-id="<?=$list_vente[$key]['vente_id']?>"><i class="align-middle" data-feather="edit"></i> Modifier</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn shadow-none bg-secondary text-white mt-1" onclick="deleteThis('<?=$list_vente[$key]['vente_id']?>','vente')"><i class="align-middle" data-feather="trash-2"></i> Supprimer</button>
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
	<div class="modal fade"  id="UpdateVente" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">MODIFIER VENTE</h5>
        <button type="button" style="background-color: transparent; border: none;"  id="close_validation" data-bs-dismiss="myModal" aria-label="Close"><span style="font-size:20px;"><i class="icon-copy ion-ios-close"></i></span></button>
      </div>
      <div class="modal-body">
        
        <div id="modal-validation-body">
            <form class="col-md-12" id="update_sold"  autofill="false" autocomplete="off" autofill="false">
			    <div class="form-group">
                    <label>Article</label>
                    <input type="hidden" name="update_sold_vente_id" id="update_sold_vente_id">
                    <input type="hidden" name="update_sold_article_id" id="update_sold_article_id">
                    <input type="text" name="update_sold_article" id="update_sold_article" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                </div>
				
                <div class="row">
                    <div class="col-6 form-group">
                        <label>Quantite Vendu</label>
                        <input type="hidden" name="update_sold_quantite_v_old" id="update_sold_quantite_v_old">
                        <input type="number" name="update_sold_quantite_v" id="update_sold_quantite_v" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>

                    <div class="col-6 form-group">
                        <label>Quantite stock</label>
                        <input type="number" name="update_sold_quantite_s" id="update_sold_quantite_s" autocomplete="false" class="form-control" readonly="" minlength="2" placeholder="">
                    </div>
                </div>

				<div class="row">
                    <div class="col-6 form-group">
                        <label>PVU</label>
                        <input type="number" name="update_sold_pvu" id="update_sold_pvu" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>

                    <div class="col-6 form-group">
                        <label>PVT</label>
                        <input type="number" name="update_sold_pvt" id="update_sold_pvt" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6 form-group">
                        <label>PAU</label>
                        <input type="number" name="update_sold_pau" id="update_sold_pau" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>
                    <div class="col-6 form-group">
                        <label>Date Vente</label>
                        <input type="date" name="update_sold_date" id="update_sold_date" autocomplete="false" class="form-control" required="">
                    </div>
                </div>

				<div class="form-group">
                    <label>Description</label>
                    <textarea  name="update_sold_description" id="update_sold_description" autocomplete="false" class="form-control" required="" minlength="2"></textarea>
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