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
   <div class="search form-group">
      <input style="height: 36px;" name="search" id="search" type="text" class="searchTerm" placeholder="Unesite broj za pretragu" autocomplete="off">
      <button type="button" class="searchButton"> 
        <i class="fa fa-search"></i>
     </button>
   </div>
</div>
  </div>
  
  <div class="col-lg-7">
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
      <h3 align="center">Klijenti: <span id="total_records" style="color: #00b4cc;"></span></h3>
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

       </tbody>
      </table>
      <div class="button-div"></div>
     </div>
    </div>    
   </div>
  </div>
</div>

  <div class="hidden-input" style="display: none;">
    <form class="post-client-form" method="POST" action="/post-client" onsubmit="postClient(); return false">
        @csrf
        <input class="address" type="text" name="address">
        <input class="phone" type="text" name="phone">
        <input class="flat_number" type="text" name="flat_number">
        <input class="floor" type="text" name="floor">
        <input class="intercom" type="text" name="intercom">
        <button class="add-client-button" type="submit">Dodaj</button>
    </form>
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
    $(".button-div").empty().append('<button style="display: none; width: 100%;" type="button" class="btn btn-info">Dodaj novog klijenta</button>');
    $('.btn-info').click(function(){
      $('.add-client-button').submit();
    });
    $('#total_records').text(data.total_data);
    $('#address').keyup(function (){
      $('.address').val($(this).val()); 
    });
    $('#phone').keyup(function (){
      $('.phone').val($(this).val()); 
    });
    $('#flat_number').keyup(function (){
      $('.flat_number').val($(this).val()); 
    });
    $('#floor').keyup(function (){
      $('.floor').val($(this).val()); 
    });
    $('#intercom').keyup(function (){
      $('.intercom').val($(this).val()); 
    });
     var vlatko = $(".output").attr('vlatko');
       if(vlatko == "2"){
          $('.btn-info').css('display', 'block');
       }
       else{
        $('.btn-info').css('display', 'none');
       }
   }
  })
 }

 $(document).on('keyup', '#search', function(){
  var query = $(this).val();
  fetch_customer_data(query);
 });
  
  function postClient() {
     $('.post-client-form').each(function(){
      var formdata = $(this).serialize();
        $.ajax($(this).attr('action'),
          {
          method: $(this).attr('method'),
          data: formdata,
          success: function () {
            jQuery('.searchTerm').focus().click();

            var str= $(".searchTerm").val();
            var position = document.getElementById('search').selectionStart-100;
            str = str.substr(0, position) + '' + str.substr(position + 100);
            $(".searchTerm").val(str);

            var query = $("#search").val();
            fetch_customer_data(query);

            $('.address').val("");
            $('.phone').val("");
            $('.flat_number').val("");
            $('.floor').val("");
            $('.intercom').val("");
        }
        })
      });

  }

</script>
​
</body>

</html>
​
