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
        <a class="nav-link" href="/logout">Izloguj se</a>
      </li>
    </ul>
  </div>
</nav>
​
<div class="dektron text-center">
  <div class="row">
  <div class="col-lg-5">
  <h1 class="heder-title">Order booster</h1>
 
  
 <div class="wrap">
  <form>
   <div class="search form-group">
      <input style="height: 36px;" name="search" id="search" type="text" class="searchTerm" placeholder="Unesite broj za pretragu">
      <button type="submit" class="searchButton"> 
        <i class="fa fa-search"></i>
     </button>
   </div>
 </form>
</div>
  </div>
  
  <div class="col-lg-7">
    <img class="crezy-img" src="/images/img-3.png">
  <img class="head-image" src="/images/img-2.png"> 
</div>
</div>
</div>
  

  <div class="container box">
   <h3 align="center">Spisak klijenti</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search Customer Data</div>
    <div class="panel-body">
     <div class="table-responsive">
      <h3 align="center">Ukupno klijenata : <span id="total_records"></span></h3>
      <table class="table table-striped table-bordered">
       <thead>
        <tr>
         <th>Adresa</th>
         <th>Telefon</th>
         <th>Broj stana</th>
         <th>Sprat</th>
         <th>Interfon</th>
        </tr>
       </thead>
       <form method="POST" action="/post-client" onsubmit="postClient(); return false">
        @csrf
       <tbody>

       </tbody>
       <button style="color:red;" type="submit">Dodaj</button>
     </form>
      </table>
     </div>
    </div>    
   </div>
  </div>




<script>

  fetch_customer_data();

 function fetch_customer_data(query = '')
 {
  $.ajax({
   url:"{{ route('live_search.action') }}",
   method:'GET',
   data:{query:query},
   dataType:'json',
   success:function(data)
   {
    $('tbody').html(data.table_data);
    $('#total_records').text(data.total_data);
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
  
  
  function postClient(){
    var address = $(".address").value();
      $('.client-form').each(function(){
          $.ajax($(this).attr('action'),
            {
              method: $(this).attr('method'),
              data: {"address": address, "_token": "{{ csrf_token() }}"},        
            })
            });
    }

</script>
​
</body>

</html>
​
