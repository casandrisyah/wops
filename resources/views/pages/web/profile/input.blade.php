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
                                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$profile->name}}">
                                </div>
                
                                <div class="mb-3">
                                    <label for="email-field" class="form-label">No HP</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter deskripsi" value="{{$profile->phone}}">
                                </div>
                
                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Harga" value="{{$profile->email}}">
                                </div>
                
                                <div class="mb-3">
                                    <label for="email-field" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Stok" value="{{$profile->address}}">
                                </div>

                                <div class="mb-3">
                                    <label for="phone-field" class="form-label">Gambar</label>
                                    <input type="file" name="image" class="form-control @error('image') is invalid @enderror" placeholder="Gambar Produk...." value="{{$profile->gambar}}">
                                </div>
                            </div>
                            <div>
                                <div class="hstack gap-2 justify-content-end">
                                    @php
                                        $index = '';
                                        $role = Auth::user()->role;
                                        if($role == 'p'){
                                            $index = route('petani.profile');
                                        }elseif($role == 'd'){
                                            $index = route('distributor.profile');
                                        }
                                    @endphp
                                    <a class="btn btn-light" href="{{ $index }}">Kembali</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>