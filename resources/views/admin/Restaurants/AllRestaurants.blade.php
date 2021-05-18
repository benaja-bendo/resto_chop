@extends('layouts.basse')

@section('title')
    Tous les restaurants
@endsection

@section('contenue')
    <div class="card mb-3 mt-1">
        {{--        entete--}}
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col-md-auto">
                    <h5 class="mb-3 mb-md-0">Tous les restaurants</h5>
                </div>
                <div class="col-md-auto">
                    <button class="btn btn-outline-primary mr-1 mb-1 btn-sm" type="button" data-toggle="modal"
                            data-target="#newrestaurant">
                        <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                        <span class="d-none d-sm-inline-block ml-1">Nouveau</span>
                    </button>
                    {{--                    modal--}}
                    <div class="modal fade" id="newrestaurant" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Creation d'un restaurant</h5>
                                    <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="p-4 pb-0">
                                    <form action="{{ route('restaurant.store') }}" method="post"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Nom</label>
                                            <input name="name" class="form-control" type="text">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Sigle</label>
                                            <input name="sigle" class="form-control" type="text">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Email public</label>
                                            <input name="email_public" class="form-control" type="email">
                                        </div>
                                        <div class="mb-3">
                                            <label class="col-form-label" for="recipient-name">Numero public</label>
                                            <input name="number_public" class="form-control" type="tel">
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
                </div>
            </div>
        </div>
        {{--        corps--}}
        <div class="card-body p-1">
            {{--            entete du tableau--}}
            <div id="tableExample" data-list='{"valueNames":["identite","sigle"],"page":5,"pagination":true}'>

                <div class="row gx-card mx-0 bg-200 text-900 fs--1 font-weight-semi-bold">
                    <div class="col-9 col-md-8 py-2 sort" data-sort="identite">Identité</div>
                    <div class="col-3 col-md-4">
                        <div class="row">
                            <div class="col-md-8 py-2 d-none d-md-block text-center sort" data-sort="sigle">Admin(s)
                            </div>
                            <div class="col-12 col-md-4 text-right py-2 ">Actions</div>
                        </div>
                    </div>
                </div>
                {{--            corps du tableau--}}
                <div class="list mb-2">
                    @foreach($restaurants as $restaurant)
                        <div class="row gx-card mx-0 align-items-center border-bottom border-200">
                            <div class="identite col-8 py-3">
                                <div class="d-flex align-items-center">
                                    <a href="{{ $restaurant->profile_photo_path }}">
                                        <img class="img-fluid rounded mr-3 d-none d-md-block"
                                             src="{{ $restaurant->profile_photo_path }}"
                                             alt="{{ $restaurant->name }}" width="60"/>
                                    </a>
                                    <div class="flex-1">
                                        <span>Restaurant</span>
                                        <h5 class="fs-0">
                                            <a class="text-900"
                                               href="{{ route('restaurant.profil',['restaurant'=>$restaurant->slug,'id'=>$restaurant->id]) }}">
                                                {{ $restaurant->name }}
                                            </a>
                                        </h5>

                                        <div class="fs--2 fs-md--1">
                                            {{--                                        <a class="text-danger" href="#!">Remove</a>--}}
                                            <span class="text-black">sigle: <strong
                                                        class="text-black-50">{{ $restaurant->sigle }}</strong></span>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 py-3">
                                <div class="row align-items-center">
                                    <div class="sigle col-md-8 d-flex justify-content-end justify-content-md-center order-1 order-md-0">
                                        <div>
                                            0 admin(s)
                                        </div>
                                    </div>
                                    <div class="col-md-4 text-right pl-0 order-0 order-md-1 mb-2 mb-md-0 text-600">
                                        <a href="{{ route('restaurant.profil',['restaurant'=>$restaurant->slug,'id'=>$restaurant->id]) }}"
                                           class="btn btn-outline-secondary mr-1 mb-1" type="button">
                                            <span class="far fa-eye" data-fa-transform="shrink-3 down-2"></span>
                                        </a>
                                        <button class="btn btn-outline-primary mr-1 mb-1" type="button" data-toggle="modal"
                                                data-target="#restaurant{{ $restaurant->id }}">
                                            <span class="fas fa-edit" data-fa-transform="shrink-3 down-2"></span>
                                        </button>
                                        {{--                    modal--}}
                                        <div class="modal fade" id="restaurant{{ $restaurant->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modification de {{ $restaurant->name }}</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="p-4 pb-0">
                                                        <form action="{{ route('restaurant.update',['id'=>$restaurant->id]) }}" method="post"
                                                              enctype="multipart/form-data">
                                                            @csrf
                                                            @method('put')
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="recipient-name">Nom</label>
                                                                <input name="name" value="{{ $restaurant->name }}" class="form-control" type="text">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="recipient-name">Sigle</label>
                                                                <input name="sigle" value="{{ $restaurant->sigle }}" class="form-control" type="text">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="recipient-name">Email public</label>
                                                                <input name="email_public" value="{{ $restaurant->email_public }}" class="form-control" type="email">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="col-form-label" for="recipient-name">Numero public</label>
                                                                <input name="number_public" value="{{ $restaurant->number_public }}" class="form-control" type="tel">
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
                                        <form action="{{ route('restaurant.destroy',['id'=>$restaurant->id]) }}"
                                              method="post" style="display: inline-block">
                                            @csrf
                                            <button class="btn btn-outline-danger mr-1 mb-1" type="submit"
                                                    value="{{ $restaurant->id }}">
                                                <span class="far fa-trash-alt"
                                                      data-fa-transform="shrink-3 down-2"></span>
                                            </button>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="row align-items-center py-2">
                    <div class="pagination d-none"></div>
                    <div class="col">
                        <p class="mb-0 fs--1">
                            <span class="d-none d-sm-inline-block" data-list-info="data-list-info"></span>
                            <span class="d-none d-sm-inline-block"> &mdash; </span>
                            <a class="font-weight-semi-bold" href="#!" data-list-view="*">Voir tout<span
                                        class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
                        </p>
                    </div>
                    <div class="col-auto d-flex">
                        <button class="btn btn-sm" type="button" data-list-pagination="prev"><span>précédent</span>
                        </button>
                        <button class="btn btn-sm px-4 ml-2" type="button" data-list-pagination="next">
                            <span>Suivant</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection