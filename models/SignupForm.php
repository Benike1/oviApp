<?php

namespace app\models;

use app\enums\PasswordEnum;
use yii\base\Model;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Felhasználónév',
            'email' => 'Email cím',
            'password' => 'Jelszó',
            'password_repeat' => 'Jelszó újra',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => User::class, 'message' => 'Ez a felhasználónév már foglalt!'],
            ['username', 'string', 'min' => 6, 'max' => 20, 'message' => 'A felhasználónév minimum 6 maximum 20 karakter lehet!'],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => User::class, 'message' => 'Ez az emailcím már foglalt!'],

            [['password', 'password_repeat'], 'required'],
            [['password', 'password_repeat'], 'string', 'min' => 6],
            [['password'], 'in', 'range' => PasswordEnum::getLabels(), 'not' => true, 'message' => 'Nem megfelelő erőőségű jelszó!'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => "A jelszavaknak egyezniük kell!"],
        ];
    }


    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();

            return $user;
        }

        return null;
    }
}
