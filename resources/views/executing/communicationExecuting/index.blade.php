@extends('layouts.master')
@section('title', 'Communication')
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
                <h4 class="mb-4"><i class="fa fa-book"></i> Reports</h4>
                <a href="/reportsExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br> 
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr class="text-white">
                                <th><small>Deliverable</small></th>
                                <th><small>Description</small></th>
                                <th><small>Delivery Method</small></th>
                                <th><small>Frequency</small></th>
                                <th><small>Owner</small></th>
                                <th><small>Audience</small></th>
                                <th><small>Date Realitation</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportsExecuting as $report)
                                <tr>
                                    <td><small>{{$report->deliverable}}</small></td>
                                    <td><small>{{$report->description}}</small></td>
                                    <td><small>{{$report->delivery_method}}</small></td>
                                    <td><small>{{$report->frequency}}</small></td>
                                    <td><small>{{$report->owner}}</small></td>
                                    <td><small>{{$report->audience}}</small></td>
                                    <td><small>{{$report->date_realitation}}</small></td>
                                    <td>
                                        <a href="/reportsExecuting/{{ $report->id }}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>
                                        <a href="/reportsExecuting/{{ $report->id }}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>
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
                <h4 class="mb-4"><i class="	fas fa-chalkboard-teacher"></i>  Presentations</h4>
                <a href="/presentationsExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="example">
                        <thead>
                            <tr class="text-white">
                                <th><small>Deliverable</small></th>
                                <th><small>Description</small></th>
                                <th><small>Delivery Method</small></th>
                                <th><small>Frequency</small></th>
                                <th><small>Owner</small></th>
                                <th><small>Audience</small></th>
                                <th><small>Date Realitation</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($presentationExecuting as $presentation)
                                <tr>
                                    <td><small>{{$presentation->deliverable}}</small></td>
                                    <td><small>{{$presentation->description}}</small></td>
                                    <td><small>{{$presentation->delivery_method}}</small></td>
                                    <td><small>{{$presentation->frequency}}</small></td>
                                    <td><small>{{$presentation->owner}}</small></td>
                                    <td><small>{{$presentation->audience}}</small></td>
                                    <td><small>{{$presentation->date_realitation}}</small></td>
                                    <td>
                                        <a href="/presentationsExecuting/{{ $presentation->id }}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>
                                        <a href="/presentationsExecuting/{{ $presentation->id }}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>
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
                <h4 class="mb-4"><i class="	fas fa-bullhorn"></i>  Project Anouncements</h4>
                <a href="/projectAnouncementExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="example">
                        <thead>
                            <tr class="text-white">
                                <th><small>Deliverable</small></th>
                                <th><small>Description</small></th>
                                <th><small>Delivery Method</small></th>
                                <th><small>Frequency</small></th>
                                <th><small>Owner</small></th>
                                <th><small>Audience</small></th>
                                <th><small>Date Realitation</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projectAnouncementExecuting as $project)
                                <tr>
                                    <td><small>{{$project->deliverable}}</small></td>
                                    <td><small>{{$project->description}}</small></td>
                                    <td><small>{{$project->delivery_method}}</small></td>
                                    <td><small>{{$project->frequency}}</small></td>
                                    <td><small>{{$project->owner}}</small></td>
                                    <td><small>{{$project->audience}}</small></td>
                                    <th><small>{{$project->date_ealitation}}</small></th>
                                    <td>
                                        <a href="/projectAnouncementExecuting/{{ $project->id }}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>
                                        <a href="/projectAnouncementExecuting/{{ $project->id }}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>
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
                <h4 class="mb-4"><i class="	fas fa-comments"></i>  Review and Meetings</h4>
                <a href="/reviewMeetingExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="example">
                        <thead>
                            <tr class="text-white">
                                <th><small>Deliverable</small></th>
                                <th><small>Description</small></th>
                                <th><small>Delivery Method</small></th>
                                <th><small>Frequency</small></th>
                                <th><small>Owner</small></th>
                                <th><small>Audience</small></th>
                                <th><small>Date Realitation</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reviewMeetingExecuting as $rm)
                                <tr>
                                    <td><small>{{$rm->deliverable}}</small></td>
                                    <td><small>{{$rm->description}}</small></td>
                                    <td><small>{{$rm->delivery_method}}</small></td>
                                    <td><small>{{$rm->frequency}}</small></td>
                                    <td><small>{{$rm->owner}}</small></td>
                                    <td><small>{{$rm->audience}}</small></td>
                                    <th><small>{{$rm->date_realitation}}</small></th>
                                    <td>
                                        <a href="/reviewMeetingExecuting/{{ $rm->id }}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>
                                        <a href="/reviewMeetingExecuting/{{ $rm->id }}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>
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
                <h4 class="mb-4"><i class="fas fa-users"></i>  Team Morale</h4>
                <a href="/teamMoraleExecuting/add" class="btn btn-sm btn-outline-success m-2"><i class="fa fa-plus me-2"></i>Add Data</a><br>
                <br>
                <div class="table-responsive">
                    <table class="table table-striped table-hover" id="example">
                        <thead>
                            <tr class="text-white">
                                <th><small>Deliverable</small></th>
                                <th><small>Description</small></th>
                                <th><small>Delivery Method</small></th>
                                <th><small>Frequency</small></th>
                                <th><small>Owner</small></th>
                                <th><small>Audience</small></th>
                                <th><small>Date Realitation</small></th>
                                <th><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamMoraleExecuting as $tm)
                                <tr>
                                    <td><small>{{$tm->deliverable}}</small></td>
                                    <td><small>{{$tm->description}}</small></td>
                                    <td><small>{{$tm->delivery_method}}</small></td>
                                    <td><small>{{$tm->frequency}}</small></td>
                                    <td><small>{{$tm->owner}}</small></td>
                                    <td><small>{{$tm->audience}}</small></td>
                                    <th><small>{{$tm->date_realitation}}</small></th>
                                    <td>
                                        <a href="/teamMoraleExecuting/{{ $tm->id }}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>
                                        <a href="/teamMoraleExecuting/{{ $tm->id }}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>
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