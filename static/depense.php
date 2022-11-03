			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><button class="btn bg-secondary text-white shadow-none" onclick="history.back()"><i class="align-middle display-3" data-feather="chevron-left"></i></button> LES DEPENSES</h1>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
                                        <!-- <h5 class="card-title mb-1">Filter par noms ou par date.</h5> -->
                                        <form method="post">
                                            <div class="row mt-1">
                                                <div class="col-md-3 mt-1">
                                                        <select name="" class="form-control shadow-none fw-bold" id="dates">
                                                            <option value="date">Annee-Mois-Jour</option>
                                                            <option value="month">Annee-Mois</option>
                                                            <option value="number">Annee</option>
                                                        </select>
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <input type="text" name="description" class="form-control shadow-none" placeholder="Description" value="">
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <input type="date" name="date" class="form-control shadow-none" placeholder="2022" value="<?=date('d-m-Y',time())?>">
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <button type="submit" class="form-control shadow-none"> 
                                                        <i class="align-middle" data-feather="refresh-ccw"></i> <strong> OK</strong></button>
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <button type="button" class="form-control shadow-none" data-bs-target="#depense" data-bs-toggle="modal"> <strong>+ Enregistrer</strong></button>
                                                </div>
                                                <?php
                                                    if($spent >= $benefice){
                                                        $color = 'danger';
                                                    }else{
                                                        $color = 'info';
                                                    }
                                                ?>
                                                <!-- <div class="col-md-3 mt-1">
									                <input type="text" readonly=""  class="form-control text-info shadow-none" value="BENEFICE NET: <?php echo $benefice - $spent;?> $">
                                                </div>
                                                <div class="col-md-3 mt-1">
                                                    <input type="text" readonly=""  class="form-control text-<?=$color?> shadow-none fw-bold" value="DEPENSE: <?=$spent?> $">
                                                </div>  -->
                                            </div>
                                        </form>
                                        

                                    </div>
								</div>
								<div class="card-body">
                                    <table class="table table-hover my-0 mt-2" style="width:100%" id="depenses">
                                        <thead class="bg-secondary text-white w-100">
                                            <tr>
                                                <th>Plus</th>
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
                                                <td><button class="btn fw-bold shadow-none bg-secondary text-white"><i class="align-middle" data-feather="plus-circle"></i></button></td>
                                                <td><?=date($list_depense[$key]['date'])?></td>
                                                <td><?=$list_depense[$key]['montant']?> $</td>
                                                <td>
                                                    <?=$list_depense[$key]['description']?>
                                                    <?php 
                                                if ($list_depense[$key]['user_id'] != '') {
                                                    //echo ' Opération effectuer par'.$list_depense[$key]['name'];
                                                }
                                                ?> 
                                                </td>
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
                                    <div class="row">
                                            <div class="col-md-8 bg-secondary">
                                                <h5 class="text-white text-left p-2">MONTANT TOTAL DEPENSES</h5>
                                            </div>
                                            <div class="col-md-4 bg-secondary">
                                                <h5 class="text-info text-left p-2"><?=$spent?> $</h5>
                                            </div>
                                        </div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>
<script>
    $(document).ready(function(){
        var depense = $('#depenses').DataTable({
            "lengthMenu": [[50, 100, -1], [50, 100, "All"]],
            responsive: true
        });

        new $.fn.dataTable.FixedHeader( depense );
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

<div class="modal fade"  id="UpdateDepense" aria-hidden="true" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md modal-fullscreen-sm-down modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalToggleLabel2">MODIFIER DEPENSE</h5>
        <button type="button" class="btn shadow-none" data-bs-dismiss="modal" aria-label="Close">
            <span style="font-size:20px;"><i class="align-middle" data-feather="minus-circle"></i></span>
        </button>
      </div>
      <div class="modal-body">
        
        <div id="modal-validation-body">
            <form class="col-md-12" id="update_depense" autofill="false" autocomplete="off" autofill="false">
                <div class="form-group">
                    <label>Montant</label>
                    <input type="hidden" name="update_depense_id" id="update_depense_id">
                    <input type="number" step="any" name="update_depense_amount" id="update_depense_amount" autocomplete="false" class="form-control" required="" minlength="10" placeholder="">
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