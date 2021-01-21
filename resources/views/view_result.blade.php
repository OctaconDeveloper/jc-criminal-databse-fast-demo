@extends('layouts.app')
@section('content')
<section class="u-clearfix u-section-1" id="sec-c8aa">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h3 class="u-text u-text-default u-text-1">SEARCH RESULT</h3>
      <div class="display:inline-flex">
          <div style="float: left; width:30%">
            <img src="{{ $response->photo->image_path}}" alt="{{ $response->last_name}}" class="u-image u-image-round u-radius-10 u-image-1" width="320" height="320">
        </div>
        <div class="u-table u-table-responsive u-table-1" style="float: right; width:70%">
            <table class="u-table-entity">
            <colgroup>
                <col width="20%">
                <col width="50%">
            </colgroup>
            <tbody class="u-table-body">
                <tr style="height: 28px;">
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell">Name</td>
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell"></td>
                </tr>
                <tr style="height: 46px;">
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell">Sex</td>
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell"> {{ ucwords($response->sex) }} </td>
                </tr>
                <tr style="height: 46px;">
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell">Phone</td>
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell"> {{ ucwords($response->phone_number) }} </td>
                </tr>
                <tr style="height: 46px;">
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell">Date of Birth</td>
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell"> {{ ucwords($response->date_of_birth) }}</td>
                </tr>
                <tr style="height: 46px;">
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell">LGA of Origin</td>
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell"> {{ ucwords($response->lga_of_origin) }} </td>
                </tr>
                <tr style="height: 46px;">
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell">State of Origin </td>
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell"> {{ ucwords($response->state_of_origin) }} </td>
                </tr>
                <tr style="height: 46px;">
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell">Address </td>
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell"> {{ ucwords($response->address) }} </td>
                </tr>
                <tr style="height: 46px;">
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell">Offences </td>
                    <td class="u-border-1 u-border-grey-dark-1 u-table-cell"> 
                        @forelse ($response->offences as $key => $item)
                                {{$key+1}}. {{ ucwords($item->offence->name)}} <br/>
                        @empty
                            
                        @endforelse
                    </td>
                </tr>
            </tbody>
            </table>
        </div>
      </div>
      <br/>
      <br/>
      <br/>
      <br/>
    </div>
    <br/>
    <br/>
    <br/>
    <br/>
  </section>
@endsection