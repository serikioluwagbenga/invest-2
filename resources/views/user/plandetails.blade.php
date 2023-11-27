@extends('layouts.dash')
@section('title', $title)
@section('content')
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Your {{ $plan->dplan->name }} Plan</h5>
            </div>
        </div>
    </div>
    <x-danger-alert />
    <x-success-alert />
    <div class="mt-3 row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <p> <a href="{{ route('myplans', 'All') }}"><i
                                    class="p-2 rounded-lg fal fa-arrow-circle-left fa-2x bg-light"></i> </a> </p>
                        <h2 class="text-black">
                            {{ $plan->dplan->name }} - 
                            {{ $plan->dplan->increment_type == 'Fixed' ? $settings->currency : '' }}{{ $plan->dplan->increment_amount }}{{ $plan->dplan->increment_type == 'Percentage' ? '%' : '' }} {{ $plan->dplan->increment_interval }}
                            for {{ $plan->dplan->expiration }}
                        </h2>
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                @if ($plan->active == 'yes')
                                    <span class="badge badge-success">Active</span>
                                @elseif($plan->active == 'expired')
                                    <span class="badge badge-danger">Expired</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </div>
                            
                            @if ($plan->active == 'yes')
                                <!--<a href="#" class="px-3 btn btn-danger btn-sm" data-toggle="modal"-->
                                <!--    data-target="#exampleModal"> <i class=" fas fa-times"></i> Cancel this Plan</a>-->

                                <!-- cancel plan modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">cancel plan</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                               Are you sure you want to cancel your {{ $plan->dplan->name }} plan?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                
                                                <a href="{{ route('cancelplan', $plan->id) }}" type="button" class="btn btn-danger">Cancel</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                    <hr>
                    <div class="mt-5">
                        <div>
                                <p>Apply for a Roll Over after one week of trading.</p>
                                <b>What does Roll Over mean.</b> <br>
                                <small>This is when you want your daily or weekly profits to be added to your capital and used for trading the next day.</small>
                            </div>
                        <h4 class="mb-3">Plan information</h4>
                        <div class="mb-5 row">
                            <div class="col-12">
                                <div class="d-flex justify-content-around">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h2 class="m-0">
                                                {{ $settings->currency }}{{ number_format($plan->amount) }} + &nbsp;
                                            </h2>
                                            <small>Invested amount</small>
                                        </div>
                                        <div>
                                            <h2 class="m-0 text-success">
                                                {{ $settings->currency }}{{ number_format($plan->profit_earned) }}
                                            </h2>
                                            <small>Profit earned</small>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="row border-bottom">
                            <div class="col-md-3">
                                <p>Duration: <br><strong>{{ $plan->dplan->expiration }}</strong> </p>
                            </div>
                            <div class="col-md-3">
                                <p>Start Date: <br> <strong>{{ $plan->created_at->toDayDateTimeString() }}</strong> </p>
                            </div>
                            <div class="col-md-3">
                                <p>End Date:
                                    <br><strong>{{ \Carbon\Carbon::parse($plan->expire_date)->toDayDateTimeString() }}</strong>
                                </p>
                            </div>
                        </div>
                        <div class="mt-4 row border-bottom">
                            
                            <div class="col-md-3">
                                <p>End Date:
                                    <br><strong>{{ \Carbon\Carbon::parse($plan->expire_date)->toDayDateTimeString() }}</strong>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="mt-5 ">
                        <h4>
                            Transactions
                        </h4>
                        <div class="table-responsive">
                            <table class="table table-hover ">
                                <thead class="bg-light">
                                    <tr>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($transactions as $history)
                                        <tr>
                                            <td>Profit</td>
                                            <td>{{ $history->created_at }}</td>
                                            <td>{{ $settings->currency }}{{ number_format($history->amount) }}</td>
                                        </tr>
                                    @empty
                                        <tr class="text-center">
                                            <td colspan="3">No transaction record yet</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{ $transactions->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
