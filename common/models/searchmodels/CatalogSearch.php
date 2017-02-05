<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 05/02/2017
 * Time: 11:07 AM
 */

namespace common\models\searchmodels;

use common\models\Product;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class CatalogSearch extends Product
{
    public $query;
    public $min;
    public $max;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['query'], 'safe'],
            [['quantity'], 'integer'],
            [['code', 'name'], 'string'],
            [['price', 'min', 'max'], 'number'],

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
        return ArrayHelper::merge(parent::attributeLabels(),[
            'query' => Yii::t('backend', 'Search'),
            'min' => Yii::t('backend', 'Min Price'),
            'max' => Yii::t('backend', 'Max Price')

        ]);
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
        $query = Product::find()
                    ->joinWith(['brand','tags']);

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

        $query->andFilterWhere([
            'product.code' => $this->code,
            'product.quantity' => $this->quantity,
            'product.price' => $this->price,
        ]);

        $query->orFilterWhere(['between', 'product.price', $this->min, $this->max])
            ->orFilterWhere(['like', 'product.name', $this->query])
            ->orFilterWhere(['like', 'product.description', $this->query])
            ->orFilterWhere(['like', 'brand.name', $this->query])
            ->orFilterWhere(['like', 'tag.name', $this->query]);

        return $dataProvider;
    }
}