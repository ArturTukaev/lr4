<?php
session_start();
if (!$_SESSION['admin']) {
    header('Location: index.php');
}
?>
<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'auto');
$mysql1 = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysql1 ->connect_errno) exit ('Ошибка');
$mysql1->set_charset('utf8');

$mysql1->close();

$induction = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$result = mysqli_query($induction, "SELECT * FROM auto");
$result2 = mysqli_query($induction, "SELECT * FROM stock");
$result3 = mysqli_query($induction, "SELECT * FROM auto_salon");
require_once 'fpdf/fpdf.php';

  if (isset($_POST['btn_pdf']))
  {
    $pdf = new FPDF('p','mm','a4');
    define('FPDF_FONTPATH',"fpdf/font/");
    $pdf->AddFont('timesnewroman','','timesnewroman.php'); 
    $pdf->SetFont('timesnewroman','','13');
    $pdf->AddPage();
    $txt = iconv('utf-8', 'cp1251', $txt);
    $pdf->Write(0,iconv('utf-8', 'windows-1251','№ '));
        $pdf->Write(0,iconv('utf-8', 'windows-1251','Стоимость '));
    $pdf->Write(0,iconv('utf-8', 'windows-1251','Марка '));
    $pdf->Write(0,iconv('utf-8', 'windows-1251','Модель '));
    $pdf->Write(0,iconv('utf-8', 'windows-1251','Год выпуска '));
    $pdf->Write(0,iconv('utf-8', 'windows-1251','Трансмиссия '));
    $pdf->Write(0,iconv('utf-8', 'windows-1251','Автосалон '));
    $pdf->Write(0,iconv('utf-8', 'windows-1251','Адрес'));
    $i = 0;
    while($row=mysqli_fetch_assoc($result2))
    {
      $i++;
      $pdf->Write(0,iconv('utf-8', 'windows-1251', $i . '.'. $pdf->Ln(5)) );
      $pdf->Write(0,'   ');
      $pdf->Write(0,iconv('utf-8', 'windows-1251',$row['cost']));
    }
          $pdf->Ln(-5);
    while($row=mysqli_fetch_assoc($result))
    {
      $pdf->Write(0,'                        ' .  $pdf->Ln());
      $pdf->Write(0,iconv('utf-8', 'windows-1251', $row['marka'] ));
      $pdf->Write(0,'   ');
      $pdf->Write(0,iconv('utf-8', 'windows-1251',$row['model']));
      $pdf->Write(0,'  ');
      $pdf->Write(0,iconv('utf-8', 'windows-1251',$row['year']));
      $pdf->Write(0,'               ');
      $pdf->Write(0,iconv('utf-8', 'windows-1251',$row['trans']));
      $pdf->Ln(5);
      }
      $pdf->Ln(-10);
      while($row=mysqli_fetch_assoc($result3))
    {
      $pdf->Write(0,'                                                                                                ' .  $pdf->Ln());
      $pdf->Write(0,iconv('utf-8', 'windows-1251', $row['name'] ));
      $pdf->Write(0,'        ');
      $pdf->Write(0,iconv('utf-8', 'windows-1251',$row['adres']));
      $pdf->Write(0,'  ');
      $pdf->Ln(5);
      }
    $result = mysqli_query($induction, "SELECT * FROM stock");
    $num_rows = mysqli_num_rows($result); 
    $pdf->Write(0,iconv('utf-8', 'windows-1251',$pdf->Ln(10) . 'Автомобилей в наличии: ' . $num_rows));
    $pdf->Output('I', 'instock.pdf');
  }
?>