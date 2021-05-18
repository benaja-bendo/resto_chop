@extends('layouts.basse')

@section('title')
    {{ $restaurant->name }}
@endsection

@section('contenue')
    <div class="card mb-3">
        <div class="card-header position-relative min-vh-25">
            <div class="bg-holder rounded-lg rounded-bottom-0"
                 style="background-image:url({{ $restaurant->profile_photo_path }});"></div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-8">
                    <h4 class="mb-1">
                        {{ $restaurant->name }}
                        <span data-toggle="tooltip" data-placement="right" title="Verified">
                            <small class="fa fa-check-circle text-primary" data-fa-transform="shrink-4 down-2"></small>
                        </span>
                    </h4>
                    <p class="text-500">{{ $restaurant->sigle }}</p>
                    <button class="btn btn-falcon-primary btn-sm px-3" type="button">Desactive restaurant</button>
                    <button class="btn btn-outline-primary btn-sm px-3 ml-2" type="button" data-toggle="modal"
                            data-target="#restaurant{{ $restaurant->id }}">Modifier le restaurant
                    </button>
                    {{--                    modal--}}
                    <div class="modal fade" id="restaurant{{ $restaurant->id }}" tabindex="-1" role="dialog"
                         aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modification
                                        de {{ $restaurant->name }}</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="p-4 pb-0">
                                    <form action="{{ route('restaurant.update',['id'=>$restaurant->id]) }}"
                                          method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        @method('put')
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Nom</label>
                                            <input name="name" value="{{ $restaurant->name }}" class="form-control"
                                                   type="text">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Sigle</label>
                                            <input name="sigle" value="{{ $restaurant->sigle }}" class="form-control"
                                                   type="text">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Email public</label>
                                            <input name="email_public" value="{{ $restaurant->email_public }}"
                                                   class="form-control" type="email">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Numero public</label>
                                            <input name="number_public" value="{{ $restaurant->number_public }}"
                                                   class="form-control" type="tel">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Image</label>
                                            <div class="form-file"><input name="image" class="form-file-input"
                                                                          id="customFile" type="file"/><label
                                                        class="form-file-label" for="customFile"><span
                                                            class="form-file-text">Choose file...</span><span
                                                            class="form-file-button">Browse</span></label></div>
                                        </div>

                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">
                                                Fermer
                                            </button>
                                            <button class="btn btn-primary" type="submit">Enregistrer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-dashed-bottom my-4 d-lg-none"></div>
                </div>
                <div class="col pl-2 pl-lg-3">
                    <span class="d-flex align-items-center mb-2">
                        <span class="fas fa-mail-bulk fs-4 mr-2 text-700" data-fa-transform="shrink-3 down-2"></span>
                        <div class="flex-1 ml-2">
                            <h6 class="mb-0">{{ $restaurant->email_public }}</h6>
                        </div>
                    </span>
                    <span class="d-flex align-items-center mb-2">
                        <span class="fas fa-phone-square-alt fs-4 mr-2 text-700"
                              data-fa-transform="shrink-3 down-2"></span>
                        <div class="flex-1 ml-2">
                            <h6 class="mb-0">{{ $restaurant->number_public }}</h6>
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="row g-0">--}}
{{--        <div class="col-lg-8 pr-lg-2">--}}
{{--            <div class="card mb-3">--}}
{{--                <div class="card-header bg-light d-flex justify-content-between">--}}
{{--                    <h5 class="mb-0">Activity log</h5><a class="font-sans-serif" href="activity.html">All logs</a>--}}
{{--                </div>--}}
{{--                <div class="card-body fs--1 p-0">--}}
{{--                    <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">--}}
{{--                        <div class="notification-avatar">--}}
{{--                            <div class="avatar avatar-xl mr-3">--}}
{{--                                <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">🎁</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="notification-body">--}}
{{--                            <p class="mb-1"><strong>Jennifer Kent</strong> Congratulated <strong>Anthony--}}
{{--                                    Hopkins</strong></p>--}}
{{--                            <span class="notification-time">November 13, 5:00 Am</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">--}}
{{--                        <div class="notification-avatar">--}}
{{--                            <div class="avatar avatar-xl mr-3">--}}
{{--                                <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">🏷️</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="notification-body">--}}
{{--                            <p class="mb-1"><strong>California Institute of Technology</strong> tagged <strong>Anthony--}}
{{--                                    Hopkins</strong> in a post.</p>--}}
{{--                            <span class="notification-time">November 8, 5:00 PM</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <a class="border-bottom-0 notification rounded-0 border-x-0 border border-300" href="#!">--}}
{{--                        <div class="notification-avatar">--}}
{{--                            <div class="avatar avatar-xl mr-3">--}}
{{--                                <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">📋️</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="notification-body">--}}
{{--                            <p class="mb-1"><strong>Anthony Hopkins</strong> joined <strong>Victory day cultural--}}
{{--                                    Program</strong> with <strong>Tony Stark</strong></p>--}}
{{--                            <span class="notification-time">November 01, 11:30 AM</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}

{{--                    <a class="notification border-x-0 border-bottom-0 border-300 rounded-top-0" href="#!">--}}
{{--                        <div class="notification-avatar">--}}
{{--                            <div class="avatar avatar-xl mr-3">--}}
{{--                                <div class="avatar-emoji rounded-circle "><span role="img" aria-label="Emoji">📅️</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="notification-body">--}}
{{--                            <p class="mb-1"><strong>Massachusetts Institute of Technology</strong> invited <strong>Anthony--}}
{{--                                    Hopkin</strong> to an event</p>--}}
{{--                            <span class="notification-time">October 28, 12:00 PM</span>--}}
{{--                        </div>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-lg-4 pl-lg-2">--}}
{{--            <div class="sticky-sidebar">--}}
{{--                <div class="card mb-3">--}}
{{--                    <div class="card-header bg-light">--}}
{{--                        <h5 class="mb-0">Details sur le restaurant</h5>--}}
{{--                    </div>--}}
{{--                    <div class="card-body fs--1">--}}
{{--                        <div class="d-flex">--}}
{{--                            <div class="flex-1 position-relative pl-3">--}}
{{--                                <h6 class="fs-0 mb-0">--}}
{{--                                    Big Data Engineer--}}
{{--                                    <span data-toggle="tooltip" data-placement="top"--}}
{{--                                          title="Verified">--}}
{{--                                        <small class="fa fa-check-circle text-primary"--}}
{{--                                               data-fa-transform="shrink-4 down-2"></small>--}}
{{--                                    </span>--}}
{{--                                </h6>--}}
{{--                                <p class="mb-1"><a href="#!">Google</a></p>--}}
{{--                                <p class="text-1000 mb-0">Apr 2012 - Present &bull; 6 yrs 9 mos</p>--}}
{{--                                <p class="text-1000 mb-0">California, USA</p>--}}
{{--                                <div class="border-dashed-bottom my-3"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="card mt-3">
        <div class="card-header bg-light">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="mb-0" id="followers">
                        Administrateur
                        <span class="d-none d-sm-inline-block">(1)</span>
                    </h5>
                </div>
                <div class="col text-right"></div>
            </div>
        </div>
        <div class="card-body bg-light p-0">
            <div class="row g-0 text-center fs--1">
                <div class="col-6 col-md-4 col-lg-3 col-xxl-2 mb-1">
                    <div class="bg-white p-3 h-100">
                        <a href="#">
                            <img class="img-thumbnail img-fluid rounded-circle mb-3 shadow-sm"
                                    src="{{ asset('dist/assets/img/team/1.jpg') }}" alt="" width="100"/>
                        </a>
                        <h6 class="mb-1">
                            <a href="#">Emilia Clarke</a>
                        </h6>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection