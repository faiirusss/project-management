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
            <a href="/planning" class="nav-link {{ \Request::is('planning*','planning') ? 'active':''}}">
                <i class="fa fa-home"></i>
                <span class="d-none d-lg-inline-flex"></span>
            </a>
            <a href="/scope" class="nav-link {{ \Request::is('scope*','scope') ? 'active':''}}" >
                <i class="fas fa-crosshairs me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Scope</span >
            </a>
            <a href="/schedule" class="nav-link {{ \Request::is('schedule*','schedule') ? 'active':''}}" >
                <i class="far fa-calendar-alt me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Schedule</span>
            </a>
            <a href="/cost" class="nav-link {{ \Request::is('cost*','cost') ? 'active':''}}" >
                <i class="	fas fa-coins me-lg-2"></i>
                <span class="d-none d-lg-inline-flex ">Cost</span>
            </a>
            <a href="/quality" class="nav-link {{ \Request::is('quality*','quality') ? 'active':''}}" >
                <i class="fas fa-award me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Quality</span>
            </a>
            <a href="/resources" class="nav-link {{ \Request::is('resources*','resources') ? 'active':''}}" >
                <i class="fa fa-cogs me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Resources</span>
            </a>
            <a href="/communication" class="nav-link {{ \Request::is('communication*','communication') ? 'active':''}}" >
                <i class="far fa-comments me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Communication</span>
            </a>
            <a href="/risk" class="nav-link {{ \Request::is('risk*','risk') ? 'active':''}}">
                <i class="fa fa-cog me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Risk</span>
            </a>
            <a href="/procurement" class="nav-link {{ \Request::is('procurement*','procurement') ? 'active':''}}" >
                <i class="fas fa-shopping-cart me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Procurement</span>
            </a>
            <a href="/stakeholder" class="nav-link {{ \Request::is('stakeholder*','stakeholder') ? 'active':''}}" >
                <i class="fas fa-users-cog me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Stakeholder</span>
            </a>             
        </div>
    </center>
</nav>

<div class="container-fluid pt-4 px-4 mb-3">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Schedule </h2>
                <a href="/schedule/add" class="btn btn-sm btn-outline-success mb-4"><i class="fa fa-plus me-2"></i>Add Data</a><br>

                {{-- filter data --}}
                <div class="">
                    <form action="/schedule" method="GET">                    
                        <div class="input-group">                        
                            <div class="col me-2">
                                <select class="form-control" name="search" id="search" value>
                                    <option value="">Select Project</option>
                                    @foreach ($projectDefinition as $item)
                                        <option value="{{ $item->id }}">{{ $item->name_project }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3 btn-sm">Find</button>
                            </div>
                        </div>  
                    </form>
                </div>
                {{-- end filter data --}}

                <br>
                <div class="">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Start Date</small></th>
                                <th><small>Finish Date</small></th>
                                <th><small>Description Task</small></th>
                                <th><small>Assign To</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedule as $r)
                            <tr class="text-white">
                                <td valign="middle"><small>{{$r->projectDefinition['name_project']}}</small></td>
                                <td valign="middle"><small>{{date("d-m-Y", strtotime($r->start_date))}}</small></td>
                                <td valign="middle"><small>{{date("d-m-Y", strtotime($r->finish_date))}}</small></td>
                                <td valign="middle"><small>{{$r->description_task}}</small></td>
                                <td valign="middle"><small>{{$r->assign_to}}</small></td>
                                <td valign="middle">
                                    <a href="/schedule/{{$r->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/schedule/{{$r->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
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

