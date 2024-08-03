<!DOCTYPE html>
<?php
include "connect.php";
 $output = mysqli_query($induction,"SELECT * FROM `people`");
 ?>
<html>
    
    <head>

        <meta charset="UTF-8">
        <title>Все лиды</title>
          <style>
            .hidden {
      display:none;
    }
          body { background: url(https://w-dog.ru/wallpapers/12/5/457445428658312/makro-trava-utro-rosa-kapli-fon-teplo.jpg); }
          </style>
    </head>
    <body>
      


   
    <table border="1" id="leads">
    <thead>
        <tr>
            <th>ID</th>
            <th>ФИО</th>
            <th>E-mail</th>
            <th>Номер телефона</th>
            <th>Город</th>            
           
        </tr>
    </thead>
    <?php
    while($credits= mysqli_fetch_assoc($output))
                            { ?> 
                                <tbody>
        <tr>
            <td><?php echo $credits['Lead_ID'] ?></td>
            <td><?php echo $credits['FIO'] ?></td>
            <td><?php echo $credits['email'] ?></td>
            <td><?php echo $credits['Phone'] ?></td>
            <td><?php echo $credits['City'] ?></td>          
            
        </tr>
      
    </tbody> 
                                 
                                 <?php  
                            }
                           ?>   
    </table>                     
<input type="text" id="searchInput" placeholder="Начните печатать и увидите, как происходит фильтрация...">
  <button type="button" name="save_as">Сохранить в csv</button>
        <script>
        
// Улучшенная функция: "Фильтрация с использованием регулярных выражений"
function regexFilterTable() {
  let search = document.getElementById("searchInput").value.trim();
  let searchRegex = new RegExp(search, "i");

  let rows = document.getElementById("leads").getElementsByTagName("tr");
  for (let i = 0; i < rows.length; i++) {
    rows[i].style.display = searchRegex.test(rows[i].textContent) ? "" : "none";  
  }
}

let debounceTimer;
document.getElementById('searchInput').addEventListener('keyup', function() {
  clearTimeout(debounceTimer);
  debounceTimer = setTimeout(() => regexFilterTable(), 300);
});
        </script>

        
<?php

if ('save_as'){
 $save = mysqli_query($induction,"SELECT * FROM `people`");

 $teamleads= array();
 while ($credits= mysqli_fetch_assoc($save)){
 



	$teamleads[] = array(
'Lead_ID'       =>$credits['Lead_ID'],
'FIO'       => $credits['FIO'],
'email'       => $credits['email'],
'Phone'       => $credits['Phone'],
'City'       =>  $credits['City']
	);

        
 }
          
          $buffer = fopen(__DIR__ . '/leads.csv', 'w'); 
          fputs($buffer, chr(0xEF) . chr(0xBB) . chr(0xBF));
          foreach($teamleads as $val) { 
	  fputcsv($buffer, $val, ';'); 
         } 
          fclose($buffer); 
          exit();
}

          ?>
         
        
    </body>
</html>