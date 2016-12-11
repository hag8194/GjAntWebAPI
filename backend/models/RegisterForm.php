<?php
namespace backend\models;

use backend\utils\ImageHandler;
use Yii;
use yii\base\Model;
use common\models\User;
use yii\web\UploadedFile;

/**
 * Signup form
 */
class RegisterForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $avatar;

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

            ['avatar', 'image', 'extensions' => 'png, jpg', 'maxFiles' => 1],

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
            'avatar' => Yii::t('backend', 'Avatar'),
            'role' => Yii::t('backend', 'Rol')
        ];
    }

    /**
     * Register user.
     *
     * @return int | null
     */
    public function toRegister()
    {
        if (!$this->validate()) {
            return false;
        }
        
        $user = new User();

        //if(!$path = $this->uploadAvatar())$path = '';

        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->avatar = $this->uploadAvatar();
        $user->status = 0;

        return $user->save() ? Yii::$app->db->lastInsertID : null;
    }
    /*
     * Upload the user avatar
     *
     * @return String | null
     */
    private function uploadAvatar()
    {
        if($this->avatar = UploadedFile::getInstance($this, 'avatar'))
        {
            $path = 'img/' . ImageHandler::generateFileName() . '.' . $this->avatar->extension;

            if($this->avatar->saveAs($path)){
                ImageHandler::resizeImage($path);
                return $path;
            }

            return null;
        }
        return null;
    }

}
