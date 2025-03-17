
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Estudiando PHP</title>
</head>
<body>
  <header>
    <h1>Estudiando PHP</h1>
  </header>
  <main>

    
  </main>
  
</body>
</html>

<?php
$person=[
    "name"=>"deivis",
    "lastname"=>"Yance",
    "age"=>18,
    "gender"=>"Masculino",
    "email"=>"deiviso@gmail.com",
    "phone"=>"+56 987654321",
];

const CC=56654564;
echo "<p> hola tu nombre es $person[name]</p>";
echo "<p> tu apellido es $person[lastname]</p>";
echo '<p> tu edad es '.$person["age"].'</p>';
echo "<p>".CC."</p>";

echo $_SERVER["DOCUMENT_ROOT"];
echo "<br>";
echo __FILE__;
echo "<br>";
echo gettype(CC);
echo "<br>";
echo gettype($person["age"]);

$soyarray=[121,"aff",1441,5454,4,4,454];
$soy_otro_array=array(121,"aff",1441);
echo($soyarray[1]);
echo "<br>";
echo($soy_otro_array[2]);
echo "<br>";
var_dump($soy_otro_array);
echo "<br>";
echo count($soy_otro_array);


const hola="hola";
function sumar ($a,$b){
    return $a+$b;
    define("daC",56654564);
}

 echo sumar(2,3);
 
///ejemplos

//ciclos
$num=0;
$num2=0;

if($num===$num2){
    echo "son identicos";
}else{
    echo "son distintos";
}


//example del uso de ternaria
$status=2;

echo $status===true?"true":"false";































?>