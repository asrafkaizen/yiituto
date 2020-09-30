<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;
use app\models\Country;

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

            //'code',
            [
                'attribute' => 'code',
                'filter' => ArrayHelper::map(Country::find()->asArray()->all(), 'code', 'code'),
               // 'filter' => array("" => "all", "AU"=>"Aus","US"=>"United States", "MY" => "Malaysia"),
               
            ],
            'name',
            //'population',
            
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
            ],
            

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
