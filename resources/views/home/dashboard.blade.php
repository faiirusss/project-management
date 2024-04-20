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
    <div class="navbar-nav align-items ms-auto">
        <a href="/report" class="nav-link">
            <i class="far fa-clipboard"></i>
            <span class="d-none d-lg-inline-flex">Report</span>
        </a>
        <a href="#" class="nav-link">
            <i class="far fa-clipboard"></i>
            <span class="d-none d-lg-inline-flex">Dashboard</span>
        </a>
    </div>
</center>
    <div class="navbar-nav align-items-center ms-auto">
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-envelope me-lg-2"></i>
            <span class="d-none d-lg-inline-flex">Message</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
            <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                    <div class="ms-2">
                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                        <small>15 minutes ago</small>
                    </div>
                </div>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                    <div class="ms-2">
                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                        <small>15 minutes ago</small>
                    </div>
                </div>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item">
                <div class="d-flex align-items-center">
                    <img class="rounded-circle" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                    <div class="ms-2">
                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                        <small>15 minutes ago</small>
                    </div>
                </div>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item text-center">See all message</a>
        </div>
    </div>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-bell me-lg-2"></i>
            <span class="d-none d-lg-inline-flex">Notification</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
            <a href="#" class="dropdown-item">
                <h6 class="fw-normal mb-0">Profile updated</h6>
                <small>15 minutes ago</small>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item">
                <h6 class="fw-normal mb-0">New user added</h6>
                <small>15 minutes ago</small>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item">
                <h6 class="fw-normal mb-0">Password changed</h6>
                <small>15 minutes ago</small>
            </a>
            <hr class="dropdown-divider">
            <a href="#" class="dropdown-item text-center">See all notifications</a>
        </div>
    </div>
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img class="rounded-circle me-lg-2" src="{{asset('assets/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
            <span class="d-none d-lg-inline-flex">{{Auth()->User()->name}}</span>
        </a>
        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
            <a href="#" class="dropdown-item">My Profile</a>
            <a href="#" class="dropdown-item">Settings</a>
            <a href="#" class="dropdown-item">Log Out</a>
        </div>
    </div>
</div>
</nav>

{{-- pusher --}}
    <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
    {{-- toastify --}}
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('61490fc8eb06d9c359c6', {
        cluster: 'ap1'
        });

        var channel = pusher.subscribe('my-channel');
        channel.bind('my-event', function(data) {
            notif($data)
        });
    </script>
    <script>
        function notif(data)
        {
            Toastify({
                text: data.message.message,
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                }
            }).showToast();
        }
    </script>
@endsection

