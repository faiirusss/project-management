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
    <div id="dropdown-menu" class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">                                    
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
{{-- // setTimeout(function() {
//     $('#notification').empty(); 
// }, 24 * 60 * 60 * 1000);  --}}
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script>
    let notifications = <?php echo json_encode($notifications); ?>;
    console.log(notifications);
    $(document).ready(function() {
        notifications.forEach(function(notification) {
            let finishDate = new Date(notification.finish_date);
            let currentDate = new Date();

            let timeDiff = finishDate.getDate() - currentDate.getDate();
            let timeDiffInMinutes = Math.floor(timeDiff / (1000 * 60));
            console.log(timeDiffInMinutes);
            let notificationMessage = '';

            if (timeDiffInMinutes < 1) {
                // Jika waktu kurang dari 1 menit
                notificationMessage = 'Baru saja';
            } else if (timeDiffInMinutes === 1) {
                // Jika waktu tepat 1 menit yang lalu
                notificationMessage = '1 menit yang lalu';
            } else {
                // Jika waktu lebih dari 1 menit
                notificationMessage = timeDiffInMinutes + ' menit yang lalu';
            }

            if (timeDiff === 0) {
                let newNotificationItem = $('<a>').addClass('dropdown-item pt-2').attr('href', '#');
                let newNotificationTitle = $('<h6>').addClass('fw-normal mb-0 task-title').text('Cepat Selesaikan, Hari ini terakhir!');
                let newNotificationMessage = $('<h6>').addClass('fw-normal mb-0 notification').text('Task : ' + notification.task);
                let newNotificationTime = $('<small>').text(notificationMessage);

                // Menggabungkan elemen-elemen baru
                newNotificationItem.append(newNotificationTitle);
                newNotificationItem.append(newNotificationMessage);
                newNotificationItem.append(newNotificationTime);

                // Menggabungkan elemen-elemen baru
                newNotificationItem.append(newNotificationTitle);
                newNotificationItem.append(newNotificationTime);

                // Menambahkan elemen baru ke dalam dropdown-menu
                $('#dropdown-menu').append(newNotificationItem);

                // Menambahkan garis pemisah setelah elemen baru
                $('#dropdown-menu').append('<hr class="dropdown-divider">');
            } else if (timeDiff === 1) {
                let newNotificationItem = $('<a>').addClass('dropdown-item pt-2').attr('href', '#');
                let newNotificationTitle = $('<h6>').addClass('fw-normal mb-0 task-title').text('Waktu terisa 1 hari');
                let newNotificationMessage = $('<h6>').addClass('fw-normal mb-0 notification').text('Task : ' + notification.task);
                let newNotificationTime = $('<small>').text(notificationMessage);

                // Menggabungkan elemen-elemen baru
                newNotificationItem.append(newNotificationTitle);
                newNotificationItem.append(newNotificationMessage);
                newNotificationItem.append(newNotificationTime);

                // Menambahkan elemen baru ke dalam dropdown-menu
                newNotificationItem.append(newNotificationTitle);
                newNotificationItem.append(newNotificationTime);

                $('#dropdown-menu').append(newNotificationItem);

                // Menambahkan garis pemisah setelah elemen baru
                $('#dropdown-menu').append('<hr class="dropdown-divider">');
            }             
        });

    });
</script>
    
@endsection


