<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_avaliacoes}}".
 *
 * @property integer $id
 * @property integer $id_aula
 * @property integer $id_aluno
 * @property integer $nota
 * @property string $data_cadastro
 */
class Avaliacoes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_avaliacoes}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_aula', 'id_aluno', 'nota'], 'required'],
            [['id_aula', 'id_aluno', 'nota'], 'integer'],
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
            'id_aula' => 'Id Aula',
            'id_aluno' => 'Id Aluno',
            'nota' => 'Nota',
            'data_cadastro' => 'Data Cadastro',
        ];
    }
}
