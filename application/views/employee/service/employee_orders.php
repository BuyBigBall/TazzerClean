
<div class="content">
	<div class="container">
		<div class="row">		
			<?php $this->load->view('employee/home/employee_sidemenu');?>
				
			<div class="col-xl-9 col-md-8">
				<div class="row align-items-center mb-4">
                    <div class="col">
                        <h4 class="widget-title mb-0">                        
                        <?php 
                            if($order_page_type == "view"){
                                echo "View Orders";
                            }else{
                                echo "View Completed Orders";
                            }
                        ?>
                        </h4>
                    </div>
                    <?php if($order_page_type == "view"){ ?>
                    <div class="col-auto">
                       <div class="sort-by">
                            <select class="form-control-sm custom-select searchFilterOrder" id="status">
                                <option value=''><?php echo (!empty($user_language[$user_selected]['lg_All'])) ? $user_language[$user_selected]['lg_All'] : $default_language['en']['lg_All']; ?></option>
                                <option value="1" <?php echo ($order_page_type == "view")?'selected':''; ?>><?php echo (!empty($user_language[$user_selected]['lg_Pending'])) ? $user_language[$user_selected]['lg_Pending'] : $default_language['en']['lg_Pending']; ?></option>
                                <option value="2"><?php echo (!empty($user_language[$user_selected]['lg_Inprogress'])) ? $user_language[$user_selected]['lg_Inprogress'] : $default_language['en']['lg_Inprogress']; ?></option>
                                <option value="3"><?php echo (!empty($user_language[$user_selected]['lg_Complete_Request'])) ? $user_language[$user_selected]['lg_Complete_Request'] : $default_language['en']['lg_Complete_Request']; ?></option>
                                <option value="5"><?php echo (!empty($user_language[$user_selected]['lg_Rejected'])) ? $user_language[$user_selected]['lg_Rejected'] : $default_language['en']['lg_Rejected']; ?>   </option>
                                <option value="7"><?php echo (!empty($user_language[$user_selected]['lg_Cancelled'])) ? $user_language[$user_selected]['lg_Cancelled'] : $default_language['en']['lg_Cancelled']; ?></option>
                                <option value="6"><?php echo (!empty($user_language[$user_selected]['lg_Completed'])) ? $user_language[$user_selected]['lg_Completed'] : $default_language['en']['lg_Completed']; ?></option>
                            </select>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <!-- ============================== start dataist ===================================== -->
                <div id="dataList">
                    <?php
                    if (!empty($all_bookings)) {
                        foreach ($all_bookings as $bookings) {
                            $this->db->select("service_image");
                            $this->db->from('services_image');
                            $this->db->where("service_id", $bookings['service_id']);
                            $this->db->where("status", 1);
                            $image = $this->db->get()->result_array();
                            $serv_image = array();
                            foreach ($image as $key => $i) {
                                $serv_image[] = $i['service_image'];
                            }
                            $rating = $this->db->where('user_id', $this->session->userdata('id'))->where('booking_id', $bookings['id'])->get('rating_review')->row_array();
                            ?>

                            <div class="bookings">
                                <div class="booking-list">
                                    <div class="booking-widget">
                                        <a href="<?php echo base_url() . 'service-preview/' . str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], $bookings['service_title']) . '?sid=' . md5($bookings['service_id']); ?>" class="booking-img">
                                            <img src="<?php echo base_url() . $serv_image[0] ?>" alt="User Image">
                                        </a>
                                        <div class="booking-det-info">

                                            <?php 
                                            $badge = '';
                                            $class = '';
                                            if ($bookings['status'] == BS_PENDING) {
                                                $badge = 'Pending';
                                                $class = 'bg-warning';
                                            }
                                            if ($bookings['status'] == BS_INPROGRESS) {
                                                $badge = 'Inprogress';
                                                $class = 'bg-primary';
                                            }
                                            if ($bookings['status'] == BS_COMPLETED_PROVIDER) {
                                                $badge = 'Complete Request sent by Provider';
                                                $class = 'bg-success';
                                            }
                                            if ($bookings['status'] == BS_ACCEPTED) {
                                                $badge = 'Accepted';
                                                $class = 'bg-success';
                                            }
                                            if ($bookings['status'] == BS_REJECTED) {
                                                $badge = 'Rejected';
                                                $class = 'bg-danger';
                                            }
                                            if ($bookings['status'] == BS_COMPLETED) {
                                                // $badge = 'Completed Accepted';
                                                $badge = 'Completed';
                                                $class = 'bg-success';
                                            }
                                            if ($bookings['status'] == BS_CANCELLED) {
                                                $badge = 'Cancelled by Provider';
                                                $class = 'bg-danger';
                                            }
                                            ?>
                                            <h3>
                                                <a href="<?php echo base_url() . 'service-preview/' . str_replace($GLOBALS['specials']['src'], $GLOBALS['specials']['des'], $bookings['service_title']) . '?sid=' . md5($bookings['service_id']); ?>">
                                                    <?php echo $bookings['service_title'] ?>
                                                </a>
                                            </h3>
                                            <?php                                            
                                            if (!empty($bookings['profile_img'])) {
                                                $image = base_url() . $bookings['profile_img'];
                                            } else {
                                                $image = base_url() . 'assets/img/user.jpg';
                                            }

                                            $user_currency_code = '';
                                            $userId = $this->session->userdata('id');
                                            If (!empty($userId)) {
                                                $service_amount1 = $bookings['amount'];

                                                $user_currency = get_user_currency();
                                                $user_currency_code = $user_currency['user_currency_code'];
                                                

                                                $service_amount1 = get_gigs_currency($bookings['amount'], $bookings['currency_code'], $user_currency_code);
//                                           
                                                } else {
                                                $user_currency_code = settings('currency');
                                                $service_amount1 = $bookings['amount'];
                                            }
                                            ?>
                                            <ul class="booking-details">
                                                <li>
                                                    <span><?php echo (!empty($user_language[$user_selected]['lg_Booking_Date'])) ? $user_language[$user_selected]['lg_Booking_Date'] : 'Booking Date'; ?></span><?= date('d M Y', strtotime($bookings['service_date'])); ?> 
                                                    <span class="badge badge-pill badge-prof <?php echo $class; ?>"><?= $badge; ?></span>
                                                </li>
                                                <li><span><?php echo (!empty($user_language[$user_selected]['lg_Booking_time'])) ? $user_language[$user_selected]['lg_Booking_time'] : 'Booking time'; ?></span> <?= $bookings['from_time'] ?> - <?= $bookings['to_time'] ?></li>
                                                <li><span><?php echo (!empty($user_language[$user_selected]['lg_Amount'])) ? $user_language[$user_selected]['lg_Amount'] : 'Amount'; ?></span> <?php echo currency_conversion($user_currency_code) . $service_amount1; ?></li>
                                                <?php
                                                    $this->db->where('id',$bookings['service_id']);
                                                    $query=$this->db->get('services');
                                                    $result=$query->result();
                                                    $row=$result['0'];
                                                ?>
                                                <li><span>Timeing</span> <?php 
                                                echo $row->serviceamounttype; ?></li>

                                                <li><span><?php echo (!empty($user_language[$user_selected]['lg_Location'])) ? $user_language[$user_selected]['lg_Location'] : 'Location'; ?></span> <?php echo $bookings['location'] ?></li>
                                                <li><span>User Phone</span>  <?php echo $bookings['mobileno'] ?></li>
                                                <li>
                                                    <span>User Image</span>
                                                    <div class="avatar avatar-xs mr-1">
                                                        <img class="avatar-img rounded-circle" alt="User Image" src="<?php echo $image; ?>">
                                                    </div> <?= !empty($bookings['name']) ? $bookings['name'] : '-'; ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="booking-action">
                                        <?php $pending = 0; ?>
                                        <?php if ($bookings['status'] == 2) { ?>
                                            <a href="<?php echo base_url() ?>employee-chat/employee-order-new-chat?book_id=<?php echo $bookings['id'] ?>" class="btn btn-sm bg-info-light">
                                                <i class="fa fa-eye"></i> Chat
                                            </a>
                                            <a onclick="initRejectData(this)" class="btn btn-sm bg-danger-light myReject" data-toggle="modal" data-target="#myReject" data-id="<?php echo $bookings['id'] ?>" data-providerid="<?php echo $bookings['provider_id'] ?>" data-userid="<?php echo $bookings['user_id'] ?>" data-serviceid="<?php echo $bookings['service_id'] ?>">
                                                <i class="fa fa-times"></i> Reject Order
                                            </a>
                                        <?php } elseif ($bookings['status'] == 1) { ?>
                                            <!-- <a href="<?php echo base_url() ?>employee-chat/employee-order-new-chat?book_id=<?php echo $bookings['id'] ?>" class="btn btn-sm bg-info-light">
                                                <i class="fa fa-eye"></i> Chat
                                            </a> -->
                                            <a onclick="acceptBooking(this)" class="btn btn-sm bg-success-light"  data-id="<?=$bookings['id'];?>" data-status="2" data-rowid="" data-review="" >
                                                <i class="fa fa-check"></i>Accept</a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    } else {
                        ?>
                       <p><?php echo (!empty($user_language[$user_selected]['lg_no_record_fou'])) ? $user_language[$user_selected]['lg_no_record_fou'] : 'No records found'; ?></p>
                    <?php } ?>
                    <?php echo $this->ajax_pagination->create_links(); ?>
                </div>
                <!-- ================================= end dataList ======================================= -->
						
			</div>
		</div>
	</div>
</div>

<!-- Reject Modal -->
<div class="modal fade" id="myReject">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reason for Reject</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="reject_booking_id">
                <input type="hidden" id="reject_provider_id">
                <input type="hidden" id="reject_user_id">
                <input type="hidden" id="reject_service_id">
                
                <div class="form-group">
                    <label>Reason</label>
                    <textarea class="form-control" rows="5" id="reject_review"></textarea>
                    <p class="error_cancel error" ><?php echo (!empty($user_language[$user_selected]['lg_Reason_required'])) ? $user_language[$user_selected]['lg_Reason_required'] : $default_language['en']['lg_Reason_required']; ?></p>
                </div>
                <div class="text-center">
                    
                        <button type="button" class="btn btn-theme py-2 px-4 text-white mx-auto" id="reject_booking" ><?php echo (!empty($user_language[$user_selected]['lg_Submit'])) ? $user_language[$user_selected]['lg_Submit'] : $default_language['en']['lg_Submit']; ?></button>
                                        
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Reject Modal -->

<script type="text/javascript">

    function initRejectData(obj){
        $('#reject_review').val('');
        $('#reject_booking_id').val('');
        $('#reject_provider_id').val('');
        $('#reject_user_id').val('');
        $('#reject_service_id').val('');
        var booking_id = $(obj).attr("data-id");
        var provider_id = $(obj).attr("data-providerid");
        var user_id = $(obj).attr("data-userid");
        var service_id = $(obj).attr("data-serviceid");

        $("#reject_booking_id").val(function() {
            return this.value + booking_id;
        });
        $("#reject_provider_id").val(function() {
            return this.value + provider_id;
        });
        $("#reject_user_id").val(function() {
            return this.value + user_id;
        });
        $("#reject_service_id").val(function() {
            return this.value + service_id;
        });
    }

    $('#reject_booking').on('click', function() {
        reject_booking();
    });   

    function reject_booking() {
        review = $("#reject_review").val();
        booking_id = $("#reject_booking_id").val();
        provider_id = $("#reject_provider_id").val();
        user_id = $("#reject_user_id").val();
        service_id = $("#reject_service_id").val();
        status = '<?php echo BS_REJECTED; ?>';
        reject_user_booking(booking_id, status, 0, review);
    }

    function reject_user_booking(bookid, status, rowid, review) {
        var bs_reject = '<?php echo BS_REJECTED; ?>';
        var bs_cancelled = '<?php echo BS_CANCELLED; ?>';
        if (status == bs_reject || status == bs_cancelled) {
            $('#myReject').modal('hide');
        }
        var token = $('#csrf_token').val();
        $.confirm({
            title: 'Confirmations..!',
            content: 'Do you want continue on this proccess..',
            buttons: {
                confirm: function() {                    
                    
                    $.ajax({
                        url: base_url + "update_status_by_employee",
                        data: {
                            'booking_id': bookid,
                            'status': status,
                            'review': review,
                            'csrf_token_name': token
                        },
                        type: 'POST',
                        dataType: 'JSON',
                        success: function(response) {
                            if (response == '3') { // session expiry
                                swal({
                                    title: "Session was Expired... !",
                                    text: "Session Was Expired ..",
                                    icon: "error",
                                    button: "okay",
                                    closeOnEsc: false,
                                    closeOnClickOutside: false
                                }).then(function() {
                                    window.location.reload();
                                });
                            }

                            if (response == '2') { //not updated
                                swal({
                                    title: "Somethings wrong !",
                                    text: "Somethings wents to wrongs",
                                    icon: "error",
                                    button: "okay",
                                    closeOnEsc: false,
                                    closeOnClickOutside: false
                                }).then(function() {
                                    window.location.reload();
                                });
                            }

                            if (response == '1') { //success updated
                                swal({
                                    title: "Updated the booking status !",
                                    text: "Service is Updated successfully...",
                                    icon: "success",
                                    button: "okay",
                                    closeOnEsc: false,
                                    closeOnClickOutside: false
                                }).then(function() {
                                    $('#update_div' + rowid).hide();
                                    window.location.reload();
                                });
                            }
                        }
                    })
                    
                },
                cancel: function() {},
            }
        });
    }

    function acceptBooking(obj){
        var booking_id = $(obj).attr("data-id");
        var status = '<?php echo BS_INPROGRESS; ?>';
        var review = "";
        var token = $('#csrf_token').val();
        $.confirm({
            title: 'Confirmations..!',
            content: 'Do you want continue on this proccess..',
            buttons: {
                confirm: function() {                    
                    
                    $.ajax({
                        url: base_url + "update_status_by_employee",
                        data: {
                            'booking_id': booking_id,
                            'status': status,
                            'review': review,
                            'csrf_token_name': token
                        },
                        type: 'POST',
                        dataType: 'JSON',
                        success: function(response) {
                            if (response == '3') { // session expiry
                                swal({
                                    title: "Session was Expired... !",
                                    text: "Session Was Expired ..",
                                    icon: "error",
                                    button: "okay",
                                    closeOnEsc: false,
                                    closeOnClickOutside: false
                                }).then(function() {
                                    window.location.reload();
                                });
                            }

                            if (response == '2') { //not updated
                                swal({
                                    title: "Somethings wrong !",
                                    text: "Somethings wents to wrongs",
                                    icon: "error",
                                    button: "okay",
                                    closeOnEsc: false,
                                    closeOnClickOutside: false
                                }).then(function() {
                                    window.location.reload();
                                });
                            }

                            if (response == '1') { //success updated
                                swal({
                                    title: "Updated the booking status !",
                                    text: "Service is Updated successfully...",
                                    icon: "success",
                                    button: "okay",
                                    closeOnEsc: false,
                                    closeOnClickOutside: false
                                }).then(function() {
                                    // window.location.reload();                                    
                                    window.location.href = "<?=base_url()?>employee-chat/employee-order-new-chat?book_id="+booking_id;
                                });
                            }
                        }
                    })
                    
                },
                cancel: function() {},
            }
        });
    }
</script>