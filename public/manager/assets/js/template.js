const Template = { 
	Executive: {
		Create(){
			return ``
		},  
		Delete(){
			return `<div class="wrapper d-flex justify-center"><img src="/manager/images_global/funny.gif" alt=""></div>`
		}
	}, 
	
	Warehouse: {
		Create(){
			return `<div class="row warehouse-modal">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-3">
							<div class="card">
								<div class="card-body">
									<div class="item-list">

									</div>
									<button type="button" class="btn btn-success item-create" atr="Item Create">Tạo mới</button>
								</div>
							</div>
						</div>
	            	</div>`
		},
		Update(){
			return `<div class="row warehouse-modal">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-3">
							<table class="table table-bordered sub-warehouse">
							    <thead>
							      <tr>
							        <th>Tên sản phẩm</th>
							        <th>Số lượng</th>
							        <th>Đơn giá nhập</th>
							        <th>Thành tiền</th>
							      </tr>
							    </thead>
							    <tbody> 
							    </tbody>
							  </table>
						</div>
	            	</div>`
		},

	},
	Order: {
		Update(){
			return `<div class="container"> 
                        <div class="row"> 
                            <div class="col-md-8 pd-5"> 
								<table class="table table-bordered">
							    	<thead>
							      		<tr>
									        <th>Mã</th>
									        <th>Tên sản phẩm</th>
									        <th>Số lượng</th>
									        <th>Đơn giá</th>
									        <th>Thành tiền</th>
									        <th>Kho</th> 
							      		</tr>
							    	</thead>
								    <tbody class="data-list"> 
								    </tbody>
							  	</table> 
                            </div>
                            <div class="col-md-4">  
                                <ul class="list-unstyled m-t-10">
                                    <li class="row">
                                        <p class="col-sm-7 col-7 pd-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                            <span>Email: </span> 
                                        </p>
                                        <p class="col font-weight-semibold pd-5 customer-email"> </p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-7 col-7 pd-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Khách hàng: </span> 
                                        </p>
                                        <p class="col font-weight-semibold pd-5 customer-type"></p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-7 col-7 pd-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                            <span>Họ và tên: </span> 
                                        </p>
                                        <p class="col font-weight-semibold pd-5 customer-name"></p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-7 col-7 pd-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                            <span>Điện thoại: </span> 
                                        </p>
                                        <p class="col font-weight-semibold pd-5 customer-telephone"></p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-7 col-7 pd-5 font-weight-semibold text-dark m-b-15">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Địa chỉ: </span> 
                                        </p>
                                        <p class="col font-weight-semibold pd-5 customer-address"></p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-7 col-7 pd-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Tạm tính: </span> 
                                        </p>
                                        <p class="col font-weight-semibold pd-5 customer-order-price"></p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-7 col-7 pd-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Giảm giá: </span> 
                                        </p>
                                        <p class="col font-weight-semibold pd-5 customer-order-discount"></p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-7 col-7 pd-5 font-weight-semibold text-dark m-b-15">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Tổng: </span> 
                                        </p>
                                        <p class="col font-weight-semibold pd-5 customer-order-total"></p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-7 col-7 pd-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Phương thức: </span> 
                                        </p>
                                        <p class="col font-weight-semibold pd-5 customer-payment-type"></p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-7 col-7 pd-5 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Trạng thái: </span> 
                                        </p>
                                        <p class="col font-weight-semibold pd-5 customer-payment-status"></p>
                                    </li>
                                    <li class="row">
                                        <p class="col-sm-12 col-12 font-weight-semibold text-dark m-b-5">
                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                            <span>Bình luận: </span> 
                                        </p>
                                        <p class="col font-weight-semibold pd-5 customer-order-comment"></p>
                                    </li>
                                </ul> 
                            	<select name="" id="" class="form-control order-status">
                            	</select>
                            </div>
                        </div> 
                    </div>`
		}
	}
}