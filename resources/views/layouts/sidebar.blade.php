 <!-- Sidebar -->
 <div class="adminx-sidebar expand-hover push">
     <ul class="sidebar-nav">
         <li class="sidebar-nav-item">
             <a href="/dashboard" class="sidebar-nav-link active">
                 <span class="sidebar-nav-icon">
                     <i data-feather="home"></i>
                 </span>
                 <span class="sidebar-nav-name">
                     Dashboard
                 </span>
                 <span class="sidebar-nav-end">

                 </span>
             </a>
         </li>
         @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Staff')
             <li class="sidebar-nav-item">
                 <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#example" aria-expanded="false"
                     aria-controls="example">
                     <span class="sidebar-nav-icon">
                         <i data-feather="pie-chart"></i>
                     </span>
                     <span class="sidebar-nav-name">
                         Data
                     </span>
                     <span class="sidebar-nav-end">
                         <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                     </span>
                 </a>

                 <ul class="sidebar-sub-nav collapse" id="example">
                     <li class="sidebar-nav-item">
                         <a href="{{ route('asisten') }}" class="sidebar-nav-link">
                             <span class="sidebar-nav-abbr">
                                 DA
                             </span>
                             <span class="sidebar-nav-name">
                                 Data Asisten
                             </span>
                         </a>
                     </li>

                     <li class="sidebar-nav-item">
                         <a href="{{ route('kelas') }}" class="sidebar-nav-link">
                             <span class="sidebar-nav-abbr">
                                 DK
                             </span>
                             <span class="sidebar-nav-name">
                                 Data Kelas
                             </span>
                         </a>
                     </li>

                     <li class="sidebar-nav-item">
                         <a href="{{ route('materi') }}" class="sidebar-nav-link">
                             <span class="sidebar-nav-abbr">
                                 DM
                             </span>
                             <span class="sidebar-nav-name">
                                 Data Materi
                             </span>
                         </a>
                     </li>
                 </ul>
             </li>
         @endif
         @if (Auth::user()->role != 'Asisten')
             <li class="sidebar-nav-item">
                 <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navTables" aria-expanded="false"
                     aria-controls="navTables">
                     <span class="sidebar-nav-icon">
                         <i data-feather="align-justify"></i>
                     </span>
                     <span class="sidebar-nav-name">
                         Generator
                     </span>
                     <span class="sidebar-nav-end">
                         <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                     </span>
                 </a>

                 <ul class="sidebar-sub-nav collapse" id="navTables">
                     <li class="sidebar-nav-item">
                         <a href="{{ 'code' }}" class="sidebar-nav-link">
                             <span class="sidebar-nav-abbr">
                                 Ge
                             </span>
                             <span class="sidebar-nav-name">
                                 Generate Code
                             </span>
                         </a>
                     </li>

                 </ul>
             </li>
         @endif
         <li class="sidebar-nav-item">
             <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#navForms" aria-expanded="false"
                 aria-controls="navForms">
                 <span class="sidebar-nav-icon">
                     <i data-feather="edit"></i>
                 </span>
                 <span class="sidebar-nav-name">
                     Report
                 </span>
                 <span class="sidebar-nav-end">
                     <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                 </span>
             </a>

             <ul class="sidebar-sub-nav collapse" id="navForms">
                 @if (Auth::user()->role == 'Admin' || Auth::user()->role == 'Staff')
                     <li class="sidebar-nav-item">
                         <a href="{{ route('report') }}" class="sidebar-nav-link">
                             <span class="sidebar-nav-abbr">
                                 Re
                             </span>
                             <span class="sidebar-nav-name">
                                 Report
                             </span>
                         </a>
                     </li>
                 @endif
                 <li class="sidebar-nav-item">
                     <a href="{{ route('riwayat') }}" class="sidebar-nav-link">
                         <span class="sidebar-nav-abbr">
                             RA
                         </span>
                         <span class="sidebar-nav-name">
                             Riwayat Absen
                         </span>
                     </a>
                 </li>
             </ul>
         </li>
         <li class="sidebar-nav-item">
             <a class="sidebar-nav-link collapsed" data-toggle="collapse" href="#logout" aria-expanded="false"
                 aria-controls="example">
                 <span class="sidebar-nav-icon">
                     <i data-feather="pie-chart"></i>
                 </span>
                 <span class="sidebar-nav-name">
                     Logout
                 </span>
                 <span class="sidebar-nav-end">
                     <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                 </span>
             </a>

             <ul class="sidebar-sub-nav collapse" id="logout">
                 <!-- Logout Form -->
                 <li class="sidebar-nav-item">
                     <form id="logout-form" action="{{ route('logout') }}" method="POST">
                         @csrf
                         <button class="sidebar-nav-link" type="submit">
                             <span class="sidebar-nav-abbr">
                                 SO
                             </span>
                             <span class="sidebar-nav-name">
                                 Sign out
                             </span>
                             <span class="sidebar-nav-end">
                                 <i data-feather="chevron-right" class="nav-collapse-icon"></i>
                             </span>
                         </button>
                     </form>
                 </li>
             </ul>
         </li>
     </ul>
 </div><!-- Sidebar End -->
