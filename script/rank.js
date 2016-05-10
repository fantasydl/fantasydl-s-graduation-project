indexApp.controller('getRank',function($scope,$http){
	var url = '../core/rank.php';

	$http.get(url).success(function(result){
		console.log(result);
		if(result){
			$scope.list = result;
		}
	})
})