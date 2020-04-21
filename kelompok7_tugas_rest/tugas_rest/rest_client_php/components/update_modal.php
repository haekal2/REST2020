<!-- Modal -->
<div class="modal fade" id="modalUpdateData<?= $film["id"] ?>" tabindex="-1" role="dialog" aria-labelledby="modalUpdateData<?= $film["id"] ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 25rem">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateData<?= $film["id"] ?>LongTitle"><strong>Update Data Film</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="update_data.php" method="post">
                <div class="modal-body">
                    <input type="hidden" name="id" value="<?= $film['id'] ?>">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="judul" value="<?= $film['judul'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <select class="form-control" name="jenis">
                            <option value="<?= $film['jenis'] ?>" selected><?= $film['jenis'] ?></option>
                            <option value="Movie">Movie</option>
                            <option value="Series">Series</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Genre</label>
                        <input type="text" class="form-control" name="genre" value="<?= $film['genre'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Rating</label>
                        <input type="number" class="form-control" name="penilaian" value="<?= $film['penilaian'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Years</label>
                        <input type="number" class="form-control" name="tahun" value="<?= $film['tahun'] ?>">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>