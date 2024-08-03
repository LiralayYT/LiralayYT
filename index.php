<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->


<?php
include "connect.php";

 ?>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Лид форма</title>
          <style>
            .hidden {
      display:none;    
body { background: url(https://w-dog.ru/wallpapers/12/5/457445428658312/makro-trava-utro-rosa-kapli-fon-teplo.jpg); }

    }</style>
          
<a href="output.php">К общему списку</a>

    </head>
    <body>
      

<form id="lead"  method="POST" name="lead" enctype="multipart/form-data">
  <label>
    Ваше имя:
    <input
      type="text"
      name="fio"
      id="fio"
      placeholder="Иванов Иван Иванович"
      required
      autofocus
    >
  </label>

  <label>
    Почта:
    <input
      type="email"
      name="email"
      id="email"
      placeholder="deks009@bk.ru"
      required
    >
  </label>

       <label for="phone">Номер телефона:*
       <input type="tel" id= "phone" name="phone" placeholder="9509026385" required>
       </label>
      
   <label>
    Город:
    <select name="list1" id = "list1" >
      <option value="Москва" selected> Москва</option>
      <option value="Санкт-Петербург">Санкт-Петербург</option>
      <option value="Тула">Тула</option>
    </select>
  </label>



  <button type="submit">Отправить заявку</button>

  <div id="loader" class="hidden">Отправляем...</div>
</form>




     <script>
    function toggleLoader() {
      const loader = document.getElementById('loader');
      loader.classList.toggle('hidden');
    }

    function onSuccess(formNode) {
      alert('Ваша заявка успешно отправлена!');
      formNode.classList.toggle('hidden');
    }

    function onError(error) {
      alert(error.message);
    }

    function serializeForm(formNode) {
      const data = new FormData(formNode);
      return data;
    }

    function checkValidity(event) {
      const formNode = event.target.form;
      const isValid = formNode.checkValidity();
      formNode.querySelector('button').disabled = !isValid;
    }



    async function handleFormSubmit(event) {
      event.preventDefault();
      const data = serializeForm(event.target);

      toggleLoader();

    }

    const applicantForm = document.getElementById('lead');
   
    applicantForm.addEventListener('input', checkValidity);
    applicantForm.querySelector('button').disabled = true;
    
  </script>
    
    <?php
    

$induction = mysqli_connect($server,$login,$pass,$name_db);
mysqli_set_charset($induction,'utf8mb4');


if (!empty($_POST)) {
$fio=$_POST['fio'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$city=$_POST['list1'];
$zero =0;

  
$sql= "INSERT INTO `people`(`FIO`,`email`,`Phone`,`City`) VALUES('$fio','$email','$phone','$city')";
$connect= mysqli_query($induction,$sql);
if ($connect) {
                echo "Данные успешно добавлены в таблицу";
            } else {
                echo mysqli_error($induction);
                echo "Произошла ошибка";
            }
}
?>
<!--
   <script>  applicantForm.addEventListener('submit', handleFormSubmit); </script> - должна отключать обновление страницы
но отключает передачу данных на POST в том числе
-->


    </body>
</html>
