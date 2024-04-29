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

    .overdue-task {
        color: #dc3545;
    }

    .status-task-open{
        border: 2px solid #15593b;
        background-color: #1F4735;
        color: #fff;
        padding: 4px 12px 4px 12px;
        border-radius: 9999px;
    }
    .status-task-close{
        border: 2px solid #FF5733;
        background-color: #dc3545; /* Warna merah */
        color: #fff;
        padding: 4px 12px;
        border-radius: 9999px;
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
                <h2 class="mb-4">Schedule</h2>
                <a href="/scheduleExecuting/add" class="btn btn-sm btn-outline-success mb-4"><i class="fa fa-plus me-2"></i>Add Data</a><br>

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
                                <th valign="top"><small>Status task</small></th>
                                <th valign="top"><small>Action</small></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($executingSchedule as $u)
                            <tr class="text-white">
                                <td class="schedule {{getDate(strtotime(date('Y-m-d')))['mday'] > getDate(strtotime($u->finish_date))['mday'] ? 'overdue-task' : ''}}" valign="middle"><small>{{$u->projectDefinition['name_project']}}</small></td>
                                <td class="schedule {{getDate(strtotime(date('Y-m-d')))['mday'] > getDate(strtotime($u->finish_date))['mday'] ? 'overdue-task' : ''}}" valign="middle"><small>{{$u->task}}</small></td>
                                <td class="schedule {{getDate(strtotime(date('Y-m-d')))['mday'] > getDate(strtotime($u->finish_date))['mday'] ? 'overdue-task' : ''}}" valign="middle"><small>{{date("d-m-Y", strtotime($u->start_date))}}</small></td>
                                <td class="schedule {{getDate(strtotime(date('Y-m-d')))['mday'] > getDate(strtotime($u->finish_date))['mday'] ? 'overdue-task' : ''}}" valign="middle"><small>{{date("d-m-Y", strtotime($u->finish_date))}}</small></td>
                                <td class="schedule {{getDate(strtotime(date('Y-m-d')))['mday'] > getDate(strtotime($u->finish_date))['mday'] ? 'overdue-task' : ''}}" valign="middle"><small>{{$u->description_task}}</small></td>
                                <td class="schedule {{getDate(strtotime(date('Y-m-d')))['mday'] > getDate(strtotime($u->finish_date))['mday'] ? 'overdue-task' : ''}}" valign="middle"><small>{{$u->assign_to}}</small></td>
                                <td data-id="{{$u->id}}" class="schedule {{getDate(strtotime(date('Y-m-d')))['mday'] > getDate(strtotime($u->finish_date))['mday'] ? 'overdue-task' : ''}}" valign="middle"><small>{{$u->status_task}}</small></td>
                                <td><small>
                                    <a href="/scheduleExecuting/{{$u->id}}/edit" class="btn btn-sm btn-outline-info m-2"><i class="fa fa-pen me-2"></i>Edit</a>   
                                    <a href="/scheduleExecuting/{{$u->id}}/delete" class="btn btn-sm btn-outline-danger m-2" onclick="return confirm('are you sure to delete this?')"><i class="fa fa-trash me-2"></i>Delete</a>   
                                </small></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() {
    let ajaxData = <?php echo json_encode($ajax); ?>; // Mengonversi data PHP menjadi objek JavaScript
    let datas = ajaxData.original;

    // Looping melalui setiap objek dalam array datas
    datas.forEach(function(item) {
        // Mendapatkan nilai dari setiap properti objek
        let id = item.id;
        let status_task = item.status_task;
        // Memilih elemen <td> yang sesuai dengan id        
        let tdStatus = $("td[data-id='" + id + "']");                

        // Menentukan gaya berdasarkan status_task
        if (status_task === 'Open') {
            tdStatus.find('small').addClass('status-task-open');
        } else if (status_task === 'Closed') {
            tdStatus.find('small').addClass('status-task-close');
        }
    });
});
</script>
@endsection


