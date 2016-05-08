indexApp.controller('getUserInfo',function($scope,$http){
	var thisUrl = decodeURI(window.location.href);
	var types = [],tempArr;
	var argUrl = thisUrl.slice(thisUrl.indexOf('?')+1).split('&');
	for(var i = 0,l = argUrl.length;i < l;i++){
		tempArr = argUrl[i].split('='); 
		types[tempArr[0]] = tempArr[1]; 
	}

	var url = '../core/getuserInfo.php';
	url = url + "?userid=" + types['userid'];

	$http.get(url).success(function(result){
		if(result == 'failed'){
			alert('获取个人信息失败');
		}else{
			console.log(result);
			$scope.userInfo = result;
			$('#nickname').val(result.nickname);
			if(result.gender == 'male'){
				$('input[name=gender]').each(function(){
					if($(this).val() == 'male'){
						$(this).prop('checked',true);
					}
				})
			} else if (result.gender == 'female'){
				$('input[name=gender]').each(function(){
					if($(this).val() == 'female'){
						$(this).prop('checked',true);
					}
				})
			}
			$('#email').val(result.email);
			$('#introduce').val(result.introduce);
		}
	});

	$scope.uploadIcon = function () {
		var url = '../core/upload.php';
		var fd = new FormData();
		var oFile = $('#icon').prop('files')[0];
		fd.append('file',oFile);

		$.ajax({  
    		url : url,
    		type : 'POST',
     		data : fd,
     		contentType:false,
     		processData:false
		}).done(function(result){
			alert('上传成功！');
			result = JSON.parse(result);
			console.log(result[0]);
			$scope.userInfo.icon = 'uploads/' + result[0].icon;
			
		}).fail(function(error){
			alert('上传失败！');
		});  
	};

	$scope.checkOldPsw = function (str) {
		if(str!=$scope.userInfo.userpsw && str.length >= $scope.userInfo.userpsw.length){
			$('.psw span').text('*密码错误');
		}else{
			$('.psw span').text('');
		}
	};

	$scope.save = function () {
		var newpsw = $('#newpsw').val(),
			oldpsw = $('#oldpsw').val();
		if(newpsw!='' && $('.psw span').text()=='*密码错误'){
			alert('请填写正确的原密码！');
			return ;
		}else if(newpsw!='' && oldpsw.length < $scope.userInfo.userpsw.length){
			alert('请填写正确的原密码！');
			return ;
		}

		url = '../core/updateuserInfo.php';
		var data = {},
			temp = {};
		temp = $('#updateData').serializeArray();
		for(var i = 0,l = temp.length;i < l;i++){
			if(temp[i].value){
				data[temp[i].name] = temp[i].value;
			}
		}
		if(!data.userpsw){
			data.userpsw = $scope.userInfo.userpsw;
		}
		data.userid = parseInt($scope.userInfo.userid);
		data.icon = $scope.userInfo.icon;

		$http.post(url,data).success(function(result){
			alert('修改成功！');
			$scope.userInfo.userpsw = data.userpsw;
			window.sessionStorage.curUser = data.nickname;
		});
	};
});