<!DOCTYPE html>
<html lang="sr">
<head>
  <title>Order booster</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/css/main.css">
</head>

<body>

  <nav class="navbar navbar-dark bg-dark navbar-expand-sm">
  <a class="navbar-brand" href="#">
    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/logo_white.png" width="30" height="30" alt="logo">
    OrderBooster
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-list-2" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbar-list-2">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="/klijenti">Klijenti</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/logout">Izloguj se</a>
      </li>
    </ul>
  </div>
</nav>
​
<div class="dektron text-center">
  <div class="row">
  <div class="col-lg-5" style="height: 500px;">
  	<div class="header-title">
  <h1>Order booster</h1>
  <h2>Klijenti</h2>
  </div>
  </div>
  
  <div class="col-lg-7" style="height: 500px;">
    <img class="crezy-img" src="/images/img-3.png">
  <img class="head-image" src="/images/img-2.png"> 
</div>
</div>
</div>
  
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

 

@foreach( $client as $c)
       	<tr>
       	<td>{{$c->address}}</td>
       	<td>{{$c->phone}}</td>
       	<td>{{$c->flat_number}}</td>
       	<td>{{$c->floor}}</td>
       	<td>{{$c->intercom}}</td>
       	</tr>
       	@endforeach

​
</body>

</html>
​
