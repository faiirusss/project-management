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

<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-sm-12 col-xl-10">
    <div class="bg-secondary rounded h-100 p-4">
        <h2 class="mb-4">Stakeholder</h2>
        <form action="/stakeholder/{{ $stakeholder->id }}/update" method="post">
            @csrf
        <div class="row mb-2">
            <div class="col-md-6">
                <label for="nameProject" class="form-label text-white">Name Project</label>
                <select name="name_project" id="nameProject" class="form-select mb-3 text-white" required>
                    @foreach($projectDefinition as $project)
                        <option value="{{ $project->id }}" {{ $project->id == $stakeholder->projectDefinition['id'] ? 'selected' : '' }} >{{$project->name_project}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label text-white">Stakeholder</label>
                <input type="text" name="stakeholder" id="" value="{{$stakeholder->stakeholder}}" class="form-control mb-3 text-white"  required>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label text-white">Role</label>
                <input type="role" name="role" id="" value="{{$stakeholder->role}}" class="form-control mb-3 text-white"  required>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col-md-6">
                <label for="" class="form-label text-white">Power</label>
                <select name="power" id="Risk_reponse_type" class="form-select mb-3 text-white" required>
                    <option value="High" {{ $stakeholder->power == 'High' ? 'selected' : '' }}>High</option>
                    <option value="Medium" {{ $stakeholder->power == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Low" {{ $stakeholder->power == 'Low' ? 'selected' : '' }}>Low</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="" class="form-label text-white">Interest</label>
                <select name="interest" id="Risk_reponse_type" class="form-select mb-3 text-white" required>
                    <option value="High" {{ $stakeholder->interest == 'High' ? 'selected' : '' }}>High</option>
                    <option value="Medium" {{ $stakeholder->interest == 'High' ? 'selected' : '' }}>Medium</option>
                    <option value="Low" {{ $stakeholder->interest == 'High' ? 'selected' : '' }}>Low</option>
                </select>
            </div>
        </div> 
        <div class="bg-light rounded p-4">
            <h3 class="mb-4">Project Shapes</h3>
            <div class="row mb-2">
                <div class="col-md-2">
                    <label for="" class="form-label text-white">Initiation</label>
                    <select name="initiation" id="" class="form-select mb-3 text-white" required>
                        <option value="Responsible" {{ $stakeholder->initiation == 'Responsible' ? 'selected' : '' }}>Responsible</option>
                        <option value="Consulted" {{ $stakeholder->initiation == 'Consulted' ? 'selected' : '' }}>Consulted</option>
                        <option value="Accountable" {{ $stakeholder->initiation == 'Accountable' ? 'selected' : '' }}>Accountable</option>
                        <option value="Informed" {{ $stakeholder->initiation == 'Informed' ? 'selected' : '' }}>Informed</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="" class="form-label text-white">Planning</label>
                    <select name="planning" id="" class="form-select mb-3 text-white" required>
                        <option value="Responsible" {{ $stakeholder->planning == 'Responsible' ? 'selected' : '' }}>Responsible</option>
                        <option value="Consulted" {{ $stakeholder->planning == 'Consulted' ? 'selected' : '' }}>Consulted</option>
                        <option value="Accountable" {{ $stakeholder->planning == 'Accountable' ? 'selected' : '' }}>Accountable</option>
                        <option value="Informed" {{ $stakeholder->planning == 'Informed' ? 'selected' : '' }}>Informed</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="" class="form-label text-white">Execution</label>
                    <select name="executing" id="" class="form-select mb-3 text-white" required>
                        <option value="Responsible" {{ $stakeholder->executing == 'Responsible' ? 'selected' : '' }}>Responsible</option>
                        <option value="Consulted" {{ $stakeholder->executing == 'Consulted' ? 'selected' : '' }}>Consulted</option>
                        <option value="Accountable" {{ $stakeholder->executing == 'Accountable' ? 'selected' : '' }}>Accountable</option>
                        <option value="Informed" {{ $stakeholder->executing == 'Informed' ? 'selected' : '' }}>Informed</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="" class="form-label text-white">Control</label>
                    <select name="control" id="" class="form-select mb-3 text-white" required>
                        <option value="Responsible" {{ $stakeholder->control == 'Responsible' ? 'selected' : '' }}>Responsible</option>
                        <option value="Consulted" {{ $stakeholder->control == 'Consulted' ? 'selected' : '' }}>Consulted</option>
                        <option value="Accountable" {{ $stakeholder->control == 'Accountable' ? 'selected' : '' }}>Accountable</option>
                        <option value="Informed" {{ $stakeholder->control == 'Informed' ? 'selected' : '' }}>Informed</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="" class="form-label text-white">Close</label>
                    <select name="close" id="" class="form-select mb-3 text-white" required>
                        <option value="Responsible" {{ $stakeholder->close == 'Responsible' ? 'selected' : '' }}>Responsible</option>
                        <option value="Consulted" {{ $stakeholder->close == 'Consulted' ? 'selected' : '' }}>Consulted</option>
                        <option value="Accountable"{{ $stakeholder->close == 'Accountable' ? 'selected' : '' }}>Accountable</option>
                        <option value="Informed" {{ $stakeholder->close == 'Informed' ? 'selected' : '' }}>Informed</option>
                    </select>
                </div>
            </div>
        </div> <br>
            <div class="col-md-6">
                <label for="" class="form-label text-white">Engagement Level</label>
                <select name="engagement_level" id="" class="form-select mb-3 text-white" required>
                    <option value="High" {{ $stakeholder->engagement_level == 'High' ? 'selected' : '' }}>High</option>
                    <option value="Medium" {{ $stakeholder->engagement_level == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Low" {{ $stakeholder->engagement_level == 'Low' ? 'selected' : '' }}>Low</option>
                </select>
            </div>      
            <button type="submit" class="btn btn-sm btn-outline-success m-2" >Save</button>
            <button type="reset" class="btn btn-sm btn-outline-danger m-2">Reset</button>
        </form>
    </div>
</div>
@endsection
