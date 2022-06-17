<?= $this->extend("super_admin/index") ?>

<?= $this->section("title") ?>
CV - Bank Sampah
<?= $this->endSection(); ?>

<?= $this->section("content") ?>
<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Create Data</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Create Data</h6>
    </div>
    <div class="card-body">
        <form action="<?= base_url('super_admin/cv/store') ?>" method="post">
            <?= csrf_field(); ?>
            <div class="modal-body">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" required>
              </div>

              <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" class="form-control" id="title" required>
              </div>

              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" name="address" class="form-control" id="address" required>
              </div>

              <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" id="phone" required>
              </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
              </div>

              <div class="form-group">
                <label for="about">About</label>
                <input type="text" name="about" class="form-control" id="about" required>
              </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection(); ?>