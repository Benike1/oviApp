<?php
namespace app\models;

use yii\base\Model;

/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => User::class,
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with such email.'
            ],
        ];
    }

    /**
     * @return User|false
     */
    public function sendGenerateResetToken()
    {
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }

        if (!User::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
        }

        if (!$user->save()) {
//                return \Yii::$app->mailer->compose('passwordResetToken', ['user' => $user])
//                    ->setFrom([\Yii::$app->params['supportEmail'] => \Yii::$app->name . ' robot'])
//                    ->setTo($this->email)
//                    ->setSubject('Password reset for ' . \Yii::$app->name)
//                    ->send();
            return false;
        }
        return $user;
    }
}
