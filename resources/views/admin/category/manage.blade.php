<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="ManageCategory"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Manage Category"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row" <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Manage Category</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="container">
                                <div class="row">
                                    @if(Session::has('success'))
                                    <div class="row">

                                        <div class="col-md-12">
                                            <div class="alert alert-success text-light" role="alert">
                                                <b>Successfully Added</b>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Title
                                                </th>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Details</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Created At</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $cat)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('site/uploads/category/'.$cat->photo) }}"
                                                                class="avatar avatar-sm me-3 border-radius-lg"
                                                                alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{$cat->title}}</h6>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </td>

                                                <td class="align-middle text-center text-sm">
                                                    <span
                                                        class="badge badge-sm bg-gradient-success">{{$cat->details}}</span>
                                                </td>
                                                <td class="align-middle text-center">
                                                    <span
                                                        class="text-secondary text-xs font-weight-bold">{{$cat->created_at}}</span>
                                                </td>
                                                <td class="align-middle">
                                                    <a href="{{ route('getEditCategory', $cat->id) }}"
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Edit user">
                                                        <button class="bg-info text-light btn-lg"><b> <i
                                                                    class="material-icons">edit</i></b></button>
                                                    </a> |
                                                    <a href="{{ route('getDeleteCategory', $cat->id) }} "
                                                        class="text-secondary font-weight-bold text-xs"
                                                        data-toggle="tooltip" data-original-title="Delete user">
                                                        <button class="bg-primary text-light btn-lg"><b><i
                                                                    class="material-icons">delete</i></b></button>
                                                    </a>
                                                </td>


                                            </tr>

                                            @endforeach

                                        </tbody>
                                    </table>
                                    {{$categories->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </main>
    <x-plugins></x-plugins>

</x-layout>