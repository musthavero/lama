<div>
    <div>
        <div class="grid m-5 grid-cols-1 lg:grid-cols-3">
            <div class="my-4 align-top p-3">
                <livewire:menus::menus-list/>
            </div>
            <div class="lg:border-l-2 my-4 align-top p-3 lg:col-span-2">
                <livewire:menus::menu-items-list :activeMenu="$activeMenu"/>
            </div>
        </div>
    </div>
</div>
