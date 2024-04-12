@extends('layouts.master')
@section('title', 'control')
@section('content')
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
<center>
    <div class="navbar-nav align-items-center ms-auto">
            <a href="/controlAndMonitoring" class="nav-link {{ \Request::is('controlAndMonitoring*','controlAndMonitoring') ? 'active':''}}">
                <i class="fa fa-home"></i>
                <span class="d-none d-lg-inline-flex"></span>
            </a>
            <a href="/procurementMonitoring" class="nav-link {{ \Request::is('procurementMonitoring*','procurementMonitoring') ? 'active':''}}" >
                <i class="fa fa-shopping-cart me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Procurement</span >
            </a>
            <a href="/costMonitoring" class="nav-link {{ \Request::is('costMonitoring*','costMonitoring') ? 'active':''}}">
                <i class="fas fa-coins me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Cost</span>
            </a>
            <a href="/riskMonitoring" class="nav-link {{ \Request::is('riskMonitoring*','riskMonitoring') ? 'active':''}}">
                <i class="fa fa-exclamation-triangle me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Risk</span>
            </a>
            <a href="/communicationMonitoring" class="nav-link {{ \Request::is('communicationMonitoring*','communicationMonitoring') ? 'active':''}}">
                <i class="far fa-comments me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Communication</span>
            </a>
    </div>
</center>
</nav>
@endsection