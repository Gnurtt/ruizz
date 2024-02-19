const View = {
    Cart: {
        total: 0,
        render(data){
            View.Cart.total += data.quantity * data.prices
            $(".cart-total-price").html(`$${View.Cart.total}`)
            $(".cart-list")
                .append(`<tr>
                            <td class="plantmore-product-thumbnail">
                                <a href="/product/${data.slug}"> <img src="/${data.images.split(",")[0]}" style="width: 150px" alt=""></a>
                            </td>
                            <td class="plantmore-product-name"><a href="#">${data.name}</a></td>
                            <td class="plantmore-product-price"><span class="amount">$${data.prices}</span></td>
                            <td class="plantmore-product-quantity" data-id="${data.id}">
                                <input value="${data.quantity}" type="number">
                            </td>
                            <td class="product-subtotal"><span class="amount">$${data.quantity * data.prices}</span></td>
                            <td class="plantmore-product-remove" data-id="${data.id}"><a href="#"><i class="fa fa-times"></i></a></td>
                        </tr>`)
        },
        doUpdate(){

        },
        onUpdate(callback){ 
            $(document).on('click', `.update-cart`, function() {
                callback();
            }); 
        },
        onRemove(callback){ 
            $(document).on('click', `.plantmore-product-remove`, function() {
                let data_id = $(this).attr("data-id")
                callback(data_id);
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

    View.Cart.onRemove((id) => {
        var card_data = localStorage.getItem("ruiz-cart")
        let card_json = JSON.parse(card_data)

        let card_new = []
        card_json.map(v => {
            let cart_item = JSON.parse(v)
            if (cart_item.id != id) card_new.push(JSON.stringify(cart_item)) 
        })

        localStorage.setItem("ruiz-cart", JSON.stringify(card_new)); 

        card_json_new = JSON.parse(JSON.stringify(card_new))
        renderData(card_json_new)
    })
 
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
