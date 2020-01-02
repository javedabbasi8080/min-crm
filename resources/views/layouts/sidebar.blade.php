 <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{url('company')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span> {{ __('sidebar.company') }}</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="{{url('employee')}}">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>{{ __('sidebar.employee') }} </span></a>
      </li>
      
    </ul>