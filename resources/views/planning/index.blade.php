@extends('layouts.master')
@section('title', 'planning')
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

{{-- filter --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Filter Project Name</h2>
                <br>
                <div class="">
                    <form action="/findPlanning" method="GET">                    
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


{{-- info project planning --}}
<div class="container-fluid pt-4 px-4 mb-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Data Project Planning</h2>
                <a href="/finalPlanning/add" class="btn btn-sm btn-outline-success my-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <td>No</td>
                                <th>Project Name</th>
                                <th>Status</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finalPlanning as $row)
                            <tr class="text-white">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->projectDefinition['name_project'] }}</td>
                                <td>{{ $row->status }}</td>
                                <td>{{ \Carbon\Carbon::parse($row->updated_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="/finalPlanning/{{$row->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/finalPlanning/{{$row->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
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
{{-- <div class="container-fluid pt-4 px-4">
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
                            @foreach ($projectDefinition as $r)
                            <tr class="text-white">
                                <td>{{ $r->name_project }}</td>
                                <td>                                    
                                    @foreach ($r->planningScope as $item)
                                        - {{ $item['technical_requirements'] }}<br>
                                    @endforeach
                                </td>                            
                                <td>                                    
                                    @foreach ($r->planningScope as $item)
                                        - {{ $item['perfomance_requirements'] }}<br>
                                    @endforeach
                                </td>                            
                                <td>                                    
                                    @foreach ($r->planningScope as $item)
                                        - {{ $item['bussines_requirements'] }}<br>
                                    @endforeach
                                </td>                            
                                <td>                                    
                                    @foreach ($r->planningScope as $item)
                                        - {{ $item['regulatory_requirements'] }}<br>
                                    @endforeach
                                </td>                            
                                <td>                                    
                                    @foreach ($r->planningScope as $item)
                                        - {{ $item['user_requirements'] }}<br>
                                    @endforeach
                                </td>                            
                                <td>                                    
                                    @foreach ($r->planningScope as $item)
                                        - {{ $item['system_requirements'] }}<br>
                                    @endforeach
                                </td>                            
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
</div> --}}

{{-- schedule --}}
{{-- <div class="container-fluid pt-4 px-4">
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
                            @foreach ($projectDefinition as $r)
                            <tr class="text-white">
                                <td>{{ $r->name_project }}</td>
                                <td>
                                    @foreach ($r->planningSchedule as $item)
                                        - {{ $item['task'] }}<br>
                                    @endforeach
                                </td> 
                                <td>
                                    @foreach ($r->planningSchedule as $item)
                                        - {{ $item['start_date'] }}<br>
                                    @endforeach
                                </td> 
                                <td>
                                    @foreach ($r->planningSchedule as $item)
                                        - {{ $item['finish_date'] }}<br>
                                    @endforeach
                                </td>                              
                                <td>
                                    @foreach ($r->planningSchedule as $item)
                                        - {{ $item['description_task'] }}<br>
                                    @endforeach
                                </td> 
                                <td>
                                    @foreach ($r->planningSchedule as $item)
                                        - {{ $item['assign_to'] }}<br>
                                    @endforeach
                                </td> 
                                <td>
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
</div> --}}

{{-- cost project income statement --}}
{{-- <div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Project Income Statement</h2>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Cost Category</small></th>
                                <th><small>Description</small></th>
                                <th><small>Total</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finalPLanning as $r)
                            <tr class="text-white">
                                <td>{{ $r->projectDefinition['name_project'] }}</td>
                                <td>{{ $r->planningIncomeStatement['cost_category'] }}</td>
                                <td>{{ $r->planningIncomeStatement['description'] }}</td>
                                <td>{{ $r->planningIncomeStatement['total'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- cost project income statement --}}
{{-- <div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Case Flow</h2>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Nilai Rupiah</small></th>
                                <th><small>Waktu</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finalPLanning as $r)
                            <tr class="text-white">
                                <td>{{ $r->projectDefinition['name_project'] }}</td>
                                <td>{{ $r->planningCaseFlow['nilai_rupiah'] }}</td>
                                <td>{{ $r->planningCaseFlow['waktu'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- cost list asumsition --}}
{{-- <div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">List Assumsition</h2>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Deskripsi</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finalPLanning as $r)
                            <tr class="text-white">
                                <td>{{ $r->projectDefinition['name_project'] }}</td>
                                <td>{{ $r->planningListAsumsition['deskripsi'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> --}}

{{-- quality --}}
{{-- <div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Quality</h2>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Deskripsi</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($finalPLanning as $r)
                            <tr class="text-white">
                                <td>{{ $r->projectDefinition['name_project'] }}</td>
                                <td>{{ $r->planningListAsumsition['deskripsi'] }}</td>
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