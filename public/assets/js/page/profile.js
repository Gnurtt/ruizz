const View = {
	Order: {
		data: null,
		orderToggle(){ 
			$(".profile-data-wrapper").removeClass("is-open")
			$(".profile-data-wrapper[view-data=OrderDetail]").addClass("is-open")
			$(".profile-data-wrapper[view-data=OrderDetail] .profile-data-block").addClass("is-open")
		},
		orderClose(){ 
			$(".profile-data-wrapper").removeClass("is-open")
			$(".profile-data-wrapper[view-data=Profile]").addClass("is-open") 
		},
		render(data){
			data.map((v, k) => {

				$(".order-list")
					.append(`
                        <tr>
                            <td>${k + 1}</td>
                            <td>${v.order.created_at}</td>
                            <td>${v.order.order_value.split(",").map(v => `<p>${v.split("|")[0]} - ${v.split("|")[1]}</p>`).join("") }</td>
                            <td>$${v.order.total} for ${v.order_detail.length} items </td>
                        </tr>
					`)
			})
		},
		render_sub(id){
			var order_status = [
				"Chờ xác nhận",
                "Chưa hoàn thiện",
                "Đã hoàn thiện",
				"Đang lấy hàng",
				"Đang giao hàng",
				"Đã giao hàng",
				"Đã hủy",
			];
			var order_status_text = [
				"pending",
				"pending",
				"fulfill",
				"fulfill",
				"shipping",
				"shiped",
				"cancel",
			];
			var payment = [
				"",
				"Thanh toán khi nhận hàng",
				"Thanh toán online",
			];
			var payment_status = [
				"Chưa thanh toán",
				"Đã thanh toán",
			];
			var resource = $(".order-tab-wrapper")
			var data = View.Order.data[id];

			resource.find(".data-name").text(data.order.username);
			resource.find(".data-phone").text(data.order.telephone);
			resource.find(".data-address").text(data.order.address);
			resource.find(".data-payment").text(payment[data.order.payment_value]);
			resource.find(".data-payment-status").text(payment_status[data.order.payment_status]); 

			resource.find(".procedure-timeline .procedure-item").remove()
			data.order.order_value.split(",").map(v => {
				resource
					.find(".procedure-timeline")
					.prepend(`<div class="procedure-item">
								<div class="procedure-line"> </div>
								<div class="procedure-data">
									<div class="procedure-time">${v.split("|")[0]}</div> 
									<div class="procedure-title">${v.split("|")[1]}</div>
								</div>
							</div>`);
			}) 

			var sub_order = "";
            data.order_detail.map((v1,k1) => {
            	var image           = v1.images.split(",")[0];
            	var real_prices     = ViewIndex.Config.formatPrices(v1.discount == 0 ? v1.prices : v1.prices - (v1.prices*v1.discount/100));
            	var discount_price  = v1.discount == 0 ? "" : `<del>${ViewIndex.Config.formatPrices(v1.prices*v1.discount/100)} đ</del>`
            	sub_order += `<div class="order-item">
								<div class="item-image" style="background-image: url('${image}')"> </div>
								<div class="item-data">
									<h4 class="item-name">${v1.name}</h4>
									<p class="item-quantity">x${v1.quantity}</p>
								</div>
								<div class="item-price">
									${discount_price}
									<span>${real_prices} đ</span>
								</div>
							</div>`
            })
			resource
				.find(".order-item-wrapper")
				.html(`<div class="order-header ${order_status_text[data.order.order_status]}">
								${order_status[data.order.order_status]}
							</div>
							<div class="order-body">
								${sub_order}
							</div>
							<div class="order-footer">
								Tổng số tiền: <span>${ViewIndex.Config.formatPrices(data.order.total)} đ</span>
							</div>`);
			

		},
	    onSelect(callback){
	        $(document).on('click', `.order-item-wrapper`, function() {
	        	View.Order.orderToggle()
	        	callback($(this).attr("order-id"))
	        });
	    },
	    init(){
	        $(document).on('click', `.go-back .do-action`, function() {
	        	View.Order.orderClose()
	        });
	    }
	},
	Profile: {
		setVal(data){
			$('.data-name').val(data.username)
			$('.data-address').val(data.address)
			$('.data-phone').val(data.telephone)
			// : ``
			$('.avatar-wrapper .image-wrapper').css({"background-image": `url('/${data.avatar}')`})
		},
		getVal(){
			var resource = $(".profile-data-block[tab-data=Information]"); 
            var fd = new FormData();
            var required_data = [];
            var onPushData = true;

            var data_name          = resource.find('.data-name').val();
            var data_address       = resource.find('.data-address').val();
            var data_phone         = resource.find('.data-phone').val();
            var data_image         = resource.find("#avatar")[0].files;
 
            if (data_name == '') { required_data.push('Nhập tên.'); onPushData = false }
            if (data_address == '') { required_data.push('Nhập địa chỉ.'); onPushData = false }
            if (data_phone == '') { required_data.push('Nhập số điện thoại.'); onPushData = false }

            if (onPushData) {
                fd.append('data_name', data_name);
                fd.append('data_address', data_address);
                fd.append('data_phone', data_phone);
                fd.append('data_image', data_image[0]);
                return fd;
            }else{
                resource.find('.error-log .js-response').remove();
                var required_noti = ``;
                for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                resource.find('.error-log').prepend(`<div class="js-response js-errors">${required_noti}</div> `)
                return false;
            }
		},
        response: { 
            success(message){
                $(".error-log .js-response").remove();
                $(".error-log").prepend(`<div class="js-response js-success"><li>${message}</li></div>`)
	            setTimeout(function () {
	                $('.error-log .js-response').remove();
	            }, 1500);
            },
            error(message){
                $(".error-log .js-response").remove();
                $(".error-log").prepend(`<div class="js-response js-errors"><li>${message}</li></div>`)
	            setTimeout(function () {
	                $('.error-log .js-response').remove();
	            }, 1500);
            },                  
        },
		onUpdate(callback){
	        $(document).on('click', `.profile-data-block[tab-data=Information] .action-save.on-save`, function() {
	        	var data = View.Profile.getVal();
                if (data) callback(data);
	        });
	    },
		init(){
			// $('#avatar').val('')
			// $('.data-name').val('')
			// $('.data-address').val('')
			// $('.data-phone').val('')
	        $(document).on('change', '#avatar', function(e) {
	            var father = $(this).parent().parent()
	            if(this.files[0].size > 5242880){
	               alert("File quá lớn, dung lượng upload tối đa 5 MB!");
	            }else{
	                var img = new Image;
	                img.src = URL.createObjectURL(e.target.files[0]);
	                img.onload = function() {
	                    father.find('.image-wrapper').css({
	                        'background-image' : `url('${URL.createObjectURL(e.target.files[0])}')`
	                    })
	                }
	            }
	            $(`.profile-data-block[tab-data=Information] .action-save`).addClass("on-save")
	        });
	        $(document).on('change', '.data-name', function(e) {
	        	$(`.profile-data-block[tab-data=Information] .action-save`).addClass("on-save")
	        });
	        $(document).on('change', '.data-address', function(e) {
	        	$(`.profile-data-block[tab-data=Information] .action-save`).addClass("on-save")
	        });
	        $(document).on('change', '.data-phone', function(e) {
	        	$(`.profile-data-block[tab-data=Information] .action-save`).addClass("on-save")
	        });
		}
	}, 
	Password: {
		getVal(){
			var resource = $(".profile-data-block[tab-data=Password]"); 
            var fd = new FormData();
            var required_data = [];
            var onPushData = true;

            var data_oldpass          = resource.find('.data-oldpass').val();
            var data_newpass       = resource.find('.data-newpass').val();
            var data_code         = resource.find('.data-code').val(); 
 
            if (data_oldpass == '') { required_data.push('Nhập mật khẩu cũ.'); onPushData = false }
            if (data_newpass == '') { required_data.push('Nhập mật khẩu mới.'); onPushData = false }
            if (data_code == '') { required_data.push('Nhập mã xác thực.'); onPushData = false }

            if (onPushData) {
                fd.append('data_oldpass', data_oldpass);
                fd.append('data_newpass', data_newpass);
                fd.append('data_code', data_code);
                return fd;
            }else{
                resource.find('.error-log .js-response').remove();
                var required_noti = ``;
                for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                resource.find('.error-log').prepend(`<div class="js-response js-errors">${required_noti}</div> `)
                return false;
            }
		},
		checkVal(){
			var resource = $(".profile-data-block[tab-data=Password]"); 
            var onPushData = true;
            var required_data = [];
            var data_oldpass          = resource.find('.data-oldpass').val();
            var data_newpass       = resource.find('.data-newpass').val();
            if (data_oldpass == '') { required_data.push('Nhập mật khẩu cũ.'); onPushData = false }
            if (data_newpass == '') { required_data.push('Nhập mật khẩu mới.'); onPushData = false }
            if (onPushData) {
            	return true;
            }else{
                resource.find('.error-log .js-response').remove();
                var required_noti = ``;
                for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                resource.find('.error-log').prepend(`<div class="js-response js-errors">${required_noti}</div> `)
                return false;
            }
		},
        response: { 
            success(message){
                $(".error-log .js-response").remove();
                $(".error-log").prepend(`<div class="js-response js-success"><li>${message}</li></div>`)
	            setTimeout(function () {
	                $('.error-log .js-response').remove();
	            }, 5000);
            },
            error(message){
                $(".error-log .js-response").remove();
                $(".error-log").prepend(`<div class="js-response js-errors"><li>${message}</li></div>`)
	            setTimeout(function () {
	                $('.error-log .js-response').remove();
	            }, 5000);
            },                  
        },
		onUpdate(name, callback){
	        $(document).on('click', `.password-update`, function() {
            	var fd = new FormData();
            	var data_password          = $('.data-password').val();
                fd.append('data_password', data_password);
	        	callback(fd);
	        });
	    },
		onSend(name, callback){
	        $(document).on('click', `.profile-data-block[tab-data=Password] .action-save`, function() {
	        	if($(this).attr('atr').trim() == name) {
	        		callback();
                }
	        });
	    },
		init(){ 
		}
	},
    URL: {
        setURL(filters){
            const param     = (new URLSearchParams({ ...filters })).toString();
            window.history.pushState('','', '?' + param);
        },
        getFilterURL(tag){
            var urlParam    = new URLSearchParams(window.location.search);
            return filters  = { tab: tag, };
        },
        get(id){
            var urlParam    = new URLSearchParams(window.location.search);
            return urlParam.get(id)
        }
    },
    init(){  
    	View.Order.init();
    	View.Profile.init(); 
        
        
    }
};
(() => {
    View.init();
    function init(){
        
    	getOrder( )
    }
    async function redirect_logined(url) {
        await delay(1500);
        window.location.replace(url);
    }
    function delay(delayInms) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve(2);
            }, delayInms);
        });
    }

    View.Password.onSend("Send", () => {
    	$(".profile-data-block[tab-data=Password] .action-save").html(`<i class="fas fa-spinner"></i>`);
    	Api.Auth.Code()
            .done(res => { 
            	if (res.status == 200) {
                    View.Password.response.success(res.message);
                    $(".profile-data-block[tab-data=Password] .action-save").attr("atr", "Update");
                    $(".profile-data-block[tab-data=Password] .action-save").html("Đổi mật khẩu");
                }else{
                	View.Password.response.error(res.message);
                }
            })
            .fail(err => {   })
            .always(() => { });
    })
    View.Password.onUpdate("Update", (fd) => {
    	Api.Auth.Change(fd)
            .done(res => { 
            	if (res.status == 200) {
                    View.Password.response.success(res.message)
                    redirect_logined("/profile")
                }else{
                	View.Password.response.error(res.message)
                }
            })
            .fail(err => {   })
            .always(() => { }); 
    })
    
    function getOrder(tab){
    	Api.Order.GetOrder(tab)
            .done(res => { 
            	View.Order.data = res.data;
            	View.Order.render(res.data);
            })
            .fail(err => {   })
            .always(() => { });
    }

    View.Order.onSelect((id) => {
    	View.Order.render_sub(id);
    })
    
    View.Profile.onUpdate((fd) => {
    	Api.Auth.Update(fd)
            .done(res => { 
            	if (res.status == 200) {
                    View.Profile.response.success(res.message)
                }
            })
            .fail(err => {   })
            .always(() => { });
    })
    init();
})();