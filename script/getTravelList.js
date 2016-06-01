indexApp.controller('getTravelList',function($scope,$http){
	var url = '../core/gettravelList.php';

	$http.get(url).success(function(result){
		if(result == 'failed'){
			$scope.list = [];
		}else{
			for(var i = 0,l = result.length;i < l;i++){
				$('#hiddenText').append(result[i].content);
				result[i].content = $('#hiddenText').text();
				$('#hiddenText').html(null);
				if(result[i].newcommentusercontent == null){
					result[i].newcommentusercontent = '暂无评论';
				}
			}
			console.log(result);
			$scope.list = result;
		}
	});
})