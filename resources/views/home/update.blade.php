<div class="inmodal">
    <div class="modal-header">
        <h4 class="modal-title">Edit Profile</h4>
    </div>
    <form class="m-t" name ="profileForm" ng-submit ="profileForm.$valid && update(profileForm.$valid)" novalidate>
    <div class="modal-body">
        <p><strong></strong> </p>        
                {!! csrf_field() !!}

                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} " ng-class="{'has-error':profileForm.$submitted && profileForm.name.$invalid || profileForm.name.$touched && profileForm.name.$invalid || errors.name}">
                        <input type="name" ng-model="profile.name" class="form-control input-lg" name = "name" placeholder="Your Name" required="">
                        <div class="help-block m-b-none" ng-show="profileForm.$submitted && profileForm.name.$invalid || profileForm.name.$touched">
                            <span ng-show = "profileForm.name.$error.required">This field is required</span>
                             <span ng-show = "profileForm.name.$error.email">Please enter a valid email address</span>
                        </div>
                        <div class="help-block m-b-none has-error" ng-show="errors.name">
                                 <span ng-show = "errors.name">@{{ errors.name.toString() }}</span>
                            </div>
                    </div>

                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} " ng-class="{'has-error': profileForm.$submitted && profileForm.email.$invalid || profileForm.email.$touched && profileForm.email.$invalid || errors.email}">
                        <input type="email" ng-model="profile.email" class="form-control input-lg" name = "email" placeholder="Email Address" required="">

                        <div class="help-block m-b-none" ng-show="profileForm.$submitted && profileForm.email.$invalid || profileForm.email.$touched">
                            <span ng-show = "profileForm.email.$error.required">This field is required</span>
                             <span ng-show = "profileForm.email.$error.email">Please enter a valid email address</span>
                        </div>
                        <div class="help-block m-b-none has-error" ng-show="errors.email">
                                 <span ng-show = "errors.email">@{{ errors.email.toString() }}</span>
                            </div>
                    </div>   
                
   </div>
    <div class="modal-footer">
     <button type="submit" class="btn btn-primary">Update Profiles</button>
        <button type="button" class="btn btn-white" ng-click="cancel()">Close</button>        
    </div>
</form>
</div>