var myApp = angular.module('myApp',[]);

myApp.config(function($interpolateProvider){
    $interpolateProvider.startSymbol('{[{').endSymbol('}]}');
  });


myApp.controller('myAppController', ['$scope',  '$rootScope', function($scope, $rootScope) {

  $scope.details = false;

  $scope.click = function(sound) {
    $scope.soundDetails = true;
    $scope.soundName = sound.name;
    $scope.soundDialogue = sound.dialogue;
    window.history.pushState(name, name, '/name/'+sound.name);

    var audio = new Audio('/uploads/sounds/'+sound.path);
    audio.play();
  }

  $scope.facebookSharing = function(name) {
    var url = "http://localhost:8000/"+name;
    window.open( "http://www.facebook.com/sharer.php?u=" +
    encodeURIComponent(url) + "&t=" +
    encodeURIComponent(name),
    "facebook", "height=300,width=550,resizable=1" );
  }

  $scope.twitterSharing = function(name) {
    var url = 'http://localhost:8000/'+name;
    window.open( 'http://twitter.com/share?url=' + encodeURIComponent(url),
    "tweet", "height=300,width=550,resizable=1" )
  }

}]);
