indexApp.controller('getshopList',function($scope,$http){
	var url = '../core/getshopList.php';
	url = url + "?category=美食";
	$http.get(url).success(function(result){
		if(result == 'failed'){
			$scope.list = [];
			alert('获取列表失败');
		}else{
			for(var i = 0,l = result.length;i < l;i++){
				var score = parseInt(result[i].avg_score1) + parseInt(result[i].avg_score2) + parseInt(result[i].avg_score3);
				result[i].score = parseInt(score/3);
				if(!result[i].newcomment){
					result[i].newcomment = '暂无评论';
				}
			}
			$scope.list = result;
		}
	});
});