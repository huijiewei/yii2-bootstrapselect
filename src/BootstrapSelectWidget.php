<?php
/**
 * Created by PhpStorm.
 * User: Huijiewei
 * Date: 2017/10/12
 * Time: 下午4:58
 */

namespace huijiewei\bootstrapselect;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\web\AssetBundle;
use yii\widgets\InputWidget;

class BootstrapSelectWidget extends InputWidget
{
    public $items = [];

    public $clientOptions = [];

    /* @var $_assetBundle AssetBundle */
    private $_assetBundle;

    public function init()
    {
        parent::init();

        $this->options = ArrayHelper::merge([
            'class' => 'form-control selectpicker',
        ], $this->options);

        $this->clientOptions = ArrayHelper::merge([
            'language' => 'zh_CN',
        ], $this->clientOptions);

        $this->registerAssetBundle();
        $this->registerLanguage();

        $this->registerScript();
    }

    public function run()
    {
        parent::run();

        if($this->hasModel()) {
            return Html::activeDropDownList($this->model, $this->attribute, $this->items, $this->options);
        } else {
            return Html::dropDownList($this->name, $this->value, $this->items, $this->options);
        }
    }

    public function registerLanguage()
    {
        if (!isset($this->clientOptions['language']) || empty($this->clientOptions['language'])) {
            return;
        }

        $langAsset = 'js/i18n/defaults-' . $this->clientOptions['language'] . '.js';

        if (file_exists(\Yii::getAlias($this->_assetBundle->sourcePath . DIRECTORY_SEPARATOR . $langAsset))) {
            $this->_assetBundle->js[] = $langAsset;
        }
    }

    public function registerScript()
    {
        $clientOptions = Json::encode($this->clientOptions);

        $js = <<<EOD
        $('#{$this->id}').selectpicker({$clientOptions});
EOD;

        $this->getView()->registerJs($js);
    }

    public function registerAssetBundle()
    {
        $this->_assetBundle = BootstrapSelectAsset::register($this->getView());
    }

    public function getAssetBundle()
    {
        if (!($this->_assetBundle instanceof AssetBundle)) {
            $this->registerAssetBundle();
        }

        return $this->_assetBundle;
    }
}
