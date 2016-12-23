// console.log("╭━━━╮╱╱╱╱╱╱╱╱╭╮╱╱╱╱╱╱╱╱╱╱╱╭╮╭━━╮╭╮╱╱╭╮╭━╮╭━╮╱╱╭╮╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╭╮╭━━━╮╱╱╱╭━╮");
// console.log("╰╮╭╮┃╱╱╱╱╱╱╱╱┃┃╱╱╱╱╱╱╱╱╱╱╱┃┃┃╭╮┃┃╰╮╭╯┃┃┃╰╯┃┃╱╱┃┃╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱┃┃┃╭━╮┃╱╱╱┃╭╯");

(function() {

	var app = angular.module("vsummit" , ['ngFileUpload','angucomplete-alt']);


  app.controller("AddCustomerController", ['$scope', '$http','Upload', function($scope, $http,Upload) {
    // console.log("AddCustomerController");
		$scope.showLoading = false;
		$scope.showVadodara = false;
		$scope.showDistrict = false;
    $scope.user_obj = {
      	qrcode: '',
		fname: '',
		mname: '',
		lname: '',
      	company_name: '',
      	address: '',
		state: '',
		district: '',
		city: '',
		receiptguj:'0',//
		amountguj:'1000',//
		receiptvad:'0',//
		amountvad: '1500',//
		receiptvsummit: '0', //
		amountvsummit: '', //
        sertax: '',
        swctax: '',
        kkctax: '',
        totalvsummit: '',
      	mobile: '',
      	whatsapp: '',
      	email: '',
      	dob: '',
      	bloodgrp: 'Unknown',
		payment_type: '1', //Default CASH
		bank_name: '', //Bank Name
		dd_chk_no: '', //DD OR Cheque Number.
		user_type: '0',
		serial_no: '',
        rec_created: new Date(),
		cat: []

    };

	// $scope.is_print = false;
	// $scope.countries = [];
	// $scope.selectedCountry = "";
	// $scope.countries.push({name: 'India'});

    $scope.is_click = false;
    $scope.items = [];
	$scope.stateUrl = baseUrl + "api/getState/";

	$scope.$watch('user_obj.state',function(){
		if($scope.user_obj.state && $scope.user_obj.state.title)
		{
			$scope.cityUrl = baseUrl + "api/getCity/" + $scope.user_obj.state.title + "/";
			console.log($scope.user_obj.state);

			if($scope.user_obj.state.title == "Gujarat")
			{
				$scope.user_obj.district = "Ahmedabad";
				$scope.showDistrict = true;
			}
			else {
				$scope.showDistrict = false;
			}
		}



	});
	$scope.$watch('user_obj.city',function(){
		if($scope.user_obj.city && $scope.user_obj.city.title)
		{
			if($scope.user_obj.city.title == "Vadodara")
			{
				$scope.showVadodara = true;
				$scope.user_obj.amountvsummit = 0;
				$scope.calcTax();
			}
			console.log($scope.user_obj.city);
		}

	});
	$scope.defaultState = "Gujarat";

    $scope.calcTax = function()
    {
        $scope.user_obj.sertax = ($scope.user_obj.amountvsummit * 14) / 100;
        $scope.user_obj.swctax = ($scope.user_obj.amountvsummit * 0.5) / 100;
        $scope.user_obj.kkctax = ($scope.user_obj.amountvsummit * 0.5) / 100;

        $scope.user_obj.totalvsummit = parseFloat($scope.user_obj.amountvsummit) + parseFloat($scope.user_obj.sertax) + parseFloat($scope.user_obj.swctax) + parseFloat($scope.user_obj.kkctax);
    }
	$scope.changeVal = function()
	{
		if($scope.user_obj.user_type == '3') //SPOT
		{
			$scope.user_obj.amountvsummit = 3000;
		}
		else if($scope.user_obj.user_type == '0')//DELEGATE
		{
			$scope.user_obj.amountvsummit = 1500;
		}
		$scope.calcTax();
	}
    $scope.changeGuj = function()
    {
        $scope.user_obj.receiptguj = $scope.user_obj.receiptvsummit;
		if($scope.showVadodara)
		{
			$scope.user_obj.receiptguj = $scope.user_obj.receiptvad;
		}
    }
	// $scope.printChkBox = function(id)
	// {
	// 	console.log($scope.categories);
	// 	console.log("ID: ",id);
	// 	$scope.categories.forEach(function(cat){
	// 		if(cat.checked)
	// 		{
	// 			$scope.user_obj.cat.push({id: cat.UserCategory.id});
	// 		}
	// 	});
	//
	// 	console.log("user obj:= ",$scope.user_obj.cat);
	// }
	// $scope.$apply();
	$scope.changeVal();
	$scope.getCategories = function()
	{
		var req = {
		 method: 'GET',
		 url: baseUrl + 'users/getAllCategories'
		}

		$http(req)
		.then(function successCallback(response) {
		  //Success
		  if(response.data.status == 'success')
		  {
			console.log("SUCCESS");
				$scope.categories = response.data.data;
				$scope.categories.forEach(function(category){
					category.checked = false;
				});
		  }
		  else {
			console.log("Failed!!");
			// console.log(response);
				$scope.categories = [];
		  }
		}, function errorCallback(response) {
		  console.log(response);
		});
	}


	// $scope.checkObj = function()
	// {
	// 	console.log("Country: ",$scope.selectedCountry);
	// }
    $scope.addGuest = function()
    {
      $scope.is_click = true;
      $scope.items.push({
        guestName: '',
        guestqrcode: '',
		image: ''
      })
	  if($scope.user_obj.user_type == '0')//DELEGATE
	  {
	  	$scope.user_obj.amountvsummit = 1500 + (2000 * $scope.items.length);
		$scope.calcTax();
	  }
	  else if($scope.user_obj.user_type == '3')//SPOT
	  {
	  	  	$scope.user_obj.amountvsummit = 3000 + (3000 * $scope.items.length);
	  		$scope.calcTax();
	  }


	  if($scope.showVadodara)
	  {
		  $scope.user_obj.amountvad = 1500 + (2000 * $scope.items.length);
		//   $scope.calcTax();
	  }
	  console.log("Total: ", $scope.user_obj.amountvsummit);
  }

    $scope.removeGuest = function()
    {
      $scope.items.splice(-1,1);
	  if($scope.user_obj.user_type == '0')//DELEGATE
	  {
	  	$scope.user_obj.amountvsummit = $scope.user_obj.amountvsummit - 2000;
		$scope.calcTax();
  	  }
	  else if($scope.user_obj.user_type == '3')//SPOT
	  {
	  	  	$scope.user_obj.amountvsummit = $scope.user_obj.amountvsummit - 3000;
	  		$scope.calcTax();
	  }
	  if($scope.showVadodara)
	  {
		  $scope.user_obj.amountvad = $scope.user_obj.amountvad - 2000 ;
		//   $scope.calcTax();
	  }
    }


	// upload on file select or drop
   $scope.upload = function (file) {
		 console.log(file);
		 $scope.showLoading = true;
		//  $scope.user_obj.state = $scope.user_obj.state.title;
		console.log($scope.user_obj);
		 //
		 $scope.categories.forEach(function(cat)
		 {
 			if(cat.checked)
 			{
 				$scope.user_obj.cat.push({id: cat.UserCategory.id});
 			}
 		});
		$scope.tmp_id = "";
       Upload.upload({
           url: baseUrl + 'users/add',
           data: {file: file, User: $scope.user_obj}
       }).then(function (resp) {
		//    console.log("Response:",resp);

           if(resp.data.status == "error")
           {
               alert(resp.data.message);
               $scope.showLoading = false;
           }
           else {
			//    console.log("UserID:",resp.data);
               console.log('Success ' + resp.config.data.file.name + 'uploaded. Response: ' + resp.data);
    			 async.each($scope.items, function(item, callback){
    				//  console.log("New Response: ",resp.data.data);
    				 item.user_id = resp.data.data.User.id;
    				 Upload.upload({
    	            		url: baseUrl + 'users/addGuest',
    	            		data: {file: item.image, Item: item}
    	        }).then(function (resp) {
    					console.log("respon-",resp);
    					callback();
    				})
    				.catch(function(err){
    					console.log("err",err);
    					$scope.showLoading = false;
    					callback();
    				});
    			 }, function(){
    				 alert("Member successfully added!");
    				 $scope.showLoading = false;
					//  if($scope.is_print)
					//  {
					// 	 window.location.href = baseUrl + 'users/view';
					//  }
					//  else {
					// 	 window.location.href = baseUrl + 'users/view';
					//  }

					 window.location.href = baseUrl + 'users/view';

    			 });
           }
        //    console.log("1st Request Status:",resp.data);
        //    console.log("1st Request:",resp);
       }, function (resp) {
           console.log('Error status: ' + resp.status);
					 $scope.showLoading = false;
       }, function (evt) {
           var progressPercentage = parseInt(100.0 * evt.loaded / evt.total);
           console.log('progress: ' + progressPercentage + '% ' + evt.config.data.file.name);
       });
   };



    $scope.addMember = function()
    {
      console.log("user Obj: ", $scope.user_obj);
      console.log("Items Array: ",$scope.items);

		$scope.showLoading = true;

		var dobdate = $scope.user_obj.dob;
		dobdate.setHours(dobdate.getHours()+6);

		$scope.user_obj.dob = dobdate;
		// console.log("AFTER SET HOURS: ", dobdate);

		if ($scope.image)
		{
		  $scope.upload($scope.image);
		}


    }
  }]);

	// console.log("╱┃┃┃┣━━┳╮╭┳━━┫┃╭━━┳━━┳━━┳━╯┃┃╰╯╰╋╮╰╯╭╯┃╭╮╭╮┣━━┫╰━┳━━┳╮╭┳╮╭┳━━┳━╯┃┃╰━━┳╮╭┳╯╰┳╮╱╭┳━━┳━╮");

	app.controller('AddViewRoomController', ['$scope', '$http', function($scope,$http) {
		console.log("AddViewRoomController");
		$scope.userObj = {
			name: '',
			uname: '',
			user_id: '',
			muser: []

		};

		$scope.userUrl = baseUrl + "hotels/getUsersList/";

		$scope.$watch('userObj.name',function(){
			if($scope.userObj.name.originalObject && $scope.userObj.name.originalObject.user_id)
			{
				//$scope.cityUrl = baseUrl + "api/getCity/" + $scope.user_obj.state.title + "/";
				console.log("userObj: ",$scope.userObj.name);
				$scope.userObj.user_id = $scope.userObj.name.originalObject.user_id;
				$scope.userObj.uname = $scope.userObj.name.title;
				var flg = false;
				if($scope.userObj.muser.length != 0)
				{
					for(var i = 0 ; i < $scope.userObj.muser.length; i++)
					{
						if($scope.userObj.muser[i].user_id == $scope.userObj.user_id)
						{
							flg = true;
						}
					}
					if(flg)
					{
						alert("That member is already on selected!");
					}
				}
				if(!flg)
				{
					$scope.userObj.muser.push({user_id: $scope.userObj.user_id,user_name: $scope.userObj.uname});
				}
				console.log("Array: ", $scope.userObj.muser);
			}

		});

		$scope.removeUserID = function(idx)
		{
			$scope.userObj.muser.splice(idx, 1);
			console.log("Updated Array: ", $scope.userObj.muser);
		}
		// var req = {
		//  method: 'POST',
		//  url: baseUrl + 'users/getSelectedCategories',
		//  data: { user_id: $scope.user_id }
		// }


	}]);

	app.controller('EditRoomController', ['$scope', '$http', function($scope, $http) {
		console.log("EditRoomController");

		$scope.userObj = {
			name: '',
			uname: '',
			user_id: '',
			muser: []
		};
		$scope.userUrl = baseUrl + "hotels/getUsersList/";

		$scope.getRoomMembers = function()
		{
			var str = window.location.pathname;
			var res = str.split("/");
			$scope.room_id = res[4];

			var req = {
			 method: 'POST',
			 url: baseUrl + 'hotels/getRoomMembers',
			 data: { room_id: $scope.room_id }
			}
			$http(req)
			.then(function successCallback(response) {
			  //Success
			  if(response.data.status == 'success')
			  {
					console.log("SUCCESS");
					console.log(response.data.data);
					for(var i = 0 ; i < response.data.data[0].User.length ; i++)
					{
						$scope.userObj.uname = response.data.data[0].User[i].fname + " " + response.data.data[0].User[i].mname + " " +  response.data.data[0].User[i].lname;
						$scope.userObj.user_id =  response.data.data[0].User[i].id;
						$scope.userObj.muser.push({user_id: $scope.userObj.user_id,user_name: $scope.userObj.uname});
					}

			  }
			  else {
				console.log("Failed!!");
				// console.log(response);
			  }
			}, function errorCallback(response) {
			  console.log(response);
			});
		}


		//Watcher
		$scope.$watch('userObj.name',function(){
			if($scope.userObj.name.originalObject && $scope.userObj.name.originalObject.user_id)
			{
				//$scope.cityUrl = baseUrl + "api/getCity/" + $scope.user_obj.state.title + "/";
				console.log("userObj: ",$scope.userObj.name);
				$scope.userObj.user_id = $scope.userObj.name.originalObject.user_id;
				$scope.userObj.uname = $scope.userObj.name.title;
				var flg = false;
				if($scope.userObj.muser.length != 0)
				{
					for(var i = 0 ; i < $scope.userObj.muser.length; i++)
					{
						if($scope.userObj.muser[i].user_id == $scope.userObj.user_id)
						{
							flg = true;
						}
					}
					if(flg)
					{
						alert("That member is already on selected!");
					}
				}
				if(!flg)
				{
					$scope.userObj.muser.push({user_id: $scope.userObj.user_id,user_name: $scope.userObj.uname});
				}
				console.log("Array: ", $scope.userObj.muser);
			}

		});

		$scope.removeUserID = function(idx)
		{
			$scope.userObj.muser.splice(idx, 1);
			console.log("Updated Array: ", $scope.userObj.muser);
		}


	}]);

	app.controller('EditCustomerController', ['$scope', '$http', function($scope, $http) {
		console.log("EditCustomerController");

			var str = window.location.pathname;
			var res = str.split("/");
			$scope.user_id = res[4]; //CUSTOMER ID

			$scope.getSelectedCategories = function()
			{
				var req = {
				 method: 'POST',
				 url: baseUrl + 'users/getSelectedCategories',
				 data: { user_id: $scope.user_id }
				}

				$http(req)
				.then(function successCallback(response) {
				  //Success
				  if(response.data.status == 'success')
				  {
						console.log("SUCCESS");
						$scope.newcat = response.data.data;

						console.log($scope.newcat);
						var i = 0;

						for ( ; i < $scope.newcat.length; i++)
						{
							if($scope.checkCategory($scope.newcat[i].UserType.user_category_id))
							{
								console.log("FOUND!!");
							}
						}
				  }
				  else {
					console.log("Failed!!");
					// console.log(response);
				  }
				}, function errorCallback(response) {
				  console.log(response);
				});

			}
			$scope.getCategories = function()
			{
				var req = {
				 method: 'GET',
				 url: baseUrl + 'users/getAllCategories'
				}

				$http(req)
				.then(function successCallback(response) {
				  //Success
				  if(response.data.status == 'success')
				  {
					console.log("SUCCESS");
						$scope.categories = response.data.data;

						$scope.categories.forEach(function(category){
							category.checked = false;
						});

						$scope.getSelectedCategories();
				  }
				  else {
					console.log("Failed!!");
					// console.log(response);
						$scope.categories = [];
				  }
				}, function errorCallback(response) {
				  console.log(response);
				});
			}


			$scope.updateUserCategories = function()
			{
				var req = {
				 method: 'POST',
				 url: baseUrl + 'users/updateUserCategories',
				 data: {user_id: $scope.user_id,cat: $scope.categories}
				}
				$http(req)
				.then(function successCallback(response) {
				  //Success
				  if(response.data.status == 'success')
				  {
						console.log("SUCCESS");
						// $scope.categories = response.data.data;
				  }
				  else {
					console.log("Failed!!");
					// console.log(response);
				  }
				}, function errorCallback(response) {
				  console.log(response);
				});

			}

			$scope.checkCategory = function(id)
			{
				var flg = false;
				for(var i = 0 ; i < $scope.categories.length ; i++)
				{
					if($scope.categories[i].UserCategory.id == id)
					{
					  flg = true;
					  $scope.categories[i].checked = true;
					  break;
					}
					else {
					  flg = false;
					}
				}
				return flg;
			}
	}]);
	console.log("╱┃┃┃┃┃━┫╰╯┃┃━┫┃┃╭╮┃╭╮┃┃━┫╭╮┃┃╭━╮┃╰╮╭╯╱┃┃┃┃┃┃╭╮┃╭╮┃╭╮┃╰╯┃╰╯┃┃━┫╭╮┃╰━━╮┃┃┃┣╮╭┫┃╱┃┃╭╮┃╭╮╮");
	app.controller("ViewCustomerController", ['$scope', '$http', function($scope, $http) {
		// console.log("ViewCustomerController");
		$scope.data_fetched = false;
		$scope.search = "";
		// $scope.show_main_data = true; //by default it's true // when user search it will be false..

		$scope.name = "";
		$scope.getGuests = function(id,user)
		{
			// console.log("ID: ", id);

			var req = {
			 method: 'POST',
			 url: baseUrl + 'users/getGuests',
			 data:
			 {
			   id: id
			 }
			}
			$scope.name = user;
			$scope.user_id = id;
			$http(req)
			.then(function successCallback(response) {
			  //Success
			  if(response.data.status == 'success')
			  {
			    console.log("SUCCESS");
					$scope.guestlist = response.data.data;

					$scope.data_fetched = true;


			    // alert(response.data);
			  }
			  else {
			    console.log("Failed!!");
			    // console.log(response);
					$scope.guestlist = [];
					$scope.data_fetched = true;
			  }
			}, function errorCallback(response) {
			  console.log(response);
			  // $rootScope.$broadcast('loading:hide');
			});



		}

	}]);



}());


//
// console.log("╭╯╰╯┃┃━╋╮╭┫┃━┫╰┫╰╯┃╰╯┃┃━┫╰╯┃┃╰━╯┃╱┃┃╱╱┃┃┃┃┃┃╰╯┃┃┃┃╭╮┃┃┃┃┃┃┃┃━┫╰╯┃┃╰━╯┃╰╯┃┃┃┃╰━╯┃╭╮┃┃┃┃");
// console.log("╰━━━┻━━╯╰╯╰━━┻━┻━━┫╭━┻━━┻━━╯╰━━━╯╱╰╯╱╱╰╯╰╯╰┻━━┻╯╰┻╯╰┻┻┻┻┻┻┻━━┻━━╯╰━━━┻━━╯╰╯╰━╮╭┻╯╰┻╯╰╯");
// console.log("╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱┃┃╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╭━╯┃");
// console.log("╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╰╯╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╱╰━━╯");
