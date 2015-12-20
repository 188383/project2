<?php
class User extends Controller{
	protected $user;
	protected $bcrypt;
	protected $audit;
	function __construct(){
		parent::__construct();
		$this->user = new \DB\SQL\Mapper($this->db,'users');
		$this->audit = \Audit::instance();
		$this->bcrypt = \BCrypt::instance();
	}
	
	public function create($f3){
		$post = $f3->get('POST');
		$message = array();
		try{
			$this->user->reset();
			$this->user->username = $this->validateEmail($post['username']);
			$this->user->password = $this->hashPassword($post['password']);
			$this->user->firstname = $post['firstname'];
			$this->user->lastname = $post['lastname'];
			$this->user->save();
			
			$message['id'] = $this->user->id;
			$message['username'] = $this->user->username;
			$message['password'] = $this->user->password;
			$message['firstname'] = $this->user->firstname;
			$message['lastname'] = $this->user->lastname;
			
		}catch(Exception $e){
			$message['success'] = false;
			$message['error'] = $e->getMessage();
		}
		
		echo json_encode($message);
	}
	
	public function findById($f3,$params){
		$message = array();
		
		try{	
			$this->user->reset();
			$this->user->load(array('id=?',$params['username']));
			if($this->user->dry()) throw new Exception('user error');
			$array = array();
			$array['username'] = $this->user->username;
			$array['firstname'] = $this->user->firstname;
			$array['lastname'] = $this->user->lastname;
			$array['id'] =  $this->user->id;	
			$message['success'] = true;
			$message['data'] = $array;
		}catch(Exception $e){
			$message['success'] = false;
			$message['error'] = $e->getMessage();
		}
			
		echo json_encode($message);
	}
	
	public function update($f3,$params){
		$message = array();
		$data = array();
		try{
			$this->user->reset();
			$this->user->load(array('id=?',$params['username']));
			$this->user->firstname = $f3->get('POST.firstname');
			$this->user->lastname = $f3->get('POST.lastname');
			$this->user->update();
			
			$data['firstname'] = $this->user->firstname;
			$data['lastname'] = $this->user->lastname;
			$data['username'] = $this->user->username;
			$message['success'] = true;
			$message['data'] = $data;
			
			
		}catch(Exception $e){
			$message['success'] = false;
			$message['error'] = 'update error!';
		}
		
		echo json_encode($message);
	}
	
	public function findUsers($f3){
		$get = $f3->get('GET');
		$message = array();
		$limit = 10;
		$data = array();
		$this->user->load(array());
		
		if(isset($get['skip'])){
			$this->user->skip($get['skip']);
		}
		
		if(isset($get['limit'])){
			$limit = $get['limit'];
		}
		
		try{
		
			while($limit>=0){
				$data['id'] = $this->user->id;
				$data['username'] = $this->user->username;
				$data['firstname'] = $this->user->firstname;
				$data['lastname'] = $this->user->lastname;
				$message[count($message)] = $data;
				$limit = $limit - 1;
			}
			
		}catch(Exception $e){
			$message['success'] = false;
			$message['error'] = 'data error';
		}
		
		echo json_encode($message);
	}
	
	public function validateEmail($email){
		if(!$this->audit->email($email)) throw new Exception('email');
		return $email;
	}
	
	public function hashPassword($password){
		return $this->bcrypt->hash($password);
	}
	
	public function checkName($name){
		if(!preg_match('/[a-z]/i',$name)) throw new Exception('name or surname');
	}
}
?>
