<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
  <a class="navbar-brand" href="#">Logo</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      @if (!empty($page) && $page == 'vehicle_type')
        <a class="nav-link active" href="{{url('vehicle_type')}}">Vehicle Type</a>
      @else
        <a class="nav-link" href="{{url('vehicle_type')}}">Vehicle Type</a>
      @endif
    </li>
  </ul>
</nav>
