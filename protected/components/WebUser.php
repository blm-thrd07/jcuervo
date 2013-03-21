<?php 
class WebUser extends CWebUser
{
    /**
     * Overrides a Yii method that is used for roles in controllers (accessRules).
     *
     * @param string $operation Name of the operation required (here, a role).
     * @param mixed $params (opt) Parameters for this operation, usually the object to access.
     * @return bool Permission granted?
     */
    public function checkAccess($operation, $params=array())
    {
        if (empty(Yii::app()->session['usuario_id'])){//$this->id)) {
            // Not identified => no rights
            return false;
        }
        
        //$role = $this->getState("roles");
        //echo Yii::app()->user->checkAccess('Administrador');
        //echo var_dump($this->getState("roles"));
        //echo $this->getState("roles");//$user->tipoUsuario->descripcion;
		//$role = Yii::app()->user->roles;
        	$role = Yii::app()->user->getState('roles');
        //	echo $role;
        	//echo Yii::app()->user->checkAccess('administrador');
        	//echo $this->getState("roles");;
        if ($role === 'Administrador') {
            return true; // admin role has access to everything
        }
        
        // allow access if the operation request is the current user's role
        return ($operation === $role);
    }
}
?>