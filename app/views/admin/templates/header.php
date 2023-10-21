<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['judul']; ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,400;0,500;0,700;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASEURL ?>css/auth/login.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/auth/register.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/admin/dashboard/style.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/admin/katalog/katalog.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/admin/katalog/tambah.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/admin/user/style.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/admin/user/tambah.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/admin/templates/sidebar.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/admin/templates/navbar.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/admin/templates/breadcrumb.css">
    <link rel="stylesheet" href="<?= BASEURL ?>css/style.css">
    <!-- <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script> -->

    <style>
        #container {
            width: 1000px;
            margin: 20px auto;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 200px;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }

        /* CSS untuk dropdown */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }

        /* CSS untuk input teks dengan efek neon */
        input[type="text"].neonIn {
            border: none;
            border-radius: 5px;
            padding: 10px;
            /* box-shadow: 0 0 10px rgba(0, 0, 255, 0.5); */
            outline: none;
        }

        /* Animasi neonIn saat di-fokus */
        input[type="text"].neonIn:focus {
            animation: neonIn 1.5s infinite alternate;
        }

        @keyframes neonIn {
            0% {
                box-shadow: 0 0 10px rgb(6 228 245 / 71%);
            }

            100% {
                box-shadow: 0 0 20px rgb(6 228 245 / 0.9), 0 0 30px rgba(0, 0, 255, 0.6), 0 0 40px rgba(0, 0, 255, 0.4), 0 0 50px rgba(0, 0, 255, 0.2);
            }
        }


        /* CSS untuk select */
        /* CSS untuk select */
        .neon {
            padding: 10px;
            border-radius: 5px;
            color: white;
            width: 10%;
            border: 1px solid white;
            /* box-shadow: 0px 8px 16px 0px rgba(44, 185, 211, 0.5); */
            background-color: transparent;
            outline: none;
            position: relative;
        }


        select.neon:hover {
            animation: neon 1.5s infinite alternate;
        }

        select.neon:focus {
            animation: neon 1.5s infinite alternate;
        }

        @keyframes neon {
            0% {
                box-shadow: 0px 8px 16px 0px rgba(44, 185, 211, 0.5);
                /* Perbaikan nilai rgba */
            }

            100% {
                box-shadow:
                    0px 8px 16px 0px rgba(44, 185, 211, 0.5),
                    0 0 30px rgba(44, 185, 211, 0.5),
                    0 0 40px rgba(44, 185, 211, 0.5),
                    0 0 50px rgba(44, 185, 211, 0.5);
                /* Perbaikan nilai rgba */
            }
        }

        /* CSS untuk tombol sort */
        .dropbtn {
            background-color: #3498db;
            color: white;
            padding: 10px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropbtn:hover {
            background-color: #2980b9;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #2f8935a1;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgb(44 185 211 / 50%);
            z-index: 1;
        }

        .dropdown-content a {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #3498db;
        }

        .icon-dropdown {
            background-image: url(http://localhost/digitalCard/public/assets/img/icon/icons8-expand-arrow-16.png);
            width: 16px;
            height: 16px;
            display: inline-block;
            margin-top: 12px;
            left: 0px;
            color: white;
            margin-left: 26.5%;
            position: absolute;
            transition: transform 0.6s ease;
            /* Menambahkan transisi untuk transformasi */
        }

        .icon-dropdown.active {
            transform: translateY(-50%) rotate(180deg);
        }

        /* Gaya untuk tombol seram */
        .btn-dark {
            background-color: #2c3e50;
            /* Warna latar belakang gelap */
            border: none;
            color: #ecf0f1;
            /* Warna teks terang */
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            /* Untuk memberi jarak antar tombol */
            transition: box-shadow 0.3s;
        }

        /* Hover effect untuk tombol seram */
        .btn-dark:hover {
            box-shadow: 0 0 20px rgba(231, 76, 60, 0.5);
            /* Efek bayangan merah */
        }

        
    </style>


</head>

<body>