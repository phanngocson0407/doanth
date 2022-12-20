<?php
class UserModel{
    private $username;
    private $password;
    private $email;
    private $phone;
    private $tenkhachhang;
    private $status;
 
    public function __construct($uName, $uPass, $uEmail, $uPhone,$uTenKH, $uStatus){
        $this->username = $uName;
        $this->password = $uPass;
        $this->email = $uEmail;
        $this->phone = $uPhone;
        $this->tenkhachhang = $uTenKH;
        $this->status = $uStatus;


    }



	/**
	 * @return mixed
	 */
	public function getUsername() {
		return $this->username;
	}
	
	/**
	 * @param mixed $username 
	 * @return self
	 */
	public function setUsername($username): self {
		$this->username = $username;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param mixed $password 
	 * @return self
	 */
	public function setPassword($password): self {
		$this->password = $password;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param mixed $email 
	 * @return self
	 */
	public function setEmail($email): self {
		$this->email = $email;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPhone() {
		return $this->phone;
	}

	/**
	 * @param mixed $phone 
	 * @return self
	 */
	public function setPhone($phone): self {
		$this->phone = $phone;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getTenkhachhang() {
		return $this->tenkhachhang;
	}

	/**
	 * @param mixed $tenkhachhang 
	 * @return self
	 */
	public function setTenkhachhang($tenkhachhang): self {
		$this->tenkhachhang = $tenkhachhang;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * @param mixed $status 
	 * @return self
	 */
	public function setStatus($status): self {
		$this->status = $status;
		return $this;
	}
}

?>