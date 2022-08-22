<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <title> BIP - SLS </title>
      <meta name="description" content="Gaisano Malls Tenant Portal" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!--begin::Fonts-->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
      <!--begin::Global CSS-->
      <link rel="stylesheet" href="{{ asset('/css/globals/plugins.bundle.css')}}" async>
      <link rel="stylesheet" href="{{ asset('/css/globals/prismjs.bundle.css')}}" async>
      <link rel="stylesheet" href="{{ asset('/css/globals/style.bundle.min.css')}}" async>
      @once
      @stack('styles')
      @endonce
      <!--end::Global CSS-->
   </head>
   <body id="kt_body" class="header-fixed header-mobile-fixed page-loading">
      <!--begin::Main-->
      <!--begin::Header Mobile-->
      <div id="kt_header_mobile" class="header-mobile bg-primary header-mobile-fixed">
         <!--begin::Logo-->
         <a href="/admin/dashboard">
         <img alt="Logo" src="{{asset('/assets/images/GaisanoMalls-White.png')}}" class="max-h-30px" />
         {{-- Logo for Mobile View --}}
         </a>
         <!--end::Logo-->

         <!--begin::Toolbar-->
         <div class="d-flex align-items-center">
            <button class="btn p-0 burger-icon burger-icon-left ml-4" id="kt_header_mobile_toggle">
            <span></span>
            </button>

         </div>
         <!--end::Toolbar-->
      </div>
      <!--end::Header Mobile-->
      <div class="d-flex flex-column flex-root">
         <!--begin::Page-->
         <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
               <!--begin::Header-->
               <div id="kt_header" class="header flex-column header-fixed">
                  <!--begin::Top-->
                  <div class="header-top">
                     <!--begin::Container-->
                     <div class="container">
                        <!--begin::Left-->
                        <div class="d-none d-lg-flex align-items-center mr-3">
                           <!--begin::Logo-->
                           <a href="/admin/dashboard" class="mr-20">
                            <img alt="Logo" src="{{asset('/assets/images/GaisanoMalls-White.png')}}" class="max-h-30px" />

                           {{-- Logo For Desktop view --}}
                           </a>
                           <!--end::Logo-->
                        </div>
                        <!--end::Left-->
                     </div>
                     <!--end::Container-->
                  </div>
                  <!--end::Top-->
                  <!--begin::Bottom-->
                  <div class="header-bottom">
                     <!--begin::Container-->
                     <div class="container">
                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                           <!--begin::Header Menu-->
                           <div id="kt_header_menu" class="header-menu header-menu-left header-menu-mobile header-menu-layout-default">
                              <!--begin::Header Nav-->
                              <ul class="menu-nav">
                                 <li class="menu-item menu-item-submenu menu-item-rel {{Request::routeIs('bip.index') ? ' menu-item-here' : ''}}" >
                                    <a href="{{route('bip.index')}}" class="menu-link active">
                                    <span class="menu-text">Barcode Interface Program</span>
                                    {{-- <span class="menu-desc">Barcode Interface Program</span> --}}
                                    </a>
                                 </li>
                                 <li class="menu-item menu-item-submenu menu-item-rel {{Request::routeIs('sls.index') ? ' menu-item-here' : ''}}">
                                    <a href="{{route('sls.index')}}" class="menu-link">
                                    <span class="menu-text">Shelf Label System</span>
                                    {{-- <span class="menu-desc">Shelf Label System</span> --}}
                                    </a>
                                 </li>
                              </ul>
                              <!--end::Header Nav-->
                           </div>
                           <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                     </div>
                     <!--end::Container-->
                  </div>
                  <!--end::Bottom-->
               </div>
               <!--end::Header-->
               <!--begin::Content-->
               <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                  <!--begin::Entry-->
                  <div class="d-flex flex-column-fluid">
                     <!--begin::Container-->
                     @yield('content')
                     <!--end::Container-->
                  </div>
                  <!--end::Entry-->
               </div>
               <!--end::Content-->
            </div>
            <!--end::Wrapper-->
         </div>
         <!--end::Page-->
      </div>
      <!--end::Main-->
      <!--begin::Scrolltop-->
      <div id="kt_scrolltop" class="scrolltop">
         <span class="svg-icon">
            <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
               <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                  <polygon points="0 0 24 0 24 24 0 24" />
                  <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                  <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero" />
               </g>
            </svg>
            <!--end::Svg Icon-->
         </span>
      </div>
      <!--end::Scrolltop-->
      <!--begin::Global Theme Bundle(used by all pages)-->
      <script src="{{mix('/js/app.js')}}" ></script>
      <script src="{{ asset('/js/globals/plugins.bundle.js')}}" ></script>
      <script src="{{ asset('/js/globals/prismjs.bundle.js')}}" ></script>
      <script src="{{ asset('/js/globals/scripts.bundle.min.js')}}" ></script>
      <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.5/dist/JsBarcode.all.min.js"></script>
      {{-- <script src="{{ asset('/js/globals/js_barcode.min.js')}}" ></script> --}}
      <!--end::Global Theme Bundle-->
      @once
        @stack('scripts')
      @endonce
   </body>
</html>

