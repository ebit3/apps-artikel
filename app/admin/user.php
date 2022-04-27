<?php

require_once "function/fungsi.php";

$row = show_user("SELECT * FROM tb_user");

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
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                <a href="user-add.php" class="btn btn-primary">
                                    <i class="fas fa-plus mr-2"></i>
                                    Tambah Data Pengguna
                                </a>
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($row as $no => $roe) : ?>

                                        <tr>
                                            <td><?= $no + 1 ?></td>
                                            <td><?= $roe['nama'] ?></td>
                                            <td><?= $roe['username'] ?></td>
                                            <td><?= $roe['role'] ?></td>
                                            <td>
                                                <a href="user-detail.php?id=<?= $roe['id_user'] ?>" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="user-drop.php?id=<?= $roe['id_user'] ?>" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'layout/footer.php'; ?>