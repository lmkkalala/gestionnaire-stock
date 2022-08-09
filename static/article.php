			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><button class="btn bg-secondary text-white shadow-none" onclick="history.back()"><i class="align-middle display-3" data-feather="chevron-left"></i></button> STOCK D'ARTICLE</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
                                        <h5 class="card-title mb-1">Filtrer par noms ou par date.</h5>
                                        <form class="row" method="post">
                                        <div class="col-md-3 mt-1">
                                            <input type="text" name="article" class="form-control shadow-none" placeholder="Article . . .">
                                        </div>
                                        <div class="col-md-3 mt-1">
                                            <input type="text" name="date" class="form-control shadow-none" placeholder="2022-07-18">
                                        </div>
                                        <div class="col-md-3 mt-1">
                                            <button type="submit" class="form-control shadow-none"> <i class="align-middle" data-feather="refresh-ccw"></i> <strong> Filtrer</strong></button>
                                        </div>
                                        <div class="col-md-3 mt-1">
                                            <button type="button" class="form-control shadow-none" data-bs-target="#article" data-bs-toggle="modal"> <strong>+</strong> Ajouter article</button>
                                        </div>
                                        </form>
                                        
                                    </div>
								</div>
								<div class="card-body d-none d-sm-block">
                                    <table class="table table-hover my-0">
                                        <thead>
                                            <tr>
                                                <th>Article</th>
                                                <th>Qte Stock</th>
                                                <th>Date</th>
                                                <th>PA</th>
                                                <th>PV</th>
                                                <th>Approvisionner</th>
                                                <th>Vendre</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                foreach ($list_article as $key => $value) {
                                            ?>
                                            <tr>
                                                <td><a href="<?=base_url('Panel/pages/details/').$list_article[$key]['article_id']?>" class="text-decoration-none text-secondary"><?=$list_article[$key]['article']?></a></td>
                                                <td><?=$list_article[$key]['quantite_stock']?></td>
                                                <td><?=date($list_article[$key]['added_date'])?></td>
                                                <td><?=$list_article[$key]['pa']?></td>
                                                <td><?=$list_article[$key]['pv']?></td>
                                                <td>
                                                    <button class="btn shadow-none bg-secondary text-white mt-1" data-bs-target="#approvisionner" data-bs-toggle="modal" data-id="<?=$list_article[$key]['article_id']?>"><i class="align-middle" data-feather="truck"></i> Approvisionner</button>
                                                </td>
                                                <td>
                                                    <button class="btn shadow-none bg-secondary text-white mt-1" data-bs-target="#vendre" data-bs-toggle="modal" data-id="<?=$list_article[$key]['article_id']?>"><i class="align-middle" data-feather="layers"></i> Vendre</button>
                                                </td>
                                                <td>
                                                    <button class="btn shadow-none bg-secondary text-white mt-1"  data-bs-target="#UpdateArticle" data-bs-toggle="modal" data-id="<?=$list_article[$key]['article_id']?>"><i class="align-middle" data-feather="edit"></i> Modifier</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn shadow-none bg-secondary text-white mt-1" onclick="deleteThis('<?=$list_article[$key]['article_id']?>','article')"><i class="align-middle" data-feather="trash-2"></i> Supprimer</button>
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

<div class="modal fade"  id="approvisionner" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">APPROVISIONNEMENT ARTICLE</h5>
        <button type="button" style="background-color: transparent; border: none;" data-bs-dismiss="myModal" aria-label="Close"><span style="font-size:20px;"><i class="icon-copy ion-ios-close"></i></span></button>
      </div>
      <div class="modal-body">
        
        <div id="modal-validation-body">
            <form class="col-md-12" id="appro_article" autofill="false" autocomplete="off" autofill="false">
                <div class="form-group">
                    <label>Article</label>
                    <input type="text" name="appro_article_article" id="appro_article_article" autocomplete="false" class="form-control" readonly="" minlength="2" placeholder="">
                    <input type="hidden" name="appro_article_article_id" id="appro_article_article_id" autocomplete="false" class="form-control" readonly="" minlength="2" placeholder="">
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label>Quantite En stock</label>
                        <input type="number" name="appro_article_quantite_s" id="appro_article_quantite_s" autocomplete="false" class="form-control" readonly="" minlength="2">
                    </div>

                    <div class="col-6 form-group">
                        <label>Quantite Acheter</label>
                        <input type="number" name="appro_article_quantite_a" id="appro_article_quantite_a" autocomplete="false" class="form-control" required="" minlength="2">
                    </div>
                </div>

				<div class="row">
                    <div class="col-4 form-group">
                        <label>PAU</label>
                        <input type="number" name="appro_article_pau" id="appro_article_pau" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>

                    <div class="col-4 form-group">
                        <label>AUTRE DEPENSES</label>
                        <input type="number" name="appro_article_other_s" id="appro_article_other_s" value="0" autocomplete="false" class="form-control" minlength="2" placeholder="">
                    </div>

                    <div class="col-4 form-group">
                        <label>PAT</label>
                        <input type="number" name="appro_article_pat" id="appro_article_pat" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>
                </div>

				<div class="row">
                    <div class="col-6 form-group">
                        <label>PVU</label>
                        <input type="number" name="appro_article_pvu" id="appro_article_pvu" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>
                    <div class="col-6 form-group">
                        <label>Date</label>
                        <input type="date" name="appro_article_date" id="appro_article_date" autocomplete="false" class="form-control" required="">
                    </div>
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <textarea name="appro_article_description" id="appro_article_description" autocomplete="false" class="form-control" required="" value="Pas de commentaire" min="5">Pas de commentaire</textarea>
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

<div class="modal fade"  id="article" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">NOUVEAU ARTICLE</h5>
        <button type="button" style="background-color: transparent; border: none;"  id="close_validation" data-bs-dismiss="myModal" aria-label="Close"><span style="font-size:20px;"><i class="icon-copy ion-ios-close"></i></span></button>
      </div>
      <div class="modal-body">
        
        <div id="modal-validation-body">
            <form class="col-md-12" id="new_article" autofill="false" autocomplete="off" autofill="false">
                <div class="form-group">
                    <label>Article</label>
                    <input type="text" name="new_article_article" id="new_article_article" autocomplete="false" class="form-control" required="" minlength="3" placeholder="">
                </div>
                
                <div class="row">
                    <div class="col-6 form-group">
                        <label>PA</label>
                        <input type="number" name="new_article_pa" id="new_article_pa" autocomplete="false" class="form-control" required="" value="0" minlength="3" placeholder="">
                    </div>
                    <div class="col-6 form-group">
                        <label>PV</label>
                        <input type="number" name="new_article_pv" id="new_article_pv" autocomplete="false" class="form-control" required="" value="0" minlength="3" placeholder="">
                    </div>
                </div>
                <div class="form-group">
                    <label>Quantite</label>
                    <input type="number" name="new_article_quantite" id="new_article_quantite" autocomplete="false" value="0" class="form-control" required="">
                </div>

                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="new_article_date" id="new_article_date" autocomplete="false" class="form-control" required="">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="new_article_description" id="new_article_description" autocomplete="false" class="form-control">Pas de commentaire</textarea>
                </div>

                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-secondary w-100 text-white">
						<!-- <div class="spinner-border d-none-r" id="load_enrg_3" role="status"> </div> -->
						Enregistrer
					</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade"  id="vendre" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">VENDRE ARTICLE</h5>
        <button type="button" style="background-color: transparent; border: none;"  id="close_validation" data-bs-dismiss="myModal" aria-label="Close"><span style="font-size:20px;"><i class="icon-copy ion-ios-close"></i></span></button>
      </div>
      <div class="modal-body">
        <div id="modal-validation-body">
            <form class="col-md-12" id="sell_article" autofill="false" autocomplete="off" autofill="false">
                <div class="row">
                    <div class="col-6 form-group">
                        <label>Article</label>
                        <input type="text" name="sell_article_article" id="sell_article_article" autocomplete="false" class="form-control" readonly="" minlength="2" placeholder="">
                        <input type="hidden" name="sell_article_article_id" id="sell_article_article_id" autocomplete="false" class="form-control" readonly="" minlength="2" placeholder="">
                    </div>
                    <div class="col-6 form-group">
                    <label>Les prix d'achat est <stron id="sell_pa"></strong></label>
                        <input type="number" name="sell_pau" id="sell_pau"  autocomplete="false" class="form-control" readonly="" minlength="2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label>Quantite En Stock</label>
                        <input type="number" name="sell_article_quantite_s" id="sell_article_quantite_s" autocomplete="false" class="form-control" readonly="" minlength="2">
                    </div>

                    <div class="col-6 form-group">
                        <label>Quantite Vendu</label>
                        <input type="number" name="sell_article_quantite_v" id="sell_article_quantite_v" autocomplete="false" class="form-control" required="" minlength="2">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <label>PVU</label>
                        
                        <input type="number" name="sell_article_pvu" id="sell_article_pvu" autocomplete="false" value="0" class="form-control" required="">
                    </div>

                    <div class="col-6 form-group">
                        <label>PVT</label>
                        <input type="number" name="sell_article_pvt" id="sell_article_pvt" autocomplete="false" class="form-control" value="0" required="" min="2">
                    </div>
                </div>

				<div class="form-group">
                    <label>Date</label>
                    <input type="date" name="sell_article_date" id="sell_article_date" autocomplete="false" class="form-control" required="">
                </div>
				<div class="form-group">
                    <label>Description</label>
                    <textarea name="sell_article_description" id="sell_article_description" autocomplete="false" class="form-control" required=""></textarea>
                </div>
                <div class="form-group mt-2">
                    <button type="submit"  class="btn btn-secondary w-100">
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

<div class="modal fade"  id="UpdateArticle" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">MODIFIER ARTICLE</h5>
        <button type="button" style="background-color: transparent; border: none;"  id="close_validation" data-bs-dismiss="myModal" aria-label="Close"><span style="font-size:20px;"><i class="icon-copy ion-ios-close"></i></span></button>
      </div>
      <div class="modal-body">
        <div id="modal-validation-body">
            <form class="col-md-12" id="modify_article" autofill="false" autocomplete="off" autofill="false">
                <div class="row">
                    <div class="col-8 form-group">
                        <label>Article</label>
                        <input type="text" name="modify_article_article" id="modify_article_article" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                        <input type="hidden" name="modify_article_article_id" id="modify_article_article_id" autocomplete="false" class="form-control" readonly="" minlength="2" placeholder="">
                    </div>

                    <div class="col-4 form-group">
                        <label>Quantite En Stock</label>
                        <input type="number" name="modify_article_quantite" id="modify_article_quantite" autocomplete="false" class="form-control" readonly="" minlength="2">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label>PA</label>
                        <input type="number" name="modify_article_pa" id="modify_article_pa" autocomplete="false" class="form-control">
                    </div>

                    <div class="col-6 form-group">
                        <label>PV</label>
                        <input type="number" name="modify_article_pv" id="modify_article_pv" autocomplete="false" class="form-control" readonly="" min="5">
                    </div>
                </div>

				<div class="form-group">
                    <label>Date</label>
                    <input type="date" name="modify_date" id="modify_date" autocomplete="false" class="form-control" required="">
                </div>
				<div class="form-group">
                    <label>Description</label>
                    <textarea name="modify_description" id="modify_description" autocomplete="false" class="form-control" required=""></textarea>
                </div>
                <div class="form-group mt-2">
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