<?= $this->extend("super_admin/index") ?>

<?= $this->section("title") ?>
cv - Bank Sampah
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>

<!-- Message Alert -->
<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}
?>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $title; ?></h6>
    </div>
    <div class="card-body">
        <a href="<?= base_url('super_admin/cv/create') ?>" class="btn btn-primary mb-4">
            Create Data
        </a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>About</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($cvs as $d) : ?>
                        <tr>
                            <td><?= $i++; ?></td>
                            <td><?= $d['name']; ?></td>
                            <td><?= $d['title']; ?></td>
                            <td><?= $d['address']; ?></td>
                            <td><?= $d['phone']; ?></td>
                            <td><?= $d['email']; ?></td>
                            <td><?= $d['about']; ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#editModal-<?= $d['id'] ?>">
                                            Edit
                                        </button>
                                        <!-- Edit Data -->
                                        <div class="modal fade" id="editModal-<?= $d['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?= base_url('/super_admin/cv/update/') ?>" method="post">
                                                        <?= csrf_field(); ?>
                                                        <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                                        <div class="modal-body">
                                                          <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" name="name" class="form-control" id="name" value="<?= $d['name'] ?>" required>
                                                          </div>

                                                          <div class="form-group">
                                                            <label for="title">Title</label>
                                                            <input type="text" name="title" class="form-control" id="title" value="<?= $d['title'] ?>" required>
                                                          </div>

                                                          <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <input type="text" name="address" class="form-control" id="address" value="<?= $d['address'] ?>" required>
                                                          </div>

                                                          <div class="form-group">
                                                            <label for="phone">Phone</label>
                                                            <input type="text" name="phone" class="form-control" id="phone" value="<?= $d['phone'] ?>" required>
                                                          </div>

                                                          <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" name="email" class="form-control" id="email" value="<?= $d['email'] ?>" required>
                                                          </div>

                                                          <div class="form-group">
                                                            <label for="about">About</label>
                                                            <input type="text" name="about" class="form-control" id="about" value="<?= $d['about'] ?>" required>
                                                          </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Edit Data -->
                                    </div>
                                    <div class="col-12">
                                        <form action="<?= base_url('/super_admin/cv/delete/') ?>" method="post">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                            <button class="btn btn-danger" onclick="return confirm('Are you sure ?')">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-12">
                                      <form action="<?= base_url('/super_admin/cv/pdf/') ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?= $d['id'] ?>">
                                        <button class="btn btn-success" onclick="return confirm('Import CSV ?')">
                                          Import CSV
                                        </button>
                                      </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>