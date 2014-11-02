<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 14:12
 */
class WebUser extends CWebUser {

    protected $_user;

    public $guestName='Гость';

    /**
     * @return User
     */
    public function getUserOrRegisterTemporary() {
        $user = $this->getUser();
        if (!$user) {
            $identity=new TemporaryIdentity();
            $identity->authenticate();
            $this->login($identity, 3600*24*365);
            return $this->getUser();
        }
        return $user;
    }

    /**
     * @return User
     */
    public function getUser() {
        if (!$this->id) {
            return null;
        }
        if ($this->_user) {
            return $this->_user;
        }
        $this->_user = User::model()->findByPk($this->id);
        return $this->_user;
    }

    public function getIsGuest() {
        return parent::getIsGuest();
    }

    public function  getHasAccount() {
        return $this->id;
    }

    public function getIsRegistered() {
        return $this->id && $this->getUser()->type != User::TYPE_GUEST;
    }
}