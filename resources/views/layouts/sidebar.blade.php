<button class="toggle-button" onclick="toggleSidebar()">
    <i class="fas fa-bars"></i>
</button>

<div class="sidebar" id="sidebar">
    <br><br><br>
        <a href="/home" >
            <img  class="logo" src="{{ asset('img/2.png') }}" />
            <span >LaporPak.com</span>
        </a>
    
    @if (auth()->user()->role == 'Admin')
        <a href="/kebakaran" class="{{ Request::is('kebakaran') ? 'active' : '' }}">
            <i class="fas fa-fire"></i>Laporan Kebakaran
        </a>
        <a href="/medis" class="{{ Request::is('medis') ? 'active' : '' }}">
            <i class="fas fa-medkit"></i>Laporan Medis
        </a>
        <a href="/pencurian" class="{{ Request::is('pencurian') ? 'active' : '' }}">
            <i class="fas fa-user-secret"></i>Laporan Pencurian
        </a>
    @endif

    @if (auth()->user()->role == 'User')
        <a href="/kebakaranU" class="{{ Request::is('kebakaranU') ? 'active' : '' }}">
            <i class="fas fa-fire"></i>Laporan Kebakaran
        </a>
        <a href="/medisU" class="{{ Request::is('medisU') ? 'active' : '' }}">
            <i class="fas fa-medkit"></i>Laporan Medis
        </a>
        <a href="/pencurianU" class="{{ Request::is('pencurianU') ? 'active' : '' }}">
            <i class="fas fa-user-secret"></i>Laporan Pencurian
        </a>
    @endif
    
    <a class="logout">
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" style="border: none; ">
                <i class="fas fa-sign-out-alt"></i> Keluar
            </button>
        </form>
    </a>
</div>

<script>
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("collapsed");
        document.getElementById("mainContent").classList.toggle("expanded");
    }
</script>

<style>
  /* Style untuk link yang aktif */
    .sidebar a.active {
        color: #ffcc00; /* Warna highlight */
        font-weight: bold;
    }
    .logo-section {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    margin-right: 20px;
    margin-top: 70px; /* Tambahkan ini untuk menurunkan logo */
    }

    .logo {
        width: 40px;
        height: 40px;
        margin-right: 10px;
    }

</style>
