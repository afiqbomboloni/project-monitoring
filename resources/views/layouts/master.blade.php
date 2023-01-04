<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project Monitoring</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    
</head>
<body>
    @include('layouts.header')
    @yield('content')
    


    <script>
    var dateToday = new Date(); 
        $( function() {
          $( "#start_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:'dd-M-yy',
            //   minDate: dateToday,
            onClose: function (selected) {
              if(selected.length <= 0) {
                  // selected is empty
                  $("#end_date").datepicker('disable');
              } else {
                  $("#end_date").datepicker('enable');
              }
              $("#end_date").datepicker("option", "minDate", selected);
            }
          });
          $( "#end_date" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:'dd-M-yy',
            // minDate: dateToday,
            onClose: function (selected) {
              if(selected.length <= 0) {
                  // selected is empty
                  $("#start_date").datepicker('disable');
              } else {
                  $("#start_date").datepicker('enable');
              }
              $("#start_date").datepicker("option", "maxDate", selected);
            }
          });
        }); 
    </script> 
    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>