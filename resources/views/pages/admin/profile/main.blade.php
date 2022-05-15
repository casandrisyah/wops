<x-app-layout title="">

    <div class="page-content">
        <div class="row">
            <div class="col-xxl-3">
                <div class="card mt-n5">
                    <div class="card-body p-4">
                        <div class="text-center">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input id="profile-img-file-input" type="file" class="profile-img-file-input">
                                    <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                        <span class="avatar-title rounded-circle bg-light text-body">
                                            <i class="ri-camera-fill"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                            <h5 class="fs-16 mb-1">{{ Auth::user()->fullname }}</h5>
                        </div>
                    </div>
                </div>

            </div>
            <!--end col-->
            <div class="col-xxl-9">
                <div class="card mt-xxl-n5">
                    <div class="card-header">
                        <div class="card-title">
                            <h3>Change Password</h3>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <form id="cpassword">
                            @csrf
                            @method('PATCH')
                            <div class="row g-2">
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Masukkan Password Lama</label>
                                        <input type="password" class="form-control" name="old_password"
                                            placeholder="Enter old password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Masukkan Password Baru</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Enter new password">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Konfirmasi Password Baru</label>
                                        <input type="password" class="form-control" name="password_confirmation"
                                            placeholder="Enter new password">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button class="btn btn-info"
                                            onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.cpassword')}}','PATCH');">Change
                                            Password</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
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