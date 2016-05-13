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
			}
			console.log(result);
			$scope.list = result;
		}
	});
})