<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_historico}}".
 *
 * @property integer $id
 * @property integer $id_user
 * @property integer $qnt_coins
 * @property integer $type
 * @property string $data_cadastro
 */
class Historico extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_historico}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'qnt_coins', 'type'], 'required'],
            [['id_user', 'qnt_coins', 'type'], 'integer'],
            [['data_cadastro'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Usuário',
            'qnt_coins' => 'Quantidade de Moedas',
            'type' => 'Tipo de transação',
            'data_cadastro' => 'Data da transação',
        ];
    }
}
