<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
{{--        <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />--}}
<!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --bg-opacity: 1;
            background-color: #fff;
            background-color: rgba(255, 255, 255, var(--bg-opacity))
        }

        .bg-gray-100 {
            --bg-opacity: 1;
            background-color: #f7fafc;
            background-color: rgba(247, 250, 252, var(--bg-opacity))
        }

        .border-gray-200 {
            --border-opacity: 1;
            border-color: #edf2f7;
            border-color: rgba(237, 242, 247, var(--border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --text-opacity: 1;
            color: #edf2f7;
            color: rgba(237, 242, 247, var(--text-opacity))
        }

        .text-gray-300 {
            --text-opacity: 1;
            color: #e2e8f0;
            color: rgba(226, 232, 240, var(--text-opacity))
        }

        .text-gray-400 {
            --text-opacity: 1;
            color: #cbd5e0;
            color: rgba(203, 213, 224, var(--text-opacity))
        }

        .text-gray-500 {
            --text-opacity: 1;
            color: #a0aec0;
            color: rgba(160, 174, 192, var(--text-opacity))
        }

        .text-gray-600 {
            --text-opacity: 1;
            color: #718096;
            color: rgba(113, 128, 150, var(--text-opacity))
        }

        .text-gray-700 {
            --text-opacity: 1;
            color: #4a5568;
            color: rgba(74, 85, 104, var(--text-opacity))
        }

        .text-gray-900 {
            --text-opacity: 1;
            color: #1a202c;
            color: rgba(26, 32, 44, var(--text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns:repeat(1, minmax(0, 1fr))
        }

        @media (min-width: 640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width: 768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns:repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width: 1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme: dark) {
            .dark\:bg-gray-800 {
                --bg-opacity: 1;
                background-color: #2d3748;
                background-color: rgba(45, 55, 72, var(--bg-opacity))
            }

            .dark\:bg-gray-900 {
                --bg-opacity: 1;
                background-color: #1a202c;
                background-color: rgba(26, 32, 44, var(--bg-opacity))
            }

            .dark\:border-gray-700 {
                --border-opacity: 1;
                border-color: #4a5568;
                border-color: rgba(74, 85, 104, var(--border-opacity))
            }

            .dark\:text-white {
                --text-opacity: 1;
                color: #fff;
                color: rgba(255, 255, 255, var(--text-opacity))
            }

            .dark\:text-gray-400 {
                --text-opacity: 1;
                color: #cbd5e0;
                color: rgba(203, 213, 224, var(--text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: #6b7280;
                color: rgba(107, 114, 128, var(--tw-text-opacity))
            }
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>
<!--begin::Body-->
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">
<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" style="" class="header align-items-stretch">
                <!--begin::Container-->
                <div class="container-xxl d-flex align-items-stretch justify-content-between">
                    <!--begin::Aside mobile toggle-->
                    <!--end::Aside mobile toggle-->

                    <!--begin::Wrapper-->
                    <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">

                        <!--begin::Topbar-->
                        <div class="d-flex align-items-stretch flex-shrink-0">
                            <!--begin::Toolbar wrapper-->

                            <div class="d-flex align-items-stretch flex-shrink-0">

                                <!--begin::Search-->
                                <div class="d-flex align-items-stretch ms-1 ms-lg-3">
                                    <!--begin::Compact form-->

                                    <form method="POST" action="{{url('search')}}" class="d-flex align-items-center">
                                        @csrf
                                        <!--begin::Input group-->
                                        <div class="position-relative w-md-400px me-md-2">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                                            <span
                                                class="svg-icon svg-icon-3 svg-icon-gray-500 position-absolute top-50 translate-middle ms-6">
														<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24" fill="none">
															<rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546"
                                                                  height="2" rx="1"
                                                                  transform="rotate(45 17.0365 15.1223)" fill="black"/>
															<path
                                                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                                                fill="black"/>
														</svg>
													</span>
                                            <!--end::Svg Icon-->
                                            <input type="text" class="form-control form-control-solid ps-10"
                                                   name="address" value="" placeholder="Search address"/>
                                        </div>

                                        <!--end::Input group-->
                                        <!--begin:Action-->
                                        <div class="d-flex align-items-center">
                                            <button type="submit" class="btn btn-primary me-5">Search</button>
                                        </div>
                                        <!--end:Action-->



                                    </form>

                                    <!--end::Compact form-->

                                </div>
                                <!--end::Search-->

                            </div>

                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Wrapper-->
                    <!--begin::Logo-->
                    <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
                        <a href="/">
                            <img alt="Logo" src="{{asset('media/logo.jpeg')}}" class="h-20px h-lg-30px"/>
                        </a>
                    </div>
                    <!--end::Logo-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                <!--begin::Post-->
                <div class="post d-flex flex-column-fluid" id="kt_post">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-xxl">
                        <!--begin::Row-->
                        <div class="row gy-5 g-xl-8">
                            <!--begin::Col-->
                            <div class="col-xxl-4 ">
                                <!--begin::Mixed Widget 2-->
                                <div class="card card-xxl-stretch">
                                    <!--begin::Header-->
                                    <div class="card-header border-0 bg-danger py-5">
                                        <h3 class="card-title fw-bolder text-white">Pool Statistics</h3>

                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body p-0">
                                        <!--begin::Chart-->
                                        <div class="mixed-widget-2-chart card-rounded-bottom bg-danger"
                                             data-kt-color="danger" style="height: 200px">

                                        </div>
                                        <!--end::Chart-->
                                        <!--begin::Stats-->
                                        <div class="card-p mt-n20 position-relative">
                                            <!--begin::Row-->
                                            <div class="row g-xl-12">
                                                <!--begin::Col-->
                                                <div class="col bg-light-success px-6 py-8 rounded-2 me-7 mb-7">
                                                    <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
															{{$hash ?? '' ?? $hash ?? ''['day']}}GH/s
															</span>
                                                    <!--end::Svg Icon-->
                                                    <div class="text-primary fw-bold fs-6">Daily hashrate</div>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col bg-light-success px-6 py-8 rounded-2 mb-7">
                                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
															{{$hash ?? '' ?? $hash ?? ''['hour']}}GH/s
															</span>
                                                    <!--end::Svg Icon-->
                                                    <div class="text-primary fw-bold fs-6">Hours hashrate</div>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                            <!--begin::Row-->
                                            <div class="row g-xl-12">
                                                <!--begin::Col-->
                                                <div class="col bg-light-primary px-6 py-8 rounded-2 me-7">
                                                    <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                                    <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                                        {{$count ?? '' ?? $count ?? ''['day']['count']}}

															</span>
                                                    <!--end::Svg Icon-->
                                                    <div class="text-danger fw-bold fs-6 mt-2">Daily block</div>
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col bg-light-primary px-6 py-8 rounded-2">
                                                    <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                                    <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                                        {{$count ?? '' ?? $count ?? ''['hour']['count']}}

                                                    </span>
                                                    <!--end::Svg Icon-->
                                                    <div class="text-danger fw-bold fs-6 mt-2">Hours block</div>
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Stats-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Mixed Widget 2-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-xxl-4  ">
                                <!--begin::List Widget 3-->
                                <div class="card card-xl-stretch mb-xl-8">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title fw-bolder text-dark">Information</h3>

                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">

                                        <!--begin::Item-->
                                        <div class="d-flex align-items-center mb-8">

                                            <!--begin::Description-->
                                            <div class="flex-grow-1">
                                                <div class="text-gray-800  fs-6 fw-bolder">URL</div>

                                            </div>
                                            <span
                                                class="badge badge-light-success fw-bolder">pool.youcloud.ru:20032</span>

                                        </div>
                                        <!--end:Item-->
                                        <div class="d-flex align-items-center mb-8">


                                            <!--end::Checkbox-->
                                            <!--begin::Description-->
                                            <div class="flex-grow-1">
                                                <div class="text-gray-800 fw-bolder fs-6">Fee</div>
                                            </div>
                                            <span class="badge badge-light-success fw-bolder">0.8%</span>

                                        </div>
                                        <div class="d-flex align-items-center mb-8">


                                            <!--end::Checkbox-->
                                            <!--begin::Description-->
                                            <div class="flex-grow-1">
                                                <div class="text-gray-800  fw-bolder fs-6">Miners</div>
                                            </div>
                                            <span class="badge badge-light-info fw-bolder"><a class="text-hover-primary"
                                                                                              href="https://github.com/trexminer/T-Rex/releases">T-Rex</a></span>

                                            <span class="badge badge-light-info fw-bolder"><a class="text-hover-primary"
                                                                                              href="https://www.bzminer.com/">BzMiner</a></span>

                                        </div>
                                        <div class="d-flex align-items-center mb-8">


                                            <!--end::Checkbox-->
                                            <!--begin::Description-->
                                            <div class="flex-grow-1">
                                                <div class="text-gray-800  fw-bolder fs-6">Telegram Bot</div>
                                            </div>
                                            <span class="badge badge-light-info fw-bolder"><a class="text-hover-secondary"
                                                                                              href="https://t.me/YouPoolBot">@YouPoolBot</a></span>


                                        </div>

                                    </div>
                                    <!--end::Body-->

                                    <div class="card-footer">

                                        <div class="d-flex align-items-center mb-8">


                                            <!--end::Checkbox-->
                                            <!--begin::Description-->
                                            <div class="flex-grow-1">
                                                <div class="text-gray-800  fw-bolder fs-6">Dual Miner (ETH+ALPH) 100%
                                                    LHR!!!!!
                                                </div>
                                            </div>
                                            <span class="badge badge-light-info fw-bolder"><a class="text-hover-primary"
                                                                                              href="https://www.youtube.com/watch?v=2x_uaTFrBWo">Instruction</a></span>

                                        </div>
                                    </div>
                                </div>
                                <!--end:List Widget 3-->
                            </div>
                            <!--end::Col-->


{{--                            <!--begin::Col-->--}}
{{--                            <div class="col-xxl-4 ">--}}
{{--                                <!--begin::List Widget 5-->--}}
{{--                                <div class="card card-xxl-stretch">--}}
{{--                                    <!--begin::Header-->--}}
{{--                                    <div class="card-header align-items-center border-0 mt-4">--}}
{{--                                        <h3 class="card-title align-items-start flex-column">--}}
{{--                                            <span class="fw-bolder mb-2 text-dark">Roadmap</span>--}}
{{--                                            <span class="text-muted fw-bold fs-7">To-Do</span>--}}
{{--                                        </h3>--}}

{{--                                    </div>--}}
{{--                                    <!--end::Header-->--}}
{{--                                    <!--begin::Body-->--}}
{{--                                    <div class="card-body pt-5">--}}
{{--                                        <!--begin::Timeline-->--}}
{{--                                        <div class="timeline-label">--}}
{{--                                            <!--begin::Item-->--}}
{{--                                            <div class="timeline-item">--}}
{{--                                                <!--begin::Label-->--}}
{{--                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">02/05</div>--}}
{{--                                                <!--end::Label-->--}}
{{--                                                <!--begin::Badge-->--}}
{{--                                                <div class="timeline-badge">--}}
{{--                                                    <i class="fa fa-genderless text-warning fs-1"></i>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Badge-->--}}
{{--                                                <!--begin::Text-->--}}
{{--                                                <div class="fw-mormal timeline-content text-muted ps-3">06--}}
{{--                                                    Febrasdasdsadsa saduary--}}
{{--                                                </div>--}}
{{--                                                <!--end::Text-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::Item-->--}}
{{--                                            <!--begin::Item-->--}}
{{--                                            <div class="timeline-item">--}}
{{--                                                <!--begin::Label-->--}}
{{--                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">02/05</div>--}}
{{--                                                <!--end::Label-->--}}
{{--                                                <!--begin::Badge-->--}}
{{--                                                <div class="timeline-badge">--}}
{{--                                                    <i class="fa fa-genderless text-success fs-1"></i>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Badge-->--}}
{{--                                                <!--begin::Content-->--}}
{{--                                                <div class="timeline-content d-flex">--}}
{{--                                                    <span class="fw-bolder text-gray-800 ps-3">AEOL meeting</span>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Content-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::Item-->--}}
{{--                                            <!--begin::Item-->--}}
{{--                                            <div class="timeline-item">--}}
{{--                                                <!--begin::Label-->--}}
{{--                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">02/05</div>--}}
{{--                                                <!--end::Label-->--}}
{{--                                                <!--begin::Badge-->--}}
{{--                                                <div class="timeline-badge">--}}
{{--                                                    <i class="fa fa-genderless text-danger fs-1"></i>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Badge-->--}}
{{--                                                <!--begin::Desc-->--}}
{{--                                                <div class="timeline-content fw-bolder text-gray-800 ps-3">Make deposit--}}
{{--                                                    <a href="#" class="text-primary">USD 700</a>. to ESL--}}
{{--                                                </div>--}}
{{--                                                <!--end::Desc-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::Item-->--}}
{{--                                            <!--begin::Item-->--}}
{{--                                            <div class="timeline-item">--}}
{{--                                                <!--begin::Label-->--}}
{{--                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">02/05</div>--}}
{{--                                                <!--end::Label-->--}}
{{--                                                <!--begin::Badge-->--}}
{{--                                                <div class="timeline-badge">--}}
{{--                                                    <i class="fa fa-genderless text-primary fs-1"></i>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Badge-->--}}
{{--                                                <!--begin::Text-->--}}
{{--                                                <div class="timeline-content fw-mormal text-muted ps-3">Indulging in--}}
{{--                                                    poorly driving and keep structure keep great--}}
{{--                                                </div>--}}
{{--                                                <!--end::Text-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::Item-->--}}
{{--                                            <!--begin::Item-->--}}
{{--                                            <div class="timeline-item">--}}
{{--                                                <!--begin::Label-->--}}
{{--                                                <div class="timeline-label fw-bolder text-gray-800 fs-6">02/05</div>--}}
{{--                                                <!--end::Label-->--}}
{{--                                                <!--begin::Badge-->--}}
{{--                                                <div class="timeline-badge">--}}
{{--                                                    <i class="fa fa-genderless text-danger fs-1"></i>--}}
{{--                                                </div>--}}
{{--                                                <!--end::Badge-->--}}
{{--                                                <!--begin::Desc-->--}}
{{--                                                <div class="timeline-content fw-bold text-gray-800 ps-3">New order--}}
{{--                                                    placed--}}
{{--                                                    <a href="#" class="text-primary">#XF-2356</a>.--}}
{{--                                                </div>--}}
{{--                                                <!--end::Desc-->--}}
{{--                                            </div>--}}
{{--                                            <!--end::Item-->--}}

{{--                                        </div>--}}
{{--                                        <!--end::Timeline-->--}}
{{--                                    </div>--}}
{{--                                    <!--end: Card Body-->--}}
{{--                                </div>--}}
{{--                                <!--end: List Widget 5-->--}}
{{--                            </div>--}}
{{--                            <!--end::Col-->--}}





                        </div>
                        <!--end::Row-->


                        <!--begin::Row-->
                        <div class="g-5 gx-xxl-8">
                            <!--begin::Tables Widget 13-->
                            <div class="col-xxl-12 card mb-5 mb-xl-12">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <h3 class="card-title align-items-start flex-column">
                                        <span class="card-label fw-bolder fs-3 mb-1">Last block per hour</span>
                                        {{--                                        <span class="text-muted mt-1 fw-bold fs-7"> </span>--}}
                                    </h3>

                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <div class="card-body py-3">
                                    <!--begin::Table container-->
                                    <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table
                                            class="table table-row-bordered table-row-gray-100 align-middle gs-0 gy-3">
                                            <!--begin::Table head-->
                                            <thead>
                                            <tr class="fw-bolder text-muted">

                                                <th class="min-w-120px">Hash</th>
                                                <th class="min-w-120px">Worker</th>
                                                <th class="text-end min-w-120px">Time</th>

                                            </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                            @isset($blockHour)
                                            @foreach($blockHour as $block)
                                                <tr>
                                                    <td>
                                                        <a href="https://explorer.alephium.org/#/blocks/{{$block->block_hash}}"
                                                           class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$block->block_hash}}</a>
{{--                                                        <span class="text-muted fw-bold text-muted d-block fs-7"></span>--}}
                                                    </td>
                                                    <td>
                                                        <a href="{{url('farmers/'.$block->worker)}}"
                                                           class="text-dark fw-bolder text-hover-primary d-block mb-1 fs-6">{{$block->worker}}</a>

                                                    </td>
                                                    <td class="text-end text-dark fw-bolder text-hover-primary fs-6">
                                                        {{$block->created_date}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            @endisset

                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table container-->
                                </div>
                                <!--begin::Body-->
                            </div>
                            <!--end::Tables Widget 13-->


                        </div>
                        <!--end::Row-->

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Post-->
            </div>
            <!--end::Content-->

        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->
<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
    <span class="svg-icon">
				<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
					<rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                          fill="black"/>
					<path
                        d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                        fill="black"/>
				</svg>
			</span>
    <!--end::Svg Icon-->
</div>
<!--end::Scrolltop-->
<!--end::Main-->
<script>var hostUrl = "";</script>
<!--begin::Javascript-->
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{asset('js/app.js')}}"></script>

<!--end::Page Custom Javascript-->
<!--end::Javascript-->
</body>
<!--end::Body-->
</html>
