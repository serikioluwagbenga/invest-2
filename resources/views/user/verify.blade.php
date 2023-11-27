
@extends('layouts.dash')
@section('title', $title)
@section('content')
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Account Verification</h5>
            </div>
        </div>
    </div>
    <x-danger-alert/>
	<x-success-alert/>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-5 row">
                        <div class="p-4 shadow-lg col-lg-8 offset-lg-2 card ">
                            <div class="py-3">
                                <h5 class="">KYC verification - Upload documents below to get verified.</h5>
                            </div>
                            <form role="form" method="post" action="{{route('kycsubmit')}}"  enctype="multipart/form-data">
                                <label>Valid identity card. (e.g. Drivers licence, international passport or any government approved document).</label>
                                <input type="file" class="form-control " name="idcard" required><br>
                                <label class="">Passport photogragh</label>

                                <input type="file" class="form-control " name="passport" required><br>
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                @if (Auth::user()->account_verify == "Under review" or Auth::user()->account_verify == "Verified")
                                <button type="submit" class="btn btn-primary" disabled>
                                    Submit documents
                                   </button>
                                @else
                                <button type="submit" class="btn btn-primary">
                                    Submit documents
                                   </button>
                                @endif
                              
                           </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection
