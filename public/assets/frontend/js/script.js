function add_to_cart(path){
	jQuery(".add-to-cart").click(function(){
        var id = jQuery(this).attr("name");
		jQuery.getJSON(path + 'cart/add/' + id, function(data){
            jQuery("#cart-sidebar").html(data.products);
            jQuery("#cart-sidebar-widget").html(data.products_widget);
            jQuery("#basket span").text(data.count);
            jQuery("#top-subtotal").html(data.count + ' Sản phẩm, <span class="price">'+data.total+'VNĐ</span>');
            jQuery("#subtotal_cart .price").text(data.total + ' VNĐ');
            remove_cart_item();
            jQuery.toast({
                heading: 'Thông báo',
                text: 'Đã thêm sản phẩm vào giỏ hàng thành công',
                showHideTransition: 'slide',
                icon: 'success',
                position: 'top-right',
            })
        });
        return false;
	});
    remove_cart_item();
}

function add_to_cart_detail(path){
    jQuery(".add-to-cart").click(function(){
        var id = jQuery(this).attr("name");
        var qty = jQuery("#qty").val();
        jQuery.getJSON(path + 'cart/add/' + id  + "/"+ qty, function(data){
            jQuery("#cart-sidebar").html(data.products);
            jQuery("#cart-sidebar-widget").html(data.products_widget);
            jQuery("#basket span").text(data.count);
            jQuery("#top-subtotal").html(data.count + ' Sản phẩm, <span class="price">'+data.total+'VNĐ</span>');
            jQuery("#subtotal_cart .price").text(data.total + ' VNĐ');
            remove_cart_item();
            jQuery.toast({
                heading: 'Thông báo',
                text: 'Đã thêm sản phẩm vào giỏ hàng thành công',
                showHideTransition: 'slide',
                icon: 'success',
                position: 'top-right',
            })
        });
        return false;
    });
    remove_cart_item();
}


function remove_cart_item(){
    jQuery(".remove-cart-item").click(function(){
        var _this = jQuery(this);
        var path = _this.attr("href");
        var name = _this.attr("name");
        jQuery.getJSON(path, function(data){
            jQuery("#cart-sidebar").html(data.products);
            jQuery("#cart-sidebar-widget").html(data.products_widget);
            if(typeof data.products === "undefined"){
                jQuery("#basket span").text("0");
                jQuery("#top-subtotal").html('0 Sản phẩm, <span class="price">0 VNĐ</span>');
                jQuery("#subtotal_cart .price").text('0 VNĐ');
            } else {
                jQuery("#basket span").text(data.count);
                jQuery("#top-subtotal").html(data.count + ' Sản phẩm, <span class="price">'+data.total+'VNĐ</span>');
                jQuery("#subtotal_cart .price").text(data.total + ' VNĐ');
            }
            jQuery(".item_"+name).fadeOut(function(){
                jQuery(".item_"+name).remove();
            });
            remove_cart_item();
        });
    });
}

function chontinh(app_url){
    jQuery("#address_1").change(function(){
        jQuery.get(app_url + 'address/get/'+jQuery(this).val(), function(tinh){
            jQuery("#address_2").html(tinh);chonhuyen();
        });
    });
}

function chonhuyen(app_url){
    jQuery("#address_2").change(function(){
        jQuery.get(app_url +'address/get/'+jQuery(this).val(), function(huyen){
            jQuery("#address_3").html(huyen);
        });
    });
}
