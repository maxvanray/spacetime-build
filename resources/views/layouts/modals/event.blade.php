<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">
                    <i class="fa fa-plus"></i> Create Event
                </h4>
            </div>
            <div class="modal-body">
<div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                        <label class="col-md-12 control-label" for="name">Event Name
                            <input id="name" class="form-control input-md" name="name" type="text" placeholder="Event Name" >
                        </label>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12">
                        <label class="col-md-12 control-label" for="description">Description
                        <textarea id="description" class="form-control" name="description" placeholder="Event Description"></textarea>
                    </label>
                  </div>
                </div>
</div>

            </div><!-- /.modal-body -->
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-right" id="close_calendar_event"
                        data-dismiss="modal">
                    Close
                    <i class="fa fa-times"></i>
                </button>
                <button type="button" class="btn btn-success pull-left" id="add-new-event"
                        <?php /* data-dismiss="modal" */ ?> >
                    <i class="fa fa-plus"></i> Add
                </button>
            </div>
        </div>
    </div>
</div>