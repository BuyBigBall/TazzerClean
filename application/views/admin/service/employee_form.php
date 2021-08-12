<div class="page-wrapper">
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    <h3 class="page-title">Employee List</h3>
                </div>
                <!-- <div class="col-auto text-right">
                    <a href="<?php echo $base_url; ?>add-subscription" class="btn btn-primary add-button">
                        <i class="fa fa-plus"></i>
                    </a>
                </div> -->
            </div>
        </div>
        <!-- /Page Header -->
<style type="text/css">
    body {
  background: #f7f7f7;
}

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

        <div class="row pricing-box">


<div class="">
  <div class="row py-5">
    <div class="col-12">
      <table id="example" class="table table-hover responsive nowrap" style="width:100%">
        <thead>
          <tr>
            <th>Full Name</th>
            <th>Phone Number</th>
            <th>E-mail</th>
            <th>What are you apllying for ?</th>
            <th>City</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

             <?php
           $query = $this->db->query('SELECT * FROM tbl_yourself');

           $result = $query->result();

    ?>
    <?php foreach ($query->result() as $row)
        {
            ?>

          <tr>
            <td>
              <a href="#">
                <div class="d-flex align-items-center">
                  <div class="avatar avatar-blue mr-3"><?php echo substr($row->first_name, 0, 1) ?><?php echo substr($row->last_name, 0, 1) ?></div>

                  <div class="">
                    <p class="font-weight-bold mb-0"><?php echo $row->first_name; ?>&nbsp;<?php echo $row->last_name; ?></p>
                    <p class="text-muted mb-0"><?php echo $row->email; ?></p>
                  </div>
                </div>
              </a>
            </td>
            <td><?php echo $row->phone; ?></td>
            <td><?php echo $row->email; ?></td>
            <td>
<?php

         $service_values = $row->service_values; 

         if ($service_values==1) {
             echo "Cleaning Services";
         }
         if ($service_values==2) {
             echo "Clearance And Rubbish Services";
         }
         if ($service_values==3) {
             echo "Dog Walking And Pet Services";
         }
         if ($service_values==4) {
             echo "Domestic Helpers Services";
         }
         if ($service_values==5) {
             echo "Gardening  Services";
         }
         if ($service_values==6) {
             echo "Hair And Beauty Services";
         }
         if ($service_values==7) {
             echo "Handyman Services";
         }
         if ($service_values==8) {
             echo "Property Management Services";
         }
         if ($service_values==9) {
             echo "Scaffolding  And Building Services";
         }

         ?>
            </td>

            <td><?php echo $row->city; ?></td>
            <td>
                <?php if ($row->status==1) { ?>

                    <a  onclick="return confirm('Are you sure?')"  href="<?php echo $base_url; ?>employee_form_status?id=<?php echo $row->id; ?>&status=0" class="badge badge-success badge-success-alt text-light">Active</a>
             
                <?php }else{ ?>

                    <a   onclick="return confirm('Are you sure?')"  href="<?php echo $base_url; ?>employee_form_status?id=<?php echo $row->id; ?>&status=1" class="badge badge-danger badge-danger-alt text-light">Pending</a>
               
              <?php  } ?>
            </td>
            <td>
              <div class="dropdown">
                <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                        title="Actions"></i>Action
                    </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">

                  <a class="dropdown-item" href="<?php echo $base_url; ?>employee_form_view?id=<?php echo $row->id; ?>"><i class="bx bxs-pencil mr-2"></i> Edit Profile</a>
                  <a class="dropdown-item text-danger" onclick="return confirm('Are you sure?')" href="<?php echo $base_url; ?>employee_form_delete?id=<?php echo $row->id; ?>"><i class="bx bxs-trash mr-2"></i> Remove</a>
                </div>
              </div>
            </td>
          </tr>
  <?php } ?>


        </tbody>
      </table>
    </div>
  </div>
</div>



           
             
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
