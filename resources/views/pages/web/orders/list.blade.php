<div class="card-body">
    <div>
        <div class="table-responsive table-card mb-1">
            <table class="table align-middle">
                <thead class="table-light text-muted">
                    <tr>
                        <th>No</th>
                        <th>Kode Pembelian</th>
                        <th>Total Harga</th>
                        <th>Pengiriman</th>
                        <th>Bukti Pembayaran</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach($orders as $item)
                    <tr>
                        <td>{{$loop->iteration }}</td>
                        <td>{{$item->code}}</td>
                        <td>{{$item->total}}</td>
                        <td>{{ $item->delivery }} (7-8) Hari</td>
                        <td><img src="{{ asset('images/bukti_pembayaran/'.$item->image) }}" class="card-img-top"></td>
                        <td>
                            @if($item->status == 'pending')
                            <span class="badge badge-soft-warning text-uppercase">Menunggu</span>
                            @elseif($item->status == 'accepted')
                            <span class="badge badge-soft-success text-uppercase">Diterima</span>
                            @elseif($item->status == 'rejected')
                            <span class="badge badge-soft-danger text-uppercase">Ditolak</span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="javascript:;" onclick="load_detail('{{route('web.order.show',$item->id)}}')"
                                    class="btn btn-sm btn-primary">Detail</a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
{{ $orders->links('theme.app.pagination') }}