<?php header("Content-type: text/html; charset=UTF-8");
$id="GolobokovYuri";//Статус online или offline user 
$servertime=time();//Данные могут приходить из разных источников db сессии и так далее
$_GET['online']==TRUE ? $database=time()+10 : $database=1612783154;//можно настроить какое время проверять статус например каждые 2-3 мин
$cod=$database-$servertime;//считаем время проведенное на сервере 
?>
<!DOCTYPE html>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
<title>tebe.app:Golobokov Yuri</title>
</head>
<body>
<link rel="stylesheet" href="online.css">
<link rel="stylesheet" href="scrols.css">
<div id="demo">
<h2>tebe.app:Пример User online или offline</h2>
<?= $onlinestatus= $cod<9 ? '<h4>' .$id. '</h4> '.' <img alt="offline"  src="offline.png" /> '.date("d-m-Y H:i:s","$database").'<br>' :
'<h4>'.$id.'</h4><img  class="roundfly" height="100" src="https://tebe.app/pr/x.gif" width="100"> '.' <img alt="online" src="online.png" /> '.'Online'.'<br>'.date("d-m-Y H:i:s","$database").'<br>'?>

<button type="button" id="opentebe2" onclick="tebeTime()">Вход</button>
</div>

<script>
function tebeTime() {
  let tebexhrtime = new XMLHttpRequest();
  tebexhrtime.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("demo").innerHTML =
      this.responseText;
    }
  };
  tebexhrtime.open("GET", "index.php?online=1", true);
  tebexhrtime.send();
}
</script>
<style>
    #opentebe2 {
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  outline: 0;
  background-color: #000;
  border: 0;
  padding: 10px 15px;
  color: #ffffff;
  border-radius: 3px;
  width: 250px;
  cursor: pointer;
  font-size: 18px;
  -webkit-transition-duration: 0.25s;
          transition-duration: 0.25s;
}
#opentebe2:hover {
  background-color: #ff0080;
}
</style>
<style>
   .roundfly {
    border-radius: 100px; 
    border: 3px solid #ff0000; 
    box-shadow: 0 0 7px #666;    }
  </style> 
</style>

</body>
</html>