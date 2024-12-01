@include('header')
@include('user.navbar')
<div class="bg-image" 
     style="background-image: url('images/home2.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;">
    <div class="container p-5">
    <div class="row">
    @foreach ($posts as $post)
    <div class="col-md-4">
        <div class="card" style="width: 18rem; margin: 20px;">
            <div class="card-body text-center">
                <img src="{{ asset('images/proposals/' . $post->image) }}" alt="Proposal Image" class="rounded-circle" width="150" height="150" style="object-fit: cover;">
                <h5 class="card-title mt-3">{{ $post->name }}</h5>
                @if (Route::has('login'))
                @auth
                <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">View Profile</a>
                @else
                <p class="lead">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-exclamation-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                      </svg>
                      plese, login for more details</p>
                <a href ="{{ route('login') }}" class="btn btn-success">Log in</a>
                @endauth
                @endif
            </div>
        </div>
        </div>
    @endforeach
</div>
</div>
</div>
@include('user.footerbar')
@include('footer')