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
            <button class="btn p-0 ml-2" id="kt_header_mobile_topbar_toggle">
               <span class="svg-icon svg-icon-xl">
                  <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                     <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24" />
                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                     </g>
                  </svg>
                  <!--end::Svg Icon-->
               </span>
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
                                 <li class="menu-item menu-item-submenu menu-item-rel menu-item-here" >
                                    <a href="" class="menu-link active">
                                    <span class="menu-text">BIP</span>
                                    {{-- <span class="menu-desc">Latest Updates</span> --}}
                                    </a>
                                 </li>
                                 <li class="menu-item menu-item-submenu menu-item-rel" >
                                    <a href="" class="menu-link">
                                    <span class="menu-text">SLS</span>
                                    <span class="menu-desc">Shelf Label System</span>
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
      <!-- begin::User Panel-->
      <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
         <!--begin::Header-->
         <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0">User Profile
               <small class="text-muted font-size-sm ml-2"></small>
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
            <i class="ki ki-close icon-xs text-muted"></i>
            </a>
         </div>
         <!--end::Header-->
         <!--begin::Content-->
         <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
               <div class="symbol symbol-100 mr-5">
                  {{-- <div class="symbol-label" style="background-image:url('{{asset('/assets/images/blank.png')}}')"></div> --}}
                  <div class="symbol-label" style="background-image:url('{{asset('/assets/images/blank.png')}})'"></div>
                  {{-- <div class="symbol-label" style="background-image:url('{{asset('/profile/'.Auth::user()->people->id.'/'.Auth::user()->people->image)}}')"></div> --}}
               </div>
               <div class="d-flex flex-column">
                  <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary"></a>
                  <div class="text-muted mt-1"></div>
                  <div class="navi mt-2">
                     <a href="#" class="navi-item" >
                        <span class="navi-link p-0 pb-2 d-flex" style="flex-wrap:wrap;">
                           <span class="navi-icon mr-1">
                              <span class="svg-icon svg-icon-lg svg-icon-primary">
                                 <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                 <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                       <rect x="0" y="0" width="24" height="24" />
                                       <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                                       <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                                    </g>
                                 </svg>
                                 <!--end::Svg Icon-->
                              </span>
                           </span>
                           <span class="navi-text text-muted text-hover-primary"></span>
                        </span>
                     </a>
                     <a href="" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
                  </div>
               </div>
            </div>
            <!--end::Header-->
            <!--begin::Separator-->
            <div class="separator separator-dashed mt-8 mb-5"></div>
            <!--end::Separator-->
            <!--begin::Nav-->
            <div class="navi navi-spacer-x-0 p-0">
               <!--begin::Item-->
               <a href="" class="navi-item">
                  <div class="navi-link">
                     <div class="symbol symbol-40 bg-light mr-3">
                        <div class="symbol-label">
                           <span class="svg-icon svg-icon-md svg-icon-danger">
                              <!--begin::Svg Icon-->
                              <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
                                    <circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
                                 </g>
                              </svg>
                              <!--end::Svg Icon-->
                           </span>
                        </div>
                     </div>
                     <div class="navi-text">
                        <div class="font-weight-bold">My Profile</div>
                        <div class="text-muted">Personal Information & Credentials
                           <span class="label label-light-danger label-inline font-weight-bold">View & Update</span>
                        </div>
                     </div>
                  </div>
               </a>
               <!--end:Item-->
            </div>
            <!--end::Nav-->
            <!--begin::Separator-->
            <div class="separator separator-dashed my-7"></div>
            <!--end::Separator-->
            <!--begin::Notifications-->
            <div>
               <!--begin:Heading-->
               <h5 class="mb-5">System Notifications</h5>
               <!--end:Heading-->
               <!--begin::Item-->
               <div class="d-flex align-items-center bg-light-danger rounded p-5 gutter-b">
                  <span class="svg-icon svg-icon-danger mr-5">
                     <span class="svg-icon svg-icon-lg">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                           <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                              <rect x="0" y="0" width="24" height="24"></rect>
                              <path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z" fill="#000000" opacity="0.3" transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)"></path>
                              <path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z" fill="#000000" transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)"></path>
                              <path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z" fill="#000000" opacity="0.3" transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)"></path>
                              <path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z" fill="#000000" opacity="0.3" transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)"></path>
                           </g>
                        </svg>
                        <!--end::Svg Icon-->
                     </span>
                  </span>
                  <div class="d-flex flex-column flex-grow-1 mr-2">
                     <a href="#" class="font-weight-normel text-dark-75 text-hover-primary font-size-lg mb-1">System Maintenance</a>
                     <span class="text-muted font-size-sm">Fix bugs | July 3,2021</span>
                  </div>
                  <span class="font-weight-bolder text-danger py-1 font-size-lg">1-4 PM</span>
               </div>
               <!--end::Item-->
            </div>
            <!--end::Notifications-->
         </div>
         <!--end::Content-->
      </div>
      <!-- end::User Panel-->
      <!--begin::Quick Panel-->
      <div id="kt_quick_panel" class="offcanvas offcanvas-right pt-5 pb-10">
         <!--begin::Header-->
         <div class="offcanvas-header offcanvas-header-navs d-flex align-items-center justify-content-between mb-5">
            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-primary flex-grow-1 px-10" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_logs">Audit Logs</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_notifications">Notifications</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_settings">Settings</a>
               </li>
            </ul>
            <div class="offcanvas-close mt-n1 pr-5">
               <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_panel_close">
               <i class="ki ki-close icon-xs text-muted"></i>
               </a>
            </div>
         </div>
         <!--end::Header-->
      </div>
      <!--end::Quick Panel-->
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
      <script>
         const bir_pdf = "{{ asset('/assets/BIR_2307.pdf')}}"
      </script>
      <script src="{{mix('/js/app.js')}}" ></script>
      <script src="{{ asset('/js/globals/plugins.bundle.js')}}" ></script>
      <script src="{{ asset('/js/globals/prismjs.bundle.js')}}" ></script>
      <script src="{{ asset('/js/globals/scripts.bundle.min.js')}}" ></script>
      <!--end::Global Theme Bundle-->
      @once
        @stack('scripts')
      @endonce
   </body>
</html>

