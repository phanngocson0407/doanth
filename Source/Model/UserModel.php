<?php
include_once '../until/MySQLUtil.php';
class UserModel
{
	private $userid;
	private $username;
	private $password;
	private $email;
	private $phone;
	private $tenkhachhang;
	private $status;

	public function __construct($uName, $uPass, $uEmail, $uPhone, $uTenKH, $uStatus,$uUserID)
	{
		$this->username = $uName;
		$this->password = $uPass;
		$this->email = $uEmail;
		$this->phone = $uPhone;
		$this->tenkhachhang = $uTenKH;
		$this->status = $uStatus;
		$this->userid = $uUserID;


	}



	/**
	 * @return mixed
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @param mixed $username 
	 * @return self
	 */
	public function setUsername($username): self
	{
		$this->username = $username;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password 
	 * @return self
	 */
	public function setPassword($password): self
	{
		$this->password = $password;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email): self
	{
		$this->email = $email;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPhone()
	{
		return $this->phone;
	}

	/**
	 * @param mixed $phone 
	 * @return self
	 */
	public function setPhone($phone): self
	{
		$this->phone = $phone;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTenkhachhang()
	{
		return $this->tenkhachhang;
	}

	/**
	 * @param mixed $tenkhachhang 
	 * @return self
	 */
	public function setTenkhachhang($tenkhachhang): self
	{
		$this->tenkhachhang = $tenkhachhang;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStatus()
	{
		return $this->status;
	}

	/**
	 * @param mixed $status 
	 * @return self
	 */
	public function setStatus($status): self
	{
		$this->status = $status;
		return $this;
	}
	/**
	 * Get the value of userid
	 */ 
	public function getUserid()
	{
		return $this->userid;
	}

	/**
	 * Set the value of userid
	 *
	 * @return  self
	 */ 
	public function setUserid($userid)
	{
		$this->userid = $userid;

		return $this;
	}
	public function insertUser()
	{
		$dbConnect = new MySQLUtils();
		$query = "INSERT INTO user(username, password, fullname, phone, status, email) VALUES (:username, :password, :fullname, :phone, :status, :email)";
		$param = array(":username" => $this->getUsername(), ":password" => $this->getPassword(), ":fullname" => $this->getTenkhachhang(), ":phone" => $this->getPhone(), ":status" => $this->getStatus(), ":email" => $this->getEmail());
		$dbConnect->insertData($query, $param);
		$dbConnect->disconnectDB();

	}
	public function getUser()
	{
		$dbConnect = new MySQLUtils();
		$query = "SELECT userid, username, password, fullname, phone, status, email from user where userid=:userid";
		$param = array(":userid" => $this->getUserid());
		$user = $dbConnect->getData($query, $param);
		$dbConnect->disconnectDB();
		return $user;

		//getAllUser
		// $query = "SELECT username, password, fullname, phone, status, email from user";
		//getOne_user
		// $query = "SELECT username, password, fullname, phone, status, email from user where email=:email";
		//     $param = array(":email" => $txt_email);
		//     var_dump($dbConnect->getUserData($query, $param));
		//update user 
		// $query = "UPDATE user set status=:status where email=:email";
		// $param = array(":email" => $txt_email, ":status" => $txt_status);
		//        var_dump($dbConnect->updateUserData($query, $param));
		//delete user 
		// $query = "DELETE from user where email=:email";
		// $param = array(":email" => $txt_email);
		// var_dump($dbConnect->updateUserData($query, $param));


	}
	public function getAllUser(){
		$dbConnect = new MySQLUtils();
		$query = "SELECT userid, username, password, fullname, phone, status, email from user";
		$data = $dbConnect->getAllData($query);
		$dbConnect->disconnectDB();
		return $data;

	}
	public function updateUser()
	{
		$dbConnect = new MySQLUtils();
		$query = "UPDATE user set username=:username, password=:password, fullname=:fullname, phone=:phone, status:=status, email:=email where userid:= userid";
		$param = array(":username" => $this->getUsername(), ":password" => $this->getPassword(), ":fullname" => $this->getTenkhachhang(), ":phone" => $this->getPhone(), ":status" => $this->getStatus(), ":email" => $this->getEmail(),":userid" => $this->getUserid());
		$dbConnect->updateData($query, $param);
		$dbConnect->disconnectDB();

	}

	public function deleteUser()
	{
		$dbConnect = new MySQLUtils();
		$query = "DELETE from user where userid=:userid";
		$param = array(":userid" => $this->getUserid());
		$dbConnect->deleteData($query, $param);
		$dbConnect->disconnectDB();

	}
	
}

?>