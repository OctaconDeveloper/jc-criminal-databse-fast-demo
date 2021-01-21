@extends('layouts.app')
@section('content')
    <section class="u-clearfix u-grey-10 y-section-1" id="sec-6e5a">
        <div class="u-clearfix u-sheet y-sheet-1">
            <h4>
                Search Criminal Database by {{ucwords($type)}}
            </h4>
        </div>
    </section>
    <section class="u-align-center u-clearfix y-section-2" id="sec-c8d1">
        <div class="u-clearfix u-sheet y-sheet-1">
            @if ( $response == null || empty($response))

          <div class="u-form u-form-1">
            @if ($type == 'phone')
              <form action="/searchbyPhone" method="POST" style="padding: 15px;" >
                  @csrf
                  @include('layouts.errors')
                  @include('layouts.success')
                  <br/>
                  <div class="u-form-group u-form-name u-form-group-1" style="width: 80%">
                  <label for="name-6797" class="u-form-control u-label">Phone Number</label>
                  <input type="text" placeholder="Phone Number" id="name-6797" name="phone_number" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="">
                  </div>
                  <div class="u-align-left u-form-group u-form-submit u-form-group-2">
                  <button type="submit" class="u-btn u-btn-submit u-button-style">Search</button>
                  </div>
              </form>
                
            @else

              <form action="/searchbyName" method="POST" style="padding: 15px;" >
                  @csrf
                  @include('layouts.errors')
                  @include('layouts.success')
                  <br/>
                  <div class="u-form-group u-form-name u-form-group-1" style="width: 80%">
                  <label for="name-6797" class="u-form-control u-label">Name</label>
                  <input type="text" placeholder="Name" id="name-6797" name="name" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="">
                  </div>
                  <div class="u-align-left u-form-group u-form-submit u-form-group-2">
                  <button type="submit" class="u-btn u-btn-submit u-button-style">Search</button>
                  </div>
              </form> 
                 
            @endif
  
  

        </div>
            @else
                
            <div class="table-responsive" style="border: 0.02em solid black;  margin-top: 20px"> 
                <br/>
                <h4> Search Result </h4>
                <table class="table zero-configuration" style="width: 100%">
                    <thead>
                        <tr> 
                            {{-- <th>#</th> --}}
                            {{-- <th>Tag Number</th> --}}
                            <th>Last Name</th>
                            <th>Other Name</th>
                            <th>Sex</th>
                            <th>Phone</th>
                            <th></th>
                        </tr>
                    </thead> 
                    <tbody> 
                        @forelse ($response as $key => $item)
                            <tr >
                                {{-- <td style="border: 0.01em solid black">{{$key+1}}</td> --}}
                                {{-- <td style="border: 0.01em solid black">{{ $item->tag_number}}</td> --}}
                                <td style="border: 0.01em solid black">{{ ucfirst($item->last_name)}}</td>
                                <td style="border: 0.01em solid black">{{ ucwords($item->other_names)}}</td>
                                <td style="border: 0.01em solid black">{{ ucwords($item->sex)}}</td>
                                <td style="border: 0.01em solid black">{{ $item->phone_number }}</td>
                                <td style="border: 0.01em solid black">
                                    <a href="/viewresult/{{ $item->tag_number}}">
                                        See Result
                                    </a>
                                </td>
                            </tr>
                            
                        @empty
                        <tr >
                            <td style="border: 0.01em solid black" colspan="7">No Record Found</td>
                            
                        </tr>
                            
                        @endforelse
                    </tbody>
                 </table>
            </div> 

            @endif
          <div>
            
          </div>
        </div>
    </section>

@endsection