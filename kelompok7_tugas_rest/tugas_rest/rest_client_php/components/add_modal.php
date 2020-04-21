<!-- Modal -->
<div class="modal fade" id="modalAddData" tabindex="-1" role="dialog" aria-labelledby="modalAddDataTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 25rem">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddDataLongTitle"><strong>Add Data Film</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="add_data.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" class="form-control" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="">Type</label>
                        <select class="form-control" name="jenis">
                            <option>Movie</option>
                            <option>Series</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Genre</label>
                        <input type="text" class="form-control" name="genre">
                    </div>
                    <div class="form-group">
                        <label for="">Rating</label>
                        <input type="number" class="form-control" name="penilaian">
                    </div>
                    <div class="form-group">
                        <label for="">Years</label>
                        <input type="number" class="form-control" name="tahun">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" name="submit">Add Data</button>
                </div>
            </form>
        </div>
    </div>
</div>