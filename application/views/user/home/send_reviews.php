<div class="content">
    <div class="container">
        <div class="row">

            <?php $this->load->view('user/home/user_sidemenu'); ?>

            <div class="col-xl-9 col-md-8">
                <div class="row align-items-center mb-4">
                    <div class="col">
                        <h4 class="widget-title mb-0">Write A Review</h4>
                    </div>
                </div>
 <?php    
$id = $_GET['id'];
// echo $id."==========";
       $query = $this->db->query('SELECT * FROM send_proposal WHERE id='.$id);
           $result = $query->result();
           $row = $result['0'];
           // echo $row->provider_id."<br>";
           // echo $row->user_id."<br>";
           // echo $row->review_comment."<br>";

 ?>
<form action="<?php echo base_url(); ?>send_reviews_form" method="post">
    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
      <div class="container-fluid">
<input type="hidden" name="proposal_id" value="<?php echo $_GET['proposal_id']; ?>">
<input type="hidden" name="user_id" value="<?php echo $row->user_id; ?>">
<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
        <div class="form-group">
          <label>Reviews</label>
          <div class="star-rating rate">
            <input class="rates" id="star5" type="radio" name="reviews" value="5" required>
            <label for="star5" title="5 stars">
              <i class="active fa fa-star"></i>
            </label>
            <input class="rates" id="star4" type="radio" name="reviews" value="4" required>
            <label for="star4" title="4 stars">
              <i class="active fa fa-star"></i>
            </label>
            <input class="rates" id="star3" type="radio" name="reviews" value="3" required>
            <label for="star3" title="3 stars">
              <i class="active fa fa-star"></i>
            </label>
            <input class="rates" id="star2" type="radio" name="reviews" value="2" required>
            <label for="star2" title="2 stars">
              <i class="active fa fa-star"></i>
            </label>
            <input class="rates" id="star1" type="radio" name="reviews" value="1" required>
            <label for="star1" title="1 star">
              <i class="active fa fa-star"></i>
            </label>
          </div>
        </div>        
                <div class="form-group">
          <label>Title of your review</label>
          <select name="title_of_review" class="form-control">
                          <option value="1">Good</option>
                          <option value="2">Excellent</option>
                          <option value="3">Normal</option>
                          <option value="4">High</option>
                      </select>
        </div>
        <div class="form-group">
          <label>Your review</label>
          <textarea class="form-control" rows="4" name="review_comment" required></textarea>
          
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-theme py-2 px-4 text-white mx-auto">Submit</button>
        </div>
      </div> 
      </form>  
                </div>
              </div>
          </div>


