<?php

require_once 'function/fungsi.php';

$id = $_GET['id'];

$rows = show_id_kategori("SELECT * FROM tb_kategori WHERE id_kategori = '" . $id . "' ");

if (isset($_POST['submit'])) {

    if (edit_kategori($_POST) > 0) {

        return true;
    } else {

        return false;
    }
}

?>

<?php include 'layout/header.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Kategori</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                        <div class="card-header">

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="quickForm" method="post">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Email address</label>
                                    <input type="hidden" name="id" id="id" value="<?= $rows['id_kategori'] ?>">
                                    <input type="text" name="kategori" class="form-control" id="" placeholder="Enter kategori" value="<?= $rows['kategori'] ?>" required>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                <a href="kategori.php" class="btn btn-danger">Kembali</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'layout/footer.php'; ?>