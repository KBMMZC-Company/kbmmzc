<meta charset="utf-8">
<?php
include_once '../config/db.php';

$db = new db();
$conn = $db->connect();

if (isset($_POST['locat_name'])) {
   $locatName = $_POST['locat_name'];
   $lat = $_POST['mapsLat'];
   $lng = $_POST['mapsLng'];
   $mapsZoom = $_POST['mapsZoom'];
//echo $locatName;  
   mysqli_query($conn,"INSERT INTO mapsgoo(mps_name,mps_lat,mps_lng,mps_zoom) VALUES('$locatName','$lat','$lng','$mapsZoom')");
}
?>  
<table width="100%" border="0" cellpadding="3" cellspacing="0" style="border:1px solid #CCC;background-color:#E4E4E4;">  
   <tr>  
      <td align="center"><strong>ชื่อสถานที่</strong></td>  
      <td align="center"><strong>ละติจูด</strong></td>  
      <td align="center"><strong>ลองติจูด</strong></td>  
      <td align="center"><strong>ซูม</strong></td>  
   </tr>  
   <?php
   $rsMapsGoo = mysqli_query($conn,'SELECT * FROM mapsgoo ORDER BY mps_name ASC');
   while ($showMapsGoo = mysqli_fetch_array($rsMapsGoo)) {
      ?>  
      <tr>  
         <td><a href="showmaps.php?mapsId=<?= $showMapsGoo['mps_id'] ?>" target="_blank"><?= $showMapsGoo['mps_name'] ?></a></td>  
         <td align="center"><?= $showMapsGoo['mps_lat'] ?></td>  
         <td align="center"><?= $showMapsGoo['mps_lng'] ?></td>  
         <td align="center"><?= $showMapsGoo['mps_zoom'] ?></td>  
      </tr>  
   <?php } mysqli_close($conn); ?>  
</table>  
 
