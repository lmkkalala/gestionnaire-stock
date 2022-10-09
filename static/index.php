<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Responsive Admin &amp; Dashboard Template based on Bootstrap 5">
	<meta name="author" content="AdminKit">
	<meta name="keywords" content="adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">

	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="<?=base_url('static/')?>img/icons/icon.png" />

	<link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in" />

	<title>GDS</title>

	<link href="<?=base_url('static/')?>css/app.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>

<body>
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">BIENVENU</h1>
							<p class="lead">
								DANS VOTRE GESTIONNAIRE DE STOCK
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="<?=base_url('static/')?>img/avatars/avatar.png" alt="Charles Hall" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									<form action="" method="post" id="login">
										<div class="mb-3">
											<label class="form-label">Utilisateur</label>
											<input class="form-control form-control-lg" type="text" id="user" name="user" placeholder="Email ou Telephone" />
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Mot de passe" />
		<!-- <small>
            <a href="#">Mot de passe oublier.</a>
        </small> -->
										</div>
										<div>
		<!-- <label class="form-check">
            <input class="form-check-input" type="checkbox" value="remember-me" name="remember-me" checked>
            <span class="form-check-label">
              Se souvenir de moi.
            </span>
        </label> -->
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Connecter</button>
										</div>
									</form>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</main>

	<script src="<?=base_url('static/')?>js/app.js"></script>
	<script src="<?=base_url('static/')?>js/jquery.js"></script>
	<script>
		function show(text){
			alert(text);
		}
		$(document).ready(function(){
			$('#login').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				$.ajax({
					type:'POST',
					url:'<?=base_url('Panel/')?>Login',
					data:form,
					dataType:'json',
					processData: false, 
					contentType: false,
					beforeSend:function(){
						$('button').prop('disabled',true);
					},	
					success: function(data){
						$('button').prop('disabled',false);
						if(data.status == 'success'){
							$('#login')[0].reset();
							show(data.info);
							setTimeout(() => {
								window.location.href = '<?=base_url()?>Panel';
							}, 3000);
						}else{
							show(data.info);
						}
					},
					error: function (data) {
						console.log('Error:', data);
					}
				});
			})
		});
	</script>
</body>

</html>