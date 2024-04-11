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
        </div>
    </center>
</nav>

{{-- cost contract to value --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Cost Contract to Value </h2>
                <a href="/costContractValueExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
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
                            @foreach ($costContractValue as $r)
                            <tr class="text-white">
                                <td><small>{{$r->name_project}}</small></td>
                                <td><small>{{$r->value}}</small></td>
                                <td><small>{{$r->contract_value}}</small></td>
                                <td>
                                    <a href="/costContractValueExecuting/{{$r->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/costContractValueExecuting/{{$r->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
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

{{-- beban bahan --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Beban Bahan</h2>
                <a href="/bebanbarangExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
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
                            @foreach ($bebanbarang as $r)
                            <tr class="text-white">
                                <td><small>{{$r->name_project}}</small></td>
                                <td><small>{{$r->procurement}}</small></td>
                                <td><small>{{$r->vendor}}</small></td>
                                <td><small>{{$r->description_service}}</small></td>
                                <td><small>{{$r->volume}}</small></td>
                                <td><small>{{$r->units}}</small></td>
                                <td><small>{{$r->total}}</small></td>
                                <td><small>{{$r->start_toOrder}}</small></td>
                                <td><small>{{$r->finish_toOrder}}</small></td>
                                <td>
                                    <a href="/bebanbarangExecuting/{{$r->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/bebanbarangExecuting/{{$r->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
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

{{-- beban subkon --}}
<div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Beban subkon</h2>
                <a href="/bebansubkonExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
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
                            @foreach ($bebansubkon as $r)
                            <tr class="text-white">
                                <td><small>{{$r->name_project}}</small></td>
                                <td><small>{{$r->procurement_subkon}}</small></td>
                                <td><small>{{$r->vendor_subkon}}</small></td>
                                <td><small>{{$r->description_service_subkon}}</small></td>
                                <td><small>{{$r->volume_subkon}}</small></td>
                                <td><small>{{$r->units_subkon}}</small></td>
                                <td><small>{{$r->total_subkon}}</small></td>
                                <td><small>{{$r->start_toOrder_subkon}}</small></td>
                                <td><small>{{$r->finish_toOrder_subkon}}</small></td>
                                <td>
                                    <a href="/bebansubkonExecuting/{{$r->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/bebansubkonExecuting/{{$r->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
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

<div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Term of Payment Plan</h2>
                <a href="/termplanExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Term Type</small></th>
                                <th><small>Value (%)</small></th>
                                <th><small>Value (Rp)</small></th>
                                <th><small>Month (Plan)</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($termPlan as $r)
                            <tr class="text-white">
                                <td><small>{{$r->name_project}}</small></td>
                                <td><small>{{$r->term_type}}</small></td>
                                <td><small>{{$r->value_term}}</small></td>
                                <td><small>{{$r->value_rp_term}}</small></td>
                                <td><small>{{$r->month_plan}}</small></td>
                                <td>
                                    <a href="/termplanExecuting/{{$r->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/termplanExecuting/{{$r->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
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
<div class="container-fluid pt-4 px-4">
    <div class="row g-10">
        <div class="col-sm-12 col-xl-12">
            <div class="bg-secondary rounded h-100 p-4">
                <h2 class="mb-4">Guarantee/Bond</h2>
                <a href="/guaranteeExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" >
                        <thead>
                            <tr class="text-white">
                                <th><small>Name Project</small></th>
                                <th><small>Deskripsi</small></th>
                                <th><small>Persen</small></th>
                                <th><small>Radios</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($guarantee as $l)
                            <tr class="text-white">
                                <td><small>{{$l->name_project}}</small></td>
                                <td><small>{{$l->deskripsi}}</small></td>
                                <td><small>{{$l->persen}}</small></td>
                                <td><small>{{$l->radio}}</small></td>
                                <td>
                                    <a href="/guaranteeExecuting/{{$l->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>      
                                    <a href="/guaranteeExecuting/{{$l->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
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
