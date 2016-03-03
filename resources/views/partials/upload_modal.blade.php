<style type="text/css">

	.js .box__file + label {
    max-width: 80%;
    text-overflow: ellipsis;
    white-space: nowrap;
    cursor: pointer;
    display: inline-block;
    overflow: hidden;
}
	    /* Small Devices, Tablets */
    @media only screen and (max-width : 768px) {
    	.ns_dialog{
    		width: 100% !important;
    		padding: 10px !important;
    		margin: 0 !important;
    	}
    }

    /* Extra Small Devices, Phones */ 
    @media only screen and (max-width : 480px) {
    	.ns_dialog{
    		width: 100% !important;
    		padding: 10px !important;
    		margin: 0 !important;
    	}
    }

    /* Custom, iPhone Retina */ 
    @media only screen and (max-width : 320px) {
        .ns_dialog{
    		width: 100% !important;
    		padding: 10px !important;
    		margin: 0 !important;
    	}  
    }

</style>

<div class="modal fade" id="upload-modal">

	<div class="modal-dialog ns_dialog" style="width: 55%;
    margin-top: 63px;">
		<div class="modal-content">
			<div class="modal-header" style="background-color: #288FB2;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			</div>
			<div class="modal-body" style="background:white">
				<div class="container-fluid">
				<style type="text/css">
					dt{
						font-size: 22px;
						color:black;
					}
				</style>
					<div class="col-md-6">
						<dl>
						  <dt>Reference No:</dt>
						  <dd id="m_ref"></dd>
						  <dt>Wallet Address:</dt>
						  <dd id="m_wa"></dd>
						  <dt>Order Status:</dt>
						  <dd id="m_os"></dd>
						  <dt>Total:</dt>
						  <dd id="m_tot"></dd>
						  <dt>Order Date:</dt>
						  <dd id="m_odate"></dd>
						</dl>
					</div>
					<div class="col-md-6">
						<h4 style="color: black">Upload Verification Image Now or Later</h4>
						<span id="timer"></span>
						<div  style="position: absolute; left: 50%;">
							<div id="modal_form_holder" style="padding: 30px;position: relative;left: -21%;
							top: 76px;">
							</div>
						</div>

						<div href="#" class="thumbnail">
					      <img src="{!!DIRECTORY_SEPARATOR!!}assets{!!DIRECTORY_SEPARATOR!!}images{!!DIRECTORY_SEPARATOR!!}placeholder.png" alt="...">
					    </div>
						

					</div>
		    	</div>
			</div>

		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

</div><!-- /.modal -->