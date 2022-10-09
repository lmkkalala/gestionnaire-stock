<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Panel extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->model('DataHandle');
    }

    public $user_id = 1;

	public function index()
	{
        if($this->session->name == ''){
            $this->logout();
        }else{
            $this->pages('dashboard');
        }
        
	}

    public function Login(){
		if (isset($_POST)) {
			$c_mail = !empty($_POST['user']);
			$c_password = !empty($_POST['password']);
			if ($c_mail == true and $c_password == true) {
				$email = htmlspecialchars($_POST['user']);
				$password = htmlspecialchars($_POST['password']);
				$row = $this->DataHandle->loadDataWhere('user',array('email'=>$email));
				if (count($row) > 0) {
					$c_password_verify = password_verify($password, $row[0]['password']);
					if ($c_password_verify == true) {
						$data = array(
							'profile'=>$row[0]['image'],
							'userID'=>$row[0]['id'],
							'name'=>$row[0]['name'],
							'email'=>$row[0]['email'],
                            'phone'=>$row[0]['phone'],
							'time'=>time()
						);
						$this->session->set_userdata($data);
						echo json_encode(array('status'=>'success','info'=>'Vous allez être rediriger dans quelque seconde.'));
					}else{
						echo json_encode(array('status'=>'fail','info'=>'Veuiller saisir un mot de passe correct.'));
					}
				}else{
					echo json_encode(array('status'=>'fail','info'=>'Une erreur s\'est produit, vous avez saisie un address mail inconnue.'));
				}
			}else{
				echo json_encode(array('status'=>'fail','info'=>'Veuiller remplirer toutes les chants.'));
			}
		}else{
			echo json_encode(array('status'=>'fail','info'=>'Une erreur s\'est produit, veillez reesseyer.'));
		}
	}

    public function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function pages($page,$id = '',$m = '',$y = ''){
        if($this->session->name == ''){
            $this->logout();
        }

        if ($id == 'vendre') {
            $data['act_page'] = 'vendre';
        }else if ($id == 'appro') {
            $data['act_page'] = 'appro';
        }else{
            $data['act_page'] = '';
        }

        $data['dashboard'] = '';
        $data['article'] = '';
        $data['achat'] = '';
        $data['depense'] = '';
        $data['profile'] = '';
        $data['journal'] = '';
        $data['vente'] = '';
        $data['sell_jour'] = '';

            if($page == 'dashboard'):
                $data['dashboard'] = 'active';
            elseif($page == 'article'):
                $data['article'] = 'active';
            elseif($page == 'sell_jour'):
                $data['sell_jour'] = 'active';
            elseif($page ==  'vente'):
                $data['vente'] = 'active';
            elseif($page == 'achat'):
                $data['achat'] = 'active';
            elseif($page == 'depense'):
                $data['depense'] = 'active';
            elseif($page == 'profile'):
                $data['profile'] = 'active';
            elseif($page =='journal'):
                $data['journal'] = 'active';
            elseif($page =='details'):
                if($m == ''):
                    $data['y'] = date('Y');
                    $data['m'] = date("m");
                    $data['p_id'] = $id;
                    $data['sell_day'] = $this->DataHandle->loadDataLike('vente',array('article_id'=>$id,'sold_date'=>date("m")));
                    $data['appro_day'] = $this->DataHandle->loadDataLike('achat',array('article_id'=>$id,'appr_date'=>date("m")));
                else:
                    $data['m'] = $m;
                    $data['p_id'] = $id;
                    if ($y == '') {
                        $date = date('Y').'-'.$m;
                        $data['y'] = date('Y');
                    }else{
                        $date = $y.'-'.$m;
                        $data['y'] = $y;
                    }
                    
                    $data['sell_day'] = $this->DataHandle->loadDataLike('vente',array('article_id'=>$id,'sold_date'=>date_format(date_create(''.$date.''), 'Y-m')));
                    $data['appro_day'] = $this->DataHandle->loadDataLike('achat',array('article_id'=>$id,'appr_date'=>date_format(date_create(''.$date.''), 'Y-m')));
                endif;
            endif;

        if(isset(($_POST['user_name'])) and !empty(htmlspecialchars($_POST['user_name']))){
            $user_name = htmlspecialchars($_POST['user_name']);
        }else{
            $user_name = '';
        }

        if(isset(($_POST['description'])) and !empty(htmlspecialchars($_POST['description']))){
            $description = htmlspecialchars($_POST['description']);
        }else{
            $description = '';
        }

        if(isset(($_POST['article'])) and !empty(htmlspecialchars($_POST['article']))){
            $article = htmlspecialchars($_POST['article']);
            $data['article_s'] = $article;
        }else{
            $article = '';
            $data['article_s'] = $article;
        }

        $date = '';

        $load = 'loadDataInnerJoinLike';

        if(isset(($_POST['date'])) and !empty(htmlspecialchars($_POST['date']))){
            $date = htmlspecialchars($_POST['date']);
            $data['date'] = $date;
            $load = 'loadDataInnerJoinWhere';
            $the_day = $date;
        }else{
            $data['date'] = '';
            $the_day = date('Y-m-d',time());
        }

        if (isset($_POST['FilterDate'])) {
            $data['FilterDate'] = htmlspecialchars($_POST['FilterDate']);
        }else{
            $data['FilterDate'] = ''; 
        }

        if(isset(($_POST['date_2'])) and !empty(htmlspecialchars($_POST['date_2']))){
            $date_2 = htmlspecialchars($_POST['date_2']);
            $data['date_2'] = $date_2;
            $added_condition = '>=';
            $end_date = ",'date<=' => ".strtotime($date_2);
            $load = 'loadDataInnerJoinWhere';
        }else{
            $data['date_2'] = '';
            $added_condition = '';
            $end_date = '';
        }
        
        $data['list_depense'] = $this->DataHandle->loadDataLike('depense',array('description'=>$description, 'date'=>$date));
        $data['list_user'] = $this->DataHandle->loadDataLike('user',array('name'=>$user_name, 'added_date'=>$date));
        $data['list_article'] = $this->DataHandle->loadDataLike('article',array('article'=>$article, 'added_date'=>$date));

        $data['vue_global'] = $this->DataHandle->loadDataLike('vue_global',array('article'=>$article, 'date'=>$date));
        
        $vente = $this->DataHandle->loadDataLike('vente',array('sold_date'=>$date));
        $data['list_vente_today'] = $this->DataHandle->loadDataLike('vente',array('sold_date'=>$the_day));

        $depense = 0;
        $benefice = 0;
        $v = 0;
        $n_vente = 0;

            foreach($vente as $key => $rows){
                $x = ($vente[$key]['pvu'] - $vente[$key]['pau']) * $vente[$key]['quantite_vendu'];
                $v = $v + ($vente[$key]['pvu'] * $vente[$key]['quantite_vendu']);
                $benefice = $benefice + $x;
                $n_vente = $n_vente + $vente[$key]['quantite_vendu'];
            }

        $data['nos_vente'] = $v;
        $data['count_article'] = count($data['list_article']);
        $data['n_vente'] = $n_vente;
        
        $pv = 0;
        $pa_article = 0;
        $n_article = 0;

            foreach($data['list_article'] as $key => $rows){
                $n_article = $n_article + $data['list_article'][$key]['quantite_stock'];
                $pv = $pv + ($data['list_article'][$key]['pv'] * $data['list_article'][$key]['quantite_stock']);
                $pa_article = $pa_article + ($data['list_article'][$key]['pa'] * $data['list_article'][$key]['quantite_stock']);
            }

        $data['n_article'] = $n_article;
        $data['count_pvt'] = $pv;
        $data['count_pat'] = $pa_article;

            foreach($data['list_depense'] as $key => $rows){
                $depense = $depense + $data['list_depense'][$key]['montant'];
            }

        $data['benefice'] = $benefice;
        $data['spent'] = $depense;

        $data['list_vente'] = $this->DataHandle->loadDataLike('vente',array('article'=>$article, 'sold_date'=>$date));
        $data['count_vente'] = count($data['list_vente']);

        $data['list_journal'] = $this->DataHandle->$load('journal','user','user.id = journal.user_id',array('date'.$added_condition.''=>strtotime($date).''.$end_date));
    
        $data['list_achat'] = $this->DataHandle->loadDataLike('achat',array('article'=>$article, 'appr_date'=>$date));
        
        $n_achat = 0;
        $pa_achat = 0;
        foreach($data['list_achat'] as $key => $rows){
            $n_achat = $n_achat + $data['list_achat'][$key]['quantite_acheter'];
            $pa_achat = $pa_achat +  ($data['list_achat'][$key]['pa'] * $data['list_achat'][$key]['quantite_acheter']);
        }
        $data['n_achet'] = $n_achat;
        $data['count_pa'] = $pa_achat;

        $this->load->view('header',$data);
		$this->load->view($page,$data);
    }

    public function event_data($user,$message){
        return array(
            'user_id' => $user,
            'date' => time(),
            'description'=>$message,
        );
    }

    public function new_article(){
        $article_id = rand().'LMK'.time();
        $achat_id = time().'LMK'.rand();
        $add_article = array(
                        'article' => htmlspecialchars($this->input->post('new_article_article')),
                        'pa' => htmlspecialchars($this->input->post('new_article_pa')),
                        'pv' => htmlspecialchars($this->input->post('new_article_pv')),
                        'quantite_stock' => htmlspecialchars($this->input->post('new_article_quantite')),
                        'added_date' => htmlspecialchars($this->input->post('new_article_date')),
                        'description' => htmlspecialchars($this->input->post('new_article_description')),
                        'article_id' => $article_id,
                        'last_achat_id' => $achat_id,
                    );

        $add_achat = array(
                        'article_id' => $article_id,
                        'article' => htmlspecialchars($this->input->post('new_article_article')),
                        'pa' => htmlspecialchars($this->input->post('new_article_pa')),
                        'pv' => htmlspecialchars($this->input->post('new_article_pv')),
                        'quantite_stock' => htmlspecialchars($this->input->post('new_article_quantite')),
                        'appr_date' => htmlspecialchars($this->input->post('new_article_date')),
                        'description' => htmlspecialchars($this->input->post('new_article_description')),
                        'achat_id' => $achat_id,
                    );

        $article = $this->DataHandle->insertData('article',$add_article);
        $achat = $this->DataHandle->insertData('achat',$add_achat);

        if($article == true and $achat == true){
            $data = array(
                'user_id' => $this->user_id,
                'date' => time(),
                'description'=>'Article '.htmlspecialchars($this->input->post('new_article_article')).' Enregistrer',
            );
            echo json_encode(array('status'=>'success','info'=>'Article Enregistrer.'));
        }else{
            $data = array(
                'user_id' => $this->user_id,
                'date' => time(),
                'description'=>'Echec d\'enregistrement, '.htmlspecialchars($this->input->post('new_article_article')).' veuiller reessayer.',
            );
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
        }
        $this->DataHandle->event($data);
        
    }

    public function modalShowData($modal,$origin=''){
        if($modal == 'UpdateVente'){
            $where = array('vente_id'=>$this->input->post('data'));
            $data = $this->DataHandle->loadDataWhere('vente',$where);  
        }else if($modal == 'UpdateApprovisionner'){
            $where = array('achat_id'=>$this->input->post('data'));
            $data = $this->DataHandle->loadDataWhere('achat',$where); 
        }else if($modal == 'UpdateDepense'){
            $where = array('id'=>$this->input->post('data'));
            $data = $this->DataHandle->loadDataWhere('depense',$where); 
        }else if($modal == 'updateUser'){
            $where = array('id'=>$this->input->post('data'));
            $data = $this->DataHandle->loadDataWhere('user',$where); 
        }else{
            if ($origin == 'search') {
                $where = array('article'=>$this->input->post('data'));
                $data = $this->DataHandle->loadDataLike('article',$where);
                if ($modal == 'vendre') {
                    $js = "GetModalData(this.value,'vendre','find')";
                }else{
                    $js = "GetModalData(this.value,'approvisionner','find')";
                }
                
                $html = '<div class="col-12 form-group W-100 mt-1 mb-1">
                <select name="choose_article" id="choose_article" class="form-control" onchange="'.$js.'">
                <option value="">SELECTIONNER ARTICLE</option>';
                    foreach ($data as $key => $value) {
                        $html = $html.'<option value="'.$value["article_id"].'">'.$value["article"].'</option>';
                }              
                $html = $html.'</select> </div>';
                $data[0] = $html;
            }else{
                $where = array('article_id'=>$this->input->post('data'));
                $data = $this->DataHandle->loadDataWhere('article',$where);
            }
            
        }

        echo json_encode(array('data'=>$data[0], 'modal'=>$modal));
    }

    public function approvision_article(){
        if (htmlspecialchars($this->input->post('appro_article_date')) > date('Y-m-d',time())) {
            echo json_encode(array('status'=>'fail','info'=>'Vous avez saisis une date pas encore arrive.'));
            return;
        }
            $where = array('article_id'=>htmlspecialchars($this->input->post('appro_article_article_id')));
            $achat_id = time().'LMK'.rand();
            $quantite_stock = htmlspecialchars($this->input->post('appro_article_quantite_a')) + htmlspecialchars($this->input->post('appro_article_quantite_s'));
            $achat = array(
                'article_id'=>htmlspecialchars($this->input->post('appro_article_article_id')),
                'article'=> htmlspecialchars($this->input->post('appro_article_article')),
                'quantite_acheter' => htmlspecialchars($this->input->post('appro_article_quantite_a')),
                'quantite_stock' => (htmlspecialchars($this->input->post('appro_article_quantite_a')) + htmlspecialchars($this->input->post('appro_article_quantite_s'))) ,
                'pa' => htmlspecialchars($this->input->post('appro_article_pau')),
                'pat' => htmlspecialchars($this->input->post('appro_article_pat')),
                'pv' => htmlspecialchars($this->input->post('appro_article_pvu')),
                'appr_date' => htmlspecialchars($this->input->post('appro_article_date')),
                'description' => htmlspecialchars($this->input->post('appro_article_description')),
                'achat_id' => $achat_id,
            );

            $article = array(
                'quantite_stock' => (htmlspecialchars($this->input->post('appro_article_quantite_a')) + htmlspecialchars($this->input->post('appro_article_quantite_s'))) ,
                'pa' => htmlspecialchars($this->input->post('appro_article_pau')),
                'pv' => htmlspecialchars($this->input->post('appro_article_pvu')),
                'last_achat_id' => $achat_id,
            );
            $achat_r = $this->DataHandle->insertData('achat',$achat);
            $article_r = $this->DataHandle->updateData('article',$article,$where);
            if($achat_r and $article_r){

                $vue_global = array(
                    'date' => htmlspecialchars($this->input->post('appro_article_date')),
                    'article' => htmlspecialchars($this->input->post('appro_article_article')),
                    'entree' => htmlspecialchars($this->input->post('appro_article_quantite_a')),
                    'sortie' => '',
                    'stock_disponible' => htmlspecialchars($this->input->post('appro_article_quantite_a')) + htmlspecialchars($this->input->post('appro_article_quantite_s')),
                    'article_id' => htmlspecialchars($this->input->post('appro_article_article_id')),
                    'operation_id' => $achat_id,
                );
                $this->DataHandle->insertData('vue_global',$vue_global);

                $data = array(
                    'user_id' => $this->user_id,
                    'date' => time(),
                    'description'=>'Approvisionnement '.htmlspecialchars($this->input->post('appro_article_article')).' Enregistrer.',
                );
                echo json_encode(array('status'=>'success','info'=>'Approvisionnement Enregistrer.','stock' => $quantite_stock));
            }else{
                $data = array(
                    'user_id' => $this->user_id,
                    'date' => time(),
                    'description'=>'Echec d\'operation d\'approvisionnement, '.htmlspecialchars($this->input->post('appro_article_article')).' veuiller reessayer.',
                );
                echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            }
         $this->DataHandle->event($data);
    }

    public function sell_article(){
        if (htmlspecialchars($this->input->post('sell_article_date')) > date('Y-m-d',time())) {
            echo json_encode(array('status'=>'fail','info'=>'Vous avez saisis une date pas encore arrive.'));
            return;
        }
        
        $where = array('article_id'=>htmlspecialchars($this->input->post('sell_article_article_id')));
        $quantite_stock = htmlspecialchars($this->input->post('sell_article_quantite_s')) - htmlspecialchars($this->input->post('sell_article_quantite_v'));
        $vente_id = time().'LMK'.rand();    
        $vente = array(
                'article_id'=> htmlspecialchars($this->input->post('sell_article_article_id')),
                'article'=> htmlspecialchars($this->input->post('sell_article_article')),
                'quantite_stock' => htmlspecialchars($this->input->post('sell_article_quantite_s')) - htmlspecialchars($this->input->post('sell_article_quantite_v')),
                'quantite_vendu' => htmlspecialchars($this->input->post('sell_article_quantite_v')),
                'pvu' => htmlspecialchars($this->input->post('sell_article_pvu')),
                'pau' => htmlspecialchars($this->input->post('sell_pau')),
                'pvt' => htmlspecialchars($this->input->post('sell_article_pvt')),
                'sold_date' => htmlspecialchars($this->input->post('sell_article_date')),
                'description' => htmlspecialchars($this->input->post('sell_article_description')),
                'vente_id' => $vente_id,
            );

            $article = array(
                'quantite_stock' => (htmlspecialchars($this->input->post('sell_article_quantite_s')) - htmlspecialchars($this->input->post('sell_article_quantite_v'))),
            );

            $vente_r = $this->DataHandle->insertData('vente',$vente);
            $article_r = $this->DataHandle->updateData('article',$article,$where);
            if($vente_r and $article_r){

                $vue_global = array(
                    'date' => htmlspecialchars($this->input->post('sell_article_date')),
                    'article' => htmlspecialchars($this->input->post('sell_article_article')),
                    'entree' => '',
                    'sortie' => htmlspecialchars($this->input->post('sell_article_quantite_v')),
                    'stock_disponible' => htmlspecialchars($this->input->post('sell_article_quantite_s')) - htmlspecialchars($this->input->post('sell_article_quantite_v')),
                    'article_id' => htmlspecialchars($this->input->post('sell_article_article_id')),
                    'operation_id' => $vente_id,
                );

                $this->DataHandle->insertData('vue_global',$vue_global);
                
                $data = array(
                    'user_id' => $this->user_id,
                    'date' => time(),
                    'description'=>'Vente '.htmlspecialchars($this->input->post('sell_article_article')).' Enregistrer.',
                );
                echo json_encode(array('status'=>'success','info'=>'Vente Enregistrer.','stock' => $quantite_stock));
            }else{
                $data = array(
                    'user_id' => $this->user_id,
                    'date' => time(),
                    'description'=>'Echec d\'operation de vente, '.htmlspecialchars($this->input->post('sell_article_article')).' veuiller reessayer.',
                );
                echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            }
         $this->DataHandle->event($data);
    }

    public function modify_article(){
        $where = array('article_id'=>htmlspecialchars($this->input->post('modify_article_article_id')));

            $article = array(
                'article_id'=>htmlspecialchars($this->input->post('modify_article_article_id')),
                'article'=> htmlspecialchars($this->input->post('modify_article_article')),
                'quantite_stock' => htmlspecialchars($this->input->post('modify_article_quantite')),
                'pa' => htmlspecialchars($this->input->post('modify_article_pa')),
                'pv' => htmlspecialchars($this->input->post('modify_article_pv')),
                'added_date' => htmlspecialchars($this->input->post('modify_date')),
                'description' => htmlspecialchars($this->input->post('modify_description')),
            );
            $article = $this->DataHandle->updateData('article',$article,$where);
            if($article){
                $data = array(
                    'user_id' => $this->user_id,
                    'date' => time(),
                    'description'=>'Article '.htmlspecialchars($this->input->post('modify_article_article')).' Modifier.',
                );
                echo json_encode(array('status'=>'success','info'=>'Article Modifier.'));
            }else{
                $data = array(
                    'user_id' => $this->user_id,
                    'date' => time(),
                    'description'=>'Echec d\'operation sur Article, '.htmlspecialchars($this->input->post('sell_article_article')).' veuiller reessayer.',
                );
                echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            }
         $this->DataHandle->event($data);
    }

    public function new_depense(){
        if (isset($_POST['money']) and $_POST['money'] == 'USD') {
            $money = htmlspecialchars($this->input->post('new_depense_amount'));   
        }else{
            $money = htmlspecialchars($this->input->post('new_depense_amount')) / htmlspecialchars($this->input->post('taux'));
        }

        $data = array(
            'montant' => $money,
            'date' => htmlspecialchars($this->input->post('new_depense_date')),
            'description' => htmlspecialchars($this->input->post('new_depense_description')),
        );

        $depense = $this->DataHandle->insertData('depense',$data);
        
        if($depense){
            $data = array(
                'user_id' => $this->user_id,
                'date' => time(),
                'description'=>'Depense de '.$this->input->post('new_depense_amount').' Enregistrer.',
            );
            echo json_encode(array('status'=>'success','info'=>'Depense Enregistrer.'));
        }else{
            $data = array(
                'user_id' => $this->user_id,
                'date' => time(),
                'description'=>'Echec d\'operation (depense), '.$this->input->post('new_depense_amount').' veuiller reessayer.',
            );
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation (depense), veuiller reessayer.'));
        }
     $this->DataHandle->event($data);
    }

    public function update_article(){
        $last_id = $this->DataHandle->loadDataWhere('article',array('last_achat_id'=>$this->input->post('update_article_achat_id')));
        
        if(count($last_id) == 0){
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, cette operation ne peux plus etre effectuer sur cette article.')); return;
        }else{
            $where = array('achat_id'=>$this->input->post('update_article_achat_id'));
            $achat_table = array(
                'article' => htmlspecialchars($this->input->post('update_article_article')),
                'quantite_stock' => htmlspecialchars($this->input->post('update_article_quantite_s')),
                'pa' => htmlspecialchars($this->input->post('update_article_pau')),
                'pat' => htmlspecialchars($this->input->post('update_article_pat')),
                'pv' => htmlspecialchars($this->input->post('update_article_pvu')),
                'appr_date' => htmlspecialchars($this->input->post('update_article_date')),
                'description' => htmlspecialchars($this->input->post('update_article_description')),
            );
            $achat = $this->DataHandle->updateData('achat',$achat_table,$where);
            if($achat == false){
                echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
                $data = array(
                    'user_id' => $this->user_id,
                    'date' => time(),
                    'description'=>'Echec d\'operation (achat) '.$this->input->post('update_article_article').' Modifier.',
                );
                return;
            }
            $where_x = array('last_achat_id'=>$this->input->post('update_article_achat_id'));
            $article_table = array(
                'quantite_stock' => htmlspecialchars($this->input->post('update_article_quantite_s')),
                'pa' => htmlspecialchars($this->input->post('update_article_pau')),
                'pv' => htmlspecialchars($this->input->post('update_article_pvu')),
            );
            $article = $this->DataHandle->updateData('article',$article_table,$where_x);
            if($article == false){
                echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
                $data = array(
                    'user_id' => $this->user_id,
                    'date' => time(),
                    'description'=>'Echec d\'operation  (article)'.$this->input->post('update_article_article').' Modifier.',
                );
                return;
            }
            if($achat and $article){
                $data = array(
                    'user_id' => $this->user_id,
                    'date' => time(),
                    'description'=>'Article '.htmlspecialchars($this->input->post('update_article_article')).' Modifier.',
                );
                echo json_encode(array('status'=>'success','info'=>'Article Modifier.'));
            }else{
                $data = array(
                    'user_id' => $this->user_id,
                    'date' => time(),
                    'description'=>'Echec d\'operation '.$this->input->post('update_article_article').' Modifier.',
                );
                echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            }
            $this->DataHandle->event($data); 
        }
    }

    public function delete_achat(){
            $achat_id = htmlspecialchars($this->input->post('data'));
            $row = $this->DataHandle->loadDataWhere('achat',array('achat_id'=>$achat_id));
            if(count($row) == 0){
                echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
                $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression achat, id :'.$achat_id.' cette operation ne peux pas etre effectuer.');
            }else{
                $article_x = $this->DataHandle->loadDataWhere('article',array('article_id'=>$row[0]['article_id']));
                if (count($row) == 0) {
                    echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer donnees article inexistant.'));
                    $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression achat, id :'.$achat_id.' cette operation ne peux pas etre effectuer.');
                    return;
                }

                if ($article_x[0]['last_achat_id'] != $row[0]['achat_id']) {
                    echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, suppression plus possible, ce stock ne plus disponible.'));
                    $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression achat, id :'.$achat_id.' cette operation ne peux plus etre effectuer.');
                    return;
                }

                $stock = $article_x[0]['quantite_stock'] - $row[0]['quantite_acheter'];
                
                $article_table = array(
                    'quantite_stock' => $stock,
                );

                $article = $this->DataHandle->updateData('article',$article_table,array('article_id'=>$row[0]['article_id']));
                if($article == false){
                    echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, l\'article n\'est pas supprimer.'));
                    $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression achat, id :'.$achat_id.' cette operation ne peux plus etre effectuer.');
                    return;
                }

                $delete = $this->DataHandle->deleteData('achat',array('achat_id'=>$achat_id));
                if($delete == false){
                    echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, l\'achat n\'est pas supprimer.'));
                    $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression achat, id :'.$achat_id.' cette operation ne peux plus etre effectuer.');
                    return;
                }

                if($article and $delete){
                    $this->DataHandle->deleteData('vue_global',array('operation_id'=>$achat_id));
                    echo json_encode(array('status'=>'success','info'=>'Approvionnement Supprimer.'));
                    $data = $this->event_data($this->user_id,'Approvionnement Supprimer sur achat, id :'.$achat_id.'.');
                }else{
                    echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
                    $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression achat, id :'.$achat_id.' cette operation ne peux plus etre effectuer.');
                }
            }
        $this->DataHandle->event($data);
    }

    public function delete_vente(){
        $data = htmlspecialchars($this->input->post('data'));
        $v = $this->DataHandle->loadDataWhere('vente',array('vente_id'=> $data));
        if(count($v) == 0){
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation vente non retrouve, veuiller reessayer.'));
            return;
        }
        
        $article = $this->DataHandle->loadDataWhere('article',array('article_id'=> $v[0]['article_id']));
        if(count($article) == 0){
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation article non retrouve, veuiller reessayer.'));
            return;
        }

        $qs = $article[0]['quantite_stock'] + $v[0]['quantite_vendu'];
        $update = $this->DataHandle->updateData('article',array('quantite_stock'=>$qs),array('article_id'=> $v[0]['article_id']));
        if($update == false){
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression vente, id :'.$data.' (article).');
            return;
        }

        $delete = $this->DataHandle->deleteData('vente',array('vente_id'=> $data));
        if($delete == false){
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression vente, id :'.$data.' (vente).');
            return;
        }

        if($update and $delete){
            $this->DataHandle->deleteData('vue_global',array('operation_id'=>$data));
            echo json_encode(array('status'=>'success','info'=>'Vente Supprimer.'));
            $data = $this->event_data($this->user_id,'Vente suppressionner, id :'.$data.'.');
        }else{
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression vente, id :'.$data.'.');
        }
        $this->DataHandle->event($data); 
    }

    public function delete_article(){
        $data = htmlspecialchars($this->input->post('data'));
        $delete1 = $this->DataHandle->deleteData('article',array('article_id'=> $data));
        $delete2 = $this->DataHandle->deleteData('achat',array('article_id'=> $data));
        if($delete1 and $delete2){
            echo json_encode(array('status'=>'success','info'=>'Article Supprimer.'));
            $data = $this->event_data($this->user_id,'Article suppressionner, id :'.$data.'.');
        }else{
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression Article, id :'.$data.'.');
        }
        $this->DataHandle->event($data);
    }

    public function delete_article_only(){
        $data = htmlspecialchars($this->input->post('data'));
        $delete = $this->DataHandle->deleteData('article',array('article_id'=> $data));
        if($delete){
            echo json_encode(array('status'=>'success','info'=>'Article Supprimer.'));
            $data = $this->event_data($this->user_id,'Article suppressionner, id :'.$data.'.');
        }else{
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression Article, id :'.$data.'.');
        }
        $this->DataHandle->event($data);
    }

    var $image_file_type = 'gif|jpg|png|jpeg|jfif|pdf';

    public function new_user(){
        if(isset($_FILES['new_user_profile']['name']) and !empty($_FILES['new_user_profile']['name'])){
						$config['log_threshold']		= '1';
						$config['upload_path']          = 'static/img/user/';
						$config['file_name']  			= 'user_'.rand().$_FILES['new_user_profile']['name'];
		                $config['allowed_types']        = $this->image_file_type;
		                $config['max_size']             = 8000;
		                $config['max_width']            = 3024;
		                $config['max_height']           = 4032;
		                $config['overwrite']			= false;
		    $this->load->library('upload',$config);
		    $this->upload->initialize($config);
			        if (!$this->upload->do_upload('new_user_profile')){
		                $error = strip_tags($this->upload->display_errors());
		                echo json_encode(array('status' => 'fail','info' => $error));
		                return;
		            }else{
		                	$upload_data = $this->upload->data();
		                	$profile = $upload_data['file_name'];
		            }
                        
		}else{
            $profile = 'avatar.png';
        }
        $data = array(
            'image' => $profile, 
            'name' => htmlspecialchars($this->input->post('new_user_name')),
            'email' => htmlspecialchars($this->input->post('new_user_email')),
            'phone' => htmlspecialchars($this->input->post('new_user_phone')),
            'added_date' => time(),
            'password' => password_hash('1234pass',PASSWORD_DEFAULT),
        );
        $user = $this->DataHandle->insertData('user',$data);
        if($user){
            echo json_encode(array('status'=>'success','info'=>'Utilisateur Enregistrer.'));
            $data = $this->event_data($this->user_id,'Utilisateur '.htmlspecialchars($this->input->post('new_user_name')).' Enregistrer.');
        }else{
            echo json_encode(array('status'=>'success','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur ajout utilisateur.'.htmlspecialchars($this->input->post('new_user_name')));
        }
        $this->DataHandle->event($data);
    }

    public function delete_user(){
        $data = htmlspecialchars($this->input->post('data'));
        $u = $this->DataHandle->loadDataWhere('user',array('id'=> $data));
        if(count($u) == 0){
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation Utilisateur non retrouve, veuiller reessayer.'));
            return;
        }
        $name = $u[0]['name'];
        $delete = $this->DataHandle->deleteData('user',array('id'=> $data));

        if($delete){
            echo json_encode(array('status'=>'success','info'=>'Utilisateur Supprimer.'));
            $data = $this->event_data($this->user_id,'Utilisateur suppressionner, noms :'.$name.'.');
        }else{
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression Utilisateur, noms :'.$name.'.');
        }
        $this->DataHandle->event($data); 
    }

    public function update_user($connected = null){
        if($connected == null){
            $prefix = 'update_';
        }else{
            $prefix = '';
        }
        if(isset($_FILES[''.$prefix.'user_profile']['name']) and !empty($_FILES[''.$prefix.'user_profile']['name'])){
            $config['log_threshold']		= '1';
            $config['upload_path']          = 'static/img/user/';
            $config['file_name']  			= 'user_'.rand().$_FILES[''.$prefix.'user_profile']['name'];
            $config['allowed_types']        = $this->image_file_type;
            $config['max_size']             = 8000;
            $config['max_width']            = 3024;
            $config['max_height']           = 4032;
            $config['overwrite']			= false;
            $this->load->library('upload',$config);
            $this->upload->initialize($config);
                if (!$this->upload->do_upload(''.$prefix.'user_profile')){
                    $error = strip_tags($this->upload->display_errors());
                    echo json_encode(array('status' => 'fail','info' => $error));
                    return;
                }else{
                        $upload_data = $this->upload->data();
                        $profile = $upload_data['file_name'];
                }
                    
        }else{
            $profile = htmlspecialchars($this->input->post(''.$prefix.'user_profile_old'));
        }
        $data = array(
            'image' => $profile, 
            'name' => htmlspecialchars($this->input->post(''.$prefix.'user_name')),
            'email' => htmlspecialchars($this->input->post(''.$prefix.'user_email')),
            'phone' => htmlspecialchars($this->input->post(''.$prefix.'user_phone')),
        );
        $user = $this->DataHandle->updateData('user',$data,array('id'=> htmlspecialchars($this->input->post(''.$prefix.'user_id')) ));
        if($user){
            echo json_encode(array('status'=>'success','info'=>'Utilisateur Modifier.'));
            $data = $this->event_data($this->user_id,'Utilisateur '.htmlspecialchars($this->input->post(''.$prefix.'_user_name')).' Modifier.');
        }else{
            echo json_encode(array('status'=>'success','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur Modification utilisateur.'.htmlspecialchars($this->input->post(''.$prefix.'user_name')));
        }
        $this->DataHandle->event($data);
    }

    public function update_depense(){
        $sum = htmlspecialchars($this->input->post('update_depense_amount'));
        $date = htmlspecialchars($this->input->post('update_depense_date'));
        $depense = array(
            'montant' => htmlspecialchars($this->input->post('update_depense_amount')),
            'date' => htmlspecialchars($this->input->post('update_depense_date')),
            'description' => htmlspecialchars($this->input->post('update_depense_description')),
        );
        $where = array('id'=>htmlspecialchars($this->input->post('update_depense_id')));
        $update = $this->DataHandle->updateData('depense',$depense,$where);
        if($update){
            echo json_encode(array('status'=>'success','info'=>'Depense Modifier.'));
            $data = $this->event_data($this->user_id,'Depense de '.$sum.' du '.$date.' Modifier.');
        }else{
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur modification depense.');
        }
        $this->DataHandle->event($data);
    }

    public function delete_depense(){
        $where = array('id'=>htmlspecialchars($this->input->post('data')));
        $data = $this->DataHandle->loadDataWhere('depense',$where);
        $delete = $this->DataHandle->deleteData('depense',$where);
        if(count($data) == 0){
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression depense.');
            return;
        }
        $sum = $data[0]['montant'];
        $date = $data[0]['date'];
        if($delete){
            echo json_encode(array('status'=>'success','info'=>'Depense Supprimer.'));
            $data = $this->event_data($this->user_id,'Depense de '.$sum.' du '.$date.' Supprimer.');
        }else{
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur suppression depense.');
        }
        $this->DataHandle->event($data);
    }

    public function update_sold(){
        $qv_old = htmlspecialchars($this->input->post('update_sold_quantite_v_old'));
        $qv_new = htmlspecialchars($this->input->post('update_sold_quantite_v'));
        $qs = htmlspecialchars($this->input->post('update_sold_quantite_s'));
        $pvt = htmlspecialchars($this->input->post('update_sold_pvt'));
        $pvu = htmlspecialchars($this->input->post('update_sold_pvu'));
        if($qv_new > $qv_old){ // the client add to the product
            $added = $qv_new - $qv_old;
            $qs = $qs - $added;
            $pvt = $pvu * $qv_new;
        }else if($qv_new < $qv_old){ // the client return the product
            $sub = $qv_old - $qv_new;
            $qs = $qs + $sub;
            $pvt = $pvu * $qv_new;
        }else{
            $qs = $qs;
            $pvt = $pvu * $qv_new;
        }

        $vente = array(
            'article'=>htmlspecialchars($this->input->post('update_sold_article')),
            'pau'=>htmlspecialchars($this->input->post('update_sold_pau')),
            'sold_date'=>htmlspecialchars($this->input->post('update_sold_date')),
            'description'=>htmlspecialchars($this->input->post('update_sold_description')),
            'quantite_vendu'=> $qv_new,
            'quantite_stock'=> $qs,
            'pvu'=> $pvu,
            'pvt'=> $pvt,
        );
        $vente_id = htmlspecialchars($this->input->post('update_sold_vente_id'));
        $where_v = array('vente_id' => $vente_id);
        $vente_r = $this->DataHandle->updateData('vente',$vente,$where_v);
        if($vente_r == false){
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur modification vente, id :'.$vente_id.' (vente).');
            return;
        }
        $article = array('quantite_stock' => $qs);
        $where_a = array('article_id' => htmlspecialchars($this->input->post('update_sold_article_id')));
        $article_r = $this->DataHandle->updateData('article',$article,$where_a);
        if($article_r == false){
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur modification vente, id :'.$vente_id.' (article).');
            return;
        }
        if($vente_r and $article_r){
            echo json_encode(array('status'=>'success','info'=>'Vente Modifier.'));
            $data = $this->event_data($this->user_id,'Vente Modifier, id :'.$vente_id.'.');
        }else{
            echo json_encode(array('status'=>'fail','info'=>'Echec d\'operation, veuiller reessayer.'));
            $data = $this->event_data($this->user_id,'Echec d\'operation sur modification vente, id :'.$vente_id.'.');
        }
        $this->DataHandle->event($data); 
    }

    public function pass($var){
        echo password_hash($var,PASSWORD_DEFAULT);
    }

    public function bestsoldProduct(){
        $row = $this->DataHandle->bestsoldProduct('4');
        $html = '';
        foreach ($row as $key => $value) {
            $montant = $row[$key]['quantite_vendu'] * $row[$key]['pvu'];
            $html = $html.'<tr>
            <td class="fw-bold">- '.$row[$key]['article'].'</td>
            <td class="text-end">'.$montant.' $</td>
            </tr>
            ';
        }
        $sellers = array();
        $montant = array();
        foreach ($row as $key => $value) {
            $montant[$key] = $row[$key]['quantite_vendu'] * $row[$key]['pvu'];
            $sellers[$key] =  $row[$key]['article']; 
        }
        
        echo json_encode(array('status'=>'success','product'=>$html,'sellers'=>$sellers,'montant'=>$montant));
    }

    public function number($value = ''){
        $year = date('Y');
        if ($value == '') {
        $j = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-01'), 'Y-m'));
        $f = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-02'), 'Y-m'));
        $m = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-03'), 'Y-m'));
        $av = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-04'), 'Y-m'));
        $may = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-05'), 'Y-m'));
        $j = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-06'), 'Y-m'));
        $jl = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-07'), 'Y-m'));
        $ao = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-08'), 'Y-m'));
        $s = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-09'), 'Y-m'));
        $o = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-10'), 'Y-m'));
        $n = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-11'), 'Y-m'));
        $d = $this->DataHandle->VenteAmount(date_format(date_create(''.$year.'-12'), 'Y-m'));
        echo json_encode(array('status'=>'success','number'=>array($j,$f,$m,$av,$may,$j,$jl,$ao,$s,$o,$n,$d)));
        }else{
            $j = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-01'), 'Y-m'),array('article_id'=>$value));
            $f = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-02'), 'Y-m'),array('article_id'=>$value));
            $m = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-03'), 'Y-m'),array('article_id'=>$value));
            $av = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-04'), 'Y-m'),array('article_id'=>$value));
            $may = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-05'), 'Y-m'),array('article_id'=>$value));
            $j = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-06'), 'Y-m'),array('article_id'=>$value));
            $jl = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-07'), 'Y-m'),array('article_id'=>$value));
            $ao = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-08'), 'Y-m'),array('article_id'=>$value));
            $s = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-09'), 'Y-m'),array('article_id'=>$value));
            $o = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-10'), 'Y-m'),array('article_id'=>$value));
            $n = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-11'), 'Y-m'),array('article_id'=>$value));
            $d = $this->DataHandle->VenteAmountwhere(date_format(date_create(''.$year.'-12'), 'Y-m'),array('article_id'=>$value));
            echo json_encode(array('status'=>'success','number'=>array($j,$f,$m,$av,$may,$j,$jl,$ao,$s,$o,$n,$d)));
        }
    }

    public function money($value = ''){
        $year = date('Y');
        if ($value == '') {
        $j = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-01'), 'Y-m'));
        $f = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-02'), 'Y-m'));
        $m = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-03'), 'Y-m'));
        $av = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-04'), 'Y-m'));
        $may = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-05'), 'Y-m'));
        $j = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-06'), 'Y-m'));
        $jl = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-07'), 'Y-m'));
        $ao = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-08'), 'Y-m'));
        $s = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-09'), 'Y-m'));
        $o = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-10'), 'Y-m'));
        $n = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-11'), 'Y-m'));
        $d = $this->DataHandle->VenteMoney(date_format(date_create(''.$year.'-12'), 'Y-m'));
            echo json_encode(array('status'=>'success','money'=>array($j,$f,$m,$av,$may,$j,$jl,$ao,$s,$o,$n,$d)));
        }else{
        $j = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-01'), 'Y-m'),array('article_id'=>$value));
        $f = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-02'), 'Y-m'),array('article_id'=>$value));
        $m = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-03'), 'Y-m'),array('article_id'=>$value));
        $av = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-04'), 'Y-m'),array('article_id'=>$value));
        $may = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-05'), 'Y-m'),array('article_id'=>$value));
        $j = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-06'), 'Y-m'),array('article_id'=>$value));
        $jl = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-07'), 'Y-m'),array('article_id'=>$value));
        $ao = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-08'), 'Y-m'),array('article_id'=>$value));
        $s = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-09'), 'Y-m'),array('article_id'=>$value));
        $o = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-10'), 'Y-m'),array('article_id'=>$value));
        $n = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-11'), 'Y-m'),array('article_id'=>$value));
        $d = $this->DataHandle->VenteMoneywhere(date_format(date_create(''.$year.'-12'), 'Y-m'),array('article_id'=>$value));
        echo json_encode(array('status'=>'success','money'=>array($j,$f,$m,$av,$may,$j,$jl,$ao,$s,$o,$n,$d)));
        }
    }
}
