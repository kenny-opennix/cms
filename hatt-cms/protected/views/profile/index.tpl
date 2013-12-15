<div class="profile-view">
    <div class="row">
        <div class="span12">
            <div class="fieldset">
                Профиль пользователя {$user_info.login}
            </div>
        </div>
    </div>

    <!-- id -->
    <div class="row">
        <div class="span2"></div>
        <div class="span6 m10 br4">
            <div class="row">
                <div class="span3">Ваш ID в системе:</div>
                <div class="span3">{$user_info.id}</div>
            </div>
        </div>
        <div class="span4"></div>
    </div>
    <!-- id/END -->

    <!-- email -->
    <div class="row">
        <div class="span2"></div>
        <div class="span6 m10 br4">
            <div class="row">
                <div class="span3">
                    Email:
                </div>
                <div class="span3">
                    {$user_info.email}
                </div>
            </div>
        </div>
        <div class="span4"></div>
    </div>
    <!-- email/END -->

    <!-- reg_date -->
    <div class="row">
        <div class="span2"></div>
        <div class="span6 m10 br4">
            <div class="row">
                <div class="span3">
                    Дата регистрации:
                </div>
                <div class="span3">
                    {$user_info.reg_date}
                </div>
            </div>
        </div>
        <div class="span4"></div>
    </div>
    <!-- reg_date/END -->

    <!-- avatar -->
    <div class="row">
        <div class="span2"></div>
        <div class="span6 m10 br4">
            <div class="row">
                <div class="span3">
                    Аватар:
                </div>
                <div class="span3">
                    {*{$user_info.avatar}*}
                    <img src="http://dummyimage.com/100/000/fff&text=%D0%90%D0%B2%D0%B0%D1%82%D0%B0%D1%80%D0%BA%D0%B0"/>
                </div>
            </div>
        </div>
        <div class="span4"></div>
    </div>
    <!-- avatar/END -->

    <!-- gender -->
    <div class="row">
        <div class="span2"></div>
        <div class="span6 m10 br4">
            <div class="row">
                <div class="span3">
                    Пол:
                </div>
                <div class="span3">
                    {if $user_info.gender == 0}
                        Не указано
                    {elseif $user_info.gender == 1}
                        Мужской
                    {else}
                        Женский
                    {/if}
                </div>
            </div>
        </div>
        <div class="span4"></div>
    </div>
    <!-- gender/END -->
</div>