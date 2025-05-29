<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $username
 * @property string $email
 * @property string $password_hash
 * @property string $auth_key
 * @property string|null $access_token
 * @property string|null $role
 * @property int $status
 */
class User extends ActiveRecord implements IdentityInterface
{
    public $password;

    /**
     * ENUM field values
     */
    const ROLE_USER = 'user';
    const ROLE_ADMIN = 'admin';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['access_token'], 'default', 'value' => null],
            [['role'], 'default', 'value' => 'user'],
            [['status'], 'default', 'value' => 1],
            [['nombre', 'apellido', 'username', 'email', 'password_hash', 'auth_key'], 'required'],
            [['role'], 'string'],
            [['status'], 'integer'],
            [['nombre', 'apellido'], 'string', 'max' => 100],
            [['username'], 'string', 'max' => 50],
            [['password_hash', 'access_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            ['role', 'in', 'range' => array_keys(self::optsRole())],
            [['username'], 'unique'],
            [['email'], 'unique'],
            ['email', 'email'],

            [['password'], 'string', 'min' => 10],
            [['password'], 'required', 'on' => 'create'],
            [['password'], 'safe'],


        ];
    }




    /**
     * column role ENUM value labels
     * @return string[]
     */
    public static function optsRole()
    {
        return [
            self::ROLE_USER => Yii::t('app', 'user'),
            self::ROLE_ADMIN => Yii::t('app', 'admin'),
        ];
    }

    /**
     * @return string
     */
    public function displayRole()
    {
        return self::optsRole()[$this->role];
    }

    /**
     * @return bool
     */
    public function isRoleUser()
    {
        return $this->role === self::ROLE_USER;
    }

    public function setRoleToUser()
    {
        $this->role = self::ROLE_USER;
    }

    /**
     * @return bool
     */
    public function isRoleAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function setRoleToAdmin()
    {
        $this->role = self::ROLE_ADMIN;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }


    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Busca un usuario por su nombre de usuario
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public function generateAccessToken()
    {
        $this->access_token = Yii::$app->security->generateRandomString();
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }


    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if (isset($this->password)) {
                $this->setPassword($this->password);
            }
            return true;
        }
        return false;
    }

    public function beforeValidate()
    {
        if (parent::beforeValidate()) {
            if ($this->isNewRecord) {
                // auth_key no está seteado, lo genera
                if (empty($this->auth_key)) {
                    $this->generateAuthKey();
                }

                // Si el access_token no está seteado, lo genera
                if (empty($this->access_token)) {
                    $this->generateAccessToken();
                }

                // Si hay contraseña sin hash aún, la genera
                if (!empty($this->password)) {
                    $this->password_hash = Yii::$app->security->generatePasswordHash($this->password);
                }
            }
            return true;
        }

        return false;
    }




}
