			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><button class="btn bg-secondary text-white shadow-none" onclick="history.back()"><i class="align-middle display-3" data-feather="chevron-left"></i></button> APPROVISIONNEMENT ARTICLE</h1>

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
								<div class="card-body d-none d-sm-block">
                                    <table class="table table-hover my-0">
                                        <thead>
                                            <tr>
                                                <th>Article</th>
                                                <th>Qte Acheter</th>
                                                <th>Qte En Stock</th>
                                                <th>Date APPR</th>
                                                <th>PAU</th>
                                                <th>PAT</th>
                                                <th>PVU</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($list_achat as $key => $value) { ?>
                                            <tr>
                                                <td><?=$list_achat[$key]['article']?></td>
                                                <td><?=$list_achat[$key]['quantite_acheter']?></td>
                                                <td><?=$list_achat[$key]['quantite_stock']?></td>
                                                <td><?=date($list_achat[$key]['appr_date'])?></td>
                                                <td><?=$list_achat[$key]['pa']?></td>
                                                <td><?=$list_achat[$key]['pa'] * $list_achat[$key]['quantite_acheter']?></td>
                                                <td><?=$list_achat[$key]['pv']?></td>
                                                <td>
                                                    <button class="btn shadow-none bg-secondary text-white mt-1"  data-bs-target="#UpdateApprovisionner" data-bs-toggle="modal" data-id="<?=$list_achat[$key]['achat_id']?>"><i class="align-middle" data-feather="edit"></i> Modifier</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn shadow-none bg-secondary text-white mt-1" onclick="deleteThis('<?=$list_achat[$key]['achat_id']?>','achat')"><i class="align-middle" data-feather="trash-2"></i> Supprimer</button>
                                                </td>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
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

<div class="modal fade"  id="UpdateApprovisionner" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">MODIFIER ACHAT</h5>
        <button type="button" style="background-color: transparent; border: none;"  id="close_validation" data-bs-dismiss="myModal" aria-label="Close"><span style="font-size:20px;"><i class="icon-copy ion-ios-close"></i></span></button>
      </div>
      <div class="modal-body">
        
        <div id="modal-validation-body">
            <form class="col-md-12" id="update_article" autofill="false" autocomplete="off" autofill="false">
                <div class="form-group">
                    <label>Article</label>
                    <input type="hidden" name="update_article_achat_id" id="update_article_achat_id">
                    <input type="text" name="update_article_article" id="update_article_article" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                </div>

                <div class="form-group">
                    <label>Quantite En Stock</label>
                    <input type="number" name="update_article_quantite_s" id="update_article_quantite_s" autocomplete="false" class="form-control" required="" minlength="2">
                </div>

				<div class="row">
                    <div class="col-6 form-group">
                        <label>PAU</label>
                        <input type="number" name="update_article_pau" id="update_article_pau" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>

                    <div class="col-6 form-group">
                        <label>PAT</label>
                        <input type="number" name="update_article_pat" id="update_article_pat" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>
                </div>

				<div class="row">
                    <div class="col-6 form-group">
                        <label>PVU</label>
                        <input type="number" name="update_article_pvu" id="update_article_pvu" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>
                    <div class="col-6 form-group">
                        <label>Date</label>
                        <input type="date" name="update_article_date" id="update_article_date" autocomplete="false" class="form-control" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="update_article_description" id="update_article_description" autocomplete="false" class="form-control" required="" min="2"></textarea>
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-secondary w-100 text-white">
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