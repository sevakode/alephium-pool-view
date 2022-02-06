@extends('app')
@section('content')
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
															{{$hash['day']}}GH/s
															</span>
                                    <!--end::Svg Icon-->
                                    <div class="text-primary fw-bold fs-6">Hashrate per day</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col bg-light-success px-6 py-8 rounded-2 mb-7">
                                    <!--begin::Svg Icon | path: icons/duotune/finance/fin006.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2">
															{{$hash['hour']}}GH/s
															</span>
                                    <!--end::Svg Icon-->
                                    <div class="text-primary fw-bold fs-6">Hashrate per houre</div>
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
                                                        {{$count['day']['count']}}

															</span>
                                    <!--end::Svg Icon-->
                                    <div class="text-danger fw-bold fs-6 mt-2">Daily block</div>
                                </div>
                                <!--end::Col-->
                                <!--begin::Col-->
                                <div class="col bg-light-primary px-6 py-8 rounded-2">
                                    <!--begin::Svg Icon | path: icons/duotune/communication/com010.svg-->
                                    <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2">
                                                        {{$count['hour']['count']}}

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
                                class="badge badge-light-danger fw-bolder">pool.youcloud.ru:20032</span>

                        </div>
                        <!--end:Item-->
                        <div class="d-flex align-items-center mb-8">


                            <!--end::Checkbox-->
                            <!--begin::Description-->
                            <div class="flex-grow-1">
                                <div class="text-gray-800 fw-bolder fs-6">Fee</div>
                            </div>
                            <span class="badge badge-light-danger fw-bolder">0.8%</span>

                        </div>
                        <div class="d-flex align-items-center mb-8">


                            <!--end::Checkbox-->
                            <!--begin::Description-->
                            <div class="flex-grow-1">
                                <div class="text-gray-800 fw-bolder fs-6">Min payout</div>
                            </div>
                            <span class="badge badge-light-success fw-bolder">1 ALPH</span>

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
                            <span class="badge badge-light-primary fw-bolder"><a class="text-hover-primary"
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
@endsection
