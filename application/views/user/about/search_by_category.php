<div class="breadcrumb-title ml-5 mt-5">
                    <h2 class="text-dark font-weight-bold ml-3 mt-5">Browse by Category</h2>
                </div>
<style type="text/css">

.dt-buttons {
    margin-bottom: 10px;
}
.dt-buttons.btn-group{
    float: left;
    margin-right: 2%;
}

.dataTables_filter {
    float: left;
    margin-top: 4px;
    margin-right: 2%;
    text-align: left;
}
.dataTables_info {
    float: right;
}
.dataTables_length{
    float: right;
    margin-top: 4px;
    margin-left: 2%;
}

div.dataTables_wrapper div.dataTables_filter input {
    min-height: 56px !important;
    width: 1215px !important;
    box-sizing: border-box !important;
     padding: 12px 20px !important;
     border: 3px solid #ccc !important;
}
 div#example_filter {
    margin-top: 40px;
    margin-bottom: 40px;
    margin-left: -680px;
}                       </style>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<!------///////////////////////////////////////////////////////////////////------->
<!-- <h2 style="float:right;margin-left:100px;">Browse by Category</h2> -->
<table id="example" class="table table-bordered m-auto" cellspacing="0" width="70%">
    <thead>
        <tr>
            <th>*</th>
        </tr>
    </thead>
    <tbody>
<?php
 $query = $this->db->query("select * from subcategories ORDER BY subcategory_name");
 $result = $query->result_array();

 foreach ($result as $value) {
?>
        <tr><span></span>
            <td><i class="fas fa-caret-right text-warning mr-3"></i><a href="<?php echo base_url(); ?>latest-job?id=<?php echo $value['id']; ?>" title="<?php echo $value['subcategory_name']; ?>"><?php echo $value['subcategory_name']; ?></a> </td>
        </tr>
    <?php } ?>

    </tbody>
</table>
<script type="text/javascript">
    $(document).ready(function() {
    //Only needed for the filename of export files.
    //Normally set in the title tag of your page.
    document.title='Simple DataTable';
    // DataTable initialisation
    $('#example').DataTable(
        {
            
            "paging": false,
            "autoWidth": true,
            "fixedHeader": true,
            "buttons": [
                'colvis',
                'copyHtml5',
                'excelHtml5',
        'pdfHtml5',
                'print'
            ]
        }
    );
});
</script>
      <!------///////////////////////////////////////////////////////////////////------->