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

  table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child:before,
  table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child:before {
    top: 28px;
    left: 14px;
    border: none;
    box-shadow: none;
  }

  table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>td:first-child,
  table.dataTable.dtr-inline.collapsed>tbody>tr[role="row"]>th:first-child {
    padding-left: 48px;
  }

  table.dataTable>tbody>tr.child ul.dtr-details {
    width: 100%;
  }

  table.dataTable>tbody>tr.child span.dtr-title {
    min-width: 50%;
  }

  table.dataTable.dtr-inline.collapsed>tbody>tr>td.child,
  table.dataTable.dtr-inline.collapsed>tbody>tr>th.child,
  table.dataTable.dtr-inline.collapsed>tbody>tr>td.dataTables_empty {
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

  .icon>.bx {
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

<div class="content">
  <div class="container">
    <div class="row">

      <?php $this->load->view('user/home/user_sidemenu'); ?>

      <div class="col-xl-9 col-md-8">
        <div class="row align-items-center mb-4">
          <div class="col">
            <h4 class="widget-title mb-0">Jobs List</h4>
          </div>
        </div>
        <div class="overflow-auto">
          <div class="sort-by">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
              <table id="job-list-table" class="table table-hover responsive nowrap" style="width:100%; border: 1px solid #6a6a6a; padding: 8px;">
                <thead>
                  <tr>
                    <th>Job Tittle</th>
                    <th>Job Description</th>
                    <th>Job Type</th>
                    <th>Skills</th>
                    <th>Amount</th>
                    <th>Date Time</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php      
                    $user_id = $this->session->userdata('id');
                    $query = $this->db->query('SELECT * FROM post_jobs_form WHERE user_id='.$user_id);
                    $result = $query->result(); 
                    foreach ($result as $value) { ?>
                  <tr>
                    <td><?php echo $value->job_tittle; ?></td>
                    <td>
                      <?php
                        echo substr(strip_tags($value->job_description), 0, 30).(strlen($value->job_description) > 30?"...":"");
                    ?></td>
                    <td>
                      <?php 
                      echo $value->job_type;
                    ?></td>
                    <td>
                      <?php 
                        $query = $this->db->query('SELECT * FROM subcategories');
                        $result = $query->result(); 
                        $cbz=1;
                        $skills = explode(",",$value->skills);
                        foreach($skills as $value1){
                          foreach ($result as $value2) {
                            if ($value2->id==$value1 && $cbz<=2) {
                              echo $value2->subcategory_name." <br> ";
                      } ?>

                      <?php } $cbz++; }  
                        if ($cbz > 2) {
                          echo "...";
                        }
                    ?></td>
                    <td><?php echo $value->amount; ?></td>
                    <td><?=date("M d H:i",strtotime($value->created_at))?></td>
                    <td>
                      <div class="dropdown">
                        <button class="btn btn-sm btn-success" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Action
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                          <a class="dropdown-item" href="<?php echo base_url(); ?>manage-proposal?id=<?php echo $value->id; ?>"><i class="bx bxs-pencil mr-2"></i> View Proposal</a>
                          <a class="dropdown-item" href="<?php echo base_url(); ?>manage-jobs-view?id=<?php echo $value->id; ?>"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                          <a onclick="return confirm('Are you sure?')" class="dropdown-item text-danger" href="<?php echo base_url(); ?>manage-jobs-delete?id=<?php echo $value->id; ?>"><i class="bx bxs-trash mr-2"></i> Remove</a>
                        </div>
                      </div>
                    </td>
                  </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>

          <script type="text/javascript">
            $(document).ready(function() {
              $("#job-list-table").DataTable({
                aaSorting: [],
                responsive: true,

                columnDefs: [{
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

<style type="text/css" src="<?=base_url()?>assets/css/home/manage_jobs.css"></style>