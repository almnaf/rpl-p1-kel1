<?php
include "db.php";
if(isset($_POST["hidden"])){
    $title=$_POST["edittitle"];
    $amount=$_POST["editamount"];
    $source=$_POST["editsource"];
    $desc=$_POST["editdesc"];
    $id=$_POST["hidden"];
    $sql= "UPDATE `notes` SET `sno`='$id',`title`='$title',`amount`='$amount',`source`='$source',`description`='$desc' WHERE `sno`='$id'";
    $res=mysqli_query($conn, $sql);
}

echo '
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Catatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <form method="POST">
        <input type="hidden" name="hidden" id="hidden">
            <div class="mb-3">
                <label for="title" class="form-label">Judul</label>
                <input type="text" class="form-control" id="title" placeholder="Masukkan Judul..." name="edittitle" required>
            </div>
            <div class="mb-3">
                <label for="amount" class="form-label">Jumlah Pemasukkan</label>
                <input type="text" class="form-control" id="amount" placeholder="Masukkan Jumlah..." name="editamount" required>
            </div>
            <div class="mb-3">
                <label for="source" class="form-label">Sumber Pemasukkan</label>
                <input type="text" class="form-control" id="source" placeholder="Masukkan Sumber..." name="editsource" required>
            </div>
            <div class="mb-3">
                <label for="desc" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="desc" rows="3" placeholder="Masukkan Deskripsi..." name="editdesc" required></textarea>
            </div>
        <button type="submit" class="btn btn-primary" name="submit">Update Catatan</button>
            </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      
      </div>
    </div>
  </div>
</div>
';

?>