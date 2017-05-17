<?php
         @session_start();
         $fileName = "ERPexportfile";
         if($_SESSION['fileName'] != '') $fileName = $_SESSION['fileName'];

         header("Content-Type:  application/vnd.ms-excel");
         header("Expires: 0");
         header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
         header("Content-Disposition: attachment;filename=$fileName.xls");
         header("Content-Type: application/force-download");
         header("Content-Type: application/octet-stream");
         header("Content-Type: application/download");
$HTML = "
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<style type='text/css'>
.tableHead {
        font-size:13px; font-weight:bold; vertical-align:text-bottom; border-bottom:1px solid #000000;border-top:1px solid #000000; border-left:1px solid #000000; height:20px; vertical-align:middle;
}
.tableHead1 {
        font-size:13px; font-weight:bold; vertical-align:text-bottom; border-bottom:1px solid #000000;border-top:1px solid #000000; border-right:1px border-right:1px solid #000000; height:40px; vertical-align:middle;
}
.tableHead_rt {
        font-size:13px; font-weight:bold; vertical-align:text-bottom; border-bottom:1px solid #000000;border-top:1px solid #000000; border-left:1px solid #000000; border-right:1px solid #000000; height:20px; vertical-align:middle;
}
.MainTable{
        font-family:Verdana, Arial, Helvetica, sans-serif;
}
.TableRow {
        font-size:13px; font-weight:bold; border-bottom:1px solid #000000; border-left:1px solid #000000; height:20px;
}

.TableRow_rt{
        font-size:13px; font-weight:normal; border-bottom:1px solid #000000;border-right:1px solid #000000; border-left:1px solid #000000; height:20px;
}
.TableAltRow{
        font-size:13px; font-weight:normal; border-bottom:1px solid #000000; height:20px;
}
.TableAltRow_rt{
        font-size:15px; font-weight:normal; border-bottom:1px solid #000000;border-right:1px solid #000000; height:20px;
}
a{
        font-size:15px; font-weight:lighter; color:#333333; text-decoration:none;
}
.inner_TableRow {
        font-size:14px; font-weight:bold;
}
.inner_TableRow_rt {
        font-size:14px; font-weight:bold;
}
</style>

</head>
<body>".$_SESSION['SESSrepoptsHTML']."</body></html>";
        print($HTML);
        exit;
?>