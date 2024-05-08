@extends('app')
@section('content')
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row gy-5 g-xl-8">
                <div class="card-header border-0 bg-danger py-5">
                    <h3 class="card-title fw-bolder text-white">{{$address}}</h3>

                </div>
                <!--begin::Col-->
                <div class="col-xxl-4 ">
                    <!--begin::Mixed Widget 2-->
                    <div class="card card-xxl-stretch">
                        <!--begin::Header-->
{{--                        <div class="card-header border-0 bg-danger py-5">--}}
{{--                            <h3 class="card-title fw-bolder text-white">{{$address}}</h3>--}}

{{--                        </div>--}}
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
                            @isset($hash)
                                <!--begin::Row-->
                                    <div class="row g-xl-12">
                                        <!--begin::Col-->
                                        <div class="col bg-light-success px-6 py-8 rounded-2 me-7 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/general/gen032.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
															{{$hash['day'] }}
															</span>
                                            <!--end::Svg Icon-->
                                            <div class="text-primary fw-bold fs-6">Hashrate per day</div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col bg-light-success px-6 py-8 rounded-2 mb-7">
                                            <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
															{{ $hash['hour']}}
															</span>
                                            <!--end::Svg Icon-->
                                            <div class="text-primary fw-bold fs-6">Hashrate per houre</div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                            @endisset
                            @isset($balance)

                                <!--begin::Row-->
                                    <div class="row g-xl-12">
                                        <!--begin::Col-->
                                        <div class="col bg-light-primary px-6 py-8 rounded-2 me-7">
                                            <!--begin::Svg Icon | path: icons/duotune/abstract/abs027.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2">
                                                <a class="bold text-hover-primary" href="https://explorer.alephium.org/#/addresses/{{$address}}"> {{$balance['ALPH']}}</a>
                                            </span>
                                            <!--end::Svg Icon-->
                                            <div class="text-danger fw-bold fs-6 mt-2">Balance ALPH</div>
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col bg-light-primary px-6 py-8 rounded-2">
                                            <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                            <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                                        {{$balance['USD']}}

                                                    </span>
                                            <!--end::Svg Icon-->
                                            <div class="text-danger fw-bold fs-6 mt-2">Balance USD</div>
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                @endisset
                            </div>
                            <!--end::Stats-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Mixed Widget 2-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->


        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
@endsection
