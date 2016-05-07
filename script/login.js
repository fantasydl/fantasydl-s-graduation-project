// 登录、注册、退出控制器
indexApp.controller('doLogin',function($scope,$http){

	$scope.isLogined = window.sessionStorage.isLogined == 'true' ? true : false;
	$scope.userName = window.sessionStorage.curUser == 'undefined' ? undefined :  window.sessionStorage.curUser;
	
	$scope.showLogin = function () {
		var loginModal = document.getElementById('loginModal');
		angular.element(loginModal).css('display','block');
	};

	$scope.login = function () {
		var userName = document.getElementById('username').value;
		var userPsw = document.getElementById('userpsw').value;
		var url = '../core/login.php';
		url = url + '?username=' + userName;
		url = url + '&userpsw=' + userPsw;
		$http.get(url).success(function(result){
			console.log(result);
			if(result.match('failed')){
				alert('登录失败');
			}else{
				var loginModal = document.getElementById('loginModal');
				angular.element(loginModal).css('display','none');
				window.sessionStorage.curUser = result.username;
				$scope.userName = result.username;
				$scope.userid = result.userid;
				window.sessionStorage.isLogined = true;
				$scope.isLogined = true;
			}
		});
	};

	$scope.showRegister = function () {
		var registerModal = document.getElementById('registerModal');
		angular.element(registerModal).css('display','block');
	};

	$scope.register = function () {
		var registername = document.getElementById('registername').value;
		var registerpsw = document.getElementById('registerpsw').value;
		var url = '../core/register.php';
		var data = {};
		data.username = registername;
		data.userpsw = registerpsw;
		$http.post(url,data).success(function(result){
			console.log(result);
			if(result.match('failed')){
				alert('注册失败');
			}else{
				var loginModal = document.getElementById('registerModal');
				angular.element(loginModal).css('display','none');
			}
		});
	};

	$scope.exit = function () {
		window.sessionStorage.curUser = undefined;
		$scope.userName = undefined;
		window.sessionStorage.isLogined = false;
		$scope.isLogined = false;
	};

	$scope.close1 = function () {
		var loginModal = document.getElementById('loginModal');
		angular.element(loginModal).css('display','none');
	};
	
	$scope.close2 = function () {
		var registerModal = document.getElementById('registerModal');
		angular.element(registerModal).css('display','none');
	};
});