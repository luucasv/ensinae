<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;
use yii\helpers\FileHelper;
use app\models\Cidade;
use app\models\Estado;
use yii\helpers\Json;
use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;
/**
 * This is the model class for table "{{%tbl_user}}".
 *
 * @property integer $id
 * @property string $nome
 * @property string $email
 * @property string $senha
 * @property integer $cidade
 * @property integer $estado
 * @property string $universidade
 * @property string $foto
 * @property string $data_cadastro
 */
class User extends ActiveRecord implements IdentityInterface
{
    public $imageUpload;
    public $cropInfo;
    public $confirm_pass;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nome', 'email', 'senha', 'cidade', 'estado', 'universidade'], 'required'],
            [['cidade', 'estado', 'coins'], 'integer'],
            [['data_cadastro', 'confirm_pass', 'cropInfo'], 'safe'],
            [['nome', 'email', 'universidade'], 'string', 'max' => 100],
            [['email'], 'email'],
            [['email'], 'unique', 'message' => 'Esse e-mail já está cadastrado no sistema.'],
            [['senha'], 'string', 'max' => 20],
            [['imageUpload'], 'image', 'skipOnEmpty' => true, 'extensions' => ['jpg', 'jpeg', 'png'], 'mimeTypes' => ['image/jpeg', 'image/pjpeg', 'image/png']],
            [['confirm_pass'], 'compare', 'compareAttribute' => 'senha', 'message' => 'As senhas digitadas devem ser iguais']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'Email',
            'senha' => 'Senha',
            'cidade' => 'Cidade',
            'estado' => 'Estado',
            'universidade' => 'Universidade',
            'foto' => 'Foto',
            'data_cadastro' => 'Data Cadastro',
            'confirm_pass' => 'Confirmar senha',
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string      $username
     * @return static|null
     */
    public static function findByUsername($mail)
    {
        return self::findOne(["email"=>$mail]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return null;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return null;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->senha === $password;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRCidade()
    {
        return $this->hasOne(Cidade::className(), ['id' => 'cidade']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getREstado()
    {
        return $this->hasOne(Estado::className(), ['id' => 'estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRAulas()
    {
        return $this->hasMany(Aulas::className(), ['id_user' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRAgenda()
    {
        return $this->hasMany(Agenda::className(), ['id_prof' => 'id']);
    }

    public function upload()
    {
        $nome = strtolower(str_replace(" ", "_", $this->nome.date('dmYHis', strtotime($this->data_cadastro))));

        if($this->imageUpload != null) {

            $image = Image::getImagine()->open($this->imageUpload->tempName);

            $cropInfo = Json::decode($this->cropInfo)[0];

            $cropInfo['dWidth'] = (int) $cropInfo['dWidth'];
            $cropInfo['dHeight'] = (int) $cropInfo['dHeight'];
            $cropInfo['x'] = abs($cropInfo['x']);
            $cropInfo['y'] = abs($cropInfo['y']);
            $cropInfo['width'] = (int) $cropInfo['width'];
            $cropInfo['height'] = (int) $cropInfo['height'];

            $oldImages = FileHelper::findFiles(Yii::getAlias('@uploadImgPath'),
                [
                    'only' => [
                        $nome . '.*',
                        '/thumbs/thumb_' . $nome . '.*'
                    ]
                ]
            );

            for ($counter = 0; $counter != count($oldImages); $counter++) {
                @unlink($oldImages[$counter]);
            }

            $newSize = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
            $newSizeThumb = new Box(50, 50);
            $cropSize = new Box($cropInfo['width'], $cropInfo['height']);
            $cropPoint = new Point($cropInfo['x'], $cropInfo['y']);

            $imageName = $nome . '.' . $this->imageUpload->getExtension();

            $pathThumbImage = Yii::getAlias('@uploadImgThumbsPath') . '/thumb_' . $imageName;
            $pathImage = Yii::getAlias('@uploadImgPath') . '/' . $imageName;

            $this->foto = $imageName;

            $image->resize($newSize)->crop($cropPoint, $cropSize)->save($pathImage, ['quality' => 100]);
            $image->resize($newSizeThumb)->save($pathThumbImage, ['quality' => 100]);

            return true;
        }
    }
}
