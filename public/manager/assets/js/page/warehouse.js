const View = {
    product: [],
    tableData: {
        __generateDTRow(data){
            return [
                data.product_id,
                data.name,
                data.quantity,
                data.reserve,
                data.prices + ` $`,
            ]
        },
        init(){
            var row_table = [
                    {
                        title: 'ID',
                        name: 'name',
                        orderable: true,
                        width: '5%',
                    },
                    {
                        title: 'Tên sản phẩm',
                        name: 'name',
                        orderable: true,
                    },
                    {
                        title: 'Tổng số lượng',
                        name: 'name',
                        orderable: true,
                    },
                    {
                        title: 'Đang chờ xử lí',
                        name: 'name',
                        orderable: true,
                    },
                    {
                        title: 'Giá bán lẻ',
                        name: 'name',
                        orderable: true,
                    }, 
                ];
            IndexView.table.init("#data-table", row_table);
        }
    },
    tableHistory: {
        __generateDTRow(data){
            var total_price = 0 ;
            data.history_detail.map(v => {
                total_price += v.prices * v.quantity;
            })

            return [
                data.history.id,
                data.history.email,
                IndexView.table.formatNumber(total_price) + ` $`,
                data.history.created_at,
                `<span class="badge badge-pill badge-${data.history.history_status == 1 ? "green" : "red"} m-r-5 m-b-5">${data.history.history_status == 1 ? "Nhập kho" : "Xuất kho"}</span>`,
                `<div class="view-data modal-fs-control" style="cursor: pointer" atr="View" data-id="${data.history.id}"><i class="anticon anticon-eye"></i></div>`
            ]
        },
        init(){
            var row_table = [
                    {
                        title: 'ID',
                        name: 'name',
                        orderable: true,
                        width: '5%',
                    },
                    {
                        title: 'Admin',
                        name: 'name',
                        orderable: true,
                    },
                    {
                        title: 'Tổng giá trị',
                        name: 'name',
                        orderable: true,
                    },
                    {
                        title: 'Thời gian',
                        name: 'icon',
                        orderable: true,
                    },
                    {
                        title: 'Thao tác',
                        name: 'icon',
                        orderable: true,
                    },
                    {
                        title: 'Hành động',
                        name: 'Action',
                        orderable: true,
                        width: '10%',
                    },
                ];
            IndexView.table.init("#data-table", row_table);
        }
    },
    TabData: {
        onChange(name, callback){
            $(document).on('click', `.status-event`, function() {
                $(".status-event").removeClass("is-select");
                $(this).addClass("is-select");
                if($(this).attr('atr').trim() == name) {
                    $(".data-table-wrapper").find("#data-table_wrapper").remove()
                    $(".data-table-wrapper").append(`<table id="data-table" class="table"> </table>`)
                    callback();
                }
            });
        },
    },
    Item: {
        getVal(resource){
            var data_return = [];
            var list_classify = $( `${resource} .item-product` );
            list_classify.each(function( index ) {
                var type_item       = {};
                type_item.item      = $(this).find(".data-item").val()
                type_item.quantity  = $(this).find(".data-quantity").val() 
                type_item.price     = $(this).find(".data-price").val() 
                if (type_item.quantity) data_return.push(type_item)
            });
            return JSON.stringify(Object.assign({}, data_return));
        },
        Create(resource){
            $(`${resource} .item-list`).append(`
                <div class="item-product row m-b-10">
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <select name="" class="form-control category-list data-item">
                            ${View.product.map(v => {
                                return `<option value="${v.id}">${v.id}-${v.name}</option>`
                            }).join("")}
                        </select>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <input type="text" class="number-type form-control data-quantity" placeholder="Số lượng">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                        <input type="text" class="number-type form-control data-price" placeholder="Đơn giá">
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
                        <button class="btn btn-danger item-remove" atr="Item Delete"><i class="fas fa-times"></i></button>
                    </div>
                </div>
            `);
        },
        onCreate(resource, name){
            $(document).on('click', `${resource} .item-create`, function() {
                if($(this).attr('atr').trim() == name) {
                    View.Item.Create(resource);
                }
            });
        },
        onRemove(resource, name){
            $(document).on('click', `${resource} .item-remove`, function() {
                if($(this).attr('atr').trim() == name) {
                    $(this).parent().parent().remove();
                }
            });
        },
        clear(resource){
            $(`${resource} .item-list`).find('.item-product').remove()
        }
    },
    modals: {
        onControl(name, callback){
            $(document).on('click', '.modal-fs-control', function() {
                var id = $(this).attr('data-id');
                if($(this).attr('atr').trim() == name) {
                    callback(id);
                }
            });
        },
        onClose(){
            $(document).on('click', '.modal-close', function() {
                $('.modal-fullscreen').removeClass('show');
                $('body').removeClass('modal-fs-open');
            });
            $(document).on('click', '.close-modal', function() {
                $('.modal-fullscreen').removeClass('show');
                $('body').removeClass('modal-fs-open');
            });
            $(document).mouseup(function(e) {
                var container = $(".fs-body");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $('.modal-fullscreen').removeClass('show');
                    $('body').removeClass('modal-fs-open');
                }
            });
        },
        launch(resource, modalTitleHTML, modalBodyHTML, modalFooterHTML){
            $(`${resource} .fs-title .modal-title`).html(modalTitleHTML);
            $(`${resource} .fs-content .fs-content-wrapper`).html(modalBodyHTML);
            $(`${resource} .fs-footer .close-modal`).html(modalFooterHTML[0]);
            $(`${resource} .fs-footer .push-modal`).html(modalFooterHTML[1]);
        },
        onShow(resource){
            $(resource).addClass('show');
            $('body').addClass('modal-fs-open');
            $(document).off('click', `${resource} .push-modal`);
        },
        onHide(resource){
            $(resource).removeClass('show');
            $('body').removeClass('modal-fs-open');
        },
        Create: {
            resource: '#create-modal',
            setDefaul(){ this.init();  },
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                // --get Value
                var data_metadata       = View.Item.getVal(resource);

                if (onPushData) { 
                    fd.append('data_metadata', data_metadata);
                    return fd;
                }else{
                    $(`${resource}`).find('.error-log .js-errors').remove();
                    var required_noti = ``;
                    for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                    $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${this.resource} .push-modal`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = View.modals.Create.getVal();
                        if (data) callback(data);
                    }
                });
            },
            init() {
                var modalTitleHTML  = `Tạo mới`;
                var modalBodyHTML   = Template.Warehouse.Create();
                var modalFooterHTML = ['Đóng', 'Nhập kho'];

                $(document).off('click', `${View.modals.Create.resource} .item-create`);
                $(document).off('click', `${View.modals.Create.resource} .item-remove`);

                View.Item.onCreate(View.modals.Create.resource, "Item Create");
                View.Item.onRemove(View.modals.Create.resource, "Item Delete");

                View.modals.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML);
            }
        },
        Update: {
            resource: '#update-modal',
            setVal(data){
                $(".sub-warehouse tbody tr").remove()
                data.map(v => {
                    $(".sub-warehouse tbody")
                        .append(`<tr>
                            <td>${v.name}</td>
                            <td>${IndexView.table.formatNumber(v.quantity)}</td>
                            <td>${IndexView.table.formatNumber(v.prices)} $</td>
                            <td>${IndexView.table.formatNumber(v.quantity * v.prices)} $</td>
                          </tr>`)
                })
            },
            init() {
                var modalTitleHTML = `Thông tin chi tiết`;
                var modalBodyHTML  = Template.Warehouse.Update();
                var modalFooterHTML = ['Đóng', 'Cập nhật'];
                View.modals.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML); 
            }
        },
        init() {
            this.onClose();
            this.Create.init();
            this.Update.init();
        }
    },
    init(){
        View.tableHistory.init();
        View.modals.init();
    }
};
(() => {
    View.init();

    
    View.modals.onControl("Create", () => {
        var resource = View.modals.Create.resource;
        View.modals.onShow(resource);
        View.modals.Create.onPush("Push", (fd) => {
            IndexView.helper.showToastProcessing('Processing', 'Đang tạo!');
            Api.Warehouse.Store(fd)
                .done(res => {
                    IndexView.helper.showToastSuccess('Success', 'Tạo thành công !');
                    getHistory();
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
            View.modals.onHide(resource)
            View.modals.Create.setDefaul();
        })
    })

    View.modals.onControl("View", (id) => {
        var resource = View.modals.Update.resource;  
        View.modals.onShow(resource);
        Api.Warehouse.getOne(id)
            .done(res => {
                View.modals.Update.setVal(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { }); 
    })

    function init(){
        getHistory();
        getProduct();
    }

    View.TabData.onChange("Item", () => {
        View.tableData.init();
        getData()
    })
    View.TabData.onChange("History", () => {
        View.tableHistory.init();
        getHistory()
    })

    function getData(){
        Api.Warehouse.GetDataItem()
            .done(res => {
                IndexView.table.clearRows();
                Object.values(res.data).map(v => {
                    IndexView.table.insertRow(View.tableData.__generateDTRow(v));
                    IndexView.table.render();
                })
                IndexView.table.render();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }
    function getHistory(){
        Api.Warehouse.GetDataHistory()
            .done(res => {
                IndexView.table.clearRows();
                Object.values(res.data).map(v => {
                    IndexView.table.insertRow(View.tableHistory.__generateDTRow(v));
                    IndexView.table.render();
                })
                IndexView.table.render();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }
    function getProduct(){
        Api.Product.GetAll()
            .done(res => {
                View.product = res.data; 
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
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
