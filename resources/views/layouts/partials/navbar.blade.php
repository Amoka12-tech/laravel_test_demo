<header class="header" id="nax-header">
    <div class="header_toggle"> <i onclick="callMe()" class='bx bx-menu' id="nax-toggle"></i> </div>
    <div class="header_icon" data-bs-toggle="modal" data-bs-target="#reg-modal">  
        <span>+</span>  
    </div>
</header>
<div class="l-navbar" id="nax-bar">
    <nav class="nav">
        <div> 
            <a href="#" class="nav_logo" style="text-decoration: none"> 
                <i class='bx bx-layer nav_logo-icon'></i> 
                <span class="nav_logo-name">Naxum Admin</span> 
            </a>
            <div class="nav_list"> 
                <a href="#" class="nav_link active" style="text-decoration: none"> 
                    <i class='bx bx-grid-alt nav_icon'></i> 
                    <span class="nav_name">Dashboard</span> 
                </a> 
                {{-- <a href="#" class="nav_link"> 
                    <i class='bx bx-user nav_icon'></i> 
                    <span class="nav_name">Users</span> 
                </a>  --}}
            </div>
        </div> <a href="{{ route('logout') }}" class="nav_link" style="text-decoration: none"> 
            <i class='bx bx-log-out nav_icon'></i> 
            <span class="nav_name">SignOut</span> 
        </a>
    </nav>
</div>