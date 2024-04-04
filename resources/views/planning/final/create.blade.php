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
            <a href="/finalPlanning" class="nav-link {{ \Request::is('stakeholder*','stakeholder') ? 'active':''}}" >
                <i class="fas fa-users-cog me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Final Planning</span>
            </a>
        </div>
    </center>
</nav>


<div class="container-fluid pt-4 px-4">
<div class="row g-4">
<div class="col-sm-12 col-xl-10">
    <div class="bg-secondary rounded h-100 p-4">
        <form action="/finalPlanning/save" method="post">
            @csrf

        {{-- 1 --}}
        <div class="row mb-2">                          
            <div class="col-md-4">
                <label for="nameProject" class="form-label text-white">Name Project</label>
                <select name="name_project" id="nameProject" class="form-select mb-3 text-white" required>
                    @foreach($projectDefinition as $project)
                        @if ($project->status == 'open')
                            <option value="{{ $project->id }}">{{ $project->name_project }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label for="scope" class="form-label text-white">Scope</label>
                <select name="scope" id="scope" class="form-select mb-3 text-white" required>
                    @foreach ($planningFinal as $row)
                        <option value="{{ $row->id }}">{{ $row->planningScope['system_requirements'] }}</option>
                    @endforeach
                </select>
            </div> 
            <div class="col-md-4">
                <label for="schedule" class="form-label text-white">Schedule</label>
                <select name="schedule" id="schedule" class="form-select mb-3 text-white" required>
                    @foreach($schedule as $a)
                        <option value="{{ $a->id }}">{{ $a->projectDefinition['name_project'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>   

        {{-- 2 --}}
        <div class="bg-light rounded p-4 mb-4">
            <h3 class="mb-4">Cost</h3>
            <div class="row mb-2">
                <div class="col-md-4">
                    <label for="projectincome" class="form-label text-white">Project Income Statement</label>
                    <select name="projectincome" id="projectincome" class="form-select mb-3 text-white" required>
                        @foreach($projectincome as $b)
                            <option value="{{ $b->id }}">{{ $b->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
                <div class="col-md-4">
                    <label for="caseflow" class="form-label text-white">Case Flow</label>
                    <select name="caseflow" id="caseflow" class="form-select mb-3 text-white" required>
                        @foreach($caseflow as $c)
                            <option value="{{ $c->id }}">{{ $c->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
                <div class="col-md-4">
                    <label for="listassumsition" class="form-label text-white">List Assumsition</label>
                    <select name="listassumsition" id="listassumsition" class="form-select mb-3 text-white" required>
                        @foreach($listasumsition as $d)
                            <option value="{{ $d->id }}">{{ $d->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
            </div>
        </div> 
        <div class="row mb-2">                          
            <div class="col-md-3">
                <label for="quality" class="form-label text-white">Quality</label>
                <select name="quality" id="quality" class="form-select mb-3 text-white" required>
                    @foreach($quality as $e)
                        <option value="{{ $e->id }}">{{ $e->projectDefinition['name_project'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="resource" class="form-label text-white">Resources</label>
                <select name="resource" id="resource" class="form-select mb-3 text-white" required>
                    @foreach($resource as $f)
                        <option value="{{ $f->id }}">{{ $f->projectDefinition['name_project'] }}</option>
                    @endforeach
                </select>
            </div> 
            <div class="col-md-3">
                <label for="risk" class="form-label text-white">Risk</label>
                <select name="risk" id="risk" class="form-select mb-3 text-white" required>
                    @foreach($risk as $g)
                        <option value="{{ $g->id }}">{{ $g->projectDefinition['name_project'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="stakeholder" class="form-label text-white">Stakeholder</label>
                <select name="stakeholder" id="stakeholder" class="form-select mb-3 text-white" required>
                    @foreach($stakeholder as $h)
                        <option value="{{ $h->id }}">{{ $h->projectDefinition['name_project'] }}</option>
                    @endforeach
                </select>
            </div>
        </div>    
        <div class="bg-light rounded p-4 mb-4">
            <h3 class="mb-4">Communication</h3>
            <div class="row mb-2">
                <div class="col-md-4">
                    <label for="report" class="form-label text-white">Report</label>
                    <select name="report" id="report" class="form-select mb-3 text-white" required>
                        @foreach($report as $i)
                            <option value="{{ $i->id }}">{{ $i->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
                <div class="col-md-4">
                    <label for="presentation" class="form-label text-white">Presentation</label>
                    <select name="presentation" id="presentation" class="form-select mb-3 text-white" required>
                        @foreach($presentations as $j)
                            <option value="{{ $j->id }}">{{ $j->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
                <div class="col-md-4">
                    <label for="announcement" class="form-label text-white">Project Announcement</label>
                    <select name="announcement" id="announcement" class="form-select mb-3 text-white" required>
                        @foreach($projectannouncement as $k)
                            <option value="{{ $k->id }}">{{ $k->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
                <div class="col-md-4">
                    <label for="reviewmeeting" class="form-label text-white">Review and Meeting</label>
                    <select name="reviewmeeting" id="reviewmeeting" class="form-select mb-3 text-white" required>
                        @foreach($reviews as $l)
                            <option value="{{ $l->id }}">{{ $l->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
                <div class="col-md-4">
                    <label for="teammorale" class="form-label text-white">Team Morale</label>
                    <select name="teammorale" id="teammorale" class="form-select mb-3 text-white" required>
                        @foreach($teammorale as $m)
                            <option value="{{ $m->id }}">{{ $m->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
            </div>
        </div>           
        <div class="bg-light rounded p-4 mb-4">
            <h3 class="mb-4">Procurement</h3>
            <div class="row mb-2">
                <div class="col-md-4">
                    <label for="costcontract" class="form-label text-white">Cost Contract to Value</label>
                    <select name="costcontract" id="costcontract" class="form-select mb-3 text-white" required>
                        @foreach($costcontract as $n)
                            <option value="{{ $n->id }}">{{ $n->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
                <div class="col-md-4">
                    <label for="bebanbahan" class="form-label text-white">Beban Bahan</label>
                    <select name="bebanbahan" id="bebanbahan" class="form-select mb-3 text-white" required>
                        @foreach($bebanbahan as $o)
                            <option value="{{ $o->id }}">{{ $o->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
                <div class="col-md-4">
                    <label for="bebansubkon" class="form-label text-white">Beban Subkon</label>
                    <select name="bebansubkon" id="bebansubkon" class="form-select mb-3 text-white" required>
                        @foreach ($bebansubkon as $p)
                            <option value="{{ $p->id }}">{{ $p->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
                <div class="col-md-4">
                    <label for="termpayment" class="form-label text-white">Term of Payment Plan</label>
                    <select name="termpayment" id="termpayment" class="form-select mb-3 text-white" required>
                        @foreach ($termpayment as $q)
                            <option value="{{ $q->id }}">{{ $q->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
                <div class="col-md-4">
                    <label for="guarantee" class="form-label text-white">Guarantee/ Bond</label>
                    <select name="guarantee" id="guarantee" class="form-select mb-3 text-white" required>
                        @foreach ($guarantee as $r)
                            <option value="{{ $r->id }}">{{ $r->projectDefinition['name_project'] }}</option>
                        @endforeach
                    </select>
                </div>         
            </div>
        </div>                   
            <button type="submit" class="btn btn-sm btn-outline-success m-2" >Save</button>
            <button type="reset" class="btn btn-sm btn-outline-danger m-2">Reset</button>
            <a href="/planning" class="btn btn-sm btn-outline-warning m-2">Cancel</a>
        </form>
    </div>
</div>
@endsection
