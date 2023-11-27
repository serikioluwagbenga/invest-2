<style>
    .nk-sidebar-menu {
        margin-left: -40px!important;
    }
    .nk-sidebar-menu li {
        list-style: none;
    }

    .nk-sidebar-menu li a {
        color: var(--gray-dark);
    }

    ul.nk-menu{
        margin: 0!important;
    }

    .nk-menu-item {
        margin-top: 12px;
    }
    ul.nk-menu .nk-menu-icon {
        font-size: 10px;
        margin-right: 10px;
        color: var(--gray-dark);
    }

    ul.nk-menu .nk-menu-text {
        font-size: 18px!important;
        font-weight: bolder;
    }

    .overline-title {
        text-transform: uppercase;
        font-size: 12px;
    }
    .active .nk-menu-text, .active .nk-menu-icon{
        color: var(--primary-dark)!important;
    }
</style>
<!-- Sidenav -->
<div class="sidenav" id="sidenav-main">
    <!-- Sidenav header -->
    <div class="sidenav-header d-flex align-items-center">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <img src="{{ asset('storage/app/public/'. $settings->logo) }}" class="navbar-brand-img" alt="logo">
        </a>
        <div class="ml-auto">
            <!-- Sidenav toggler -->
            <div class="sidenav-toggler sidenav-toggler-dark d-md-none" data-action="sidenav-unpin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                    <i class="bg-white sidenav-toggler-line"></i>
                    <i class="bg-white sidenav-toggler-line"></i>
                    <i class="bg-white sidenav-toggler-line"></i>
                </div>
            </div>
        </div>
    </div>
    <!-- User mini profile -->
    <div class="text-center sidenav-user d-flex flex-column align-items-center justify-content-between">
        <!-- Avatar -->
        <div>
            <a href="#" class="avatar rounded-circle avatar-xl">
                <i class="fas fa-user-circle fa-4x"></i>
            </a>
            <div class="mt-4">
                <h5 class="mb-0 text-white"> {{ Auth::user()->name }}</h5>
                <span class="mb-3 text-sm text-white d-block opacity-8">online</span>
                <a href="#" class="shadow btn btn-sm btn-white btn-icon rounded-pill hover-translate-y-n3">
                    <span class="btn-inner--icon"><i class="far fa-coins"></i></span>
                    <span class="btn-inner--text">{{ $settings->currency  }}{{ number_format(Auth::user()->account_bal, 2, '.', ',') }}</span>
                </a>
            </div>
        </div>
        <!-- User info -->
        <!-- Actions -->
        <div class="mt-4 w-100 actions d-flex justify-content-between">
            {{-- <a href="{{ route('profile') }}" class="pl-0 text-white action-item action-item-lg">
            <i class="far fa-user"></i>
            </a> --}}
            {{-- <a href="#modal-chat" class="text-white action-item action-item-lg" data-toggle="modal">
                <i class="far fa-comment-alt"></i>
            </a>
            <a href="shop/invoices.html" class="pr-0 text-white action-item action-item-lg">
                <i class="far fa-receipt"></i>
            </a> --}}
        </div>
    </div>

    <div class="nk-sidebar-menu mt-5">
        <ul class="nk-menu">
            <li class="nk-menu-heading">
                <h6 class="overline-title">Menu</h6>
            </li>
            <li class="nk-menu-item {{ (request()->routeIs('dashboard')) ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="nk-menu-link" data-original-title="" title="">
                    <span class="nk-menu-icon"><em class="far fa-home fa-2x"></em></span>
                    <span class="nk-menu-text">Dashboard</span>
                </a>
            </li>
            <li class="nk-menu-item {{ (request()->routeIs('accounthistory')) ? 'active' : '' }}">
                <a href="{{ route('accounthistory') }}" class="nk-menu-link" data-original-title="" title="">
                    <span class="nk-menu-icon"><em class="fas fa-money-check-alt fa-2x"></em></span>
                    <span class="nk-menu-text">Transaction</span>
                </a>
            </li>
            <li class="nk-menu-item {{ (request()->routeIs('deposits')) ? 'active' : '' }}">
                <a href="{{ route('deposits') }}" class="nk-menu-link" data-original-title="" title="">
                    <span class="nk-menu-icon"><em class="far fa-download fa-2x"></em></span>
                    <span class="nk-menu-text">Deposit</span>
                </a>
            </li>
            <li class="nk-menu-item {{ (request()->routeIs('withdrawalsdeposits')) ? 'active' : '' }}">
                <a href="{{ route('withdrawalsdeposits') }}" class="nk-menu-link" data-original-title="" title="">
                    <span class="nk-menu-icon"><em class="fas fa-arrow-alt-circle-up fa-2x"></em></span>
                    <span class="nk-menu-text">Withdraw</span>
                </a>
            </li>
            <li class="nk-menu-item {{ (request()->routeIs('mplans')) ? 'active' : '' }}">
                <a href="{{ route('mplans') }}" class="nk-menu-link" data-original-title="" title="">
                    <span class="nk-menu-icon"><em class="fas fa-hand-holding-seedling fa-2x"></em></span>
                    <span class="nk-menu-text">Trading Plans</span>
                </a>
            </li>
            <li class="nk-menu-item {{ (request()->routeIs('myplans')) ? 'active' : '' }}">
                <a href="{{ route('myplans', 'All') }}" class="nk-menu-link" data-original-title="" title="">
                    <span class="nk-menu-icon"><em class="far fa-hand-holding-seedling fa-2x"></em></span>
                    <span class="nk-menu-text">My Plans</span>
                </a>
            </li>
            <li class="nk-menu-item {{ (request()->routeIs('profile')) ? 'active' : '' }}">
                <a href="{{ route('profile') }}" class="nk-menu-link" data-original-title="" title="">
                    <span class="nk-menu-icon"><em class="fas fa-address-card fa-2x"></em></span>
                    <span class="nk-menu-text">My Profile</span>
                </a>
            </li>
            <li class="nk-menu-item {{ (request()->routeIs('referuser')) ? 'active' : '' }}">
                <a href="{{ route('referuser') }}" class="nk-menu-link" data-original-title="" title="">
                    <span class="nk-menu-icon"><em class="fas fa-retweet fa-2x"></em></span>
                    <span class="nk-menu-text">Referrals</span>
                </a>
            </li>
            <li class="nk-menu-heading mt-4">
                <h6 class="overline-title">Additional</h6>
            </li>

            <li class="nk-menu-item mb-5">
                <a href="{{ route('support') }}" class="nk-menu-link" data-original-title="" title="">
                    <span class="nk-menu-text">Contact Us</span>
                </a>
            </li>
        </ul>
    </div>
</div>
