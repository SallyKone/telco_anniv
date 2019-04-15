
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{URL::asset('datatables/DataTables-1.10.16/css/jquery.dataTables.min.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- map -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBJzgyR3Un04ndSCrm3Ac1goqPxd5U_HQw&callback=initMap" type="text/javascript"></script>
  <!-- fin map -->
  <script type="text/javascript" src="{{URL::asset('js/jquery-2.2.3.min.js')}}"></script>
     <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 400px;
  }
  .temoignage{
    background-repeat: no-repeat; 
    background-position: center; 
    background-size: 100% 100%; 
    height: 400px; 
  }
  .actua{
    height: 300px;
    background-size: 100% 300px;
    background-repeat: no-repeat;
    background-position: center;
  }
  .card-text{
    font-size: 15px;
    
  }
  body{
    margin: 0;
  font-size: 100%;
  font-family: 'Lato', sans-serif;
  background: rgb(34, 34, 34);
  background-image: url(../images/007.jpg);
  }
  h1{
    color: white;
  }
  p{
    color: white;
  }
  .panel-heading{
    background-color: orange;
    text-align: center;
    font-size: 19px;
  }
  .copyright{
    color: #fff;
    background-color: #1d1d23;
    margin:0px;
    padding: 10px 0;
    letter-spacing: 1px;
    
  }
  ul.con_inner_text li {
    list-style-type: none;
    color: #bfbfbf;
    line-height: 1.8em;
    font-size: 13px;
    margin-bottom: 17px;
    letter-spacing: 1px;
}
.w3layouts_footer_grid h3 {
    font-size: 21px;
    color: #fff;
    position: relative;
    margin-bottom: 1.5em;
    letter-spacing: 2px;
}
.w3layouts_footer_grid p{
  font-size: 13px;
    line-height: 1.8em;
    margin-bottom: 2em;
    color: #bfbfbf;
    letter-spacing: 1px;
}
  </style>


    <title>Telco anniv</title>
  </head>
  <body onload="close_modal()">
     @include('partials/navbar')
    <div class="container">
      @include('partials/header')
      @yield('content')
    </div></div>
   @include('partials/footer')

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{URL::asset('datatables/DataTables-1.10.16/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){
      //Initialisation de datatable

      $("#table").DataTable();
      
      //requete ajax de suppression d'amis
      $(document.body).on("click","button.supprimer",function(){
        var idami = $(this).attr('id');
        
        $.ajax({
          url:"supprimeramis",
          type:'GET',
          data:{'idami': idami,"_token": $("input[name='_token']").val()},
          dataType: "json",
          success: function(reponse){
            alert("succes : "+ reponse);
          },
          /*error: function(reponse){
            alert("echec : "+ reponse);
          }*/
        });
      });
      

    });

  </script>
  


  </body>

</html>
