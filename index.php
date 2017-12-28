<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
      <div class="cities">
          <form action="index.php" method="post">
            <label>Ваш город:</label>
             <p> <input type="text" name="name" class="in" /></p>
             <p><input type="submit" class="button" /></p>
          </form>
      </div>
      
<?php

    require_once('db.info');
    require_once('connection.php');

    $userWord = htmlspecialchars($_POST['name']);
    $res = $db->query("SELECT name FROM city WHERE name LIKE '".$userWord."';");
    $rs=$res->fetch(PDO::FETCH_ASSOC);
    var_dump($rs[name]) ;
    $chars = preg_split('//u', $userWord, NULL, PREG_SPLIT_NO_EMPTY);

            $count= mb_strlen($userWord); 

            $x=$chars[$count-1];

            $X=mb_strtoupper($x, 'UTF-8');
                echo $X;
            $sth = $db->query("SELECT name FROM city WHERE name LIKE '".$X."%'ORDER BY RAND() LIMIT 1;");
        
            $res1=$sth->fetch(PDO::FETCH_ASSOC);
    
    

    if ($rs[name]!==NULL)
    { 
            echo $res1[name]; 
    }
?>    
        
</body>
</html>



