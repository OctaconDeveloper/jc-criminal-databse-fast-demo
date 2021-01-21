@extends('admin.layouts.app')
@section('content')


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
                                <h4 class="card-title">Criminal Profiles</h4>
                            </div>
                            <div class="card-content">
                                <div class="card-body"> 
                                    <div class="table-responsive">
                                        <table class="table zero-configuration">
                                            <thead>
                                                <tr> 
                                                    <th>#</th>
                                                    <th>Tag Number</th>
                                                    <th>Last Name</th>
                                                    <th>Other Name</th>
                                                    <th>Sex</th>
                                                    <th>Phone Number</th>
                                                    <th>Date of Birth</th>
                                                    <th>LGA of Origin</th>
                                                    <th>State of Origin</th>
                                                    <th>Address</th>
                                                    <th>Offences</th>
                                                    <th>Image</th>
                                                    <th></th>
                                                </tr>
                                            </thead> 
                                            <tbody> 
                                                @forelse ($criminal_profiles as $key => $item)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{ $item->tag_number}}</td>
                                                        <td>{{ ucfirst($item->last_name)}}</td>
                                                        <td>{{ ucwords($item->other_names)}}</td>
                                                        <td>{{ ucwords($item->sex)}}</td>
                                                        <td>{{ $item->phone_number }}</td>
                                                        <td>{{ ucwords($item->date_of_birth)}}</td>
                                                        <td>{{ ucwords($item->lga_of_origin)}}</td>
                                                        <td>{{ ucwords($item->state_of_origin)}}</td>
                                                        <td>{{ ucwords($item->address)}}</td>
                                                        <td>
                                                            @forelse ($item->offences as $key => $wahala)
                                                               {{$key+1}}. {{ ucwords($wahala->offence->name)}} <br/>
                                                            @empty
                                                                  
                                                            @endforelse
                                                        <td><img src="{{$item->photo->image_path}}" width="30" height="30" /></td>
                                                        @if (isSuperAdmin())
                                                            <td>
                                                                <a href="/deletecriminalprofile/{{ $item->id}}">
                                                                    <button class="btn-sm btn btn-danger" title="Delete {{ ucfirst($item->last_name) }}">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </a>
                                                            </td>
                                                        @endif
                                                         
                                                    </tr>
                                                    
                                                @empty
                                                    
                                                @endforelse
                                            </tbody>
                                         </table>
                                    </div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div> 

@endsection