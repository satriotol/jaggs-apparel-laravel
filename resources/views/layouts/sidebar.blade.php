<aside class="left-sidebar bg-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">
        <!-- Aplication Brand -->
        <div class="app-brand">
            <a href="#">
                <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30"
                    height="33" viewBox="0 0 30 33">
                    <g fill="none" fill-rule="evenodd">
                        <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                        <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                    </g>
                </svg>
                <span class="brand-name">JAGGS ADMIN</span>
            </a>
        </div>
        <!-- begin sidebar scrollbar -->
        <div class="sidebar-scrollbar">

            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <li class="{{Request::routeIs('dashboard') ? 'active expand' : ''}}">
                    <a class=" sidenav-item-link" href="{{route('dashboard')}}" aria-expanded="false"
                        aria-controls="dashboard">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>
                <li
                    class="has-sub {{Request::routeIs('product.*','productcategory.*','age.*','quantity.*','gallery.*','size.*') ? 'active expand' : ''}}">
                    <a class="sidenav-item-link" href="javascript:void(1)" data-toggle="collapse" data-target="#product"
                        aria-expanded="false" aria-controls="product">
                        <i class="mdi mdi-tshirt-crew-outline"></i>
                        <span class="nav-text">Product</span> <b class="caret"></b>
                    </a>
                    <ul class="collapse {{Request::routeIs('product.*','productcategory.*','age.*','quantity.*','gallery.*','size.*') ? 'show' : ''}}"
                        id="product" data-parent="#sidebar-menu">
                        <div class="sub-menu">
                            <li class="{{Request::routeIs('product.*','quantity.*','gallery.*') ? 'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route("product.index")}}">
                                    <span class="nav-text">All Product</span>

                                </a>
                            </li>
                            <li class="{{Request::routeIs('productcategory.*') ? 'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route("productcategory.index")}}">
                                    <span class="nav-text">Product Category</span>
                                </a>
                            </li>
                            <li class="{{Request::routeIs('size.*') ? 'active' : ''}}">
                                <a class="sidenav-item-link" href="{{route("size.index")}}">
                                    <span class="nav-text">Product Size</span>
                                </a>
                            </li>
                        </div>
                    </ul>
                </li>
                <li class="has-sub">
                    <a class="sidenav-item-link" href="javascript:void(1)" data-toggle="collapse"
                        data-target="#transaction" aria-expanded="false" aria-controls="transaction">
                        <i class="mdi mdi-truck-delivery"></i>
                        <span class="nav-text">Transaction</span> <b class="caret"></b>
                        <ul class="collapse {{Request::routeIs('product.*','productcategory.*','age.*','quantity.*','gallery.*','size.*') ? 'show' : ''}}"
                            id="transaction" data-parent="#sidebar-menu">
                            <div class="sub-menu">
                                <li class="{{Request::routeIs('transaction.*') ? 'active' : ''}}">
                                    <a class="sidenav-item-link" href="{{route("transaction.index")}}">
                                        <span class="nav-text">All Transaction</span>

                                    </a>
                                </li>
                            </div>
                        </ul>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>