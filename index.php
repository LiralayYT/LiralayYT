<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->


<?php
//session_start();
include "connect.php";
include "class_csrf.php";

//$csrf = new Token();


// Генерация id и значения токена
//$token_id = $csrf->get_token_id();
//$token_value = $csrf->get_token($token_id);
 ?>
<html>
    
    <head>
        <meta charset="UTF-8">
        <title>Лид форма</title>
        
          <style>
            .hidden {
      display:none;}    

    
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap">

    *, *::before, *::after {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
      padding: 50px;
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #18191c;
      color: #FFFFFF;
      font-family: "Roboto", sans-serif;
      font-size: 18px;
    }

    label {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 25px;
    }

    .input-title {
      width: 205px;
      margin-right: 55px;
      font-size: 24px;
      font-weight: 500;
      line-height: 1;
    }

    .input, .button, .select, .checkbox-wrapper, .file-selector {
      width: 350px;
    }

    .input {
      border: 1px solid #ffffff;
      border-radius: 6px;
      padding: 10px 15px;
      background-color: transparent;
      color: #ffffff;
      font-family: inherit;
      font-size: inherit;
      font-weight: 300;
      -webkit-appearance: none;
      appearance: none;
    }

    .input:focus {
      border-color: #FFD829;
      outline: none;
    }

    .select {
      position: relative;
      border: 1px solid #ffffff;
      border-radius: 6px;
      padding: 10px 15px;
      background-color: #18191c;
      color: #ffffff;
      font-family: inherit;
      font-size: inherit;
      font-weight: 300;
      cursor: pointer;
      -webkit-appearance: none;
      appearance: none;
    }

    .select:focus {
      outline: none;
      border: 1px solid #ff8630;
    }

    .select-wrapper {
      position: relative;
    }

    .select-wrapper::after {
      content: "";
      position: absolute;
      top: calc(50% - 4px);
      right: 15px;
      width: 14px;
      height: 8px;
      background-image: url("images/arrow-down.svg");
      background-repeat: no-repeat;
      background-position: center;
      background-size: 100%;
    }

    option {
      font-weight: inherit;
      font-family: inherit;
      font-size: inherit;
    }

    .checkbox-wrapper {
      position: relative;
    }

    .checkbox {
      width: 24px;
      height: 24px;
      opacity: 0;
      margin-right: 15px;
    }

    .checkbox + .checkbox-title::before {
      content: '';
      position: absolute;
      width: 24px;
      height: 24px;
      border: 1px solid #FFFFFF;
      left: 0;
      top: calc(50% - 12px);
      border-radius: 6px;
      cursor: pointer;
    }

    .checkbox:checked + .checkbox-title::after {
      content: '';
      position: absolute;
      width: 14px;
      height: 14px;
      background-color: #FFD829;
      border-radius: 3px;
      left: 5px;
      top: calc(50% - 7px);
      cursor: pointer;
    }

    .file-selector {
      font-weight: 300;
      font-family: inherit;
      font-size: inherit;
      cursor: pointer;
    }

    .button {
      display: block;
      min-width: 210px;
      border: 2px solid transparent;
      border-radius: 6px;
      margin-left: auto;
      padding: 9px 15px;
      color: #000000;
      font-size: 18px;
      font-weight: 300;
      font-family: inherit;
      transition: background-color 0.2s linear;
    }

    .button:hover {
      background-color: #FFFFFF;
      cursor: pointer;
      transition: background-color 0.2s linear;
    }

    .button:focus-visible {
      border: 2px solid #ffffff;
      outline: none;
    }

    .button:focus {
      border: 2px solid #ffffff;
      outline: none;
    }

    .button-yellow {
      background-color: #FFD829;
    }

    .button:disabled {
      opacity: 0.5;
      cursor: not-allowed;
    }

    .hidden {
      display:none;
    }

    #loader {
      width: 350px;
      margin-top: 25px;
      margin-left: auto;
      text-align: center;
    }

    @media (max-width: 768px) {
      body {
        padding: 30px;
      }

      label {
        display: block;
      }

      .input-title {
        margin-right: auto;
        margin-bottom: 10px;
      }

      .input, .button, .select, .checkbox-wrapper, .file-selector, .input-title {
        display: block;
        width: 100%;
      }

      #loader {
        width: 100%;
      }
    }
  </style>
          


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
  
  <br>
  <br>
  <label>
  <a href="output.php">К общему списку</a>
</label>
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


$ip = $_SERVER['REMOTE_ADDR'];

$sql = ("SELECT * FROM `people` WHERE `ip` = '$ip'");
$connect= mysqli_query($induction,$sql);
if(mysqli_num_rows($sql) > 5)
{
    ?>
  <script>applicantForm.querySelector('button').disabled = true;</script> 
  
  <?php
 echo "Вы оставляли заявку более 5 раз";
 
}



  
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
