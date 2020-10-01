<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use kartik\field\FieldRange;
use kartik\form\ActiveForm;
 
$form = ActiveForm::begin();
 

/* @var $this yii\web\View */
/* @var $searchModel app\models\CountrySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Countries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Country', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          //  ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'code',
                'filter' => $countryList,
               // 'filter' => array("" => "all", "AU"=>"Aus","US"=>"United States", "MY" => "Malaysia"),
               
            ],
            'name',            
            [
                'label' => 'populasi',
                'attribute' => 'population',
                'value' => function($model){
                    $popu = $model->population;
                    if ($popu > 1000000000)
                        $popu = number_format((float)$popu / 1000000000, 2, '.', '')." Billion";
                    elseif ($popu > 1000000)
                        $popu = number_format((float)$popu / 1000000, 2, '.', '')." million";
                    return $popu;
                },
                'filter' => false,
                /*
                'filter' => FieldRange::widget([
                    'form' => $form,
                    'model' => function($model){
                        return $model->population;
                    },
                    'label' => 'Enter amount range',
                    'attribute1' => 'population1',
                    'attribute2' => 'population2',
                    'type' => FieldRange::INPUT_SPIN,
                ])
                */
            ],
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
