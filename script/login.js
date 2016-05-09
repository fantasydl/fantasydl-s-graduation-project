// 登录、注册、退出控制器
indexApp.controller('doLogin',function($scope,$http){

	$scope.isLogined = window.sessionStorage.isLogined == 'true' ? true : false;
	$scope.nickName = window.sessionStorage.curUser == 'undefined' ? undefined :  window.sessionStorage.curUser;
	$scope.userId = window.sessionStorage.curUserId == 'undefined' ? undefined :  window.sessionStorage.curUserId;
	
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
			if(result === 'failed'){
				alert('登录失败');
			}else{
				var loginModal = document.getElementById('loginModal');
				angular.element(loginModal).css('display','none');
				window.sessionStorage.curUser = result.nickname;
				$scope.nickName = result.nickname;
				window.sessionStorage.curUserId = result.userid;
				$scope.userId = result.userid;
				window.sessionStorage.isLogined = true;
				$scope.isLogined = true;
				$('header').find('input').val(null);
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
		data.nickname = registername;
		data.userpsw = registerpsw;
		$http.post(url,data).success(function(result){
			console.log(result);
			if(result.match('failed')){
				alert('注册失败');
			}else{
				var loginModal = document.getElementById('registerModal');
				angular.element(loginModal).css('display','none');
				$('header').find('input').val(null);
			}
		});
	};

	$scope.exit = function () {
		window.sessionStorage.curUser = undefined;
		window.sessionStorage.curUserId = undefined;
		$scope.nickName = undefined;
		window.sessionStorage.isLogined = false;
		$scope.isLogined = false;
		$('#editTravel').hide();
	};

	$scope.close1 = function () {
		var loginModal = document.getElementById('loginModal');
		angular.element(loginModal).css('display','none');
		$('header').find('input').val(null);
	};
	
	$scope.close2 = function () {
		var registerModal = document.getElementById('registerModal');
		angular.element(registerModal).css('display','none');
		$('header').find('input').val(null);
	};

	$scope.InfoCenter = function () {
		if($scope.isLogined){
			var toUrl = 'info.html?userid=' + $scope.userId;
			window.open(toUrl);
		} else {
			alert('请先登录！');
		}
	};

	$scope.search = function (keywords) {
		// var keywords = $('#searchInput').val();
		$scope.srlist = [];
		if(!keywords){
			$('#searchResult').hide();
			return;
		}
		var url = '../core/search.php';
		url = url + '?keywords=' + keywords;
		$http.get(url).success(function(result){
			console.log(result);
			if(result){
				$scope.srlist = result;
				$('#searchResult').show();
			}else{
				$('#searchResult').hide();
			}
		})
	};
});