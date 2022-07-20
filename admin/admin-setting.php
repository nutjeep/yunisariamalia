<?php
include 'connection.php';
include 'header.php';
?>
      <!-- Setting side -->
      <div id="content" class="setting" mb-5>
        <div class="title"><h3>Setting</h3></div>
        <div class="subcontent">
          <form action="./proses/create-setting.php" method="post">
            <?php
              
              $list = "SELECT * FROM `tb_setting`"; 
              $list = mysqli_query($conn, $list);
              while($data = mysqli_fetch_array($list)){
            ?>
            <input type="hidden" name="id" value="<?= $data['id'];?>">
            <?php// } ?>
            
            <?php
              // include 'connection.php';

              // $list = "SELECT * FROM `tb_setting`";
              // $list = mysqli_query($conn, $list);

              // while($data = mysqli_fetch_array($list)) { 
            ?>
            <div class="mb-3 label">
              <label for="websiteTitle" class="form-label">Website title</label>
              <input type="text" class="form-control" id="websiteTitle" name="websiteTitle" placeholder="<?= $data['website_title']; ?>">
            </div>
            <!-- <div class="mb-3 label">
              <label for="profilePhoto" class="form-label">Profile photo</label>
              <input type="file" class="form-control" id="profilePhoto" name="profilePhoto" placeholder="<?//= $data['profile_photo']; ?>">
            </div> -->
            <div class="mb-3 label">
              <label for="websiteName" class="form-label">Website name</label>
              <input type="text" class="form-control" id="websiteName" name="websiteName" placeholder="<?= $data['website_name']; ?>">
            </div>
            <div class="mb-3 label">
              <label for="description" class="form-label">Description</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="<?= $data['description']; ?>">
            </div>
            <!-- <div class="mb-3 label">
              <label for="favicon" class="form-label">Favicon</label>
              <input type="file" class="form-control" id="favicon" name="favicon" placeholder="<?//= $data['favicon']; ?>">
            </div> -->
            <div class="btn">
              <a href="./process/update-setting.php?id=<?= $data['id']; ?>" onclick="sendSetting(<?= $data['id']?>, '<?= $data['website_title']; ?>', '<?= $data['website_name']; ?>', '<?= $data['description']; ?>')" data-bs-toggle="modal" data-bs-target="#updateSetting">
                <button class="btn btn-primary" type="submit" name="edit">Edit</button>
              </a>
            </div>
            <?php } ?>
          </form>
        </div>
      </div>
    </div>

    <!-- Modal Update Setting -->
    <div class="modal fade" id="updateSetting" tabindex="-1" aria-labelledby="updateSettingLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateSettingLabel">Add Item</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="./process/update-setting.php" method="POST">
              <?php
                $list = "SELECT * FROM `tb_setting`"; 
                $list = mysqli_query($conn, $list);
                while($data = mysqli_fetch_array($list)){
               ?>
              <input type="hidden" name="id" value="<?= $data['id'];?>">
              
              <div class="mb-3 label">
                <label for="websiteTitle" class="form-label">Website title</label>
                <input type="text" class="form-control" id="websiteTitle" name="websiteTitle">
              </div>
              <!-- <div class="mb-3 label">
                <label for="profilePhoto" class="form-label">Profile photo</label>
                <input type="file" class="form-control" id="profilePhoto" name="profilePhoto" placeholder="<?//= $data['profile_photo']; ?>">
              </div> -->
              <div class="mb-3 label">
                <label for="websiteName" class="form-label">Website name</label>
                <input type="text" class="form-control" id="websiteName" name="websiteName">
              </div>
              <div class="mb-3 label">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description">
              </div>
              <!-- <div class="mb-3 label">
                <label for="favicon" class="form-label">Favicon</label>
                <input type="file" class="form-control" id="favicon" name="favicon" placeholder="<?//= $data['favicon']; ?>">
              </div> -->
              <button class="btn btn-primary" type="submit">Save changes</button>
              <?php } ?>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>

    <?php include 'footer.php' ?>

    <script>
      function sendSetting(id, websiteTitle, websiteName, description) {
        $('#updateSetting #websiteTitle').val(websiteTitle);
        // $('#updateSetting #profilePhoto').val(profilePhoto);
        $('#updateSetting #websiteName').val(websiteName);
        $('#updateSetting #description').val(description);
        // $('#updateSetting #favicon').val(favicon);
      }
    </script>