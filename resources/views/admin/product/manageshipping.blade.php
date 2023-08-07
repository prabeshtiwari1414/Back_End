<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage="manageproductshipping"></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="Manage Product"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Manage Product</h6>
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
                                                        class="text-uppercase text-center text-secondary text-xxs font-weight-bolder opacity-7">
                                                        State</th>

                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Shipping Charge</th>
                                                    
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Status</th>
                                                        <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Create At</th>
                                                    

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($shipping as $shs)
                                                <tr>
                                                    <td class="align-middle text-center text-sm">
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{$shs->state}}</span>
                                                    </td>
                                                    <td>
                                                       <div class="d-flex text-center flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm">{{$shs->shipping_charge}}
                                                            </h6>
                                                        </div>
                                                    </td>

                                                    
                                                    <td class="align-middle text-center text-sm">
                                                        <span
                                                            class="badge badge-sm bg-gradient-success">{{$shs->status}}</span>
                                                    </td>
                                                    <td class="align-middle text-center">
                                                        <span
                                                            class="text-secondary text-xs font-weight-bold">{{$shs->created_at}}</span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <a href="#!"
                                                            class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            <button class="bg-info text-light btn-lg"><b><i
                                                                        class="material-icons">edit</i></b></button>
                                                        </a>
                                                        | <a href="{{ route('getDeleteCharge', $shs->id) }}"
                                                            class="text-secondary font-weight-bold text-xs"
                                                            data-toggle="tooltip" data-original-title="Edit user">
                                                            <button class="bg-primary text-light btn-lg"><b><i
                                                                        class="material-icons">delete</i></b></button>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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