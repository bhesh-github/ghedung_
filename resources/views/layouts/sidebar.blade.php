<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.home') }}" class="brand-link">
      {{-- <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <i class="fa fa-paw m-2 ml-4"></i>
      

      <span class="brand-text font-weight-light ">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/ghedungLogo.jpg')}}"
           class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Tamang Ghedung</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-item">
            <a href="#" class="nav-link">
              {{-- <i class="nav-icon fas fa-copy"></i> --}}
              <i class="fa fa-image nav-icon"></i>
              <p>
               Slider
                <i class="fas fa-angle-left right"></i>
                {{-- <span class="badge badge-info right">6</span> --}}
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('admin.slider') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Add Slider
                </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('slider.show') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    List Sliders
                </p>
                </a>
              </li>
            </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>
                   News
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('news.create') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Create News
                    </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('news.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        List News
                    </p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-image"></i>
                  <p>
                   Gallery
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href={{ route('gallery.index') }} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Images
                    </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href={{ route('video.index') }} class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Videos
                    </p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>
                   Notice (सुचना)
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('notice.create') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Add Notice
                    </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('notice.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        List Notices
                    </p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-newspaper"></i>
                  <p>
                   Article (विचार)
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{ route('article.create') }}"  class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Add Article
                    </p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{ route('article.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        List Articles
                    </p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-newspaper"></i>
                <p>
                 Activity (गतिविधि)
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('activity.create') }}"  class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Add Activity
                  </p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{ route('activity.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      List Activities
                  </p>
                  </a>
                </li>
              </ul>
          </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-user"></i>
                  <p>
                   Member (कार्यसमिति)
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  {{-- <li class="nav-item">
                    <a href="{{ route('team.create') }}"class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Add Member
                    </p>
                    </a>
                  </li> --}}
                  <li class="nav-item">
                    <a href="{{ route('team.create') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        Add Member
                    </p>
                    </a>
                    <a href="{{ route('team.index') }}" class="nav-link">
                      <i class="far fa-circle nav-icon"></i>
                      <p>
                        List Members
                    </p>
                    </a>
                  </li>
                </ul>
            </li>
            <li class="nav-item">
              <a
               href="{{ route('samiti.index') }}"
                class="nav-link">
                <i class="nav-icon fa fa-info-circle"></i>
                <p>
                  Samiti (समिति)
                </p>
              </a>
          </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Advisor (सल्लाहकार)
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{ route('sallahakar.create') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      Add Advisor
                  </p>
                  </a>
                  <a href="{{ route('sallahakar.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>
                      List Advisors
                  </p>
                  </a>
                </li>
              </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                {{-- Downloads --}}
                Document (दस्तावेज)
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('download.type.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Documents Type (प्रकार)
                </p>
                </a>
                <a href="{{ route('downloads.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                   List Documents
                </p>
                </a>
              </li>
            </ul>
        </li>
            <li class="nav-item">
                <a href="{{ route('admin.contact') }}" class="nav-link">
                  <i class="nav-icon fas fa-phone"></i>
                  <p>
                   Contact
                  </p>
                </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.company.profile') }}" class="nav-link">
                <i class="nav-icon fa fa-info-circle"></i>
                <p>
                 Company Profile
                </p>
              </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Sub Companies
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('sub-company.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Add Company
                </p>
                </a>
                <a href="{{ route('sub-company.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    List Company
                </p>
                </a>
              </li>
            </ul>
          
        </li>
      <li style="height:200px"></li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>