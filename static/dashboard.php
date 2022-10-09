		<main class="content">
				<div class="container-fluid p-0">
					<div class="row mb-2 d-flex justify-content-center">
						<div class="col-md-6 mt-1">
							<h3 class="h3 mb-3"><strong>Que voulez-vous </strong> Faire?</h3>
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<div class="col-md-12 mt-1">
								<button type="button" data-bs-target="#vendre" data-bs-toggle="modal"  class="btn btn-lg btn-info w-100 mt-1">
								<i class="align-middle" data-feather="dollar-sign"></i> Vendre</button>
							</div>
							<div class="col-md-12 mt-1">
								<button type="button"  data-bs-target="#approvisionner" data-bs-toggle="modal" class="btn btn-lg btn-info w-100 mt-1">
								<i class="align-middle" data-feather="truck"></i> Approvisionner</button>
							</div>
							<div class="col-md-12 mt-1">
								<button type="button"  data-bs-target="#depense" data-bs-toggle="modal" class="btn btn-lg btn-info w-100 mt-1">
								<i class="align-middle" data-feather="minus-square"></i> Depenser</button>
							</div>
						</div>	
						<div class="col-md-6">
							<div class="col-md-12 mt-1">
								<a href="<?=base_url('Panel/pages/article/vendre')?>" class="btn btn-lg btn-primary w-100 mt-1">
								<i class="align-middle" data-feather="dollar-sign"></i>Ventes</a>
							</div>
							<div class="col-md-12 mt-1">
								<a href="<?=base_url('Panel/pages/article/appro')?>" class="btn btn-lg btn-primary w-100 mt-1">
								<i class="align-middle" data-feather="truck"></i> Approvisionnements</a>
							</div>
							<div class="row">
								<div class="col-md-6 mt-1">
									<a href="<?=base_url('Panel/pages/')?>achat" class="btn btn-lg btn-primary w-100 mt-1">
									<i class="align-middle" data-feather="shopping-bag"></i> Achat(s)</a>
								</div>
								<div class="col-md-6 mt-1">
									<a href="<?=base_url('Panel/pages/')?>vente" class="btn btn-lg btn-primary w-100 mt-1">
									<i class="align-middle" data-feather="shopping-bag"></i> Vendu(s)</a>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6 mt-1">
									<a href="<?=base_url('Panel/pages/')?>depense" class="btn btn-lg btn-primary w-100 mt-1">
									<i class="align-middle" data-feather="minus-square"></i> Depenses</a>
								</div>
								<div class="col-md-6 mt-1">
									<a href="<?=base_url('Panel/pages/')?>benefice" class="btn btn-lg btn-primary w-100 mt-1">
									<i class="align-middle" data-feather="dollar-sign"></i> Benefices</a>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-12 col-md-6 col-xxl-3 d-flex order-2 order-xxl-3">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">DESCRIPTION</h5>
								</div>
								<div class="card-body py-3">
									<p class="fw-bold">
									Ceci est une application de gestion de stock vous permettant d'enregistrer les ventes, les approvisionnements, les depenses et bien sur de voir l'evolution de vos articles en temps reel.
									</p>
								</div>
							</div>
						</div>
					</div>
			<footer class="footer">
				<div class="container-fluid">
					<div class="row text-muted">
						<div class="col-12 text-start">
							<p class="mb-0">
								&copy; <a class="text-muted text-decoration-none" href="https://lucienkalala.github.io/Portfolio" target="_blank"><strong>Developper par LMK Kalala</strong></a><a class="text-muted text-decoration-none" href="https://adminkit.io/" target="_blank"><strong> & AdminKit</strong></a>
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