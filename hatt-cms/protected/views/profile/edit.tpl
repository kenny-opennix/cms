<div class="form">
    <p class="note">Fields with <span class="required">*</span> are required.</p>
    {$this->form->errorSummary($model)}

    <div class="row">
        {$this->form->labelEx($model,'login')}
        {$this->form->textField($model,'login')}
        {$this->form->error($model,'login')}
    </div>

    <div class="row">
        {$this->form->labelEx($model,'email')}
        {$this->form->textField($model,'email')}
        {$this->form->error($model,'email')}
    </div>

    <div class="row">
        {$this->form->labelEx($model,'pass')}
        {$this->form->textField($model,'pass')}
        {$this->form->error($model,'pass')}
    </div>

    <div class="row">
        {$this->form->labelEx($model,'reg_date')}
        {$this->form->textField($model,'reg_date')}
        {$this->form->error($model,'reg_date')}
    </div>

    <div class="row">
        {$this->form->labelEx($model,'birthday')}
        {$this->form->textField($model,'birthday')}
        {$this->form->error($model,'birthday')}
    </div>

    <div class="row">
        {$this->form->labelEx($model,'level')}
        {$this->form->textField($model,'level')}
        {$this->form->error($model,'level')}
    </div>

    <div class="row">
        {$this->form->labelEx($model,'reg_ip')}
        {$this->form->textField($model,'reg_ip')}
        {$this->form->error($model,'reg_ip')}
    </div>

    <div class="row">
        {$this->form->labelEx($model,'auth_token')}
        {$this->form->textField($model,'auth_token')}
        {$this->form->error($model,'auth_token')}
    </div>

    <div class="row">
        {$this->form->labelEx($model,'avatar')}
        {$this->form->textField($model,'avatar')}
        {$this->form->error($model,'avatar')}
    </div>

    <div class="row">
        {$this->form->labelEx($model,'gender')}
        {$this->form->textField($model,'gender')}
        {$this->form->error($model,'gender')}
    </div>


    <div class="row buttons">
        {CHtml::submitButton('Submit')}
    </div>

</div><!-- form -->