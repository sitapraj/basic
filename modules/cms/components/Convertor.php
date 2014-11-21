<?php

namespace app\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class Convertor extends Component {

    public function serilized($model) {
        $data = array();
        foreach ($model->attributeNames() as $attribute){
            $data[$attribute] = $model->$attribute;
        }
        
    }

}
