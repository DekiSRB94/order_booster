<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.7 AJAX Pagination Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
  
<body>

    <div style="background-color: white; padding-left: 10%; padding-right: 10%;">
  <div class="box">
   <div class="panel panel-default">
    <div class="panel-body">
     <div class="table-responsive" style="padding-top: 3%; padding-bottom: 3%;">
      <table class="table table-dark" style="margin-top: 3%; text-align: center;">
       <thead>
        <tr>
         <th>Adresa</th>
         <th>Telefon</th>
         <th>Broj stana</th>
         <th>Sprat</th>
         <th>Interfon</th>
        </tr>
       </thead>
       <tbody>
        @foreach( $client as $c)
        <tr>
        <td>{{$c->address}}</td>
        <td>{{$c->phone}}</td>
        <td>{{$c->flat_number}}</td>
        <td>{{$c->floor}}</td>
        <td>{{$c->intercom}}</td>
        </tr>
        @endforeach
       </tbody>
      </table>
      
     </div>
    </div>    
   </div>
  </div>
</div>
  

  
</body>
</html>