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

	<link rel="canonical" href="" />

	<title>GESTION DES STOCKS</title>

	<link href="<?=base_url('static/')?>css/app.css" rel="stylesheet">
	<link href="<?=base_url('static/')?>css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
	<script src="<?=base_url('static/')?>js/jquery.js"></script>
</head>

<script>
		function show(text){
			alert(text);
		}

		function confirm_c(text){
			return confirm(text);
		}

		// Start Delete 

		function deleteThis(val,dest){
			let data = val;
			if(confirm_c('Voulez-vous supprimer ceci?') == true){
				if(dest === 'article'){
					ajax(data,'Panel/delete_article','delete');
				}else if(dest === 'achat'){
					ajax(data,'Panel/delete_achat','delete');
				}else if(dest === 'depense'){
					ajax(data,'Panel/delete_depense','delete');
				}else if(dest === 'vente'){
					ajax(data,'Panel/delete_vente','delete');
				}else if(dest === 'user'){
					ajax(data,'Panel/delete_user','delete');
				}
			}	
		}

		// End Delete

		function ajax(data,url,origin){
		if(origin == 'delete'){
			$.ajax({
					type:'POST',
					url:'<?=base_url()?>'+url,
					data:{'data':data},
					dataType:'json',
					beforeSend:function(){
						$('button').prop('disabled',true);
					},	
					success: function(data){
						$('button').prop('disabled',false);
						if(data.status == 'success'){
							show(data.info);
						}else{
							show(data.info);
						}
					},
					error: function (data) {
						console.log('Error:', data);
					}
			});
		}else{
			if(confirm_c('Voulez-vous continue?') == false) return;
			$.ajax({
					type:'POST',
					url:'<?=base_url()?>'+url,
					data:data,
					dataType:'json',
					processData: false, 
					contentType: false,
					beforeSend:function(){
						$('button').prop('disabled',true);
					},	
					success: function(data){
						$('button').prop('disabled',false);
						if(data.status == 'success'){
							$('#'+origin+'')[0].reset();
							$('.modal').modal('hide');
							show(data.info);
						}else{
							show(data.info);
						}
					},
					error: function (data) {
						console.log('Error:', data);
					}
			});
		}
				setTimeout(() => {
					location.reload();
				}, 3000);
		}

		function  GetModalData(data,method) {
            $.ajax({
                url: '<?=base_url('Panel/modalShowData/')?>'+method+'',
                type:'POST',
                data: {"data": data},
                dataType: 'json',
                success: function(response){
					if(response.modal == 'approvisionner'){
						$('#appro_article_article').val(response.data.article);
						$('#appro_article_quantite_s').val(response.data.quantite_stock);
						$('#appro_article_article_id').val(response.data.article_id);
					}else if (response.modal == 'vendre'){
						$('#sell_article_article').val(response.data.article);
						$('#sell_article_quantite_s').val(response.data.quantite_stock);
						$('#sell_article_article_id').val(response.data.article_id);
						$('#sell_pa').text(response.data.pa);
						$('#sell_pau').val(response.data.pa);
					}else if(response.modal == 'UpdateArticle'){
						$('#modify_article_article').val(response.data.article);
						$('#modify_article_article_id').val(response.data.article_id);
						$('#modify_article_quantite').val(response.data.quantite_stock);
						$('#modify_article_pa').val(response.data.pa);
						$('#modify_article_pv').val(response.data.pv);
						$('#modify_date').val(response.data.added_date);
						$('#modify_description').val(response.data.description);
					}else if(response.modal == 'UpdateVente'){
						$('#update_sold_vente_id').val(response.data.vente_id);
						$('#update_sold_article_id').val(response.data.article_id);
						$('#update_sold_article').val(response.data.article);
						$('#update_sold_quantite_v').val(response.data.quantite_vendu);
						$('#update_sold_quantite_v_old').val(response.data.quantite_vendu);
						$('#update_sold_quantite_s').val(response.data.quantite_stock);
						$('#update_sold_pvt').val(response.data.pvt);
						$('#update_sold_pvu').val(response.data.pvu);
						$('#update_sold_pau').val(response.data.pau);
						$('#update_sold_date').val(response.data.sold_date);
						$('#update_sold_description').val(response.data.description);
					}else if(response.modal == 'UpdateApprovisionner'){
						$('#update_article_article').val(response.data.article);
						$('#update_article_quantite_s').val(response.data.quantite_stock);
						$('#update_article_pau').val(response.data.pa);
						$('#update_article_pat').val(response.data.pat);
						$('#update_article_pvu').val(response.data.pv);
						$('#update_article_date').val(response.data.appr_date);
						$('#update_article_description').val(response.data.description);
						$('#update_article_achat_id').val(response.data.achat_id);
					}else if(response.modal == 'UpdateDepense'){
						$('#update_depense_id').val(response.data.id);
						$('#update_depense_amount').val(response.data.montant);
						$('#update_depense_date').val(response.data.date);
						$('#update_depense_description').val(response.data.description);
					}else if(response.modal == 'updateUser'){
						$('#update_user_id').val(response.data.id);
						$('#update_user_email').val(response.data.email);
						$('#update_user_profile_old').val(response.data.image);
						$('#update_user_name').val(response.data.name);
						$('#update_user_phone').val(response.data.phone);
					}
                    
                }
            });
        }

		$(document).ready(function(){

			$('.modal').on('hide.bs.modal',function() {
               $('form')[0].reset();
            });

			$('#appro_article_pau').on('change',function(){
				var pau = $('#appro_article_pau').val();
				var other = $('#appro_article_other_s').val();
				var qte = $('#appro_article_quantite_a').val();
				var pat = (pau * qte) + parseInt(other);
				$('#appro_article_pat').val(pat);
			});

			$('#appro_article_pat').on('change',function(){
				var pat = $('#appro_article_pat').val();
				var other = $('#appro_article_other_s').val();
				var qte = $('#appro_article_quantite_a').val();
				pau = (parseInt(pat) + parseInt(other)) / parseInt(qte);
				$('#appro_article_pau').val(pau);
			});

			$('#appro_article_quantite_a').on('change',function(){
				var qte = $('#appro_article_quantite_a').val();
				var pau = $('#appro_article_pau').val();
				var other = $('#appro_article_other_s').val();
				pat = (parseInt(pau) * parseInt(qte)) + parseInt(other);
				$('#appro_article_pat').val(pat);
			});

			$('#appro_article_other_s').on('change',function(){
				var pat = $('#appro_article_pat').val();
				var other = $('#appro_article_other_s').val();
				pat = (parseInt(pat) + parseInt(other));
				$('#appro_article_pat').val(pat);
			});
			

			$('#sell_article_quantite_v, #sell_article_pvu, #sell_article_pvt').on('change',function(){
				if(parseInt($('#sell_article_quantite_v').val()) > parseInt($('#sell_article_quantite_s').val())){
					show('Stock Insuffisant');
					$('#sell_article_quantite_v').val('')
				}

				var pvt = parseInt($('#sell_article_quantite_v').val()) * parseInt($('#sell_article_pvu').val());
				$('#sell_article_pvt').val(pvt);
			});

			// -----------------------------------------------------------------------

			$('#approvisionner').on('show.bs.modal', function (e) {
                var article_id = $(e.relatedTarget).data('id');
                GetModalData(article_id,'approvisionner');
            });

			$('#vendre').on('show.bs.modal', function (e) {
                var article_id = $(e.relatedTarget).data('id');
                GetModalData(article_id,'vendre');
            });

			$('#UpdateArticle').on('show.bs.modal', function (e) {
                var article_id = $(e.relatedTarget).data('id');
                GetModalData(article_id,'UpdateArticle');
            });

			$('#UpdateVente').on('show.bs.modal', function (e) {
                var article_id = $(e.relatedTarget).data('id');
                GetModalData(article_id,'UpdateVente');
            });

			$('#UpdateApprovisionner').on('show.bs.modal', function (e) {
                var article_id = $(e.relatedTarget).data('id');
                GetModalData(article_id,'UpdateApprovisionner');
            });

			$('#UpdateDepense').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                GetModalData(id,'UpdateDepense');
            });

			$('#updateUser').on('show.bs.modal', function (e) {
                var id = $(e.relatedTarget).data('id');
                GetModalData(id,'updateUser');
            });

			// ----------------------------------------------------------------------------

			$('#new_article').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				ajax(form,'Panel/new_article','new_article');
			});
	
			$('#appro_article').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				ajax(form,'Panel/approvision_article','appro_article');
			});
		
			$('#update_article').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				ajax(form,'Panel/update_article','update_article');
			});
		
			$('#sell_article').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				ajax(form,'Panel/sell_article','sell_article');
			});

			$('#update_sold').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				ajax(form,'Panel/update_sold','update_sold');
			});

			$('#modify_article').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				ajax(form,'Panel/modify_article','modify_article');
			});
			
			$('#new_depense').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				ajax(form,'Panel/new_depense','new_depense');
			});

			$('#update_depense').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				ajax(form,'Panel/update_depense','update_depense');
			});

			$('#new_user').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				ajax(form,'Panel/new_user','new_user');
			});

			$('#update_user').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				ajax(form,'Panel/update_user','update_user');
			});

			$('#update_user_connected').on('submit',function(event){
				event.preventDefault();
				let form = new FormData(this);
				ajax(form,'Panel/update_user/connected','update_user');
			});
		});

