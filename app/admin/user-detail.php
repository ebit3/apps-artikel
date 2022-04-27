<?php

require_once "function/fungsi.php";

$id = $_GET['id'];

$rows = show_id_kategori("SELECT * FROM tb_user WHERE id_user = '" . $id . "' ");

?>

<?php include 'layout/header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data User</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row d-flex">
                <div class="col-md-10 m-auto">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-thumbnail img-circle" src="images/<?= $rows['foto'] ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $rows['nama'] ?></h3>

                            <p class="text-muted text-center">Jurusan User</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Kelas</b>
                                    <h6 class="float-right">1,322</h6>
                                </li>
                                <li class="list-group-item">
                                    <b>Username</b>
                                    <h6 class="float-right"><?= $rows['username'] ?></h6>
                                </li>
                                <li class="list-group-item">
                                    <b>Status</b>
                                    <h6 class="float-right"><?= $rows['role'] ?></h6>
                                </li>
                            </ul>

                            <!-- <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a> -->
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'layout/footer.php'; ?>