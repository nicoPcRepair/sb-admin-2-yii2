<?php
/**
 * navigation-left.php
 *
 * @author Pedro Plowman
 * @copyright Copyright &copy; Pedro Plowman, 2017
 * @link https://github.com/p2made
 * @package p2made/yii2-sb-admin-theme
 * @license MIT
 */

use yii\bootstrap\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;

use p2m\widgets\MetisNav;
use p2m\helpers\FA;

$arrowIcon = FA::i('arrow')->tag('span');
?>
<section class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li class="sidebar-search">
				<div class="input-group custom-search-form">
					<input type="text" class="form-control" placeholder="Search...">
					<span class="input-group-btn">
						<button class="btn btn-default" type="button">
							<i class="fa fa-search"></i>
						</button>
					</span>
				</div>
			</li>
			<li><?= Html::a(
				FA::fw('dashboard') . ' Dashboard',
				Yii::$app->homeUrl
			) ?></li><!-- Dashboard -->
			<li>
				<a href="#"><?= FA::fw('bar-chart-o') ?> Charts<?= $arrowIcon ?></a>
				<?= MetisNav::widget([
					'encodeLabels' => false,
					'options' => ['class' => 'nav nav-second-level'],
					'items' => [
						['label' => 'Flot Charts', 'url' => ['../page', 'view' => 'flot']],
						['label' => 'Morris.js Charts', 'url' => ['../page', 'view' => 'morris']],
					],
				//array('label'=>'About', 'url'=>array('../page', 'view'=>'about')),
				]) ?>
			</li><!-- Charts -->
			<li><?= Html::a(
				FA::fw('table') . 'Tables',
				Url::to(['../page', 'view' => 'tables'])
			) ?></li><!-- Tables -->
			<li><?= Html::a(
				FA::fw('edit') . 'Forms',
				Url::to(['../page', 'view' => 'forms'])
			) ?></li><!-- Forms -->
			<li><?= Html::a(
				FA::fw('calendar') . 'Calendar',
				Url::to(['../page', 'view' => 'calendar'])
			) ?></li><!-- Calendar -->
			<li>
				<a href="#"><?= FA::fw('wrench') ?> UI Elements<?= $arrowIcon ?></a>
				<?= MetisNav::widget([
					'encodeLabels' => false,
					'options' => ['class' => 'nav nav-second-level'],
					'items' => [
						['label' => 'Panels and Wells', 'url' => ['../page', 'view' => 'panels-wells']],
						['label' => 'Buttons', 'url' => ['../page', 'view' => 'buttons']],
						['label' => 'Notifications', 'url' => ['../page', 'view' => 'notifications']],
						['label' => 'Typography', 'url' => ['../page', 'view' => 'typography']],
						['label' => 'Grid', 'url' => ['../page', 'view' => 'grid']],
					],
				//array('label'=>'About', 'url'=>array('../page', 'view'=>'about')),
				]) ?>
			</li><!-- UI Elements -->
			<li>
				<a href="#"><?= FA::fw('image') ?> Icons<?= $arrowIcon ?></a>
				<?= MetisNav::widget([
					'encodeLabels' => false,
					'options' => ['class' => 'nav nav-second-level'],
					'items' => [
						['label' => 'Font Awesome', 'url' => ['../page', 'view' => 'font-awesome']],
						['label' => 'Font Awesome Examples', 'url' => ['../page', 'view' => 'font-awesome-examples']],
						['label' => 'Glyphicons', 'url' => ['../page', 'view' => 'glyphicons']],
						['label' => 'Flag Icon CSS', 'url' => ['../page', 'view' => 'flag-icon-css']],
						['label' => 'Bootstrap Social', 'url' => ['../page', 'view' => 'bootstrap-social']],
					],
				]) ?>
			</li><!-- Icons -->
			<li>
				<a href="#"><?= FA::fw('sitemap') ?> Multi-Level Dropdown<?= $arrowIcon ?></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="#">Second Level Item</a>
					</li>
					<li>
						<a href="#">Second Level Item</a>
					</li>
					<li>
						<a href="#">Third Level <?= $arrowIcon ?></a>
						<ul class="nav nav-third-level">
							<li>
								<a href="#">Third Level Item</a>
							</li>
							<li>
								<a href="#">Third Level Item</a>
							</li>
							<li>
								<a href="#">Third Level Item</a>
							</li>
							<li>
								<a href="#">Third Level Item</a>
							</li>
						</ul>
					</li>
				</ul>
			</li><!-- Multi-Level Dropdown -->
			<li>
				<a href="#"><?= FA::fw('files-o') ?> Sample Pages<?= $arrowIcon ?></a>
				<?= MetisNav::widget([
					'encodeLabels' => false,
					'options' => ['class' => 'nav nav-second-level'],
					'items' => [
						['label' => 'Blank Page', 'url' => ['../page', 'view' => 'blank']],
						[ // Signup Page for basic
							'label' => '<span class="glyphicon glyphicon-user fa-fw"></span> Signup Page',
							'url' => ['/site/signup'],
							'visible' =>Yii::$app->user->isGuest
						],
						[ // login Page for basic
							'label' => '<span class="fa fa-lock fa-fw"></span> Login Page',
							'url' => ['/site/login'],
							'visible' =>Yii::$app->user->isGuest
						],
					],
				]) ?>
			</li><!-- Sample Pages -->
			<li>
				<a href="#"><?= FA::fw('coffee') ?> Developer<?= $arrowIcon ?></a>
				<?= MetisNav::widget([
					'encodeLabels' => false,
					'options' => ['class' => 'nav nav-second-level'],
					'items' => [
						['label' => '<span class="fa fa-file-code-o fa-fw"></span> Gii', 'url' => ['/gii']],
						['label' => '<span class="fa fa-dashboard fa-fw"></span> Debug', 'url' => ['/debug']],
					],
				]) ?>
			</li><!-- Developer -->
		</ul>
	</div>
</section>
