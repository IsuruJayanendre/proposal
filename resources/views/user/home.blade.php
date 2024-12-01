@include('header')
@include('user.navbar')
<div class="bg-image" 
     style="background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),  url('images/home.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;">

<div class="d-flex justify-content-center align-items-center h-100">
  <div class="text-white">
      <form action="{{ route('post.store') }}" method="GET" class="bg-dark p-4 rounded">
          <h1 class="mb-3">Find Your Proposal</h1>
          
          <!-- Gender Selection -->
          <div class="form-group mb-3">
              <label class="form-label">I'm Looking For</label>
              <div class="d-flex gap-3">
                  <label class="btn btn-outline-light btn-lg d-flex align-items-center gap-2">
                      <input type="radio" name="gender" value="Bride" required>
                      <i class="fas fa-female"></i> Bride
                  </label>
                  <label class="btn btn-outline-light btn-lg d-flex align-items-center gap-2">
                      <input type="radio" name="gender" value="Groom" required>
                      <i class="fas fa-male"></i> Groom
                  </label>
              </div>
          </div>

          <!-- Age Range -->
          <div class="form-group mb-3">
              <label class="form-label">Age Range</label>
              <div class="d-flex gap-2">
                  <input type="number" name="age_min" class="form-control" placeholder="Min Age" min="18" required>
                  <input type="number" name="age_max" class="form-control" placeholder="Max Age" min="18" required>
              </div>
          </div>

          <!-- Search Button -->
          <div class="text-center">
              <button type="submit" class="btn btn-outline-light btn-lg">
                  <i class="fas fa-search"></i> Search
              </button>
            </form><br><br>
            <a href="{{ route('post.find') }}" class="btn btn-outline-light btn-sm">All Proposals</a>
            @auth
            @if (Route::has('login'))
            <a href="{{ route('profile') }}" class="btn btn-outline-light btn-sm">My profile</a>
            @else
            @endif
            @endauth
          </div>
  </div>
</div>


</div>
<script>
  document.addEventListener("DOMContentLoaded", function () {
      const text = "Proposals.lk"; // Text to be typed
      const typingElement = document.getElementById("typingText");
      let index = 0;
  
      function type() {
          if (index < text.length) {
              typingElement.textContent += text.charAt(index);
              index++;
              setTimeout(type, 150); // Typing speed
          } else {
              setTimeout(() => {
                  typingElement.textContent = ""; // Clear text
                  index = 0; // Reset index
                  type(); // Start typing again
              }, 1000); // Pause before restarting
          }
      }
  
      type(); // Initial call
  });
  </script>
  
  
@include('user.footerbar')
@include('footer') 