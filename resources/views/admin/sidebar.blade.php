<!-- Sidebar -->
<div class="sidebar">
    <a href="#home">Dashboard</a>
    {{-- <a href="{{route('post.pending')}}">Pending Posts</a> --}}
    {{-- <a href="{{route('post.approved')}}">Approved Posts</a> --}}
    {{-- <a href="{{route('post.removed')}}">Removed Posts</a> --}}
    <a href="{{route('test')}}">All Posts</a>
    <a href="{{route('payments')}}">payments</a>
    <a href="{{route('users')}}">Users</a>
    <hr>
    <form method="POST" action="{{ route('logout') }}" x-data>
      @csrf
      &nbsp&nbsp&nbsp<button type="submit" class="btn btn-danger">
          {{ __('Log Out') }}
      </button>
  </form>
  </div>