
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
    <h2>Buenas  <?php echo $person["name"]; ?></h2>
      
    <p>tu edad es <?php echo $person["age"]; ?></p>

  </main>
  
</body>
</html>




<?php
$person=[
    "name"=>"deivis",
    "lastname"=>"Alfonso",
    "age"=>18,
    "gender"=>"Masculino",
    "email"=>"deiviso@gmail.com",
    "phone"=>"+56 987654321",
];
?>