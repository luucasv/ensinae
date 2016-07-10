<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tb_cidades}}".
 *
 * @property string $id
 * @property string $estado
 * @property string $uf
 * @property string $nome
 */
class Cidade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tb_cidades}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado'], 'integer'],
            [['uf'], 'string', 'max' => 4],
            [['nome'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'estado' => 'Estado',
            'uf' => 'Uf',
            'nome' => 'Nome',
        ];
    }
}
