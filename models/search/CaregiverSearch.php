<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Caregiver;

/**
 * CaregiverSearch represents the model behind the search form of `app\models\Caregiver`.
 */
class CaregiverSearch extends Caregiver
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'caregiver', 'postcode'], 'integer'],
            [['name', 'city', 'street', 'house_number', 'email', 'phone', 'phone_home'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Caregiver::find();

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
            'caregiver' => $this->caregiver,
            'postcode' => $this->postcode,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'street', $this->street])
            ->andFilterWhere(['like', 'house_number', $this->house_number])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'phone_home', $this->phone_home]);

        return $dataProvider;
    }
}
