<div class="container-xxl">

    <ul class="nav nav-tabs">
        <li class="nav-item" style="cursor: pointer;">
            <a class="nav-link {{ $activeTab == 'profileTab' ? 'active' : '' }}" aria-current="page"
                wire:click='changeTab("profileTab")'>Profile</a>
        </li>
        <li class="nav-item" style="cursor: pointer;">
            <a class="nav-link {{ $activeTab == 'orderTab' ? 'active' : '' }}"
                wire:click='changeTab("orderTab")'>Orders</a>
        </li>

    </ul>


    <div class="tab-content my-5">
        <div class="tab-pane fade {{ $activeTab == 'profileTab' ? 'show active' : '' }}" id="profileTab" role="tabpanel"
            aria-labelledby="profile-tab">
            <livewire:profile.account>
        </div>
        <div class="tab-pane fade {{ $activeTab == 'orderTab' ? 'show active' : '' }}" id="orderTab" role="tabpanel"
            aria-labelledby="order-tab">
            <livewire:profile.orders :orders="$orders">
        </div>

    </div>

</div>
