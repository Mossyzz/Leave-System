<?php include_once('component/header.php'); ?>

<header>
    <nav>
        <div class="nav-container">
            <div class="nav-logo">
                <a href="#"><img src="img/logo.png" alt="logo"></a>
            </div>
            <div class="nav-menu-btn" id="menu-btn">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <ul class="nav-links" id="nav-links">
            <li><a href="#see">Home</a></li>
            <li><a href="#send">Send leave</a></li>
            <li><a href="#check">Who leave</a></li>
            <li><a href="index.php">Log out</a></li>
        </ul>
    </nav>
</header>

<section class="show-leave" id="see">
    <div class="show-leave-container">
        <div class="show-leave-text" data-aos="fade-up" data-aos-duration="500">
            <h2 style="margin-bottom: 15px; font-weight: 500;">ยินดีต้อนรับ <?= $_SESSION['user']['fullname'] ?? 'Guest'; ?></h2>
            <div class="show-leave-head-text">
                <h1>ประวัติการลาของคุณ</h1>
            </div>
            <div class="show-leave-small-text">
                <h3>ขออย่าป่วย อวยพร ให้เป็นสุข</h3>
                <h3>อย่ามีทุกข์ อยู่สุขใจ เป็นหนักหนา</h3>
                <h3>แต่ถ้าจำ ต้องป่วย ในเวลา</h3>
                <h3>ขอให้มา กรอกใน ระบบเอย</h3>
            </div>
        </div>

        <div class="table-container" data-aos="fade-left" data-aos-duration="1000">

            <?php

            include_once('backend/config/database.php');
            include_once('backend/dbcontrol/dbshow.php');

            $connectDB = new Database();
            $db = $connectDB->getConnection();

            $allLeave = new Dbshow($db);

            $employeeid = $_SESSION['user']['employeeid'];

            $leave = $allLeave->getYourLeave($employeeid);
            $teamLeave = $allLeave->getStaffMemberLeave($employeeid);

            ?>

            <?php if (!empty($leave)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ชื่อ</th>
                            <th>สาเหตุการลา</th>
                            <th>ลาตั้งแต่</th>
                            <th>ลาถึงวันที่</th>
                            <th>เลขที่ใบลา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($leave as $row): ?>
                            <tr>
                                <td><?= $_SESSION['user']['fullname'] ?? 'Guest'; ?></td>
                                <td><?= $row['leave_desc'] ?></td>
                                <td><?= $row['leave_from_date'] ?></td>
                                <td><?= $row['leave_to_date'] ?></td>
                                <td><?= $row['leaveid'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <h1>ดีมาก! คุณยังไม่เคยลางาน</h1>
            <?php endif; ?>
        </div>
    </div>
</section>

<section class="send-leave" id="send">
    <div class="form-control" data-aos="fade-down" data-aos-duration="1000">

        <div class="form-head">
            <h1>เข้าสู่ระบบ</h1>
            <p>นึกถึงเราเมื่อคุณอยากลา</p>
        </div>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error'];
                unset($_SESSION['error']) ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'];
                unset($_SESSION['success']) ?>
            </div>
        <?php endif; ?>

        <form action="backend/control/sendLeaveUser.php" method="POST">
            <p>Leave ID</p>
            <div class="form-input">
                <i class="fi fi-rr-id-badge icon-left"></i>
                <input type="text" name="leaveid" id="leaveid" placeholder="เลขที่ใบลา">
            </div>
            <p>เริ่มลาตั้งแต่วันที่</p>
            <div class="form-input">
                <i class="fi fi-rr-monday icon-left"></i>
                <input type="date" name="leave_from_date" id="leave_from_date">
            </div>
            <p>จนถึงวันที่</p>
            <div class="form-input">
                <i class="fi fi-rr-friday icon-left"></i>
                <input type="date" name="leave_to_date" id="leave_to_date">
            </div>
            <input type="hidden" name="employeeid" id="employeeid" value="<?= $_SESSION['user']['employeeid'] ?>">
            <p>Detail</p>
            <div class="form-input">
                <i class="fi fi-rr-attention-detail icon-left"></i>
                <input type="text" name="leave_desc" id="leave_desc" placeholder="รายละเอียดการลา">
            </div>
            <button type="submit" name="sendLeave">ส่งข้อมูลการลา<i class="fi fi-rr-paper-plane"></i></button>
        </form>

    </div>
</section>

<section class="who-leave" id="check">
    <div class="show-leave-container">
        <div class="table-container" data-aos="flip-right" data-aos-duration="1500">

            <?php if (!empty($teamLeave)): ?>
                <table style="color:rgb(146, 143, 138);">
                    <thead>
                        <tr>
                            <th>ชื่อ</th>
                            <th>สาเหตุการลา</th>
                            <th>ลาตั้งแต่</th>
                            <th>ลาถึงวันที่</th>
                            <th>เลขที่ใบลา</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($teamLeave as $row): ?>
                            <tr>
                                <td><?= $row['fullname'] ?></td>
                                <td><?= $row['leave_desc'] ?></td>
                                <td><?= $row['leave_from_date'] ?></td>
                                <td><?= $row['leave_to_date'] ?></td>
                                <td><?= $row['leaveid'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <h1 style="color:rgb(146, 143, 138);">ยังไม่มีลูกทีมที่ลา</h1>
            <?php endif; ?>
        </div>

        <div class="show-leave-text" style="color:rgb(146, 143, 138);" data-aos="zoom-in" data-aos-duration="500">
            <div class="show-leave-head-text">
                <h1>การลาของลูกทีม</h1>
            </div>
            <div class="show-leave-small-text">
                <h3>เป็นส่วนนึงของการปรับเงินเดือน</h3>
            </div>
        </div>
    </div>
</section>

<?php include_once('component/footer.php') ?>