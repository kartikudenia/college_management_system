<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="verticalModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="verticalModalLabel">Add Event</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Modal content goes here -->
                <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Add Event</label>
                        <input type="text" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Date</label>
                        <input type="date" class="form-control" id="exampleInputPassword1">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save changes</button>
            </div>
        </div>
    </div>
</div>