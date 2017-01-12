<!DOCTYPE html>
<html lang="en">
    <head>
        <title>aPayroll - {{$AppConfig->company_title}}</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <!--Responsive Layouts-->
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/bootstrap/dist/css/bootstrap.min.css" type="text/css" />
        
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/styles/app.css" type="text/css" />
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/styles/style.css" type="text/css" />
        <!-- endbuild -->
        <link rel="stylesheet" href="{{ URL::to('/') }}/css/styles/font.css" type="text/css" />
  
        <style type="text/css">
            .page-break{
                page-break-after: always;
            }
            
            .table td, .table th {
                padding: 2px;
            }
            
            .total{
                font-weight: bold; 
                font-size: 16px;
                border-top: 2px solid #eceeef;
            }
        </style>
    </head>
    <body>
        @yield('content')
    </body>
</html>