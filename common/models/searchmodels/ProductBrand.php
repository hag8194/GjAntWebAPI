<?php

namespace common\models\searchmodels;

use common\models\ProductBrand as ProductBrandModel;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductBrand represents the model behind the search form about `common\models\ProductBrand`.
 */
class ProductBrand extends ProductBrandModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'brand_id'], 'integer'],
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
        $query = ProductBrandModel::find();

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
            'product_id' => $this->product_id,
            'brand_id' => $this->brand_id,
        ]);

        return $dataProvider;
    }
}
