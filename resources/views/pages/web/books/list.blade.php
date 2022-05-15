<div class="row">
    @foreach ($books as $item)
    <div class="col-sm-6 col-xl-3">
        <!-- Simple card -->
        <div class="card">
            <img class="card-img-top img-fluid" src="{{ asset('images/books/'.$item->cover) }}" alt="Card image cap">
            <div class="card-body">
                <h4 class="card-title mb-2">{{ $item->title }}</h4>
                <p class="card-text">{{ $item->description }}</p>
                <div class="text-end">
                    <a href="javascript:;" onclick="load_detail('{{route('web.books.show',$item->id)}}')" class="btn btn-primary">Detail</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
{{ $books->links('theme.app.pagination') }}