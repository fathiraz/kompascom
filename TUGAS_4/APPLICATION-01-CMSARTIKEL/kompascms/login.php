<?php
session_start();
if (isset($_SESSION['sesi'])) {
    echo "<meta http-equiv='refresh' content='0; url=admin/index.php'>";
}
?>

<div class="col-sm-3">
</div>
<div class="col-sm-6">
    <h2><strong>Login</strong></h2><br>

    <form action="admin/cek_admin.php" class="form-horizontal" role="form" method="POST">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username</label>

            <div class="col-sm-10">
                <input type="text" name="username" class="form-control" placeholder="Masukkan kompascom" required>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password</label>

            <div class="col-sm-10">
                <input type="password" name="password" class="form-control" placeholder="Masukkan kompascom" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="submit" value="Login" class="btn btn-default"></button>
            </div>
        </div>
    </form>
</div>
<div class="col-sm-3">
</div>