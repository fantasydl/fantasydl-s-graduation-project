indexApp.controller('getComment',function($scope,$http){
	var url = '../core/commentList.php';
	url = url + '?shopid=0'
	$http.get(url).success(function(result){
		if(result == 'failed'){
			$scope.list = [];
			alert('获取评论列表失败');
		}else{
			for(var i = 0,l = result.length;i < l;i++){
				result[i].score = parseInt(result[i].score);
			}
			$scope.list = result;
		}
	});
});