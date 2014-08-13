<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">  
<html xmlns="http://www.w3.org/1999/xhtml">  
   <head>  
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
      <title>แผนที่ Google</title>  
      <style type="text/css">  
         body{  
            font-family:Tahoma, Geneva, sans-serif;  
            font-size:12px;  
         }  
      </style>  
      <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=true&language=th"></script>  
      <script type="text/javascript" src="../js/jquery.js"></script>  
      <script type="text/javascript">
         function myMaps() {
            var mapsGoo = google.maps;
            var Position = new mapsGoo.LatLng(13.723419, 100.476232);//ละติจูด,ลองติจูด เริ่มต้น โดยผมให้เริ่มต้นที่ กรุงเตบ  
            var myOptions = {
               center: Position, //ตำแหน่งแสดงแผนที่เริ่มต้น  
               scrollwheel: false,
               zoom: 8, //ซูมเริ่มต้น คือ 8  
               mapTypeId: mapsGoo.MapTypeId.ROADMAP //ชนิดของแผนที่  
            };
            var map = new mapsGoo.Map(document.getElementById("map_canvas"), myOptions);
            //var infowindow = new mapsGoo.InfoWindow();  
            var marker = new mapsGoo.Marker({//เรียกเมธอดMarker(ปักหมุด)  
               position: Position,
               draggable: true,
               title: "คลิกแล้วเคลื่อนย้ายหมุดไปยังตำแหน่งที่ต้องการ"
            });
            var Posi = marker.getPosition();//เลือกเมธอดแสดงตำแหน่งของตัวปักหมุด  
            myMaps_locat(Posi.lat(), Posi.lng());
            marker.setMap(map);//แสดงตัวปักหมุดโลด!!  
            //ตรวจจับเหตุการณ์ต่างๆ ที่เกิดใน google maps  
            mapsGoo.event.addListener(marker, 'dragend', function(ev) {//ย้ายหมุด  
               var location = ev.latLng;
               myMaps_locat(location.lat(), location.lng());
            });
            mapsGoo.event.addListener(marker, 'click', function(ev) {//คลิกที่หมุด  
               var location = ev.latLng;
               myMaps_locat(location.lat(), location.lng());
            });
            mapsGoo.event.addListener(map, 'zoom_changed', function(ev) {//ซูมแผนที่  
               zoomLevel = map.getZoom();//เรียกเมธอด getZoom จะได้ค่าZoomที่เป็นตัวเลข  
               $('#mapsZoom').val(zoomLevel);//เอาค่า Zoom Level ไปแสดงที่ Tag HTML ที่มีแอตทริบิวต์ id ชื่อ mapsZoom  
            });
         }
         function myMaps_locat(lat, lng) {
            $('#mapsLat').val(lat);//เอาค่าละติจูดไปแสดงที่ Tag HTML ที่มีแอตทริบิวต์ id ชื่อ mapsLat  
            $('#mapsLng').val(lng);//เอาค่าลองติจูดไปแสดงที่ Tag HTML ที่มีแอตทริบิวต์ id ชื่อ mapsLng  
         }
         $.fn.myMaps_submit = function() {
            $(this).bind('submit', function(event) {
               if ($('#locat_name').val() == '') {
                  alert('ระบุชื่อสถานที่ด้วยนะจ๊ะ!!');
               } else {
                  $.ajax({
                     url: $(this).attr('action'),
                     type: "POST",
                     data: $(this).serialize(),
                     dataType: "html",
                     beforeSend: function() {
                        $('#loadding').html('<img src="wait.gif" />');
                     },
                     success: function(data) {
                        $('#show_locat').html(data);
                        $('#loadding').html('');
                     }
                  });
               }
               return false;
            });
         };
         $(document).ready(function() {
            myMaps();//แสดงแผนที่  
            $('#maps_form').myMaps_submit();//ตรวจสอบการSubmit Form  
         });
      </script>  
   </head>  
   <body>  
      <table width="660" border="0" align="center" cellpadding="0" cellspacing="3">  
         <tr>  
            <td> <div id="map_canvas" style="width:650px; height:450px"></div>  

               <form action="savemaps.php" method="post" id="maps_form">  
                  <table width="250" border="0" align="center" cellpadding="3" cellspacing="0" style="border:1px dashed #999;background:#E0E0E0;">  
                     <tr>  
                        <td>ชื่อสถานที่</td>  
                        <td>  
                           <input type="text" name="locat_name" id="locat_name" />  
                        </td>  
                     </tr>  
                     <tr>  
                        <td> </td>  
                        <td><input name="bt_savemaps" id="bt_savemaps" type="submit" value="บันทึกข้อมูล" /> <span id="loadding"></span>  
                           <input type="hidden" name="mapsLat" id="mapsLat" />  
                           <input type="hidden" name="mapsLng" id="mapsLng" />  
                           <input type="hidden" name="mapsZoom" id="mapsZoom" value="8" /></td>  
                     </tr>  
                  </table>  
               </form>  
               <div id="show_locat"></div>  
            </td>  
         </tr>  
      </table>  
   </body>  
</html>