<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;

$value = 'cuba value';
echo Html::textInput('yearFrom', $value);
?>
<div class="student-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
         //   ['class' => 'yii\grid\SerialColumn'],
            'name',
            [
                'label' => 'Student ID',
                'attribute' => 'studentid',
                'value' => 'studentid',
            ],
            [
                'attribute' => 'country',
                'value' => function($model){
                    return $model->country0->name;
                },
                'filter' => $countryList,
                //filter by country name
            ],
            [
                'attribute' => 'course',
                'value' => function($model){
                    return $model->course;
                },
                'filter' => $courseList,
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
