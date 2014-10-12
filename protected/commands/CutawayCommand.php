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
        print 'Started';
        foreach ($cutaways as $index => $cutaway) {
            $gd = $cutaway->getGd(128, true);
            $gdPreview = $cutaway->getGd(350, true);
            $this->_normalizeGood($cutaway, $gd);
            $this->_saveGd($gd,$cutaway->good->goodMedia->filename);
            $this->_saveGd($gdPreview,$cutaway->good->goodMedia->preview_filename);
            print "\r".'Done '.round(100*($index+1) / sizeof($cutaways)).'%';
        }
        print "\n".'Finished';

    }

    protected function _normalizeGood(CutawayTemplate $cutawayTemplate, $gd) {
        $good = $cutawayTemplate->good;
        if (!$good) {
            throw new Exception('Not found good for #'.$cutawayTemplate->id.' cutaway template');
        }
        if ($good->good_media_id) {
            $goodMedia = $good->goodMedia;
            if ($goodMedia->filename == $goodMedia->preview_filename) {
                $goodMedia->preview_filename = 'cutaway'.$cutawayTemplate->id.'_preview.png';
            }
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
                imagejpeg($gd, HOME.'public'.GoodMedia::FILE_PATH.$filePath);
                break;
            case '.png':
                imagepng($gd, HOME.'public'.GoodMedia::FILE_PATH.$filePath);
                break;
            default:
                throw new Exception('Undefined extension: '.$filePath);
        }
    }


}