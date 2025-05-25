<?php include_once('component/header.php') ?>

<div class="container">

    <div class="form-control">

        <div class="form-head">
            <h1>เข้าสู่ระบบ</h1>
            <p>นึกถึงเราเมื่อคุณอยากลา</p>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error']; unset($_SESSION['error']) ?>
            </div>
        <?php endif;?>

        <form action="backend/control/loginUser.php" method="POST">

        <p>Employee ID</p>
        <div class="form-input">
            <i class="fi fi-rr-fingerprint icon-left">
            </i><input type="text" name="employeeid" id="employeeid" placeholder="ID พนักงาน">
        </div>


        <p>Username</p>
        <div class="form-input">
            <i class="fi fi-rr-user icon-left">
            </i><input type="text" name="fullname" id="fullname" placeholder="ชื่อ">
        </div>


        <p>Password</p>
        <div class="form-input">
            <i class="fi fi-rr-lock icon-left">
            </i><input type="password" name="password" id="password" placeholder="รหัสผ่าน">
            <i class="fi fi-rr-eye-crossed icon-right" id="openEye"></i>
        </div>

        <button type="submit" name="signin">เข้าสู่ระบบ<i class="fi fi-rr-arrow-right-to-bracket"></i></button>

        </form>

        <div class="form-bottom">
            <p>ยังไม่มีบัญชีก็ <a href="register.php">สมัครสมาชิก</a> ได้เลย</p>
            <a href="forgot-password">ลืมรหัสผ่าน</a>
        </div>

    </div>

</div>

<?php include_once('component/footer.php') ?>