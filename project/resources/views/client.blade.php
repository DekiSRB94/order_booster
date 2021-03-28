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

  @include('layouts.nav')
​
<div class="dektron text-center">
  <div class="row">
  <div class="col-lg-5" style="height: 500px;">
  	<div class="header-title">
  <h1 class="company-name">{{ $user->name }}</h1>
  </div>
  </div>
  
  <div class="col-lg-7" style="height: 500px;">
    <img class="crezy-img" src="/images/img-3.png">
    <img class="head-image" src="/images/img-2.png"> 
</div>
</div>
</div>

<h3 align="center" style="margin-top: 50px;">Klijenti: <span id="total_records" style="color: #00b4cc;">{{ count($all_clients) }}</span></h3>
  
<div id="tag_container">
       @include('presult')
</div>


<script type="text/javascript">
    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });
    
    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();
  
            $('li').removeClass('active');
            $(this).parent('li').addClass('active');
  
            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];
  
            getData(page);
        });
  
    });
  
    function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }
</script>

​
</body>

</html>
​
