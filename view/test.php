<html ng-app="mySuperApp">
  <head>
    <meta charset="utf-8">
    <title>
      Popups
    </title>
    
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
    
    <link href="//code.ionicframework.com/nightly/css/ionic.css" rel="stylesheet">
    <script src="//code.ionicframework.com/nightly/js/ionic.bundle.js"></script>
    
  </head>
  <body class="padding" ng-controller="PopupCtrl">
    <button class="button button-dark" ng-click="showPopup()">
      show
    </button>
    <button class="button button-primary" ng-click="showConfirm()">
      Confirm
    </button>
    <button class="button button-positive" ng-click="showAlert()">
      Alert
    </button>
    
    <script id="popup-template.html" type="text/ng-template">
      <input ng-model="data.wifi" type="text" placeholder="Password">
    </script>
  </body>
</html>