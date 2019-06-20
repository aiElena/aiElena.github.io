<?php
$date = date("d. m. Y");
$name = $_POST['name'];
$patronymic = $_POST['patronymic'];
$lastName = $_POST['lastName'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$socLink = $_POST['socLink'];
$flat = $_POST['flat'];
$district = $_POST['district'];
$col_min = $_POST['col_min'];
$price_min = $_POST['price_min'];
$price_max = $_POST['price_max'];
$start_rent = $_POST['start_rent'];
$type = $_POST['type'];
$time_pr = $_POST['time_pr'];
$option1 = $_POST['option1'];
$statement = $_POST['statement'];
$coments = $_POST['coments'];
$table = $_POST['table'];
$text1 = $_POST['text1'];
$text2 = $_POST['text2'];
$what = $_POST['what'];
$to = "domforyou@ukr.net, ai.alexandrova@ukr.net";
$subject = "Заявка Сдать квартиру";
    $message = wordwrap($message, 70);
	$message = "<h4>DOMFORYOU</h4><br>
Дата сообщения:".htmlspecialchars($date)."<br>

".htmlspecialchars($table)."<br><br>
<table>
  <tr>
    <td>Имя</td>
	<td>".htmlspecialchars($name)."</td>
  </tr>
  <tr>
    <td>Отчество</td>
	<td>".htmlspecialchars($patronymic)."</td>
  </tr>
  <tr>
    <td>Фамилия</td>
	<td>".htmlspecialchars($lastName)."</td>
  </tr>
  <tr>
    <td>Телефон</td>
	<td>".htmlspecialchars($phone)."</td>
  </tr>
  <tr>
    <td>Адрес</td>
	<td>".htmlspecialchars($email)."</td>
  </tr>
  <tr>
    <td>Аккаунт</td>
	<td>".htmlspecialchars($socLink)."</td>
  </tr>
  <tr>
    <td>Информация<br> о квартире</td>
	<td>".htmlspecialchars($flat)."</td>
  </tr>
  <tr>
    <td>Район</td>
	<td>".htmlspecialchars($district)."</td>
  </tr>
  <tr>
    <td>Количество комнат</td>
	<td>".htmlspecialchars($col_min)."</td>
  </tr>
  <tr>
    <td>Цена от</td>
	<td>".htmlspecialchars($price_min)."</td>
  </tr>
  <tr>
    <td>Цена до</td>
	<td>".htmlspecialchars($price_max)."</td>
  </tr>
  <tr>
    <td>Дата вселения</td>
	<td>".htmlspecialchars($start_rent)."</td>
  </tr>
  <tr>
    <td>Срок</td>
	<td>".htmlspecialchars($type)."</td>
  </tr>
  <tr>
    <td>Дата и время показа</td>
	<td>".htmlspecialchars($time_pr)."</td>
  </tr>
  <tr>
    <td>Право выкупа</td>
	<td>".htmlspecialchars($option1)."</td>
  </tr>
</table>"."<br><br>
С Условиями Работы ознакомлен(а) и согласен(на)!".htmlspecialchars($text1)."<br>
С Условиями Договора ознакомлен(а) и согласен(на)!".htmlspecialchars($text2)."<br>
Пожелания:".htmlspecialchars($coments);


$headers = "From:Domforyou<portaldomforyou@ukr.net>\r\nContent-type: text/html; charset=\"utf-8\"";

mail($to, $subject, $message, $headers);

header('Location:thanks.html');

exit();

echo $message;

?>