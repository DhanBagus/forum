<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forum extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		is_logged_in();
		
	}

	public function index(){
		$data['title'] = 'My Forum';
		
		$data ['user'] =$this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['category'] =$this->db->get('categori')->result_array();

		$this->db->order_by('time', 'DESC');
		$data['posts']=$this->db->get('tbl_post')->result_array();
		date_default_timezone_set('Asia/Jakarta');
		

		$this->form_validation->set_rules('content','Content','required');
		$this->form_validation->set_rules('kategori','Category','required');
		$this->form_validation->set_rules('title','Title','required|max_length[3000]');
		


		if($this->form_validation->run() == false){
			
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('forum/index',$data);
			$this->load->view('templates/footer');
		}else{
			//cek jika ada gambar yg diupload
			$upload_image=$_FILES['image_post']['name'];

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/image_post/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image_post')){

					 $old_image = $data['posts']['image_post'];
					 if($old_image != 'default.png'){
					 	unlink(FCPATH . 'assets/img/image_post/' . $old_image);
					 }

					$new_image=$this->upload->data('file_name');
					//$this->db->set('image',$new_image);
					//tempat if
					

				}else{
					//echo $this->upload->display_errors();
					$this->session->set_flashdata('message','
						<div class="alert alert-danger" role="alert">
						Image Not recognized!
						</div>');
					redirect('forum');
				}

				
					

			}
			//if($new_image){
			$data = [
				'title' => $this->input->post('title'),
				'content' => $this->input->post('content'),
				'image' => $new_image,
				'category_id' => $this->input->post('kategori'),
				'time' => time(),
				'id_user' => $data['user']['id']
			];

			$this->db->insert('tbl_post', $data);
			$this->session->set_flashdata('message','
				<div class="alert alert-success" role="alert">
				New post added!
				</div>');
			redirect('forum');

		//}else{
			// $this->session->set_flashdata('message','
			// 	<div class="alert alert-danger" role="alert">
			// 	Image Not recognized!
			// 	</div>');
			// redirect('forum');
		//}
			
		}

	}

	public function mypost(){
		$data['title'] = 'My Post';
		$data ['user'] =$this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['category'] =$this->db->get('categori')->result_array();


		$this->db->order_by('time', 'DESC');
		$data['posts']=$this->db->get_where('tbl_post',['id_user'=>$data['user']['id']])->result_array();
		date_default_timezone_set('Asia/Jakarta');
		

		$this->form_validation->set_rules('content','Content','required');
		$this->form_validation->set_rules('kategori','Category','required');
		


		if($this->form_validation->run() == false){
			
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('forum/index',$data);
			$this->load->view('templates/footer');
		}else{
			//cek jika ada gambar yg diupload
			$upload_image=$_FILES['image_post']['name'];

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/image_post/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image_post')){

					 $old_image = $data['posts']['image_post'];
					 if($old_image != 'default.png'){
					 	unlink(FCPATH . 'assets/img/image_post/' . $old_image);
					 }

					$new_image=$this->upload->data('file_name');
					//$this->db->set('image',$new_image);

					if($new_image){
						$data = [
							'content' => $this->input->post('content'),
							'image' => $new_image,
							'category_id' => $this->input->post('kategori'),
							'time' => time(),
							'id_user' => $data['user']['id']
						];
			
						$this->db->insert('tbl_post', $data);
						$this->session->set_flashdata('message','
							<div class="alert alert-success" role="alert">
							New post added!
							</div>');
						redirect('forum/mypost');
					}else{
						$this->session->set_flashdata('message','
							<div class="alert alert-danger" role="alert">
							Image Over Size Or Not Recognized!
							</div>');
						redirect('forum/mypost');
					}

				}else{
					echo $this->upload->display_errors();
				}

			}
			
		}
	}

	public function vComment($id_post){

		$data['title'] = 'Comment';
		
		$data ['user'] =$this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['category'] =$this->db->get('categori')->result_array();
		date_default_timezone_set('Asia/Jakarta');

		$data['posts'] = $this->db->get_where('tbl_post',['id_post'=> $id_post])->row_array(); 
		$data['komentar']=$this->db->get_where('comment',['post_id'=>$id_post])->result_array();
			
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('forum/comment',$data);
			$this->load->view('templates/footer');
	}



	public function comment($id_post){

		$data['title'] = 'Comment';
		
		$data ['user'] =$this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['category'] =$this->db->get('categori')->result_array();
		$data['komentar']=$this->db->get_where('comment',['post_id'=>$id_post])->result_array();
		//$data['komentator']= $this->db->get_where('user',)


		$data['posts'] = $this->db->get_where('tbl_post',['id_post'=> $id_post])->row_array(); 
		date_default_timezone_set('Asia/Jakarta');


		$this->form_validation->set_rules('komen','Comment','required');


		if($this->form_validation->run() == false){
			$this->session->set_flashdata('message','
			<div class="alert alert-danger" role="alert">
			Comment is required!
			</div>');
			redirect('forum/vComment/'.$id_post);
		}else{

		}
		$data = [
			'comment' => $this->input->post('komen'),
			'post_id' => $id_post,
			'user_id' => $data['user']['id'],
			'date' => time()
			
		];

		$this->db->insert('comment', $data);
		$this->session->set_flashdata('message','
			<div class="alert alert-success" role="alert">
			New Comment Added!
			</div>');
		redirect('forum/vComment/'.$id_post);
	}

	public function fKategori($id_categori){
		$this->db->order_by('time', 'DESC');
		$data['posts']=$this->db->get_where('tbl_post',['category_id'=>$id_categori])->result_array();
		$data['category'] =$this->db->get('categori')->result_array();
		$data['fCategory']=$this->db->get_where('categori',['id_categori'=>$id_categori])->row_array();

		$data['title'] = $data['fCategory']['categori'];
		
		$data ['user'] =$this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		
		// $data['komentar']=$this->db->get_where('comment',['post_id'=>$id_post])->result_array();


		date_default_timezone_set('Asia/Jakarta');
		

		$this->form_validation->set_rules('content','Content','required');
		$this->form_validation->set_rules('kategori','Category','required');
		


		if($this->form_validation->run() == false){
			
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('forum/index',$data);
			$this->load->view('templates/footer');
		}else{
			//cek jika ada gambar yg diupload
			$upload_image=$_FILES['image_post']['name'];

			if($upload_image){
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']     = '2048';
				$config['upload_path'] = './assets/img/image_post/';

				$this->load->library('upload', $config);

				if($this->upload->do_upload('image_post')){

					 $old_image = $data['posts']['image_post'];
					 if($old_image != 'default.png'){
					 	unlink(FCPATH . 'assets/img/image_post/' . $old_image);
					 }

					$new_image=$this->upload->data('file_name');
					//$this->db->set('image',$new_image);

				}else{
					echo $this->upload->display_errors();
				}

			}
			

	
			$data = [
				'content' => $this->input->post('content'),
				'image' => $new_image,
				'category_id' => $this->input->post('kategori'),
				'time' => time(),
				'id_user' => $data['user']['id']
			];

			$this->db->insert('tbl_post', $data);
			$this->session->set_flashdata('message','
				<div class="alert alert-success" role="alert">
				New post added!
				</div>');
			redirect('forum');
		}

	}


	public function inbox(){
		$data['title'] = 'Inbox';
		
		$data ['user'] =$this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		$data['category'] =$this->db->get('categori')->result_array();
		//$data['pm']=$this->db->get_where('inbox',['user_id_to' => $data['user']['id']] )->result_array();

		$u=$data['user']['id'];
		$qUser="SELECT user_id_from FROM inbox WHERE user_id_from=$u OR user_id_to=$u UNION SELECT user_id_to FROM inbox WHERE user_id_from=$u OR user_id_to=$u";
		$data['pm']=$this->db->query($qUser)->result_array();

		$this->load->view('templates/header',$data);
		$this->load->view('templates/sidebar',$data);
		$this->load->view('templates/topbar',$data);
		$this->load->view('forum/inbox',$data);
		$this->load->view('templates/footer');

	}



	public function message($user_id_to){
		$data['title']='Private Message';
		$data ['user'] =$this->db->get_where('user',['email' => $this->session->userdata('email')])->row_array();
		
		$data['recipient']=$this->db->get_where('user',['id' => $user_id_to ])->row_array();
		$data['to']=$this->db->get_where('user',['id'=>$user_id_to])->row_array();
		// $arrM=array('user_id_from'=>$data['user']['id'], 'user_id_to'=>$data['user']['id']);

		// $arr=array('user_id_from'=>$data['user']['id'], 'user_id_to'=>$data['user']['id']);
		// $data['pm']= $this->db->get_where('inbox',$arr)->result_array();

		$u=$data['user']['id'];
		$qUser="SELECT * FROM inbox WHERE (user_id_from=$u AND user_id_to=$user_id_to) Or (user_id_to=$u AND user_id_from=$user_id_to)";
		$data['pm']=$this->db->query($qUser)->result_array();

		// $this->db->where('user_id_from=', $user_id_to);
        // $this->db->or_where('user_id_to=', $user_id_to );  // Produces: WHERE name != 'Joe' OR id > 50
		// $data['pm']=$this->db->get('inbox')->result_array();
		
		// $this->db->get_where('inbox',['user_id_from'=> $user_id_to])->result_array();

		date_default_timezone_set('Asia/Jakarta');


		$this->form_validation->set_rules('message','Message','required');
	


		

		if($this->form_validation->run() == false){
			$this->load->view('templates/header',$data);
			$this->load->view('templates/sidebar',$data);
			$this->load->view('templates/topbar',$data);
			$this->load->view('forum/message',$data);
			$this->load->view('templates/footer');
		}else{
			$data = [
				'message' => $this->input->post('message'),
				'user_id_from' => $data['user']['id'],
				'user_id_to' => $user_id_to,
				'date' => time()
				
			];
			$this->db->insert('inbox', $data);
			$this->session->set_flashdata('message','
				<div class="alert alert-success" role="alert">
				New Massage Send!
				</div>');
			redirect('forum/message/'.$user_id_to);

		}
		

		


	}

	

}
