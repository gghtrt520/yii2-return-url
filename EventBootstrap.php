<?php
/**
 * author     : forecho <caizhenghai@gmail.com>
 * createTime : 2020/2/17 9:12 下午
 * description:
 */

namespace yiier\returnUrl;

use yii\base\BootstrapInterface;
use yii\base\Controller;
use yii\base\Event;

class EventBootstrap implements BootstrapInterface
{
    /**
     * @var array
     */
    public $uniqueIds = ['site/login'];

    public function bootstrap($app)
    {
        $controllerEvents = [
            Controller::EVENT_BEFORE_ACTION,
        ];

        foreach ($controllerEvents as $eventName) {
            Event::on(Controller::class, $eventName, function ($event) {
                /** @var Controller $controller */
                $controller = $event->sender;
                $controller->attachBehavior('return-url', [
                    'class' => ReturnUrl::class,
                    'uniqueIds' => $this->uniqueIds
                ]);
            });
        }
    }
}
