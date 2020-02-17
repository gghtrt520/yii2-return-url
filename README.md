Yii2 Login ReturnUrl filter
===========================
[![Latest Stable Version](https://poser.pugx.org/yiier/yii2-return-url/v/stable)](https://packagist.org/packages/yiier/yii2-return-url) 
[![Total Downloads](https://poser.pugx.org/yiier/yii2-return-url/downloads)](https://packagist.org/packages/yiier/yii2-return-url) 
[![Latest Unstable Version](https://poser.pugx.org/yiier/yii2-return-url/v/unstable)](https://packagist.org/packages/yiier/yii2-return-url) 
[![License](https://poser.pugx.org/yiier/yii2-return-url/license)](https://packagist.org/packages/yiier/yii2-return-url)

Keeps current URL in session for login actions so we can return to it if needed.

中文说明：登录之后自动跳转登录之前的页面

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist yiier/yii2-return-url "*"
```

or add

```
"yiier/yii2-return-url": "*"
```

to the require section of your `composer.json` file.


Usage
-----

## Method One (方式一，推荐)

you need to include it in config in bootstrap section:

```php
return [
    'bootstrap' => [
        'yiier\returnUrl\EventBootstrap',
    ],
];
```


## Method Two (方式二)
 
In your controller add ReturnUrl filter to behaviors:

```php
public function behaviors()
{
    return [
        'returnUrl' => [
            'class' => 'yiier\returnUrl\ReturnUrl',
            'uniqueIds' => ['site/qrcode', 'site/login', 'user/security/auth'] // 过滤掉不需要的 controller/action
        ],
    ];
}
```

For access to previously visited url:

```php
Yii::$app->user->getReturnUrl();
```
