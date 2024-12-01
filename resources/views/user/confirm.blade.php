@include('header')
@include('user.navbar')
<div class="bg-image" 
     style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('images/home.jpg');
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

                    <!-- Payment Form -->
                    <form action="{{route('done')}}" method="POST">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required readonly>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required readonry>
                        </div>

                        <!-- Payment Amount -->
                        <div class="mb-3">
                            <label for="amount" class="form-label">Payment Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" required min="1" value="1000" readonly>
                        </div>

                        <!-- Card Details (example fields, can be replaced with a payment gateway integration) -->
                        <div class="mb-3">
                            <label for="card_number" class="form-label">Card Number</label>
                            <input type="text" class="form-control" id="card_number" name="card_number" required>
                        </div>

                        <div class="mb-3">
                            <label for="card_expiry" class="form-label">Expiry Date</label>
                            <input type="text" class="form-control" id="card_expiry" name="card_expiry" placeholder="MM/YY" required>
                        </div>

                        <div class="mb-3">
                            <label for="card_cvc" class="form-label">CVC</label>
                            <input type="text" class="form-control" id="card_cvc" name="card_cvc" required>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success">Submit Payment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
@include('user.footerbar')
@include('footer') 