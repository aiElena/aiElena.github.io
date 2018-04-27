<?php
$date = date("d. m. Y");
$name = $_POST['name'];
$phone = $_POST['phone'];
$table = $_POST['table'];
$what = $_POST['template_name'];
$to = "ai.alexandrova@bigmir.net";
$subject = "Письмо";
    $message = wordwrap($message, 70);
	$message = "<h1>STABILITY 24</h1><br>
Дата сообщения:".htmlspecialchars($date)."<br>

".htmlspecialchars($table)."<br><br>
<table>
  <tr>
    <td>Имя</td>
	<td>".htmlspecialchars($name)."</td>
  </tr>
  <tr>
    <td>Телефон</td>
	<td>".htmlspecialchars($phone)."</td>
  </tr>
</table>"."<br><br>;"



$headers = "From:STABILITY 24<portalSTABILITY 24@ukr.net>\r\nContent-type: text/html; charset=\"utf-8\"";

mail($to, $subject, $message, $headers);

header('Location: thanks.html');

exit();

?>