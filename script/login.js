//
indexApp.controller('doLogin',function($scope){
	$scope.isLogined = false;
	$scope.login = function () {
		$scope.userName = 'FantasyDL';
		$scope.isLogined = true;
	};
	$scope.register = function () {

	};
});