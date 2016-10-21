<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="{{elixir("/css/all.css")}}" rel="stylesheet">
</head>
<body>

<!-- end of the nav bar -->
<div class="container"></div>
<!-- end .container-->
<div id="date"></div>
<div id="one"></div>
<div></div>

<script src="{{ elixir('js/app.js') }}"></script>
<script src="http://momentjs.com/downloads/moment.min.js"></script>

<script>
  //  $('div').html('go');
    $( "#date" ).html( moment().startOf('day').fromNow() );
    $( "#one" ).html( moment().format('dddd') );
    console.log(moment().format('dddd'));

</script>
</body>
</html>