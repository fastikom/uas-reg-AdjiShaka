app.controller('AdminController', function($scope,$http){
 
  $scope.pools = [];
   
});

app.controller('BukuController', function(dataFactory,$scope,$http,apiUrl){
 
  $scope.data = [];
  $scope.libraryTemp = {};
  $scope.totalBukuTemp = {};

  $scope.totalBuku = 0;
  $scope.pageChanged = function(newPage) {
    getResultsPage(newPage);
  };

  getResultsPage(1);
  function getResultsPage(pageNumber) {
      if(! $.isEmptyObject($scope.libraryTemp)){
          dataFactory.httpRequest(apiUrl+'/buku?search='+$scope.searchText+'&page='+pageNumber).then(function(data) {
            $scope.data = data.data;
            $scope.totalBuku = data.total;
          });
      }else{
        dataFactory.httpRequest(apiUrl+'/buku?page='+pageNumber).then(function(data) {
          console.log(data);
          $scope.data = data.data;
          $scope.totalBuku = data.total;
        });
      }
  }

  $scope.searchDB = function(){
      if($scope.searchText.length >= 3){
          if($.isEmptyObject($scope.libraryTemp)){
              $scope.libraryTemp = $scope.data;
              $scope.totalBukuTemp = $scope.totalBuku;
              $scope.data = {};
          }
          getResultsPage(1);
      }else{
          if(! $.isEmptyObject($scope.libraryTemp)){
              $scope.data = $scope.libraryTemp ;
              $scope.totalBuku = $scope.totalBukuTemp;
              $scope.libraryTemp = {};
          }
      }
  }

  $scope.saveAdd = function(){
    dataFactory.httpRequest('buku','POST',{},$scope.form).then(function(data) {
      $scope.data.push(data);
      $(".modal").modal("hide");
    });
  }

  $scope.edit = function(id){
    dataFactory.httpRequest(apiUrl+'/buku/'+id+'/edit').then(function(data) {
    	console.log(data);
      	$scope.form = data;
    });
  }

  $scope.saveEdit = function(){
    dataFactory.httpRequest(apiUrl+'/buku/'+$scope.form.id,'PUT',{},$scope.form).then(function(data) {
      	$(".modal").modal("hide");
        $scope.data = apiModifyTable($scope.data,data.id,data);
    });
  }

  $scope.remove = function(product,index){
    var result = confirm("Yakin akan dihapus?");
   	if (result) {
      dataFactory.httpRequest(apiUrl+'/buku/'+buku.id,'DELETE').then(function(data) {
          $scope.data.splice(index,1);
      });
    }
  }
   
});