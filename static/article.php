            <main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><button class="btn bg-secondary text-white shadow-none" onclick="history.back()"><i class="align-middle display-3" data-feather="chevron-left"></i></button> STOCK D'ARTICLE</h1>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
                                        <form class="row" method="post">
                                            <div class="col-md-3 mt-1">
                                                        <select name="" class="form-control shadow-none fw-bold" id="dates">
                                                            <option value="date">Annee-Mois-Jour</option>
                                                            <option value="month">Annee-Mois</option>
                                                            <option value="number">Annee</option>
                                                        </select>
                                            </div>
                                            <div class="col-md-3 mt-1">
                                                <input type="text" name="article" class="form-control shadow-none" placeholder="Article . . .">
                                            </div>
                                            <div class="col-md-2 mt-1">
                                                <input type="date" name="date" class="form-control shadow-none" placeholder="2022" value="<?=date('d-m-Y',time())?>">
                                            </div>
                                            <div class="col-md-2 mt-1">
                                                <button type="submit" class="form-control shadow-none"> 
                                                    <i class="align-middle" data-feather="refresh-ccw"></i> <strong>ok</strong>
                                                </button>
                                            </div>
                                            <div class="col-md-2 mt-1">
                                                <button type="button" class="form-control shadow-none" data-bs-target="#article" data-bs-toggle="modal">
                                                    <i class="align-middle" data-feather="plus-circle"></i> <strong>Article</strong>
                                                </button>
                                            </div>
                                        </form>
                                        
                                    </div>
								</div>
								<div class="card-body">
                                <!-- d-none d-sm-block -->
                                    <table id="articles" class="table table-hover my-0 mt-2" style="width:100%">
                                        <thead class="bg-secondary text-white w-100">
                                            <tr>
                                                <th>Plus</th>
                                                <th>Article</th>
                                                <th>Qte Stock</th>
                                                <!-- <th>Date</th> -->
                                                <th>PA</th>
                                                <th>PV</th>
                                                <?php if ($act_page == "appro") {  ?>
                                                <th>Approvisionner</th>
                                                <?php  }elseif ($act_page == "vendre") { ?>
                                                <th>Vendre</th>
                                                <?php }else{ ?>
                                                <th>Approvisionner</th>
                                                <th>Vendre</th>
                                                <?php } ?>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $color = '';
                                                foreach ($list_article as $key => $value) {
                                                    if ($list_article[$key]['quantite_stock'] < 5) {
                                                        $color = 'danger';
                                                    }else{
                                                        $color = 'dark';
                                                    }
                                            ?>
                                            <tr>
                                                <td><button class="btn fw-bold shadow-none bg-secondary text-white"><i class="align-middle" data-feather="plus-circle"></i></button></td>
                                                <td width="100">
                                                    <a href="<?=base_url('Panel/pages/details/').$list_article[$key]['article_id']?>" class="text-decoration-none text-secondary"><?=$list_article[$key]['article']?></a>
                                                </td>
                                                <td width="100" class="text-<?=$color?> fw-bold"><?=$list_article[$key]['quantite_stock']?></td>
                                                <!-- <td><?=date($list_article[$key]['added_date'])?></td> -->
                                                <td><?=$list_article[$key]['pa']?> $</td>
                                                <td><?=$list_article[$key]['pv']?> $</td>
                                                <?php if ($act_page == "appro") {  ?>
                                                <td><button class="btn shadow-none bg-secondary text-white mt-1 w-100" data-bs-target="#approvisionner" data-bs-toggle="modal" data-id="<?=$list_article[$key]['article_id']?>"><i class="align-middle" data-feather="truck"></i> Approvisionner</button></td>
                                                <?php  }elseif ($act_page == "vendre") { ?>
                                                <td><button class="btn shadow-none bg-secondary text-white mt-1 w-100" data-bs-target="#vendre" data-bs-toggle="modal" data-id="<?=$list_article[$key]['article_id']?>"><i class="align-middle" data-feather="layers"></i> Vendre</button></td>
                                                <?php }else{ ?>
                                                 <td><button class="btn shadow-none bg-secondary text-white mt-1 w-100" data-bs-target="#approvisionner" data-bs-toggle="modal" data-id="<?=$list_article[$key]['article_id']?>"><i class="align-middle" data-feather="truck"></i> Approvisionner</button></td>
                                                <td><button class="btn shadow-none bg-secondary text-white mt-1 w-100" data-bs-target="#vendre" data-bs-toggle="modal" data-id="<?=$list_article[$key]['article_id']?>"><i class="align-middle" data-feather="layers"></i> Vendre</button></td>
                                                <?php } ?>
                                                <td><button class="btn shadow-none bg-secondary text-white mt-1 w-100"  data-bs-target="#UpdateArticle" data-bs-toggle="modal" data-id="<?=$list_article[$key]['article_id']?>"><i class="align-middle" data-feather="edit"></i> Modifier</button></td>
                                                <td><button type="button" class="btn shadow-none bg-secondary text-white mt-1 w-100" onclick="deleteThis('<?=$list_article[$key]['article_id']?>','article')"><i class="align-middle" data-feather="trash-2"></i> Supprimer</button></td>
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
<script>
    $(document).ready(function(){
        var articles = $('#articles').DataTable({
            "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
            responsive: true
        });

        new $.fn.dataTable.FixedHeader( articles );
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
					</div>
				</div>
			</footer>
		</div>
	</div>

<script src="<?=base_url('static/')?>js/app.js"></script>

<div class="modal fade"  id="article" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">NOUVEAU ARTICLE</h5>
        <button type="button" class="btn shadow-none" data-bs-dismiss="modal" aria-label="Close">
            <span style="font-size:20px;"><i class="align-middle" data-feather="minus-circle"></i></span>
        </button>
      </div>
      <div class="modal-body">
        
        <div id="modal-validation-body">
            <form class="col-md-12" id="new_article" autofill="false" autocomplete="off" autofill="false">
                <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="new_article_date" id="new_article_date" value="<?=date('Y-m-d')?>" autocomplete="false" class="form-control" required="">
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label>Article</label>
                        <input type="text" name="new_article_article" id="new_article_article" autocomplete="false" class="form-control" required="" minlength="3" placeholder="">
                    </div>
                    <div class="col-6 form-group">
                        <label>Quantite</label>
                        <input type="number" step="any" name="new_article_quantite" id="new_article_quantite" autocomplete="false" value="0" class="form-control" required="">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6 form-group">
                        <label>Prix d'Achat</label>
                        <input type="number" step="any" name="new_article_pa" id="new_article_pa" autocomplete="false" class="form-control" required="" value="0" minlength="3" placeholder="">
                    </div>
                    <div class="col-6 form-group">
                        <label>Prix de Vente</label>
                        <input type="number" step="any" name="new_article_pv" id="new_article_pv" autocomplete="false" class="form-control" required="" value="0" minlength="3" placeholder="">
                    </div>
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

<div class="modal fade"  id="UpdateArticle" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">MODIFIER ARTICLE</h5>
        <button type="button" class="btn shadow-none" data-bs-dismiss="modal" aria-label="Close">
            <span style="font-size:20px;"><i class="align-middle" data-feather="minus-circle"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <div id="modal-validation-body">
            <form class="col-md-12" id="modify_article" autofill="false" autocomplete="off" autofill="false">
                <div class="row">
                    <div class="col-12 form-group">
                        <label>Article</label>
                        <input type="text" name="modify_article_article" id="modify_article_article" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                        <input type="hidden" name="modify_article_article_id" id="modify_article_article_id" autocomplete="false" class="form-control" readonly="" minlength="2" placeholder="">
                    </div>
                </div>

                <div class="row">
                    <div class="col-6 form-group">
                        <label>Prix d'Achat</label>
                        <input type="number" step="any" name="modify_article_pa" id="modify_article_pa" autocomplete="false" class="form-control">
                    </div>

                    <div class="col-6 form-group">
                        <label>Prix de Vente</label>
                        <input type="number" step="any" name="modify_article_pv" id="modify_article_pv" autocomplete="false" class="form-control" readonly="" min="5">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group">
                        <label>Quantite En Stock</label>
                        <input type="number" step="any" name="modify_article_quantite" id="modify_article_quantite" autocomplete="false" class="form-control" required="" minlength="2">
                    </div>
                    <div class="col-6 form-group">
                        <label>Date</label>
                        <input type="date" name="modify_date" id="modify_date" autocomplete="false" class="form-control" required="">
                    </div>
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