<!-- #Left Sidebar ==================== -->
<div class="sidebar">
    <div class="sidebar-inner">
        <!-- ### $Sidebar Header ### -->
        <div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
                <div class="peer peer-greed">
                    <a class="sidebar-link td-n" href="index.html">
                        <div class="peers ai-c fxw-nw">
                            <div class="peer">
                                <div class="logo">
                                    <img src="/images/logo.png" alt="">
                                </div>
                            </div>
                            <div class="peer peer-greed">
                                <h5 class="lh-1 mB-0 logo-text">Adminator</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="peer">
                    <div class="mobile-toggle sidebar-toggle">
                        <a href="" class="td-n">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- ### $Sidebar Menu ### -->
        <ul class="sidebar-menu scrollable pos-r">
             <li class="nav-item mT-30 active">
                 <a class="sidebar-link" href="index.html">
                 <span class="icon-holder">
                   <i class="c-blue-500 ti-home"></i>
                 </span>
                     <span class="title">Dashboard</span>
                 </a>
             </li>
            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-orange-500 ti-layout-list-thumb"></i>
                </span>
                    <span class="title">Catalog</span>
                    <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class='sidebar-link' href="{{ route('categories.index') }}">Categories</a>
                    </li>
                    <li>
                        <a class='sidebar-link' href="{{ route('products.index') }}">Products</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Attributes</span>
                            <span class="arrow">
                      <i class="ti-angle-right"></i>
                    </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('attributes.index') }}">Attributes</a>
                            </li>
                            <li>
                                <a href="{{ route('attributes_group.index') }}">Attributes Group</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a href="javascript:void(0);">
                            <span>Partners</span>
                            <span class="arrow">
                      <i class="ti-angle-right"></i>
                    </span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('manufacturers.index') }}">Manufactures</a>
                            </li>
                            <li>
                                <a href="{{ route('providers.index') }}">Providers</a>
                            </li>
                        </ul>
                    </li>

                </ul>

            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-orange-500 ti-layout-list-thumb"></i>
                </span>
                    <span class="title">Sales</span>
                    <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class='sidebar-link' href="category">Orders</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item dropdown">
                <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-orange-500 ti-layout-list-thumb"></i>
                </span>
                    <span class="title">Customers</span>
                    <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a class='sidebar-link' href="category">Customers</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>