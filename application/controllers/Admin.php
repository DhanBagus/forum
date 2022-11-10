<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		
	}

	public function index()
	{

		$data['title'] = 'Report';
		$data ['user'] =$this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

		$data['category']=$this->db->get('categori')->result_array();
		$data['mamber']=$this->db->get('user')->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/index',$data);
		$this->load->view('templates/footer');

	}


	public function role(){
		$data['title'] = 'Role';
		$data ['user'] =$this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['role']= $this->db->get('user_role')->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/role',$data);
		$this->load->view('templates/footer');
	}


	public function roleAccess($role_id){
		$data['title'] = 'Role Access';
		$data ['user'] =$this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();

		$data['role']= $this->db->get_where('user_role', ['id' => $role_id])->row_array();

		$this->db->where('id !=',1);
		$data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/role-access',$data);
		$this->load->view('templates/footer');
	}

	public function changeAccess(){
		$menu_id = $this->input->post('menuId');
		$role_id = $this->input->post('roleID');

		$data = [
			'role_id' => $role_id,
			'menu_id' => $menu_id
		];

		$result= $this->db->get_where('user_access_menu',$data);

		if($result->num_rows() < 1){
			$this->db->insert('user_access_menu',$data);
		}else{
			$this->db->delete('user_access_menu',$data);
		}

		$this->session->set_flashdata('massage','
				<div class="alert alert-success" role="alert">
				Access Changed!
				</div>');


	}

	public function report($lap){
		$category= $this->db->get_where('categori',['id_categori'=>$lap])->row_array();
		$data['title'] = 'Report';
		$data ['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['lap_id'] = $lap;

		date_default_timezone_set('Asia/Jakarta');

		if($lap>=1 && $lap<=7){
			$data['laporan'] = $this->db->get_where('tbl_post',['category_id' => $lap])->result_array();
			$category= $this->db->get_where('categori',['id_categori'=>$lap])->row_array();
			$data['title'] = 'Report By '.$category['categori'].' Category';
		}
		
		elseif($lap==8){
			$data['title'] = 'Report of member list';
			//$arr=array('user_id_from'=>$data['user']['id'], 'user_id_to'=>$data['user']['id']);
			$this->db->where('role_id !=',1);
			$data['laporan']= $this->db->get('user')->result_array();
		}

		elseif($lap==9){
			$data['title'] = 'Report of active user';
			$arr=array('status'=>1);
			$this->db->where('role_id !=',1);
			$data['laporan']= $this->db->get_where('user',$arr)->result_array();
		}

		elseif($lap==10){
			$data['title'] = 'User reports by post';
			$qUser="SELECT * FROM user INNER JOIN tbl_post where user.id=tbl_post.id_user GROUP BY user.id;";
			$data['laporan']=$this->db->query($qUser)->result_array();
		}

		elseif($lap==11){
			$data['title'] = 'Report of inbox list';
			$data['laporan']=$this->db->get('inbox')->result_array();

		}elseif($lap==13){
			$data['title'] = 'Report of comment list';
			$data['laporan']=$this->db->get('comment')->result_array();

		}elseif($lap==16){
			$data['title'] = 'Post reports with pictures';
			$qpost="SELECT * FROM tbl_post where image IS NOT NULL";
			$data['laporan']=$this->db->query($qpost)->result_array();
		}elseif($lap==20){
			$data['title'] = 'Reports of category';
			$qC="SELECT * FROM categori";
			$data['laporan']=$this->db->query($qC)->result_array();
		}else{
			redirect('auth/blocked');
		}
		




		// $this->db->where('id !=',1);
		// $data['menu'] = $this->db->get('user_menu')->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/report',$data);
		$this->load->view('templates/footer');
	}


	public function reportPerUser($lap,$id){
		$category= $this->db->get_where('categori',['id_categori'=>$lap])->row_array();
		$data['title'] = 'Report';
		$data ['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['lap_id'] = $lap;
		date_default_timezone_set('Asia/Jakarta');
		$User=$this->db->get_where('user',['id'=>$id])->row_array();
		

		if($lap==12){
			$data['title'] = 'User inbox report '.$User['name'];
			$qInbox="SELECT * FROM inbox WHERE user_id_from=$id OR user_id_to=$id";
			$data['laporan']=$this->db->query($qInbox)->result_array();
		}elseif($lap==14){
			
			$data['title'] = 'User comment report '.$User['name'];
			$qInbox="SELECT * FROM comment WHERE user_id=$id";
			$data['laporan']=$this->db->query($qInbox)->result_array();
		}elseif($lap==15){
			$data['title'] = 'User post report ' .$User['name'];
			$qInbox="SELECT * FROM tbl_post WHERE id_user=$id ";
			$data['laporan']=$this->db->query($qInbox)->result_array();
		}



		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('admin/report',$data);
		$this->load->view('templates/footer');

	}

	public function reportTgl($lap){
		$category= $this->db->get_where('categori',['id_categori'=>$lap])->row_array();
		$data['title'] = 'Report by date';
		$data ['user'] = $this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['lap_id'] = $lap;
		date_default_timezone_set('Asia/Jakarta');

		$this->form_validation->set_rules('tm','Start Date','required');

		if($this->form_validation->run() == false){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('admin/index',$data);
			$this->load->view('templates/footer');
		}else{

			$end=$this->input->post('ta');

			$tM=new DateTime($this->input->post('tm'));
			$tA= new DateTime($this->input->post('ta'));

			// var_dump($this->input->post($ends));

			// die();

			$mulai=$tM->getTimestamp();;
			$akhir=$tA->getTimestamp();

			if($end==0||$akhir<$mulai||$akhir==0||$akhir==$mulai){
				$akhir=$mulai+86400;
				$m=date('d/m/y ', $mulai);
				$date='('.$m.')';
			}else{
				$m=date('d/m/y ', $mulai);
				$a=date('d/m/y ', $akhir);
				$date='('.$m.' s.d. '.$a.')';
				
			}



			if($lap==17){
				$data['title'] = 'Post report by date '.$date;
				$qP="SELECT * FROM tbl_post WHERE time>=$mulai AND time<=$akhir";
				$data['laporan']=$this->db->query($qP)->result_array();

			}elseif($lap==18){
				$data['title'] = 'Comment report by date '.$date;
				$qC="SELECT * FROM comment WHERE date>=$mulai AND date<=$akhir";
				$data['laporan']=$this->db->query($qC)->result_array();
	
			}elseif($lap==19){
				$data['title'] = 'Inbox report by date '.$date;
				$qI="SELECT * FROM inbox WHERE date>=$mulai AND date<=$akhir";
				$data['laporan']=$this->db->query($qI)->result_array();
	
			}else{
				redirect('auth/blocked');
			}
			
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('admin/report',$data);
			$this->load->view('templates/footer');

		}

		
	}

}
