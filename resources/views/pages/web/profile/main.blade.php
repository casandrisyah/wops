<x-app-layout title="">
    
    <div class="page-content">
        <div class="container-fluid">

            <div class="position-relative mx-n4 mt-n4">
                <div class="profile-wid-bg profile-setting-img">
                    <img src="assets/images/profile-bg.jpg" class="profile-wid-img" alt="">
                    <div class="overlay-content">
                        <div class="text-end p-3">
                            <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                <input id="profile-foreground-img-file-input" type="file"
                                    class="profile-foreground-img-file-input">
                                <label for="profile-foreground-img-file-input"
                                    class="profile-photo-edit btn btn-light">
                                    <i class="ri-image-edit-line align-bottom me-1"></i> Change Cover
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-3">
                    <div class="card mt-n5">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                    <img src="{{ asset('storage/'.Auth::user()->image) }}"
                                        class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                        alt="user-profile-image">
                                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                        <input id="profile-img-file-input" type="file"
                                            class="profile-img-file-input">
                                        <label for="profile-img-file-input"
                                            class="profile-photo-edit avatar-xs">
                                            <span class="avatar-title rounded-circle bg-light text-body">
                                                <i class="ri-camera-fill"></i>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <h5 class="fs-16 mb-1">{{ Auth::user()->name }}</h5>
                                <p class="text-muted mb-0">Lead Designer / Developer</p>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <!--end col-->
                <div class="col-xxl-9">
                    <div class="card mt-xxl-n5">
                        <div class="card-header">
                            <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0"
                                role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails"
                                        role="tab">
                                        Personal Details
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#changePassword" role="tab">
                                        Change Password
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body p-4">
                            <div class="tab-content">
                                <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="firstnameInput" class="form-label">Name</label>
                                                    <input type="text" class="form-control" id="firstnameInput"
                                                        placeholder="Enter your firstname" value="{{ Auth::user()->name }}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="phonenumberInput" class="form-label">Phone
                                                        Number</label>
                                                    <input type="text" class="form-control"
                                                        id="phonenumberInput"
                                                        placeholder="Enter your phone number"
                                                        value="{{ Auth::user()->phone }}">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="emailInput" class="form-label">Email
                                                        Address</label>
                                                    <input type="email" class="form-control" id="emailInput"
                                                        placeholder="Enter your email"
                                                        value="{{ Auth::user()->email }}">
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <div class="mb-3">
                                                    <label for="address" class="form-label">Address</label>
                                                    <input type="text" class="form-control" minlength="5"
                                                        maxlength="50" id="address"
                                                        placeholder="Enter zipcode" value="{{ Auth::User()->address }}">
                                                </div>
                                            </div>
                                            @php
                                            $profile = '';
                                            $role = Auth::user()->role;
                                            if ($role == 'p') {
                                                $profile = route('petani.profile.edit');
                                            } elseif ($role == 'd') {
                                                $profile = route('distributor.profile.edit');
                                            }
                                            @endphp
                                            <div class="col-lg-12">
                                                <div class="hstack gap-2 justify-content-end">
                                                    <a href="{{ $profile }}" class="btn btn-primary">Edit</a>
                                                    <button type="button"
                                                        class="btn btn-soft-info">Cancel</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                </div>
                                <!--end tab-pane-->
                                <div class="tab-pane" id="changePassword" role="tabpanel">
                                    @php
                                    $profile = '';
                                    $role = Auth::user()->role;
                                    if ($role == 'p') {
                                        $profile = route('petani.profile.cpassword');
                                    } elseif ($role == 'd') {
                                        $profile = route('distributor.profile.cpassword');
                                    }
                                    @endphp
                                    <form action="{{ $profile }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <div class="row g-2">
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="newpasswordInput" class="form-label">New
                                                        Password*</label>
                                                    <input name="password" type="password" class="form-control"
                                                        id="newpasswordInput" placeholder="Enter new password">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-6">
                                                <div>
                                                    <label for="confirmpasswordInput" class="form-label">Confirm
                                                        Password*</label>
                                                    <input name="confirm-password" type="password" class="form-control"
                                                        id="confirmpasswordInput"
                                                        placeholder="Confirm password">
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <a href="javascript:void(0);"
                                                        class="link-primary text-decoration-underline">Forgot
                                                        Password ?</a>
                                                </div>
                                            </div>
                                            <!--end col-->
                                            <div class="col-lg-12">
                                                <div class="text-end">
                                                    <button type="submit" class="btn btn-info">Change
                                                        Password</button>
                                                </div>
                                            </div>
                                            <!--end col-->
                                        </div>
                                        <!--end row-->
                                    </form>
                                </div>
                                <!--end tab-pane-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end col-->
            </div>
            <!--end row-->

        </div>
        <!-- container-fluid -->
    </div><!-- End Page-content -->
</x-app-layout>