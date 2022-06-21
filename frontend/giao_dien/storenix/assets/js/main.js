function tinhTongTien(){
    var $tong_tien_gio_hang = 0;
    $("#gio-hang tbody tr").each(function (){
        var $myTr = $(this);
        var $soLuong = parseInt($myTr.find('.td-so-luong input').val(),10);
        var $giaban =  parseFloat($myTr.find('td.td-gia-ban input').val(),10);
        var $tongTien = $giaban * $soLuong;
        $tong_tien_gio_hang+=$tongTien;
    });
    $("#tong-tien-gio-hang").text($tong_tien_gio_hang.toLocaleString('vi'));
}

$(document).ready(function (){
//     $(document).on('click','div.add-to-cart a',function (e){
//         e.preventDefault();//tắt tất cả sự kiện mặc định
//         $.ajax({
//             //2
//             url: 'index.php?r=site/add-to-cart', // sử dụng ajax để trang web ko bị load lại
//             data: {code: $(this).attr('data-value')},
//             type: 'post',//kiểu gửi đi
//             dataType: 'json',//kiểu trả về
//             beforeSend: function (){
//             //1.quy trình bắt đầu từ hàm này
//                $('.thongbao').html('');
//                $.blockUI({message: "Vui lòng chờ trong giây lát"});
//             },
//             success: function (data) {
// //5
//                 alert(data.message);
//                 $(".card-sec").html(data.mini_cart);
//             },
//             complete: function (){
// //4
//                 $.unblockUI();
//             },
//             error: function (r1, r2){
//             //3
//             $('.thongbao').html(r1.responseText);
//             }
//         })
//     });

    $(document).on('click','.cart-btn',function (e){
        e.preventDefault();//tắt tất cả sự kiện mặc định
        $.ajax({
            //2
            url: 'index.php?r=site/add-to-cart', // sử dụng ajax để trang web ko bị load lại
            data: $("#form-add-to-cart").serializeArray(),
            type: 'post',//kiểu gửi đi
            dataType: 'json',//kiểu trả về
            beforeSend: function (){
                //1.quy trình bắt đầu từ hàm này
                $('.thongbao').html('');
                $.blockUI({message: "Vui lòng chờ trong giây lát"});
            },
            success: function (data) {
//5
                alert(data.message);
                $(".card-sec").html(data.mini_cart);
            },
            complete: function (){
//4
                $.unblockUI();
            },
            error: function (r1, r2){
                //3
                $('.thongbao').html(r1.responseText);
            }
        })
    });

    $(document).on('change','.td-so-luong input',function (e){
        var $soLuong = parseInt($(this).val(),10);
        var $myTr = $(this).parent().parent();//hàm parent lấy phần tử cha của đối tượng
        var $giaban =  parseInt($myTr.find('td.td-gia-ban input').val(),10);
        var $tongTien = $giaban * $soLuong;
        $myTr.find('.td-thanh-tien').text($tongTien.toLocaleString('vi'));
        tinhTongTien();
    });

    $(document).on('click', '.btn-update-cart', function (e){
        e.preventDefault();
        $.ajax({
            //2
            url: 'index.php?r=site/update-cart', // sử dụng ajax để trang web ko bị load lại
            data: $("#form-gio-hang").serializeArray(),
            type: 'post',//kiểu gửi đi
            dataType: 'json',//kiểu trả về
            beforeSend: function (){
                //1.quy trình bắt đầu từ hàm này
                $('.thongbao').html('');
                $.blockUI({message: "Vui lòng chờ trong giây lát"});
            },
            success: function (data) {
//4

                $(".thongbao").html(data.message);
                setInterval('location.reload()',1500);
            },
            complete: function (){
//4
                $.unblockUI();
            },
            error: function (r1, r2){
                //3
                $('.thongbao').html(r1.responseText);
            }
        })
    });

    //cách 1 dể xóa sản phẩm trong giỏ hàng, cách 2 dùng php
    // $(document).on('click','.btn-delete-san-pham',function (e){
    //     e.preventDefault();
    //     $.ajax({
    //         url: 'index.php?r=site/xoa-san-pham',
    //         data: {sanpham: $(this).attr('data-value')},
    //         type: 'post',
    //         dataType: 'json',
    //         beforeSend: function (){
    //             $.blockUI();
    //             $('.thongbao').html('');
    //         },
    //         success: function (data){
    //             alert(data.message);
    //             window.reload();
    //         },
    //         error: function (r1,r2){
    //             $('.thongbao').html(r1.responseText);
    //         },
    //         complete: function (){
    //             $.unblockUI();
    //         }
    //     })
    // })
})