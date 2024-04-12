@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<style>
    .table-responsive table {
        overflow-x: scroll;
    }

    .table-striped td, .table-striped th {
        white-space: nowrap;
    }
</style>

<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <img src="{{asset('assets/img/len.png')}}" style="width: 70px; height: 40px;">
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

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Cost Contract to Value Planning </h2>
                <a href="/procurement/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Value</small></th>
                                <th><small>Contract Value</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr class="text-white">
                                <td><small>RADAR GCI</small></td>
                                <td><small>2</small></td>
                                <td><small>20</small></td>
                                <td>
                                    <a href="/procurement/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/procurement/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Cost Contract to Value Executing </h2>
                <a href="/procurement/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Value</small></th>
                                <th><small>Contract Value</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            <tr class="text-white">
                                <td><small>RADAR GCI</small></td>
                                <td><small>2</small></td>
                                <td><small>20</small></td>
                                <td>
                                    <a href="/procurement/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/procurement/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Beban Bahan Planning</h2>
                <a href="/bebanbarang/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Procurement</small></th>
                                <th><small>Vendor</small></th>
                                <th><small>Description Service</small></th>
                                <th><small>Volume</small></th>
                                <th><small>Units</small></th>
                                <th><small>Total</small></th>
                                <th><small>Start to Order</small></th>
                                <th><small>Finish to Order</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                
                            <tr class="text-white">
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td>
                                    <a href="/bebanbarang/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/bebanbarang/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Beban Bahan Executing</h2>
                <a href="/bebanbarang/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Procurement</small></th>
                                <th><small>Vendor</small></th>
                                <th><small>Description Service</small></th>
                                <th><small>Volume</small></th>
                                <th><small>Units</small></th>
                                <th><small>Total</small></th>
                                <th><small>Start to Order</small></th>
                                <th><small>Finish to Order</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                
                            <tr class="text-white">
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td>
                                    <a href="/bebanbarang/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/bebanbarang/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Beban subkon Planning</h2>
                <a href="/bebansubkon/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Procurement</small></th>
                                <th><small>Vendor</small></th>
                                <th><small>Description Service</small></th>
                                <th><small>Volume</small></th>
                                <th><small>Units</small></th>
                                <th><small>Total</small></th>
                                <th><small>Start to Order</small></th>
                                <th><small>Finish to Order</small></th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr class="text-white">
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td>
                                    <a href="/bebansubkon/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/bebansubkon/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-xl-6">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Beban subkon Executing</h2>
                <a href="/bebansubkon/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Procurement</small></th>
                                <th><small>Vendor</small></th>
                                <th><small>Description Service</small></th>
                                <th><small>Volume</small></th>
                                <th><small>Units</small></th>
                                <th><small>Total</small></th>
                                <th><small>Start to Order</small></th>
                                <th><small>Finish to Order</small></th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr class="text-white">
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td><small></small></td>
                                <td>
                                    <a href="/bebansubkon/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/bebansubkon/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>                    
</div>
@endsection
