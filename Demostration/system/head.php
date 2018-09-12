<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Dream Park</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js "></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js "></script>

    <!-- Datatables -->
    <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/responsive/1.0.7/js/dataTables.responsive.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js" charset="utf-8"></script>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/1.0.7/css/responsive.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">


    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>

    <!-- Plyr core script -->
    <link rel="stylesheet" href="https://cdn.plyr.io/2.0.12/plyr.css">

    <script type="text/javascript">
      $(function() {
        $(".datepicker").datepicker({
          dateFormat: "yy-mm-dd",
          minDate: 0,
          maxDate: +90,
          numberOfMonths: 2
        });
        $(".datepicker").datepicker('setDate', new Date());
      });

    </script>

</head>

<body>
