const Api = {
    Auth: {},
    Color: {},  
    Brand: {},  
    Product: {},  
    Order: {},
    Blog: {},
    Comment: {},



    Category: {},  
    Size: {},  

    Image: {},
    
};
(() => {
    $.ajaxSetup({
        headers: { 
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        crossDomain: true
    });
})();



//Auth
(() => {
    Api.Auth.Register = (data) => $.ajax({
        url: `/customer/apip/auth/register`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Login = (data) => $.ajax({
        url: `/customer/apip/auth/login`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Forgot = (data) => $.ajax({
        url: `/customer/apip/auth/forgot`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Reset = (data) => $.ajax({
        url: `/customer/apip/auth/reset`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Code = () => $.ajax({
        url: `/customer/apip/auth/code`,
        method: 'POST',
        contentType: false,
        processData: false,
    });
    Api.Auth.Change = (data) => $.ajax({
        url: `/customer/apip/auth/change`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Update = (data) => $.ajax({
        url: `/customer/apip/auth/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.GetProfile = (id) => $.ajax({
        url: `/customer/apip/auth/get-profile`,
        method: 'GET',
    });

})();

//Comment
(() => {
    Api.Comment.GetAll = (id) => $.ajax({
        url: `/customer/apip/comment/get/${id}`,
        method: 'GET',
    });
    Api.Comment.Create = (data) => $.ajax({
        url: `/customer/apip/comment/create`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    }); 
})();


//Color
(() => {
    Api.Color.GetAll = () => $.ajax({
        url: `/customer/apip/color/get`,
        method: 'GET',
    }); 
})(); 
 
//Brand
(() => {
    Api.Brand.GetAll = () => $.ajax({
        url: `/customer/apip/brand/get`,
        method: 'GET',
    }); 
})(); 
 
//Brand
(() => {
    Api.Blog.GetAll = () => $.ajax({
        url: `/customer/apip/blog/get`,
        method: 'GET',
    }); 
})(); 

//Product
(() => {
    Api.Product.GetAll = (filter) => $.ajax({
        url: `/apip/product/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            keyword: filter.keyword ?? '',
            tag: filter.tag ?? '',
            page: filter.page ?? '', 
            prices: filter.prices ?? '',
            sort: filter.sort ?? '', 
        }
    }); 
    Api.Product.GetAllNew = () => $.ajax({
        url: `/apip/product/get-all-new`,
        method: 'GET',
    }); 
    Api.Product.getOne = (id) => $.ajax({
        url: `/apip/product/get-one/${id}`,
        method: 'GET',
    });
    Api.Product.getBestSale = () => $.ajax({
        url: `/customer/apip/product/get-best-sale`,
        method: 'GET',
    });
    Api.Product.GetSearch = (data) => $.ajax({
        url: `/customer/apip/product/get-search`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Product.GetRelated = (id) => $.ajax({
        url: `/customer/apip/product/get-related/${id}`,
        method: 'GET',
    });
})(); 


//Category
(() => {
    Api.Category.GetAll = () => $.ajax({
        url: `/customer/apip/category/get`,
        method: 'GET',
    }); 
})(); 


// Order
(() => {
    Api.Order.Checkout = (data) => $.ajax({
        url: `/customer/apip/order/checkout`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Order.GetOrder = () => $.ajax({
        url: `/customer/apip/order/get`,
        method: 'GET',
    });
})();


// Image
(() => {
    Api.Image.Create = (data) => $.ajax({
        url: `/apip/post-image`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();
