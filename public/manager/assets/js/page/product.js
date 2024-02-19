const View = {
    Brand: [],
    Color: [],
    table: {
        __generateDTRow(data){ 
            return [
                `<div class="id-order">${data.id}</div>`,
                data.name, 
                `<img src="/${data.images.split(",")[0]}" style="width:100px" alt="">`,  
                data.prices + "$", 
                `<div class="view-data tab-action" atr="Edit" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-edit"></i></div>
                <div class="view-data tab-action" atr="Delete" style="cursor: pointer" data-id="${data.id}"><i class="anticon anticon-delete"></i></div>`
            ]
        },
        init(){
            var row_table = [ 
                { title: 'ID', name: 'id', orderable: true, width: '10%', },
                { title: 'Name', name: 'name', orderable: true, },  
                { title: 'Image', name: 'image', orderable: true, },  
                { title: 'Prices', name: 'image', orderable: true, },  
                { title: 'Action', name: 'action', orderable: true, width: '10%', },
            ];
            IndexView.table.init("#data-table", row_table);
        }
    },   
    Layout: {
        FormCreate: "",
        FormUpdate: "",
        FormDelete: "",
        init(){
            View.Layout.FormCreate = $(".layout-tab-create").html();
            View.Layout.FormUpdate = $(".layout-tab-create").html();
            View.Layout.FormDelete = $(".layout-tab-delete").html();
            $(".layout-tab-create").remove();
            $(".layout-tab-delete").remove();
        }
    },
    FullTab: {  
        Create: { 
            setVal(resource){ 
                console.log(View.Brand);
                View.Brand.map(v => $(".data-brand").append(`<option value="${v.id}">${v.name}</option>`))
                View.Color.map((v, k) => $(".data-color")
                    .append(`<div class="checkbox"> 
                                <input id="checkbox${k}" type="checkbox" name="color-list" value="${v.id}"> 
                                <label for="checkbox${k}">${v.name}</label> 
                                <span style="background-color: ${v.hex}; width: 10px; height: 10px; display: inline-block"></span>
                            </div>`
                        )
                    )
            },
            getVal(resource){ 
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
                const noTag = /(<([^>]+)>)/ig;
                const noScript = /(<\s*script[^>]*>(.*?)<\s*\/\s*script>)/ig;

                var data_name           = $(`${resource}`).find('.data-name').val().replace(noTag, "");  
                var data_description    = $(`${resource}`).find('.data-description').val();  
                var data_images         = $(`${resource}`).find(".image-list")[0].files; 
                var data_brand    = $(`${resource}`).find('.data-brand').val();  
                var data_gender    = $(`${resource}`).find('.data-gender').val();  
                var data_prices    = $(`${resource}`).find('.data-prices').val(); 
                var data_color    = []
                $(`${resource}`).find('[name=color-list]:checked').val();
                $('[name=color-list]').each(function() {
                   if ($(this).is(":checked")) {
                       data_color.push($(this).val());
                   }
                }); 

                // --Required Value 
                if (data_name == '') { required_data.push('Name valid.'); onPushData = false }   

                if (onPushData) { 
                    fd.append('data_name', data_name);
                    fd.append('data_description', data_description);  
                    fd.append('image_list_length', data_images.length);
                    for (var i = 0; i < data_images.length; i++) {
                        fd.append('image_list_item_'+i, data_images[i]);
                    } 
                    fd.append('data_brand', data_brand);  
                    fd.append('data_gender', data_gender);  
                    fd.append('data_prices', data_prices);  
                    fd.append('data_color', JSON.stringify(data_color));  

                    return fd;
                }else{
                    $(`${resource}`).find('.error-log .js-errors').remove();
                    var required_noti = ``;
                    for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                    $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                    return false;
                }
            }, 
            init(name){
                $(`[data-tab-name=${name}]`).html(View.Layout.FormCreate) 
            }
        },
        Update: { 
            setVal(resource, data){
                $(`${resource}`).find('.data-id').val(data.id);
                $(`${resource}`).find('.data-name').val(data.name);
                $(`${resource}`).find('.image-preview').css({
                    'background-image': `url('/${data.image ?? 'icon/noimage.png'}')`
                })
                $(`${resource}`).find('.data-description').val(data.description);
            },
            getVal(resource){ 
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
                const noTag = /(<([^>]+)>)/ig;
                const noScript = /(<\s*script[^>]*>(.*?)<\s*\/\s*script>)/ig;

                var data_id             = $(`${resource}`).find('.data-id').val().replaceAll(noTag, "");
                var data_name           = $(`${resource}`).find('.data-name').val().replace(noTag, "");  
                var data_image          = $(`${resource}`).find('.data-image')[0].files;
                var data_description    = $(`${resource}`).find('.data-description').val();  

                // --Required Value 
                if (data_name == '') { required_data.push('Name valid.'); onPushData = false }   

                if (onPushData) {
                    fd.append('data_id', data_id); 
                    fd.append('data_image', data_image[0] ?? "null");
                    fd.append('data_name', data_name);
                    fd.append('data_description', data_description);  

                    return fd;
                }else{
                    $(`${resource}`).find('.error-log .js-errors').remove();
                    var required_noti = ``;
                    for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                    $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                    return false;
                }
            },
            init(name){
                $(`[data-tab-name=${name}]`).html(View.Layout.FormCreate) 
            }
        },
        Delete: {
            setVal(resource, id){
                $(resource).find('.data-id').val(id)
            },
            getVal(resource){ 
                $(resource).find('.data-id').val()
            },
            init(name){
                $(`[data-tab-name=${name}]`).html(View.Layout.FormDelete)
            }
        },
        onPush(name, resource, callback){ 
            $(document).on('click', `${resource} .full-tab-action`, function() {
                $(this).attr('atr').trim()
                if($(this).attr('atr').trim() == name) {
                    callback();
                }
            }); 
        },
        default(name){
            $(`[data-tab-name=${name}]`).html("");
        },
        doShow(name){
            $(".data-custom-tab").removeClass("on-show");
            $(`.data-custom-tab[data-tab-name=${name}]`).addClass("on-show"); 
        }, 
        onShow(name, callback){
            $(document).on('click', `.tab-action`, function() {
                if($(this).attr('atr').trim() == name) {
                    var id = $(this).attr("data-id");
                    callback(id);
                }
            });
        },
    },
    init(){
        View.Layout.init();
        View.table.init(); 
    }
};
(() => {
    View.init();
    function init(){
        initData();
    }

    async function initData() {
        await getColor();
        await getBrand();
        await getData();
    }
    // Table
    View.FullTab.onShow("Table", () => {
        View.FullTab.doShow("Table");
        View.FullTab.default("Create");
        View.FullTab.default("Update");
        View.FullTab.default("Delete");
        getData();
    })
 
    // Create
    View.FullTab.onShow("Create", () => {
        View.FullTab.doShow("Create");
        View.FullTab.Create.init("Create");
        View.FullTab.Create.setVal("Create");
    })
    View.FullTab.onPush("Confirm", "#popup-create", () => { 
        var fd = View.FullTab.Create.getVal("#popup-create");
        if (fd) {
            View.FullTab.doShow("Table");
            View.FullTab.default();
            IndexView.helper.showToastProcessing('Process', 'Processing');
            Api.Product.Store(fd)
                .done(res => { 
                    IndexView.helper.showToastSuccess('Success', 'Success');
                    getData();
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
                .always(() => { });
        }
    })

    // Update
    View.FullTab.onShow("Edit", (id) => {
        View.FullTab.doShow("Update");
        View.FullTab.Update.init("Update");
        IndexView.helper.showToastProcessing('Process', 'Processing');
        Api.Product.getOne(id)
            .done(res => { 
                View.FullTab.Update.setVal("#popup-update", res.data)
                IndexView.helper.showToastSuccess('Success', 'Processing'); 
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    })
    View.FullTab.onPush("Confirm", "#popup-update", () => { 
        var fd = View.FullTab.Update.getVal("#popup-update");
        if (fd) {
            View.FullTab.doShow("Table");
            View.FullTab.default();
            IndexView.helper.showToastProcessing('Process', 'Processing');
            Api.Product.Update(fd)
                .done(res => { 
                    IndexView.helper.showToastSuccess('Success', 'Success');
                    getData();
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
                .always(() => { });
        }
    })

    // Delete
    View.FullTab.onShow("Delete", (id) => {
        View.FullTab.doShow("Delete");
        View.FullTab.Delete.init("Delete"); 
        View.FullTab.Delete.setVal("#popup-delete", id)
    })
    View.FullTab.onPush("Delete", "#popup-delete", () => {
        View.FullTab.doShow("Table");
        View.FullTab.default();
        IndexView.helper.showToastProcessing('Process', 'Processing');
        Api.Product.Delete($("#popup-delete").find('.data-id').val())
            .done(res => { 
                IndexView.helper.showToastSuccess('Success', 'Success');
                getData();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    })

 
    function getData(){
        Api.Product.GetAll()
            .done(res => {
                IndexView.table.clearRows();
                Object.values(res.data).map(v => {
                    IndexView.table.insertRow(View.table.__generateDTRow(v));
                    IndexView.table.render();
                })
                IndexView.table.render();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    }
    function getColor(){
        Api.Color.GetAll()
            .done(res => {
                View.Color = res.data
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
    }
    function getBrand(){
        Api.Brand.GetAll()
            .done(res => {
                View.Brand = res.data
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Error'); })
            .always(() => { });
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
    init();
})();
