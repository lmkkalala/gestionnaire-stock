		<main class="content">
				<div class="container-fluid p-0">

					<div class="row mb-3">
						<div class="col-md-3"><h3 class="h3 mb-3"><strong>VUE </strong> GLOBAL</h3></div>
						<div class="col-md-2"><a href="<?=base_url('Panel/pages/')?>article" class="btn btn-lg btn-primary w-100 mt-1"><i class="align-middle" data-feather="dollar-sign"></i> Vendre</a></div>
						<div class="col-md-3"><a href="<?=base_url('Panel/pages/')?>article" class="btn btn-lg btn-primary w-100 mt-1"><i class="align-middle" data-feather="truck"></i> Approvisionner</a></div>
						<div class="col-md-2"><a href="<?=base_url('Panel/pages/')?>depense" class="btn btn-lg btn-primary w-100 mt-1"><i class="align-middle" data-feather="minus-square"></i> Depense</a></div>
						<div class="col-md-2"><a href="<?=base_url('Panel/pages/')?>achat" class="btn btn-lg btn-primary w-100 mt-1"><i class="align-middle" data-feather="shopping-bag"></i> Achats</a></div>
						<div class="col-md-12 mt-2">
							<form class="row" method="post">
								<div class="col-md-3 mt-1">
									<input type="text" name="article"  class="form-control shadow-none" value="<?=$article_s?>" placeholder="Article . . .">
								</div>
								<div class="col-md-3 mt-1">
									<input type="text" name="date"  class="form-control shadow-none" value="<?=$date?>" placeholder="2022-07-18">
								</div>
								<div class="col-md-3 mt-1">
									<button type="submit" class="form-control shadow-none"> <i class="align-middle" data-feather="refresh-ccw"></i> <strong> Filtrer</strong></button>
								</div>
							</form>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>article" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Valeur Stock Article PV</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3">$ <small><?=$count_pvt?></small></h1>
													<div class="mb-0">
														<!-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
														<span class="text-muted">Since last week</span> --><span class="text-muted">Prix de vente Total</span>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>article" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Valeur Stock Article PA</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3">$ <small><?=$count_pat?></small></h1>
													<div class="mb-0">
														<!-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
														<span class="text-muted">Since last week</span> --><span class="text-muted">Prix d'achat Total</span>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>article" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Nombre Stock Article</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="truck"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><small><?=$n_article?></small></h1>
													<div class="mb-0">
														<!-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -3.65% </span>
														<span class="text-muted">Since last week</span> --><span class="text-muted">Article enregister</span>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>vente" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Ventes</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3">$ <small><?=$nos_vente?></small></h1>
													<div class="mb-0">
														<!-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
														<span class="text-muted">Since last week</span>--><span class="text-muted">cout de vente total</span>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>vente" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Nombre Ventes</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="shopping-cart"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><small><?=$n_vente?></small></h1>
													<div class="mb-0">
														<!-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 5.25% </span>
														<span class="text-muted">Since last week</span>--><span class="text-muted">Nombre de vente total</span>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>article" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Achats</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3">$ <small><?=$count_pa?></small></h1>
													<div class="mb-0">
														<!-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
														<span class="text-muted">Since last week</span> --><span class="text-muted">Cout d'approvision</span>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>article" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Nombre Achat</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="shopping-bag"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3"><small><?=$n_achet?></small></h1>
													<div class="mb-0">
														<!-- <span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> 6.65% </span>
														<span class="text-muted">Since last week</span> --><span class="text-muted">Nombre d'approvisionnement</span>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>depense" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">Benefices</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3">$ <?=$benefice?></h1>
													<div class="mb-0">
														<!-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
														<span class="text-muted">Since last week</span> --><span class="text-muted">Nos benefice total</span>
													</div>
												</div>
											</div>
										</a>
									</div>
									<div class="col-md-4">
										<a href="<?=base_url('Panel/pages/')?>depense" class="text-decoration-none text-dark">
											<div class="card">
												<div class="card-body">
													<div class="row">
														<div class="col mt-0">
															<h5 class="card-title">DEPENSE</h5>
														</div>

														<div class="col-auto">
															<div class="stat text-primary">
																<i class="align-middle" data-feather="dollar-sign"></i>
															</div>
														</div>
													</div>
													<h1 class="mt-1 mb-3">$ <?=$spent?></h1>
													<div class="mb-0">
														<!-- <span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> -2.25% </span>
														<span class="text-muted">Since last week</span> --><span class="text-muted">Nos depense total</span>
													</div>
												</div>
											</div>
										</a>
									</div>
								</div>
							</div>
						</div>

						
					</div>

					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">MONTANT VENDU PAR MOIS</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Article le plus vendu</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="row">
										<div class="col-6">
											<table class="table mb-0">
												<tbody id="product"></tbody>
											</table>
										</div>
										<div class="col-6 py-3">
											<div class="chart chart-xs">
												<canvas id="chartjs-dashboard-pie"></canvas>
											</div>
										</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-12 col-md-12 col-xxl-6 d-flex order-3 order-xxl-2">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">Real-Time</h5>
								</div>
								<div class="card-body px-4">
									<div id="world_map" style="height:350px;"></div>
								</div>
							</div>
						</div> 
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-1 order-xxl-1">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0">Calendar</h5>
								</div>
								<div class="card-body d-flex">
									<div class="align-self-center w-100">
										<div class="chart">
											<div id="datetimepicker-dashboard"></div>
										</div>
									</div>
								</div>
							</div>
						</div> -->
					</div>

					<div class="row">
						<!-- <div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">Latest Projects</h5>
								</div>
								<table class="table table-hover my-0">
									<thead>
										<tr>
											<th>Name</th>
											<th class="d-none d-xl-table-cell">Start Date</th>
											<th class="d-none d-xl-table-cell">End Date</th>
											<th>Status</th>
											<th class="d-none d-md-table-cell">Assignee</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>Project Apollo</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Fireball</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-danger">Cancelled</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project Hades</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Nitro</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">Vanessa Tucker</td>
										</tr>
										<tr>
											<td>Project Phoenix</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
										<tr>
											<td>Project X</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Sharon Lessman</td>
										</tr>
										<tr>
											<td>Project Romeo</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-success">Done</span></td>
											<td class="d-none d-md-table-cell">Christina Mason</td>
										</tr>
										<tr>
											<td>Project Wombat</td>
											<td class="d-none d-xl-table-cell">01/01/2021</td>
											<td class="d-none d-xl-table-cell">31/06/2021</td>
											<td><span class="badge bg-warning">In progress</span></td>
											<td class="d-none d-md-table-cell">William Harris</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div> -->
						<div class="col-12 col-lg-12 col-xxl-12 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">QUANTITE VENDU PAR MOIS</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
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

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart

			$.ajax({
					type:'POST',
					url:'<?=base_url('Panel/')?>money',
					dataType:'json',	
					success: function(data){
						$('button').prop('disabled',false);
						if(data.status == 'success'){
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales ($)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: data.money
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});

						}

					},
					error: function (data) {
						console.log('Error:', data);
					}
			});

		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			$.ajax({
				type:'POST',
					url:'<?=base_url('Panel/')?>bestsoldProduct',
					dataType:'json',	
					success: function(data){
						$('button').prop('disabled',false);
						if(data.status == 'success'){
							var labels = data.sellers;
							var montant = data.montant;
							$('#product').html(data.product);
							// labels = ["Chrome","Firefox","IE"];
							// data = [4306,3801,1689];
							new Chart(document.getElementById("chartjs-dashboard-pie"), {
								type: "pie",
								data: {
									labels: labels,
									datasets: [{
										data: montant,
										backgroundColor: [
											window.theme.primary,
											window.theme.warning,
											window.theme.danger,
											window.theme.success,
											window.theme.info
										],
										borderWidth: 5
									}]
								},
								options: {
									responsive: !window.MSInputMethodContext,
									maintainAspectRatio: false,
									legend: {
										display: false
									},
									cutoutPercentage: 75
								}
							});
						}else{
							console.log('Error Best seller');
						}
					},
					error: function (data) {
						console.log('Error:', data);
					}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			$.ajax({
					type:'POST',
					url:'<?=base_url('Panel/')?>number',
					dataType:'json',	
					success: function(data){
						$('button').prop('disabled',false);
						if(data.status == 'success'){

							new Chart(document.getElementById("chartjs-dashboard-bar"), {
								type: "bar",
								data: {
									labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
									datasets: [{
										label: "No",
										backgroundColor: window.theme.primary,
										borderColor: window.theme.primary,
										hoverBackgroundColor: window.theme.primary,
										hoverBorderColor: window.theme.primary,
										data: data.number,//[54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
										barPercentage: .75,
										categoryPercentage: .5
									}]
								},
								options: {
									maintainAspectRatio: false,
									legend: {
										display: false
									},
									scales: {
										yAxes: [{
											gridLines: {
												display: false
											},
											stacked: false,
											ticks: {
												stepSize: 20
											}
										}],
										xAxes: [{
											stacked: false,
											gridLines: {
												color: "transparent"
											}
										}]
									}
								}
							});
						}

					},
					error: function (data) {
						console.log('Error:', data);
					}
				});
			});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		// document.addEventListener("DOMContentLoaded", function() {
		// 	var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
		// 	var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
		// 	document.getElementById("datetimepicker-dashboard").flatpickr({
		// 		inline: true,
		// 		prevArrow: "<span title=\"Previous month\">&laquo;</span>",
		// 		nextArrow: "<span title=\"Next month\">&raquo;</span>",
		// 		defaultDate: defaultDate
		// 	});
		// });
	</script>

</body>

</html>