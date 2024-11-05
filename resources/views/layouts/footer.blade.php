    <!-- Import jQuery and DataTables JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('#dataTable1').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json"
                },
                "responsive": true,
                "pageLength": 10
            });
        });
    </script>
    
    
    <script>
        function confirmUpdate(progress, id) {
            let message;
            if (progress === 'Belum Dimulai') {
                message = "Apakah laporan diterima dan Berjalan?";
            } else if (progress === 'Berjalan') {
                message = "Apakah laporan diterima dan Selesai?";
            } else if (progress === 'Selesai') {
                message = "Apakah laporan diterima dan Berjalan Lagi?";
            } else {
                return;
            }
            Swal.fire({
                title: "Konfirmasi Perubahan",
                text: message,
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#1d4ed8", // Warna tombol Konfirmasi
                confirmButtonText: "Konfirmasi",
                cancelButtonText: "Batal",
                customClass: {
                    cancelButton: 'swal-cancel-button'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Cari form berdasarkan ID
                    const form = document.querySelector(`form.updateForm[data-id="${id}"]`);
                    if (form) {
                        form.submit();
                    }
                }
            });
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Referensi semua div dan link
            const allDiv = document.getElementById("all");
            const selesaiDiv = document.getElementById("selesai");
            const jalanDiv = document.getElementById("jalan");
            const belumDiv = document.getElementById("belum");

            const allTab = document.getElementById("allTab");
            const selesaiTab = document.getElementById("selesaiTab");
            const jalanTab = document.getElementById("jalanTab");
            const belumTab = document.getElementById("belumTab");

            // Fungsi untuk menampilkan div dan mengatur kelas aktif
            function showDiv(selectedDiv, selectedTab) {
                // Sembunyikan semua div
                allDiv.style.display = "none";
                selesaiDiv.style.display = "none";
                jalanDiv.style.display = "none";
                belumDiv.style.display = "none";

                // Hilangkan kelas aktif dari semua tab
                allTab.classList.remove("text-blue-600", "border-b-2", "border-yellow-500", "font-medium");
                selesaiTab.classList.remove("text-blue-600", "border-b-2", "border-yellow-500", "font-medium");
                jalanTab.classList.remove("text-blue-600", "border-b-2", "border-yellow-500", "font-medium");
                belumTab.classList.remove("text-blue-600", "border-b-2", "border-yellow-500", "font-medium");

                // Tampilkan div yang dipilih dan tambahkan kelas aktif ke tab yang dipilih
                selectedDiv.style.display = "block";
                selectedTab.classList.add("text-blue-600", "border-b-2", "border-yellow-500", "font-medium");
            }

            // Event listener untuk setiap tab
            allTab.addEventListener("click", function() {
                showDiv(allDiv, allTab);
            });
            selesaiTab.addEventListener("click", function() {
                showDiv(selesaiDiv, selesaiTab);
            });
            jalanTab.addEventListener("click", function() {
                showDiv(jalanDiv, jalanTab);
            });
            belumTab.addEventListener("click", function() {
                showDiv(belumDiv, belumTab);
            });

            // Set default (misalnya, tampilkan semua)
            showDiv(allDiv, allTab);
        });
    </script>