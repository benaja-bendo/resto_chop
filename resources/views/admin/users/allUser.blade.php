@extends('layouts.basse')

@section('title')
    tous les utilisateurs
@endsection

@section('contenue')
    @if(session('success'))
        <div class="alert alert-primary mb-3" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="card mb-3" id="customersTable"
         data-list='{"valueNames":["name","email","phone","address","joined"],"page":10,"pagination":true}'>
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-4 col-sm-auto d-flex align-items-center pr-0">
                    <h5 class="fs-0 mb-0 text-nowrap py-2 py-xl-0">Tous les utilisateurs</h5>
                </div>
                <div class="col-8 col-sm-auto text-right pl-2">
                    {{--                    <div class="d-none" id="table-customers-actions">--}}
                    {{--                        <div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">--}}
                    {{--                                <option selected="">Bulk actions</option>--}}
                    {{--                                <option value="Refund">Refund</option>--}}
                    {{--                                <option value="Delete">Delete</option>--}}
                    {{--                                <option value="Archive">Archive</option>--}}
                    {{--                            </select>--}}
                    {{--                            <button class="btn btn-falcon-default btn-sm ml-2" type="button">Apply</button>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div id="table-customers-replace-element">
                        {{--                        <button class="btn btn-falcon-default btn-sm" type="button">--}}
                        {{--                            <span class="fas fa-external-link-alt" data-fa-transform="shrink-3 down-2"></span>--}}
                        {{--                            <span class="d-none d-sm-inline-block ml-1">Export</span>--}}
                        {{--                        </button>--}}
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-sm table-striped fs--1 mb-0">
                    <thead class="bg-200 text-900">
                    <tr>
                        <th>
                            <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                <input class="form-check-input"
                                       id="checkbox-bulk-customers-select"
                                       type="checkbox"
                                       data-bulk-select='{"body":"table-customers-body","actions":"table-customers-actions","replacedElement":"table-customers-replace-element"}'/>
                            </div>
                        </th>
                        <th class="sort pr-1 align-middle white-space-nowrap" data-sort="name">Identité</th>
                        <th class="sort pr-1 align-middle white-space-nowrap" data-sort="email">Email</th>
                        <th class="sort pr-1 align-middle white-space-nowrap" data-sort="phone">Number phone</th>
                        <th class="sort pr-1 align-middle white-space-nowrap pl-5" data-sort="address"
                            style="min-width: 200px;">Change rôle
                        </th>
                        <th class="sort pr-1 align-middle white-space-nowrap" data-sort="joined">Date de creation</th>
                        <th class="align-middle no-sort"></th>
                    </tr>
                    </thead>
                    <tbody class="list" id="table-customers-body">
                    @foreach($users as $user)
                        <tr class="btn-reveal-trigger">
                            <td class="align-middle py-2" style="width: 28px;">
                                <div class="form-check fs-0 mb-0 d-flex align-items-center">
                                    <input class="form-check-input"
                                           type="checkbox"
                                           id="customer-0"
                                           data-bulk-select-row="data-bulk-select-row"/>
                                </div>
                            </td>
                            <td class="name align-middle white-space-nowrap py-2">
                                <a href="{{ route('user.profil',['id'=>$user->id]) }}">
                                    <div class="d-flex d-flex align-items-center">
                                        <div class="avatar avatar-xl mr-2">
                                            <img class="rounded-circle" src="{{ $user->profile_photo_path }}" alt="">
                                        </div>
                                        <div class="flex-1">
                                            <h5 class="mb-0 fs--1">{{ $user->name }} {{ $user->first_name }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td class="email align-middle py-2">
                                <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                            </td>
                            <td class="phone align-middle white-space-nowrap py-2">
                                <a href="tel:{{ $user->number_phone }}">{{ $user->number_phone }}</a>
                            </td>
                            <td class="address align-middle white-space-nowrap pl-5 py-2">
                                <button class="btn btn-falcon-default btn-sm px-3 ml-2" type="button"
                                        data-toggle="modal"
                                        data-target="#user{{ $user->id }}">{{ $user->role }}
                                </button>
                                {{--                    modal--}}
                                <div class="modal fade" id="user{{ $user->id }}" tabindex="-1" role="dialog"
                                     aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Adresse de livraison
                                                    connu</h5>
                                                <button type="button" class="btn-close" data-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="p-4 pb-0">
                                                <div class="card-body">
                                                    <table class="table table-borderless fs--1 mb-0">
                                                        <tbody>
                                                        <tr class="border-bottom">
                                                            <th class="pl-0 pt-0">Apple MacBook Pro 15" x 1
                                                                <div class="text-400 font-weight-normal fs--2">
                                                                    Z0V20008N: 2.9GHz 6-core 8th-Gen Intel Core i9, 32GB
                                                                    RAM
                                                                </div>
                                                            </th>
                                                            <th class="pr-0 text-right pt-0">$1345</th>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <th class="pl-0">Apple iMac Pro x 1
                                                                <div class="text-400 font-weight-normal fs--2">27-inch
                                                                    with Retina 5K Display, 3.0GHz 10-core Intel Xeon W,
                                                                    1TB
                                                                </div>
                                                            </th>
                                                            <th class="pr-0 text-right">$2010</th>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <th class="pl-0">Subtotal</th>
                                                            <th class="pr-0 text-right">$3355</th>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <th class="pl-0">Coupon: <span class="text-success">40SITEWIDE</span>
                                                            </th>
                                                            <th class="pr-0 text-right">-$55</th>
                                                        </tr>
                                                        <tr class="border-bottom">
                                                            <th class="pl-0">Shipping</th>
                                                            <th class="pr-0 text-right">$20</th>
                                                        </tr>
                                                        <tr>
                                                            <th class="pl-0 pb-0">Total</th>
                                                            <th class="pr-0 text-right pb-0">$3320</th>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="joined align-middle py-2"> {{ \Carbon\Carbon::parse($user->created_at)->format('d M. Y')}}</td>

                            <td class="align-middle white-space-nowrap py-2 text-right">
                                <div class="dropdown font-sans-serif">
                                    <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal"
                                            type="button"
                                            id="customer-dropdown-0" data-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false"><span
                                                class="fas fa-ellipsis-h fs--1"></span></button>
                                    <div class="dropdown-menu dropdown-menu-right border py-0"
                                         aria-labelledby="customer-dropdown-0">
                                        <div class="bg-white py-2">
                                            <button data-toggle="modal"
                                                    data-target="#edit{{ $user->id }}" class="dropdown-item"
                                                    type="button">Edit
                                            </button>
                                            {{--                    modal--}}
                                            <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1" role="dialog"
                                                 aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modification
                                                                des informations</h5>
                                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="p-4 pb-0">
                                                            <div class="h-lg-100">
                                                                <div class="card-body p-4 p-sm-5">
                                                                    <form action="{{ route('user.update',['id'=>$user->id]) }}"
                                                                          method="post">
                                                                        @csrf
                                                                        @method('put')
                                                                        <div class="mb-3">
                                                                            <input value="{{ $user->name }}"
                                                                                    name="name"
                                                                                   class="form-control"
                                                                                   type="text"
                                                                                   placeholder="nom">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <input value="{{ $user->first_name }}"
                                                                                    name="first_name"
                                                                                   class="form-control"
                                                                                   type="text"
                                                                                   placeholder="prenom">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <input
                                                                                    value="{{ $user->email }}"
                                                                                    name="email" class="form-control"
                                                                                    type="email"
                                                                                    placeholder="Email address">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <input
                                                                                    value="{{ $user->number_phone }}"
                                                                                    name="tel" class="form-control"
                                                                                    type="tel"
                                                                                    placeholder="numero de telephone">
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <button class="btn btn-primary btn-block mt-3"
                                                                                    type="submit" name="submit">modifier
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form action="{{ route('user.delete',['id'=>$user->id]) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="dropdown-item text-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-center">
            <button class="btn btn-sm btn-falcon-default mr-1" type="button" title="Previous"
                    data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
            <ul class="pagination mb-0"></ul>
            <button class="btn btn-sm btn-falcon-default ml-1" type="button" title="Next" data-list-pagination="next">
                <span class="fas fa-chevron-right"></span></button>
        </div>
    </div>
@endsection