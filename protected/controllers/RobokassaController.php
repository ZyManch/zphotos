<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 23.08.14
 * Time: 11:56
 */
class RobokassaController extends Controller {

    public function init() {
        $robokassa = Yii::app()->robokassa;
        if ($robokassa->server != Robokassa::SERVER_OUR) {
            throw new Exception('Сервис временно недоступен');
        }
        parent::init();
    }

    public function actionIndex($MrchLogin,$OutSum, $InvId, $Desc, $SignatureValue, $IncCurrLabel, $Email, $Culture) {
        $this->render('index',array('amount' => $OutSum));
    }

    public function actionSuccess($MrchLogin,$OutSum, $InvId, $Desc, $SignatureValue, $IncCurrLabel, $Email, $Culture) {
        $params = $_GET;
        $params['SignatureValue'] = Yii::app()->robokassa->getResultSignature($OutSum,$InvId);
        $url = 'http://'.Yii::app()->request->serverName.'/creditcard/result?'.http_build_query($params,'','&');
        $result = file_get_contents($url);
        if ($result !="OK".$InvId."\n") {
            //print $result;die();
        }
        $this->redirect(array('payment/success','InvId'=>$InvId));
    }

    public function actionFail($MrchLogin,$OutSum, $InvId, $Desc, $SignatureValue, $IncCurrLabel, $Email, $Culture) {
        $this->redirect(array('payment/failure','InvId'=>$InvId));
    }
}