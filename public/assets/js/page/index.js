const View = {
    blog: {
        render(data){
            data.map(v => {
                $(".blog-list")
                    .append(`<div class="col-lg-4 ">
                    <div class="singel-latest-blog">
                        <div class="articles-image">
                            <a href="/blog-detail/${v.slug}">
                                <img src="/${v.banner}" alt="">
                            </a>
                        </div>
                        <div class="aritcles-content">
                            <div class="author-name">
                                posted: - ${v.created_at}
                            </div>
                            <h4><a href="/blog-detail/${v.slug}" class="articles-name">${v.title}</a></h4>
                        </div>
                    </div>
                </div>`)
            })
        }
    },
    Product: {
        render(data){
            data.map(v => {
                $(".data-list")
                    .append(`<div class="col-lg-12"> 
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
                            </div>`)
            })

            $('.product-active-lg-4').slick({
                dots: false,
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: false,
                prevArrow: '<button type="button" class="slick-prev"> <i class="fa fa-angle-left"> </i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"> </i></button>',
                responsive: [
                    {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 479,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        },
        renderNew(data){
            data.map(v => {
                $(".new-products")
                    .append(`<div class="col-lg-12">
    
                    <div class="single-product-area mt-30">
                        <div class="product-thumb">
                            <a href="/product/${v.slug}">
                                <img class="primary-image" src="/${v.images.split(",")[0]}" alt="">
                            </a>
                            <div class="label-product label_new">New</div> 
                        </div>
                        <div class="product-caption">
                            <h4 class="product-name"><a href="/product/${v.slug}">${v.name}</a></h4>
                            <div class="price-box">
                            <span class="new-price">$${v.prices}</span> 
                            </div>
                        </div>
                    </div>
                    <!-- single-product-area end -->
                </div>`)
            })
            var product_row_4 = $('.product-active-row-4');
            product_row_4.slick({
                dots: false,
                infinite: true,
                slidesToShow: 5,
                slidesToScroll: 1,
                rows: 2,
                autoplay: false,
                prevArrow: '<button type="button" class="slick-prev"> <i class="fa fa-angle-left"> </i></button>',
                nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"> </i></button>',
                responsive: [
                    {
                        breakpoint: 1199,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 991,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 767,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 479,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });  
        }
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
        await getBrand();
        await getData();
        await getBestSale();
        await getBlog();
    } 


    function getData(){
        Api.Product.GetAllNew()
            .done(res => {
                View.Product.renderNew(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    } 
    function getBestSale(){
        Api.Product.getBestSale()
            .done(res => {
                View.Product.render(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    } 
    function getBrand(){
        Api.Brand.GetAll()
            .done(res => {

            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    }

    function getBlog(){
        Api.Blog.GetAll( )
            .done(res => {
                View.blog.render(res.data);
            })
            .fail(err => {  })
            .always(() => { });
    } 
     
    init();
})();
