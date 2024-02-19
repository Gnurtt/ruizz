const View = {
    Cart: {
        total: 0,
        render(data){
            View.Cart.total += data.quantity * data.prices
            $(".cart-total-price").html(`$${View.Cart.total}`)
            $(".cart-list")
                .append(`
                        <tr class="cart_item">
                            <td class="product-name">
                                ${data.name} <strong class="product-quantity"> × ${data.quantity}</strong>
                            </td>
                            <td class="product-total">
                                <span class="amount">$${data.quantity * data.prices}</span>
                            </td>
                        </tr>`)
        },
        doUpdate(){

        },
        onUpdate(callback){ 
            $(document).on('click', `.update-cart`, function() {
                callback();
            }); 
        },
    },
    Order: {
        getVal(){
            var resource = '.cart-form-data';
            var fd = new FormData();
            var required_data = [];
            var onPushData = true;

            var data_id      = $(`${resource}`).find('.data-id').val(); 
            var data_name      = $(`${resource}`).find('.data-name').val(); 
            var data_email      = $(`${resource}`).find('.data-email').val(); 
            var data_phone      = $(`${resource}`).find('.data-phone').val(); 
            var data_address      = $(`${resource}`).find('.data-address').val();
            var data_payment      = $("[name='payment']:checked").val();
            var data_description      = $(`${resource}`).find('.data-description').val(); 
            $(`${resource}`).find('.error-log .js-errors').remove();

            if (IndexView.Config.isEmail(data_email) == null) { 
                if (data_email == '') { 
                    required_data.push('Email is required.'); onPushData = false 
                }else{
                    required_data.push('Email is invalid.'); onPushData = false 
                }
            }
            if (data_address == '') { required_data.push('Address is required.'); onPushData = false }
            if (data_phone == '') { required_data.push('Phone is required.'); onPushData = false }
            if (data_name == '') { required_data.push('Name is required.'); onPushData = false } 
            
            if (onPushData) {
                fd.append('data_id', IndexView.Config.toNoTag(data_id));
                fd.append('data_name', IndexView.Config.toNoTag(data_name));
                fd.append('data_email', IndexView.Config.toNoTag(data_email));
                fd.append('data_phone', IndexView.Config.toNoTag(data_phone));
                fd.append('data_address', IndexView.Config.toNoTag(data_address));
                fd.append('data_payment', data_payment);
                fd.append('data_description', IndexView.Config.toNoTag(data_description));
                fd.append('metadata', localStorage.getItem("ruiz-cart"));

                return fd;
            }else{
                $(`${resource}`).find('.error-log .js-errors').remove();
                var required_noti = ``;
                for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                return false;
            }
        },
        onPush(callback){
            $(document).on('click', `.button-payment`, function() {
                var data = View.Order.getVal();
                $(this).val("Creating Order ....")
                if (data) callback(data);
            });
        },
    },
    Color: {
        data: [],
    },
    init(){

    }
};
(() => {
    View.init();
    function init(){
        initData();
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
    async function initData() { 
        await getColor();
        var card_data = localStorage.getItem("ruiz-cart")
        let card_json = JSON.parse(card_data)
        renderData(card_json)
    } 

    function getOne(string_data){
        let json_data = JSON.parse(string_data) 
        Api.Product.getOne(json_data.id)
            .done(res => {
                res.data["quantity"] = json_data.quantity
                View.Cart.render(res.data);
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    } 

    View.Order.onPush((fd) => {
        Api.Order.Checkout(fd)
            .done(res => {
                if (res.status == 200) {
                    localStorage.removeItem("ruiz-cart"); 
                    redirect_logined(res.data)
                }else if (res.status == 201) {
                    localStorage.removeItem("ruiz-cart");  
                    redirect_logined("/order-success")
                }else{
                    View.response.error(res.message)
                }
            })
            .fail(err => {  })
            .always(() => { });
    })

    View.Cart.onUpdate(() => {
        View.Cart.total = 0;
        var card_data = localStorage.getItem("ruiz-cart")
        let card_json = JSON.parse(card_data)

        let card_new = []
        card_json.map(v => {
            let cart_item = JSON.parse(v)
            cart_item["quantity"] = $(`.plantmore-product-quantity[data-id=${cart_item.id}] input`).val()
            card_new.push(JSON.stringify(cart_item)) 
        })
        localStorage.setItem("ruiz-cart", JSON.stringify(card_new)); 

        card_json_new = JSON.parse(JSON.stringify(card_new))
        renderData(card_json_new)
    })

    function renderData(data){
        $(".cart-list tr").remove()
        data.map(v => {
            getOne(v)
        }) 
    }
 
    function getColor(){
        Api.Color.GetAll()
            .done(res => {
                View.Color.data = res.data
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    }
     
    init();
})();
