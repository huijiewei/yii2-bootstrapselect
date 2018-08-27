<?php

/**
 * User: Huijiewei
 * Date: 2015-03-31
 * Time: 15:11.
 */

namespace huijiewei\bootstrapselect;

use yii\web\AssetBundle;

class BootstrapSelectAsset extends AssetBundle
{
    public $sourcePath = '@npm/bootstrap-select/dist';

    public $js = [
        'js/bootstrap-select.min.js',
    ];

    public $css = [
        'css/bootstrap-select.min.css',
    ];

    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
