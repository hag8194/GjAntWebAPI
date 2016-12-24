<?php
namespace common\models;

use backend\utils\ImageHandlerTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property string $avatar
 * @property string $access_token
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 *
 * @property Client $client
 * @property Employer $employer
 * @property Product[] $products
 */

class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 10;

    const SCENARIO_UPDATE = 'update';

    public $password;
    public $repeat_password;
    public $_avatar;

    public $role;
    public static $ROLE_DATA  = ['Vendedor', 'Cliente'];

    use ImageHandlerTrait;

    /** Trait Implementation **/
    protected  function getIModel()
    {
        return $this;
    }

    protected  function getIAttributeName()
    {
        return '_avatar';
    }

    protected function getIAttribute()
    {
        return $this->_avatar;
    }

    protected  function setIAttribute($attribute)
    {
        $this->_avatar = $attribute;
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    public function scenarios()
    {
        return [
            self::SCENARIO_DEFAULT =>[
                'username',
                'email',
                'password',
                'repeat_password',
                '_avatar',
                'avatar',
                'role'
            ],
            self::SCENARIO_UPDATE => [
                'username',
                'email',
                'password',
                'repeat_password',
                '_avatar',
                'avatar'
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->access_token = $this->getUniqueAccessToken();
            $this->generateAuthKey();
            $this->setPassword($this->password);
        }

        if($this->scenario == self::SCENARIO_UPDATE && $this->password){
            $this->setPassword($this->password);
        }

        if($path = $this->upload())
            $this->avatar = $path;

        return parent::beforeSave($insert);

    }

    public function beforeDelete()
    {
        Yii::$app->authManager->revokeAll($this->id);
        return parent::beforeDelete();
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'message' => Yii::t('backend', 'This username has already been taken.')],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'message' => Yii::t('backend','This email address has already been taken.')],
            ['email', 'string', 'max' => 255],

            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],

            [['password_hash', 'password_reset_token'], 'string', 'max' => 255],

            [['avatar', 'access_token'], 'string', 'max' => 45],

            ['password', 'required', 'on' => [self::SCENARIO_DEFAULT]],
            ['password', 'compare', 'compareAttribute' => 'repeat_password', 'on' => [self::SCENARIO_UPDATE]],
            ['password', 'string', 'min' => 6],

            ['repeat_password', 'required', 'on' => [self::SCENARIO_DEFAULT]],
            ['repeat_password', 'compare', 'compareAttribute' => 'password'],

            ['_avatar', 'image', 'extensions' => 'png, jpg', 'maxFiles' => 1],

            ['role', 'required', 'on' => [self::SCENARIO_DEFAULT]]

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
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    private function getUniqueAccessToken() {
        $result = md5(Yii::$app->security->generateRandomString() . '_' . time());
        $identity = $this->findIdentityByAccessToken($result);
        if ($identity) {
            $result = $this->getUniqueAccessToken();
        }
        return $result;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmployer()
    {
        return $this->hasOne(Employer::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['updated_by' => 'id']);
    }
}
