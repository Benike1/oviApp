<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $authKey
 * @property string|null $accessToken
 */
class User extends ActiveRecord implements IdentityInterface
{
    /**
     * @return string
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @return array[]
     */
    public function rules()
    {
        return [
            [['username', 'password', 'authKey', 'accessToken'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Felhasználónév',
            'password' => 'Jelszó',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * @param $password
     * @return bool
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    /**
     * @param int|string $id
     * @return User|IdentityInterface|null
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * @param mixed $token
     * @param null $type
     * @return IdentityInterface|static|null
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::find()->all() as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * @param $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::find()->all() as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

}
