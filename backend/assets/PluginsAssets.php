<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 10/04/2016
 * Time: 7:28 AM
 */

namespace backend\assets;

use yii\web\AssetBundle;

class PluginsAssets extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/plugins';

    public $css = [
        'iCheck/all.css'
    ];
    public $js = [
        'iCheck/icheck.min.js'
    ];
}