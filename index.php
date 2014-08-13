<!doctype html>
<html lang="en" ng-app="myApp">
<head>
  <meta charset="utf-8">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">

  <title>KBMMZC</title>  
  
  <link rel="stylesheet" href="lib/onsen/css/onsenui.css">  
  <link rel="stylesheet" href="lib/onsen/css/onsen-css-components.css">  
  <link rel="stylesheet" href="styles/app.css"/>

  <script src="lib/onsen/js/angular/angular.js"></script>    
  <script src="lib/onsen/js/onsenui.js"></script>    
  
  <!-- <script src="cordova.js"></script>  -->
  <script src="js/app.js"></script>  
  <script>
   ons.ready(function() {
      app.slidingMenu.on('preopen', function() { 
        console.log('preopen');
      });

      app.slidingMenu.on('postopen', function() {
        console.log('postopen');
      });

      app.slidingMenu.on('preclose', function() {
        console.log('preclose');
      });

      app.slidingMenu.on('postclose', function() {
        console.log('postclose');
      });
    });
  </script>
</head>

<body>

  <ons-sliding-menu var="app.slidingMenu" menu-page="menu.html" main-page="page1.php" side="left" type="overlay" max-slide-distance="200px">
  </ons-sliding-menu>

  <script type="text/ons-template" id="menu.html">
    <ons-page style="background-color: white">

      <ons-list>

        <ons-list-item
          modifier="tappable" class="list__item__line-height" 
          ng-click="app.slidingMenu.setMainPage('page1.php', {closeMenu: true})">
          <i class="fa fa-home fa-lg" style="color: #666"></i>
          &nbsp; หน้าแรก
        </ons-list-item>

        <ons-list-item 
          modifier="tappable" class="list__item__line-height" 
          ng-click="app.slidingMenu.setMainPage('page2.html', {closeMenu: true})">
          <i class="fa fa-gear fa-lg" style="color: #666"></i>
          &nbsp; สมาชิกในกลุ่ม
        </ons-list-item>

        <ons-list-item 
          modifier="tappable" class="list__item__line-height" 
          ng-click="app.slidingMenu.setMainPage('controller/google-map-api.php', {closeMenu: true})">
          <i class="fa fa-gear fa-lg" style="color: #666"></i>
          &nbsp; Google Maps
        </ons-list-item>

         <ons-list-item 
          modifier="tappable" class="list__item__line-height" 
          ng-click="app.slidingMenu.setMainPage('loginForm.php', {closeMenu: true})">
          <i class="fa fa-user" style="color: #666"></i>
          &nbsp; เข้าสู่ระบบ
        </ons-list-item>

         <ons-list-item 
          modifier="tappable" class="list__item__line-height" 
          ng-click="app.slidingMenu.setMainPage('controller/logout.php', {closeMenu: true})">
          <i class="fa fa-user" style="color: #666"></i>
          &nbsp; ออกจากระบบ
        </ons-list-item>
      </ons-list>

    </ons-page>
  </script>
</body>  
</html>
