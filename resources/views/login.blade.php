@extends('layouts.app')
@section('content')


<section class="u-clearfix u-grey-10 u-section-1" id="sec-64d0">
    <div class="u-clearfix u-sheet u-sheet-1"></div>
  </section>
  <section class="u-align-center u-clearfix u-section-2" id="sec-a0f5">
    <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
      <div class="u-form u-form-1">
        <form action="/login" method="POST" style="padding: 15px;" >
            @csrf
            @include('layouts.errors')
            @include('layouts.success')
            <br/>
            <br/>
            <div class="u-form-group u-form-name u-form-group-1" style="width: 50%">
                <label for="name-6797" class="u-form-control u-label">Name</label>
                <input type="email" placeholder="Email" id="name-6797" name="email" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="">
            </div>
            <br/>
            <div class="u-form-email u-form-group u-form-group-2" style="width: 50%">
                <label for="email-6797" class="u-form-control u-label">Email</label>
                <input type="password" placeholder="Password" id="email-6797" name="password" class="u-border-1 u-border-grey-30 u-input u-input-rectangle" required="">
            </div>
            <div class="u-align-left u-form-group u-form-submit u-form-group-3">
                <button class="u-btn u-btn-submit u-button-style">Login</button>
            </div>
        </form>
      </div>
    </div>
  </section>
  

@endsection
