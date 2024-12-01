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

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Payment Details
                    </div>
    
                    <div class="card-body">
                        <!-- Display any success or error messages -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif(session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        
                           <p class="lead">You must subscribe for add more proposals !</p>
                        
                        <!-- Payment Form -->
                        <form action="{{ route('payment.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" step="0.01" name="price" id="price" class="form-control" value="1000" readonly required>
                            </div><br>
                            <div class="form-group">
                                <label for="payment_method">Payment Method:</label>
                                <select name="payment_method" id="payment_method" class="form-control" required>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="paypal">PayPal</option>
                                    <!-- Add more methods as needed -->
                                </select>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Submit Payment</button>
                            <a href="{{route('addpost')}}" class="btn btn-secondary">Back</a>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@include('user.footerbar')
@include('footer')