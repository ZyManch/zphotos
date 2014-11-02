<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class RegisterForm extends CFormModel
{
	public $username;
	public $email;
	public $password;
	public $password_repeat;
	public $accept;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('username, email, password, password_repeat,accept', 'required'),
            array('email','email'),
            array('email','unique','attributeName' => 'email','caseSensitive'=>true,'className'=>'User'),
            array('username','length','min' => 5),
            array('password', 'compare'),
            array('accept', 'boolean'),
		);
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
            'username'=>'Фамилия Имя',
            'email'=>'E-Mail',
            'password'=>'Пароль',
            'password_repeat'=>'Повторите пароль',
		);
	}

    public function register() {
        $webUser = Yii::app()->user;
        if (!$webUser->getIsGuest()) {
            return false;
        }
        if ($webUser->getIsRegistered()) {
            $user = $webUser->getUser();
        } else {
            $user = new User();
        }
        $user->type = User::TYPE_USER;
        $user->username = $this->username;
        $user->setPassword($this->password);
        $user->email = $this->email;
        if (!$user->save()) {
            return false;
        }
        $login = new LoginForm();
        $login->email = $this->email;
        $login->password = $this->password;
        $login->rememberMe = true;
        return $login->login();
    }

}
