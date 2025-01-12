  @extends('layout')
  @section('title')
  <title>Contact</title>
  @endsection
  @section('content')

    <div class="pagetitle">
      <h1>Contact</h1>
    </div>

    <section class="section contact">

      <div class="row gy-4">
        <div class="col-xl-6" >
          <div class="card p-4">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.203320315423!2d110.37145197463436!3d-7.916586179071464!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7bab6e7e9df693%3A0x60533f0ba91d6b3e!2sJalan%20Parangtritis%20Km.%2011%2C%20Dukuh%2C%20Sabdodadi%2C%20Bantul%2C%20Kabupaten%20Bantul%2C%20Daerah%20Istimewa%20Yogyakarta%2C%20Indonesia!5e0!3m2!1sid!2sid!4v1697043623372!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 270px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
        <div class="col-xl-6">
          <div class="card p-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <div>
                <h3 style="font-size: medium;font-weight: bold;">Address</h3>
                <pstyle="font-size: medium;" >Jalan Parangtritis Km. 11, Dukuh, Sabdodadi, Bantul, Kabupaten Bantul, DI Yogyakarta, Indonesia</p>
              </div>
            </div>
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <div>
                <h3 style="font-size: medium;font-weight: bold;" >Call Us</h3>
                <pstyle="font-size: medium;" >(0274) 367156</p>
              </div>
            </div>
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <div>
                <h3 style="font-size: medium;font-weight: bold;">Email Us</h3>
                <p style="font-size: medium;">info@example.com</p>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section>

    @endsection
