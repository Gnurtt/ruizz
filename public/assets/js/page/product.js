const View = {
    
    RelatedProduct: {
        render(data){
            data.map(v => {
                $(".related-product")
                    .append(`<div class="single-product-area mt-30 col-lg-3">
                            <div class="product-thumb">
                                <a href="/product/${v.slug}">
                                    <img class="primary-image" src="/${v.images.split(",")[0]}" alt="">
                                </a>
                                <div class="label-product label_new">${v.brand_name}</div> 
                            </div>
                            <div class="product-caption">
                                <h4 class="product-name"><a href="/product/${v.slug}">${v.name}</a></h4>
                                <div class="price-box">
                                <span class="new-price">$${v.prices}</span> 
                                </div>
                            </div>
                        </div>`)
            })
        }
    },
    isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    },
    formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    },
    URL: {
        get(id){
            return $(".product-id").val()
        }
    },
    Comment:{
        setDefaul(){
            var data_comment      = $(`#comment`).val("");
        },
        changeText(status){
            $(".comment-submit").html(status ? `<i class="fas fa-spinner"></i>` : "Send Comment")
        },
        getVal(){
            var fd = new FormData();
            var required_data = [];
            var data_comment      = $(`#comment`).val();
            var data_product      = $(`.product-id`).val();
            var data_rate         = $("[name=rating2]:checked").val() ?? 0;
            fd.append('data_comment', data_comment);
            fd.append('data_rate', data_rate);
            fd.append('data_product', data_product);
            return fd;
        },
        onPush(name, callback){
            $(document).on('click', `.comment-submit`, function() {
                View.Comment.changeText(1);
                if($(this).attr('atr').trim() == name) {
                    var data = View.Comment.getVal();
                    callback(data);
                }
            });
        },
        onRender(data){
            $(".review_address_inner .pro_review").remove()
            data.map(v => {
                var rating_data = "";
                for (var i = 0; i < v.rating; i++) {
                    rating_data += `<li><span class="icon-star"></span></li>`
                }
                $(".review_address_inner")
                    .append(`
                        <div class="pro_review">
                            <div class="review_details">
                                <div class="review_info mb-10">
                                    <ul class="product-rating d-flex mb-10">
                                        ${rating_data}
                                    </ul>
                                    <h5>${v.username} - <span> ${v.created_at}</span></h5>

                                </div>
                                <p>${v.comment ?? ""}</p>
                            </div>
                        </div>`)
            })
            
        },
        onRenderRate(product, data_rate){

            $(".avg-rating-number").html(`Trung bình: ${Math.round(product.equal_rate * 100) / 100 ?? 0}`) 
            $(".count-rate").html(`${product.count_rate ?? 0} Đánh giá`)

            var array_count_rate = [];
            data_rate.map(v => array_count_rate[v.rating] = v.count);
            for (var i = 5; i >= 1; i--) { 
                $(".rate-list-data")
                    .append(`<div class="py-1">
                                <a class="row align-items-center mx-gutters-2 font-size-1" href="javascript:;">
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="text-warning text-ls-n2 font-size-16" style="width: 80px;">
                                            ${i}<small class="fas fa-star ml-2"></small> 
                                        </div>
                                    </div>
                                    <div class="col-auto mb-2 mb-md-0">
                                        <div class="progress ml-xl-5" style="height: 10px; width: 200px;">
                                            <div class="progress-bar" role="progressbar" style="width:${((array_count_rate[i] ?? 0) / product.count_rate) * 100}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-auto text-right">
                                        <span class="text-gray-90">${array_count_rate[i] ?? 0}</span>
                                    </div>
                                </a>
                            </div>`)
            }
        },
        onSuccess(){
            $(".comments-area").prepend(`<span class="label label-success">Comment successful</span>`)
            setTimeout(function() {
                $(".comments-area .label").remove()
            }, 2000);
        },
    },
    init(){
        
    }
};
(() => {
    View.init()
    function init(){
        getRelatedProduct();
        getComment();
    }
    function debounce(f, timeout) {
        let isLock = false;
        let timeoutID = null;
        return function(item) {
            if(!isLock) {
                f(item);
                isLock = true;
            }
            clearTimeout(timeoutID);
            timeoutID = setTimeout(function() {
                isLock = false;
            }, timeout);
        }
    }
    function delay(f, timeout) {
        let timeoutID = null;
        return function(...args) {
            clearTimeout(timeoutID);
            timeoutID = setTimeout(() => {
                f(...args);
            }, timeout);
        }
    }

    View.Comment.onPush("Comment Submit", delay((fd) => {
        Api.Comment.Create(fd)
            .done(res => {
                View.Comment.changeText(0);
                View.Comment.onSuccess();
                View.Comment.setDefaul();
                getComment();
            })
            .fail(err => {  })
            .always(() => { })   
    }, 1000))

    function getComment(){
        Api.Comment.GetAll(View.URL.get("id"))
            .done(res => {
                View.Comment.onRender(res.data)
            })
            .fail(err => {  })
            .always(() => { });
    } 

    function getRelatedProduct(){
        Api.Product.GetRelated(View.URL.get("id"))
            .done(res => {
                View.RelatedProduct.render(res.data);
            })
            .fail(err => {  })
            .always(() => { });
    } 
    init()
})();
