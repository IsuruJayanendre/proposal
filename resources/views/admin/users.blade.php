@include('header')
@include('admin.sidebar')
<div class="content">
    <h2>Registered Users</h2>
    <div class="container p-5">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username <Noscript></Noscript>ame</th>
                <th scope="col">Email</th>
                <th scope="col">Registered At</th>
              </tr>
            </thead>
            <tbody>
              
                @foreach ($users as $user)
                @if($user->usertype !== 'admin')
                <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at}}</td>
              </tr>
              @endif
              @endforeach
            </tbody>
          </table>
    </div>
  </div>
@include('footer')
