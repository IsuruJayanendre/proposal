@include('header')
@include('user.navbar')
<div class="bg-image" 
     style="background-image:  url('images/home.jpg')
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;">
<div class="container p-5">

    <div class="row">
        <div class="col-md-4">
            <img src="{{ asset('images/proposals/' . $post->image) }}" alt="Proposal Image" class="img-fluid" style="width: 500px; height: 500px; object-fit: cover;">
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col">
            <h1>{{ $post->name }}</h1>
                </div>
                <div class="col">
                <h4>Contact: {{ $post->contact }}</h4>
                </div>
            </div>
            <hr>
            <h4>Details,</h4>
            <p class="lead"><strong>Age:</strong> {{ $post->age }}</p>
            <p class="lead"><strong>Gender:</strong> {{ $post->gender }}</p>
            <p class="lead"><strong>Nationality:</strong> {{ $post->nationality }}</p>
            <p class="lead"><strong>Job:</strong> {{ $post->job }}</p>
            <p class="lead"><strong>Education:</strong> {{ $post->education }}</p>
            <p class="lead"><strong>City:</strong> {{ $post->district }},{{ $post->city }}</p>
            <p class="lead"><strong>Birthday:</strong> {{ $post->birthday }}</p>
            <!-- Add more details as needed -->
        </div>
    </div>

    <div class="row">
        <div class="col">
          
        </div>
        <div class="col-6">
          
        </div>
        <div class="col">
            <a class="btn btn-dark" href="{{route('post.find')}}" role="button">Back</a>
        </div>
      </div>

</div>

</div>
@include('user.footerbar')
@include('footer')