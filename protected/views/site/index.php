<?php
/* @var $this SiteController */
/* @var $model UploadForm */
/* @var $form CActiveForm */
/* @var $good Good */
?>
<div class="col-xs-12">
    <h3>Печать фотографий в <span class="city">Набережных Челнах</span></h3>
</div>
<div class="col-xs-7">

    <p>
        Как правило после выезда на природу, полета на отдых, свадьбы или рождения малыша
        у человека накапливаются фотографии в электронном виде, которые будучи закинутые
        на комьютер лежат там мертвым грузом.
    </p>
    <p>
        Теперь <span class="title"><span>z</span>Photos</span> предлагает вам возможность
        распечатать свои фотографии в <span class="city">Набережных челнах</span>
        по удивительно низкой цене:
    </p>

    <?php $this->renderPartial('//good/_view',array('data' => $good));?>

</div>

<div class="col-xs-5">
    <img src="/images/chelny.jpg" width="333px" height="250">
</div>