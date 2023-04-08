<?php 
    require 'views/layout/header.php';
    require 'models/UserModel.php';
    $model = new UserModel();
    session_start(); 
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $_SESSION['data_users'] = $model->authUsers($_POST["email"], $_POST["password"]); 
    }
    $user = $_SESSION['data_users'];
?>
<body class="bodybg">
    <div style="height:100%;background-color: rgba(0, 0, 0, 0.6); font-family: 'Roboto', sans-serif;">
        <?php require 'views/layout/navbar.php' ?>
        <?php if(isset($_GET['profile'])){ 
          $id = $user['id_users'] ;
          $row = $model->findAccount($id);
          ?>
            <div class="d-flex justify-content-center align-items-center " style="height: 500px;">
            <div class="card my-4" style="width: 75rem;">
                <div class="card-body">
                    <h3>Profile User</h3>
                    <hr>
                  <div class="row" style="margin-top:5%;">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?= $row['nama_user'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">No. Telepon</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $row['no_telp'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?= $row['email'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-primary" href="landing.php?edit=true">Edit</a>
                    </div>
                  </div>
                </div>
            </div>
        <?php }else if(isset($_GET['edit'])){ 
          $id = $user['id_users'];
          $row = $model->findAccount($id, $_SESSION['data_users']);
          ?>
            <div class="d-flex p-2 justify-content-center">
            <div class="card my-4" style="width: 75rem;">
            <div class="card-header">
                    <h4>Edit User</h4>
                </div>
                <div class="card-body">
                    <form action="../controllers/DataUser.php?act=edit&type=<?= $_SESSION['data_users'] ?>" method="POST">
                        <!-- nama admin -->
                        <div class="form-group my-3">
                            <label for="nama">Nama </label>
                            <input type="text" class="form-control" name="nama" id="nama" value="<?php echo $row['nama'] ?? $row['nama_user']; ?>" required>
                            <input type="hidden" value="<?= $id = $user['id_users']?>" name="id_user">
                        </div>
                        <!-- no telepon -->
                        <div class="form-group my-3">
                            <label for="no_telp">No. Telepon</label>
                            <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?php echo $row['no_telp']; ?>" required>
                        </div>
                        <!-- email -->
                        <div class="form-group my-3">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?php echo $row['email']; ?>" required>
                        </div>
                        <div class="form-group my-3 float-end">
                            <button type="submit" class="btn btn-primary" name="edit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
            </div>
        <?php }else{ ?>
          <div class="d-flex justify-content-center align-items-center text-center mask" style="height: 500px;">
            <div class="text-white">
                <div class="subheading">Hai Let's Work with Us</div>
                <div class="heading text-uppercase">Sistem Informasi “Sapi Muo” </div>
                <div class="description">Pengelolaan dan Penjadwalan Bisnis Peternakan Sapi Perah Berbasis Web Oleh PPL/ADPL A6</div>
                <?php if(isset($_SESSION['user'])){
                    if($_SESSION['user'] == 'owner') {?>
                    <a class="btn btn-primary btn-xl text-uppercase" href="pages/pencatatan_susu.php">Check Data</a>
                <?php }else{ ?>
                    <a class="btn btn-primary btn-xl text-uppercase" href="pages/pupuk.php">Take Me In!</a>
                <?php 
                    }
                } ?>
            </div>
          </div>
        <?php } ?>
      </div>
    <?php require 'views/layout/footer.php' ?>
</body>