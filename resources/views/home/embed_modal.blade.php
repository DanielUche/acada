<div class="inmodal">
    <div class="modal-header">
        <i class="fa fa-film modal-icon"></i>
        <h4 class="modal-title">Video Embed</h4>
        <small class="font-bold">Share videos you want fellow developers to find</small>
    </div>
    <div class="modal-body">
        <p><strong></strong> </p>
        <form name = "uploadForm" ng-submit = "saveVideoUrl(uploadForm.$valid)" novalidate>

            <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}" ng-class="{'has-error': uploadForm.title.$invalid && uploadForm.$submitted || uploadForm.title.$invalid && uploadForm.title.$touched || errors.title }">
                <label>Title</label> 
                <input class = "form-control"  ng-model = "video.title" name ="title" required/>

                <div class="help-block m-b-none" ng-show="uploadForm.$submitted && uploadForm.title.$invalid  || uploadForm.title.$touched">
                    <span ng-show = "uploadForm.title.$error.required">This field is required</span>
                </div>
                <div class="help-block m-b-none" ng-show="errors.title">
                    <span ng-show = "errors.title">@{{ errors.title.toString() }}</span>
                </div>
            </div>

            <div class="form-group {{ $errors->has('video_url') ? 'has-error' : ''}}" ng-class="{'has-error': uploadForm.video_url.$invalid && uploadForm.$submitted || uploadForm.video_url.$invalid && uploadForm.video_url.$touched || errors.video_url }"">
                <label>YouTube Video Url</label>
                <input type="text" name ="video_url" ng-model ="video.video_url" placeholder="YouTube Video Url" class="form-control" required />
                <div class="help-block m-b-none" ng-show="uploadForm.$submitted && uploadForm.video_url.$invalid  || uploadForm.video_url.$touched">
                    <span ng-show = "uploadForm.video_url.$error.required">This field is required</span>
                </div>
                <div class="help-block m-b-none" ng-show="errors.video_url">
                    <span ng-show = "errors.video_url">@{{ errors.video_url.toString() }}</span>
                </div>
            </div>

            <div class="form-group {{ $errors->has('category_id') ? 'has-error' : ''}}" ng-class="{'has-error': uploadForm.category_id.$invalid && uploadForm.$submitted || uploadForm.category_id.$invalid && uploadForm.category_id.$touched || errors.category_id }">
                <label>Video Category</label> 
                <select class = "form-control"  ng-model = "video.category_id" name ="category_id" required>
                <option value="">Select One</option>
                    @foreach($categories as $c)
                    <option value="{{$c->id}}">{{$c->name}}</option>
                    @endforeach
                </select>
                <div class="help-block m-b-none" ng-show="uploadForm.$submitted && uploadForm.category_id.$invalid  || uploadForm.category_id.$touched">
                    <span ng-show = "uploadForm.category_id.$error.required">This field is required</span>
                </div>
                <div class="help-block m-b-none" ng-show="errors.category_id">
                    <span ng-show = "errors.category_id">@{{ errors.category_id.toString() }}</span>
                </div>
            </div>



        </form>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-white" ng-click="cancel()">Close</button>
        <button type="submit" class="btn btn-primary" ng-click = "saveVideoUrl()">Save changes</button>
    </div>
</div>