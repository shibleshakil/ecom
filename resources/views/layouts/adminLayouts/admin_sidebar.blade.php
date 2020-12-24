<!--sidebar-menu-->
<div id="sidebar"><a href="{{ url('/admin-dashboard') }}" class="visible-phone"><i class="icon icon-home"></i>
        Dashboard</a>
    <ul>
        <li class="active"><a href="{{ url('/admin-dashboard') }}"><i class="icon icon-home"></i>
                <span>Dashboard</span></a> </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span
                    class="label label-important">6</span></a>
            <ul>
                <li><a href="{{ url('/admin/categories/add-main-category') }}">Add Main Categories</a></li>
                <li><a href="{{ url('/admin/categories/view-main-categories') }}">View Main Categories</a></li>
                <li><a href="{{ url('/admin/categories/add-sub-category')}}">Add Sub Categories</a></li>
                <li><a href="{{ url('/admin/categories/view-sub-categories')}}">View Sub Categories</a></li>
                <li><a href="form-wizard.html">Add Categories</a></li>
                <li><a href="form-wizard.html">View Categories</a></li>
            </ul>
        </li>
        <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span
                    class="label label-important">2</span></a>
            <ul>
                <li><a href="form-common.html">Add Product</a></li>
                <li><a href="form-common.html">View Products</a></li>
            </ul>
        </li>
    </ul>
</div>
<!--sidebar-menu-->