function HomeCtrl(APP_URL,$scope, $uibModal,$http) {
    $scope.video = {};
    $scope.videos = {};

    $scope.showModal = function() {
        var modalInstance = $uibModal.open({
                templateUrl: APP_URL+'show_modal', 
                size:'md',
                backdrop:"static",keyboard:true,
                scope:$scope, 
                controller:ModalInstanceCtrl,          
            }).result.then(function(){
               // $scope.dtInstance.reloadData();
        }, function(){
            //$scope.dtInstance.reloadData();
        }); 
    }

    $scope.loadVideos = function(){
       $http.get(APP_URL + "get_videos").then(function(res) {
            $scope.videos = res.data.videos;
        }); 
    }

    $scope.loadVideos();
    
    $scope.search = function() {
        var data = {search:$scope.video.search};
        $http({
            url: APP_URL+ "search_videos",
            method: "POST",
            data: $.param(data),
            headers: {'Content-Type':'application/x-www-form-urlencoded'}
        }).then(function(res){
            $scope.videos = res.data;
        });    
    }

    $scope.showEmbedModal = function(vid){
        var modalInstance = $uibModal.open({
                templateUrl: APP_URL+'show_modal?v=v&embed='+vid.video_url + "&title="+vid.title, 
                size:'md',
                backdrop:"static",keyboard:true,
                scope:$scope, 
                controller:ModalInstanceCtrl,          
            }).result.then(function(){
               // $scope.dtInstance.reloadData();
        }, function(){
                // $scope.dtInstance.reloadData();
        });

    }
}

function ModalInstanceCtrl(APP_URL, $scope,toaster ,$http ,$uibModalInstance){
    $scope.isProcessing = false;
   
    $scope.ok = function () {
        $uibModalInstance.close();
    };

    $scope.cancel = function () {
        $uibModalInstance.dismiss('cancel');
    };

    $scope.saveVideoUrl = function(){
        $scope.isProcessing = true;
            $http({url: APP_URL+'save-url',
                method: "POST",
                data: $.param($scope.video),
                headers: {'Content-Type':'application/x-www-form-urlencoded'}
            }).then(function(res){
                if(res.data.invalid){     
                    if(res.data.errors){
                        $scope.errors = res.data.errors;
                    }else {
                        toaster.error(res.data.msg);
                    }     
                }else if(res.data.success){
                    toaster.success(res.data.success);
                    $scope.cancel();
                }
                $scope.isProcessing = false;
        });
    }

}


function signUpCtrl(APP_URL,$scope, $http,$window){
    $scope.signUp = {};
    $scope.isProcessing = false;
    $scope.errors = {};

    $scope.create = function(formValid){
        
        if(formValid){
            $scope.isProcessing = true;
            $http({url: APP_URL+'register',
                method: "POST",
                data: $.param($scope.signUp),
                headers: {'Content-Type':'application/x-www-form-urlencoded'}
            }).then(function(res){
                if(res.data.errors){     
                    $scope.errors = res.data.errors;
                    if($scope.errors.email){
                        signUpForm['email'].focus();
                    }
                }else if(res.data.success){
                    $window.location = APP_URL + 'welcome';
                }
                $scope.isProcessing = false;
            });
        }
    }
}

function signInCtrl(APP_URL,$scope, $http,$window,toaster){
    $scope.signIn = {};
    $scope.isProcessing=false;
    $scope.loginState = false;

    $scope.signIn = function(formValid){
       if(formValid){
            $scope.isProcessing = true;
            $http({url: APP_URL+'login',
                method: "POST",
                data: $.param($scope.signIn),
                headers: {'Content-Type':'application/x-www-form-urlencoded'}
            }).then(function(res){ 
               if(res.data.success){
                    $scope.loginState= true;
                    $window.location = res.data.redirectUrl;
                }else{
                    $scope.errors = res.data.msg;
                    toaster.error(res.data.msg);
                }
                $scope.isProcessing = false;
            },function(res){
                toaster.error(res.data.msg);
                $scope.isProcessing = false;
            });
        }
    }
}

function ProfileCtrl(APP_URL,$scope,$uibModal,$http,$window,toaster){
    $scope.profile = {};
    $scope.errors = {};
    $scope.isProcessing=false;

    $http.get('profile').then(function(res){ $scope.profile = res.data; });

    $scope.update = function(formValid){
       if(formValid){
            $scope.isProcessing = true;
            $http({url: APP_URL+'profile',
                method: "POST",
                data: $.param($scope.profile),
                headers: {'Content-Type':'application/x-www-form-urlencoded'}
            }).then(function(res){ 
               if(res.data.success){
                    toaster.success(res.data.success);
                }else{
                    $scope.errors = res.data.errors;
                    toaster.error(res.data.msg);
                }
                $scope.isProcessing = false;
            },function(res){
                toaster.error(res.data.msg);
                $scope.isProcessing = false;
            });
        }
    }

    $scope.showUpdateModal = function(vid){
        var modalInstance = $uibModal.open({
                templateUrl: APP_URL+'open_model', 
                size:'md',
                backdrop:"static",keyboard:true,
                scope:$scope, 
                controller:ModalInstanceCtrl,          
            }).result.then(function(){
               location.reload();
        }, function(){
               location.reload();
        });

    }   
}

function browseCtrl(APP_URL,$scope, $uibModal,$http){
        $scope.videos = {};
        
        $scope.browse = function(){

        }
    }


angular
    .module('acada')
    .controller('browseCtrl',browseCtrl)
    .controller('ProfileCtrl',ProfileCtrl)
    .controller('ModalInstanceCtrl',ModalInstanceCtrl)
    .controller('HomeCtrl',HomeCtrl)
    .controller('signUpCtrl', signUpCtrl)
    .controller('signInCtrl', signInCtrl)
