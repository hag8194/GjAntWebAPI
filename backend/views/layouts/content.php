<?php
use yii\widgets\Breadcrumbs;
use dmstr\widgets\Alert;

?>
<div class="content-wrapper">
    <section class="content-header">
        <?php if (isset($this->blocks['content-header'])) { ?>
            <h1><?= $this->blocks['content-header'] ?></h1>
        <?php } else { ?>
            <h1>
                <?php
                if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                } else {
                    echo \yii\helpers\Inflector::camel2words(
                        \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                } ?>
            </h1>
        <?php } ?>

        <?=
        Breadcrumbs::widget(
            [
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]
        ) ?>
    </section>

    <section class="content">
        <?= Alert::widget() ?>
        <?= $content ?>
    </section>
</div>

<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
    reserved.
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <!--<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li class="active"><a href="#control-sidebar-enterprise-tab" data-toggle="tab"><i class="fa fa-building"></i></a></li>
    </ul>-->
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" id="control-sidebar-enterprise-tab">
            <h3 class="control-sidebar-heading"><?= Yii::t('backend', 'Enterprise') ?></h3>
            <ul class='control-sidebar-menu'>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-building-o bg-green"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading"><?= $model_enterprise->name ?></h4>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-sticky-note-o bg-red"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading"><?= $model_enterprise->rif ?></h4>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-phone bg-blue"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading"><?= $model_enterprise->phone?></h4>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-map bg-yellow"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading"><?= $model_enterprise->address ?></h4>
                        </div>
                    </a>
                </li>
                <li>
                    <a href='javascript::;'>
                        <i class="menu-icon fa fa-calendar bg-purple"></i>

                        <div class="menu-info">
                            <h4 class="control-sidebar-subheading"><?= $model_enterprise->founded_date ?></h4>
                        </div>
                    </a>
                </li>
                <li style="padding:15px;">
                   <?= \yii\bootstrap\Html::a('Update Enterprise Info', Yii::$app->urlManager->createUrl('site/enterprise'), ['class' => 'btn btn-primary btn-flat']) ?>
                </li>
            </ul>
            <!-- /.control-sidebar-menu -->
        </div>
        <!-- /.tab-pane -->
    </div>
</aside><!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
     immediately after the control sidebar -->
<div class='control-sidebar-bg'></div>