<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        display: flex;
        height: 100vh;
        overflow: hidden;
    }
    .sidebar {
        width: 300px;
        background-color: #002e6e;
        display: flex;
        flex-direction: column;
        padding-top: 20px;
        color: white;
        position: fixed;
        left: 0;
        top: 0;
        height: 100%; 
        transition: transform 0.3s ease;
    }
    .sidebar.collapsed {
        transform: translateX(-300px);
    }
    .sidebar h2 {
        text-align: center;
        color: white;
        font-weight: bold;
        margin-top: 50px;
        margin-bottom: 20px;
    }
    .sidebar a {
        padding: 15px 20px;
        font-size: 16px;
        color: white;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 10px;
        border-radius: 5px;
        margin: 5px 15px;
        transition: background-color 0.3s;
    }
    .sidebar a:hover, .sidebar a.active {
        background-color: #003b8e;
    }
    .sidebar .logout {
        margin-top: auto;
        padding-bottom: 40px;
    }
    .main-content {
        padding: 20px;
        flex-grow: 1;
        background-color: #fff;
        margin-left: 300px;
        height: calc(100vh - 40px); 
        overflow-y: auto; 
        transition: margin-left 0.3s ease;
    }
    .main-content.expanded {
        margin-left: 0;
    }
    .toggle-button {
        position: absolute;
        top: 20px;
        left: 20px;
        background-color: #002e6e;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        font-size: 25px;
        border-radius: 5px;
        z-index: 10;
    }
    .profile {
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding: 20px;
        font-size: 30px;
    }
    .profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }
    .container {
        max-width: 1100px;
        padding: 50px;
        padding-top:5px;
    }
    .report {
        display: none;
    }
    .form-group {
        position: relative;
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        font-weight: 300;
        margin-bottom: 5px;
        color: #333;
    }
    .form-group input, .form-group textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #e0e0e0;
        border-radius: 5px;
        font-size: 16px;
        background-color: #f4f4f9;
        color: #999;
        outline: none;
    }
    .form-group input[disabled], .form-group textarea[disabled] {
        color: #999;
    }
    .form-group input:focus, .form-group textarea:focus {
        border-color: #007bff;
        background-color: #fff;
        color: #333;
    }
    .form-group input::placeholder, .form-group textarea::placeholder {
        color: #999;
    }
    .btn-submit {
        display: block; 
        width: 20%;
        margin: 0 auto;
        padding: 15px;
        font-size: 16px;
        font-weight: 600;
        background-color: #002e6e;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
        text-align: center;
    }
    .btn-submit:hover {
        background-color: #003b8e;
    }
 /* Style untuk tombol konfirmasi dan batal */
    .swal2-popup .btn-primary {
        background-color: #1f3b75;
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: bold;
    }
    .swal2-popup .btn-secondary {
        background-color: #ffffff;
        color: #333333;
        padding: 10px 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-weight: bold;
    }

    /* Tambahkan jarak antar tombol di dalam SweetAlert */
    .swal2-popup .swal2-actions {
        display: flex;
        justify-content: center;
        gap: 20px; /* Jarak antara tombol Batal dan Konfirmasi */
        padding: 0 !important;
    }
    .swal-cancel-button {
        color: #1d4ed8 !important;  /* Warna teks biru pada tombol Batal */
        background-color: #f3f4f6 !important; /* Background putih */
        border: 1px solid #1d4ed8; /* Border biru */
        padding: 10px 24px !important; /* Padding yang sama dengan tombol Konfirmasi */
        font-size: 16px !important; /* Ukuran font yang sama dengan tombol Konfirmasi */
        margin-right: 10px; /* Jeda antara tombol Batal dan Konfirmasi */
    }

    /* #alert {
        margin-top: 100px ;
    font-size: 1rem; 
    padding: 1px;
    margin: 10px 0; 
    min-height: 10px; 
    border-radius: 5px; 
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); 
    background-color:green;
} */

</style>