<?php



 $db = new mysqli("localhost","root","","dodo-academy") or die("Bağlanamadı");
 if($db->connect_errno):
     echo 'bağlantıda sorun var. hata kodu:  ' . $db->connect_errno;
 endif;

 $db ->set_charset("utf-8");

