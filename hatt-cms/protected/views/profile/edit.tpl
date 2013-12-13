{$this->widget('CActiveForm', [
'id'=>'profile-edit-form',
'enableClientValidation'=>true,
'clientOptions'=>[
'validateOnSubmit'=>true
]
],true)}
{*

<div class="form">
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    {$form->errorSummary($model)}

    <div class="row">
        {$form->labelEx($model,'login')}
        {$form->textField($model,'login')}
        {$form->error($model,'login')}
    </div>

    <div class="row">
        {$form->labelEx($model,'email')}
        {$form->textField($model,'email')}
        {$form->error($model,'email')}
    </div>

    <div class="row">
        {$form->labelEx($model,'pass')}
        {$form->textField($model,'pass')}
        {$form->error($model,'pass')}
    </div>

    <div class="row">
        {$form->labelEx($model,'reg_date')}
        {$form->textField($model,'reg_date')}
        {$form->error($model,'reg_date')}
    </div>

    <div class="row">
        {$form->labelEx($model,'birthday')}
        {$form->textField($model,'birthday')}
        {$form->error($model,'birthday')}
    </div>

    <div class="row">
        {$form->labelEx($model,'level')}
        {$form->textField($model,'level')}
        {$form->error($model,'level')}
    </div>

    <div class="row">
        {$form->labelEx($model,'reg_ip')}
        {$form->textField($model,'reg_ip')}
        {$form->error($model,'reg_ip')}
    </div>

    <div class="row">
        {$form->labelEx($model,'auth_token')}
        {$form->textField($model,'auth_token')}
        {$form->error($model,'auth_token')}
    </div>

    <div class="row">
        {$form->labelEx($model,'avatar')}
        {$form->textField($model,'avatar')}
        {$form->error($model,'avatar')}
    </div>

    <div class="row">
        {$form->labelEx($model,'gender')}
        {$form->textField($model,'gender')}
        {$form->error($model,'gender')}
    </div>


    <div class="row buttons">
        {CHtml::submitButton('Submit')}
    </div>

</div><!-- form -->
*}
