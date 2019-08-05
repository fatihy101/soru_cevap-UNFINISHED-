<?php

$SQL = "SELECT id, soru FROM sorular WHERE id = 1";
$RESULT = mysqli_query($db,$SQL);
if(mysqli_num_rows($RESULT) ==   0)
{
echo "Soru getirilemedi.";
}

//echo "sorgu tamam";
?>
 <div class="orm-row align-items-center container mt-4">
   <div class="jumbotron">
<?php
$row = mysqli_fetch_assoc($RESULT);
     echo "<p class='lead'>Soru ".$row['id'].": </p>
     <p><b>";
     echo $row['soru']; ?></b></p>
     <hr class="my-4">

     <form method="post" >
       <div class="col">
         <label for="cevap">Cevap:</label>
         <textarea type="text" id="cevap" name="cevap" class="form-control m-3" style="width:61em" placeholder="Cevabınızı yazınız"></textarea>
       </div>

       <div class="row"> <!--Butonu hizalamak için.-->
          <div class="col-10"></div> <!--Kaydırma-->
          <div class="col">
            <div class="col-10"> </div><!--Kaydırma-->
            <button type="submit" class="btn btn-success m-3 float" style="width:6em"><b>Gönder</b></button>
          </div>

           </form>
<?php
// TODO: Kayıt ekleme başarısız. KONTROL ET!
if(isset($_POST['cevap']))
{
  $SQL = sprintf("
INSERT INTO
cevaplar
SET
cevap = %s;
soru_id = %s",
$_POST['cevap'], $row['id']
);
mysqli_query($db,$SQL);
echo "İşlem tamam!" . $row['id'];
}
 ?>

         </div> <!--Row end-->



       </div> <!-- JUMBOTRON END -->

   </div> <!-- Container END -->
