@inject('uc', 'App\Http\Controllers\User\UsersController')
@php
    $array = \App\Models\User::all();
    $usr = Auth::user()->id;
@endphp
@extends('layouts.dash')
@section('title', $title)
@section('content')
    <!-- Page title -->
    <div class="page-title">
        <div class="row justify-content-between align-items-center">
            <div class="mb-3 col-md-6 mb-md-0">
                <h5 class="mb-0 text-white h3 font-weight-400">Refer users to {{$settings->site_name}} community</h5>
            </div>
        </div>
    </div>
    <x-danger-alert/>
	<x-success-alert/>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="p-3 text-center shadow-lg col-md-12 card ">
                            <div class="p-4 row">
                                <div class="col-md-8 offset-md-2">
                                    <strong>You can refer users by sharing your referral link:</strong><br>
                                    <div class="mb-3 input-group">
                                        <input type="text" class="form-control readonly " value="{{Auth::user()->ref_link}}" id="reflink" readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" onclick="myFunction()" type="button" id="button-addon2"><i class="fas fa-copy"></i></button>
                                        </div>
                                    </div>
    
                                    <strong>or your Referral ID</strong><br>
                                    <h4 class="text-success"> {{Auth::user()->username}}</h4> <br>
                                    <h3 class="title1">
                                        <small>You were referred by</small><br>
                                        <i class="fa fa-user fa-2x"></i><br>
                                        <small>{{$uc->getUserParent($usr)}}</small>
                                    </h3>
                                </div>
                                <div class="mt-4 col-md-12">
                                    <h6 class="text-left title1">Your Referrals.</h6>
                                    <div class="table-responsive"> 
                                        <table class="table UserTable table-hover "> 
                                            <thead> 
                                                <tr> 
                                                    <th>Client name</th>
                                                    <th>Ref. level</th>
                                                    <th>Parent</th>
                                                    <th>Client status</th>
                                                    <th>Date registered</th>
                                                </tr>
                                            </thead> 
                                            <tbody> 
                                                {!! $uc->getdownlines($array,$usr) !!}
                                            </tbody> 
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
@endsection

