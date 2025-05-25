<?php include_once('component/header.php') ?>

<div class="container">

    <div class="form-control">

        <div class="form-head">
            <h1>สมัครสมาชิก</h1>
            <p>อยากลาแล้วใช่ไหมล่ะ</p>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error']; unset($_SESSION['error']) ?>
            </div>
        <?php endif;?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success']; unset($_SESSION['success']) ?>
            </div>
        <?php endif;?>

        <form action="backend/control/addNewUser.php" method="POST">

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

            <p>Choose a Team leader</p>
            <div class="form-input">
                <i class="fi fi-rr-boss icon-left"></i>
                <select name="managerid" id="managerid">
                    <option value="">หัวหน้าทีมของคุณ</option>
                    <option value="40480001">Pariwat</option>
                    <option value="430480002">Veena</option>
                </select>
            </div>


            <p>Password</p>
            <div class="form-input">
                <i class="fi fi-rr-lock icon-left">
                </i><input type="password" name="password" id="password" placeholder="รหัสผ่าน">
                <i class="fi fi-rr-eye-crossed icon-right" id="openEye"></i>
            </div>

            <p>Confirm Password</p>
            <div class="form-input">
                <i class="fi fi-rr-lock icon-left">
                </i><input type="password" name="confirm-password" id="confirm-password" placeholder="ยืนยันรหัสผ่าน">
            </div>

            <button type="submit" name="signup">สมัครสมาชิก<i class="fi fi-rr-user-add"></i></button>

        </form>

        <div class="form-bottom">
            <p>เอ้า ลืมว่ามีแล้วไป <a href="index.php">เข้าสู่ระบบ</a> ดีกว่า</p>
        </div>

    </div>

</div>

<?php include_once('component/footer.php') ?>