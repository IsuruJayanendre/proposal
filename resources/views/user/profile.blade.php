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

        <div class="d-flex justify-content-end">
            <a href="{{ route('addpost') }}" class="btn btn-light btn-lg"><i class="fa-solid fa-plus"></i> New Proposal</a>
        </div><br><br>

    <div class="row">
    @foreach ($posts as $post)
    @auth
    @if($post->name === Auth::user()->name)

    @if($post->approval == 'no')
    <div class="alert alert-warning" role="alert">
        <div class="row">
            <div class="col">
                <img src="{{ asset('images/proposals/' . $post->image) }}" alt="Proposal Image" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
            </div>
            <div class="col-6">
                <p class="lead">Your proposal {{$post->created_at }} <strong>Pending !</strong></p>
            </div>
            <div class="col">
                <a href="{{ route('post.show', $post->id) }}" class="btn btn-warning">View Prposal</a>
            </div>
          </div>
      </div>
          @elseif($post->approval == 'yes')
          <div class="alert alert-success" role="alert">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('images/proposals/' . $post->image) }}" alt="Proposal Image" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                </div>
                <div class="col-6">
                    <p class="lead">Your proposal {{$post->created_at }} was <strong>Approved !</strong></p>
                </div>
                <div class="col">
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-success">View Prposal</a>
                    <form method="POST" action="{{ route('posts.remove', $post->id) }}" class="d-inline">
                        @csrf
                        <td>
                        <button type="submit" class="btn btn-danger">Remove</button>
                    </form>
                </div>
              </div>
          </div>
          @elseif($post->approval == 'removed')
          <div class="alert alert-danger" role="alert">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('images/proposals/' . $post->image) }}" alt="Proposal Image" class="rounded-circle" width="50" height="50" style="object-fit: cover;">
                </div>
                <div class="col-6">
                    <p class="lead">Your proposal {{$post->created_at }} was <strong>Removed !</strong></p>
                </div>
                <div class="col">
                    <a href="{{ route('post.show', $post->id) }}" class="btn btn-danger">View Prposal</a>
                    <a href="" class="btn btn-warning">Restore</a>
                    
                </div>
              </div>
          </div>
        @endif
        


        @endif
        @endauth
    @endforeach
</div>
</div>
</div>
@include('user.footerbar')
@include('footer')