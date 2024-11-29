<div class="drawer">
    <input id="my-drawer" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        {{ $slot }}
    </div>
    <div class="drawer-side">
        <label for="my-drawer" class="drawer-overlay"></label>
        <ul class="menu p-4 w-80 bg-base-100 text-base-content h-full">
            <!-- Sidebar content here -->
            <li><a>Homepage</a></li>
            <li><a>Portfolio</a></li>
            <li><a>About</a></li>
        </ul>
    </div>
</div>
