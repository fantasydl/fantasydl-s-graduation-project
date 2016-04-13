// 登录、注册、退出控制器
indexApp.controller('doLogin',function($scope,$http){
	$scope.isLogined = window.sessionStorage.isLogined == 'true' ? true : false;
	$scope.userName = window.sessionStorage.curUser == 'undefined' ? undefined :  window.sessionStorage.curUser;
	$scope.showLogin = function () {
		var loginModal = document.getElementById('loginModal');
		angular.element(loginModal).css('display','block');
	};
	$scope.login = function () {
		$http.get('login.json').success(function(result){
			var loginModal = document.getElementById('loginModal');
			angular.element(loginModal).css('display','none');
			window.sessionStorage.curUser = result.nickname;
			$scope.userName = result.nickname;
			window.sessionStorage.isLogined = true;
			$scope.isLogined = true;
		});
	};
	$scope.register = function () {
		
	};
	$scope.exit = function () {
		window.sessionStorage.curUser = undefined;
		$scope.userName = undefined;
		window.sessionStorage.isLogined = false;
		$scope.isLogined = false;
	};
});