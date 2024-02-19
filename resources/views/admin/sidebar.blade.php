<div class="side-nav">
    <div class="side-nav-inner">
        <ul class="side-nav-menu scrollable">
            <li class="nav-item dropdown statistic-group">
                <a class="dropdown-toggle statistic statistic-href-control" href="{{ route('admin.statistic.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-dashboard"></i>
                    </span>
                    <span class="title">Statistic</span>
                </a>
            </li>
            <li class="nav-item dropdown manager-group">
                <a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Manage</span>
                    <span class="arrow">
                        <i class="arrow-icon"></i>
                    </span>
                </a>
                <ul class="dropdown-menu"> 
                    <li class="color"> <a href="{{ route('admin.color.index') }}">Color</a> </li>
                    <li class="brand"> <a href="{{ route('admin.brand.index') }}">Brand</a> </li>
                    <li class="product"> <a href="{{ route('admin.product.index') }}">Product</a> </li>
                </ul>
            </li> 
            <li class="nav-item dropdown order-group">
                <a class="dropdown-toggle order" href="{{ route('admin.order.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-shopping-cart"></i>
                    </span>
                    <span class="title">Order</span>
                </a>
            </li>
            <li class="nav-item dropdown warehouse-group">
                <a class="dropdown-toggle warehouse" href="{{ route('admin.warehouse.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-hdd"></i>
                    </span>
                    <span class="title">Warehouse</span>
                </a>
            </li>
            <li class="nav-item dropdown blog-group">
                <a class="dropdown-toggle blog" href="{{ route('admin.blog.index') }}">
                    <span class="icon-holder">
                        <i class="anticon anticon-appstore"></i>
                    </span>
                    <span class="title">Blog</span>
                </a>
            </li>
        </ul>
    </div>
</div>