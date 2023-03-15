<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - App Bioskop Raf</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('css/bootstrap.min.css') ?>" />

    <style>
        .register-box {
            /* background-color: blue; */
            position: absolute;
            top: 50%;
            left: 50%;
            width: 400px;
            padding: 40px;
            transform: translate(-50%, -50%);
            background: black;
            box-sizing: border-box;
            box-shadow: 0 15px 25px rgba(0, 0, 0, .6);
            border-radius: 10px;
        }

        .register-box h2 {
            margin: 0 0 30px;
            padding: 0;
            color: #fff;
            text-align: center;
        }

        .register-box .user-box {
            position: relative;
        }

        .register-box .user-box input {
            width: 100%;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            margin-bottom: 30px;
            border: none;
            border-bottom: 1px solid #fff;
            outline: none;
            background: transparent;
        }

        .register-box .user-box label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 10px 0;
            font-size: 16px;
            color: #fff;
            pointer-events: none;
            transition: .5s;
        }

        .register-box .user-box input:focus~label,
        .register-box .user-box input:valid~label {
            top: -20px;
            left: 0;
            color: #03e9f4;
            font-size: 12px;
        }

        .register-box form button {
            position: relative;
            display: inline-block;
            padding: 10px 20px;
            color: #03e9f4;
            font-size: 16px;
            text-decoration: none;
            text-transform: uppercase;
            overflow: hidden;
            transition: .5s;
            /* margin-top: 5px; */
            letter-spacing: 4px;
        }

        .register-box form button {
            /* margin-left: 15px; */
            padding-left: 36px;
            padding-right: 36px;
        }

        .register-box button:hover {
            background: rgba(45, 223, 11, 100);
            color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(45, 223, 11, 100);
        }
    </style>
</head>

<body>

    <div class="register-box">
        <h2>Login</h2>
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h4>Terjadi Kesalahan</h4>
                </hr />
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <form method="post" action="/login/process">
            <div class="user-box">
                <input type="text" class="" id="username" name="username">
                <label for="username">Username</label>
            </div>
            <div class="user-box">
                <input type="password" class="" id="password" name="password">
                <label for="password">Password</label>
            </div>
            <div class="mb-3">
                <p class="text-light">belum punya akun ?
                    <a href="<?= site_url('/register/index') ?>" class="text-decoration-none">
                        Silahkan Registrasi
                    </a>
                </p>
                <br>
                <!-- <a href="main" class="btn">login</a> -->
                <button type="submit" class="btn d-flex justify-content-center">Login</button>
            </div>
        </form>
    </div>




</body>

</html>