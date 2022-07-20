<?php
include 'header.php';
?>
      <!-- Experience side -->
      <div id="content" class="experience" mb-5>
        <div class="title"><h3>Experience</h3></div>
        <div class="subcontent">
          <button class="mb-3 btn add-button" data-bs-toggle="modal" data-bs-target="#createExperience" name="add-item">Add item</button>

          <?php
            include 'connection.php';

            $list = "SELECT * FROM `tb_experience` INNER JOIN `tb_ctgy_experience` ON `tb_experience`.category = `tb_ctgy_experience`.`category`";

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
            <?php while($data = mysqli_fetch_array($list)) { ?>
              <tr>
                <th scope="row"><?= $no; $no++; ?></th>
                <td class="category"><?= $data['category_name']; ?></td>
                <td class="title"><?= $data['title']; ?></td>
                <td class="desc"><?= $data['description']; ?></td>
                <td class="action">
                  <a href="./process/update-experience.php?id=<?= $data['id'];?>" onclick="sendExperience(<?= $data['id']; ?>, '<?= $data['category']; ?>', '<?= $data['title']; ?>', '<?= $data['description']; ?>', '<?= $data['year']; ?>')" data-bs-toggle="modal" data-bs-target="#updateExperience">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <a href="./process/delete-experience.php?id=<?= $data['id']; ?>"><i class="bi bi-trash me-1"></i></a>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>            
        </div>
      </div>
    </div>
   
    <!-- Modal Create Experience -->
    <div class="modal fade" id="createExperience" tabindex="-1" aria-labelledby="createExperienceLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createExperienceLabel">Add Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="./process/create-experience.php" method="POST">
              <select class="form-select form-select-md mb-4" aria-label="Default select example" name="select-item" required>
                <option selected desabled>Select category</option>
                <?php 
                  include '../connection.php';

                  $list = "SELECT * FROM `tb_ctgy_experience`";
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

    <!-- Modal Update Experience -->
    <div class="modal fade" id="updateExperience" tabindex="-1" aria-labelledby="updateExperienceLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateExperienceLabel">Add Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="./process/update-experience.php" method="POST">
              <?php
                $list = "SELECT * FROM `tb_experience`"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
               ?>
              <input type="hidden" name="id" value="<?= $data['id'];?>">
              <?php } ?>
              <select class="form-select form-select-md mb-4" aria-label="Default select example" id="category" name="select-item" required>
                <option selected desabled>Select category</option>
                <?php 
                  include '../connection.php';

                  $list = "SELECT * FROM `tb_ctgy_experience`";
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
              <button class="btn btn-primary" type="submit">Save changes</button>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php' ?>

    <script>
      function sendExperience(id, category, title, description, year) {
        $('#updateExperience #category').val(category);
        $('#updateExperience #title').val(title);
        $('#updateExperience #description').val(description);
        $('#updateExperience #year').val(year);
      }
    </script>