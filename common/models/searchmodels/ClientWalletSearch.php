<?php

namespace common\models\searchmodels;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ClientWallet;

/**
 * ClientWalletSearch represents the model behind the search form about `common\models\ClientWallet`.
 */
class ClientWalletSearch extends ClientWallet
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'employer_id', 'client_id'], 'integer'],
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
        $query = ClientWallet::find();

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
            'employer_id' => $this->employer_id,
            'client_id' => $this->client_id,
        ]);

        return $dataProvider;
    }
}
