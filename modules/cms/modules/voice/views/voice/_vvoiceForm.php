<div class="voice-detail-info individual-view">
     <?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'detailForm-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // See class documentation of CActiveForm for details on this,
    // you need to use the performAjaxValidation()-method described there.
    'enableAjaxValidation' => false,
    'action' => Yii::app()->createUrl('/voice/updateVoice/'),
    'method' => 'post',
));
        ?>
  
    <?php    
    echo CHtml::textField($fields['victim name'],'',array('size'=>10,));
    ?>
    
    <div class="form-bottom-edit-buttons">
        <?php echo CHtml::submitButton('Save',array('class'=>'edit-button save-button')); ?>
        <?php echo CHtml::button('Cancel',array('class'=>'edit-button cancel-button voice-form-cancel')); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>