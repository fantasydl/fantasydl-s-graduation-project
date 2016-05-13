indexApp.controller('getRecommend',function($scope,$http){

	$scope.userid = parseInt(sessionStorage.curUserId);

	if(!sessionStorage.isLogined || sessionStorage.isLogined == 'false'){
		alert('请先登录！');
		window.history.go(-1);
	}

	var url = '../core/recommend2.php?userid=' + $scope.userid;

	$http.get(url).success(function(result){
		console.log(result);
		if(result){
			$scope.list = result;
		}
	})
})