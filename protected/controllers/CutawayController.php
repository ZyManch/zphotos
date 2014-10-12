<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 13:28
 */
class CutawayController extends Controller {

    protected static $_cache = array();


    public function actionIndex() {
        $model = new GoodCutaway('search');
        $model->type = 'cutaway';
        $this->render('index',array('model' => $model));
    }



    public function actionAdd($id) {
        /** @var GoodCutaway $good */
        $good = GoodCutaway::model()->findByPk($id);
        if (!$good) {
            throw new Exception('Корзина не найдена');
        }
        $template = $good->cutawayTemplate;

        $cutaway = $template->createCutaway($good);
        $this->redirect(array('cutaway/update','id'=>$cutaway->id));
    }

    public function actionUpdate($id, $side = 0) {
        $model = self::loadModel($id);
        if ($side > 0 && !$model->cutawayTemplate->second_filename) {
            throw new Exception('Визитка не имеет вторую сторону');
        }
        $this->render('update',array('model' => $model,'side' => $side));
    }

    public function actionPreview($id, $side = 0, $with_text = false) {
        $model = self::loadModel($id);
        $gd = $model->getPreviewGd($side?1:0,600, $with_text);
        header("Content-type: image/png");
        imagepng($gd);
    }

    public function actionPreviewText($cutaway_width, $id, $attr = null, $value = null) {
        /** @var CutawayText $model */
        if ($attr) {
            $this->actionChangeFields($id, array($attr => $value));
        }
        $model = self::loadTextModel($id);
        $gd = $model->getGd($cutaway_width);
        header("Content-type: image/png");
        imagepng($gd);
    }

    public function actionAddText($id, $side) {
        $model = self::loadModel($id);
        $cutawayText = new CutawayText();
        $cutawayText->cutaway_id = $model->id;
        $cutawayText->label = 'Текст';
        $cutawayText->side = $side;
        $lastCutawayText = null;
        foreach ($model->cutawayTexts as $previousCutawayText) {
            if ($previousCutawayText->side == $side) {
                $lastCutawayText = $previousCutawayText;
            }
        }
        if (!$lastCutawayText) {
            foreach ($model->cutawayTemplate->cutawayTemplateTexts as $templateText) {
                $lastCutawayText = $templateText;
                $cutawayText->cutaway_template_text_id = $templateText->id;
            }
        }
        if (!$lastCutawayText) {
            $lastCutawayText = new CutawayTemplateText();
            $lastCutawayText->attributes = CutawayTemplateText::getDefaultValues();
        }
        foreach (CutawayTemplateText::getFieldsForCopy() as $field) {
            $cutawayText->$field = $lastCutawayText->$field;
        }

        $cutawayText->y += $lastCutawayText->fontsize;
        if ($cutawayText->y + $cutawayText->fontsize > $model->cutawayTemplate->height) {
            $cutawayText->y = $model->cutawayTemplate->height - $cutawayText->fontsize;
        }
        if (!$cutawayText->save()) {
            throw new Exception($cutawayText->getErrorsAsText());
        }
        $this->redirect(array('cutaway/update','id' => $id,'side' => $side));
    }

    public function actionDeleteText($id) {
        $model = self::loadTextModel($id);
        $side = $model->side;
        $cutawayId = $model->cutaway_id;
        if (!$model->delete()) {
            throw new Exception('Error delete text #'.$id);
        }
        $this->redirect(array('cutaway/update','id' => $cutawayId,'side' => $side));
    }

    public function actionSaveAsTemplate($id, $side = 0) {
        $model = self::loadModel($id);
        $templates = $model->cutawayTemplate->cutawayTemplateTexts;
        foreach ($model->cutawayTexts as $text) {
            if ($text->cutaway_template_text_id) {
                $template = $templates[$text->cutaway_template_text_id];
                unset($templates[$text->cutaway_template_text_id]);
            } else {
                $template = new CutawayTemplateText();
                $template->cutaway_template_id = $model->cutaway_template_id;
            }
            foreach (CutawayTemplateText::getFieldsForCopy() as $field) {
                $template->$field = $text->$field;
            }
            if (!$template->save()) {
                throw new Exception('Error save template:'.$template->getErrorsAsText());
            }
            if (!$text->cutaway_template_text_id) {
                $text->cutaway_template_text_id = $template->id;
                if (!$text->save()) {
                    throw new Exception('Error save text:'.$text->getErrorsAsText());
                }
            }
        }
        foreach ($templates as $template) {
            $template->delete();
        }
        $this->redirect(array('cutaway/update','id' => $model->id,'side' => $side));
    }

    public function actionChangeFields($id, $attrs = array()) {
        $model = self::loadTextModel($id);
        if (!$attrs) {
            $attrs = Yii::app()->request->getParam('attrs',array());
        }
        foreach ($attrs as $attr => $value) {
            if (!in_array($attr,array('x','y','fontsize','color','font_id','label'),true)) {
                throw new Exception('Неизвестный аттрибут '.$attr);
            }
            if ($attr == 'color') {
                $value = ltrim($value,'#');
            }
            $model->$attr = $value;
        }
        if (!$model->save()) {
            throw new Exception($model->getErrorsAsText());
        }
    }

    /**
     * @param $cutawayTextId
     * @return CutawayText
     * @throws Exception
     */
    public static function loadTextModel($cutawayTextId) {
        if (isset(self::$_cache[$cutawayTextId])) {
            return self::$_cache[$cutawayTextId];
        }
        /** @var CutawayText $model */
        $model = CutawayText::model()->findByPk($cutawayTextId);
        if (!$model) {
            throw new Exception('Текст не найден');
        }
        if ($model->cutaway->user_id != Yii::app()->user->id) {
            throw new Exception('Текст вам не принадлежит');
        }
        self::$_cache[$cutawayTextId] = $model;
        return self::$_cache[$cutawayTextId];
    }

    /**
     * @param $albumId
     * @throws Exception
     */
    public static function loadModel($cutawayId) {
        /** @var Cutaway $cutaway */
        $cutaway = Cutaway::model()->findByPk($cutawayId);
        if (!$cutaway) {
            throw new Exception('Визитка не найдена');
        }
        if ($cutaway->user_id != Yii::app()->user->id) {
            throw new Exception('Доступ запрещен');
        }
        return $cutaway;
    }
}