<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tb_estados}}".
 *
 * @property string $id
 * @property string $uf
 * @property string $nome
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tb_estados}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['uf'], 'string', 'max' => 10],
            [['nome'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'uf' => 'Uf',
            'nome' => 'Nome',
        ];
    }
}
