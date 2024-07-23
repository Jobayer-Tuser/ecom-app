 <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
            <div class="menu-header">Navigation</div>
            <x-nav-menu :path="'dashboard'" :href="route('dashboard')" :icon="'fa fa-laptop'">Dashboard</x-nav-menu>
            <x-nav-menu :path="'category'" :href="route('category.index')" :icon="'fa fa-laptop'">Category</x-nav-menu>

            <x-nav-dropdown :title="'Product'" :icon="'fa fa-envelope'" :path="'product'" >
                <x-nav-submenu>
                    <x-nav-link href="{{route('product.index')}}">Product list</x-nav-link>
                    <x-nav-link href="{{route('product.create')}}">Product Create</x-nav-link>
                </x-nav-submenu>
            </x-nav-dropdown>

            <x-nav-dropdown :title="'Product Item'" :icon="'fa fa-envelope'" :path="'product-item'" >
                <x-nav-submenu>
                    <x-nav-link href="{{route('product-item.index')}}"> Item list</x-nav-link>
                    <x-nav-link href="{{route('product-item.create')}}">Item Create</x-nav-link>
                    <x-nav-link href="{{route('product-variant.index')}}">Variant list</x-nav-link>
                    <x-nav-link href="{{route('product-variant.create')}}">Variant Create</x-nav-link>
                </x-nav-submenu>
            </x-nav-dropdown>


        </div>
    </div>
    <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
{{--            <div class="menu-divider"></div>--}}

