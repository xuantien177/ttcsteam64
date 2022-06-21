$(document).on('change','#san-pham',function (e){
    var sanpham = document.getElementById('san-pham').value;
    alert(sanpham);
    $('.td-san-pham').value = sanpham;
});