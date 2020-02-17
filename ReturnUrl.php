<?php

/**
 * author     : forecho <caizhenghai@gmail.com>
 * createTime : 2016/3/16 10:14
 * description:
 */

namespace yiier\returnUrl;

use Yii;
use yii\base\Behavior;
use yii\web\Controller;

class ReturnUrl extends Behavior
{
    /**
     * @var array
     */
    public $uniqueIds = ['site/login'];

    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction',
        ];
    }

    /**
     * @return bool
     * @throws \yii\base\InvalidConfigException
     */
    public function beforeAction()
    {
        if (Yii::$app->user->isGuest) {
            if (!(Yii::$app->request->getIsAjax() || $this->isValidate())) {
                Yii::$app->user->setReturnUrl(Yii::$app->request->getUrl());
            }
        }
        return true;
    }

    /**
     * @return bool
     */
    private function isValidate()
    {
        if (in_array(Yii::$app->controller->action->uniqueId, $this->uniqueIds)) {
            return true;
        }
        return false;
    }
}