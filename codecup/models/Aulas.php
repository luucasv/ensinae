<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_aulas}}".
 *
 * @property integer $id
 * @property integer $id_user
 * @property string $titulo
 * @property string $descricao
 * @property string $tags
 * @property integer $disponibilidade
 * @property string $data_cadastro
 */
class Aulas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_aulas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_user', 'titulo', 'tags', 'disponibilidade'], 'required'],
            [['id_user', 'disponibilidade'], 'integer'],
            [['descricao'], 'string'],
            [['data_cadastro', 'tags'], 'safe'],
            [['titulo'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'titulo' => 'Titulo',
            'descricao' => 'Descricao',
            'tags' => 'Tags',
            'disponibilidade' => 'Disponibilidade',
            'data_cadastro' => 'Data Cadastro',
        ];
    }
}
