			<main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><button class="btn bg-secondary text-white shadow-none" onclick="history.back()"><i class="align-middle display-3" data-feather="chevron-left"></i></button> JOURNAL SYSTEME</h1>

					<div class="row">
						<div class="col-12">
							<div class="card">
								<div class="card-header">
									<div class="row">
                                        <h5 class="card-title mb-1">Filter par noms ou par date.</h5>
                                        <form class="row" method="post">
											<div class="col-md-3 mt-1">
												<input type="text" name="description" class="form-control shadow-none" placeholder="Article . . .">
											</div>
											<div class="col-md-3 mt-1">
												<input type="text" name="date" class="form-control shadow-none" placeholder="2022-07-18">
											</div>
											<div class="col-md-3 mt-1">
												<button type="submit" class="form-control shadow-none"> <i class="align-middle" data-feather="refresh-ccw"></i> <strong>Filtrer</strong></button>
											</div>
										</form>
                                    </div>
								</div>
								<div class="card-body d-none d-sm-block" style="max-height: 500px; overflow:auto;min-height: 20px;">
                                    <table class="table table-hover my-0">
                                        <tbody>
										<?php foreach ($list_journal as $key => $value) { ?>
                                            <tr>
                                                <td class="bg-secondary text-white"> >_ </td>
                                                <td><?=$list_journal[$key]['name']?></td>
                                                <td><?=date('Y-m-d H:i:s',$list_journal[$key]['date'])?></td>
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

</body>

</html>