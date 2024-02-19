const View = {
    
    blog: {
        render(data){
            data.map(v => {
                $(".blog-list")
                    .append(`<div class="col-lg-4 col-md-6">
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
    init(){
        
    }
};
(() => {
    View.init()
    function init(){
        getAll();
    }

    function getAll(){
        Api.Blog.GetAll(View.URL.get("id"))
            .done(res => {
                View.blog.render(res.data);
            })
            .fail(err => {  })
            .always(() => { });
    } 
    init()
})();
