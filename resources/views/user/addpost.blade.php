@include('header')
@include('user.navbar')
@include('sweetalert::alert')

@if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: "{{ session('success') }}",
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
            });
        </script>
    @endif


<div class="bg-image" 
     style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('images/login.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;">
            <div class="container p-5">
                <div class="card p-4 bg-light">
            <h1>Add proposal</h1><br>

            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="row">
                <div class="col">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name" value="{{ Auth::user()->name }}" readonly>
                        <label for="floatingInput">Name</label>
                      </div>
                    <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="status" required>
                        <option selected disabled>Select status</option>
                        <option value="Unmarried">Unmarried</option>
                        <option value="Devorced">Devorced</option>
                      </select>
                      <select class="form-select form-select-lg mb-3" aria-label="Large select example"name="gender" required>
                        <option selected desabled>Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="nationality" required>
                        <label for="floatingInput">Nationanality</label>
                      </div>
                      <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"  id="age" placeholder="Age" readonly name="age" required>
                                <label for="floatingInput">Age</label>
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="birthday" placeholder="Birthday" onchange="calculateAge()" name="birthday" required>
                                <label for="floatingInput">Birthday</label>
                              </div>
                        </div>
                    </div>
                    <div class="form-floating mb-3">
                      <input type="text" class="form-control" id="floatingInput" placeholder="+94 xxx xxx xxx" name="contact">
                      <label for="floatingInput">Contact Number</label>
                    </div>
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="district" required>
                                <label for="floatingInput">District</label>
                              </div>
                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="city" required>
                                <label for="floatingInput">City</label>
                              </div>
                        </div>
                    </div>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="job"  required>
                        <label for="floatingInput">Job Staus</label>
                      </div>
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="education"  required>
                        <label for="floatingInput">Education</label>
                      </div>
                      <div class="mb-3">
                        <label for="image" class="form-label">Upload Image</label>
                        <input type="file" id="imageUpload" class="form-control" accept="image/*" onchange="previewImage(event)" name="image" required>
                    </div>
                    <div class="mt-3">
                      <img id="imagePreview" src="" alt="Image Preview" style="width: 200px; height: 200px; display: none; object-fit: cover;">
                  </div><br>
                      <button type="submit" class="btn btn-primary">Post</button>
                      <a href="/" class="btn btn-secondary">Cancel</a>
                </div>
              </div>
                </div>
            </div>
          </form>
</div>
<script>
    function calculateAge() {
        // Get the selected date
        const birthdayInput = document.getElementById("birthday").value;
        const birthDate = new Date(birthdayInput);
        const today = new Date();

        // Calculate age difference in milliseconds
        const ageInMilliseconds = today - birthDate;
        
        // Convert milliseconds to years
        const ageDate = new Date(ageInMilliseconds);
        const age = Math.abs(ageDate.getUTCFullYear() - 1970); // Subtract 1970 since Unix epoch starts in 1970

        // Display age in the age input field
        document.getElementById("age").value = age;
    }
</script>
<script>
  function previewImage(event) {
      const file = event.target.files[0];
      const preview = document.getElementById("imagePreview");
  
      if (file) {
          const reader = new FileReader();
          reader.onload = function(e) {
              preview.src = e.target.result;
              preview.style.display = "block"; // Display the image element
          };
          reader.readAsDataURL(file); // Convert image to a data URL
      }
  }
  </script>
@include('footer')