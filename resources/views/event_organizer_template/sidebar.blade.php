<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-{{ cbLang('left') }} image">
                <img src="{{ CRUDBooster::myPhoto() }}" class="img-circle" alt="{{ cbLang('user_image') }}"/>
            </div>
            <div class="pull-{{ cbLang('left') }} info">
                <p>{{ CRUDBooster::myName() }}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> {{ cbLang('online') }}</a>
            </div>
        </div>


        <div class='main-menu'>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">{{cbLang("menu_navigation")}}</li>
                <!-- Optionally, you can add icons to the links -->
                
                @if(Str::contains(URL::current(), 'dashboard_event'))
                    <li data-id='{{$dashboard->id}}' class="{{ (!Str::contains(URL::current(), 'event')) ? 'active' : '' }}"><a href='{{URL::to('eo/dashboard_event/'.Session::get('event_id'))}}' class='{{($dashboard->color)?"text-".$dashboard->color:""}}'><i class='fa fa-dashboard'></i>
                        <span>{{cbLang("text_dashboard")}}</span> </a>
                    </li>
                @else
                    <li data-id='{{$dashboard->id}}' class="{{ (!Str::contains(URL::current(), 'event') && !Str::contains(URL::current(), 'payment')) ? 'active' : '' }}"><a href='{{URL::to('eo')}}' class='{{($dashboard->color)?"text-".$dashboard->color:""}}'><i class='fa fa-dashboard'></i>
                        <span>{{cbLang("text_dashboard")}}</span> </a>
                    </li>
                @endif

                @if(!Str::contains(URL::current(), 'dashboard_event'))
                    <li data-id='{{$dashboard->id}}' class="{{ (Str::contains(URL::current(), 'event')) ? 'active' : '' }}"><a href='{{URL::to('eo/event')}}' class='{{($dashboard->color)?"text-".$dashboard->color:""}}'><i class='fa fa-bars'></i>
                        <span>Event</span> </a>
                    </li>
                    <li class="{{ (Str::contains(URL::current(), 'payment')) ? 'active' : '' }}"><a href='{{URL::to('eo/payment')}}' class='{{($dashboard->color)?"text-".$dashboard->color:""}}'><i class='fa fa-money'></i>
                        <span>Payment</span> </a>
                    </li>
                @else
                    <li class="{{ (Str::contains(URL::current(), 'dashboard_event/draw')) ? 'active' : '' }}"><a href='{{URL::to('eo/dashboard_event/draw')}}' class='{{($dashboard->color)?"text-".$dashboard->color:""}}'><i class='fa fa-magic'></i>
                        <span>Let's Draw!</span> </a>
                    </li>
                    <li class="{{ (Str::contains(URL::current(), 'category')) ? 'active' : '' }}"><a href='{{URL::to('eo/dashboard_event/category')}}' class='{{($dashboard->color)?"text-".$dashboard->color:""}}'><i class='fa fa-bars'></i>
                        <span>Category</span> </a>
                    </li>
                    <li class="{{ (Str::contains(URL::current(), 'preferences')) ? 'active' : '' }}"><a href='{{URL::to('eo/dashboard_event/preferences')}}' class='{{($dashboard->color)?"text-".$dashboard->color:""}}'><i class='fa fa-gear'></i>
                        <span>Preferences</span> </a>
                    </li>
                @endif
            </ul><!-- /.sidebar-menu -->

        </div>

    </section>
    <!-- /.sidebar -->
</aside>
