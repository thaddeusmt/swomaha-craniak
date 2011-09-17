<?php
class WebUser extends CWebUser
{
    const TYPE_STUDENT      = '0';
    const TYPE_TEACHER      = '1';

    public $type;

    /**
     * Performs access check for this user.
     * @param string the name of the operation that need access check.
     * @param array name-value pairs that would be passed to business rules associated
     * with the tasks and roles assigned to the user.
     * @param boolean whether to allow caching the result of access checki.
     * This parameter has been available since version 1.0.5. When this parameter
     * is true (default), if the access check of an operation was performed before,
     * its result will be directly returned when calling this method to check the same operation.
     * If this parameter is false, this method will always call {@link CAuthManager::checkAccess}
     * to obtain the up-to-date access result. Note that this caching is effective
     * only within the same request.
     * @return boolean whether the operations can be performed by this user.
     */
    public function checkAccess($operation,$params=array(),$allowCaching=true)
    {
        if($allowCaching && $params===array() && isset($this->_access[$operation]))
            return $this->_access[$operation];
        else {
            if ($operation == 'roles') {
                $userRole = Yii::app()->user->role;
                if (in_array($userRole,$params)) {
                    return $this->_access[$operation]=true;
                }
            }
            return $this->_access[$operation]=Yii::app()->getAuthManager()->checkAccess($operation,$this->getId(),$params);
        }
    }
}
