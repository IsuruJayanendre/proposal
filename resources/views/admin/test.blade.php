@include('header')
@include('admin.sidebar')
@include('sweetalert::alert')
<div class="content">
    <h2>All Posts</h2>
    
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
          <th scope="col">Approval</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @if($posts->isEmpty())
        <tr><td colspan="11">No pending posts available.</td></tr>
    @else
    @foreach($posts as $post)
    @if($post->approval !== 'removed') <!-- Hide if approval = removed -->
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
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-card-image" viewBox="0 0 16 16">
                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0"/>
                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54L1 12.5v-9a.5.5 0 0 1 .5-.5z"/>
              </svg>
            </a>
        </td>
          <td>
            @if($post->approval == 'no')
            <form method="POST" action="{{ route('posts.approve', $post->id) }}" class="d-inline">
              @csrf
              <button type="submit" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-lg" viewBox="0 0 16 16">
                <path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425z"/>
              </svg>
            </button>
          </form>
          @elseif($post->approval == 'yes')
          Approved
          </td>
        @endif
        <form method="POST" action="{{ route('posts.remove', $post->id) }}" class="d-inline">
            @csrf
            <td>
            <button type="submit" class="btn btn-danger"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
            </svg>
          </button>
        </form>
          </td>
        </tr>
        @endif
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
