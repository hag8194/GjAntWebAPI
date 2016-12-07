<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;

    public $role;

    public static $ROLE_DATA  = ['Vendedor', 'Cliente'];

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('backend', 'This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => Yii::t('backend','This email address has already been taken.')],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['role', 'required']
        ];
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'username' => Yii::t('backend', 'Username'),
            'email' => Yii::t('backend', 'Email'),
            'password' => Yii::t('backend', 'Password'),
            'role' => Yii::t('backend', 'Rol')
        ];
    }

    /**
     * Register user.
     *
     * @return True|False
     */
    public function toRegister()
    {
        if (!$this->validate()) {
            return false;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save();
    }
}
