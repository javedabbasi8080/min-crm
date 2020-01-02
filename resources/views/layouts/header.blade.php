<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Custom fonts for this template-->
          <link href="{{ asset('public/assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

          <!-- Page level plugin CSS-->
          <link href="{{ asset('public/assets') }}/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

          <!-- Custom styles for this template-->
          <link href="{{ asset('public/assets') }}/css/sb-admin.css" rel="stylesheet">

        
    </head>
    

    <body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="#">CRM</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <!-- <i class="fas fa-bell fa-fw">Lang</i> -->
          <button class="btn-primary btn-sm" style="font-size:24px">Lang <i class="fa fa-language"></i></button>

          
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
      

          <a class="dropdown-item" href="{{ url('locale/en') }}" ><i class="fa fa-language"></i> EN</a>
          <a class="dropdown-item" href="{{ url('locale/fr') }}" ><i class="fa fa-language"></i> FR</a>

      
        </div>
      </li>
      
    </ul>

  </nav>
