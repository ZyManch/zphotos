<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:27
 */
class CutawayCommand extends CConsoleCommand {

    public function actionUpdateImages() {
        /** @var CutawayTemplate[] $cutaways */
        $cutaways = CutawayTemplate::model()->findAll();
        foreach ($cutaways as $cutaway) {
            print 'Updating #'.$cutaway->id."\n";
            $gd = $cutaway->getGd(128, true);
            $gdPreview = $cutaway->getGd(800, true);
            $this->_normalizeGood($cutaway, $gd);
            $this->_saveGd($gd,$cutaway->good->goodMedia->filename);
            $this->_saveGd($gdPreview,$cutaway->good->goodMedia->preview_filename);

        }


    }

    protected function _normalizeGood(CutawayTemplate $cutawayTemplate, $gd) {
        $good = $cutawayTemplate->good;
        if (!$good) {
            throw new Exception('Not found good for #'.$cutawayTemplate->id.' cutaway template');
        }
        if ($good->good_media_id) {
            $goodMedia = $good->goodMedia;
        } else {
            $goodMedia = new GoodMedia();
            $goodMedia->good_id = $good->id;
            $goodMedia->filename = 'cutaway'.$cutawayTemplate->id.'.png';
            $goodMedia->preview_filename = 'cutaway'.$cutawayTemplate->id.'_preview.png';
            $good->goodMedia = $goodMedia;
        }
        $goodMedia->width = imagesx($gd);
        $goodMedia->height = imagesy($gd);
        if (!$goodMedia->save()) {
            throw new Exception('Error save good media: '.$good->getErrorsAsText());
        }
    }

    protected function _saveGd($gd, $filePath) {
        switch (strtolower(substr($filePath,-4))) {
            case '.jpg':case 'jpeg':
                imagejpeg($gd, Cutaway::getFileDir().$filePath);
                break;
            case '.png':
                imagepng($gd, Cutaway::getFileDir().$filePath);
                break;
            default:
                throw new Exception('Undefined extension: '.$filePath);
        }
    }


}