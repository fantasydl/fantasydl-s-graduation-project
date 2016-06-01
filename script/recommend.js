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
			if(result.length == 0){
				alert('抱歉，没有推荐给您的商铺了！');
				window.history.go(-1);
			}
			$scope.list = result;
		}
	})
})