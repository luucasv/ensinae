<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_msg}}".
 *
 * @property integer $id
 * @property integer $id_send
 * @property integer $id_rec
 * @property string $msg
 * @property string $anexo
 * @property integer $type
 * @property string $data_msg
 */
class Msg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_msg}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_send', 'id_rec', 'type'], 'required'],
            [['id_send', 'id_rec', 'type'], 'integer'],
            [['msg'], 'string'],
            [['data_msg'], 'safe'],
            [['anexo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_send' => 'Id Send',
            'id_rec' => 'Id Rec',
            'msg' => 'Msg',
            'anexo' => 'Anexo',
            'type' => 'Type',
            'data_msg' => 'Data Msg',
        ];
    }
}
