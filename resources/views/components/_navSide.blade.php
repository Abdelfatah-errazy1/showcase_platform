<div id="kt_aside" class="aside aside-dark aside-hoverable"
     data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}"
     data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}"
     data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="/">
            <img alt="Logo" src="{{ asset('assets/imgs/ezd.png') }}" class="h-50px logo" />
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
             data-kt-toggle="true" data-kt-toggle-state="active"
             data-kt-toggle-target="body" data-kt-toggle-name="aside-minimize">
           <span class="menu-icon">
                <i class="bi bi-chevron-double-left fs-2"></i>
            </span>
        </div>
    </div>

    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper"
             data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
             data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
             data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-offset="0">
            
            <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                 id="#kt_aside_menu" data-kt-menu="true">
                
                <div class="menu-item">
                    <div class="menu-content pb-2">
                        <span class="menu-section text-muted text-uppercase fs-8 ls-1">Dashboard</span>
                    </div>
                </div>

                <div class="menu-item">
                    <a class="menu-link" href="/">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                <!-- Replace with appropriate SVG icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"><rect x="2" y="2" width="9" height="9" rx="2" fill="black"/><rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="black"/><rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="black"/><rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="black"/></svg>
                            </span>
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </div>

                <div class="menu-item menu-accordion {{ request()->routeIs('admin.projects.*') ?'here show':'' }}" data-kt-menu-trigger="click">
                    <span class="menu-link">
                         <span class="menu-icon">
                            <i class="bi bi-folder-check fs-2"></i>
                        </span>
                        <span class="menu-title">Projects</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.projects.index') ?'active':'' }}" href="{{ route('admin.projects.index') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">List Projects</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.projects.create') ?'active':'' }}" href="{{ route('admin.projects.create') }}">
                                <span class="menu-bullet"><span class="bullet bullet-dot"></span></span>
                                <span class="menu-title">Add Project</span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="menu-item menu-accordion {{ request()->routeIs('admin.*') ?'here show':'' }}" data-kt-menu-trigger="click">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <i class="bi bi-list-nested"></i>
                        </span>
                        <span class="menu-title">Pages</span>
                        <span class="menu-arrow"></span>
                    </span>
                    <div class="menu-sub menu-sub-accordion">
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.tags.*') ?'active':'' }}" href="{{ route('admin.tags.index') }}">
                                <span class="menu-icon">
                                    <i class="bi bi-tags"></i>
                                </span>
                                <span class="menu-title">Tags</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.categories.*') ?'active':'' }}" href="{{ route('admin.categories.index') }}">
                                 <span class="menu-icon">
                            <i class="bi bi-bookmarks"></i>
                        </span>
                                <span class="menu-title">Categories</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.technologies.*') ?'active':'' }}" href="{{ route('admin.technologies.index') }}">
                                 <span class="menu-icon">
                            <i class="bi bi-node-plus"></i>
                        </span>
                                <span class="menu-title">Technologies</span>
                            </a>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link {{ request()->routeIs('admin.subscribers.*') ?'active':'' }}" href="{{ route('admin.subscribers.index') }}">
                                 <span class="menu-icon">
                                    <i class="bi bi-envelope"></i>
                                </span>
                                <span class="menu-title">Subscribers</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="aside-footer flex-column-auto pt-5 pb-7 px-5" id="kt_aside_footer">
        <a href="#" class="btn btn-custom btn-primary w-100">
            <span class="btn-label">Documentation</span>
            <span class="menu-icon mx-2">
                <i class="bi bi-file-earmark-text fs-3"></i>
            </span>
        </a>
    </div>
</div>
