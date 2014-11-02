<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 02.08.14
 * Time: 15:43
 */
class GoodCutaway extends GoodModel {

    function getDefaultMediaTitle() {
        return 'Макет печати';
    }


    function getBuyButton(Controller $controller) {
        $links = array();
        if (Yii::app()->user->getHasAccount()) {
            foreach (Yii::app()->user->getUser()->cutaways as $cutaway) {
                if ($cutaway->cutaway_template_id == $this->source_id) {
                    $links[] = CHtml::link(
                        'Востановить #' . $cutaway->id,
                        array('cutaway/update', 'id' => $cutaway->id),
                        array('class' => 'btn btn-default')
                    );
                }
            }
        }

        $links[] = CHtml::link(
            'Создать новую визитку',
            array('cutaway/add','id' => $this->id),
            array('class' => 'btn btn-primary')
        );
        return implode("\n",$links);
    }

    function createCartHasGood($scenario = null) {
        return new CartHasGoodCutaway($scenario);
    }
}