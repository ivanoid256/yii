<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yii_experiment.data".
 *
 * @property integer $id
 * @property string $card_number
 * @property string $date
 * @property double $volume
 * @property string $service
 * @property integer $address_id
 */
class Data extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_experiment.data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'volume', 'service'], 'required'],
            [['date'], 'safe'],
            [['volume'], 'number'],
            [['address_id'], 'integer'],
            [['card_number'], 'string', 'max' => 20],
            [['service'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'card_number' => 'Card Number',
            'date' => 'Date',
            'volume' => 'Volume',
            'service' => 'Service',
            'address_id' => 'Address ID',
        ];
    }
}
