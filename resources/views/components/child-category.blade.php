

<li class="mega-menu-col col-lg-6">
    <ul>
        <li><span class="submenu-title">{{ $child_categories->name }}</span></li>
        @foreach($child_categories->childCategories as $sub_child_category)
            <li><a class="dropdown-item nav-link nav_item" href="#">{{ $sub_child_category->name }}</a></li>
        @endforeach
    </ul>
</li>
