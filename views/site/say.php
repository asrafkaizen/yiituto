<?php
use yii\helpers\Html;
use app\models\Country;

// get all rows from the country table and order them by "name"
$countries = Country::find()->orderBy('name')->all();

//display all table content
foreach ($countries as $citem):

    echo $citem->code;
    echo " ".$citem->name;
    echo " ".$citem->population;
    echo "</br>";
    
endforeach;

// get the row whose primary key is "US"
$country = Country::findOne('US');

// displays "United States"
echo $country->name;

echo "</br>cname = ".$cname;

?>


<?php //original content of say.php
//Html::encode($message) 
?>

