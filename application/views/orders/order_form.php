
<form id="order_form">
				<!-- SALESMAN SECTION -->
                <div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 pb-2 mb-3  box">
					<div id="section_seler" class="row border border-light" >
						
						<div class="col border "> 
							<label><strong>OPR: </strong> <input type="text" id="operador_name-input"  class="control-form input_custom" value="<?php echo $operator['first_name']." ".$operator['last_name']?>" size="20" /></label> 
							<label><strong>LOC: </strong> <input type="text" id="operador_location-input"  class="input_custom" value="<?php echo $operator['city']?>"/></label>
						</div>						
						<div class="col border text-center"> 
							<div class="btn-group btn-group-toggle" data-toggle="buttons">
								<label class="btn btn-xs btn-light ">
									<input type="radio" name="options" id="option1" autocomplete="off" checked>QUOTE
								</label>
								<label class="btn btn-xs btn-light active">
									<input type="radio" name="options" id="option1" autocomplete="off" checked>ORDER
								</label>
								<label class="btn btn-xs btn-light ">
									<input type="radio" name="options" id="option1" autocomplete="off" checked> INVOICE
								</label>
								</div>
								<div class="btn-group btn-group-toggle" data-toggle="buttons">
									
								<label class="btn btn-xs btn-light ">
									<input type="radio" name="options" id="option1" autocomplete="off" checked> VERIFY CHANGE
								</label>
								<label class="btn btn-xs btn-light ">
									<input type="radio" name="options" id="option1" autocomplete="off" checked> CREDIT
								</label>
							</div>
						</div>
						<div class="col border">
							<label><strong>DATE: </strong> <input type="text" id="" name=""  class="input_custom"  value="<?php echo date('m/d/Y')?>" size="10" /> </label> 
							<label><strong>DOC#: </strong> <input type="text" id="" name=""  class="input_custom"   value="1234567890"  size="10"/></label>	
						</div>
						<div class="col border">
							<label><strong>ORD: </strong> <input type="text" class="input_custom"  id="order_total" name="order_total" value="" size="15"/> </label> 
							<label><strong>BKO: </strong> <input type="text" class="input_custom"  id="bko_total"   name="bko_total"   value="" size="15"/></label>	
						</div>
						<div class="col col-2 border pt-2 text-right"> 
                            <button id="bt_save" type="button" class="btn btn-xs btn-success " ><i class="fas fa-save fa-sm"></i></button>
							<button id="bt_pending" type="button" class="btn btn-xs btn-warning " disabled><i class="far fa-hourglass fa-sm "></i></button>
							<button id="bt_cart" type="button" class="btn btn-xs btn-danger" disabled><i class="fas fa-shopping-cart fa-sm"></i></button>
							<button id="bt_out" type="button" class="btn btn-xs btn-info " ><i class="fas fa-power-off fa-sm " ></i></button>
						</div>
					</div>

				</div>

				<!-- SALESMAN SECTION -->
				<!-- CUSTOMER SECTION -->
				<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-2  box">
					<div class="row border border-light">
						<div class="col  border">
                            <label>
								<strong>SOLD TO: </strong> <input type="text" id="customer_id" name="customer_id"  class="input_custom"   value="" size="5"/>
								<div class="float-right">
									<button type="button" id="bt_clean_customer" class="btn btn-danger btn-xs "><i class="fas fa-times fa-xs"></i></button>  
									<button type="button" id="bt_model_detail"  class="btn btn-info btn-xs "><i class="fas fa-eye fa-xs"></i></button> </label> 
									<button type="button" id="bt_model_customer" class="btn btn-success btn-xs "><i class="fas fa-search fa-xs"></i></button>  
								</div>
							</label>
							<label>
								<input type="text" id="customer_name" name="customer_name"  class="input_custom" style="width:100%;" /> 
							</label>	
						</div>
						
						<div class="col  border">
                            <label><strong>SHIP TO: </strong> <input type="text" id="ship_id" name="ship_id"  class="input_custom"  size="5" />  
                            <button type="button" id="bt_model_ship" class="btn btn-success btn-xs float-right"><i class="fas fa-search fa-xs"></i></button> </label> 
							<input type="text" id="ship_customer_name" name="ship_customer_name"  class="input_custom" style="width:100%;" />	
						</div>
						<div class="col border"> 
                            <label><strong>SALS: </strong> <input type="text" id="salesman_id" name="salesman_id"  class="input_custom"  size="5" /><!-- <span>123</span> -->
                            <button type="button" id="bt_model_sales" class="btn btn-info btn-xs float-right"><i class="fas fa-search fa-xs"></i></button> </label> 
							<label><input type="text" id="salesman_name" name="salesman_name"  class="input_custom" style="width:100%;" /> <!-- <span>PEDRO RODRIGUEZ</span> --> </label>
						</div>
						<div class="col  border">
							<label><strong>ORDER BY: </strong> <input type="text" class="input_custom" value="" size="20"/> <span></span> </label> 
							<label><strong>P/O NUM: </strong>  <input type="text" class="input_custom" value="" size="20"/> <span></span></label>	
						</div>

						

						<div class="col  border">
                            <label><strong>SHIP VIA: </strong>  <input type="text" id="ship_via_id" name="ship_via_id"  class="input_custom"  size="5" /> <!--<span>123456</span>--> 
                            <button type="button"  id="bt_model_ship_via" class="btn btn-success btn-xs float-right"><i class="fas fa-search fa-xs"></i></button> </label> 
							<label><input type="text" id="ship_via_description" name="ship_via_description"  class="input_custom" value="" style="width:100%;"/> <!--<span>FEDEX NEXT DAY 10AM</span> --></label>	
						</div>
						<div class="col  border">
                            <label><strong>TERMS: </strong><input type="text" id="term_id" name="term_id" class="input_custom" value="" size="6"/> 
                            <button type="button" id="bt_model_terms" class="btn btn-success btn-xs float-right"><i class="fas fa-search fa-xs"></i></button> </label> 
							<label> <input type="text"  id="term_description" name="term_description" class="input_custom" value="" style="width:100%;"/> <!-- span>NET 30 2% 10 DAYS</span> --></label>	
						</div>

					</div>
				</div>
				<!-- CUSTOMER SECTION -->


				<!-- PRODUCT SECTION -->
				<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-2 border-bottom box">
					<div class="row border border-light" id="item_section">
						<div class="col col-2 border">
							<label>
								<strong> ITEM NUMBER:</strong> 
								<div class="float-right">		

								<button type="button" id="bt_info_product_form" class="btn btn-info btn-xs "><i class="fas fa-eye fa-xs"></i></button>  
								<button type="button" id="bt_model_search_product" class="btn btn-success btn-xs "><i class="fas fa-search fa-xs"></i></button>								
								</div>
							</label> 
							<div>
							<input type="text"  id="item_number" name="item_number" class=" form-control input_custom " value="" /> 

							</div>
						</div>						
						<div class="col col-3 border">
							<label><strong>DESCRIPTION</strong> </label>	
							<!-- 
								<input type="text" id="item_descriptions" name="item_description " class="form-control input_custom" />
							-->
							<textarea type="text" id="item_description" name="item_description " class="form-control input_custom" ></textarea>
						</div>
						<div class="col  border text-right">
							<label><strong>ORDER QTY</strong> </label>	
							<input type="text" min="0" value="0" step="any" id="order_qty" name="order_qty" class="form-control form-control-sm text-right" value="">	
						</div>
						<div class="col  border text-right">
							<label><strong>SHIP QTY</strong> </label>	
							<input type="text" id="ship_qty" name="ship_qty" class="form-control form-control-sm text-right" value="">	
						</div> 
						<div class="col  border text-right">
							<label><strong>BKO QTY</strong> </label>	
							<input type="text" id="bko_qty" name="bko_qty" class="form-control form-control-sm text-right" value="">	
						</div>
						<div class="col  border text-right">
							<label><strong>UNIT PRICE</strong> </label>	
							<input type="text" min="0" step="0.101"  pattern="^\d+(?:\.\d{1,2})?" id="unit_price" name="unit_price" class="form-control form-control-sm text-right" value="">	
						</div>
						<div class="col  border text-right">
							<label><strong>DISC %</strong> </label>	
							<input type="text"  min="0" step="0.101"  pattern="^\d+(?:\.\d{1,2})?" id="discuount" name="discuount" class="form-control form-control-sm text-right" value="">	
						</div>
						<div class="col  border text-right">
							<label><strong>EXT PRICE</strong> </label>	
							<input type="text"   min="0" step="0.101" pattern="^\d+(?:\.\d{1,2})?$" id="exit_price" name="exit_price" class="form-control form-control-sm text-right" value="">	
						</div>
						<div class="col  border text-center">
							<label class="text-center"><strong>TX</strong> </label>	
							<label class="text-center"><input class="form-check-input" type="radio" name="tax" id="tax1" value="Y" checked>
							Yes</label>	
							<label class="text-center"><input class="form-check-input" type="radio" name="tax" id="tax1" value="N" checked>
							No</label>
						</div>
						<div class="col col-sm border text-center">
							<br>
						<label class="text-center"><button  type="button" id="bt_add_product" class="btn btn-info btn-sm " col="3" row="3"><i class="fas fa-plus fa-xs"></i></button></label>
						<label class="text-center"><button type="button" id="bt_clear_product_form" class="btn btn-danger btn-sm "><i class="fas fa-times fa-xs"></i></button> </label> 
						</div>
					</div>
				</div>
				<!-- PRODUCT SECTION -->
				<!-- CART SECTION -->
				<div class=" justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-2 border-bottom box">
					<div class="row border border-light">
						<table id="cart_table" class="table table-sm  datatable">
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
                <?php $this->load->view('orders/_modal_items_search'); ?>
				
        