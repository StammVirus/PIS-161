﻿<?php
//echo "$tireqty";
//echo "$oilqty";
  require ('page_5.inc');
  class OrderformPage extends Page
  {
    var $row2buttons = array( 'Re-engineering' => 'reengineering.php',
                              'Standards Compliance' => 'standards.php',
                              'Buzzword Compliance' => 'buzzword.php', 
                              'Mission Statements' => 'mission.php'
                            );
// var $tireqty ;
// var $oilqty ;
// var $sparkqty ;
// var $address ;
    function Display_1($tireqty)
    {
      //$this->tireqty=$tireqty ;
      //echo $this->tireqty;
        echo $tireqty; 
        }
    function Display()
    {
      echo "<html>\n<head>\n";
      $this -> DisplayTitle();
      $this -> DisplayKeywords();
      $this -> DisplayStyles();
      echo "</head>\n<body>\n";
      $this -> DisplayHeader();
      $this -> DisplayMenu($this->buttons);
      $this -> DisplayMenu($this->row2buttons);
?> <table width=100% height=100% border=1><tr><td class=cont > <? echo $this->spisok(); ?> </td></table> 
<?
      $this -> DisplayFooter();
      //echo "</body>\n</html>\n";
    }
function spisok ()
{

  // Создать короткие имена переменных
 // $DOCUMENT_ROOT = $_SERVER['DOCUMENT_ROOT'];

//подключаемся к базе данных
$hostname="localhost";
$user="lab3";
$password="lab3";
$db="lab3";
$link = mysqli_connect($hostname, $user, $password,$db);
if(!$link)
{
//echo "<br> Не могу соединиться с сервером базы данных <br>";
exit();
}
//echo "<br> Cоедининение с сервером базы данных прошло успешно <br>";
$query_1="select zakaz.id, zakaz.fio, zakaz.adress, zakaz.data, tovar.id, tovar.tiregty, tovar.oilgty, tovar.sparkgty FROM zakaz, tovar where  zakaz.id=tovar.id order by zakaz.data";
$result_1=mysqli_query($link, $query_1);
?>
<table border=1 color=black width=100% height=100%>
<tr>
<td><b>№</b></td><td><b>ФИО</b></td><td><b>Адрес</b></td><td><b>Дата заказа</b></td><td><b>покрышки</b></td><td><b>масла</b></td><td><b>свечи</b></td>
<?
while ($row_1=mysqli_fetch_array ($result_1)) {
$id=$row_1["id"];
$fio=$row_1["fio"];
$adress=$row_1["adress"];
$data=$row_1["data"];
$tireqty=$row_1["tiregty"];
$oilqty=$row_1["oilgty"];
$sparkqty=$row_1["sparkgty"];
?><tr>
<td> <? echo $id ?> </td><td> <? echo $fio ?> </td><td> <? echo $adress ?> </td><td> <? echo $data ?> </td><td> <? echo $tireqty ?> </td><td> <? echo $oilqty ?> </td><td> <? echo $sparkqty ?> </td>
</tr>
<?

}
?> </table> <? 
}}
$services = new OrderformPage();
$content ='cddc';
$services -> SetContent($content);
$services -> SetTitle('Лабораторная работа по теме: ООП на РНР');
$services -> Setnazvanie('Лабораторные работы по курсу Разработка интернет приложений в сфере коммерциии посредством PHP и MySQL <br> Студента группы ПИС-161: Канашевич Владимира Николаевича <br> Проверил: к.т.н. доц. Назимов А.С.');
//$services -> Display_1($tireqty);
 $services -> Display();
// $services -> zakaz($tireqty, $oilqty, $sparkqty, $address, $DOCUMENT_ROOT, $fio);


?>
