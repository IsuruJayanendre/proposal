@include('header')
@include('admin.sidebar')
<div class="content">
    <h2>Payments</h2>
    <div class="container p-5">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Method</th>
          <th scope="col">Price</th>
          <th scope="col">Status</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody>
        @if($payments->isEmpty())
        <tr><td colspan="11">No Payments available.</td></tr>
    @else
    @foreach($payments as $payment)
        <tr>
          <th scope="row">{{ $payment->id }}</th>
          <td>{{ $payment->user->name }}</td>
          <td>{{ $payment->payment_method }}</td>
          <td>{{ $payment->price }}</td>
          <td>{{ $payment->status }}</td>
          <td>{{ $payment->created_at }}</td>
        @endforeach
        @endif
      </tbody>
    </table>


    </div>
  </div>
@include('footer')
