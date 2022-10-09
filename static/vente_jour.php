<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><button class="btn bg-secondary text-white shadow-none" onclick="history.back()"><i class="align-middle display-3" data-feather="chevron-left"></i></button> VENTE DU JOUR</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
                                        <form class="row" method="post">
                                            <div class="col-md-4 mt-1">
                                                <!-- <input type="text" class="form-control shadow-none" readonly="" value="Filtrer par noms ou par date." placeholder="Article . . ."> -->
                                            </div>
                                            <div class="col-md-3 mt-1">
                                                        <select name="" class="form-control shadow-none fw-bold" id="dates">
                                                            <option value="date">Annee-Mois-Jour</option>
                                                            <option value="month">Annee-Mois</option>
                                                            <option value="number">Annee</option>
                                                        </select>
                                            </div>
                                            <div class="col-md-3 mt-1">
                                                <input type="date" name="date" class="form-control shadow-none" placeholder="2022-07-18">
                                            </div>
                                            <div class="col-md-2 mt-1">
                                                <button type="submit" class="form-control shadow-none"> 
                                                    <i class="align-middle" data-feather="refresh-ccw"></i> <strong> OK</strong>
                                                </button>
                                            </div>
                                        </form>

                                    </div>
								</div>
								<div class="card-body mt-n2">
                                    <table class="table table-hover my-0 mt-2" style="width:100%" id="vente">
                                        <thead class="bg-secondary text-white w-100">
                                            <tr>
                                                <th>Plus</th>
                                                <th>Date VENTE</th>
                                                <th>Article</th>
                                                <th>Qte Vendu</th>
                                                <th>Qte Restante</th>
                                                <th>PVU</th>
                                                <th>PVT</th>
                                                <th>Description</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $vente_lelo = 0;
                                            $color = ''; 
                                            foreach ($list_vente_today as $key => $value) { 
                                                $vente_lelo = $vente_lelo + $list_vente_today[$key]['quantite_vendu']*$list_vente_today[$key]['pvu'];  
                                                if ($list_vente_today[$key]['quantite_stock'] < 5) {
                                                    $color = 'danger';
                                                }else{
                                                    $color = 'dark';
                                                }  
                                                
                                                if (strpos($list_vente_today[$key]['description'], 'Crédit') !== false or strpos($list_vente_today[$key]['description'], 'crédit') !== false or strpos($list_vente_today[$key]['description'], 'Credit') !== false or strpos($list_vente_today[$key]['description'], 'credit') !== false) {
                                                    $color_description = 'danger';
                                                }else{
                                                    $color_description = 'dark';
                                                }
                                        ?>
                                            <tr>
                                                <td><button class="btn fw-bold shadow-none bg-secondary text-white"><i class="align-middle" data-feather="plus-circle"></i></button></td>
                                                <td><?=date($list_vente_today[$key]['sold_date'])?></td>
                                                <td width="100"><a href="<?=base_url('Panel/pages/details/'.$list_vente_today[$key]['article_id'])?>" class="text-decoration-none text-secondary"><?=$list_vente_today[$key]['article']?></a></td>
                                                <td><?=$list_vente_today[$key]['quantite_vendu']?></td>
                                                <td class="text-<?=$color?> fw-bold"><?=$list_vente_today[$key]['quantite_stock']?></td>
                                                <td><?=$list_vente_today[$key]['pvu']?> $</td>
                                                <td><?=$list_vente_today[$key]['pvt']?> $</td>
                                                <td class="fw-bold text-<?=$color_description?>" width="100"><?=$list_vente_today[$key]['description']?></td>
                                                <td>
                                                    <button class="btn shadow-none bg-secondary text-white mt-1" data-bs-target="#UpdateVente" data-bs-toggle="modal" data-id="<?=$list_vente_today[$key]['vente_id']?>"><i class="align-middle" data-feather="edit"></i> Modifier</button>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn shadow-none bg-secondary text-white mt-1" onclick="deleteThis('<?=$list_vente_today[$key]['vente_id']?>','vente')"><i class="align-middle" data-feather="trash-2"></i> Supprimer</button>
                                                </td>
                                            </tr>
                                        <?php }?>
                                                <tr class="bg-secondary">
                                                    <td><button class="btn fw-bold shadow-none bg-secondary text-white"><i class="align-middle" data-feather="plus-circle"></i></button></td>
                                                    <td class="fw-bold text-white">Total Vendu</td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td class="fw-bold text-info fs-4"><?=$vente_lelo?> $</td>
                                                </tr>
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
        var vente = $('#vente').DataTable({
            "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
            responsive: true
        });

        new $.fn.dataTable.FixedHeader( vente );
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
<div class="modal fade"  id="UpdateVente" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">MODIFIER VENTE</h5>
        <button type="button" class="btn shadow-none" data-bs-dismiss="modal" aria-label="Close">
            <span style="font-size:20px;"><i class="align-middle" data-feather="minus-circle"></i></span>
        </button>
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
                        <input type="number" step="any" name="update_sold_quantite_v" id="update_sold_quantite_v" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>

                    <div class="col-6 form-group">
                        <label>Quantite stock</label>
                        <input type="number" step="any" name="update_sold_quantite_s" id="update_sold_quantite_s" autocomplete="false" class="form-control" readonly="" minlength="2" placeholder="">
                    </div>
                </div>

				<div class="row">
                    <div class="col-6 form-group">
                        <label>PVU</label>
                        <input type="number" step="any" name="update_sold_pvu" id="update_sold_pvu" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>

                    <div class="col-6 form-group">
                        <label>PVT</label>
                        <input type="number" step="any" name="update_sold_pvt" id="update_sold_pvt" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6 form-group">
                        <label>PAU</label>
                        <input type="number" step="any" name="update_sold_pau" id="update_sold_pau" autocomplete="false" class="form-control" required="" minlength="2" placeholder="">
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