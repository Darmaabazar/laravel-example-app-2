<div class="container">

    <header class="mb-3">
        <div class="container bg-body-secondary">
          <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start py-3">
            <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-black text-decoration-none">
              <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
            </a>
    
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
              <li><a href="#" class="nav-link px-2 text-black">Features</a></li>
              <li><a href="#" class="nav-link px-2 text-black">Pricing</a></li>
              <li><a href="#" class="nav-link px-2 text-black">FAQs</a></li>
              <li><a href="#" class="nav-link px-2 text-black">About</a></li>
            </ul>
    
            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex" role="search" method="GET" action="{{url('posts/search/')}}">
              <input name="query" type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search">
              <button class="btn btn-outline-dark me-2" type="submit">Search</button>
            </form>
          </div>
        </div>
    </header>
</div>