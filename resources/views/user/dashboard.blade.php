@extends('layouts.dash')
@section('title', $title)
@section('content')
<style>
    .bottom-primary {
        border-bottom: 4px solid var(--primary);
    }

    .bottom-dark {
        border-bottom: 4px solid var( --gray-dark);
    }

    .bottom-danger  {
        border-bottom: 4px solid var( --danger);
    }
</style>
<!-- Page title -->
<!-- <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Welcome, {{ Auth::user()->name }}!</h5>
            </div>
        </div>
    </div> -->


<x-danger-alert />
<x-success-alert />
<!-- @if ($settings->enable_annoc == "on" and !empty($settings->newupdate))
    <div class="row">
        <div class="col-12">
            <div class="alert alert-modern alert-primary">

                <span class="badge badge-primary badge-pill">
                    New
                </span>
                    <span class="alert-content">{{$settings->newupdate}}</span>
                </div>
        </div>
    </div>
   @endif -->
<div class="row">
    <div class="col-md-12">
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <!--<div class="alert alert-info w-100" role="alert">-->
                    <!--  Users are advised to withdraw weekly.-->
                    <!--</div>-->
                    <div class="col-12">
                        <div class="page-title">
                            <div class="row justify-content-between align-items-center">
                                <div class="mb-3 col-md-6 mb-md-0">
                                    <small>Welcome!</small>
                                    <h5 class="mb-0 text-gray h3 font-weight-400">{{ Auth::user()->name }}!</h5>
                                    <small>Here's a summary of your account have fun!</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats bottom-primary">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="mb-1 text-muted">Account balance</h6>
                                        <span class="mb-0 h5 font-weight-bold">{{ $settings->currency }}{{ number_format(Auth::user()->account_bal, 2, '.', ',') }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                            <i class="fas fa-sack-dollar"></i>
                                        </div>
                                    </div>
                                    <div class="card-action col-auto ml-2 mt-3">
                                        <div class="row">
                                            <a href="{{ route('deposits') }}" class="btn btn-sm btn-primary"><span>Deposit</span> <em class="fas fa-arrow-right ml-1"></em></a>
                                            <a href="{{ route('mplans') }}" class="btn btn-sm btn-dark"><span>Invest &amp; Earn</span> <em class=""></em></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats bottom-dark">

                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="mb-1 text-muted">Total Profit earned</h6>
                                        <span class="mb-0 h5 font-weight-bold">{{ $settings->currency }}{{ number_format(Auth::user()->roi, 2, '.', ',') }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                            <i class="fas fa-coins"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col">
                                        <h6 class="mb-1 text-muted">Total referral Bonus</h6>
                                        <span class="mb-0 h5 font-weight-bold">{{ $settings->currency }}{{ number_format(Auth::user()->ref_bonus, 2, '.', ',') }}</span>
                                        <br> <small><b>Note:</b> Referral bonus will automatically be added to your balance after the referral's first deposit.</small>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                            <i class="fas fa-gifts"></i>
                                        </div>
                                    </div>
                                </div>

                                <!-- <div class="row mt-1">
                                    <div class="col">
                                        <h6 class="mb-1 text-muted">Bonus</h6>
                                        <span class="mb-0 h5 font-weight-bold">{{ $settings->currency }}{{ number_format(Auth::user()->bonus, 2, '.', ',') }}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                            <i class="fas fa-gift"></i>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-4 col-md-6">
                        <div class="card card-stats bottom-danger">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h6 class="mb-1 text-muted">Total Deposit</h6>
                                        <span class="mb-0 h5 font-weight-bold">
                                            @foreach ($deposited as $deposited)
                                            @if (!empty($deposited->count))
                                            <span class="mb-0 h5 font-weight-bold ">{{ $settings->currency }}{{ number_format($deposited->count, 2, '.', ',') }}
                                            </span>
                                            @else
                                            <span class="mb-0 h5 font-weight-bold ">{{ $settings->currency }}0.00</span>
                                            @endif
                                            @endforeach
                                        </span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                            <i class="fas fa-arrow-alt-circle-down"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col">
                                        <h6 class="mb-1 text-muted">Total Withdrawal</h6>
                                        @foreach ($total_withdrawal as $deposited)
                                        @if (!empty($deposited->count))
                                        <span class="mb-0 h5 font-weight-bold">
                                            {{ $settings->currency }}{{ number_format($deposited->count, 2, '.', ',') }}
                                        </span>
                                        @else
                                        <span class="mb-0 h5 font-weight-bold ">{{ $settings->currency }}0.00</span>
                                        @endif
                                        @endforeach
                                    </div>
                                    <div class="col-auto">
                                        <div class="text-white icon bg-gradient-primary rounded-circle icon-shape">
                                            <i class="fas fa-arrow-circle-up"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

                {{-- Active Investment plans section --}}

                <div class="mt-4 row ">
                    <div class="col-12">
                        <div class="nk-block-head-content">
                            {{-- <h5 class="text-white h5 d-md-block d-none">Recent Plan(s) <span class="text-base count">(2)</span></h5> --}}
                            <h5 class="text-primary h5">Active Plan(s) <span class="text-base count">({{ count($plans) }})</span></h5>
                        </div>
                    </div>
                    <div class="col-12">
                        @forelse ($plans as $plan)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="py-4 card">
                                    <div class="card-body d-flex justify-content-between align-items-center">

                                        <div class="d-flex align-items-center">
                                            <span class="mr-1 mr fas fa-history fa-3x text-primary"></span>
                                            <div class="">
                                                <h6 class="text-black h6">{{ $plan->dplan->name }} -
                                                    {{ $plan->dplan->increment_interval }}
                                                    {{ $plan->dplan->increment_type == 'Fixed' ? $settings->currency : '' }}{{ $plan->dplan->increment_amount }}{{ $plan->dplan->increment_type == 'Percentage' ? '%' : '' }}
                                                    for {{ $plan->dplan->expiration }}
                                                </h6>
                                                <p class="text-muted">Invested Amount - <span class="amount">{{ $settings->currency }}{{ number_format($plan->amount) }}</span>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-none d-md-block">
                                            <div class="d-flex justify-content-around">
                                                <div class="mr-3">
                                                    <h6 class="text-black bold">
                                                        {{ $plan->created_at->toDayDateTimeString() }}
                                                    </h6>
                                                    <span class="nk-iv-scheme-value date">Start Date</span>
                                                </div>
                                                <i class="fas fa-arrow-right text-muted"></i>
                                                <div class="ml-3">
                                                    <h6 class="text-black bold">
                                                        {{ \Carbon\Carbon::parse($plan->expire_date)->toDayDateTimeString() }}
                                                    </h6>
                                                    <span class="nk-iv-scheme-value date">End Date</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-none d-md-block">
                                            <h6 class="text-black">
                                                @if ($plan->active == 'yes')
                                                <span class="badge badge-success">Active</span>
                                                @elseif($plan->active == 'expired')
                                                <span class="badge badge-danger">Expired</span>
                                                @else
                                                <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </h6>
                                            <span class="nk-iv-scheme-value amount">Status</span>
                                        </div>

                                        <a href="{{ route('plandetails', $plan->id) }}">
                                            <i class="fas fa-chevron-right fa-2x"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                        @empty
                        <div class="mt-4 row">
                            <div class="col-md-12">
                                <div class="py-4 card">
                                    <div class="text-center card-body">
                                        <p>You do not have an active investment plan at the moment.</p>
                                        <a href="{{ route('mplans') }}" class="px-3 btn btn-primary">Buy a
                                            plan</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                        @if (count($plans) > 0)
                        <div class="text-right">
                            <a href="{{ route('myplans', 'yes') }}"> <i class="fas fa-archive"></i> Go to my plans</a>
                        </div>
                        @endif
                    </div>
                </div>
                {{-- end of active investmet and purchase of investment plan --}}

                {{-- 10 Recent transaction begin --}}
                <div class="mt-4 row">
                    <div class="col-12">
                        <div class="nk-block-head-content">
                            <h6 class="text-primary h5">Recent transactions <span class="text-base count">({{ count($t_history) }})</span>
                            </h6>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-2 text-right">
                                    <a href="{{ route('accounthistory') }}"> <i class="fas fa-clipboard"></i> View
                                        all
                                        transactions</a>
                                </div>
                                <div class=" table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="bg-light">
                                                <th>Date</th>
                                                <th>Type</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($t_history as $item)
                                            <tr>
                                                <td>
                                                    {{ $item->created_at->toDayDateTimeString() }}
                                                </td>
                                                <td>
                                                    {{ $item->type }}
                                                </td>
                                                <td>
                                                    <span class="badge badge-secondary">
                                                        {{ $settings->currency }}{{ number_format((float)$item->amount)  }}</span>
                                                </td>
                                            </tr>
                                            @empty
                                            <td colspan="3">
                                                No record yet
                                            </td>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                {{-- end of recent transactions --}}

                <div class="mt-4 row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="text-black">Refer Us & Earn</h5>
                                <p>Use the below link to invite your friends and start withdrawing your referral bonus immediately.</p>
                                <div class="mb-3 input-group">
                                    <input type="text" class="form-control myInput readonly" value="{{ Auth::user()->ref_link }}" id="reflink" readonly>
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-primary" onclick="myFunction()" type="button">
                                            <i class="fas fa-copy"></i>
                                        </button>
                                    </div>
                                </div>
                                <!--<small>Refer and start withdrawing your referral bonus immediately</small>-->
                            </div>
                        </div>
                    </div>
                </div>
                {{--
                    <div class="mt-4 row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="text-black">Live Market Data</h5>
                                    @include('includes.chart')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
            </div>
        </div>
    </div>
</div>

@endsection
