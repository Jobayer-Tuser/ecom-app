 <div class="app-sidebar-content" data-scrollbar="true" data-height="100%">

        <div class="menu">
            <div class="menu-header">Navigation</div>
            <x-nav-menu :active="request()->routeIs('dashboard')" :href="route('dashboard')" :icon="'fa fa-laptop'">Dashboard</x-nav-menu>
            <x-nav-menu :active="request()->routeIs('category.index')" :href="route('category.index')" :icon="'fa fa-laptop'">Category</x-nav-menu>
            <x-nav-menu :active="request()->routeIs('customer.index')" :href="route('customer.index')" :icon="'fa fa-laptop'">Customer</x-nav-menu>

            <x-nav-dropdown :title="'Product'" :icon="'fa fa-envelope'" :path="'product'" >
                <x-nav-submenu>
                    <x-nav-link :href="route('product.index')" :active="request()->routeIs('product.index')">Product list</x-nav-link>
                    <x-nav-link :href="route('product.create')" :active="request()->routeIs('product.create')">Product Create</x-nav-link>
                </x-nav-submenu>
            </x-nav-dropdown>

            <x-nav-dropdown :title="'Product Item'" :icon="'fa fa-envelope'" :path="'product-item'" >
                <x-nav-submenu>
                    <x-nav-link :href="route('product-item.index')" :active="request()->routeIs('product-item.index')"> Item list</x-nav-link>
                    <x-nav-link :href="route('product-item.create')" :active="request()->routeIs('product-item.create')">Item Create</x-nav-link>

                    <x-nav-link :href="route('product-variant.index')" :active="request()->routeIs('product-variant.index')">Variant list</x-nav-link>
                    <x-nav-link :href="route('product-variant.create')" :active="request()->routeIs('product-variant.create')">Variant Create</x-nav-link>
                </x-nav-submenu>
            </x-nav-dropdown>

            <x-nav-menu :active="request()->routeIs('role.index')" :href="route('role.index')" :icon="'fa fa-laptop'">Role</x-nav-menu>
            <x-nav-menu :active="request()->routeIs('permission.index')" :href="route('permission.index')" :icon="'fa fa-laptop'">Permission</x-nav-menu>
            <x-nav-menu :active="request()->routeIs('chat.index')" :href="route('chat.index')" :icon="'fa fa-laptop'">Chat</x-nav-menu>
            <x-nav-menu :active="request()->routeIs('file.index')" :href="route('file.index')" :icon="'fa fa-laptop'">File upload</x-nav-menu>


        </div>
    </div>
    <button class="app-sidebar-mobile-backdrop" data-dismiss="sidebar-mobile"></button>
{{--            <div class="menu-divider"></div>--}}

