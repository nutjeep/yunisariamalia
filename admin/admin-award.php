<?php
include 'header.php';
?>
      <!-- Award side -->
      <div id="content" class="award" mb-5>
        <div class="title"><h3>Award</h3></div>
        <div class="subcontent">
          <button class="mb-3 btn add-button" data-bs-toggle="modal" data-bs-target="#createAward" name="add-item">Add item</button>

          <?php
            include 'connection.php';

            $list = "SELECT * FROM `tb_awards` INNER JOIN `tb_ctgy_awards` ON `tb_awards`.category = `tb_ctgy_awards`.`category`";

            $list = mysqli_query($conn, $list);
            $no = 1;
          ?>
          <table class="table mb-5">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Category</th>
                <th scope="col">Title</th>
                <th scope="col">Year</th>
              </tr>
            </thead>
            <tbody>
            <?php while($data = mysqli_fetch_array($list)) { ?>
              <tr>
                <th scope="row"><?= $no; $no++; ?></th>
                <td class="category"><?= $data['category_name']; ?></td>
                <td class="title"><?= $data['title']; ?></td>
                <td class="year"><?= $data['year']; ?></td>
                <td class="action">
                <a href="./process/update-award.php?id=<?= $data['id'];?>" onclick="sendAward(<?= $data['id']; ?>, '<?= $data['category']; ?>', '<?= $data['title']; ?>', '<?= $data['year']; ?>')" data-bs-toggle="modal" data-bs-target="#updateAward">
                    <i class="bi bi-pencil-square"></i>
                  </a>
                  <a href="./process/delete-award.php?id=<?= $data['id']; ?>"><i class="bi bi-trash"></i></a>
                </td>
              </tr>
              <?php }?>
            </tbody>
          </table>            
        </div>
      </div>
    </div>

    <!-- Modal Create Award -->
    <div class="modal fade" id="createAward" tabindex="-1" aria-labelledby="createAwardLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="createAwardLabel">Add Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="./process/create-award.php" method="POST">
              <select class="form-select form-select-md mb-4" aria-label="Default select example" name="select-item" required>
                <option selected>Select category</option>
                <?php 
                  include '../connection.php';

                  $list = "SELECT * FROM `tb_ctgy_awards`";
                  $list = mysqli_query($conn, $list);

                  while($data = mysqli_fetch_array($list)){
                    echo "<option value='$data[category]'>$data[category_name]</option>";
                  }
                ?>
              </select>
              <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="mb-3">
                <label for="year" class="form-label">Year</label>
                <input type="text" class="form-control" id="year" name="year">
              </div>
              <button type="submit" class="btn btn-primary">Save</button>
            </form>
          </div>
          <div class="modal-footer">

          </div>
        </div>
      </div>
    </div>

    <!-- Modal Update Award -->
    <div class="modal fade" id="updateAward" tabindex="-1" aria-labelledby="updateAwardLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateAwardLabel">Add Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="./process/update-award.php" method="POST">
              <?php
                $list = "SELECT * FROM `tb_awards`"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
               ?>
              <input type="hidden" name="id" value="<?= $data['id'];?>">
              <?php } ?>
              <select class="form-select form-select-md mb-4" aria-label="Default select example" id="category" name="select-item" required>
                <option selected desabled>Category</option>
                <?php 
                  include '../connection.php';

                  $list = "SELECT * FROM `tb_ctgy_awards`";
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
      function sendAward(id, category, title, year) {
        $('#updateAward #category').val(category);
        $('#updateAward #title').val(title);
        $('#updateAward #year').val(year);
      }
    </script>