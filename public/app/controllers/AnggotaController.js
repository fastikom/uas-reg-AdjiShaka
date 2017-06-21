app.controller('AnggotaBukuController', function(dataFactory,$scope,$http,apiUrl){
 
  $scope.data = [];
  $scope.libraryTemp = {};
  $scope.totalProductsTemp = {};

  $scope.totalAnggota = 0;
  $scope.pageChanged = function(newPage) {
    getResultsPage(newPage);
  };

  getResultsPage(1);
  function getResultsPage(pageNumber) {
      if(! $.isEmptyObject($scope.libraryTemp)){
          dataFactory.httpRequest(apiUrl+'/anggota?search='+$scope.searchText+'&page='+pageNumber).then(function(data) {
            $scope.data = data.data;
            $scope.totalAnggota = data.total;
          });
      }else{
        dataFactory.httpRequest(apiUrl+'/anggota?page='+pageNumber).then(function(data) {
          console.log(data);
          $scope.data = data.data;
          $scope.totalAnggota = data.total;
        });
      }
  }

  $scope.searchDB = function(){
      if($scope.searchText.length >= 3){
          if($.isEmptyObject($scope.libraryTemp)){
              $scope.libraryTemp = $scope.data;
              $scope.totalAnggotaTemp = $scope.totalAnggota;
              $scope.data = {};
          }
          getResultsPage(1);
      }else{
          if(! $.isEmptyObject($scope.libraryTemp)){
              $scope.data = $scope.libraryTemp ;
              $scope.totalAnggota = $scope.totalAnggotaTemp;
              $scope.libraryTemp = {};
          }
      }
  }

  $scope.saveAdd = function(){
    dataFactory.httpRequest('anggota','POST',{},$scope.form).then(function(data) {
      $scope.data.push(data);
      $(".modal").modal("hide");
    });
  }

  $scope.edit = function(id){
    dataFactory.httpRequest(apiUrl+'/anggota/'+id+'/edit').then(function(data) {
    	console.log(data);
      	$scope.form = data;
    });
  }

  $scope.saveEdit = function(){
    dataFactory.httpRequest(apiUrl+'/anggota/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
      	$(".modal").modal("hide");
        $scope.data = apiModifyTable($scope.data,data.id,data);
    });
  }

  $scope.remove = function(product,index){
    var result = confirm("Yakin akan dihapus?");
   	if (result) {
      dataFactory.httpRequest(apiUrl+'/anggota/'+anggota.id,'DELETE').then(function(data) {
          $scope.data.splice(index,1);
      });
    }
  }
   
});