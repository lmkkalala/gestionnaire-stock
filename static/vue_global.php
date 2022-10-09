<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3">
                        <button class="btn bg-secondary text-white shadow-none" onclick="history.back()">
                        <i class="align-middle display-3" data-feather="chevron-left"></i></button>
                    </h1>

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
                                                <th>Date</th>
                                                <th>Article</th>
                                                <th>Entree</th>
                                                <th>Sortie</th>
                                                <th>Stock Disponible</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $color = '';
                                            foreach ($vue_global as $key => $value) { 
                                                if ($vue_global[$key]['stock_disponible'] < 5) {
                                                    $color = 'danger';
                                                }else{
                                                    $color = 'dark';
                                                } 
                                        ?>
                                            <tr>
                                                <td><button class="btn fw-bold shadow-none bg-secondary text-white"><i class="align-middle" data-feather="plus-circle"></i></button></td>
                                                <td><?=date($vue_global[$key]['date'])?></td>
                                                <td width="200">
                                                    <a href="<?=base_url('Panel/pages/details/'.$vue_global[$key]['article_id'])?>" class="text-decoration-none text-secondary">
                                                    <?=$vue_global[$key]['article']?></a>
                                                </td>
                                                <td><?=$vue_global[$key]['entree']?></td>
                                                <td><?=$vue_global[$key]['sortie']?></td>
                                                <td class="text-<?=$color?> fw-bold"><?=$vue_global[$key]['stock_disponible']?></td>
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
        var vente = $('#vente').DataTable({
            "lengthMenu": [[-1], ["All"]],
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
</body>

</html>