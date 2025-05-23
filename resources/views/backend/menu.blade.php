<nav class="navbar navbar-light navbar-vertical navbar-expand-xl navbar-card">
  <script>
    var navbarStyle = localStorage.getItem("navbarStyle");
    if (navbarStyle && navbarStyle !== 'transparent') {
      document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
    }
  </script>
  <div class="d-flex align-items-center">
    <div class="toggle-icon-wrapper">

      <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

    </div><a class="navbar-brand" href="/backend/index.html">
      <div class="d-flex align-items-center py-3"><img class="me-2" src="" alt="" width="40" /><small class="font-sans-serif"></small>
      </div>
    </a>
  </div>
  <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar">
      <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
        <li class="nav-item">
          <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
            <div class="col-auto navbar-vertical-label">ผู้ใช้งาน</div>
            <div class="col ps-0">
              <hr class="mb-0 navbar-vertical-divider" />
            </div>
          </div>
          <!-- ออกบิล -->
          <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}" role="button">
            <div class="d-flex align-items-center">
              <span class="nav-link-icon"><i class="fas fa-file-invoice"></i></span>
              <span class="nav-link-text ps-1">หน้าหลัก</span>
            </div>
          </a>
          <a class="nav-link {{ request()->is('/foodmenu') ? 'active' : '' }}" href="{{ url('/foodmenu') }}" role="button">
            <div class="d-flex align-items-center">
              <span class="nav-link-icon"><i class="fas fa-file-invoice"></i></span>
              <span class="nav-link-text ps-1">เพิ่มเมนูอาหารของฉัน</span>
            </div>
          </a>
        </li>
      
      </ul>
    </div>
  </div>
</nav>