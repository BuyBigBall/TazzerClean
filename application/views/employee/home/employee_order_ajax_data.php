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

			<script src="<?php echo base_url();?>assets/js/functions.js"></script>


