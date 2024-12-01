@include('header')
@include('navbar')

@section('content')
<div class="container">
    <h1 class="my-4">Search Results</h1>

    @if ($proposals->isEmpty())
        <p>No proposals found matching your criteria.</p>
    @else
        <div class="row">
            @foreach ($proposals as $proposal)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('images/proposals/' . $proposal->image) }}" class="card-img-top" alt="Proposal Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $proposal->name }}</h5>
                            <p class="card-text">Age: {{ $proposal->age }}</p>
                            <p class="card-text">Gender: {{ $proposal->gender }}</p>
                            <p class="card-text">City: {{ $proposal->city }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
@include('footer')