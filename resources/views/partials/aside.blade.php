<!-- ========== Left Sidebar Start ========== -->
<div class="left-side-menu"style="background-image: url({{asset('images/22.jpg')}})">

    <div class="slimscroll-menu ">


        <!--- Sidemenu -->
        <div id="sidebar-menu" >

            <ul class="metismenu" id="side-menu">

                <li class="menu-title">Navigation</li>

                <li>

                    <ul class="nav-second-level" aria-expanded="false">
                        <li><a href="{{asset('dashboard')}}" class="mdi mdi-view-dashboard" > Dashboard</a></li>
                        <li><a href="{{asset('ViewLeads')}}" class="mdi mdi-account-group" > Leads</a></li>
                        <li><a href="{{route('properties')}}" class="mdi mdi-home-analytics "> Properties</a></li>
                        @can('create',App\Models\Employee::class)
                            <li><a href="{{route('viewHumanResource')}}" class="mdi mdi-account-badge-horizontal"> Human Resource</a></li>
                        @endcan
                        @can('create',App\Models\User::class)
                            <li><a href="{{asset('ViewUser')}}" class="mdi mdi-account-key"> Users</a></li>

                        @endcan
<<<<<<< HEAD
                        <li><a href="{{route('calendar')}}" class="mdi mdi-calendar-text"> Calendar</a></li>
=======
                        <li><a href="{{route('calender')}}" class="mdi mdi-calendar-text"> Calendar</a></li>
>>>>>>> e064e8e2f73f406b0df62c0375ff56422a1ede5e
                        <li><a href="chat.html" class="mdi mdi-wechat"> Chat</a></li>
                        <li><a href="{{route('invoices')}}" class="mdi mdi-account-cash"> Invoices</a></li>
                        <li><a href="{{route('tickets')}}" class="mdi mdi-wrench"> Ticket</a></li>
                    </ul>
                </li>

            </ul>


            <!-- End Sidebar -->

            <div class="clearfix"></div>

            <div class="help-box">
                <h5 class="text-muted mt-0">For Help ?</h5>
                <p class=""><span class="text-info">Email:</span>
                    <br/> info@easyhome-egy.com</p>
                <p class="mb-0"><span class="text-info">Call:</span>
                    <br/> 01126812888</p>
            </div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->
</div>
