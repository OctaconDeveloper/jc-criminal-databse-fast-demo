@extends('admin.layouts.app')
@section('content')
@php
    $offence_array = \App\Models\OffenceCategory::all();
@endphp

<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row"></div>
        <div class="content-body">
            <section id="basic-vertical-layouts"> 
                <div class="row match-height">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Criminal Profile</h4>
                            </div> 
                            <div class="card-content">
                                <div class="card-body"> 
                                    <form class="form form-vertical" method="post" action="/savecriminal" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    @include('layouts.errors')
                                                    @include('layouts.success')
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Last Name</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="first-name-icon" class="form-control" name="last_name" placeholder="First Name">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Other Name</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="last-name-icon" class="form-control" name="other_names" placeholder="Last Name">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="email-id-icon">Sex</label>
                                                        <div class="position-relative has-icon-left">
                                                            <select name="sex" class="form-control">
                                                                <option value="Female">Female</option>
                                                                <option value="Male">Male</option>
                                                            </select>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Phone Number</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="last-name-icon" class="form-control" name="phone_number" placeholder="Phone Number">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Date of Birth</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="date" id="last-name-icon" class="form-control" name="date_of_birth" placeholder="Date of Birth">
                                                            <div class="form-control-position">
                                                                <i class="fa fa-calendar"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">LGA of Origin</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="last-name-icon" class="form-control" name="lga_of_origin" placeholder="LGA of Origin">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-map-pin"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">State of Origin</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="text" id="last-name-icon" class="form-control" name="state_of_origin" placeholder="State of Origin">
                                                            <div class="form-control-position">
                                                                <i class="feather icon-map-pin"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Profile Picture</label>
                                                        <div class="position-relative has-icon-left">
                                                            <input type="file" id="last-name-icon" class="form-control" name="profile_picture" required />
                                                            <div class="form-control-position">
                                                                <i class="feather icon-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Address of Resident</label>
                                                        <div class="position-relative has-icon-left">
                                                            <textarea class="form-control" name="address" placeholder="Address of Resident" rows="5"></textarea>
                                                            <div class="form-control-position">
                                                                <i class="feather icon-map-pin"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label for="first-name-icon">Offences</label>
                                                        <div class="position-relative has-icon-left" style="padding: 5px">
                                                            @forelse ($offence_array as $item)
                                                                <input type="checkbox" name="offences[]" value="{{$item->id}}" style="padding: 5px; font-weight:bolder" /> {{$item->name}}
                                                                @empty
                                                                
                                                            @endforelse 
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                                    <button type="reset" class="btn btn-outline-warning mr-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
</div>
    

@endsection