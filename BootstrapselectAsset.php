<?php

/**
 * User: Huijiewei
 * Date: 2015-03-31
 * Time: 15:11.
 */

namespace huijiewei\bootstrapselect;

use yii\web\AssetBundle;

class BootstrapselectAsset extends AssetBundle
{
    public $sourcePath = '@huijiewei/bootstrapselect/assets';

    public $js = [
        'js/bootstrap-select.js',
    ];

    public $css = [
        'css/bootstrap-select.min.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
