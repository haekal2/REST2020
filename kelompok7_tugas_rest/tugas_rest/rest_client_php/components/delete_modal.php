<!-- Modal -->
<div class="modal fade" id="modalDeleteData<?= $film['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalDeleteData<?= $film['id'] ?>Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="width: 25rem">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalDeleteData<?= $film['id'] ?>LongTitle"><strong>Delete Data Film</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="delete_data.php" method="post">
                <div class="modal-body">
                    <h6>Are you to delete this data?</h6>
                    <input type="hidden" value="<?= $film['id'] ?>" name="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger" name="submit">Delete Data</button>
                </div>
            </form>
        </div>
    </div>
</div>