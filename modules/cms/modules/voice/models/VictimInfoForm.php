<?php

namespace app\modules\cms\modules\voice\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class VictimInfoForm extends Model
{
    public $victim_name;
    public $victim_phone_no;
    public $victim_address;
    public $victim_district;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // victim name, email, subject and body are required
            [['victim_name', 'victim_phone_no', 'victim_address', 'victim_district'], 'required'],
          
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            
        ];
    }


    
}
