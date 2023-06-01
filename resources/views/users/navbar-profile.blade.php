<nav class="navbar navbar-expand-lg navbar-transparent" color-on-scroll="dark">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="/" rel="tooltip" title="Designed and Coded by JTI ASIK Tim" data-placement="bottom" target="self">
          <span>CDC Polije •</span> Online Assessment Test
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar bar1"></span>
          <span class="navbar-toggler-bar bar2"></span>
          <span class="navbar-toggler-bar bar3"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        
        <ul class="navbar-nav">

          <li class="dropdown nav-item">
            <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown" >
              <i class="fa fa-cogs d-lg-none d-xl-none"></i> <strong>{{auth()->user()->nama}}</strong>
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <form action="/logout" method="post">
                @csrf
                <button type="submit" class="dropdown-item" onclick="return confirm('Apakah Anda yakin ingin logout?');" style="color: #00081d;">
                  <i class="tim-icons icon-minimal-right"></i>Logout 
                </button>
             
            </div>
          </li>
   
        </ul>
      </div>
    </div>
  </nav>