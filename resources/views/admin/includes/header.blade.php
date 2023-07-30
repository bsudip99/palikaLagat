<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title','{{ config("app.name") }}| Dashboard')</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/fontawesome-free/css/all.min.css')}}"  type="text/css" >
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" >
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}"  type="text/css"   >
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}" type="text/css"  >
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/jqvmap/jqvmap.min.css')}}" type="text/css"  >
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/assets/dist/css/adminlte.min.css')}}"  type="text/css" >
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}" type="text/css" >
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/daterangepicker/daterangepicker.css')}}"  type="text/css" >
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('admin/assets/plugins/summernote/summernote-bs4.min.css')}}" type="text/css" >
  <!-- Toastr -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  @yield('css')
</head>
<body class="sidebar-mini layout-navbar-fixed layout-fixed">
<div class="wrapper">
  <!-- Main Sidebar Container -->
  @include('admin.includes.partials.topbar')
  @include('admin.includes.partials.left-sidebar')