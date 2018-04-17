<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 21/12/2016
 * Time: 11:42 PM
 */

namespace backend\models;


use common\models\Client;
use common\models\searchmodels\ClientSearch;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

class ClientListViewSearch extends ClientSearch
{
    public $query;
    public $zone_name;
    public $employer_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['query'], 'safe'],
            ['zone_name', 'string'],
            ['employer_id', 'integer']
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
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'query' => Yii::t('backend', 'Search')
        ];
    }

    /**
     * @inheritdoc
     */
    public function search($params)
    {
        $query = Client::find()
            ->joinWith(['address', 'clientWallet'])
            ->where('assigned = :assigned OR client_wallet.employer_id = :employer_id',
                [':assigned' => 0, ':employer_id' => $this->employer_id])
            ->andwhere(['like', 'address.name', $this->zone_name]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => false,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'fullname', $this->query])
              ->orFilterWhere(['like', 'identification', $this->query]);

        return $dataProvider;
    }
}