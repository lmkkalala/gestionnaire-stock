			<main class="content">
				<div class="container-fluid p-0">
					<h1 class="h3 mb-3"><button class="btn bg-secondary text-white shadow-none" onclick="history.back()"><i class="align-middle display-3" data-feather="chevron-left"></i></button> JOURNAL SYSTEME</h1>
					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
                                        <form class="row" method="POST">
											<div class="col-md-3 mt-1">
                                                        <select name="" class="form-control shadow-none fw-bold" id="dates">
                                                            <option value="date">Annee-Mois-Jour</option>
                                                            <option value="month">Annee-Mois</option>
                                                            <option value="number">Annee</option>
                                                        </select>
                                            </div>
											<div class="col-md-3 mt-1">
												<select name="FilterDate" class="form-control shadow-none fw-bold" onchange="filter_search(this)" id="FilterDate">
													<option value="<?php if($FilterDate == ''){ echo '0'; }else{ echo $FilterDate; }?>">Filtrer Article ou Date.</option>
													<option value="1">Par une date</option>
													<option value="2">Par deux Date</option>
												</select>
                                            </div>
											<div class="col-md-3 mt-1" id="date_start">
												<input type="date" name="date" id="date" placeholder="2022" value="<?=$date?>" class="form-control shadow-none">
											</div>
											<div class="col-md-3 mt-1" id="date_end" style="dispaly:none;">
												<input type="date" name="date_2" id="date_2" placeholder="2022" value="<?=$date_2?>" class="form-control shadow-none">
											</div>
											<div class="col-md-3 mt-1">
												<button type="submit" class="form-control shadow-none"> 
													<i class="align-middle" data-feather="refresh-ccw"></i> 
													<strong>OK</strong>
												</button>
											</div>
										</form>
                                    </div>
								</div>
								<div class="card-body" style="max-height: 500px; overflow:auto;min-height: 20px;">
                                    <table class="table table-hover my-0 mt-2" style="width:100%" id="journal">
                                        <tbody>
										<?php foreach ($list_journal as $key => $value) { ?>
                                            <tr>
                                                <td class="bg-secondary text-white"> >_ </td>
                                                <td><?=$list_journal[$key]['name']?></td>
                                                <td width="200"><?=date('d-m-Y H:i:s',$list_journal[$key]['date'])?></td>
                                                <td><?=$list_journal[$key]['description']?></td>
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