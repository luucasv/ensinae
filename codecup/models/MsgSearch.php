<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Msg;

/**
 * MsgSearch represents the model behind the search form about `app\models\Msg`.
 */
class MsgSearch extends Msg
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_send', 'id_rec', 'type'], 'integer'],
            [['msg', 'anexo', 'data_msg'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Msg::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_send' => $this->id_send,
            'id_rec' => $this->id_rec,
            'type' => $this->type,
            'data_msg' => $this->data_msg,
        ]);

        $query->andFilterWhere(['like', 'msg', $this->msg])
            ->andFilterWhere(['like', 'anexo', $this->anexo]);

        return $dataProvider;
    }
}
