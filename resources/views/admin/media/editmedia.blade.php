<x-layout bodyClass="g-sidenav-show bg-gray-200">

    <x-navbars.sidebar activePage="managemedia"></x-navbars.sidebar>
    <div class="main-content position-relative bg-gray-100 max-height-vh-100 h-100">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage='Media'></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid px-2 px-md-4">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                <span></span>
            </div>
            <div class="card card-body mx-3 mx-md-4 mt-n6">
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <!-- <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('assets') }}/img/bruce-mars.jpg" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div> -->
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Add Media
                            </h5>

                        </div>
                    </div>

                </div>
                <div class="card card-plain h-100">
                    <div class="card-header pb-0 p-3">
                    </div>
                    <div class="card-body p-3">
                        @if (session('status'))
                        <div class="row">
                            <div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('status') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                        @endif
                        @if (Session::has('demo'))
                        <div class="row">
                            <div class="alert alert-danger alert-dismissible text-white" role="alert">
                                <span class="text-sm">{{ Session::get('demo') }}</span>
                                <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                    aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        </div>
                        @endif
                        <form method='POST' action="{{route('postAddMedia')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Social Media Name</label>
                                    <input type="text" name="media_name" class="form-control border border-2 p-2"
                                        value={{$media->media_name}}>
                                    @error('title')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label">Social Media Link</label>
                                    <input type="url" name="media_url" class="form-control border border-2 p-2" required
                                        value={{$media->media_url}}>

                                    @error('title')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>

                                <div class="mb-3 col-md-12">
                                    <label class="form-label">Social Media Icon</label>
                                    <input type="file" name="media_icon" class="form-control border border-2 p-2"
                                        accept=".png" required>
                                    @if($media->media_icon)
                                    <img src="{{ asset('site/uploads/media/' .$media->media_icon) }}"
                                        alt="Current Photo" style="max-width: 200px;">
                                    @else
                                    <p>No photo available.</p>
                                    @endif
                                    @error('photo')
                                    <p class='text-danger inputerror'>{{ $message }} </p>
                                    @enderror
                                </div>




                            </div>

                            <button type="submit" class="btn bg-gradient-dark">Add</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </div>
    <x-plugins></x-plugins>

</x-layout>