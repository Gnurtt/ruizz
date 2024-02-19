const View = {
	render_total(data){
		$(".data-turnover").html(`$ ${View.formatNumber(parseInt(data.turnover[0].total))}`)
		$(".data-item_sell").html(`${View.formatNumber(parseInt(data.item_sell[0].total))} `)
		$(".data-order_time").html(`${View.formatNumber(data.order_time[0].total)}  `)
		$(".data-customer_buy").html(`${View.formatNumber(data.customer_buy.length)}  `)
	},
	render_sale(data){
		data.map(v => {
            var image           = v.images.split(",")[0];
			$(".sale-list")
				.append(`<tr>
                            <td>${v.product_id}</td>
                            <td>
                                <div class="media align-items-center">
                                    <div class="avatar avatar-image rounded">
                                        <img src="/${image}" alt="">
                                    </div>
                                    <div class="m-l-10">
                                        <span>${v.name}</span>
                                    </div>
                                </div>
                            </td>
                            <td>${v.total}</td>
                            <td>${v.quantity}</td>
                        </tr>`)
		})
	},
    formatNumber(num) {
        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    },
};
(() => {
	function init(){
		get_total()
	}
	function get_total(){
		Api.Statistic.getTotal().done(res => { View.render_total(res) })
		Api.Statistic.getMonth().done(res => { console.log(res); })
		Api.Statistic.getBestSale().done(res => { View.render_sale(res) })
	}

	init();
})();