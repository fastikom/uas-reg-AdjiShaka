<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel 5.2</title>

  <!-- Fonts -->
  <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <link rel="stylesheet" href="/css/bootstrap.min.css">

  <script src="/js/jquery.min.js"></script>
  <script src="/js/bootstrap.min.js"></script>
  
  <!-- Angular JS -->
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-route.min.js"></script>

  <!-- MY App -->
  <script src="{{ asset('app/packages/dirPagination.js') }}"></script>
  <script src="{{ asset('app/routes.js') }}"></script>
  <script src="{{ asset('app/services/myServices.js') }}"></script>
  <script src="{{ asset('app/helper/myHelper.js') }}"></script>

  <!-- App Controller -->
  <script src="{{ asset('/app/controllers/BukuController.js') }}"></script>
  <script src="{{ asset('/app/controllers/AnggotaController.js') }}"></script>
  <style>
  .modal-dialog, .modal-content{
    z-index:1051 !important;

  }
  .biru{
         color:#fff !important; background-color:#b44441 !important;
         height: 100%;
        padding-top: 60px;
        position: fixed; /* Stay in place */
        z-index: 1; /* Stay on top */
        top: 0;
        left: 0;
        overflow-x: hidden; /* Disable horizontal scroll */
        box-shadow: 5px;
    }
    .biru a{
        padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 15px;
    color: #fff;
    display: block;
    transition: 0.3s;
    }
    .biru a:hover{
        background-color: white;
    color: #b44441;
    }

    .putih{
        margin-left: 350px;
        padding: 30px 30px 30px 30px;
    }
  </style>
</head>
<body ng-app="main-App">
  
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 biru">
        <a href="/"><h2>Sistem Informasi Perpustakaan</h2></a>
        <hr>
        <a href="#/buku" class="active">Buku</a>
        <a href="#/anggota">Anggota</a>
        </div>

          <div class="col-sm-9 putih" >
            <ng-view></ng-view>
        </div>  

      
    </div>
  

  

  <!-- Scripts -->

</body>
</html>
