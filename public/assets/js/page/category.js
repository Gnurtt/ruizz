const View = {

    Product: {
        render(data){
            $(".grid-item .col-lg-4").remove()
            $(".list-item .shop-product-list-wrap").remove()
            data.map(v => {
                $(".grid-item")
                    .append(`<div class="col-lg-4 col-md-6">
                                <!-- single-product-area start -->
                                <div class="single-product-area mt-30">
                                    <div class="product-thumb">
                                        <a href="/product/${v.slug}">
                                            <img class="primary-image" src="/${v.images.split(",")[0]}" alt="">
                                        </a> 
                                    </div>
                                    <div class="product-caption">
                                        <h4 class="product-name"><a href="/product/${v.slug}">${v.name}</a></h4>
                                        <div class="price-box">
                                            <span class="new-price">$${v.prices}</span> 
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-area end -->
                            </div> `)
                $(".list-item")
                    .append(` <div class="shop-product-list-wrap">
                                <div class="row product-layout-list mt-30">
                                    <div class="col-lg-3 col-md-3">
                                        <!-- single-product-wrap start -->
                                        <div class="single-product">
                                            <div class="product-image">
                                                <a href="/product/${v.slug}"><img src="/${v.images.split(",")[0]}" alt="Produce Images"></a>
                                            </div>
                                        </div>
                                        <!-- single-product-wrap end -->
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="product-content-list text-left">
                                           
                                            <h4><a href="/product/${v.slug}" class="product-name">Auctor gravida enim</a></h4>
                                            <div class="price-box">
                                                <span class="new-price">$${v.prices}</span> 
                                            </div>

                                            <div class="product-rating">
                                                <ul class="d-flex">
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li><a href="#"><i class="icon-star"></i></a></li>
                                                    <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>
                                                </ul>
                                            </div>

                                            <p>${v.description}</p>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="block2">
                                            <ul class="stock-cont">
                                                <li class="product-sku">Brand: <span>${v.brand_name}</span></li>
                                                <li class="product-stock-status">Availability: <span class="in-stock">In Stock</span></li>
                                            </ul>
                                            <div class="product-button">
                                                
                                                <div class="add-to-cart">
                                                    <div class="product-button-action">
                                                        <a href="#" class="add-to-cart">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`)
            })
        }
        
    },
    Brand: {
        render(data){
            data.map(v => {
                $(".brand-list")
                    .append(`<li  class="has-sub"><a href="/category?tag=${v.id}">${v.name}</a></li>`)
            })
        }
    },
    Color: {
        render(data){
            data.map(v => {
                $(".color-list")
                    .append(`<li><a href="#">${v.name}</a></li>`)
            })
        }
    },
    
    pagination: {
        page: 1,
        pageSize: 6,
        total: 0,
        onChange(callback) {
            const oThis = this;
            $(document).on('click', '.woocommerce-pagination .paginate_button.page-item:not(.disabled, .active)', function () {
                const page = $(this).text();
                let nextPage = null;
                if (page.match(/Next/g)) {
                    nextPage = oThis.page + 1;
                }
                else if (page.match(/Previous/g)) {
                    nextPage = oThis.page - 1;
                }
                else {
                    nextPage = +page;
                }
                callback(+nextPage);
                oThis.page = +nextPage;
            });
        },
        length(){
            return Math.ceil(this.total / this.pageSize);
        },
        render() {
            const paginationHTML = generatePagination(this.page, Math.ceil(this.total / this.pageSize));  
            $('.woocommerce-pagination').html(paginationHTML)

            const startEntry = this.pageSize * (this.page - 1) + 1;
            const lastEntry = Math.min(this.pageSize * this.page, this.total);
        }
    },
    Filter: {
        page: "",
        keyword: "",
        tag: "",
        prices: "",
        sort: "",
    },
    URL: {
        setURL(filters){
            const param     = (new URLSearchParams({ ...filters })).toString();
            window.history.pushState('','', '?' + param);
        },
        getFilterURL(){
            // lấy ra url và trả về chuỗi filter tương ứng
            var urlParam    = new URLSearchParams(window.location.search);
            return filters  = {
                page:           View.Filter.page,
                keyword:        View.Filter.keyword,
                tag:            View.Filter.tag,
                prices:         View.Filter.prices,
                sort:           View.Filter.sort,
            };
        },
        get(id){
            var urlParam    = new URLSearchParams(window.location.search);
            return urlParam.get(id)
        }
    },
    init(){

    }
};
(() => {
    View.init();
    function init(){
        initData();
        View.Filter.page        = View.URL.get("page") ?? View.pagination.page
        View.Filter.tag         = View.URL.get("tag") ?? 0
        // View.Filter.keyword     = View.URL.get("keyword") ?? ''
        View.Filter.prices      = View.URL.get("prices") ?? $(".value-price").val()
        // View.Filter.sort        = View.URL.get("sort") ?? View.Sort.getVal()
        View.URL.setURL(View.URL.getFilterURL())
    }

    async function initData() { 
        await getBrand();
        await getData();
        await getColor();
    } 
    View.pagination.onChange((page) => { 
        View.Filter.page  = page
        View.URL.setURL(View.URL.getFilterURL())
        getData();
    })


    $(".add-to-cart-button").on("click", () => {
        View.Filter.prices = $(".value-price").val()
        View.URL.setURL(View.URL.getFilterURL())
        getData();
    })
 
    function getData(){
        Api.Product.GetAll(View.URL.getFilterURL())
            .done(res => {
                View.Product.render(res.data.data)
                View.pagination.total = res.data.count;
                View.pagination.render();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    } 
    function getBrand(){
        Api.Brand.GetAll()
            .done(res => {
                View.Brand.render(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    }
    function getColor(){
        Api.Color.GetAll()
            .done(res => {
                View.Color.render(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    }
     
    init();
})();
