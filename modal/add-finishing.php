<div class="modal fade" id="addFinishing" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Add Finishing</h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="" id="add-finishing" method="POST">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label class="control-label" for="service">Service</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="service" id="service">
                        </div>
                        <div class="col-sm-3">
                            <label class="control-label" for="price">Price</label>
                        </div>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="price" id="price">
                        </div>
                        <input type="hidden" name="add_finishing">
                        <div class="col-sm-12 text-center">
                            <button class="btn btn-primary" name="add_finishing" type="submit">Add</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>