@include('header')
@include('admin.sidebar')
<div class="content">
    <h2>Approved Posts</h2>
    
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Status</th>
          <th scope="col">Gender</th>
          <th scope="col">Nationality</th>
          <th scope="col">Age</th>
          <th scope="col">City,district</th>
          <th scope="col">Job Status</th>
          <th scope="col">Education</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if($posts->isEmpty())
        <tr><td colspan="11">No approved posts available.</td></tr>
    @else
    @foreach($posts as $post)
        <tr>
          <th scope="row">{{ $post->id }}</th>
          <td>{{ $post->name }}</td>
          <td>{{ $post->status }}</td>
          <td>{{ $post->gender }}</td>
          <td>{{ $post->nationality }}</td>
          <td>{{ $post->age }}</td>
          <td>{{ $post->city }},{{ $post->district }}</td>
          <td>{{ $post->job }}</td>
          <td>{{ $post->education }}</td>
          <td>
            <a href="#" data-bs-toggle="modal" data-bs-target="#imageModal{{ $post->id }}" class="btn btn-primary">
                View Image
            </a>
          </td>
          <td>
          <form method="POST" action="{{ route('posts.remove', $post->id) }}" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Remove</button>
        </form>
          </td>
        </tr>
        <div class="modal fade" id="imageModal{{ $post->id }}" tabindex="-1" aria-labelledby="imageModalLabel{{ $post->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imageModalLabel{{ $post->id }}">View Image</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ asset('images/proposals/' . $post->image) }}" alt="Post Image" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        @endif
      </tbody>
    </table>



  </div>
@include('footer')