</script>

<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" href="<?=base_url('Panel/pages/')?>dashboard">
          		<span class="align-middle">GESTION DES STOCKS</span>
        </a>

				<ul class="sidebar-nav">
					<li class="sidebar-header">
						MENU PRINCIPAL
					</li>

					<li class="sidebar-item <?=$dashboard?>">
						<a class="sidebar-link" href="<?=base_url('Panel/pages/')?>dashboard">
              <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Accueil</span>
            </a>
					</li>

					<li class="sidebar-item <?=$article?>">
						<a class="sidebar-link" href="<?=base_url('Panel/pages/')?>article">
              <i class="align-middle" data-feather="book"></i> <span class="align-middle">Articles</span>
            </a>
					</li>

					<li class="sidebar-item <?=$achat?>">
						<a class="sidebar-link" href="<?=base_url('Panel/pages/')?>achat">
              <i class="align-middle" data-feather="shopping-bag"></i> <span class="align-middle">Achats</span>
            </a>
					</li>

					<li class="sidebar-item <?=$vente?>">
						<a class="sidebar-link" href="<?=base_url('Panel/pages/')?>vente">
              <i class="align-middle" data-feather="shopping-cart"></i> <span class="align-middle">Ventes</span>
            </a>
					</li>

					<li class="sidebar-item <?=$depense?>">
						<a class="sidebar-link" href="<?=base_url('Panel/pages/')?>depense">
              <i class="align-middle" data-feather="minus-square"></i> <span class="align-middle">Depenses</span>
            </a>
					</li>

					<li class="sidebar-item <?=$profile?>">
						<a class="sidebar-link" href="<?=base_url('Panel/pages/')?>profile">
              <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
			<li class="sidebar-item <?=$journal?>">
				<a class="sidebar-link" href="<?=base_url('Panel/pages/')?>journal">
	  <i class="align-middle" data-feather="terminal"></i> <span class="align-middle">Journal</span>
	</a>
					</li>

                    <li class="sidebar-item">
						<a class="sidebar-link" href="<?=base_url('Panel/Logout')?>">
              <i class="align-middle" data-feather="log-out"></i> <span class="align-middle">Deconnnexion</span>
            </a>
					</li>

				</ul>

				<!-- <div class="sidebar-cta">
					<div class="sidebar-cta-content">
						<strong class="d-inline-block mb-2">GDS</strong>
						<div class="mb-3 text-sm">
							Un service simple juste pour vous!
						</div>
						<div class="d-grid">
							<a href="" class="btn btn-primary">LMK Code</a>
						</div>
					</div>
				</div> -->
			</div>
		</nav>
	

		<div class="main">
			<nav class="navbar navbar-expand navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle">
          <i class="hamburger align-self-center"></i>
        </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">
						<!-- <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="bell"></i>
									<span class="indicator">4</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
								<div class="dropdown-menu-header">
									4 New Notifications
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>
												<div class="text-muted small mt-1">Restart server 12 to complete the update.</div>
												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-warning" data-feather="bell"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Lorem ipsum</div>
												<div class="text-muted small mt-1">Aliquam ex eros, imperdiet vulputate hendrerit et.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-primary" data-feather="home"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Login from 192.186.1.8</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i class="text-success" data-feather="user-plus"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">New connection</div>
												<div class="text-muted small mt-1">Christina accepted your request.</div>
												<div class="text-muted small mt-1">14h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all notifications</a>
								</div>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i class="align-middle" data-feather="message-square"></i>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
								<div class="dropdown-menu-header">
									<div class="position-relative">
										4 New Messages
									</div>
								</div>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-5.jpg" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Vanessa Tucker</div>
												<div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
												<div class="text-muted small mt-1">15m ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-2.jpg" class="avatar img-fluid rounded-circle" alt="William Harris">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">William Harris</div>
												<div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
												<div class="text-muted small mt-1">2h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-4.jpg" class="avatar img-fluid rounded-circle" alt="Christina Mason">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Christina Mason</div>
												<div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
												<div class="text-muted small mt-1">4h ago</div>
											</div>
										</div>
									</a>
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<img src="img/avatars/avatar-3.jpg" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
											</div>
											<div class="col-10 ps-2">
												<div class="text-dark">Sharon Lessman</div>
												<div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
												<div class="text-muted small mt-1">5h ago</div>
											</div>
										</div>
									</a>
								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">Show all messages</a>
								</div>
							</div>
						</li> -->
						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
								<i class="align-middle" data-feather="settings"></i>
							</a>

							<a class="nav-link  d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
								<img src="<?=base_url('static/img/user/')?><?=$this->session->profile?>" class="avatar img-fluid rounded me-1" alt="<?=$this->session->name?>" /> <span class="text-dark"><?=$this->session->name?></span>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<a class="dropdown-item" href="<?=base_url('Panel/pages/')?>profile"><i class="align-middle me-1" data-feather="user"></i> Profile</a>
								<!-- <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="pie-chart"></i> Analytics</a> -->
								<div class="dropdown-divider"></div>
								<!-- <a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="settings"></i> Settings & Privacy</a> -->
								<a class="dropdown-item" href="#"><i class="align-middle me-1" data-feather="help-circle"></i> Help Center</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?=base_url('Panel/Logout')?>"><i class="align-middle me-1" data-feather="log-out"></i> Deconnnexion</a>
							</div>
						</li>
					</ul>
				</div>
			</nav>