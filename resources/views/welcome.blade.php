@extends('layouts.app')
@section('content')

      
<section class="u-align-center u-clearfix u-palette-1-dark-1 u-section-1" id="sec-65a4">
    <div class="u-clearfix u-sheet u-sheet-1">
      <h3 class="u-text u-text-1">FINAL YEAR PROJECT BY<br>NGWE CHINEDUM JIDEOFOR<br>NAITES/COM/HND19/000
      </h3>
    </div>
  </section>
  <section class="u-align-center-xs u-clearfix u-grey-15 u-section-2" id="sec-f89a">
    <div class="u-clearfix u-expanded-width u-gutter-0 u-layout-wrap u-layout-wrap-1">
      <div class="u-gutter-0 u-layout">
        <div class="u-layout-col">
          <div class="u-size-30">
            <div class="u-layout-row">
              <div class="u-align-center u-container-style u-image u-layout-cell u-left-cell u-size-20 u-image-1">
                <div class="u-container-layout u-valign-middle u-container-layout-1"></div>
              </div>
              <div class="u-container-style u-layout-cell u-size-20 u-white u-layout-cell-2">
                <div class="u-container-layout u-container-layout-2">
                  <img src="{{ asset('home_assets/images/images.png') }}" alt="" class="u-image u-image-round u-preserve-proportions u-radius-10 u-image-2" data-image-width="225" data-image-height="225">
                  <h6 class="u-align-center u-text u-text-1">SEARCH BY <br/> PHOTO</h6>
                  <a href="/search_photo" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-50 u-btn-1">Search</a>
                </div>
              </div>
              <div class="u-align-center u-container-style u-image u-layout-cell u-right-cell u-size-20 u-image-3">
                <div class="u-container-layout u-valign-middle u-container-layout-3"></div>
              </div>
            </div>
          </div>
          <div class="u-size-30">
            <div class="u-layout-row">
              <div class="u-container-style u-layout-cell u-left-cell u-size-20 u-white u-layout-cell-4">
                <div class="u-container-layout u-container-layout-4">
                  <img src="{{ asset('home_assets/images/images.png') }}" alt="" class="u-image u-image-round u-preserve-proportions u-radius-10 u-image-4" data-image-width="225" data-image-height="225">
                  <h6 class="u-align-center u-text u-text-2">SEARCH BY <br/> NAME</h6>
                  <a href="/search/name" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-50 u-btn-2">Search</a>
                </div>
              </div>
              <div class="u-align-center u-container-style u-image u-layout-cell u-size-20 u-image-5">
                <div class="u-container-layout u-valign-middle u-container-layout-5"></div>
              </div> 
              <div class="u-container-style u-layout-cell u-right-cell u-size-20 u-white u-layout-cell-6">
                <div class="u-container-layout u-container-layout-6">
                  <img src="{{ asset('home_assets/images/images.png') }}" alt="" class="u-image u-image-round u-preserve-proportions u-radius-10 u-image-6" data-image-width="225" data-image-height="225">
                  <h6 class="u-align-center u-text u-text-3">SEARCH BY <br/> PHONE NUMBER
                  </h6>
                  <a href="/search/phone" class="u-border-2 u-border-hover-palette-1-base u-border-palette-1-base u-btn u-btn-round u-button-style u-hover-palette-1-base u-none u-radius-50 u-btn-3">Search</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection 