<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="#">Stisla</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="index.html">St</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Menu</li>
          <li class="nav-item dropdown">
            <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>View Data</span></a>
            <ul class="dropdown-menu">
              <li><a class="nav-link" href="{{route('barang.index','semua')}}">By Condition Semua</a></li>
              <li><a class="nav-link" href="{{route('barang.index','3_hari_lagi')}}">By Condition 3 hari lagi</a></li>
              <li><a class="nav-link" href="{{route('barang.index','id')}}">By Id</a></li>
            </ul>
          </li>
          <li class="{{ request()->routeIs('barang.create') ? 'active' : '' }}"><a href="{{ route('barang.create') }}" class="nav-link"><i class="fas fa-shopping-cart"></i><span>Input Barang</span></a></li>
        </ul>
        <br>
        <br>
    </aside>
  </div>