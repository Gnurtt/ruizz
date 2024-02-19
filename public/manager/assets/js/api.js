const Api = {
    Color: {},  
    Brand: {},  
    Product: {},  
    Order: {},
    Warehouse: {},
    Statistic: {},
    Blog: {},



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



//Color
(() => {
    Api.Color.GetAll = () => $.ajax({
        url: `/apip/color/get`,
        method: 'GET',
    }); 
    Api.Color.Store = (data) => $.ajax({
        url: `/apip/color/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Color.getOne = (id) => $.ajax({
        url: `/apip/color/get-one/${id}`,
        method: 'GET',
    });
    Api.Color.Update = (data) => $.ajax({
        url: `/apip/color/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Color.Delete = (id) => $.ajax({
        url: `/apip/color/delete/${id}`,
        method: 'GET',
    });
})(); 
 
//Brand
(() => {
    Api.Brand.GetAll = () => $.ajax({
        url: `/apip/brand/get`,
        method: 'GET',
    }); 
    Api.Brand.Store = (data) => $.ajax({
        url: `/apip/brand/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Brand.getOne = (id) => $.ajax({
        url: `/apip/brand/get-one/${id}`,
        method: 'GET',
    });
    Api.Brand.Update = (data) => $.ajax({
        url: `/apip/brand/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Brand.Delete = (id) => $.ajax({
        url: `/apip/brand/delete/${id}`,
        method: 'GET',
    });
})(); 
 
//Blog
(() => {
    Api.Blog.GetAll = () => $.ajax({
        url: `/apip/blog/get`,
        method: 'GET',
    }); 
    Api.Blog.Store = (data) => $.ajax({
        url: `/apip/blog/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Blog.getOne = (id) => $.ajax({
        url: `/apip/blog/get-one/${id}`,
        method: 'GET',
    });
    Api.Blog.Update = (data) => $.ajax({
        url: `/apip/blog/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Blog.Delete = (id) => $.ajax({
        url: `/apip/blog/delete/${id}`,
        method: 'GET',
    });
})(); 

//Product
(() => {
    Api.Product.GetAll = () => $.ajax({
        url: `/apip/product/get-all`,
        method: 'GET',
    }); 
    Api.Product.Store = (data) => $.ajax({
        url: `/apip/product/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Product.getOne = (id) => $.ajax({
        url: `/apip/product/get-one/${id}`,
        method: 'GET',
    });
    Api.Product.Update = (data) => $.ajax({
        url: `/apip/product/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Product.Delete = (id) => $.ajax({
        url: `/apip/product/delete/${id}`,
        method: 'GET',
    });
})(); 


//Category
(() => {
    Api.Category.GetAll = () => $.ajax({
        url: `/apip/category/get`,
        method: 'GET',
    }); 
    Api.Category.Store = (data) => $.ajax({
        url: `/apip/category/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Category.getOne = (id) => $.ajax({
        url: `/apip/category/get-one/${id}`,
        method: 'GET',
    });
    Api.Category.Update = (data) => $.ajax({
        url: `/apip/category/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Category.Delete = (id) => $.ajax({
        url: `/apip/category/delete/${id}`,
        method: 'GET',
    });
})(); 

//Size
(() => {
    Api.Size.GetAll = () => $.ajax({
        url: `/apip/size/get`,
        method: 'GET',
    }); 
    Api.Size.Store = (data) => $.ajax({
        url: `/apip/size/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Size.getOne = (id) => $.ajax({
        url: `/apip/size/get-one/${id}`,
        method: 'GET',
    });
    Api.Size.Update = (data) => $.ajax({
        url: `/apip/size/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Size.Delete = (id) => $.ajax({
        url: `/apip/size/delete/${id}`,
        method: 'GET',
    });
})(); 


//Order
(() => {
    Api.Order.GetAll = (id) => $.ajax({
        url: `/apip/order/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    });
    Api.Order.GetOne = (id) => $.ajax({
        url: `/apip/order/get-one`,
        method: 'GET',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    });
    Api.Order.Update = (data) => $.ajax({
        url: `/apip/order/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();


// Warehouse
(() => {
    Api.Warehouse.GetDataItem = () => $.ajax({
        url: `/apip/warehouse/get-item`,
        method: 'GET',
    });
    Api.Warehouse.GetDataHistory = () => $.ajax({
        url: `/apip/warehouse/get-history`,
        method: 'GET',
    }); 
    Api.Warehouse.Store = (data) => $.ajax({
        url: `/apip/warehouse/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Warehouse.getOne = (id) => $.ajax({
        url: `/apip/warehouse/get-ware-one/${id}`,
        method: 'GET',
    });
})();

// Statistic
(() => {
    Api.Statistic.getTotal = () => $.ajax({
        url: `/apip/statistic/get-total`,
        method: 'GET',
    });
    Api.Statistic.getBestSale = () => $.ajax({
        url: `/apip/statistic/get-best-sale`,
        method: 'GET',
    });
    Api.Statistic.getCustomerBuy = () => $.ajax({
        url: `/apip/statistic/get-customer`,
        method: 'GET',
    });
    Api.Statistic.getMonth = () => $.ajax({
        url: `/apip/statistic/get-month`,
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
