
<form id="order_form">
				<!-- SALESMAN SECTION -->
                <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3  box">
					<div class="row border border-light">
						
						<div class="col border "> 
							<label><strong>OPR: </strong> <input type="text" id="operador_name-input"  class="control-form input_custom" value="<?php echo $operator['first_name']." ".$operator['last_name']?>" size="20" /></label> 
							<label><strong>LOC: </strong> <input type="text" id="operador_location-input"  class="input_custom" value="<?php echo $operator['city']?>"/></label>
						</div>						
						<div class="col border text-center"> 
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<label class="btn btn-sm btn-light ">
									<input type="radio" name="options" id="option1" autocomplete="off" checked>QUOTE
								</label>
								<label class="btn btn-sm btn-light active">
									<input type="radio" name="options" id="option1" autocomplete="off" checked>ORDER
								</label>
								<label class="btn btn-sm btn-light ">
									<input type="radio" name="options" id="option1" autocomplete="off" checked> INVOICE
								</label>
								</div>
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									
								<label class="btn btn-sm btn-light ">
									<input type="radio" name="options" id="option1" autocomplete="off" checked> VERIFY CHANGE
								</label>
								<label class="btn btn-sm btn-light ">
									<input type="radio" name="options" id="option1" autocomplete="off" checked> CREDIT
								</label>
							</div>
						</div>
						<div class="col border">
							<label><strong>DATE: </strong> <input type="text" id="" name=""  class="input_custom"  value="<?php echo date('m/d/Y')?>" size="10" /> </label> 
							<label><strong>DOC#: </strong> <input type="text" id="" name=""  class="input_custom"   value="1234567890"  size="10"/></label>	
						</div>
						<div class="col border">
							<label><strong>ORD: </strong> <input type="text" class="input_custom" value="9999,000.000" size="15"/> </label> 
							<label><strong>BKO: </strong> <input type="text" class="input_custom" value="$9999,000.000" size="15"/></label>	
						</div>
						<div class="col col-2 border pt-2 text-right"> 
                            <button id="bt_save" type="button" class="btn btn-sm btn-success " ><i class="fas fa-save fa-sm"></i></button>
							<button id="bt_pending" type="button" class="btn btn-sm btn-warning " disabled><i class="far fa-hourglass fa-sm "></i></button>
							<button id="bt_cart" type="button" class="btn btn-sm btn-danger" disabled><i class="fas fa-shopping-cart fa-sm"></i></button>
							<button id="bt_out" type="button" class="btn btn-sm btn-info " ><i class="fas fa-power-off fa-sm " ></i></button>
						</div>
					</div>

				</div>

				<!-- SALESMAN SECTION -->
				<!-- CUSTOMER SECTION -->
				<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-2  box">
					<div class="row border border-light">
						<div class="col col-2 border">
                            <label><strong>SOLD TO: </strong> <input type="text" id="customer_id" name="customer_id"  class="input_custom"   value="" size="6"/><!--<span>123456</span>  -->
                            <button type="button" id="bt_model_customer" class="btn btn-success btn-sm float-right "><i class="fas fa-search fa-xs"></i></button>  
                            <button type="button" id="bt_model_detail"  class="btn btn-info btn-sm float-right mr-1"><i class="fas fa-eye fa-xs"></i></button> </label> 
							<label><input type="text" id="customer_name" name="customer_name"  class="input_custom"  size="23" /><!--<span>ABC CORPORATION</span>--> <span class="float-right">(30)</span> </label>	
						</div>
						
						<div class="col col-2 border">
                            <label><strong>SHIP TO: </strong> <input type="text" id="ship_id" name="ship_id"  class="input_custom"  size="5" />  
                            <button type="button" id="bt_model_ship" class="btn btn-success btn-sm float-right"><i class="fas fa-search fa-xs"></i></button> </label> 
							<label><strong>P/O NUM: </strong><input type="text" id="ship_customer_name" name="ship_customer_name"  class="input_custom"  size="15" /></label>	
						</div>
						<div class="col border"> 
                            <label><strong>SALS: </strong> <input type="text" id="salesman_id" name="salesman_id"  class="input_custom"  size="5" /><!-- <span>123</span> -->
                            <button type="button" id="bt_model_sales" class="btn btn-info btn-sm float-right"><i class="fas fa-search fa-xs"></i></button> </label> 
							<label><input type="text" id="salesman_name" name="salesman_name"  class="input_custom"  size="25" /> <!-- <span>PEDRO RODRIGUEZ</span> --> </label>
						</div>
						<div class="col col-3 border">
							<label><strong>ORDER BY: </strong> <input type="text" class="input_custom" value="PEDRO MARTINEZ" size="20"/> <span></span> </label> 
							<label><strong>P/O NUM: </strong>  <input type="text" class="input_custom" value="12345678901234567890" size="20"/> <span></span></label>	
						</div>

						

						<div class="col  border">
                            <label><strong>SHIP VIA: </strong>  <input type="text" id="ship_via_id" name="ship_via_id"  class="input_custom"  size="5" /> <!--<span>123456</span>--> 
                            <button type="button"  id="bt_model_ship_via" class="btn btn-success btn-sm float-right"><i class="fas fa-search fa-xs"></i></button> </label> 
							<label><input type="text"  name="ship_via_description"  class="ship_via_description" class="input_custom" value="FEDEX NEXT DAY 10AM" size="20"/> <!--<span>FEDEX NEXT DAY 10AM</span> --></label>	
						</div>
						<div class="col  border">
                            <label><strong>TERMS: </strong><input type="text" id="term_id" name="term_id" class="input_custom" value="" size="6"/> 
                            <button type="button" id="bt_model_terms" class="btn btn-success btn-sm float-right"><i class="fas fa-search fa-xs"></i></button> </label> 
							<label> <input type="text"  id="term_description" name="term_description" class="input_custom" value="" size="20"/> <!-- span>NET 30 2% 10 DAYS</span> --></label>	
						</div>

					</div>
				</div>
				<!-- CUSTOMER SECTION -->


				<!-- PRODUCT SECTION -->
				<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-2 border-bottom box">
					<div class="row border border-light">
						<div class="col col-2 border">
							<label>
								<strong> ITEM NUMBER:</strong> 
								<button  id="bt_model_search_product" class="btn btn-success btn-sm mr-1 float-right"><i class="fas fa-times fa-xs"></i></button>								
								<button  id="bt_clear_product_form" class="btn btn-info btn-sm float-right"><i class="fas fa-eye fa-xs"></i></button>  
								
							</label> 
							<label class="text-left"><span>1234567890123456789012345</span> </label>	
						</div>						
						<div class="col border">
							<label><strong>DESCRIPTION</strong> </label>	
							<p>
								123456789012345678901234567890<br>
								123456789012345678901234567890<br>
								123456789012345678901234567890<br>
							</p>
						</div>
						<div class="col col-1 border text-right">
							<label><strong>ORDER QTY</strong> </label>	
							<input type="text" id="ship_qty" name="ship_qty" class="form-control form-control-sm text-right" value="9,999,990">	
						</div>
						<div class="col col-1 border text-right">
							<label><strong>SHIP QTY</strong> </label>	
							<input type="text" id="ship_qty" name="ship_qty" class="form-control form-control-sm text-right" value="9,999,990">	
						</div> 
						<div class="col col-1 border text-right">
							<label><strong>BKO QTY</strong> </label>	
							<input type="text" id="bko_qty" name="bko_qty" class="form-control form-control-sm text-right" value="9,999,990">	
						</div>
						<div class="col col-1 border text-right">
							<label><strong>UNIT PRICE</strong> </label>	
							<input type="text" id="unit_price" name="unit_price" class="form-control form-control-sm text-right" value="9,999.000">	
						</div>
						<div class="col col-1 border text-right">
							<label><strong>DISC %</strong> </label>	
							<input type="text" id="discuount" name="discuount" class="form-control form-control-sm text-right" value="99.0%">	
						</div>
						<div class="col col-1 border text-right">
							<label><strong>EXIT PRICE</strong> </label>	
							<input type="text" id="exit_price" name="exit_price" class="form-control form-control-sm text-right" value="9,999.000">	
						</div>
						<div class="col col-1 border text-center">
							<label class="text-center"><strong>TX</strong> </label>	
							<button  id="bt_add_product" class="btn btn-info btn-sm "><i class="fas fa-plus fa-xs"></i></button>
						</div>
					</div>
				</div>
				<!-- PRODUCT SECTION -->
				<!-- CART SECTION -->
				<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-2 border-bottom box">
					<div class="row border border-light">
						<table class="table table-bordered table-sm table-responsive-md">
							<thead>
								<tr>
									<th class="text-center"> <a href="#"> << </a> <a href="#"> < </a> <a href="#"> > </a> <a href="#"> >> </a> </th>
									<th> # </th>
									<th> ITEM NUMBER </th>
									<th> DESCRIPTION </th>
									<th class="text-right"> ORDER QTY</th>
									<th class="text-right"> SHIP QTY</th>
									<th class="text-right"> BKO QTY</th>
									<th class="text-right"> UNIT PRICE </th>
									<th class="text-right"> EXIT PRICE </th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>
										<button type="button" class="btn btn-sm btn-warning" disabled><i class="fas fa-eye fa-sm"></i></button>
										<button type="button" class="btn btn-sm btn-success " disabled><i class="fas fa-edit fa-sm"></i></button>
										<button type="button" class="btn btn-sm btn-danger " disabled><i class="far fa-trash-alt fa-sm "></i></button>
										<button type="button" class="btn btn-sm btn-info " disabled><i class="fas fa-external-link-square-alt fa-sm " ></i></button>
									</td>
									<td>1</td>
									<td>1234567890123456789012345</td>
									<td>123456789012345678901234567890</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">999,999.00</td>
								</tr>
								<tr>
									<td>
										<button type="button" class="btn btn-sm btn-warning" disabled><i class="fas fa-eye fa-sm"></i></button>
										<button type="button" class="btn btn-sm btn-success " disabled><i class="fas fa-edit fa-sm"></i></button>
										<button type="button" class="btn btn-sm btn-danger " disabled><i class="far fa-trash-alt fa-sm "></i></button>
										<button type="button" class="btn btn-sm btn-info " disabled><i class="fas fa-external-link-square-alt fa-sm " ></i></button>
									</td>
									<td>2</td>
									<td>1234567890123456789012345</td>
									<td>123456789012345678901234567890</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">999,999.00</td>
								</tr>
								<tr>
									<td>
										<button type="button" class="btn btn-sm btn-warning" disabled><i class="fas fa-eye fa-sm"></i></button>
										<button type="button" class="btn btn-sm btn-success " disabled><i class="fas fa-edit fa-sm"></i></button>
										<button type="button" class="btn btn-sm btn-danger " disabled><i class="far fa-trash-alt fa-sm "></i></button>
										<button type="button" class="btn btn-sm btn-info " disabled><i class="fas fa-external-link-square-alt fa-sm " ></i></button>
									</td>
									<td>3</td>
									<td>1234567890123456789012345</td>
									<td>123456789012345678901234567890</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">999,999.00</td>
								</tr>
								<tr>
									<td>
										<button type="button" class="btn btn-sm btn-warning" disabled><i class="fas fa-eye fa-sm"></i></button>
										<button type="button" class="btn btn-sm btn-success " disabled><i class="fas fa-edit fa-sm"></i></button>
										<button type="button" class="btn btn-sm btn-danger " disabled><i class="far fa-trash-alt fa-sm "></i></button>
										<button type="button" class="btn btn-sm btn-info " disabled><i class="fas fa-external-link-square-alt fa-sm " ></i></button>
									</td>
									<td>4</td>
									<td>1234567890123456789012345</td>
									<td>123456789012345678901234567890</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">999,999.00</td>
								</tr>
								<tr>
									<td>
										<button type="button" class="btn btn-sm btn-warning" disabled><i class="fas fa-eye fa-sm"></i></button>
										<button type="button" class="btn btn-sm btn-success " disabled><i class="fas fa-edit fa-sm"></i></button>
										<button type="button" class="btn btn-sm btn-danger " disabled><i class="far fa-trash-alt fa-sm "></i></button>
										<button type="button" class="btn btn-sm btn-info " disabled><i class="fas fa-external-link-square-alt fa-sm " ></i></button>
									</td>
									<td>5</td>
									<td>1234567890123456789012345</td>
									<td>123456789012345678901234567890</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">9999,999.00</td>
									<td class="text-right">999,999.00</td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
                <!-- CART SECTION -->
 </form>               
				<input type="hidden" value="<?php echo base_url();?>" id="url">				
                <?php $this->load->view('orders/_modal_customer_search'); ?>
                <?php $this->load->view('orders/_modal_ship_search'); ?>
                <?php $this->load->view('orders/_modal_salesman_search'); ?>
                <?php $this->load->view('orders/_modal_ship_vias_search'); ?>
                <?php $this->load->view('orders/_modal_terms_search'); ?>
				
        