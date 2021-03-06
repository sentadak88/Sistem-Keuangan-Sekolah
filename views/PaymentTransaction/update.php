<?php

 /**
  * @package    KeuanganSekolah
  * @author     Reza Mukti <ycared@gmail.com>
  * @copyright  Copyright (c) 2015, KaryaKami.
  * @link       http://karyakami.com
  */


use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaymentTransaction */

$this->title = Yii::t('app', 'Perbarui Pembayaran');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Transaksi Pembayaran'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->student_nis, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="payment-transaction-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
