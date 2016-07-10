<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_agenda}}".
 *
 * @property integer $id
 * @property integer $id_aula
 * @property integer $id_aluno
 * @property integer $id_prof
 * @property string $data
 * @property string $hora
 * @property integer $duracao
 */
class Agenda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_agenda}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_aula', 'id_aluno', 'id_prof', 'data', 'hora', 'duracao'], 'required'],
            [['id_aula', 'id_aluno', 'id_prof', 'duracao'], 'integer'],
            [['data', 'hora'], 'safe'],
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
            'id_prof' => 'Id Prof',
            'data' => 'Data',
            'hora' => 'Hora',
            'duracao' => 'Duracao',
        ];
    }
}
