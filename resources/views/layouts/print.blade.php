<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <title>Office Dashboard - Full pack payroll management system</title>
  <meta name="description" content="Responsive, Bootstrap, BS4" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <!-- for ios 7 style, multi-resolution icon of 152x152 -->
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
  <link rel="apple-touch-icon" href="{{ URL::to('/') }}/images/logo.png">
  <meta name="apple-mobile-web-app-title" content="Flatkit">
  <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
  <meta name="mobile-web-app-capable" content="yes">
  <link rel="shortcut icon" sizes="196x196" href="{{ URL::to('/') }}/images/logo.png">
  
  <!-- style -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/animate.css/animate.min.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/glyphicons/glyphicons.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/font-awesome/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/material-design-icons/material-design-icons.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/ionicons/css/ionicons.min.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/simple-line-icons/css/simple-line-icons.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />

  <!-- build:css css/styles/app.min.css -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/styles/app.css" type="text/css" />
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/styles/style.css" type="text/css" />
  <!-- endbuild -->
  <link rel="stylesheet" href="{{ URL::to('/') }}/css/styles/font.css" type="text/css" />
</head>
<body>
@yield('content')
<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
  <script src="{{ URL::to('/') }}/libs/jquery/dist/jquery.js"></script>
<!-- Bootstrap -->
  <script src="{{ URL::to('/') }}/libs/tether/dist/js/tether.min.js"></script>
  <script src="{{ URL::to('/') }}/libs/bootstrap/dist/js/bootstrap.js"></script>
<!-- core -->
  <script src="{{ URL::to('/') }}/libs/jQuery-Storage-API/jquery.storageapi.min.js"></script>
  <script src="{{ URL::to('/') }}/libs/PACE/pace.min.js"></script>
  <script src="{{ URL::to('/') }}/libs/jquery-pjax/jquery.pjax.js"></script>
  <script src="{{ URL::to('/') }}/libs/blockUI/jquery.blockUI.js"></script>
  <script src="{{ URL::to('/') }}/libs/jscroll/jquery.jscroll.min.js"></script>

  <script src="{{ URL::to('/') }}/scripts/config.lazyload.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-load.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-jp.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-include.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-device.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-form.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-modal.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-nav.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-list.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-screenfull.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-scroll-to.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-toggle-class.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ui-taburl.js"></script>
  <script src="{{ URL::to('/') }}/scripts/app.js"></script>
  <script src="{{ URL::to('/') }}/scripts/ajax.js"></script>
<!-- endbuild -->

<!--<script src="{{ URL::to('/') }}/scripts/ui-taburl.js"></script>-->
</body>
</html>