<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 21/12/2016
 * Time: 12:43 PM
 */

namespace backend\models;


use common\models\Employer;
use common\models\searchmodels\EmployerSearch;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;

class EmployerListViewSearch extends EmployerSearch
{
    public $query;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['query'], 'safe']
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
        $query = Employer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 3,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'name', $this->query])
            ->orFilterWhere(['like', 'lastname', $this->query])
            ->orFilterWhere(['like', 'identification', $this->query]);

        return $dataProvider;
    }
}