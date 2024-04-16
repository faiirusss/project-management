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
                <h2 class="mb-4">Filter Project Name</h2>
                <br>
                <div class="">
                    <form action="/findExecuting" method="GET">                    
                        <div class="input-group mb-3">                        
                            <div class="col me-2">
                                <select class="form-control" name="search" id="search">
                                <option value="">Select Project</option>
                                @foreach ($projectDefinition as $item)
                                    <option value="{{ $item->name_project }}">{{ $item->name_project }}</option>
                                @endforeach
                            </select>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mb-3">Find</button>
                            </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- schedule --}}
<div class="container-fluid pt-4 px-4 mb-4  ">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Schedule</h2>
                <a href="/scheduleExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr class="text-white">
                                <th valign="top"><small>Project Name</small></th>
                                <th valign="top"><small>Task</small></th>
                                <th valign="top"><small>Start Date</small></th>
                                <th valign="top"><small>Finish Date</small></th>
                                <th valign="top"><small>Description</small></th>
                                <th valign="top"><small>Assign to</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectDefinition as $row)  
                            
                            <tr class="text-white">
                                @if ($row->status == 'close' || $row->status == 'Close')
                                <td>
                                    <small>{{$row->name_project}}</small>
                                </td>
                                <td>
                                    @foreach ($row->executingSchedule as $item)
                                        {{ $item['task'] }}<br>
                                    @endforeach
                                </td><td>                                    
                                    @foreach ($row->executingSchedule as $item)
                                        {{ $item['start_date'] }}<br>
                                    @endforeach
                                </td>                            
                                <td>                                    
                                    @foreach ($row->executingSchedule as $item)
                                        {{ $item['finish_date'] }}<br>
                                    @endforeach
                                </td>                            
                                <td>                                    
                                    @foreach ($row->executingSchedule as $item)
                                        {{ $item['description_task'] }}<br>
                                    @endforeach
                                </td>                            
                                <td>                                    
                                    @foreach ($row->executingSchedule as $item)
                                        {{ $item['assign_to'] }}<br>
                                    @endforeach
                                </td>           
                                @endif()
                            </tr>
                            @endforeach
                        </tbody>  
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- risk --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Risk</h2>
                <a href="/scopeExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Project Name</small></th>
                                <th><small>Start Date</small></th>
                                <th><small>Description of Risk</small></th>
                                <th><small>Submitter</small></th>
                                <th><small>Probability Factor</small></th>
                                <th><small>Impact Factor</small></th>
                                <th><small>Exposure</small></th>
                                <th><small>Risk response type</small></th>
                                <th><small>Risk response plan</small></th>
                                <th><small>Assigned to</small></th>
                                <th><small>Status</small></th>
                                <th><small>Due Date</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectDefinition as $row) 
                            <tr class="text-white">
                                @if ($row->status == 'close' || $row->status == 'Close')
                                <td>
                                    <small>{{$row->name_project}}</small>
                                </td>
                                <td>
                                    @foreach ($row->executingRisk as $item)
                                        {{ $item['start_date'] }}<br>
                                    @endforeach
                                </td><td>                                    
                                    @foreach ($row->executingRisk as $item)
                                        {{ $item['description_ofrisk'] }}<br>
                                    @endforeach
                                </td>                            
                                <td>                                    
                                    @foreach ($row->executingRisk as $item)
                                        {{ $item['submitter'] }}<br>
                                    @endforeach
                                </td>                            
                                <td>                                    
                                    @foreach ($row->executingRisk as $item)
                                        {{ $item['probability_factor'] }}<br>
                                    @endforeach
                                </td>                            
                                <td>                                    
                                    @foreach ($row->executingRisk as $item)
                                        {{ $item['impact_factor'] }}<br>
                                    @endforeach
                                </td>           
                                <td>                                    
                                    @foreach ($row->executingRisk as $item)
                                        {{ $item['exposure'] }}<br>
                                    @endforeach
                                </td>           
                                <td>                                    
                                    @foreach ($row->executingRisk as $item)
                                        {{ $item['Risk_reponse_type'] }}<br>
                                    @endforeach
                                </td>           
                                <td>                                    
                                    @foreach ($row->executingRisk as $item)
                                        {{ $item['Risk_reponse_plan'] }}<br>
                                    @endforeach
                                </td>           
                                <td>                                    
                                    @foreach ($row->executingRisk as $item)
                                        {{ $item['assigned_to'] }}<br>
                                    @endforeach
                                </td>           
                                <td>                                    
                                    @foreach ($row->executingRisk as $item)
                                        {{ $item['status'] }}<br>
                                    @endforeach
                                </td>           
                                <td>                                    
                                    @foreach ($row->executingRisk as $item)
                                        {{ $item['due_date'] }}<br>
                                    @endforeach
                                </td>           
                                @endif()
                            </tr>
                            @endforeach
                        </tbody>                    
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Quality</h2>
                <a href="/qualityExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-white">
                                <th><small>Project Name</small></th>
                                <th><small>Requirements</small></th>
                                <th><small>Category</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($executingQuality as $r)
                            <tr class="text-white">
                                <td><small>{{$r->name_project}}</small></td>
                                <td><small>{{$r->requirements}}</small></td>
                                <td><small>{{$r->category}}</small></td>
                                <td>
                                    <a href="/qualityExecuting/{{$r->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/qualityExecuting/{{$r->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- <div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Stakeholder</h2>
                <a href="/qualityExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-condensed">
                        <thead>
                            <tr class="text-white">
                                <th valign="top"><small>Project Name</small></th>
                                <th valign="top"><small>Stakeholder</small></th>
                                <th valign="top"><small>Role</small></th>
                                <th valign="top"><small>Power</small></th>
                                <th valign="top"><small>Intereset</small></th>
                                <th valign="top"><small>Initiation</small></th>
                                <th valign="top"><small>Planning</small></th>
                                <th valign="top"><small>Executing</small></th>
                                <th valign="top"><small>Control</small></th>
                                <th valign="top"><small>Close</small></th>
                                <th valign="top"><small>Engagement Level</small></th>
                                <th valign="top"><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($executingStakeholder as $u)
                            <tr class="text-white">
                                <td><small>{{$u->name_project}}</small></td>
                                <td><small>{{$u->stakeholder}}</small></td>
                                <td><small>{{$u->role}}</small></td>
                                <td><small>{{$u->power}}</small></td>
                                <td><small>{{$u->interest}}</small></td>
                                <td><small>{{$u->initiation}}</small></td>
                                <td><small>{{$u->planning}}</small></td>
                                <td><small>{{$u->executing}}</small></td>
                                <td><small>{{$u->control}}</small></td>
                                <td><small>{{$u->close}}</small></td>
                                <td><small>{{$u->engagement_level}}</small></td>
                                <td><small>
                                    <a href="/stakeholderExecuting/{{$u->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>   
                                    <a href="/stakeholderExecuting/{{$u->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
                                </small></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection