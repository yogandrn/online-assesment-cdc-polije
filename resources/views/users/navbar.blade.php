<nav class="navbar navbar-expand-lg navbar-transparent" color-on-scroll="dark">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/" rel="tooltip" title="Designed and Coded by JTI ASIK Tim" data-placement="bottom" target="self">
          <span>CDC Polije•</span> Online Assessment Test
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a>
                Welcome•
              </a>
            </div>
            <div class="col-6 collapse-close text-right">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <i class="tim-icons icon-simple-remove"></i>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav">
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Message us on Whatsapp" data-placement="bottom" href="https://wa.me/+628113591500" target="https://wa.me/+628113591500">
              <i class="fab fa-whatsapp"></i>
              <p class="d-lg-none d-xl-none">Whatsapp</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://web.facebook.com/jpc.polije?_rdc=1&_rdr" target="_blank">
              <i class="fab fa-facebook-square"></i>
              <p class="d-lg-none d-xl-none">Facebook</p>
            </a>
          </li>
          <li class="nav-item p-0">
            <a class="nav-link" rel="tooltip" title="Follow us on Linkedin" data-placement="bottom" href="https://www.linkedin.com/in/job-placement-center-ab33a61a4/" target="_blank">
              <i class="fab fa-linkedin"></i>
              <p class="d-lg-none d-xl-none">Linkedin</p>
            </a>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="fa fa-cogs d-lg-none d-xl-none"></i> Services
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <!-- <a href="https://demos.creative-tim.com/blk-design-system/docs/1.0/getting-started/overview.html" class="dropdown-item">
              </a> -->
              <a href="/users/gayakepribadian" class="dropdown-item">
                <i class="tim-icons icon-bullet-list-67"></i>Gaya Kepribadian
              </a>
              <a href="/users/minatkarir" class="dropdown-item">
                <i class="tim-icons icon-image-02"></i>Minat Karir
              </a>
            </div>
          </li>

          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="fa fa-cogs d-lg-none d-xl-none"></i> Hallo {{auth()->user()->nama}}
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="/users/profile/{{ auth()->user()->id }}" class="dropdown-item">
                <i class="tim-icons icon-single-02"></i>View Profile
              </a>
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin logout?');">
                  <i class="tim-icons icon-minimal-right"></i>Logout 
                </button>
             
            </div>
          </li>
          
        </ul>
      </div>
    </div>
  </nav>