<?php

namespace app\models;

use yii\db\ActiveRecord;

class Log extends ActiveRecord
{
    public function rules()
    {
        return [
            ['id', 'integer'],
            ['created_at', 'required'],
            ['message', 'safe'],
        ];
    }
}
