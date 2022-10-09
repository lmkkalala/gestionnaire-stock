<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><button class="btn bg-secondary text-white shadow-none" onclick="history.back()"><i class="align-middle display-3" data-feather="chevron-left"></i></button> LES BENEFICES</h1>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
                                        <!-- <h5 class="card-title mb-1">Filter par date.</h5> -->
                                        <form method="post">
                                            <div class="row mt-1">
                                                <div class="col-md-3">
                                                    <select name="" class="form-control shadow-none fw-bold" id="dates">
                                                        <option value="date">Annee-Mois-Jour</option>
                                                        <option value="month">Annee-Mois</option>
                                                        <option value="number">Annee</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <input type="date" name="date" class="form-control shadow-none" placeholder="2022" value="<?=date('d-m-Y',time())?>">
                                                </div>
                                                <div class="col-md-2 mt-1">
                                                    <button type="submit" class="form-control shadow-none"> 
                                                        <i class="align-middle" data-feather="refresh-ccw"></i> <strong> OK</strong></button>
                                                </div>
                                                <?php
                                                    if($spent >= $benefice){
                                                        $color = 'danger';
                                                    }else{
                                                        $color = 'info';
                                                    }
                                                ?>
                                                <div class="col-md-3 mt-1">
									                <input type="text" readonly=""  class="form-control text-info shadow-none fw-bold" value="BENEFICE: <?php echo $benefice?> $">
                                                </div> 
                                            </div>
                                        </form>
                                        

                                    </div>
								</div>
								<div class="card-body">
                                    <table class="table table-hover my-0 mt-2" style="width:50%" id="depenses">
                                        <thead class="bg-secondary text-white w-100">
                                            <tr>
                                                <th>Plus</th>
                                                <th>Date</th>
                                                <th>Montant</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $benefit = 0; 
                                            foreach ($list_vente as $key => $value) {
                                                $cal1 = $value['pvu'] - $value['pau'];
                                                $cal2 = $cal1 * $value['quantite_vendu'];
                                                $benefit = $benefit + $cal2;
                                        ?>
                                                    <tr>
                                                        <td>
                                                            <button class="btn fw-bold shadow-none bg-secondary text-white">
                                                                <i class="align-middle" data-feather="plus-circle"></i>
                                                            </button>
                                                        </td>
                                                        <td><?=$value['sold_date']?></td>
                                                        <td><?=$benefit?> $</td>
                                                    </tr>
                                        <?php
                                                $benefit = 0; 
                                            }
                                        ?>
                                        </tbody>
                                    </table>
                                        <div class="row">
                                            <div class="col-md-3 bg-secondary">
                                                <h5 class="text-white text-left p-2">MONTANT BENEFICE</h5>
                                            </div>
                                            <div class="col-md-3 bg-secondary">
                                                <h5 class="text-info text-left p-2"><?=$benefice?> $</h5>
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
					</div>
				</div>
			</footer>
		</div>
	</div>

	<script src="<?=base_url('static/')?>js/app.js"></script>

</body>

</html>