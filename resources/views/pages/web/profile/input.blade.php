<x-app-layout title="">
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="modal-content">
                        <div class="modal-header bg-light p-3">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
                        </div>
                        @php
                            $update = '';
                            $role = Auth::user()->role;
                            if($role == 'p'){
                            $update = route('petani.profile.update');
                            }elseif($role == 'd'){
                            $update = route('distributor.profile.update');
                            }
                        @endphp
                        <form action="{{ $update }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            <div class="modal-body">
                                <input type="hidden" id="id-field">

                                <div class="mb-3">
                                    <label for="customername-field" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter name"
                                        value="{{ $profile->name }}">
                                </div>

                                <div class="mb-3">
                                    <label for="email-field" class="form-label">No HP</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter deskripsi"
                                        value="{{ $profile->phone }}">
                                </div>

                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Harga"
                                        value="{{ $profile->email }}">
                                </div>

                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Stok"
                                        value="{{ $profile->address }}">
                                </div>

                                <div class="mb-3">
                                    <label for="province" class="form-label">Province</label>
                                    <select class="form-control" id="province" name="province" data-plugin="choices">
                                        <option value="">Select Province</option>
                                        @foreach($provinces as $province)
                                            <option value="{{ $province->id }}"
                                                {{ Auth::user()->province_id==$province->id?'selected':'' }}>
                                                {{ $province->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="city" class="form-label">City</label>
                                    <select class="form-control" id="city" name="city" data-plugin="choices">
                                        <option value="">Select City</option>
                                        @foreach($cities as $city)
                                            <option value="{{ $city->id }}"
                                                {{ Auth::user()->city_id==$city->id?'selected':'' }}>
                                                {{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="subdistrict" class="form-label">Subdistrict</label>
                                    <select class="form-control" id="district" name="subdistrict" data-plugin="choices">
                                        <option value="">Select Subdistrict</option>
                                        @foreach($subdistricts as $subdistrict)
                                            <option value="{{ $subdistrict->id }}"
                                                {{ Auth::user()->subdistrict_id==$subdistrict->id?'selected':'' }}>
                                                {{ $subdistrict->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="postal_code" class="form-label">Kode Pos</label>
                                    <input type="text" class="form-control" id="postal_code" name="postal_code"
                                        placeholder="Enter postal code" value="{{ Auth::user()->postal_code }}">
                                </div>
                            </div>
                            <div>
                                <div class="hstack gap-2 justify-content-end">
                                    <a class="btn btn-light"
                                        href="{{ route('web.profile') }}">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('custom_js')
    <script>
        $("#province").change(function () {
            $.post('{{ route('web.regional.city') }}', {
                    province: $("#province").val()
                },
                function (result) {
                    $("#city").html(result);
                }, "html");
        });
        $("#city").change(function () {
            $.post('{{ route('web.regional.subdistrict') }}', {
                    city: $("#city").val()
                },
                function (result) {
                    $("#subdistrict").html(result);
                }, "html");
        });
    </script>
    @endsection
</x-app-layout>