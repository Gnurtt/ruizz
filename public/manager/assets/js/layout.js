const IndexView = {
    table: {
        __table: null,
        __paginationList: [10, 20, 50, 100],
        __selected: [],
        insertRow(data) {
            this.__table.row.add(data);
        },
        clearRows() {
            this.__table.clear();
        },
        onSwitch(callback){
            $(document).on('click', '.switch', function() {
                callback($(this));
            });
        },
        render() {
            this.__table.draw();
        },
        formatNumber(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        },
        onFilter(callback){
            $(document).on('change', '.table-select.category-filter', function() {
                callback($(this).val());
            });
        },
        init(table, column) {
            this.__table    = $(table).DataTable({
                colReorder: true,
                // fixedHeader: true,
                columns: column,
                pageLength: 10,
                lengthChange: true,
                searching: true,
                paging: true,
                autoWidth: false,
                order: [],
                "language": {
                    "emptyTable": `<img class="" style="width: 50%" src="/manager/images_global/artboard_empty.jpeg" alt="Logo">`
                }
            });
        }
    },
    textCount: {
        defaul(data, returnTo, textMax){
            data_length = $(data).val().length;
            $(returnTo).html(`( ${data_length} / ${textMax} )`)
        },
        render(resource, data, returnTo, textMax){
            if (data.length > textMax) {
                var data_new = data.slice(0, textMax)
                $(resource).val(data_new)
                data = data_new.length
            }
            data_length = data_new ? data_new.length : data.length;
            $(returnTo).html(`( ${data_length} / ${textMax} )`)
        },
        init(resource, returnTo, textMax){
            $(resource).val('')
            IndexView.textCount.render(resource, '', returnTo, textMax)
            $(resource).keyup(function(e){
                IndexView.textCount.render(resource, $(this).val(), returnTo, textMax)
            });
            $(resource).keypress(function(){
                IndexView.textCount.render(resource, $(this).val(), returnTo, textMax)
            });
        }
    },
    image: {
        init(){
            $('.image-input').val('')
            $(document).on('change', '.image-input', function(e) {
                var father = $(this).parent().parent()
                if(this.files[0].size > 5242880){
                   alert("File quá lớn, dung lượng upload tối đa 5 MB!");
                }else{
                    var img = new Image;
                    img.src = URL.createObjectURL(e.target.files[0]);
                    img.onload = function() {
                        father.find('.form-preview').css({
                            'background-image' : `url('${URL.createObjectURL(e.target.files[0])}')`
                        })
                    }
                }
            });
        }
    },
    helper: {
        layout(status_value, message){
            var class_name = ["notification-error", "notification-processing", "notification-success"];
            var alert_name = ["alert-danger", "alert-primary", "alert-success"];
            var alert_icon = ['<i class="anticon anticon-check-o"></i>', '<i class="anticon anticon-loading"></i>', '<i class="anticon anticon-check-o"></i>'];
            return `<div class="notification ${class_name[status_value]} ${alert_name[status_value]} ">
                        <div class="d-flex align-items-center justify-content-start">
                            <span class="alert-icon">${alert_icon[status_value]}</span>
                            <span>${message}</span>
                        </div>
                    </div>`
        },
        showToastSuccess(title, message) {
            $('#notification-sending').html('');
            $('#notification-success').append(IndexView.helper.layout(2, message))
            setTimeout(function () {
                $('#notification-success .notification:first-child').remove();
            }, 2000);
        },
        showToastError(title, message) {
            $('#notification-sending').html('');
            $('#notification-error').append(IndexView.helper.layout(0, message))
            setTimeout(function () {
                $('#notification-error .notification:first-child').remove();
            }, 2000);
        },
        showToastProcessing(title, message) {
            $('#notification-success').html('');
            $('#notification-error').html('');
            $('#notification-sending').append(IndexView.helper.layout(1, message))
        },
    },
    multiImage: {
        setVal(data){
            $('.form-preview.multi-upload').find('.onload-upload').remove();
            data.split(",").map(v => {
                $('.form-preview.multi-upload').append(`
                    <div class="image-preview-wrapper onload-upload image-loader">
                        <div class="image-preview-item image-load-data" style="background-image: url('/${v}')" data-url="${v}"><div class="item-loader-remove"><i class="fas fa-times"></i></div></div>
                    </div>`); 
            })
        },
        getVal(){
            var string_data = "";
            $( ".image-loader" ).each(function( index ) {
                string_data += $( this ).find('.image-preview-item').attr('data-src') + ",";
            });
            return string_data;
        },
        init(){
            // on remove image
            $(document).on('click', '.item-loader-remove', function() {
                $(this).parent().parent().remove();
            });
            // on insert item
            $(document).on('change', '.image-list', function() {
                $('.form-preview.multi-upload').find('.prev-upload').remove();
                if (this.files) {
                    var filesAmount = this.files.length;
                    for (i = 0; i < filesAmount; i++) {
                        var reader = new FileReader();
                        reader.onload = function(event) {
                            $('.form-preview.multi-upload').append(`
                                <div class="image-preview-wrapper prev-upload">
                                    <div class="image-preview-item" style="background-image: url('${event.target.result}')">  </div>
                                </div>`); 
                        }
                        reader.readAsDataURL(this.files[i]);
                    }
                }
            });
        }
    },
    summerNote:{
        update(resource, data){
            $(resource).summernote("code", data);
        },
        init(resource, placeholder, height){
            $(document).find(resource).summernote({
                placeholder: placeholder,
                tabsize: 4,
                height: height,
                toolbar: [
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        }
    },
    SideModal: {
        onControl(name, callback){
            $(document).on('click', '.modal-control', function() {
                var id = $(this).attr('data-id');
                if($(this).attr('atr').trim() == name) {
                    callback(id);
                }
            });
        },
        launch(resource, modalTitleHTML, modalBodyHTML, modalFooterHTML){
            $(`${resource} .modal-header h5`).html(modalTitleHTML);
            $(`${resource} .modal-body`).html(modalBodyHTML);
            $(`${resource} .modal-footer .close-modal`).html(modalFooterHTML[0]);
            $(`${resource} .modal-footer .push-modal`).html(modalFooterHTML[1]);
        },
        onShow(resource){
            $(resource).modal('show');
            $(document).off('click', `${resource} .push-modal`);
        },
        onHide(resource){
            $(resource).modal('hide');
        },
        init(resource, width){
            $(document).mouseup(function(e) {
                var container = $(resource);
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $(resource).modal('hide');
                }
            });
            $(document).on('click', '.side-modal-close', function() {
                IndexView.SideModal.onHide(resource)
            });
            $(resource).css({"width": width + "px"})
        },
    }, 
    Config: {
        onNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
        isEmail(email){
            return email.match( /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ );
        },
        formatPrices(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        },
        toNoTag(string){
            return string.replace(/(<([^>]+)>)/ig, "");
        },
        toRemoveStringTag(string){
            return string.replace(/(<([^>]+)>(.*?)<\/([^>]+)>)/ig, ""); 
        },
        onPricesKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
    },
    menuSetting(){
        var menu = $('.menu-data').val().split(" | ");
        $(`.${menu[0]}`).addClass('open');
        $(`.${menu[1]}`).addClass('active');
    },
    lazyLoad(){
        $('.lazy').Lazy({
            scrollDirection: 'vertical',
            effect: 'fadeIn',
            visibleOnly: true,
            onError: function(element) {
                element.attr('src', '/images_global/image_defaul.png');
                console.log('error loading ' + element.data('src'));
            }
        });
    },
    init(){
        $(document).on('keypress', `.number-type`, function(event) {
            return IndexView.Config.onNumberKey(event);
        });
        IndexView.menuSetting();
        IndexView.lazyLoad();

        IndexView.image.init();
        IndexView.multiImage.init();
    }
};
(() => {
    IndexView.init();
    function init(){
        $(document).on('change', '.note-image-input', function() {
            var file = $(this)[0].files;
            var father = $(this).parent().parent().parent().parent().parent()
            IndexView.helper.showToastProcessing('Processing', 'Đang upload hình ảnh!');
            $.each(file, function( index, value ) {
                var fd = new FormData();
                fd.append('file', value);
                Api.Image.Create(fd)
                    .done(res => {
                        IndexView.helper.showToastSuccess('Success', 'Upload thành công !');
                        $('.note-placeholder').css({
                            "display" : "none"
                        })
                        father.find('.note-editable').append(`<img src="/${res.data}" alt="">`)
                    })
                    .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                    .always(() => { });
            });
            
        });

        $(document).on('keyup', '.input-type-preview', function() {
            var value_text  = $(this).val();
            var output      = $(this).attr("data-input");
            $(`[data-output=${output}]`).text(value_text)
        });
    }
    
    init();
})();