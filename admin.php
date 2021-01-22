<?php
@session_start(); // memulai session jika belum dimulai.


if(isset($_SESSION['logged'])){
    if(isset($_GET['page'])){
        if($_GET['page'] == 'logout'){
            unset($_SESSION['logged']);
            session_destroy();
            header('location: ?page=login');
        }
    }
    ?>
        <html>
            <head>
                <title>Hide button from session user.</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            </head>
            <body>
                <form id="md5" class="col-lg-6 offset-lg-3 ">
                    <div class="row justify-content-center">
                        <h4>Selamat datang, anda login sebagai <?php echo $_SESSION['logged']; ?>.</h4>
                        <span class="input-group-btn">
                            <?php
                                if($_SESSION['logged'] == 'admin'){
                                    echo '
                                    <button class="btn btn-primary">Contoh button 1</button>
                                    <button class="btn btn-primary">Contoh button 2</button>
                                    <button class="btn btn-primary">Contoh button 3</button>
                                    <a class="btn btn-primary" href="?page=logout">Logout Button</a>';
                                }elseif($_SESSION['logged'] == 'user'){
                                    echo '
                                    <button class="btn btn-primary">Contoh button 1</button>
                                    <a class="btn btn-primary" href="?page=logout">Logout Button</a>';
                                }else{
                                    exit;
                                }
                            ?>
                        </span>
                    </div>
                </form>
                    <div id="results" class="row justify-content-center"></div>
            </body>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
            <script>
                $(document).ready(function() {
                    $("#md5").submit(function(e) {
                    e.preventDefault();
                         var text = $('#text').val();
                         $.ajax({
                            type: "POST",
                            url: 'hidebutton.php', // samakan dengan nama file.
                            data: {hash: text},
                            success: function(data){
                                $('#results').html(data);
                            }
                        });
                    });
                });
            </script>
        </html>
    <?php
}else{
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        if($username == ''){
            echo 'harap isi username';
        }elseif($password == ''){
            echo 'harap isi username';
        }else{
            if($username == 'admin' && $password == 'admin'){
                $_SESSION['logged'] = $username;
                echo '<meta http-equiv="refresh" content="1;url=admin.php" />';
            }elseif($username == 'user' && $password == 'user'){
                $_SESSION['logged'] = $username;
                echo '<meta http-equiv="refresh" content="1;url=admin.php" />';
            }else{
                echo 'username atau password tidak ditemukan.';
            }
        }
    }else{
        if(isset($_GET['page'])){
            if($_GET['page'] == 'login'){
        ?>
        <html>
            <head>
                <title>login</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            </head>
            <body>
                <form id="login" class="col-lg-6 offset-lg-3 ">
                    <div class="row justify-content-center">
                        <h4 class="row justify-content-center">Login.</h4>
                        <span class="input-group-btn">
                            <input type="text" placeholder="username" id="username" value="admin">
                            <input type="password" placeholder="password" id="password" value="admin">
                            <button class="btn btn-primary" type="submit">Login</button>
        <pre>
        admin : admin
        user : user
        </pre>
                        </span>
                    </div>
                </form>
                    <div id="results" class="row justify-content-center"></div>
            </body>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
            <script>
                $(document).ready(function() {
                    $("#login").submit(function(e) {
                    e.preventDefault();
                         var username = $('#username').val();
                         var password = $('#password').val();
                         var login = 'login';
                         $.ajax({
                            type: "POST",
                            url: 'admin.php', // samakan dengan nama file.
                            data: {login: login, username: username, password: password},
                            success: function(data){
                                $('#results').html(data);
                            }
                        });
                    });
                });
            </script>
        </html>
        <?php
            }elseif($_GET['page'] == 'logout'){
                unset($_SESSION['logged']);
                session_destroy();
                header('location: ?page=login');
            }elseif($_GET['page'] == 'home'){
                if(empty($_SESSION['logged'])){
                    header('location: ?page=login'); // redirect ke halaman login.
                }else{
                    ?>
        <html>
            <head>
                <title>Hide button from session user.</title>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
            </head>
            <body>
                <form id="md5" class="col-lg-6 offset-lg-3 ">
                    <div class="row justify-content-center">
                        <h4>Hide button from session user.</h4>
                        <span class="input-group-btn">
                        <button class="btn btn-primary">Contoh button 1</button>
                        <button class="btn btn-primary">Contoh button 2</button>
                        <button class="btn btn-primary">Contoh button 3</button>
                        </span>
                    </div>
                </form>
                    <div id="results" class="row justify-content-center"></div>
            </body>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
            <script>
                $(document).ready(function() {
                    $("#md5").submit(function(e) {
                    e.preventDefault();
                         var text = $('#text').val();
                         $.ajax({
                            type: "POST",
                            url: 'hidebutton.php', // samakan dengan nama file.
                            data: {hash: text},
                            success: function(data){
                                $('#results').html(data);
                            }
                        });
                    });
                });
            </script>
        </html>
                    <?php
                }
            }else{
        
            }
        }else{
            if(isset($_SESSION['logged'])){
                header('location: ?page=home');
            }else{
                header('location: ?page=login');
            }
        }
    }
}

?>
