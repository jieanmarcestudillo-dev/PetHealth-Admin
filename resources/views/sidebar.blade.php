<div class="border-end bg-white" id="sidebar-wrapper">
    <div class="sidebar-heading border-bottom pt-5 text-center">
        <img class="logo" src="/image/logo.png">
        <p class="title pt-4">ADMINISTRATOR PORTAL</p>
    </div>
    <div class="list-group list-group-flush link">
        <a class="list-group-item list-group-item-action list-group-item-light" href="/adminDashboardRoutes"><i class="bi bi-bar-chart-line-fill pe-3"></i> Dashboard</a>
        <a class="list-group-item list-group-item-action list-group-item-light" href="/adminRequestRoutes"><i class="bi bi-calendar-check pe-3"></i> Appointment</a>
        <a class="list-group-item list-group-item-action list-group-item-light" href="/adminReportRoutes"><i class="bi bi-calendar-check pe-3"></i> Reports</a>
        <a class="list-group-item list-group-item-action list-group-item-light" href="/adminClientRoutes"><i class="fa-solid fa-user pe-3"></i>   Clients</a>
        <a class="list-group-item list-group-item-action list-group-item-light" href="/adminManageAccount"><i class="bi bi-pencil-square pe-3"></i> Manage Account</a>
    </div>
    <div class="sidebar-footing border-top pt-4 text-center">
        <p class="text-center" id="dateDisplay"></p>
        <p class="text-center" id="clockDisplay"></p>

        <button type="button" id="logout" class="btn btn-sm" data-title="Logout?">
            <i class="bi bi-box-arrow-left fs-4"></i>
        </button>
    </div>
</div>
