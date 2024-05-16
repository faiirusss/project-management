@extends('layouts.master')
@section('title', 'Dashboard')
@section('content')
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <img src="{{asset('assets/img/len.png')}}" style="width: 70px; height: 40px;">
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <center>
    <div class="navbar-nav align-items-center ms-auto">
        <a href="/scopeExecuting" class="nav-link">
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
        <a href="/finalExecuting" class="nav-link" >
            <i class="fas fa-users-cog me-lg-2"></i>
            <span class="d-none d-lg-inline-flex">Final Planning</span>
        </a> 
        </div>
    </center>
</nav>

<div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Final executing</h2>
                <a href="/finalExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Scope</small></th>
                                <th><small>Schedule</small></th>
                                <th><small>Status</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($executingFinal as $r)
                            @php
                                $executingScope = json_decode($r->executingScope);
                                $executingSchedule = json_decode($r->executingSchedule);
                            @endphp
                            <tr class="text-white">
                                <td><small>{{$r->projectDefinition['name_project']}}</small></td>
                                <td>
                                    <small>
                                    @foreach ($executingScope as $value)
                                        {{ $value }}<br>
                                    @endforeach
                                    </small>
                                </td>
                                <td>
                                    <small>
                                    @foreach ($executingSchedule as $item)
                                        {{ $item }}<br>
                                    @endforeach
                                    </small>
                                </td>
                                <td><small>{{$r->status}}</small></td>
                                <td>
                                    <a href="/finalExecuting/{{$r->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/finalExecuting/{{$r->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
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

{{-- scope --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Scope</h2>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Project Name</small></th>
                                <th><small>Technical Requirements</small></th>
                                <th><small>Perfomance Requirements</small></th>
                                <th><small>Bussines Requirements</small></th>
                                <th><small>Regulatory Requirements</small></th>
                                <th><small>User Requirements</small></th>
                                <th><small>System Requirements</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($executingFinal as $r)
                            <tr class="text-white">
                                <td>{{ $r->projectDefinition['name_project'] }}</td>
                                <td>{{ $r->executingScope['technical_requirements'] }}</td>
                                <td>{{ $r->executingScope['perfomance_requirements'] }}</td>
                                <td>{{ $r->executingScope['bussines_requirements'] }}</td>
                                <td>{{ $r->executingScope['regulatory_requirements'] }}</td>
                                <td>{{ $r->executingScope['user_requirements'] }}</td>
                                <td>{{ $r->executingScope['system_requirements'] }}</td>
                                <td>
                                    <a href="/risk/{{$r->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/risk/{{$r->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
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

{{-- schedule --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Schedule</h2>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Project Name</small></th>
                                <th><small>Task</small></th>
                                <th><small>Start Date</small></th>
                                <th><small>Finish Date</small></th>
                                <th><small>Description Task</small></th>
                                <th><small>Assign to</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($executingFinal as $r)
                            <tr class="text-white">
                                <td>{{ $r->projectDefinition['name_project'] }}</td>
                                <td>{{ $r->executingSchedule['task'] }}</td>
                                <td>{{ $r->executingSchedule['start_date'] }}</td>
                                <td>{{ $r->executingSchedule['finish_date'] }}</td>
                                <td>{{ $r->executingSchedule['description_task'] }}</td>
                                <td>{{ $r->executingSchedule['assign_to'] }}</td>
                                <td>
                                    <a href="/risk/{{$r->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/risk/{{$r->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
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
