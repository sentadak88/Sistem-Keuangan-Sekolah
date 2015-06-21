<?php

 /**
  * @package    KeuanganSekolah
  * @author     Reza Mukti <ycared@gmail.com>
  * @copyright  Copyright (c) 2015, KaryaKami.
  * @link       http://karyakami.com
  */


use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaymentFor */

$this->title = Yii::t('app', 'Entri Jenis Pembayaran');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Jenis Pembayaran'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-for-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
