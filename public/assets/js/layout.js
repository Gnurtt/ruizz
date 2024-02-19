const IndexView = {
    Auth: {
        isLogin(){
            return $("#auth-value").val() == 1 ? true : false;
        },
        Register: {
            resource: "#signup",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_email              = $(`${resource}`).find('.data-email').val();
                var data_password           = $(`${resource}`).find('.data-password').val();
                var data_name               = $(`${resource}`).find('.data-name').val();

                if (IndexView.Config.isEmail(data_email) == null || data_email == '')  onPushData = false; 
                if (data_password == "")  onPushData = false; 
                if (data_name == "")  onPushData = false;

                if (onPushData) {
                    fd.append('data_email', data_email);
                    fd.append('data_password', data_password); 
                    fd.append('data_name', data_name);
                    return fd;
                }else{ 
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${resource} .form-submit`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = IndexView.Auth.Register.getVal();
                        if (data) callback(data); 
                    }
                });
            },
            init(){
                $(document).on('keypress', `.data-phone`, function(event) {
                    return IndexView.Config.onNumberKey(event);
                });
            }
        },
        Login: {
            resource: "#login",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_email              = $(`${resource}`).find('.data-email').val();
                var data_password           = $(`${resource}`).find('.data-password').val(); 

                if (IndexView.Config.isEmail(data_email) == null || data_email == '')  onPushData = false; 
                if (data_password == "")  onPushData = false; 

                if (onPushData) {
                    fd.append('data_email', data_email);
                    fd.append('data_password', data_password);  
                    return fd;
                }else{ 
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${resource} .form-submit`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = IndexView.Auth.Login.getVal();
                        if (data) callback(data); 
                    }
                });
            },
            init(){
                $(document).on('keypress', `.data-phone`, function(event) {
                    return IndexView.Config.onNumberKey(event);
                });
            }
        },
        Forgot: {
            resource: "#forgotPassword",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_email              = $(`${resource}`).find('.data-email').val();

                if (IndexView.Config.isEmail(data_email) == null || data_email == '')  onPushData = false; 

                if (onPushData) {
                    fd.append('data_email', data_email);
                    return fd;
                }else{ 
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${resource} .form-submit`, function() {
                    if($(this).attr('atr').trim() == name) {
                        $(this).text("Sending the code ....")
                        var data = IndexView.Auth.Forgot.getVal();
                        if (data) callback(data); 
                    }
                });
            },
        },
        Reset: {
            resource: "#forgotPassword",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
                var data_email              = $(`${resource}`).find('.data-email').val(); 
                var data_password              = $(`${resource}`).find('.data-password').val();
                var data_code              = $(`${resource}`).find('.data-code').val();
                if (IndexView.Config.isEmail(data_email) == null || data_email == '')  onPushData = false;  
                if (data_password == "")  onPushData = false; 
                if (data_code == "")  onPushData = false; 

                if (onPushData) {
                    fd.append('data_email', data_email); 
                    fd.append('data_password', data_password); 
                    fd.append('data_code', data_code); 
                    return fd;
                }else{ 
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${resource} .form-submit`, function() {
                    if($(this).attr('atr').trim() == name) {
                        $(this).text("Updating ....")
                        var data = IndexView.Auth.Reset.getVal();
                        if (data) callback(data); 
                    }
                });
            },
        },
        response: { 
            success(message){
                $(".js-validate .js-response").remove();
                $(".js-validate").prepend(`<div class="js-response js-success"><li>${message}</li></div>`)
            },
            error(message){
                $(".js-validate .js-response").remove();
                $(".js-validate").prepend(`<div class="js-response js-errors"><li>${message}</li></div>`)
            },                  
        },
        init(){
            IndexView.Auth.Register.init()
        }
    },
    Cart: {
        add_to_card(name, callback){
            $(document).on('click', `.action-add-to-card`, function() {
                if($(this).attr('atr').trim() == name) {
                    $(this).text("Added");
                    callback($(this));
                }
            });
        },
        update(){
            var card_data = localStorage.getItem("ruiz-cart")
            var count = (card_data == null || card_data == "") ? 0 : JSON.parse(card_data).length;
            $(".cart-count .count").html(count)
        },
        init(){ 
            var card_data = localStorage.getItem("ruiz-cart")
            if (card_data == null || card_data == "") {

            }else{
                let data_id = $(`.action-add-to-card`).attr("data-id")
                let card_json = JSON.parse(card_data)
                cart_list_id = []
                card_json.map(v => {
                    cart_list_id.push(JSON.parse(v).id)
                })
                hasId = cart_list_id.includes(data_id)
                if (hasId) $(`.action-add-to-card`).text("Added");
            }

        }
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
        isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
    },
    onSearch(callback){
        $(document).on('keyup', '.product-search-field', function() {
            $('.suggest-list .suggess-wrapper').remove()
            var data = $(this).val(); 
            var data_text      = $(this).val();
            var data_category  = $(`#category-search`).val();
            var fd = new FormData();
            fd.append('data_text', data_text);
            fd.append('data_category', data_category);
            if (data_text) callback(fd, data_text);
        });
        $(document).mouseup(function(e) {
            var container = $(".searchProduct");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.suggest-list .suggess-wrapper').remove()
            }
        });
    },
    doSearch(callback){
        $(document).on('keypress', '.product-search-field', function(e) { 
            if (e.which == 13) {
                var data_text      = $(this).val();
                var data_category  = $(`#category-search`).val();
                callback(data_text, data_category);
            }
        });
    },
    init(){
        IndexView.Cart.init()
        IndexView.Cart.update()
    }
};
(() => {
    IndexView.init(); 
    function init(){

    }
    async function redirect_logined(url) {
        await delay(2000);
        window.location.replace(url);
    }
    function delay(delayInms) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve(2);
            }, delayInms);
        });
    }
    
    IndexView.Auth.Register.onPush("Register", (fd) => {
        Api.Auth.Register(fd)
            .done(res => {  
                if (res.status == 200) {
                    IndexView.Auth.response.error(res.message); 
                }else{
                    IndexView.Auth.response.success(res.message) 
                    redirect_logined(res.data)
                }
            })
            .fail(err => {   })
            .always(() => { });
    }) 
    IndexView.Auth.Login.onPush("Login", (fd) => {
        Api.Auth.Login(fd)
            .done(res => {  
                if (res.status == 500) {
                    IndexView.Auth.response.error(res.message); 
                }else{
                    IndexView.Auth.response.success(res.message) ;
                    redirect_logined(res.data)
                }
            })
            .fail(err => {   })
            .always(() => { });
    })
    IndexView.Auth.Forgot.onPush("Forgot", (fd) => { 
        Api.Auth.Forgot(fd)
            .done(res => {  
                if (res.status == 500) {
                    IndexView.Auth.response.error(res.message); 
                }else{
                    IndexView.Auth.response.success(res.message) ;
                    redirect_logined("/reset")
                }
            })
            .fail(err => {   })
            .always(() => { });
    })
    IndexView.Auth.Reset.onPush("Reset", (fd) => {
        Api.Auth.Reset(fd)
            .done(res => {  
                if (res.status == 200) {
                    IndexView.Auth.response.success(res.message)  
                    redirect_logined(res.data)
                }else{
                    IndexView.Auth.response.error(res.message); 
                }
            })
            .fail(err => {   })
            .always(() => { });
    }) 
    IndexView.onSearch((fd, text) => {
        Api.Product.GetSearch(fd).done(res => { 
            $('.suggest-list .suggess-wrapper').remove()
            $('.suggest-list')
                .append(`<div class="suggess-wrapper"></div>`)
            if (res.data.length > 0) {
                res.data.map(v => {
                    $(".suggess-wrapper").append(`
                            <div class="suggess-item">
                                <a title="${v.name}" href="/product/${v.slug }">${v.name}</a>
                                <p>${highlight(text, v.name)}</p>
                            </div>`)
                })
            }else{
                $(".suggess-wrapper").append(`<div class="suggess-item">No item</div>`)
            }
        })
    })
    IndexView.doSearch((text, category) => {
        window.location.replace(`/category?keyword=${text}&tag=${category}`);
    })
    function highlight(text, inputText) {
        var index = inputText.toLowerCase().indexOf(text.toLowerCase());
       inputText = inputText.substring(0,index) + "<span class='highlight'>" + inputText.substring(index,index+text.length) + "</span>" + inputText.substring(index + text.length);
       return inputText
        
    }
    IndexView.Cart.add_to_card("Add to card", (item) => {
        var root = $(".product-data")
        var card        = localStorage.getItem("ruiz-cart");

        var data_id     = root.find(".product-id").val();
        var data_color     = root.find(".product-color").val();
        var data_quantity     = root.find(".product-quantity").val();

        var data_json = `{"id": "${data_id}", "color": "${data_color}", "quantity": "${data_quantity}" }`
        

        if (card == null || card == ""){
            card = [];
            card.push(data_json)
            localStorage.setItem("ruiz-cart", JSON.stringify(card));  
        }else{
            let card_json = JSON.parse(card)

            cart_list_id = []
            card_json.map(v => {
                cart_list_id.push(JSON.parse(v).id)
            })
            hasId = cart_list_id.includes(data_id)
            if (!hasId) {
                card_json.push(data_json) 
                localStorage.setItem("ruiz-cart", JSON.stringify(card_json)); 
            }
        } 
        IndexView.Cart.update();
    })

    $(document).find(".show-password").on("click", function(){
        let default_pass = $(this).parent().find("input").attr("type");
        if (default_pass == "password") {
            $(this).parent().find("input").attr("type", "text")
        }else{ 
            $(this).parent().find("input").attr("type", "password")
        }
    })
    init();
})();