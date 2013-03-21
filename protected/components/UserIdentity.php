<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$username=strtolower($this->username); 
		$user=Admin::model()->find('LOWER(usuario)=?',array($username)); 

		if($user===null){
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} 
		else if(!$user->validatePassword($this->password)) {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		}
		else
		{	
			$this->_id=$user->id_admin; 
			$this->setState('roles', $user->tipo_usuario);
 			//Yii::app()->user->setState('usuario_id',$this->_id);			
 			//var_dump($user->tipoUsuario->descripcion);
			$this->username=$user->usuario; 
			$this->errorCode=self::ERROR_NONE;
			Yii::app()->session->add('usuario_id',$this->_id); 
		}
		return $this->errorCode==self::ERROR_NONE; 

		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;*/
	}

	public function getId() {
	      return $this->_id;
	}
}