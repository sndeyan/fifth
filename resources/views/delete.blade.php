<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmationLabel" style="z-index: 2500;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="deleteConfirmationLabel">Delete</h4>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                {{ Form::open(array( 'method' => 'DELETE' , 'class'=>'form-horizontal')) }}
                {{Form::submit('Close', ['class' => 'btn btn-default', 'data-dismiss' => 'modal'])}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>