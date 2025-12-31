<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item">
        <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
        </a>
    </li>

      <li class="nav-item">
        <a href="{{ route('contacts.index') }}" class="nav-link {{ Route::is('contacts.index') ? 'active' : '' }}">
            <i class="fas fa-envelope-open-text nav-icon"></i>
            <p>Contact Messages</p>
        </a>
    </li>

    

    <li class="nav-item">
        <a href="{{ route('admin.index') }}" class="nav-link {{ Route::is('admin.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Admin</p>
        </a>
    </li>



    <li class="nav-item">
        <a href="{{ route('user.index') }}" class="nav-link {{ Route::is('user.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>Employee</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('reference.index') }}" class="nav-link {{ Route::is('reference.index') || Route::is('reference.show') ? 'active' : '' }}">
            <i class="nav-icon fas fa-address-card"></i>
            <p>References</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('allslider') }}" class="nav-link {{ Route::is('allslider') ? 'active' : '' }}">
            <i class="nav-icon fas fa-sliders-h"></i>
            <p>Sliders</p>
        </a>
    </li>
    <li class="nav-item has-treeview {{ Route::is('alljoblist') || Route::is('job.applications') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ Route::is('alljoblist') || Route::is('job.applications') ? 'active' : '' }}">
            <i class="nav-icon fas fa-briefcase"></i>
            <p>
                Jobs
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('alljoblist') }}" class="nav-link {{ Route::is('alljoblist') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Jobs</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('job.applications') }}" class="nav-link {{ Route::is('job.applications') ? 'active' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Job Applications</p>
                </a>
            </li>
        </ul>
    </li>
    
    <li class="nav-item">
        <a href="{{ route('allservice') }}" class="nav-link {{ Route::is('allservice') ? 'active' : '' }}">
            <i class="nav-icon fas fa-tools"></i>
            {{-- <p>Services</p> --}}
            <p>Age Group Homepage</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('allfeature') }}" class="nav-link {{ Route::is('allfeature') ? 'active' : '' }}">
            <i class="nav-icon fas fa-gem"></i>
            <p>Food Menu</p>
            {{-- <p>Features</p> --}}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('client-reviews.index') }}" class="nav-link {{ Route::is('client-reviews.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-star"></i>
            <p>Client Reviews</p>
        </a>
    </li>
    <li class="nav-item dropdown {{ Route::is('content.category.index') || Route::is('content.index') || Route::is('tags.index') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link {{ Route::is('content.category.index') || Route::is('content.index') || Route::is('tags.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-images"></i>
            <p>
                Contents <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('content.index', 1) }}" class="nav-link {{ request()->routeIs('content.index') && request()->route('type') == 1 ? 'active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Galleries</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('content.index', 2) }}" class="nav-link {{ request()->routeIs('content.index') && request()->route('type') == 2 ? 'active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Room</p>
                    {{-- <p>Blogs</p> --}}
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('content.index', 3) }}" class="nav-link {{ request()->routeIs('content.index') && request()->route('type') == 3 ? 'active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>Age Group</p>
                </a>
            </li>
            <li class="nav-item d-none">
                <a href="{{ route('content.index', 4) }}" class="nav-link {{ request()->routeIs('content.index') && request()->route('type') == 4 ? 'active' : '' }}">
                    <i class="fas fa-list nav-icon"></i>
                    <p>News</p>
                </a>
            </li>
            <li class="nav-item d-none">
                <a href="{{ route('content.category.index') }}" class="nav-link {{ Route::is('content.category.index') ? 'active' : '' }}">
                    <i class="fas fa-plus nav-icon"></i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item d-none">
                <a href="{{ route('tags.index') }}" class="nav-link {{ Route::is('tags.index') ? 'active' : '' }}">
                    <i class="fas fa-tags nav-icon"></i>
                    <p>Tags</p>
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item dropdown {{ Route::is('admin.companyDetails') || Route::is('admin.company.seo-meta') || Route::is('admin.aboutUs') || Route::is('admin.foodChoice') || Route::is('admin.fees') || Route::is('admin.privacy-policy') || Route::is('documents.index') || Route::is('admin.terms-and-conditions') || Route::is('allFaq') || Route::is('allcontactemail') || Route::is('sections.index') || Route::is('admin.jobInfo') || Route::is('banner.index') ? 'menu-open' : '' }}">
        <a href="#" class="nav-link dropdown-toggle {{ Route::is('admin.companyDetails') || Route::is('admin.company.seo-meta') || Route::is('admin.aboutUs') || Route::is('admin.foodChoice') || Route::is('admin.fees') || Route::is('admin.privacy-policy') || Route::is('documents.index') || Route::is('admin.terms-and-conditions') || Route::is('allFaq') || Route::is('allcontactemail') || Route::is('sections.index') || Route::is('admin.jobInfo') || Route::is('banner.index') ? 'active' : '' }}">
            <i class="nav-icon fas fa-cog"></i>
            <p>
                Settings <i class="fas fa-angle-left right"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{ route('admin.companyDetails') }}" class="nav-link {{ Route::is('admin.companyDetails') ? 'active' : '' }}">
                    <i class="fas fa-building nav-icon"></i>
                    <p>Company Details</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.company.seo-meta') }}" class="nav-link {{ Route::is('admin.company.seo-meta') ? 'active' : '' }}">
                    <i class="fas fa-search nav-icon"></i>
                    <p>SEO</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.aboutUs') }}" class="nav-link {{ Route::is('admin.aboutUs') ? 'active' : '' }}">
                    <i class="fas fa-info-circle nav-icon"></i>
                    <p>About Us</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.foodChoice') }}" class="nav-link {{ Route::is('admin.foodChoice') ? 'active' : '' }}">
                    <i class="fas fa-info-circle nav-icon"></i>
                    <p>Food Choice</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.fees') }}" class="nav-link {{ Route::is('admin.fees') ? 'active' : '' }}">
                    <i class="fas fa-info-circle nav-icon"></i>
                    <p>Fees & Terms</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.jobInfo') }}" class="nav-link {{ Route::is('admin.jobInfo') ? 'active' : '' }}">
                    <i class="fas fa-info-circle nav-icon"></i>
                    <p>Job</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.privacy-policy') }}" class="nav-link {{ Route::is('admin.privacy-policy') ? 'active' : '' }}">
                    <i class="fas fa-user-shield nav-icon"></i>
                    <p>Privacy Policy</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.terms-and-conditions') }}" class="nav-link {{ Route::is('admin.terms-and-conditions') ? 'active' : '' }}">
                    <i class="fas fa-file-contract nav-icon"></i>
                    <p>Terms & Conditions</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('allFaq') }}" class="nav-link {{ Route::is('allFaq') ? 'active' : '' }}">
                    <i class="fas fa-question-circle nav-icon"></i>
                    <p>FAQ</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.mail-body') }}" class="nav-link {{ Route::is('admin.mail-body') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-file-alt"></i>
                    <p>Mail Body</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('allcontactemail') }}" class="nav-link {{ Route::is('allcontactemail') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-envelope"></i>
                    <p>Contact Email</p>
                </a>
            </li>
            <li class="nav-item d-none">
                <a href="{{ route('sections.index') }}" class="nav-link {{ Route::is('sections.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sliders-h"></i>
                    <p>Section Settings</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('banner.index') }}" class="nav-link {{ Route::is('banner.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sliders-h"></i>
                    <p>Banner</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('documents.index') }}" class="nav-link {{ Route::is('documents.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sliders-h"></i>
                    <p>Document</p>
                </a>
            </li>
        </ul>
    </li>

    <li class="nav-item" style="margin-top: 100px">
    </li>
  </ul>
</nav>