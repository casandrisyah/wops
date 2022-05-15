<div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
        <h4 class="mb-sm-0">Create Product</h4>
    </div>
</div>
<form id="form_input">
    @csrf
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="" class="form-label">Judul Buku</label>
                <input type="text" name="title" class="form-control" placeholder="Masukkan Judul Buku" value="{{ $data->title }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Pilih Kategori</label>
                <select name="category" class="form-select">
                    <option disabled selected>Pilih Kategori</option>
                    <option value="novel">Novel</option>
                    <option value="komik">Komik</option>
                    <option value="cerpen">Cerpen</option>
                    <option value="ensiklopedia">Ensiklopedia</option>
                    <option value="biografi">Biografi</option>
                    <option value="dongeng">Dongeng</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Harga</label>
                <input type="number" name="price" class="form-control" placeholder="Masukkan Harga" value="{{ $data->price }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Stok</label>
                <input type="number" name="stock" class="form-control" placeholder="Masukkan Stok" value="{{ $data->stock }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Penulis</label>
                <input type="text" name="author" class="form-control" placeholder="Masukkan Penulis" value="{{ $data->author }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Penerbit</label>
                <input type="text" name="publisher" class="form-control" placeholder="Masukkan Penerbit" value="{{ $data->publisher }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Tahun Terbit</label>
                <input type="number" name="year" class="form-control" placeholder="Masukkan Tahun Terbit" value="{{ $data->year }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Gambar</label>
                <input type="file" name="cover" class="form-control" placeholder="Masukkan Gambar" value="{{ $data->cover }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Deskripsi</label>
                <textarea name="description" class="form-control" placeholder="Masukkan Deskripsi">{{ $data->description }}</textarea>
            </div>
        </div>
        <div class="card-footer">
            <div class="hstack gap-2 justify-content-end">
                <a class="btn btn-light" href="javascript:;" onclick="load_list(1);">Kembali</a>
                @if($data->id)
                <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.books.update',$data->id)}}','PATCH');" class="btn btn-primary" id="add-btn">Tambah Produk</button>
                @else
                <button id="tombol_simpan" onclick="handle_upload('#tombol_simpan','#form_input','{{route('admin.books.store')}}','POST');" class="btn btn-primary" id="add-btn">Tambah Produk</button>
                @endif
            </div>
        </div>
    </div>
</form>