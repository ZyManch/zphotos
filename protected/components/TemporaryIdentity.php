<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class TemporaryIdentity extends CUserIdentity {

    protected $_user;

    public function __construct() {

    }

	public function authenticate() {
        $this->_user = new User();
        $this->_user->temporary = User::YES;
        if (!$this->_user->save()) {
            throw new Exception('Ошибка создания временого юзера');
        }
        $this->errorCode = self::ERROR_NONE;
        return true;
    }

    /**
     * Returns the unique identifier for the identity.
     * The default implementation simply returns {@link username}.
     * This method is required by {@link IUserIdentity}.
     * @return string the unique identifier for the identity.
     */
    public function getId()
    {
        return $this->_user->id;
    }

    /**
     * Returns the display name for the identity.
     * The default implementation simply returns {@link username}.
     * This method is required by {@link IUserIdentity}.
     * @return string the display name for the identity.
     */
    public function getName()
    {
        return $this->_user->email;
    }

}