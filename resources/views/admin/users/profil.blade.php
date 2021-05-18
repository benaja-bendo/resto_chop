@extends('layouts.basse')

@section('title')
    {{ $user->name }}
@endsection

@section('contenue')
    <div class="card mb-3">
        <div class="card-header position-relative min-vh-25 mb-7">
            <div class="bg-holder rounded-lg rounded-bottom-0"
                 style="background-image:url({{ asset('dist/assets/img/generic/4.jpg') }});"></div>
            <!--/.bg-holder-->
            <div class="avatar avatar-5xl avatar-profile">
                {{--                <img class="rounded-circle img-thumbnail shadow-sm" src="{{ asset('dist/assets/img/team/2.jpg') }}" width="200" alt="" />--}}
                <img class="rounded-circle img-thumbnail shadow-sm" src="{{ $user->profile_photo_path }}" width="200"
                     alt=""/>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1">
                        {{ $user->name }} {{ $user->first_name }}
                        <span data-toggle="tooltip" data-placement="right" title="Verified">
                            <small class="fa fa-check-circle text-danger" data-fa-transform="shrink-4 down-2"></small>
                        </span>
                    </h4>
                    @if(auth()->user()->id !== $user->id)
                        <button class="btn btn-falcon-danger btn-sm px-3" type="button">Banir User</button>
                    @endif
                    <div class="border-dashed-bottom my-4 d-lg-none"></div>
                </div>
                <div class="col pl-2 pl-lg-3">
                    <span class="d-flex align-items-center mb-2">
                        <span class="fas fa-mail-bulk fs-4 mr-2 text-700" data-fa-transform="shrink-3 down-2"></span>
                        <div class="flex-1 ml-2">
                            <h6 class="mb-0">{{ $user->email }}</h6>
                        </div>
                    </span>
                    <span class="d-flex align-items-center mb-2">
                        <span class="fas fa-phone-square-alt fs-4 mr-2 text-700"
                              data-fa-transform="shrink-3 down-2"></span>
                        <div class="flex-1 ml-2">
                            <h6 class="mb-0">{{ $user->number_phone }}</h6>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-0">
        <div class="col-lg-8 pr-lg-2">

            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Commandes</h5>
                </div>
                <div class="card-body fs--1">
                    <div class="d-flex btn-reveal-trigger">
                        <div class="calendar"><span class="calendar-month">Feb</span><span
                                    class="calendar-day">21</span></div>
                        <div class="flex-1 position-relative pl-3">
                            <h6 class="fs-0 mb-0"><a href="event-detail.html">Newmarket Nights</a></h6>
                            <p class="mb-1">Organized by <a href="#!" class="text-700">University of Oxford</a></p>
                            <p class="text-1000 mb-0">Time: 6:00AM</p>
                            <p class="text-1000 mb-0">Duration: 6:00AM - 5:00PM</p>Place: Cambridge Boat Club, Cambridge
                            <div class="border-dashed-bottom my-3"></div>
                        </div>
                    </div>
                    <div class="d-flex btn-reveal-trigger">
                        <div class="calendar"><span class="calendar-month">Dec</span><span
                                    class="calendar-day">31</span></div>
                        <div class="flex-1 position-relative pl-3">
                            <h6 class="fs-0 mb-0"><a href="event-detail.html">31st Night Celebration</a></h6>
                            <p class="mb-1">Organized by <a href="#!" class="text-700">Chamber Music Society</a></p>
                            <p class="text-1000 mb-0">Time: 11:00PM</p>
                            <p class="text-1000 mb-0">280 people interested</p>Place: Tavern on the Greend, New York
                            <div class="border-dashed-bottom my-3"></div>
                        </div>
                    </div>
                    <div class="d-flex btn-reveal-trigger">
                        <div class="calendar"><span class="calendar-month">Dec</span><span
                                    class="calendar-day">16</span></div>
                        <div class="flex-1 position-relative pl-3">
                            <h6 class="fs-0 mb-0"><a href="event-detail.html">Folk Festival</a></h6>
                            <p class="mb-1">Organized by <a href="#!" class="text-700">Harvard University</a></p>
                            <p class="text-1000 mb-0">Time: 9:00AM</p>
                            <p class="text-1000 mb-0">Location: Cambridge Masonic Hall Association</p>Place: Porter
                            Square, North Cambridge
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light p-0 border-top"><a class="btn btn-link btn-block" href="events.html">All
                        Events<span class="fas fa-chevron-right ml-1 fs--2"></span></a></div>
            </div>

            <div class="card mb-3">
                <div class="card-header bg-light">
                    <h5 class="mb-0">Reservation</h5>
                </div>
                <div class="card-body fs--1">
                    <div class="d-flex btn-reveal-trigger">
                        <div class="calendar"><span class="calendar-month">Feb</span><span
                                    class="calendar-day">21</span></div>
                        <div class="flex-1 position-relative pl-3">
                            <h6 class="fs-0 mb-0"><a href="event-detail.html">Newmarket Nights</a></h6>
                            <p class="mb-1">Organized by <a href="#!" class="text-700">University of Oxford</a></p>
                            <p class="text-1000 mb-0">Time: 6:00AM</p>
                            <p class="text-1000 mb-0">Duration: 6:00AM - 5:00PM</p>Place: Cambridge Boat Club, Cambridge
                            <div class="border-dashed-bottom my-3"></div>
                        </div>
                    </div>
                    <div class="d-flex btn-reveal-trigger">
                        <div class="calendar"><span class="calendar-month">Dec</span><span
                                    class="calendar-day">31</span></div>
                        <div class="flex-1 position-relative pl-3">
                            <h6 class="fs-0 mb-0"><a href="event-detail.html">31st Night Celebration</a></h6>
                            <p class="mb-1">Organized by <a href="#!" class="text-700">Chamber Music Society</a></p>
                            <p class="text-1000 mb-0">Time: 11:00PM</p>
                            <p class="text-1000 mb-0">280 people interested</p>Place: Tavern on the Greend, New York
                            <div class="border-dashed-bottom my-3"></div>
                        </div>
                    </div>
                    <div class="d-flex btn-reveal-trigger">
                        <div class="calendar"><span class="calendar-month">Dec</span><span
                                    class="calendar-day">16</span></div>
                        <div class="flex-1 position-relative pl-3">
                            <h6 class="fs-0 mb-0"><a href="event-detail.html">Folk Festival</a></h6>
                            <p class="mb-1">Organized by <a href="#!" class="text-700">Harvard University</a></p>
                            <p class="text-1000 mb-0">Time: 9:00AM</p>
                            <p class="text-1000 mb-0">Location: Cambridge Masonic Hall Association</p>Place: Porter
                            Square, North Cambridge
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light p-0 border-top"><a class="btn btn-link btn-block" href="events.html">All
                        Events<span class="fas fa-chevron-right ml-1 fs--2"></span></a></div>
            </div>


        </div>
        <div class="col-lg-4 pl-lg-2">
            <div class="sticky-sidebar">

            </div>
        </div>
    </div>

@endsection