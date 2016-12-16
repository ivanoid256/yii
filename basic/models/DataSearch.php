<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Data;
use yii\base\Exception;

/**
 * DataSearch represents the model behind the search form about `app\models\Data`.
 */
class DataSearch extends Data
{
    /**
     * @inheritdoc
     */
	public $year;
	
	public $month;
	
	public $filterDataErr = null;
	
	static public $YEAR_IS_NOT_SELECTED = 'If month was selected, a year should be selected too!';
	
    public function rules()
    {
        return [
            [['id', 'address_id'], 'integer'],
            [['card_number','date', 'year','month', 'service'], 'safe'],
            [['volume'], 'number'],
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

        $query = Data::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        
        if(!$this->year && $this->month){
        	$this->month = null;
        	$this->filterDataErr = DataSearch::$YEAR_IS_NOT_SELECTED;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'YEAR(`date`)' => $this->year,
        	'MONTH(`date`)' => $this->month,
        ]);
        
        //var_dump($this->card_number);

        $query->andFilterWhere(['like', 'card_number', $this->card_number]);
        var_dump($query->sql);

        return $dataProvider;
    }
}
