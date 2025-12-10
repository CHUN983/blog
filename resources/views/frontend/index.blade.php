@extends("frontend/layouts/master")
@section('title', 'Home')
@section('content')

  {{-- 阿里山地圖 --}}
  <section class="page-section clearfix">
    <div class="container">
      <div class="intro text-center" style="
        background-color: rgba(20, 20, 20, 0.4); 
        backdrop-filter: blur(10px); 
        -webkit-backdrop-filter: blur(10px); 
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 1rem; 
        padding: 3rem;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.5);
    ">
          <h2 class="section-heading mb-4">
            <span class="section-heading-upper" style="color: #D4AF37;">Alishan Origin</span>
            <span class="section-heading-lower" style="color: #F2E8CF;">Mapping the Flavor</span>
          </h2>
          <img class="img-fluid" src="{{ asset('img/map.png') }}" alt="阿里山產區地圖" style="max-height: 800px;">
      </div>
    </div>
  </section>

  <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="img/intro.jpg" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">
            <span class="section-heading-upper">Fresh Coffee</span>
            <span class="section-heading-lower">Worth Drinking</span>
          </h2>
          <p class="mb-3">Every cup of our quality artisan coffee starts with locally sourced, hand picked ingredients. Once you try it, our coffee will be a blissful addition to your everyday morning routine - we guarantee it!
          </p>
          <div class="intro-button mx-auto">
            <a class="btn btn-primary btn-xl" href="#">Visit Us Today!</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="page-section cta">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Our Promise</span>
              <span class="section-heading-lower">To You</span>
            </h2>
            <p class="mb-0">When you walk into our shop to start your day, we are dedicated to providing you with friendly service, a welcoming atmosphere, and above all else, excellent products made with the highest quality ingredients. If you are not satisfied, please let us know and we will do whatever we can to make things right!</p>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

