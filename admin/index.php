<?php include 'header.php'; ?>
      <!-- About side -->
      <div id="content" class="about" mb-5>
        <div class="title"><h3>About</h3></div>
        <div class="subcontent">
          <?php
            include 'connection.php';

            $aboutDesc = "SELECT * FROM tb_about_desc";
            $aboutDesc = mysqli_query($conn, $aboutDesc);
          ?>
          <div class="form-description mb-5">
            <?php while($data = mysqli_fetch_array($aboutDesc)) { ?>
            <p id="about-desc"><?= $data['about_me']; ?></p>
            <?php } ?>

            <?php
            include 'connection.php';

            $aboutDesc = "SELECT * FROM tb_about_desc";
            $aboutDesc = mysqli_query($conn, $aboutDesc);
            ?>
            <div class="btn">
              <?php while($data = mysqli_fetch_array($aboutDesc)) { ?>
              <a href="./process/update-about-desc.php?id=<?= $data['id'];?>" onclick="sendDesc('<?= $data['about_me']; ?>')"  data-bs-toggle="modal" data-bs-target="#updateAboutDesc">
                <button type="button" class="btn">Edit</button>
              </a>
              <?php } ?>
            </div>
          </div>

          <button class="mb-3 btn add-button" data-bs-toggle="modal" data-bs-target="#createAbout" name="add-item">Add item</button>

          <?php
            include 'connection.php';

            $list = "SELECT * FROM `tb_about` INNER JOIN `tb_ctgy_about` ON `tb_about`.category = `tb_ctgy_about`.`category`";

            $list = mysqli_query($conn, $list);
            $no = 1;
          ?>

          <table class="table mb-5">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
              </tr>
            </thead>
            <tbody>
            <?php
              while($data = mysqli_fetch_array($list)) {
            ?>
              <tr>
                <th scope="row"><?= $no; $no++; ?></th>
                <td class="category"><?= $data['category_name']; ?></td>
                <td class="title"><?= $data['title']; ?></td>
                <td class="desc"><?= $data['description']; ?></td>
                <td class="action">
                  <a href="./process/update-about.php?id=<?= $data['id'];?>" onclick="sendAbout(<?= $data['id']; ?>, '<?= $data['category'] ?>', '<?= $data['title']; ?>', '<?= $data['description']; ?>', '<?= $data['year']; ?>')" data-bs-toggle="modal" data-bs-target="#updateAbout">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <a href="./process/delete-about.php?id=<?= $data['id']; ?>"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>            
        </div>
      </div>
    </div> <!-- penutup glassmorphism -->

    <!-- Modal Update About Description -->
    <div class="modal fade" id="updateAboutDesc" tabindex="-1" aria-labelledby="updateAboutDescLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateAboutDescLabel">Update description</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="./process/update-about-desc.php" method="POST">
              <?php
                $list = "SELECT * FROM `tb_about_desc`"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
               ?>
              <input type="hidden" name="id" value="<?= $data['id'];?>">
              <?php } ?>
              <div class="textarea mb-4">
                <textarea class="form-control" id="aboutDesc" rows="6" name="about-desc"></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Update About -->
    <div class="modal fade" id="updateAbout" tabindex="-1" aria-labelledby="updateAboutLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateAboutLabel">Update Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="./process/update-about.php" method="POST">
              <?php
                $list = "SELECT * FROM `tb_about`"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
               ?>
              <input type="hidden" name="id" value="<?= $data['id'];?>">
              <?php } ?>
              <select class="form-select form-select-md mb-4" aria-label="Default select example" id="category" name="select-item" required>
                <option selected>Select category</option>
                <?php
                  $list = "SELECT * FROM `tb_ctgy_about`";
                  $list = mysqli_query($conn, $list);

                  while($data = mysqli_fetch_array($list)){
                    echo "<option name='select-item' value='$data[category]'>$data[category_name]</option>";
                  }
                ?>
              </select>
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
              </div>
              <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="text" class="form-control" id="year" name="year" required>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Save changes</button>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal Create About -->
    <div class="modal fade" id="createAbout" tabindex="-1" aria-labelledby="createAboutLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createAboutLabel">Add Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">         
            <form action="./process/create-about.php" method="POST" novalidate>
              <select class="form-select form-select-md mb-4" aria-label="Default select example" name="select-item" required>
                <option selected desabled>Select category</option>
                <?php 
                  include '../connection.php';

                  $list = "SELECT * FROM `tb_ctgy_about`";
                  $list = mysqli_query($conn, $list);

                  while($data = mysqli_fetch_array($list)){
                    echo "<option value='$data[category]'>$data[category_name]</option>";
                  }
                ?>
              </select>
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description">
              </div>
              <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="text" class="form-control" id="year" name="year" required>
              </div>
              <button class="btn btn-primary" type="submit">Save</button>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php' ?>

    <script>
      function sendAbout(id, category, title, description, year) {
        $('#updateAbout #category').val(category);
        $('#updateAbout #title').val(title);
        $('#updateAbout #description').val(description);
        $('#updateAbout #year').val(year);
      }

      function sendDesc(aboutDesc) {
        $('#aboutDesc').val(aboutDesc);
        // console.log('berhasil');
      }
    </script>