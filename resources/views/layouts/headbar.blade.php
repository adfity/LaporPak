@if (session('success'))
    <div id="alert" class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <script>
        // Menghapus alert setelah 10 detik
        setTimeout(function() {
            var alert = document.getElementById('alert');
            if (alert) {
                alert.classList.remove('show');
                alert.classList.add('fade');
                alert.style.display = 'none'; // Menyembunyikan alert
            }
        }, 10000); // 10000 ms = 10 detik
    </script>
@endif


<div class="profile">
    <img src="{{ asset('img/5.png') }}" alt="Profile Image">
    <span>{{ $nama }}</span>
</div>
