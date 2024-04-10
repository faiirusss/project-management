@extends('layouts.master')
@section('tittle','Roles')
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
            <a href="/executing" class="nav-link">
                <i class="fa fa-home"></i>
                <span class="d-none d-lg-inline-flex"></span>
            </a>
            <a href="/scopeExecuting" class="nav-link" >
                <i class="fas fa-crosshairs me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Scope</span >
            </a>
            <a href="/scheduleExecuting" class="nav-link">
                <i class="far fa-calendar-alt me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Schedule</span>
            </a>
            <a href="/costExecuting" class="nav-link">
                <i class="	fas fa-coins me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Cost</span>
            </a>
            <a href="/qualityExecuting" class="nav-link">
                <i class="fas fa-award me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Quality</span>
            </a>
            <a href="/resourcesExecuting" class="nav-link">
                <i class="fa fa-cogs me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Resources</span>
            </a>
            <a href="/communicationExecuting" class="nav-link">
                <i class="far fa-comments me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Communication</span>
            </a>
            <a href="/riskExecuting" class="nav-link">
                <i class="fa fa-cog me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Risk</span>
            </a>
            <a href="/procurementExecuting" class="nav-link">
                <i class="fas fa-shopping-cart me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Procurement</span>
            </a>
            <a href="/stakeholderExecuting" class="nav-link">
                <i class="fas fa-users-cog me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Stakeholder</span>
            </a> 
    </div>
    </center>
</nav>

<div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Scope</h2>
                <a href="/scopeExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr class="text-white">
                                <th valign="top"><small>Project Name</small></th>
                                <th valign="top"><small>Technical Requirements</small></th>
                                <th valign="top"><small>Performance Requirements</small></th>
                                <th valign="top"><small>Bussines Requirements</small></th>
                                <th valign="top"><small>Regulatory Requirements</small></th>
                                <th valign="top"><small>User Requirements</small></th>
                                <th valign="top"><small>System Requirements</small></th>
                                <th valign="top"><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($executingScope as $r)
                            <tr class="text-white">
                                <td><small>{{$r->projectDefinition['name_project']}}</small></td>
                                <td><small>{{$r->technical_requirements}}</small></td>
                                <td><small>{{$r->perfomance_requirements}}</small></td>
                                <td><small>{{$r->bussines_requirements}}</small></td>
                                <td><small>{{$r->regulatory_requirements}}</small></td>
                                <td><small>{{$r->user_requirements}}</small></td>
                                <td><small>{{$r->system_requirements}}</small></td>
                                <td>
                                    <a href="/scopeExecuting/{{$r->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/scopeExecuting/{{$r->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


