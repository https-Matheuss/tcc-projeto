<?php


$caminho = 'C:\xampp\htdocs\dbfaseamento.db';

$base= new PDO('sqlite:'.$caminho);



$result=$base->query("SELECT * FROM FATURAMENTO");
foreach ($result as $row){
  $cliente=$row['CNPJ'];
}


  echo'
  <!DOCTYPE html>
  <html>
  <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
  <body>

  <div id="myPlot" style="width:100%;max-width:700px"></div>

  <script>
  const xArray = ["$cliente"];
  
  const yArray = [99, 49, 44, 24, 15];

  const data = [{
    x:xArray,
    y:yArray,
    type:"bar",
    orientation:"v",
    marker: {color:"rgba(0,0,255,0.8)"}
  }];

  const layout = {title:"World Wide Wine Production"};

  Plotly.newPlot("myPlot", data, layout);
  </script>

  </body>
  </html>
  '
  

?>