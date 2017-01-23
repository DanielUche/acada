<div class="inmodal">
    <div class="modal-header">
        <i class="fa fa-film modal-icon"></i>
        <h5 class="modal-title">{{$title}}</h5>
    </div>
    <div class="modal-body">
        <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?php echo $embed; ?>" frameborder="0" allowfullscreen></iframe>

    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" ng-click="cancel()">Close</button>
    </div>
</div>