<div class="content">
    <div class="container">
        <div class="row">

            <?php $this->load->view('user/home/user_sidemenu'); ?>

            <div class="col-xl-9 col-md-8">
                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h4 class="widget-title mb-0">Manage Proposal List</h4>
                    </div>
                </div>
                    <div class="overflow-auto">
                       <div class="sort-by">
<style type="text/css">

.table {
  border-spacing: 0 0.85rem !important;
}

.table .dropdown {
  display: inline-block;
}

.table td,
.table th {
  vertical-align: middle;
  margin-bottom: 10px;
  border: none;
}

.table thead tr,
.table thead th {
  border: none;
  font-size: 12px;
  letter-spacing: 1px;
  text-transform: uppercase;
  background: transparent;
}

.table td {
  background: #fff;
}

.table td:first-child {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
}

.table td:last-child {
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
}

.avatar {
  width: 2.75rem;
  height: 2.75rem;
  line-height: 3rem;
  border-radius: 50%;
  display: inline-block;
  background: transparent;
  position: relative;
  text-align: center;
  color: #868e96;
  font-weight: 700;
  vertical-align: bottom;
  font-size: 1rem;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.avatar-sm {
  width: 2.5rem;
  height: 2.5rem;
  font-size: 0.83333rem;
  line-height: 1.5;
}

.avatar-img {
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
  object-fit: cover;
}

.avatar-blue {
  background-color: #c8d9f1;
  color: #467fcf;
}

table.dataTable.dtr-inline.collapsed
  > tbody
  > tr[role="row"]
  > td:first-child:before,
table.dataTable.dtr-inline.collapsed
  > tbody
  > tr[role="row"]
  > th:first-child:before {
  top: 28px;
  left: 14px;
  border: none;
  box-shadow: none;
}

table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > td:first-child,
table.dataTable.dtr-inline.collapsed > tbody > tr[role="row"] > th:first-child {
  padding-left: 48px;
}

table.dataTable > tbody > tr.child ul.dtr-details {
  width: 100%;
}

table.dataTable > tbody > tr.child span.dtr-title {
  min-width: 50%;
}

table.dataTable.dtr-inline.collapsed > tbody > tr > td.child,
table.dataTable.dtr-inline.collapsed > tbody > tr > th.child,
table.dataTable.dtr-inline.collapsed > tbody > tr > td.dataTables_empty {
  padding: 0.75rem 1rem 0.125rem;
}

div.dataTables_wrapper div.dataTables_length label,
div.dataTables_wrapper div.dataTables_filter label {
  margin-bottom: 0;
}

@media (max-width: 767px) {
  div.dataTables_wrapper div.dataTables_paginate ul.pagination {
    -ms-flex-pack: center !important;
    justify-content: center !important;
    margin-top: 1rem;
  }
}

.btn-icon {
  background: #fff;
}
.btn-icon .bx {
  font-size: 20px;
}

.btn .bx {
  vertical-align: middle;
  font-size: 20px;
}

.dropdown-menu {
  padding: 0.25rem 0;
}

.dropdown-item {
  padding: 0.5rem 1rem;
}

.badge {
  padding: 0.5em 0.75em;
}

.badge-success-alt {
  background-color: #d7f2c2;
  color: #7bd235;
}

.table a {
  color: #212529;
}

.table a:hover,
.table a:focus {
  text-decoration: none;
}

table.dataTable {
  margin-top: 12px !important;
}

.icon > .bx {
  display: block;
  min-width: 1.5em;
  min-height: 1.5em;
  text-align: center;
  font-size: 1.0625rem;
}

.btn {
  font-size: 0.9375rem;
  font-weight: 500;
  padding: 0.5rem 0.75rem;
}

.avatar-blue {
      background-color: #c8d9f1;
      color: #467fcf;
    }

    .avatar-pink {
      background-color: #fcd3e1;
      color: #f66d9b;
    }
                        </style>

    <div class="col-xl-6 col-md-6">
      <table id="example" class="table table-hover responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th>Proposal Name</th>
            <th>Amount</th>
            <th>Proposal Description</th>
            <th>Milestone Comment</th>
            <th>Milestone Amount</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
<?php     // $user_id = $this->session->userdata('id');
$id = $_GET['id'];
		   $query = $this->db->query('SELECT * FROM send_proposal WHERE job_post_id='.$id);
           $result = $query->result(); 
          foreach ($result as $row) {
        
      $provider_id = $row->provider_id;
       $query = $this->db->query('SELECT * FROM providers WHERE id='.$provider_id);
           $result1 = $query->result(); 

           $row1 = $result1['0'];
       ?>
       <tr>
       <td><?php echo $row1->name; ?></td>
      <td><?php echo $row->amount; ?></td>
       <td><?php echo $row->send_proposal_description; ?></td>
       <td><?php echo $row->m_comment; ?></td>
       <td><?php echo $row->m_amount; ?></td>

<?php if ($row->status==1) { ?>
         <td>
              <div class="dropdown">
                <button class="btn btn-sm btn-success" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Action
                    </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

                  <!-- -->

                  <a onclick="return confirm('Are you sure?')" class="dropdown-item bg-success-light" href="<?php echo base_url() ?>action_proposal?id=<?php echo $row->id; ?>&action=3&mid=<?php echo $_GET['id']; ?>"><i class="fa fa-check"></i> Complete Job</a>

                  <a href="<?php echo base_url() ?>user-chat/job-new-chat?book_id=<?php echo $row->id; ?>" class="dropdown-item bg-info-light">
                                                <i class="fa fa-eye"></i> Chat
                  </a>
                </div>
              </div>
            </td>
<?php }elseif ($row->status==2) { ?>
            <td>
              <div class="dropdown">
                <button disabled="disabled" class="btn btn-sm btn-danger" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fa fa-times"></i> Removed Profile
                    </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

                  <!-- -->
                 
                </div>
              </div>
            </td>
<?php }elseif ($row->status==3) { ?>
<?php $user_id = $this->session->userdata('id');

$query = $this->db->query('SELECT * FROM  job_reviews WHERE job_post_id='.$row->job_post_id. ' and user_id='.$user_id);
$result1 = $query->result();
if (empty($result1)) { ?>
            <td>
                <a class="btn btn-sm btn-info text-light" href="<?php echo base_url(); ?>send-reviews?proposal_id=<?php echo $row->job_post_id; ?>&id=<?php echo $row->id; ?>&provider_id=<?php echo $row->provider_id; ?>"> <i class="fa fa-plus"></i> review
            </td>
<?php }else{ ?>
             <td>
<a class="btn btn-sm btn-info text-light" 
href="<?php echo base_url(); ?>view-reviews?proposal_id=<?php echo $row->id; ?>&provider_id=<?php echo $row->provider_id; ?>"> 
<i class="fa fa-eye"></i> View Review
            </td>
<?php } }else{ ?>
            <td>
              <div class="dropdown">
                <button class="btn btn-sm btn-success" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Action
                    </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

                  <a onclick="return confirm('Are you sure?')" class="dropdown-item bg-warning-light" href="<?php echo base_url() ?>action_proposal?id=<?php echo $row->id; ?>&action=1&mid=<?php echo $_GET['id']; ?>"><i class="fa fa-check"></i> Accept Profile</a>
                  <a onclick="return confirm('Are you sure?')" class="dropdown-item bg-danger-light" href="<?php echo base_url() ?>action_proposal?id=<?php echo $row->id; ?>&action=2&mid=<?php echo $_GET['id']; ?>"><i class="fa fa-times"></i> Remove Profile</a>

                <!--   <a onclick="return confirm('Are you sure?')" class="dropdown-item bg-success-light" href="<?php echo base_url() ?>action_proposal?id=<?php echo $row->id; ?>&action=3&mid=<?php echo $_GET['id']; ?>"><i class="fa fa-check"></i> Complete Job</a>
 -->
                  <a href="<?php echo base_url() ?>user-chat/job-new-chat?book_id=<?php echo $row->id; ?>" class="dropdown-item bg-info-light">
                                                <i class="fa fa-eye"></i> Chat
                  </a>
                </div>
              </div>
            </td>
<?php } ?>
          </tr>
    <?php
      $co_rows = $this->db->select("t1.id as id, t2.name as name")
                          ->from('send_proposal_coworkers as t1')
                          ->join("providers as t2", "t1.provider_id=t2.id", "left")
                          ->where('t1.proposal_id', $row->id)
                          ->where('t1.status != 2')
                          ->get()->result();

      if(sizeof($co_rows) > 0){
    ?>
          <tr>
            <td>&nbsp;</td>
            <td colspan="6">
              <table>
                <tr>
                  <th width="30%">Collaborator Name</td>
                  <th width="60%">&nbsp;</td>
                  <th>Action</td>
                </tr>
              <?php 
                foreach($co_rows as $co_row){
              ?>
                <tr>
                  <td><?php echo $co_row->name; ?></td>
                  <td>&nbsp;</td>
                  <td>
                    <div class="dropdown">
                      <button class="btn btn-sm btn-success" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Action
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        <a onclick="return confirm('Are you sure?')" href="<?php echo base_url() ?>user-chat/decline-coworker?id=<?php echo $co_row->id; ?>&book_id=<?php echo $row->id; ?>" class="dropdown-item bg-danger-light">
                          <i class="fa fa-times"></i>Decline
                        </a>
                      </div>
                    </div>
                  </td>
                </tr>
            <?php } ?>
              </table>
            </td>
          </tr>
    <?php 
      }
   ?>

         <?php } ?> 
        </tbody>
      </table>
    </div>
  </div>

<script type="text/javascript">
  $(document).ready(function() {
  $("#example").DataTable({
    aaSorting: [],
    responsive: true,

    columnDefs: [
      {
        responsivePriority: 1,
        targets: 0
      },
      {
        responsivePriority: 2,
        targets: -1
      }
    ]
  });

  $(".dataTables_filter input")
    .attr("placeholder", "Search here...")
    .css({
      width: "300px",
      display: "inline-block"
    });

  $('[data-toggle="tooltip"]').tooltip();
});

</script>
                      </div>
                  </div>
              </div>
          </div>


