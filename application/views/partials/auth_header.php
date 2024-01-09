<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="<?= base_url('assets/'); ?>img/logo.png">
    <title>
        <?php echo $title; ?>
    </title>

    <link href="<?= base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1a07ed5a89.js" crossorigin="anonymous"></script>
</head>

<body>
    <style>
        @media (min-width: 425px) {
            .custom-input {
                display: none;
            }
        }

        @media (max-width: 425.5px) {
            .custom-ig {
                display: none;
            }

        }
        
        .button {
            height: 37.3px;
            color: #FFFFFF;
            font-weight: 700;
            padding: 10px 50px;
            border-radius: 6px;
            background: #f875aa;
            transition: all 0.2 ease;
            font-family: "Montserrat" !important;
            border: none;
            text-decoration: none;
            cursor: pointer;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: box-shadow, transform;
            transition-property: box-shadow, transform;
        }

        .btn:hover,
        .btn:focus,
        .button:active {
            box-shadow: 0 0 5px rgba(247, 88, 170, 0.6);
            color: #F758AA !important;
            -webkit-transform: scale(0.96);
            transform: scale(0.96);
        }

        .font_hedvig {
            font-family: 'Hedvig Letter Serif';
            color: #F758AA;
        }

        .link {
            color: #f875aa;
            cursor: pointer;
        }

        .link:hover {
            color: black;
            transition-duration: 0.3s;
        }

        .gradient-custom {
            /* fallback for old browsers */
            background-image: url('<?= base_url("assets_2/img/login_gradient_background.jpg"); ?>');
        }

        .form-select:focus, .form-control:focus, .form-select:active, .form-control:active {
            box-shadow: 0 0 8px 0 rgba(247, 88, 170, 0.6) !important;
            border-color: rgba(247, 88, 170, 0.2);
        }
    </style>

    <section class="gradient-custom d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="container my-5 position-relative">
            <div class="row d-flex justify-content-center align-items-center">