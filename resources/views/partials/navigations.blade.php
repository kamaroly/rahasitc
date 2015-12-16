<div class="col-sm-2 col-md-1 sidebar">
          <ul class="nav nav-sidebar">
            <li class='active' >
              <a href="{{ route('dashboard') }}">
                <div class="nav-icon"><span class="icon-home"></span></span></div>
                <div class="nav-title">{{ trans('navigation.dashboard') }}</div>
              </a>
            </li>
            <li >
              <a href="{{ route('customers') }}">
                <div class="nav-icon"><span class="icon-user-2"></span></div>
                <div class="nav-title">{{ trans('navigation.customers') }}</div>
              </a>
            </li>
            <li >
              <a href="{{ route('payments') }}">
                <div class="nav-icon"><span class="icon-book"></i></span></div>
                <div class="nav-title">{{ trans('navigation.payments') }}</div>
              </a>
            </li>
            <li >
              <a href="{{ route('transfers') }}">
                <div class="nav-icon"><span class="icon-stats"></span></div>
                <div class="nav-title">{{ trans('navigation.transfers') }}</div>
              </a>
            </li>
            <li >
              <a href="{{ route('balance') }}">
                <div class="nav-icon"><span class="icon-location"></span></div>
                <div class="nav-title">{{ trans('navigation.balance') }}</div>
              </a>
            </li>
            <li >
              <a href="{{ route('logs') }}">
                <div class="nav-icon"><span class="icon-calendar"></span></div>
                <div class="nav-title">{{ trans('navigation.logs') }}</div>
              </a>
            </li>
            <li >
              <a href="{{ route('settings') }}">
                <div class="nav-icon"><span class="icon-tools"></span></div>
                <div class="nav-title">{{ trans('navigation.settings') }}</div>
              </a>
            </li>
          </ul>
        </div>