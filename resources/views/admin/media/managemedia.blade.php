<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="managemedia"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Manage Social Media "></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Manage Social Media</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <div class="container">
                                    <div class="row">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th
                                                        class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Media Name
                                                    </th>

                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Media Url</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Created At</th>
                                                    <th class="text-secondary opacity-7"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($media as $med)
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                                                                <img src="{{ asset('site/uploads/media/'.$med->media_icon) }}"
                                                                    class="avatar avatar-sm me-3 border-radius-lg"
                                                                    alt="user1">
                                                            </div>
                                                            <div class="d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">{{$med->media_name}}</h6>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </td>

                                                    <td class="align-middle text-center text-sm">
                                                        <span class="badge badge-sm bg-gradient-success"><a
                                                                class="text-light" href="{{$med->media_url}}"
                                                                target="_blank"><b>{{$med->media_url}}</b></a></span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{$med->created_at}}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="#!" class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            <button
                                                                class="bg-info text-light btn-lg"><b>Edit</b></button>
                                                        </a> |
                                                        <a href="{{ route('getDeleteMedia', $med->id) }} "
                                                            class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            <button
                                                                class="bg-primary text-light btn-lg"><b>Delete</b></button>
                                                        </a>
                                                    </td>
                                                </tr>

                                                @endforeach

                                            </tbody>
                                        </table>
                                        {{$media->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>