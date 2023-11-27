@php
if (Auth::user()->dashboard_style == 'light') {
    $bgmenu = 'blue';
    $bg = 'light';
    $text = 'dark';
} else {
    $bgmenu = 'dark';
    $bg = 'dark';
    $text = 'light';
}
@endphp
@extends('layouts.app')
@section('content')
    @include('user.topmenu')
    @include('user.sidebar')
    <div class="main-panel bg-{{ $bg }}">
        <div class="content bg-{{ $bg }}">
            <div class="page-inner">
                <div class="mt-2 mb-4">
                    <h1 class="title1 text-{{ $text }} d-inline">Swapping History</h1>
                    <div class="d-inline">
                        <a class="float-right btn btn-primary btn-sm" href="{{route('assetbalance')}}"> <i class="fa fa-arrow-left"></i> back</a> 
                    </div>
                </div>
                <x-danger-alert />
                <x-success-alert />

                <div class="row mb-5 card shadow bg-{{ $bg }} p-4 ">
                    <div class="col-12">
                        <div class="table-responsive" data-example-id="hoverable-table">
                            <table id="UserTable" class="table table-hover text-{{ $text }}">
                                <thead>
                                    <tr>
                                        <th>Source</th>
                                        <th>Destination</th>
                                        <th>Amount(src)</th>
                                        <th>Quantity(dest)</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($transactions as $tran)
                                    <tr>
                                        <td>{{$tran->source}}</td>
                                        <td>{{$tran->dest}}</td>
                                        <td>{{round($tran->amount, 6)}}</td>
                                        <td>{{round($tran->quantity, 6)}}</td>
                                        <td>{{\Carbon\Carbon::parse($tran->created_at)->toDayDateTimeString()}}</td>
                                        
                                    	</tr>
									@empty
										<tr>
											<td colspan="14" class="text-center">No record available</td>
										</tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div>
                            {{$transactions->links()}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    @endsection
